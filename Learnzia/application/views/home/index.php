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
			footer  {background-color: #212121; color:whitesmoke; position: relative; bottom: 0; padding: 2rem;}
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
		<div class="container" id="menu">
			<br><h4>Friend's Post</h4>
			<div id="accordionF">
		<!--Add post-->
		<button class='btn btn-primary' data-toggle="modal" data-target="#discModal" aria-expanded='false' 
		aria-controls='multiCollapseExample2' style='background-color: #00a13e; border:none; margin-bottom:1%; max-width:120px; max-height:120px;'>
			<img src='http://localhost/Learnzia/assets/uploads/user/user_<?= $data = $this->session->userdata('userTrack'); ?>.jpg' alt='New Post' class='rounded-circle img-fluid' 
				style='width:60px; height:60px;'>
			<h5 style='font-size:14px; color:whitesmoke;'>New Post</h5>
		</button>
		<?php 
			$disFriendCount = 0;
			foreach($contacts as $data){
			foreach($allDisc as $disFriend){
				if (($data['id_user_2'] != $this->session->userdata('userTrack'))&&($data['id_user_1'] == $this->session->userdata('userTrack'))
					&&($data['id_user_2'] == $disFriend['id_user'])){
					echo "
						<button class='btn btn-primary' data-toggle='collapse' data-target='#disFriend".$disFriend['id_discussion']."' aria-expanded='false' 
						aria-controls='multiCollapseExample2' style='background-color: #212121; border:none; margin-bottom:1%; max-width:120px; max-height:120px;'>
							<img src='http://localhost/Learnzia/assets/uploads/user/user_".$data['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' 
								style='width:60px; height:60px; border: 2.5px solid #F1C40F;'>
							<h5 style='font-size:14px;'>".$disFriend['subject']."</h5>
						</button>
					";
					$disFriendCount++;
				} else if (($data['id_user_1'] != $this->session->userdata('userTrack'))&&($data['id_user_2'] == $this->session->userdata('userTrack'))
					&&($data['id_user_1'] == $disFriend['id_user'])){
					echo "
						<button class='btn btn-primary' data-toggle='collapse' data-target='#disFriend".$disFriend['id_discussion']."' aria-expanded='false' 
						aria-controls='multiCollapseExample2' style='background-color: #212121; border:none; margin-bottom:1%; max-width:120px; max-height:120px;'>
							<img src='http://localhost/Learnzia/assets/uploads/user/user_".$data['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' 
								style='width:60px; height:60px; border: 2.5px solid #F1C40F;'>
							<h5 style='font-size:14px;'>".$disFriend['subject']."</h5>
						</button>
					";
					$disFriendCount++;
				}
			}
			}
			if ($disFriendCount == 0){
				echo "<img src='http://localhost/Learnzia/assets/images/Error404.png' alt='Error404.png' style='display: block;
				margin-left: auto; margin-right: auto; width: 140px; height: 140px; margin-top:-10%;'>
				<h5 style='font-size:14px; font-style:italic; color:#F1C40F; margin-bottom:1%;
				text-align:center;'>There is no discussion from your friend in this week...</h5>";}
		?>
			<div class="row">
				<?php
				foreach($contacts as $data){
				foreach($allDisc as $disFriend){
					if (($data['id_user_2'] != $this->session->userdata('userTrack'))&&($data['id_user_1'] == $this->session->userdata('userTrack'))
						&&($data['id_user_2'] == $disFriend['id_user'])){
						echo"
						<div class='col-md-12'>
							<div class='collapse' id='disFriend".$disFriend['id_discussion']."' data-parent='#accordionF'>
								<div class='container'>";
								$i = 1; 
								$count = 0;	
									echo"<div id='accordion2'>
										<div class='card' style='border-radius:5px; border-bottom: 3.5px solid #F1C40F; background-color:#525252;'>
										<div class='card-header' id='headingOne' style='border-bottom: 1px solid #858585;'>
											<img src='http://localhost/Learnzia/assets/uploads/user/user_".$disFriend['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; margin-top: -1%; 
												margin-right:1%; float:left;'>
											<h5 style='font-size:20px; float:left;'>".$disFriend['id_user']."</h5>
											<p style='font-size:10px; padding-top:10px; float:left; font-style:italic; color:whitesmoke;'>".$disFriend['datetime']."</p>
											<h5 style='font-size:20px; float:right;'>".$disFriend['subject']."</h5><br><hr>";
											//Image w/ question
											if ($disFriend['image'] == 'yes'){
												echo"<div class='row' style='margin-bottom:1%;'>
												<div class='col-md-4 border-right'>
													<img src='http://localhost/Learnzia/assets/uploads/discussion_".$disFriend['imageURL'].".jpg' style='border-radius:6px; width:100%; height:100%; cursor:pointer' 
													alt='' data-toggle='modal' data-target='#zoom".$disFriend['id_discussion']."'>
												</div>
												<div class='col-md-6' style=''>
												<p style='font-size:14px; color:whitesmoke	;'>".$disFriend['question']."</p>
												</div>
											</div>";
											} else { echo"<p style='font-size:14px; color:whitesmoke;'>".$disFriend['question']."</p>";}
											echo "<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$disFriend['view']."</h6>
												<img src='http://localhost/Learnzia/assets/Images/icon/View.png' style='width:25px; height:25px; float:right; margin-top:-5px; padding-left:5px;'>
											<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$disFriend['up']."</h6>
												<img src='http://localhost/Learnzia/assets/Images/icon/Up.png' style='width:25px; height:22px; float:right; margin-top:-4px; padding-left:5px;'>
											<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$disFriend['comment']."</h6>
												<img src='http://localhost/Learnzia/assets/Images/icon/Comment.png' style='width:25px; height:20px; float:right; margin-top:-2px; padding-left:5px;'>
											<h5 style='font-size:15px; float:left; text-decoration:underline;' type='button' data-toggle='collapse' data-target='#collapse_disFriend".$i."' 
											aria-expanded='true' aria-controls='collapseOne''>See Reply
												<img src='http://localhost/Learnzia/assets/Images/icon/Down.png' style='width:25px; height:20px; float:left; padding-left:3px;'></h5>
										</div>
										<!--Extend-->
										<div id='collapse_disFriend".$i."' class='collapse' aria-labelledby='headingOne' data-parent='#accordion2'>
											<div class='card-body' style='background-color:#404040;'>";
												foreach ($dataReply as $data2){
												if ($data2['id_discussion'] == $disFriend['id_discussion']){
												echo"<div class='container'>
													<img src='http://localhost/Learnzia/assets/uploads/user/user_".$data2['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; 
														float:left; margin-right:1%;'>
														<h5 style='font-size:20px; margin-left:15px;'>".$data2['id_user']."</h5>";
														if ($data2['image'] == 'yes'){
															echo"<div class='row' style='margin-bottom:1%;'>
															<div class='col-md-4 border-right'>
																<img id='icon' src='http://localhost/Learnzia/assets/uploads/reply/reply_".$data2['imageURL'].".jpg' style='border-radius:6px; width:100%; height:100%; cursor:pointer' 
																alt='' data-toggle='modal' data-target='#zoom".$data2['imageURL']."'>
															</div>
															<div class='col-md-6' style=''>
															<p style='font-size:14px; color:whitesmoke	;'>".$data2['replytext']."</p>
															</div>
														</div>";
														} else { echo"<p style='font-size:14px; color:whitesmoke;'>".$data2['replytext']."</p>";}
												echo"</div>"; $count++;}} 
												if(($count == 0) &&($data2['id_user'] == $this->session->userdata('userTrack'))) {
													echo "<div class='container' style='margin-top:1%; margin-bottom:2%;'>
													<h4 style='font-style:italic; text-align:center;'>Sorry, your discussion isn't been answered yet</h4>
													<img src='http://localhost/Learnzia/assets/images/Sorry.png' alt='Sorry.png' style='display: block;
														margin-left: auto; margin-right: auto; width: 15%; height: 15%;'>
													<p style='font-style:italic; text-align:center; font-size:18px; color:#7289da;'>But dont worry, its only matter of time.</p>
												</div>";
												} else if (($count == 0) &&($data2['id_user'] != $this->session->userdata('userTrack'))){
													echo "<div class='container' style='margin-top:1%; margin-bottom:2%;'>
													<h4 style='font-style:italic; text-align:center;'>This discussion hasn't been answered yet</h4>
													<img src='http://localhost/Learnzia/assets/images/Error404.png' alt='Error404.png' style='display: block;
														margin-left: auto; margin-right: auto; width: 15%; height: 15%;'>
													<p style='font-style:italic; text-align:center; font-size:18px; color:#7289da;'>Let's be the first one.</p>
													</div>";
												} else if ($count > 0) {echo"<h5 style='font-size:15px; font-style:italic;'>Showing ".$count." replies...</h5><br>";}
												echo"<form method='post' action='homeCtrl/sendReply' class='form-inline' enctype='multipart/form-data'>
													<input type='text' class='form-control' name='id_discussion' value='".$disFriend['id_discussion']."' hidden>
													<div class='container'><hr>
														<label class='switch' style='float:left; margin-right:1%;'>
														<input type='checkbox' name='imageSwitchR'>
															<span class='slider round' type='button' data-toggle='collapse' data-target='#collapseImage".$i."'></span>
														</label>
														<a style='color:whitesmoke; float:left;'>Image</a>
														<button class='btn btn-primary' style='color:whitesmoke; background-color:#00a13e; float:right; border:none;' type='submit'>Send</button>
														<input class='form-control' type='text' placeholder='Type your reply here...' style='width:40%; float:right; margin-right:1%;' name='replytext'>
														<div class='collapse' id='collapseImage".$i."'>
															<div class='container' style='width:40%; float:left;'>
																<div class='input-group mb-3' style='background-color:#212121; border-width: 0 0 3px; border-bottom: 3.5px solid #F1C40F; 
																	border-radius:5px;'>
																	<div class='input-group-prepend'>
																		<span class='input-group-text'>jpg</span>
																	</div>
																	<div class='custom-file'>
																		<input type='file' class='custom-file-input' id='uploadImage' name='uploadImageR' accept='image/*'>
																		<label class='custom-file-label text-left' for='uploadImage'>file size max 2 mb</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
										</div>
									</div><br>";
									$count = 0;
								$i++;
								echo "</div>
							</div>
						</div>";
					} else if (($data['id_user_1'] != $this->session->userdata('userTrack'))&&($data['id_user_2'] == $this->session->userdata('userTrack'))
					&&($data['id_user_1'] == $disFriend['id_user'])){
					echo"
					<div class='col-md-12'>
						<div class='collapse' id='disFriend".$disFriend['id_discussion']."' data-parent='#accordionF'>
							<div class='container'>";
							$i = 1; 
							$count = 0;	
								echo"<div id='accordion2'>
									<div class='card' style='border-radius:5px; border-bottom: 3.5px solid #F1C40F; background-color:#525252;'>
									<div class='card-header' id='headingOne' style='border-bottom: 1px solid #858585;'>
										<img src='http://localhost/Learnzia/assets/uploads/user/user_".$disFriend['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; margin-top: -1%; 
											margin-right:1%; float:left;'>
										<h5 style='font-size:20px; float:left;'>".$disFriend['id_user']."</h5>
										<p style='font-size:10px; padding-top:10px; float:left; font-style:italic; color:whitesmoke;'>".$disFriend['datetime']."</p>
										<h5 style='font-size:20px; float:right;'>".$disFriend['subject']."</h5><br><hr>";
										//Image w/ question
										if ($disFriend['image'] == 'yes'){
											echo"<div class='row' style='margin-bottom:1%;'>
											<div class='col-md-4 border-right'>
												<img src='http://localhost/Learnzia/assets/uploads/discussion_".$disFriend['imageURL'].".jpg' style='border-radius:6px; width:100%; height:100%; cursor:pointer' 
												alt='' data-toggle='modal' data-target='#zoom".$disFriend['id_discussion']."'>
											</div>
											<div class='col-md-6' style=''>
											<p style='font-size:14px; color:whitesmoke	;'>".$disFriend['question']."</p>
											</div>
										</div>";
										} else { echo"<p style='font-size:14px; color:whitesmoke;'>".$disFriend['question']."</p>";}
										echo"<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$disFriend['view']."</h6>
											<img src='http://localhost/Learnzia/assets/Images/icon/View.png' style='width:25px; height:25px; float:right; margin-top:-5px; padding-left:5px;'>
										<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$disFriend['up']."</h6>
											<img src='http://localhost/Learnzia/assets/Images/icon/Up.png' style='width:25px; height:22px; float:right; margin-top:-4px; padding-left:5px;'>
										<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$disFriend['comment']."</h6>
											<img src='http://localhost/Learnzia/assets/Images/icon/Comment.png' style='width:25px; height:20px; float:right; margin-top:-2px; padding-left:5px;'>
										<h5 style='font-size:15px; float:left; text-decoration:underline;' type='button' data-toggle='collapse' data-target='#collapse_disFriend".$i."' 
										aria-expanded='true' aria-controls='collapseOne''>See Reply
											<img src='http://localhost/Learnzia/assets/Images/icon/Down.png' style='width:25px; height:20px; float:left; padding-left:3px;'></h5>
									</div>
									<!--Extend-->
									<div id='collapse_disFriend".$i."' class='collapse' aria-labelledby='headingOne' data-parent='#accordion2'>
										<div class='card-body' style='background-color:#404040;'>";
											foreach ($dataReply as $data2){
											if ($data2['id_discussion'] == $disFriend['id_discussion']){
											echo"<div class='container'>
												<img src='http://localhost/Learnzia/assets/uploads/user/user_".$data2['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; 
													float:left; margin-right:1%;'>
													<h5 style='font-size:20px; margin-left:15px;'>".$data2['id_user']."</h5>";
													if ($data2['image'] == 'yes'){
														echo"<div class='row' style='margin-bottom:1%;'>
														<div class='col-md-4 border-right'>
															<img id='icon' src='http://localhost/Learnzia/assets/uploads/reply/reply_".$data2['imageURL'].".jpg' style='border-radius:6px; width:100%; height:100%; cursor:pointer' 
															alt='' data-toggle='modal' data-target='#zoom".$data2['imageURL']."'>
														</div>
														<div class='col-md-6' style=''>
														<p style='font-size:14px; color:whitesmoke	;'>".$data2['replytext']."</p>
														</div>
													</div>";
													} else { echo"<p style='font-size:14px; color:whitesmoke;'>".$data2['replytext']."</p>";}
											echo "</div>"; $count++;}} 
											if(($count == 0) &&($data2['id_user'] == $this->session->userdata('userTrack'))) {
												echo "<div class='container' style='margin-top:1%; margin-bottom:2%;'>
												<h4 style='font-style:italic; text-align:center;'>Sorry, your discussion isn't been answered yet</h4>
												<img src='http://localhost/Learnzia/assets/images/Sorry.png' alt='Sorry.png' style='display: block;
													margin-left: auto; margin-right: auto; width: 15%; height: 15%;'>
												<p style='font-style:italic; text-align:center; font-size:18px; color:#7289da;'>But dont worry, its only matter of time.</p>
											</div>";
											} else if (($count == 0) &&($data2['id_user'] != $this->session->userdata('userTrack'))){
												echo "<div class='container' style='margin-top:1%; margin-bottom:2%;'>
												<h4 style='font-style:italic; text-align:center;'>This discussion hasn't been answered yet</h4>
												<img src='http://localhost/Learnzia/assets/images/Error404.png' alt='Error404.png' style='display: block;
													margin-left: auto; margin-right: auto; width: 15%; height: 15%;'>
												<p style='font-style:italic; text-align:center; font-size:18px; color:#7289da;'>Let's be the first one.</p>
												</div>";
											} else if ($count > 0) {echo"<h5 style='font-size:15px; font-style:italic;'>Showing ".$count." replies...</h5><br>";}
											echo"<form method='post' action='homeCtrl/sendReply' class='form-inline' enctype='multipart/form-data'>
												<input type='text' class='form-control' name='id_discussion' value='".$disFriend['id_discussion']."' hidden>
												<div class='container'><hr>
													<label class='switch' style='float:left; margin-right:1%;'>
													<input type='checkbox' name='imageSwitchR'>
														<span class='slider round' type='button' data-toggle='collapse' data-target='#collapseImage".$i."'></span>
													</label>
													<a style='color:whitesmoke; float:left;'>Image</a>
													<button class='btn btn-primary' style='color:whitesmoke; background-color:#00a13e; float:right; border:none;' type='submit'>Send</button>
													<input class='form-control' type='text' placeholder='Type your reply here...' style='width:40%; float:right; margin-right:1%;' name='replytext'>
													<div class='collapse' id='collapseImage".$i."'>
														<div class='container' style='width:40%; float:left;'>
															<div class='input-group mb-3' style='background-color:#212121; border-width: 0 0 3px; border-bottom: 3.5px solid #F1C40F; 
																border-radius:5px;'>
																<div class='input-group-prepend'>
																	<span class='input-group-text'>jpg</span>
																</div>
																<div class='custom-file'>
																	<input type='file' class='custom-file-input' id='uploadImage' name='uploadImageR' accept='image/*'>
																	<label class='custom-file-label text-left' for='uploadImage'>file size max 2 mb</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
									</div>
								</div><br>";
								$count = 0;
							$i++;
							echo "</div>
						</div>
					</div>";
					}
				}}
				?>
			</div>
			</div>
		</div>

		<div class="container p-3 bg-transparent">
			<div class="row mb-3">			
				<h4>All Post</h4>
				<div class="dropdown ml-5">
					<button class="btn btn-secondary dropdown-toggle" style="color:whitesmoke; background-color:#e69627; border:none;" 
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort By</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="#">Recently</a>
						<a class="dropdown-item" href="#">Most Liked</a>
					</div>
				</div>
			</div>
			<div id="accordion">
				<!--Footer.-->
				<?php
					$this->load->view('home/question');
				?>
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
