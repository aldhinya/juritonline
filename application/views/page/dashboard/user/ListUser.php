<?php $no = ($paging['limit']*$paging['current'])-$paging['limit'];
	$no++;
	if($list->num_rows() > 0 ) { ?>

		<?php $no = 1;

		foreach($list->result() as $row){ ?>
			<?php if($no == 1 || $no % 3 == 1 ){?>
    	<div class='row'>
    	    <?php } ?>
    		<div class="col-sm-6 col-md-4">
            <div style='margin-bottom:30px;border:1px dotted #D2D6DE'>
            	<br/><br/>
            	<center>
            		<a href="<?php echo site_url('member/profile/'.$row->user_id.'/'.slug($row->nama)) ?>" target="_blank">
	                  	<img src="<?php echo base_url($row->gambar != '' ? $row->gambar : 'assets/img/no_poto.png' ) ?>" alt="<?php echo $row->nama; ?>" style="width:100px;height:100px">
	                 </a>
            	</center>

              	<div class="caption">
              		<center>
              			<br/>
              			<b><a href="<?php echo site_url('member/profile/'.$row->user_id.'/'.slug($row->nama)) ?>" target="_blank"><?php echo strtoupper($row->nama)?></a></b><br/>
              			<?php echo $row->email?><br/>
              			<small><?php echo $row->userstatus_id == 1 ? '<b style="color:green"><i class="glyphicon glyphicon-ok"></i> Aktif</b>' : '<b style="color:red"><i class="glyphicon glyphicon-remove"></i> Tidak Aktif</b>'?></small><br/>
              			<?php echo $row->userlevel_id == 1 ? 'Level : Admin' : 'Level : User'?><br/><br/>
              			<span onclick="getData('<?php echo $row->user_id; ?>','<?php echo $row->userlevel_id; ?>','<?php echo $row->userstatus_id; ?>','<?php echo $row->nama; ?>')" ><a href="javascript:void(0)" class='btn btn-info btn-sm' data-target='#modal-ubah-user' data-toggle='modal' ><i class='fa fa-pencil-square-o'></i>Edit</a></span>
										<a href="<?php echo site_url('dashboard/hapus_user/'.encode($row->user_id))?>" class='btn btn-danger btn-sm' onclick="return confirm('Apakah anda yakin akan menghapus USER ini ?')" ><i class="fa fa-trash"></i> Hapus</a>
										<br/><br/>
              		</center>

              	</div>
            </div>
          </div>
         <?php if($no % 3 == 0 || $no == $list->num_rows()){?>
    	 </div>
    	<?php } ?>
		<?php $no++; } ?>

		<input type='hidden' id='current' name='current' value='<?php echo $paging['current'] ?>'>
		<input type='hidden' id='last' name='last' value='<?php echo $last ?>'>

	<div class='row'>
		<div class='col-sm-4 col-xs-12' style='margin-top:5px;margin-bottom:10px'>
			Total User Di Jurit Online : <b><?php echo $paging['count_row'] ?> User</b>
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

						<h3 style='font-family:callibri;text-align:center;'><i class='fa fa-warning'></i> Tidak ada User</h3>

					<?php } else { ?>

						<h3 style='font-family:callibri;text-align:center;'><i class='fa fa-warning'></i> User tidak ditemukan</h3>

					<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<?php
	}
?>
