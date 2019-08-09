<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More

    if($this->session->userdata('masuk')!=TRUE){
      echo "Gak boleh masuk";
      //redirect(base_url('login'));
    }
    if($this->session->userdata('akses')!='admin'){
      //redirect(redirect($_SERVER['HTTP_REFERER']));
      echo "Anda tidak punya wewenang disini";
    }

    $this->load->model(array('Admin_model'));

  }

  public function index()
  {

    $datauser=$this->Admin_model->get_all();//panggil ke modell
    $datafield=$this->Admin_model->get_field();//panggil ke modell

     $data = array(
       'content'=>'admin/content',
       'navbar'=>'admin/navbar',
       'sidebar'=>'admin/sidebar',
       // 'css'=>'user/user/css',
       // 'js'=>'user/user/js',
       'datauser'=>$datauser,
       'datafield'=>$datafield,
       'module'=>'user',
       'titlePage'=>'user',
       'controller'=>'user'
      );
    $this->template->load($data);
  }
  public function create(){
    $datauser=$this->User_model->get_all();//panggil ke modell
    $datafield=$this->User_model->get_field();//panggil ke modell
     $data = array(
       'content' => 'admin/content',
       'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
       'navbar'=>'admin/navbar',

       'action'=>'admin/create_action',
       'module'=>'admin',
       'titlePage'=>'admin',
       'controller'=>'admin'
      );
    $this->template->load($data);
  }
}
