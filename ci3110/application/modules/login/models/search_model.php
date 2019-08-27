<?php
class Search_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function findDocument()
	{
		$cari = $this->input->GET('NoVerifikasi', TRUE);
		$data = $this->db->query("SELECT * from dokumen where No_Verifikasi = '$cari' ");
		return $data->result();
	}


}
