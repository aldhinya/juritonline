<?php
	$meta_judul = isset($meta_judul) ? $meta_judul : 'Alas Jurit Online SMK Negeri 1 Cerme';
	$meta_deskripsi = isset($meta_deskripsi) ? $meta_deskripsi : 'Komunitas Redaksi Majalah Alas Jurit Online SMK Negeri 1 Cerme';
	$meta_image = isset($meta_image) ? $meta_image : base_url('assets/img/smk.png');
	$meta_url = isset($meta_url) ? $meta_url : base_url();
?>
<html lang="en">
<head>
<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="<?php echo $meta_deskripsi; ?>"/>
	<meta name="google-site-verification" content="YAfkWaPT77WT9pHJHpR8bSspC5MCNEZG8Bg-FTLNNzc" />
	<meta property="og:title" content="<?php echo $meta_judul; ?>" />
	<meta property="og:description" content="<?php echo $meta_deskripsi; ?>" />
	<meta property="og:image" content="<?php echo $meta_image; ?>" />
	<meta property="og:url" content="<?php echo $meta_url; ?>" />
	<meta property="og:site_name" content="Jurit Online SMK Negeri 1 Cerme" />
	<link  href="<?php echo base_url(); ?>assets/img/smk.png" rel="shortcut icon">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css')?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css')?>" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/loading.js')?>"></script>
	<link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" >
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url(); ?>" style="font-size:25px;" >Jurit Online</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="<?php echo $menu == 'home' ? 'active' : '' ?>"><a href="<?php echo site_url(''); ?>"> <i class="fa fa-home"></i>  Beranda <span class="sr-only">(current)</span></a></li>
            <li class="<?php echo $menu == 'navjurit' ? 'active' : '' ?>"><a href="<?php echo site_url('blog'); ?>"><i class="fa fa-list-ul"></i> Artikel</a></li>
            <li class="<?php echo $menu == 'member' ? 'active' : '' ?>"><a href="<?php echo site_url('member'); ?>"><i class="fa fa-user"></i> Member</a></li>
						<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars" ></i> Lainnya <span class="caret"></span></a>
              <ul class="dropdown-menu">
								<li class="<?php echo $menu == 'tentang' ? 'active' : '' ?>"><a href="<?php echo site_url('tentang'); ?>"><i class="fa fa-question-circle" ></i> Tentang</a></li>

		            <li class="<?php echo $menu == 'hubungi' ? 'active' : '' ?>"><a href="<?php echo site_url('hubungi'); ?>"><i class="fa fa-envelope" ></i> Hubungi</a></li>
								<li><a href="http://tkjsmkn1ce.ml" target="_blank"><i class="fa fa-link"></i> XII TKJ 1</a></li>
								<li><a href="http://smkn1cermegresik.sch.id/" target="_blank"><i class="fa fa-link"></i> SMK Negeri 1 Cerme</a></li>
              </ul>
            </li>
          </ul>
          <div class="navbar-form navbar-right" >
            <div class="form-group">
              <?php if(!$this->session->userdata('logginUser')){ ?>
                <a href="<?php echo site_url('member/register'); ?>" class="btn <?php echo $menu == 'daftar' ? 'btn-trans-active' : 'btn-trans' ?>"><i class="fa fa-user-plus"></i> Register</a>
                <a href="<?php echo site_url('member/login'); ?>" class="btn <?php echo $menu == 'melbu' ? 'btn-trans-active' : 'btn-trans' ?>"><i class="fa fa-sign-in"></i> Login</a>
              <?php }else{ ?>
                <?php if($this->session->userdata('userstatus_id') == 1){ ?>
                <a href="<?php echo site_url('dashboard'); ?>" class="btn btn-info"><i class="fa fa-tachometer"></i> Dashboard</a>
                <?php } ?>
								<?php if($this->session->userdata('userstatus_id') == 3){ ?>
								<a href="<?php echo site_url('member/verifikasi'); ?>" class="btn btn-info"><i class="fa fa-exclamation-circle"></i> Verikasi Akun</a>
								<?php } ?>
                <a href="<?php echo site_url('member/logout'); ?>" class="btn btn-trans"><i class="fa fa-sign-out"></i> Logout</a>
              <?php } ?>
            </div>
          </div>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
	<div class="container">
    	<div class="row" style='min-height:600px'>
