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
			footer  {background-color: #0A0C10; color:whitesmoke; position: relative; bottom: 0; padding: 2rem;}
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
		<!--Collapse Side Navbar-->
			<div id="mySidebar" class="sidebar">
				<img  id='icon' onclick="closeNav()" href="javascript:void(0)" class="closebtn" src="http://localhost/Learnzia/assets/images/icon/Close.png"
					style="top:2%;" type="button">	
				<!--Searchbox-->
				<form class="form-inline my-2 my-lg-0" action="">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" style="margin-left:5%;" name="search" aria-label="Search">
					<button class="btn btn-primary" style="color:whitesmoke; background-color:#00a13e; border:none;" type="submit">Search</button>
					<img id='icon' onclick="" href="" src="http://localhost/Learnzia/assets/images/icon/Add.png" style="margin-left:2%;" type="button"
						data-toggle="modal" data-target="#messageModal">	
				</form><hr>
				<div class="container-fluid" width="200" style="">
					<!--Message list-->
					<?php 
						$count = 0;
						foreach($contacts as $data){
						if (($data['username2'] != $this->session->userdata('userTrack'))&&($data['username1'] == $this->session->userdata('userTrack'))){
						echo "
						<div class='card' type='button' style='margin-bottom:2%; background-color:#212121;' 
							data-toggle='modal' data-target='#message".$data['username2']."'>
							<div class='card-header' style='width: 25rem; height:5rem;'>
								<img id='icon' src='http://localhost/Learnzia/assets/uploads/user_".$data['username2'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:50px; height:50px; float:left;
									margin-right:5%'>
								<h5 style='font-size:15.5px; color:#F1C40F;'>".$data['username2']."</h5>";
								//User login status
								foreach($listUser as $user){
								if(($user['status'] == 'online')&&($user['username']==$data['username2'])){echo "<p style='font-size:14px; color:#00a13e;'>".$user['status']."</p>";} 
									else if(($user['status'] == 'offline')&&($user['username']==$data['username2'])) {
									echo "<p style='font-size:14px; color:#F14D0F;'>".$user['status']."</p>";
								}}
							echo "</div>
						</div>"; $count++;
						} else if (($data['username1'] != $this->session->userdata('userTrack'))&&($data['username2'] == $this->session->userdata('userTrack'))){
						echo "
						<div class='card' type='button' style='margin-bottom:2%; background-color:#212121;' 
							data-toggle='modal' data-target='#message".$data['username1']."'>
							<div class='card-header' style='width: 25rem; height:5rem;'>
								<img id='icon' src='http://localhost/Learnzia/assets/uploads/user_".$data['username1'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:50px; height:50px; float:left;
									margin-right:5%;'>
								<h5 style='font-size:15.5px; color:#F1C40F;'>".$data['username1']."</h5>";
								//User login status
								foreach($listUser as $user){
								if(($user['status'] == 'online')&&($user['username']==$data['username1'])){echo "<p style='font-size:14px; color:#00a13e;'>".$user['status']."</p>";} 
									else if(($user['status'] == 'offline')&&($user['username']==$data['username1'])) {
									echo "<p style='font-size:14px; color:#F14D0F;'>".$user['status']."</p>";
								}}
							echo "</div>
						</div>"; $count++;
						} else if (($data['username1'] != $this->session->userdata('userTrack'))&&($data['username2'] != $this->session->userdata('userTrack'))){
							//break;
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
		<div class="container" id="menu">
			<br><h4>Browse the World</h4>
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
				$i = 0; 
				foreach ($listClass as $data){ 
					foreach ($listRel as $data2) {
						if (($data['classname'] == $data2['classname'])&& ($data2['username']== $this->session->userdata('userTrack'))){
							echo "<button class='btn btn-primary' data-toggle='modal' data-target='#classModal".$data['classname']."' aria-expanded='false' 
								aria-controls='multiCollapseExample2' style='background-color: #212121; border:none; margin-bottom:1%; max-width:120px; max-height:120px;'>
								<img src='http://localhost/Learnzia/assets/uploads/classroom/classroom_".$data['imageURL'].".jpg' alt='Card image cap' style='width:60px; 
									height:60px; border: 2.5px solid #F1C40F; border-radius:8px;'>
								<h5 style='font-size:14px;'>/".$data['classname']."</h5>
								<h6 style='font-size:14px; margin-top:-6%; color:#7289da;'>".$data['category']."</h6>
							</button>"; $i++;
						}
					}
				}
				if($i == 0){
					echo "<img src='http://localhost/Learnzia/assets/images/Error404.png' alt='Error404.png' style='display: block;
					margin-left: auto; margin-right: auto; width: 100px; margin-top:-10%;'>
					<h5 style='font-size:14px; font-style:italic; color:#F1C40F; margin-bottom:1%;
					text-align:center;'>You haven't join any classroom yet...</h5><br>";
				}
			?>
			</div>
		</div>

		<!--All classroom.-->
		<div class="container p-3" id="menu">
			<h4>All Classroom</h4>
			<div class="row">
			<?php
				foreach($listClass as $data){
					echo" 
					<div class='card m-3 p-2' style='width:30%; background:#212121; box-shadow: rgba(241, 196, 15, 0.24) 0px 3px 8px;'>
						<div class='row'>
							<div class='col-md-6'>
								<img src='http://localhost/Learnzia/assets/uploads/classroom/classroom_".$data['imageURL'].".jpg' alt='Card image cap' class='img-fluid rounded w-75'>
							</div>
							<div class='col-lg-6'>
								<div class='container-fluid w-100' style='margin-left:-60px;'>
									<h6 style='color:#F1C40F; white-space: nowrap;'>/".$data['classname']."</h6>";	
									if($data['type'] == "private"){
										echo "<a class='text-white text-decoration-none' style='font-size:14px;'><i class='fa-solid fa-lock'></i> ".$data['category']."</a>";
									} else if($data['type'] == "public"){
										echo "<a class='text-white text-decoration-none' style='font-size:14px;'><i class='fa-solid fa-lock-open'></i> ".$data['category']."</a>";
									}
									echo "
									<h5 class='text-white' style='font-size:20px; white-space: nowrap;'>"; 
										$count =0; foreach ($listRel as $rel2){foreach ($listUser as $user){
										if(($rel2['username'] == $user['username'])&&($rel2['classname'] == $data['classname'])){$count++;}}}
										echo $count;
									echo"
									<a class='text-white text-decoration-none' style='font-size:12px;'> Member</a></h5>";
									foreach ($listRel as $rel2){foreach ($listUser as $user){if(($rel2['username'] == $user['username'])&&($rel2['classname'] == $data['classname'])){if($rel2['typeRelation'] == 'founder'){
									echo "<img id='icon' src='http://localhost/Learnzia/assets/uploads/user_".$user['username'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' 
										style=' float:left; width:30px; type:button; cursor:pointer;'>";
									if ($user['username'] == $this->session->userdata('userTrack')){
										echo "<h5 style='font-size:15.5px; color:#7289da;'>You</h5>";
									} else {
										echo "<a class='text-white ml-2 text-decoration-none' style='font-size:14px;'> ".$user['username']."</a>";}
									}}}}
								echo"</div>
							</div>
						</div>
					</div>
					";
				}
			?></div>
			</div>
		</div>

		<!--All post.-->
		<div class="container p-3" id="menu">
			<h4>All Post</h4>
			<div class="row">
				<?php 
					$i = 1; 
					$count = 0;
					foreach($discMath as $data){	
						echo"<div class='card m-3 bg-transparent' style='width:30%;'>
							<div id='accordion2'>
							<div class='card rounded' style='border-bottom: 3.5px solid #F1C40F; background-color:#525252;'>
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
									echo"
									<img src='http://localhost/Learnzia/assets/uploads/discussion_".$data['imageURL'].".jpg' style='border-radius:6px; width:100%; height:100%; cursor:pointer' 
									alt='' data-toggle='modal' data-target='#zoom".$data['id_discussion']."'>
									<p style='font-size:14px; color:whitesmoke	;'>".$data['question']."</p>";
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
											echo"
											<img id='icon' src='http://localhost/Learnzia/assets/uploads/reply/reply_".$data2['imageURL'].".jpg' style='border-radius:6px; width:100%; height:100%; cursor:pointer' 
											alt='' data-toggle='modal' data-target='#zoom".$data2['imageURL']."'>
											<p style='font-size:14px; color:whitesmoke	;'>".$data2['replytext']."</p>";
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
										<hr>
										<div class='row'>
											<div class='col-md-2'>
												<label class='switch'>
												<input type='checkbox' name='imageSwitchR'>
													<span class='slider round' type='button' data-toggle='collapse' data-target='#collapseImage".$i."'></span>
												</label>
												<a style='color:whitesmoke; font-size:13px; white-space: nowrap;'>Image</a>
											</div>
											<div class='col-md-10'>
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
										<div class='row'>
											<div class='col-md-9'>
												<input class='form-control' type='text' placeholder='Type your reply here...' name='replytext'>
											</div>
											<div class='col-md-2'>
												<button class='btn btn-primary' style='color:whitesmoke; background-color:#00a13e;border:none;' type='submit'><i class='fa-solid fa-paper-plane'></i></button>
											</div>
										</div>
									</form>
								</div>
							</div></div>
							</div>
						</div><br>";
						$count = 0;
					$i++;
					}?>
				
				<!--end of content-->
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
					<img id='icon' src='http://localhost/Learnzia/assets/Images/icon/Instagram.png' style='width:25px; height:22px;'><a href="#!"> Intagram</a>
					</p>
					<p>
					<img id='icon' src='http://localhost/Learnzia/assets/Images/icon/Facebook.png' style='width:25px; height:22px;'><a href="#!"> Facebook</a>
					</p>
					<p>
					<img id='icon' src='http://localhost/Learnzia/assets/Images/icon/Twitter.png' style='width:25px; height:22px;'><a href="#!"> Twitter</a>
					</p>
				</div>

				<hr class="w-100 clearfix d-md-none">
				<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
				<h5 class="text-uppercase font-weight-bold">Contact us</h5>
					<p>
					<img id='icon' src='http://localhost/Learnzia/assets/Images/icon/Profile.png' style='width:25px; height:22px;'> Leonardho R Sitanggang </p>
					<p>
					<img id='icon' src='http://localhost/Learnzia/assets/Images/icon/Location.png' style='width:25px; height:22px;'> Bandung, Indonesia </p>
					<p>
					<img id='icon' src='http://localhost/Learnzia/assets/Images/icon/Email.png' style='width:25px; height:22px;'> learnzia@gmail.com </p>
					<p>
					<img id='icon' src='http://localhost/Learnzia/assets/Images/icon/Call.png' style='width:25px; height:22px;'> + 62 811 4882 001 </p>
				</div>

		</div>
				<div class="footer-copyright text-center py-3">© 2022 Copyright:
				<a href="https://learnzia.com/">www.learnzia.com</a>
			</div>
		</footer>
		
		
		<!-- My Classroom modal. -->
		<?php foreach ($listClass as $class){ 
			foreach ($listRel as $rel) {
			if (($rel['classname'] == $class['classname'])&& ($rel['username']== $this->session->userdata('userTrack'))){
			echo"<div class='modal fade' id='classModal".$class['classname']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
				<div class='modal-dialog modal-lg' role='document'>
					<div class='modal-content' style='background-color:#313436; overflow-y: initial;'>
					<div class='modal-header'>
						<h4 style='color:#F1C40F;'>/".$class['classname']."</h4>
						<img type='button' data-dismiss='modal' aria-label='Close' src='http://localhost/Learnzia/assets/images/icon/Close.png' id='icon'>	
					</div>
					<div class='modal-body' style='max-height: calc(98vh - 160px); overflow-y: auto;'>
					<div class='row'>
						<div class='col-lg-4 col-xlg-3 col-md-5' style='overflow-y: initial;'>
							<img src='http://localhost/Learnzia/assets/uploads/classroom/classroom_".$class['imageURL'].".jpg' alt='Card image cap' style='width:225px; 
							height:225px; border: 2.5px solid #F1C40F; border-radius:8px; margin-bottom:2%;'>
							<h5 style='color:#F1C40F;'>Member</h5>
							<div class='card' style='border-radius:5px; border: 3px solid #F1C40F; background-color:#525252; margin-bottom:3%; width:225px; 
							height:225px; max-height: calc(80vh - 120px); max-width:auto; overflow-y: auto;'>";
							foreach ($listRel as $rel2){
							foreach ($listUser as $user){
								if(($rel2['username'] == $user['username']) &&($rel2['classname'] == $class['classname'])){
								echo "<div class='card' type='button' style='border: none; background-color:#515151; margin:1%;'>
									<div class='card-header' style='height:5rem;'>
										<img id='icon' src='http://localhost/Learnzia/assets/uploads/user_".$user['username'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' 
											style='width:50px; height:50px; float:left; margin-right:5%'>";
											if ($user['username'] == $this->session->userdata('userTrack')){
												echo "<h5 style='font-size:15.5px; color:#F1C40F;'>You</h5>";
											} else {
												echo "<h5 style='font-size:15.5px; color:#F1C40F;'>".$user['username']."</h5>";}
										if($rel2['typeRelation'] == 'founder'){echo"<p style='font-size:14px; color:#7289da; font-weight:bold;'>".$rel2['typeRelation']."</p>";}
										else if($rel2['typeRelation'] == 'co-founder') {echo"<p style='font-size:14px; color:#00a13e;'>".$rel2['typeRelation']."</p>";}
										else{echo"<p style='font-size:14px; color:whitesmoke;'>".$rel2['typeRelation']."</p>";}
									echo"</div>
								</div>";
								} 
							}}
						echo"</div>
						</div>
						
						<div class='col-lg-8 col-xlg-9 col-md-7'>
							<h5 style='color:#F1C40F;'>About this Class</h5>
							<div class='card rounded mb-2 p-2' style='border: 3px solid #F1C40F; background-color:#525252;'>
								<p>".$class['description']."</p>
								<div class='row text-center m-t-20' style='margin-top:1%;'>
									<div class='col-lg-4 col-md-4 m-t-20'>
										<h4 style='font-size:20px;'>"; $count =0; foreach ($listRel as $rel2){foreach ($listUser as $user){
										if(($rel2['username'] == $user['username'])&&($rel2['classname'] == $class['classname'])){$count++;}}} echo $count; echo" </h4>
										<small style='color:whitesmoke;'>Member</small>
									</div>
									<div class='col-lg-4 col-md-4 m-t-20'>
										<h4 style='font-size:20px;'>";echo $class['category'];
										echo "</h4><small style='color:whitesmoke;'>Category</small>
									</div>
									<div class='col-lg-4 col-md-4 m-t-20'>
										<h4 style='font-size:20px;'>";echo $class['type'];
										echo "</h4><small style='color:whitesmoke;'>Type</small>
									</div>
								</div>
								<div class='container'>
									<h4 style='font-size:20px;'>Founded By</h4>";
									foreach ($listRel as $rel2){foreach ($listUser as $user){if(($rel2['username'] == $user['username'])&&($rel2['classname'] == $class['classname'])){if($rel2['typeRelation'] == 'founder'){
									echo "<img id='icon' src='http://localhost/Learnzia/assets/uploads/user_".$user['username'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' 
										style='width:50px; height:50px; float:left; margin-right:5%'>";
									if ($user['username'] == $this->session->userdata('userTrack')){
										echo "<h5 style='font-size:15.5px; color:#7289da;'>You</h5>";
									} else {
										echo "<h5 style='font-size:15.5px; color:#7289da;'>".$user['username']."</h5>";}
									echo "<p style='font-size:13px; color:whitesmoke; font-style:italic;'>".$class['date']."</p>";
									}}}}
							echo "</div>
							</div>";
							if ((($rel['typeRelation'] == 'founder')||($rel['typeRelation'] == 'co-founder'))&&($class['type']=='private')){
							echo"<h4 style='font-size:20px;'>Send Invitation</h4>						
							<form method='post' action='globalCtrl/sendInvitation' autocomplete='off'>
								<input type='text' class='form-control' name='typeInvitation' value='".$class['classname']."' hidden>
								<div class='autocomplete' style='width:70%;'>
									<input id='available4".$class['classname']."' class='form-control mr-sm-2' type='search' name='receiver' placeholder='Username' required>
								</div>
								<button class='btn btn-primary' style='color:whitesmoke; background-color:#00a13e; border:none;' type='submit'><img
								src='http://localhost/Learnzia/assets/images/icon/Email_W.png' id='icon'> Invite</button>
								<br><br><img id='icon' src='http://localhost/Learnzia/assets/images/icon/Info.png' style='float:left;'>
								<p style='color:#F1C40F; font-size:14px;'>You can only invite new members who are already friends with you.</p>
							</form>";} 
							else if (($rel['typeRelation'] == 'member')&&($class['type']=='private')){
							echo"<img id='icon' src='http://localhost/Learnzia/assets/images/icon/Info.png' style='float:left;'>
								<p style='color:#F1C40F; font-size:14px;'>Sorry but, member can't invite in private class mode.</p>";
							} else if ($class['type']=='public'){
							echo"<h4 style='font-size:20px;'>Send Invitation</h4>						
							<form method='post' action='globalCtrl/sendInvitation' autocomplete='off'>
								<input type='text' class='form-control' name='typeInvitation' value='".$class['classname']."' hidden>
								<div class='autocomplete' style='width:70%;'>
									<input id='available4".$class['classname']."' class='form-control mr-sm-2' type='search' name='receiver' placeholder='Username' required>
								</div>
								<button class='btn btn-primary' style='color:whitesmoke; background-color:#00a13e; border:none;' type='submit'><img
								src='http://localhost/Learnzia/assets/images/icon/Email_W.png' id='icon'> Invite</button>
								<br><br><img id='icon' src='http://localhost/Learnzia/assets/images/icon/Info.png' style='float:left;'>
								<p style='color:#F1C40F; font-size:14px;'>You can only invite new members who are already friends with you.</p>
							</form>";} 
					echo"</div>
					</div>
					</div>	
					<div class='modal-footer'>
						<button class='btn btn-danger' style='color:white; margin:1%;'>Leave Class</button>
						<form method='post' action='globalCtrl/openClass'>
							<input type='text' class='form-control' name='visitClass' value='".$class['classname']."' hidden>
							<button class='btn btn-primary' style='color:white; float:right; background-color:#00a13e; margin-left:1%; border:none;' type='submit'>Open</button>	
						</form>
					</div>			
					</div>
				</div>
				</div>";	
		}}}?>

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
				<form method='POST' action='<?php echo site_url().'profileCtrl/signOut'; ?>'>
				<button type="submit" class="btn btn-primary" style='background-color:#e69627; border:none;'>Yes, Sign Out</button></form>
			</div>			
			</div>
		</div>
		</div>				

		<!-- Modal Add Message -->
		<div class='modal fade' id='messageModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
		<div class='modal-dialog' role='document'>
			<form method='POST' action='<?php echo site_url().'profileCtrl/sendMessage'; ?>' autocomplete="off">
				<div class='modal-content' style='background-color:#313436;'>
				<div class='modal-header'>
					<h5 class='modal-title' id='exampleModalLabel' style='color:#e69627; margin-top:1%;'>Send to :</h5>
					<div class="autocomplete" style="width:300px;">
						<input class="form-control mr-sm-2" id="mycontacts" type="text" name="receiver" placeholder="Username" required>
					</div>
					<img id='icon'  class="closebtn" src="http://localhost/Learnzia/assets/images/icon/Close.png"
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

		<!-- Modal Message-->
		<?php
			$count = 0; 
			foreach($contacts as $friend){
			if (($friend['username2'] != $this->session->userdata('userTrack'))&&($friend['username1'] == $this->session->userdata('userTrack'))){
			echo "
		<div class='modal fade' id='message".$friend['username2']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
		<div class='modal-dialog' role='document' style='overflow-y: initial;'>
			<form method='POST' action='globalCtrl/sendRMessage' enctype='multipart/form-data'>
			<div class='modal-content' style='background-color:#313436;'>
			<div class='modal-header'>
				<div class='container'>
					<img id='icon' src='assets/uploads/user_".$friend['username2'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; 
					float:left; margin-right:2%;'>
					<h5 style='font-size:20px;'>".$friend['username2']."</h5>";
					//User login status
					foreach($listUser as $user){
					if(($user['status'] == 'online')&&($user['username']==$friend['username2'])){echo "<p style='font-size:14px; color:#00a13e;'>".$user['status']."</p>";} 
						else if(($user['status'] == 'offline')&&($user['username']==$friend['username2'])) {
						echo "<p style='font-size:14px; color:#F14D0F;'>".$user['status']."</p>";
					}}
				echo "</div>
				<img id='icon' type='button' data-dismiss='modal' aria-label='Close' src='http://localhost/Learnzia/assets/images/icon/Close.png'>	
			</div>
			<div class='imessage' style='max-height: calc(80vh - 160px); max-width:auto; overflow-y: auto; height:800px; min-width:100%;'>";
				foreach($dataMessage as $data2){
					if(($data2['sender']  == $friend['username2'])&&($data2['receiver']  == $this->session->userdata('userTrack'))){
						echo "<p class='from-them'>";
							if($data2['imageURL'] != 'null'){
								echo"<img src='http://localhost/Learnzia/assets/uploads/message/message_".$data2['imageURL'].".jpg' alt='Card image cap' style='width:200px; height:200px;
								margin:1%; border-radius:6px;'>";
							}
							echo "".$data2['message']."<br><a style='color:#e69627; font-size:13.5px; font-style:italic;'>~ on ".$data2['datetime']."</a>
							</p>";
						$count++;
					} else if(($data2['receiver']  == $friend['username2']) &&($data2['sender']  == $this->session->userdata('userTrack'))){
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
					<input type='text' class='form-control' name='receiver' value='".$friend['username2']."' hidden>
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
		} else if (($friend['username1'] != $this->session->userdata('userTrack'))&&($friend['username2'] == $this->session->userdata('userTrack'))){
			echo "
		<div class='modal fade' id='message".$friend['username1']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
		<div class='modal-dialog' role='document' style='overflow-y: initial;'>
			<form method='POST' action='globalCtrl/sendRMessage' enctype='multipart/form-data'>
			<div class='modal-content' style='background-color:#313436;'>
			<div class='modal-header'>
				<div class='container'>
					<img id='icon' src='assets/uploads/user_".$friend['username1'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; 
					float:left; margin-right:2%;'>
					<h5 style='font-size:20px;'>".$friend['username1']."</h5>";
					//User login status
					foreach($listUser as $user){
					if(($user['status'] == 'online')&&($user['username']==$friend['username1'])){echo "<p style='font-size:14px; color:#00a13e;'>".$user['status']."</p>";} 
						else if(($user['status'] == 'offline')&&($user['username']==$friend['username1'])) {
						echo "<p style='font-size:14px; color:#F14D0F;'>".$user['status']."</p>";
					}}
				echo "</div>
				<img id='icon' type='button' data-dismiss='modal' aria-label='Close' src='http://localhost/Learnzia/assets/images/icon/Close.png'>	
			</div>
			<div class='imessage' style='max-height: calc(80vh - 160px); max-width:auto; overflow-y: auto; height:800px; min-width:100%;'>";
				foreach($dataMessage as $data2){
					if(($data2['sender']  == $friend['username1'])&&($data2['receiver']  == $this->session->userdata('userTrack'))){
						echo "<p class='from-them'>";
							if($data2['imageURL'] != 'null'){
								echo"<img src='http://localhost/Learnzia/assets/uploads/message/message_".$data2['imageURL'].".jpg' alt='Card image cap' style='width:200px; height:200px;
								margin:1%; border-radius:6px;'>";
							}
							echo "".$data2['message']."<br><a style='color:#e69627; font-size:13.5px; font-style:italic;'>~ on ".$data2['datetime']."</a>
							</p>";
						$count++;
					} else if(($data2['receiver']  == $friend['username1']) &&($data2['sender']  == $this->session->userdata('userTrack'))){
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
					<input type='text' class='form-control' name='receiver' value='".$friend['username1']."' hidden>
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
		}?>

		<!-- Modal New Classroom -->
		<div class='modal fade' id='newClassModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
		<div class='modal-dialog' role='document'>
			<form method='POST' action='<?php echo site_url().'globalCtrl/newClass'; ?>' enctype='multipart/form-data'>
				<div class='modal-content' style='background-color:#313436;'>
				<div class='modal-header'>
					<h5 class='modal-title' id='newClassModal' style='color:#e69627; margin-top:1%;'>Category :</h5>
					<div class="form-group mb-3">
					<select class="form-control" name="category" style="width:300px;">
						<option value='math'>Math</option>
						<option value='coding'>Coding</option>
						<option value='design'>Design</option>
						<option value='science'>Science</option>
						<option value='history'>History</option>
						<option value='multi'>Multi</option>
					</select></div>
					<img  class="closebtn" id="icon" src="http://localhost/Learnzia/assets/images/icon/Close.png"
					style="margin-top:2%;" type="button" data-dismiss='modal' aria-label='Close'>
				</div>
					<div class='modal-body'>
						<div class="form-group mb-3">
							<label class="label" for="text" style="color:#F1C40F;">Class Name</label>
							<input type="text" class="form-control" placeholder="Class Name" name="classname" required>
						</div>
						<div class="form-group mb-3">
							<label class="label" for="text" style="color:#F1C40F;">Description</label>
							<textarea rows="5" cols="60" name="description" class='form-control' required>Type description about your classroom and some rules...</textarea>
						</div>
						<label class="switch" style='float:left; margin-right:2%;'>
						<input type="checkbox" name='typeSwitch'>
							<span class="slider round"></span>
						</label>
						<p style="color:whitesmoke;">Private Class</p>
						<img id='icon' src='http://localhost/Learnzia/assets/images/icon/Info.png' style='float:left;'>
						<p style="color:#F1C40F; font-size:14px;">If you set the class's type to Private. People must request first, before they want to join. You 
							still can change this feature in the future.</p>
						<!-- Rounded switch -->
						<label class="switch" style='float:left; margin-right:2%;'>
						<input type="checkbox" name='imageSwitchC'>
							<span class="slider round" data-toggle="collapse" data-target="#uploadClassProfil"></span>
						</label>
						<p style="color:whitesmoke;">Set Class's Image</p>
						<!--Upload file.-->
						<div class="collapse" id="uploadClassProfil">
							<div class="form-group mb-3">
							<div class="container" style=''>
								<label class="label" for="text" style="color:#F1C40F;">Add Discussion Image</label>
								<div class="input-group mb-3" style="background-color:#212121; border-width: 0 0 3px; border-bottom: 3.5px solid #F1C40F; 
									border-radius:5px;">
									<div class="input-group-prepend">
										<span class="input-group-text">jpg</span>
									</div>
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="uploadImage" name="uploadClassProfil" accept='image/*'>
										<label class="custom-file-label text-left" for="uploadImage">file size max 2 mb</label>
									</div>
								</div>
							</div>
							</div>
						</div>
					</div>
					<div class='modal-footer'>
						<button type='submit' style='color:whitesmoke; background-color:#e69627; border:none;' 
							class='btn btn-primary'>Create new Class</button>
					</div>
			</form>
			</div>
		</div>
		</div>

		<!-- Error invite Modal -->
		<?php if(isset($error_messageInvitation1)) { echo"
		<div class='modal fade' id='errorModalInvit' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
		<div class='modal-dialog' role='document'>
			<div class='modal-content' style='background-color:#313436;'>
			<div class='modal-header'>
				<h5 class='modal-title'>Invitation Error</h5>
				<img id='icon'  class='closebtn' src='http://localhost/Learnzia/assets/images/icon/Close.png'
					type='button' data-dismiss='modal' aria-label='Close' onClick='refreshMessage()'>
			</div>
			<div class='modal-body'>
				<img src='http://localhost/Learnzia/assets/images/Hello.gif' alt='Hello.gif' style='display: block;
					margin-left: auto; margin-right: auto; width: 70%; height: 70%;'>
				<h5 class='' style='text-align:center; font-color:whitesmoke;'>".$error_messageInvitation1." already join in your classroom</h5>
			</div>		
			</div>
		</div>
		</div>";}	
		?>

		<!-- Success invite Modal -->
		<?php if(isset($success_messageInvitation1)) { echo"
		<div class='modal fade' id='errorModalInvit' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
		<div class='modal-dialog' role='document'>
			<div class='modal-content' style='background-color:#313436;'>
			<div class='modal-header'>
				<h5 class='modal-title'>Invitation Sended</h5>
				<img id='icon'  class='closebtn' src='http://localhost/Learnzia/assets/images/icon/Close.png'
					type='button' data-dismiss='modal' aria-label='Close' onClick='refreshMessage()'>
			</div>
			<div class='modal-body'>
				<img src='http://localhost/Learnzia/assets/images/Sended.gif' alt='Sended.gif' style='display: block;
					margin-left: auto; margin-right: auto; width: 70%; height: 70%;'>
				<h5 class='' style='text-align:center; font-color:whitesmoke;'>".$success_messageInvitation1." has been invited</h5>
			</div>		
			</div>
		</div>
		</div>";}	
		?>

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
			function refreshMessage() {
				window.location.href="http://localhost/Learnzia/globalCtrl";  
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
		//List friends.
		var contacts = [<?php foreach($contacts as $data){
			if (($data['username2'] != $this->session->userdata('userTrack'))&&($data['username1'] == $this->session->userdata('userTrack'))){
				echo "'"; echo $data['username2']; echo "',";
			} else if (($data['username1'] != $this->session->userdata('userTrack'))&&($data['username2'] == $this->session->userdata('userTrack'))){
				echo "'"; echo $data['username1']; echo "',";
			} else if (($data['username1'] != $this->session->userdata('userTrack'))&&($data['username2'] != $this->session->userdata('userTrack'))){
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
			
			$(window).on('load', function() {
				$('#errorModalInvit').modal('show');
			});
		</script>

	</body>
</html>
