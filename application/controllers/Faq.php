<?php  

	class Faq extends CI_Controller
	{
		public function index()
		{
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			
			$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
			$data['notidata'] = 'adminnoti_tour';
			$data['faqlist'] = $this->Faq_mdl->faqlist();
			$data['innerdata'] = 'faq_list';
			$this->load->view('stafftemplate', $data);
		}

		public function store()
		{
			$this->form_validation->set_rules('question', 'Question', 'required', array('required' => 'Please Enter the Question!'));
			$this->form_validation->set_rules('answer', 'Answer', 'required', array('required' => 'Please Enter the Answer!'));

			 if ($this->form_validation->run() == FALSE)
            {
				$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
				$data['notidata'] = 'adminnoti_tour';
				$data['innerdata'] = 'faq_add';
				$this->load->view('stafftemplate', $data);
            }
            else
            {
                $this->Faq_mdl->store();
				redirect(base_url() . 'index.php/Faq');
            }			
		}

		public function add()
		{			
			$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
			$data['notidata'] = 'adminnoti_tour';
			$data['innerdata'] = 'faq_add';
			$this->load->view('stafftemplate', $data);
		}

		public function edit()
		{
			$id = $this->uri->segment(3);
			$data['editfaq'] = $this->Faq_mdl->edit($id);
			$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
			$data['notidata'] = 'adminnoti_tour';
			$data['innerdata'] = 'faq_edit';
			$this->load->view('stafftemplate', $data);
		}

		public function update()
		{
			$this->Faq_mdl->update();
			redirect(base_url() . 'index.php/Faq');
		}

		public function delete()
		{
			$id = $this->uri->segment(3);
			$this->Faq_mdl->delete($id);
			redirect(base_url() . 'index.php/Faq');
		}		
	}
?>