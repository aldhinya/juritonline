<div class="col-md-9">
  <div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb" style='color:fff'>
           <li><a href="<?php echo site_url(''); ?>"></i><i class="fa fa-home"></i> Beranda</a></li>
           <li class="active">Register</li>
        </ol>
    </div>
    <div class="col-md-12">
      <?php
         if($this->session->flashdata('rs') == 1){ ?>

             <div class="alert <?php echo $this->session->flashdata('alert'); ?>">
                       <?php echo $this->session->flashdata('msg') ?>
             </div>
        <?php }
      ?>
      <form class="form-horizontal" action="<?php echo base_url('member/daftarUser') ?>" method="POST" >
        <div class="form-group">
          <label for="nama" class="col-sm-3 control-label">Nama</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="nama" name='nama' placeholder="Nama Lengkap..." required >
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-3 control-label">Email</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" id="email" name='email' placeholder="Email Aktif..." required onchange="CekEmail(this.value)">
            <label for="email" id="pesan-error-email"></label>
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="col-sm-3 control-label">Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" id="password" name='password' placeholder="*************" required onchange="CekPassword()" >
          </div>
        </div>
        <div class="form-group">
          <label for="pass" class="col-sm-3 control-label">Konfirmasi Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" id="pass" placeholder="*************" required onchange="CekPassword()" >
            <label for="pass" id="pesan-error-password"></label>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-10">
            <div id="form-btn-register" class="tombol-register">
              <button type="submit" class="btn btn-primary"  id='btn-register' name="daftar"><i class="fa fa-check"></i> Register</button>
            </div>
            <button type="submit" class="btn btn-primary hide" name='daftar' id='btn-submit-register'><i class="fa fa-check"></i> Register</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/main.js')?>"></script>
