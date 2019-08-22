<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class Verifikasi_model extends CI_Model
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
            $sql=$this->db->query("SELECT * FROM dokumen WHERE Status_Dokumen = 'aktif'order by Tanggal_Masuk DESC");
            return $sql->result();
            // $this->db->order_by($this->tgl_masuk, $this->order);
            // return $this->db->get($this->table)->result();
        }

        function get_data_verif(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.*,operator.* FROM dokumen,`operator` WHERE dokumen.`operator_id`=`operator`.`operator_id`"); //ganti * untuk custom field yang ditampilkan pada table
          return $sql->result();
        }

        function get_last_num(){
          $table=$this->table;
          //$sql=$this->db->query("SELECT No from dokumen order by Tanggal_Masuk DESC limit 1"); //ganti * untuk custom field yang ditampilkan pada table
          $sql=$this->db->query("SELECT MAX(No) as maks from dokumen where  MONTH(Tanggal_Masuk)=MONTH(CURRENT_DATE) and YEAR(Tanggal_Masuk)=YEAR(CURRENT_DATE)");
          return $sql->row();
        }
        function get_num_row($nownumber){
          $table=$this->table;
          $sql=$this->db->query("SELECT COUNT(NO) AS nomor FROM dokumen WHERE NO=$nownumber"); //ganti * untuk custom field yang ditampilkan pada table
          return $sql;
        }

        function get_last_date(){
          $table=$this->table;
          $sql=$this->db->query("SELECT Tanggal_Masuk from dokumen order by Tanggal_Masuk DESC limit 1"); //ganti * untuk custom field yang ditampilkan pada table
          return $sql->row();
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

        // insert data
        function insert($data)
        {
            $this->db->insert($this->table, $data);
        }

        // update data
        function update($id, $data)
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
