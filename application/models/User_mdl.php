<?php  

	class User_mdl extends CI_Model
	{
		// Read
		public function userlist()
		{
			$this->db->select('*');
			$this->db->from('user');
			$sql = $this->db->get('');

			return $sql->result();
		}

		// CREATE (STORE)
		public function store($date)
		{
			$profilepicture = $date.'_'.str_replace(' ', '_', $_FILES['image']['name']);
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$country = $this->input->post('country');
			$gender = $this->input->post('gender');
			$password = sha1($this->input->post('password'));

			$data = array(
				'username' => $username, 
				'email' => $email, 
				'phone' => $phone, 
				'country' => $country, 
				'gender' => $gender, 
				'password' => $password, 
				'profilepicture' => $profilepicture
			);

			$result = $this->db->insert('user', $data);

			return $email;
		}
		public function setsession($email)
		{
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('email', $email);
			$sql = $this->db->get('');

			return $sql->result();
		}


		// get UPDATE
		public function edit($id)
		{
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('userid', $id);
			$sql = $this->db->get('');

			return $sql->result();
		}
		// UPDATE
		public function update($date)
		{
			if ($_FILES['image']['name']) {
				$profilepicture = $date.'_'.str_replace(' ', '_', $_FILES['image']['name']);
			} else {
				$profilepicture = $this->input->post('oldprofile');
			}
			
			$userid = $this->input->post('userid');
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$country = $this->input->post('country');
			$gender = $this->input->post('gender');

			$userdata = array(
				'id' => $userid,
				'name' => $username,
				'email' => $email,
				'profilepicture' => $profilepicture, 
				'role' => 'user'
			);
			$this->session->set_userdata($userdata);
			
			$editdata = array(
				'username' => $username, 
				'email' => $email, 
				'phone' => $phone, 
				'country' => $country, 
				'gender' => $gender, 
				'profilepicture' => $profilepicture
			);
			$this->db->where('userid', $userid);
			$this->db->update('user', $editdata);
		}

		// DELETE
		public function delete($id)
		{
			$this->db->where('userid', $id);
			$this->db->delete('user');
		}

		// DETAIL
		public function detail($id)
		{
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('userid', $id);
			$sql = $this->db->get('');

			return $sql->result();
		}

		public function checklogin()
		{
			$email = $this->input->post('email');
			$password = sha1($this->input->post('password'));
			$query = $this->db->get_where('user', array('email'=>$email, 'password'=>$password));

			// return $query->row_array();
			if ($query->num_rows() > 0 ) {
				return $query->row_array();
			}
			else {
				return "";
			}
		}

		public function checkcurrentpassword()
		{
			$id = $this->input->post('id');
			$cpassword = sha1($this->input->post('cpassword'));
			$query = $this->db->get_where('user', array('userid'=>$id, 'password'=>$cpassword));

			// return $query->row_array();
			if ($query->num_rows() > 0 ) {
				return $query->row_array();
			}
			else {
				return "";
			}
		}

		public function confirmuser()
		{
			$name = $this->input->post('name');
			$email = $this->input->post('email');

			$userquery = $this->db->get_where('user', array('username'=>$name, 'email'=>$email));
			$tourguidequery = $this->db->get_where('tourguide', array('tourguidename'=>$name, 'email'=>$email));
			$staffquery = $this->db->get_where('staff', array('staffname'=>$name, 'email'=>$email));

			if ($userquery->num_rows() > 0 ) {
				return $userquery->row_array();
			} elseif ($tourguidequery->num_rows() > 0 ) {
				return $tourguidequery->row_array();
			} elseif ($staffquery->num_rows() > 0 ) {
				return $staffquery->row_array();
			} else {
				return "";
			}
		}

		public function updatepassword()
		{
			$id = $this->input->post('id');
			$password = sha1($this->input->post('password'));

			$editdata = array(
				'password' => $password
			);
			$this->db->where('userid', $id);
			$this->db->update('user', $editdata);
		}

		public function reset()
		{
			$id = $this->input->post('id');
			$role = $this->input->post('role');
			$password = sha1($this->input->post('password'));

			if ($role == 'user') {
				
				$editdata = array(
					'password' => $password
				);
				$this->db->where('userid', $id);
				$this->db->update('user', $editdata);

			} elseif ($role == 'tourguide') {
				
				$editdata = array(
					'password' => $password
				);
				$this->db->where('tourguideid', $id);
				$this->db->update('tourguide', $editdata);

			} else {

				$editdata = array(
					'password' => $password
				);
				$this->db->where('staffid', $id);
				$this->db->update('staff', $editdata);

			}
		}
	}
?>