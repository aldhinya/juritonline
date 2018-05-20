<?php
    $member = $this->model_users->getAll(array("user_id" => $artikel['user_id']))->row_array();
?>
<div class="col-md-9">
  <div class="row" >
    <div class="col-md-12">
        <ol class="breadcrumb" style='color:fff;'>
           <li><a href="<?php echo site_url(''); ?>"></i><i class="fa fa-home"></i> Beranda</a></li>
           <li><a href="<?php echo site_url('blog'); ?>"></i>Blog</a></li>
           <li class="active"><?php echo $artikel['judul']?></li>
        </ol>
    </div>
    <div class="col-md-12" style="margin-top:-30px;text-align:justify">
      <h2 style="text-align:left;margin-top:30px"><?php echo $artikel['judul']?></h2>
      <small>
          <a href="<?php echo site_url('member/profile/'.$member['user_id'].'/'.slug($member['nama'])) ?>"><i class="glyphicon glyphicon-user"></i> <?php echo $member['nama'] ?></a>
          &nbsp;&nbsp;&nbsp;
          <i class="glyphicon glyphicon-calendar"></i> <?php echo date("d-M-y", strtotime($artikel['tgl_input']));?>
          &nbsp;&nbsp;&nbsp;
          <i class="glyphicon glyphicon-eye-open"></i> Dilihat <?php echo $artikel['viewer'];?> Kali
      </small>
      <div style="margin-top:10px">
        <?php foreach($kategori->result() as $row){ ?>
            <a href="<?php echo site_url('blog/kategori/'.$row->url_kategoriartikel) ?>" ><span class="badge badge-danger" ># <?php echo $row->nm_kategoriartikel ?></span></a>
        <?php } ?>
      </div>
      <hr/>
      <?php echo $artikel['deskripsi']?>
    </div>
    <div class="col-md-12">
        <hr/>
           <h4><b>Penulis : </b></h4>
           <div class="row">
               <div class="col-md-1" >
                        <a href="<?php echo site_url('member/profile/'.$member['user_id'].'/'.slug($member['nama'])) ?>">
                           <img src="<?php echo base_url($member['gambar'] != '' ? $member['gambar'] : 'assets/img/no_poto.png' ) ?>" style='width:75px;height:75px;border-radius:5px' />
                        </a>
               </div>
              <div class="col-md-10" style="padding-left:30px">
                   <b><a href="<?php echo site_url('member/profile/'.$member['user_id'].'/'.slug($member['nama'])) ?>"><?php echo strtoupper($member['nama'])?></a></b><br/>
                   <i><?php echo $member['profile']?></i>
                   <br/><br/><br/>
               </div>
           </div>
        <hr/>
    </div>
    <?php if($other->num_rows() > 0){ ?>
    <div class="col-md-12">
        <h4><b>Artikel Terkait : </b></h4>
        <div class="row">
          <?php foreach($other->result() as $row){ ?>
              <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                     <div class="title">
                       <center><a href="<?php echo site_url('blog/artikel/'.$row->id_artikel.'/'.$row->url_artikel) ?>"><b><?php echo $row->judul; ?></b></a></center>
                     </div>
                     <a href="<?php echo site_url('blog/artikel/'.$row->id_artikel.'/'.$row->url_artikel) ?>">
                      <img src="<?php echo base_url($row->thumbnail != '' ? $row->thumbnail : 'assets/img/no_poto.png' ) ?>" alt="<?php echo $row->judul; ?>">
                      </a>
                  <div class="caption">
                    <center><?php $desk = strip_tags($row->deskripsi); echo substr($desk,0,150); ?> . . .</center>
                  <br/><a href="<?php echo site_url('blog/artikel/'.$row->id_artikel.'/'.$row->url_artikel) ?>" class="btn btn-primary" role="button" style="width:100%"><b>Baca</b></a>
                  </div>
                </div>
              </div>
          <?php } ?>
        </div>
        <hr/>
    </div>
    <?php } ?>
    <div class="col-md-12">
        <div id="disqus_thread"></div>
        <script>
        (function() { // DON'T EDIT BELOW THIS LINE
        	var d = document, s = d.createElement('script'); s.src = '//jurit-online.disqus.com/embed.js'; s.setAttribute('data-timestamp', +new Date()); (d.head || d.body).appendChild(s); })();
      </script>
      <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a>
      </noscript>
    </div>
  </div>
</div>
