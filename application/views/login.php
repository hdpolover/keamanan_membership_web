<div class="authentication">
	<div class="container">
		<div class="col-md-12 content-center">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="company_detail">
						<h4 class="logo"><img src="<?= base_url();?>assets/images/logo.svg" alt=""> Sistem Keamanan Membership</h4>
					</div>
				</div>
				<div class="col-lg-5 col-md-12 offset-lg-1">
					<div class="card-plain">
						<div class="header">
							<h5>Masuk ke akun anda</h5>
						</div>
						<form class="form" action="<?= site_url('authentication/login_process');?>" method="post">
							<div class="input-group">
								<input type="text" class="form-control" name="username" placeholder="Username" required>
								<span class="input-group-addon"><i class="zmdi zmdi-account-circle"></i></span>
							</div>
							<div class="input-group">
								<input type="password" class="form-control" name="password" placeholder="Password" required>
								<span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
							</div>
							<div class="footer">
								<button type="submit" class="btn btn-primary btn-round btn-block">Masuk</button>
							</div>
							<a href="<?= site_url('register');?>" class="link">Belum punya akun?</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
