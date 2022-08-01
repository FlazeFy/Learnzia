<?php 
	$count = 0;
	foreach ($listClass as $data){
		foreach ($listRel as $data2){
			if (($data['classname'] == $data2['classname'])&&($data2['username']== $this->session->userdata('userTrack'))){
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
			}
		}
	} 
	
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
