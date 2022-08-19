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
			img {height: 30px;width: 30px;} .form-control{color:whitesmoke; background:#212121; border-width: 0 0 3px; 
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
					<div class="card rounded mb-3 shadow p-4" style='background-color:#282828;'>
						<div class="card-block little-profile text-center">
							<img id='icon' src='http://localhost/Learnzia/assets/uploads/user/<?php foreach ($dataUser as $data) {echo $data['imageURL'];} ?>.jpg' alt='' class='rounded-circle img-fluid' 
							style='width:120px; height:120px; margin-top:5%;'>
							<h4 style=''><?php foreach ($dataUser as $data) {echo $data['username'];} ?></h4>
							<div class="row text-center m-t-20">
								<?php
									//Miniprofile
									$this->load->view("profile/miniprofile");
								?>
							</div>
						</div>
					</div>
				
					<h4>Friends</h4>
					<div class="card rounded mb-3 shadow py-2" style='background-color:#282828;overflow-y: initial;'>
						<div class="container" style="max-height: calc(60vh - 120px); max-width:auto; overflow-y: auto;">
							<?php
								//Friends
								$this->load->view("profile/friends");
							?>
						</div>
					</div>

					<h4>Classroom</h4>
					<div class="card rounded mb-3 shadow py-2" style='background-color:#282828; overflow-y: initial;'>
						<div class="container" style="max-height: calc(60vh - 120px); max-width:auto; overflow-y: auto;">
							<?php
								//Class
								$this->load->view("profile/class");
							?>
						</div>
					</div>
                </div>

				<div class="col-lg-8 col-xlg-9 col-md-7" style='margin-bottom:2%;'>
					<div class="card rounded shadow" style='border-radius:5px; background-color:#282828;'>
						<ul class="nav nav-tabs profile-tab" role="tablist">
							<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">About me</a> </li>
							<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#edit" role="tab">Edit Profile</a> </li>
							<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#activity" role="tab">Activity</a> </li>
							<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#invitation" role="tab">Invitation</a> </li>
						</ul>

						<div class="tab-content">
							<div class="tab-pane" id="activity" role="tabpanel" style='overflow-y: initial;'>
								<?php
									//Activity
									$this->load->view("profile/activity");
								?>
							</div>
							<div class="tab-pane active" id="profile" role="tabpanel">
								<?php
									//About
									$this->load->view("profile/about");
								?>
							</div>
							<div class="tab-pane" id="edit" role="tabpanel">
								<?php
									//Edit
									$this->load->view("profile/form/edit");
								?>
							</div>

							<div class="tab-pane" id="invitation" role="tabpanel" style='overflow-y: initial;'>
								<?php
									//Invitation
									$this->load->view("profile/invitation");
								?>
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
		<?php
			$this->load->view('global/classprofile');
		?>	

		<!-- Preview Class invitation modal. -->
		<?php
			$this->load->view('profile/seeclass');
		?>	

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

		
		<!-- Modal Share question-->
		<?php
			$this->load->view('home/form/shareQuestion');
		?>

		<!-- Modal Share reply-->
		<?php
			$this->load->view('home/form/shareReply');
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

		<!--Others CDN-->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>  
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
		<script src="assets/js/d3/d3.min.js"></script>
		<script src="assets/js/c3-master/c3.min.js"></script>
		
		<!-- chartist chart -->
		<script src="assets/js/chartist-js/dist/chartist.min.js"></script>
		<script src="assets/js/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
		
		<script type="text/javascript">
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
						['Math', <?php $count = 0; foreach($myDiscussion as $data){ if($data['category'] == 'math'){$count++;}} echo $count;?>],
						['Coding', <?php $count = 0; foreach($myDiscussion as $data){ if($data['category'] == 'coding'){$count++;}} echo $count;?>],
						['Design', <?php $count = 0; foreach($myDiscussion as $data){ if($data['category'] == 'design'){$count++;}} echo $count;?>],
						['Science', <?php $count = 0; foreach($myDiscussion as $data){ if($data['category'] == 'science'){$count++;}} echo $count;?>],
						['History', <?php $count = 0; foreach($myDiscussion as $data){ if($data['category'] == 'history'){$count++;}} echo $count;?>],
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
						['Math', <?php $count = 0; foreach($myReply as $data){ if($data['category'] == 'math'){$count++;}} echo $count;?>],
						['Coding', <?php $count = 0; foreach($myReply as $data){ if($data['category'] == 'coding'){$count++;}} echo $count;?>],
						['Design', <?php $count = 0; foreach($myReply as $data){ if($data['category'] == 'design'){$count++;}} echo $count;?>],
						['Science', <?php $count = 0; foreach($myReply as $data){ if($data['category'] == 'science'){$count++;}} echo $count;?>],
						['History', <?php $count = 0; foreach($myReply as $data){ if($data['category'] == 'history'){$count++;}} echo $count;?>],
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

		<!--JQuery Upload-->
		<script>
			//Upload file name 
			$('.custom-file-input').on('change', function() { 
				let fileName = $(this).val().split('\\').pop(); 
				$(this).next('.custom-file-label').addClass("selected").html(fileName); 
			});

			//Modal setting.
			$(window).on('load', function() {
				$('#successModal').modal('show');
			});
			$('#successModal').modal({
				backdrop: 'static', 
				keyboard: false
			});  
		</script>

	</body>
</html>
