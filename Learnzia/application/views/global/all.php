

<section id="content" class="content">
	<div class="container">
		<ul id="content-flters" class="d-flex justify-content-center">
			<li data-filter="*" class="filter-active">All</li>
			<li data-filter=".filter-class">Classroom</li>
			<li data-filter=".filter-history">History</li>
			<li data-filter=".filter-coding">Coding</li>
			<li data-filter=".filter-science">Science</li>
			<li data-filter=".filter-math">Math</li>
		</ul>

		<div class="row content-container">
			<?php
				foreach($content->result_array() as $ct){
					if($ct['cat'] == 2){
						//Classroom
						echo"
						<div class='col-lg-4 col-md-6 px-2 content-item filter-class'>
							<div class='container-fluid p-3 rounded shadow apps' style='background:#262626;'>
								<img  src='http://localhost/Learnzia/assets/uploads/classroom/".$ct['image_url'].".jpg' alt='Card image cap' class='rounded img-fluid mx-2' style='width:45px; float:left;'>
								<a class='btn btn-transparent border-0 mx-2 text-white' style='float:right;' data-toggle='modal' data-target='#'><i class='fa-solid fa-ellipsis-vertical'></i></a>
								<h5 style='font-size:18px;'>/".$ct['username']."</h5>
								<h5 style='color:#7289DA; font-size:14px;'>".$ct['category']."</h5><br>
								<p>".$ct['description']."</p>
								<a class='float-left'><i class='fa-solid fa-user'></i> 3</a><br>
							</div>
						</div>";
					} else {
						//Question
						echo"
						<div class='col-lg-4 col-md-6 px-2 content-item filter-".$ct['category']."'>
							<div class='card-header shadow' id='headingOne' style='background-color:#262626;'>
								<img src='http://localhost/Learnzia/assets/uploads/user/user_".$ct['image_user'].".jpg' alt='Card image cap' class='rounded-circle img-fluid mx-2' style='width:45px; float:left;'>
								<a class='btn btn-transparent border-0 mx-2 text-white' style='float:right;' data-toggle='modal' data-target='#'><i class='fa-solid fa-ellipsis-vertical'></i></a>";
								//Discussion header.
								if($ct['id_user'] == $this->session->userdata('userIdTrack')){
									echo"
									<h5 style='font-size:18px;'>You <span style='font-size:10px; padding-top:5px; font-style:italic; color:whitesmoke;'>".$ct['created_at']."</span></h5>";
								} else {
									echo"
									<h5 style='font-size:18px;'>".$ct['username']." <span style='font-size:10px; padding-top:5px; font-style:italic; color:whitesmoke;'>".$ct['created_at']."</span></h5>";
								} echo "
								<h5 style='color:#7289DA; font-size:14px;'>".$ct['category']."</h5>";
								//Question with image.
								if ($ct['image_url'] != 'null'){
									echo"
									<div class='row mb-3'>
										<div class='col-md-4'>
											<img src='http://localhost/Learnzia/assets/uploads/discussion_".$ct['image_url'].".jpg' style='width:100px;' id='question_img' 
												data-toggle='modal' data-target='#zoom".$ct['id']."'>
											<div id='question_alt'><i class='fa-solid fa-magnifying-glass'></i> Zoom Image</div>
										</div>
										<div class='col-md-6' style=''>
											<p style='font-size:14px; color:whitesmoke;'><span style='color:#F1C40F; font-weight:500;'>".$ct['description']." | </span> ".$ct['body']."</p>
										</div>
									</div>";
								} else { 
									echo"
									<p style='font-size:14px; color:whitesmoke;'><span style='color:#F1C40F; font-weight:500;'>".$ct['description']." | </span> ".$ct['body']."</p>";
								}
								echo "
								<a class='btn btn-primary mx-2 border-0 rounded-pill w-25' id='btn-up' title='up'><i class='fa-solid fa-arrow-up fa-lg'></i>  10</a>
								<a class='btn btn-transparent border-0 mx-2 text-white' style='float:right;' data-toggle='modal' data-target='#shareDisc".$ct['id']."' title='forward'><i class='fa-solid fa-paper-plane'></i></a>
								<a class='btn btn-transparent mx-2 border-0 rounded-pill text-white' id='btn-reply' type='button' title='see detail'><i class='fa-regular fa-message'></i> "; 
									//Count reply.
									$reply = 0;
									foreach ($dataReply as $r2){
										if ($r2['id_discussion'] == $ct['id']){
											$reply++;
										}
									}
									echo $reply;
								echo"</a>
							</div>
						</div>";
					}
				}
			?>
		</div>

	</div>
</section><!-- End My content Section -->
