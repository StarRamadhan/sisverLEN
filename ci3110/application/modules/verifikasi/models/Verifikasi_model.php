<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class Verifikasi_model extends CI_Model
    {

        public $table = 'dokumen';
        public $id = 'No_Verifikasi';

        public $table_revisi = 'revisi';
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
            $sql=$this->db->query("SELECT * From dokumen where operator_id=$id_O order by Tanggal_Masuk DESC");
            return $sql->result();
            // $this->db->order_by($this->tgl_masuk, $this->order);
            // return $this->db->get($this->table)->result();
        }

        //get data need Response
        function get_all_need_response()
        {
            $role = $this->session->userdata('akses');
            if ($role=="verifikasi1") {
              $lokasi = "Jurnalis 1";
            }elseif ($role=="verifikasi2") {
              $lokasi = "Jurnalis 2";
            }elseif ($role=="verifikasi3") {
              $lokasi = "Jurnalis 3";
            }
            $table=$this->table;
            $sql=$this->db->query("SELECT * FROM dokumen,operator WHERE dokumen.Lok_Dokumen = '$lokasi' AND operator.position='$role' AND dokumen.`operator_id`=`operator`.`operator_id` ORDER BY Tanggal_Masuk DESC");
            return $sql->result();
            // $this->db->order_by($this->tgl_masuk, $this->order);
            // return $this->db->get($this->table)->result();
        }

        //DASHBOARD TODAY DOC
        function get_data_today(){
          $id = $this->session->userdata('ses_id');
          $table=$this->table;
          $sql=$this->db->query("SELECT * FROM dokumen WHERE DATE(Tanggal_Masuk)=DATE(CURRENT_DATE())
                                 AND operator_id='$id'");
          return $sql->num_rows();
        }
        //DASHBOARD THIS MONTH DOC
        function get_data_approved_jurnal(){
          $id = $this->session->userdata('ses_id');
          $table=$this->table;
          $sql=$this->db->query("SELECT * FROM dokumen WHERE DATE(Tgl_Out_Jurnal)=DATE(CURRENT_DATE())
                                 AND operator_id='$id'");
          return $sql->num_rows();
        }
        //DASHBOARD LAST MONTH DOC
        function get_data_rejected(){
          $id = $this->session->userdata('ses_id');
          $table=$this->table;
          $sql=$this->db->query("SELECT * FROM revisi WHERE DATE(Tanggal_Masuk)=DATE(CURRENT_DATE())
                                 AND operator_id='$id' "); //ganti * untuk custom field yang ditampilkan pada table
          return $sql->num_rows();
        }
        //DASHBOARD THIS YEAR DOC
        function get_data_finished(){
          $id = $this->session->userdata('ses_id');
          $table=$this->table;
          $sql=$this->db->query("SELECT * FROM dokumen WHERE DATE(Tanggal_Masuk)=DATE(CURRENT_DATE()) AND Lok_Dokumen='Finish'
                                 AND operator_id ='$id'"); //ganti * untuk custom field yang ditampilkan pada table
          return $sql->num_rows();
        }

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
                  $sql=$this->db->query("SELECT * FROM dokumen where operator_id = '$id_login' ORDER BY Tanggal_Masuk DESC");
                  return $sql->result();
                }elseif ($cat!="") {
                  $sql=$this->db->query("SELECT * FROM dokumen where operator_id = '$id_login' and $cat LIKE '%$catValue%' ORDER BY Tanggal_Masuk DESC");
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
                $sql=$this->db->query("SELECT * FROM dokumen where operator_id = '$id_login' AND Tanggal_Masuk BETWEEN '$start' AND '$end' ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }elseif ($cat!="") {
                $sql=$this->db->query("SELECT * FROM dokumen where operator_id = '$id_login' AND Tanggal_Masuk BETWEEN '$start' AND '$end' AND $cat LIKE '%$catValue%' ORDER BY Tanggal_Masuk DESC");
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
                $sql=$this->db->query("SELECT * FROM dokumen where operator_id = '$id_login' AND DATE(Tanggal_Masuk) = '$start' ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }elseif ($cat!="") {
                $sql=$this->db->query("SELECT * FROM dokumen where operator_id = '$id_login' AND DATE(Tanggal_Masuk) = '$start' and $cat LIKE '%$catValue%' ORDER BY Tanggal_Masuk DESC");
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
                $sql=$this->db->query("SELECT * FROM dokumen where operator_id = '$id_login' AND DATE(Tanggal_Masuk) = '$end' ORDER BY Tanggal_Masuk DESC");
                return $sql->result();
              }elseif ($cat!="") {
                $sql=$this->db->query("SELECT * FROM dokumen where operator_id = '$id_login' AND DATE(Tanggal_Masuk) = '$end' and $cat LIKE '%$catValue%' ORDER BY Tanggal_Masuk DESC");
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

        //COUNT DATA REJECTED
        function count_rejected()
        {
            $hakakses = $this->session->userdata('ses_id');
            $table=$this->table;
            $sql=$this->db->query("SELECT dokumen.Operator_Id,revisi.* FROM dokumen,revisi WHERE dokumen.Lok_Dokumen = 'Reject' AND dokumen.No_Verifikasi=revisi.No_Verifikasi AND dokumen.Operator_Id='$hakakses' AND revisi.Status_Revisi IS NULL ORDER BY Tanggal_Masuk DESC");
            return $sql->num_rows();
        }

        function update_need_response($no_verifikasi, $dataResponse)
        {
          $this->db->where($this->id, $no_verifikasi);
          $this->db->update($this->table, $dataResponse);
        }

        function count_need_response()
        {
            $role = $this->session->userdata('akses');
            if ($role=="verifikasi1") {
              $lokasi = "Jurnalis 1";
            }elseif ($role=="verifikasi2") {
              $lokasi = "Jurnalis 2";
            }elseif ($role=="verifikasi3") {
              $lokasi = "Jurnalis 3";
            }
            // $akses = $this->session->userdata('akses');
            $table=$this->table;
            $sql=$this->db->query("SELECT * FROM dokumen,operator WHERE dokumen.Lok_Dokumen = '$lokasi' AND operator.operator_id=dokumen.operator_id and operator.position='$role' ORDER BY Tanggal_Masuk DESC");
            return $sql->num_rows();
        }

        // //get data dari tabel operator dan dokumen
        // function get_data_verif(){
        //   $table=$this->table;
        //   $sql=$this->db->query("SELECT dokumen.*,operator.* FROM dokumen,operator WHERE dokumen.`operator_id`=operator.`operator_id`"); //ganti * untuk custom field yang ditampilkan pada table
        //   return $sql->result();
        // }

        //get max nomor
        function get_last_num(){
          $table=$this->table;
          $sql=$this->db->query("SELECT MAX(No) as maks from dokumen where  MONTH(Tanggal_Masuk)=MONTH(CURRENT_DATE) and YEAR(Tanggal_Masuk)=YEAR(CURRENT_DATE)");
          return $sql->row();
        }
        function get_last_num_custom(){
          $table=$this->table;
          $sql=$this->db->query("SELECT MAX(NO) AS maks FROM dokumen WHERE  MONTH(`Tanggal_Masuk`)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH) AND YEAR(Tanggal_Masuk)=YEAR(CURRENT_DATE)");
          return $sql->row();
        }


        //get nomor untuk validasi agar tidak terjadi duplikat nomor
        function get_num_row($nownumber){
          $table=$this->table;
          $sql=$this->db->query("SELECT COUNT(NO) AS nomor FROM dokumen WHERE NO=$nownumber"); //ganti * untuk custom field yang ditampilkan pada table
          return $sql->num_rows();
        }
        //get tanggal terakhir yang diinput
        function get_last_date(){
          $table=$this->table;
          $sql=$this->db->query("SELECT Tanggal_Masuk from dokumen order by Tanggal_Masuk DESC limit 1"); //ganti * untuk custom field yang ditampilkan pada table
          return $sql->row();
        }
        function get_last_date_custom(){
          $table=$this->table;
          $sql=$this->db->query("SELECT Tanggal_Masuk FROM dokumen WHERE MONTH(`Tanggal_Masuk`)=MONTH(CURRENT_DATE-INTERVAL 1 MONTH) ORDER BY Tanggal_Masuk DESC LIMIT 1"); //ganti * untuk custom field yang ditampilkan pada table
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

        function insert_reject($data)
        {
            $this->db->insert($this->table_revisi, $data);
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
