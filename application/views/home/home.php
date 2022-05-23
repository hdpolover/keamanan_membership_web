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
						<li class="breadcrumb-item active">Home</li>
					</ul>
				</div>
			</div>
		</div>
        
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6">
                <div class="card text-center">
                    <div class="body">
                        <p class="m-b-20"><i class="zmdi zmdi-accounts-alt zmdi-hc-3x col-amber"></i></p>
                        <span>Total member</span>
                        <h3 class="m-b-10"><span class="number count-to" data-from="0" data-to="<?= $member;?>" data-speed="2000" data-fresh-interval="700"><?= $member;?></span></h3>
                    </div>
                </div>
            </div>
			<div class="col justify-content-center text-center">
				<img src="<?= base_url();?>assets/images/enkripsi.svg" alt="" class="h-auto" style="width: 60%;">
			</div>
        </div>
</section>
