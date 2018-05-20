
<link rel="stylesheet" href="<?php echo base_url('assets/chosen/prism.css')?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('assets/chosen/chosen.css')?>" type="text/css" />

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/chosen/chosen.jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/chosen/prism.js') ?>"></script>

<div class="col-md-9">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb" style='color:fff'>
               <li><a href="<?php echo site_url(''); ?>"></i><i class="fa fa-home"></i> Beranda</a></li>
               <li><a href="<?php echo site_url('dashboard'); ?>"></i>Dashboard</a></li>
               <li><a href="<?php echo site_url('dashboard/semuaartikel'); ?>"></i>List Semua Artikel</a></li>
               <li class="active">Edit Artikel</li>
            </ol>
        </div>
    </div>
    <div class='row'>
      <div class="col-md-12">
      <?php
         if($this->session->flashdata('rs') == 1){ ?>

             <div class="alert <?php echo $this->session->flashdata('alert'); ?>">
                       <?php echo $this->session->flashdata('msg') ?>
             </div>
        <?php }
      ?>
     <?php echo form_open_multipart('dashboard/ubah_status_artikel') ?>
         <div class="form-horizontal">
           <div class="form-group">
            <label for="deskripsi" class="col-sm-3 control-label">Ubah status</label>
            <div class="col-sm-9">
                <select name="statusartikel_id" class='form-control'>
                    <option <?php echo $juritku['statusartikel_id'] == 1 ? 'selected' : '' ?> value='1'>Tampilkan Di Jurit Online</option>
                    <option <?php echo $juritku['statusartikel_id'] == 2  ? 'selected' : '' ?> value='2' >Jangan Tampilkan Di Jurit Online</option>
                </select>
            </div>
          </div>
            <div class="form-group">
              <label for="judul" class="col-sm-3 control-label">Judul</label>
              <div class="col-sm-9">
                <label style='padding-top:8px'><?php echo $juritku['judul']; ?></label>
                <input readonly type="hidden" class="form-control" id="id_artikel" name='id_artikel' placeholder="id_artikel..." required value="<?php echo $juritku['id_artikel']; ?>" />
              </div>
            </div>
            <div class="form-group">
              <label for="statuspublish_id" class="col-sm-3 control-label" >Status Publish</label>
              <div class="col-sm-9">
                  <label for="" style='padding-top:8px'><?php echo $juritku["statuspublish_id"] == 1 ? 'Publish' : 'Draft' ; ?></label>
              </div>
            </div>
            <div class="form-group">
              <label for="deskripsi" class="col-sm-3 control-label">Deskripsi</label>
              <div class="col-sm-9">
                  <label for="" style='padding-top:8px'><?php echo $juritku['deskripsi'] ; ?></label>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-10">
                <button type="submit" class="btn btn-primary" name='simpan'><i class="fa fa-check"></i>  Ubah Status</button>
              </div>
            </div>
        </div>
      <?php echo form_close(); ?>
    </div>
	</div>
</div>
