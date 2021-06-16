<?php  

	class Contact extends CI_Controller
	{
		public function index()
		{
			$data['innerdata'] = 'contact';
			$this->load->view('template', $data);
		}

	}

?>