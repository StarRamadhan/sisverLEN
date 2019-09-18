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
    $countDocIn = $this->Manager_model->count_doc_in();
    $cProgOntime = $this->Manager_model->count_manager_prog_ontime();
    $cProgLate = $this->Manager_model->count_manager_prog_late();
    $cFinishOntime = $this->Manager_model->count_manager_finish_ontime();
    $cFinishLate = $this->Manager_model->count_manager_finish_late();
    $data = array(
       'content'=>'manager/dokumen/content_need_response',
       'navbar'=>'manager/navbar',
       'sidebar'=>'manager/sidebar',
       'datauser'=>$datauser,
       'countResponse' => $countResponse,
       'countDocIn' => $countDocIn,
       'cProgOntime' => $cProgOntime,
       'cProgLate' => $cProgLate,
       'cFinishOntime' => $cFinishOntime,
       'cFinishLate' => $cFinishLate,
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
      'Tgl_Out_Jurnal' =>'',
      'Tgl_Out_Verif' => '',
      'Jt_Jurnalis' =>'',
      'Jt_Manager' => '',
    );

    $this->Manager_model->insert($data);
    $this->Manager_model->update_need_response($this->input->post('no_verifikasi', TRUE), $dataResponse);
    $this->session->set_flashdata('rejectMessage', 'Reject Success');
    redirect(base_url('manager'));
  }

  public function approve(){
    date_default_timezone_set("Asia/Jakarta");
    $now = date('Y-m-d H:i:s');
    $tgl_input = $now;
        $hari_input = date('l', strtotime($tgl_input));
        $batas_jam = date('H:i', strtotime($tgl_input));
          if($batas_jam>'14:00'){
            $tgl_out_role = date('Y-m-d', strtotime($tgl_input."+1 day"));
          }elseif($batas_jam<='14:00'){
            $tgl_out_role = date('Y-m-d', strtotime($tgl_input));
          }
          if(date('l', strtotime($tgl_out_role))=="Saturday"){
            $tgl_out_role = date('Y-m-d', strtotime($tgl_out_role."+2 day"));
          }else{
            $tgl_out_role;
          }
    $dataResponse = array(
      'Lok_Dokumen' => 'Finish',
      'Tgl_Out_Manager' =>$tgl_out_role,
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
    $data = array(
       'content'=>'manager/dokumen/content_dashboard',
       'navbar'=>'manager/navbar',
       'sidebar'=>'manager/sidebar',
       'customSearch' =>'manager/customSearch',
       'datauser'=>$datauser,
       'countResponse' => $countResponse,
       'dokJan' => $this->Manager_model->count_all_doc_thisyear('dokumen','1'),
       'dokFeb' => $this->Manager_model->count_all_doc_thisyear('dokumen','2'),
       'dokMar' => $this->Manager_model->count_all_doc_thisyear('dokumen','3'),
       'dokApr' => $this->Manager_model->count_all_doc_thisyear('dokumen','4'),
       'dokMei' => $this->Manager_model->count_all_doc_thisyear('dokumen','5'),
       'dokJun' => $this->Manager_model->count_all_doc_thisyear('dokumen','6'),
       'dokJul' => $this->Manager_model->count_all_doc_thisyear('dokumen','7'),
       'dokAgs' => $this->Manager_model->count_all_doc_thisyear('dokumen','8'),
       'dokSep' => $this->Manager_model->count_all_doc_thisyear('dokumen','9'),
       'dokOkt' => $this->Manager_model->count_all_doc_thisyear('dokumen','10'),
       'dokNov' => $this->Manager_model->count_all_doc_thisyear('dokumen','11'),
       'dokDes' => $this->Manager_model->count_all_doc_thisyear('dokumen','12'),

       'rejJan' => $this->Manager_model->count_all_doc_thisyear('revisi','1'),
       'rejFeb' => $this->Manager_model->count_all_doc_thisyear('revisi','2'),
       'rejMar' => $this->Manager_model->count_all_doc_thisyear('revisi','3'),
       'rejApr' => $this->Manager_model->count_all_doc_thisyear('revisi','4'),
       'rejMei' => $this->Manager_model->count_all_doc_thisyear('revisi','5'),
       'rejJun' => $this->Manager_model->count_all_doc_thisyear('revisi','6'),
       'rejJul' => $this->Manager_model->count_all_doc_thisyear('revisi','7'),
       'rejAgs' => $this->Manager_model->count_all_doc_thisyear('revisi','8'),
       'rejSep' => $this->Manager_model->count_all_doc_thisyear('revisi','9'),
       'rejOkt' => $this->Manager_model->count_all_doc_thisyear('revisi','10'),
       'rejNov' => $this->Manager_model->count_all_doc_thisyear('revisi','11'),
       'rejDes' => $this->Manager_model->count_all_doc_thisyear('revisi','12'),

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
}
