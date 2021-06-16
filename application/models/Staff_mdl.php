<?php  

	class Staff_mdl extends CI_Model
	{
		// Read
		public function stafflist()
		{
			$this->db->select('*');
			$this->db->from('staff');
			$sql = $this->db->get('');

			return $sql->result();
		}

		// CREATE (STORE)
		public function store()
		{
			$staffname = $this->input->post('name');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$address = $this->input->post('address');
			$role = $this->input->post('role');
			$password = sha1('staff@localsone');
			$profilepicture = 'profile/staff.png';

			$data = array(
				'staffname' => $staffname, 
				'email' => $email,
				'phone' => $phone,
				'address' => $address,
				'password' => $password,
				'profilepicture' => $profilepicture,
				'role' => $role
			);

			$result = $this->db->insert('staff', $data);
			return $result;
		}

		// EDIT
		public function edit($id)
		{
			$this->db->select('*');
			$this->db->from('staff');
			$this->db->where('staffid', $id);
			$sql = $this->db->get('');

			return $sql->result();
		}
		// UPDATE
		public function update()
		{
			$staffid = $this->input->post('staffid');
			$staffname = $this->input->post('staffname');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$address = $this->input->post('address');
			if ($_FILES['profile']['name']) {
				$profile = 'profile/s'.$staffid.'_'.str_replace(' ', '_', $_FILES['profile']['name']);
			} else {
				$profile = $this->input->post('oldprofile');
			}

			$userdata = array(
				'staffid' => $staffid,
				'staffname' => $staffname,
				'email' => $email,
				'profilepicture' => $profile, 
				'role' => 'staff'
			);
			$this->session->set_userdata($userdata);

			$editdata = array(
				'staffname' => $staffname, 
				'email' => $email,
				'phone' => $phone,
				'address' => $address,
				'profilepicture' => $profile
			);

			$this->db->where('staffid', $staffid);
			$this->db->update('staff', $editdata);
		}

		// DELETE
		public function delete($id)
		{
			$this->db->where('staffid', $id);
			$this->db->delete('tour');

			$this->db->where('staffid', $id);
			$this->db->delete('staff');
		}

		// DETAIL
		public function detail($id)
		{
			$this->db->select('*');
			$this->db->from('staff');
			$this->db->where('staffid', $id);
			$sql = $this->db->get('');

			return $sql->result();
		}

		public function checklogin()
		{
			$email = $this->input->post('email');
			$password = sha1($this->input->post('password'));
			$query = $this->db->get_where('staff', array('email'=>$email, 'password'=>$password));

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
			$query = $this->db->get_where('staff', array('staffid'=>$id, 'password'=>$cpassword));

			// return $query->row_array();
			if ($query->num_rows() > 0 ) {
				return $query->row_array();
			}
			else {
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
			$this->db->where('staffid', $id);
			$this->db->update('staff', $editdata);
		}
	}
?>