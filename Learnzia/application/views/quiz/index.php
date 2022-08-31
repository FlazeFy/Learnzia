<!DOCTYPE html>
<html>
    <head>
        <title>Learnzia || Quiz</title>
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

			.text-primary{
				color: #f1c40f !important; 
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
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-9">
                    <!--Question-->
                    <?php
                        $this->load->view('quiz/question');
                    ?>
                </div>
                <div class="col-md-3">
                    <!--Navigation-->
                    <?php
                        $this->load->view('quiz/nav');
                    ?>
                </div>
            </div>
        </div>

		<!--Footer.-->
		<?php
			$this->load->view('others/footer');
		?>

		<script>
			function openNav() {
				document.getElementById("mySidebar").style.width = "360px";
			}

			function closeNav() {
				document.getElementById("mySidebar").style.width = "0";
			}

		</script>

		<!--Others CDN.-->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>  
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>	
		
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

		<script>
			
		</script>
	</body>
</html>
