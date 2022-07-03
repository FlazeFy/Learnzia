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
		<script src="https://kit.fontawesome.com/12801238e9.js" crossorigin="anonymous"></script>

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
		.btn.btn-success{
			background:#00963B;
			border:none;
		}
		.btn.btn-info{
			background:#7289DA;
			border:none;
		}
		
/*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
}

input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}

input[type=text] {
  background-color: #212121;
  width: 100%;
  border-width: 0 0 3px; 
  border-bottom: 3.5px solid #F1C40F; 
  color:whitesmoke;
  border-radius:5px;
  margin-left:-1%;
}

input[type=submit] {
  background-color: #F1C40F;
  color: #fff;
  cursor: pointer;
}

.autocomplete-items {
  position: absolute;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: -1%;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  color:whitesmoke;
  background-color: #575757; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #F1C40F;
  color:#212121;
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: #F1C40F!important; 
}
.steps {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    position: relative;
}

.step-button {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    border: none;
    background-color: #212121;
    transition: .4s;
}

.step-button[aria-expanded="true"] {
    width: 60px;
    height: 60px;
    background-color: #7289DA;
	color: #fff;
}

.done {
    background-color: #7289DA;
    color: #fff;
}

.step-item {
    z-index: 10;
    text-align: center;
}

#progress {
  -webkit-appearance:none;
    position: absolute;
    width: 95%;
    z-index: 5;
    height: 10px;
    margin-left: 18px;
    margin-bottom: 18px;
}

/* to customize progress bar */
#progress::-webkit-progress-value {
    background-color: #7289DA;
    transition: .5s ease;
}

