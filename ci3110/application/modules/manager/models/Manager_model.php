<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class Manager_model extends CI_Model
    {

        public $table = 'dokumen';
        public $id = 'No_Verifikasi';
        public $tgl_masuk = 'Tanggal_Masuk';
        public $order = 'DESC';
        public $operator_id = 'Operator_Id';

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
          $sql=$this->db->query("SELECT * FROM dokumen JOIN operator ON dokumen.`Operator_Id` = operator.`Operator_Id`");
          return $sql->result();
        }


        function get_all_acc()
        {
            $table=$this->table;
            $sql=$this->db->query("SELECT * FROM dokumen WHERE Lok_Dokumen = 'Manager'  ORDER BY Tanggal_Masuk DESC");
            return $sql->result();
        }
        /////////////////////////////////////////////
        function get_all_need_response()
        {
            $table=$this->table;
            $sql=$this->db->query("SELECT * FROM dokumen WHERE Lok_Dokumen = 'Manager' ORDER BY Tanggal_Masuk DESC");
            return $sql->result();
        }
        function count_need_response()
        {
            $table=$this->table;
            $sql=$this->db->query("SELECT * FROM dokumen WHERE Lok_Dokumen = 'Manager' ORDER BY Tanggal_Masuk DESC");
            return $sql->num_rows();
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

        //DASHBOARD HITUNG DOKUMEN MANAGER BUlAN INI DAN KEMARIN
        function count_doc_in()
        {
            $table=$this->table;
            $sql=$this->db->query("SELECT No_Verifikasi FROM dokumen WHERE Tgl_Out_Jurnal > '0000-00-00' AND
                                   Lok_Dokumen='Manager' OR Lok_Dokumen='Finish' AND (MONTH(`Tanggal_Masuk`)=MONTH(CURRENT_DATE())
                                   OR MONTH(`Tanggal_Masuk`)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH))");
            return $sql->num_rows();
        }
        //DASHBOARD HITUNG DOKUMEN MANAGER INPROGRESS ONTIME
        function count_manager_prog_ontime()
        {
            $table=$this->table;
            $sql=$this->db->query("SELECT No_Verifikasi FROM dokumen WHERE CURRENT_DATE()<`Jt_Manager`
                                   AND `Lok_Dokumen`='Manager' AND (MONTH(`Tanggal_Masuk`)=MONTH(CURRENT_DATE())
                                   OR MONTH(`Tanggal_Masuk`)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH))");
            return $sql->num_rows();
        }

        //DASHBOARD HITUNG DOKUMEN MANAGER INPROGRESS LATE
        function count_manager_prog_late()
        {
            $table=$this->table;
            $sql=$this->db->query("SELECT No_Verifikasi FROM dokumen WHERE CURRENT_DATE()>=`Jt_Manager`
                                   AND `Lok_Dokumen`='Manager' AND (MONTH(`Tanggal_Masuk`)=MONTH(CURRENT_DATE())
                                   OR MONTH(`Tanggal_Masuk`)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH))");
            return $sql->num_rows();
        }

        //DASHBOARD HITUNG DOKUMEN MANAGER FINISH ONTIME
        function count_manager_finish_ontime()
        {
            $table=$this->table;
            $sql=$this->db->query("SELECT No_Verifikasi FROM dokumen WHERE `Tgl_Out_Manager`<`Jt_Manager`
                                   AND `Lok_Dokumen`='Finish' AND (MONTH(`Tanggal_Masuk`)=MONTH(CURRENT_DATE())
                                   OR MONTH(`Tanggal_Masuk`)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH))");
            return $sql->num_rows();
        }

        //DASHBOARD HITUNG DOKUMEN MANAGER FINISH LATE
        function count_manager_finish_late()
        {
            $table=$this->table;
            $sql=$this->db->query("SELECT No_Verifikasi FROM dokumen WHERE `Tgl_Out_Manager`>=`Jt_Manager`
                                   AND `Lok_Dokumen`='Finish' AND (MONTH(`Tanggal_Masuk`)=MONTH(CURRENT_DATE())
                                   OR MONTH(`Tanggal_Masuk`)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH))");
            return $sql->num_rows();
        }

  //get DATA SEARCH
        function get_data_search(){
          $table=$this->table;
          $start=$this->input->post('dateStart',TRUE);
          $end=$this->input->post('dateEnd',TRUE);
          $by = $this->input->post('by',true);
          $cat = $this->input->post('category',true);
          $catValue = $this->input->post('categoryValue',TRUE);
          $id_login = $this->session->userdata('ses_id');

          if ((empty($start)) && (empty($end))) {
              if ($cat=="") {
                $sql=$this->db->query("SELECT * FROM dokumen ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }elseif ($cat!="") {
                $sql=$this->db->query("SELECT * FROM dokumen where $cat LIKE '%$catValue%' ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }
          }

          if ((!empty($start)) && (!empty($end))) {
              if ($cat=="") {
                $sql=$this->db->query("SELECT * FROM dokumen where Tanggal_Masuk BETWEEN '$start' AND '$end' ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }elseif ($cat!="") {
                $sql=$this->db->query("SELECT * FROM dokumen where Tanggal_Masuk BETWEEN '$start' AND '$end' and $cat LIKE '%$catValue%' ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }
          }

          if ((!empty($start)) && (empty($end))) {
              if ($cat=="") {
                $sql=$this->db->query("SELECT * FROM dokumen where DATE(Tanggal_Masuk) = '$start' ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }elseif ($cat!="") {
                $sql=$this->db->query("SELECT * FROM dokumen where DATE(Tanggal_Masuk) = '$start' and $cat LIKE '%$catValue%' ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }
          }

          if ((empty($start)) && (!empty($end))) {
              if ($cat=="") {
                $sql=$this->db->query("SELECT * FROM dokumen where DATE(Tanggal_Masuk) = '$end' ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }elseif ($cat!="") {
                $sql=$this->db->query("SELECT * FROM dokumen where DATE(Tanggal_Masuk) = '$end' and $cat LIKE '%$catValue%' ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }
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
        // function get_ver1_today(){
        //   $table=$this->table;
        //   $sql=$this->db->query("SELECT dokumen.* FROM dokumen left join operator on dokumen.`Operator_Id` = operator.`Operator_Id` WHERE Tgl_Out_Verif=CURRENT_DATE() AND YEAR(`Tgl_Out_Verif`)=YEAR(CURRENT_DATE) AND operator.`position` = 'verifikasi1'");
        //   return $sql->num_rows();
        // }
        // function get_ver1_thismonth(){
        //   $table=$this->table;
        //   $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi1' AND MONTH(`Tgl_Out_Verif`)=MONTH(CURRENT_DATE) AND YEAR(`Tgl_Out_Verif`)=YEAR(CURRENT_DATE)");
        //   return $sql->num_rows();
        // }
        // function get_ver1_lastmonth(){
        //   $table=$this->table;
        //   $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi1' AND MONTH(`Tgl_Out_Verif`)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH) AND YEAR(`Tgl_Out_Verif`)=YEAR(CURRENT_DATE)");
        //   return $sql->num_rows();
        // }
        // function get_ver2_today(){
        //   $table=$this->table;
        //   $sql=$this->db->query("SELECT dokumen.* FROM dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` WHERE Tgl_Out_Verif=CURRENT_DATE() AND YEAR(`Tgl_Out_Verif`)=YEAR(CURRENT_DATE) AND operator.`position` = 'verifikasi2'");
        //   return $sql->num_rows();
        // }
        // function get_ver2_thismonth(){
        //   $table=$this->table;
        //   $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi2' AND MONTH(`Tgl_Out_Verif`)=MONTH(CURRENT_DATE) AND YEAR(`Tgl_Out_Verif`)=YEAR(CURRENT_DATE)");
        //   return $sql->num_rows();
        // }
        // function get_ver2_lastmonth(){
        //   $table=$this->table;
        //   $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi2' AND MONTH(`Tgl_Out_Verif`)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH) AND YEAR(`Tgl_Out_Verif`)=YEAR(CURRENT_DATE)");
        //   return $sql->num_rows();
        // }
        // function get_ver3_today(){
        //   $table=$this->table;
        //   $sql=$this->db->query("SELECT dokumen.* FROM dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` WHERE Tgl_Out_Verif=CURRENT_DATE() AND YEAR(`Tgl_Out_Verif`)=YEAR(CURRENT_DATE) AND operator.`position` = 'verifikasi3'");
        //   return $sql->num_rows();
        // }
        // function get_ver3_thismonth(){
        //   $table=$this->table;
        //   $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi3' AND MONTH(`Tgl_Out_Verif`)=MONTH(CURRENT_DATE) AND YEAR(`Tgl_Out_Verif`)=YEAR(CURRENT_DATE)");
        //   return $sql->num_rows();
        // }
        // function get_ver3_lastmonth(){
        //   $table=$this->table;
        //   $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi3' AND MONTH(`Tgl_Out_Verif`)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH) AND YEAR(`Tgl_Out_Verif`)=YEAR(CURRENT_DATE)");
        //   return $sql->num_rows();
        // }
        // //////////////////
        // function get_approve_jur1_today(){
        //   $table=$this->table;
        //   $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi1' AND Tgl_Out_Jurnal=CURRENT_DATE() AND YEAR(`Tgl_Out_Jurnal`)=YEAR(CURRENT_DATE)");
        //   return $sql->num_rows();
        // }
        // //DASHBOARD REVISION DOC
        // function get_approve_jur1_thismonth(){
        //   $table=$this->table;
        //   $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi1' AND MONTH(`Tgl_Out_Jurnal`)=MONTH(CURRENT_DATE) AND YEAR(`Tgl_Out_Jurnal`)=YEAR(CURRENT_DATE)");
        //   return $sql->num_rows();
        // }
        // //DASHBOARD LAST MONTH DOC
        // function get_approve_jur1_lastmonth(){
        //   $table=$this->table;
        //   $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi1' AND MONTH(`Tgl_Out_Jurnal`)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH) AND YEAR(`Tgl_Out_Jurnal`)=YEAR(CURRENT_DATE)");
        //   return $sql->num_rows();
        // }
        // ///////////////////////////
        // function get_approve_jur2_today(){
        //   $table=$this->table;
        //   $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi2' AND Tgl_Out_Jurnal=CURRENT_DATE() AND YEAR(`Tgl_Out_Jurnal`)=YEAR(CURRENT_DATE)");
        //   return $sql->num_rows();
        // }
        // function get_approve_jur2_thismonth(){
        //   $table=$this->table;
        //   $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi2' AND MONTH(`Tgl_Out_Jurnal`)=MONTH(CURRENT_DATE) AND YEAR(`Tgl_Out_Jurnal`)=YEAR(CURRENT_DATE)");
        //   return $sql->num_rows();
        // }
        // function get_approve_jur2_lastmonth(){
        //   $table=$this->table;
        //   $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi2' AND MONTH(`Tgl_Out_Jurnal`)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH) AND YEAR(`Tgl_Out_Jurnal`)=YEAR(CURRENT_DATE)");
        //   return $sql->num_rows();
        // }
        // /////////////////////////////////////
        // function get_approve_jur3_today(){
        //   $table=$this->table;
        //   $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi3' AND Tgl_Out_Jurnal=CURRENT_DATE() AND YEAR(`Tgl_Out_Jurnal`)=YEAR(CURRENT_DATE)");
        //   return $sql->num_rows();
        // }
        // function get_approve_jur3_thismonth(){
        //   $table=$this->table;
        //   $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi3' AND MONTH(`Tgl_Out_Jurnal`)=MONTH(CURRENT_DATE) AND YEAR(`Tgl_Out_Jurnal`)=YEAR(CURRENT_DATE)");
        //   return $sql->num_rows();
        // }
        // //DASHBOARD LAST MONTH DOC
        // function get_approve_jur3_lastmonth(){
        //   $table=$this->table;
        //   $sql=$this->db->query("SELECT dokumen.* from dokumen left join operator on dokumen.`operator_id` = operator.`operator_id` where operator.`position` = 'verifikasi3' AND MONTH(`Tgl_Out_Jurnal`)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH) AND YEAR(`Tgl_Out_Jurnal`)=YEAR(CURRENT_DATE)");
        //   return $sql->num_rows();
        // }
        /////////////////////////////////////

    }

    /* Crudlab by Kostlab */
    /* Please DO NOT modify this information : */
    /* Learn and Earn */
