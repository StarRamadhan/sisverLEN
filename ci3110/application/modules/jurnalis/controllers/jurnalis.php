<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jurnalis extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More

    if (($this->session->userdata('masuk')==true) && (($this->session->userdata('akses')=='jurnalis'))) {
      $this->load->model(array('Jurnal_model'));
      $this->load->library('form_validation');
    }else{
      redirect(base_url('login'));
    }
  }

  public function index()
  {
    $datauser=$this->Jurnal_model->get_all_need_response();//panggil ke modell
    $countResponse =$this->Jurnal_model->count_need_response();
    $dataToday = $this->Jurnal_model->get_data_today();
    $dataApprovedJurnal = $this->Jurnal_model->get_data_approved_jurnal();
    $dataRejected = $this->Jurnal_model->get_data_rejected();
    $dataFinished = $this->Jurnal_model->get_data_finished();

    //$dataverif=$this->Jurnal_model->get_data_jurnal();//panggil ke modell
    $data = array(
       'content'=>'jurnalis/dokumen/content_need_response',
       'navbar'=>'jurnalis/navbar',
       'sidebar'=>'jurnalis/sidebar',
       'datauser'=>$datauser,
       'countResponse' => $countResponse,
       'dataToday' => $dataToday,
       'dataApprovedJurnal'=> $dataApprovedJurnal,
       'dataRejected' => $dataRejected,
       'dataFinished'=>$dataFinished,
       'customSearch' =>'verifikasi/customSearch',
       'module'=>'jurnalis',
       'titlePage'=>'jurnalis',
       'controller'=>'jurnalis',
       'reject'=>'jurnalis/jurnalis/reject',
       'approve'=>'jurnalis/jurnalis/approve'
      );
    $this->template->load($data);
  }

  public function customSearch(){
    $countResponse =$this->Jurnal_model->count_need_response();
    $datauser=$this->Jurnal_model->get_data_search();
    $data = array(
       'content'=>'jurnalis/dokumen/content_search',
       'navbar'=>'jurnalis/navbar',
       'sidebar'=>'jurnalis/sidebar',
       'customSearch' =>'jurnalis/customSearch',
       'countResponse' => $countResponse,
       // 'count_rejected' => $count_rejected,
       'datauser'=>$datauser,
       'module'=>'jurnalis',
       'titlePage'=>'jurnalis',
       'controller'=>'jurnalis'
      );
    $ses_startdate = $this->input->post('dateStart',TRUE);
    $ses_enddate = $this->input->post('dateEnd',TRUE);
    $ses_by = $this->input->post('by',TRUE);
    $ses_category = $this->input->post('category',TRUE);
    $ses_categoryValue = $this->input->post('categoryValue',TRUE);
    $this->session->set_flashdata('ses_startdate', $ses_startdate);
    $this->session->set_flashdata('ses_enddate', $ses_enddate);
    $this->session->set_flashdata('ses_by', $ses_by);
    $this->session->set_flashdata('ses_category', $ses_category);
    $this->session->set_flashdata('ses_categoryValue', $ses_categoryValue);
    $this->template->load($data);
  }

  public function reject(){
    date_default_timezone_set("Asia/Jakarta");
    $now = date('Y-m-d H:i:s');

    $data = array(
      'Tanggal_Masuk' => $this->input->post('tanggal_masuk',TRUE),
      'Tanggal_Reject' => $now,
      'No_Verifikasi' => $this->input->post('no_verifikasi',TRUE),
      'Kode_Ver' =>$this->input->post('kode_ver',TRUE),
      'Keterangan' => $this->input->post('keterangan',TRUE),
      'User' => $this->input->post('user',TRUE),
      'Mata_Uang' => $this->input->post('mata_uang',TRUE),
      'Jumlah' => $this->input->post('jumlah',TRUE),
      'Tgl_Out_Verif' => $this->input->post('tgl_out_verif',TRUE),
      'Tgl_Out_Jurnal' => $this->input->post('tgl_out_jurnal',TRUE),
      'Alasan_Revisi' => $this->input->post('alasan',true),
      'Operator_Id' => $this->input->post('operator_id',true)
    );
    $dataResponse = array(
      'Lok_Dokumen' => 'Reject',
      'Tgl_Out_Verif'=>'',
      'Jt_Jurnalis' =>'',
    );
    $this->Jurnal_model->insert($data);
    $this->Jurnal_model->update_need_response($this->input->post('no_verifikasi', TRUE), $dataResponse);
    $this->session->set_flashdata('rejectMessage', 'Reject Success');
    redirect(base_url('jurnalis'));
  }

  public function approve(){
    date_default_timezone_set("Asia/Jakarta");
    $now = date('Y-m-d H:i:s');

    //perhitungan jika input diatas jam 14.00
    $tgl_input = $now;
        $hari_input = date('l', strtotime($tgl_input));
        $batas_jam = date('H:i', strtotime($tgl_input));
          if($batas_jam>'14:00'){
            $tgl_out_role = date('Y-m-d', strtotime($tgl_input."+1 day"));
            $jatuh_tempo = date('Y-m-d', strtotime($tgl_out_role."+2 day"));
          }elseif($batas_jam<='14:00'){
            $tgl_out_role = date('Y-m-d', strtotime($tgl_input));
            $jatuh_tempo = date('Y-m-d', strtotime($tgl_out_role."+2 day"));
          }
          if(date('l', strtotime($tgl_out_role))=="Saturday"){
            $tgl_out_role = date('Y-m-d', strtotime($tgl_out_role."+2 day"));
            $jatuh_tempo = date('Y-m-d', strtotime($tgl_out_role."+2 day"));
          }
          elseif(date('l', strtotime($jatuh_tempo))=="Saturday"){
            $tgl_out_role;
            $jatuh_tempo = date('Y-m-d', strtotime($jatuh_tempo."+2 day"));
          }
          elseif((date('l', strtotime($jatuh_tempo))=="Sunday")){
            $tgl_out_role;
            $jatuh_tempo = date('Y-m-d', strtotime($jatuh_tempo."+2 day"));
          }else{
            $tgl_out_role;
            $jatuh_tempo;
          }

    $dataResponse = array(
      'Lok_Dokumen' => 'Manager',
      'Tgl_Out_Jurnal' =>$now,
      'Jt_Manager' =>$jatuh_tempo
    );

    $this->Jurnal_model->update_need_response($this->input->post('no_verifikasi', TRUE), $dataResponse);
    $this->session->set_flashdata('approveMessage', 'Approve Success');
    redirect(base_url('jurnalis'));
  }

  public function dokumen_approved()
  {
    $datauser=$this->Jurnal_model->get_all_acc();//panggil ke modell
    $dataverif=$this->Jurnal_model->get_data_jurnal();//panggil ke modell
    $data = array(
       'content'=>'jurnalis/dokumen/content_acc',
       'navbar'=>'jurnalis/navbar',
       'sidebar'=>'jurnalis/sidebar',
       'datauser'=>$datauser,
       'dataverif'=>$dataverif,
       'module'=>'jurnalis',
       'titlePage'=>'jurnalis',
       'controller'=>'jurnalis'
      );
    $this->template->load($data);
  }

  public function dokumen_all()
  {
    $countResponse =$this->Jurnal_model->count_need_response();
    $datauser=$this->Jurnal_model->get_all();//panggil ke modell
    $dataverif=$this->Jurnal_model->get_data_jurnal();//panggil ke modell
    $data = array(
       'content'=>'jurnalis/dokumen/content_all',
       'navbar'=>'jurnalis/navbar',
       'sidebar'=>'jurnalis/sidebar',
       'customSearch' =>'jurnalis/customSearch',
       'datauser'=>$datauser,
       'countResponse' => $countResponse,
       'dataverif'=>$dataverif,
       'module'=>'jurnalis',
       'titlePage'=>'jurnalis',
       'controller'=>'jurnalis',
       'start' => $this->input->post('dateStart',TRUE),
       'end' => $this->input->post('dateEnd',TRUE),
      );
    $starts = $this->input->post('dateStart',TRUE);
    $ends = $this->input->post('dateEnd',TRUE);
    $this->template->load($data);
    $this->session->set_flashdata($starts, 'Date Starts');
    $this->session->set_flashdata($ends, 'Date Ends');
  }

  public function edit_profil($operator_id){
    $countResponse =$this->Jurnal_model->count_need_response();
    $dataedit=$this->Jurnal_model->get_by_id_profil($operator_id);
     $data = array(
       'content'=>'jurnalis/edit_profil',
       'sidebar'=>'jurnalis/sidebar',
       'navbar'=>'jurnalis/navbar',
       'action'=>'jurnalis/jurnalis/update_action',
       'countResponse' => $countResponse,
       'dataedit'=>$dataedit,
       'module'=>'jurnalis',
       'titlePage'=>'jurnalis',
       'controller'=>'jurnalis'
      );
    $this->template->load($data);
  }

  public function update_action()
  {
          $data = array(
            'Username' => $this->input->post('username',TRUE),
            'Password_enc' => md5($this->input->post('password',TRUE)),
            'Password' => $this->input->post('password',TRUE),
            'Phone_Number' => $this->input->post('phone_number',TRUE),
          );
          $this->Jurnal_model->update($this->input->post('operator_id', TRUE), $data);
          $this->session->set_flashdata('flashMessage', 'Update Record Success');
          //echo "berhasil";
          redirect(base_url('jurnalis'));

  }
}
