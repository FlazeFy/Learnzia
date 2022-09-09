<style>

</style>

<!--Search-->
<input class="form-control mb-4" type="search" placeholder="Search" id="searchListContact" name="search" aria-label="Search">
<ul class="list-group w-100" id="listContact">
	<!--Contact list-->
	<?php 
		$count = 0;
		foreach($contacts as $c){
			foreach($allUser as $au){
				if (($au['id_user'] == $c['id_user_2'])&&($c['id_user_2'] != $this->session->userdata('userIdTrack'))&&($c['id_user_1'] == $this->session->userdata('userIdTrack'))){
					echo "
					<li class='list-group-item my-1 p-0' type='button' style='background-color:#212121; height:80px;'>
						<form id='open_chat_".$c['id_social']."'>
							<input hidden name='id_social' value='".$c['id_social']."'>
							<button type='submit' class='card-header w-100 m-0 border-0 text-left'>
								<img src='http://localhost/Learnzia/assets/uploads/user/".$au['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; float:left;
									margin-right:5%'>
								<h5 style='font-size:15.5px; color:#F1C40F;'>".$au['username']."</h5>";
								//User login status
								if($au['status'] == 'online'){
									echo "<p style='font-size:14px; color:#00a13e;'>".$au['status']."</p>";
								} 
								else if($au['status'] == 'offline'){
									echo "<p style='font-size:14px; color:#F14D0F;'>".$au['status']."</p>";
								}
							echo "
							</button>
						</form>
					</li>"; 
					$count++;
				} else if (($au['id_user'] == $c['id_user_1'])&&($c['id_user_1'] != $this->session->userdata('userIdTrack'))&&($c['id_user_2'] == $this->session->userdata('userIdTrack'))){
					echo "
					<li class='list-group-item my-1 p-0' type='button' style='background-color:#212121; height:80px;'>
						<form id='open_chat_".$c['id_social']."'>
							<input hidden name='id_social' value='".$c['id_social']."'>
							<button type='submit' class='card-header w-100 m-0 border-0 text-left'>
								<img src='http://localhost/Learnzia/assets/uploads/user/".$au['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; float:left;
									margin-right:5%;'>
								<h5 style='font-size:15.5px; color:#F1C40F;'>".$au['username']."</h5>";
								//User login status
								if($au['status'] == 'online'){
									echo "<p style='font-size:14px; color:#00a13e;'>".$au['status']."</p>";
								} 
								else if($au['status'] == 'offline'){
									echo "<p style='font-size:14px; color:#F14D0F;'>".$au['status']."</p>";
								}
							echo "
							</button>
						</form>
					</li>"; 
					$count++;
				} 
			}
		}

		if ($count == 0){
			echo "
			<div class='container mt-2'>
				<img src='http://localhost/Learnzia/assets/images/Friends.png' alt='Friends.png' style='display: block;
					margin-left: auto; margin-right: auto; width: 30%; height: 30%;'>
				<h5 style='font-size:15.5px; color:#F1C40F; text-align:center;'>You dont have a friend yet</h5>
			</div>";
		}
	?>	
</ul>  

<script type="text/javascript">
	//Post ajax
	<?php
		foreach($contacts as $c){
			echo"
			$('#open_chat_".$c['id_social']."').submit(function( event ) {
				event.preventDefault();
				$.ajax({
					url: 'ContactCtrl/selectContact',
					type: 'post',
					data: $('#open_chat_".$c['id_social']."').serialize(),
					dataType: 'json',
					success: function( _response ){
						//...
					},
					error: function( _response ){
						// Handle error
					}
				});
			});";
		}
	?>
</script>
