<style>
	.form-control{
		background:#212121; 
		border-width: 0 0 3px; 
		border-bottom: 3.5px solid #F1C40F; 
		color:whitesmoke;
	}
</style>

<div class="p-3 py-4">
	<form method='post' action='profileCtrl/updateProfile'>
		<div class="form-group mb-3">
			<label class="label" for="fullname" style="color:#F1C40F;">Fullname</label>
			<input type="fullname" class="form-control w-75" placeholder="Username" value='<?php foreach ($dataUser as $data) {echo $data['fullname'];} ?>'
				name="fullname" required>
		</div>
		<div class="form-group mb-3">
			<label class="label" for="description" style="color:#F1C40F;">Description</label>
			<textarea class='form-control w-75' rows="3" name="description"
				value='<?php foreach ($dataUser as $data) {echo $data['description'];} ?>'
				required> <?php foreach ($dataUser as $data) {echo $data['description'];} ?></textarea>
		</div>
		<div class="form-group mb-3">
			<label class="label" for="password" style="color:#F1C40F;">Password</label>
			<input type="password" class="form-control w-75" placeholder="Password" value='<?php foreach ($dataUser as $data) {echo $data['password'];} ?>'
				name="password" required>
		</div>

		<!--Button submit.-->
		<div class="form-group">
			<button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Save Changes</button>
		</div>
	</form>
</div>

