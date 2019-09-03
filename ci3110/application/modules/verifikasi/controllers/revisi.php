<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class revisi extends MY_Controller{

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
    $count_rejected =$this->Revisi_model->count_rejected();
    $countResponse =$this->Revisi_model->count_need_response();
    $datauser=$this->Revisi_model->get_all();//panggil ke modell
    $datafield=$this->Revisi_model->get_field();//panggil ke modell
    $dataverif=$this->Revisi_model->get_data_verif();//panggil ke modell
     $data = array(
       'content'=>'verifikasi/content_revision',
       'navbar'=>'verifikasi/navbar',
       'sidebar'=>'verifikasi/sidebar',
       'datauser'=>$datauser,
       'datafield'=>$datafield,
       'dataverif'=>$dataverif,
       'count_rejected' => $count_rejected,
       'countResponse' => $countResponse,
       'module'=>'verifikasi',
       'titlePage'=>'verifikasi',
       'controller'=>'verifikasi',
       'customSearchReject' => 'verifikasi/revisi/customSearchReject'
      );
    $this->template->load($data);
  }


  public function customSearchReject(){
    $countResponse =$this->Revisi_model->count_need_response();
    $datauser=$this->Revisi_model->get_data_search();
    $count_rejected =$this->Revisi_model->count_rejected();
    $data = array(
       'content'=>'verifikasi/content_search_reject',
       'navbar'=>'verifikasi/navbar',
       'sidebar'=>'verifikasi/sidebar',
       //'customSearch' =>'jurnalis/customSearch',
       'countResponse' => $countResponse,
       'count_rejected' => $count_rejected,
       'datauser'=>$datauser,
       'module'=>'verifikasi',
       'titlePage'=>'verifikasi',
       'controller'=>'verifikasi'
      );
    $ses_startdateR = $this->input->post('dateStart',TRUE);
    $ses_enddateR = $this->input->post('dateEnd',TRUE);
    $ses_byR = $this->input->post('by',TRUE);
    $this->session->set_flashdata('ses_startdate', $ses_startdateR);
    $this->session->set_flashdata('ses_enddate', $ses_enddateR);
    $this->session->set_flashdata('ses_by', $ses_byR);
    $this->template->load($data);

  }

  public function edit($No_verifikasi){
    $countResponse =$this->Revisi_model->count_need_response();
    $dataedit=$this->Revisi_model->get_by_id($No_verifikasi);
    $count_rejected =$this->Revisi_model->count_rejected();
     $data = array(
       'content'=>'verifikasi/edit_data',
       'sidebar'=>'verifikasi/sidebar',
       'navbar'=>'verifikasi/navbar',
       //'role'=>$this->Admin_model->gender_enums('user' , 'position' ),
       'action'=>'verifikasi/revisi/revisi_action',
       'dataedit'=>$dataedit,
       'count_rejected' => $count_rejected,
       'countResponse' => $countResponse,
       'module'=>'verifikasi',
       'titlePage'=>'verifikasi',
       'controller'=>'verifikasi'
      );
    $this->template->load($data);
  }



  public function revisi_action($No_verifikasi, $No)
  {
      $pk1 = substr($this->input->post('no_verifikasi'),0,4);
      $pk2 = $this->input->post('kode_ver');
      $pk3 = substr($this->input->post('no_verifikasi'),-7);
      $primarykey = $pk1.'/'.$pk2.'/'.$pk3;
      date_default_timezone_set('Asia/Jakarta');
      $role = $this->session->userdata('akses');
      if ($this->session->userdata('akses')=='verifikasi1') {
        $lokasi = "Jurnalis 1";
      }else if ($this->session->userdata('akses')=='verifikasi2') {
        $lokasi = "Jurnalis 2";
      }else if ($this->session->userdata('akses')=='verifikasi3') {
        $lokasi = "Jurnalis 3";
      }
      $now = date('Y-m-d');
          $data_dokumen = array(
            'tanggal_masuk' =>$this->input->post('tanggal_masuk',true),
            'kode_ver' =>$this->input->post('kode_ver',TRUE),
            'no_verifikasi' => $primarykey,
            'keterangan' => $this->input->post('keterangan',TRUE),
            'user' => $this->input->post('user',TRUE),
            'mata_uang' => $this->input->post('mata_uang',TRUE),
            'jumlah' => $this->input->post('jumlah',TRUE),
            'tgl_out_verif' => $now,
            'tgl_out_jurnal' => $this->input->post(""),
            'lok_dokumen' => $lokasi
          );

          $revisi_selesai = "Done";
          $data = array(
            'status_revisi' => $revisi_selesai,
          );

          $this->Revisi_model->update_revisi($this->input->post('no', TRUE), $data);
          $this->Revisi_model->update($this->input->post('no_verifikasi', TRUE), $data_dokumen);

          $this->session->set_flashdata('flashMessage', 'Update Record Success');
          //echo "berhasil";
          redirect(base_url('verifikasi/revisi'));
      //}
  }

}
