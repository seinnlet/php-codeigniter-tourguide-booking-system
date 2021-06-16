<?php  

	class Tourguide extends CI_Controller
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
			
			$data['tourguidelist'] = $this->Tourguide_mdl->tourguidelist();
			$data['innerdata'] = 'tourguide_list';
			$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
			$data['notidata'] = 'adminnoti_tour';
			$this->load->view('stafftemplate', $data);
		}

		public function store()
		{
			$this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[tourguide.email]|is_unique[staff.email]|is_unique[user.email]' , array('is_unique' => 'This email is already Existed!'));
			$this->form_validation->set_rules('region', 'Region', 'required', array('required' => 'Please Choose Region!'));
			$this->form_validation->set_rules('level', 'Level', 'required', array('required' => 'Please Choose Level!'));

			if ($this->form_validation->run() == FALSE)
            {
				$data['regionlist'] = $this->Region_mdl->regionlist();
				$data['innerdata'] = 'tourguide_add';
				$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
				$data['notidata'] = 'adminnoti_tour';
				$this->load->view('stafftemplate', $data);
            }
            else
            {
                $this->Tourguide_mdl->store();
				redirect(base_url() . 'index.php/Tourguide');
            }
		}

		public function addlanguage()
		{
			$id = $this->uri->segment(3);
	        $this->Tourguide_mdl->addlanguage();
			redirect(base_url() . 'index.php/Tourguide/profile/'.$id);
        
		}

		public function add()
		{
			$data['regionlist'] = $this->Region_mdl->regionlist();
			$data['innerdata'] = 'tourguide_add';
			$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
			$data['notidata'] = 'adminnoti_tour';
			$this->load->view('stafftemplate', $data);
		}

		public function delete()
		{
			$id = $this->uri->segment(3);
			$this->Tourguide_mdl->delete($id);
			redirect(base_url() . 'index.php/Tourguide');
		}

		public function detail()
		{
			$id = $this->uri->segment(3);
			$data['detaillanguagelist'] = $this->Tourguide_mdl->detaillanguagelist($id);
			$data['detailtourguide'] = $this->Tourguide_mdl->detail($id);
			$data['avgrate'] = $this->Review_mdl->getavgrate($id);
			$data['innerdata'] = 'tourguide_detail';
			$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
			$data['notidata'] = 'adminnoti_tour';
			$this->load->view('stafftemplate', $data);
		}
		public function profile()
		{
			$id = $this->uri->segment(3);
			$data['detaillanguagelist'] = $this->Tourguide_mdl->detaillanguagelist($id);
			$data['languagelist'] = $this->Tourguide_mdl->languagelist();
			$data['detailtourguide'] = $this->Tourguide_mdl->detail($id);	
			$data['avgrate'] = $this->Review_mdl->getavgrate($id);
			$data['innerdata'] = 'tourguide_detail';
			$data['todayrequestlist'] = $this->Request_mdl->todayrequestlist();
			$data['todaybookinglist'] = $this->Booking_mdl->todaybookinglist();
			$data['todayratelist'] = $this->Review_mdl->todayratelist();
			$this->load->view('tourguidetemplate', $data);
		}

		public function edit()
		{
			$id = $this->uri->segment(3);
			$data['regionlist'] = $this->Region_mdl->regionlist();
			$data['detaillanguagelist'] = $this->Tourguide_mdl->detaillanguagelist($id);
			$data['languagelist'] = $this->Tourguide_mdl->languagelist();
			$data['detailtourguide'] = $this->Tourguide_mdl->edit($id);	
			$data['innerdata'] = 'tourguide_edit';
			$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
			$data['notidata'] = 'adminnoti_tour';
			$data['todayrequestlist'] = $this->Request_mdl->todayrequestlist();
			$data['todaybookinglist'] = $this->Booking_mdl->todaybookinglist();
			$data['todayratelist'] = $this->Review_mdl->todayratelist();
			$this->load->view('tourguidetemplate', $data);
		}

		public function update()
		{
			$config = array(
		        'upload_path' => 'assets/backend/img/profile/',
		        'allowed_types' => "gif|jpg|png|jpeg",
		        'overwrite' => TRUE,
		        'file_name' => 't'.$this->session->userdata('id').'_'.$_FILES['profile']['name']
		    );

			// var_dump($config);

			$this->upload->initialize($config);
			$this->load->library('upload', $config);
			$this->upload->do_upload('profile');

			$this->Tourguide_mdl->update();
			
			redirect(base_url() . 'index.php/Tourguide/profile/'. $this->session->userdata('id'));
		}

		public function deletelanguage()
		{
			$tid = $this->uri->segment(3);
			$lid = $this->uri->segment(4);
			$this->Tourguide_mdl->deletelanguage($tid, $lid);

			redirect(base_url() . 'index.php/Tourguide/edit/'. $this->session->userdata('id'));
		}

		public function changepassword()
		{
			$this->load->view('changepassword');
		}

		public function updatepassword()
		{
			$confirm = $this->Tourguide_mdl->checkcurrentpassword();
			if ($confirm) {
				$this->Tourguide_mdl->updatepassword();
				echo "<script type='text/javascript'>alert('Password is Successfully Changed.');</script>";
				redirect(base_url() . 'index.php/TourguideHome', 'refresh');
			}
			else {
				echo "<script>alert('Sorry, your current password does not match.');</script>";
				$this->load->view('changepassword');
			}
		}

		public function showall() 
		{
			$data['regionlist'] = $this->Region_mdl->regionlist();
			$data['tourguidelist'] = $this->Tourguide_mdl->tourguidelist();
			$data['languagelist'] = $this->Tourguide_mdl->pivotlanguagelist();
			$data['innerdata'] = 'tourguide_showall';
			$this->load->view('template', $data);
		}

		public function search()
		{
			if($this->input->post('keyword')==NULL && $this->input->post('region')==NULL)
			{
				redirect(base_url().'index.php/Tourguide/showall');
			}
			else 
			{
				$data['regionlist'] = $this->Region_mdl->regionlist();
				$data['searchtourguidelist'] = $this->Tourguide_mdl->search();
				$data['languagelist'] = $this->Tourguide_mdl->pivotlanguagelist();
				$data['innerdata'] = 'tourguide_showall';
				$this->load->view('template', $data);
			}
		}

		public function show()
		{
			$id = $this->uri->segment(3);
			$data['showtourguide'] = $this->Tourguide_mdl->detail($id);
			$data['detaillanguagelist'] = $this->Tourguide_mdl->detaillanguagelist($id);
			$data['tourlist'] = $this->Tour_mdl->individualtour($id);
			$data['avgrate'] = $this->Review_mdl->getavgrate($id);
			$data['ratelist'] = $this->Review_mdl->ratelist($id);
			$data['innerdata'] = 'tourguide_show';

			// calendar
			$checkbookingdate = $this->Request_mdl->checkdate($id);

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
			$this->calendar->show_next_prev = TRUE;
			$this->calendar->next_prev_url = site_url('Tourguide/show/'.$id);

			$data['calendar'] =  $this->calendar->generate($this->uri->segment(4), $this->uri->segment(5), $datedata);

			$this->load->view('template', $data);
		}
	}
?>