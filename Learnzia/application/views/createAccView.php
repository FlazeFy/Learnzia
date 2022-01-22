<!--Leonardho R. Sitanggang
    1302194041  SE-43-03
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Learnzia || Create Acc</title>
        <!--Meta tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" type="image/png" href="http://localhost/Learnzia/assets/images/icon/Logo.png"/>

        <!--CDN Bootstrap CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!--Source file-->
        <link rel="stylesheet" type="text/css" href="http://localhost/Learnzia/assets/css/login.css"/>
		<style>
			body {background-color: #313436; overflow:hidden;}
			img {height: 30px;width: 30px;}
		</style>
    </head>
    <body>
	<section class="ftco-section">
	<form method="post" action="<?php echo site_url().'createAccCtrl/checkUser'; ?>" autocomplete="off" enctype="multipart/form-data">
		<div class="container" style=" margin-top: -4%; background-color: #212121; border-radius:10px;">
			<div class="row">
				<div class="col-md-6 border-right">
					<div class="p-3 py-4">
						<h3 class="mb-4" style="color:whitesmoke;">Profile</h3>			
						<div class="form-group mb-3">
							<label class="label" for="fullname" style="color:#F1C40F;">Fullname</label>
							<input type="fullname" class="form-control" placeholder="Username" style="background:#212121; border-width: 0 0 3px; 
								border-bottom: 3.5px solid #F1C40F; color:whitesmoke;" name="fullname" required>
						</div>
						<div class="form-group mb-3">
							<label class="label" for="country" style="color:#F1C40F;">Country</label>
							<input id="myInput" class="form-control" type="text" name="country" placeholder="Country" required>
						</div>
						<div class="form-group mb-3">
							<label class="label" for="description" style="color:#F1C40F;">Description</label>
							<textarea rows="5" cols="60" name="description" style="background:#212121; border-width: 0 0 3px; 
							border-bottom: 3.5px solid #F1C40F; color:whitesmoke; border-radius:5px;" required >Enter about you here...</textarea>
						</div>
						<!--Upload file.-->
						<div class="form-group mb-3">
							<label class="label" for="description" style="color:#F1C40F;">Profile Image</label>
							<div class="input-group mb-3" style="background-color:#212121; border-width: 0 0 3px; border-bottom: 3.5px solid #F1C40F; 
								border-radius:5px;">
								<div class="input-group-prepend">
									<span class="input-group-text">jpg</span>
								</div>
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="uploadImage" name="uploadImage" accept='image/*' required>
									<label class="custom-file-label text-left" for="uploadImage">file size max 1 mb</label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="p-3 py-4">
						<h3 class="mb-4" style="color:whitesmoke;">Account</h3>
						<div class="form-group mb-3">
							<label class="label" for="username" style="color:#F1C40F;">Username</label>
							<input type="username" class="form-control" placeholder="Username" style="background:#212121; border-width: 0 0 3px; 
									border-bottom: 3.5px solid #F1C40F; color:whitesmoke;" name="username" required>
						</div>
						<div class="form-group mb-3">
							<label class="label" for="email" style="color:#F1C40F;">Email</label>
							<input type="email" class="form-control" placeholder="Email" style="background:#212121; border-width: 0 0 3px; 
									border-bottom: 3.5px solid #F1C40F; color:whitesmoke;" name="email" required>
						</div>
						<div class="form-group mb-3">
							<label class="label" for="password" style="color:#F1C40F;">Password</label>
							<input type="password" class="form-control" placeholder="Password" style="background:#212121; border-width: 0 0 3px; 
									border-bottom: 3.5px solid #F1C40F; color:whitesmoke;" name="password" required>
						</div><br>
						<div class="col-md-12">
							<img src="http://localhost/Learnzia/assets/images/icon/Info.png" style="float: left;">
							<p style="color: #F1C40F; font-size: 14px;">Password must have minimum 8 character, 1 capital, and 1 number.</p><br>
						<!--Button submit.-->
						<div class="form-group">
							<button type="submit" class="form-control btn btn-primary" style="color:white;">Register</button>
						</div>
						<p class="text-center">Already have an account? <a href="loginCtrl" style="color:#F1C40F; text-decoration: underline;">Sign In</a></p>
					</div>
				</div>
			</div>
		</div>
		</div>
	</form>
	</section>

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
	var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];

	/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
	autocomplete(document.getElementById("myInput"), countries);
	</script>

	<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<!--Ajax for json-->
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>  
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

	
	<!--JQuery Upload-->
	<script>
		$('.custom-file-input').on('change', function() { 
			let fileName = $(this).val().split('\\').pop(); 
			$(this).next('.custom-file-label').addClass("selected").html(fileName); 
		});
	</script>

    </body>
</html>
