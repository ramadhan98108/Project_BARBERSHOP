<?php
include "root.php";
session_start();
if (isset($_SESSION['username'])) {
	$root->redirect("home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>BARBER.GO</title>
	
		<style type="text/css">
	@font-face{
	font-family: titillium;
	src:url(assets/TitilliumWeb-SemiBold.ttf);
}
		*{margin: 0;padding: 0;font-family: titillium;}
		@keyframes muncul{
	0%{opacity: 0;}
	100%{opacity: 1;}
}
		body{overflow: hidden;animation-name: muncul;animation-duration: 2s}
		.both{clear: both;}
		.loginpage{position: fixed;background:url("assets/img/wp.jpg");height: 100%;width: 100%;background-size: 100%;}
			.padding{padding:80px 25px;}
			.login{float: right;width: 400px;background:#fff;height: 100%;}
			.login input,.login select,.login button{width: 100%;box-sizing: border-box;margin-bottom: 20px;border: 0px;padding: 10px;border-bottom: 1px solid #e4e7ea;outline: 0;color: #565656;font-size: 14px;}
			.login input:focus,.login select:focus{border-bottom: 1px solid #707cd2;transition: 0.2s}
			.login select{cursor: pointer;}
			.login button{cursor: pointer;background: #41b3f9;color: #fff;font-size: 20px;border-radius: 3px;}
			.login button:hover{background: #5bc0de}
			form{margin-top: 70px;}
			h3{text-align: center;}
			#status{width: 100%;color: #565656;font-size: 15px;display: none;box-sizing: border-box;border-radius: 3px}
			.red{color: #c7254e;background: #f9f2f4;padding: 10px;border-radius: 3px;}
			.green{color: rgb(1,186,56);background: rgb(230,255,230);padding: 10px;border-radius: 3px;}
			.link-forgot{color: #565656;padding: 0px 0px 20px 0px;display: inline-block;}
		}
	</style>
	

	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<link type="text/css" rel="stylesheet" href="landing/css/bootstrap.min.css" />

	<link type="text/css" rel="stylesheet" href="landing/css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="landing/css/owl.theme.default.css" />

	<link type="text/css" rel="stylesheet" href="landing/css/magnific-popup.css" />

	<link rel="stylesheet" href="landing/css/font-awesome.min.css">

	<link type="text/css" rel="stylesheet" href="landing/css/style.css" />
	
	<script type="text/javascript" src="landing/assets/jquery.js"></script>
	
	<script type="text/javascript">
	$(document).ready(function(){
		$("#loginapp").submit(function(){
			$.ajax({
				type:'POST',
				url:'handler.php?action=login',
				data:$(this).serialize(),
				success:function(data){
					$("#status").fadeIn(100);
					$("#status").html(data);
					window.setTimeout(function(){$('#status').fadeOut(100)},3000);

				}
			})
			return false;
		});
	});
</script>


</head>

<body>
	<header id="home">
		<div class="bg-img" style="background-image: url('./landing/img/background1.jpg');">
			<div class="overlay"></div>
		</div>
		<nav id="nav" class="navbar nav-transparent">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a href="index.php">
							<img class="logo" src="landing/img/kur.png" alt="logo">
							<img class="logo-alt" src="landing/img/kur.png" alt="logo">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Collapse nav button -->
					<div class="nav-collapse">
						<span></span>
					</div>
					<!-- /Collapse nav button -->
				</div>

				<!--  Main navigation  -->
				<ul class="main-nav nav navbar-nav navbar-right">
					<li><a href="#home">Home</a></li>
					<li><a href="login.php">Log-in</a></li>
					<li><a href="#team">Team</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>

			</div>
		</nav>

		<div class="home-wrapper">
			<div class="container">
				<div class="row">

					<!-- home content -->
					<div class="col-md-10 col-md-offset-1">
						<div class="home-content">
							<h1 class="white-text">BARBER.GO</h1>
						</div>
					</div>
					<!-- /home content -->

				</div>
			</div>
		</div>
		<!-- /home wrapper -->

	</header>
	<!-- /Header -->
	<!-- Team -->
	<div id="team" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="title">WEB DESIGNER</h2>
				</div>
				<!-- /Section header -->

				<!-- team -->
				<div class="col-sm-4">
					<div class="team">
						<div class="team-img">
							<img class="img-responsive" src="./landing/img/team1.jpg" alt="">
							<div class="overlay">
								<div class="team-social">
									<a href="https://www.instagram.com/bima_sevenfoldism/?hl=id"><i class="fa fa-instagram"></i></a>
								</div>
							</div>
						</div>
						<div class="team-content">
							<h3>Bima Feby Ramadhan</h3>
							<span>Web Designer</span>
						</div>
					</div>
				</div>
				<!-- /team -->

				<!-- team -->
				<div class="col-sm-4">
					<div class="team">
						<div class="team-img">
							<img class="img-responsive" src="./landing/img/team2.jpg" alt="">
							<div class="overlay">
								<div class="team-social">
									<a href="https://www.instagram.com/herdarawk_/?hl=id"><i class="fa fa-instagram"></i></a>
								</div>
							</div>
						</div>
						<div class="team-content">
							<h3>Herda Mardika</h3>
							<span>Web Designer</span>
						</div>
					</div>
				</div>
				<!-- /team -->

				<!-- team -->
				<div class="col-sm-4">
					<div class="team">
						<div class="team-img">
							<img class="img-responsive" src="./landing/img/team3.jpg" alt="">
							<div class="overlay">
								<div class="team-social">
									<a href="https://www.instagram.com/halawa_david/?hl=id"><i class="fa fa-instagram"></i></a> 
								</div>
							</div>
						</div>
						<div class="team-content">
							<h3>David</h3>
							<span>Web Designer</span>
						</div>
					</div>
				</div>
				<!-- /team -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Team -->

	<!-- Contact -->
	<div id="contact" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section-header -->
				<div class="section-header text-center">
					<h2 class="title">GET IN WEB</h2>
				</div>
				<!-- /Section-header -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-phone"></i>
						<h3>Phone</h3>
						<p>-</p>
					</div>
				</div>
				<!-- /contact -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-envelope"></i>
						<h3>Email</h3>
						<p>-</p>
					</div>
				</div>
				<!-- /contact -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-map-marker"></i>
						<h3>Address</h3>
						<p>-</p>
					</div>
				</div>
				<!-- /contact -->

					<div class="footer-copyright">
						<p>Copyright © 2017. All Rights Reserved. Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
					</div>

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Contact -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</footer>
	<!-- /Footer -->

	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->

	<!-- Preloader -->
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<!-- /Preloader -->

	<!-- jQuery Plugins -->
	<script type="text/javascript" src="landing/js/jquery.min.js"></script>
	<script type="text/javascript" src="landing/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="landing/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="landing/js/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="landing/js/main.js"></script>

</body>

</html>
