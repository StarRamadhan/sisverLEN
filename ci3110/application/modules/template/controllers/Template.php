<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class template extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {

  }

  function load($data=NULL){
    $this->load->view('index', $data);

  }

}
