<?php
	foreach($allDisc as $data){	
		echo"
		<div class='modal fade' id='shareDisc".$data['id_discussion']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
			<div class='modal-dialog' role='document'>
				<form action='homeCtrl/shareDisc' method='post'>
					<input name='id_discussion' value='".$data['id_discussion']."' hidden>
					<div class='modal-content' style='background-color:#313436;'>
					<div class='modal-header'>
						
						<img class='closebtn' src='http://localhost/Learnzia/assets/images/icon/Close.png'
						style='margin-top:2%;' type='button' data-dismiss='modal' aria-label='Close'>
					</div>
					<div class='modal-body'>
						<ul class='list-group' width='200' id='listContact'>";
							$count = 0;
							foreach($contacts as $c){
								foreach($allUser as $au){
									if (($au['id_user'] == $c['id_user_2'])&&($c['id_user_2'] != $this->session->userdata('userIdTrack'))&&($c['id_user_1'] == $this->session->userdata('userIdTrack'))){
										echo "
										<li class='list-group-item mx-3 my-1 p-0' type='button' style='background-color:#212121;'>
											<div class='card-header' style='width: 25rem; height:5rem;'>
												<div class='row'>
													<div class='col-md-11'>
													<img src='http://localhost/Learnzia/assets/uploads/user/user_".$au['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:50px; height:50px; float:left;
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
													</div>
													<div class='col-md-1'>
														<div class='form-check fa-lg'>
															<input type='checkbox' class='form-check-input mx-auto d-block' id='exampleCheck1' name='id_social[]' value='".$c['id_social']."' title='Select' style='cursor:pointer; height:25px; width:25px;'>
														</div>
													</div>
												</div>
											</div>
										</li>"; 
										$count++;
									} else if (($au['id_user'] == $c['id_user_1'])&&($c['id_user_1'] != $this->session->userdata('userIdTrack'))&&($c['id_user_2'] == $this->session->userdata('userIdTrack'))){
										echo "
										<li class='list-group-item mx-3 my-1 p-0' type='button' style='background-color:#212121;'>
											<div class='card-header' style='width: 25rem; height:5rem;'>
												<div class='row'>
													<div class='col-md-11'>
													<img src='http://localhost/Learnzia/assets/uploads/user/user_".$au['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:50px; height:50px; float:left;
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
													</div>
													<div class='col-md-1'>
														<div class='form-check fa-lg'>
															<input type='checkbox' class='form-check-input mx-auto d-block' id='exampleCheck1' name='id_social[]' value='".$c['id_social']."' title='Select' style='cursor:pointer; height:25px; width:25px;'>
														</div>
													</div>
												</div>
											</div>
										</li>"; 
										$count++;
									} 
								}
							}
				
							if ($count == 0){
								echo "
								<div class='container' style='margin-top:2%;'>
									<img src='http://localhost/Learnzia/assets/images/Friends.png' alt='Friends.png' style='display: block;
										margin-left: auto; margin-right: auto; width: 30%; height: 30%;'>
									<h5 style='font-size:15.5px; color:#F1C40F; text-align:center;'>You dont have a friend yet</h5>
								</div>";
							}
						echo"
					</ul> 
					</div>
					<div class='modal-footer'>
						<button type='submit' style='color:whitesmoke; background-color:#e69627; border:none;' 
							class='btn btn-primary'>Send</button>
					</div>
				</form>
				</div>
			</div>
		</div>";
	}
?>
