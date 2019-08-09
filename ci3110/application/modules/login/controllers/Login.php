<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Dbs'));
    $this->load->model('login_model');
  }

  function index()
  {
    $this->load->view('Login_v');
  }

  function auth(){//Proses pengecekan login
    $username = $this->input->post('username');
		$password = $this->input->post('password');
    //$cek_user=$this->login_model->auth_dosen($username,$password);
		// $where = array(
		// 	'nama_user' => $username,
		// 	'password_user' => md5($password)
		// 	);
		// $sql = $this->Dbs->check("user",$where);//ubah user menjadi nama table user didatabase saat ini
    // $check=$sql->num_rows();
    // if($check > 0){
    //   $data=$check->row_array();
    $cek_user=$this->login_model->auth_user($username,$password);
    if($cek_user->num_rows() > 0){ //jika login sebagai Admin
      $data=$cek_user->row_array();
      $this->session->set_userdata('masuk',TRUE);
      echo $data['jabatan_user'];

      if ($data['jabatan_user']=='admin') {//AKSES KE Admin
        $this->session->set_userdata('akses','admin');
        $this->session->set_userdata('ses_id',$data['id_user']);
        $this->session->set_userdata('ses_nama',$data['nama_user']);
        redirect(base_url('admin/'));
      }if ($data['jabatan_user']=='manager') {//AKSES KE Manager
        $this->session->set_userdata('akses','manager');
        $this->session->set_userdata('ses_id',$data['id_user']);
        $this->session->set_userdata('ses_nama',$data['nama_user']);
        redirect(base_url('user/'));
      }if ($data['jabatan_user']=='jurnal') {//AKSES KE Jurnal
        $this->session->set_userdata('akses','jurnal');
        $this->session->set_userdata('ses_id',$data['id_user']);
        $this->session->set_userdata('ses_nama',$data['nama_user']);
        redirect('page');
      }if ($data['jabatan_user']=='verifikasi1') {//AKSES KE ADMIN
        $this->session->set_userdata('akses','verifikasi');
        $this->session->set_userdata('ses_id',$data['id_user']);
        $this->session->set_userdata('ses_nama',$data['nama_user']);
        redirect('page');
      }if ($data['jabatan_user']=='verifikasi2') {//AKSES KE Verifikasi 2
        $this->session->set_userdata('akses','verifikasi');
        $this->session->set_userdata('ses_id',$data['id_user']);
        $this->session->set_userdata('ses_nama',$data['nama_user']);
        redirect('page');
      }if ($data['jabatan_user']=='verifikasi3') {//AKSES KE Verifikasi 3
        $this->session->set_userdata('akses','verifikasi');
        $this->session->set_userdata('ses_id',$data['id_user']);
        $this->session->set_userdata('ses_nama',$data['nama_user']);
        redirect('page');
      }
      //Kalo login berhasil eksekusi disini
      // $ket = "berhasil login";
      // echo $ket;
		}else{
      $this->session->set_flashdata('flashMessage', 'Username dan Password Salah');
      redirect(base_url('login'));
		}
  }




  function randomPassword($length = 3) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

public function email($subject,$isi,$emailtujuan){

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.gmail.com';
$config['smtp_port'] = '465';
$config['smtp_user'] = 'shopagansta@gmail.com';
$config['smtp_pass'] = 'faztars123'; //ini pake akun pass google email
$config['mailtype'] = 'html';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = 'TRUE';
$config['newline'] = "\r\n";

$this->load->library('email', $config);
$this->email->initialize($config);

$this->email->from('shopagansta@gmail.com');
$this->email->to($emailtujuan);
$this->email->subject($subject);
$this->email->message($isi);
$this->email->set_mailtype('html');
$this->email->send();
}

  function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}



  // function reset(){
  //   $email=$this->input->post('email');
  //   $where = array(
	// 		'email' => $email,
	// 		);
	// 	$sql = $this->Dbs->check("user",$where);
  //   $check=$sql->num_rows();
	// 	if($check > 0){
  //     $getdatauser=$sql->result();
  //     $passwordBaru="pwBaru".$this->randomPassword();
  //     $username=$getdatauser[0]->username;
  //     $data = array(
  //       'password' => md5($passwordBaru)
  //     );
  //     $this->User_model->update($username,$data);
  //     $this->email("Info Akun","Password Baru Anda : ".$passwordBaru,$email);
  //     $this->session->set_flashdata('flashMessage', 'Password baru telah terkirim,silahkan cek email anda');
  //     redirect(base_url('login'));
  //   }else{
  //     $this->session->set_flashdata('flashMessage', 'Email yang anda masukan belum pernah didaftarkan');
  //     redirect(base_url('login'));
  //   }
  //
  // }

}
