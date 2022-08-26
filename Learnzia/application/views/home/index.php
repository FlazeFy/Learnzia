<!DOCTYPE html>
<html>
    <head>
        <title>Learnzia || Home</title>
		<link rel="icon" type="image/png" href="http://localhost/Learnzia/assets/images/icon/Logo.png"/>
        <!--Meta tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--CDN Bootstrap CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://kit.fontawesome.com/12801238e9.js" crossorigin="anonymous"></script>

		<!--Source file-->
		<link rel="stylesheet" type="text/css" href="http://localhost/Learnzia/assets/css/mainStyle2.css"/>

		<style>
			body {background-color: #0A0C10;}
			.navbar {position: fixed; width:100%; z-index:1;}
			a {color:#F1C40F;}
			.active {border-radius: 4px; border-bottom: 4.5px solid rgb(40, 207, 54); position: relative;bottom: 5%;}
			img {height: 30px;width: 30px;} .form-control{color:whitesmoke; background:#212121; border-width: 0 0 3px; 
				border-bottom: 3.5px solid #F1C40F;}
			hr {background-color: #F1C40F;}
			h4 {color:#F1C40F;} h5 {color:#F1C40F;}
			#menu {background-color: #212121; border-radius:5px; margin-bottom:1%;}
			.dropdown-menu{background-color: #212121; border-color:#F1C40F;} .dropdown-item{color:#F1C40F;}
			a.nav-link:hover{color:#7289da;}
			.dropdown-item:hover{color:whitesmoke; background-color:#7289da;}

			/*Scrollbar*/
			::-webkit-scrollbar {
				width: 10px;
				height: 10px;
			}
			::-webkit-scrollbar-track {
				border-radius: 10px;
				background: #212121; 
			}		
			::-webkit-scrollbar-thumb {
				background: #f1c40f; 
				border-radius: 10px;
			}

			#btn-up-story{
				border:none;
				font-size:14.5px;
			}
		</style>
    </head>

    <body>
		<!--Main Navbar-->
		<nav class="navbar navbar-expand-lg" style="background-color:#212121;">
			<a class="nav-link" onclick="openNav()" type="button">
			<img src="http://localhost/Learnzia/assets/images/icon/Message.png">Contact</a>

			<!--Side Navbar Message-->
			<?php
				$this->load->view('contact/contact');
			?>	
		
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
				aria-expanded="false" aria-label="Toggle navigation" style="color:#F1C40F;">
				<a>Show</a>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="homeCtrl">Home<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="globalCtrl">Global</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="profileCtrl">Profile</a>
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
				<button class="btn btn-primary" style="color:whitesmoke; margin-left:1%; background-color:#e62d27; border:none;" 
					data-toggle="modal" data-target="#signOutModal">Sign Out</button>
			</div>
		</nav>

		<!--Content-->
		<br><br>
		<!--Friend's post.-->
        <br><h2 style="margin-left: 13%; color:whitesmoke; font-size:20px;">Welcome, <?= $data = $this->session->userdata('userTrack'); ?></h2>
		<div class="container p-3 bg-transparent">
			<?php
				$this->load->view('home/story');
			?>
		</div>

		<div class="container px-3 bg-transparent position-relative">
			<div id="accordion">
				<div class="row">
					<div class="col-md-9">
						<h4 class="ml-3">All Post</h4>
						<button class="btn btn-success position-absolute" data-toggle="modal" data-target="#discModal" 
							aria-expanded='false' style="top:0px; right:120px;"><i class="fa-solid fa-plus"></i> Create Post</button>
						<div class="dropdown float-right position-absolute" style="top:0px; right:15px;">
							<button class="btn btn-secondary dropdown-toggle" style="color:whitesmoke; background-color:#e69627; border:none;" 
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort By</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="#">Recently</a>
								<a class="dropdown-item" href="#">Most Liked</a>
							</div>
						</div>
						<!--Question.-->
						<?php
							$this->load->view('home/question');
						?>
					</div>
					<div class="col-md-3">
						<div class="row mb-3">			
							<h4 class="ml-3">Top Quizes</h4>
								
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--Footer.-->
		<?php
			$this->load->view('others/footer');
		?>
		
		<!-- Sign out Modal -->
		<?php
			$this->load->view('others/signout');
		?>			

		<!-- Modal Add Message -->
		<?php
			$this->load->view('home/form/addMessage');
		?>

		<!-- Modal Add Discussion -->
		<?php
			$this->load->view('home/form/addQuestion');
		?>

		<!-- Modal Message-->
		<?php
			$this->load->view('contact/chat');
		?>

		<!-- Modal Share question-->
		<?php
			$this->load->view('home/form/shareQuestion');
		?>

		<!-- Modal Share reply-->
		<?php
			$this->load->view('home/form/shareReply');
		?>

		<!-- Modal Share story-->
		<?php
			$this->load->view('home/form/shareStory');
		?>

		<!-- Zoom discussion image Modal -->
		<?php
			$this->load->view('others/zoom');
		?>

		<!--Modal validation.-->
		<?php
			$this->load->view('others/failed');
		?>

		<script>
			function openNav() {
				document.getElementById("mySidebar").style.width = "360px";
			}

			function closeNav() {
				document.getElementById("mySidebar").style.width = "0";
			}

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

			var contacts = [<?php foreach($contacts as $data){
				if (($data['id_user_2'] != $this->session->userdata('userTrack'))&&($data['id_user_1'] == $this->session->userdata('userTrack'))){
					echo "'"; echo $data['id_user_2']; echo "',";
				} else if (($data['id_user_1'] != $this->session->userdata('userTrack'))&&($data['id_user_2'] == $this->session->userdata('userTrack'))){
					echo "'"; echo $data['id_user_1']; echo "',";
				} else if (($data['id_user_1'] != $this->session->userdata('userTrack'))&&($data['id_user_2'] != $this->session->userdata('userTrack'))){
					//do nothing
				}
			}?>]
			autocomplete(document.getElementById("mycontacts"), contacts);

		</script>

		

		<!--Others CDN.-->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>  
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>	
		
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

		<script>
			//JQuery Upload
			$('.custom-file-input').on('change', function() { 
				let fileName = $(this).val().split('\\').pop(); 
				$(this).next('.custom-file-label').addClass("selected").html(fileName); 
			});
			
			//Modal setting.
			$(window).on('load', function() {
				$('#errorModal').modal('show');
			});

			$(document).ready(function(){
				$("#searchListContact").on("keyup", function() {
					var value = $(this).val().toLowerCase();
					$("#listContact li").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
				});
			});
		</script>
	</body>
</html>
