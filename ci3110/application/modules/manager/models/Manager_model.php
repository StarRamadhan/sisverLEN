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
          $sql=$this->db->query("SELECT * FROM dokumen JOIN operator ON dokumen.`operator_id` = operator.`operator_id`");
          return $sql->result();
        }

        //DASHBOARD TODAY DOC
        function get_data_today(){
          $table=$this->table;
          $sql=$this->db->query("SELECT * FROM dokumen WHERE Tgl_Out_Verif=CURRENT_DATE() AND YEAR(`Tgl_Out_Verif`)=YEAR(CURRENT_DATE)"); //ganti * untuk custom field yang ditampilkan pada table
          return $sql->num_rows();
        }
        //DASHBOARD THIS MONTH DOC
        function get_data_thismonth(){
          $table=$this->table;
          $sql=$this->db->query("SELECT * FROM dokumen WHERE MONTH(`Tgl_Out_Verif`)=MONTH(CURRENT_DATE) AND YEAR(`Tgl_Out_Verif`)=YEAR(CURRENT_DATE)"); //ganti * untuk custom field yang ditampilkan pada table
          return $sql->num_rows();
        }
        //DASHBOARD LAST MONTH DOC
        function get_data_lastmonth(){
          $table=$this->table;
          $sql=$this->db->query("SELECT * FROM dokumen WHERE MONTH(`Tgl_Out_Verif`)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH) AND YEAR(`Tgl_Out_Verif`)=YEAR(CURRENT_DATE)"); //ganti * untuk custom field yang ditampilkan pada table
          return $sql->num_rows();
        }
        //DASHBOARD THIS YEAR DOC
        function get_data_thisyear(){
          $table=$this->table;
          $sql=$this->db->query("SELECT * FROM dokumen WHERE YEAR(`Tgl_Out_Verif`)=YEAR(CURRENT_DATE)"); //ganti * untuk custom field yang ditampilkan pada table
          return $sql->num_rows();
        }
        /////////////////////////////////////////////
        function get_all_acc()
        {
            $table=$this->table;
            $sql=$this->db->query("SELECT * FROM dokumen WHERE Lok_Dokumen = 'Manager'  ORDER BY Tanggal_Masuk DESC");
            return $sql->result();
            // $this->db->order_by($this->tgl_masuk, $this->order);
            // return $this->db->get($this->table)->result();
        }
        /////////////////////////////////////////////
        function get_all_need_response()
        {
            $table=$this->table;
            $sql=$this->db->query("SELECT * FROM dokumen WHERE Lok_Dokumen = 'Manager' ORDER BY Tanggal_Masuk DESC");
            return $sql->result();
            // $this->db->order_by($this->tgl_masuk, $this->order);
            // return $this->db->get($this->table)->result();
        }
        function count_need_response()
        {
            $table=$this->table;
            $sql=$this->db->query("SELECT * FROM dokumen WHERE Lok_Dokumen = 'Manager' ORDER BY Tanggal_Masuk DESC");
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
            $sql=$this->db->query("SELECT * FROM dokumen ORDER BY Tanggal_Masuk DESC");
            return $sql->result();
          }if ((!empty($start)) && (!empty($end))) {
            $sql=$this->db->query("SELECT * FROM dokumen where Tgl_Out_Manager BETWEEN '$start' AND '$end' ORDER BY Tanggal_Masuk DESC");
            return $sql->result();
          }if ((!empty($start)) && (empty($end))) {
            $sql=$this->db->query("SELECT * FROM dokumen where Tgl_Out_Manager = '$start' ORDER BY Tanggal_Masuk DESC");
            return $sql->result();
          }if ((empty($start)) && (!empty($end))) {
            $sql=$this->db->query("SELECT * FROM dokumen WHERE Tgl_Out_Manager = '$end' ORDER BY Tanggal_Masuk DESC");
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

        //////////////////
        function get_ver1_today(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.* FROM dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` WHERE Tgl_Out_Verif=CURRENT_DATE() AND YEAR(`Tgl_Out_Verif`)=YEAR(CURRENT_DATE) AND operator.`position` = 'verifikasi1'");
          return $sql->num_rows();
        }
        function get_ver1_thismonth(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi1' AND MONTH(`Tgl_Out_Verif`)=MONTH(CURRENT_DATE) AND YEAR(`Tgl_Out_Verif`)=YEAR(CURRENT_DATE)");
          return $sql->num_rows();
        }
        function get_ver1_lastmonth(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi1' AND MONTH(`Tgl_Out_Verif`)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH) AND YEAR(`Tgl_Out_Verif`)=YEAR(CURRENT_DATE)");
          return $sql->num_rows();
        }
        function get_ver2_today(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.* FROM dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` WHERE Tgl_Out_Verif=CURRENT_DATE() AND YEAR(`Tgl_Out_Verif`)=YEAR(CURRENT_DATE) AND operator.`position` = 'verifikasi2'");
          return $sql->num_rows();
        }
        function get_ver2_thismonth(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi2' AND MONTH(`Tgl_Out_Verif`)=MONTH(CURRENT_DATE) AND YEAR(`Tgl_Out_Verif`)=YEAR(CURRENT_DATE)");
          return $sql->num_rows();
        }
        function get_ver2_lastmonth(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi2' AND MONTH(`Tgl_Out_Verif`)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH) AND YEAR(`Tgl_Out_Verif`)=YEAR(CURRENT_DATE)");
          return $sql->num_rows();
        }
        function get_ver3_today(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.* FROM dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` WHERE Tgl_Out_Verif=CURRENT_DATE() AND YEAR(`Tgl_Out_Verif`)=YEAR(CURRENT_DATE) AND operator.`position` = 'verifikasi3'");
          return $sql->num_rows();
        }
        function get_ver3_thismonth(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi3' AND MONTH(`Tgl_Out_Verif`)=MONTH(CURRENT_DATE) AND YEAR(`Tgl_Out_Verif`)=YEAR(CURRENT_DATE)");
          return $sql->num_rows();
        }
        function get_ver3_lastmonth(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi3' AND MONTH(`Tgl_Out_Verif`)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH) AND YEAR(`Tgl_Out_Verif`)=YEAR(CURRENT_DATE)");
          return $sql->num_rows();
        }
        //////////////////
        function get_approve_jur1_today(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi1' AND Tgl_Out_Jurnal=CURRENT_DATE() AND YEAR(`Tgl_Out_Jurnal`)=YEAR(CURRENT_DATE)");
          return $sql->num_rows();
        }
        //DASHBOARD REVISION DOC
        function get_approve_jur1_thismonth(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi1' AND MONTH(`Tgl_Out_Jurnal`)=MONTH(CURRENT_DATE) AND YEAR(`Tgl_Out_Jurnal`)=YEAR(CURRENT_DATE)");
          return $sql->num_rows();
        }
        //DASHBOARD LAST MONTH DOC
        function get_approve_jur1_lastmonth(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi1' AND MONTH(`Tgl_Out_Jurnal`)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH) AND YEAR(`Tgl_Out_Jurnal`)=YEAR(CURRENT_DATE)");
          return $sql->num_rows();
        }
        ///////////////////////////
        function get_approve_jur2_today(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi2' AND Tgl_Out_Jurnal=CURRENT_DATE() AND YEAR(`Tgl_Out_Jurnal`)=YEAR(CURRENT_DATE)");
          return $sql->num_rows();
        }
        function get_approve_jur2_thismonth(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi2' AND MONTH(`Tgl_Out_Jurnal`)=MONTH(CURRENT_DATE) AND YEAR(`Tgl_Out_Jurnal`)=YEAR(CURRENT_DATE)");
          return $sql->num_rows();
        }
        function get_approve_jur2_lastmonth(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi2' AND MONTH(`Tgl_Out_Jurnal`)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH) AND YEAR(`Tgl_Out_Jurnal`)=YEAR(CURRENT_DATE)");
          return $sql->num_rows();
        }
        /////////////////////////////////////
        function get_approve_jur3_today(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi3' AND Tgl_Out_Jurnal=CURRENT_DATE() AND YEAR(`Tgl_Out_Jurnal`)=YEAR(CURRENT_DATE)");
          return $sql->num_rows();
        }
        function get_approve_jur3_thismonth(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi3' AND MONTH(`Tgl_Out_Jurnal`)=MONTH(CURRENT_DATE) AND YEAR(`Tgl_Out_Jurnal`)=YEAR(CURRENT_DATE)");
          return $sql->num_rows();
        }
        //DASHBOARD LAST MONTH DOC
        function get_approve_jur3_lastmonth(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi3' AND MONTH(`Tgl_Out_Jurnal`)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH) AND YEAR(`Tgl_Out_Jurnal`)=YEAR(CURRENT_DATE)");
          return $sql->num_rows();
        }
        /////////////////////////////////////

    }

    /* Crudlab by Kostlab */
    /* Please DO NOT modify this information : */
    /* Learn and Earn */
