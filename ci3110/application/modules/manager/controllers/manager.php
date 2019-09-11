<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More

    if (($this->session->userdata('masuk')==true) && (($this->session->userdata('akses')=='manager'))) {
      $this->load->model(array('Manager_model'));
      $this->load->library('form_validation');
    }else{
      redirect(base_url('login'));
    }
  }

  public function index()
  {
    $countResponse =$this->Manager_model->count_need_response();
    $datauser=$this->Manager_model->get_all_need_response();
    $dataToday = $this->Manager_model->get_data_today();
    $dataApprovedJurnal = $this->Manager_model->get_data_approved_jurnal();
    $dataRejected = $this->Manager_model->get_data_rejected();
    $dataFinished = $this->Manager_model->get_data_finished();

    //$dataverif=$this->Manager_model->get_data_jurnal();//panggil ke modell
    $data = array(
       'content'=>'manager/dokumen/content_need_response',
       'navbar'=>'manager/navbar',
       'sidebar'=>'manager/sidebar',
       'datauser'=>$datauser,
       'countResponse' => $countResponse,
       'dataToday' => $dataToday,
       'dataApprovedJurnal'=> $dataApprovedJurnal,
       'dataRejected' => $dataRejected,
       'dataFinished'=>$dataFinished,
       //'dataverif'=>$dataverif,
       'module'=>'manager',
       'titlePage'=>'manager',
       'controller'=>'manager',
       'reject'=>'manager/manager/reject',
       'approve'=>'manager/manager/approve'
      );
    $this->template->load($data);
  }

  public function reject(){
    date_default_timezone_set("Asia/Jakarta");
    $now = date('Y-m-d H:i:s');

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
    );

    $this->Manager_model->insert($data);
    $this->Manager_model->update_need_response($this->input->post('no_verifikasi', TRUE), $dataResponse);
    $this->session->set_flashdata('rejectMessage', 'Reject Success');
    redirect(base_url('manager'));
  }

  public function approve(){
    date_default_timezone_set("Asia/Jakarta");
    $now = date('Y-m-d H:i:s');

    $dataResponse = array(
      'Lok_Dokumen' => 'Finish',
      'Tgl_Out_Manager' =>$tgl_out_manager,
    );

    $this->Manager_model->update_need_response($this->input->post('no_verifikasi', TRUE), $dataResponse);
    $this->session->set_flashdata('approveMessage', 'Approve Success');
    redirect(base_url('manager'));
  }

  public function dokumen_approved()
  {
    $datauser=$this->Manager_model->get_all_acc();//panggil ke modell
    $dataverif=$this->Manager_model->get_data_manager();//panggil ke modell
    $data = array(
       'content'=>'manager/dokumen/content_acc',
       'navbar'=>'manager/navbar',
       'sidebar'=>'manager/sidebar',
       'datauser'=>$datauser,
       'dataverif'=>$dataverif,
       'module'=>'manager',
       'titlePage'=>'manager',
       'controller'=>'manager'
      );
    $this->template->load($data);
  }

  public function dokumen_all()
  {
    $countResponse =$this->Manager_model->count_need_response();
    $datauser=$this->Manager_model->get_all();//panggil ke modell
    $dataverif=$this->Manager_model->get_data_manager();//panggil ke modell
    $data = array(
       'content'=>'manager/dokumen/content_all',
       'navbar'=>'manager/navbar',
       'sidebar'=>'manager/sidebar',
       'customSearch' =>'manager/customSearch',
       'datauser'=>$datauser,
       'countResponse' => $countResponse,
       'dataverif'=>$dataverif,
       'module'=>'manager',
       'titlePage'=>'manager',
       'controller'=>'manager',
       'start' => $this->input->post('dateStart',TRUE),
       'end' => $this->input->post('dateEnd',TRUE),
      );
    $starts = $this->input->post('dateStart',TRUE);
    $ends = $this->input->post('dateEnd',TRUE);
    $this->template->load($data);
    $this->session->set_flashdata($starts, 'Date Starts');
    $this->session->set_flashdata($ends, 'Date Ends');
  }

  public function dashboards()
  {
    $countResponse =$this->Manager_model->count_need_response();
    $datauser=$this->Manager_model->get_all();//panggil ke modell
    $dataverif=$this->Manager_model->get_data_manager();//panggil ke modell
    $data = array(
       'content'=>'manager/dokumen/content_dashboard',
       'navbar'=>'manager/navbar',
       'sidebar'=>'manager/sidebar',
       'customSearch' =>'manager/customSearch',
       'datauser'=>$datauser,
       'countResponse' => $countResponse,
       'dataverif'=>$dataverif,
       'module'=>'manager',
       'titlePage'=>'manager',
       'controller'=>'manager',
       'start' => $this->input->post('dateStart',TRUE),
       'end' => $this->input->post('dateEnd',TRUE),
      );
    $starts = $this->input->post('dateStart',TRUE);
    $ends = $this->input->post('dateEnd',TRUE);
    $this->template->load($data);
    $this->session->set_flashdata($starts, 'Date Starts');
    $this->session->set_flashdata($ends, 'Date Ends');
  }


  public function customSearch(){
    $countResponse =$this->Manager_model->count_need_response();
    $datauser=$this->Manager_model->get_data_search();
    $data = array(
       'content'=>'manager/dokumen/content_search',
       'navbar'=>'manager/navbar',
       'sidebar'=>'manager/sidebar',
       'customSearch' =>'manager/customSearch',
       'countResponse' => $countResponse,
       // 'count_rejected' => $count_rejected,
       'datauser'=>$datauser,
       'module'=>'manager',
       'titlePage'=>'manager',
       'controller'=>'manager'
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

  public function edit_profil($operator_id){
    $dataedit=$this->Manager_model->get_by_id_profil($operator_id);
    $countResponse =$this->Manager_model->count_need_response();
     $data = array(
       'content'=>'manager/edit_profil',
       'sidebar'=>'manager/sidebar',
       'navbar'=>'manager/navbar',
       'action'=>'manager/manager/update_action',
       'countResponse' => $countResponse,
       'dataedit'=>$dataedit,
       'module'=>'manager',
       'titlePage'=>'manager',
       'controller'=>'manager'
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
          $this->Manager_model->update($this->input->post('operator_id', TRUE), $data);
          $this->session->set_flashdata('flashMessage', 'Update Record Success');
          //echo "berhasil";
          redirect(base_url('manager'));

  }

  public function dashboard()
  {
    $countResponse =$this->Manager_model->count_need_response();
    $datauser=$this->Manager_model->get_all_need_response();

    $dataToday = $this->Manager_model->get_data_today();
    $dataThisMonth = $this->Manager_model->get_data_thismonth();
    $dataLastMonth = $this->Manager_model->get_data_lastmonth();
    $dataThisYear = $this->Manager_model->get_data_thisyear();


    $dataVer1Today = $this->Manager_model->get_ver1_today();
    $dataVer1ThisMonth = $this->Manager_model->get_ver1_thismonth();
    $dataVer1LastMonth = $this->Manager_model->get_ver1_lastmonth();

    $dataVer2Today = $this->Manager_model->get_ver2_today();
    $dataVer2ThisMonth = $this->Manager_model->get_ver2_thismonth();
    $dataVer2LastMonth = $this->Manager_model->get_ver2_lastmonth();

    $dataVer3Today = $this->Manager_model->get_ver3_today();
    $dataVer3ThisMonth = $this->Manager_model->get_ver3_thismonth();
    $dataVer3LastMonth = $this->Manager_model->get_ver3_lastmonth();

    $dataJurnal1Today = $this->Manager_model->get_approve_jur1_today();
    $dataJurnal1ThisMonth = $this->Manager_model->get_approve_jur1_thismonth();
    $dataJurnal1LastMonth = $this->Manager_model->get_approve_jur1_lastmonth();

    $dataJurnal2Today = $this->Manager_model->get_approve_jur2_today();
    $dataJurnal2ThisMonth = $this->Manager_model->get_approve_jur2_thismonth();
    $dataJurnal2LastMonth = $this->Manager_model->get_approve_jur2_lastmonth();

    $dataJurnal3Today = $this->Manager_model->get_approve_jur3_today();
    $dataJurnal3ThisMonth = $this->Manager_model->get_approve_jur3_thismonth();
    $dataJurnal3LastMonth = $this->Manager_model->get_approve_jur3_lastmonth();



    //$dataverif=$this->Manager_model->get_data_jurnal();//panggil ke modell
    $data = array(
       'content'=>'manager/dokumen/content_dashboard_statistic',
       'navbar'=>'manager/navbar',
       'sidebar'=>'manager/sidebar',
       'datauser'=>$datauser,

       'dataVer1Today' => $dataVer1Today,
       'dataVer1ThisMonth' => $dataVer1ThisMonth,
       'dataVer1LastMonth' => $dataVer1LastMonth,
       'dataVer2Today' => $dataVer2Today,
       'dataVer2ThisMonth' => $dataVer2ThisMonth,
       'dataVer2LastMonth' => $dataVer2LastMonth,
       'dataVer3Today' => $dataVer3Today,
       'dataVer3ThisMonth' => $dataVer3ThisMonth,
       'dataVer3LastMonth' => $dataVer3LastMonth,

       'dataJurnal1Today'=> $dataJurnal1Today,
       'dataJurnal1ThisMonth'=> $dataJurnal1ThisMonth,
       'dataJurnal1LastMonth'=> $dataJurnal2LastMonth,
       'dataJurnal2Today'=> $dataJurnal2Today,
       'dataJurnal2ThisMonth'=> $dataJurnal2ThisMonth,
       'dataJurnal2LastMonth'=> $dataJurnal2LastMonth,
       'dataJurnal3Today'=> $dataJurnal3Today,
       'dataJurnal3ThisMonth'=> $dataJurnal3ThisMonth,
       'dataJurnal3LastMonth'=> $dataJurnal3LastMonth,

       'countResponse' => $countResponse,
       'dataToday' => $dataToday,
       'dataThisMonth'=> $dataThisMonth,
       'dataLastMonth' => $dataLastMonth,
       'dataThisYear'=>$dataThisYear,
       //'dataverif'=>$dataverif,
       'module'=>'manager',
       'titlePage'=>'manager',
       'controller'=>'manager',
       'reject'=>'manager/manager/reject',
       'approve'=>'manager/manager/approve'
      );
    $this->template->load($data);
  }
}
