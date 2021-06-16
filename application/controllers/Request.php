<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {

	public function index()
	{
		$data['requestlist'] = $this->Request_mdl->tourguiderequestlist();
		$data['innerdata'] = 'tourguide_requestlist';
		$data['todayrequestlist'] = $this->Request_mdl->todayrequestlist();
		$data['todaybookinglist'] = $this->Booking_mdl->todaybookinglist();
		$data['todayratelist'] = $this->Review_mdl->todayratelist();
		$this->load->view('tourguidetemplate', $data);
	}

	public function add()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$data['innerdata'] = 'request';
		$this->load->view('template', $data);
	}

	public function calendar()
	{
		$id = $this->uri->segment(3);
		$urlyear = $this->uri->segment(4);
		$urlmonth = $this->uri->segment(5);

		$checkbookingdate = $this->Request_mdl->checkdate($id);

		$nowyear = date('Y');
		$nowmonth = date('m');
		$nowday = date('d');

		// end day 
			if ($urlmonth == 4 || $urlmonth == 6 || $urlmonth == 9 || $urlmonth == 11) 
				$endday = 31;
			elseif ($urlmonth == 2 && $urlyear % 4 == 0) 
				$endday = 30;
			elseif ($urlmonth == 2)
				$endday = 29;
			else 
				$endday = 32;

		$datedata = "";

		if ($nowyear > $urlyear || (($nowmonth > $urlmonth) && ($nowyear == $urlyear)) || (($urlyear == $nowyear+1) && ($urlmonth > $nowmonth)) || $nowyear+1 < $urlyear) {

			// condition for past date and one year for future

			$datedata = "";

		} elseif ($nowyear < $urlyear || (($nowmonth < $urlmonth) && ($nowyear == $urlyear))) {
			
			// for following date of same year
			for ($i=1; $i < $endday; $i++) { 
				if ($i>0 && $i<10) {
					$editedday = '0'.$i;
				} else {
					$editedday = $i;
				}
				if (in_array($urlyear.'-'.$urlmonth.'-'.$editedday, $checkbookingdate)) {
					continue;
				} else {

					switch ($i) {
						case 1: $datedata[$i] = base_url().'index.php/Request/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'01';
							break;
						case 2: $datedata[$i] = base_url().'index.php/Request/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'02';
							break;
						case 3: $datedata[$i] = base_url().'index.php/Request/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'03';
							break;
						case 4: $datedata[$i] = base_url().'index.php/Request/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'04';
							break;
						case 5: $datedata[$i] = base_url().'index.php/Request/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'05';
							break;
						case 6: $datedata[$i] = base_url().'index.php/Request/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'06';
							break;
						case 7: $datedata[$i] = base_url().'index.php/Request/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'07';
							break;
						case 8: $datedata[$i] = base_url().'index.php/Request/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'08';
							break;
						case 9: $datedata[$i] = base_url().'index.php/Request/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'09';
							break;
						default: $datedata[$i] = base_url().'index.php/Request/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.$i;
							break;
					}
				}
				
			}
		} else {

			// for date of same month and same year

			for ($i=$nowday+3; $i < $endday; $i++) { 
				if ($i>0 && $i<10) {
					$editedday = '0'.$i;
				} else {
					$editedday = $i;
				}

				if (in_array($urlyear.'-'.$urlmonth.'-'.$editedday, $checkbookingdate)) {
					continue;
				} else {
					switch ($i) {
						case 1: $datedata[$i] = base_url().'index.php/Request/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'01';
							break;
						case 2: $datedata[$i] = base_url().'index.php/Request/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'02';
							break;
						case 3: $datedata[$i] = base_url().'index.php/Request/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'03';
							break;
						case 4: $datedata[$i] = base_url().'index.php/Request/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'04';
							break;
						case 5: $datedata[$i] = base_url().'index.php/Request/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'05';
							break;
						case 6: $datedata[$i] = base_url().'index.php/Request/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'06';
							break;
						case 7: $datedata[$i] = base_url().'index.php/Request/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'07';
							break;
						case 8: $datedata[$i] = base_url().'index.php/Request/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'08';
							break;
						case 9: $datedata[$i] = base_url().'index.php/Request/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'09';
							break;
						default: $datedata[$i] = base_url().'index.php/Request/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.$i;
							break;
					}
				}

			}
		}

		$this->load->library('calendar');
		$this->calendar->day_type = 'short';
		$this->calendar->show_next_prev = TRUE;
		$this->calendar->next_prev_url = site_url('Request/calendar/'.$id);

		$data['calendar'] =  $this->calendar->generate($this->uri->segment(4), $this->uri->segment(5), $datedata);

		$data['innerdata'] = 'request_calendar';
		$this->load->view('template', $data);
	}

	public function store()
	{
		$id = $this->input->post('tourguideid');
		$fromdate = $this->input->post('fromdate');
		$todate = $this->input->post('todate');
		$datearray = $this->Tour_mdl->getDatesFromRange($fromdate, $todate); 

		$this->form_validation->set_rules('nooftotalpeople', 'TotalPeople', 'required', array('required' => 'Please Choose Estimated No of Total People!'));

		$checkbookingdate = $this->Request_mdl->checkdate($id);
		if (array_intersect($datearray, $checkbookingdate)) {
			echo "<script>alert('Sorry, tourguide will be not available in the following days. Please Choose the date or duration again.');</script>";
			$data['dateerror'] = 'Please change the date or duration.';
			$data['innerdata'] = 'request';
			$this->load->view('template', $data);
		} else if ($this->form_validation->run() == FALSE) {

			$data['innerdata'] = 'request';
			$this->load->view('template', $data);
		
		} else {
			
			$this->Request_mdl->store();
            echo "<script type='text/javascript'>alert('Your Contact Request Process is Successfully Completed!');</script>";
            redirect(base_url() . 'index.php/Booking/bookinglist', 'refresh');
		
		}
	}

	public function detail()
	{
		$id = $this->uri->segment(3);
		$data['detailrequest'] = $this->Request_mdl->detail($id);
		$data['innerdata'] = 'request_detail';
		$this->load->view('template', $data);
	}

	public function show()
	{
		$id = $this->uri->segment(3);
		$data['detailrequest'] = $this->Request_mdl->detail($id);
		$data['innerdata'] = 'request_show';

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

	public function cancel()
	{
		$id = $this->uri->segment(3);
		if ($this->input->post('btnsubmit')) {

			$this->Request_mdl->confirm($id);
			redirect(base_url() . 'index.php/Request/show/'.$id, 'refresh');

		} else {
			$this->Request_mdl->cancel($id);
			echo "<script type='text/javascript'>alert('Your Cancellation Request is Successfully Done.');</script>";

			if ($this->session->userdata('role') == 'user') {
				redirect(base_url() . 'index.php/Request/detail/'.$id, 'refresh');
			} else {
				redirect(base_url() . 'index.php/Request/show/'.$id, 'refresh');
			}
		}	
		
	}

	public function showall()
	{
		$data['requestlist'] = $this->Request_mdl->showall();
		$data['innerdata'] = 'request_showall';
		$data['regionlist'] = $this->Region_mdl->regionlist();
 		$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
		$data['notidata'] = 'adminnoti_tour';
		$this->load->view('stafftemplate', $data);
	}

}

/* End of file Request.php */
/* Location: ./application/controllers/Request.php */