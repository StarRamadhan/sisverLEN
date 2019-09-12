<?php
class Page extends MY_Controller{
  function __construct(){
    parent::__construct();
    //validasi jika user belum login
    if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect(base_url('login'));
        }
  }

  function index(){
    $this->load->view('v_dashboard');
  }

  function data_admin(){
    // function ini hanya boleh diakses oleh admin
    if($this->session->userdata('akses')=='admin'){
      $this->load->view('admin/admin_v');
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }
  function data_manager(){
    // function ini hanya boleh diakses oleh manager
    if($this->session->userdata('akses')=='manager'){
      $this->load->view('manager/manager_v');
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }
  function data_jurnal(){
    // function ini hanya boleh diakses oleh jurnal
    if($this->session->userdata('akses')=='jurnal'){
      $this->load->view('jurnal/jurnal_v');
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }
  function data_verifikasi(){
    // function ini hanya boleh diakses oleh admin dan dosen
    if($this->session->userdata('akses')=='verifikasi'){
      $this->load->view('jurnal/verifikasi_v');
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }
}
