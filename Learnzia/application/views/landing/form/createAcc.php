	<div class="accordion" id="accordionExample">
		<div class="steps">
			<progress id="progress" value=0 max=100 ></progress>
			<div class="step-item">
				<button class="step-button text-center" type="button" data-toggle="collapse"
					data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					1
				</button>
				<div class="step-title text-white">
					Profile
				</div>
			</div>
			<div class="step-item">
				<button class="step-button text-center collapsed" type="button" data-toggle="collapse"
					data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					2
				</button>
				<div class="step-title text-white">
					Account
				</div>
			</div>
			<div class="step-item">
				<button class="step-button text-center collapsed" type="button" data-toggle="collapse"
					data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					3
				</button>
				<div class="step-title text-white">
					Validation
				</div>
			</div>
		</div>
		<form method="post" action="loginCtrl/createAcc" autocomplete="off" enctype="multipart/form-data">

		<div class="card border-0" style="background: rgb(33, 33, 33);">
			<div  id="headingOne">
			</div>

			<div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
				data-parent="#accordionExample">
				<div class="card-body border-0">
					<!--Steps control-->
					<div class="row mt-3">
						<div class="col-md-5">
						</div>
						<div class="col-md-2">
						</div>
						<div class="col-md-5">
							<a type="button" class="btn btn-success w-100 m-2" data-toggle="collapse"
								data-target="#collapseTwo">Next <i class="fa-solid fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="card border-0" style="background: rgb(33, 33, 33);">
			<div  id="headingTwo">

			</div>
			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				<div class="card-body">
					<div class="row">
						<div class="col-md">
							<div class="form-group mb-3">
								<label class="label" for="fullname" style="color:#F1C40F;">Fullname</label>
								<input type="fullname" class="form-control" placeholder="Username" style="background:#212121; border-width: 0 0 3px; 
									border-bottom: 3.5px solid #F1C40F; color:whitesmoke;" name="fullname" required>
							</div>
						</div>
						<div class="col-md">
							<div class="form-group mb-3">
								<label class="label" for="country" style="color:#F1C40F;">Country</label><br>
								<div class="autocomplete">
									<input id="searchInput" class="form-control" type="text" name="country" placeholder="Country" required>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group mb-3">
						<label class="label" for="description" style="color:#F1C40F;">Description</label>
						<textarea rows="3" cols="60" name="description" style="background:#212121; border-width: 0 0 3px; 
						border-bottom: 3.5px solid #F1C40F; color:whitesmoke; border-radius:5px;" required >Enter about you here...</textarea>
					</div>
					<div class="row">
						<div class="col-md-7">
							<!--Upload file.-->
							<div class="form-group mb-3">
								<label class="label" for="description" style="color:#F1C40F;">Profile Image</label>
								<div class="input-group mb-3" style="background-color:#212121; border-width: 0 0 3px; border-bottom: 3.5px solid #F1C40F; 
									border-radius:5px;">
									<div class="input-group-prepend">
										<span class="input-group-text">jpg</span>
									</div>
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="formFileCreateAcc" onchange="previewCreateAcc()" name="uploadImage" accept="image/png, image/jpg, image/jpeg" required>
										<label class="custom-file-label text-left" for="uploadImage">size max 5 mb</label>
									</div>
								</div>
							</div>
							<div class="form-group mb-3" >
								<label class="label" for="username" style="color:#F1C40F;">Username</label>
								<input type="username" class="form-control" placeholder="Username" style="background:#212121; border-width: 0 0 3px; 
									border-bottom: 3.5px solid #F1C40F; color:whitesmoke;" name="username" required>
							</div>
							<div class="form-group mb-3">
								<label class="label" for="email" style="color:#F1C40F;">Email</label>
								<input type="email" class="form-control" placeholder="Email" style="background:#212121; border-width: 0 0 3px; 
									border-bottom: 3.5px solid #F1C40F; color:whitesmoke;" name="email" required>
							</div>
						</div>
						<div class="col-md-5">
							<img id="frame" src="http://localhost/Learnzia/assets/images/icon/NoImage.png" class="img-fluid bg-transparent" style="width:200px;"/>
							<a type="button" onclick="clearImageCreateAcc()" class="btn btn-danger mt-3 w-100"><i class="fa-solid fa-trash"></i> Reset</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-7">
							<div class="form-group mb-3">
								<label class="label" for="password" style="color:#F1C40F;">Password</label>
								<input type="password" class="form-control" placeholder="Password" style="background:#212121; border-width: 0 0 3px; 
									border-bottom: 3.5px solid #F1C40F; color:whitesmoke;" name="password" required>
							</div>
						</div>
						<div class="col-md-5">
							<p style="color: #F1C40F; font-size: 14px;"><i class="fa-solid fa-circle-info"></i> Password must have minimum 8 character, 1 capital, and 1 number.</p><br>
						</div>
					</div>
					<!--Steps control-->
					<div class="row mt-3">
						<div class="col-md-5">
							<a type="button" class="btn btn-success w-100 m-2"  data-toggle="collapse"
								data-target="#collapseOne"><i class="fa-solid fa-arrow-left"></i> Previous</a>
						</div>
						<div class="col-md-2">
						</div>
						<div class="col-md-5">
							<a type="button" class="btn btn-success w-100 m-2"  data-toggle="collapse"
								data-target="#collapseThree">Next <i class="fa-solid fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card border-0" style="background: rgb(33, 33, 33);">
			<div  id="headingThree">

			</div>
			<div id="collapseThree" class="collapse" aria-labelledby="headingThree"
				data-parent="#accordionExample">
				<div class="card-body">
					<p class="text-center" style="color: #E0B315;">We have sent a verification code to your email</p>

					<p class="text-center" style="color: #E0B315;">Did not receive code ?, <a type="button" class="btn btn-info" >Resend</a></p>
					<!--Steps control-->
					<div class="row mt-3">
						<div class="col-md-5">
							<a type="button" class="btn btn-success w-100 m-2"  data-toggle="collapse"
								data-target="#collapseTwo"><i class="fa-solid fa-arrow-left"></i> Previous</a>
						</div>
						<div class="col-md-2">
						</div>
						<div class="col-md-5">
							<button type="submit" class="form-control btn btn-primary m-2" style="color:white;">Register</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	</div>

