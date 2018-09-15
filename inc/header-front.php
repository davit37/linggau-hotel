<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Reservasi Hotel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
	<!-- bootstrap -->
	<link href="assets/bootstrap/css/bootstrap.css?=0" rel="stylesheet">
	<link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

	<link href="assets/themes-front/css/bootstrappage.css" rel="stylesheet" />
	<link rel="shortcut icon" href="assets/bootstrap/img/favico.ico">
	<!-- global styles -->
	<link href="assets/themes-front/css/flexslider.css" rel="stylesheet" />
	<link href="assets/themes-front/css/main.css?=98" rel="stylesheet" />

	<!-- scripts -->
	<script src="assets/themes-front/js/jquery-1.7.2.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/themes-front/js/superfish.js"></script>
	<script src="assets/themes-front/js/jquery.scrolltotop.js?=6"></script>
	<script defer src="assets/font-awesome/js/fontawesome-all.min.js"></script>
	<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="assets/themes-front/js/respond.min.js"></script>
		<![endif]-->
	<script src="assets/bootstrap/js/jquery.validate.js"></script>
	<script src="assets/bootstrap/js/messages_id.js"></script>
	<script>
		$(document).ready(function () {
			$("#form1").validate();
			$("#form2").validate();
		});
	</script>
	<style type="text/css">
	body{
		background:#e6eaed;
	}
		label.error {

			color: red;
		}

		hr {
			-moz-border-bottom-colors: none;
			-moz-border-image: none;
			-moz-border-left-colors: none;
			-moz-border-right-colors: none;
			-moz-border-top-colors: none;
			border-color: #fff -moz-use-text-color #FFFFFF;
			border-style: solid none;
			border-width: 1px 0;
			margin:  0;
		}
		.user-menu{
			list-style: none;
			font-size: small;
			margin-right: 0em;
		}
		.tengah_woooy{
			position: relative;
   			left: 300px;
		}
		

	
	</style>
</head>

<body >
	<div id="top-bar" class="container navbar-fixed-top navi" >
		<div class="row">
			<div class="span3">
				<a href="index.php" class="logo pull-left">
					<img style="height: 50px;" src="assets/themes-front/images/logo.png" class="site_logo" alt="">
				</a>
				<!--	<form method="POST" class="search_form">
						<input type="text" class="input-block-level search-query" Placeholder="Contoh :Sepatu">
				</form>-->
			</div>
			<div class="span6">
				<div class="account ">
					<!--menu user -->

					<ul class="user-menu ">

						<?php if(empty($_SESSION['idpelanggan'])){ ?>

						<li>
							<a href="index.php">Homepage</a>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
								Hotel
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								<?php list_hotel(); ?>
							</ul>
						</li>
						<li>
							<a href="index.php?mod=user&pg=login">Login</a>
						</li>
						<li>
							<a href="index.php?mod=user&pg=register">Register</a>
						</li>
						<li>
							<a href="index.php?mod=page&pg=about">About Us</a>
						</li>
						<li>
							<a href="index.php?mod=page&pg=contact">Contac Us</a>
						</li>



						<?php }else{ ?>
						<li class="dropdown">
							<a class="dropdown-toggle" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="/page.html">
								Hotel
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								<?php list_hotel(); ?>
							</ul>
						</li>
						
						<li>
							<a href="index.php?mod=chart&pg=invoice">Check In</a>
						</li>

						
						<li>
							<a href="index.php?mod=user&pg=profil">Profil</a>
						</li>
						<li>
							<a href="user/logout.php">logout</a>
						</li>
						<?php	} ?>
					</ul>
				</div>
			</div>
			<form class="navbar-search pull-rigth" action='index.php?mod=page&pg=cari'  method='post'>
			<input type="text" name='data'class="search-query" placeholder="Cari">
			<button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
			</form>
		</div>
	</div>
	<div id="wrapper" style="margin-top: 6em;"" class="container">

		<?php
			if(empty($_GET[pg])){
			?>
		<section class="homepage-slider" id="home-slider">
			<div class="flexslider">
				<!--news flash/slider -->
				<ul class="slides">


					<li>
						<img src="upload/hotel/dd.jpg" alt="" />

					</li>
				</ul>
			</div>
		</section>
		<?php }  ?>
		<br>
		