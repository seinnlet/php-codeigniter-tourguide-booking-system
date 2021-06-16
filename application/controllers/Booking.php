<?php  

	class Booking extends CI_Controller
	{
		public function index()
		{			
			$data['bookinglist'] = $this->Booking_mdl->tourguidebookinglist();
			$data['innerdata'] = 'tourguide_bookinglist';
			$data['todayrequestlist'] = $this->Request_mdl->todayrequestlist();
			$data['todaybookinglist'] = $this->Booking_mdl->todaybookinglist();
			$data['todayratelist'] = $this->Review_mdl->todayratelist();
			$this->load->view('tourguidetemplate', $data);
		}

		public function add()
		{
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');

			// select 
			$id = $this->uri->segment(3);
			$data['showtour'] = $this->Tour_mdl->show($id);

			// checkdate
			$duration = $data['showtour'][0]->duration;

			$bookdate = $this->uri->segment(4).'-'.$this->uri->segment(5).'-'.$this->uri->segment(6);
			$todate = date('Y-m-d', strtotime($bookdate))." + ".($duration-1)." day";
			$todate = date('Y-m-d', strtotime($todate));
			$datearray = $this->Tour_mdl->getDatesFromRange($bookdate, $todate); 

			$checkbookingdate = $this->Tour_mdl->checkbookingdate($id);

			if (array_intersect($datearray, $checkbookingdate)) {
				echo "<script>alert('Sorry, tourguide is not available in the following day. Please Choose the date again.');</script>";
				redirect(base_url().'index.php/Booking/calendar/'.$id.'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');
			} else {
				$data['innerdata'] = 'booking';
				$this->load->view('template', $data);
			}

			

		}


		// calendar 
		public function calendar() 
		{
			$id = $this->uri->segment(3);
			$urlyear = $this->uri->segment(4);
			$urlmonth = $this->uri->segment(5);

			$checkbookingdate = $this->Tour_mdl->checkbookingdate($id);

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
							case 1: $datedata[$i] = base_url().'index.php/Booking/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'01';
								break;
							case 2: $datedata[$i] = base_url().'index.php/Booking/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'02';
								break;
							case 3: $datedata[$i] = base_url().'index.php/Booking/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'03';
								break;
							case 4: $datedata[$i] = base_url().'index.php/Booking/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'04';
								break;
							case 5: $datedata[$i] = base_url().'index.php/Booking/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'05';
								break;
							case 6: $datedata[$i] = base_url().'index.php/Booking/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'06';
								break;
							case 7: $datedata[$i] = base_url().'index.php/Booking/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'07';
								break;
							case 8: $datedata[$i] = base_url().'index.php/Booking/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'08';
								break;
							case 9: $datedata[$i] = base_url().'index.php/Booking/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'09';
								break;
							default: $datedata[$i] = base_url().'index.php/Booking/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.$i;
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
							case 1: $datedata[$i] = base_url().'index.php/Booking/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'01';
								break;
							case 2: $datedata[$i] = base_url().'index.php/Booking/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'02';
								break;
							case 3: $datedata[$i] = base_url().'index.php/Booking/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'03';
								break;
							case 4: $datedata[$i] = base_url().'index.php/Booking/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'04';
								break;
							case 5: $datedata[$i] = base_url().'index.php/Booking/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'05';
								break;
							case 6: $datedata[$i] = base_url().'index.php/Booking/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'06';
								break;
							case 7: $datedata[$i] = base_url().'index.php/Booking/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'07';
								break;
							case 8: $datedata[$i] = base_url().'index.php/Booking/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'08';
								break;
							case 9: $datedata[$i] = base_url().'index.php/Booking/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.'09';
								break;
							default: $datedata[$i] = base_url().'index.php/Booking/add/'.$id.'/'.$urlyear.'/'.$urlmonth.'/'.$i;
								break;
						}
					}

				}
			}

			$this->load->library('calendar');
			$this->calendar->day_type = 'short';
			$this->calendar->show_next_prev = TRUE;
			$this->calendar->next_prev_url = site_url('Booking/calendar/'.$id);

			$data['calendar'] =  $this->calendar->generate($this->uri->segment(4), $this->uri->segment(5), $datedata);

			$data['innerdata'] = 'calendar';
			$this->load->view('template', $data);
		}

		// store 
		public function store()
		{
			$this->form_validation->set_rules('starttime', 'StartTime', 'required', array('required' => 'Please Choose Start Time!'));
			$this->form_validation->set_rules('nooftotalpeople', 'TotalPeople', 'required', array('required' => 'Please Choose Total People!'));
			$this->form_validation->set_rules('month', 'Month', 'required', array('required' => 'Please Choose Expiry Month!'));
			$this->form_validation->set_rules('year', 'Year', 'required', array('required' => 'Please Choose Expiry Year!'));

			$id = $this->input->post('tourid');

			if ($this->form_validation->run() == FALSE)
            {
				$data['showtour'] = $this->Tour_mdl->show($id);

				$data['innerdata'] = 'booking';
				$this->load->view('template', $data);
            }
            else
            {
                $bookingid = $this->Booking_mdl->store();
                echo "<script type='text/javascript'>alert('Booking Process is Successfully Completed!');</script>";
                redirect(base_url() . 'index.php/Booking/detail/'.$bookingid, 'refresh');
            }
		}

		public function detail()
		{
			$id = $this->uri->segment(3);
			$data['detailbooking'] = $this->Booking_mdl->detail($id);
			$data['innerdata'] = 'booking_detail';
			$this->load->view('template', $data);
		}

		public function show()
		{
			$id = $this->uri->segment(3);
			$data['detailbooking'] = $this->Booking_mdl->detail($id);
			$data['innerdata'] = 'booking_show';
				
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

		public function bookinglist()
		{
			$data['requestlist'] = $this->Request_mdl->requestlist($this->session->userdata('id'));
			$data['bookinglist'] = $this->Booking_mdl->bookinglist($this->session->userdata('id'));
			$data['innerdata'] = 'booking_list';
			$this->load->view('template', $data);
		}

		public function cancel()
		{
			$id = $this->uri->segment(3);
			$this->Booking_mdl->cancel($id);
			echo "<script type='text/javascript'>alert('Your Cancellation Request is Successfully Done.');</script>";
			redirect(base_url() . 'index.php/Booking/detail/'.$id, 'refresh');
		}

		public function showall()
		{
			$data['bookinglist'] = $this->Booking_mdl->showall();
			$data['innerdata'] = 'booking_showall';
			$data['tourtypelist'] = $this->Tourtype_mdl->tourtypelist();
			$data['regionlist'] = $this->Region_mdl->regionlist();
     		$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
			$data['notidata'] = 'adminnoti_tour';
			$this->load->view('stafftemplate', $data);
		}
	}
?>