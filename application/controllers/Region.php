<?php  

	class Region extends CI_Controller
	{
		public function index()
		{
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			
			$data['regionlist'] = $this->Region_mdl->regionlist();
			$data['innerdata'] = 'region_list';
			$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
			$data['notidata'] = 'adminnoti_tour';
			$this->load->view('stafftemplate', $data);
		}

		public function store()
		{
			$this->form_validation->set_rules('regionname', 'RegionName', 'required|is_unique[region.regionname]', array('is_unique' => 'This Region Name is already Existed!'));
			$this->form_validation->set_rules('country', 'Country', 'required', array('required' => 'Please Choose Country Name!'));

			 if ($this->form_validation->run() == FALSE)
            {
				$data['countrylist'] = $this->Region_mdl->countrylist();
				$data['innerdata'] = 'region_add';
				$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
				$data['notidata'] = 'adminnoti_tour';
				$this->load->view('stafftemplate', $data);
            }
            else
            {
                $this->Region_mdl->store();
				redirect(base_url() . 'index.php/Region');
            }
			
		}

		public function add()
		{
			$data['countrylist'] = $this->Region_mdl->countrylist();
			$data['innerdata'] = 'region_add';
			$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
			$data['notidata'] = 'adminnoti_tour';
			$this->load->view('stafftemplate', $data);
		}

		public function edit()
		{
			$id = $this->uri->segment(3);
			$data['editregion'] = $this->Region_mdl->edit($id);
			$data['countrylist'] = $this->Region_mdl->countrylist();
			$data['innerdata'] = 'region_edit';
			$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
			$data['notidata'] = 'adminnoti_tour';
			$this->load->view('stafftemplate', $data);
		}

		public function update()
		{
			$this->Region_mdl->update();
			redirect(base_url() . 'index.php/Region');
		}

		public function delete()
		{
			$id = $this->uri->segment(3);
			$this->Region_mdl->delete($id);
			redirect(base_url() . 'index.php/Region');
		}		
	}
?>