#progress::-webkit-progress-bar {
    background-color: var(--prm-gray);

}
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
			<button class="btn btn-success" type="button" style="color:whitesmoke; margin-left:1%; border:none;" 
				data-toggle="collapse" data-target="#loginForm">Sign In</button>
		</div>
		</nav>
		<br><br><br>

		<section>
			<div class="container bg-transparent">
				<div class="row mt-5">			
					<div class="col-md">
						<img src="http://localhost/Learnzia/assets/images/Logo1.png" width="450" class="img-fluid">
						<p class="text-center text-white">Not a member? <button class="btn btn-info" data-toggle="collapse" data-target="#createAccForm">Get Started</button></p>
					</div>
					<div class="col-md">
						<div id="accordion">
							<div class="collapse show" id="loginForm" data-parent="#accordion">
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
							</div>

							<div class="collapse" id="createAccForm" data-parent="#accordion">
								<form method="post" action="loginCtrl/createAcc" autocomplete="off" enctype="multipart/form-data">
								<div class="container bg-transparent rounded">
								<div class="accordion" id="accordionExample">
									<div class="steps">
										<progress id="progress" value=0 max=100 ></progress>
										<div class="step-item">
											<button class="step-button text-center" type="button" data-toggle="collapse"
												data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												1
											</button>
											<div class="step-title text-white">
												Profile
											</div>
										</div>
										<div class="step-item">
											<button class="step-button text-center collapsed" type="button" data-toggle="collapse"
												data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
												2
											</button>
											<div class="step-title text-white">
												Account
											</div>
										</div>
										<div class="step-item">
											<button class="step-button text-center collapsed" type="button" data-toggle="collapse"
												data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
												3
											</button>
											<div class="step-title text-white">
												Validation
											</div>
										</div>
									</div>

									<div class="card border-0" style="background: rgb(33, 33, 33);">
										<div  id="headingOne">
										</div>

										<div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
											data-parent="#accordionExample">
											<div class="card-body border-0">
												
											</div>
										</div>
									</div>
									<div class="card border-0" style="background: rgb(33, 33, 33);">
										<div  id="headingTwo">

										</div>
										<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
											<div class="card-body">
												<div class="row">
													<div class="col-md">
														<div class="form-group mb-3">
															<label class="label" for="fullname" style="color:#F1C40F;">Fullname</label>
															<input type="fullname" class="form-control" placeholder="Username" style="background:#212121; border-width: 0 0 3px; 
																border-bottom: 3.5px solid #F1C40F; color:whitesmoke;" name="fullname" required>
														</div>
													</div>
													<div class="col-md">
														<div class="form-group mb-3">
															<label class="label" for="country" style="color:#F1C40F;">Country</label><br>
															<div class="autocomplete">
																<input id="searchInput" class="form-control" type="text" name="country" placeholder="Country" required>
															</div>
														</div>
													</div>
												</div>
												<div class="form-group mb-3">
													<label class="label" for="description" style="color:#F1C40F;">Description</label>
													<textarea rows="3" cols="60" name="description" style="background:#212121; border-width: 0 0 3px; 
													border-bottom: 3.5px solid #F1C40F; color:whitesmoke; border-radius:5px;" required >Enter about you here...</textarea>
												</div>
												<div class="row">
													<div class="col-md-7">
														<!--Upload file.-->
														<div class="form-group mb-3">
															<label class="label" for="description" style="color:#F1C40F;">Profile Image</label>
															<div class="input-group mb-3" style="background-color:#212121; border-width: 0 0 3px; border-bottom: 3.5px solid #F1C40F; 
																border-radius:5px;">
																<div class="input-group-prepend">
																	<span class="input-group-text">jpg</span>
																</div>
																<div class="custom-file">
																	<input type="file" class="custom-file-input" id="uploadImage" name="uploadImage" accept='image/*' required>
																	<label class="custom-file-label text-left" for="uploadImage">size max 2 mb</label>
																</div>
															</div>
														</div>
														<div class="form-group mb-3" >
															<label class="label" for="username" style="color:#F1C40F;">Username</label>
															<input type="username" class="form-control" placeholder="Username" style="background:#212121; border-width: 0 0 3px; 
																border-bottom: 3.5px solid #F1C40F; color:whitesmoke;" name="username" required>
														</div>
													</div>
													<div class="col-md-5">
														<img id="frame" src="http://localhost/Learnzia/assets/images/icon/NoImage.png" class="img-fluid bg-transparent" style="width:200px;"/>
														<a onclick="clearImageCreateAcc()" class="btn btn-danger mt-3 w-50"><i class="fa-solid fa-trash"></i> Reset</a>
													</div>
												</div>
												<div class="form-group mb-3">
													<label class="label" for="email" style="color:#F1C40F;">Email</label>
													<input type="email" class="form-control" placeholder="Email" style="background:#212121; border-width: 0 0 3px; 
															border-bottom: 3.5px solid #F1C40F; color:whitesmoke;" name="email" required>
												</div>
												<div class="form-group mb-3">
													<label class="label" for="password" style="color:#F1C40F;">Password</label>
													<input type="password" class="form-control" placeholder="Password" style="background:#212121; border-width: 0 0 3px; 
															border-bottom: 3.5px solid #F1C40F; color:whitesmoke;" name="password" required>
												</div>
												<p style="color: #F1C40F; font-size: 14px;"><i class="fa-solid fa-circle-info"></i> Password must have minimum 8 character, 1 capital, and 1 number.</p><br>
											</div>
										</div>
									</div>
									<div class="card border-0" style="background: rgb(33, 33, 33);">
										<div  id="headingThree">

										</div>
										<div id="collapseThree" class="collapse" aria-labelledby="headingThree"
											data-parent="#accordionExample">
											<div class="card-body">
												<div class="form-group">
													<button type="submit" class="form-control btn btn-primary" style="color:white;">Register</button>
												</div>
											</div>
										</div>
									</div>
									</div>
								</div>
								</form>
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

		<?php 
			if(isset($error_message)) { 
				echo"
				<div class='modal fade' id='errorModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
				<div class='modal-dialog' role='document'>
					<div class='modal-content' style='background-color:#313436;'>
					<div class='modal-header'>
						<h7 class='text-white' style='margin-left:35%;'>".$error_message."</h7>
						<i class='fa-solid fa-xmark' class='closebtn' type='button' data-dismiss='modal' aria-label='Close' onClick='refreshMessage()'></i>
					</div>
						<img src='http://localhost/Learnzia/assets/images/icon/Wrong.png' width='250' class='img-fluid'>
					</div>
				</div>
				</div>";
			}
		?>

		<script type="text/javascript">
			const stepButtons = document.querySelectorAll('.step-button');
			const progress = document.querySelector('#progress');

			Array.from(stepButtons).forEach((button,index) => {
				button.addEventListener('click', () => {
					progress.setAttribute('value', index * 100 /(stepButtons.length - 1) );//there are 3 buttons. 2 spaces.

					stepButtons.forEach((item, secindex)=>{
						if(index > secindex){
							item.classList.add('done');
						}
						if(index < secindex){
							item.classList.remove('done');
						}
					})
				})
			})

			//Refresh page.
			function refreshMessage() {
				window.location.href="http://localhost/Learnzia/";  
			}

			//Search input.
			function autocomplete(inp, arr) {
				var currentFocus;
					inp.addEventListener("input", function(e) {
					var a, b, i, val = this.value;
					closeAllLists();
					if (!val) { return false;}
					currentFocus = -1;
					a = document.createElement("DIV");
					a.setAttribute("id", this.id + "autocomplete-list");
					a.setAttribute("class", "autocomplete-items");
					this.parentNode.appendChild(a);
					for (i = 0; i < arr.length; i++) {
						if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
							b = document.createElement("DIV");
							b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
							b.innerHTML += arr[i].substr(val.length);
							b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
							b.addEventListener("click", function(e) {
								inp.value = this.getElementsByTagName("input")[0].value;
								closeAllLists();
							});
							a.appendChild(b);
						}
					}
				});
				inp.addEventListener("keydown", function(e) {
					var x = document.getElementById(this.id + "autocomplete-list");
					if (x) x = x.getElementsByTagName("div");
					if (e.keyCode == 40) {
						currentFocus++;
						addActive(x);
					} else if (e.keyCode == 38) {
						currentFocus--;
						addActive(x);
					} else if (e.keyCode == 13) {
						e.preventDefault();
						if (currentFocus > -1) {
							if (x) x[currentFocus].click();
						}
					}
				});
				function addActive(x) {
					if (!x) return false;
					removeActive(x);
					if (currentFocus >= x.length) currentFocus = 0;
					if (currentFocus < 0) currentFocus = (x.length - 1);
					x[currentFocus].classList.add("autocomplete-active");
				}
				function removeActive(x) {
					for (var i = 0; i < x.length; i++) {
					x[i].classList.remove("autocomplete-active");
					}
				}
				function closeAllLists(elmnt) {
					var x = document.getElementsByClassName("autocomplete-items");
					for (var i = 0; i < x.length; i++) {
					if (elmnt != x[i] && elmnt != inp) {
						x[i].parentNode.removeChild(x[i]);
					}
					}
				}
				document.addEventListener("click", function (e) {
					closeAllLists(e.target);
				});
			}
			var country = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];
			autocomplete(document.getElementById("searchInput"), country);
		</script>

		<!--Others CDN.-->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>  
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

		<script>
			//Modal setting.
			$(window).on('load', function() {
				$('#errorModal').modal('show');
			});
			$('#errorModal').modal({
				backdrop: 'static', 
				keyboard: false
			});  
			//Show Filename upload.
			$('.custom-file-input').on('change', function() { 
				let fileName = $(this).val().split('\\').pop(); 
				$(this).next('.custom-file-label').addClass("selected").html(fileName); 
			});
		</script>
	</body>
</html>
