<div id="mySidebar" class="sidebar">
	<img  onclick="closeNav()" href="javascript:void(0)" class="closebtn" src="http://localhost/Learnzia/assets/images/icon/Close.png"
		style="top:2%;" type="button">
		
	<!--Searchbox-->
	<form class="form-inline my-2 my-lg-0" action="">
		<input class="form-control mr-sm-2" type="search" placeholder="Search" id="searchListContact" style="margin-left:5%;" name="search" aria-label="Search">
		<button class="btn btn-primary" style="color:whitesmoke; background-color:#00a13e; border:none;" type="submit">Search</button>
		<img src="http://localhost/Learnzia/assets/images/icon/Add.png" style="margin-left:2%;" type="button" data-toggle="modal" data-target="#messageModal">	
	</form><hr>

	<ul class="list-group" width="200" id="listContact">
		<!--Contact list-->
		<?php 
			$count = 0;
			foreach($contacts as $c){
				foreach($allUser as $au){
					if (($au['id_user'] == $c['id_user_2'])&&($c['id_user_2'] != $this->session->userdata('userIdTrack'))&&($c['id_user_1'] == $this->session->userdata('userIdTrack'))){
						echo "
						<li class='list-group-item mx-3 my-1 p-0' type='button' style='background-color:#212121;' 
							data-toggle='modal' data-target='#message".$c['id_social']."'>
							<div class='card-header' style='width: 25rem; height:5rem;'>
								<img src='http://localhost/Learnzia/assets/uploads/user/".$au['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:50px; height:50px; float:left;
									margin-right:5%'>
								<h5 style='font-size:15.5px; color:#F1C40F;'>".$au['username']."</h5>";
								//User login status
								if($au['status'] == 'online'){
									echo "<p style='font-size:14px; color:#00a13e;'>".$au['status']."</p>";
								} 
								else if($au['status'] == 'offline'){
									echo "<p style='font-size:14px; color:#F14D0F;'>".$au['status']."</p>";
								}
							echo "
							</div>
						</li>"; 
						$count++;
					} else if (($au['id_user'] == $c['id_user_1'])&&($c['id_user_1'] != $this->session->userdata('userIdTrack'))&&($c['id_user_2'] == $this->session->userdata('userIdTrack'))){
						echo "
						<li class='list-group-item mx-3 my-1 p-0' type='button' style='background-color:#212121;' 
							data-toggle='modal' data-target='#message".$c['id_social']."'>
							<div class='card-header' style='width: 25rem; height:5rem;'>
								<img src='http://localhost/Learnzia/assets/uploads/user/".$au['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:50px; height:50px; float:left;
									margin-right:5%;'>
								<h5 style='font-size:15.5px; color:#F1C40F;'>".$au['username']."</h5>";
								//User login status
								if($au['status'] == 'online'){
									echo "<p style='font-size:14px; color:#00a13e;'>".$au['status']."</p>";
								} 
								else if($au['status'] == 'offline'){
									echo "<p style='font-size:14px; color:#F14D0F;'>".$au['status']."</p>";
								}
							echo "
							</div>
						</li>"; 
						$count++;
					} 
				}
			}

			if ($count == 0){
				echo "
				<div class='container' style='margin-top:2%;'>
					<img src='http://localhost/Learnzia/assets/images/Friends.png' alt='Friends.png' style='display: block;
						margin-left: auto; margin-right: auto; width: 30%; height: 30%;'>
					<h5 style='font-size:15.5px; color:#F1C40F; text-align:center;'>You dont have a friend yet</h5>
				</div>";
			}
		?>	
	</ul>  
</div>
