<!-- Main Content -->
<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<div class="row clearfix">
				<div class="col-lg-5 col-md-5 col-sm-12">
					<h2>Sistem Keamanan Membership</h2>
					<ul class="breadcrumb padding-0">
						<li class="breadcrumb-item"><a href="<?= site_url('home');?>"><i class="zmdi zmdi-home"></i></a>
						</li>
						<li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
						<li class="breadcrumb-item active">Dashboard Data diri</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="row clearfix">
			<div class="col-lg-5 col-md-6">
				<div class="card">
					<div class="body">
						<form action="<?= site_url('member/edit');?>" method="post">

							<div class="form-group">
								<label for="inputId">ID</label>
								<input type="text" class="form-control" id="inputId" name="id_member"
									value="<?= $member['id_member'];?>" readonly>
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
								<label for="inputJenisKelamin">Jenis Kelamin</label>
								<select class="form-control show-tick p-0" name="jenis_kelamin">
									<optgroup label="Current">
										<option value="<?= $member['jenis_kelamin'] ;?>">
											<?= $member['jenis_kelamin'] ;?></option>
									</optgroup>
									<optgroup label="Changes">
										<option value="Laki-laki">Laki-laki</option>
										<option value="Perempuan">Perempuan</option>
									</optgroup>
								</select>
							</div>
							<div class="form-group">
								<label for="inputNomorTelepon">Nomor Telepon</label>
								<input type="text" class="form-control" id="inputNomorTelepon" name="no_telp"
									value="<?= $member['no_telp'];?>" required>
							</div>
							<br>
							<?php if(!$this->input->get('type')):?>
							<button type="button" data-toggle="modal" data-target="#decrypt"
								class="btn btn-primary float-right ml-2">Dekripsi</button>
							<?php else:?>
							<a href="<?= site_url('member');?>" class="btn btn-primary float-right ml-2">enkripsi</a>
							<?php endif;?>
							<button type="submit" class="btn btn-primary float-right">Simpan data</button>
							<br><br>
						</form>
					</div>
				</div>
			</div>
			<div class="col justify-content-center text-center">
				<img src="<?= base_url();?>assets/images/enkripsi.svg" alt="" class="h-auto" style="width: 70%;">
			</div>
		</div>
</section>

<div class="modal fade" id="decrypt" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="title" id="largeModalLabel">Dekripsi data</h4>
			</div>
			<form action="<?= site_url('member?type=dekripsi');?>" method="post">
				<div class="modal-body">
					<p>Harap masukkan kode dekripsi anda, untuk dekripsi data</p>
					<div class="form-group">
						<input type="text" class="form-control" name="kode" placeholder="Masukkan Kode (16 karakter)"
							minlength="16" maxlength="16" id="kodeDekripsi" required>
						<small class="text-danger">Harap masukkan kode sepanjang 16 karakter sesuai dengan requirement
							proses enkripsi menggunakan libray AES 128</small>
						<input type="hidden" class="form-control" id="id_member" name="id_member" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default btn-round waves-effect">Dekripsi</button>
					<button type="button" class="btn btn-danger btn-simple btn-round waves-effect"
						data-dismiss="modal">Batal</button>
				</div>
			</form>
		</div>
	</div>
</div>
