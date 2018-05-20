<div class="col-md-3">
  <div class="left-sidebar">
    <?php $user = $this->model_users->getAll(array("user_id" => $this->session->userdata("user_id")))->row_array()?>
      <?php if(isset($dashboard)){?>
      <?php if($this->session->userdata('logginUser')){ ?>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title" style='font-size:15px'><b><i class="fa fa-user"></i> Profil Anda</b></h3>
        </div>
        <div class="panel-body">
          <center><img src="<?php echo base_url($user['gambar'] != '' ? $user['gambar'] : 'assets/img/no_poto.png' ) ?>" style='width:125px;height:125px' class='img img-circle' />
          <br/><br/><h3 class="panel-title" style='font-size:15px'><b><?php echo $user['nama']?></b></h3>
          </center>
        </div>
      </div>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><b><i class="fa fa-bars"></i> Menu Dashboard</b></h3>
        </div>
      </div>
      <ul class="nav nav-pills nav-stacked" style='margin-top:-15px;'>
      	  <li class="<?php echo $menu == 'dashboard' ? 'active2' : '' ?>">
      	    <a href="<?php echo site_url('dashboard')?>"><i class="fa fa-tachometer"></i> Dashboard</a>
      	  </li>
      	  <li class="<?php echo $menu == 'akun' ? 'active2' : '' ?>">
      	    <a href="<?php echo site_url('dashboard/akun')?>"><i class="fa fa-user"></i> Akun</a>
      	  </li>
      	  <li class="<?php echo $menu == 'artikel' ? 'active2' : '' ?>">
      	    <a href="<?php echo site_url('dashboard/artikel')?>"><i class="fa fa-pencil" ></i> Artikel</a>
      	  </li>
      	    <li class="<?php echo $menu == 'kategori' ? 'active2' : '' ?>">
        	    <a href="<?php echo site_url('dashboard/kategori')?>"><i class="fa fa-tags"></i> Kategori</a>
        	  </li>
            <?php if($this->session->userdata('level_id') == 1){ ?>
        	  <li class="<?php echo $menu == 'semuaartikel' ? 'active2' : '' ?>">
      	      <a href="<?php echo site_url('dashboard/semuaartikel')?>"><i class="fa fa-globe"></i> Semua Artikel</a>
      	    </li>
      	    <li class="<?php echo $menu == 'user' ? 'active2' : '' ?>">
      	      <a href="<?php echo site_url('dashboard/user')?>"><i class="fa fa-users"></i> Data User</a>
      	    </li>
      	  <?php } ?>
      </ul>
      <br/>
      <?php } ?>
    <?php }else{ ?>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><a href="<?php echo site_Url('blog')?>"><i class="fa fa-chevron-circle-right"></i> <b>Artikel Terbaru</b></a></h3>
      </div>
      <div class="panel-body">
        <?php
          $jurit = $this->model_artikel->getFiveLatest();
          foreach($jurit->result() as $row_){ ?>
            <div style='padding:10px 0;border-bottom:1px dotted #d2d6de'><a href="<?php echo site_url('blog/artikel/'.$row_->id_artikel.'/'.$row_->url_artikel)?>" ><?php echo $row_->judul; ?></a></div>
          <?php }
        ?>
      </div>
    </div>
    <?php if($jurit->num_rows() > 0){ ?>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><a href="<?php echo site_Url('blog/kategori')?>"><i class="fa fa-chevron-circle-right"></i> <b>Kategori</b></a></h3>
      </div>
      <div class="panel-body">
        <?php
          $jurit = $this->model_artikel->getIdKategori();
          $kategori = array();
          foreach($jurit->result() as $row_){
            array_push($kategori,$row_->id_kategoriartikel);
          }
          $kategori = implode(",",$kategori);
          //var_dump($kategori);
          $kategori = $this->model_kategori->getAll("id_kategoriartikel IN ($kategori)");
          foreach($kategori->result() as $row){
        ?>
          <a href="<?php echo site_url('blog/kategori/'.$row->url_kategoriartikel) ?>" ><span class="badge badge-danger" style="padding:5px 10px;margin:5px 0px"><?php echo $row->nm_kategoriartikel ?></span></a>
        <?php } ?>
      </div>
    </div>
    <?php } ?>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-chevron-circle-right"></i> <b>Pesan</b></h3>
      </div>
      <div class="panel-body">
        <center><b>Website Ini Dibuat Untuk Tugas Kerja Proyek XII TKJ 1 - SMK Negeri 1 Cerme dan Masih Dalam Tahap Pengembangan.<br/> <br/>Kritik dan Saran Silahkan Hubungi Admin Melalui Halaman Kontak <a href="http://jurit.online/hubungi">Berikut.</a></b></center>
        <br>
        </div>
    </div>
    <?php } ?>
  </div>
</div>
