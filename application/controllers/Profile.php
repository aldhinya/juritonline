<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{
	    $this->load->model("model_home");
	    $this->load->model("model_artikel");

	    $data['title']      = "Profile | Jurit Online";
	    $data['menu']       = 'profile';

		$this->load->view('layout/Header',$data);
		$this->load->view('page/main/Profile');
		$this->load->view('layout/Sidebar');
		$this->load->view('layout/Footer');
	}
}
