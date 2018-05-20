<div class="col-md-12">
  <div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb" style='color:fff'>
           <li><a href="<?php echo site_url(''); ?>"></i><i class="fa fa-home"></i> Beranda</a></li>
           <li class="active">Verifikasi User</li>
        </ol>
    </div>
    <div class="col-md-12">

        <span style="font-size:20px;font-weight:bold">Hi <?php echo $this->session->userdata('nama');?>,</span><br/><br/>

		Kami Telah Mengirim Link Verifikasi Ke Email Anda. Silahkan Cek Email Anda Untuk Verifikasi Akun. <br/>
    <b>Jika Tidak Ada Silahkan Cek Folder Spam</b>. 	<!--	Jika Belum Juga Terkirim Silahkan Klik Tombol Di Bawah Ini.
<br/><br/>

		<a href='<?php echo site_url('member/kirim_ulang_email/'.encode($this->session->userdata('email'))); ?>' class='btn btn-info'><i class='fa fa-link'></i> Kirim Ulang Link Verifikasi</a>
-->
    </div>
  </div>
</div>
