<div class="container" style='max-height: 500px; overflow-y: auto;'>
	<?php 
		foreach ($listRel  as $member){
			if($member['classname'] == $this->session->userdata('classTrack')){
				echo"
					<div class='card-header' style='background:#313436; border-radius:6px; margin-bottom:6px;'>
					<img id='icon' src='http://localhost/Learnzia/assets/uploads/user_".$member['username'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' 
					style='width:50px; height:50px; float:left; margin-right:2%; margin-top:6px'>";
				if ($member['username'] == $this->session->userdata('userTrack')){
					echo"
					<h5 style='font-size:15.5px; color:#F1C40F;'>You</h5>";
				} else {
					echo"
					<h5 style='font-size:15.5px; color:#F1C40F;'>".$member['username']."</h5>";
				}
				if($member['typeRelation'] == 'founder'){
					echo"<p style='font-size:14px; color:#7289da; font-weight:bold;'>".$member['typeRelation']."</p>";
				}
				else if($member['typeRelation'] == 'co-founder') {
					echo"
					<p style='font-size:14px; color:#00a13e;'>".$member['typeRelation']."</p>";
				}
				else {
					echo"<p style='font-size:14px; color:whitesmoke;'>".$member['typeRelation']."</p>";
				}
			echo"<button class='btn btn-success' type='submit' style='border:none; float:right; margin-right:2%; margin-top:-50px;'>View Profile</button>";
			//Manage member
			foreach($listRel as $search){
				if(($search['username'] == $this->session->userdata('userTrack'))&&($search['classname'] == $this->session->userdata('classTrack'))){
					$role = $search['typeRelation']; 
				}
			}
			if (($role == 'founder')&&($member['username'] != $this->session->userdata('userTrack'))){
			echo"<div class='dropdown' style='float:right; margin-right:140px; margin-top:-50px;'>
					<button class='btn btn-secondary dropdown-toggle' style='color:whitesmoke; background-color:#e69627; border:none;' 
						data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Manage</button>
					<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";
						if ($member['typeRelation'] != 'co-founder'){
							echo"<a class='dropdown-item' href='#' style='color:#11ab26;'>Promote</a>";
						} else if ($member['typeRelation'] == 'co-founder'){
							echo"<a class='dropdown-item' href='#'>Make new founder</a>";
						}
						if ($member['typeRelation'] != 'member'){
							echo"<a class='dropdown-item' href='#' style='color:#df4759;'>Demote</a>";
						}
						echo"<a class='dropdown-item' href='#' style='color:whitesmoke; background:#df4759;'>Kick Out</a>
					</div>
				</div>";
			} else if (($role == 'co-founder')&&($member['username'] != $this->session->userdata('userTrack'))&&($member['typeRelation'] == 'member')){
			echo"<div class='dropdown' style='float:right; margin-right:140px; margin-top:-50px;'>
				<button class='btn btn-secondary dropdown-toggle' style='color:whitesmoke; background-color:#e69627; border:none;' 
					data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Manage</button>
				<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
					<a class='dropdown-item' href='#' style='color:#11ab26;'>Promote</a>
					<a class='dropdown-item' href='#' style='color:whitesmoke; background:#df4759;'>Kick Out</a>
				</div>
			</div>";
			} 
	echo"</div>";
		}
	}?>
</div>
