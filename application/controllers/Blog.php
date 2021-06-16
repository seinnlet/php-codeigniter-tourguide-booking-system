<?php  

	class Blog extends CI_Controller
	{
		public function index()
		{
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			
			$data['bloglist'] = $this->Blog_mdl->bloglist();
			$data['innerdata'] = 'blog_list';
			$data['todayrequestlist'] = $this->Request_mdl->todayrequestlist();
			$data['todaybookinglist'] = $this->Booking_mdl->todaybookinglist();
			$data['todayratelist'] = $this->Review_mdl->todayratelist();
			$this->load->view('tourguidetemplate', $data);
		}

		public function store()
		{
			$date = date('Ymdhis');
			if (isset($_FILES['image'])) {
				$config = array(
			        'upload_path' => 'assets/backend/img/blog/',
			        'allowed_types' => "gif|jpg|png|jpeg",
			        'overwrite' => TRUE,
			        'file_name' => $date.'_'.$_FILES['image']['name']
			    );
			    $this->upload->initialize($config);
				$this->load->library('upload', $config);
				$this->upload->do_upload('image');
			}
            $this->Blog_mdl->store($date);
			redirect(base_url() . 'index.php/Blog');
		}

		public function add()
		{			
			$data['innerdata'] = 'blog_add';
			$data['todayrequestlist'] = $this->Request_mdl->todayrequestlist();
			$data['todaybookinglist'] = $this->Booking_mdl->todaybookinglist();
			$data['todayratelist'] = $this->Review_mdl->todayratelist();
			$this->load->view('tourguidetemplate', $data);
		}

		public function edit()
		{
			$id = $this->uri->segment(3);
			$data['editblog'] = $this->Blog_mdl->edit($id);
			$data['innerdata'] = 'blog_edit';
			$data['todayrequestlist'] = $this->Request_mdl->todayrequestlist();
			$data['todaybookinglist'] = $this->Booking_mdl->todaybookinglist();
			$data['todayratelist'] = $this->Review_mdl->todayratelist();
			$this->load->view('tourguidetemplate', $data);
		}

		public function update()
		{
			$date = date('Ymdhis');
			if (isset($_FILES['image'])) {
				$config = array(
			        'upload_path' => 'assets/backend/img/blog/',
			        'allowed_types' => "gif|jpg|png|jpeg",
			        'overwrite' => TRUE,
			        'file_name' => $date.'_'.$_FILES['image']['name']
			    );
			    $this->upload->initialize($config);
				$this->load->library('upload', $config);
				$this->upload->do_upload('image');
			}
			$this->Blog_mdl->update($date);
			redirect(base_url() . 'index.php/Blog');
		}

		public function delete()
		{
			$id = $this->uri->segment(3);
			$this->Blog_mdl->delete($id);
			redirect(base_url() . 'index.php/Blog');
		}

		public function showall()
		{
			$data['bloglist'] = $this->Blog_mdl->showall();
			$data['innerdata'] = 'blog_showall';
			$this->load->view('template', $data);
		}	

		public function search()
		{
			if ($this->input->post('keyword')==NULL && $this->input->post('month')==NULL) {
				redirect(base_url().'index.php/Blog/showall');
			} else {
				$data['searchbloglist'] = $this->Blog_mdl->search();
				$data['innerdata'] = 'blog_showall';
				$this->load->view('template', $data);
			}
		}

		public function show()
		{
			$id = $this->uri->segment(3);
			$data['recentbloglist'] = $this->Blog_mdl->indexbloglist();
			$data['showblog'] = $this->Blog_mdl->show($id);
			$data['countlike'] = $this->Blog_mdl->countlike($id);
			$data['checklike'] = $this->Blog_mdl->checklike($id, $this->session->userdata('id'));
			$data['innerdata'] = 'blog_show';
			$this->load->view('template', $data);
		}

		public function like()
		{
			$id = $this->uri->segment(3);
			$this->Blog_mdl->like($id, $this->session->userdata('id'));

			redirect(base_url() . 'index.php/Blog/show/' . $id, 'refresh');
		}

		public function unlike()
		{
			$id = $this->uri->segment(3);
			$this->Blog_mdl->unlike($id, $this->session->userdata('id'));

			redirect(base_url() . 'index.php/Blog/show/' . $id, 'refresh');
		}

		public function likelist()
		{
			$id = $this->uri->segment(3);
			$data['likelist'] = $this->Blog_mdl->likelist($id);
			$data['innerdata'] = 'blog_liked';
			$this->load->view('template', $data);
		}
	}
?>