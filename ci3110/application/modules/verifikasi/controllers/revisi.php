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
      if ($role=='verifikasi1') {
          $lokasi = "Jurnalis 1";
      }elseif ($role=='verifikasi2') {
          $lokasi = "Jurnalis 2";
      }elseif ($role=='verifikasi3') {
          $lokasi = "Jurnalis 3";
      }

      $tgl_input = date('Y-m-d');
      $hari_input = date('l', strtotime($tgl_input));
      $batas_jam = date('H:i', strtotime($tgl_input));
        if($batas_jam>'14:00'){
          $tgl_out_role = date('Y-m-d', strtotime($tgl_input."+1 day"));
          $jatuh_tempo = date('Y-m-d', strtotime($tgl_out_role."+4 day"));
        }elseif($batas_jam<='14:00'){
          $tgl_out_role = date('Y-m-d', strtotime($tgl_input));
          $jatuh_tempo = date('Y-m-d', strtotime($tgl_out_role."+4 day"));
        }

        if(date('l', strtotime($tgl_out_role))=="Saturday"){
          $tgl_out_role = date('Y-m-d', strtotime($tgl_out_role."+2 day"));
          $jatuh_tempo = date('Y-m-d', strtotime($tgl_out_role."+4 day"));
        }
        elseif(date('l', strtotime($jatuh_tempo))=="Saturday"){
          $tgl_out_role;
          $jatuh_tempo = date('Y-m-d', strtotime($jatuh_tempo."+2 day"));
        }
        elseif((date('l', strtotime($jatuh_tempo))=="Sunday")){
          $tgl_out_role;
          $jatuh_tempo = date('Y-m-d', strtotime($jatuh_tempo."+2 day"));
        }elseif ((date('l', strtotime($tgl_out_role))=="Thursday") || (date('l', strtotime($tgl_out_role))=="Friday")) {
          $tgl_out_role;
          $jatuh_tempo = date('Y-m-d', strtotime($jatuh_tempo."+2 day"));
        }else{
          $tgl_out_role;
          $jatuh_tempo;
        }

      $now = date('Y-m-d H:i:s');
          $data_dokumen = array(
            'Tanggal_Masuk' =>$this->input->post('tanggal_masuk',true),
            'Kode_Ver' =>$this->input->post('kode_ver',TRUE),
            'No_Verifikasi' => $primarykey,
            'Keterangan' => $this->input->post('keterangan',TRUE),
            'User' => $this->input->post('user',TRUE),
            'Mata_Uang' => $this->input->post('mata_uang',TRUE),
            'Jumlah' => $this->input->post('jumlah',TRUE),
            'Tgl_Out_Verif' => $tgl_out_role,
            'Tgl_Out_Jurnal' => '',
            'lok_Dokumen' => $lokasi,
            'Jt_Jurnalis' => $jatuh_tempo
          );

          $revisi_selesai = "Done";
          $data = array(
            'Status_Revisi' => $revisi_selesai,
          );

          $this->Revisi_model->update_revisi($this->input->post('no', TRUE), $data);
          $this->Revisi_model->update($this->input->post('no_verifikasi', TRUE), $data_dokumen);

          $this->session->set_flashdata('flashMessage', 'Update Record Success');
          //echo "berhasil";
          redirect(base_url('verifikasi/revisi'));
      //}
  }

}
