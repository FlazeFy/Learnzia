<?php 
	foreach($allDisc as $data){
		if ($data['image'] == 'yes'){
		echo"<div class='modal fade' id='zoom".$data['id_discussion']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
		<div class='modal-dialog modal-xl' role='document'>
			<div class='modal-content' style='background-color:#313436;'>
			<div class='modal-header'>
				<p style='color:whitesmoke;'>".$data['question']."</p>
				<img type='button' data-dismiss='modal' aria-label='Close' src='http://localhost/Learnzia/assets/images/icon/Close.png'>
			</div>
			<div class='modal-footer'>
				<img src='http://localhost/Learnzia/assets/uploads/discussion_".$data['imageURL'].".jpg' style='border-radius:6px; width:100%; height:100%; cursor:pointer' 
					alt='' data-toggle='modal' data-target='#zoom".$data['id_discussion']."'>
			</div>			
			</div>
		</div>
		</div>";	
		}
	}
?>
