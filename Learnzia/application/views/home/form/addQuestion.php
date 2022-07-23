<div class='modal fade' id='discModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
	<div class='modal-dialog' role='document'>
		<form method='POST' action='homeCtrl/sendDisc' autocomplete="off" enctype="multipart/form-data">
			<div class='modal-content' style='background-color:#313436;'>
			<div class='modal-header'>
				<h5 class='modal-title' id='exampleModalLabel' style='color:#e69627; margin-top:1%;'>Category :</h5>
				<div class="form-group mb-3">
				<select class="form-control" name="category" style="width:300px;">
					<option value='math'>Math</option>
					<option value='coding'>Coding</option>
					<option value='design'>Design</option>
					<option value='science'>Science</option>
					<option value='history'>History</option>
				</select></div>
				<img  class="closebtn" src="http://localhost/Learnzia/assets/images/icon/Close.png"
				style="margin-top:2%;" type="button" data-dismiss='modal' aria-label='Close'>
			</div>
				<div class='modal-body'>
					<div class="form-group mb-3">
						<label class="label" for="text" style="color:#F1C40F;">Subject</label>
						<input type="text" class="form-control" placeholder="Subject" name="subject" required>
					</div>
					<div class="form-group mb-3">
						<label class="label" for="text" style="color:#F1C40F;">Question</label>
						<textarea rows="5" cols="60" name="question" class='form-control' required>Enter text here...</textarea>
					</div>
					<!-- Rounded switch -->
					<label class="switch" style='float:left; margin-right:2%;'>
					<input type="checkbox" name='imageSwitch'>
						<span class="slider round" data-toggle="collapse" data-target="#uploadDiscImg"></span>
					</label>
					<p style="color:whitesmoke;">Upload discussion with image</p>
					<!--Upload file.-->
					<div class="collapse" id="uploadDiscImg">
						<div class="form-group mb-3">
						<div class="container" style=''>
							<label class="label" for="text" style="color:#F1C40F;">Add Discussion Image</label>
							<div class="input-group mb-3" style="background-color:#212121; border-width: 0 0 3px; border-bottom: 3.5px solid #F1C40F; 
								border-radius:5px;">
								<div class="input-group-prepend">
									<span class="input-group-text">jpg</span>
								</div>
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="uploadImage" name="uploadImage" accept='image/*'>
									<label class="custom-file-label text-left" for="uploadImage">file size max 2 mb</label>
								</div>
							</div>
						</div>
						</div>
					</div>
				</div>
				<div class='modal-footer'>
					<button type='submit' style='color:whitesmoke; background-color:#e69627; border:none;' 
						class='btn btn-primary'>Send</button>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>
