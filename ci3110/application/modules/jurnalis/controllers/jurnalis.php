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
    $dataThisMonth = $this->Jurnal_model->get_data_thismonth();
    $dataLastMonth = $this->Jurnal_model->get_data_lastmonth();
    $dataThisYear = $this->Jurnal_model->get_data_thisyear();

    //$dataverif=$this->Jurnal_model->get_data_jurnal();//panggil ke modell
    $data = array(
       'content'=>'jurnalis/dokumen/content_need_response',
       'navbar'=>'jurnalis/navbar',
       'sidebar'=>'jurnalis/sidebar',
       'datauser'=>$datauser,
       'countResponse' => $countResponse,
       'dataToday' => $dataToday,
       'dataThisMonth'=> $dataThisMonth,
       'dataLastMonth' => $dataLastMonth,
       'dataThisYear'=>$dataThisYear,
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
    $data = array(
      'tanggal_masuk' => $this->input->post('tanggal_masuk',TRUE),
      'no_verifikasi' => $this->input->post('no_verifikasi',TRUE),
      'kode_ver' =>$this->input->post('kode_ver',TRUE),
      'keterangan' => $this->input->post('keterangan',TRUE),
      'user' => $this->input->post('user',TRUE),
      'mata_uang' => $this->input->post('mata_uang',TRUE),
      'jumlah' => $this->input->post('jumlah',TRUE),
      'tgl_out_verif' => $this->input->post('tgl_out_verif',TRUE),
      'tgl_out_jurnal' => $this->input->post('tgl_out_jurnal',TRUE),
      'alasan_revisi' => $this->input->post('alasan',true),
      'operator_id' => $this->input->post('operator_id',true)
    );
    $dataResponse = array(
      'Lok_Dokumen' => 'Reject',
      'Tgl_Out_Verif'=>'',
    );
    $this->Jurnal_model->insert($data);
    $this->Jurnal_model->update_need_response($this->input->post('no_verifikasi', TRUE), $dataResponse);
    $this->session->set_flashdata('rejectMessage', 'Reject Success');
    redirect(base_url('jurnalis'));
  }

  public function approve(){
    date_default_timezone_set("Asia/Jakarta");
    $now = date('Y-m-d H:i:s');
    $dataResponse = array(
      'Lok_Dokumen' => 'Manager',
      'Tgl_Out_Jurnal' =>$now
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

  // public function customSearch(){
  //   $countResponse =$this->Jurnal_model->count_need_response();
  //   $datauser=$this->Jurnal_model->get_data_search();
  //   $data = array(
  //      'content'=>'jurnalis/dokumen/content_search',
  //      'navbar'=>'jurnalis/navbar',
  //      'sidebar'=>'jurnalis/sidebar',
  //      //'customSearch' =>'jurnalis/customSearch',
  //      'countResponse' => $countResponse,
  //      'datauser'=>$datauser,
  //      'module'=>'jurnalis',
  //      'titlePage'=>'jurnalis',
  //      'controller'=>'jurnalis'
  //     );
  //     $ses_startdate = $this->input->post('dateStart',TRUE);
  //     $ses_enddate = $this->input->post('dateEnd',TRUE);
  //     $ses_by = $this->input->post('by',TRUE);
  //     $this->session->set_flashdata('ses_startdate', $ses_startdate);
  //     $this->session->set_flashdata('ses_enddate', $ses_enddate);
  //     $this->session->set_flashdata('ses_by', $ses_by);
  //     $this->template->load($data);
  // }

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
            'username' => $this->input->post('username',TRUE),
            'password_enc' => md5($this->input->post('password',TRUE)),
            'password' => $this->input->post('password',TRUE),
            'phone_number' => $this->input->post('phone_number',TRUE),
          );
          $this->Jurnal_model->update($this->input->post('operator_id', TRUE), $data);
          $this->session->set_flashdata('flashMessage', 'Update Record Success');
          //echo "berhasil";
          redirect(base_url('jurnalis'));

  }
}
