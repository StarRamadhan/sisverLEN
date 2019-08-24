<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class Manager_model extends CI_Model
    {

        public $table = 'dokumen';
        public $id = 'No_Verifikasi';
        public $tgl_masuk = 'Tanggal_Masuk';
        public $order = 'DESC';

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
            $sql=$this->db->query("SELECT * FROM dokumen WHERE Lok_Dokumen = 'finish'  ORDER BY Tanggal_Masuk DESC");
            return $sql->result();
            // $this->db->order_by($this->tgl_masuk, $this->order);
            // return $this->db->get($this->table)->result();
        }
        /////////////////////////////////////////////
        function get_all_not_acc()
        {
            $table=$this->table;
            $sql=$this->db->query("SELECT * FROM dokumen WHERE Lok_Dokumen = 'manager'  ORDER BY Tanggal_Masuk DESC");
            return $sql->result();
            // $this->db->order_by($this->tgl_masuk, $this->order);
            // return $this->db->get($this->table)->result();
        }
        /////////////////////////////////////////////
        // get data by id
        function get_by_id($id)
        {
            $this->db->where($this->id, $id);
            return $this->db->get($this->table)->row();
        }

        // insert data
        function insert($data)
        {
            $this->db->insert($this->table, $data);
        }

        //edit profil query
        function get_by_id_profil($operator_id)
        {
            $this->db->where($this->operator_id, $operator_id);
            return $this->db->get($this->table_profil)->row();
        }
        // update data
        function update($operator_id, $data)
        {
            $this->db->where($this->operator_id, $operator_id);
            $this->db->update($this->table_profil, $data);
        }

        // delete data
        function delete($id)
        {
            $this->db->where($this->id, $id);
            $this->db->delete($this->table);
        }

    }

    /* Crudlab by Kostlab */
    /* Please DO NOT modify this information : */
    /* Learn and Earn */
