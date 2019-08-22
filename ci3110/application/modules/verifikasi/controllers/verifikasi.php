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

    $datauser=$this->Verifikasi_model->get_all();//panggil ke modell
    $datafield=$this->Verifikasi_model->get_field();//panggil ke modell
    $dataverif=$this->Verifikasi_model->get_data_verif();//panggil ke modell
    $lastdate=$this->Verifikasi_model->get_last_date();
    //$lastnumber=$this->Verifikasi_model->get_last_num();

    // $dataverif2=$this->Verifikasi_model->get_data_verif2();//panggil ke modell
    // $dataverif3=$this->Verifikasi_model->get_data_verif3();//panggil ke modell

     $data = array(
//       'titleNavbar'=>'PT. LEN (PERSERO) - UNIT VERIFIKASI',
       'content'=>'verifikasi/content',
       'navbar'=>'verifikasi/navbar',
       'sidebar'=>'verifikasi/sidebar',
       'datauser'=>$datauser,
       'datafield'=>$datafield,
       'dataverif'=>$dataverif,
       'module'=>'verifikasi',
       'titlePage'=>'verifikasi',
       'controller'=>'verifikasi'
       //'js'=> 'verifikasi/js',
       // 'css'=>'user/user/css',
       // 'js'=>'user/user/js',
       //'lastnumber'=>$lastnumber,
      );
    $this->template->load($data);
  }

  public function create(){
    $lastdate=$this->Verifikasi_model->get_last_date();
    $lastnumber=$this->Verifikasi_model->get_last_num();
    //$lastnumber=$this->Verifikasi_model->get_last_num();
    //$numrows=$this->Verifikasi_model->get_num_row();
    //$testing=$this->Verifikasi_model->get_num_row($nownumber);
    //$datauser=$this->Verifikasi_model->get_all();//panggil ke modell
    //$datafield=$this->Verifikasi_model->get_field();//panggil ke modell
     $data = array(
       //'testing'=>$testing,
       //'numrows'=>$numrows,
       //'js'=> 'verifikasi/js',
       'content' => 'verifikasi/create_data',
       'sidebar'=>'verifikasi/sidebar',//Ini buat menu yang ditampilkan di module verifikasi {DIKIRIM KE TEMPLATE}
       'navbar'=>'verifikasi/navbar',
       'lastnumber'=>$lastnumber,
       'lastdate'=>$lastdate,
       'action'=>'verifikasi/create_action',
       'module'=>'verifikasi',
       'titlePage'=>'verifikasi',
       'controller'=>'verifikasi'
      );
    $this->template->load($data);
  }

  public function create_action()
      {
        //defining DATE
        $lastdate=$this->Verifikasi_model->get_last_date();
        //$numrows=$this->Verifikasi_model->get_num_row();
        $lastmonth= date("m", strtotime($lastdate->Tanggal_Masuk));
        $monthnow=date('m');
        $yearnow=date('Y');
        //CASE OF DATE FOR NUMBERING
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
//        $nownumber=($lastnumber->maks+1);

        // $numrows=$this->Verifikasi_model->get_num_row($nownumber,$monthnow,$yearnow);
        // if($numrows->num_rows() > 1){
        //   $nownumber=$nownumber+1;
        // }

        $timezone = date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');

        //MAKING PRIMARY KEY
        $pk1 = sprintf("%04s", $nownumber);
        $pk2 = $this->input->post('kode_ver');
        $pk3 = date("m/Y");
        //$pk3 = date("m/Y", strtotime($lastdate->Tanggal_Masuk));
        $primarykey = $pk1.'/'.$pk2.'/'.$pk3;
        //$pk2 =
        $data = array(
          'No' => $nownumber,
          'operator_id' => $this->input->post('operator_id',TRUE),
          'Tanggal_Masuk' => $now,
          'tgl_out_verif' => $now,
          'No_Verifikasi' => $primarykey,//$this->input->post('kode_ver',TRUE),
          //'No_Verifikasi' => $this->input->post('kode_ver',TRUE),
          'Kode_Ver' => $this->input->post('kode_ver',TRUE),
          'Mata_Uang' => $this->input->post('mata_uang',TRUE),
          'User' => $this->input->post('user',TRUE),
          'Keterangan' => $this->input->post('keterangan',TRUE),
          'Jumlah' => $this->input->post('jumlah',TRUE)
          //'operator_id' => $this->input->post('')
        );

        $this->Verifikasi_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(base_url('verifikasi'));
      }

  public function edit_profil($operator_id){
    $dataedit=$this->Verifikasi_model->get_by_id_profil($operator_id);
     $data = array(
       'content'=>'verifikasi/edit_profil',
       'sidebar'=>'verifikasi/sidebar',
       'navbar'=>'verifikasi/navbar',
       //'role'=>$this->Verifikasi_model->gender_enums('user' , 'position' ),
       'action'=>'verifikasi/verifikasi/update_action',
       'dataedit'=>$dataedit,
       'module'=>'verifikasi',
       'titlePage'=>'verifikasi',
       'controller'=>'verifikasi'
      );
    $this->template->load($data);
  }



  public function update_action()
  {
          $data = array(
            'username' => $this->input->post('username',TRUE),
            'password_enc' => md5($this->input->post('password',TRUE)),
            'password' => $this->input->post('password',TRUE),
            'position' => $this->input->post('position',TRUE),
            'phone_number' => $this->input->post('phone_number',TRUE),
          );
          $this->Verifikasi_model->update($this->input->post('operator_id', TRUE), $data);
          $this->session->set_flashdata('flashMessage', 'Update Record Success');
          //echo "berhasil";
          redirect(base_url('verifikasi'));

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
