<!DOCTYPE html>
<html class="no-js " lang="en">

<head>

	<!-- Required Meta Tags Always Come First -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Meta Website -->
	<meta name="description" content="Simple encryption and decryption with Aes library">
	<meta property="og:title"
		content="<?= ($this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1)) . ' ' . ($this->uri->segment(2) ? str_replace('-', ' ', $this->uri->segment(2)) : "") . "Sistem Keamanan Membership") : "Sistem Keamanan Membership"); ?>">
	<meta property="og:description" content="Simple encryption and decryption with Aes library">
	<meta property="og:image" content="<?= base_url(); ?>assets/images/favicon.ico">
	<meta property="og:url" content="<?= base_url(uri_string()) ?>">

	<title>
		<?= ($this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1)) . ' ' . ($this->uri->segment(2) ? str_replace('-', ' ', $this->uri->segment(2)) : "") . " - "."Sistem Keamanan Membership") : "Sistem Keamanan Membership"); ?>
	</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.ico">

	<!-- stylesheet -->
	<link rel="stylesheet" href="<?= base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css">
	<!-- Bootstrap Material Datetime Picker Css -->
	<link href="<?= base_url();?>assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
	<!-- Bootstrap Select Css -->
	<link href="<?= base_url();?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

	<!-- JQuery DataTable Css -->
	<link rel="stylesheet" href="<?= base_url();?>assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">

	<link rel="stylesheet" href="<?= base_url();?>assets/css/main.css">
	<link rel="stylesheet" href="<?= base_url();?>assets/css/color_skins.css">
	<link rel="stylesheet" href="<?= base_url();?>assets/css/custom.css">

	<!-- javascript -->
	<script type="text/javascript" src="<?= base_url();?>assets/js/jquery-3.6.0.min.js"></script>
	<!-- sweetalert2 -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="theme-black">
