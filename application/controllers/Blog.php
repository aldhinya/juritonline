<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->helper('general_helper');
		$this->load->library('form_validation');
		$this->load->model("model_users");
		$this->load->model("model_artikel");
	}

	public function index(){
		 $data['title']      = "Artikel | Jurit Online";
	     $data['menu']       = 'navjurit';

	     $this->load->view('layout/Header',$data);
	     $this->load->view('page/blog/All');
			  $this->load->view('layout/Sidebar');
		 	$this->load->view('layout/Footer');
	}

	function read($pg=1){
		 if(!$this->session->userdata('logginUser')){
	     	 redirect('member/login','refresh');
	     }else{

	     	$key	= trim($this->input->post('cari',true));
			$limit	= trim($this->input->post('limit',true));
			$user_id= $this->session->userdata('user_id');
			$offset = ($limit*$pg)-$limit;
			$like	= '';
			$where	= "(user_id = '$user_id')";

			if($key) $like = "(judul LIKE '%$key%')";

			$page 	= array();
	        $page['limit'] 		= $limit;
	        $page['count_row'] 	= $this->model_artikel->getCount($where, $like);
	        $page['current'] 	= $pg;
	        $page['list'] 		= gen_paging($page);

	        $data['paging'] = $page;
			$data['key']	= $key;
			$data['list']	= $this->model_artikel->getAll($where, $like,  $limit, $offset);

			$this->load->view('page/dashboard/artikel/ListArtikel',$data);
	     }
	}

	function artikel($id_artikel='', $url=''){

		if($id_artikel == '' OR $url == ''){
			redirect('blog','refresh');
		}else{
			$this->load->model('model_users');
			$id_artikel	= addslashes(trim($id_artikel));
			$url		= addslashes(trim($url));

			$where	= array(
				'url_artikel'	=> $url,
				'id_artikel'	=> $id_artikel,
				'statuspublish_id'	=> 1,
				'statusartikel_id'	=> 1
			);

			$cek	= $this->model_artikel->getAll($where)->row_array();

			if($cek){

				 $view	= ((int) $cek['viewer']) + 1 ;

				 $this->model_artikel->getUpdate(array("viewer" => $view ), $id_artikel);

				 $ktgr	= $this->model_artikel->getIdKatByIdArtikel(array("id_artikel" => $id_artikel));
				 $kategori	= array();


				 foreach($ktgr->result() as $row){
				 	array_push($kategori,$row->id_kategoriartikel);
				 }

				 $ktgr	= implode(",",$kategori);

				 $kategori_artikel		= $this->model_kategori->getAll("id_kategoriartikel IN ($ktgr)");

				 //ambil artikel berdasarkan id
				 $other		= array();
				 $other_id_artikel	= $this->model_artikel->getIdKatByIdArtikel("id_kategoriartikel IN ($ktgr)");
				 foreach($other_id_artikel->result() as $row){
				 	array_push($other,$row->id_artikel);
				 }
				 $other	 = implode(",",$other);
				 $others = $this->model_artikel->getArtikelTerkait("id_artikel IN ($other)");

				 $us	= $this->model_users->getAll(array("user_id" => $cek['user_id']))->row_array();
				 //meta
				$data['meta_judul'] = $cek['judul']." - By ".$us['nama']."| Jurit Online";
				$data['meta_deskripsi'] = substr(strip_tags($cek['deskripsi']),0,150);
				$data['meta_image'] = $cek['gambar'];
				$data['meta_url'] = base_url('blog/artikel/'.$cek['id_artikel'].'/'.$cek['url_artikel']);

			 	 $data['title']     = $cek['judul']." | Jurit Online";
			     	$data['menu']      = 'navjurit';
			     $data['artikel']		= $cek;
			     $data['kategori']		= $kategori_artikel;
			     $data['other']		= $others;


			     $this->load->view('layout/Header',$data);
			     $this->load->view('page/blog/Detail');
					 $this->load->view('layout/Sidebar');
				 $this->load->view('layout/Footer');


			}else{
				redirect('blog','refresh');
			}
		}
	}

	//fungsi kategori
	function kategori($kategori=''){

		if($kategori == ''){
			$data['title']      = "Kategori | Jurit Online";
		    $data['menu']       = 'kategori';

			$this->load->view('layout/Header',$data);
			$this->load->view('page/blog/kategori/SemuaKategori');
			$this->load->view('layout/Sidebar');
			$this->load->view('layout/Footer');
		}else{

			$query = $this->model_kategori->getAll(array("url_kategoriartikel" => $kategori))->row_array();

			if($query){
				$data['title']      = "Kategori ".$query['nm_kategoriartikel']." | Jurit Online";
			    $data['menu']       = 'kategori';
			    $data['kategori']       = $query;

				$this->load->view('layout/Header',$data);
				$this->load->view('page/blog/Index');
				$this->load->view('layout/Sidebar');
				$this->load->view('layout/Footer');
			}else{
				$this->load->view('pageNotFound');
			}

		}
	}

	function read_semuaartikel($pg=1){
		if(!$this->session->userdata('logginUser')){
	     	 redirect('member/login','refresh');
	     }else{

	     	$key	= trim($this->input->post('cari',true));
			$limit	= trim($this->input->post('limit',true));
			$user_id= $this->session->userdata('user_id');
			$offset = ($limit*$pg)-$limit;
			$like	= '';
			$where	= "";

			if($key) $like = "(judul LIKE '%$key%')";

			$page 	= array();
	        $page['limit'] 		= $limit;
	        $page['count_row'] 	= $this->model_artikel->getCount($where, $like);
	        $page['current'] 	= $pg;
	        $page['list'] 		= gen_paging($page);

	        $data['paging'] = $page;
			$data['key']	= $key;
			$data['list']	= $this->model_artikel->getAll($where, $like,  $limit, $offset);

			$this->load->view('page/dashboard/semuaartikel/ListSemuaArtikel',$data);
	     }
	}

}
