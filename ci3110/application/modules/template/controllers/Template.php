<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $data = array(
       'dokJan' => $this->Manager_model->count_all_doc_thisyear('dokumen','1'),
       'dokFeb' => $this->Manager_model->count_all_doc_thisyear('dokumen','2'),
       'dokMar' => $this->Manager_model->count_all_doc_thisyear('dokumen','3'),
       'dokApr' => $this->Manager_model->count_all_doc_thisyear('dokumen','4'),
       'dokMei' => $this->Manager_model->count_all_doc_thisyear('dokumen','5'),
       'dokJun' => $this->Manager_model->count_all_doc_thisyear('dokumen','6'),
       'dokJul' => $this->Manager_model->count_all_doc_thisyear('dokumen','7'),
       'dokAgs' => $this->Manager_model->count_all_doc_thisyear('dokumen','8'),
       'dokSep' => $this->Manager_model->count_all_doc_thisyear('dokumen','9'),
       'dokOkt' => $this->Manager_model->count_all_doc_thisyear('dokumen','10'),
       'dokNov' => $this->Manager_model->count_all_doc_thisyear('dokumen','11'),
       'dokDes' => $this->Manager_model->count_all_doc_thisyear('dokumen','12'),

       'rejJan' => $this->Manager_model->count_all_doc_thisyear('revisi','1'),
       'rejFeb' => $this->Manager_model->count_all_doc_thisyear('revisi','2'),
       'rejMar' => $this->Manager_model->count_all_doc_thisyear('revisi','3'),
       'rejApr' => $this->Manager_model->count_all_doc_thisyear('revisi','4'),
       'rejMei' => $this->Manager_model->count_all_doc_thisyear('revisi','5'),
       'rejJun' => $this->Manager_model->count_all_doc_thisyear('revisi','6'),
       'rejJul' => $this->Manager_model->count_all_doc_thisyear('revisi','7'),
       'rejAgs' => $this->Manager_model->count_all_doc_thisyear('revisi','8'),
       'rejSep' => $this->Manager_model->count_all_doc_thisyear('revisi','9'),
       'rejOkt' => $this->Manager_model->count_all_doc_thisyear('revisi','10'),
       'rejNov' => $this->Manager_model->count_all_doc_thisyear('revisi','11'),
       'rejDes' => $this->Manager_model->count_all_doc_thisyear('revisi','12'),

       'module'=>'manager',
       'titlePage'=>'manager',
       'controller'=>'manager',
       'start' => $this->input->post('dateStart',TRUE),
       'end' => $this->input->post('dateEnd',TRUE),
      );
  }

  function load($data=NULL){
    $this->load->view('index', $data);

  }

}
