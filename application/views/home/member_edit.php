<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<div class="row clearfix">
				<div class="col-lg-5 col-md-5 col-sm-12">
					<h2>Edit Dekripsi</h2>
					<ul class="breadcrumb padding-0">
						<li class="breadcrumb-item"><a href="<?= site_url('home');?>"><i class="zmdi zmdi-home"></i></a>
						</li>
						<li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
						<li class="breadcrumb-item active">Edit dekripsi</li>
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
									value="<?= $member['id'];?>" readonly>
							</div>
							<div class="form-group">
								<label for="inputNama">Nama</label>
								<input type="text" class="form-control" id="inputNama" name="nama"
									value="<?= $member['nama'];?>" required>
							</div>
							<div class="form-group">
								<label for="inputAlamat">Alamat</label>
								<textarea type="text" class="form-control" id="inputAlamat" name="alamat" rows="3"
									required><?= $member['alamat'];?></textarea>
							</div>
							<div class="form-group">
								<label for="inputTempatLahir">Tempat Lahir</label>
								<input type="text" class="form-control" id="inputTempatLahir" name="tempat_lahir"
									value="<?= $member['tempat_lahir'];?>" required>
							</div>
							<div class="form-group">
								<label for="inputTanggalLahir">Tanggal Lahir</label>
								<input type="date" class="form-control" id="inputTanggalLahir" name="tanggal_lahir"
									value="<?= $member['tanggal_lahir'];?>" required>
							</div>
							<div class="form-group">
								<label for="inputJenisKelamin">Jenis Kelamin</label><br>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" id="inputLakiLaki" name="jenis_kelamin"
										class="custom-control-input" value="Laki-laki" <?= $member['jenis_kelamin'] == 'Laki-laki' ? 'checked' : '';?>>
									<label class="custom-control-label" for="inputLakiLaki">Laki-laki</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" id="inputPerempuan" name="jenis_kelamin"
										class="custom-control-input" value="Perempuan" <?= $member['jenis_kelamin'] == 'Perempuan' ? 'checked' : '';?>>
									<label class="custom-control-label" for="inputPerempuan">Perempuan</label>
								</div>
							</div>
							<div class="form-group">
								<label for="inputNomorTelepon">Nomor Telepon</label>
								<input type="text" class="form-control" id="inputNomorTelepon" name="no_telp"
									value="<?= $member['no_telp'];?>" required>
							</div>
						</div>
						<div class="footer text-right">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
