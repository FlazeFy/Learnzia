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
