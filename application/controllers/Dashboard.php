<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->helper('general_helper');
		$this->load->library('form_validation');
		$this->load->model("model_artikel");
	}

	public function index(){
		 if(!$this->session->userdata('logginUser')){
	     	 redirect('member/login','refresh');
	     }else{

	     	if($this->session->userdata('userstatus_id') == 3){
	     		redirect("member/verifikasi","refresh");
	     	}else if($this->session->userdata('userstatus_id') == 1){
	     		 $data['title']      = "Dashboard | Jurit Online";
			     $data['menu']       = 'dashboard';
			     $data['dashboard']	 = '1';

			     $this->load->view('layout/Header',$data);
					 $this->load->view('layout/Sidebar');
			     $this->load->view('page/dashboard/Index');
				 $this->load->view('layout/Footer');
	     	}else{
	     		$this->load->view("pageNotFound");
	     	}
	     }
	}

	function akun(){
	     if(!$this->session->userdata('logginUser')){
	     	 redirect('member/login','refresh');
	     }else{

		     $data['title']     = "Akun | Jurit Online";
		     $data['menu']      = 'akun';
		     $data['user']		= $this->model_users->getAll(array("user_id" => $this->session->userdata("user_id")))->row_array();
		     $data['dashboard']	 = '1';
		     $this->load->view('layout/Header',$data);
		     $this->load->view('layout/Sidebar');
		     $this->load->view('page/dashboard/Akun');
			 $this->load->view('layout/Footer');
	     }
	}

	function simpan_akun(){

		if(!isset($_POST['simpan'])){
			echo "<h3 style='color:red;font-weight:bold;'>Forbiden Access</h3>";
		}else{

			$this->form_validation->set_rules("nama", "Username", "trim");
			$this->form_validation->set_rules("facebook", "Facebook", "trim");
			$this->form_validation->set_rules("email", "Email", "trim");
			$this->form_validation->set_rules("profile", "profile", "trim");

			$nama		= addslashes($this->input->post('nama',true));
			$facebook	= addslashes($this->input->post('facebook',true));
			$email	= addslashes($this->input->post('email',true));
			$profile		= addslashes($this->input->post('profile',true));
			$image		= '';

			if($this->form_validation->run() == false ){
				$rs = array(
					'alert' => 'alert-danger',
					'rs'	=> 1,
					'msg'	=> '<b><i class="glyphicon glyphicon-remove"></i> Tolong isi data dengan benar...</b>'
				);

				$this->session->set_flashdata($rs);
				redirect("dashboard/akun","refresh");
			}else{

				$this->load->helper('file');
				$config['upload_path'] = './uploads/profile/';
				$config['allowed_types'] =  'jpg|png|jpeg|PNG';
				$config['max_size'] = '5120';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if($this->upload->do_upload('upload-gambar')){
					$file = $this->upload->data();

					$image = 'uploads/profile/'.$file['file_name'];

				} else {
					$type = get_mime_by_extension($_FILES['upload-gambar']['name']);

					if(($type != 'image/jpeg' || $type != 'image/png' || $type != 'image/gif') && $_FILES['upload-gambar']['size'] > $config['max_size']) {

						$rs = array(
							'alert' => 'alert-danger',
							'rs'	=> 1,
							'msg'	=> '<b><i class="glyphicon glyphicon-remove"></i> Format file yang Anda upload tidak sesuai. Hanya bisa upload gambar saja...</b>'
						);

						$this->session->set_flashdata($rs);
						redirect("dashboard/akun","refresh");
					}
				}
			}

			$update = '';

			if($image){
				$update = array(
					'nama' => $nama,
					'email'	=> $email,
					'gambar'	=> $image,
					'facebook'	=> $facebook,
					'profile'	=> $profile,
				);

			}else{
				$update = array(
					'nama' => $nama,
					'email'	=> $email,
					'facebook'	=> $facebook,
					'profile'	=> $profile
				);
			}


			$query = $this->model_users->getUpdate($update,$this->session->userdata("user_id"));

			if($query){
				$rs = array(
					'alert' => 'alert-success',
					'rs'	=> 1,
					'msg'	=> '<b><i class="glyphicon glyphicon-ok"></i> Profil Berhasil Diupdate...</b>'
				);

				$this->session->set_flashdata($rs);
				redirect("dashboard/akun","refresh");
			}else{
				$rs = array(
					'alert' => 'alert-danger',
					'rs'	=> 1,
					'msg'	=> '<b><i class="glyphicon glyphicon-remove"></i> Gagal Update Profil...</b>'
				);

				$this->session->set_flashdata($rs);
				redirect("dashboard/akun","refresh");
			}
			if($this->session->userdata('password') === md5($this->input->post('oldpassword'))){
				if($this->input->post('newpassword') === ''){

					$this->v_admin->display('admin/profile');
				} else {
					$password=md5($this->input->post('newpassword'));
					$this->koneksi->update_password_user($id,$password);
					redirect ('halaman/logout_user');
				}

			}

		}
	}

	function artikel($page='',$id=''){

		if(!$this->session->userdata('logginUser')){
	     	 redirect('member/login','refresh');
	     }else{

	     	 if($page==''){
	     		 $data['title']     = "Artikel | Jurit Online";
			     $data['menu']      = 'artikel';
			     $data['dashboard']	 = '1';
			     $this->load->view('layout/Header',$data);
			     $this->load->view('layout/Sidebar');
			     $this->load->view('page/dashboard/artikel/Index');
				 $this->load->view('layout/Footer');
	     	 }else{

	     		if($page == 'tambah'){

	     			 $data['title']     = "Tambah Artikel | Jurit Online";
				     $data['menu']      = 'artikel';
				     $data['kategori']	= $this->model_kategori->getAll();
				     $data['dashboard']	 = '1';
				     $this->load->view('layout/Header',$data);
				     $this->load->view('layout/Sidebar');
				     $this->load->view('page/dashboard/artikel/Tambah');
					 $this->load->view('layout/Footer');

	     		}elseif($page == 'edit'){

	     			if($id !=''){

	     				 $where	= array(
	     					'id_artikel'	=> $id,
	     					'user_id'	=> $this->session->userdata('user_id')
	     				 );

	     				 $cek	=  $this->model_artikel->getAll($where)->row_array();

	     				 if($cek){

	     				 	 $listkategori	= array();
	     				 	 $query		= $this->model_artikel->getIdKatByIdArtikel(array("id_artikel" => $id))->result();

	     				 	 foreach($query as $row){
	     				 	 	array_push($listkategori,$row->id_kategoriartikel);
	     				 	 }

	     				 	 $data['title']     = "Edit Artikel | Jurit Online";
						     $data['menu']      = 'artikel';
						     $data['kategori']	= $this->model_kategori->getAll();
						     $data['juritku']	= $cek;
						     $data['listkategori']	= $listkategori;
						     $data['dashboard']	 = '1';
						     $this->load->view('layout/Header',$data);
						     $this->load->view('layout/Sidebar');
						     $this->load->view('page/dashboard/artikel/Edit');
							 $this->load->view('layout/Footer');
	     				 }else{
	     				 	 $this->load->view('PageNotFound');
	     				 }
	     			}else{
	     				$this->load->view('PageNotFound');
	     			}
	     		}
	     	 }
	     }
	}

	function simpan_artikel(){

		if(!isset($_POST['simpan'])){
			echo "<h3 style='color:red;font-weight:bold;'>Forbiden Access</h3>";
		}else{

			$this->form_validation->set_rules("statuspublish_id", "Statuspublish_id", "trim|required");
			$this->form_validation->set_rules("judul", "Judul", "trim|required");
			$this->form_validation->set_rules("deskripsi", "Deskripsi", "trim");

			$statuspublish_id		= addslashes($this->input->post('statuspublish_id',true));
			$judul		= addslashes($this->input->post('judul',true));
			$deskripsi	= $this->input->post('deskripsi',true);
			$kategori_artikel	= $this->input->post('id_kategoriartikel',true);
			$image		= '';
			$thumbnail	= '';

			if($this->form_validation->run() == false ){
				$rs = array(
					'alert' => 'alert-danger',
					'rs'	=> 1,
					'msg'	=> '<b><i class="glyphicon glyphicon-remove"></i> Tolong isi data dengan benar...</b>'
				);

				$this->session->set_flashdata($rs);
				redirect("dashboard/artikel/tambah","refresh");
			}else{

				$this->load->helper('file');
				$config['upload_path'] = './uploads/thumbnail/';
				$config['allowed_types'] =  'jpg|png|jpeg';
				$config['max_size'] = '5120';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if($this->upload->do_upload('upload-gambar')){
					$file = $this->upload->data();

					$image = 'uploads/thumbnail/'.$file['file_name'];

					$config['image_library'] 	= 'gd2';
					$config['source_image'] 	= $file['full_path'];
					$config['create_thumb'] 	= TRUE;
					$config['maintain_ratio'] 	= TRUE;
					$config['width'] 			= 300;
					$config['height'] 			= 300;
					$config['new_image'] 		= './uploads/thumbnail/';

					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					$thumbnail = 'uploads/thumbnail/'.$file['raw_name'].'_thumb'.$file['file_ext'];
					$this->image_lib->clear();


				} else {
					$type = get_mime_by_extension($_FILES['upload-gambar']['name']);

					if(($type != 'image/jpeg' || $type != 'image/png' || $type != 'image/gif') && $_FILES['upload-gambar']['size'] > $config['max_size']) {
						$rs = array(
							'alert' => 'alert-danger',
							'rs'	=> 1,
							'msg'	=> '<b><i class="glyphicon glyphicon-remove"></i> Format file yang Anda upload tidak sesuai. Hanya bisa upload gambar saja...</b>'
						);

						$this->session->set_flashdata($rs);
						redirect("dashboard/artikel/tambah","refresh");
					}
				}
			}

			$insert = array(
				'judul' => $judul,
				'user_id'	=> $this->session->userdata("user_id"),
				'deskripsi' => $deskripsi,
				'thumbnail'	=> $thumbnail,
				'gambar'	=> $image,
				'statuspublish_id'	=> $statuspublish_id,
				'statusartikel_id'	=> 2,
				'url_artikel'	=> slug($judul)
			);

			$wh = array(
				'judul' => $judul,
				'user_id'	=> $this->session->userdata("user_id"),
				'url_artikel'	=> slug($judul)
			);

			$this->db->trans_begin();

			$this->model_artikel->getInsert($insert);

			$artikel	= $this->model_artikel->getAll($wh)->row_array();

			for($i=0; $i<count($kategori_artikel); $i++){

				$this->model_artikel->getInsertKategoriDetail(array("id_artikel" => $artikel['id_artikel'], "id_kategoriartikel" => $kategori_artikel[$i]));

			}


			if($this->db->trans_status() === true){
				$this->db->trans_commit();
				$rs = array(
					'alert' => 'alert-success',
					'rs'	=> 1,
					'msg'	=> '<b><i class="glyphicon glyphicon-ok"></i> Berhasil Menambahkan Artikel...</b> '
				);

				$this->session->set_flashdata($rs);
				redirect("dashboard/artikel","refresh");
			}else{
				$this->db->trans_rollback();
				$rs = array(
					'alert' => 'alert-danger',
					'rs'	=> 1,
					'msg'	=> '<b><i class="glyphicon glyphicon-remove"></i> Gagal Menambahkan Artikel...</b>'
				);

				$this->session->set_flashdata($rs);
				redirect("dashboard/artikel/tambah","refresh");
			}
		}
	}

	function ubah_artikel(){

		if(!isset($_POST['simpan'])){
			echo "<h3 style='color:red;font-weight:bold;'>Forbiden Access</h3>";
		}else{

			$this->form_validation->set_rules("statuspublish_id", "Statuspublish_id", "trim|required");
			$this->form_validation->set_rules("judul", "Judul", "trim|required");
			$this->form_validation->set_rules("deskripsi", "Deskripsi", "trim");

			$statuspublish_id		= addslashes($this->input->post('statuspublish_id',true));
			$judul		= addslashes($this->input->post('judul',true));
			$id_artikel	= addslashes($this->input->post('id_artikel',true));
			$deskripsi	= $this->input->post('deskripsi',true);
			$kategori_artikel	= $this->input->post('id_kategoriartikel',true);
			$url_thumb	= addslashes($this->input->post('url_thumb',true));
			$url_gambar	= addslashes($this->input->post('url_gambar',true));

			$image		= '';
			$thumbnail	= '';

			if($this->form_validation->run() == false ){
				$rs = array(
					'alert' => 'alert-danger',
					'rs'	=> 1,
					'msg'	=> '<b><i class="glyphicon glyphicon-remove"></i> Tolong isi data dengan benar...</b>'
				);

				$this->session->set_flashdata($rs);
				redirect("dashboard/artikel/edit/".$id_artikel,"refresh");
			}else{

				$this->load->helper('file');
				$config['upload_path'] = './uploads/thumbnail/';
				$config['allowed_types'] =  'jpg|png|jpeg';
				$config['max_size'] = '5120';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if($this->upload->do_upload('upload-gambar')){
					$file = $this->upload->data();

					$image = 'uploads/thumbnail/'.$file['file_name'];

					$config['image_library'] 	= 'gd2';
					$config['source_image'] 	= $file['full_path'];
					$config['create_thumb'] 	= TRUE;
					$config['maintain_ratio'] 	= TRUE;
					$config['width'] 			= 300;
					$config['height'] 			= 300;
					$config['new_image'] 		= './uploads/thumbnail/';

					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					$thumbnail = 'uploads/thumbnail/'.$file['raw_name'].'_thumb'.$file['file_ext'];
					$this->image_lib->clear();


				} else {
					$type = get_mime_by_extension($_FILES['upload-gambar']['name']);

					if(($type != 'image/jpeg' || $type != 'image/png' || $type != 'image/gif') && $_FILES['upload-gambar']['size'] > $config['max_size']) {
						$rs = array(
							'alert' => 'alert-danger',
							'rs'	=> 1,
							'msg'	=> '<b><i class="glyphicon glyphicon-remove"></i> Format file yang Anda upload tidak sesuai. Hanya bisa upload gambar saja...</b>'
						);

						$this->session->set_flashdata($rs);
						redirect("dashboard/artikel/edit/".$id_artikel,"refresh");
					}
				}
			}

			if($image){

				$image = $image;
				$thumbnail	= $thumbnail;

				unlink(FCPATH.$url_gambar);
				unlink(FCPATH.$url_thumb);

			}else{

				$image = $url_gambar;
				$thumbnail	= $url_thumb;

			}

			$update = array(
				'judul' => $judul,
				'deskripsi' => $deskripsi,
				'thumbnail'	=> $thumbnail,
				'gambar'	=> $image,
				'statuspublish_id'	=> $statuspublish_id,
				'url_artikel'	=> slug($judul)
			);

			$this->db->trans_begin();

			$this->model_artikel->getUpdate($update,$id_artikel);

			$this->model_artikel->getDeleteKatDetail(array("id_artikel" => $id_artikel));

			for($i=0; $i<count($kategori_artikel); $i++){

				$this->model_artikel->getInsertKategoriDetail(array("id_artikel" => $id_artikel, "id_kategoriartikel" => $kategori_artikel[$i]));

			}


			if($this->db->trans_status() === true){
				$this->db->trans_commit();
				$rs = array(
					'alert' => 'alert-success',
					'rs'	=> 1,
					'msg'	=> '<b><i class="glyphicon glyphicon-ok"></i> Berhasil Mengedit Artikel...</b>'
				);

				$this->session->set_flashdata($rs);
				redirect("dashboard/artikel/edit/".$id_artikel,"refresh");
			}else{
				$this->db->trans_rollback();
				$rs = array(
					'alert' => 'alert-danger',
					'rs'	=> 1,
					'msg'	=> '<b><i class="glyphicon glyphicon-remove"></i> Gagal Mengedit Artikel...</b>'
				);

				$this->session->set_flashdata($rs);
				redirect("dashboard/artikel/edit/".$id_artikel,"refresh");
			}
		}
	}

	function hapus_artikel($id_artikel=''){
		if(!$this->session->userdata('logginUser')){
	     	 redirect('member/login','refresh');
	     }else{

	     	$id_artikel = decode($id_artikel);

	     	$cek	= $this->model_artikel->getAll(array("id_artikel" => $id_artikel, "user_id" => $this->session->userdata("user_id")))->row_array();

	     	if($cek){

	     		if($cek['gambar']){
	     			unlink(FCPATH.$cek['gambar']);
	     			unlink(FCPATH.$cek['thumbnail']);
	     		}

	     		$delete = $this->model_artikel->getDelete(array("id_artikel" => $id_artikel));

	     		$data	= array();

	     		if($delete){

	     			$this->model_artikel->getDeleteKatDetail(array("id_artikel" => $id_artikel));

	     			$data = array(
	     				"rs"	=> 1,
	     				"msg"	=> "<i class='glyphicon glyphicon-ok'></i> Berhasil Menghapus Artikel...",
	     				"alert"	=> "alert-success"
	     			);
	     		}else{
	     			$data = array(
	     				"rs"	=> 1,
	     				"msg"	=> "<i class='glyphicon glyphicon-ok'></i> Gagal Menghapus Artikel...",
	     				"alert"	=> "alert-danger"
	     			);
	     		}

	     		$this->session->set_flashdata($data);
	     		redirect("dashboard/artikel","refresh");

	     	}else{
	     		$this->load->view('pageNotFound');
	     	}
	     }
	}

	function kategori($page=''){

		if(!$this->session->userdata('logginUser') && $this->session->userdata("level_id") != 1){
	     	 redirect('member/login','refresh');
	     }else{

	     	 if(!$page){
	     		 $data['title']     = "Kategori | Jurit Online";
			     $data['menu']      = 'kategori';
			     $data['dashboard']	 = '1';
			     $this->load->view('layout/Header',$data);
			     $this->load->view('layout/Sidebar');
			     $this->load->view('page/dashboard/kategori/Index');
				 $this->load->view('layout/Footer');
	     	 }else{


	     	 }
	     }
	}

	function read_kategori($pg=1){
		 if(!$this->session->userdata('logginUser')){
	     	 redirect('member/login','refresh');
	     }else{

	     	$key	= trim($this->input->post('cari',true));
			$limit	= trim($this->input->post('limit',true));
			$user_id= $this->session->userdata('user_id');
			$offset = ($limit*$pg)-$limit;
			$like	= '';
			$where	= "(user_id = '$user_id' )";

			if($key) $like = "(nm_kategoriartikel LIKE '%$key%')";

			$page 	= array();
	        $page['limit'] 		= $limit;
	        $page['count_row'] 	= $this->model_kategori->getCount($where, $like);
	        $page['current'] 	= $pg;
	        $page['list'] 		= gen_paging($page);

	        $data['paging'] = $page;
			$data['key']	= $key;
			$data['list']	= $this->model_kategori->getAll($where, $like,  $limit, $offset);

			$this->load->view('page/dashboard/kategori/ListKategori',$data);
	     }
	}

	function cek_kategori($nama){

		$nama	= addslashes($nama);
		$rs		= "";

		$cek	= $this->model_kategori->getAll(array("nm_kategoriartikel" => $nama))->row_array();

		if($cek){
			$rs = 1;
		}else{
			$rs = 2;
		}

		echo json_encode(array("result" => $rs));

	}

	function simpan_kategori(){
		if(!isset($_POST['simpan'])){

			$this->load->view("pageNotFound");

		}else{
			$data	= array();
			$nama	= addslashes($this->input->post("nama",true));

			$cek	= $this->model_kategori->getAll(array("nm_kategoriartikel" => $nama))->row_array();

			if($cek){

				$data	= array(
					'msg'	=> 'Gagal menyimpan. Nama kategori sudah ada',
					'alert'	=> 'alert-danger',
					'rs'	=> 1
				);

			}else{

				$dt	= array(
					'nm_kategoriartikel'	=> $nama,
					'url_kategoriartikel'	=> slug($nama),
					'user_id'			=> $this->session->userdata("user_id")
				);

				$query	= $this->model_kategori->getInsert($dt);

				if($query){
					$data	= array(
						'msg'	=> '<i class="glyphicon glyphicon-ok"></i> Berhasil Menambahkan Kategori',
						'alert'	=> 'alert-success',
						'rs'	=> 1
					);
				}else{
					$data	= array(
						'msg'	=> 'Kategori gagal disimpan',
						'alert'	=> 'alert-danger',
						'rs'	=> 1
					);
				}

			}

			$this->session->set_flashdata($data);
			redirect("dashboard/kategori","refresh");
		}
	}

	function hapus_kategori($id=''){
		if(!$this->session->userdata('logginUser')){
	     	 redirect('member/login','refresh');
	     }else{

	     	$id = decode($id);

	     	$cek	= $this->model_kategori->getAll(array("id_kategoriartikel" => $id, "user_id" => $this->session->userdata("user_id")))->row_array();

	     	if($cek){

	     		$delete = $this->model_kategori->getDelete($id);

	     		$data	= array();

	     		if($delete){

	     			$data = array(
	     				"rs"	=> 1,
	     				"msg"	=> "<i class='glyphicon glyphicon-ok'></i> Berhasil Menghapus Kategori...",
	     				"alert"	=> "alert-success"
	     			);
	     		}else{
	     			$data = array(
	     				"rs"	=> 1,
	     				"msg"	=> "<i class='glyphicon glyphicon-ok'></i> Gagal Menghapus Kategori...",
	     				"alert"	=> "alert-danger"
	     			);
	     		}

	     		$this->session->set_flashdata($data);
	     		redirect("dashboard/kategori","refresh");

	     	}else{
	     		$this->load->view('pageNotFound');
	     	}
	     }
	}

	function semuaartikel($page='',$id_artikel=''){
		if(!$this->session->userdata('logginUser') || $this->session->userdata('level_id') != 1){
	     	 redirect('member/login','refresh');
	     }else{

	     	 if($page==''){

	     	 	 $data['title']     = "Semua Artikel | Jurit Online";
			     $data['menu']      = 'semuaartikel';
			     $data['dashboard']	 = '1';
			     $this->load->view('layout/Header',$data);
			     $this->load->view('layout/Sidebar');
			     $this->load->view('page/dashboard/semuaartikel/Index');
				 $this->load->view('layout/Footer');

	     	 }else if($page=='edit' && $id_artikel != ''){

	     	 	$id		= addslashes($id_artikel);

	     	 	$where	= array(
 					'id_artikel'	=> $id
 				 );

 				 $cek	=  $this->model_artikel->getAll($where)->row_array();

 				 if($cek){

 				 	 $listkategori	= array();
 				 	 $query		= $this->model_artikel->getIdKatByIdArtikel(array("id_artikel" => $id))->result();

 				 	 foreach($query as $row){
 				 	 	array_push($listkategori,$row->id_kategoriartikel);
 				 	 }

 				 	 $data['title']     = "Edit Artikel | Jurit Online";
				     $data['menu']      = 'semuaartikel';
				     $data['kategori']	= $this->model_kategori->getAll();
				     $data['juritku']	= $cek;
				     $data['dashboard']	 = '1';
				     $this->load->view('layout/Header',$data);
				     $this->load->view('layout/Sidebar');
				     $this->load->view('page/dashboard/semuaartikel/Edit');
					 $this->load->view('layout/Footer');
 				 }else{
 				 	$this->load->view("pageNotFound");
 				 }
	     	 }else{
	     	 	$this->load->view("pageNotFound");
	     	 }

	     }
	}

	function hapus_semuaartikel($id_artikel=''){
		if(!$this->session->userdata('logginUser') || $this->session->userdata('level_id') != 1){
				 redirect('member/login','refresh');
			 }else{

				$id_artikel = decode($id_artikel);

				$cek	= $this->model_artikel->getAll(array("id_artikel" => $id_artikel))->row_array();

				if($cek){

					if($cek['gambar']){
						unlink(FCPATH.$cek['gambar']);
						unlink(FCPATH.$cek['thumbnail']);
					}

					$delete = $this->model_artikel->getDelete(array("id_artikel" => $id_artikel));

					$data	= array();

					if($delete){

						$this->model_artikel->getDeleteKatDetail(array("id_artikel" => $id_artikel));

						$data = array(
							"rs"	=> 1,
							"msg"	=> "<i class='glyphicon glyphicon-ok'></i> Berhasil Menghapus Artikel...",
							"alert"	=> "alert-success"
						);
					}else{
						$data = array(
							"rs"	=> 1,
							"msg"	=> "<i class='glyphicon glyphicon-ok'></i> Gagal Menghapus Artikel...",
							"alert"	=> "alert-danger"
						);
					}

					$this->session->set_flashdata($data);
					redirect("dashboard/semuaartikel","refresh");

				}else{
					$this->load->view('pageNotFound');
				}
			 }
	}

	function user($page='',$user_id=''){
		if(!$this->session->userdata('logginUser') || $this->session->userdata('level_id') != 1){
	     	 redirect('member/login','refresh');
	     }else{
	     	 if($page==''){

	     	 	 $data['title']     = "Semua User | Jurit Online";
			     $data['menu']      = 'user';
			     $data['dashboard']	 = '1';
			     $this->load->view('layout/Header',$data);
			     $this->load->view('layout/Sidebar');
			     $this->load->view('page/dashboard/user/Index');
				 $this->load->view('layout/Footer');

	     	 }else if($page=='edit' && $user_id != ''){

	     	 }
	     }
	}

	function read_all_user($pg=1){

     	$key	= trim($this->input->post('cari',true));
		$limit	= trim($this->input->post('limit',true));
		$offset = ($limit*$pg)-$limit;
		$like	= '';
		$where	= "";

		if($key) $where = "(nama LIKE '%$key%')";

		$page 	= array();
        $page['limit'] 		= $limit;
        $page['count_row'] 	= $this->model_users->getCount($where, $like);
        $page['current'] 	= $pg;
        $page['list'] 		= gen_paging($page);

        $data['paging'] = $page;
		$data['key']	= $key;
		$data['list']	= $this->model_users->getAll($where, $like,  $limit, $offset);

		$this->load->view('page/dashboard/user/ListUser',$data);

	}

	function ubah_status_user(){
		if(!isset($_POST['simpan'])){
			echo "<h3 style='color:red;font-weight:bold;'>Forbiden Access</h3>";
		}else{

			$this->form_validation->set_rules("nama", "Username", "trim");
			$this->form_validation->set_rules("password", "Password", "trim");
			$this->form_validation->set_rules("userstatus_id", "Status", "trim");
			$this->form_validation->set_rules("userlevel_id", "Level", "trim");

			$nama			= addslashes($this->input->post('nama',true));
			$password			= addslashes($this->input->post('password',true));
			$userstatus_id	= addslashes($this->input->post('userstatus_id',true));
			$userlevel_id	= addslashes($this->input->post('userlevel_id',true));
			$user_id	= addslashes($this->input->post('user_id',true));

			if($this->form_validation->run() == false ){
				$rs = array(
					'alert' => 'alert-danger',
					'rs'	=> 1,
					'msg'	=> '<b><i class="glyphicon glyphicon-remove"></i> Tolong isi data dengan benar...</b>'
				);

				$this->session->set_flashdata($rs);
				redirect("dashboard/user","refresh");
			}else{
				$password	= password_hash($password, PASSWORD_BCRYPT);
				$update = array(
					'userstatus_id' => $userstatus_id,
					'nama' => $nama,
					'password' => $password,
					'userlevel_id'	=> $userlevel_id
				);


				$query = $this->model_users->getUpdate($update,$user_id);

				if($query){
					$rs = array(
						'alert' => 'alert-success',
						'rs'	=> 1,
						'msg'	=> '<b><i class="glyphicon glyphicon-ok"></i> Berhasil Update User...</b>'
					);

					$this->session->set_flashdata($rs);
					redirect("dashboard/user","refresh");
				}else{
					$rs = array(
						'alert' => 'alert-danger',
						'rs'	=> 1,
						'msg'	=> '<b><i class="glyphicon glyphicon-remove"></i> Gagal Update User...</b>'
					);

					$this->session->set_flashdata($rs);
					redirect("dashboard/user","refresh");
				}

			}
		}
	}

	function hapus_user($id=''){
		if(!$this->session->userdata('logginUser')){
				 redirect('member/login','refresh');
			 }else{

				$id = decode($id);

				$cek	= $this->model_users->getAll(array("user_id" => $id, "user_id" => $this->session->userdata("user_id")))->row_array();

				if($cek){

					$delete = $this->model_users->getDelete($id);

					$data	= array();

					if($delete){

						$data = array(
							"rs"	=> 1,
							"msg"	=> "<i class='glyphicon glyphicon-ok'></i> Berhasil Menghapus User...",
							"alert"	=> "alert-success"
						);
					}else{
						$data = array(
							"rs"	=> 1,
							"msg"	=> "<i class='glyphicon glyphicon-ok'></i> Gagal Menghapus User...",
							"alert"	=> "alert-danger"
						);
					}

					$this->session->set_flashdata($data);
					redirect("dashboard/user","refresh");

				}else{
					$this->load->view('pageNotFound');
				}
			 }
	}

	function ubah_status_artikel(){
		if(!isset($_POST['simpan'])){
			echo "<h3 style='color:red;font-weight:bold;'>Forbiden Access</h3>";
		}else{

			$this->form_validation->set_rules("statusartikel_id", "Status Artikel", "trim|required");


			$id_artikel		= addslashes($this->input->post('id_artikel',true));
			$statusartikel_id	= $this->input->post('statusartikel_id',true);


			if($this->form_validation->run() == false ){
				$rs = array(
					'alert' => 'alert-danger',
					'rs'	=> 1,
					'msg'	=> '<b><i class="glyphicon glyphicon-remove"></i> Silahkan isi data dengan benar...</b>'
				);

				$this->session->set_flashdata($rs);
				redirect("dashboard/semuaartikel/edit/".$id_artikel,"refresh");
			}else{

				$update = array(
					'statusartikel_id' => $statusartikel_id
				);

				$this->db->trans_begin();

				$this->model_artikel->getUpdate($update,$id_artikel);


				if($this->db->trans_status() === true){
					$this->db->trans_commit();
					$rs = array(
						'alert' => 'alert-success',
						'rs'	=> 1,
						'msg'	=> '<b><i class="glyphicon glyphicon-ok"></i> Berhasil Mengubah Status Artikel...</b>'
					);

					$this->session->set_flashdata($rs);
					redirect("dashboard/semuaartikel/edit/".$id_artikel,"refresh");
				}else{
					$this->db->trans_rollback();
					$rs = array(
						'alert' => 'alert-danger',
						'rs'	=> 1,
						'msg'	=> '<b><i class="glyphicon glyphicon-remove"></i> Gagal Mengubah Status Artikel...</b>'
					);

					$this->session->set_flashdata($rs);
					redirect("dashboard/semuaartikel/edit/".$id_artikel,"refresh");
				}
			}
		}
	}

}
