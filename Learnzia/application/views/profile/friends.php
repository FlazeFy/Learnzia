<?php 
	$count = 0;
	foreach($contacts as $data){
		foreach($allUser as $u){
			if (($data['id_user_2'] != $this->session->userdata('userIdTrack'))&&($data['id_user_1'] == $this->session->userdata('userIdTrack'))&&($u['id_user'] == $data['id_user_2'])){
			echo "
			<div class='card' type='button' style='border: none; background-color:#3b3b3b; margin:1%;'>
				<div class='card-header' style='height:5rem;'>
					<img id='icon' src='http://localhost/Learnzia/assets/uploads/user_".$u['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:50px; height:50px; float:left;
						margin-right:5%'>
					<h5 style='font-size:15.5px; color:#F1C40F;'>".$u['username']."</h5>";
					//User login status
					if(($u['status'] == 'online')&&($u['id_user']==$data['id_user_2'])){
						echo "<p style='font-size:14px; color:#00a13e;'>".$u['status']."</p>";
					} 
					else if(($u['status'] == 'offline')&&($u['id_user']==$data['id_user_2'])){
						echo "<p style='font-size:14px; color:#F14D0F;'>".$u['status']."</p>";
					}
				echo "</div>
			</div>"; $count++;
			} else if (($data['id_user_1'] != $this->session->userdata('userIdTrack'))&&($data['id_user_2'] == $this->session->userdata('userIdTrack'))&&($u['id_user'] == $data['id_user_1'])){
			echo "
			<div class='card' type='button' style='border:none; background-color:#3b3b3b; margin:1%;'>
				<div class='card-header' style='height:5rem;'>
					<img id='icon' src='http://localhost/Learnzia/assets/uploads/user_".$u['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:50px; height:50px; float:left;
						margin-right:5%;'>
					<h5 style='font-size:15.5px; color:#F1C40F;'>".$u['username']."</h5>";
					//User login status
					if(($u['status'] == 'online')&&($u['id_user']==$data['id_user_1'])){
						echo "<p style='font-size:14px; color:#00a13e;'>".$u['status']."</p>";
					} 
					else if(($u['status'] == 'offline')&&($u['id_user']==$data['id_user_1'])){
						echo "<p style='font-size:14px; color:#F14D0F;'>".$u['status']."</p>";
					}
				echo "</div>
			</div>"; $count++;
			} 
		}
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
