<?php  

	class Transportation extends CI_Controller
	{
		public function index()
		{
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			
			$data['transportationlist'] = $this->Transportation_mdl->transportationlist();
			$data['innerdata'] = 'transportation_list';
			$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
			$data['notidata'] = 'adminnoti_tour';
			$this->load->view('stafftemplate', $data);
		}

		public function store()
		{
			$this->form_validation->set_rules('name', 'name', 'required|is_unique[transportation.name]', array('is_unique' => 'This Name is already Existed!'));
			$this->form_validation->set_rules('type', 'TransportationType', 'required', array('required' => 'Please Choose Transportation Type!'));

			 if ($this->form_validation->run() == FALSE)
            {
				$data['innerdata'] = 'transportation_add';
				$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
				$data['notidata'] = 'adminnoti_tour';
				$this->load->view('stafftemplate', $data);
            }
            else
            {
                $this->Transportation_mdl->store();
				redirect(base_url() . 'index.php/Transportation');
            }
		}

		public function add()
		{
			$data['innerdata'] = 'transportation_add';
			$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
			$data['notidata'] = 'adminnoti_tour';
			$this->load->view('stafftemplate', $data);
		}

		public function edit()
		{
			$id = $this->uri->segment(3);
			$data['edittransportation'] = $this->Transportation_mdl->edit($id);
			$data['innerdata'] = 'transportation_edit';
			$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
			$data['notidata'] = 'adminnoti_tour';
			$this->load->view('stafftemplate', $data);
		}

		public function update()
		{
			$this->Transportation_mdl->update();
			redirect(base_url() . 'index.php/Transportation');
		}

		public function delete()
		{
			$id = $this->uri->segment(3);
			$this->Transportation_mdl->delete($id);
			redirect(base_url() . 'index.php/Transportation');
		}		
	}
?>