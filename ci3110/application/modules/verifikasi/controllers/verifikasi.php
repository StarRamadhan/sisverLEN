<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class verifikasi extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More

    if (($this->session->userdata('masuk')==true) && (($this->session->userdata('akses')=='verifikasi1') || ($this->session->userdata('akses')=='verifikasi2') || ($this->session->userdata('akses')=='verifikasi3'))) {
      $this->load->model(array('Verifikasi_model'));
      $this->load->library('form_validation');
    }else{
      redirect(base_url('login'));
    }
  }

  public function index()
  {
    $count_rejected =$this->Verifikasi_model->count_rejected();
    $countResponse =$this->Verifikasi_model->count_need_response();
    $datauser=$this->Verifikasi_model->get_all();//panggil ke modell
    $datafield=$this->Verifikasi_model->get_field();//panggil ke modell
    $lastdate=$this->Verifikasi_model->get_last_date();
    $data = array(
       'content'=>'verifikasi/content',
       'navbar'=>'verifikasi/navbar',
       'sidebar'=>'verifikasi/sidebar',
       'datauser'=>$datauser,
       'countResponse' => $countResponse,
       'count_rejected' => $count_rejected,
       'datafield'=>$datafield,
       'customSearch' =>'verifikasi/customSearch',
       // 'dataverif'=>$dataverif,
       'module'=>'verifikasi',
       'titlePage'=>'verifikasi',
       'controller'=>'verifikasi'
      );
    $this->template->load($data);
  }

  public function customSearch(){
    $countResponse =$this->Verifikasi_model->count_need_response();
    $datauser=$this->Verifikasi_model->get_data_search();
    $count_rejected =$this->Verifikasi_model->count_rejected();
    $data = array(
       'content'=>'verifikasi/content_search',
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
    $ses_startdate = $this->input->post('dateStart',TRUE);
    $ses_enddate = $this->input->post('dateEnd',TRUE);
    $ses_by = $this->input->post('by',TRUE);
    $this->session->set_flashdata('ses_startdate', $ses_startdate);
    $this->session->set_flashdata('ses_enddate', $ses_enddate);
    $this->session->set_flashdata('ses_by', $ses_by);
    $this->template->load($data);

  }

  public function document_need_response(){
    $count_rejected =$this->Verifikasi_model->count_rejected();
    $countResponse =$this->Verifikasi_model->count_need_response();
    $datauser=$this->Verifikasi_model->get_all_need_response();//panggil ke modell
    //$dataverif=$this->Manager_model->get_data_jurnal();//panggil ke modell
    $data = array(
       'content'=>'verifikasi/content_need_response',
       'navbar'=>'verifikasi/navbar',
       'sidebar'=>'verifikasi/sidebar',
       'datauser'=>$datauser,
       'countResponse' => $countResponse,
       'count_rejected' => $count_rejected,
       //'dataverif'=>$dataverif,
       'module'=>'verifikasi',
       'titlePage'=>'verifikasi',
       'controller'=>'verifikasi',
       'reject'=>'verifikasi/verifikasi/reject',
       'approve'=>'verifikasi/verifikasi/approve'
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
    $this->Verifikasi_model->insert_reject($data);
    $this->Verifikasi_model->update_need_response($this->input->post('no_verifikasi', TRUE), $dataResponse);
    $this->session->set_flashdata('rejectMessage', 'Reject Success');
    redirect(base_url('verifikasi/document_need_response'));
  }


  public function approve(){
    $now = date('Y-m-d');
    $dataResponse = array(
      'Lok_Dokumen' => 'manager',
      'Tgl_Out_Jurnal' =>$now
    );
    $this->Verifikasi_model->update_need_response($this->input->post('no_verifikasi', TRUE), $dataResponse);
    $this->session->set_flashdata('approveMessage', 'Approve Success');
    redirect(base_url('verifikasi/document_need_response'));
  }


  public function create(){
    $count_rejected =$this->Verifikasi_model->count_rejected();
    $countResponse =$this->Verifikasi_model->count_need_response();
    $lastdate=$this->Verifikasi_model->get_last_date();
    $lastnumber=$this->Verifikasi_model->get_last_num();
     $data = array(
       'content' => 'verifikasi/create_data',
       'sidebar'=>'verifikasi/sidebar',//Ini buat menu yang ditampilkan di module verifikasi {DIKIRIM KE TEMPLATE}
       'navbar'=>'verifikasi/navbar',
       'lastnumber'=>$lastnumber,
       'lastdate'=>$lastdate,
       'countResponse' => $countResponse,
       'count_rejected' => $count_rejected,
       'action'=>'verifikasi/create_action',
       'module'=>'verifikasi',
       'titlePage'=>'verifikasi',
       'controller'=>'verifikasi'
      );
    $this->template->load($data);
  }

  public function create_action()
      {
        //INISIALISASI TANGGAL
        $lastdate=$this->Verifikasi_model->get_last_date();
        $lastmonth= date("m", strtotime($lastdate->Tanggal_Masuk));
        $monthnow=date('m');
        $yearnow=date('Y');

        //PENENTUAN NOMOR BERDASARKAN TANGGAL
        if ($lastmonth!=$monthnow) {
          $lastnumber=1;
          $nownumber=($lastnumber->maks+1);
        }elseif ($lastmonth==$monthnow) {
          $lastnumber=$this->Verifikasi_model->get_last_num();
          $nownumber=($lastnumber->maks+1);
          $numrows=$this->Verifikasi_model->get_num_row($nownumber);
          if ($num_rows->nomor>1) {
            $lastnumber=$lastnumber+1;
          }

        }
        $timezone = date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');
        //PEMBUATAN KODE UNIK
        $pk1 = sprintf("%04s", $nownumber);
        $pk2 = $this->input->post('kode_ver');
        $pk3 = date("m/Y");
        $primarykey = $pk1.'/'.$pk2.'/'.$pk3;

        $role = $this->session->userdata('akses');
        if ($role=='verifikasi1') {
            $lokasi = "jurnalis";
        }else{
            $lokasi = $role."/jurnalis";
        }


        $data = array(
          'No' => $nownumber,
          'operator_id' => $this->input->post('operator_id',TRUE),
          'Tanggal_Masuk' => $now,
          'tgl_out_verif' => $now,
          'No_Verifikasi' => $primarykey,
          'Kode_Ver' => $this->input->post('kode_ver',TRUE),
          'Mata_Uang' => $this->input->post('mata_uang',TRUE),
          'User' => $this->input->post('user',TRUE),
          'Keterangan' => $this->input->post('keterangan',TRUE),
          'Jumlah' => $this->input->post('jumlah',TRUE),
          'Lok_Dokumen' => $lokasi
        );
        $this->Verifikasi_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(base_url('verifikasi'));
      }

  //LOAD HALAMAN EDIT
  public function edit_profil($operator_id){
    $countResponse =$this->Verifikasi_model->count_need_response();
    $dataedit=$this->Verifikasi_model->get_by_id_profil($operator_id);
    $count_rejected =$this->Verifikasi_model->count_rejected();

     $data = array(
       'content'=>'verifikasi/edit_profil',
       'sidebar'=>'verifikasi/sidebar',
       'navbar'=>'verifikasi/navbar',
       'action'=>'verifikasi/verifikasi/update_action',
       'dataedit'=>$dataedit,
       'count_rejected' => $count_rejected,
       'countResponse' => $countResponse,
       'module'=>'verifikasi',
       'titlePage'=>'verifikasi',
       'controller'=>'verifikasi'
      );
    $this->template->load($data);
  }

  //AKSI EDIT DATA
  public function update_action()
  {
          $data = array(
            'username' => $this->input->post('username',TRUE),
            'password_enc' => md5($this->input->post('password',TRUE)),
            'password' => $this->input->post('password',TRUE),
            'phone_number' => $this->input->post('phone_number',TRUE),
          );
          $this->Verifikasi_model->update($this->input->post('operator_id', TRUE), $data);
          $this->session->set_flashdata('flashMessage', 'Update Record Success');
          redirect(base_url('verifikasi'));
  }
}
