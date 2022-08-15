<ul class="nav nav-tabs profile-tab" role="tablist">
	<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#forum" role="tab">Forum</a> </li>
	<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#activity" role="tab">Activity</a> </li>
	<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#member" role="tab">Member</a> </li>
	<?php foreach ($listRel as $rel){
		if (($rel['classname'] == $this->session->userdata('classTrack'))&&(($rel['typeRelation']=='founder')||($rel['typeRelation']=='co-founder'))
			&&($rel['username']== $this->session->userdata('userTrack'))){
			echo "<li class='nav-item'> <a class='nav-link' data-toggle='tab' href='#classProfilEdit' role='tab'>Class Profil</a> </li>";
		} else if (($rel['classname'] == $this->session->userdata('classTrack'))&&($rel['typeRelation']=='member')
			&&($rel['username']== $this->session->userdata('userTrack'))){
			echo "<li class='nav-item'> <a class='nav-link' data-toggle='tab' href='#classProfil' role='tab'>Class Profil</a> </li>";
		}
	}
	?>
</ul>
