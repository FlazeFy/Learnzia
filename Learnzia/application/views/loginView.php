<!--Leonardho R. Sitanggang
    1302194041  SE-43-03
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Learnzia</title>
        <!--Meta tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" type="image/png" href="http://localhost/Learnzia/assets/images/icon/Logo.png"/>

        <!--CDN Bootstrap CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!--Source file-->
		<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>		
		<link rel="stylesheet" type="text/css" href="http://localhost/Learnzia/assets/css/mainStyle2.css"/>
    </head>

	<style>
		.social-media {
		position: relative;
		width: 100%; }
		.social-media .social-icon {
			display: block;
			width: 40px;
			height: 40px;
			background: transparent;
			border: 1px solid rgba(0, 0, 0, 0.05);
			font-size: 16px;
			margin-right: 5px;
			border-radius: 50%; }
			.social-media .social-icon span {
			color: #999999; }
			.social-media .social-icon:hover, .social-media .social-icon:focus {
			background: #e3b04b; }
			.social-media .social-icon:hover span, .social-media .social-icon:focus span {
				color: #fff; }

				body {background-color: #313436;}
			footer  {background-color: #212121; color:whitesmoke; position: relative; bottom: 0; padding: 2rem;}
			.navbar {position: fixed; width:100%; z-index:1;}
			a {color:#F1C40F;}
			.active {border-radius: 4px; border-bottom: 4.5px solid rgb(40, 207, 54); position: relative;bottom: 5%;}
			 .form-control{color:whitesmoke; background:#212121; border-width: 0 0 3px; 
				border-bottom: 3.5px solid #F1C40F;}
			hr {background-color: #F1C40F;}
			h4 {color:#F1C40F;} h5 {color:#F1C40F;}
			#menu {background-color: #212121; border-radius:5px; margin-bottom:1%;}
			.dropdown-menu{background-color: #212121; border-color:#F1C40F;} .dropdown-item{color:#F1C40F;}
			a.nav-link:hover{color:#7289da;}
			.dropdown-item:hover{color:whitesmoke; background-color:#7289da;}

		.checkbox-wrap {
		display: block;
		position: relative;
		padding-left: 30px;
		margin-bottom: 12px;
		cursor: pointer;
		font-size: 16px;
		font-weight: 500;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none; }

		/* Hide the browser's default checkbox */
		.checkbox-wrap input {
		position: absolute;
		opacity: 0;
		cursor: pointer;
		height: 0;
		width: 0; }

		/* Create a custom checkbox */
		.checkmark {
		position: absolute;
		top: 0;
		left: 0; }

		/* Create the checkmark/indicator (hidden when not checked) */
		.checkmark:after {
		content: "\f0c8";
		font-family: "FontAwesome";
		position: absolute;
		color: rgba(0, 0, 0, 0.1);
		font-size: 20px;
		margin-top: -4px;
		-webkit-transition: 0.3s;
		-o-transition: 0.3s;
		transition: 0.3s; }
		@media (prefers-reduced-motion: reduce) {
			.checkmark:after {
			-webkit-transition: none;
			-o-transition: none;
			transition: none; } }

		/* Show the checkmark when checked */
		.checkbox-wrap input:checked ~ .checkmark:after {
		display: block;
		content: "\f14a";
		font-family: "FontAwesome";
		color: rgba(0, 0, 0, 0.2); }

		/* Style the checkmark/indicator */
		.checkbox-primary {
		color: #e3b04b; }
		.checkbox-primary input:checked ~ .checkmark:after {
			color: #e3b04b; }

		.btn.btn-primary {
			background: #E0B315 !important;
			border: 1px solid #e3b04b !important;
			color: #fff !important; }
			.btn.btn-primary:hover {
			border: 1px solid #e3b04b;
			background: transparent;
			color: #e3b04b; }
			.btn.btn-primary.btn-outline-primary {
			border: 1px solid #e3b04b;
			background: transparent;
			color: #e3b04b; }
			.btn.btn-primary.btn-outline-primary:hover {
				border: 1px solid transparent;
				background: #e3b04b;
				color: #fff; }
		
	</style>

    <body style='background:#000000;'>
		<!--Main Navbar-->
		<nav class="navbar navbar-expand-lg" style="background-color:#212121;">	
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
			aria-expanded="false" aria-label="Toggle navigation" style="color:#F1C40F;">
			<a>Show</a>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="">Home<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="">Global</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="">Profile</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Setting
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="#">Help Center</a>
				<a class="dropdown-item" href="#">Privacy & Condition</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#">About us</a>
				</div>
			</li>
			</ul>
			<button class="btn btn-success" style="color:whitesmoke; margin-left:1%; border:none;" 
				data-toggle="modal" data-target="#signOutModal">Sign In</button>
		</div>
		</nav>
		<br><br><br>

		<section>
			<div class="container bg-transparent">
				<div class="row mt-5">			
					<div class="col-md">
						<img src="http://localhost/Learnzia/assets/images/Logo1.png" width="450" class="img-fluid">
					</div>
					<div class="col-md">
						<div id="accordion">
							<div class="collapse show" id="login" data-parent="#accordion">
								<form method="post" class="signin-form" action="loginCtrl/checkUser">
								<div class="form-group mb-3">
									<label class="label" for="name" style="color:#F1C40F;">Username</label>
									<input type="text" class="form-control" placeholder="Username" style="background:#212121; border-width: 0 0 3px; 
										border-bottom: 3.5px solid #F1C40F; color:whitesmoke;" name="username" required>
								</div>
								<div class="form-group mb-3">
									<label class="label" for="password" style="color:#F1C40F;">Password</label>
									<input type="password" class="form-control" placeholder="Password" style="background:#212121; border-width: 0 0 3px; 
											border-bottom: 3.5px solid #F1C40F; color:whitesmoke;" name="password" required>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary" style="color:white;">Sign In</button>
									
								</div>
								</form>
								<div class="form-group d-md-flex">
								<div class="w-50 text-left">
									<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
										<input type="checkbox" checked>
										<span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#" style="color:#F1C40F; text-decoration: underline;">Forgot Password</a>
									</div>
								</div>
								</form>
								<p class="text-center text-white">Not a member? <a data-toggle="tab" href="createAccCtrl" style="color:#F1C40F; text-decoration: underline;">Sign Up</a></p>
							</div>

							<div class="collapse" id="createAcc" data-parent="#accordion">
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section>
			<div class="container" style="margin-top:12%;">
				<header class="section-header"><h1 class="text-white text-center mt-5">Our Feature</h1></header>
				<div class="row">
					<div class="col-lg-4">
						<div class="card bg-transparent">
							<img src="http://localhost/Learnzia/assets/images/storyset/Message.png" width="250" class="img-fluid">
							<h3 class="text-white">Message</h3>
							<p class="text-secondary">Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit. Et veritatis id.</p>
						</div>
					</div>

					<div class="col-lg-4 mt-4 mt-lg-0">
						<div class="card bg-transparent">
							<img src="http://localhost/Learnzia/assets/images/storyset/Group.png" width="250" class="img-fluid">
							<h3 class="text-white">Group</h3>
							<p class="text-secondary">Repudiandae amet nihil natus in distinctio suscipit id. Doloremque ducimus ea sit non.</p>
						</div>
					</div>

					<div class="col-lg-4 mt-4 mt-lg-0" >
						<div class="card bg-transparent">
							<img src="http://localhost/Learnzia/assets/images/storyset/Post.png" width="250" class="img-fluid">
							<h3 class="text-white">Post</h3>
							<p class="text-secondary">Quam rem vitae est autem molestias explicabo debitis sint. Vero aliquid quidem commodi.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<br>

		<!-- Footer -->
		<footer class="page-footer font-small teal pt-4 relative-bottom">
			<div class="container-fluid text-center text-md-left">
			<div class="row">
				<!-- Grid column -->
				<div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
				<h5 class="text-uppercase font-weight-bold">About us</h5>
					<p>Learnzia is a platform like social media to discuss and learn together with various groups 
						of users all around the globe.</p>
				</div>
				<!-- Grid column -->

				<hr class="w-100 clearfix d-md-none">
				<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
				<h5 class="text-uppercase font-weight-bold">Follow us</h5>
					<p>
					<img src='http://localhost/Learnzia/assets/Images/icon/Instagram.png' style='width:25px; height:22px;'><a href="#!"> Intagram</a>
					</p>
					<p>
					<img src='http://localhost/Learnzia/assets/Images/icon/Facebook.png' style='width:25px; height:22px;'><a href="#!"> Facebook</a>
					</p>
					<p>
					<img src='http://localhost/Learnzia/assets/Images/icon/Twitter.png' style='width:25px; height:22px;'><a href="#!"> Twitter</a>
					</p>
				</div>

				<hr class="w-100 clearfix d-md-none">
				<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
				<h5 class="text-uppercase font-weight-bold">Contact us</h5>
					<p>
					<img src='http://localhost/Learnzia/assets/Images/icon/Profile.png' style='width:25px; height:22px;'> Leonardho R Sitanggang </p>
					<p>
					<img src='http://localhost/Learnzia/assets/Images/icon/Location.png' style='width:25px; height:22px;'> Bandung, Indonesia </p>
					<p>
					<img src='http://localhost/Learnzia/assets/Images/icon/Email.png' style='width:25px; height:22px;'> learnzia@gmail.com </p>
					<p>
					<img src='http://localhost/Learnzia/assets/Images/icon/Call.png' style='width:25px; height:22px;'> + 62 811 4882 001 </p>
				</div>

		</div>
				<div class="footer-copyright text-center py-3">© 2022 Copyright:
				<a href="https://learnzia.com/">www.learnzia.com</a>
			</div>
		</footer>

	</body>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>
</html>
