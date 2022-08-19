<div class="container p-4">
	<?php
		foreach ($dataUser as $data){
			echo"
			<div class='row'>
				<div class='col-md-3 col-xs-6 b-r'> <strong style='color:#F1C40F;'>Full Name</strong>
					<br>
					<p style='color:whitesmoke;'>".$data['fullname']."</p>
				</div>
				<div class='col-md-3 col-xs-6 b-r'> <strong style='color:#F1C40F;'>Country</strong>
					<br>
					<p style='color:whitesmoke;'>".$data['country']."</p>
				</div>
				<div class='col-md-3 col-xs-6 b-r'> <strong style='color:#F1C40F;'>Email</strong>
					<br>
					<p style='color:whitesmoke;'>".$data['email']."</p>
				</div>
				<div class='col-md-3 col-xs-6'> <strong style='color:#F1C40F;'>Date Join</strong>
					<br>
					<p style='color:whitesmoke;'>".$data['datejoin']."</p>
				</div>
			</div>
			
			<hr>
			<p style='color:whitesmoke;'>".$data['description']."</p>";
		}
	?>

	<h4 class="font-medium m-t-30">Specialization</h4>
	
	<!--Chart-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-9 border-right">
				<h4 class="card-title" style='text-align:center;'>Discussion</h4>
				<div id="discussion" style="height:290px; width:100%;"></div>
				<?php 
					if (count($myDiscussion) == 0){
						echo"<p style='text-align:center; color:whitesmoke; margin-top:-50%;'>You haven't post any discussion yet...</p>";
					}
				?>
				<h4 class="card-title" style='text-align:center;'>Replies</h4>
				<?php 
					if(count($myReply) == 0){
						echo"<p style='text-align:center; color:whitesmoke; margin-top:-50%;'>You haven't reply any discussion yet...</p>";
					}
				?>
				<div id="reply" style="height:290px; width:100%;"></div>
			</div>
			<div class='col-md-3'>
				<div class="container text-center" style='margin-top:2%;'>
				<h4 class="card-title" style='text-align:center;'>Category</h4>
					<ul class="list-inline m-b-0">
						<li>
							<p style='color:whitesmoke;'><i class="fa fa-circle font-10 m-r-10" style='color:#12c447; margin-right:2%;'></i>Math</p></li>
						<li>
							<p style='color:whitesmoke;'><i class="fa fa-circle font-10 m-r-10" style='color:#c49212; margin-right:2%;'></i>Coding</p></li>
						<li>
							<p style='color:whitesmoke;'><i class="fa fa-circle font-10 m-r-10" style='color:#c43012; margin-right:2%;'></i>Design</p></li>
						<li>
							<p style='color:whitesmoke;'><i class="fa fa-circle font-10 m-r-10" style='color:#11bfbc; margin-right:2%;'></i>Science</p></li>
						<li>
							<p style='color:whitesmoke;'><i class="fa fa-circle font-10 m-r-10" style='color:#bf11a8; margin-right:2%;'></i>History</p></li>
					</ul>
				</div>
			</div>
			<hr class="m-t-0 m-b-0">	
		</div>
	</div>
</div>



