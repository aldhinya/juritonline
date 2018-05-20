<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hubungi extends CI_Controller {

	public function index()
	{
	    $this->load->model("model_home");
	    $this->load->model("model_artikel");

	    $data['title']      = "Hubungi | Jurit Online";
	    $data['menu']       = 'hubungi';

		$this->load->view('layout/Header',$data);
		$this->load->view('page/main/Hubungi');
		$this->load->view('layout/Sidebar');
		$this->load->view('layout/Footer');
	}
}
