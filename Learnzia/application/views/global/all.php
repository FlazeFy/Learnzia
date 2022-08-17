<style>
	/*content*/
	.content #content-flters {
		list-style: none;
		margin-bottom: 20px;
	}
	.content #content-flters li {
		cursor: pointer;
		display: inline-block;
		margin: 0 10px 10px 10px;
		font-size: 15px;
		font-weight: 600;
		line-height: 1;
		padding: 7px 10px;
		text-transform: uppercase;
		text-align: center;
		transition: all 0.3s ease-in-out;
	}
	.content #content-flters li:hover, .content #content-flters li.filter-active {
		color: #F1C40F;
	}
	.content .content-item {
		margin-bottom: 30px;
	}
	.content .content-item .content-img {
		overflow: hidden;
	}
	.content .content-item .content-img img {
		transition: all 0.8s ease-in-out;
	}
	.content .content-item .content-info {
		opacity: 0;
		position: absolute;
		left: 15px;
		bottom: 0;
		z-index: 3;
		right: 15px;
		color:white;
		transition: all ease-in-out 0.3s;
		background: rgba(0, 0, 0, 0.5);
		padding: 10px 15px;
	}
	.content .content-item .content-date {
		opacity: 0;
		position: absolute;
		top: 0;
		z-index: 3;
		right: 15px;
		transition: all ease-in-out 0.3s;
		background: rgba(0, 0, 0, 0.5);
		padding: 10px 15px;
	}
	.content .content-item .content-info h4 {
		font-size: 18px;
		color: #fff;
		font-weight: 600;
		color: #fff;
		margin-bottom: 0px;
	}
	.content .content-item .content-info p, .content-date p {
		color: rgba(255, 255, 255, 0.8);
		font-size: 14px;
		margin-bottom: 0;
	}
	.content .content-item .content-info .preview-link, .content .content-item .content-info .details-link {
		position: absolute;
		right: 15px;
		font-size: 24px;
		top: calc(50% - 18px);
		color: #fff;
		transition: 0.3s;
	}
	.content .content-item .content-info .preview-link:hover, .content .content-item .content-info .details-link:hover {
		color: #F1C40F;
	}
	.content .content-item .content-info .details-link {
		right: 10px;
	}
	.content .content-item:hover .content-img img {
		transform: scale(1.2);
	}
	.content .content-item:hover .content-info {
		opacity: 1;
	}
	.content .content-item:hover .content-date {
		opacity: 1;
	}

	.content-details {
		padding-top: 40px;
	}
	.content-details .content-details-slider img {
		width: 100%;
	}
	.content-details .content-details-slider .swiper-pagination {
		margin-top: 20px;
		position: relative;
	}
	.content-details .content-details-slider .swiper-pagination .swiper-pagination-bullet {
		width: 12px;
		height: 12px;
		background-color: #fff;
		opacity: 1;
		border: 1px solid #F1C40F;
	}
	.content-details .content-details-slider .swiper-pagination .swiper-pagination-bullet-active {
		color: #F1C40F;
	}
	.content-details .content-info {
		padding: 30px;
		box-shadow: 0px 0 30px rgba(59, 67, 74, 0.08);
	}
	.content-details .content-info h3 {
		font-size: 22px;
		font-weight: 700;
		margin-bottom: 20px;
		padding-bottom: 20px;
		border-bottom: 1px solid #eee;
	}
	.content-details .content-info ul {
		list-style: none;
		padding: 0;
		font-size: 15px;
	}
	.content-details .content-info ul li + li {
		margin-top: 10px;
	}
	.content-details .content-description {
		padding-top: 30px;
	}
	.content-details .content-description h2 {
		font-size: 26px;
		font-weight: 700;
		margin-bottom: 20px;
	}
	.content-details .content-description p {
		padding: 0;
	}
</style>

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
						<div class='col-lg-4 col-md-6 content-item filter-class'>
							<div class='container-fluid p-4 rounded shadow apps'>
								<img  src='http://localhost/Learnzia/assets/uploads/classroom/".$ct['image_url'].".jpg' alt='Card image cap' class='rounded img-fluid mx-2' style='width:45px; float:left;'>
								<a class='btn btn-transparent border-0 mx-2 text-white' style='float:right;' data-toggle='modal' data-target='#'><i class='fa-solid fa-ellipsis-vertical'></i></a>
								<h5 style='font-size:18px;'>/".$ct['username']."</h5>
								<h5 style='color:#7289DA; font-size:14px;'>".$ct['category']."</h5><br>
								<p>".$ct['description']."</p>
								<a class='float-left'><i class='fa-solid fa-user'></i> 3</a>
							</div>
						</div>";
					} else {
						echo"
						<div class='col-lg-4 col-md-6 content-item filter-class' style='background-color:#212121; border-top-left-radius: 35px;'>
							<div class='card-header' id='headingOne'>
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
								<h5 id='question_cat'>".$ct['category']."</h5>";
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
								<a class='btn btn-primary mx-2 border-0 rounded-pill w-50' id='btn-up' title='up'><i class='fa-solid fa-arrow-up fa-lg'></i>  10</a>
								<a class='btn btn-transparent border-0 mx-2 text-white' style='float:right;' data-toggle='modal' data-target='#shareDisc".$ct['id']."' title='forward'><i class='fa-solid fa-paper-plane'></i></a>
								<a class='btn btn-transparent mx-2 border-0 rounded-pill' id='btn-reply' type='button' title='see detail'><i class='fa-regular fa-message'></i> "; 
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
