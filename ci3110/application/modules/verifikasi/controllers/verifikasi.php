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
    $dataToday = $this->Verifikasi_model->get_data_today();
    $dataApprovedJurnal = $this->Verifikasi_model->get_data_approved_jurnal();
    $dataRejected = $this->Verifikasi_model->get_data_rejected();
    $dataFinished = $this->Verifikasi_model->get_data_finished();
    $data = array(
       'content'=>'verifikasi/content',
       'navbar'=>'verifikasi/navbar',
       'sidebar'=>'verifikasi/sidebar',
       'datauser'=>$datauser,
       'countResponse' => $countResponse,
       'count_rejected' => $count_rejected,
       'datafield'=>$datafield,
       'dataToday' => $dataToday,
       'dataApprovedJurnal'=> $dataApprovedJurnal,
       'dataRejected' => $dataRejected,
       'dataFinished'=>$dataFinished,
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
       'customSearch' =>'verifikasi/customSearch',
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
    $ses_category = $this->input->post('category',TRUE);
    $ses_categoryValue = $this->input->post('categoryValue',TRUE);
    $this->session->set_flashdata('ses_startdate', $ses_startdate);
    $this->session->set_flashdata('ses_enddate', $ses_enddate);
    $this->session->set_flashdata('ses_by', $ses_by);
    $this->session->set_flashdata('ses_category', $ses_category);
    $this->session->set_flashdata('ses_categoryValue', $ses_categoryValue);
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
      'Tgl_Out_Verif' => '',
      'Jt_Jurnalis' =>'',
      //'Jt_Verif' => $jatuh_tempo
    );
    $this->Verifikasi_model->insert_reject($data);
    $this->Verifikasi_model->update_need_response($this->input->post('no_verifikasi', TRUE), $dataResponse);
    $this->session->set_flashdata('rejectMessage', 'Reject Success');
    redirect(base_url('verifikasi/document_need_response'));
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
      'Tgl_Out_Jurnal' =>$tgl_out_role,
      'Jt_Manager' =>$jatuh_tempo
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
        $timezone = date_default_timezone_set('Asia/Jakarta');
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
          if ($numrows->nomor>1) {
            $lastnumber=$lastnumber+1;
          }

        }
        $now = date('Y-m-d H:i:s');
        //PEMBUATAN KODE UNIK
        $pk1 = sprintf("%04s", $nownumber);
        $pk2 = $this->input->post('kode_ver');
        $pk3 = date("m/Y");
        $primarykey = $pk1.'/'.$pk2.'/'.$pk3;

        $role = $this->session->userdata('akses');
        if ($role=='verifikasi1') {
            $lokasi = "Jurnalis 1";
        }elseif ($role=='verifikasi2') {
            $lokasi = "Jurnalis 2";
        }elseif ($role=='verifikasi3') {
            $lokasi = "Jurnalis 3";
        }


        //perhitungan jika input diatas jam 14.00
        $tgl_input = $now;
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

        $data = array(
          'No' => $nownumber,
          'Operator_id' => $this->input->post('operator_id',TRUE),
          'Tanggal_Masuk' => $now,
          'tgl_out_verif' => $tgl_out_role,
          'No_Verifikasi' => $primarykey,
          'Kode_Ver' => $this->input->post('kode_ver',TRUE),
          'Mata_Uang' => $this->input->post('mata_uang',TRUE),
          'User' => $this->input->post('user',TRUE),
          'Keterangan' => $this->input->post('keterangan',TRUE),
          'Jumlah' => $this->input->post('jumlah',TRUE),
          'Lok_Dokumen' => $lokasi,
          'Jt_Jurnalis' => $jatuh_tempo
        );
        $this->Verifikasi_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(base_url('verifikasi'));
      }

    public function custom_create(){
      $count_rejected =$this->Verifikasi_model->count_rejected();
      $countResponse =$this->Verifikasi_model->count_need_response();
      $lastdate=$this->Verifikasi_model->get_last_date();
      $lastnumber=$this->Verifikasi_model->get_last_num();
       $data = array(
         'content' => 'verifikasi/create_custom_date',
         'sidebar'=>'verifikasi/sidebar',//Ini buat menu yang ditampilkan di module verifikasi {DIKIRIM KE TEMPLATE}
         'navbar'=>'verifikasi/navbar',
         'lastnumber'=>$lastnumber,
         'lastdate'=>$lastdate,
         'countResponse' => $countResponse,
         'count_rejected' => $count_rejected,
         'action'=>'verifikasi/custom_create_action',
         'module'=>'verifikasi',
         'titlePage'=>'verifikasi',
         'controller'=>'verifikasi'
        );
      $this->template->load($data);
    }
    public function custom_create_action()
        {
          //INISIALISASI TANGGAL
          $timezone = date_default_timezone_set('Asia/Jakarta');
          $now1 = $this->input->post('customDate',TRUE);
          $now2 = date('Y-m-d H:i:s');
          $month1= date("m", strtotime($now1));
          $month2= date("m", strtotime($now2));
          if ($month1==$month2) {
            $lastdate=$this->Verifikasi_model->get_last_date();
          }elseif ($month1!=$month2) {
            $lastdate=$this->Verifikasi_model->get_last_date_custom();
          }

          $lastmonth= date("m", strtotime($lastdate->Tanggal_Masuk));
          //$monthnow=date('m', strtotime($now));
          $monthnow=date('m', strtotime($now2));
          $yearnow=date('Y');

          //PENENTUAN NOMOR BERDASARKAN TANGGAL
          if ($lastmonth!=$monthnow) {
            $lastnumber=$this->Verifikasi_model->get_last_num_custom();
            $nownumber=($lastnumber->maks+1);
            $numrows=$this->Verifikasi_model->get_num_row($nownumber);
            if ($numrows>1) {
              $lastnumber=$lastnumber+1;
            }
          }elseif ($lastmonth==$monthnow) {
            $lastnumber=$this->Verifikasi_model->get_last_num();
            $nownumber=($lastnumber->maks+1);
            $numrows=$this->Verifikasi_model->get_num_row($nownumber);
            if ($numrows>1) {
              $lastnumber=$lastnumber+1;
            }
          }

          //PEMBUATAN KODE UNIK
          $pk1 = sprintf("%04s", $nownumber);
          $pk2 = $this->input->post('kode_ver');
          // $pk3 = date("m/Y");
          $pk3 = date("m/Y", strtotime($now1));
          $primarykey = $pk1.'/'.$pk2.'/'.$pk3;

          $role = $this->session->userdata('akses');
          if ($role=='verifikasi1') {
              $lokasi = "Jurnalis 1";
          }elseif ($role=='verifikasi2') {
              $lokasi = "Jurnalis 2";
          }elseif ($role=='verifikasi3') {
              $lokasi = "Jurnalis 3";
          }
          $hoursNow = date('H:i:s');

          //perhitungan jika input diatas jam 14.00
          $tgl_input = $now2;
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

          $data = array(
            'No' => $nownumber,
            'Operator_id' => $this->input->post('operator_id',TRUE),
            'Tanggal_Masuk' => $now1." ".$hoursNow,
            'Tgl_Out_Verif' => $tgl_out_role,
            'No_Verifikasi' => $primarykey,
            'Kode_Ver' => $this->input->post('kode_ver',TRUE),
            'Mata_Uang' => $this->input->post('mata_uang',TRUE),
            'User' => $this->input->post('user',TRUE),
            'Keterangan' => $this->input->post('keterangan',TRUE),
            'Jumlah' => $this->input->post('jumlah',TRUE),
            'Lok_Dokumen' => $lokasi,
            'Jt_Jurnalis' => $jatuh_tempo
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
            'Username' => $this->input->post('username',TRUE),
            'Password_enc' => md5($this->input->post('password',TRUE)),
            'Password' => $this->input->post('password',TRUE),
            'Phone_number' => $this->input->post('phone_number',TRUE),
          );
          $this->Verifikasi_model->update($this->input->post('operator_id', TRUE), $data);
          $this->session->set_flashdata('flashMessage', 'Update Record Success');
          redirect(base_url('verifikasi'));
  }
}
