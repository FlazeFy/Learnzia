<div class="tab-content" >
	<?php
		if($this->session->userdata('channelTrack') == "manage"){
			echo"
			<div class='tab-pane active'>
				<div class='container-fluid p-2'>";
					$i = 0;
					foreach($listRel as $lr){
						if(($this->session->userdata('userTrack') == $lr['username'])&&($lr['typeRelation'] != 'member')&&($this->session->userdata('classTrack') == $lr['classname'])){
							$i = 1;
							echo"
								<div class='row my-3'>
									<div class='col-md'>
										<div class='container-fluid p-0'>
											<h4 class='text-white my-2'>Create New Channel</h4>
											<form method='post' action='classCtrl/createChannel'>
											<label class='label' for='name' style='color:#F1C40F;'>Channel Name</label>
											<input class='form-control mb-2' name='channel_name' type='text' style='background:#303335;' required>
											<label class='label' for='name' style='color:#F1C40F;'>Channel Description</label>
											<textarea class='form-control mb-2' name='channel_description' type='text' style='background:#303335;' rows='3' required></textarea>
											<button class='btn btn-success my-2 d-block' type='submit'><i class='fa-solid fa-plus'></i> Create</button>
											</form>
										</div>

										<br><hr>
										<div class='container-fluid p-0'>
											<h4 class='text-white my-2'>Channel's Statistics</h4>
											
										</div>
									</div>
									<div class='col-md'>
										<h4 class='text-white my-2'>List Channel</h4>";
										foreach($listChannel as $channel){
											echo"
											<div class='container-fluid m-2 p-3 rounded' style='background:#313436;'>
												<div class='row'>
													<div class='col-md-8'>
														<h7 class='text-white my-auto'>#".$channel['channel_name']."</h7><br>
														<a class='text-white my-auto'>".$channel['channel_description']."</a>
													</div>
													<div class='col-md-4'>
														<a class='btn btn-info border-0' data-toggle='modal' data-target='#updateChannelModal-".$channel['id_channel']."' style='background:#f1c40f;'><i class='fa-solid fa-pen-to-square'></i></a>
														<a class='btn btn-danger' data-toggle='modal' data-target='#deleteChannelModal-".$channel['id_channel']."'><i class='fa-solid fa-trash-can'></i></a>
													</div>
												</div>
											</div>";
										}
									echo"
									</div>
								</div>
							";
						}
					}
					if($i == 0){
						echo "
						<div class='container p-2'>
							<img class='d-block mx-auto w-25' src='http://localhost/Learnzia/assets/images/Invitation.gif' alt='Invitation.gif'>
							<h4 style='font-style:italic; text-align:center; font-size:16px;'>You don't have access to this feature. Please contact your classroom's founder or co-founder</h4>
						</div>";
					}
				echo"
				</div>
			</div>";
		} else {
			echo"
			<div class='tab-pane active'>
				<div class='imessage' style='max-height: 480px; max-width:auto; overflow-y: auto; height:800px;' id='chat-box'>";
					foreach($dataClassForumMsg as $chat){
						if ($chat['id_user'] != $this->session->userdata('userIdTrack')){
						echo"<p class='from-them'>";
							if($chat['imageURL'] != 'null'){
								echo"<img src='http://localhost/Learnzia/assets/uploads/channel/main_".$chat['imageURL'].".jpg' alt='Card image cap' style='width:200px; height:200px;
								margin:1%; border-radius:6px;'>";
							}
							echo"<img id='icon' src='http://localhost/Learnzia/assets/uploads/user_".$chat['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; float:left;
							margin-right:2%'>".$chat['text']."<br><a style='color:#e69627; font-size:13.5px; font-style:italic;'>~ ".$chat['sender']." on ".$chat['datetime']."</a>
						</p>";
						} else if($chat['id_user'] == $this->session->userdata('userIdTrack')){
						echo"<p class='from-me'>";
							if($chat['imageURL'] != 'null'){
								echo"<img src='http://localhost/Learnzia/assets/uploads/channel/main_".$chat['imageURL'].".jpg' alt='Card image cap' style='width:200px; height:200px;
								margin:1%; border-radius:6px;'>";
							}
							echo"<img id='icon' src='http://localhost/Learnzia/assets/uploads/user_".$this->session->userdata('userTrack').".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; float:right;
							margin-left:2%'>".$chat['text']."<br><a style='color:#212121; font-size:13.5px; font-style:italic;'>~ You on ".$chat['datetime']."</a>
						</p>";
						}}
				echo"
				</div>
				<div class='container' style='min-width:110%; margin-bottom:2%;'>
				<form method='post' action='classCtrl/sendMainChat' class='form-inline' enctype='multipart/form-data'>
					<div class='container'>
						<label class='switch' style='float:left; margin-right:1%;'>
						<input type='checkbox' name='imageSwitchMain'>
							<span class='slider round' type='button' data-toggle='collapse' data-target='#collapseImageMain'></span>
						</label>
						<a style='color:whitesmoke; float:left;'>Image</a>
						<button class='btn btn-primary' style='color:whitesmoke; background-color:#00a13e; float:right; border:none;' type='submit'>Send</button>
						<input class='form-control' type='text' placeholder='Type your message here...' style='width:50%; float:right; margin-right:1%;' name='messagetext'>
						<div class='collapse' id='collapseImageMain'>
							<div class='container' style='width:50%; float:right; margin-top:2%; margin-right:-2%;'>
								<div class='input-group mb-3' style='background-color:#212121; border-width: 0 0 3px; border-bottom: 3.5px solid #F1C40F; 
									border-radius:5px;'>
									<div class='input-group-prepend'>
										<span class='input-group-text'>jpg</span>
									</div>
									<div class='custom-file'>
										<input type='file' class='custom-file-input' id='uploadImage' name='uploadImageMainChat' accept='image/*'>
										<label class='custom-file-label text-left' for='uploadImage'>file size max 2 mb</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
				</div>
			</div><!--End of channel-->";
		} 
	?>
</div>
