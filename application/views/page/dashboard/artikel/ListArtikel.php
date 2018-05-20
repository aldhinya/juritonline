<?php $no = ($paging['limit']*$paging['current'])-$paging['limit'];
	$no++;
	if($list->num_rows() > 0 ) { ?>
	<div class='row'>
		<div class='col-sm-12'>
			<table class="table table-bordered" style='font-size:12px'>
				<tr class="bg-aqua" >
					<th style='width:5%;text-align:center'>No</th>
					<th style='width:35%;text-align:center'>Judul</th>
					<th style='width:12%;text-align:center'>Tanggal</th>
					<th style='width:10%;text-align:center'>Status</th>
					<th style='text-align:center'>Status artikel</th>
					<th style='width:15%;text-align:center'>Aksi</th>
				</tr>
				<?php foreach($list->result() as $row){

					?>
					<tr>
						<td align='center'><?php echo $no; ?></td>
						<td><a href="<?php echo site_url('blog/artikel/'.$row->id_artikel.'/'.$row->url_artikel)?>" target="_blank"><?php echo $row->judul; ?></a></td>
						<td align='center'><?php echo date('d-M-Y',strtotime($row->tgl_input)); ?></td>
						<td align='center'><?php echo $row->statuspublish_id == 1 ? "<b style='color:green'><i class='glyphicon glyphicon-ok'></i> Publish<b>" : "<b style='color:red'> <i class='glyphicon glyphicon-remove'></i>Draft</b>"; ?></td>
						<td align='center'><?php echo $row->statusartikel_id == 1 ? "<b style='color:green'><i class='glyphicon glyphicon-ok'></i> Tampil</b>" : "<b style='color:red'> <i class='glyphicon glyphicon-remove'></i>Menunggu Persetujuan Admin</b>"; ?></td>
						<td>
							<center>
								<a href="<?php echo site_url('dashboard/artikel/edit/'.$row->id_artikel); ?>" class="btn btn-info btn-sm" style="width:35px"><i class='glyphicon glyphicon-edit'></i></a>
								<a href="<?php echo site_url('dashboard/hapus_artikel/'.encode($row->id_artikel))?> " class="btn btn-danger btn-sm" style="width:35px" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')" ><i class='glyphicon glyphicon-trash'></i></a>
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
			Total Artikel Yang Ditampilkan : <b><?php echo $paging['count_row'] ?> Artikel</b>
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

						<h3 style='font-family:callibri;text-align:center;'><i class='fa fa-warning'></i> Tidak ada artikel</h3>

					<?php } else { ?>

						<h3 style='font-family:callibri;text-align:center;'><i class='fa fa-warning'></i> artikel tidak ditemukan</h3>

					<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<?php
	}
?>
