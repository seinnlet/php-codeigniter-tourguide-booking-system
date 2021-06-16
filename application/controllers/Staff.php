<?php  

	class Staff extends CI_Controller
	{
		public function index()
		{
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			
			$data['stafflist'] = $this->Staff_mdl->stafflist();
			$data['innerdata'] = 'staff_list';
			$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
			$data['notidata'] = 'adminnoti_tour';
			$this->load->view('stafftemplate', $data);
		}

		public function store()
		{
			$this->form_validation->set_rules('email', 'Email', 'required|is_unique[staff.email]|is_unique[staff.email]|is_unique[user.email]');

			if ($this->form_validation->run() == FALSE)
            {
				$data['innerdata'] = 'staff_add';
				$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
				$data['notidata'] = 'adminnoti_tour';
				$this->load->view('stafftemplate', $data);
            }
            else
            {
                $this->Staff_mdl->store();
				redirect(base_url() . 'index.php/Staff');
            }
			
		}

		public function add()
		{
			$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
			$data['notidata'] = 'adminnoti_tour';
			$data['innerdata'] = 'staff_add';
			$this->load->view('stafftemplate', $data);
		}

		public function delete()
		{
			$id = $this->uri->segment(3);
			$this->Staff_mdl->delete($id);
			redirect(base_url() . 'index.php/Staff');
		}

		public function profile()
		{
			$id = $this->uri->segment(3);
			$data['detailstaff'] = $this->Staff_mdl->detail($id);
			$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
			$data['notidata'] = 'adminnoti_tour';
			$data['innerdata'] = 'staff_profile';
			$this->load->view('stafftemplate', $data);
		}

		public function edit()
		{
			$id = $this->uri->segment(3);
			$data['editstaff'] = $this->Staff_mdl->edit($id);
			$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
			$data['notidata'] = 'adminnoti_tour';
			$data['innerdata'] = 'staff_edit';
			$this->load->view('stafftemplate', $data);
		}

		public function update()
		{
			$config = array(
		        'upload_path' => 'assets/backend/img/profile/',
		        'allowed_types' => "gif|jpg|png|jpeg",
		        'overwrite' => TRUE,
		        'file_name' => 's'.$this->session->userdata('staffid').'_'.$_FILES['profile']['name']
		    );

			// var_dump($config);

			$this->upload->initialize($config);
			$this->load->library('upload', $config);
			$this->upload->do_upload('profile');

			$this->Staff_mdl->update();
			redirect(base_url() . 'index.php/Staff/profile/' . $this->session->userdata('staffid'));
		}

		public function changepassword()
		{
			$this->load->view('changepassword');
		}

		public function updatepassword()
		{
			$confirm = $this->Staff_mdl->checkcurrentpassword();
			if ($confirm) {
				$this->Staff_mdl->updatepassword();
				echo "<script type='text/javascript'>alert('Password is Successfully Changed.');</script>";
				redirect(base_url() . 'index.php/StaffHome', 'refresh');
			}
			else {
				echo "<script>alert('Sorry, your current password does not match.');</script>";
				$this->load->view('changepassword');
			}
		}
	}
?>