<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data['regionlist'] = $this->Region_mdl->regionlist();
      	$data['tourtypelist'] = $this->Tourtype_mdl->tourtypelist();
		$data['tourlist'] = $this->Tour_mdl->indextourlist();
		$data['bloglist'] = $this->Blog_mdl->indexbloglist();
		$data['tourguidelist'] = $this->Report_mdl->toptourguidelist();
		$data['faqlist'] = $this->Faq_mdl->faqlist();
		$data['innerdata'] = 'index';
		$this->load->view('template', $data);
	}
}
