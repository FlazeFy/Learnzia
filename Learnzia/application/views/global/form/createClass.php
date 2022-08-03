<div class='modal fade' id='newClassModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
	<div class='modal-dialog' role='document'>
		<form method='POST' action='<?php echo site_url().'globalCtrl/newClass'; ?>' enctype='multipart/form-data'>
			<div class='modal-content' style='background-color:#313436;'>
			<div class='modal-header'>
				<h5 class='modal-title' id='newClassModal' style='color:#e69627; margin-top:1%;'>Category :</h5>
				<div class="form-group mb-3">
				<select class="form-control" name="category" style="width:300px;">
					<option value='math'>Math</option>
					<option value='coding'>Coding</option>
					<option value='design'>Design</option>
					<option value='science'>Science</option>
					<option value='history'>History</option>
					<option value='multi'>Multi</option>
				</select></div>
				<img  class="closebtn" id="icon" src="http://localhost/Learnzia/assets/images/icon/Close.png"
				style="margin-top:2%;" type="button" data-dismiss='modal' aria-label='Close'>
			</div>
			<div class='modal-body'>
				<div class="form-group mb-3">
					<label class="label" for="text" style="color:#F1C40F;">Class Name</label>
					<input type="text" class="form-control" placeholder="Class Name" name="classname" required>
				</div>
				<div class="form-group mb-3">
					<label class="label" for="text" style="color:#F1C40F;">Description</label>
					<textarea rows="5" cols="60" name="description" class='form-control' required>Type description about your classroom and some rules...</textarea>
				</div>
				<label class="switch" style='float:left; margin-right:2%;'>
				<input type="checkbox" name='typeSwitch'>
					<span class="slider round"></span>
				</label>
				<p style="color:whitesmoke;">Private Class</p>
				<img id='icon' src='http://localhost/Learnzia/assets/images/icon/Info.png' style='float:left;'>
				<p style="color:#F1C40F; font-size:14px;">If you set the class's type to Private. People must request first, before they want to join. You 
					still can change this feature in the future.</p>
				<!-- Rounded switch -->
				<label class="switch" style='float:left; margin-right:2%;'>
				<input type="checkbox" name='imageSwitchC'>
					<span class="slider round" data-toggle="collapse" data-target="#uploadClassProfil"></span>
				</label>
				<p style="color:whitesmoke;">Set Class's Image</p>
				<!--Upload file.-->
				<div class="collapse" id="uploadClassProfil">
					<div class="form-group mb-3">
					<div class="container" style=''>
						<label class="label" for="text" style="color:#F1C40F;">Add Discussion Image</label>
						<div class="input-group mb-3" style="background-color:#212121; border-width: 0 0 3px; border-bottom: 3.5px solid #F1C40F; 
							border-radius:5px;">
							<div class="input-group-prepend">
								<span class="input-group-text">jpg</span>
							</div>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="uploadImage" name="uploadClassProfil" accept='image/*'>
								<label class="custom-file-label text-left" for="uploadImage">file size max 2 mb</label>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
			<div class='modal-footer'>
				<button type='submit' style='color:whitesmoke; background-color:#e69627; border:none;' 
					class='btn btn-primary'>Create new Class</button>
			</div>
		</form>
		</div>
	</div>
</div>
