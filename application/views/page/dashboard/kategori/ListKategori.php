<?php $no = ($paging['limit']*$paging['current'])-$paging['limit'];
	$no++;
	if($list->num_rows() > 0 ) { ?>
	<div class='row'>
		<div class='col-sm-12'>
			<table class="table table-bordered" style='font-size:12px'>
				<tr class="bg-aqua" >
					<th style='width:5%;text-align:center'>No</th>
					<th style='width:35%;text-align:center'>Nama Kategori</th>
					<th style='width:15%;text-align:center'>Link</th>
					<th style='width:25%;text-align:center'>Hapus</th>
				</tr>
				<?php foreach($list->result() as $row){

					?>
					<tr>
						<td align='center'><?php echo $no; ?></td>
						<td align='center'><?php echo $row->nm_kategoriartikel; ?></td>
						<td align='center'><a href="<?php echo site_url('blog/kategori/'.$row->url_kategoriartikel)?>" target="_blank"><?php echo $row->url_kategoriartikel; ?></a></td>
						<td>
							<center>
								<a href="<?php echo site_url('dashboard/hapus_kategori/'.encode($row->id_kategoriartikel))?>" class="btn btn-warning btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')" ><i class='glyphicon glyphicon-trash'></i> Hapus</a>
							</center>
						</td>
					</tr>
				<?php $no++; } ?>
			</table>
			<input type='hidden' id='current' name='current' value='<?php echo $paging['current'] ?>'>
			<input type='hidden' id='last' name='last' value='<?php echo $last ?>'>
		</div>
	</div>
	<div class='row'>
		<div class='col-sm-5 col-xs-12' style='margin-top:5px;margin-bottom:10px'>
			Total Kategori Yang Ditampilkan : <b><?php echo $paging['count_row'] ?> Kategori </b>
		</div>
		<div class='col-sm-8 col-xs-12 pull-right' style='margin-top:5px;margin-bottom:10px'>
			<?php echo $paging['list']; ?>
		</div>
	</div>

<?php } else { ?>

	<div class='row'>
		<div class='col-sm-12'>
			<div class="box">
				<div class="box-body">
					<br/>
					<?php if( $key == '' ){ ?>

						<h3 style='font-family:callibri;text-align:center;'><i class='fa fa-warning'></i> Tidak ada kategori</h3>

					<?php } else { ?>

						<h3 style='font-family:callibri;text-align:center;'><i class='fa fa-warning'></i> Kategori tidak ditemukan</h3>

					<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<?php
	}
?>
