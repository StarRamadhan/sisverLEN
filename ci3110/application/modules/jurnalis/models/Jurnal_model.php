<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class Jurnal_model extends CI_Model
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

        function get_data_jurnal(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.*,operator.* FROM dokumen,`operator` WHERE dokumen.`operator_id`=`operator`.`operator_id` ORDER BY Tanggal_Masuk DESC"); //ganti * untuk custom field yang ditampilkan pada table
          return $sql->result();
        }


        //DASHBOARD TODAY DOC
        function get_data_today(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.*,operator.operator_id FROM dokumen,operator
                                 WHERE DATE(Tanggal_Masuk)=DATE(CURRENT_DATE()) AND operator.operator_id=dokumen.operator_id
                                 AND operator.position='verifikasi1'");
          return $sql->num_rows();
        }
        //DASHBOARD THIS MONTH DOC
        function get_data_approved_jurnal(){
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.*,operator.operator_id FROM dokumen,operator
                                 WHERE DATE(Tgl_Out_Jurnal)=DATE(CURRENT_DATE()) AND operator.operator_id=dokumen.operator_id
                                 AND operator.position='verifikasi1'");
          return $sql->num_rows();
        }
        //DASHBOARD LAST MONTH DOC
        function get_data_rejected(){
          $table=$this->table;
          $sql=$this->db->query("SELECT revisi.*,operator.operator_id FROM revisi,operator
                                 WHERE DATE(Tanggal_Masuk)=DATE(CURRENT_DATE()) AND operator.operator_id=revisi.operator_id
                                 AND operator.position='verifikasi1'"); //ganti * untuk custom field yang ditampilkan pada table
          return $sql->num_rows();
        }
        //DASHBOARD THIS YEAR DOC
        function get_data_finished(){
          $id = $this->session->userdata('ses_id');
          $table=$this->table;
          $sql=$this->db->query("SELECT dokumen.*,operator.operator_id FROM dokumen,operator
                                 WHERE DATE(Tanggal_Masuk)=DATE(CURRENT_DATE()) AND operator.operator_id=dokumen.operator_id
                                 AND dokumen.Lok_Dokumen='Finish' AND operator.`position`='verifikasi1'"); //ganti * untuk custom field yang ditampilkan pada table
          return $sql->num_rows();
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
            $sql=$this->db->query("SELECT * FROM dokumen,operator WHERE dokumen.Lok_Dokumen = 'Jurnalis 1' AND operator.position='verifikasi1' AND dokumen.`operator_id`=`operator`.`operator_id` ORDER BY Tanggal_Masuk DESC");
            return $sql->result();
            // $this->db->order_by($this->tgl_masuk, $this->order);
            // return $this->db->get($this->table)->result();
        }

        function count_need_response()
        {
            $table=$this->table;
            $sql=$this->db->query("SELECT * FROM dokumen,operator WHERE dokumen.Lok_Dokumen = 'Jurnalis 1' AND operator.position='verifikasi1' AND dokumen.`operator_id`=`operator`.`operator_id` ORDER BY Tanggal_Masuk DESC");
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
          $cat = $this->input->post('category',true);
          $catValue = $this->input->post('categoryValue',TRUE);
          $id_login = $this->session->userdata('ses_id');

          if ((empty($start)) && (empty($end))) {
            if ($by == 'me') {
                if ($cat=="") {
                  $sql=$this->db->query("SELECT dokumen.*, operator.operator_id,operator.position FROM dokumen, operator
                                         where operator.operator_id = dokumen.operator_id and operator.position='verifikasi1'
                                         ORDER BY Tanggal_Masuk DESC");
                  return $sql->result();
                }elseif ($cat!="") {
                  $sql=$this->db->query("SELECT dokumen.*, operator.operator_id,operator.position FROM dokumen, operator
                                         where operator.operator_id = dokumen.operator_id and operator.position='verifikasi1'
                                         and $cat LIKE '%$catValue%' ORDER BY Tanggal_Masuk DESC");
                  return $sql->result();
                }
            }elseif ($by == 'all') {
              if ($cat=="") {
                $sql=$this->db->query("SELECT * FROM dokumen ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }elseif ($cat!="") {
                $sql=$this->db->query("SELECT * FROM dokumen where $cat LIKE '%$catValue%' ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }
            }
          }

          if ((!empty($start)) && (!empty($end))) {
            if ($by == 'me') {
              if ($cat=="") {
                $sql=$this->db->query("SELECT dokumen.*, operator.operator_id,operator.position FROM dokumen, operator
                                       where operator.operator_id = dokumen.operator_id and operator.position='verifikasi1'
                                       AND Tanggal_Masuk BETWEEN '$start' AND '$end' ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }elseif ($cat!="") {
                $sql=$this->db->query("SELECT dokumen.*, operator.operator_id,operator.position FROM dokumen, operator
                                       where operator.operator_id = dokumen.operator_id and operator.position='verifikasi1'
                                       AND Tanggal_Masuk BETWEEN '$start' AND '$end' AND $cat LIKE '%$catValue%' ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }
            }elseif ($by == 'all') {
              if ($cat=="") {
                $sql=$this->db->query("SELECT * FROM dokumen where Tanggal_Masuk BETWEEN '$start' AND '$end' ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }elseif ($cat!="") {
                $sql=$this->db->query("SELECT * FROM dokumen where Tanggal_Masuk BETWEEN '$start' AND '$end' and $cat LIKE '%$catValue%' ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }
            }
          }

          if ((!empty($start)) && (empty($end))) {
            if ($by == 'me') {
              if ($cat=="") {
                $sql=$this->db->query("SELECT dokumen.*, operator.operator_id,operator.position FROM dokumen, operator
                                       where operator.operator_id = dokumen.operator_id and operator.position='verifikasi1'
                                       AND DATE(Tanggal_Masuk) = '$start' ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }elseif ($cat!="") {
                $sql=$this->db->query("SELECT dokumen.*, operator.operator_id,operator.position FROM dokumen, operator
                                       where operator.operator_id = dokumen.operator_id and operator.position='verifikasi1'
                                       AND DATE(Tanggal_Masuk) = '$start' and $cat LIKE '%$catValue%' ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }
            }elseif ($by == 'all') {
              if ($cat=="") {
                $sql=$this->db->query("SELECT * FROM dokumen where DATE(Tanggal_Masuk) = '$start' ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }elseif ($cat!="") {
                $sql=$this->db->query("SELECT * FROM dokumen where DATE(Tanggal_Masuk) = '$start' and $cat LIKE '%$catValue%' ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }
            }
          }

          if ((empty($start)) && (!empty($end))) {
            if ($by == 'me') {
              if ($cat=="") {
                $sql=$this->db->query("SELECT dokumen.*, operator.operator_id,operator.position FROM dokumen, operator
                                       where operator.operator_id = dokumen.operator_id and operator.position='verifikasi1'
                                       AND DATE(Tanggal_Masuk) = '$end' ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }elseif ($cat!="") {
                $sql=$this->db->query("SELECT dokumen.*, operator.operator_id,operator.position FROM dokumen, operator
                                       where operator.operator_id = dokumen.operator_id and operator.position='verifikasi1'
                                       AND DATE(Tanggal_Masuk) = '$end' and $cat LIKE '%$catValue%' ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }
            }elseif ($by == 'all') {
              if ($cat=="") {
                $sql=$this->db->query("SELECT * FROM dokumen where DATE(Tanggal_Masuk) = '$end' ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }elseif ($cat!="") {
                $sql=$this->db->query("SELECT * FROM dokumen where DATE(Tanggal_Masuk) = '$end' and $cat LIKE '%$catValue%' ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }
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

    }

    /* Crudlab by Kostlab */
    /* Please DO NOT modify this information : */
    /* Learn and Earn */
