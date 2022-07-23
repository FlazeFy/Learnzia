<?php 
if(isset($error_message)) { 
	echo"
	<div class='modal fade' id='errorModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
		<div class='modal-dialog' role='document'>
			<div class='modal-content p-3' style='background-color:#313436;'>
				<i class='fa-solid fa-xmark text-white float-right' type='button' data-dismiss='modal' aria-label='Close' onClick='refreshMessage()'></i>
				<img src='http://localhost/Learnzia/assets/images/icon/Wrong.png' width='200' class='img-fluid d-block mx-auto'>
				<h7 class='text-white text-center'>".$error_message."</h7>
			</div>
		</div>
	</div>";
}
?>
