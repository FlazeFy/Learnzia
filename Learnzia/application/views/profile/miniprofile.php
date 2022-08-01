<div class="col-lg-4 col-md-4 m-t-20">
	<h4><?php echo count($myReply);?></h4>
	<small style='color:whitesmoke;'>Replies</small>
</div>
<div class="col-lg-4 col-md-4 m-t-20">
	<h4><?php echo count($myDiscussion);?></h4>
	<small style='color:whitesmoke;'>Discussion</small>
</div>
<div class="col-lg-4 col-md-4 m-t-20">
	<h4><?php echo count($contacts);?></h4>
	<small style='color:whitesmoke;'>Friends</small>
</div>
<div class="col-lg-4 col-md-4 m-t-20">
	<h4>
	<?php  
		$count = 0; 
		foreach ($listClass as $data){
			foreach ($listRel as $data2) {
				if(($data['classname'] == $data2['classname'])&& ($data2['username']== $this->session->userdata('userTrack'))){
					$count++;
				}
			}
		}
		echo $count;
	?>
	</h4>
	<small style='color:whitesmoke;'>Classroom</small>
</div>
<div class="col-lg-4 col-md-4 m-t-20">
	<h4 style='font-size:16px;'>
	<?php 
		foreach ($dataUser as $data) {echo $data['country'];} 
	?>
	</h4>
	<small style='color:whitesmoke;'>Country</small>
</div>
<div class="col-lg-4 col-md-4 m-t-20">
	<h4>-</h4><!--Not finished-->
	<small style='color:whitesmoke;'>Rank</small>
</div>
