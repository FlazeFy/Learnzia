<!--Leonardho R. Sitanggang
    1302194041  SE-43-03
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Learnzia || Home</title>
		<link rel="icon" type="image/png" href="http://localhost/Learnzia/assets/images/icon/Logo.png"/>
        <!--Meta tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--CDN Bootstrap CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<!--Source file-->
		<link rel="stylesheet" type="text/css" href="http://localhost/Learnzia/assets/css/main.css"/>

		<style>
			body {background-color: #313436;}
			a {color:#F1C40F;}
			.active {border-radius: 4px; border-bottom: 4.5px solid rgb(40, 207, 54); position: relative;bottom: 5%;}
			img {height: 30px;width: 30px;}
			hr {background-color: #F1C40F;}
			h4 {color:#F1C40F;} h5 {color:#F1C40F;}
			#menu {background-color: #212121; border-radius:5px;}
		</style>
    </head>
    <body>
		<!--Main Navbar-->
		<nav class="navbar navbar-expand-lg" style="background-color:#212121;">
		<a class="nav-link" onclick="openNav()" type="button">
		<img src="http://localhost/Learnzia/assets/images/icon/Message.png">
		Message</a>
		<!--Collapse Side Navbar-->
			<div id="mySidebar" class="sidebar">
				<img  onclick="closeNav()" href="javascript:void(0)" class="closebtn" src="http://localhost/Learnzia/assets/images/icon/Close.png"
					style="top:2%;" type="button">	
				<!--Searchbox-->
				<form class="form-inline my-2 my-lg-0" action="">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" style="background:#212121; border-width: 0 0 3px; 
						border-bottom: 3.5px solid #F1C40F; color:whitesmoke; margin-left:5%;" name="search" aria-label="Search">
					<button class="btn btn-primary" style="color:whitesmoke; background-color:#e69627; border:none;" type="submit">Search</button>
					<img  onclick="" href="" src="http://localhost/Learnzia/assets/images/icon/Add.png" style="margin-left:2%;" type="button"
						data-toggle="modal" data-target="#messageModal">	
				</form><hr>
				<div class="container-fluid" width="200" style="">
					<!--Message list-->
					<?php foreach($dataMessage as $data){
						echo "
						<div class='card' type='button' style='border-bottom: 3.5px solid #F1C40F; background-color:#212121;'>
							<div class='card-header' style='width: 25rem; height:5rem;'>
								<img src='http://localhost/Learnzia/assets/uploads/user_".$data['receiver'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:50px; height:50px; float:left;
									margin:3px;'>
								<h5 style='font-size:15.5px; color:#F1C40F; margin-left:3%; float:left;'>".$data['receiver']."</h5>
								<p style='font-size:9.5px; color:whitesmoke; margin-top:2%; float:left; font-style:italic;'>".$data['datetime']."</p><br><br>
								<p style='font-size:12px; color:whitesmoke; margin-left:3%; margin-top:-4%; float:left;'>".$data['message']."</p>
							</div>
						</div><br>";}
					?>
					
				</div>
			</div>
	
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
			aria-expanded="false" aria-label="Toggle navigation" style="color:#F1C40F;">
			<a>Show</a>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Global</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Profile</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Setting
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="#">Help Center</a>
				<a class="dropdown-item" href="#">Privacy & Condition</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#">About us</a>
				</div>
			</li>
			</ul>
			<button class="btn btn-primary" style="color:whitesmoke; margin-left:1%; background-color:#e62d27; border:none;" 
				onclick="signOut()">Sign Out</button>
		</div>
		</nav>

		<!--Content-->
		<!--News feeds.-->
        <br><h2 style="margin-left: 16%; color:whitesmoke;">Welcome, <?= $data = $this->session->userdata('userTrack'); ?></h2>
		<div class="container" id="menu">
			<br><h4 style="left:2%;">Control Room</h4>
			<div class="dropdown" style="float:right; margin-top:-3%;">
				<button class="btn btn-secondary dropdown-toggle" style="color:whitesmoke; background-color:#e69627; border:none;" 
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort By</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="#">Recently</a>
					<a class="dropdown-item" href="#">Most Liked</a>
				</div>
			</div>
			<button class="btn btn-secondary" style="color:whitesmoke; background-color:#00a13e; border:none; margin-top:-3%; 
				float:right; margin-right:1%;" data-toggle="modal" data-target="#discModal">Add Discussion</button>
			<br>
		</div><br>

		<div class="container" id="menu">
			<br><h4 style="left:2%;">Post</h4>
			<div id="accordion">
				<button class="btn btn-primary" data-toggle="collapse" data-target="#multiCollapseExample1" aria-expanded="false" 
					aria-controls="multiCollapseExample2" style="background-color:#7289da; border-width:0px;">Math</button>
				<button class="btn btn-primary" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" 
					aria-controls="multiCollapseExample2" style="background-color:#7289da; border-width:0px;">Coding</button>
				<button class="btn btn-primary" data-toggle="collapse" data-target="#multiCollapseExample3" aria-expanded="false" 
					aria-controls="multiCollapseExample2" style="background-color:#7289da; border-width:0px;">Geography</button>
				<button class="btn btn-primary" data-toggle="collapse" data-target="#multiCollapseExample4" aria-expanded="false" 
					aria-controls="multiCollapseExample2" style="background-color:#7289da; border-width:0px;">Science</button>
				<button class="btn btn-primary" data-toggle="collapse" data-target="#multiCollapseExample5" aria-expanded="false" 
					aria-controls="multiCollapseExample2" style="background-color:#7289da; border-width:0px;">History</button>
				<hr>
				<div class="row">
				<div class="col-md-12">
					<div class="collapse show" id="multiCollapseExample1" data-parent="#accordion">
						<div class="container">
							<h5>Math</h5>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="collapse" id="multiCollapseExample2" data-parent="#accordion">
						<div class="container">
							<h5>Coding</h5>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="collapse" id="multiCollapseExample3" data-parent="#accordion">
						<div class="container">
							<h5>Geography</h5>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="collapse" id="multiCollapseExample4" data-parent="#accordion">
						<div class="container">
							<h5>Science</h5>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="collapse" id="multiCollapseExample5" data-parent="#accordion">
						<div class="container">
							<h5>History</h5><br>
							<div class="container-fluid">
							<?php 
								$i = 1; 
								foreach($dataDisc as $data){		
									echo"
									<div id='accordion2'>
										<div class='card' style='border-radius:5px; border-bottom: 3.5px solid #F1C40F; background-color:#525252;'>
										<div class='card-header' id='headingOne' style='border-bottom: 1px solid #858585;'>
											<img src='assets/uploads/user_".$data['sender'].".jpg' alt='Card image cap' class='rounded-circle img-fluid' style='width:45px; height:45px; margin-top: -1%; float:left;'>
											<h5 style='font-size:20px; padding-left:15px; float:left;'>".$data['sender']."</h2>
											<p style='font-size:10px; padding-top:10px; float:left; font-style:italic; color:whitesmoke;'>".$data['datetime']."</p>
											<h5 style='font-size:20px; float:right;'>".$data['category']."</h5><br><hr>
											<p style='font-size:14px; color:whitesmoke	;'>".$data['question']."</p>
											<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>0</h6>
												<img src='assets/View.png' style='width:25px; height:25px; float:right; margin-top:-5px; padding-left:5px;'>
											<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>0</h6>
												<img src='assets/Up.png' style='width:25px; height:22px; float:right; margin-top:-4px; padding-left:5px;'>
											<h6 style='font-size:13px; float:right; padding-left:5px; color:whitesmoke;'>0</h6>
												<img src='assets/Comment.png' style='width:25px; height:20px; float:right; margin-top:-2px; padding-left:5px;'>
											<h5 style='font-size:15px; float:left; text-decoration:underline;' type='button' data-toggle='collapse' data-target='#collapse".$i."' 
											aria-expanded='true' aria-controls='collapseOne''>See Reply</h5>
										</div>
										<!--Extend-->
										<div id='collapse".$i."' class='collapse' aria-labelledby='headingOne' data-parent='#accordion2'>
											<div class='card-body'>
												
											</div>
										</div>
										</div>
									</div>
								<br>";
								$i++;
							}?>
							</div>
						</div>
					</div>
				</div>
			<br>
		</div>

		<!-- Modal Add Message -->
		<div class='modal fade' id='messageModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
		<div class='modal-dialog' role='document'>
			<form method='POST' action='<?php echo site_url().'homeCtrl/sendMessage'; ?>' autocomplete="off">
				<div class='modal-content' style='background-color:#313436;'>
				<div class='modal-header'>
					<h5 class='modal-title' id='exampleModalLabel' style='color:#e69627; margin-top:1%;'>Send to :</h5>
					<div class="autocomplete" style="width:300px;">
						<input id="myInput" type="text" name="receiver" placeholder="Username" required>
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

		<!-- Modal Add Discussion -->
		<div class='modal fade' id='discModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
		<div class='modal-dialog' role='document'>
			<form method='POST' action='<?php echo site_url().'homeCtrl/sendDisc'; ?>' autocomplete="off">
				<div class='modal-content' style='background-color:#313436;'>
				<div class='modal-header'>
					<h5 class='modal-title' id='exampleModalLabel' style='color:#e69627; margin-top:1%;'>Category :</h5>
					<div class="form-group mb-3">
					<select class="form-control" name="category" style="background:#212121; border-width: 0 0 3px; 
							border-bottom: 3.5px solid #F1C40F; color:whitesmoke; border-radius:5px; width:300px;">
						<option value='math'>Math</option>
						<option value='coding'>Coding</option>
						<option value='geography'>Geography</option>
						<option value='science'>Science</option>
						<option value='history'>History</option>
					</select></div>
					<img  class="closebtn" src="http://localhost/Learnzia/assets/images/icon/Close.png"
					style="margin-top:2%;" type="button" data-dismiss='modal' aria-label='Close'>
				</div>
					<div class='modal-body'>
						<div class="form-group mb-3">
							<label class="label" for="text" style="color:#F1C40F;">Subject</label>
							<input type="text" class="form-control" placeholder="Subject" style="background:#212121; border-width: 0 0 3px; 
								border-bottom: 3.5px solid #F1C40F; color:whitesmoke;" name="subject" required>
						</div>
						<div class="form-group mb-3">
							<label class="label" for="text" style="color:#F1C40F;">Question</label>
							<textarea rows="5" cols="60" name="question" style="background:#212121; border-width: 0 0 3px; 
								border-bottom: 3.5px solid #F1C40F; color:whitesmoke; border-radius:5px;" required>Enter text here...</textarea>
						</div>
					</div>
					<div class='modal-footer'>
						<button type='submit' style='color:whitesmoke; background-color:#e69627; border:none;' 
							class='btn btn-primary'>Send</button>
					</div>
			</form>
			</div>
		</div>
		</div>

		<script>
			//Side navbar private message
			/* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
			function openNav() {
				document.getElementById("mySidebar").style.width = "360px";
				document.getElementById("main").style.marginLeft = "360px";
			}

			/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
			function closeNav() {
				document.getElementById("mySidebar").style.width = "0";
				document.getElementById("main").style.marginLeft = "0";
			}
			function signOut(){
				var pop = window.confirm("Are you sure?");
				if(pop){
					window.location.href = "http://localhost/Learnzia";
					alert("Sign-out success");
				} else {
					alert("Sign-Out failed");
				}
			}
		</script>

		<script>
		function autocomplete(inp, arr) {
		/*the autocomplete function takes two arguments,
		the text field element and an array of possible autocompleted values:*/
		var currentFocus;
		/*execute a function when someone writes in the text field:*/
		inp.addEventListener("input", function(e) {
			var a, b, i, val = this.value;
			/*close any already open lists of autocompleted values*/
			closeAllLists();
			if (!val) { return false;}
			currentFocus = -1;
			/*create a DIV element that will contain the items (values):*/
			a = document.createElement("DIV");
			a.setAttribute("id", this.id + "autocomplete-list");
			a.setAttribute("class", "autocomplete-items");
			/*append the DIV element as a child of the autocomplete container:*/
			this.parentNode.appendChild(a);
			/*for each item in the array...*/
			for (i = 0; i < arr.length; i++) {
				/*check if the item starts with the same letters as the text field value:*/
				if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
				/*create a DIV element for each matching element:*/
				b = document.createElement("DIV");
				/*make the matching letters bold:*/
				b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
				b.innerHTML += arr[i].substr(val.length);
				/*insert a input field that will hold the current array item's value:*/
				b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
				/*execute a function when someone clicks on the item value (DIV element):*/
				b.addEventListener("click", function(e) {
					/*insert the value for the autocomplete text field:*/
					inp.value = this.getElementsByTagName("input")[0].value;
					/*close the list of autocompleted values,
					(or any other open lists of autocompleted values:*/
					closeAllLists();
				});
				a.appendChild(b);
				}
			}
		});
		/*execute a function presses a key on the keyboard:*/
		inp.addEventListener("keydown", function(e) {
			var x = document.getElementById(this.id + "autocomplete-list");
			if (x) x = x.getElementsByTagName("div");
			if (e.keyCode == 40) {
				/*If the arrow DOWN key is pressed,
				increase the currentFocus variable:*/
				currentFocus++;
				/*and and make the current item more visible:*/
				addActive(x);
			} else if (e.keyCode == 38) { //up
				/*If the arrow UP key is pressed,
				decrease the currentFocus variable:*/
				currentFocus--;
				/*and and make the current item more visible:*/
				addActive(x);
			} else if (e.keyCode == 13) {
				/*If the ENTER key is pressed, prevent the form from being submitted,*/
				e.preventDefault();
				if (currentFocus > -1) {
				/*and simulate a click on the "active" item:*/
				if (x) x[currentFocus].click();
				}
			}
		});
		function addActive(x) {
			/*a function to classify an item as "active":*/
			if (!x) return false;
			/*start by removing the "active" class on all items:*/
			removeActive(x);
			if (currentFocus >= x.length) currentFocus = 0;
			if (currentFocus < 0) currentFocus = (x.length - 1);
			/*add class "autocomplete-active":*/
			x[currentFocus].classList.add("autocomplete-active");
		}
		function removeActive(x) {
			/*a function to remove the "active" class from all autocomplete items:*/
			for (var i = 0; i < x.length; i++) {
			x[i].classList.remove("autocomplete-active");
			}
		}
		function closeAllLists(elmnt) {
			/*close all autocomplete lists in the document,
			except the one passed as an argument:*/
			var x = document.getElementsByClassName("autocomplete-items");
			for (var i = 0; i < x.length; i++) {
			if (elmnt != x[i] && elmnt != inp) {
				x[i].parentNode.removeChild(x[i]);
			}
			}
		}
		/*execute a function when someone clicks in the document:*/
		document.addEventListener("click", function (e) {
			closeAllLists(e.target);
		});
		}

		/*An array containing all the country names in the world:*/
		var countries = [<?php foreach($listUser as $data){echo "'"; echo $data['username']; echo "',";}?>]

		/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
		autocomplete(document.getElementById("myInput"), countries);
		</script>

		<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<!--Ajax for json-->
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>  
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>
