<style>
    .reply .reply-item {
		padding: 0 0 20px 20px;
		margin-top: -2px;
		border-left: 2px solid #f1c40f;
		position: relative;
		margin-left:30px;
    }
    .reply .reply-item ul {
      	padding-left: 20px;
    }
    .reply .reply-item ul li {
      	padding-bottom: 10px;
    }
    .reply .reply-item:last-child {
    	padding-bottom: 0;
    }
    .reply .reply-item::before {
		content: "";
		position: absolute;
		width: 16px;
		height: 16px;
		border-radius: 50px;
		left: -9px;
		top: 0;
		background: #212121;
		border: 2px solid #f1c40f;
    }
	.reply .reply-item.verified::before {
		content: "";
		position: absolute;
		width: 16px;
		height: 16px;
		border-radius: 50px;
		left: -9px;
		top: 0;
		background: green;
		border: 2px solid #f1c40f;
    }
	#btn-up{
		float:left; 
		color:whitesmoke; 
		width:120px;
	}
	#btn-reply{
		float:left; 
		color:whitesmoke; 
		width:80px;
	}
	#question_cat{
		color:grey; 
		font-size:16px; 
		margin-top:-5px;
		font-weight:normal;
	}
	#question_img{
		border-radius:6px; 
		width:100%; 
		height:100%; 
		cursor:pointer
	}
	#question_img:hover{
		webkit-filter: blur(4px);
    	filter: blur(4px);
	}
	.col-md-4 #question_alt{
		position : relative;
		padding : 4px;
		text-align : center;
		visibility : hidden;
		font-weight:bold;
		font-size:26px;
		opacity : 0;
		top : -60px;
		transition : 0.3s ease-in-out;	
	}
	.col-md-4:hover #question_alt{
		visibility : visible;
		display:block;
		opacity : 1;
		transition-delay: 0.2s;
		color:#f1c40f;
	}
	.card-footer, .card-header{
		background:#202020;
	}
	.card-body{
		background:#262626;
	}
</style>

