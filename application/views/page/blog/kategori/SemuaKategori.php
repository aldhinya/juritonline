<div class="col-md-9">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb" style='color:fff'>
               <li><a href="<?php echo site_url(''); ?>"></i><i class="fa fa-home"></i> Beranda</a></li>
               <li><a href="<?php echo site_url('blog'); ?>"></i>Artikel</a></li>
               <li class="active">Kategori</li>
            </ol>
        </div>
    </div>
    <div class='row'>
       <div class="col-md-12">
       		<h4><b>All Kategori</b></h4>
       		<hr/>
       		<?php

	          $juritkategori = $this->model_artikel->getIdKategori();

	          $kategori = array();

	          foreach($juritkategori->result() as $row_){
	            array_push($kategori,$row_->id_kategoriartikel);
	          }

	          $kategori = implode(",",$kategori);
	          //var_dump($kategori);

	          $kategori = $this->model_kategori->getAll("id_kategoriartikel IN ($kategori)");

	          foreach($kategori->result() as $row){
	        ?>
	          <a href="<?php echo site_url('blog/kategori/'.$row->url_kategoriartikel) ?>" ><span class="badge badge-danger" style="padding:10px 15px" ># <?php echo $row->nm_kategoriartikel ?></span></a>
	        <?php } ?>

       </div>
	</div>
</div>
