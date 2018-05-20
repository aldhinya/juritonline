<div class="col-md-9">
  <div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb" style='color:fff'>
           <li><a href="<?php echo site_url(''); ?>"></i><i class="fa fa-home"></i> Beranda</a></li>
           <li class="active">Dashboard</li>
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
        <?php $user = $this->model_users->getAll(array("user_id" => $this->session->userdata("user_id")))->row_array()?>
          <div style="font-size:25px">
            Selamat Datang <b><?php echo $user['nama']?></b>
          </div>
        <?php ?>
        <quote>
            <b>Silahkan Update Artikel Terbaru Kamu</b>
        </quote>

    </div>
  </div>
</div>
