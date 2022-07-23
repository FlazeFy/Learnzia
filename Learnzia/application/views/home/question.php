<div class="container-fluid">
	<?php 
		$i = 1; 
		$count = 0;
		foreach($allDisc as $data){	
			echo"
			<div id='accordion2'>
				<div class='card p-2 border-0 rounded' style='background-color:#212121;'>
					<div class='card-header' id='headingOne'>
						<img src='http://localhost/Learnzia/assets/uploads/user_".$data['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; margin-top: -1%; 
							margin-right:1%; float:left;'>";
						if($data['sender'] == $this->session->userdata('userTrack')){
							echo"<h5 style='font-size:20px; float:left;'>You</h5>";
						} else {
							echo"<h5 style='font-size:20px; float:left;'>".$data['sender']."</h5>";
						} echo "
						<p style='font-size:10px; padding-top:10px; float:left; font-style:italic; color:whitesmoke;'>".$data['datetime']."</p>
						<a class='btn btn-transparent border-0' style='margin-top:-5px; float:right; color:#F1C40F;' data-toggle='modal' data-target='#shareDisc".$data['id_discussion']."'><i class='fa-solid fa-share'></i></a>
						<br><hr>";
						//Image w/ question
						if ($data['image'] == 'yes'){
							echo"
							<div class='row' style='margin-bottom:1%;'>
								<div class='col-md-4 border-right'>
									<img src='http://localhost/Learnzia/assets/uploads/discussion_".$data['imageURL'].".jpg' style='border-radius:6px; width:100%; height:100%; cursor:pointer' 
									alt='' data-toggle='modal' data-target='#zoom".$data['id_discussion']."'>
								</div>
								<div class='col-md-6' style=''>
									<p style='font-size:14px; color:whitesmoke;'><span style='color:#F1C40F; font-weight:500;'>".$data['subject']." | </span> ".$data['question']."</p>
								</div>
							</div>";
						} else { 
							echo"
							<p style='font-size:14px; color:whitesmoke;'><span style='color:#F1C40F; font-weight:500;'>".$data['subject']." | </span> ".$data['question']."</p>";
						}
						echo "<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$data['view']."</h6>
							<img src='http://localhost/Learnzia/assets/Images/icon/View.png' style='width:25px; height:25px; float:right; margin-top:-5px; padding-left:5px;'>
						<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$data['up']."</h6>
							<img src='http://localhost/Learnzia/assets/Images/icon/Up.png' style='width:25px; height:22px; float:right; margin-top:-4px; padding-left:5px;'>
						<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>".$data['comment']."</h6>
							<img src='http://localhost/Learnzia/assets/Images/icon/Comment.png' style='width:25px; height:20px; float:right; margin-top:-2px; padding-left:5px;'>
						<h5 style='font-size:15px; float:left; text-decoration:underline;' type='button' data-toggle='collapse' data-target='#collapse".$i."' 
						aria-expanded='true' aria-controls='collapseOne''>See Reply
							<img src='http://localhost/Learnzia/assets/Images/icon/Down.png' style='width:25px; height:20px; float:left; padding-left:3px;'></h5>
					</div>
					<!--Extend-->
					<div id='collapse".$i."' class='collapse' aria-labelledby='headingOne' data-parent='#accordion2'>
						<div class='card-body' style='background-color:#212121;'>";
							foreach ($dataReply as $data2){
							if ($data2['id_discussion'] == $data['id_discussion']){
							echo"<div class='container'>
								<img src='http://localhost/Learnzia/assets/uploads/user_".$data2['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; 
									float:left; margin-right:1%;'>";
								if($data2['sender'] == $this->session->userdata('userTrack')){
									echo"<h5 style='font-size:20px; margin-left:15px;'>You</h5>";
								} else {
									echo"<h5 style='font-size:20px; margin-left:15px;'>".$data2['sender']."</h5>";
								} if ($data2['image'] == 'yes'){
									echo"<div class='row' style='margin-bottom:1%;'>
									<div class='col-md-4 border-right'>
										<img id='icon' src='http://localhost/Learnzia/assets/uploads/reply/reply_".$data2['imageURL'].".jpg' style='border-radius:6px; width:100%; height:100%; cursor:pointer' 
										alt='' data-toggle='modal' data-target='#zoom".$data2['imageURL']."'>
									</div>
									<div class='col-md-6' style=''>
									<p style='font-size:14px; color:whitesmoke	;'>".$data2['replytext']."</p>
									</div>
								</div>";
								} else { echo"<p style='font-size:14px; color:whitesmoke;'>".$data2['replytext']."</p>";}
							echo "</div>"; $count++;}} 
							if(($count == 0) &&($data2['sender'] == $this->session->userdata('userTrack'))) {
								echo "<div class='container' style='margin-top:1%; margin-bottom:2%;'>
								<h4 style='font-style:italic; text-align:center;'>Sorry, your discussion isn't been answered yet</h4>
								<img src='http://localhost/Learnzia/assets/images/Sorry.png' alt='Sorry.png' style='display: block;
									margin-left: auto; margin-right: auto; width: 15%; height: 15%;'>
								<p style='font-style:italic; text-align:center; font-size:18px; color:#7289da;'>But dont worry, its only matter of time.</p>
							</div>";
							} else if (($count == 0) &&($data2['sender'] != $this->session->userdata('userTrack'))){
								echo "<div class='container' style='margin-top:1%; margin-bottom:2%;'>
								<h4 style='font-style:italic; text-align:center;'>This discussion hasn't been answered yet</h4>
								<img src='http://localhost/Learnzia/assets/images/Error404.png' alt='Error404.png' style='display: block;
									margin-left: auto; margin-right: auto; width: 15%; height: 15%;'>
								<p style='font-style:italic; text-align:center; font-size:18px; color:#7289da;'>Let's be the first one.</p>
								</div>";
							} else if ($count > 0) {echo"<h5 style='font-size:15px; font-style:italic;'>Showing ".$count." replies...</h5><br>";}
							echo"<form method='post' action='homeCtrl/sendReply' class='form-inline' enctype='multipart/form-data'>
								<input type='text' class='form-control' name='id_discussion' value='".$data['id_discussion']."' hidden>
								<div class='container'><hr>
									<label class='switch' style='float:left; margin-right:1%;'>
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
			</div><br>";
			$count = 0;
		$i++;
		}
	?>
</div>	
