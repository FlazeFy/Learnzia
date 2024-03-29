<!DOCTYPE html>
<html>
    <head>
        <title>Learnzia || Global >> Classroom</title>
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
			footer  {background-color: #212121; color:whitesmoke; position: relative; bottom: 0; padding: 2rem;}
			.navbar {position: fixed; width:100%; z-index:1;}
			a {color:#F1C40F; text-decoration:none !important;}
			.active {border-radius: 4px; border-bottom: 4.5px solid rgb(40, 207, 54); position: relative;bottom: 5%;}
			#icon {height: 30px;width: 30px;} .form-control{color:whitesmoke; background:#212121; border-width: 0 0 3px; 
				border-bottom: 3.5px solid #F1C40F;}
			hr {background-color: whitesmoke;}
			h4 {color:#F1C40F;} h5 {color:#F1C40F;}
			#menu {background-color: #212121; border-radius:5px; margin-bottom:1%;}
			.dropdown-menu{background-color: #212121; border-color:#F1C40F;} .dropdown-item{color:#F1C40F;}
			.nav-tabs .nav-link.active{background-color:#7289da; color:whitesmoke; border:none; margin-top:2%;}
			.tab-pane.active{border:none;} #channel {color: whitesmoke; width:100%;}
			a.nav-link:hover{color:#7289da;} 
			.dropdown-item:hover{color:whitesmoke; background-color:#7289da;}
			.form-control:focus{
				color:whitesmoke;
			}
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
		<br><br><br>
		<h2 style='margin-left: 13%; color:whitesmoke; font-size:20px;'><a style='color:whitesmoke; font-size:20px;' href='globalCtrl'>Global </a> 
			>> <a><?= $data = $this->session->userdata('classTrack');?></a></h2>
		<div class="container" id="menu">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs profile-tab" role="tablist">
				<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#forum" role="tab">Forum</a> </li>
				<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#activity" role="tab">Activity</a> </li>
				<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#member" role="tab">Member</a> </li>
				<?php foreach ($listRel as $rel){
					if (($rel['classname'] == $this->session->userdata('classTrack'))&&(($rel['typeRelation']=='founder')||($rel['typeRelation']=='co-founder'))
						&&($rel['username']== $this->session->userdata('userTrack'))){
						echo "<li class='nav-item'> <a class='nav-link' data-toggle='tab' href='#classProfilEdit' role='tab'>Class Profil</a> </li>";
					} else if (($rel['classname'] == $this->session->userdata('classTrack'))&&($rel['typeRelation']=='member')
						&&($rel['username']== $this->session->userdata('userTrack'))){
						echo "<li class='nav-item'> <a class='nav-link' data-toggle='tab' href='#classProfil' role='tab'>Class Profil</a> </li>";
					}
				}
				?>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content" style='min-height:550px;'>
				<div class="tab-pane active" id="forum" role="tabpanel">
					<div class="row">
						<div class="col-2">
							<div class='container-fluid' style='overflow-y: initial; width:120%; min-width:120px; margin-left:-20%; margin-top:10%;'>
							<!-- Tab navs -->
							<div class="nav nav-tabs text-center border-0" id="v-tabs-tab" role="tablist" aria-orientation="vertical"
								style='max-height: calc(90vh - 150px); max-width:auto; overflow-y: auto;'>
								<div class="container-fluid m-0">
									<form action='classCtrl/selectChannel' method='POST'>
										<input name='id_channel' value='manage' hidden></input>
										<button class="nav-link" type="submit" style='width:100%; color:whitesmoke; background:#00a13e;'>Manage Channel</button>
									</form>
								</div>
								<div class="container-fluid m-0">
									<form action='classCtrl/selectChannel' method='POST'>
										<input name='id_channel' value='main' hidden></input>
										<button class="nav-link active w-100" type="submit">#Main</button>
									</form>
								</div>
								<?php
									foreach($listChannel as $channel){
										echo"
										<div class='container-fluid m-0'>
											<form action='classCtrl/selectChannel' method='POST'>
												<input name='id_channel' value='".$channel['id_channel']."' hidden></input>
												<button class='nav-link active w-100' type='submit'>#".$channel['channel_name']."</button>
											</form>
										</div>";
									}
								?>
							</div>
							<!-- Tab navs -->
							</div>
						</div>

						<div class="col-9">
						<!-- Tab content -->
						<div class="tab-content" >
							<!-- Manage Channel -->
							<?php
								if($this->session->userdata('channelTrack') == "manage"){
									echo"
									<div class='tab-pane active'>
										<div class='container-fluid p-2'>";
											$i = 0;
											foreach($listRel as $lr){
												if(($this->session->userdata('userTrack') == $lr['username'])&&($lr['typeRelation'] != 'member')&&($this->session->userdata('classTrack') == $lr['classname'])){
													$i = 1;
													echo"
														<div class='row my-3'>
															<div class='col-md'>
																<div class='container-fluid p-0'>
																	<h4 class='text-white my-2'>Create New Channel</h4>
																	<form method='post' action='classCtrl/createChannel'>
																	<label class='label' for='name' style='color:#F1C40F;'>Channel Name</label>
																	<input class='form-control mb-2' name='channel_name' type='text' style='background:#303335;' required>
																	<label class='label' for='name' style='color:#F1C40F;'>Channel Description</label>
																	<textarea class='form-control mb-2' name='channel_description' type='text' style='background:#303335;' rows='3' required></textarea>
																	<button class='btn btn-success my-2 d-block' type='submit'><i class='fa-solid fa-plus'></i> Create</button>
																	</form>
																</div>

																<br><hr>
																<div class='container-fluid p-0'>
																	<h4 class='text-white my-2'>Channel's Statistics</h4>
																	
																</div>
															</div>
															<div class='col-md'>
																<h4 class='text-white my-2'>List Channel</h4>";
																foreach($listChannel as $channel){
																	echo"
																	<div class='container-fluid m-2 p-3 rounded' style='background:#313436;'>
																		<div class='row'>
																			<div class='col-md-8'>
																				<h7 class='text-white my-auto'>#".$channel['channel_name']."</h7><br>
																				<a class='text-white my-auto'>".$channel['channel_description']."</a>
																			</div>
																			<div class='col-md-4'>
																				<a class='btn btn-info border-0' data-toggle='modal' data-target='#updateChannelModal-".$channel['id_channel']."' style='background:#f1c40f;'><i class='fa-solid fa-pen-to-square'></i></a>
																				<a class='btn btn-danger' data-toggle='modal' data-target='#deleteChannelModal-".$channel['id_channel']."'><i class='fa-solid fa-trash-can'></i></a>
																			</div>
																		</div>
																	</div>";
																}
															echo"
															</div>
														</div>
													";
												}
											}
											if($i == 0){
												echo "
												<div class='container p-2'>
													<img class='d-block mx-auto w-25' src='http://localhost/Learnzia/assets/images/Invitation.gif' alt='Invitation.gif'>
													<h4 style='font-style:italic; text-align:center; font-size:16px;'>You don't have access to this feature. Please contact your classroom's founder or co-founder</h4>
												</div>";
											}
										echo"
										</div>
									</div>";
								} else {
									echo"
									<div class='tab-pane active'>
										<div class='imessage' style='max-height: 480px; max-width:auto; overflow-y: auto; height:800px;' id='chat-box'>";
											foreach($dataClassForumMsg as $chat){
												if ($chat['id_user'] != $this->session->userdata('userIdTrack')){
												echo"<p class='from-them'>";
													if($chat['imageURL'] != 'null'){
														echo"<img src='http://localhost/Learnzia/assets/uploads/channel/main_".$chat['imageURL'].".jpg' alt='Card image cap' style='width:200px; height:200px;
														margin:1%; border-radius:6px;'>";
													}
													echo"<img id='icon' src='http://localhost/Learnzia/assets/uploads/user_".$chat['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; float:left;
													margin-right:2%'>".$chat['text']."<br><a style='color:#e69627; font-size:13.5px; font-style:italic;'>~ ".$chat['sender']." on ".$chat['datetime']."</a>
												</p>";
												} else if($chat['id_user'] == $this->session->userdata('userIdTrack')){
												echo"<p class='from-me'>";
													if($chat['imageURL'] != 'null'){
														echo"<img src='http://localhost/Learnzia/assets/uploads/channel/main_".$chat['imageURL'].".jpg' alt='Card image cap' style='width:200px; height:200px;
														margin:1%; border-radius:6px;'>";
													}
													echo"<img id='icon' src='http://localhost/Learnzia/assets/uploads/user_".$this->session->userdata('userTrack').".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; float:right;
													margin-left:2%'>".$chat['text']."<br><a style='color:#212121; font-size:13.5px; font-style:italic;'>~ You on ".$chat['datetime']."</a>
												</p>";
												}}
										echo"
										</div>
										<div class='container' style='min-width:110%; margin-bottom:2%;'>
										<form method='post' action='classCtrl/sendMainChat' class='form-inline' enctype='multipart/form-data'>
											<div class='container'>
												<label class='switch' style='float:left; margin-right:1%;'>
												<input type='checkbox' name='imageSwitchMain'>
													<span class='slider round' type='button' data-toggle='collapse' data-target='#collapseImageMain'></span>
												</label>
												<a style='color:whitesmoke; float:left;'>Image</a>
												<button class='btn btn-primary' style='color:whitesmoke; background-color:#00a13e; float:right; border:none;' type='submit'>Send</button>
												<input class='form-control' type='text' placeholder='Type your message here...' style='width:50%; float:right; margin-right:1%;' name='messagetext'>
												<div class='collapse' id='collapseImageMain'>
													<div class='container' style='width:50%; float:right; margin-top:2%; margin-right:-2%;'>
														<div class='input-group mb-3' style='background-color:#212121; border-width: 0 0 3px; border-bottom: 3.5px solid #F1C40F; 
															border-radius:5px;'>
															<div class='input-group-prepend'>
																<span class='input-group-text'>jpg</span>
															</div>
															<div class='custom-file'>
																<input type='file' class='custom-file-input' id='uploadImage' name='uploadImageMainChat' accept='image/*'>
																<label class='custom-file-label text-left' for='uploadImage'>file size max 2 mb</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</form>
										</div>
									</div><!--End of channel-->";
								} 
							?>
							

						</div>
						<!-- Tab content -->
						</div>
					</div>
				</div>

				<div class="tab-pane" id="activity" role="tabpanel" style='overflow-y: initial;'>
					<h4 class="m-2">Activity</h4>
					<div class="container" style='max-height: 500px; overflow-y: auto;'>
						<?php 
							foreach($listActivity as $activity){
								echo"
									<div class='card-header rounded mb-2' style='background:#313436; height:80px;'>
									<img id='icon' src='http://localhost/Learnzia/assets/uploads/user_".$activity['username'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' 
									style='width:50px; height:50px; float:left; margin-right:2%;'>";
								if ($activity['username'] == $this->session->userdata('userTrack')){
									echo"
									<h5 style='font-size:15.5px; color:#F1C40F;'>You</h5>";
								} else {
									echo"
									<h5 style='font-size:15.5px; color:#F1C40F;'>".$activity['username']."</h5>";
								}
								echo $activity['context']." <span class='text-secondary font-italic text-small' style='font-size:12px;'> ~ ".$activity['datetime']."</span>
								</div>";
							}
						?>
					</div>
				</div>

				<div class="tab-pane" id="member" role="tabpanel" style='overflow-y: initial;'>
					<h4 class="m-2">Member</h4>
					<div class="container" style='max-height: 500px; overflow-y: auto;'>
						<?php 
							foreach ($listRel  as $member){
								if($member['classname'] == $this->session->userdata('classTrack')){
									echo"
										<div class='card-header' style='background:#313436; border-radius:6px; margin-bottom:6px;'>
										<img id='icon' src='http://localhost/Learnzia/assets/uploads/user_".$member['username'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' 
										style='width:50px; height:50px; float:left; margin-right:2%; margin-top:6px'>";
									if ($member['username'] == $this->session->userdata('userTrack')){
										echo"
										<h5 style='font-size:15.5px; color:#F1C40F;'>You</h5>";
									} else {
										echo"
										<h5 style='font-size:15.5px; color:#F1C40F;'>".$member['username']."</h5>";
									}
									if($member['typeRelation'] == 'founder'){
										echo"<p style='font-size:14px; color:#7289da; font-weight:bold;'>".$member['typeRelation']."</p>";
									}
									else if($member['typeRelation'] == 'co-founder') {
										echo"
										<p style='font-size:14px; color:#00a13e;'>".$member['typeRelation']."</p>";
									}
									else {
										echo"<p style='font-size:14px; color:whitesmoke;'>".$member['typeRelation']."</p>";
									}
								echo"<button class='btn btn-success' type='submit' style='border:none; float:right; margin-right:2%; margin-top:-50px;'>View Profile</button>";
								//Manage member
								foreach($listRel as $search){
									if(($search['username'] == $this->session->userdata('userTrack'))&&($search['classname'] == $this->session->userdata('classTrack'))){
										$role = $search['typeRelation']; 
									}
								}
								if (($role == 'founder')&&($member['username'] != $this->session->userdata('userTrack'))){
								echo"<div class='dropdown' style='float:right; margin-right:140px; margin-top:-50px;'>
										<button class='btn btn-secondary dropdown-toggle' style='color:whitesmoke; background-color:#e69627; border:none;' 
											data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Manage</button>
										<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";
											if ($member['typeRelation'] != 'co-founder'){
												echo"<a class='dropdown-item' href='#' style='color:#11ab26;'>Promote</a>";
											} else if ($member['typeRelation'] == 'co-founder'){
												echo"<a class='dropdown-item' href='#'>Make new founder</a>";
											}
											if ($member['typeRelation'] != 'member'){
												echo"<a class='dropdown-item' href='#' style='color:#df4759;'>Demote</a>";
											}
											echo"<a class='dropdown-item' href='#' style='color:whitesmoke; background:#df4759;'>Kick Out</a>
										</div>
									</div>";
								} else if (($role == 'co-founder')&&($member['username'] != $this->session->userdata('userTrack'))&&($member['typeRelation'] == 'member')){
								echo"<div class='dropdown' style='float:right; margin-right:140px; margin-top:-50px;'>
									<button class='btn btn-secondary dropdown-toggle' style='color:whitesmoke; background-color:#e69627; border:none;' 
										data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Manage</button>
									<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
										<a class='dropdown-item' href='#' style='color:#11ab26;'>Promote</a>
										<a class='dropdown-item' href='#' style='color:whitesmoke; background:#df4759;'>Kick Out</a>
									</div>
								</div>";
								} 
						echo"</div>";
							}
						}?>
					</div>
				</div> 

				<?php 
					foreach ($myRel as $rel){
						if (($rel['typeRelation']=='founder')||($rel['typeRelation']=='co-founder')){
							echo "
							<div class='tab-pane' id='classProfilEdit' role='tabpanel' style='overflow-y: initial;'>
								<div class='container px-3' style='max-height: 500px; overflow-y: auto;'>
									<h4 class='m-2'>/".$rel['classname']."</h4>
									<div class='row'>
										<div class='col-md-3 text-center'>
											<img class='img-fluid rounded mb-3' src='http://localhost/Learnzia/assets/uploads/classroom/".$rel['imageURL'].".jpg' alt='Card image cap' style='width:225px; 
											height:225px; border: 2.5px solid #F1C40F;'>
											<label class='label' for='name' style='color:#F1C40F;'>Date Created</label><br>
											<a class='text-white' style='font-size:14px;'>".$rel['date']."</a><br>
										</div>
										<div class='col-md-5'>
											<form action='classCtrl/updateClassData' method='POST'>
											<input name='id_classroom' value='".$rel['id_classroom']."' hidden>
											<div class='row'>
												<div class='col-md'>
													<label class='label' for='name' style='color:#F1C40F;'>Class Name</label>
													<input type='text' class='form-control mb-1' name='classname' value='".$rel['classname']."' style='background:#313436;' required>
												</div>
												<div class='col-md'>
													<div class='form-group'>
														<label class='label' for='name' style='color:#F1C40F;'>Class Type</label>
														<select class='form-control' id='classType' name='type' style='background:#313436;'>
															<option"; if($rel['type'] == "public"){echo" selected ";} echo" value='public'>Public</option>
															<option"; if($rel['type'] == "private"){echo" selected ";} echo" value='private'>Private</option>
														</select>
													</div>
												</div>
											</div>
											<label class='label' for='Class Description' style='color:#F1C40F;'>Class Description</label>
											<textarea class='form-control my-2' rows='5' style='background:#313436;' name='description' required>".$rel['description']."</textarea>
											<div class='row'>
												<div class='col-md'>
													<div class='form-group'>
														<label class='label' for='name' style='color:#F1C40F;'>Class Category</label>
														<select class='form-control' id='classCategory' name='category' style='background:#313436;'>
															<option"; if($rel['category'] == "math"){echo" selected ";} echo" value='math'>Math</option>
															<option"; if($rel['category'] == "coding"){echo" selected ";} echo" value='coding'>Coding</option>
															<option"; if($rel['category'] == "design"){echo" selected ";} echo" value='design'>Design</option>
															<option"; if($rel['category'] == "science"){echo" selected ";} echo" value='science'>Science</option>
															<option"; if($rel['category'] == "history"){echo" selected ";} echo" value='history'>History</option>
															<option"; if($rel['category'] == "multi"){echo" selected ";} echo" value='multi'>Multi</option>
														</select>
													</div>
												</div>
												<div class='col-md'>
													<button type='submit' class='btn btn-success mt-4'>Save Changes</button>
												</div>
											</div>
											</form>
										</div>
									</div>
								</div>
							</div>";
						} else {
							echo "
							<div class='tab-pane' id='classProfil' role='tabpanel' style='overflow-y: initial;'>
								<div class='container' style='max-height: 500px; overflow-y: auto;'>
									<h4 class='m-2'>/".$rel['classname']."</h4>
									
								</div>
							</div>";
						}
					}
				?>
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
				<form method='POST' action='<?php echo site_url().'classCtrl/signOut'; ?>'>
				<button type="submit" class="btn btn-primary" style='background-color:#e69627; border:none;'>Yes, Sign Out</button></form>
			</div>			
			</div>
		</div>
		</div>		
		
		<!-- Delete Channel Modal -->
		<?php
			foreach($listChannel as $channel){
				echo"
				<div class='modal fade' id='deleteChannelModal-".$channel['id_channel']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
				<div class='modal-dialog' role='document'>
					<div class='modal-content' style='background-color:#313436;'>
					<div class='modal-header'>
						<h5 class='modal-title' id='exampleModalLabel'>Warning</h5>
                        <button type='button' class='btn-close' data-dismiss='modal' aria-label='Close'></button>
					</div>
					<form method='POST' action='classCtrl/deleteChannel'>
					<div class='modal-body p-4 text-center'>
						<h6>Are you sure want to delete ".$channel['channel_name']." channel</h6>
						<input hidden name='id_channel' value='".$channel['id_channel']."'>
						<input type='text' name='channel_name' class='form-control w-75 d-block mx-auto' required>
						<p class='mt-2' style='font-size:12px; color:#f1c40f;'><i class='fa-solid fa-circle-info'></i> Please type the same channel name for validation</p>
						<button type='submit' class='btn btn-danger border-0 float-right mb-4'>Yes, Delete this</button>
					</div>	
					</form>		
					</div>
				</div>
				</div>";
			}		
		?>

		<!-- Edit Channel Modal -->
		<?php
			foreach($listChannel as $channel){
				echo"
				<div class='modal fade' id='updateChannelModal-".$channel['id_channel']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
				<div class='modal-dialog' role='document'>
					<div class='modal-content' style='background-color:#313436;'>
					<div class='modal-header'>
						<h5 class='modal-title' id='exampleModalLabel'>Edit Channel</h5>
                        <button type='button' class='btn-close' data-dismiss='modal' aria-label='Close'></button>
					</div>
					<div class='modal-body p-4 text-left'>
						<form method='post' action='classCtrl/editChannel'>
						<input hidden name='id_channel' value='".$channel['id_channel']."'>
						<label class='label' for='name' style='color:#F1C40F;'>Channel Name</label>
						<input class='form-control mb-2' name='channel_name' type='text' style='background:#212121;' value='".$channel['channel_name']."' required>
						<label class='label' for='name' style='color:#F1C40F;'>Channel Description</label>
						<textarea class='form-control mb-2' name='channel_description' type='text' style='background:#212121;' rows='3' required>".$channel['channel_description']."</textarea>
						<button class='btn btn-success my-3 float-right' type='submit'>Save Changes</button>
						</form>
					</div>	
					</div>
				</div>
				</div>";
			}		
		?>

		<!-- Modal Add Message -->
		<div class='modal fade' id='messageModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
		<div class='modal-dialog' role='document'>
			<form method='POST' action='<?php echo site_url().'classCtrl/sendMessage'; ?>' autocomplete="off">
				<div class='modal-content' style='background-color:#313436;'>
				<div class='modal-header'>
					<h5 class='modal-title' id='exampleModalLabel' style='color:#e69627; margin-top:1%;'>Send to :</h5>
					<div class="autocomplete" style="width:300px;">
						<input class="form-control mr-sm-2" id="mycontacts" type="search" name="receiver" placeholder="Username" required>
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
						<form method='POST' action='classCtrl/sendRMessage' enctype='multipart/form-data'>
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
						<div class='imessage' style='max-height: calc(80vh - 160px); max-width:auto; overflow-y: auto; height:800px; min-width:100%;' id='chat-box'>";
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
						<form method='POST' action='classCtrl/sendRMessage' enctype='multipart/form-data'>
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
			}
		?>

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

		<?php 
			if(isset($error_message)) { 
				echo"
				<div class='modal fade' id='errorModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
				<div class='modal-dialog' role='document'>
					<div class='modal-content p-3' style='background-color:#313436;'>
						<i class='fa-solid fa-xmark text-white float-right' type='button' data-dismiss='modal' aria-label='Close' onClick='refreshMessage()'></i>
						<img src='http://localhost/Learnzia/assets/images/icon/Wrong.png' width='200' style='display:block; margin-left:auto; margin-right:auto;' class='img-fluid'>
						<h7 class='text-white text-center'>".$error_message."</h7>
					</div>
				</div>
				</div>";
			}
			if(isset($success_message)) { 
				echo"
				<div class='modal fade' id='successModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
				<div class='modal-dialog' role='document'>
					<div class='modal-content p-3' style='background-color:#313436;'>
						<i class='fa-solid fa-xmark text-white float-right' type='button' data-dismiss='modal' aria-label='Close' onClick='refreshMessage()'></i>
						<img src='http://localhost/Learnzia/assets/images/storyset/Channel.png' width='200' style='display:block; margin-left:auto; margin-right:auto;' class='img-fluid'>
						<h7 class='text-white text-center'>".$success_message."</h7>
					</div>
				</div>
				</div>";
			}
		?>

		<script>
			//Side navbar private message
			/* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
			function openNav() {
				document.getElementById("mySidebar").style.width = "360px";
			}

			/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
			function closeNav() {
				document.getElementById("mySidebar").style.width = "0";
			}
			function refreshMessage() {
				window.location.href="http://localhost/Learnzia/classCtrl";  
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
				if (($data['username2'] != $this->session->userdata('userTrack'))&&($data['username1'] == $this->session->userdata('userTrack'))){
					echo "'"; echo $data['username2']; echo "',";
				} else if (($data['username1'] != $this->session->userdata('userTrack'))&&($data['username2'] == $this->session->userdata('userTrack'))){
					echo "'"; echo $data['username1']; echo "',";
				} else if (($data['username1'] != $this->session->userdata('userTrack'))&&($data['username2'] != $this->session->userdata('userTrack'))){
					//do nothing
				}
			}?>]

			autocomplete(document.getElementById("mycontacts"), contacts);
			
			//Chat box setting. show always start from bottom
			var chatBox = document.getElementById("chat-box");
    		chatBox.scrollTop = chatBox.scrollHeight;
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
				$('#errorModal').modal('show');
				$('#successModal').modal('show');
			});
			$('#errorModal').modal({
				backdrop: 'static', 
				keyboard: false
			}); 
			$('#successModal').modal({
				backdrop: 'static', 
				keyboard: false
			}); 
			$('#errorModalInvit').modal({
				backdrop: 'static', 
				keyboard: false
			}); 
		</script>

	</body>
</html>
