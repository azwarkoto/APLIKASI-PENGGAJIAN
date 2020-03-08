<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class welcome extends CI_Controller {

	
	public function index()
	{
		$data = array('content' => 'dashboard/dashboard' );
		$this->load->view('layouts.php', $data);
	}
	public function dokter()
	{
		$data = array('content' => 'dokter/dokter_list.php' );
		$this->load->view('layouts.php', $data);
	}
	public function pasien()
	{
		$data = array('content' => 'pasien/pasien_list.php' );
		$this->load->view('layouts.php', $data);
	}
}
