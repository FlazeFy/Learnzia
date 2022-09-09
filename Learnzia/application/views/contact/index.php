<!DOCTYPE html>
<html>
    <head>
        <title>Learnzia || Contact</title>
		<link rel="icon" type="image/png" href="http://localhost/Learnzia/assets/images/icon/Logo.png"/>
        <!--Meta tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--CDN Bootstrap CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://kit.fontawesome.com/12801238e9.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>  

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

			.text-primary{
				color: #f1c40f !important; 
			}
		</style>
    </head>

    <body>
		<!--Main Navbar-->
		<?php
			$this->load->view('others/navbar');
		?>

		<!--Content-->
		<br><br><br>
		<div class="container px-3 bg-transparent position-relative">
			<div id="accordion">
				<div class="row">
					<div class="col-lg-3 col-md-5 col-sm-12 mb-3">
						<!--Contact.-->
                        <?php
                            $this->load->view('contact/contact');
                        ?>
					</div>
					<div class="col-lg-9 col-md-7 col-sm-12 mb-3">
						<!--Chat.-->
                        <?php
                            $this->load->view('contact/chat');
                        ?>
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
