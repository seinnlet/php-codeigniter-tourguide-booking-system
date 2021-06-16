<?php  

	class User extends CI_Controller
	{
		public function index()
		{
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			
			$data['userlist'] = $this->User_mdl->userlist();
			$data['innerdata'] = 'user_list';
     		$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
			$data['notidata'] = 'adminnoti_tour';
			$this->load->view('stafftemplate', $data);
		}

		public function store()
		{
			$this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[tourguide.email]|is_unique[staff.email]|is_unique[user.email]' , array('is_unique' => 'This email is already Existed!'));
			$this->form_validation->set_rules('country', 'Country', 'required', array('required' => 'Please Choose Country!'));

			if ($this->form_validation->run() == FALSE)
            {
				$data['countrylist'] = $this->Region_mdl->countrylist();
				$this->load->view('register', $data);
			}
			else 
			{
				$date = date('Ymdhis');
				if (isset($_FILES['image'])) {
					$config = array(
				        'upload_path' => 'assets/frontend/images/profile/',
				        'allowed_types' => "gif|jpg|png|jpeg",
				        'overwrite' => TRUE,
				        'file_name' => $date.'_'.$_FILES['image']['name']
				    );
				    $this->upload->initialize($config);
					$this->load->library('upload', $config);
					$this->upload->do_upload('image');
				}

	            $email = $this->User_mdl->store($date);
	            $storedata = $this->User_mdl->setsession($email);

	            foreach ($storedata as $user)
				{
					$userid = $user->userid;
					$username = $user->username;
					$email = $user->email;
					$profilepicture = $user->profilepicture;
				} 

	            $userdata = array(
					'id' => $userid,
					'name' => $username,
					'email' => $email,
					'profilepicture' => $profilepicture, 
					'role' => 'user'
				);
				$this->session->set_userdata($userdata);


				redirect(base_url() . 'index.php/Tour/showall');
			}
		}

		public function register()
		{
			$data['countrylist'] = $this->Region_mdl->countrylist();
			$this->load->view('register', $data);
		}

		public function edit()
		{
			$id = $this->uri->segment(3);
			$data['edituser'] = $this->User_mdl->edit($id);
			$data['countrylist'] = $this->Region_mdl->countrylist();
			$data['innerdata'] = 'user_edit';
			$this->load->view('template', $data);
		}

		public function update()
		{
			$date = date('Ymdhis');
			if (isset($_FILES['image'])) {
				$config = array(
			        'upload_path' => 'assets/frontend/images/profile/',
			        'allowed_types' => "gif|jpg|png|jpeg",
			        'overwrite' => TRUE,
			        'file_name' => $date.'_'.$_FILES['image']['name']
			    );
			    $this->upload->initialize($config);
				$this->load->library('upload', $config);
				$this->upload->do_upload('image');
			}
			$this->User_mdl->update($date);
			redirect(base_url() . 'index.php/User/profile/'.$this->session->userdata('id'));
		}

		public function delete()
		{
			$id = $this->uri->segment(3);
			$this->User_mdl->delete($id);
			redirect(base_url() . 'index.php/User');
		}

		public function profile()
		{
			$id = $this->uri->segment(3);
			$data['detailuser'] = $this->User_mdl->detail($id);
			$data['innerdata'] = 'user_profile';
			$this->load->view('template', $data);
		}

		public function updatepassword()
		{
			$confirm = $this->User_mdl->checkcurrentpassword();
			if ($confirm) {
				$this->User_mdl->updatepassword();
				echo "<script type='text/javascript'>alert('Password is Successfully Changed.');</script>";
				redirect(base_url() . 'index.php/User/profile/'.$this->session->userdata('id'), 'refresh');
			}
			else {
				echo "<script>alert('Sorry, your current password does not match.');</script>";
				$this->load->view('changepassword');
			}
		}
		public function changepassword()
		{
			$this->load->view('changepassword');
		}

		public function forgetpassword()
		{
			$this->load->view('forgetpassword');	
		}

		public function resetpassword()
		{
			$this->load->view('resetpassword');
		}

		public function confirmuser()
		{
			$confirm = $this->User_mdl->confirmuser();

			if (isset($confirm['userid'])) {
				redirect(base_url().'index.php/User/resetpassword/'.$confirm['userid'].'/user','refresh');
			} elseif (isset($confirm['tourguideid'])) {
				redirect(base_url().'index.php/User/resetpassword/'.$confirm['tourguideid'].'/tourguide','refresh');
			} elseif (isset($confirm['staffid'])) {
				redirect(base_url().'index.php/User/resetpassword/'.$confirm['staffid'].'/staff','refresh');
			} else {
				echo "<script>alert('Sorry, invalid user!');</script>";
				$this->load->view('forgetpassword');
			}

		}

		public function reset()
		{
			$this->User_mdl->reset();
			echo "<script>alert('Your New Password is Set!');</script>";
			redirect(base_url() . 'index.php/Login', 'refresh');
		}

	}
?>