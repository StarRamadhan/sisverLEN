<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jurnal extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More

    if (($this->session->userdata('masuk')==true) && (($this->session->userdata('akses')=='jurnal'))) {
      $this->load->model(array('Jurnal_model'));
      $this->load->library('form_validation');
    }else{
      redirect(base_url('login'));
    }
  }

  public function index()
  {

    $datauser=$this->Jurnal_model->get_all();//panggil ke modell
    $dataverif=$this->Jurnal_model->get_data_jurnal();//panggil ke modell
    $data = array(

       'content'=>'jurnal/dokumen/content_all',
       'navbar'=>'jurnal/navbar',
       'sidebar'=>'jurnal/sidebar',
       'datauser'=>$datauser,
       'dataverif'=>$dataverif,
       'module'=>'jurnal',
       'titlePage'=>'jurnal',
       'controller'=>'jurnal'
      );
    $this->template->load($data);
  }

  public function dokumen_acc()
  {
    $datauser=$this->Jurnal_model->get_all_acc();//panggil ke modell
    $dataverif=$this->Jurnal_model->get_data_jurnal();//panggil ke modell
    $data = array(
       'content'=>'jurnal/dokumen/content_acc',
       'navbar'=>'jurnal/navbar',
       'sidebar'=>'jurnal/sidebar',
       'datauser'=>$datauser,
       'dataverif'=>$dataverif,
       'module'=>'jurnal',
       'titlePage'=>'jurnal',
       'controller'=>'jurnal'
      );
    $this->template->load($data);
  }

  public function dokumen_not_acc()
  {
    $datauser=$this->Jurnal_model->get_all_not_acc();//panggil ke modell
    $dataverif=$this->Jurnal_model->get_data_jurnal();//panggil ke modell
    $data = array(
       'content'=>'jurnal/dokumen/content_not_acc',
       'navbar'=>'jurnal/navbar',
       'sidebar'=>'jurnal/sidebar',
       'datauser'=>$datauser,
       'dataverif'=>$dataverif,
       'module'=>'jurnal',
       'titlePage'=>'jurnal',
       'controller'=>'jurnal'
      );
    $this->template->load($data);
  }

  public function create(){
    $lastdate=$this->Jurnal_model->get_last_date();
    $lastnumber=$this->Jurnal_model->get_last_num();

     $data = array(
       //'testing'=>$testing,
       //'numrows'=>$numrows,
       //'js'=> 'verifikasi/js',
       'content' => 'jurnal/create_data',
       'sidebar'=>'jurnal/sidebar',//Ini buat menu yang ditampilkan di module verifikasi {DIKIRIM KE TEMPLATE}
       'navbar'=>'jurnal/navbar',
       'action'=>'jurnal/create_action',
       'module'=>'jurnal',
       'controller'=>'jurnal',
       'titlePage'=>'jurnal',
      );
    $this->template->load($data);
  }


  public function edit_profil($operator_id){
    $dataedit=$this->Jurnal_model->get_by_id_profil($operator_id);
     $data = array(
       'content'=>'jurnal/edit_profil',
       'sidebar'=>'jurnal/sidebar',
       'navbar'=>'jurnal/navbar',
       //'role'=>$this->Verifikasi_model->gender_enums('user' , 'position' ),
       'action'=>'jurnal/jurnal/update_action',
       'dataedit'=>$dataedit,
       'module'=>'jurnal',
       'titlePage'=>'jurnal',
       'controller'=>'jurnal'
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
          $this->Verifikasi_model->update($this->input->post('operator_id', TRUE), $data);
          $this->session->set_flashdata('flashMessage', 'Update Record Success');
          //echo "berhasil";
          redirect(base_url('jurnal'));

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
