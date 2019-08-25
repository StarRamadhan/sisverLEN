<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class Verifikasi_model extends CI_Model
    {

        public $table = 'dokumen';
        public $id = 'No_Verifikasi';

        public $operator_id ='operator_id';
        public $table_profil = 'operator';
        public $tgl_masuk = 'Tanggal_Masuk';
        public $order = 'DESC';

        function __construct()
        {
            parent::__construct();
        }

        // get all
        function get_all()
        {
            $id_O=$this->session->userdata('ses_id');
            $table=$this->table;
            $sql=$this->db->query("SELECT * From dokumen where operator_id=$id_O and Lok_Dokumen <> 'revisi' order by Tanggal_Masuk DESC");
            return $sql->result();
            // $this->db->order_by($this->tgl_masuk, $this->order);
            // return $this->db->get($this->table)->result();
        }

        function get_all_document()
        {
            $table=$this->table;
            $sql=$this->db->query("SELECT * From dokumen where Lok_Dokumen <> 'revisi' order by Tanggal_Masuk DESC");
            return $sql->result();
            // $this->db->order_by($this->tgl_masuk, $this->order);
            // return $this->db->get($this->table)->result();
        }

        //get data dari tabel operator dan dokumen
        function get_data_verif(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.*,operator.* FROM dokumen,operator WHERE dokumen.`operator_id`=operator.`operator_id`"); //ganti * untuk custom field yang ditampilkan pada table
          return $sql->result();
        }

        function get_data_verif_all(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.*,operator.* FROM dokumen,operator"); //ganti * untuk custom field yang ditampilkan pada table
          return $sql->result();
        }

        //get max nomor
        function get_last_num(){
          $table=$this->table;
          //$sql=$this->db->query("SELECT No from dokumen order by Tanggal_Masuk DESC limit 1"); //ganti * untuk custom field yang ditampilkan pada table
          $sql=$this->db->query("SELECT MAX(No) as maks from dokumen where  MONTH(Tanggal_Masuk)=MONTH(CURRENT_DATE) and YEAR(Tanggal_Masuk)=YEAR(CURRENT_DATE)");
          return $sql->row();
        }

        //get nomor untuk validasi agar tidak terjadi duplikat nomor
        function get_num_row($nownumber){
          $table=$this->table;
          $sql=$this->db->query("SELECT COUNT(NO) AS nomor FROM dokumen WHERE NO=$nownumber"); //ganti * untuk custom field yang ditampilkan pada table
          return $sql;
        }
        //get tanggal terakhir yang diinput
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

        function ambil_view(){
          return $this->db->get($this->table)->result();
        }

    }

    /* Crudlab by Kostlab */
    /* Please DO NOT modify this information : */
    /* Learn and Earn */
