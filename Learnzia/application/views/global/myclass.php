<?php 
	$i = 0; 
	foreach ($listClass as $data){ 
		foreach ($listRel as $data2) {
			if (($data['classname'] == $data2['classname'])&& ($data2['username']== $this->session->userdata('userTrack'))){
				echo "<button class='btn btn-primary' data-toggle='modal' data-target='#classModal".$data['classname']."' aria-expanded='false' 
					aria-controls='multiCollapseExample2' style='background-color: #212121; border:none; margin-bottom:1%; max-width:120px; max-height:120px;'>
					<img src='http://localhost/Learnzia/assets/uploads/classroom/".$data['imageURL'].".jpg' alt='Card image cap' style='width:60px; 
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
