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

  public function edit($No_verifikasi){
    $dataedit=$this->Revisi_model->get_by_id($No_verifikasi);
     $data = array(
       'content'=>'revisi/edit_data',
       'sidebar'=>'revisi/sidebar',
       'navbar'=>'revisi/navbar',
       //'role'=>$this->Admin_model->gender_enums('user' , 'position' ),
       'action'=>'revisi/update_action',
       'dataedit'=>$dataedit,
       'module'=>'revisi',
       'titlePage'=>'revisi',
       'controller'=>'revisi'
      );
    $this->template->load($data);
  }

  public function update_action($No_verifikasi, $No)
  {
      // $this->_rules();
      // if ($this->form_validation->run() == FALSE) {
      //     $this->edit($this->input->post('no', TRUE));
      // } else {
      $pk1 = substr($this->input->post('no_verifikasi'),0,4);
      $pk2 = $this->input->post('kode_ver');
      $pk3 = substr($this->input->post('no_verifikasi'),-7);
      $primarykey = $pk1.'/'.$pk2.'/'.$pk3;
      $now = date('Y-m-d H:i:s');
          $data_dokumen = array(
            'kode_ver' =>$this->input->post('kode_ver',TRUE),
            'keterangan' => $this->input->post('keterangan',TRUE),
            'no_verifikasi' => $primarykey,
            'user' => $this->input->post('user',TRUE),
            'mata_uang' => $this->input->post('mata_uang',TRUE),
            'jumlah' => $this->input->post('jumlah',TRUE),

            'tgl_out_verif' => $now,
            'tgl_out_jurnal' => $this->input->post(""),
            'tgl_out_manager' => $this->input->post(""),
            'status_dok_jurnal' => $this->input->post(""),
            'status_dok_manager' => $this->input->post(""),
            'status_dokumen' => $this->input->post("")
          );

          $revisi_selesai = "Selesai";
          $data = array(
            'status_revisi' => $revisi_selesai,
          );

          $this->Revisi_model->update_revisi($this->input->post('no', TRUE), $data);
          $this->Revisi_model->update($this->input->post('no_verifikasi', TRUE), $data_dokumen);

          $this->session->set_flashdata('flashMessage', 'Update Record Success');
          //echo "berhasil";
          redirect(base_url('revisi'));
      //}
  }

}
