<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->helper('general_helper');
		$this->load->library('form_validation');
			$this->load->model("model_users");
		$this->load->model("model_artikel");
	}

	public function index($user_id='', $slug=''){

		if($user_id=='' || $slug==''){
			$data['title']      = "Member | Jurit Online";
		    $data['menu']       = 'member';
		    $data['member']       = $this->model_users->getAll(array("userstatus_id" => 1));

			$this->load->view('layout/Header',$data);
			$this->load->view('page/member/All');
			$this->load->view('layout/Sidebar');
			$this->load->view('layout/Footer');
		}else{
				$this->load->view('pageNotFound');
			}

	}

	function profile($user_id='', $slug=''){

		if($user_id=='' || $slug==''){
				redirect('member','refresh');
			}else{

			$cek	= $this->model_users->getAll(array("user_id" => $user_id,"userstatus_id" => 1))->row_array();

			if($cek){

				if(slug($cek['nama']) == $slug){

					$data['title']      = "".$cek['nama']." | Jurit Online";
						$data['menu']       = 'member';
						$data['member']       = $cek;

					$this->load->view('layout/Header',$data);
					$this->load->view('page/member/Index');
					$this->load->view('layout/Sidebar');
					$this->load->view('layout/Footer');


				}else{
					$this->load->view('pageNotFound');
				}
			}else{
				$this->load->view('pageNotFound');
			}
		}

	}

	function read_a($pg=1){

			$this->load->model("model_artikel");
			$key	= trim($this->input->post('cari',true));
		$limit	= trim($this->input->post('limit',true));
		$member	= trim($this->input->post('member',true));
		$offset = ($limit*$pg)-$limit;
		$like	= '';
		$where	= "((statuspublish_id = 1 AND statusartikel_id = 1) AND user_id = '$member')";

		if($key) $like = "(judul LIKE '%$key%')";

		$page 	= array();
				$page['limit'] 		= $limit;
				$page['count_row'] 	= $this->model_artikel->getCount($where, $like);
				$page['current'] 	= $pg;
				$page['list'] 		= gen_paging($page);

				$data['paging'] = $page;
		$data['key']	= $key;
		$data['list']	= $this->model_artikel->getAll($where, $like,  $limit, $offset);

		$this->load->view('page/main/ListArtikel',$data);

	}

	function read_member($pg=1){

			$key	= trim($this->input->post('cari',true));
		$limit	= trim($this->input->post('limit',true));
		$offset = ($limit*$pg)-$limit;
		$like	= '';
		$where	= "(userstatus_id = 1)";

		if($key) $where = "(nama LIKE '%$key%')";

		$page 	= array();
				$page['limit'] 		= $limit;
				$page['count_row'] 	= $this->model_users->getCount($where, $like);
				$page['current'] 	= $pg;
				$page['list'] 		= gen_paging($page);

				$data['paging'] = $page;
		$data['key']	= $key;
		$data['list']	= $this->model_users->getAll($where, $like,  $limit, $offset);

		$this->load->view('page/member/ListMember',$data);

	}
	function verifikasi(){
		  if(!$this->session->userdata('logginUser')){
	     	 redirect('member','refresh');
	     }else{

	     	if($this->session->userdata('userstatus_id') == 1){
	     		redirect("member","refresh");
	     	}else{
	     		 $data['title']      = "User Verifikasi | Jurit Online";
			     $data['menu']       = 'dashboard';
			     $data['dashboard']	 = '1';

			     $this->load->view('layout/Header',$data);
			     $this->load->view('page/member/Verifikasi');
	     	}
	     }
	}

	//signup user
	function register(){

	     if($this->session->userdata('logginUser')){
	     	 redirect('dashboard','refresh');
	     }else{
	     	 $data['title']      = "Register | Jurit Online";
		     $data['menu']       = 'daftar';

		     $this->load->view('layout/Header',$data);
		     $this->load->view('page/member/Register');
				 $this->load->view('layout/Sidebar');
			 $this->load->view('layout/Footer');
	     }
	}

	function daftarUser(){

		if(!isset($_POST['daftar'])){
			echo "<h3 style='color:red;font-weight:bold;'>Forbiden Access</h3>";
		}else{

			$this->form_validation->set_rules("nama", "Username", "required|trim");
			$this->form_validation->set_rules("password", "Password", "required|trim");
			$this->form_validation->set_rules("email", "Email", "required|trim|valid_email");

			$nama		= addslashes($this->input->post('nama',true));
			$password	= addslashes($this->input->post('password',true));
			$email		= addslashes($this->input->post('email',true));

			if($this->form_validation->run() == false ){
				$rs = array(
					'alert' => 'alert-danger',
					'rs'	=> 1,
					'msg'	=> '<b><i class="glyphicon glyphicon-remove"></i> Please fill data correctly...</b>'
				);

				$this->session->set_flashdata($rs);
				redirect("member/register","refresh");
			}else{

				$cek	= $this->model_users->getAll(array("email" => $email))->row_array();

				if($cek){
					$rs = array(
						'alert' => 'alert-danger',
						'rs'	=> 1,
						'msg'	=> '<b><i class="glyphicon glyphicon-remove"></i> Maaf, Email anda sudah pernah didaftarkan, silahkan gunakan email lain...</b>'
					);

					$this->session->set_flashdata($rs);
					redirect("member/register","refresh");
				}else{
					$password	= password_hash($password, PASSWORD_BCRYPT);

					$data	= array(
						'nama'		=> $nama,
						'password'	=> $password,
						'email'		=> $email,
						'userlevel_id' => 2,
						'userstatus_id' => 3
					);

					$config['email']= $email;
					$config['nama']	= $nama;
					$denmail		= $this->sendmail($config);

					if($denmail == true){

						$query = $this->model_users->getInsert($data);

						if($query){

							$where		= array(
								'email'	=> $email,
								'nama'	=> $nama,
								'userlevel_id' => 2
							);

							$getUser	= $this->model_users->getAll($where)->row_array();

							$rs = array(
								'alert' => 'alert-success',
								'rs'	=> 1,
								'msg'	=> ' '
							);

							$data_session	= array(
									'user_id'	=> $getUser['user_id'],
									'logginUser'=> true,
									'userstatus_id' => 3,
									'nama'		=> $nama,
									'email'	=> $email
							);

							$this->session->set_userdata($data_session);
							$this->session->set_flashdata($rs);

							redirect("member/verifikasi","refresh");
						}else{
							$rs = array(
								'alert' => 'alert-danger',
								'rs'	=> 1,
								'msg'	=> '<b><i class="glyphicon glyphicon-remove"></i> Registration is failed..</b>'
							);

							$this->session->set_flashdata($rs);
							redirect("member/register","refresh");
						}
					}
				}
			}
		}
	}

	//sendmail
	function sendmail($data=array()){


	    $msg  = '';
		//
$msg  .= "<span style='font-size:20px;font-weight:bold'> Hi, ".$data['nama']."</span><br/>";
$msg  .= "<br/><p>Anda baru saja mendaftar di <a href='http://jurit.online/'>Website Jurit Online</a>. Untuk menyelesaikan pendaftaran di <a href='http://jurit.online/'>Jurit Online</a>, harap konfirmasikan akun anda.</p><br/>";
$msg  .= "<a href=".site_url('member/konfirmasi/'.encode($data['email']))." style='background-color:#3A5795;color:white;font-weight:bold;padding:10px;text-decoration:none;' > Konfirmasi Akun Anda</a>";
$msg  .= "<br/><br/><p>Jika tombol di atas tidak berfungsi, salin tautan berikut lalu buka di browser Anda : </p>";
$msg  .= "<div class='well' style='background-color:#D2D6DE;width:800px;padding:10px 15px;margin-top:10px'>";
$msg  .= "<a href=".site_url('member/konfirmasi/'.encode($data['email'])).">".site_url('member/konfirmasi/'.encode($data['email']))."</a>";
$msg  .= "</div>";
$msg  .= "<br/><b>Admin Jurit Online - admin@jurit.online</b><br/>";
$msg  .= "<small><b><i>E-mail ini dikirim secara otomatis oleh Jurit Online. Mohon tidak membalas e-mail ini.</i></b></small>";


	    //$this->load->library('email');
	   	$CI = get_instance();
		$CI->load->library('email');
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'mail.jurit.online'; // Alamat SMTP server
		$config['smtp_port'] = '26'; // Port SMTP
		$config['smtp_user'] = 'no-reply@jurit.online'; // Alamat Email Anda
		$config['smtp_pass'] = 'inipassword'; // Password Email Anda
		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['newline'] = "\r\n";
		$config['crlf'] = "\r\n";
		//$config['newline'] = "\r\n";
		$CI->email->initialize($config);

	    $this->email->from('no-reply@jurit.online', 'Jurit Online'); // Alamat Email Anda dan Nama yang Akan tampil pada email yang akan terkirim ke user
	    $this->email->to($data['email']);
	    $this->email->subject('Verifikasi Akun Jurit Online');
	    $this->email->message($msg);

	    if ($this->email->send())
	        return true;
	    else
	        return false;
	}

	//konfirmasi dari email
	function konfirmasi($email=""){
		if($email == ''){
			$this->load->view("pageNotFound");
		}else{
			$email	= decode($email);

			$get	=  $this->model_users->getAll(array("email" => $email))->row_array();

			if($get['userstatus_id'] == 3){

				$update = $this->model_users->getUpdate(array("userstatus_id" => 1), $get['user_id']);


				if($update){

					$getUser=  $this->model_users->getAll(array("user_id" => $get['user_id']))->row_array();

					$data_session	= array(
							'user_id'	=> $getUser['user_id'],
							'logginUser'=> true,
							'level_id'	=> $getUser['userlevel_id'],
							'userstatus_id' => $getUser['userstatus_id']
					);

					$rs = array(
						'alert' => 'alert-success',
						'rs'	=> 1,
						'msg'	=> 'Selamat datang di <b>Jurit Online</b>, semoga hari anda menyenangkan.. '
					);

					$this->session->set_flashdata($rs);
					$this->session->set_userdata($data_session);

					redirect("dashboard","refresh");
				}else{
					echo "<h4 style='color:red'>Maaf, Sistem Jurit Online sedang Error...</h4>";
				}
			}else{

				$this->load->view("pageNotFound");
			}
		}
	}

	function cekEmailRegistrasi(){
		$email	= addslashes($this->input->post("x",true));
		$query	= $this->model_users->getAll(array("email" => $email))->row_array();
		if($query){
			$data = array(
				"rs" => 1,
				"msg" => "<span style='color:red;font-size:12px'>Maaf, Email Anda Sudah Pernah Didaftarkan di Jurit Online</span>"
			);
		}else{
			$data = array(
				"rs" => 2,
				"msg" => ""
			);
		}

		echo json_encode($data);

	}

	//signin user
	function login(){
	     if($this->session->userdata('logginUser')){
	     	 redirect('dashboard','refresh');
	     }else{

		     $data['title']      = "Login | Jurit Online";
		     $data['menu']       = 'melbu';

		     $this->load->view('layout/Header',$data);
		     $this->load->view('page/member/Login');
				 $this->load->view('layout/Sidebar');
			 $this->load->view('layout/Footer');
	     }
	}

	function cek(){
		$CI = get_instance();
		$CI->load->library('email');
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'mail.jurit.online'; // Alamat SMTP server
		$config['smtp_port'] = '26'; // Port SMTP
		$config['smtp_user'] = 'no-reply@jurit.online'; // Alamat Email Anda
		$config['smtp_pass'] = 'inipassword'; // Password Email Anda
		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['newline'] = "\r\n";
		$config['crlf'] = "\r\n";
		//$config['newline'] = "\r\n";

		$CI->email->initialize($config);

		$this->email->from('no-reply@jurit.online', 'Jurit Online'); // Alamat Email Anda dan Nama yang Akan tampil pada email yang akan terkirim ke user
		    $this->email->to('emailmu@yahooo.com'); // Email yang dikirim ke user baru juga akan terkirim ke email ini
		    $this->email->subject('Verifikasi Akun Jurit Online');
		    $this->email->message('test');


	}

	function cek_login(){
			if(!isset($_POST['masuk'])){
			echo "<h3 style='color:red;font-weight:bold;'>Forbiden Access</h3>";
		}else{

			$this->form_validation->set_rules("password", "Password", "required|trim");
			$this->form_validation->set_rules("email", "Email", "required|trim|valid_email");

			$password	= addslashes($this->input->post('password',true));
			$email		= addslashes($this->input->post('email',true));

			if($this->form_validation->run() == false ){
				$rs = array(
					'alert' => 'alert-danger',
					'rs'	=> 1,
					'msg'	=> '<b><i class="glyphicon glyphicon-remove"></i> Please complete the form...</b>'
				);

				$this->session->set_flashdata($rs);
				redirect("member/login","refresh");
			}else{

				$where	= array(
					'email'		=> $email,
				);

				$getUser = $this->model_users->getAll($where)->row_array();

				if($getUser){

					if($getUser['userstatus_id'] == 1){
						if(password_verify($password, $getUser['password'])){
							$data_session	= array(
									'user_id'	=> $getUser['user_id'],
									'logginUser'=> true,
									'level_id'	=> $getUser['userlevel_id'],
									'userstatus_id' => $getUser['userstatus_id']
							);

							$this->session->set_userdata($data_session);

							redirect("dashboard","refresh");
						}else{
							$rs = array(
								'alert' => 'alert-danger',
								'rs'	=> 1,
								'msg'	=> '<b><i class="glyphicon glyphicon-remove"></i> Email dan password yang anda masukkan salah...</b>'
							);

							$this->session->set_flashdata($rs);
							redirect("member/login","refresh");
						}
					}else if($getUser['userstatus_id'] == 2){
						$rs = array(
							'alert' => 'alert-danger',
							'rs'	=> 1,
							'msg'	=> '<b><i class="glyphicon glyphicon-remove"></i> Akun Anda telah dinonaktifkan oleh Admin. Silahkan Hubungi Administrator Jurit Online...</b>'
						);

						$this->session->set_flashdata($rs);
						redirect("member/login","refresh");
					}else if($getUser['userstatus_id'] == 3){
						$data_session	= array(
								'user_id'	=> $getUser['user_id'],
								'logginUser'=> true,
								'level_id'	=> $getUser['userlevel_id'],
								'nama'	=> $getUser['nama'],
								'email'	=> $getUser['email'],
								'userstatus_id' => $getUser['userstatus_id']
						);

						$this->session->set_userdata($data_session);
						redirect("member/login","refresh");
					}
				}else{
					$rs = array(
						'alert' => 'alert-danger',
						'rs'	=> 1,
						'msg'	=> '<b><i class="glyphicon glyphicon-remove"></i> Email dan password yang anda masukkan salah...</b>'
					);

					$this->session->set_flashdata($rs);
					redirect("member/login","refresh");
				}
			}
		}
	}

	//kirim ulang email
	function kirim_ulang_email($email = ""){
		echo "kirim ulang email";
	}

	//signout user
	function logout(){

		$this->session->unset_userdata('logginUser');

		session_destroy();

		redirect('member/login','refresh');
	}

}
