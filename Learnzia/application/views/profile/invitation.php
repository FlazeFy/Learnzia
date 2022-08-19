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
						<img id='icon' src='http://localhost/Learnzia/assets/uploads/classroom/".$class['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:50px; height:50px; float:left;
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
