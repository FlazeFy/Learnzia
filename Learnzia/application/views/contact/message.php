<div id="mySidebar" class="sidebar">
	<img  onclick="closeNav()" href="javascript:void(0)" class="closebtn" src="http://localhost/Learnzia/assets/images/icon/Close.png"
		style="top:2%;" type="button">	
	<!--Searchbox-->
	<form class="form-inline my-2 my-lg-0" action="">
		<input class="form-control mr-sm-2" type="search" placeholder="Search" id="searchListContact" style="margin-left:5%;" name="search" aria-label="Search">
		<button class="btn btn-primary" style="color:whitesmoke; background-color:#00a13e; border:none;" type="submit">Search</button>
		<img  onclick="" href="" src="http://localhost/Learnzia/assets/images/icon/Add.png" style="margin-left:2%;" type="button"
			data-toggle="modal" data-target="#messageModal">	
	</form><hr>
	<ul class="list-group" width="200" id="listContact">
		<!--Contact list-->
		<?php 
			$count = 0;
			foreach($contacts as $data){
				if (($data['username2'] != $this->session->userdata('userTrack'))&&($data['username1'] == $this->session->userdata('userTrack'))){
					echo "
					<li class='list-group-item mx-3 my-1 p-0' type='button' style='background-color:#212121;' 
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
						echo "
						</div>
					</li>"; 
					$count++;
				} else if (($data['username1'] != $this->session->userdata('userTrack'))&&($data['username2'] == $this->session->userdata('userTrack'))){
					echo "
					<li class='list-group-item mx-3 my-1 p-0' type='button' style='background-color:#212121;' 
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
						echo "
						</div>
					</li>"; 
					$count++;
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
		
	</ul>  
</div>