<div class="container" style='max-height: calc(160vh - 120px); overflow-y: auto;'>
	<?php
		$i = 1; 
		$count = 0;
		foreach($myDiscussion as $data){	
			echo"
			<div id='accordion-que' class='accordion'>
				<div class='card p-2 my-3 border-0 rounded' style='background-color:#212121;'>
					<div class='card-header' id='headingOne'>
						<img src='http://localhost/Learnzia/assets/uploads/".$data['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid mx-2' style='width:45px; float:left;'>
						<a class='btn btn-transparent border-0 mx-2 text-white' style='float:right;' data-toggle='modal' data-target='#'><i class='fa-solid fa-ellipsis-vertical'></i></a>";
						//Discussion header.
						if($data['id_user'] == $this->session->userdata('userIdTrack')){
							echo"
							<h5 style='font-size:18px;'>You <span style='font-size:10px; padding-top:5px; font-style:italic; color:whitesmoke;'>".$data['datetime']."</span></h5>";
						} else {
							echo"
							<h5 style='font-size:18px;'>".$data['username']." <span style='font-size:10px; padding-top:5px; font-style:italic; color:whitesmoke;'>".$data['datetime']."</span></h5>";
						} echo "
						<h5 id='question_cat'>".$data['category']."</h5>";
						//Question with image.
						if ($data['discussion_image'] != 'null'){
							echo"
							<div class='row mb-3'>
								<div class='col-md-4'>
									<img src='http://localhost/Learnzia/assets/uploads/discussion_".$data['discussion_image'].".jpg' id='question_img' 
										data-toggle='modal' data-target='#zoom".$data['id_discussion']."'>
									<div id='question_alt'><i class='fa-solid fa-magnifying-glass'></i> Zoom Image</div>
								</div>
								<div class='col-md-6' style=''>
									<p style='font-size:14px; color:whitesmoke;'><span style='color:#F1C40F; font-weight:500;'>".$data['subject']." | </span> ".$data['question']."</p>
								</div>
							</div>";
						} else { 
							echo"
							<p style='font-size:14px; color:whitesmoke;'><span style='color:#F1C40F; font-weight:500;'>".$data['subject']." | </span> ".$data['question']."</p>";
						}

						//Upvote and downvote.
						$y = 0;
						$found = 0;
						$id_up = 0;
						foreach($allVoteDis as $vote){
							if($vote['id_context'] == $data['id_discussion']){
								$y++;
								if($vote['id_user'] == $this->session->userdata('userIdTrack')){
									$found++;
									$id_up = $vote['id_up'];
								}
							}
						}

						if($found == 1){
							echo "
							<form action='homeCtrl/downvoteDis' method='POST'>
								<input hidden name='id_up' value='".$id_up."'>
								<button type='submit' class='btn btn-success mx-2 border-0 rounded-pill' id='btn-up' title='up'><i class='fa-solid fa-arrow-up fa-lg'></i> ".$y."</button>
							</form>";
						} else {
							echo "
							<form action='homeCtrl/upvoteDis' method='POST'>
								<input hidden name='id_discussion' value='".$data['id_discussion']."'>
								<button type='submit' class='btn btn-primary mx-2 border-0 rounded-pill' id='btn-up' title='up' style='background:#F1c40f;'><i class='fa-solid fa-arrow-up fa-lg'></i> ".$y."</button>
							</form>";
						}
						echo "
						<a class='btn btn-transparent border-0 mx-2 text-white' style='float:right;' data-toggle='modal' data-target='#shareDisc".$data['id_discussion']."' title='forward'><i class='fa-solid fa-paper-plane'></i></a>
						<a class='btn btn-transparent mx-2 border-0 rounded-pill' id='btn-reply' type='button' data-toggle='collapse' data-target='#collapse-".$i."' title='see replies'><i class='fa-regular fa-message'></i> "; 
							//Count reply.
							$reply = 0;
							foreach ($dataReply as $r2){
								if ($r2['id_discussion'] == $data['id_discussion']){
									$reply++;
								}
							}
							echo $reply;
						echo"</a>
					</div>
					<!--Extend-->
					<div id='collapse-".$i."' class='collapse' aria-labelledby='headingOne' data-parent='#accordion-que'>
						<div class='card-body reply rounded'>";
							//Check if there's a verified reply on discussion
							$verified = false;
							foreach ($dataReply as $check){
								if (($check['id_discussion'] == $data['id_discussion'])&&($check['reply_status'] == "verified")){
									$verified = true;
								}
							}
							//Discussion reply.
							foreach ($dataReply as $data2){
								if ($data2['id_discussion'] == $data['id_discussion']){
									echo"
									<div "; if($data2['reply_status'] == 'verified'){echo "class='reply-item verified'";} else {echo "class='reply-item' ";} echo">
										<div class='p-2 rounded' "; if($data2['reply_status'] == 'verified'){echo "style='border:2px solid green !important;'";} echo">
										<img src='http://localhost/Learnzia/assets/uploads/".$data2['imageURL'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; 
											float:left; margin-right:1%;'>";
										//Reply username.
										if($data2['id_user'] == $this->session->userdata('userIdTrack')){
											echo"
											<h5 style='font-size:18px;'>You <span style='font-size:10px; padding-top:5px; font-style:italic; color:whitesmoke;'>".$data2['datetime']."</span></h5>";
										} else {
											echo"
											<h5 style='font-size:18px;'>".$data2['username']." <span style='font-size:10px; padding-top:5px; font-style:italic; color:whitesmoke;'>".$data2['datetime']."</span></h5>";
										//Reply with image.
										} if ($data2['reply_image'] != 'null'){
											echo"
											<div class='row mb-2'>
												<div class='col-md-4'>
													<img src='http://localhost/Learnzia/assets/uploads/reply/reply_".$data2['reply_image'].".jpg' id='question_img' 
														data-toggle='modal' data-target='#zoom".$data2['reply_image']."'>
													<div id='question_alt'><i class='fa-solid fa-magnifying-glass'></i> Zoom Image</div>
												</div>
												<div class='col-md-6' style=''>
													<p style='font-size:14px; color:whitesmoke;'>".$data2['replytext']."</p>
												</div>
											</div>";
										} else { 
											echo"
											<p style='font-size:14px; color:whitesmoke;'>".$data2['replytext']."</p>";
										}
										echo"<div class='row px-2'>";
											//Upvote and downvote.
											$y = 0;
											$found = 0;
											$id_up = 0;
											foreach($allVoteRep as $vote){
												if($vote['id_context'] == $data2['id_reply']){
													$y++;
													if($vote['id_user'] == $this->session->userdata('userIdTrack')){
														$found++;
														$id_up = $vote['id_up'];
													}
												}
											}

											if($found == 1){
												echo "
												<form action='homeCtrl/downvoteRep' method='POST'>
													<input hidden name='id_up' value='".$id_up."'>
													<button type='submit' class='btn btn-success mx-2 border-0 rounded-pill' title='up' style='width:100px;'><i class='fa-solid fa-arrow-up fa-lg'></i> ".$y."</button>
												</form>";
											} else {
												echo "
												<form action='homeCtrl/upvoteRep' method='POST'>
													<input hidden name='id_discussion' value='".$data2['id_reply']."'>
													<button type='submit' class='btn btn-primary mx-2 border-0 rounded-pill' title='up vote' style='background:#F1c40f; width:100px;'><i class='fa-solid fa-arrow-up fa-lg'></i> ".$y."</button>";
													echo"
												</form>";
												if(($data['id_user'] == $this->session->userdata('userIdTrack'))&&($data2['reply_status'] != 'verified')&&($data2['id_user'] != $this->session->userdata('userIdTrack'))&&(!$verified)){
													echo"
													<form action='homeCtrl/verifyRep' method='POST'>
														<input hidden name='id_reply' value='".$data2['id_reply']."'>
														<button class='btn btn-success bg-transparent rounded-pill text-success' type='submit' title='verified this reply'><i class='fa-solid fa-check'></i> Verify</button>
													</form>";
												}
											}
											echo "
											</div>
										</div>
									</div>"; 
									$count++;
								}
							} 
							//If there's no reply for a question.
							if(($count == 0) &&($data2['id_user'] == $this->session->userdata('userIdTrack'))) {
								echo "
								<div class='container m-2 text-center'>
									<h6 style='font-style:italic; color:#f1c40f;'>Sorry, your discussion isn't been answered yet</h6>
									<img src='http://localhost/Learnzia/assets/images/Sorry.png' alt='Sorry.png' class='d-block mx-auto img img-fluid' style='width: 100px;'>
									<p style='font-style:italic; text-align:center; font-size:18px; color:#7289da;'>But dont worry, its only matter of time.</p>
								</div>";
							} else if (($count == 0) &&($data2['id_user'] != $this->session->userdata('userIdTrack'))){
								echo "
								<div class='container m-2 text-center'>
									<h6 style='font-style:italic; color:#f1c40f;'>This discussion hasn't been answered yet</h6>
									<img src='http://localhost/Learnzia/assets/images/Error404.png' alt='Error404.png' class='d-block mx-auto img img-fluid' style='width: 100px;'>
									<p style='font-style:italic; color:#7289da;'>Let's be the first one.</p>
								</div>";
							//If there's a reply
							} else if ($count > 0){
								echo"
								<h5 style='font-size:15px; font-style:italic;'>Showing ".$count." replies...</h5><br>";
							}
							//Reply a question
								echo"
								<form method='post' action='homeCtrl/sendReply' class='form-inline' enctype='multipart/form-data'>
								<input name='id_discussion' value='".$data['id_discussion']."' hidden>
								<div class='card-footer w-100 rounded p-3 shadow'>
									<label class='switch mx-2' style='float:left;'>
									<input type='checkbox' name='imageSwitchR'>
										<span class='slider round' type='button' data-toggle='collapse' data-target='#collapseImage".$i."'></span>
									</label>
									<a style='color:whitesmoke; float:left;'>Image</a>
									<button class='btn btn-primary' style='color:whitesmoke; background-color:#00a13e; float:right; border:none;' type='submit'>Send</button>
									<input class='form-control' type='text' placeholder='Type your reply here...' style='width:40%; float:right; margin-right:1%;' name='replytext'>
									<div class='collapse' id='collapseImage".$i."'>
										<div class='container' style='width:40%; float:left;'>
											<div class='input-group mb-3' style='background-color:#212121; border-width: 0 0 3px; border-bottom: 3.5px solid #F1C40F; 
												border-radius:5px;'>
												<div class='input-group-prepend'>
													<span class='input-group-text'>jpg</span>
												</div>
												<div class='custom-file'>
													<input type='file' class='custom-file-input' id='uploadImage' name='uploadImageR' accept='image/*'>
													<label class='custom-file-label text-left' for='uploadImage'>file size max 2 mb</label>
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
			$count = 0;
		$i++;
	}							
	if ($i == 0) {
		echo "<div class='container' style='margin-top:5%; margin-bottom:5%;'>
			<img src='http://localhost/Learnzia/assets/images/Error404.png' alt='Error404.png' style='display: block;
				margin-left: auto; margin-right: auto; width: 30%; height: 30%;'>
			<h4 style='font-style:italic; text-align:center; font-size:18px;'>You haven't post any discussion yet...</h4>
			<p style='font-style:italic; text-align:center; font-size:16px; color:#7289da;'>Lets discuss with other people by create a discussion in 
			<a style='text-decoration:underline; font-size:16px; color:#F1C40F;' href='homeCtrl'>Home </a> menu.</p>
		</div>";
	}
	?>

</div>
