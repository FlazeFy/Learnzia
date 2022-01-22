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
        <link rel="stylesheet" type="text/css" href="http://localhost/Learnzia/assets/css/login.css"/>
		<style>
			body {background-color: #313436; overflow: hidden;}
		</style>
    </head>
    <body>
	<section class="ftco-section">
		<div class="container">
		<div class="row justify-content-center" >
			<div class="col-md-12 col-lg-10">
				<div class="wrap d-md-flex" style="background:#212121; border-radius:10px; margin-top:-6%;">
					<div class="img" style="background-image: url(http://localhost/Learnzia/assets/images/Logo.png);">
				</div>
					<div class="login-wrap p-2 p-md-3">
				<div class="d-flex">
					<div class="w-100">
						<h3 class="mb-4" style="color:whitesmoke;">Welcome</h3>
					</div>
				</div>
					<form method="post" class="signin-form" action="<?php echo base_url().'loginCtrl/checkUser'; ?>">
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
				<!--Error Message-->
				<?php if(isset($error_message)) { echo"
					<p style='color:#f5363f;'>".$error_message."</p>";
				} ?>
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
				<p class="text-center">Not a member? <a data-toggle="tab" href="createAccCtrl" style="color:#F1C40F; text-decoration: underline;">Sign Up</a></p>
				<p class="text-center" style="color:whitesmoke;">Follow us on</p>
				<p class="social-media d-flex justify-content-center">
					<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
					<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
				</p>
			</div>
			</div>
			</div>
		</div>
		</div>
	</section>
    </body>
</html>
