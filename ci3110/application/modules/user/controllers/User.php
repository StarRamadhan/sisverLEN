<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class User extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            if(($this->session->userdata('masuk') == false) || ($this->session->userdata('akses') != 'admin')){
            // $url=base_url('login');
            // redirect($url);
            echo "Gak boleh masuk";
            }else{
            // $url=base_url('user');
            // redirect($url);
            // $this->load->model('User_model');
            // $this->load->library('form_validation');
        }
      }

        public function index()
        {

          $datauser=$this->User_model->get_all();//panggil ke modell
          $datafield=$this->User_model->get_field();//panggil ke modell

           $data = array(
             'content'=>'user/user/content',
             'navbar'=>'user/user/navbar',
             'sidebar'=>'user/user/sidebar',
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
           $data = array(
             'content'=>'user/user/content',
             'navbar'=>'user/user/navbar',
             'sidebar'=>'user/user/sidebar',

             'action'=>'user/user/create_action',
             'module'=>'user',
             'titlePage'=>'user',
             'controller'=>'user'
            );
          $this->template->load($data);
        }

        public function edit($id_user){
          $dataedit=$this->User_model->get_by_id($id_user);
           $data = array(
             'content'=>'user/user/user_edit',
             'sidebar'=>'user/sidebar',
             'action'=>'user/user/update_action',
             'dataedit'=>$dataedit,
             'module'=>'user',
             'titlePage'=>'user',
             'controller'=>'user'
            );
          $this->template->load($data);
        }
public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
					'nama_user' => $this->input->post('nama_user',TRUE),
					'password_user' => $this->input->post('password_user',TRUE),
					'password2_user' => $this->input->post('password2_user',TRUE),
					'jabatan_user' => $this->input->post('jabatan_user',TRUE),
					'no_telp' => $this->input->post('no_telp',TRUE),
					'foto' => $this->input->post('foto',TRUE),

);

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user/user'));
        }
    }




    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id', TRUE));
        } else {
            $data = array(
					'nama_user' => $this->input->post('nama_user',TRUE),
					'password_user' => $this->input->post('password_user',TRUE),
					'password2_user' => $this->input->post('password2_user',TRUE),
					'jabatan_user' => $this->input->post('jabatan_user',TRUE),
					'no_telp' => $this->input->post('no_telp',TRUE),
					'foto' => $this->input->post('foto',TRUE),

);

            $this->User_model->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user/user'));
        }
    }

    public function delete($id_user)
    {
        $row = $this->User_model->get_by_id($id_user);

        if ($row) {
            $this->User_model->delete($id_user);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user/user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user/user'));
        }
    }

    public function _rules()
    {
$this->form_validation->set_rules('nama_user', 'nama_user', 'trim|required');
$this->form_validation->set_rules('password_user', 'password_user', 'trim|required');
$this->form_validation->set_rules('password2_user', 'password2_user', 'trim|required');
$this->form_validation->set_rules('jabatan_user', 'jabatan_user', 'trim|required');
$this->form_validation->set_rules('no_telp', 'no_telp', 'trim|required');
$this->form_validation->set_rules('foto', 'foto', 'trim|required');


	$this->form_validation->set_rules('id_user', 'id_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

    }

}
