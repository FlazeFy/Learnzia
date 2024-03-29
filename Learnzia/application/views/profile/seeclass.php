<?php 
	foreach ($listClass as $class){ 
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
									<img id='icon' src='http://localhost/Learnzia/assets/uploads/user/".$user['username'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' 
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
								echo "<img id='icon' src='http://localhost/Learnzia/assets/uploads/user/".$user['username'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' 
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
	}
?>
