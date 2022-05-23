<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<div class="row clearfix">
				<div class="col-lg-5 col-md-5 col-sm-12">
					<h2><?= $type == 'detail' ? 'Detail' : 'edit';?>Dekripsi</h2>
					<ul class="breadcrumb padding-0">
						<li class="breadcrumb-item"><a href="<?= site_url('home');?>"><i class="zmdi zmdi-home"></i></a>
						</li>
						<li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
						<li class="breadcrumb-item active"><?= $type == 'detail' ? 'Detail' : 'edit';?> dekripsi</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row clearfix">
			<div class="col-lg-8">
				<div class="card">
					<div class="header mb-3">
						<h2>
							<a href="<?= site_url('member');?>" class="btn btn-primary btn-sm float-right mb-3">Kembali</a>
						</h2>
					</div>
					<form action="<?= site_url('home/edit_data');?>" method="post">
						<div class="body">
							<div class="form-group">
								<label for="inputId">ID</label>
								<input type="text" class="form-control" id="inputId" name="id"
									value="<?= $member['id'];?>" <?= $action == 'readonly' ? 'readonly' : 'required';?>>
							</div>
							<div class="form-group">
								<label for="inputNama">Nama</label>
								<input type="text" class="form-control" id="inputNama" name="nama"
									value="<?= $member['nama'];?>"
									<?= $action == 'readonly' ? 'readonly' : 'required';?>>
							</div>
							<div class="form-group">
								<label for="inputAlamat">Alamat</label>
								<textarea type="text" class="form-control" id="inputAlamat" name="alamat" rows="3"
									<?= $action == 'readonly' ? 'readonly' : 'required';?>><?= $member['alamat'];?></textarea>
							</div>
							<div class="form-group">
								<label for="inputTempatLahir">Tempat Lahir</label>
								<input type="text" class="form-control" id="inputTempatLahir" name="tempat_lahir"
									value="<?= $member['tempat_lahir'];?>"
									<?= $action == 'readonly' ? 'readonly' : 'required';?>>
							</div>
							<div class="form-group">
								<label for="inputTanggalLahir">Tanggal Lahir</label>
								<input type="text" class="form-control" id="inputTanggalLahir" name="tanggal_lahir"
									value="<?= $member['tanggal_lahir'];?>"
									<?= $action == 'readonly' ? 'readonly' : 'required';?>>
							</div>
							<div class="form-group">
								<label for="inputJenisKelamin">Jenis Kelamin</label>
								<input type="text" class="form-control" id="inputJenisKelamin" name="jenis_kelamin"
									value="<?= $member['jenis_kelamin'];?>"
									<?= $action == 'readonly' ? 'readonly' : 'required';?>>
							</div>
							<div class="form-group">
								<label for="inputNomorTelepon">Nomor Telepon</label>
								<input type="text" class="form-control" id="inputNomorTelepon" name="no_telp"
									value="<?= $member['no_telp'];?>"
									<?= $action == 'readonly' ? 'readonly' : 'required';?>>
							</div>
							<?php if ($this->uri->segment(2) == 'edit' && $action != 'readonly'):?>
							<div class="form-group">
								<label for="inputNomorTelepon">Kode</label>
								<input type="text" class="form-control" name="kode"
									placeholder="Masukkan Kode (16 karakter)" minlength="16" maxlength="16"
									id="kodeDekripsi" required>
								<small class="text-danger">Harap masukkan kode sepanjang 16 karakter sesuai dengan
									requirement
									proses enkripsi menggunakan libray AES 128</small>
							</div>
							<?php endif;?>
						</div>
						<div class="footer text-right">
							<?php if ($this->uri->segment(2) == 'detail'):?>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#decrypt"
								onclick="actionKode('readonly')">decrypt</button>
							<?php else:?>
							<a href="<?= site_url('member/detail/'.$member['id']);?>" class="btn btn-primary">encrypt</a>
							<?php endif;?>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	function actionKode(action) {
		console.log(action);
		$('#action').val(action);
		if (action == 'readonly') {
			$('.wantTo').html('Dekripsi');
			$('.tombolTo').html('Dekripsi');
		} else {
			$('.wantTo').html('Mengubah');
			$('.tombolTo').html('Edit');
		}
	};

</script>
<!-- Large Size -->
<div class="modal fade" id="decrypt" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="title" id="largeModalLabel"><span class="wantTo"></span> data</h4>
			</div>
			<form action="<?= site_url('member/edit/'.$member['id']);?>" method="post">
				<div class="modal-body">
					<p>Harap masukkan kode, untuk <span class="wantTo"></span> data</p>
					<div class="form-group">
						<input type="text" class="form-control" name="kode" placeholder="Masukkan Kode (16 karakter)"
							minlength="16" maxlength="16" id="kodeDekripsi" required>
						<small class="text-danger">Harap masukkan kode sepanjang 16 karakter sesuai dengan requirement
							proses enkripsi menggunakan libray AES 128</small>
						<input type="hidden" class="form-control" id="action" name="action" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default btn-round waves-effect"><span class="tombolTo"></span></button>
					<button type="button" class="btn btn-danger btn-simple btn-round waves-effect"
						data-dismiss="modal">Batal</button>
				</div>
			</form>
		</div>
	</div>
</div>
