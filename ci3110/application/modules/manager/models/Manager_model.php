<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class Manager_model extends CI_Model
    {

        public $table = 'dokumen';
        public $id = 'No_Verifikasi';
        public $tgl_masuk = 'Tanggal_Masuk';
        public $order = 'DESC';
        public $operator_id = 'operator_id';

        public $tableProfil = "operator";
        public $tableRevisi = 'revisi';
        public $idRevisi = 'No_Verifikasi';

        function __construct()
        {
            parent::__construct();
        }

        // get all
        function get_all()
        {
            $table=$this->table;
            $sql=$this->db->query("SELECT * FROM dokumen ORDER BY Tanggal_Masuk DESC");
            return $sql->result();
            // $this->db->order_by($this->tgl_masuk, $this->order);
            // return $this->db->get($this->table)->result();
        }

        function get_data_manager(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.*,operator.* FROM dokumen,`operator` WHERE dokumen.`operator_id`=`operator`.`operator_id`"); //ganti * untuk custom field yang ditampilkan pada table
          return $sql->result();
        }

        /////////////////////////////////////////////
        function get_all_acc()
        {
            $table=$this->table;
            $sql=$this->db->query("SELECT * FROM dokumen WHERE Lok_Dokumen = 'manager'  ORDER BY Tanggal_Masuk DESC");
            return $sql->result();
            // $this->db->order_by($this->tgl_masuk, $this->order);
            // return $this->db->get($this->table)->result();
        }
        /////////////////////////////////////////////
        function get_all_need_response()
        {
            $table=$this->table;
            $sql=$this->db->query("SELECT * FROM dokumen WHERE Lok_Dokumen = 'manager' ORDER BY Tanggal_Masuk DESC");
            return $sql->result();
            // $this->db->order_by($this->tgl_masuk, $this->order);
            // return $this->db->get($this->table)->result();
        }
        function count_need_response()
        {
            $table=$this->table;
            $sql=$this->db->query("SELECT * FROM dokumen WHERE Lok_Dokumen = 'manager' ORDER BY Tanggal_Masuk DESC");
            return $sql->num_rows();
            // $this->db->order_by($this->tgl_masuk, $this->order);
            // return $this->db->get($this->table)->result();
        }
        function update_need_response($no_verifikasi, $dataResponse)
        {
          $this->db->where($this->id, $no_verifikasi);
          $this->db->update($this->table, $dataResponse);
        }
        /////////////////////////////////////////////
        // get data by id
        function get_by_id($id)
        {
            $this->db->where($this->id, $id);
            return $this->db->get($this->table)->row();
        }

  //get DATA SEARCH
        function get_data_search(){
          $table=$this->table;
          $start=$this->input->post('dateStart',TRUE);
          $end=$this->input->post('dateEnd',TRUE);
          $by = $this->input->post('by',true);
          $id_login = $this->session->userdata('ses_id');

          if ((empty($start)) && (empty($end))) {
            $sql=$this->db->query("SELECT * FROM dokumen");
            return $sql->result();
          }if ((!empty($start)) && (!empty($end))) {
            $sql=$this->db->query("SELECT * FROM dokumen where Tgl_Out_Manager BETWEEN '$start' AND '$end' ");
            return $sql->result();
          }if ((!empty($start)) && (empty($end))) {
            $sql=$this->db->query("SELECT * FROM dokumen where Tgl_Out_Manager = '$start'");
            return $sql->result();
          }if ((empty($start)) && (!empty($end))) {
            $sql=$this->db->query("SELECT * FROM dokumen WHERE Tgl_Out_Manager = '$end'");
            return $sql->result();
          }

        }



        // insert data
        function insert($data)
        {
            $this->db->insert($this->tableRevisi, $data);
        }

        //edit profil query
        function get_by_id_profil($operator_id)
        {
            $this->db->where($this->operator_id, $operator_id);
            return $this->db->get($this->tableProfil)->row();
        }

        // update data PROFIL
        function update($operator_id, $data)
        {
            $this->db->where($this->operator_id, $operator_id);
            $this->db->update($this->tableProfil, $data);
        }

        // delete data
        function delete($id)
        {
            $this->db->where($this->id, $id);
            $this->db->delete($this->table);
        }

        // update data
        function reject($operator_id, $data)
        {
            $this->db->where($this->operator_id, $operator_id);
            $this->db->update($this->table_profil, $data);
        }

    }

    /* Crudlab by Kostlab */
    /* Please DO NOT modify this information : */
    /* Learn and Earn */
