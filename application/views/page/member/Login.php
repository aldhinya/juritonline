<div class="col-md-9">
  <div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb" style='color:fff'>
           <li><a href="<?php echo site_url(''); ?>"></i><i class="fa fa-home"></i> Beranda</a></li>
           <li class="active">Login</li>
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
      <form class="form-horizontal" action="<?php echo base_url('member/cek_login') ?>" method="POST" >
        <div class="form-group">
          <label for="email" class="col-sm-3 control-label">Email</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" id="email" name='email' placeholder="Email..." required>
          </div>
        </div>
        <div class="form-group">
          <label for="password" class="col-sm-3 control-label">Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" id="password" name='password' placeholder="Password..." required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-10">
            <button type="submit" class="btn btn-primary" name='masuk'><i class="fa fa-check"></i> Login</button>
            <br><br>
            Lupa Password ? <b><a href="<?php echo site_url('hubungi'); ?>" style="color:red">Hubungi Admin Jurit Online</a></b>
            <br>
            Belum Punya Akun ? <b><a href="<?php echo site_url('member/register'); ?>" style="color:green">Daftar Di Sini !</a></b>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
