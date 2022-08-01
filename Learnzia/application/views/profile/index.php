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
		<link rel="stylesheet" type="text/css" href="http://localhost/Learnzia/assets/css/mainStyle2.css"/>

		 <!-- chartist CSS -->
		<link href="http://localhost/Learnzia/assets/css/chartist-js/dist/chartist.min.css" rel="stylesheet">
		<link href="http://localhost/Learnzia/assets/css/chartist-js/dist/chartist-init.css" rel="stylesheet">
		<link href="http://localhost/Learnzia/assets/css/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">

		<style>
			body {background-color: #0A0C10; color:whitesmoke;}
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
										if ($reply['id_user'] == $data['username']){$count++;}}} echo $count; ?></h4>
										<small style='color:whitesmoke;'>Replies</small></div>
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h4><?php $count = 0; foreach ($dataDiscussion as $disc){ foreach ($dataUser as $data) {
										if ($disc['id_user'] == $data['username']){$count++;}}} echo $count; ?></h4>
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
							<div class='card' type='button' style='border: none; background-color:#3b3b3b; margin:1%;'>
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
							<div class='card' type='button' style='border:none; background-color:#3b3b3b; margin:1%;'>
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
                        <div class="card" style='border-radius:5px; border: 3px solid #F1C40F; background-color:#525252; overflow-y: initial; margin-bottom:4%;'>
							<div class="container" style="max-height: calc(60vh - 120px); max-width:auto; overflow-y: auto;">
							<!--Class list-->
							<?php 
								$count = 0;
								foreach ($listClass as $data){foreach ($listRel as $data2){
								if (($data['classname'] == $data2['classname'])&& ($data2['username']== $this->session->userdata('userTrack'))){
								echo "
								<div class='card' type='button' style='border: none; background-color:#3b3b3b; margin:1%;' 
									data-toggle='modal' data-target='#classModal".$data['classname']."'>
									<div class='card-header' style='height:5rem;'>
										<img id='icon' src='http://localhost/Learnzia/assets/uploads/classroom/classroom_".$data['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:50px; height:50px; float:left;
											margin-right:5%'>
										<h5 style='font-size:15.5px; color:#F1C40F;'>/".$data['classname']."</h5>
										<h5 style='font-size:14px; color:#7289da;'>".$data['category']."</h5>
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
                    <div class="col-lg-8 col-xlg-9 col-md-7" style='margin-bottom:2%;'>
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
												<div class='card' style='border-radius:5px; border-bottom: 3.5px solid #F1C40F; background-color:#3b3b3b; margin:2%;'>
												<div class='card-header' id='headingOne' style='border-bottom: 1px solid #858585;'>
													<img id='icon' src='http://localhost/Learnzia/assets/uploads/user_".$data['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; margin-top: -1%; 
														margin-right:1%; float:left;'>";
												if($data['id_user'] == $this->session->userdata('userTrack')){
													echo"<h5 style='font-size:20px; float:left;'>You</h5>";
												} else {
													echo"<h5 style='font-size:20px; float:left;'>".$data['id_user']."</h5>";
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
														<img id='icon' src='http://localhost/Learnzia/assets/Images/icon/View.png' style='width:25px; height:25px; float:right; margin-top:-5px; padding-left:5px;'>
													<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$data['up']."</h6>
														<img id='icon' src='http://localhost/Learnzia/assets/Images/icon/Up.png' style='width:25px; height:22px; float:right; margin-top:-4px; padding-left:5px;'>
													<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$data['comment']."</h6>
														<img id='icon' src='http://localhost/Learnzia/assets/Images/icon/Comment.png' style='width:25px; height:20px; float:right; margin-top:-2px; padding-left:5px;'>
													<h5 style='font-size:15px; float:left; text-decoration:underline;' type='button' data-toggle='collapse' data-target='#collapse".$i."' 
													aria-expanded='true' aria-controls='collapseOne''>See Reply
														<img id='icon' src='http://localhost/Learnzia/assets/Images/icon/Down.png' style='width:25px; height:20px; float:left; padding-left:3px;'></h5>
												</div>
												<!--Extend-->
												<div id='collapse".$i."' class='collapse' aria-labelledby='headingOne' data-parent='#accordion2'>
													<div class='card-body' style='background-color:#424242;'>";
														foreach ($dataReply as $data2){
														if ($data2['id_discussion'] == $data['id_discussion']){
														echo"<div class='container'>
															<img id='icon' src='http://localhost/Learnzia/assets/uploads/user_".$data2['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; 
																float:left; margin-right:1%;'>";
															if($data2['id_user'] == $this->session->userdata('userTrack')){
																echo"<h5 style='font-size:20px; margin-left:15px;'>You</h5>";
															} else {
																echo"<h5 style='font-size:20px; margin-left:15px;'>".$data2['id_user']."</h5>";
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
												<h4 style='font-style:italic; text-align:center; font-size:18px;'>You haven't post any discussion yet...</h4>
												<p style='font-style:italic; text-align:center; font-size:16px; color:#7289da;'>Lets discuss with other people by create a discussion in 
												<a style='text-decoration:underline; font-size:16px; color:#F1C40F;' href='homeCtrl'>Home </a> menu.</p>
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
                                        <form method='post' action='profileCtrl/updateProfile'>
											<div class="form-group mb-3">
											<label class="label" for="description" style="color:#F1C40F;">Description</label>
												<textarea class='form-control w-75' rows="5" name="description" style="background:#212121; border-width: 0 0 3px; 
												border-bottom: 3.5px solid #F1C40F; color:whitesmoke;" 
												value='<?php foreach ($dataUser as $data) {echo $data['description'];} ?>'
													required> <?php foreach ($dataUser as $data) {echo $data['description'];} ?></textarea>
											</div>

											<div class="form-group mb-3">
												<label class="label" for="password" style="color:#F1C40F;">Password</label>
												<input type="password" class="form-control w-75" placeholder="Password" style="background:#212121; border-width: 0 0 3px; 
													border-bottom: 3.5px solid #F1C40F; color:whitesmoke;" value='<?php foreach ($dataUser as $data) {echo $data['password'];} ?>'
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
										<?php $count=0; 
										foreach($dataInvitation as $invitation){
											if($invitation['type'] != 'friend'){
												foreach ($listClass as $class){
												if($invitation['type'] == $class['classname']){
												echo "
												<div class='card' style='border: none; background-color:#3b3b3b; margin:1%; border-radius:5px;'>
													<div class='card-header' style=''>
														<h5 style='font-size:17px; color:whitesmoke;'>".$invitation['id_user_sender']." invite you to join a class</h5>
														<p style='font-size:12px; color:#whitesmoke; font-style:italic;'>Since ".$invitation['datetime']."</p>
														<h5 style='font-size:15px; float:left; text-decoration:underline;' type='button' data-toggle='collapse' data-target='#collapse".$count."' 
															aria-expanded='true' aria-controls='collapseOne''>See Detail
														<img id='icon' src='http://localhost/Learnzia/assets/Images/icon/Down.png' style='width:25px; height:20px; float:left; padding-left:3px;'></h5>
														<form method='post' action='profileCtrl/rejectInvit'>
															<input type='text' class='form-control' name='id_invitation' value='".$invitation['id_invitation']."' hidden>
															<button class='btn btn-danger' type='submit' style='border:none; float:right; margin-top:-5px;'>Reject</button>
														</form>
														<form method='post' action='profileCtrl/accInvit'>
															<input type='text' class='form-control' name='id_invitation' value='".$invitation['id_invitation']."' hidden>
															<input type='text' class='form-control' name='classname' value='".$invitation['type']."' hidden>
															<button class='btn btn-success' type='submit' style='border:none; float:right; margin-top:-5px; margin-right:2%;'>Accept</button>
														</form>
													</div>
													<div id='collapse".$count."'  class='collapse'>
														<div class='card-body' style='background-color:#424242; border-radius:5px;'>
															<img id='icon' src='http://localhost/Learnzia/assets/uploads/classroom/classroom_".$class['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:50px; height:50px; float:left;
																margin-right:5%'>
															<h5 style='font-size:15.5px; color:#F1C40F;'>/".$invitation['type']."</h5>
															<h5 style='font-size:15.5px; color:#7289da;'>".$class['category']."</h5>
															<button class='btn btn-primary' style='border:none; background-color:#e69627; float:right; margin-top:-40px;' data-toggle='modal' 
																data-target='#seeClassModal".$class['classname']."'>See Class</button>
														</div>
													</div>
												</div>"; $count++;
												} /*break;*/}
											} //else {

											//}
										}
										if ($count == 0){
											echo "<div class='container' style='margin-top:5%; margin-bottom:5%;'>
												<img src='http://localhost/Learnzia/assets/images/Invitation.gif' alt='Invitation.gif' style='display: block;
													margin-left: auto; margin-right: auto; width: 50%; height: 50%;'>
												<h4 style='font-style:italic; text-align:center; font-size:18px;'>You don't have any incoming invitation...</h4>
											</div>";
										}
										?>
									</div>
								</div>

                            </div>
                        </div>
                    </div>
                </div>

		</div>

		<!--Footer.-->
		<?php
			$this->load->view('others/footer');
		?>
		
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
							<div class='card' style='border-radius:5px; border: 3px solid #F1C40F; background-color:#525252; margin-bottom:5%;
								'>
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
						<button class='btn btn-primary' style='color:white; float:right; background-color:#00a13e; margin-left:1%; border:none;'>Open Class</button>	
					</div>			
					</div>
				</div>
				</div>";	
		}}}?>

		<!-- Preview Class invitation modal. -->
		<?php foreach ($listClass as $class){ 
			echo"<div class='modal fade' id='seeClassModal".$class['classname']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
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
							<div class='card' style='border-radius:5px; border: 3px solid #F1C40F; background-color:#525252; margin-bottom:5%;
								'>
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
										echo "<h5 style='font-size:15.5px; color:#7289da;'>".$user['username']."</h5>
										<p style='font-size:13px; color:whitesmoke; font-style:italic;'>".$class['date']."</p>";
									}}}}
							echo"</div>
							</div>
						</div>
					</div>
					</div>			
					</div>
				</div>
				</div>";	
		}?>

		<!-- Zoom discussion image Modal -->
		<?php
			$this->load->view('others/zoom');
		?>

		<!--Modal validation.-->
		<?php
			$this->load->view('others/failed');
		?>
		<?php
			$this->load->view('others/success');
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

		<!-- Accept invite Modal -->
		<?php if(isset($success_join)) { echo"
		<div class='modal fade' id='errorModalInvit' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
		<div class='modal-dialog' role='document'>
			<div class='modal-content' style='background-color:#313436;'>
			<div class='modal-header'>
				<h5 class='modal-title'>Welcome to ".$success_join."</h5>
				<img id='icon'  class='closebtn' src='http://localhost/Learnzia/assets/images/icon/Close.png'
					type='button' data-dismiss='modal' aria-label='Close' onClick='refreshMessage()'>
			</div>
			<div class='modal-body'>";
				foreach($listClass as $class){
					if ($class['classname'] == $success_join){
					echo "<img src='http://localhost/Learnzia/assets/uploads/classroom/classroom_".$class['imageURL'].".jpg' alt='".$data['imageURL'].".jpg' 
						style='display: block; margin-left: auto; margin-right: auto; width: 70%; height: 70%;' class='rounded-circle img-fluid'>"; 
				}}
				echo "<h5 class='' style='text-align:center; font-color:whitesmoke;'>Hope you enjoyed this class</h5>
			</div>
			<div class='modal-footer'>
				<button class='btn btn-primary' style='color:white; float:right; background-color:#00a13e; margin-left:1%; border:none;'>Open Class</button>	
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
				window.location.href="http://localhost/Learnzia/profileCtrl";  
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

		//List friends who doesnt join specific classroom.
		<?php 
			foreach ($listRel as $rel){foreach ($listClass as $class) {
				if (($class['classname'] == $rel['classname'])&& ($rel['username']== $this->session->userdata('userTrack'))){
					echo "var list".$class['classname']."= [";
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

		/*initiate the autocomplete function on the "mycontacts" element, and pass along the contacts array as possible autocomplete values:*/
		autocomplete(document.getElementById("mycontacts"), contacts);
		<?php 
			foreach ($listClass as $class){foreach ($listRel as $rel) {
				if (($rel['classname'] == $class['classname'])&& ($rel['username']== $this->session->userdata('userTrack'))){
					echo"autocomplete(document.getElementById('available4".$class['classname']."'), list".$class['classname'].");";
			}}}
		?>
		</script>

		<!--Others CDN-->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>  
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
		<script src="assets/js/d3/d3.min.js"></script>
		<script src="assets/js/c3-master/c3.min.js"></script>
		
		<!-- chartist chart -->
		<script src="assets/js/chartist-js/dist/chartist.min.js"></script>
		<script src="assets/js/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>

		<!--JQuery Upload-->
		<script>
			//Upload file name 
			$('.custom-file-input').on('change', function() { 
				let fileName = $(this).val().split('\\').pop(); 
				$(this).next('.custom-file-label').addClass("selected").html(fileName); 
			});

			$(window).on('load', function() {
				$('#errorModalInvit').modal('show');
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
