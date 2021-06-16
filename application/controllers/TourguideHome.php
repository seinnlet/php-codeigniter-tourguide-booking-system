<?php  

	class TourguideHome extends CI_Controller
	{
		public function index()
		{
			// count 
			$data['tourlist'] = $this->Tour_mdl->tourlist();
			$data['ratelist'] = $this->Review_mdl->ratelist($this->session->userdata('id'));
			$data['bookinglist'] = $this->Report_mdl->individualbookinglist();
			$data['requestlist'] = $this->Report_mdl->individualrequestlist();

			// for table
			$data['toptourlist'] = $this->Report_mdl->topindividualtourlist();
			$data['topbloglist'] = $this->Report_mdl->topbloglist();

			$data['todayrequestlist'] = $this->Request_mdl->todayrequestlist();
			$data['todaybookinglist'] = $this->Booking_mdl->todaybookinglist();
			$data['todayratelist'] = $this->Review_mdl->todayratelist();
			$data['innerdata'] = 'tourguide_home';
			$this->load->view('tourguidetemplate', $data);
		}
	}
?>