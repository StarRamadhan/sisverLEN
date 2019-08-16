<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class verifikasi extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More

    if (($this->session->userdata('masuk')==true) && (($this->session->userdata('akses')=='verifikasi1') || ($this->session->userdata('akses')=='verifikasi2') || ($this->session->userdata('akses')=='verifikasi3'))) {
      $this->load->model(array('Verifikasi_model'));
      $this->load->library('form_validation');
    }else{
      redirect(base_url('login'));
    }
  }

  public function index()
  {

    $datauser=$this->Verifikasi_model->get_all();//panggil ke modell
    $datafield=$this->Verifikasi_model->get_field();//panggil ke modell
    $dataverif=$this->Verifikasi_model->get_data_verif();//panggil ke modell
    // $dataverif2=$this->Verifikasi_model->get_data_verif2();//panggil ke modell
    // $dataverif3=$this->Verifikasi_model->get_data_verif3();//panggil ke modell

     $data = array(
       'content'=>'verifikasi/content',
       'navbar'=>'verifikasi/navbar',
       'sidebar'=>'verifikasi/sidebar',
       // 'css'=>'user/user/css',
       // 'js'=>'user/user/js',
       'datauser'=>$datauser,
       'datafield'=>$datafield,
       '$dataverif'=>$dataverif,
       'module'=>'verifikasi',
       'titlePage'=>'verifikasi',
       'controller'=>'verifikasi'
      );
    $this->template->load($data);
  }

  public function create(){
    //$datauser=$this->Verifikasi_model->get_all();//panggil ke modell
    //$datafield=$this->Verifikasi_model->get_field();//panggil ke modell
     $data = array(
       'content' => 'verifikasi/content',
       'sidebar'=>'verifikasi/sidebar',//Ini buat menu yang ditampilkan di module verifikasi {DIKIRIM KE TEMPLATE}
       'navbar'=>'verifikasi/navbar',

       'action'=>'verifikasi/create_action',
       'module'=>'verifikasi',
       'titlePage'=>'verifikasi',
       'controller'=>'verifikasi'
      );
    $this->template->load($data);
  }

  public function edit($no_verifikasi){
    $dataedit=$this->Verifikasi_model->get_by_id($no_verifikasi);
     $data = array(
       'content'=>'verifikasi/edit_data',
       'sidebar'=>'verifikasi/sidebar',
       'navbar'=>'verifikasi/navbar',
       //'role'=>$this->Verifikasi_model->gender_enums('user' , 'position' ),
       'action'=>'verifikasi/verifikasi/update_action',
       'dataedit'=>$dataedit,
       'module'=>'verifikasi',
       'titlePage'=>'verifikasi',
       'controller'=>'verifikasi'
      );
    $this->template->load($data);
  }

  public function create_action()
      {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
              $data = array(
      					'username' => $this->input->post('username',TRUE),
      					'password_enc' => $this->input->post('password_enc',TRUE),
      					'password' => $this->input->post('password',TRUE),
      					'position' => $this->input->post('position',TRUE),
      					'phone_number' => $this->input->post('phone_number',TRUE),
              );

              $this->Verifikasi_model->insert($data);
              $this->session->set_flashdata('message', 'Create Record Success');
              redirect(base_url('verifikasi'));
            }
      }

  public function update_action()
  {
      $this->_rules();
      if ($this->form_validation->run() == FALSE) {
          $this->edit($this->input->post('no_verifikasi', TRUE));
      } else {
          $data = array(
            'username' => $this->input->post('username',TRUE),
            'password_enc' => md5($this->input->post('password',TRUE)),
            'password' => $this->input->post('password',TRUE),
            'position' => $this->input->post('position',TRUE),
            'phone_number' => $this->input->post('phone_number',TRUE),
          );
          $this->Verifikasi_model->update($this->input->post('no_verifikasi', TRUE), $data);
          $this->session->set_flashdata('flashMessage', 'Update Record Success');
          //echo "berhasil";
          redirect(base_url('verifikasi'));
      }
  }

  public function _rules()
  {
      $this->form_validation->set_rules('username', 'username', 'trim|required');
      //$this->form_validation->set_rules('password_enc', 'password_enc', 'trim|required');
      $this->form_validation->set_rules('password', 'password', 'trim|required');
      $this->form_validation->set_rules('position', 'position', 'trim|required');
      $this->form_validation->set_rules('phone_number', 'phone_number', 'trim|required');


      $this->form_validation->set_rules('no_verifikasi', 'no_verifikasi', 'trim');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }
}
