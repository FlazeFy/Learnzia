<!--Leonardho R. Sitanggang
    1302194041  SE-43-03
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Learnzia || Profile</title>
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

		 <!-- chartist CSS -->
		<link href="http://localhost/Learnzia/assets/css/chartist-js/dist/chartist.min.css" rel="stylesheet">
		<link href="http://localhost/Learnzia/assets/css/chartist-js/dist/chartist-init.css" rel="stylesheet">
		<link href="http://localhost/Learnzia/assets/css/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">

		<style>
			body {background-color: #313436; color:whitesmoke;}
			footer  {background-color: #212121; color:whitesmoke; position: relative; bottom: 0; padding: 2rem;}
			.navbar {position: fixed; width:100%; z-index:1;}
			a {color:#F1C40F;}
			.active {border-radius: 4px; border-bottom: 4.5px solid rgb(40, 207, 54); position: relative;bottom: 5%;}
			#icon {height: 30px;width: 30px;} .form-control{color:whitesmoke; background:#212121; border-width: 0 0 3px; 
				border-bottom: 3.5px solid #F1C40F;}
			hr {background-color: whitesmoke;}
			h4 {color:#F1C40F;} h5 {color:#F1C40F;}
			#menu {background-color: #212121; border-radius:5px; margin-bottom:1%;}
			.dropdown-menu{background-color: #212121; border-color:#F1C40F;} .dropdown-item{color:#F1C40F;}
			.nav-tabs .nav-link.active{background-color:#7289da; color:whitesmoke; border:none; margin-top:2%;}
			.tab-pane.active{border:none;}
			a.nav-link:hover{color:#7289da; border:none;}
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
			<li class="nav-item">
				<a class="nav-link" href="globalCtrl">Global</a>
			</li>
			<li class="nav-item  active">
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
		<br><br><br>
		<div class="container" id="menu">
			<br><h4>Profile</h4>
			 <div class="row">
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card" style='border-radius:5px; border: 3px solid #F1C40F; background-color:#525252; margin-bottom:5%;'>
                            <div class="card-block little-profile text-center">
								<img id='icon' src='http://localhost/Learnzia/assets/uploads/user_<?php foreach ($dataUser as $data) {echo $data['username'];} ?>.jpg' alt='New Post' class='rounded-circle img-fluid' 
								style='width:120px; height:120px; margin-top:5%;'>
                                <h3 class="m-b-0"></h3>
                                <h4 style=''><?php foreach ($dataUser as $data) {echo $data['username'];} ?></h4>
                                <div class="row text-center m-t-20">
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h4><?php $count = 0; foreach ($dataReply as $reply){ foreach ($dataUser as $data) {
										if ($reply['sender'] == $data['username']){$count++;}}} echo $count; ?></h4>
										<small style='color:whitesmoke;'>Replies</small></div>
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h4><?php $count = 0; foreach ($dataDiscussion as $disc){ foreach ($dataUser as $data) {
										if ($disc['sender'] == $data['username']){$count++;}}} echo $count; ?></h4>
										<small style='color:whitesmoke;'>Discussion</small></div>
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h4><?php $count = 0; foreach ($contacts as $friend){ foreach ($dataUser as $data) {
										if (($friend['username2'] != $data['username'])&& ($friend['username1'] == $data['username'])){$count++;}
										else if (($friend['username1'] != $data['username'])&& ($friend['username2'] == $data['username'])){$count++;}
										}} echo $count; ?></h4>
										<small style='color:whitesmoke;'>Friends</small></div>
									<div class="col-lg-4 col-md-4 m-t-20">
                                        <h4><?php  $count = 0; foreach ($listClass as $data){foreach ($listRel as $data2) {
										if(($data['classname'] == $data2['classname'])&& ($data2['username']== $this->session->userdata('userTrack'))){$count++;}}}
										echo $count;
										?></h4>
										<small style='color:whitesmoke;'>Classroom</small></div>
									<div class="col-lg-4 col-md-4 m-t-20">
                                        <h4 style='font-size:16px;'>
										<?php foreach ($dataUser as $data) {echo $data['country'];} ?></h4>
										<small style='color:whitesmoke;'>Country</small></div>
									<div class="col-lg-4 col-md-4 m-t-20">
                                        <h4>-</h4><small style='color:whitesmoke;'>Rank</small></div>
                                </div>
                            </div>
                        </div>
                    
						<h4>Friends</h4>
                        <div class="card" style='border-radius:5px; border: 3px solid #F1C40F; background-color:#525252; margin-bottom:5%; overflow-y: initial;'>
							<div class="container" style="max-height: calc(60vh - 120px); max-width:auto; overflow-y: auto;">
						<!--Contact list-->
						<?php 
							$count = 0;
							foreach($contacts as $data){
							if (($data['username2'] != $this->session->userdata('userTrack'))&&($data['username1'] == $this->session->userdata('userTrack'))){
							echo "
							<div class='card' type='button' style='border: none; background-color:#515151; margin:1%;'>
								<div class='card-header' style='height:5rem;'>
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
							<div class='card' type='button' style='border:none; background-color:#515151; margin:1%;'>
								<div class='card-header' style='height:5rem;'>
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
							}
								//do nothing
							}
							if ($count == 0){
								echo "<div class='container' style='margin-top:2%;'>
									<img src='http://localhost/Learnzia/assets/images/Friends.png' alt='Friends.png' style='display: block;
										margin-left: auto; margin-right: auto; width: 30%; height: 30%;'>
									<h5 style='font-size:15.5px; color:#F1C40F; text-align:center;'>You dont have a friend yet</h5>
									<p style='font-style:italic; text-align:center; font-size:18px; color:#7289da;'>Lets find a new friend in 
									<a style='text-decoration:underline; font-size:18px; color:#F1C40F;' href='globalCtrl'>Global </a> menu.</p>
								</div>";
							}
						?>
						</div>
                    </div>

					
					<h4>Classroom</h4>
                        <div class="card" style='border-radius:5px; border: 3px solid #F1C40F; background-color:#525252; overflow-y: initial;'>
							<div class="container" style="max-height: calc(60vh - 120px); max-width:auto; overflow-y: auto;">
							<!--Class list-->
							<?php 
								$count = 0;
								foreach ($listClass as $data){foreach ($listRel as $data2){
								if (($data['classname'] == $data2['classname'])&& ($data2['username']== $this->session->userdata('userTrack'))){
								echo "
								<div class='card' type='button' style='border: none; background-color:#515151; margin:1%;'>
									<div class='card-header' style='height:5rem;'>
										<img id='icon' src='http://localhost/Learnzia/assets/uploads/classroom/classroom_".$data['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:50px; height:50px; float:left;
											margin-right:5%'>
										<h5 style='font-size:15.5px; color:#F1C40F;'>/".$data['classname']."</h5>
										<p style='font-size:14px; color:#7289da;'>".$data['category']."</p>
									</div>
								</div>"; $count++;
								}}} 
								if ($count == 0){
									echo "<div class='container' style='margin-top:2%;'>
										<img src='http://localhost/Learnzia/assets/images/Classroom.png' alt='Friends.png' style='display: block;
											margin-left: auto; margin-right: auto; width: 30%; height: 30%;'>
										<h5 style='font-size:15.5px; color:#F1C40F; text-align:center;'>You dont have join a class yet...</h5>
										<p style='font-style:italic; text-align:center; font-size:18px; color:#7289da;'>Lets join or create a class in 
										<a style='text-decoration:underline; font-size:18px; color:#F1C40F;' href='globalCtrl'>Global </a> menu.</p>
									</div>";
								}
							?>
						</div>
					</div>

                    </div>
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card" style='border-radius:5px; background-color:#525252;'>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">About me</a> </li>
								<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#edit" role="tab">Edit Profile</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#activity" role="tab">Activity</a> </li>
								<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#invitation" role="tab">Invitation</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane" id="activity" role="tabpanel" style='overflow-y: initial;'>
                                    <div class="container" style='max-height: calc(160vh - 120px); overflow-y: auto;'>
										<?php 
										$i = 1; 
										$total = 0;
										$count = 0;
										foreach($dataDiscussion as $data){	
											echo"<div id='accordion2'>
												<div class='card' style='border-radius:5px; border-bottom: 3.5px solid #F1C40F; background-color:#525252; margin:2%;'>
												<div class='card-header' id='headingOne' style='border-bottom: 1px solid #858585;'>
													<img id='icon' src='assets/uploads/user_".$data['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; margin-top: -1%; 
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
															<img id='icon' src='http://localhost/Learnzia/assets/uploads/discussion_".$data['imageURL'].".jpg' style='border-radius:6px; width:100%; height:100%; cursor:pointer' 
															alt='' data-toggle='modal' data-target='#zoom".$data['id_discussion']."'>
														</div>
														<div class='col-md-6' style=''>
														<p style='font-size:14px; color:whitesmoke	;'>".$data['question']."</p>
														</div>
													</div>";
													} else { echo"<p style='font-size:14px; color:whitesmoke;'>".$data['question']."</p>";}
													echo "<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$data['view']."</h6>
														<img id='icon' src='assets/Images/icon/View.png' style='width:25px; height:25px; float:right; margin-top:-5px; padding-left:5px;'>
													<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$data['up']."</h6>
														<img id='icon' src='assets/Images/icon/Up.png' style='width:25px; height:22px; float:right; margin-top:-4px; padding-left:5px;'>
													<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$data['comment']."</h6>
														<img id='icon' src='assets/Images/icon/Comment.png' style='width:25px; height:20px; float:right; margin-top:-2px; padding-left:5px;'>
													<h5 style='font-size:15px; float:left; text-decoration:underline;' type='button' data-toggle='collapse' data-target='#collapse".$i."' 
													aria-expanded='true' aria-controls='collapseOne''>See Reply
														<img id='icon' src='assets/Images/icon/Down.png' style='width:25px; height:20px; float:left; padding-left:3px;'></h5>
												</div>
												<!--Extend-->
												<div id='collapse".$i."' class='collapse' aria-labelledby='headingOne' data-parent='#accordion2'>
													<div class='card-body' style='background-color:#404040;'>";
														foreach ($dataReply as $data2){
														if ($data2['id_discussion'] == $data['id_discussion']){
														echo"<div class='container'>
															<img id='icon' src='assets/uploads/user_".$data2['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; 
																float:left; margin-right:1%;'>";
															if($data2['sender'] == $this->session->userdata('userTrack')){
																echo"<h5 style='font-size:20px; margin-left:15px;'>You</h5>";
															} else {
																echo"<h5 style='font-size:20px; margin-left:15px;'>".$data2['sender']."</h5>";
															}
															if($data2['image'] == 'yes'){
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
														if($count == 0) {
															echo "<div class='container' style='margin-top:1%; margin-bottom:2%;'>
																<h4 style='font-style:italic; text-align:center;'>Sorry, your discussion isn't been answered yet</h4>
																<img src='http://localhost/Learnzia/assets/images/Sorry.png' alt='Sorry.png' style='display: block;
																	margin-left: auto; margin-right: auto; width: 15%; height: 15%;'>
																<p style='font-style:italic; text-align:center; font-size:18px; color:#7289da;'>But dont worry, its only matter of time.</p>
															</div>";
															} else {echo"<h5 style='font-size:15px; font-style:italic;'>Showing ".$count." replies...</h5><br>";}
														echo"<form method='post' action='profileCtrl/sendReply' class='form-inline' enctype='multipart/form-data'>
															<input type='text' class='form-control' name='id_discussion' value='".$data['id_discussion']."' hidden>
															<div class='container'><hr>
																<label class='switch' style='float:left; margin-right:1%;'>
																<input type='checkbox' name='imageSwitchR'>
																	<span class='slider round' type='button' data-toggle='collapse' data-target='#collapseImage".$i."'></span>
																</label>
																<a style='color:whitesmoke; float:left;'>Image</a>
																<button class='btn btn-primary' style='color:whitesmoke; background-color:#00a13e; float:right; border:none;' type='submit'>Send</button>
																<input class='form-control' type='text' placeholder='Type your reply here...' style='width:50%; float:right; margin-right:1%;' name='replytext'>
																<div class='collapse' id='collapseImage".$i."'>
																	<div class='container' style='width:65%; float:right; margin-top:2%; margin-right:-2%;'>
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
												</div>";
												$count = 0;
											$i++;
											$total++;
										}								
										if ($total == 0) {
											echo "<div class='container' style='margin-top:5%; margin-bottom:5%;'>
												<img src='http://localhost/Learnzia/assets/images/Error404.png' alt='Error404.png' style='display: block;
													margin-left: auto; margin-right: auto; width: 30%; height: 30%;'>
												<h4 style='font-style:italic; text-align:center;'>You haven't post any discussion yet...</h4>
												<p style='font-style:italic; text-align:center; font-size:18px; color:#7289da;'>Lets discuss with other people by create a discussion in 
												<a style='text-decoration:underline; font-size:18px; color:#F1C40F;' href='homeCtrl'>Home </a> menu.</p>
											</div>";
										}
										?>

                                    </div>
                                </div>
                                <!--second tab-->
                                <div class="tab-pane active" id="profile" role="tabpanel">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong style='color:#F1C40F;'>Full Name</strong>
                                                <br>
                                                <p style='color:whitesmoke;'><?php foreach ($dataUser as $data) {echo $data['fullname'];} ?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong style='color:#F1C40F;'>Country</strong>
                                                <br>
                                                <p style='color:whitesmoke;'><?php foreach ($dataUser as $data) {echo $data['country'];} ?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong style='color:#F1C40F;'>Email</strong>
                                                <br>
                                                <p style='color:whitesmoke;'><?php foreach ($dataUser as $data) {echo $data['email'];} ?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong style='color:#F1C40F;'>Date Join</strong>
                                                <br>
                                                <p style='color:whitesmoke;'><?php foreach ($dataUser as $data) {echo $data['datejoin'];} ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                        <p style='color:whitesmoke;'><?php foreach ($dataUser as $data) {echo $data['description'];} ?></p>
                                        <h4 class="font-medium m-t-30">Specialization</h4>
                                        
										<!--Chart-->
										<div class="container-fluid">
										<div class="row" style='background-color:#525252; border:none;'>
											<div class="col-md-9 border-right">
												<h4 class="card-title" style='text-align:center;'>Discussion</h4>
												<div id="discussion" style="height:290px; width:100%;"></div>
												<?php $count = 0; foreach($dataDiscussion as $data){$count++;} 
												if ($count == 0){echo"<p style='text-align:center; color:whitesmoke; margin-top:-50%;'>You haven't post any discussion yet...</p>";}?>
												<h4 class="card-title" style='text-align:center;'>Replies</h4>
												<?php $count = 0; foreach($dataReplyWCat as $data){$count++;} 
												if ($count == 0){echo"<p style='text-align:center; color:whitesmoke; margin-top:-50%;'>You haven't reply any discussion yet...</p>";}?>
												<div id="reply" style="height:290px; width:100%;"></div>
											</div>
											<div class='col-md-3'>
												<div class="container text-center" style='margin-top:2%;'>
												<h4 class="card-title" style='text-align:center;'>Category</h4>
													<ul class="list-inline m-b-0">
														<li>
															<p style='color:whitesmoke;'><i class="fa fa-circle font-10 m-r-10" style='color:#12c447; margin-right:2%;'></i>Math</p></li>
														<li>
															<p style='color:whitesmoke;'><i class="fa fa-circle font-10 m-r-10" style='color:#c49212; margin-right:2%;'></i>Coding</p></li>
														<li>
															<p style='color:whitesmoke;'><i class="fa fa-circle font-10 m-r-10" style='color:#c43012; margin-right:2%;'></i>Design</p></li>
														<li>
															<p style='color:whitesmoke;'><i class="fa fa-circle font-10 m-r-10" style='color:#11bfbc; margin-right:2%;'></i>Science</p></li>
														<li>
															<p style='color:whitesmoke;'><i class="fa fa-circle font-10 m-r-10" style='color:#bf11a8; margin-right:2%;'></i>History</p></li>
													</ul>
												</div>
											</div>
											<hr class="m-t-0 m-b-0">
											
										</div>
									</div>

                                    </div>
                                </div>

                                <div class="tab-pane" id="edit" role="tabpanel">
									<div class="p-3 py-4">
                                        <form method='post' action=''>
											<div class="form-group mb-3">
											<label class="label" for="description" style="color:#F1C40F;">Description</label>
												<textarea rows="5" cols="85" name="description" style="background:#212121; border-width: 0 0 3px; 
												border-bottom: 3.5px solid #F1C40F; color:whitesmoke; border-radius:5px; text-align:left;" 
												value='<?php foreach ($dataUser as $data) {echo $data['description'];} ?>'
													required> <?php foreach ($dataUser as $data) {echo $data['description'];} ?></textarea>
											</div>

											<div class="form-group mb-3">
											<label class="label" for="password" style="color:#F1C40F;">Password</label>
											<input type="password" class="form-control" placeholder="Password" style="background:#212121; border-width: 0 0 3px; 
													border-bottom: 3.5px solid #F1C40F; color:whitesmoke; width:88%;" value='<?php foreach ($dataUser as $data) {echo $data['password'];} ?>'
													name="password" required>
											</div>

											<!--Upload file.-->
											<div class="container" style='margin-left:-2%; width:92%;'>
												<label class="label" for="description" style="color:#F1C40F;">Profile Image</label>
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

											<!--Button submit.-->
											<div class="form-group">
												<button type="submit" class="btn btn-primary" style="background-color:#e69627; border:none;">Save Changes</button>
											</div>

                                        </form>
                                    </div>
                                </div>

								<div class="tab-pane" id="invitation" role="tabpanel" style='overflow-y: initial;'>
                                    <div class="container" style='max-height: calc(160vh - 120px); overflow-y: auto;'>

									</div>
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
					<img id='icon' src='assets/Images/icon/Instagram.png' style='width:25px; height:22px;'><a href="#!"> Intagram</a>
					</p>
					<p>
					<img id='icon' src='assets/Images/icon/Facebook.png' style='width:25px; height:22px;'><a href="#!"> Facebook</a>
					</p>
					<p>
					<img id='icon' src='assets/Images/icon/Twitter.png' style='width:25px; height:22px;'><a href="#!"> Twitter</a>
					</p>
				</div>

				<hr class="w-100 clearfix d-md-none">
				<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
				<h5 class="text-uppercase font-weight-bold">Contact us</h5>
					<p>
					<img id='icon' src='assets/Images/icon/Profile.png' style='width:25px; height:22px;'> Leonardho R Sitanggang </p>
					<p>
					<img id='icon' src='assets/Images/icon/Location.png' style='width:25px; height:22px;'> Bandung, Indonesia </p>
					<p>
					<img id='icon' src='assets/Images/icon/Email.png' style='width:25px; height:22px;'> learnzia@gmail.com </p>
					<p>
					<img id='icon' src='assets/Images/icon/Call.png' style='width:25px; height:22px;'> + 62 811 4882 001 </p>
				</div>

		</div>
				<div class="footer-copyright text-center py-3">© 2022 Copyright:
				<a href="https://learnzia.com/">www.learnzia.com</a>
			</div>
		</footer>
		
		<!-- Zoom discussion image Modal -->
		<?php foreach($dataDiscussion as $data){
		if ($data['image'] == 'yes'){
		echo"<div class='modal fade' id='zoom".$data['id_discussion']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
		<div class='modal-dialog modal-xl' role='document'>
			<div class='modal-content' style='background-color:#313436;'>
			<div class='modal-header'>
				<p style='color:whitesmoke;'>".$data['question']."</p>
				<img id='icon' type='button' data-dismiss='modal' aria-label='Close' src='http://localhost/Learnzia/assets/images/icon/Close.png'>
			</div>
			<div class='modal-footer'>
				<img id='icon' src='http://localhost/Learnzia/assets/uploads/discussion_".$data['imageURL'].".jpg' style='border-radius:6px; width:100%; height:100%; cursor:pointer' 
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
						<input id="mycontacts" type="text" name="receiver" placeholder="Username" required>
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
			<form method='POST' action='profileCtrl/sendRMessage'>
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
			<form method='POST' action='profileCtrl/sendRMessage'>
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
		var contacts = [<?php foreach($contacts as $data){
			if (($data['username2'] != $this->session->userdata('userTrack'))&&($data['username1'] == $this->session->userdata('userTrack'))){
				echo "'"; echo $data['username2']; echo "',";
			} else if (($data['username1'] != $this->session->userdata('userTrack'))&&($data['username2'] == $this->session->userdata('userTrack'))){
				echo "'"; echo $data['username1']; echo "',";
			} else if (($data['username1'] != $this->session->userdata('userTrack'))&&($data['username2'] != $this->session->userdata('userTrack'))){
				//do nothing
			}
		}?>]

		/*initiate the autocomplete function on the "mycontacts" element, and pass along the contacts array as possible autocomplete values:*/
		autocomplete(document.getElementById("mycontacts"), contacts);
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

		<!--JQuery Upload-->
		<script>
			$('.custom-file-input').on('change', function() { 
				let fileName = $(this).val().split('\\').pop(); 
				$(this).next('.custom-file-label').addClass("selected").html(fileName); 
			});
			//Statistic
			$(function() {
				"use strict";
				var chart2 = new Chartist.Bar('.amp-pxl', {
				}, {
					axisX: {
						position: 'end',
						showGrid: false
					},
					axisY: {
						position: 'start'
					},
					high: '12',
					low: '0',
					plugins: [
						Chartist.plugins.tooltip()
					]
				});

				var chart = [chart2];
				var replyChart = [chart2];

				for (var i = 0; i < chart.length; i++) {
					chart[i].on('draw', function(data) {
						if (data.type === 'line' || data.type === 'area') {
							data.element.animate({
								d: {
									begin: 500 * data.index,
									dur: 500,
									from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
									to: data.path.clone().stringify(),
									easing: Chartist.Svg.Easing.easeInOutElastic
								}
							});
						}
						if (data.type === 'bar') {
							data.element.animate({
								y2: {
									dur: 500,
									from: data.y1,
									to: data.y2,
									easing: Chartist.Svg.Easing.easeInOutElastic
								},
								opacity: {
									dur: 500,
									from: 0,
									to: 1,
									easing: Chartist.Svg.Easing.easeInOutElastic
								}
							});
						}
					});
				}

				var chart = c3.generate({
					bindto: '#discussion',
					data: {
						columns: [
							['Math', <?php $count = 0; foreach($dataDiscussion as $data){ if($data['category'] == 'math'){$count++;}} echo $count;?>],
							['Coding', <?php $count = 0; foreach($dataDiscussion as $data){ if($data['category'] == 'coding'){$count++;}} echo $count;?>],
							['Design', <?php $count = 0; foreach($dataDiscussion as $data){ if($data['category'] == 'design'){$count++;}} echo $count;?>],
							['Science', <?php $count = 0; foreach($dataDiscussion as $data){ if($data['category'] == 'science'){$count++;}} echo $count;?>],
							['History', <?php $count = 0; foreach($dataDiscussion as $data){ if($data['category'] == 'history'){$count++;}} echo $count;?>],
						],

						type: 'donut',
						onclick: function(d, i) { console.log("onclick", d, i); },
						onmouseover: function(d, i) { console.log("onmouseover", d, i); },
						onmouseout: function(d, i) { console.log("onmouseout", d, i); }
					},
					donut: {
						label: {
							show: false
						},
						width: 35,
					},
					legend: {
						hide: true
					},
					color: {
						pattern: ['#12c447', '#c49212', '#c43012', '#11bfbc', '#bf11a8']
					}
				});

				for (var i = 0; i < replyChart.length; i++) {
					replyChart[i].on('draw', function(data) {
						if (data.type === 'line' || data.type === 'area') {
							data.element.animate({
								d: {
									begin: 500 * data.index,
									dur: 500,
									from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
									to: data.path.clone().stringify(),
									easing: Chartist.Svg.Easing.easeInOutElastic
								}
							});
						}
						if (data.type === 'bar') {
							data.element.animate({
								y2: {
									dur: 500,
									from: data.y1,
									to: data.y2,
									easing: Chartist.Svg.Easing.easeInOutElastic
								},
								opacity: {
									dur: 500,
									from: 0,
									to: 1,
									easing: Chartist.Svg.Easing.easeInOutElastic
								}
							});
						}
					});
				}

				var replyChart = c3.generate({
					bindto: '#reply',
					data: {
						columns: [
							['Math', <?php $count = 0; foreach($dataReplyWCat as $data){ if($data['category'] == 'math'){$count++;}} echo $count;?>],
							['Coding', <?php $count = 0; foreach($dataReplyWCat as $data){ if($data['category'] == 'coding'){$count++;}} echo $count;?>],
							['Design', <?php $count = 0; foreach($dataReplyWCat as $data){ if($data['category'] == 'design'){$count++;}} echo $count;?>],
							['Science', <?php $count = 0; foreach($dataReplyWCat as $data){ if($data['category'] == 'science'){$count++;}} echo $count;?>],
							['History', <?php $count = 0; foreach($dataReplyWCat as $data){ if($data['category'] == 'history'){$count++;}} echo $count;?>],
						],

						type: 'donut',
						onclick: function(d, i) { console.log("onclick", d, i); },
						onmouseover: function(d, i) { console.log("onmouseover", d, i); },
						onmouseout: function(d, i) { console.log("onmouseout", d, i); }
					},
					donut: {
						label: {
							show: false
						},
						width: 35,
					},
					legend: {
						hide: true
					},
					color: {
						pattern: ['#12c447', '#c49212', '#c43012', '#11bfbc', '#bf11a8']
					}
				});
			});
		</script>

	</body>
</html>
