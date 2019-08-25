<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class verifikasi extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More

    if (($this->session->userdata('masuk')==true) && (($this->session->userdata('akses')=='verifikasi1') || ($this->session->userdata('akses')=='verifikasi2') || ($this->session->userdata('akses')=='verifikasi3'))) {
      $this->load->model(array('Verifikasi_model'));
      $this->load->library('form_validation');
    }else{
      redirect(base_url('login'));
    }
  }

  public function index()
  {
    $datauser=$this->Verifikasi_model->get_all();//panggil ke modell
    $datafield=$this->Verifikasi_model->get_field();//panggil ke modell
    $dataverif=$this->Verifikasi_model->get_data_verif();//panggil ke modell
    $lastdate=$this->Verifikasi_model->get_last_date();
     $data = array(
//       'titleNavbar'=>'PT. LEN (PERSERO) - UNIT VERIFIKASI',
       'content'=>'verifikasi/dokumen/content',
       'navbar'=>'verifikasi/navbar',
       'sidebar'=>'verifikasi/sidebar',
       'datauser'=>$datauser,
       'datafield'=>$datafield,
       'dataverif'=>$dataverif,
       'module'=>'verifikasi',
       'titlePage'=>'verifikasi',
       'controller'=>'verifikasi'
       //'js'=> 'verifikasi/js',
       // 'css'=>'user/user/css',
       // 'js'=>'user/user/js',
       //'lastnumber'=>$lastnumber,
      );
    $this->template->load($data);
  }

  public function index_all()
  {
    $datauser=$this->Verifikasi_model->get_all_document();//panggil ke modell
    $datafield=$this->Verifikasi_model->get_field();//panggil ke modell
    $dataverif=$this->Verifikasi_model->get_data_verif_all();//panggil ke modell
    $lastdate=$this->Verifikasi_model->get_last_date();
     $data = array(
//       'titleNavbar'=>'PT. LEN (PERSERO) - UNIT VERIFIKASI',
       'content'=>'verifikasi/dokumen/content_all',
       'navbar'=>'verifikasi/navbar',
       'sidebar'=>'verifikasi/sidebar',
       'datauser'=>$datauser,
       'datafield'=>$datafield,
       'dataverif'=>$dataverif,
       'module'=>'verifikasi',
       'titlePage'=>'verifikasi',
       'controller'=>'verifikasi'
       //'js'=> 'verifikasi/js',
       // 'css'=>'user/user/css',
       // 'js'=>'user/user/js',
       //'lastnumber'=>$lastnumber,
      );
    $this->template->load($data);
  }

  public function create(){
    $lastdate=$this->Verifikasi_model->get_last_date();
    $lastnumber=$this->Verifikasi_model->get_last_num();
    //$lastnumber=$this->Verifikasi_model->get_last_num();
    //$numrows=$this->Verifikasi_model->get_num_row();
    //$testing=$this->Verifikasi_model->get_num_row($nownumber);
    //$datauser=$this->Verifikasi_model->get_all();//panggil ke modell
    //$datafield=$this->Verifikasi_model->get_field();//panggil ke modell
     $data = array(
       //'testing'=>$testing,
       //'numrows'=>$numrows,
       //'js'=> 'verifikasi/js',
       'content' => 'verifikasi/create_data',
       'sidebar'=>'verifikasi/sidebar',//Ini buat menu yang ditampilkan di module verifikasi {DIKIRIM KE TEMPLATE}
       'navbar'=>'verifikasi/navbar',
       'lastnumber'=>$lastnumber,
       'lastdate'=>$lastdate,
       'action'=>'verifikasi/create_action',
       'module'=>'verifikasi',
       'titlePage'=>'verifikasi',
       'controller'=>'verifikasi'
      );
    $this->template->load($data);
  }

  public function create_action()
      {
        //defining DATE
        $lastdate=$this->Verifikasi_model->get_last_date();
        //$numrows=$this->Verifikasi_model->get_num_row();
        $lastmonth= date("m", strtotime($lastdate->Tanggal_Masuk));
        $monthnow=date('m');
        $yearnow=date('Y');
        //CASE OF DATE FOR NUMBERING
        if ($lastmonth!=$monthnow) {
          $lastnumber=1;
          $nownumber=($lastnumber->maks+1);
        }elseif ($lastmonth==$monthnow) {
          $lastnumber=$this->Verifikasi_model->get_last_num();
          $nownumber=($lastnumber->maks+1);
          $numrows=$this->Verifikasi_model->get_num_row($nownumber);
          if ($num_rows->nomor>1) {
            $lastnumber=$lastnumber+1;
          }

        }
//        $nownumber=($lastnumber->maks+1);

        // $numrows=$this->Verifikasi_model->get_num_row($nownumber,$monthnow,$yearnow);
        // if($numrows->num_rows() > 1){
        //   $nownumber=$nownumber+1;
        // }

        $timezone = date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');

        //MAKING PRIMARY KEY
        $pk1 = sprintf("%04s", $nownumber);
        $pk2 = $this->input->post('kode_ver');
        $pk3 = date("m/Y");
        $statusDok = "jurnal";
        //$pk3 = date("m/Y", strtotime($lastdate->Tanggal_Masuk));
        $primarykey = $pk1.'/'.$pk2.'/'.$pk3;
        //$pk2 =
        $data = array(
          'No' => $nownumber,
          'operator_id' => $this->input->post('operator_id',TRUE),
          'Tanggal_Masuk' => $now,
          'Tgl_Out_Verif' => $now,
          'No_Verifikasi' => $primarykey,//$this->input->post('kode_ver',TRUE),
          //'No_Verifikasi' => $this->input->post('kode_ver',TRUE),
          'Kode_Ver' => $this->input->post('kode_ver',TRUE),
          'Mata_Uang' => $this->input->post('mata_uang',TRUE),
          'User' => $this->input->post('user',TRUE),
          'Keterangan' => $this->input->post('keterangan',TRUE),
          'Jumlah' => $this->input->post('jumlah',TRUE),
          'Lok_Dokumen' => $statusDok
        );

        $this->Verifikasi_model->insert($data);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(base_url('verifikasi'));
      }

  public function edit_profil($operator_id){
    $dataedit=$this->Verifikasi_model->get_by_id_profil($operator_id);
     $data = array(
       'content'=>'verifikasi/edit_profil',
       'sidebar'=>'verifikasi/sidebar',
       'navbar'=>'verifikasi/navbar',
       //'role'=>$this->Verifikasi_model->gender_enums('user' , 'position' ),
       'action'=>'verifikasi/verifikasi/update_action',
       'dataedit'=>$dataedit,
       'module'=>'verifikasi',
       'titlePage'=>'verifikasi',
       'controller'=>'verifikasi'
      );
    $this->template->load($data);
  }



  public function update_action()
  {
          $data = array(
            'username' => $this->input->post('username',TRUE),
            'password_enc' => md5($this->input->post('password',TRUE)),
            'password' => $this->input->post('password',TRUE),
            'position' => $this->input->post('position',TRUE),
            'phone_number' => $this->input->post('phone_number',TRUE),
          );
          $this->Verifikasi_model->update($this->input->post('operator_id', TRUE), $data);
          $this->session->set_flashdata('flashMessage', 'Update Record Success');
          //echo "berhasil";
          redirect(base_url('verifikasi'));

  }

  // public function _rules()
  // {
  //     $this->form_validation->set_rules('username', 'username', 'trim|required');
  //     //$this->form_validation->set_rules('password_enc', 'password_enc', 'trim|required');
  //     $this->form_validation->set_rules('password', 'password', 'trim|required');
  //     $this->form_validation->set_rules('position', 'position', 'trim|required');
  //     $this->form_validation->set_rules('phone_number', 'phone_number', 'trim|required');
  //
  //
  //     $this->form_validation->set_rules('no_verifikasi', 'no_verifikasi', 'trim');
  //     $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  // }

  public function export_data(){
    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';

    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('Sistem Verifikasi Len')
                 ->setLastModifiedBy('Sistem Verifikasi Len')
                 ->setTitle("Data Verifikasi")
                 ->setSubject("Dokumen")
                 ->setDescription("Laporan Dokumen")
                 ->setKeywords("Dokumen");
    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    $style_col2 = array(
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "PT LEN INDUSTRI (PERSERO)"); // Set kolom A1 dengan tulisan "Dokumen Input"
    $excel->getActiveSheet()->mergeCells('A1:C1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1

    $excel->setActiveSheetIndex(0)->setCellValue('A2', "WORKSHEET VERIFIKASI KELUAR"); // Set kolom A1 dengan tulisan "Dokumen Input"
    $excel->getActiveSheet()->mergeCells('A2:C2'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1

    $excel->setActiveSheetIndex(0)->setCellValue('A3', "BULAN :"); // Set kolom A1 dengan tulisan "Dokumen Input"
    $excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(TRUE); // Set bold kolom A1

    $excel->setActiveSheetIndex(0)->setCellValue('A4', "TAHUN :"); // Set kolom A1 dengan tulisan "Dokumen Input"
    $excel->getActiveSheet()->getStyle('A4')->getFont()->setBold(TRUE); // Set bold kolom A1

    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A6', "NO"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B6', "TGL MASUK"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C6', "KODE VER"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D6', "NO VERIFIKASI"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E6', "KETERANGAN"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F6', "USER");
    $excel->setActiveSheetIndex(0)->setCellValue('G6', "MU");
    $excel->setActiveSheetIndex(0)->setCellValue('H6', "JUMLAH");
    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A6')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B6')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C6')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D6')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E6')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F6')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G6')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H6')->applyFromArray($style_col);

    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $mydokumen = $this->Verifikasi_model->ambil_view();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 7; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($mydokumen as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->Tanggal_Masuk);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->Kode_Ver);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->No_Verifikasi);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->Keterangan);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->User);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->Mata_Uang);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, number_format($data->Jumlah,2,",","."));


      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_col2);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_col2);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_col2);
      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_col2);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_col2);
      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);

      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(10); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(50); // Set width kolom E
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(8);
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Dokumen");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Data Dokumen.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }
}
