<?php
	foreach($listChannel as $channel){
		echo"
		<div class='modal fade' id='updateChannelModal-".$channel['id_channel']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
			<div class='modal-dialog' role='document'>
				<div class='modal-content' style='background-color:#313436;'>
					<div class='modal-header'>
						<h5 class='modal-title' id='exampleModalLabel'>Edit Channel</h5>
						<button type='button' class='btn-close' data-dismiss='modal' aria-label='Close'></button>
					</div>
					<div class='modal-body p-4 text-left'>
						<form method='post' action='classCtrl/editChannel'>
						<input hidden name='id_channel' value='".$channel['id_channel']."'>
						<label class='label' for='name' style='color:#F1C40F;'>Channel Name</label>
						<input class='form-control mb-2' name='channel_name' type='text' style='background:#212121;' value='".$channel['channel_name']."' required>
						<label class='label' for='name' style='color:#F1C40F;'>Channel Description</label>
						<textarea class='form-control mb-2' name='channel_description' type='text' style='background:#212121;' rows='3' required>".$channel['channel_description']."</textarea>
						<button class='btn btn-success my-3 float-right' type='submit'>Save Changes</button>
						</form>
					</div>	
				</div>
			</div>
		</div>";
	}		
?>
