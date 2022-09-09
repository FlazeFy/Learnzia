<style>
	/*Chat Bubble*/
	.imessage {
		background-color:transparent; 
		border-radius: 5px;
		display: flex;
		flex-direction: column;
		font-size: 1.25rem;
		margin: 0 auto 1rem;
		padding: 0.5rem 1.5rem;
		min-width: 110%;
	}

	.imessage p {
		border-radius: 1.15rem;
		line-height: 1.25;
		max-width: 75%;
		padding: 0.5rem .875rem;
		position: relative;
		word-wrap: break-word;
	}

	.imessage p::before,
	.imessage p::after {
		bottom: -0.1rem;
		content: "";
		height: 1rem;
		position: absolute;
	}

	p.from-me {
		align-self: flex-end;
		background-color: #f1c40f;
		color: #212121;
		font-weight:500; 
		font-size:15px;
		max-width: 70%;
	}

	p.from-me::before {
		border-bottom-left-radius: 0.8rem 0.7rem;
		border-right: 1rem solid #f1c40f;
		right: -0.35rem;
		transform: translate(0, -0.1rem);
	}

	p.from-me::after {
		background-color: #0a0c10;
		border-bottom-left-radius: 0.5rem;
		right: -40px;
		transform:translate(-30px, -2px);
		width: 10px;
	}

	p[class^="from-"] {
		margin: 0.5rem 0;
		width: fit-content;
	}

	p.from-me ~ p.from-me {
		margin: 0.25rem 0 0;
	}

	p.from-me ~ p.from-me:not(:last-child) {
		margin: 0.25rem 0 0;
	}

	p.from-me ~ p.from-me:last-child {
		margin-bottom: 0.5rem;
	}

	p.from-them {
		align-items: flex-start;
		background-color: #232323;
		color: whitesmoke; 
		font-size:15px;
		max-width: 70%;
	}

	p.from-them:before {
		border-bottom-right-radius: 0.8rem 0.7rem;
		border-left: 1rem solid #232323;
		left: -0.35rem;
		transform: translate(0, -0.1rem);
	}

	p.from-them::after {
		background-color: #0a0c10;
		border-bottom-right-radius: 0.5rem;
		left: 20px;
		transform: translate(-30px, -2px);
		width: 10px;
	}

	p[class^="from-"].emoji {
		background: none;
		font-size: 2.5rem;
	}

	p[class^="from-"].emoji::before {
		content: none;
	}

	.no-tail::before {
		display: none;
	}

	.margin-b_none {
		margin-bottom: 0 !important;
	}

	.margin-b_one {
		margin-bottom: 1rem !important;
	}

	.margin-t_one {
		margin-top: 1rem !important;
	}

	/* general styling */
	@font-face {
		font-family: "SanFrancisco";
		src:
		url("https://cdn.rawgit.com/AllThingsSmitty/fonts/25983b71/SanFrancisco/sanfranciscodisplay-regular-webfont.woff2") format("woff2"),
		url("https://cdn.rawgit.com/AllThingsSmitty/fonts/25983b71/SanFrancisco/sanfranciscodisplay-regular-webfont.woff") format("woff");
	}

	.comment {
		color: #222;
		font-size: 1.25rem;
		line-height: 1.5;
		margin-bottom: 1.25rem;
		max-width: 100%;
		padding: 0;
	}

	@media screen and (max-width: 800px) {
	.imessage {
		font-size: 1.05rem;
		margin: 0 auto 1rem;
		padding: 0.25rem 0.875rem;
	}

	.imessage p {
		margin: 0.5rem 0;
	}
	}
</style>

<?php
	$count = 0; 
	foreach($contacts as $c){
		if($c['id_social'] == $this->session->userdata('set_id_social')){
			foreach($allUser as $au){
				if (($au['id_user'] == $c['id_user_2'])&&($c['id_user_2'] != $this->session->userdata('userIdTrack'))&&($c['id_user_1'] == $this->session->userdata('userIdTrack'))){
					echo "
					<div class='card bg-transparent' style='overflow-y: initial;'>
						<div class='card-header text-center'>
							<img src='http://localhost/Learnzia/assets/uploads/user/".$au['imageURL'].".jpg' class='rounded-circle img-fluid d-block mx-auto' style='width:45px; height:45px;'><br>
							<h5 style='font-size:18px; margin-top:-15px;'>".$au['username'];
							//User login status
							if($au['status'] == 'online'){
								echo "<a style='font-size:14px; color:#00a13e;'> ".$au['status']."</a>";
							} 
							else if($au['status'] == 'offline'){
								echo "<a style='font-size:14px; color:#F14D0F;'> ".$au['status']."</a>";
							}
							echo "</h5>
						</div>
						<div class='card-body bg-transparent imessage' style='max-height: calc(80vh - 160px); max-width:auto; overflow-y: auto; height:800px; min-width:100%;'>";
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
														<img src='http://localhost/Learnzia/assets/uploads/user/".$dis['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid mx-2' style='width:45px; float:left;'>
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
														<img src='http://localhost/Learnzia/assets/uploads/user/".$dis['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid mx-2' style='width:45px; float:left;'>
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
															<img src='http://localhost/Learnzia/assets/uploads/user/".$rep['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid mx-2' style='width:45px; float:left;'>
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
															<img src='http://localhost/Learnzia/assets/uploads/user/".$rep['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid mx-2' style='width:45px; float:left;'>
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
							<div class='card-footer w-100 rounded px-3 py-2 shadow' style='background:#212121; height:60px;'>";
								$this->load->view('contact/send');
							echo" </div>
						</div>
					</div>";
				} else if (($au['id_user'] == $c['id_user_1'])&&($c['id_user_1'] != $this->session->userdata('userIdTrack'))&&($c['id_user_2'] == $this->session->userdata('userIdTrack'))){
					echo "
					<div class='card bg-transparent' style='overflow-y: initial;'>
						<div class='card-header text-center'>
							<img src='http://localhost/Learnzia/assets/uploads/user/".$au['imageURL'].".jpg' class='rounded-circle img-fluid d-block mx-auto' style='width:45px; height:45px;'><br>
							<h5 style='font-size:18px; margin-top:-15px;'>".$au['username'];
							//User login status
							if($au['status'] == 'online'){
								echo "<a style='font-size:14px; color:#00a13e;'> ".$au['status']."</a>";
							} 
							else if($au['status'] == 'offline'){
								echo "<a style='font-size:14px; color:#F14D0F;'> ".$au['status']."</a>";
							}
							echo "</h5>
						</div>
						<div class='card-body bg-transparent imessage' style='max-height: calc(80vh - 160px); max-width:auto; overflow-y: auto; height:800px; min-width:100%;'>";
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
														<img src='http://localhost/Learnzia/assets/uploads/user/".$dis['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid mx-2' style='width:45px; float:left;'>
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
														<img src='http://localhost/Learnzia/assets/uploads/user/".$dis['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid mx-2' style='width:45px; float:left;'>
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
															<img src='http://localhost/Learnzia/assets/uploads/user/".$rep['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid mx-2' style='width:45px; float:left;'>
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
															<img src='http://localhost/Learnzia/assets/uploads/user/".$rep['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid mx-2' style='width:45px; float:left;'>
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
							<div class='card-footer w-100 rounded px-3 py-2 shadow' style='background:#212121; height:60px;'>";
								$this->load->view('contact/send');
							echo"</div>
						</div>
					</div>";
				}
			}
			$count = 0;
		}
	}
?>
