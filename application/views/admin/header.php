<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- For Window Tab Color -->
		<!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#e95513">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#e95513">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#e95513">
		
		<meta name="robots" content="index, follow">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="Edgemotion">

<title>The Lerato - Electronic currency for financial inclusion</title>

<!-- Icons -->
<link rel="stylesheet" href="<?= base_url('resources/');?>assets/fonts/font-awesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">



<!-- Custom style - Remove if not necessary -->
<link type="text/css" href="<?= base_url('resources/');?>assets/css/style.css" rel="stylesheet">

<!-- Favicon -->
<link href="<?= base_url('resources/');?>assets/images/fav-icon/favicon.png" rel="icon" type="image/png">


</head>
<body>
		<div class="main-page-wrapper">

			<!-- ===================================================
				Loading Transition
			==================================================== -->
			<div id="loader-wrapper">
				<div id="loader"></div>
			</div>


			<!-- 
			=============================================
				Theme Header
			============================================== 
			-->
			<header class="charity-header">
				<!-- ============================ Theme Menu ========================= -->
				<div class="theme-main-menu">
				   <div class="container">
				   		<div class="main-container clearfix">
				   			<div class="logo float-left"><a href="<?= site_url() ?>"><img src="<?= base_url('resources/assets/') ?>images/logo/logo.png" alt="LERATO"></a></div>

				   			<div class="right-content float-right">
				   				<div class="language-select">
				   					<select class="selectpicker">
										<option>En</option>
										<option>Es</option>
										<option>Fr</option>
									</select>
				   				</div> <!-- /.language-select -->
								<span class="text-danger bg-primary" title="Your lerato Balance">LRT <?= $this->session->userdata('lerato')?></span>
				   				
				   			</div> <!-- /.right-content -->
				   			<!-- ============== Menu Warpper ================ -->
				   			<div class="menu-wrapper float-right">
				   				<nav id="mega-menu-holder" class="clearfix">
								   <ul class="clearfix">
								      <li class="active"><a href="<?= site_url('admin') ?>">Dashboard</a>
								      </li>
								      <li><a href="#exchange" class="scroll-down tran3s hvr-shutter-out-horizontal">Exchange</a></li>
									  <li><a href="<?= site_url('send') ?>">Send Lerato</a></li>
								      <li><a href="<?= site_url('receive') ?>">Buy Lerato</a></li>
								      <?php if($this->session->userdata('loggedin')): ?>
										<li><a href="#!">My Account</a>
											<ul class="dropdown">
								            <li><a href="<?= site_url('profile') ?>">Profile</a></li>
								            <li><a href="<?= site_url('logout') ?>">Logout</a></li>
								         </ul>
										</li>
									  <?php else: ?>
									  <li><a href="#!">Connect</a>
										<ul class="dropdown">
								            <li><a href="<?= site_url('auth/login') ?>">Login</a></li>
								            <li><a href="<?= site_url('auth/signup') ?>">Signup</a></li>
								         </ul>
								      </li>
									  <?php endif; ?>
									  
								   </ul>
								</nav> <!-- /#mega-menu-holder -->
				   			</div> <!-- /.menu-wrapper -->
				   		</div> <!-- /.main-container -->
				   </div> <!-- /.container -->
				</div> <!-- /.theme-main-menu -->
			</header> <!-- /.charity-header -->
