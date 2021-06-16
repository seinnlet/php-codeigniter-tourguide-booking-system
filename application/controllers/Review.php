<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {

	public function index()
	{
		$data['ratelist'] = $this->Review_mdl->ratelist($this->session->userdata('id'));
		$data['innerdata'] = 'review_list';
		$data['todayrequestlist'] = $this->Request_mdl->todayrequestlist();
		$data['todaybookinglist'] = $this->Booking_mdl->todaybookinglist();
		$data['todayratelist'] = $this->Review_mdl->todayratelist();
		$data['avgrate'] = $this->Review_mdl->getavgrate($this->session->userdata('id'));
		$this->load->view('tourguidetemplate', $data);
	}

	public function add()
	{
		$id = $this->uri->segment(3);
		$data['name'] = $this->Review_mdl->getName($id);
		$data['innerdata'] = 'review_add';
		$this->load->view('template', $data);
	}

	public function store()
	{
		$this->Review_mdl->store();
		echo "<script type='text/javascript'>alert('Thank You for Your Feedback.');</script>";
		redirect(base_url() . 'index.php/Booking/bookinglist', 'refresh');
	}

	public function show()
	{
		$id = $this->uri->segment(3);
		$data['showreview'] = $this->Review_mdl->show($id);
		$data['innerdata'] = 'review_show';
		$data['todayrequestlist'] = $this->Request_mdl->todayrequestlist();
		$data['todaybookinglist'] = $this->Booking_mdl->todaybookinglist();
		$data['todayratelist'] = $this->Review_mdl->todayratelist();
		$this->load->view('tourguidetemplate', $data);
	}

}

/* End of file Review.php */
/* Location: ./application/controllers/Review.php */