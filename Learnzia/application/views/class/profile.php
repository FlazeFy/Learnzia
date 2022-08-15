<?php 
	foreach ($myRel as $rel){
		if (($rel['typeRelation']=='founder')||($rel['typeRelation']=='co-founder')){
			echo "
			<div class='tab-pane' id='classProfilEdit' role='tabpanel' style='overflow-y: initial;'>
				<div class='container px-3' style='max-height: 500px; overflow-y: auto;'>
					<h4 class='m-2'>/".$rel['classname']."</h4>
					<div class='row'>
						<div class='col-md-3 text-center'>
							<img class='img-fluid rounded mb-3' src='http://localhost/Learnzia/assets/uploads/classroom/".$rel['imageURL'].".jpg' alt='Card image cap' style='width:225px; 
							height:225px; border: 2.5px solid #F1C40F;'>
							<label class='label' for='name' style='color:#F1C40F;'>Date Created</label><br>
							<a class='text-white' style='font-size:14px;'>".$rel['date']."</a><br>
						</div>
						<div class='col-md-5'>
							<form action='classCtrl/updateClassData' method='POST'>
							<input name='id_classroom' value='".$rel['id_classroom']."' hidden>
							<div class='row'>
								<div class='col-md'>
									<label class='label' for='name' style='color:#F1C40F;'>Class Name</label>
									<input type='text' class='form-control mb-1' name='classname' value='".$rel['classname']."' style='background:#313436;' required>
								</div>
								<div class='col-md'>
									<div class='form-group'>
										<label class='label' for='name' style='color:#F1C40F;'>Class Type</label>
										<select class='form-control' id='classType' name='type' style='background:#313436;'>
											<option"; if($rel['type'] == "public"){echo" selected ";} echo" value='public'>Public</option>
											<option"; if($rel['type'] == "private"){echo" selected ";} echo" value='private'>Private</option>
										</select>
									</div>
								</div>
							</div>
							<label class='label' for='Class Description' style='color:#F1C40F;'>Class Description</label>
							<textarea class='form-control my-2' rows='5' style='background:#313436;' name='description' required>".$rel['description']."</textarea>
							<div class='row'>
								<div class='col-md'>
									<div class='form-group'>
										<label class='label' for='name' style='color:#F1C40F;'>Class Category</label>
										<select class='form-control' id='classCategory' name='category' style='background:#313436;'>
											<option"; if($rel['category'] == "math"){echo" selected ";} echo" value='math'>Math</option>
											<option"; if($rel['category'] == "coding"){echo" selected ";} echo" value='coding'>Coding</option>
											<option"; if($rel['category'] == "design"){echo" selected ";} echo" value='design'>Design</option>
											<option"; if($rel['category'] == "science"){echo" selected ";} echo" value='science'>Science</option>
											<option"; if($rel['category'] == "history"){echo" selected ";} echo" value='history'>History</option>
											<option"; if($rel['category'] == "multi"){echo" selected ";} echo" value='multi'>Multi</option>
										</select>
									</div>
								</div>
								<div class='col-md'>
									<button type='submit' class='btn btn-success mt-4'>Save Changes</button>
								</div>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>";
		} else {
			echo "
			<div class='tab-pane' id='classProfil' role='tabpanel' style='overflow-y: initial;'>
				<div class='container' style='max-height: 500px; overflow-y: auto;'>
					<h4 class='m-2'>/".$rel['classname']."</h4>
					
				</div>
			</div>";
		}
	}
?>
