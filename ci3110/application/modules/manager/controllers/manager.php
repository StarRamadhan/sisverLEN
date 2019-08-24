<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class manager extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More

    if (($this->session->userdata('masuk')==true) && (($this->session->userdata('akses')=='manager'))) {
      $this->load->model(array('Manager_model'));
      $this->load->library('form_validation');
    }else{
      redirect(base_url('login'));
    }
  }

  public function index()
  {

    $datauser=$this->Manager_model->get_all();//panggil ke modell
    $dataverif=$this->Manager_model->get_data_manager();//panggil ke modell
    $data = array(

       'content'=>'manager/dokumen/content_all',
       'navbar'=>'manager/navbar',
       'sidebar'=>'manager/sidebar',
       'datauser'=>$datauser,
       'dataverif'=>$dataverif,
       'module'=>'manager',
       'titlePage'=>'manager',
       'controller'=>'manager'
      );
    $this->template->load($data);
  }

  public function dokumen_acc()
  {
    $datauser=$this->Manager_model->get_all_acc();//panggil ke modell
    $dataverif=$this->Manager_model->get_data_manager();//panggil ke modell
    $data = array(
       'content'=>'manager/dokumen/content_acc',
       'navbar'=>'manager/navbar',
       'sidebar'=>'manager/sidebar',
       'datauser'=>$datauser,
       'dataverif'=>$dataverif,
       'module'=>'manager',
       'titlePage'=>'manager',
       'controller'=>'manager'
      );
    $this->template->load($data);
  }

  public function dokumen_not_acc()
  {
    $datauser=$this->Manager_model->get_all_not_acc();//panggil ke modell
    $dataverif=$this->Manager_model->get_data_manager();//panggil ke modell
    $data = array(
       'content'=>'manager/dokumen/content_not_acc',
       'navbar'=>'manager/navbar',
       'sidebar'=>'manager/sidebar',
       'datauser'=>$datauser,
       'dataverif'=>$dataverif,
       'module'=>'manager',
       'titlePage'=>'manager',
       'controller'=>'manager'
      );
    $this->template->load($data);
  }

  public function create(){
    $lastdate=$this->Manager_model->get_last_date();
    $lastnumber=$this->Manager_model->get_last_num();

     $data = array(
       //'testing'=>$testing,
       //'numrows'=>$numrows,
       //'js'=> 'verifikasi/js',
       'content' => 'manager/create_data',
       'sidebar'=>'manager/sidebar',//Ini buat menu yang ditampilkan di module verifikasi {DIKIRIM KE TEMPLATE}
       'navbar'=>'manager/navbar',
       'action'=>'manager/create_action',
       'module'=>'manager',
       'controller'=>'manager',
       'titlePage'=>'manager',
      );
    $this->template->load($data);
  }


  public function edit_profil($operator_id){
    $dataedit=$this->Manager_model->get_by_id_profil($operator_id);
     $data = array(
       'content'=>'manager/edit_profil',
       'sidebar'=>'manager/sidebar',
       'navbar'=>'manager/navbar',
       //'role'=>$this->Verifikasi_model->gender_enums('user' , 'position' ),
       'action'=>'manager/manager/update_action',
       'dataedit'=>$dataedit,
       'module'=>'manager',
       'titlePage'=>'manager',
       'controller'=>'manager'
      );
    $this->template->load($data);
  }

  public function update_action()
  {
          $data = array(
            'username' => $this->input->post('username',TRUE),
            'password_enc' => md5($this->input->post('password',TRUE)),
            'password' => $this->input->post('password',TRUE),
            'position' => $this->input->post('position',TRUE),
            'phone_number' => $this->input->post('phone_number',TRUE),
          );
          $this->Manager_model->update($this->input->post('operator_id', TRUE), $data);
          $this->session->set_flashdata('flashMessage', 'Update Record Success');
          //echo "berhasil";
          redirect(base_url('manager'));

  }

  // public function _rules()
  // {
  //     $this->form_validation->set_rules('username', 'username', 'trim|required');
  //     //$this->form_validation->set_rules('password_enc', 'password_enc', 'trim|required');
  //     $this->form_validation->set_rules('password', 'password', 'trim|required');
  //     $this->form_validation->set_rules('position', 'position', 'trim|required');
  //     $this->form_validation->set_rules('phone_number', 'phone_number', 'trim|required');
  //
  //
  //     $this->form_validation->set_rules('no_verifikasi', 'no_verifikasi', 'trim');
  //     $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  // }
}
