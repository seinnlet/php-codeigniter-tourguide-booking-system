<?php  

	class Tourguide_mdl extends CI_Model
	{
		// Read
		public function tourguidelist()
		{
			$this->db->select('*');
			$this->db->from('tourguide');
			$this->db->join('region', 'tourguide.regionid = region.regionid');
			$this->db->order_by('tourguideid', 'ASC');
			$sql = $this->db->get('');

			return $sql->result();
		}

		public function languagelist()
		{
			$this->db->select('*');
			$this->db->from('language');
			$this->db->order_by('name', 'ASC');
			$sql = $this->db->get('');

			return $sql->result();
		}
		public function detaillanguagelist($id)
		{
			$this->db->select('*');
			$this->db->from('languagedetail');
			$this->db->join('language', 'language.languageid = languagedetail.languageid');
			$this->db->where('tourguideid', $id);
			$this->db->order_by('level', 'DESC');
			$sql = $this->db->get('');

			return $sql->result();
		}
		public function pivotlanguagelist()
		{
			$this->db->select('*');
			$this->db->from('languagedetail');
			$this->db->join('language', 'language.languageid = languagedetail.languageid');
			$sql = $this->db->get('');

			return $sql->result();
		}

		// CREATE (STORE)
		public function store()
		{

			$tourguidename = $this->input->post('name');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$address = $this->input->post('address');
			$regionid = $this->input->post('region');
			$level = $this->input->post('level');
			$gender = $this->input->post('gender');
			$experience = $this->input->post('experience');
			$feesperday = $this->input->post('fees');
			$staffid = $this->input->post('staffid');
			$password = sha1('guide@localsone');
			$profilepicture = 'profile/user.png';

			$data = array(
				'tourguidename' => $tourguidename, 
				'email' => $email,
				'phone' => $phone,
				'address' => $address,
				'regionid' => $regionid,
				'level' => $level,
				'gender' => $gender,
				'password' => $password,
				'profilepicture' => $profilepicture,
				'experience' => $experience,
				'feesperday' => $feesperday,
				'staffid' => $staffid
			);

			$result = $this->db->insert('tourguide', $data);
			return $result;
		}

		public function addlanguage()
		{
			$tourguideid = $this->input->post('tourguideid');
			$languageid = $this->input->post('language');
			$level = $this->input->post('fluency');

			$data = array(
				'tourguideid' => $tourguideid, 
				'languageid' => $languageid,
				'level' => $level
			);

			$result = $this->db->insert('languagedetail', $data);
			return $result;
		}

		// UPDATE
		public function update()
		{
			$tourguideid = $this->input->post('tourguideid');
			$tourguidename = $this->input->post('name');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$address = $this->input->post('address');
			$regionid = $this->input->post('region');
			$level = $this->input->post('level');
			$gender = $this->input->post('gender');
			$experience = $this->input->post('experience');
			$feesperday = $this->input->post('fees');
			$description = $this->input->post('description');
			$credentials = $this->input->post('credentials');
			$oldprofile = $this->input->post('oldprofile');
			$profile = $_FILES['profile']['name'];

			// var_dump($profile);

			if ($profile == "") {
				$profile = $oldprofile;
			} else {
				$profile = str_replace(' ', '_', $profile);
				$profile = 'profile/t'.$tourguideid.'_'.$profile; 
			}

			$userdata = array(
				'id' => $tourguideid,
				'name' => $tourguidename,
				'email' => $email,
				'profilepicture' => $profile, 
				'role' => 'tourguide'
			);
			$this->session->set_userdata($userdata);

			$editdata = array(
				'tourguidename' => $tourguidename, 
				'email' => $email,
				'phone' => $phone,
				'address' => $address,
				'regionid' => $regionid,
				'level' => $level, 
				'gender' => $gender,
				'profilepicture' => $profile,
				'experience' => $experience,
				'feesperday' => $feesperday,
				'description' => $description,
				'credentials' => $credentials
			);

			$this->db->where('tourguideid', $tourguideid);
			$this->db->update('tourguide', $editdata);

			// updating language
			$count = $this->input->post('count');
			for ($i=0; $i < $count; $i++) { 
				$languageid = $this->input->post('l'.($i+1));
				$level = $this->input->post('f'.($i+1));

				$data = array(
					'languageid' => $languageid,
					'level' => $level
				); 
				$this->db->where('tourguideid', $tourguideid);
				$this->db->where('languageid', $languageid);
				$this->db->update('languagedetail', $data);
			}
		}

		// DELETE
		public function delete($id)
		{
			$this->db->where('tourguideid', $id);
			$this->db->delete('request');

			$this->db->where('tourguideid', $id);
			$this->db->delete('tour');

			$this->db->where('tourguideid', $id);
			$this->db->delete('languagedetail');

			$this->db->where('tourguideid', $id);
			$this->db->delete('rate');

			$this->db->where('tourguideid', $id);
			$this->db->delete('blog');

			$this->db->where('tourguideid', $id);
			$this->db->delete('tourguide');
		}

		public function checklogin()
		{
			$email = $this->input->post('email');
			$password = sha1($this->input->post('password'));
			$query = $this->db->get_where('tourguide', array('email'=>$email, 'password'=>$password));

			// return $query->row_array();
			if ($query->num_rows() > 0 ) {
				return $query->row_array();
			}
			else {
				return "";
			}
		}

		public function detail($id)
		{
			$this->db->select('tourguide.*, region.*, staff.staffname');
			$this->db->from('tourguide');
			$this->db->join('region', 'tourguide.regionid = region.regionid');
			$this->db->join('staff', 'tourguide.staffid = staff.staffid');
			$this->db->where('tourguideid', $id);
			$sql = $this->db->get('');

			return $sql->result();
		}

		public function edit($id)
		{
			$this->db->select('*');
			$this->db->from('tourguide');
			$this->db->where('tourguideid', $id);
			$sql = $this->db->get('');

			return $sql->result();
		}

		public function checkcurrentpassword()
		{
			$id = $this->input->post('id');
			$cpassword = sha1($this->input->post('cpassword'));
			$query = $this->db->get_where('tourguide', array('tourguideid'=>$id, 'password'=>$cpassword));

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
			$this->db->where('tourguideid', $id);
			$this->db->update('tourguide', $editdata);
		}

		public function deletelanguage($id, $lid)
		{
			$this->db->where('tourguideid', $id);
			$this->db->where('languageid', $lid);
			$this->db->delete('languagedetail');
		}

		public function search()
		{
			$this->db->select('*');
			$this->db->from('tourguide');
			$this->db->join('region', 'tourguide.regionid = region.regionid');
			if ($this->input->post('keyword') && $this->input->post('region')) {
				
				$this->db->where('region.regionid', $this->input->post('region'));
				$this->db->like('tourguidename', $this->input->post('keyword'), 'both'); 
				$this->db->or_like('regionname', $this->input->post('keyword'), 'both'); 
				$this->db->or_like('country', $this->input->post('keyword'), 'both'); 

			}elseif ($this->input->post('region')) {
				
				$this->db->where('region.regionid', $this->input->post('region')); 
			
			} elseif ($this->input->post('keyword')) {

				$this->db->like('tourguidename', $this->input->post('keyword'), 'both'); 
				$this->db->or_like('regionname', $this->input->post('keyword'), 'both'); 
				$this->db->or_like('country', $this->input->post('keyword'), 'both');

			}
			$this->db->order_by('registered_at', 'DESC');
			$sql = $this->db->get('');

			return $sql->result();
		}
	}
?>