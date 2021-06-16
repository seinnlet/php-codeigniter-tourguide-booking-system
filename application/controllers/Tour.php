<?php  

	class Tour extends CI_Controller
	{
		function __construct ()
		{
			parent:: __construct();
			$this->load->helper('form');
			$this->load->helper('url');
			$this->load->helper('file');
			$this->load->helper('date');
			$this->load->library('calendar');
		}

		public function index()
		{
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			
			$data['tourlist'] = $this->Tour_mdl->tourlist();
			$data['innerdata'] = 'tour_list';
			$data['todayrequestlist'] = $this->Request_mdl->todayrequestlist();
			$data['todaybookinglist'] = $this->Booking_mdl->todaybookinglist();
			$data['todayratelist'] = $this->Review_mdl->todayratelist();
			$this->load->view('tourguidetemplate', $data);
		}

		public function alltourlist()
		{
			$data['tourlist'] = $this->Tour_mdl->alltourlist();
			$data['innerdata'] = 'tour_adminlist';
			$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
			$data['notidata'] = 'adminnoti_tour';
			$this->load->view('stafftemplate', $data);
		}

		public function showall() 
		{
			$data['tourtypelist'] = $this->Tourtype_mdl->tourtypelist();
			$data['regionlist'] = $this->Region_mdl->regionlist();
			$data['tourlist'] = $this->Tour_mdl->showall();
			$data['innerdata'] = 'tour_showall';
			$this->load->view('template', $data);
		}

		public function store()
		{
			$this->form_validation->set_rules('tourname', 'TourName', 'required|is_unique[tour.name]', array('is_unique' => 'This Tour Name is already Existed!'));
			$this->form_validation->set_rules('region', 'Region', 'required', array('required' => 'Please Choose Region Name!'));
			$this->form_validation->set_rules('tourtype', 'Tourtype', 'required', array('required' => 'Please Choose Type Type Name!'));

			if ($this->form_validation->run() == FALSE)
            {
				$data['regionlist'] = $this->Tour_mdl->regionlist();
				$data['tourtypelist'] = $this->Tour_mdl->tourtypelist();
				$data['transportationlist'] = $this->Tour_mdl->transportationlist();
				$data['innerdata'] = 'tour_add';
				$data['todayrequestlist'] = $this->Request_mdl->todayrequestlist();
				$data['todaybookinglist'] = $this->Booking_mdl->todaybookinglist();
				$data['todayratelist'] = $this->Review_mdl->todayratelist();
				$this->load->view('tourguidetemplate', $data);
            }
            else
            {
            	if (isset($_FILES['image'])) {
					$config = array(
				        'upload_path' => 'assets/backend/img/tour/',
				        'allowed_types' => "gif|jpg|png|jpeg",
				        'overwrite' => TRUE,
				        'file_name' => $_FILES['image']['name']
				    );
				    $this->upload->initialize($config);
					$this->load->library('upload', $config);
					$this->upload->do_upload('image');
				}
                $this->Tour_mdl->store();
				redirect(base_url() . 'index.php/Tour');
            }
			
		}

		public function add()
		{
			$data['regionlist'] = $this->Tour_mdl->regionlist();
			$data['tourtypelist'] = $this->Tour_mdl->tourtypelist();
			$data['transportationlist'] = $this->Tour_mdl->transportationlist();
			$data['innerdata'] = 'tour_add';
			$data['todayrequestlist'] = $this->Request_mdl->todayrequestlist();
			$data['todaybookinglist'] = $this->Booking_mdl->todaybookinglist();
			$data['todayratelist'] = $this->Review_mdl->todayratelist();
			$this->load->view('tourguidetemplate', $data);
		}

		public function edit()
		{
			$id = $this->uri->segment(3);
			$data['edittour'] = $this->Tour_mdl->edit($id);
			$data['regionlist'] = $this->Tour_mdl->regionlist();
			$data['tourtypelist'] = $this->Tour_mdl->tourtypelist();
			$data['transportationlist'] = $this->Tour_mdl->transportationlist();
			$data['innerdata'] = 'tour_edit';
			$data['todayrequestlist'] = $this->Request_mdl->todayrequestlist();
			$data['todaybookinglist'] = $this->Booking_mdl->todaybookinglist();
			$data['todayratelist'] = $this->Review_mdl->todayratelist();
			$this->load->view('tourguidetemplate', $data);
		}

		public function update()
		{
			$config = array(
		        'upload_path' => 'assets/backend/img/tour/',
		        'allowed_types' => "gif|jpg|png|jpeg",
		        'overwrite' => TRUE,
		        'file_name' => $_FILES['image']['name']
		    );
		    $this->upload->initialize($config);
			$this->load->library('upload', $config);
			$this->upload->do_upload('image');

			$this->Tour_mdl->update();
			redirect(base_url() . 'index.php/Tour');
		}

		public function delete()
		{
			$id = $this->uri->segment(3);
			$this->Tour_mdl->delete($id);
			redirect(base_url() . 'index.php/Tour');
		}

		public function approve()
		{
			$id = $this->uri->segment(3);
			$staffid = $this->uri->segment(4);
			$this->Tour_mdl->approve($id, $staffid);
			redirect(base_url() . 'index.php/Tour/alltourlist');
		}

		public function detail()
		{
			$id = $this->uri->segment(3);
			$status = $this->uri->segment(4);
			$tid = $this->uri->segment(5);
			$data['detailtour'] = $this->Tour_mdl->detail($id, $status, $tid);
			$data['innerdata'] = 'tour_detail';
			if ($this->session->userdata('role') == 'tourguide') {
				$data['todayrequestlist'] = $this->Request_mdl->todayrequestlist();
				$data['todaybookinglist'] = $this->Booking_mdl->todaybookinglist();
				$data['todayratelist'] = $this->Review_mdl->todayratelist();
				$this->load->view('tourguidetemplate', $data);
			} else {
				$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
				$data['notidata'] = 'adminnoti_tour';
				$this->load->view('stafftemplate', $data);
			}
			
		}

		public function show()
		{
			$id = $this->uri->segment(3);
			$data['showtour'] = $this->Tour_mdl->show($id);
			$data['innerdata'] = 'tour_show';

			$checkbookingdate = $this->Tour_mdl->checkbookingdate($id);

			$urlyear = $this->uri->segment(4);
			$urlmonth = $this->uri->segment(5);

			$nowyear = date('Y');
			$nowmonth = date('m');
			$nowday = date('d');

			$datedata = "";

			// end day 
				if ($urlmonth == 4 || $urlmonth == 6 || $urlmonth == 9 || $urlmonth == 11) 
					$endday = 31;
				elseif ($urlmonth == 2 && $urlyear % 4 == 0) 
					$endday = 30;
				elseif ($urlmonth == 2)
					$endday = 29;
				else 
					$endday = 32;
			// end day section

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
			$this->calendar->show_next_prev = TRUE;
			$this->calendar->next_prev_url = site_url('Tour/show/'.$id);

			$data['calendar'] =  $this->calendar->generate($this->uri->segment(4), $this->uri->segment(5), $datedata);

			$this->load->view('template', $data);
		}

		public function search()
		{
			if(!(isset($_POST['keyword'])) && $this->input->post('tourtype')==NULL && $this->input->post('region')==NULL)
			{
				redirect(base_url().'index.php/Tour/showall');
			}
			elseif($this->input->post('keyword')==NULL && $this->input->post('tourtype')==NULL && $this->input->post('region')==NULL)
			{
				redirect(base_url());
			}
			else 
			{
				$data['tourtypelist'] = $this->Tourtype_mdl->tourtypelist();
				$data['regionlist'] = $this->Region_mdl->regionlist();
				$data['searchtourlist'] = $this->Tour_mdl->search();
				$data['innerdata'] = 'tour_showall';
				$this->load->view('template', $data);
			}
		}
	}
?>