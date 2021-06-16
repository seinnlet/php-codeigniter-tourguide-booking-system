<?php  

	class StaffHome extends CI_Controller
	{
		public function index()
		{
			// count
			$data['userlist'] = $this->User_mdl->userlist();
			$data['tourguidelist'] = $this->Tourguide_mdl->tourguidelist();
			$data['tourguidebookinglist'] = $this->Report_mdl->tourguidebookinglist();
			$data['tourbookinglist'] = $this->Report_mdl->tourbookinglist();

			// top 5
			$data['toptourlist'] = $this->Report_mdl->toptourlist();
			$data['toptourguidelist'] = $this->Report_mdl->toptourguidelist();

			$data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
			$data['notidata'] = 'adminnoti_tour';
			$data['innerdata'] = 'staff_home';
			$this->load->view('stafftemplate', $data);
		}
	}
?>