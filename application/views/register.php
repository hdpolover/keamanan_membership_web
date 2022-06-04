<style>
	.btn-round.btn-simple,
	.wizard>.actions a.btn-simple,
	.wizard>.actions .disabled a {
		padding: 7px 22px;
	}

</style>

<div class="authentication">
	<div class="container">
		<div class="col-md-12" style="padding-top: 100px">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="company_detail">
						<h4 class="logo"><img src="<?= base_url();?>assets/images/logo.svg" alt=""> Sistem Keamanan
							Membership</h4>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="card-plain" style="max-width: 100%;">
						<div class="header">
							<h5>Daftarkan akun anda</h5>
						</div>
						<form class="form" action="<?= site_url('authentication/register_process');?>" method="post">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label for="">Nama lengkap</label>
										<input type="text" class="form-control" name="nama" placeholder="Nama Lengkap"
											required>
									</div>
									<div class="form-group">
										<label for="">Tempat lahir</label>
										<input type="text" class="form-control" name="tempat_lahir"
											placeholder="Tempat Lahir" required>
									</div>
									<div class="form-group">
										<label for="">Nomor Telepon</label>
										<input type="text" class="form-control" name="no_telp"
											placeholder="Nomor telepon" required>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="">Jenis kelamin</label>
										<select class="form-control show-tick p-0" name="jenis_kelamin">
											<option value="Laki-laki">Laki-laki</option>
											<option value="Perempuan">Perempuan</option>
										</select>
									</div>
									<div class="form-group">
										<label for="">Tanggal lahir</label>
										<input type="date" class="form-control" name="tanggal_lahir"
											placeholder="Tanggal Lahir" required>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="inputKode">Kode enkripsi</label>
										<input type="text" class="form-control" id="inputKode" name="kode"
											minlength="16" maxlength="16" placeholder="Masukkan Kode (16 karakter)"
											required>
										<small class="text-danger">Harap masukkan kode sepanjang 16 karakter sesuai
											dengan requirement
											proses enkripsi menggunakan libray AES 128</small>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<label for="">Alamat</label>
										<textarea type="text" class="form-control" name="alamat" placeholder="Alamat"
											required></textarea>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="">Username</label>
										<input type="text" class="form-control" name="username" placeholder="Username"
											required>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="">Password</label>
										<input type="password" class="form-control" name="password"
											placeholder="Password" required>
									</div>
								</div>
							</div>
							<div class="footer">
								<button type="submit" class="btn btn-primary btn-round btn-block">Daftar</button>
							</div>
                            <div class="text-center">
                                <a href="<?= site_url('login');?>" class="link">Sudah punya akun?</a>
                            </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br><br><br>
</div>
