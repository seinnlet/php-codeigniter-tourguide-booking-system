<?php  

	class About extends CI_Controller
	{
		public function index()
		{
			$data['innerdata'] = 'about';
			$this->load->view('template', $data);
		}

	}

?>