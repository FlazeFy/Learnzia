<div class='modal fade' id='messageModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
	<div class='modal-dialog' role='document'>
		<form method='POST' action='homeCtrl/sendMessage' autocomplete="off">
			<div class='modal-content' style='background-color:#313436;'>
			<div class='modal-header'>
				<h5 class='modal-title' id='exampleModalLabel' style='color:#e69627; margin-top:1%;'>Send to :</h5>
				<div class="autocomplete" style="width:300px;">
					<input id="mycontacts" type="text" name="receiver" placeholder="Username" required>
				</div>
				<img  class="closebtn" src="http://localhost/Learnzia/assets/images/icon/Close.png"
				style="margin-top:2%;" type="button" data-dismiss='modal' aria-label='Close'>
			</div>
			<div class='modal-body'>
				<textarea rows="5" cols="60" name="message" style="background:#212121; border-width: 0 0 3px; 
					border-bottom: 3.5px solid #F1C40F; color:whitesmoke; border-radius:5px;" required>Enter text here...</textarea><br>
			</div>
			<div class='modal-footer'>
				<button type='submit' style='color:whitesmoke; background-color:#e69627; border:none;' 
					class='btn btn-primary'>Send</button>
			</div>
		</form>
		</div>
	</div>
</div>
<!--Not finished-->
