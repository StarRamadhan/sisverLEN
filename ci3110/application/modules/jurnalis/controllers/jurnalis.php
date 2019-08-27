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

    //$dataverif=$this->Jurnal_model->get_data_jurnal();//panggil ke modell
    $data = array(
       'content'=>'jurnalis/dokumen/content_need_response',
       'navbar'=>'jurnalis/navbar',
       'sidebar'=>'jurnalis/sidebar',
       'datauser'=>$datauser,
       'countResponse' => $countResponse,
       //'dataverif'=>$dataverif,
       'module'=>'jurnalis',
       'titlePage'=>'jurnalis',
       'controller'=>'jurnalis',
       'reject'=>'jurnalis/jurnalis/reject',
       'approve'=>'jurnalis/jurnalis/approve'
      );
    $this->template->load($data);
  }

  public function reject(){
    $data = array(
      'tanggal_masuk' => $this->input->post('tanggal_masuk',TRUE),
      'no_verifikasi' => $this->input->post('no_verifikasi',TRUE),
      'kode_ver' =>$this->input->post('kode_ver',TRUE),
      'keterangan' => $this->input->post('keterangan',TRUE),
      'mata_uang' => $this->input->post('mata_uang',TRUE),
      'jumlah' => $this->input->post('jumlah',TRUE),
      'alasan_revisi' => $this->input->post('alasan',true)
    );
    $dataResponse = array(
      'Lok_Dokumen' => 'reject',
    );
    $this->Jurnal_model->insert($data);
    $this->Jurnal_model->update_need_response($this->input->post('no_verifikasi', TRUE), $dataResponse);
    $this->session->set_flashdata('rejectMessage', 'Reject Success');
    redirect(base_url('jurnalis'));
  }

  public function approve(){
    $now = date('Y-m-d');
    $dataResponse = array(
      'Lok_Dokumen' => 'manager',
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

  public function customSearch(){
    $countResponse =$this->Jurnal_model->count_need_response();
    $datauser=$this->Jurnal_model->get_data_search();
    $data = array(
       'content'=>'jurnalis/dokumen/content_search',
       'navbar'=>'jurnalis/navbar',
       'sidebar'=>'jurnalis/sidebar',
       //'customSearch' =>'jurnalis/customSearch',
       'countResponse' => $countResponse,
       'datauser'=>$datauser,
       'module'=>'jurnalis',
       'titlePage'=>'jurnalis',
       'controller'=>'jurnalis'
      );
    $this->template->load($data);
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
