<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function index()
	{
		
	}

	public function booking()
	{
		$data['bookinglist'] = $this->Report_mdl->booking();
		$data['report']['name'] = $this->input->post('name');
		$data['report']['fromdate'] = $this->input->post('fromdate');
		$data['report']['todate'] = $this->input->post('todate');
		$data['report']['sort'] = $this->input->post('sort');

		if ($this->input->post('tourtype') != 'null') {
			$data['report']['tourtype'] = $this->input->post('tourtype');
		}

		if ($this->input->post('region') != 'null') {
			$data['report']['region'] = $this->input->post('region');
		}

		if ($this->input->post('status') != 'null') {
			$data['report']['status'] = $this->input->post('status');
		}

		$this->load->view('booking_report', $data);
	}

	public function request()
	{
		$data['requestlist'] = $this->Report_mdl->request();
		$data['report']['name'] = $this->input->post('name');
		$data['report']['fromdate'] = $this->input->post('fromdate');
		$data['report']['todate'] = $this->input->post('todate');

		if ($this->input->post('region') != 'null') {
			$data['report']['region'] = $this->input->post('region');
		}

		if ($this->input->post('status') != 'null') {
			$data['report']['status'] = $this->input->post('status');
		}

		$this->load->view('request_report', $data);
	}

	public function termsandconditions()
	{
		$data['innerdata'] = 'terms_and_conditions';
		$this->load->view('template', $data);
	}

	public function manual()
	{
		$data['innerdata'] = 'manual';
		if ($this->session->userdata('role') == 'staff') {
			$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
			$data['notidata'] = 'adminnoti_tour';
			$this->load->view('stafftemplate', $data);
		} else {
			$data['todayrequestlist'] = $this->Request_mdl->todayrequestlist();
			$data['todaybookinglist'] = $this->Booking_mdl->todaybookinglist();
			$data['todayratelist'] = $this->Review_mdl->todayratelist();
			$this->load->view('tourguidetemplate', $data);
		}	
	}

	public function help()
	{
		$data['innerdata'] = 'help';
		$this->load->view('template', $data);
	}

}

/* End of file Report.php */
/* Location: ./application/controllers/Report.php */