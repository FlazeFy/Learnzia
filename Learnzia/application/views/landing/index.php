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

			body {background-color: #0A0C10;}
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
		<?php
			$this->load->view('landing/navbar');
		?>
		<br><br><br>

		<section id="landing">
			<div class="container bg-transparent">
				<div class="row mt-5">			
					<div class="col-md">
						<img src="http://localhost/Learnzia/assets/images/Logo1.png" width="450" class="img-fluid">
						<p class="text-center text-white">Not a member? <button class="btn btn-info" data-toggle="collapse" data-target="#createAccForm">Get Started</button></p>
					</div>
					<div class="col-md">
						<div id="accordion">
							<div class="collapse show w-75" id="loginForm" data-parent="#accordion">
								<!--Login form-->
								<?php
									$this->load->view('landing/form/login');
								?>
							</div>

							<div class="collapse" id="createAccForm" data-parent="#accordion">
								<!--Create account form-->
								<?php
									$this->load->view('landing/form/createAcc');
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section id="feature">
			<!--Features.-->
			<?php
				$this->load->view('landing/feature');
			?>
		</section>

		<section id="faq">
			<!--Frequently asked question.-->
			<?php
				$this->load->view('landing/faq');
			?>
		</section><br>

		<!--Footer.-->
		<?php
			$this->load->view('others/footer');
		?>

		<!--Modal validation.-->
		<?php
			$this->load->view('others/failed');
		?>

		<script type="text/javascript">
			//Image upload preview.
			function previewCreateAcc() {
                frame.src = URL.createObjectURL(event.target.files[0]);
            }
            function clearImageCreateAcc() {
                document.getElementById('formFileCreateAcc').value = null;
                frame.src = "http://localhost/Learnzia/assets/images/icon/NoImage.png";
            }

			//Stepper.
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
