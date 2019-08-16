<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Revisi extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More

    if (($this->session->userdata('masuk')==true) && (($this->session->userdata('akses')=='verifikasi1') || ($this->session->userdata('akses')=='verifikasi2') || ($this->session->userdata('akses')=='verifikasi3'))) {
      $this->load->model(array('Revisi_model'));
      $this->load->library('form_validation');
    }else{
      redirect(base_url('login'));
    }
  }

  public function index()
  {

    $datauser=$this->Revisi_model->get_all();//panggil ke modell
    $datafield=$this->Revisi_model->get_field();//panggil ke modell
    $dataverif=$this->Revisi_model->get_data_verif();//panggil ke modell
    // $dataverif2=$this->Verifikasi_model->get_data_verif2();//panggil ke modell
    // $dataverif3=$this->Verifikasi_model->get_data_verif3();//panggil ke modell

     $data = array(
       'content'=>'revisi/content',
       'navbar'=>'revisi/navbar',
       'sidebar'=>'revisi/sidebar',
       // 'css'=>'user/user/css',
       // 'js'=>'user/user/js',
       'datauser'=>$datauser,
       'datafield'=>$datafield,
       '$dataverif'=>$dataverif,
       'module'=>'revisi',
       'titlePage'=>'revisi',
       'controller'=>'revisi'
      );
    $this->template->load($data);
  }

  public function edit($operator_id){
    $dataedit=$this->Revisi_model->get_by_id($operator_id);
     $data = array(
       'content'=>'revisi/edit_data',
       'sidebar'=>'revisi/sidebar',
       'navbar'=>'revisi/navbar',
       //'role'=>$this->Admin_model->gender_enums('user' , 'position' ),
       'action'=>'revisi/revisi/update_action',
       'dataedit'=>$dataedit,
       'module'=>'revisi',
       'titlePage'=>'revisi',
       'controller'=>'revisi'
      );
    $this->template->load($data);
  }

  public function update_action()
  {
      $this->_rules();
      if ($this->form_validation->run() == FALSE) {
          $this->edit($this->input->post('No', TRUE));
      } else {
          $data = array(
            'tanggal_masuk' => $this->input->post('username',TRUE),
            'kode_ver' => md5($this->input->post('password',TRUE)),
            'keterangan' => $this->input->post('password',TRUE),
            'user' => $this->input->post('position',TRUE),
            'mata_uang' => $this->input->post('phone_number',TRUE),
            'jumlah' => $this->input->post('status',TRUE),
          );
          $this->Admin_model->update($this->input->post('no', TRUE), $data);
          $this->session->set_flashdata('flashMessage', 'Update Record Success');
          //echo "berhasil";
          redirect(base_url('revisi'));
      }
  }

}
