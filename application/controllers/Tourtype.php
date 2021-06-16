<?php  

  class Tourtype extends CI_Controller
  {
    public function index()
    {
      $this->load->helper(array('form', 'url'));
      $this->load->library('form_validation');
      
      $data['tourtypelist'] = $this->Tourtype_mdl->tourtypelist();
      $data['innerdata'] = 'tourtype_list';
      $data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
      $data['notidata'] = 'adminnoti_tour';
      $this->load->view('stafftemplate', $data);
    }

    public function store()
    {
      $this->form_validation->set_rules('name', 'TourtypeName', 'required|is_unique[tourtype.name]', array('is_unique' => 'This Tour Type Name is already Existed!'));

      if ($this->form_validation->run() == FALSE)
      {
        $data['innerdata'] = 'tourtype_add';
        $data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
        $data['notidata'] = 'adminnoti_tour';
        $this->load->view('stafftemplate', $data);
      }
      else
      {
        $this->Tourtype_mdl->store();
        redirect(base_url() . 'index.php/Tourtype');
      }
      
    }

    public function add()
    {
      $data['innerdata'] = 'tourtype_add';
      $data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
      $data['notidata'] = 'adminnoti_tour';
      $this->load->view('stafftemplate', $data);
    }

    public function edit()
    {
      $id = $this->uri->segment(3);
      $data['edittourtype'] = $this->Tourtype_mdl->edit($id);
      $data['innerdata'] = 'tourtype_edit';
      $data['todaytourlist'] = $this->Tour_mdl->todaytourlist();
      $data['notidata'] = 'adminnoti_tour';
      $this->load->view('stafftemplate', $data);
    }

    public function update()
    {
      $this->Tourtype_mdl->update();
      redirect(base_url() . 'index.php/Tourtype');
    }

    public function delete()
    {
      $id = $this->uri->segment(3);
      $this->Tourtype_mdl->delete($id);
      redirect(base_url() . 'index.php/Tourtype');
    }   
  }
?>