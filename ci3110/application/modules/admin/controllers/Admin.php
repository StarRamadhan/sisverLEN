<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    //VALIDASI LOGIN ADMIN
    if (($this->session->userdata('masuk')==true) && ($this->session->userdata('akses')=='admin')) {
      $this->load->model(array('Admin_model'));
      $this->load->library('form_validation');
    }else{
      redirect(base_url('login'));
    }
  }

  //HALAMAN YANG AKAN DI LOAD PERTAMA SETELAH MASUK ADMIN
  public function index()
  {

    $datauser=$this->Admin_model->get_all();
    $datafield=$this->Admin_model->get_field();

     $data = array(
       'content'=>'admin/content',
       'navbar'=>'admin/navbar',
       'sidebar'=>'admin/sidebar',
       'datauser'=>$datauser,
       'datafield'=>$datafield,
       'module'=>'admin',
       'controller'=>'admin'
      );
    $this->template->load($data);
  }

  //LOAD HALAMAN CREATE DATA USER
  public function create(){

     $data = array(
       'content' => 'admin/create_data',
       'sidebar'=>'admin/sidebar',
       'navbar'=>'admin/navbar',
       'action'=>'admin/create_action',
       'module'=>'admin',
       'titlePage'=>'Operator Data',
       'controller'=>'admin'
      );
    $this->template->load($data);
  }

  //AKSI KETIKA MENAMBAH DATA
  public function create_action()
      {
        $this->create();
        $data = array(
					'Username' => $this->input->post('username',TRUE),
					'Password_Enc' => md5($this->input->post('password_enc',TRUE)),
					'Password' => $this->input->post('password',TRUE),
					'Position' => $this->input->post('position',TRUE),
					'Phone_Number' => $this->input->post('phone_number',TRUE),
          'Status' => $this->input->post('status',TRUE),
        );

        $this->Admin_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('admin'));
      }

  //LOAD HALAMAN UBAH DATA
  public function edit($operator_id){
    $dataedit=$this->Admin_model->get_by_id($operator_id);
    $data = array(
      'content'=>'admin/edit_data',
      'sidebar'=>'admin/sidebar',
      'navbar'=>'admin/navbar',
      'action'=>'admin/admin/update_action',
      'dataedit'=>$dataedit,
      'module'=>'admin',
      'titlePage'=>'admin',
      'controller'=>'admin'
    );
    $this->template->load($data);
  }

  //AKSI UNTUK MENGUBAH DATA
  public function update_action()
  {
      $data = array(
        'Username' => $this->input->post('username',TRUE),
        'Password_Enc' => md5($this->input->post('password',TRUE)),
        'Password' => $this->input->post('password',TRUE),
        'Position' => $this->input->post('position',TRUE),
        'Phone_Number' => $this->input->post('phone_number',TRUE),
        'Status' => $this->input->post('status',TRUE),
      );
      $this->Admin_model->update($this->input->post('operator_id', TRUE), $data);
      $this->session->set_flashdata('flashMessage', 'Update Record Success');
      redirect(base_url('admin'));
  }
}
