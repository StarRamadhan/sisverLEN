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
    $datauser=$this->Manager_model->get_all_need_response();//panggil ke modell
    //$dataverif=$this->Manager_model->get_data_jurnal();//panggil ke modell
    $data = array(
       'content'=>'manager/dokumen/content_need_response',
       'navbar'=>'manager/navbar',
       'sidebar'=>'manager/sidebar',
       'datauser'=>$datauser,
       'countResponse' => $countResponse,
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
      'Lok_Dokumen' => 'reject',
    );
    $this->Manager_model->insert($data);
    $this->Manager_model->update_need_response($this->input->post('no_verifikasi', TRUE), $dataResponse);
    $this->session->set_flashdata('rejectMessage', 'Reject Success');
    redirect(base_url('manager'));
  }

  public function approve(){
    date_default_timezone_set("Asia/Jakarta");
    $now = date('Y-m-d');
    $dataResponse = array(
      'Lok_Dokumen' => 'finish',
      'Tgl_Out_Manager' =>$now
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

  public function customSearch(){
    $countResponse =$this->Manager_model->count_need_response();
    $datauser=$this->Manager_model->get_data_search();
    $data = array(
       'content'=>'manager/dokumen/content_search',
       'navbar'=>'manager/navbar',
       'sidebar'=>'manager/sidebar',
       //'customSearch' =>'manager/customSearch',
       'datauser'=>$datauser,
       'countResponse' => $countResponse,
       'module'=>'manager',
       'titlePage'=>'manager',
       'controller'=>'manager'
      );
      $ses_startdate = $this->input->post('dateStart',TRUE);
      $ses_enddate = $this->input->post('dateEnd',TRUE);
      $ses_by = $this->input->post('by',TRUE);
      $this->session->set_flashdata('ses_startdate', $ses_startdate);
      $this->session->set_flashdata('ses_enddate', $ses_enddate);
      $this->session->set_flashdata('ses_by', $ses_by);
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

  // public function _rules()
  // {
  //     $this->form_validation->set_rules('username', 'username', 'trim|required');
  //     //$this->form_validation->set_rules('password_enc', 'password_enc', 'trim|required');
  //     $this->form_validation->set_rules('password', 'password', 'trim|required');
  //     $this->form_validation->set_rules('position', 'position', 'trim|required');
  //     $this->form_validation->set_rules('phone_number', 'phone_number', 'trim|required');
  //
  //
  //     $this->form_validation->set_rules('no_verifikasi', 'no_verifikasi', 'trim');
  //     $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  // }
}
