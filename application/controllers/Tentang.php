<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

	public function index()
	{
	    $this->load->model("model_home");
	    $this->load->model("model_artikel");

	    $data['title']      = "Tentang Jurit Online | Jurit Online";
	    $data['menu']       = 'tentang';

		$this->load->view('layout/Header',$data);
		$this->load->view('page/main/Tentang');
		$this->load->view('layout/Sidebar');
		$this->load->view('layout/Footer');
	}
}
