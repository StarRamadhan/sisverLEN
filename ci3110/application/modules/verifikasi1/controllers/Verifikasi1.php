<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi1 extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More

    if ($this->session->userdata('masuk')==true) {
    // if (($this->session->userdata('masuk')==true) && ($this->session->userdata('akses')=='verifikasi1')) {
      $this->load->model(array('Verifikasi1_model'));
      $this->load->library('form_validation');
    }else{
      redirect(base_url('login'));
    }
  }

  public function index()
  {

    $datauser=$this->Verifikasi1_model->get_all();//panggil ke modell
    $datafield=$this->Verifikasi1_model->get_field();//panggil ke modell

     $data = array(
       'content'=>'verifikasi1/content',
       'navbar'=>'verifikasi1/navbar',
       'sidebar'=>'verifikasi1/sidebar',
       // 'css'=>'user/user/css',
       // 'js'=>'user/user/js',
        'datauser'=>$datauser,
        'datafield'=>$datafield,
        'module'=>'user',
        'titlePage'=>'user',
        'controller'=>'user'
      );
    $this->template->load($data);
  }

  // public function create(){
  //   //$datauser=$this->Admin_model->get_all();//panggil ke modell
  //   //$datafield=$this->Admin_model->get_field();//panggil ke modell
  //    $data = array(
  //      'content' => 'verifikasi1admin/content',
  //      'sidebar'=>'verifikasi1/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
  //      'navbar'=>'verifikasi1/navbar',
  //
  //      'action'=>'verifikasi1/create_action',
  //      'module'=>'verifikasi1',
  //      'titlePage'=>'verifikasi1',
  //      'controller'=>'verifikasi1'
  //     );
  //   $this->template->load($data);
  // }
  //
  // public function edit($user_id){
  //   $dataedit=$this->Admin_model->get_by_id($user_id);
  //    $data = array(
  //      'content'=>'admin/edit_data',
  //      'sidebar'=>'admin/sidebar',
  //      'navbar'=>'admin/navbar',
  //      //'role'=>$this->Admin_model->gender_enums('user' , 'position' ),
  //      'action'=>'admin/admin/update_action',
  //      'dataedit'=>$dataedit,
  //      'module'=>'admin',
  //      'titlePage'=>'admin',
  //      'controller'=>'admin'
  //     );
  //   $this->template->load($data);
  // }
  //
  // public function create_action()
  //     {
  //       $this->_rules();
  //
  //       if ($this->form_validation->run() == FALSE) {
  //           $this->create();
  //       } else {
  //             $data = array(
  //     					'username' => $this->input->post('username',TRUE),
  //     					'password_enc' => $this->input->post('password_enc',TRUE),
  //     					'password' => $this->input->post('password',TRUE),
  //     					'position' => $this->input->post('position',TRUE),
  //     					'phone_number' => $this->input->post('phone_number',TRUE),
  //               'status' => $this->input->post('status',TRUE),
  //             );
  //
  //             $this->Admin_model->insert($data);
  //             $this->session->set_flashdata('message', 'Create Record Success');
  //             redirect(site_url('user/user'));
  //           }
  //     }
  //
  // public function update_action()
  // {
  //     // $this->_rules();
  //     // if ($this->form_validation->run() == FALSE) {
  //     //     $this->edit($this->input->post('user_id', TRUE));
  //     // } else {
  //         $data = array(
  //           'username' => $this->input->post('username',TRUE),
  //           'password_enc' => md5($this->input->post('password',TRUE)),
  //           'password' => $this->input->post('password',TRUE),
  //           'position' => $this->input->post('position',TRUE),
  //           'phone_number' => $this->input->post('phone_number',TRUE),
  //           'status' => $this->input->post('status',TRUE),
  //         );
  //         $this->Admin_model->update($this->input->post('user_id', TRUE), $data);
  //         $this->session->set_flashdata('flashMessage', 'Update Record Success');
  //         //echo "berhasil";
  //         redirect(base_url('admin'));
  //     //}
  // }

  // public function _rules()
  // {
  //     $this->form_validation->set_rules('username', 'username', 'trim|required');
  //     //$this->form_validation->set_rules('password_enc', 'password_enc', 'trim|required');
  //     $this->form_validation->set_rules('password', 'password', 'trim|required');
  //     $this->form_validation->set_rules('position', 'position', 'trim|required');
  //     $this->form_validation->set_rules('phone_number', 'phone_number', 'trim|required');
  //     $this->form_validation->set_rules('phone_number', 'phone_number', 'trim|required');
  //
  //     $this->form_validation->set_rules('user_id', 'user_id', 'trim');
  //     $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  // }
}
