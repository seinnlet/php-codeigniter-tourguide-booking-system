<?php  

	class Login extends CI_Controller
	{

		public function __construct() 
		{
			parent::__construct();
			$this->load->library('session');
			$this->load->model('Staff_mdl');
		}

		public function index()
		{
			$this->load->view('login');
		}

		public function login() 
		{
			
			$staffdata = $this->Staff_mdl->checklogin();
			$tourguidedata = $this->Tourguide_mdl->checklogin();
			$s_userdata = $this->User_mdl->checklogin();

			if ($staffdata) 
			{
				$userdata = array(
					'staffid' => $staffdata['staffid'],
					'staffname' => $staffdata['staffname'],
					'email' => $staffdata['email'],
					'profilepicture' => $staffdata['profilepicture'], 
					'role' => 'staff'
				);
				$this->session->set_userdata($userdata);
				if ($staffdata['password']==sha1('staff@localsone')) {
					redirect(base_url() . 'index.php/Staff/changepassword/'. $staffdata['staffid']);
				}
				else {
					redirect(base_url() . 'index.php/StaffHome');
				}
			}
			elseif ($tourguidedata) 
			{
				$userdata = array(
					'id' => $tourguidedata['tourguideid'],
					'name' => $tourguidedata['tourguidename'],
					'email' => $tourguidedata['email'],
					'profilepicture' => $tourguidedata['profilepicture'], 
					'role' => 'tourguide'
				);
				$this->session->set_userdata($userdata);

				if ($tourguidedata['password']==sha1('guide@localsone')) {
					redirect(base_url() . 'index.php/Tourguide/changepassword/'. $tourguidedata['tourguideid']);
				}
				else {
					redirect(base_url() . 'index.php/TourguideHome');
				}
			}
			elseif ($s_userdata) 
			{
				$userdata = array(
					'id' => $s_userdata['userid'],
					'name' => $s_userdata['username'],
					'email' => $s_userdata['email'],
					'profilepicture' => $s_userdata['profilepicture'], 
					'role' => 'user'
				);
				$this->session->set_userdata($userdata);

				redirect(base_url() . 'index.php/Tour/showall');
				
			}
			else 
			{
				echo "<script>alert('Invalid User! Please check your email and password.');</script>";
				$this->load->view('login');
			}
		}

		public function logout() 
		{
			$this->load->library('session');
			$this->session->sess_destroy();
			redirect(base_url().'index.php/Login');
		}
	}
?>