<form method="post" class="signin-form" action="loginCtrl/checkUser">
	<div class="form-group mb-3">
		<label class="label" for="name" style="color:#F1C40F;">Username</label>
		<input type="text" class="form-control" placeholder="Username" style="background:#212121; border-width: 0 0 3px; 
			border-bottom: 3.5px solid #F1C40F; color:whitesmoke;" name="username" required>
	</div>
	<div class="form-group mb-3">
		<label class="label" for="password" style="color:#F1C40F;">Password</label>
		<input type="password" class="form-control" placeholder="Password" style="background:#212121; border-width: 0 0 3px; 
				border-bottom: 3.5px solid #F1C40F; color:whitesmoke;" name="password" required>
	</div>
	<div class="form-group">
		<button type="submit" class="form-control btn btn-primary" style="color:white;">Sign In</button>
	</div>
</form>
<div class="form-group d-md-flex">
	<div class="w-50 text-left">
		<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
			<input type="checkbox" checked>
			<span class="checkmark"></span>
		</label>
	</div>
	<div class="w-50 text-md-right">
		<a href="#" style="color:#F1C40F; text-decoration: underline;">Forgot Password</a>
	</div>
</div>
