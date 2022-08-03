<!--Leonardho R. Sitanggang
    1302194041  SE-43-03
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Learnzia || Global</title>
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

		<!-- chartist CSS -->
		<link href="http://localhost/Learnzia/assets/css/chartist-js/dist/chartist.min.css" rel="stylesheet">
		<link href="http://localhost/Learnzia/assets/css/chartist-js/dist/chartist-init.css" rel="stylesheet">
		<link href="http://localhost/Learnzia/assets/css/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">

		<style>
			body {background-color: #0A0C10; color:whitesmoke;}
			.navbar {position: fixed; width:100%; z-index:1;}
			a {color:#F1C40F;}
			.active {border-radius: 4px; border-bottom: 4.5px solid rgb(40, 207, 54); position: relative;bottom: 5%;}
			#icon {height: 30px;width: 30px;} .form-control{color:whitesmoke; background:#212121; border-width: 0 0 3px; 
				border-bottom: 3.5px solid #F1C40F;}
			hr {background-color: whitesmoke;}
			h4 {color:#F1C40F;} h5 {color:#F1C40F;}
			#menu {background-color: #212121; border-radius:5px; margin-bottom:1%;}
			.dropdown-menu{background-color: #212121; border-color:#F1C40F;} .dropdown-item{color:#F1C40F;}
			.nav-tabs .nav-link.active{background-color:#e69627; color:whitesmoke; border:none; margin-top:2%;}
			.tab-pane.active{border:none;}
			a.nav-link:hover{color:#7289da;}
			.dropdown-item:hover{color:whitesmoke; background-color:#7289da;}
		</style>
    </head>
    <body>
		<!--Main Navbar-->
		<nav class="navbar navbar-expand-lg" style="background-color:#212121;">
			<a class="nav-link" onclick="openNav()" type="button">
			<img id='icon' src="http://localhost/Learnzia/assets/images/icon/Message.png">Contact</a>
			
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
				<li class="nav-item">
					<a class="nav-link" href="homeCtrl">Home</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="globalCtrl">Global</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="profileCtrl">Profile<span class="sr-only">(current)</span></a>
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
		<br><h2 style="margin-left: 13%; color:whitesmoke; font-size:20px;">Welcome, <?= $data = $this->session->userdata('userTrack'); ?></h2>
		<div class="container p-3" id="menu">
			<h4>Browse the World</h4>
			<form method='post' action="" autocomplete='off'>
				<div class="autocomplete" style="width:30%; margin-bottom:2%;" >
					<input id="allClassAndUser" type="search" name="receiver" class='form-control mr-sm-2' placeholder="username, /classroom" required>
				</div>
				<button class="btn btn-primary" style="color:whitesmoke; background-color:#00a13e; border:none;" style="float:right;" type="submit">Search</button>
			</form>
		</div>

		<!--My classroom.-->
		<div class="container p-3" id="menu">
			<h4>My Classroom</h4>
			<div id="accordionC">
				<!--New Class-->
				<button class='btn btn-primary' data-toggle="modal" data-target="#newClassModal" aria-expanded='false' 
				aria-controls='multiCollapseExample2' style='background-color: #00a13e; border:none; margin-bottom:1%; max-width:120px; max-height:120px;'>
					<img src='http://localhost/Learnzia/assets/images/classroom.png' alt='New Post' style='width:60px; height:60px;'>
					<h5 style='font-size:14px; color:whitesmoke;'>New Class</h5>
				</button>
				<!--My Class-->
				<?php
					$this->load->view('global/myclass');
				?>
			</div>
		</div>

		<!--All classroom.-->
		<div class="container p-3" id="menu">
			<h4>All Class & Post</h4>
			
		</div>

		<!--Footer.-->
		<?php
			$this->load->view('others/footer');
		?>
		
		<!-- My Classroom modal. -->
		<?php
			$this->load->view('global/classprofile');
		?>	
		
		<!-- Sign out Modal -->
		<?php
			$this->load->view('others/signout');
		?>			

		<!-- Modal Add Message -->
		<?php
			$this->load->view('home/form/addMessage');
		?>

		<!-- Modal Message-->
		<?php
			$this->load->view('contact/chat');
		?>

		<!-- Modal Share question-->
		<?php
			$this->load->view('home/form/shareQuestion');
		?>

		<!-- Modal New Classroom -->
		<?php
			$this->load->view('global/form/createClass');
		?>

		<!--Modal validation.-->
		<?php
			$this->load->view('others/failed');
		?>

		<?php
			$this->load->view('others/success');
		?>

		<script>
			function openNav() {
				document.getElementById("mySidebar").style.width = "360px";
				document.getElementById("main").style.marginLeft = "360px";
			}

			function closeNav() {
				document.getElementById("mySidebar").style.width = "0";
				document.getElementById("main").style.marginLeft = "0";
			}
			function refreshMessage() {
				window.location.href="http://localhost/Learnzia/globalCtrl";  
			}
		</script>

		<script>
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

		//List friends.
		var contacts = [<?php foreach($contacts as $data){
			if (($data['id_user_2'] != $this->session->userdata('userTrack'))&&($data['id_user_1'] == $this->session->userdata('userTrack'))){
				echo "'"; echo $data['id_user_2']; echo "',";
			} else if (($data['id_user_1'] != $this->session->userdata('userTrack'))&&($data['id_user_2'] == $this->session->userdata('userTrack'))){
				echo "'"; echo $data['id_user_1']; echo "',";
			} else if (($data['id_user_1'] != $this->session->userdata('userTrack'))&&($data['id_user_2'] != $this->session->userdata('userTrack'))){
				//do nothing
			}
		}?>]

		//List friends who doesnt join specific classroom.
		<?php 
			foreach ($listRel as $rel){foreach ($listClass as $class) {
				if (($class['classname'] == $rel['classname'])&& ($rel['username']== $this->session->userdata('userTrack'))){
					echo "var list".$class['classname']." = [";
					$i = 0; $j = 0;
					foreach($contacts as $data){
					if (($data['username2'] != $this->session->userdata('userTrack'))&&($data['username1'] == $this->session->userdata('userTrack'))){
						foreach ($listRel as $rel2){
							if (($rel2['username'] == $data['username2'])&&($rel2['classname'] == $class['classname'])){
							$i++;
							
						}}
						//break;
						if ($i == 0){echo "'"; echo $data['username2']; echo "',";} 
					} 
					else if (($data['username1'] != $this->session->userdata('userTrack'))&&($data['username2'] == $this->session->userdata('userTrack'))){
						foreach ($listRel as $rel2){
							if (($rel2['username'] == $data['username1'])&&($rel2['classname'] == $class['classname'])){
								$j++;
						}}
						//break;
						if ($j == 0){echo "'"; echo $data['username1']; echo "',";} 
					}  
				}
				echo"];";
			}	
			}}	
		?>

		//List All user and class.
		var classAndUser = [<?php foreach($listUser as $data){
			echo "'"; echo $data['username']; echo "',";
		} foreach($listClass as $data2){ 
			echo "'/"; echo $data2['classname']; echo "',";
		}?>]

		/*initiate the autocomplete function on the "mycontacts" element, and pass along the contacts array as possible autocomplete values:*/
		autocomplete(document.getElementById("mycontacts"), contacts);
		autocomplete(document.getElementById("allClassAndUser"), classAndUser);
		<?php 
			foreach ($listClass as $class){foreach ($listRel as $rel) {
				if (($rel['classname'] == $class['classname'])&& ($rel['username']== $this->session->userdata('userTrack'))){
					echo"autocomplete(document.getElementById('available4".$class['classname']."'), list".$class['classname'].");";
			}}}
		?>
		</script>

		<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<!--Ajax for json-->
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>  
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
		
		<!-- chartist chart -->
		<script src="assets/js/chartist-js/dist/chartist.min.js"></script>
		<script src="assets/js/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
		<!--c3 JavaScript -->
		<script src="assets/js/d3/d3.min.js"></script>
		<script src="assets/js/c3-master/c3.min.js"></script>

		<script>
			//Upload file name 
			$('.custom-file-input').on('change', function() { 
				let fileName = $(this).val().split('\\').pop(); 
				$(this).next('.custom-file-label').addClass("selected").html(fileName); 
			});
		</script>

	</body>
</html>
