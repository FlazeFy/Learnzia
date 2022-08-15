<div class='container-fluid' style='overflow-y: initial; width:120%; min-width:120px; margin-left:-20%; margin-top:10%;'>
	<div class="nav nav-tabs text-center border-0" id="v-tabs-tab" role="tablist" aria-orientation="vertical"
		style='max-height: calc(90vh - 150px); max-width:auto; overflow-y: auto;'>
		<div class="container-fluid m-0">
			<form action='classCtrl/selectChannel' method='POST'>
				<input name='id_channel' value='manage' hidden></input>
				<button class="nav-link" type="submit" style='width:100%; color:whitesmoke; background:#00a13e;'>Manage Channel</button>
			</form>
		</div>
		<div class="container-fluid m-0">
			<form action='classCtrl/selectChannel' method='POST'>
				<input name='id_channel' value='main' hidden></input>
				<button class="nav-link active w-100" type="submit">#Main</button>
			</form>
		</div>
		<?php
			foreach($listChannel as $channel){
				echo"
				<div class='container-fluid m-0'>
					<form action='classCtrl/selectChannel' method='POST'>
						<input name='id_channel' value='".$channel['id_channel']."' hidden></input>
						<button class='nav-link active w-100' type='submit'>#".$channel['channel_name']."</button>
					</form>
				</div>";
			}
		?>
	</div>
</div>
