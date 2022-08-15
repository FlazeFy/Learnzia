<?php 
	if(isset($success_messageInvitation1)) { echo"
		<div class='modal fade' id='errorModalInvit' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
			<div class='modal-dialog' role='document'>
				<div class='modal-content' style='background-color:#313436;'>
				<div class='modal-header'>
					<h5 class='modal-title'>Invitation Sended</h5>
					<img id='icon'  class='closebtn' src='http://localhost/Learnzia/assets/images/icon/Close.png'
						type='button' data-dismiss='modal' aria-label='Close' onClick='refreshMessage()'>
				</div>
				<div class='modal-body'>
					<img src='http://localhost/Learnzia/assets/images/Sended.gif' alt='Sended.gif' style='display: block;
						margin-left: auto; margin-right: auto; width: 70%; height: 70%;'>
					<h5 class='' style='text-align:center; font-color:whitesmoke;'>".$success_messageInvitation1." has been invited</h5>
				</div>		
				</div>
			</div>
		</div>";
	}	
?>
