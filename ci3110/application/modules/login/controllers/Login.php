<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    //$this->load->model(array('Dbs'));
    $this->load->model('login_model');
  }

  function index()
  {
    $this->load->view('Login_v');
  }

  function auth(){//Proses pengecekan login
    $username = $this->input->post('username');
		$password = $this->input->post('password');
    $cek_user=$this->login_model->auth_user($username,$password);
    if($cek_user->num_rows() > 0){ //jika login sebagai Admin
      $data=$cek_user->row_array();
      $this->session->set_userdata('masuk',TRUE);
      echo $data['position'];

      if ($data['position']=='admin') {//AKSES KE Admin
        $this->session->set_userdata('akses','admin');
        $this->session->set_userdata('ses_id',$data['operator_id']);
        $this->session->set_userdata('ses_nama',$data['username']);
        redirect(base_url('admin/'));
      }if ($data['position']=='manager') {//AKSES KE Manager
        $this->session->set_userdata('akses','manager');
        $this->session->set_userdata('ses_id',$data['operator_id']);
        $this->session->set_userdata('ses_nama',$data['username']);
        redirect(base_url('manager'));
      }if ($data['position']=='jurnalis') {//AKSES KE Jurnal
        $this->session->set_userdata('akses','jurnalis');
        $this->session->set_userdata('ses_id',$data['operator_id']);
        $this->session->set_userdata('ses_nama',$data['username']);
        redirect(base_url('jurnalis'));
      }if (($data['position']=='verifikasi1') || ($data['position']=='verifikasi2') || ($data['position']=='verifikasi3')) {//AKSES KE Verifikasi
        if ($data['position'] == 'verifikasi1') {
          $this->session->set_userdata('akses','verifikasi1');
        }elseif ($data['position'] == 'verifikasi2') {
          $this->session->set_userdata('akses','verifikasi2');
        }elseif ($data['position'] == 'verifikasi3') {
          $this->session->set_userdata('akses','verifikasi3');
        }
        //$this->session->set_userdata('akses','verifikasi');
        $this->session->set_userdata('ses_id',$data['operator_id']);
        $this->session->set_userdata('ses_nama',$data['username']);
        redirect(base_url('verifikasi/'));
      }
		}else{
      $this->session->set_flashdata('flashMessage', 'Username dan Password Salah');
      redirect(base_url('login'));
		}
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


  function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

}
