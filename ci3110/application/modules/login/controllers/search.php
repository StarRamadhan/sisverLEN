<?php
class Search extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('search_model');
	}

	public function find()
	{
		$this->load->view('search');
	}

	public function result()
	{
		$data2['find'] = $this->search_model->findDocument();
		$this->load->view('result', $data2);
	}
}
