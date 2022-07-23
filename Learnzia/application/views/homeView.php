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
			<img src='http://localhost/Learnzia/assets/uploads/user_<?= $data = $this->session->userdata('userTrack'); ?>.jpg' alt='New Post' class='rounded-circle img-fluid' 
				style='width:60px; height:60px;'>
			<h5 style='font-size:14px; color:whitesmoke;'>New Post</h5>
		</button>
		<?php 
			$disFriendCount = 0;
			foreach($contacts as $data){
			foreach($dataDiscussion as $disFriend){
				if (($data['id_user_2'] != $this->session->userdata('userTrack'))&&($data['id_user_1'] == $this->session->userdata('userTrack'))
					&&($data['id_user_2'] == $disFriend['sender'])){
					echo "
						<button class='btn btn-primary' data-toggle='collapse' data-target='#disFriend".$disFriend['id_discussion']."' aria-expanded='false' 
						aria-controls='multiCollapseExample2' style='background-color: #212121; border:none; margin-bottom:1%; max-width:120px; max-height:120px;'>
							<img src='http://localhost/Learnzia/assets/uploads/user_".$data['id_user_2'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' 
								style='width:60px; height:60px; border: 2.5px solid #F1C40F;'>
							<h5 style='font-size:14px;'>".$disFriend['subject']."</h5>
						</button>
					";
					$disFriendCount++;
				} else if (($data['id_user_1'] != $this->session->userdata('userTrack'))&&($data['id_user_2'] == $this->session->userdata('userTrack'))
					&&($data['id_user_1'] == $disFriend['sender'])){
					echo "
						<button class='btn btn-primary' data-toggle='collapse' data-target='#disFriend".$disFriend['id_discussion']."' aria-expanded='false' 
						aria-controls='multiCollapseExample2' style='background-color: #212121; border:none; margin-bottom:1%; max-width:120px; max-height:120px;'>
							<img src='http://localhost/Learnzia/assets/uploads/user_".$data['id_user_1'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' 
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
				foreach($dataDiscussion as $disFriend){
					if (($data['id_user_2'] != $this->session->userdata('userTrack'))&&($data['id_user_1'] == $this->session->userdata('userTrack'))
						&&($data['id_user_2'] == $disFriend['sender'])){
						echo"
						<div class='col-md-12'>
							<div class='collapse' id='disFriend".$disFriend['id_discussion']."' data-parent='#accordionF'>
								<div class='container'>";
								$i = 1; 
								$count = 0;	
									echo"<div id='accordion2'>
										<div class='card' style='border-radius:5px; border-bottom: 3.5px solid #F1C40F; background-color:#525252;'>
										<div class='card-header' id='headingOne' style='border-bottom: 1px solid #858585;'>
											<img src='http://localhost/Learnzia/assets/uploads/user_".$disFriend['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; margin-top: -1%; 
												margin-right:1%; float:left;'>
											<h5 style='font-size:20px; float:left;'>".$disFriend['sender']."</h5>
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
													<img src='http://localhost/Learnzia/assets/uploads/user_".$data2['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; 
														float:left; margin-right:1%;'>
														<h5 style='font-size:20px; margin-left:15px;'>".$data2['sender']."</h5>";
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
												if(($count == 0) &&($data2['sender'] == $this->session->userdata('userTrack'))) {
													echo "<div class='container' style='margin-top:1%; margin-bottom:2%;'>
													<h4 style='font-style:italic; text-align:center;'>Sorry, your discussion isn't been answered yet</h4>
													<img src='http://localhost/Learnzia/assets/images/Sorry.png' alt='Sorry.png' style='display: block;
														margin-left: auto; margin-right: auto; width: 15%; height: 15%;'>
													<p style='font-style:italic; text-align:center; font-size:18px; color:#7289da;'>But dont worry, its only matter of time.</p>
												</div>";
												} else if (($count == 0) &&($data2['sender'] != $this->session->userdata('userTrack'))){
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
					&&($data['id_user_1'] == $disFriend['sender'])){
					echo"
					<div class='col-md-12'>
						<div class='collapse' id='disFriend".$disFriend['id_discussion']."' data-parent='#accordionF'>
							<div class='container'>";
							$i = 1; 
							$count = 0;	
								echo"<div id='accordion2'>
									<div class='card' style='border-radius:5px; border-bottom: 3.5px solid #F1C40F; background-color:#525252;'>
									<div class='card-header' id='headingOne' style='border-bottom: 1px solid #858585;'>
										<img src='http://localhost/Learnzia/assets/uploads/user_".$disFriend['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; margin-top: -1%; 
											margin-right:1%; float:left;'>
										<h5 style='font-size:20px; float:left;'>".$disFriend['sender']."</h5>
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
												<img src='http://localhost/Learnzia/assets/uploads/user_".$data2['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; 
													float:left; margin-right:1%;'>
													<h5 style='font-size:20px; margin-left:15px;'>".$data2['sender']."</h5>";
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
											if(($count == 0) &&($data2['sender'] == $this->session->userdata('userTrack'))) {
												echo "<div class='container' style='margin-top:1%; margin-bottom:2%;'>
												<h4 style='font-style:italic; text-align:center;'>Sorry, your discussion isn't been answered yet</h4>
												<img src='http://localhost/Learnzia/assets/images/Sorry.png' alt='Sorry.png' style='display: block;
													margin-left: auto; margin-right: auto; width: 15%; height: 15%;'>
												<p style='font-style:italic; text-align:center; font-size:18px; color:#7289da;'>But dont worry, its only matter of time.</p>
											</div>";
											} else if (($count == 0) &&($data2['sender'] != $this->session->userdata('userTrack'))){
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

		<div class="container" id="menu">
			<br><h4>All Post</h4>
			<div id="accordion">
				<h5 style='color:whitesmoke; font-size:16px;'>Filter By</h5>
				<button class="btn btn-primary" data-toggle="collapse" data-target="#multiCollapseExample1" aria-expanded="false" 
					aria-controls="multiCollapseExample2" style="background-color:#7289da; border-width:0px;">Math</button>
				<button class="btn btn-primary" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" 
					aria-controls="multiCollapseExample2" style="background-color:#7289da; border-width:0px;">Coding</button>
				<button class="btn btn-primary" data-toggle="collapse" data-target="#multiCollapseExample3" aria-expanded="false" 
					aria-controls="multiCollapseExample2" style="background-color:#7289da; border-width:0px;">Design</button>
				<button class="btn btn-primary" data-toggle="collapse" data-target="#multiCollapseExample4" aria-expanded="false" 
					aria-controls="multiCollapseExample2" style="background-color:#7289da; border-width:0px;">Science</button>
				<button class="btn btn-primary" data-toggle="collapse" data-target="#multiCollapseExample5" aria-expanded="false" 
					aria-controls="multiCollapseExample2" style="background-color:#7289da; border-width:0px;">History</button>

			<div class="dropdown" style="float:right;">
				<button class="btn btn-secondary dropdown-toggle" style="color:whitesmoke; background-color:#e69627; border:none;" 
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort By</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="#">Recently</a>
					<a class="dropdown-item" href="#">Most Liked</a>
				</div>
			</div>
				<hr>

				<div class="row">
				<div class="col-md-12">
					<div class="collapse show" id="multiCollapseExample1" data-parent="#accordion">
						<div class="container">
							<h5>Math</h5><br>
							<div class="container-fluid">
							<?php 
								$i = 1; 
								$count = 0;
								foreach($discMath as $data){	
									echo"<div id='accordion2'>
										<div class='card' style='border-radius:5px; border-bottom: 3.5px solid #F1C40F; background-color:#525252;'>
										<div class='card-header' id='headingOne' style='border-bottom: 1px solid #858585;'>
											<img src='http://localhost/Learnzia/assets/uploads/user_".$data['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; margin-top: -1%; 
												margin-right:1%; float:left;'>";
										if($data['sender'] == $this->session->userdata('userTrack')){
											echo"<h5 style='font-size:20px; float:left;'>You</h5>";
										} else {
											echo"<h5 style='font-size:20px; float:left;'>".$data['sender']."</h5>";
										} echo "
											<p style='font-size:10px; padding-top:10px; float:left; font-style:italic; color:whitesmoke;'>".$data['datetime']."</p>
											<h5 style='font-size:20px; float:right;'>".$data['subject']."</h5><br><hr>";
											//Image w/ question
											if ($data['image'] == 'yes'){
												echo"<div class='row' style='margin-bottom:1%;'>
												<div class='col-md-4 border-right'>
													<img src='http://localhost/Learnzia/assets/uploads/discussion_".$data['imageURL'].".jpg' style='border-radius:6px; width:100%; height:100%; cursor:pointer' 
													alt='' data-toggle='modal' data-target='#zoom".$data['id_discussion']."'>
												</div>
												<div class='col-md-6' style=''>
												<p style='font-size:14px; color:whitesmoke	;'>".$data['question']."</p>
												</div>
											</div>";
											} else { echo"<p style='font-size:14px; color:whitesmoke;'>".$data['question']."</p>";}
											echo "<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$data['view']."</h6>
												<img src='http://localhost/Learnzia/assets/Images/icon/View.png' style='width:25px; height:25px; float:right; margin-top:-5px; padding-left:5px;'>
											<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$data['up']."</h6>
												<img src='http://localhost/Learnzia/assets/Images/icon/Up.png' style='width:25px; height:22px; float:right; margin-top:-4px; padding-left:5px;'>
											<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$data['comment']."</h6>
												<img src='http://localhost/Learnzia/assets/Images/icon/Comment.png' style='width:25px; height:20px; float:right; margin-top:-2px; padding-left:5px;'>
											<h5 style='font-size:15px; float:left; text-decoration:underline;' type='button' data-toggle='collapse' data-target='#collapse".$i."' 
											aria-expanded='true' aria-controls='collapseOne''>See Reply
												<img src='http://localhost/Learnzia/assets/Images/icon/Down.png' style='width:25px; height:20px; float:left; padding-left:3px;'></h5>
										</div>
										<!--Extend-->
										<div id='collapse".$i."' class='collapse' aria-labelledby='headingOne' data-parent='#accordion2'>
											<div class='card-body' style='background-color:#404040;'>";
												foreach ($dataReply as $data2){
												if ($data2['id_discussion'] == $data['id_discussion']){
												echo"<div class='container'>
													<img src='http://localhost/Learnzia/assets/uploads/user_".$data2['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; 
														float:left; margin-right:1%;'>";
													if($data2['sender'] == $this->session->userdata('userTrack')){
														echo"<h5 style='font-size:20px; margin-left:15px;'>You</h5>";
													} else {
														echo"<h5 style='font-size:20px; margin-left:15px;'>".$data2['sender']."</h5>";
													} if ($data2['image'] == 'yes'){
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
												if(($count == 0) &&($data2['sender'] == $this->session->userdata('userTrack'))) {
													echo "<div class='container' style='margin-top:1%; margin-bottom:2%;'>
													<h4 style='font-style:italic; text-align:center;'>Sorry, your discussion isn't been answered yet</h4>
													<img src='http://localhost/Learnzia/assets/images/Sorry.png' alt='Sorry.png' style='display: block;
														margin-left: auto; margin-right: auto; width: 15%; height: 15%;'>
													<p style='font-style:italic; text-align:center; font-size:18px; color:#7289da;'>But dont worry, its only matter of time.</p>
												</div>";
												} else if (($count == 0) &&($data2['sender'] != $this->session->userdata('userTrack'))){
													echo "<div class='container' style='margin-top:1%; margin-bottom:2%;'>
													<h4 style='font-style:italic; text-align:center;'>This discussion hasn't been answered yet</h4>
													<img src='http://localhost/Learnzia/assets/images/Error404.png' alt='Error404.png' style='display: block;
														margin-left: auto; margin-right: auto; width: 15%; height: 15%;'>
													<p style='font-style:italic; text-align:center; font-size:18px; color:#7289da;'>Let's be the first one.</p>
													</div>";
												} else if ($count > 0) {echo"<h5 style='font-size:15px; font-style:italic;'>Showing ".$count." replies...</h5><br>";}
												echo"<form method='post' action='homeCtrl/sendReply' class='form-inline' enctype='multipart/form-data'>
													<input type='text' class='form-control' name='id_discussion' value='".$data['id_discussion']."' hidden>
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
							 }?>
							</div>
							<!--end of content-->

						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="collapse" id="multiCollapseExample2" data-parent="#accordion">
						<div class="container">
							<h5>Coding</h5><br>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="collapse" id="multiCollapseExample3" data-parent="#accordion">
						<div class="container">
							<h5>design</h5><br>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="collapse" id="multiCollapseExample4" data-parent="#accordion">
						<div class="container">
							<h5>Science</h5><br>
						</div>
					</div>
				</div>
				<!--Histrory content-->
				<div class="col-md-12">
					<div class="collapse" id="multiCollapseExample5" data-parent="#accordion">
						<div class="container">
							<h5>History</h5><br>
							<div class="container-fluid">
							<?php 
								$i = 1; 
								$count = 0;
								foreach($discHistory as $data){	
									echo"<div id='accordion2'>
										<div class='card' style='border-radius:5px; border-bottom: 3.5px solid #F1C40F; background-color:#525252;'>
										<div class='card-header' id='headingOne' style='border-bottom: 1px solid #858585;'>
											<img src='http://localhost/Learnzia/assets/uploads/user_".$data['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; margin-top: -1%; 
												margin-right:1%; float:left;'>";
										if($data['sender'] == $this->session->userdata('userTrack')){
											echo"<h5 style='font-size:20px; float:left;'>You</h5>";
										} else {
											echo"<h5 style='font-size:20px; float:left;'>".$data['sender']."</h5>";
										} echo "
											<p style='font-size:10px; padding-top:10px; float:left; font-style:italic; color:whitesmoke;'>".$data['datetime']."</p>
											<h5 style='font-size:20px; float:right;'>".$data['subject']."</h5><br><hr>";
											//Image w/ question
											if ($data['image'] == 'yes'){
												echo"<div class='row' style='margin-bottom:1%;'>
												<div class='col-md-4 border-right'>
													<img src='http://localhost/Learnzia/assets/uploads/discussion_".$data['imageURL'].".jpg' style='border-radius:6px; width:100%; height:100%; cursor:pointer' 
													alt='' data-toggle='modal' data-target='#zoom".$data['id_discussion']."'>
												</div>
												<div class='col-md-6' style=''>
												<p style='font-size:14px; color:whitesmoke	;'>".$data['question']."</p>
												</div>
											</div>";
											} else { echo"<p style='font-size:14px; color:whitesmoke;'>".$data['question']."</p>";}
											echo"<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$data['view']."</h6>
												<img src='http://localhost/Learnzia/assets/Images/icon/View.png' style='width:25px; height:25px; float:right; margin-top:-5px; padding-left:5px;'>
											<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$data['up']."</h6>
												<img src='http://localhost/Learnzia/assets/Images/icon/Up.png' style='width:25px; height:22px; float:right; margin-top:-4px; padding-left:5px;'>
											<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$data['comment']."</h6>
												<img src='http://localhost/Learnzia/assets/Images/icon/Comment.png' style='width:25px; height:20px; float:right; margin-top:-2px; padding-left:5px;'>
											<h5 style='font-size:15px; float:left; text-decoration:underline;' type='button' data-toggle='collapse' data-target='#collapse".$i."' 
											aria-expanded='true' aria-controls='collapseOne''>See Reply
												<img src='http://localhost/Learnzia/assets/Images/icon/Down.png' style='width:25px; height:20px; float:left; padding-left:3px;'></h5>
										</div>
										<!--Extend-->
										<div id='collapse".$i."' class='collapse' aria-labelledby='headingOne' data-parent='#accordion2'>
											<div class='card-body' style='background-color:#404040;'>";
												foreach ($dataReply as $data2){
												if ($data2['id_discussion'] == $data['id_discussion']){
												echo"<div class='container'>
													<img src='http://localhost/Learnzia/assets/uploads/user_".$data2['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; 
														float:left; margin-right:1%;'>";
													if($data2['sender'] == $this->session->userdata('userTrack')){
														echo"<h5 style='font-size:20px; margin-left:15px;'>You</h5>";
													} else {
														echo"<h5 style='font-size:20px; margin-left:15px;'>".$data2['sender']."</h5>";
													} 
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
												if(($count == 0) &&($data2['sender'] == $this->session->userdata('userTrack'))) {
													echo "<div class='container' style='margin-top:1%; margin-bottom:2%;'>
													<h4 style='font-style:italic; text-align:center;'>Sorry, your discussion isn't been answered yet</h4>
													<img src='http://localhost/Learnzia/assets/images/Sorry.png' alt='Sorry.png' style='display: block;
														margin-left: auto; margin-right: auto; width: 15%; height: 15%;'>
													<p style='font-style:italic; text-align:center; font-size:18px; color:#7289da;'>But dont worry, its only matter of time.</p>
												</div>";
												} else if (($count == 0) &&($data2['sender'] != $this->session->userdata('userTrack'))){
													echo "<div class='container' style='margin-top:1%; margin-bottom:2%;'>
													<h4 style='font-style:italic; text-align:center;'>This discussion hasn't been answered yet</h4>
													<img src='http://localhost/Learnzia/assets/images/Error404.png' alt='Error404.png' style='display: block;
														margin-left: auto; margin-right: auto; width: 15%; height: 15%;'>
													<p style='font-style:italic; text-align:center; font-size:18px; color:#7289da;'>Let's be the first one.</p>
													</div>";
												} else if ($count > 0) {echo"<h5 style='font-size:15px; font-style:italic;'>Showing ".$count." replies...</h5><br>";}
												echo"<form method='post' action='homeCtrl/sendReply' class='form-inline' enctype='multipart/form-data'>
													<input type='text' class='form-control' name='id_discussion' value='".$data['id_discussion']."' hidden>
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
							 }?>
							</div>
							<!--end of content-->

						</div>
					</div>	
				</div>
				</div>
			</div>
		</div>

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
		
		<!-- Sign out Modal -->
		<div class="modal fade" id="signOutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content" style='background-color:#313436;'>
			<div class="modal-header">
				<h5 class="" style='margin-left:35%;'>Are you sure?...</h5>
				<!--Good bye animation-->
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger" data-dismiss="modal">Cancel</button>
				<form method='POST' action='<?php echo site_url().'homeCtrl/signOut'; ?>'>
				<button type="submit" class="btn btn-primary" style='background-color:#e69627; border:none;'>Yes, Sign Out</button></form>
			</div>			
			</div>
		</div>
		</div>				

		<!-- Modal Add Message -->
		<div class='modal fade' id='messageModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
		<div class='modal-dialog' role='document'>
			<form method='POST' action='<?php echo site_url().'homeCtrl/sendMessage'; ?>' autocomplete="off">
				<div class='modal-content' style='background-color:#313436;'>
				<div class='modal-header'>
					<h5 class='modal-title' id='exampleModalLabel' style='color:#e69627; margin-top:1%;'>Send to :</h5>
					<div class="autocomplete" style="width:300px;">
						<input id="mycontacts" type="text" name="receiver" placeholder="Username" required>
					</div>
					<img  class="closebtn" src="http://localhost/Learnzia/assets/images/icon/Close.png"
					style="margin-top:2%;" type="button" data-dismiss='modal' aria-label='Close'>
				</div>
					<div class='modal-body'>
						<textarea rows="5" cols="60" name="message" style="background:#212121; border-width: 0 0 3px; 
							border-bottom: 3.5px solid #F1C40F; color:whitesmoke; border-radius:5px;" required>Enter text here...</textarea><br>
					</div>
					<div class='modal-footer'>
						<button type='submit' style='color:whitesmoke; background-color:#e69627; border:none;' 
							class='btn btn-primary'>Send</button>
					</div>
			</form>
			</div>
		</div>
		</div>

		<!-- Modal Add Discussion -->
		<div class='modal fade' id='discModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
		<div class='modal-dialog' role='document'>
			<form method='POST' action='<?php echo site_url().'homeCtrl/sendDisc'; ?>' autocomplete="off" enctype="multipart/form-data">
				<div class='modal-content' style='background-color:#313436;'>
				<div class='modal-header'>
					<h5 class='modal-title' id='exampleModalLabel' style='color:#e69627; margin-top:1%;'>Category :</h5>
					<div class="form-group mb-3">
					<select class="form-control" name="category" style="width:300px;">
						<option value='math'>Math</option>
						<option value='coding'>Coding</option>
						<option value='design'>Design</option>
						<option value='science'>Science</option>
						<option value='history'>History</option>
					</select></div>
					<img  class="closebtn" src="http://localhost/Learnzia/assets/images/icon/Close.png"
					style="margin-top:2%;" type="button" data-dismiss='modal' aria-label='Close'>
				</div>
					<div class='modal-body'>
						<div class="form-group mb-3">
							<label class="label" for="text" style="color:#F1C40F;">Subject</label>
							<input type="text" class="form-control" placeholder="Subject" name="subject" required>
						</div>
						<div class="form-group mb-3">
							<label class="label" for="text" style="color:#F1C40F;">Question</label>
							<textarea rows="5" cols="60" name="question" class='form-control' required>Enter text here...</textarea>
						</div>
						<!-- Rounded switch -->
						<label class="switch" style='float:left; margin-right:2%;'>
						<input type="checkbox" name='imageSwitch'>
							<span class="slider round" data-toggle="collapse" data-target="#uploadDiscImg"></span>
						</label>
						<p style="color:whitesmoke;">Upload discussion with image</p>
						<!--Upload file.-->
						<div class="collapse" id="uploadDiscImg">
							<div class="form-group mb-3">
							<div class="container" style=''>
								<label class="label" for="text" style="color:#F1C40F;">Add Discussion Image</label>
								<div class="input-group mb-3" style="background-color:#212121; border-width: 0 0 3px; border-bottom: 3.5px solid #F1C40F; 
									border-radius:5px;">
									<div class="input-group-prepend">
										<span class="input-group-text">jpg</span>
									</div>
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="uploadImage" name="uploadImage" accept='image/*'>
										<label class="custom-file-label text-left" for="uploadImage">file size max 2 mb</label>
									</div>
								</div>
							</div>
							</div>
						</div>
					</div>
					<div class='modal-footer'>
						<button type='submit' style='color:whitesmoke; background-color:#e69627; border:none;' 
							class='btn btn-primary'>Send</button>
					</div>
				</div>
			</form>
			</div>
		</div>
		</div>

		<!-- Modal Message-->
		<?php
			$count = 0; 
			foreach($contacts as $friend){
				if (($friend['id_user_2'] != $this->session->userdata('userTrack'))&&($friend['id_user_1'] == $this->session->userdata('userTrack'))){
					echo "
					<div class='modal fade' id='message".$friend['id_user_2']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
					<div class='modal-dialog' role='document' style='overflow-y: initial;'>
						<form method='POST' action='homeCtrl/sendRMessage' enctype='multipart/form-data'>
						<div class='modal-content' style='background-color:#313436;'>
						<div class='modal-header'>
							<div class='container'>
								<img src='http://localhost/Learnzia/assets/uploads/user_".$friend['id_user_2'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; 
								float:left; margin-right:2%;'>
								<h5 style='font-size:20px;'>".$friend['id_user_2']."</h5>";
								//User login status
								foreach($listUser as $user){
								if(($user['status'] == 'online')&&($user['username']==$friend['id_user_2'])){echo "<p style='font-size:14px; color:#00a13e;'>".$user['status']."</p>";} 
									else if(($user['status'] == 'offline')&&($user['username']==$friend['id_user_2'])) {
									echo "<p style='font-size:14px; color:#F14D0F;'>".$user['status']."</p>";
								}}
							echo "</div>
							<img type='button' data-dismiss='modal' aria-label='Close' src='http://localhost/Learnzia/assets/images/icon/Close.png'>	
						</div>
						<div class='imessage' style='max-height: calc(80vh - 160px); max-width:auto; overflow-y: auto; height:800px; min-width:100%;'>";
							foreach($dataMessage as $data2){
								if(($data2['sender']  == $friend['id_user_2'])&&($data2['receiver']  == $this->session->userdata('userTrack'))){
									echo "<p class='from-them'>";
										if($data2['imageURL'] != 'null'){
											echo"<img src='http://localhost/Learnzia/assets/uploads/message/message_".$data2['imageURL'].".jpg' alt='Card image cap' style='width:200px; height:200px;
											margin:1%; border-radius:6px;'>";
										}
										echo "".$data2['message']."<br><a style='color:#e69627; font-size:13.5px; font-style:italic;'>~ on ".$data2['datetime']."</a>
										</p>";
									$count++;
								} else if(($data2['receiver']  == $friend['id_user_2']) &&($data2['sender']  == $this->session->userdata('userTrack'))){
									echo "<p class='from-me'>";
										if($data2['imageURL'] != 'null'){
											echo"<img src='http://localhost/Learnzia/assets/uploads/message/message_".$data2['imageURL'].".jpg' alt='Card image cap' style='width:200px; height:200px;
											margin:1%; border-radius:6px;'>";
										}
										echo "".$data2['message']."<br><a style='color:#212121; font-size:13.5px; font-style:italic;'>~ on ".$data2['datetime']."</a>
										</p>";
										$count++;
								} else {
									//do nothing
								}
							}
							if ($count == 0){echo"<h5 style='font-size:15px; font-style:italic; float:left;'>Chat is empty...</h5>";} else {
								echo"<h5 style='font-size:15px; font-style:italic; float:left; margin-bottom:3%;'>Showing ".$count." message... </h5>"; //I dont know this is important or not
							}
						echo "</div>
						<div class='modal-footer'>
								<div class='container'>
								<input type='text' class='form-control' name='receiver' value='".$friend['id_user_2']."' hidden>
								<button class='btn btn-primary' style='color:whitesmoke; background-color:#00a13e; float:right; margin-right:-5%; border:none;' type='submit'>Send</button>
								<input class='form-control' type='text' placeholder='Type your message here...' style='width:80%; float:right; margin-right:1%;' name='replyMessage'>
								<label class='switch' style='float:left; margin-left:-5%;'>
									<input type='checkbox' name='imageSwitchMsg'>
										<span class='slider round' type='button' data-toggle='collapse' data-target='#collapseImageMain'></span>
									</label>
								<br><a style='color:whitesmoke; float:left; margin-left:-9%;'>Image</a>
								<div class='collapse' id='collapseImageMain'>
									<div class='container-fluid' style='width:90%; float:right; margin-top:2%; margin-right:-9%;'>
										<div class='input-group mb-3' style='background-color:#212121; border-width: 0 0 3px; border-bottom: 3.5px solid #F1C40F; 
											border-radius:5px;'>
											<div class='input-group-prepend'>
												<span class='input-group-text'>jpg</span>
											</div>
											<div class='custom-file'>
												<input type='file' class='custom-file-input' id='uploadImage' name='uploadImageMsg' accept='image/*'>
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
					</div>";
					//second condition
					} else if (($friend['id_user_1'] != $this->session->userdata('userTrack'))&&($friend['id_user_2'] == $this->session->userdata('userTrack'))){
						echo "
					<div class='modal fade' id='message".$friend['id_user_1']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
					<div class='modal-dialog' role='document' style='overflow-y: initial;'>
						<form method='POST' action='homeCtrl/sendRMessage' enctype='multipart/form-data'>
						<div class='modal-content' style='background-color:#313436;'>
						<div class='modal-header'>
							<div class='container'>
								<img src='http://localhost/Learnzia/assets/uploads/user_".$friend['id_user_1'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; 
								float:left; margin-right:2%;'>
								<h5 style='font-size:20px;'>".$friend['id_user_1']."</h5>";
								//User login status
								foreach($listUser as $user){
								if(($user['status'] == 'online')&&($user['username']==$friend['id_user_1'])){echo "<p style='font-size:14px; color:#00a13e;'>".$user['status']."</p>";} 
									else if(($user['status'] == 'offline')&&($user['username']==$friend['id_user_1'])) {
									echo "<p style='font-size:14px; color:#F14D0F;'>".$user['status']."</p>";
								}}
							echo "</div>
							<img type='button' data-dismiss='modal' aria-label='Close' src='http://localhost/Learnzia/assets/images/icon/Close.png'>	
						</div>
						<div class='imessage' style='max-height: calc(80vh - 160px); max-width:auto; overflow-y: auto; height:800px; min-width:100%;'>";
							foreach($dataMessage as $data2){
								if(($data2['sender']  == $friend['id_user_1'])&&($data2['receiver']  == $this->session->userdata('userTrack'))){
									echo "<p class='from-them'>";
										if($data2['imageURL'] != 'null'){
											echo"<img src='http://localhost/Learnzia/assets/uploads/message/message_".$data2['imageURL'].".jpg' alt='Card image cap' style='width:200px; height:200px;
											margin:1%; border-radius:6px;'>";
										}
										echo "".$data2['message']."<br><a style='color:#e69627; font-size:13.5px; font-style:italic;'>~ on ".$data2['datetime']."</a>
										</p>";
									$count++;
								} else if(($data2['receiver']  == $friend['id_user_1']) &&($data2['sender']  == $this->session->userdata('userTrack'))){
									echo "<p class='from-me'>";
										if($data2['imageURL'] != 'null'){
											echo"<img src='http://localhost/Learnzia/assets/uploads/message/message_".$data2['imageURL'].".jpg' alt='Card image cap' style='width:200px; height:200px;
											margin:1%; border-radius:6px;'>";
										}
										echo "".$data2['message']."<br><a style='color:#212121; font-size:13.5px; font-style:italic;'>~ on ".$data2['datetime']."</a>
										</p>";
									$count++;
								} else {
									//do nothing
								}
							}
							if ($count == 0){echo"<h5 style='font-size:15px; font-style:italic; float:left;'>Chat is empty...</h5>";} else {
								echo"<h5 style='font-size:15px; font-style:italic; float:left; margin-bottom:3%;'>Showing ".$count." message... </h5>"; //I dont know this is important or not
							}
						echo "</div>
						<div class='modal-footer'>
								<div class='container'>
								<input type='text' class='form-control' name='receiver' value='".$friend['id_user_1']."' hidden>
								<button class='btn btn-primary' style='color:whitesmoke; background-color:#00a13e; float:right; margin-right:-5%; border:none;' type='submit'>Send</button>
								<input class='form-control' type='text' placeholder='Type your message here...' style='width:80%; float:right; margin-right:1%;' name='replyMessage'>
								<label class='switch' style='float:left; margin-left:-5%;'>
									<input type='checkbox' name='imageSwitchMsg'>
										<span class='slider round' type='button' data-toggle='collapse' data-target='#collapseImageMain'></span>
									</label>
								<br><a style='color:whitesmoke; float:left; margin-left:-9%;'>Image</a>
								<div class='collapse' id='collapseImageMain'>
									<div class='container-fluid' style='width:90%; float:right; margin-top:2%; margin-right:-9%;'>
										<div class='input-group mb-3' style='background-color:#212121; border-width: 0 0 3px; border-bottom: 3.5px solid #F1C40F; 
											border-radius:5px;'>
											<div class='input-group-prepend'>
												<span class='input-group-text'>jpg</span>
											</div>
											<div class='custom-file'>
												<input type='file' class='custom-file-input' id='uploadImage' name='uploadImageMsg' accept='image/*'>
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
					</div>";
				}
				$count = 0;
			}
		?>

		<!-- Zoom discussion image Modal -->
		<?php 
			foreach($dataDiscussion as $data){
				if ($data['image'] == 'yes'){
				echo"<div class='modal fade' id='zoom".$data['id_discussion']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
				<div class='modal-dialog modal-xl' role='document'>
					<div class='modal-content' style='background-color:#313436;'>
					<div class='modal-header'>
						<p style='color:whitesmoke;'>".$data['question']."</p>
						<img type='button' data-dismiss='modal' aria-label='Close' src='http://localhost/Learnzia/assets/images/icon/Close.png'>
					</div>
					<div class='modal-footer'>
						<img src='http://localhost/Learnzia/assets/uploads/discussion_".$data['imageURL'].".jpg' style='border-radius:6px; width:100%; height:100%; cursor:pointer' 
							alt='' data-toggle='modal' data-target='#zoom".$data['id_discussion']."'>
					</div>			
					</div>
				</div>
				</div>";	
				}
			}
		?>

		<?php 
			foreach($dataReply as $data){
				if ($data['image'] == 'yes'){
					echo"<div class='modal fade' id='zoom".$data['imageURL']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
					<div class='modal-dialog modal-xl' role='document'>
						<div class='modal-content' style='background-color:#313436;'>
						<div class='modal-header'>
							<p style='color:whitesmoke;'>".$data['replytext']."</p>
							<img id='icon' type='button' data-dismiss='modal' aria-label='Close' src='http://localhost/Learnzia/assets/images/icon/Close.png'>
						</div>
						<div class='modal-footer'>
							<img id='icon' src='http://localhost/Learnzia/assets/uploads/reply/reply_".$data['imageURL'].".jpg' style='border-radius:6px; width:100%; height:100%; cursor:pointer' 
								alt='' data-toggle='modal' data-target='#zoom".$data['imageURL']."'>
						</div>			
						</div>
					</div>
					</div>";	
				}
			}
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

		<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<!--Ajax for json-->
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>  
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

		<script>
			//JQuery Upload
			$('.custom-file-input').on('change', function() { 
				let fileName = $(this).val().split('\\').pop(); 
				$(this).next('.custom-file-label').addClass("selected").html(fileName); 
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
