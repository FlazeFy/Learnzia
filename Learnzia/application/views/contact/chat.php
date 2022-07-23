<?php
	$count = 0; 
	foreach($contacts as $c){
		foreach($allUser as $au){
			if (($au['id_user'] == $c['id_user_2'])&&($c['id_user_2'] != $this->session->userdata('userIdTrack'))&&($c['id_user_1'] == $this->session->userdata('userIdTrack'))){
				echo "
				<div class='modal fade' id='message".$c['id_social']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
					<div class='modal-dialog' role='document' style='overflow-y: initial;'>
						<form method='POST' action='homeCtrl/sendRMessage' enctype='multipart/form-data'>
						<div class='modal-content' style='background-color:#313436;'>
							<div class='modal-header'>
								<div class='container'>
									<img src='http://localhost/Learnzia/assets/uploads/user/".$au['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; 
									float:left; margin-right:2%;'>
									<h5 style='font-size:20px;'>".$au['username']."</h5>";
									//User login status
									if($au['status'] == 'online'){
										echo "<p style='font-size:14px; color:#00a13e;'>".$au['status']."</p>";
									} 
									else if($au['status'] == 'offline'){
										echo "<p style='font-size:14px; color:#F14D0F;'>".$au['status']."</p>";
									}
								echo "</div>
								<img type='button' data-dismiss='modal' aria-label='Close' src='http://localhost/Learnzia/assets/images/icon/Close.png'>	
							</div>
							<div class='imessage' style='max-height: calc(80vh - 160px); max-width:auto; overflow-y: auto; height:800px; min-width:100%;'>";
								foreach($dataMessage as $msg){
									if(($msg['id_user_sender'] == $c['id_user_2'])&&($msg['id_social'] == $c['id_social'])){
										echo "<p class='from-them'>";
										if($msg['imageURL'] != 'null'){
											echo"<img src='http://localhost/Learnzia/assets/uploads/message/".$msg['imageURL'].".jpg' alt='Card image cap' style='width:200px; height:200px;
											margin:1%; border-radius:6px;'>";
										}
										echo "".$msg['message']."<br><a style='color:#e69627; font-size:13.5px; font-style:italic;'>~ on ".$msg['datetime']."</a>
										</p>";
										$count++;
									} else if(($msg['id_user_sender'] == $this->session->userdata("userIdTrack"))&&($msg['id_social'] == $c['id_social'])){
										echo "<p class='from-me'>";
										if($msg['imageURL'] != 'null'){
											echo"<img src='http://localhost/Learnzia/assets/uploads/message/".$msg['imageURL'].".jpg' alt='Card image cap' style='width:200px; height:200px;
											margin:1%; border-radius:6px;'>";
										}
										echo "".$msg['message']."<br><a style='color:#212121; font-size:13.5px; font-style:italic;'>~ on ".$msg['datetime']."</a>
										</p>";
										$count++;
									} 
								}
								if ($count == 0){
									echo"<h5 style='font-size:15px; font-style:italic; float:left;'>Chat is empty...</h5>";
								} else {
									echo"<h5 style='font-size:15px; font-style:italic; float:left; margin-bottom:3%;'>Showing ".$count." message... </h5>";
								}
							echo "</div>
							<div class='modal-footer'>
								<div class='container'>
									<input type='text' class='form-control' name='id_social' value='".$c['id_social']."' hidden>
									<button class='btn btn-primary' style='color:whitesmoke; background-color:#00a13e; float:right; margin-right:-5%; border:none;' type='submit'>Send</button>
									<input class='form-control' type='text' placeholder='Type your message here...' style='width:80%; float:right; margin-right:1%;' name='message'>
									<label class='switch' style='float:left; margin-left:-5%;'>
										<input type='checkbox' name='imageSwitchMsg'>
											<span class='slider round' type='button' data-toggle='collapse' data-target='#collapseImageMain".$c['id_social']."'></span>
										</label>
									<br><a style='color:whitesmoke; float:left; margin-left:-9%;'>Image</a>
									<div class='collapse' id='collapseImageMain".$c['id_social']."'>
										<div class='container-fluid' style='width:90%; float:right; margin-top:2%; margin-right:-9%;'>
											<div class='input-group mb-3' style='background-color:#212121; border-width: 0 0 3px; border-bottom: 3.5px solid #F1C40F; 
												border-radius:5px;'>
												<div class='input-group-prepend'>
													<span class='input-group-text'>jpg</span>
												</div>
												<div class='custom-file'>
													<input type='file' class='custom-file-input' id='uploadImage' name='uploadImageMsg' accept='image/*'>
													<label class='custom-file-label text-left' for='uploadImage'>file size max 5 mb</label>
												</div>
											</div>
										</div>
									</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>";
			} else if (($au['id_user'] == $c['id_user_1'])&&($c['id_user_1'] != $this->session->userdata('userIdTrack'))&&($c['id_user_2'] == $this->session->userdata('userIdTrack'))){
				echo "
				<div class='modal fade' id='message".$c['id_social']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
					<div class='modal-dialog' role='document' style='overflow-y: initial;'>
						<form method='POST' action='homeCtrl/sendRMessage' enctype='multipart/form-data'>
						<div class='modal-content' style='background-color:#313436;'>
							<div class='modal-header'>
								<div class='container'>
									<img src='http://localhost/Learnzia/assets/uploads/user/".$au['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; 
									float:left; margin-right:2%;'>
									<h5 style='font-size:20px;'>".$au['username']."</h5>";
									//User login status
									if($au['status'] == 'online'){
										echo "<p style='font-size:14px; color:#00a13e;'>".$au['status']."</p>";
									} 
									else if($au['status'] == 'offline'){
										echo "<p style='font-size:14px; color:#F14D0F;'>".$au['status']."</p>";
									}
								echo "</div>
								<img type='button' data-dismiss='modal' aria-label='Close' src='http://localhost/Learnzia/assets/images/icon/Close.png'>	
							</div>
							<div class='imessage' style='max-height: calc(80vh - 160px); max-width:auto; overflow-y: auto; height:800px; min-width:100%;'>";
								foreach($dataMessage as $msg){
									if(($msg['id_user_sender'] == $c['id_user_1'])&&($msg['id_social'] == $c['id_social'])){
										echo "<p class='from-them'>";
										if($msg['imageURL'] != 'null'){
											echo"<img src='http://localhost/Learnzia/assets/uploads/message/".$msg['imageURL'].".jpg' alt='Card image cap' style='width:200px; height:200px;
											margin:1%; border-radius:6px;'>";
										}
										echo "".$msg['message']."<br><a style='color:#e69627; font-size:13.5px; font-style:italic;'>~ on ".$msg['datetime']."</a>
										</p>";
										$count++;
									} else if(($msg['id_user_sender'] == $this->session->userdata("userIdTrack"))&&($msg['id_social'] == $c['id_social'])){
										echo "<p class='from-me'>";
										if($msg['imageURL'] != 'null'){
											echo"<img src='http://localhost/Learnzia/assets/uploads/message/".$msg['imageURL'].".jpg' alt='Card image cap' style='width:200px; height:200px;
											margin:1%; border-radius:6px;'>";
										}
										echo "".$msg['message']."<br><a style='color:#212121; font-size:13.5px; font-style:italic;'>~ on ".$msg['datetime']."</a>
										</p>";
										$count++;
									} 
								}
								if ($count == 0){
									echo"<h5 style='font-size:15px; font-style:italic; float:left;'>Chat is empty...</h5>";
								} else {
									echo"<h5 style='font-size:15px; font-style:italic; float:left; margin-bottom:3%;'>Showing ".$count." message... </h5>";
								}
							echo "</div>
							<div class='modal-footer'>
								<div class='container'>
									<input type='text' class='form-control' name='id_social' value='".$c['id_social']."' hidden>
									<button class='btn btn-primary' style='color:whitesmoke; background-color:#00a13e; float:right; margin-right:-5%; border:none;' type='submit'>Send</button>
									<input class='form-control' type='text' placeholder='Type your message here...' style='width:80%; float:right; margin-right:1%;' name='message'>
									<label class='switch' style='float:left; margin-left:-5%;'>
										<input type='checkbox' name='imageSwitchMsg'>
											<span class='slider round' type='button' data-toggle='collapse' data-target='#collapseImageMain".$c['id_social']."'></span>
										</label>
									<br><a style='color:whitesmoke; float:left; margin-left:-9%;'>Image</a>
									<div class='collapse' id='collapseImageMain".$c['id_social']."'>
										<div class='container-fluid' style='width:90%; float:right; margin-top:2%; margin-right:-9%;'>
											<div class='input-group mb-3' style='background-color:#212121; border-width: 0 0 3px; border-bottom: 3.5px solid #F1C40F; 
												border-radius:5px;'>
												<div class='input-group-prepend'>
													<span class='input-group-text'>jpg</span>
												</div>
												<div class='custom-file'>
													<input type='file' class='custom-file-input' id='uploadImage' name='uploadImageMsg' accept='image/*'>
													<label class='custom-file-label text-left' for='uploadImage'>file size max 5 mb</label>
												</div>
											</div>
										</div>
									</div>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>";
			}
		}
		$count = 0;
	}
?>
