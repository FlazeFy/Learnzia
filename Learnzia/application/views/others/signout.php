<div class="modal fade" id="signOutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style='background-color:#313436;'>
		<div class="modal-header">
			<h5 class="" style='margin-left:35%;'>Are you sure?...</h5>
			<!--Good bye animation-->
		</div>
		<div class="modal-footer">
			<button class="btn btn-danger" data-dismiss="modal">Cancel</button>
			<form method='POST' action='<?php echo site_url().'homeCtrl/signOut'; ?>'>
			<button type="submit" class="btn btn-primary" style='background-color:#e69627; border:none;'>Yes, Sign Out</button></form>
		</div>			
		</div>
	</div>
</div>	
