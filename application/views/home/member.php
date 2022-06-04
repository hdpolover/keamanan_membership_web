<style>
	.modal-backdrop {
		display: none !important;
	}

</style>

<!-- Main Content -->
<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<div class="row clearfix">
				<div class="col-lg-5 col-md-5 col-sm-12">
					<h2>Data member</h2>
					<ul class="breadcrumb padding-0">
						<li class="breadcrumb-item"><a href="<?= site_url('home');?>"><i class="zmdi zmdi-home"></i></a>
						</li>
						<li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
						<li class="breadcrumb-item active">Data member</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row clearfix">
			<div class="col-lg-12">
				<div class="card">
					<!-- <div class="header mb-3">
						<h2>
							<button type="button" class="btn btn-primary btn-sm float-right mb-3" data-toggle="modal"
								data-target="#tambah">Tambah Data</button></h2>
					</div> -->
					<div class="body">
						<table class="table table-bordered table-striped table-hover js-basic-example dataTable w-100"
							style="width: 100%;">
							<thead>
								<tr>
									<th width="10">No</th>
									<th width="20"></th>
									<th>ID</th>
									<th>Nama</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<?php if (!empty($member)):?>
								<?php $no = 1; foreach ($member as $val):?>
								<tr>
									<td><?= $no++;?></td>
									<td>
										<button type="button" data-toggle="modal"
											data-target="#detail-<?= $val->id_member;?>"
											class="btn btn-primary btn-sm">detail</button>
									</td>
									<td><?= $val->id_member;?></td>
									<td><?= $val->nama;?></td>
									<td><button type="button"
											class="btn btn-success btn-sm"><?= $val->status;?></button></td>
								</tr>

								<!-- Large Size -->
								<div class="modal fade" id="detail-<?= $val->id_member;?>" tabindex="-1" role="dialog">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="title" id="largeModalLabel">Detail member</h4>
											</div>
											<div class="modal-body">
												<div class="form-group">
													<label for="inputId">ID</label>
													<input type="text" class="form-control" id="inputId"
														name="id_member" value="<?= $val->id_member;?>" readonly>
												</div>
												<div class="form-group">
													<label for="inputNama">Nama</label>
													<input type="text" class="form-control" id="inputNama" name="nama"
														value="<?= $val->nama;?>" readonly>
												</div>
												<div class="form-group">
													<label for="inputAlamat">Alamat</label>
													<textarea type="text" class="form-control" id="inputAlamat"
														name="alamat" rows="3" readonly><?= $val->alamat;?></textarea>
												</div>
												<div class="form-group">
													<label for="inputTempatLahir">Tempat Lahir</label>
													<input type="text" class="form-control" id="inputTempatLahir"
														name="tempat_lahir" value="<?= $val->tempat_lahir;?>" readonly>
												</div>
												<div class="form-group">
													<label for="inputTanggalLahir">Tanggal Lahir</label>
													<input type="date" class="form-control" id="inputTanggalLahir"
														name="tanggal_lahir" value="<?= $val->tanggal_lahir;?>"
														readonly>
												</div>
												<div class="form-group">
													<label for="inputJenisKelamin">Jenis Kelamin</label>
													<input type="text" class="form-control" id="inputNomorTelepon"
														name="no_telp" value="<?= $val->jenis_kelamin ;?>" readonly>
												</div>
												<div class="form-group">
													<label for="inputNomorTelepon">Nomor Telepon</label>
													<input type="text" class="form-control" id="inputNomorTelepon"
														name="no_telp" value="<?= $val->no_telp;?>" readonly>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button"
													class="btn btn-primary btn-simple btn-round waves-effect"
													data-dismiss="modal">Tutup</button>
											</div>
										</div>
									</div>
								</div>

								<?php endforeach;?>
								<?php endif;?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<script>
	function getIDmember(id_member) {
		console.log(id_member);
		$('#id_member').val(id_member);
	};

</script>
<!-- Large Size -->
<div class="modal fade" id="decrypt" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="title" id="largeModalLabel">Edit data</h4>
			</div>
			<form action="<?= site_url('member/edit');?>" method="post">
				<div class="modal-body">
					<p>Harap masukkan kode, untuk Edit data</p>
					<div class="form-group">
						<input type="text" class="form-control" name="kode" placeholder="Masukkan Kode (16 karakter)"
							minlength="16" maxlength="16" id="kodeDekripsi" required>
						<small class="text-danger">Harap masukkan kode sepanjang 16 karakter sesuai dengan requirement
							proses enkripsi menggunakan libray AES 128</small>
						<input type="hidden" class="form-control" id="id_member" name="id_member" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default btn-round waves-effect">Edit</button>
					<button type="button" class="btn btn-danger btn-simple btn-round waves-effect"
						data-dismiss="modal">Batal</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Large Size -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="title" id="largeModalLabel">Tambah data enkripsi</h4>
			</div>
			<form action="<?= site_url('home/add_data');?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="inputNama">Nama</label>
						<input type="text" class="form-control" id="inputNama" name="nama" placeholder="Masukkan Nama"
							required>
					</div>
					<div class="form-group">
						<label for="inputAlamat">Alamat</label>
						<textarea type="text" class="form-control" id="inputAlamat" name="alamat"
							placeholder="Masukkan Alamat" rows="3" required></textarea>
					</div>
					<div class="form-group">
						<label for="inputTempatLahir">Tempat Lahir</label>
						<input type="text" class="form-control" id="inputTempatLahir" name="tempat_lahir"
							placeholder="Masukkan Tempat Lahir" required>
					</div>
					<div class="form-group">
						<label for="inputTanggalLahir">Tanggal Lahir</label>
						<input type="date" class="form-control" id="inputTanggalLahir" name="tanggal_lahir"
							placeholder="Masukkan Tanggal Lahir" required>
					</div>
					<div class="form-group">
						<label for="inputJenisKelamin">Jenis Kelamin</label><br>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="inputLakiLaki" name="jenis_kelamin" class="custom-control-input"
								value="Laki-laki">
							<label class="custom-control-label" for="inputLakiLaki">Laki-laki</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="inputPerempuan" name="jenis_kelamin" class="custom-control-input"
								value="Perempuan">
							<label class="custom-control-label" for="inputPerempuan">Perempuan</label>
						</div>
					</div>
					<div class="form-group">
						<label for="inputNomorTelepon">Nomor Telepon</label>
						<input type="number" class="form-control" id="inputNomorTelepon" name="no_telp"
							placeholder="Masukkan Nomor Telepon" required>
					</div>
					<hr>
					<div class="form-group">
						<label for="inputKode">Kode</label>
						<input type="text" class="form-control" id="inputKode" name="kode" minlength="16" maxlength="16"
							placeholder="Masukkan Kode (16 karakter)" required>
						<small class="text-danger">Harap masukkan kode sepanjang 16 karakter sesuai dengan requirement
							proses enkripsi menggunakan libray AES 128</small>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default btn-round waves-effect">Tambah data</button>
					<button type="button" class="btn btn-danger btn-simple btn-round waves-effect"
						data-dismiss="modal">Batal</button>
				</div>
			</form>
		</div>
	</div>
</div>


<script>
	$(document).ready(function () {
		$("#kodeDekripsi,#inputKode").keydown(function (event) {
			var inputValue = event.which;
			// allow letters and whitespaces only.
			if (!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0 &&
					inputValue != 8 && inputValue != 37 && inputValue != 39)) {
				event.preventDefault();
			}
		});
	});

</script>
