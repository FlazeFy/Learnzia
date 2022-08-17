<?php
	$count = 0; 
	foreach($contacts as $c){
		foreach($allUser as $au){
			if (($au['id_user'] == $c['id_user_2'])&&($c['id_user_2'] != $this->session->userdata('userIdTrack'))&&($c['id_user_1'] == $this->session->userdata('userIdTrack'))){
				echo "
				<div class='modal fade' id='message".$c['id_social']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
					<div class='modal-dialog modal-lg' role='document' style='overflow-y: initial;'>
						<form method='POST' action='homeCtrl/sendRMessage' enctype='multipart/form-data'>
						<div class='modal-content' style='background-color:#313436;'>
							<div class='modal-header'>
								<div class='container'>
									<img src='http://localhost/Learnzia/assets/uploads/user/user_".$au['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; 
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
									if(($msg['message_image'] != 'discussion')&&($msg['message_image'] != 'reply')){
										if(($msg['id_user_sender'] == $c['id_user_2'])&&($msg['id_social'] == $c['id_social'])){
											echo "<p class='from-them'>";
											if(($msg['message_image'] != 'null')&&($msg['message_image'] != 'discussion')){
												echo"<img src='http://localhost/Learnzia/assets/uploads/message/message_".$msg['message_image'].".jpg' alt='Card image cap' style='width:200px; height:200px;
												margin:1%; border-radius:6px;'>";
											} 
											echo "".$msg['message']."<br><a style='color:#e69627; font-size:13.5px; font-style:italic;'>~ on ".$msg['datetime']."</a>
											</p>";
											$count++;
										} else if(($msg['id_user_sender'] == $this->session->userdata("userIdTrack"))&&($msg['id_social'] == $c['id_social'])){
											echo "<p class='from-me'>";
											if(($msg['message_image'] != 'null')&&($msg['message_image'] != 'discussion')){
												echo"<img src='http://localhost/Learnzia/assets/uploads/message/message_".$msg['message_image'].".jpg' alt='Card image cap' style='width:200px; height:200px;
												margin:1%; border-radius:6px;'>";
											} 
											echo "".$msg['message']."<br><a style='color:#212121; font-size:13.5px; font-style:italic;'>~ on ".$msg['datetime']."</a>
											</p>";
											$count++;
										} 
									} else if($msg['message_image'] == 'discussion'){
										$i = 0;
										if(($msg['id_user_sender'] == $c['id_user_2'])&&($msg['id_social'] == $c['id_social'])){
											foreach($allDisc as $dis){
												if($msg['message'] == $dis['id_discussion']){
													echo"
													<div class='card p-2 my-3 border-0 rounded' style='background-color:#212121; border-top-right-radius: 35px;'>
														<div class='card-header' id='headingOne'>
															<img src='http://localhost/Learnzia/assets/uploads/user/user_".$dis['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid mx-2' style='width:45px; float:left;'>
															<a class='btn btn-transparent border-0 mx-2 text-white' style='float:right;' data-toggle='modal' data-target='#'><i class='fa-solid fa-ellipsis-vertical'></i></a>";
															//Discussion header.
															if($dis['id_user'] == $this->session->userdata('userIdTrack')){
																echo"
																<h5 style='font-size:18px;'>You <span style='font-size:10px; padding-top:5px; font-style:italic; color:whitesmoke;'>".$dis['datetime']."</span></h5>";
															} else {
																echo"
																<h5 style='font-size:18px;'>".$dis['username']." <span style='font-size:10px; padding-top:5px; font-style:italic; color:whitesmoke;'>".$dis['datetime']."</span></h5>";
															} echo "
															<h5 id='question_cat'>".$dis['category']."</h5>";
															//Question with image.
															if ($dis['discussion_image'] != 'null'){
																echo"
																<div class='row mb-3'>
																	<div class='col-md-4'>
																		<img src='http://localhost/Learnzia/assets/uploads/discussion_".$dis['discussion_image'].".jpg' id='question_img' 
																			data-toggle='modal' data-target='#zoom".$dis['id_discussion']."'>
																		<div id='question_alt'><i class='fa-solid fa-magnifying-glass'></i> Zoom Image</div>
																	</div>
																	<div class='col-md-6' style=''>
																		<p style='font-size:14px; color:whitesmoke;'><span style='color:#F1C40F; font-weight:500;'>".$dis['subject']." | </span> ".$dis['question']."</p>
																	</div>
																</div>";
															} else { 
																echo"
																<p style='font-size:14px; color:whitesmoke;'><span style='color:#F1C40F; font-weight:500;'>".$dis['subject']." | </span> ".$dis['question']."</p>";
															}
															echo "
															<a class='btn btn-primary mx-2 border-0 rounded-pill' id='btn-up' title='up'><i class='fa-solid fa-arrow-up fa-lg'></i>  10</a>
															<a class='btn btn-transparent border-0 mx-2 text-white' style='float:right;' data-toggle='modal' data-target='#shareDisc".$dis['id_discussion']."' title='forward'><i class='fa-solid fa-paper-plane'></i></a>
															<a class='btn btn-transparent mx-2 border-0 rounded-pill' id='btn-reply' type='button' title='see detail'><i class='fa-regular fa-message'></i> "; 
																//Count reply.
																$reply = 0;
																foreach ($dataReply as $r2){
																	if ($r2['id_discussion'] == $dis['id_discussion']){
																		$reply++;
																	}
																}
																echo $reply;
															echo"</a>
														</div>
													</div>";
												}
											}
										} else if(($msg['id_user_sender'] == $this->session->userdata("userIdTrack"))&&($msg['id_social'] == $c['id_social'])){
											foreach($allDisc as $dis){
												if($msg['message'] == $dis['id_discussion']){
													echo"
													<div class='card p-2 my-3 border-0 ' style='background-color:#212121; border-top-left-radius: 35px;'>
														<div class='card-header' id='headingOne'>
															<img src='http://localhost/Learnzia/assets/uploads/user/user_".$dis['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid mx-2' style='width:45px; float:left;'>
															<a class='btn btn-transparent border-0 mx-2 text-white' style='float:right;' data-toggle='modal' data-target='#'><i class='fa-solid fa-ellipsis-vertical'></i></a>";
															//Discussion header.
															if($dis['id_user'] == $this->session->userdata('userIdTrack')){
																echo"
																<h5 style='font-size:18px;'>You <span style='font-size:10px; padding-top:5px; font-style:italic; color:whitesmoke;'>".$dis['datetime']."</span></h5>";
															} else {
																echo"
																<h5 style='font-size:18px;'>".$dis['username']." <span style='font-size:10px; padding-top:5px; font-style:italic; color:whitesmoke;'>".$dis['datetime']."</span></h5>";
															} echo "
															<h5 id='question_cat'>".$dis['category']."</h5>";
															//Question with image.
															if ($dis['discussion_image'] != 'null'){
																echo"
																<div class='row mb-3'>
																	<div class='col-md-4'>
																		<img src='http://localhost/Learnzia/assets/uploads/discussion_".$dis['discussion_image'].".jpg' id='question_img' 
																			data-toggle='modal' data-target='#zoom".$dis['id_discussion']."'>
																		<div id='question_alt'><i class='fa-solid fa-magnifying-glass'></i> Zoom Image</div>
																	</div>
																	<div class='col-md-6' style=''>
																		<p style='font-size:14px; color:whitesmoke;'><span style='color:#F1C40F; font-weight:500;'>".$dis['subject']." | </span> ".$dis['question']."</p>
																	</div>
																</div>";
															} else { 
																echo"
																<p style='font-size:14px; color:whitesmoke;'><span style='color:#F1C40F; font-weight:500;'>".$dis['subject']." | </span> ".$dis['question']."</p>";
															}
															echo "
															<a class='btn btn-primary mx-2 border-0 rounded-pill' id='btn-up' title='up'><i class='fa-solid fa-arrow-up fa-lg'></i>  10</a>
															<a class='btn btn-transparent border-0 mx-2 text-white' style='float:right;' data-toggle='modal' data-target='#shareDisc".$dis['id_discussion']."' title='forward'><i class='fa-solid fa-paper-plane'></i></a>
															<a class='btn btn-transparent mx-2 border-0 rounded-pill' id='btn-reply' type='button' title='see detail'><i class='fa-regular fa-message'></i> "; 
																//Count reply.
																$reply = 0;
																foreach ($dataReply as $r2){
																	if ($r2['id_discussion'] == $dis['id_discussion']){
																		$reply++;
																	}
																}
																echo $reply;
															echo"</a>
														</div>
													</div>";
												}
											}
										}
									} else if($msg['message_image'] == 'reply'){
										$i = 0;
										if(($msg['id_user_sender'] == $c['id_user_2'])&&($msg['id_social'] == $c['id_social'])){
											foreach($dataReply as $rep){
												foreach($allDisc as $dis){
													if(($msg['message'] == $rep['id_reply'])&&($dis['id_discussion'] == $rep['id_discussion'])){
														echo"
														<div class='card p-2 my-3 border-0 rounded w-75' style='background-color:#212121; border-top-right-radius: 35px;'>
															<div class='card-header' id='headingOne'>
																<img src='http://localhost/Learnzia/assets/uploads/user/user_".$rep['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid mx-2' style='width:45px; float:left;'>
																<a class='btn btn-transparent border-0 mx-2 text-white' style='float:right;' data-toggle='modal' data-target='#'><i class='fa-solid fa-ellipsis-vertical'></i></a>";
																//Reply header.
																if($rep['id_user'] == $this->session->userdata('userIdTrack')){
																	echo"
																	<h5 style='font-size:18px;'>You <span style='font-size:10px; padding-top:5px; font-style:italic; color:whitesmoke;'>".$rep['datetime']."</span></h5>";
																} else {
																	echo"
																	<h5 style='font-size:18px;'>".$rep['username']." <span style='font-size:10px; padding-top:5px; font-style:italic; color:whitesmoke;'>".$rep['datetime']."</span></h5>";
																} 
																echo "
																<h5 id='question_cat'>".$dis['category']."</h5>";
																//reply with image.
																if ($rep['reply_image'] != 'null'){
																	echo"
																	<div class='row mb-3'>
																		<div class='col-md-4'>
																			<img src='http://localhost/Learnzia/assets/uploads/reply_".$rep['reply_image'].".jpg' id='question_img' 
																				data-toggle='modal' data-target='#zoom".$rep['id_reply']."'>
																			<div id='question_alt'><i class='fa-solid fa-magnifying-glass'></i> Zoom Image</div>
																		</div>
																		<div class='col-md-6' style=''>
																			<p style='font-size:14px; color:whitesmoke;'>".$rep['replytext']."</p>
																		</div>
																	</div>";
																} else { 
																	echo"
																	<p style='font-size:14px; color:whitesmoke;'>".$rep['replytext']."</p>";
																}
																echo "
																<p style='font-size:14px; color:whitesmoke; font-style:italic; margin-top:-10px;'>Replies from <a style='color:#F1C40F; font-weight:500; text-decoration:underline; cursor:pointer;'>".$dis['question']."</a></p>
																<a class='btn btn-primary mx-2 border-0 rounded-pill' id='btn-up' title='up'><i class='fa-solid fa-arrow-up fa-lg'></i>  10</a>
																<a class='btn btn-transparent border-0 mx-2 text-white' style='float:right;' data-toggle='modal' data-target='#shareDisc".$rep['id_reply']."' title='forward'><i class='fa-solid fa-paper-plane'></i></a>
															</div>
														</div>";
													}
												}
											}
										} else if(($msg['id_user_sender'] == $this->session->userdata("userIdTrack"))&&($msg['id_social'] == $c['id_social'])){
											foreach($dataReply as $rep){
												foreach($allDisc as $dis){
													if(($msg['message'] == $rep['id_reply'])&&($dis['id_discussion'] == $rep['id_discussion'])){
														echo"
														<div class='card p-2 my-3 border-0 rounded w-75' style='background-color:#212121; border-top-right-radius: 35px;'>
															<div class='card-header' id='headingOne'>
																<img src='http://localhost/Learnzia/assets/uploads/user/user_".$rep['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid mx-2' style='width:45px; float:left;'>
																<a class='btn btn-transparent border-0 mx-2 text-white' style='float:right;' data-toggle='modal' data-target='#'><i class='fa-solid fa-ellipsis-vertical'></i></a>";
																//Reply header.
																if($rep['id_user'] == $this->session->userdata('userIdTrack')){
																	echo"
																	<h5 style='font-size:18px;'>You <span style='font-size:10px; padding-top:5px; font-style:italic; color:whitesmoke;'>".$rep['datetime']."</span></h5>";
																} else {
																	echo"
																	<h5 style='font-size:18px;'>".$rep['username']." <span style='font-size:10px; padding-top:5px; font-style:italic; color:whitesmoke;'>".$rep['datetime']."</span></h5>";
																} 
																echo "
																<h5 id='question_cat'>".$dis['category']."</h5>";
																//reply with image.
																if ($rep['reply_image'] != 'null'){
																	echo"
																	<div class='row mb-3'>
																		<div class='col-md-4'>
																			<img src='http://localhost/Learnzia/assets/uploads/reply_".$rep['reply_image'].".jpg' id='question_img' 
																				data-toggle='modal' data-target='#zoom".$rep['id_reply']."'>
																			<div id='question_alt'><i class='fa-solid fa-magnifying-glass'></i> Zoom Image</div>
																		</div>
																		<div class='col-md-6' style=''>
																			<p style='font-size:14px; color:whitesmoke;'>".$rep['replytext']."</p>
																		</div>
																	</div>";
																} else { 
																	echo"
																	<p style='font-size:14px; color:whitesmoke;'>".$rep['replytext']."</p>";
																}
																echo "
																<p style='font-size:14px; color:whitesmoke; font-style:italic; margin-top:-10px;'>Replies from <a style='color:#F1C40F; font-weight:500; text-decoration:underline; cursor:pointer;'>".$dis['question']."</a></p>
																<a class='btn btn-primary mx-2 border-0 rounded-pill' id='btn-up' title='up'><i class='fa-solid fa-arrow-up fa-lg'></i>  10</a>
																<a class='btn btn-transparent border-0 mx-2 text-white' style='float:right;' data-toggle='modal' data-target='#shareDisc".$rep['id_reply']."' title='forward'><i class='fa-solid fa-paper-plane'></i></a>
															</div>
														</div>";
													}
												}
											}
										}
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
					<div class='modal-dialog modal-lg' role='document' style='overflow-y: initial;'>
						<form method='POST' action='homeCtrl/sendRMessage' enctype='multipart/form-data'>
						<div class='modal-content' style='background-color:#313436;'>
							<div class='modal-header'>
								<div class='container'>
									<img src='http://localhost/Learnzia/assets/uploads/user/user_".$au['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; 
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
									if(($msg['message_image'] != 'discussion')&&($msg['message_image'] != 'reply')){
										if(($msg['id_user_sender'] == $c['id_user_1'])&&($msg['id_social'] == $c['id_social'])){
											echo "<p class='from-them'>";
											if(($msg['message_image'] != 'null')&&($msg['message_image'] != 'discussion')){
												echo"<img src='http://localhost/Learnzia/assets/uploads/message/message_".$msg['message_image'].".jpg' alt='Card image cap' style='width:200px; height:200px;
												margin:1%; border-radius:6px;'>";
											}
											echo "".$msg['message']."<br><a style='color:#e69627; font-size:13.5px; font-style:italic;'>~ on ".$msg['datetime']."</a>
											</p>";
											$count++;
										} else if(($msg['id_user_sender'] == $this->session->userdata("userIdTrack"))&&($msg['id_social'] == $c['id_social'])){
											echo "<p class='from-me'>";
											if(($msg['message_image'] != 'null')&&($msg['message_image'] != 'discussion')){
												echo"<img src='http://localhost/Learnzia/assets/uploads/message/message_".$msg['message_image'].".jpg' alt='Card image cap' style='width:200px; height:200px;
												margin:1%; border-radius:6px;'>";
											}
											echo "".$msg['message']."<br><a style='color:#212121; font-size:13.5px; font-style:italic;'>~ on ".$msg['datetime']."</a>
											</p>";
											$count++;
										} 
									} else if($msg['message_image'] == 'discussion'){
										$i = 0;
										if(($msg['id_user_sender'] == $c['id_user_2'])&&($msg['id_social'] == $c['id_social'])){
											foreach($allDisc as $dis){
												if($msg['message'] == $dis['id_discussion']){
													echo"
													<div class='card p-2 my-3 border-0 ' style='background-color:#212121; border-top-left-radius: 35px;'>
														<div class='card-header' id='headingOne'>
															<img src='http://localhost/Learnzia/assets/uploads/user/user_".$dis['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid mx-2' style='width:45px; float:left;'>
															<a class='btn btn-transparent border-0 mx-2 text-white' style='float:right;' data-toggle='modal' data-target='#'><i class='fa-solid fa-ellipsis-vertical'></i></a>";
															//Discussion header.
															if($dis['id_user'] == $this->session->userdata('userIdTrack')){
																echo"
																<h5 style='font-size:18px;'>You <span style='font-size:10px; padding-top:5px; font-style:italic; color:whitesmoke;'>".$dis['datetime']."</span></h5>";
															} else {
																echo"
																<h5 style='font-size:18px;'>".$dis['username']." <span style='font-size:10px; padding-top:5px; font-style:italic; color:whitesmoke;'>".$dis['datetime']."</span></h5>";
															} echo "
															<h5 id='question_cat'>".$dis['category']."</h5>";
															//Question with image.
															if ($dis['discussion_image'] != 'null'){
																echo"
																<div class='row mb-3'>
																	<div class='col-md-4'>
																		<img src='http://localhost/Learnzia/assets/uploads/discussion_".$dis['discussion_image'].".jpg' id='question_img' 
																			data-toggle='modal' data-target='#zoom".$dis['id_discussion']."'>
																		<div id='question_alt'><i class='fa-solid fa-magnifying-glass'></i> Zoom Image</div>
																	</div>
																	<div class='col-md-6' style=''>
																		<p style='font-size:14px; color:whitesmoke;'><span style='color:#F1C40F; font-weight:500;'>".$dis['subject']." | </span> ".$dis['question']."</p>
																	</div>
																</div>";
															} else { 
																echo"
																<p style='font-size:14px; color:whitesmoke;'><span style='color:#F1C40F; font-weight:500;'>".$dis['subject']." | </span> ".$dis['question']."</p>";
															}
															echo "
															<a class='btn btn-primary mx-2 border-0 rounded-pill' id='btn-up' title='up'><i class='fa-solid fa-arrow-up fa-lg'></i>  10</a>
															<a class='btn btn-transparent border-0 mx-2 text-white' style='float:right;' data-toggle='modal' data-target='#shareDisc".$dis['id_discussion']."' title='forward'><i class='fa-solid fa-paper-plane'></i></a>
															<a class='btn btn-transparent mx-2 border-0 rounded-pill' id='btn-reply' type='button' title='see detail'><i class='fa-regular fa-message'></i> "; 
																//Count reply.
																$reply = 0;
																foreach ($dataReply as $r2){
																	if ($r2['id_discussion'] == $dis['id_discussion']){
																		$reply++;
																	}
																}
																echo $reply;
															echo"</a>
														</div>
													</div>";
												}
											}
										} else if(($msg['id_user_sender'] == $this->session->userdata("userIdTrack"))&&($msg['id_social'] == $c['id_social'])){
											foreach($allDisc as $dis){
												if($msg['message'] == $dis['id_discussion']){
													echo"
													<div class='card p-2 my-3 border-0 ' style='background-color:#212121; border-top-left-radius: 35px;'>
														<div class='card-header' id='headingOne'>
															<img src='http://localhost/Learnzia/assets/uploads/user/user_".$dis['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid mx-2' style='width:45px; float:left;'>
															<a class='btn btn-transparent border-0 mx-2 text-white' style='float:right;' data-toggle='modal' data-target='#'><i class='fa-solid fa-ellipsis-vertical'></i></a>";
															//Discussion header.
															if($dis['id_user'] == $this->session->userdata('userIdTrack')){
																echo"
																<h5 style='font-size:18px;'>You <span style='font-size:10px; padding-top:5px; font-style:italic; color:whitesmoke;'>".$dis['datetime']."</span></h5>";
															} else {
																echo"
																<h5 style='font-size:18px;'>".$dis['username']." <span style='font-size:10px; padding-top:5px; font-style:italic; color:whitesmoke;'>".$dis['datetime']."</span></h5>";
															} echo "
															<h5 id='question_cat'>".$dis['category']."</h5>";
															//Question with image.
															if ($dis['discussion_image'] != 'null'){
																echo"
																<div class='row mb-3'>
																	<div class='col-md-4'>
																		<img src='http://localhost/Learnzia/assets/uploads/discussion_".$dis['discussion_image'].".jpg' id='question_img' 
																			data-toggle='modal' data-target='#zoom".$dis['id_discussion']."'>
																		<div id='question_alt'><i class='fa-solid fa-magnifying-glass'></i> Zoom Image</div>
																	</div>
																	<div class='col-md-6' style=''>
																		<p style='font-size:14px; color:whitesmoke;'><span style='color:#F1C40F; font-weight:500;'>".$dis['subject']." | </span> ".$dis['question']."</p>
																	</div>
																</div>";
															} else { 
																echo"
																<p style='font-size:14px; color:whitesmoke;'><span style='color:#F1C40F; font-weight:500;'>".$dis['subject']." | </span> ".$dis['question']."</p>";
															}
															echo "
															<a class='btn btn-primary mx-2 border-0 rounded-pill' id='btn-up' title='up'><i class='fa-solid fa-arrow-up fa-lg'></i>  10</a>
															<a class='btn btn-transparent border-0 mx-2 text-white' style='float:right;' data-toggle='modal' data-target='#shareDisc".$dis['id_discussion']."' title='forward'><i class='fa-solid fa-paper-plane'></i></a>
															<a class='btn btn-transparent mx-2 border-0 rounded-pill' id='btn-reply' type='button' title='see detail'><i class='fa-regular fa-message'></i> "; 
																//Count reply.
																$reply = 0;
																foreach ($dataReply as $r2){
																	if ($r2['id_discussion'] == $dis['id_discussion']){
																		$reply++;
																	}
																}
																echo $reply;
															echo"</a>
														</div>
													</div>";
												}
											}
										}
									} else if($msg['message_image'] == 'reply'){
										$i = 0;
										if(($msg['id_user_sender'] == $c['id_user_2'])&&($msg['id_social'] == $c['id_social'])){
											foreach($dataReply as $rep){
												foreach($allDisc as $dis){
													if(($msg['message'] == $rep['id_reply'])&&($dis['id_discussion'] == $rep['id_discussion'])){
														echo"
														<div class='card p-2 my-3 border-0 rounded w-75' style='background-color:#212121; border-top-right-radius: 35px;'>
															<div class='card-header' id='headingOne'>
																<img src='http://localhost/Learnzia/assets/uploads/user/user_".$rep['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid mx-2' style='width:45px; float:left;'>
																<a class='btn btn-transparent border-0 mx-2 text-white' style='float:right;' data-toggle='modal' data-target='#'><i class='fa-solid fa-ellipsis-vertical'></i></a>";
																//Reply header.
																if($rep['id_user'] == $this->session->userdata('userIdTrack')){
																	echo"
																	<h5 style='font-size:18px;'>You <span style='font-size:10px; padding-top:5px; font-style:italic; color:whitesmoke;'>".$rep['datetime']."</span></h5>";
																} else {
																	echo"
																	<h5 style='font-size:18px;'>".$rep['username']." <span style='font-size:10px; padding-top:5px; font-style:italic; color:whitesmoke;'>".$rep['datetime']."</span></h5>";
																} 
																echo "
																<h5 id='question_cat'>".$dis['category']."</h5>";
																//reply with image.
																if ($rep['reply_image'] != 'null'){
																	echo"
																	<div class='row mb-3'>
																		<div class='col-md-4'>
																			<img src='http://localhost/Learnzia/assets/uploads/reply_".$rep['reply_image'].".jpg' id='question_img' 
																				data-toggle='modal' data-target='#zoom".$rep['id_reply']."'>
																			<div id='question_alt'><i class='fa-solid fa-magnifying-glass'></i> Zoom Image</div>
																		</div>
																		<div class='col-md-6' style=''>
																			<p style='font-size:14px; color:whitesmoke;'>".$rep['replytext']."</p>
																		</div>
																	</div>";
																} else { 
																	echo"
																	<p style='font-size:14px; color:whitesmoke;'>".$rep['replytext']."</p>";
																}
																echo "
																<p style='font-size:14px; color:whitesmoke; font-style:italic; margin-top:-10px;'>Replies from <a style='color:#F1C40F; font-weight:500; text-decoration:underline; cursor:pointer;'>".$dis['question']."</a></p>
																<a class='btn btn-primary mx-2 border-0 rounded-pill' id='btn-up' title='up'><i class='fa-solid fa-arrow-up fa-lg'></i>  10</a>
																<a class='btn btn-transparent border-0 mx-2 text-white' style='float:right;' data-toggle='modal' data-target='#shareDisc".$rep['id_reply']."' title='forward'><i class='fa-solid fa-paper-plane'></i></a>
															</div>
														</div>";
													}
												}
											}
										} else if(($msg['id_user_sender'] == $this->session->userdata("userIdTrack"))&&($msg['id_social'] == $c['id_social'])){
											foreach($dataReply as $rep){
												foreach($allDisc as $dis){
													if(($msg['message'] == $rep['id_reply'])&&($dis['id_discussion'] == $rep['id_discussion'])){
														echo"
														<div class='card p-2 my-3 border-0 rounded w-75' style='background-color:#212121; border-top-right-radius: 35px;'>
															<div class='card-header' id='headingOne'>
																<img src='http://localhost/Learnzia/assets/uploads/user/user_".$rep['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid mx-2' style='width:45px; float:left;'>
																<a class='btn btn-transparent border-0 mx-2 text-white' style='float:right;' data-toggle='modal' data-target='#'><i class='fa-solid fa-ellipsis-vertical'></i></a>";
																//Reply header.
																if($rep['id_user'] == $this->session->userdata('userIdTrack')){
																	echo"
																	<h5 style='font-size:18px;'>You <span style='font-size:10px; padding-top:5px; font-style:italic; color:whitesmoke;'>".$rep['datetime']."</span></h5>";
																} else {
																	echo"
																	<h5 style='font-size:18px;'>".$rep['username']." <span style='font-size:10px; padding-top:5px; font-style:italic; color:whitesmoke;'>".$rep['datetime']."</span></h5>";
																} 
																echo "
																<h5 id='question_cat'>".$dis['category']."</h5>";
																//reply with image.
																if ($rep['reply_image'] != 'null'){
																	echo"
																	<div class='row mb-3'>
																		<div class='col-md-4'>
																			<img src='http://localhost/Learnzia/assets/uploads/reply_".$rep['reply_image'].".jpg' id='question_img' 
																				data-toggle='modal' data-target='#zoom".$rep['id_reply']."'>
																			<div id='question_alt'><i class='fa-solid fa-magnifying-glass'></i> Zoom Image</div>
																		</div>
																		<div class='col-md-6' style=''>
																			<p style='font-size:14px; color:whitesmoke;'>".$rep['replytext']."</p>
																		</div>
																	</div>";
																} else { 
																	echo"
																	<p style='font-size:14px; color:whitesmoke;'>".$rep['replytext']."</p>";
																}
																echo "
																<p style='font-size:14px; color:whitesmoke; font-style:italic; margin-top:-10px;'>Replies from <a style='color:#F1C40F; font-weight:500; text-decoration:underline; cursor:pointer;'>".$dis['question']."</a></p>
																<a class='btn btn-primary mx-2 border-0 rounded-pill' id='btn-up' title='up'><i class='fa-solid fa-arrow-up fa-lg'></i>  10</a>
																<a class='btn btn-transparent border-0 mx-2 text-white' style='float:right;' data-toggle='modal' data-target='#shareDisc".$rep['id_reply']."' title='forward'><i class='fa-solid fa-paper-plane'></i></a>
															</div>
														</div>";
													}
												}
											}
										}
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
