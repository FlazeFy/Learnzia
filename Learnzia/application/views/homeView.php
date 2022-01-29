<!--Leonardho R. Sitanggang
    1302194041  SE-43-03
-->
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
		<link rel="stylesheet" type="text/css" href="http://localhost/Learnzia/assets/css/main_style.css"/>

		<style>
			body {background-color: #313436;}
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
		</style>
    </head>
    <body>
		<!--Main Navbar-->
		<nav class="navbar navbar-expand-lg" style="background-color:#212121;">
		<a class="nav-link" onclick="openNav()" type="button">
		<img src="http://localhost/Learnzia/assets/images/icon/Message.png">Contact</a>
		<!--Collapse Side Navbar-->
			<div id="mySidebar" class="sidebar">
				<img  onclick="closeNav()" href="javascript:void(0)" class="closebtn" src="http://localhost/Learnzia/assets/images/icon/Close.png"
					style="top:2%;" type="button">	
				<!--Searchbox-->
				<form class="form-inline my-2 my-lg-0" action="">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" style="margin-left:5%;" name="search" aria-label="Search">
					<button class="btn btn-primary" style="color:whitesmoke; background-color:#00a13e; border:none;" type="submit">Search</button>
					<img  onclick="" href="" src="http://localhost/Learnzia/assets/images/icon/Add.png" style="margin-left:2%;" type="button"
						data-toggle="modal" data-target="#messageModal">	
				</form><hr>
				<div class="container-fluid" width="200" style="">
					<!--Message list-->
					<?php 
						$count = 0;
						foreach($contacts as $data){
						if (($data['username2'] != $this->session->userdata('userTrack'))&&($data['username1'] == $this->session->userdata('userTrack'))){
						echo "
						<div class='card' type='button' style='border-bottom: 3.5px solid #F1C40F; background-color:#212121;' 
							data-toggle='modal' data-target='#message".$data['username2']."'>
							<div class='card-header' style='width: 25rem; height:5rem;'>
								<img src='http://localhost/Learnzia/assets/uploads/user_".$data['username2'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:50px; height:50px; float:left;
									margin-right:5%'>
								<h5 style='font-size:15.5px; color:#F1C40F;'>".$data['username2']."</h5>";
								//User login status
								foreach($listUser as $user){
								if(($user['status'] == 'online')&&($user['username']==$data['username2'])){echo "<p style='font-size:14px; color:#00a13e;'>".$user['status']."</p>";} 
									else if(($user['status'] == 'offline')&&($user['username']==$data['username2'])) {
									echo "<p style='font-size:14px; color:#F14D0F;'>".$user['status']."</p>";
								}}
							echo "</div>
						</div><br>"; $count++;
						} else if (($data['username1'] != $this->session->userdata('userTrack'))&&($data['username2'] == $this->session->userdata('userTrack'))){
						echo "
						<div class='card' type='button' style='border-bottom: 3.5px solid #F1C40F; background-color:#212121;' 
							data-toggle='modal' data-target='#message".$data['username1']."'>
							<div class='card-header' style='width: 25rem; height:5rem;'>
								<img src='http://localhost/Learnzia/assets/uploads/user_".$data['username1'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:50px; height:50px; float:left;
									margin-right:5%;'>
								<h5 style='font-size:15.5px; color:#F1C40F;'>".$data['username1']."</h5>";
								//User login status
								foreach($listUser as $user){
								if(($user['status'] == 'online')&&($user['username']==$data['username1'])){echo "<p style='font-size:14px; color:#00a13e;'>".$user['status']."</p>";} 
									else if(($user['status'] == 'offline')&&($user['username']==$data['username1'])) {
									echo "<p style='font-size:14px; color:#F14D0F;'>".$user['status']."</p>";
								}}
							echo "</div>
						</div><br>"; $count++;
						} else if (($data['username1'] != $this->session->userdata('userTrack'))&&($data['username2'] != $this->session->userdata('userTrack'))){
						}
						
						}
						if ($count == 0){
							echo "<div class='container' style='margin-top:2%;'>
								<img src='http://localhost/Learnzia/assets/images/Friends.png' alt='Friends.png' style='display: block;
									margin-left: auto; margin-right: auto; width: 30%; height: 30%;'>
								<h5 style='font-size:15.5px; color:#F1C40F; text-align:center;'>You dont have a friend yet</h5>
							</div>";
						}
					?>
					
				</div>
			</div>
	
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
			aria-expanded="false" aria-label="Toggle navigation" style="color:#F1C40F;">
			<a>Show</a>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Global</a>
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
		<!--Control Room.-->
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
				if (($data['username2'] != $this->session->userdata('userTrack'))&&($data['username1'] == $this->session->userdata('userTrack'))
					&&($data['username2'] == $disFriend['sender'])){
					echo "
						<button class='btn btn-primary' data-toggle='collapse' data-target='#disFriend".$disFriend['id_discussion']."' aria-expanded='false' 
						aria-controls='multiCollapseExample2' style='background-color: #212121; border:none; margin-bottom:1%; max-width:120px; max-height:120px;'>
							<img src='http://localhost/Learnzia/assets/uploads/user_".$data['username2'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' 
								style='width:60px; height:60px; border: 2.5px solid #F1C40F;'>
							<h5 style='font-size:14px;'>".$disFriend['subject']."</h5>
						</button>
					";
					$disFriendCount++;
				} else if (($data['username1'] != $this->session->userdata('userTrack'))&&($data['username2'] == $this->session->userdata('userTrack'))
					&&($data['username1'] == $disFriend['sender'])){
					echo "
						<button class='btn btn-primary' data-toggle='collapse' data-target='#disFriend".$disFriend['id_discussion']."' aria-expanded='false' 
						aria-controls='multiCollapseExample2' style='background-color: #212121; border:none; margin-bottom:1%; max-width:120px; max-height:120px;'>
							<img src='http://localhost/Learnzia/assets/uploads/user_".$data['username1'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' 
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
				margin-left: auto; margin-right: auto; width: 10%; height: 10%; margin-top:-10%;'>
				<h5 style='font-size:14px; font-style:italic; color:#F1C40F; margin-bottom:1%;
				text-align:center;'>There is no discussion from your friend in this week...</h5>";}
		?>
			<div class="row">
				<?php
				foreach($contacts as $data){
				foreach($dataDiscussion as $disFriend){
					if (($data['username2'] != $this->session->userdata('userTrack'))&&($data['username1'] == $this->session->userdata('userTrack'))
						&&($data['username2'] == $disFriend['sender'])){
						echo"
						<div class='col-md-12'>
							<div class='collapse' id='disFriend".$disFriend['id_discussion']."' data-parent='#accordionF'>
								<div class='container'>";
								$i = 1; 
								$count = 0;	
									echo"<div id='accordion2'>
										<div class='card' style='border-radius:5px; border-bottom: 3.5px solid #F1C40F; background-color:#525252;'>
										<div class='card-header' id='headingOne' style='border-bottom: 1px solid #858585;'>
											<img src='assets/uploads/user_".$disFriend['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; margin-top: -1%; 
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
												<img src='assets/Images/icon/View.png' style='width:25px; height:25px; float:right; margin-top:-5px; padding-left:5px;'>
											<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$disFriend['up']."</h6>
												<img src='assets/Images/icon/Up.png' style='width:25px; height:22px; float:right; margin-top:-4px; padding-left:5px;'>
											<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$disFriend['comment']."</h6>
												<img src='assets/Images/icon/Comment.png' style='width:25px; height:20px; float:right; margin-top:-2px; padding-left:5px;'>
											<h5 style='font-size:15px; float:left; text-decoration:underline;' type='button' data-toggle='collapse' data-target='#collapse_disFriend".$i."' 
											aria-expanded='true' aria-controls='collapseOne''>See Reply
												<img src='assets/Images/icon/Down.png' style='width:25px; height:20px; float:left; padding-left:3px;'></h5>
										</div>
										<!--Extend-->
										<div id='collapse_disFriend".$i."' class='collapse' aria-labelledby='headingOne' data-parent='#accordion2'>
											<div class='card-body' style='background-color:#404040;'>";
												foreach ($dataReply as $data2){
												if ($data2['id_discussion'] == $disFriend['id_discussion']){
												echo"<div class='container'>
													<img src='assets/uploads/user_".$data2['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; 
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
															<span class='slider round' type='button' data-toggle='collapse' data-target='#collapseImage'></span>
														</label>
														<a style='color:whitesmoke; float:left;'>Image</a>
														<button class='btn btn-primary' style='color:whitesmoke; background-color:#00a13e; float:right; border:none;' type='submit'>Send</button>
														<input class='form-control' type='text' placeholder='Type your reply here...' style='width:40%; float:right; margin-right:1%;' name='replytext'>
														<div class='collapse' id='collapseImage'>
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
					} else if (($data['username1'] != $this->session->userdata('userTrack'))&&($data['username2'] == $this->session->userdata('userTrack'))
					&&($data['username1'] == $disFriend['sender'])){
					echo"
					<div class='col-md-12'>
						<div class='collapse' id='disFriend".$disFriend['id_discussion']."' data-parent='#accordionF'>
							<div class='container'>";
							$i = 1; 
							$count = 0;	
								echo"<div id='accordion2'>
									<div class='card' style='border-radius:5px; border-bottom: 3.5px solid #F1C40F; background-color:#525252;'>
									<div class='card-header' id='headingOne' style='border-bottom: 1px solid #858585;'>
										<img src='assets/uploads/user_".$disFriend['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; margin-top: -1%; 
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
											<img src='assets/Images/icon/View.png' style='width:25px; height:25px; float:right; margin-top:-5px; padding-left:5px;'>
										<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$disFriend['up']."</h6>
											<img src='assets/Images/icon/Up.png' style='width:25px; height:22px; float:right; margin-top:-4px; padding-left:5px;'>
										<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$disFriend['comment']."</h6>
											<img src='assets/Images/icon/Comment.png' style='width:25px; height:20px; float:right; margin-top:-2px; padding-left:5px;'>
										<h5 style='font-size:15px; float:left; text-decoration:underline;' type='button' data-toggle='collapse' data-target='#collapse_disFriend".$i."' 
										aria-expanded='true' aria-controls='collapseOne''>See Reply
											<img src='assets/Images/icon/Down.png' style='width:25px; height:20px; float:left; padding-left:3px;'></h5>
									</div>
									<!--Extend-->
									<div id='collapse_disFriend".$i."' class='collapse' aria-labelledby='headingOne' data-parent='#accordion2'>
										<div class='card-body' style='background-color:#404040;'>";
											foreach ($dataReply as $data2){
											if ($data2['id_discussion'] == $disFriend['id_discussion']){
											echo"<div class='container'>
												<img src='assets/uploads/user_".$data2['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; 
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
														<span class='slider round' type='button' data-toggle='collapse' data-target='#collapseImage'></span>
													</label>
													<a style='color:whitesmoke; float:left;'>Image</a>
													<button class='btn btn-primary' style='color:whitesmoke; background-color:#00a13e; float:right; border:none;' type='submit'>Send</button>
													<input class='form-control' type='text' placeholder='Type your reply here...' style='width:40%; float:right; margin-right:1%;' name='replytext'>
													<div class='collapse' id='collapseImage'>
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
											<img src='assets/uploads/user_".$data['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; margin-top: -1%; 
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
												<img src='assets/Images/icon/View.png' style='width:25px; height:25px; float:right; margin-top:-5px; padding-left:5px;'>
											<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$data['up']."</h6>
												<img src='assets/Images/icon/Up.png' style='width:25px; height:22px; float:right; margin-top:-4px; padding-left:5px;'>
											<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$data['comment']."</h6>
												<img src='assets/Images/icon/Comment.png' style='width:25px; height:20px; float:right; margin-top:-2px; padding-left:5px;'>
											<h5 style='font-size:15px; float:left; text-decoration:underline;' type='button' data-toggle='collapse' data-target='#collapse".$i."' 
											aria-expanded='true' aria-controls='collapseOne''>See Reply
												<img src='assets/Images/icon/Down.png' style='width:25px; height:20px; float:left; padding-left:3px;'></h5>
										</div>
										<!--Extend-->
										<div id='collapse".$i."' class='collapse' aria-labelledby='headingOne' data-parent='#accordion2'>
											<div class='card-body' style='background-color:#404040;'>";
												foreach ($dataReply as $data2){
												if ($data2['id_discussion'] == $data['id_discussion']){
												echo"<div class='container'>
													<img src='assets/uploads/user_".$data2['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; 
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
															<span class='slider round' type='button' data-toggle='collapse' data-target='#collapseImage'></span>
														</label>
														<a style='color:whitesmoke; float:left;'>Image</a>
														<button class='btn btn-primary' style='color:whitesmoke; background-color:#00a13e; float:right; border:none;' type='submit'>Send</button>
														<input class='form-control' type='text' placeholder='Type your reply here...' style='width:40%; float:right; margin-right:1%;' name='replytext'>
														<div class='collapse' id='collapseImage'>
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
											<img src='assets/uploads/user_".$data['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; margin-top: -1%; 
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
												<img src='assets/Images/icon/View.png' style='width:25px; height:25px; float:right; margin-top:-5px; padding-left:5px;'>
											<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$data['up']."</h6>
												<img src='assets/Images/icon/Up.png' style='width:25px; height:22px; float:right; margin-top:-4px; padding-left:5px;'>
											<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$data['comment']."</h6>
												<img src='assets/Images/icon/Comment.png' style='width:25px; height:20px; float:right; margin-top:-2px; padding-left:5px;'>
											<h5 style='font-size:15px; float:left; text-decoration:underline;' type='button' data-toggle='collapse' data-target='#collapse".$i."' 
											aria-expanded='true' aria-controls='collapseOne''>See Reply
												<img src='assets/Images/icon/Down.png' style='width:25px; height:20px; float:left; padding-left:3px;'></h5>
										</div>
										<!--Extend-->
										<div id='collapse".$i."' class='collapse' aria-labelledby='headingOne' data-parent='#accordion2'>
											<div class='card-body' style='background-color:#404040;'>";
												foreach ($dataReply as $data2){
												if ($data2['id_discussion'] == $data['id_discussion']){
												echo"<div class='container'>
													<img src='assets/uploads/user_".$data2['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; 
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
															<span class='slider round' type='button' data-toggle='collapse' data-target='#collapseImage'></span>
														</label>
														<a style='color:whitesmoke; float:left;'>Image</a>
														<button class='btn btn-primary' style='color:whitesmoke; background-color:#00a13e; float:right; border:none;' type='submit'>Send</button>
														<input class='form-control' type='text' placeholder='Type your reply here...' style='width:40%; float:right; margin-right:1%;' name='replytext'>
														<div class='collapse' id='collapseImage'>
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
					<img src='assets/Images/icon/Instagram.png' style='width:25px; height:22px;'><a href="#!"> Intagram</a>
					</p>
					<p>
					<img src='assets/Images/icon/Facebook.png' style='width:25px; height:22px;'><a href="#!"> Facebook</a>
					</p>
					<p>
					<img src='assets/Images/icon/Twitter.png' style='width:25px; height:22px;'><a href="#!"> Twitter</a>
					</p>
				</div>

				<hr class="w-100 clearfix d-md-none">
				<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
				<h5 class="text-uppercase font-weight-bold">Contact us</h5>
					<p>
					<img src='assets/Images/icon/Profile.png' style='width:25px; height:22px;'> Leonardho R Sitanggang </p>
					<p>
					<img src='assets/Images/icon/Location.png' style='width:25px; height:22px;'> Bandung, Indonesia </p>
					<p>
					<img src='assets/Images/icon/Email.png' style='width:25px; height:22px;'> learnzia@gmail.com </p>
					<p>
					<img src='assets/Images/icon/Call.png' style='width:25px; height:22px;'> + 62 811 4882 001 </p>
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
						<input id="myInput" type="text" name="receiver" placeholder="Username" required>
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
			</form>
			</div>
		</div>
		</div>

		<!-- Modal Message-->
		<?php
			$count = 0; 
			foreach($contacts as $friend){
			if (($friend['username2'] != $this->session->userdata('userTrack'))&&($friend['username1'] == $this->session->userdata('userTrack'))){
			echo "
		<div class='modal fade' id='message".$friend['username2']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
		<div class='modal-dialog' role='document' style='overflow-y: initial;'>
			<form method='POST' action='homeCtrl/sendRMessage'>
			<div class='modal-content' style='background-color:#313436;'>
			<div class='modal-header'>
				<div class='container'>
					<img src='assets/uploads/user_".$friend['username2'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; 
					float:left; margin-right:2%;'>
					<h5 style='font-size:20px;'>".$friend['username2']."</h5>";
					//User login status
					foreach($listUser as $user){
					if(($user['status'] == 'online')&&($user['username']==$friend['username2'])){echo "<p style='font-size:14px; color:#00a13e;'>".$user['status']."</p>";} 
						else if(($user['status'] == 'offline')&&($user['username']==$friend['username2'])) {
						echo "<p style='font-size:14px; color:#F14D0F;'>".$user['status']."</p>";
					}}
				echo "</div>
				<img type='button' data-dismiss='modal' aria-label='Close' src='http://localhost/Learnzia/assets/images/icon/Close.png'>	
			</div>
			<div class='modal-body' style='max-height: calc(80vh - 160px); overflow-y: auto;'>";
				foreach($dataMessage as $data2){
					if(($data2['sender']  == $friend['username2'])&&($data2['receiver']  == $this->session->userdata('userTrack'))){
						echo "<div class='card' style='width:80%; float:left; border-radius:5px; border-bottom: 3.5px solid #F1C40F; 
						margin-bottom:4%; background-color:#525252;'>
							<div class='card-header'>
								<p class='card-text' style='font-size:11px; color:whitesmoke; font-style:italic;'>".$data2['datetime']."</p>
							</div>
							<div class='card-body'>
								<p class='card-text' style='font-size:15px; color:#F1C40F;'>".$data2['message']."</p>
							</div>
							</div>";
						$count++;
					} else if(($data2['receiver']  == $friend['username2']) &&($data2['sender']  == $this->session->userdata('userTrack'))){
						echo "<div class='card' style='width:80%; float:right; border-radius:5px; border-bottom: 3.5px solid #F1C40F; 
						margin-bottom:4%; background-color:#232323;'>
							<div class='card-header'>
								<p class='card-text' style='font-size:11px; color:whitesmoke; font-style:italic;'>".$data2['datetime']."</p>
							</div>
							<div class='card-body'>
								<p class='card-text' style='font-size:15px; color:#F1C40F;'>".$data2['message']."</p>
						  	</div>
							</div>";
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
					<input type='text' class='form-control' name='receiver' value='".$friend['username2']."' hidden>
					<button class='btn btn-primary' style='color:whitesmoke; background-color:#00a13e; float:right; border:none;' type='submit'>Send</button>
					<input class='form-control' type='text' placeholder='Type your message here...' style='width:80%; float:right; margin-right:1%;' name='replyMessage'>
					</div>
				</form>
			</div>
			</div>
		</div>
		</div>";
		//second condition
		} else if (($friend['username1'] != $this->session->userdata('userTrack'))&&($friend['username2'] == $this->session->userdata('userTrack'))){
			echo "
		<div class='modal fade' id='message".$friend['username1']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
		<div class='modal-dialog' role='document' style='overflow-y: initial;'>
			<form method='POST' action='homeCtrl/sendRMessage'>
			<div class='modal-content' style='background-color:#313436;'>
			<div class='modal-header'>
				<div class='container'>
					<img src='assets/uploads/user_".$friend['username1'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; 
					float:left; margin-right:2%;'>
					<h5 style='font-size:20px;'>".$friend['username1']."</h5>";
					//User login status
					foreach($listUser as $user){
					if(($user['status'] == 'online')&&($user['username']==$friend['username1'])){echo "<p style='font-size:14px; color:#00a13e;'>".$user['status']."</p>";} 
						else if(($user['status'] == 'offline')&&($user['username']==$friend['username1'])) {
						echo "<p style='font-size:14px; color:#F14D0F;'>".$user['status']."</p>";
					}}
				echo "</div>
				<img type='button' data-dismiss='modal' aria-label='Close' src='http://localhost/Learnzia/assets/images/icon/Close.png'>	
			</div>
			<div class='modal-body' style='max-height: calc(80vh - 160px); overflow-y: auto;'>";
				foreach($dataMessage as $data2){
					if(($data2['sender']  == $friend['username1'])&&($data2['receiver']  == $this->session->userdata('userTrack'))){
						echo "<div class='card' style='width:80%; float:left; border-radius:5px; border-bottom: 3.5px solid #F1C40F; 
						margin-bottom:4%; background-color:#525252;'>
							<div class='card-header'>
								<p class='card-text' style='font-size:11px; color:whitesmoke; font-style:italic;'>".$data2['datetime']."</p>
							</div>
							<div class='card-body'>
								<p class='card-text' style='font-size:15px; color:#F1C40F;'>".$data2['message']."</p>
							</div>
							</div>";
						$count++;
					} else if(($data2['receiver']  == $friend['username1']) &&($data2['sender']  == $this->session->userdata('userTrack'))){
						echo "<div class='card' style='width:80%; float:right; border-radius:5px; border-bottom: 3.5px solid #F1C40F; 
						margin-bottom:4%; background-color:#232323;'>
							<div class='card-header'>
								<p class='card-text' style='font-size:11px; color:whitesmoke; font-style:italic;'>".$data2['datetime']."</p>
							</div>
							<div class='card-body'>
								<p class='card-text' style='font-size:15px; color:#F1C40F;'>".$data2['message']."</p>
						  	</div>
							</div>";
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
					<input type='text' class='form-control' name='receiver' value='".$friend['username1']."' hidden>
					<button class='btn btn-primary' style='color:whitesmoke; background-color:#00a13e; float:right; border:none;' type='submit'>Send</button>
					<input class='form-control' type='text' placeholder='Type your message here...' style='width:80%; float:right; margin-right:1%;' name='replyMessage'>
					</div>
				</form>
			</div>
			</div>
		</div>
		</div>";
		}
		$count = 0;
		}?>

		<!-- Zoom discussion image Modal -->
		<?php foreach($dataDiscussion as $data){
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
		}}?>

		<?php foreach($dataReply as $data){
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
		}}?>

		<script>
			//Side navbar private message
			/* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
			function openNav() {
				document.getElementById("mySidebar").style.width = "360px";
				document.getElementById("main").style.marginLeft = "360px";
			}

			/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
			function closeNav() {
				document.getElementById("mySidebar").style.width = "0";
				document.getElementById("main").style.marginLeft = "0";
			}
		</script>

		<script>
		function autocomplete(inp, arr) {
		/*the autocomplete function takes two arguments,
		the text field element and an array of possible autocompleted values:*/
		var currentFocus;
		/*execute a function when someone writes in the text field:*/
		inp.addEventListener("input", function(e) {
			var a, b, i, val = this.value;
			/*close any already open lists of autocompleted values*/
			closeAllLists();
			if (!val) { return false;}
			currentFocus = -1;
			/*create a DIV element that will contain the items (values):*/
			a = document.createElement("DIV");
			a.setAttribute("id", this.id + "autocomplete-list");
			a.setAttribute("class", "autocomplete-items");
			/*append the DIV element as a child of the autocomplete container:*/
			this.parentNode.appendChild(a);
			/*for each item in the array...*/
			for (i = 0; i < arr.length; i++) {
				/*check if the item starts with the same letters as the text field value:*/
				if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
				/*create a DIV element for each matching element:*/
				b = document.createElement("DIV");
				/*make the matching letters bold:*/
				b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
				b.innerHTML += arr[i].substr(val.length);
				/*insert a input field that will hold the current array item's value:*/
				b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
				/*execute a function when someone clicks on the item value (DIV element):*/
				b.addEventListener("click", function(e) {
					/*insert the value for the autocomplete text field:*/
					inp.value = this.getElementsByTagName("input")[0].value;
					/*close the list of autocompleted values,
					(or any other open lists of autocompleted values:*/
					closeAllLists();
				});
				a.appendChild(b);
				}
			}
		});
		/*execute a function presses a key on the keyboard:*/
		inp.addEventListener("keydown", function(e) {
			var x = document.getElementById(this.id + "autocomplete-list");
			if (x) x = x.getElementsByTagName("div");
			if (e.keyCode == 40) {
				/*If the arrow DOWN key is pressed,
				increase the currentFocus variable:*/
				currentFocus++;
				/*and and make the current item more visible:*/
				addActive(x);
			} else if (e.keyCode == 38) { //up
				/*If the arrow UP key is pressed,
				decrease the currentFocus variable:*/
				currentFocus--;
				/*and and make the current item more visible:*/
				addActive(x);
			} else if (e.keyCode == 13) {
				/*If the ENTER key is pressed, prevent the form from being submitted,*/
				e.preventDefault();
				if (currentFocus > -1) {
				/*and simulate a click on the "active" item:*/
				if (x) x[currentFocus].click();
				}
			}
		});
		function addActive(x) {
			/*a function to classify an item as "active":*/
			if (!x) return false;
			/*start by removing the "active" class on all items:*/
			removeActive(x);
			if (currentFocus >= x.length) currentFocus = 0;
			if (currentFocus < 0) currentFocus = (x.length - 1);
			/*add class "autocomplete-active":*/
			x[currentFocus].classList.add("autocomplete-active");
		}
		function removeActive(x) {
			/*a function to remove the "active" class from all autocomplete items:*/
			for (var i = 0; i < x.length; i++) {
			x[i].classList.remove("autocomplete-active");
			}
		}
		function closeAllLists(elmnt) {
			/*close all autocomplete lists in the document,
			except the one passed as an argument:*/
			var x = document.getElementsByClassName("autocomplete-items");
			for (var i = 0; i < x.length; i++) {
			if (elmnt != x[i] && elmnt != inp) {
				x[i].parentNode.removeChild(x[i]);
			}
			}
		}
		/*execute a function when someone clicks in the document:*/
		document.addEventListener("click", function (e) {
			closeAllLists(e.target);
		});
		}

		/*An array containing all the country names in the world:*/
		var countries = [<?php foreach($contacts as $data){
					if (($data['username2'] != $this->session->userdata('userTrack'))&&($data['username1'] == $this->session->userdata('userTrack'))){
						echo "'"; echo $data['username2']; echo "',";
					} else if (($data['username1'] != $this->session->userdata('userTrack'))&&($data['username2'] == $this->session->userdata('userTrack'))){
						echo "'"; echo $data['username1']; echo "',";
					} else if (($data['username1'] != $this->session->userdata('userTrack'))&&($data['username2'] != $this->session->userdata('userTrack'))){
						//do nothing
					}
				}?>]

		/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
		autocomplete(document.getElementById("myInput"), countries);
		</script>

		<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<!--Ajax for json-->
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>  
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
		
		<!--JQuery Upload-->
		<script>
		$('.custom-file-input').on('change', function() { 
			let fileName = $(this).val().split('\\').pop(); 
			$(this).next('.custom-file-label').addClass("selected").html(fileName); 
		});
		</script>
	</body>
</html>
