<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
1. takmir. operasi CRUD
vars:
tkid
tknama
tknotelp
tkjabatan
tkmasajabatan
mediaid

*/
// view admin
?>
	<div id="main-content">
		<!-- <div class="container" style="margin-left: 400px; margin-top: 50px;"> -->
		<h2><?php echo $page; if ($page=="Takmir") {?> <a class="btn btn-default" href="<?php echo base_url('takmir/tambahtk');?>"><i class="fa fa-pencil-square-o"> </i><span>Tambah Takmir</span></a><?php } ?></h2>

		<?php echo $error; ?>
		<?php
if ($page=="Takmir") {
	if (isset($tanya)) {
		echo $tanya;
	}
?>
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<th>No.</th>
					<th>Foto</th>
					<th>Nama takmir</th>
					<th>Jabatan</th>
					<th>Masa Jabatan</th>
					<th>No. Telp</th>
					<th colspan="2">Operasi</th>
				</thead>
				<?php
		$n = 1;
		foreach ($cmtakmir as $v) {
			echo "<tr align='center'>
			<td>".$n."</td>";
			// <td>"$v->mediaid."</td>"
			?>
					<td>
						<img class="thumbnail" src="<?php echo base_url('uploads/takmir/'.$v->mediadir);?>" alt="<?php echo $v->tknama;?>" width=80 height=80 />
					</td>
					<?php
			echo '<td>'.$v->tknama.'</td>
			<td>'.$v->tkjabatan.'</td>
			<td>'.$v->tkmasajabatan.'</td>
			<td>'.$v->tknotelp.'</td>
			<td><a href='.base_url('takmir/ubahtk/'.$v->tkid).'><i class="fa fa-pencil"></i></a></td>
			<td><a href='.base_url('takmir/dbhapus/'.$v->tkid).'/'.$v->mediadir.' onclick=return confirm(\'Apakah anda yakin ingin menghapus takmir '.$v->tknama.'?\')><i class="fa fa-trash-o"></i></a></td>

			</tr>';
			$n++;
		}
		  ?>
			</table>

			<?php }else if ($page=="Tambah Takmir") {?>
			<?php echo form_open_multipart('takmir/dbtambahtk','class=form');	?>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="panel-content">
							<h2 class="heading"><i class="fa fa-square"></i>Media</h2>
							<input type="file" id="dropify-event" name="filename" data-default-file="<?php echo base_url('uploads/default.png');?>" data-allowed-file-extensions="jpg gif png">
						</div>
					</div>
					<div class="panel col-md-4">
						<div class="form-group">
							<label for="tknama">Nama takmir</label>
							<input type="text" class="form-control" name="tknama" value="<?php echo $input['tknama']; ?>">
						</div>
						<div class="form-group">
							<label for="tkjabatan">Jabatan</label>
							<input type="text" class="form-control" name="tkjabatan" value="<?php echo $input['tkjabatan']; ?>">
						</div>
						<div class="form-group">
							<label for="tkmasajabatan">Masa jabatan</label>
							<input type="text" class="form-control" name="tkmasajabatan" value="<?php echo $input['tkmasajabatan']; ?>">
						</div>
						<div class="form-group">
							<label for="tknotelp">No. telp</label>
							<input type="text" class="form-control" name="tknotelp" value="<?php echo $input['tknotelp']; ?>">
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-success" name="submit" value="tambah">
							<a class="btn btn-success" style="text-decoration: none; color: #fff" href="<?php echo base_url('takmir');?>">Kembali</a>
						</div>
					</div>
				</div>
			</div>
			<?php }else if ($page=="Ubah Takmir") {?>
			<div class="container">
				<div class="row">
					<?php echo form_open_multipart('takmir/dbubah','class=form');	?>
					<input type="hidden" class="form-control" name="tkid" value="<?php echo $takmir->tkid;?>">
					<div class="panel col-md-4">
						<div class="form-group">
							<label for="mediaid">Media</label>
							<input type="file" id="dropify-event" name="filename" data-default-file="<?php echo base_url('uploads/takmir/'.$takmir->mediadir);?>" data-allowed-file-extensions="jpg gif png">
							<input type="hidden" name="oldmedia" value="<?php echo $takmir->mediadir;?>">
						</div>
					</div>
					<div class="panel col-md-4">
						<div class="form-group">
							<label for="tknama">Nama takmir</label>
							<input type="text" required="required" class="form-control" name="tknama" value="<?php echo $takmir->tknama;?>">
						</div>
						<div class="form-group">
							<label for="tkjabatan">Jabatan</label>
							<input type="text" class="form-control" name="tkjabatan" value="<?php echo $takmir->tkjabatan;?>">
						</div>
						<div class="form-group">
							<label for="tkmasajabatan">Masa jabatan</label><input type="text" class="form-control" name="tkmasajabatan" value="<?php echo $takmir->tkmasajabatan;?>">
						</div>
						<div class="form-group">
							<label for="tknotelp">No. telp</label>
							<input type="text" required="required" class="form-control" name="tknotelp" value="<?php echo $takmir->tknotelp;?>">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success" name="submit" value="update">Ubah</button>
							<a class="btn btn-success" href="<?php echo base_url('takmir');?>" style="color: #fff">Kembali</a>
							<a class="btn btn-success" href="<?php echo base_url('takmir/dbhapus/'.$takmir->tkid);?>" style="color: #fff">Hapus Takmir</a>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
	</div>
