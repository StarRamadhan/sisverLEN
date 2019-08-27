<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class Revisi_model extends CI_Model
    {

        public $table = 'revisi';
        public $id = 'No';
        public $order = 'DESC';
        public $table_dokumen = 'dokumen';
        public $id_dokumen = 'No_Verifikasi';

        function __construct()
        {
            parent::__construct();
        }

        // get all
        function get_all()
        {
            $this->db->order_by($this->id, $this->order);
            return $this->db->get($this->table)->result();
        }

        function get_data_verif(){
          $table=$this->table;
          //$sql=$this->db->query("SELECT dokumen.*,operator.* FROM dokumen,`operator` WHERE dokumen.`operator_id`=`operator`.`operator_id`"); //ganti * untuk custom field yang ditampilkan pada table
          $sql=$this->db->query("SELECT revisi.*,dokumen.* FROM revisi,`dokumen` WHERE revisi.`No_Verifikasi`=`dokumen`.`No_Verifikasi`"); //ganti * untuk custom field yang ditampilkan pada table
          return $sql->list_fields();
        }

        //get field
        function get_field(){
          $table=$this->table;
          $sql=$this->db->query("SELECT * FROM `$table`"); //ganti * untuk custom field yang ditampilkan pada table
          return $sql->list_fields();
        }

        // get data by id
        function get_by_id($id)
        {
            $this->db->where($this->id, $id);
            return $this->db->get($this->table)->row();
        }

        function get_by_id_dokumen($id_dokumen)
        {
            $this->db->where($this->id, $id_dokumen);
            return $this->db->get($this->$table_dokumen)->row();
          }


        // insert data
        function insert($data)
        {
            $this->db->insert($this->table, $data);
        }

        // update data
        function update($id_dokumen, $data_dokumen)
        {
            $this->db->where($this->id_dokumen, $id_dokumen);
            $this->db->update($this->table_dokumen, $data_dokumen);

        }
        function update_revisi($id, $data)
        {
            $this->db->where($this->id, $id);
            $this->db->update($this->table, $data);

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
