<!--Leonardho R. Sitanggang
    1302194041  SE-43-03
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Learnzia || Global</title>
		<link rel="icon" type="image/png" href="http://localhost/Learnzia/assets/images/icon/Logo.png"/>
        <!--Meta tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--CDN Bootstrap CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://kit.fontawesome.com/12801238e9.js" crossorigin="anonymous"></script>

		<!--Source file-->
		<link rel="stylesheet" type="text/css" href="http://localhost/Learnzia/assets/css/mainStyle2.css"/>

		<!-- chartist CSS -->
		<link href="http://localhost/Learnzia/assets/css/chartist-js/dist/chartist.min.css" rel="stylesheet">
		<link href="http://localhost/Learnzia/assets/css/chartist-js/dist/chartist-init.css" rel="stylesheet">
		<link href="http://localhost/Learnzia/assets/css/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">

		<style>
			body {background-color: #0A0C10; color:whitesmoke;}
			.navbar {position: fixed; width:100%; z-index:1;}
			a {color:#F1C40F;}
			.active {border-radius: 4px; border-bottom: 4.5px solid rgb(40, 207, 54); position: relative;bottom: 5%;}
			#icon {height: 30px;width: 30px;} .form-control{color:whitesmoke; background:#212121; border-width: 0 0 3px; 
				border-bottom: 3.5px solid #F1C40F;}
			hr {background-color: whitesmoke;}
			h4 {color:#F1C40F;} h5 {color:#F1C40F;}
			#menu {background-color: #212121; border-radius:5px; margin-bottom:1%;}
			.dropdown-menu{background-color: #212121; border-color:#F1C40F;} .dropdown-item{color:#F1C40F;}
			.nav-tabs .nav-link.active{background-color:#e69627; color:whitesmoke; border:none; margin-top:2%;}
			.tab-pane.active{border:none;}
			a.nav-link:hover{color:#7289da;}
			.dropdown-item:hover{color:whitesmoke; background-color:#7289da;}

			/*content*/
			.content #content-flters {
				list-style: none;
				margin-bottom: 10px;
			}
			.content #content-flters li {
				cursor: pointer;
				display: inline-block;
				margin: 0 5px 5px 5px;
				font-size: 15px;
				font-weight: 600;
				line-height: 1;
				padding: 7px 10px;
				text-transform: uppercase;
				text-align: center;
				transition: all 0.3s ease-in-out;
			}
			.content #content-flters li:hover, .content #content-flters li.filter-active {
				color: #F1C40F;
			}
			.content .content-item {
				margin-bottom: 15px;
			}
			.content .content-item .content-img {
				overflow: hidden;
			}
			.content .content-item .content-img img {
				transition: all 0.8s ease-in-out;
			}
			.content .content-item .content-info {
				opacity: 0;
				position: absolute;
				left: 15px;
				bottom: 0;
				z-index: 3;
				right: 15px;
				color:white;
				transition: all ease-in-out 0.3s;
				background: rgba(0, 0, 0, 0.5);
				padding: 10px 15px;
			}
			.content .content-item .content-date {
				opacity: 0;
				position: absolute;
				top: 0;
				z-index: 3;
				right: 15px;
				transition: all ease-in-out 0.3s;
				background: rgba(0, 0, 0, 0.5);
				padding: 10px 15px;
			}
			.content .content-item .content-info h4 {
				font-size: 18px;
				color: #fff;
				font-weight: 600;
				color: #fff;
				margin-bottom: 0px;
			}
			.content .content-item .content-info p, .content-date p {
				color: rgba(255, 255, 255, 0.8);
				font-size: 14px;
				margin-bottom: 0;
			}
			.content .content-item .content-info .preview-link, .content .content-item .content-info .details-link {
				position: absolute;
				right: 15px;
				font-size: 24px;
				top: calc(50% - 18px);
				color: #fff;
				transition: 0.3s;
			}
			.content .content-item .content-info .preview-link:hover, .content .content-item .content-info .details-link:hover {
				color: #F1C40F;
			}
			.content .content-item .content-info .details-link {
				right: 10px;
			}
			.content .content-item:hover .content-img img {
				transform: scale(1.2);
			}
		</style>
    </head>
    <body>
		<!--Main Navbar-->
		<nav class="navbar navbar-expand-lg" style="background-color:#212121;">
			<a class="nav-link" onclick="openNav()" type="button">
			<img id='icon' src="http://localhost/Learnzia/assets/images/icon/Message.png">Contact</a>
			
			<!--Side Navbar Message-->
			<?php
				$this->load->view('contact/contact');
			?>	
	
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
				aria-expanded="false" aria-label="Toggle navigation" style="color:#F1C40F;">
				<a>Show</a>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="homeCtrl">Home</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="globalCtrl">Global</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="profileCtrl">Profile<span class="sr-only">(current)</span></a>
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
					data-toggle="modal" data-target="#signOutModal">Sign Out</button>
			</div>
		</nav>

		<!--Content-->
		<br><br>
		<br><h2 style="margin-left: 13%; color:whitesmoke; font-size:20px;">Welcome, <?= $data = $this->session->userdata('userTrack'); ?></h2>
		<div class="container p-3" id="menu">
			<h4>Browse the World</h4>
			<form method='post' action="" autocomplete='off'>
				<div class="autocomplete" style="width:30%; margin-bottom:2%;" >
					<input id="allClassAndUser" type="search" name="receiver" class='form-control mr-sm-2' placeholder="username, /classroom" required>
				</div>
				<button class="btn btn-primary" style="color:whitesmoke; background-color:#00a13e; border:none;" style="float:right;" type="submit">Search</button>
			</form>
		</div>

		<!--My classroom.-->
		<div class="container p-3" id="menu">
			<h4>My Classroom</h4>
			<div id="accordionC">
				<!--New Class-->
				<button class='btn btn-primary' data-toggle="modal" data-target="#newClassModal" aria-expanded='false' 
				aria-controls='multiCollapseExample2' style='background-color: #00a13e; border:none; margin-bottom:1%; max-width:120px; max-height:120px;'>
					<img src='http://localhost/Learnzia/assets/images/classroom.png' alt='New Post' style='width:60px; height:60px;'>
					<h5 style='font-size:14px; color:whitesmoke;'>New Class</h5>
				</button>
				<!--My Class-->
				<?php
					$this->load->view('global/myclass');
				?>
			</div>
		</div>

		<div class="container p-3" id="menu">
			<h4>All Class & Post</h4>
			<!--All classroom.-->
			<?php
				$this->load->view('global/all');
			?>
		</div>

		<!--Footer.-->
		<?php
			$this->load->view('others/footer');
		?>
		
		<!-- My Classroom modal. -->
		<?php
			$this->load->view('global/classprofile');
		?>	
		
		<!-- Sign out Modal -->
		<?php
			$this->load->view('others/signout');
		?>			

		<!-- Modal Add Message -->
		<?php
			$this->load->view('home/form/addMessage');
		?>

		<!-- Modal Message-->
		<?php
			$this->load->view('contact/chat');
		?>

		<!-- Modal Share question-->
		<?php
			$this->load->view('home/form/shareQuestion');
		?>

		<!-- Modal New Classroom -->
		<?php
			$this->load->view('global/form/createClass');
		?>

		<!--Modal validation.-->
		<?php
			$this->load->view('others/failed');
		?>

		<?php
			$this->load->view('others/success');
		?>

		<script>
			function openNav() {
				document.getElementById("mySidebar").style.width = "360px";
				document.getElementById("main").style.marginLeft = "360px";
			}

			function closeNav() {
				document.getElementById("mySidebar").style.width = "0";
				document.getElementById("main").style.marginLeft = "0";
			}
			function refreshMessage() {
				window.location.href="http://localhost/Learnzia/globalCtrl";  
			}
		</script>

		<script>
			/**
* Template Name: Laura - v4.7.0
* Template URL: https://bootstrapmade.com/laura-free-creative-bootstrap-theme/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let header = select('#header')
    let offset = header.offsetHeight

    if (!header.classList.contains('header-scrolled')) {
      offset -= 20
    }

    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos - offset,
      behavior: 'smooth'
    })
  }

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select('#header')
  if (selectHeader) {
    const headerScrolled = () => {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled')
      } else {
        selectHeader.classList.remove('header-scrolled')
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Mobile nav toggle
   */
  on('click', '.mobile-nav-toggle', function(e) {
    select('#navbar').classList.toggle('navbar-mobile')
    this.classList.toggle('bi-list')
    this.classList.toggle('bi-x')
  })

  /**
   * Mobile nav dropdowns activate
   */
  on('click', '.navbar .dropdown > a', function(e) {
    if (select('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault()
      this.nextElementSibling.classList.toggle('dropdown-active')
    }
  }, true)

  /**
   * Scrool with ofset on links with a class name .scrollto
   */
  on('click', '.scrollto', function(e) {
    if (select(this.hash)) {
      e.preventDefault()

      let navbar = select('#navbar')
      if (navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('bi-list')
        navbarToggle.classList.toggle('bi-x')
      }
      scrollto(this.hash)
    }
  }, true)

  /**
   * Scroll with ofset on page load with hash links in the url
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }
    }
  });

  /**
   * Porfolio isotope and filter
   */
  window.addEventListener('load', () => {
    let contentContainer = select('.content-container');
    if (contentContainer) {
      let contentIsotope = new Isotope(contentContainer, {
        itemSelector: '.content-item'
      });

      let contentFilters = select('#content-flters li', true);

      on('click', '#content-flters li', function(e) {
        e.preventDefault();
        contentFilters.forEach(function(el) {
          el.classList.remove('filter-active');
        });
        this.classList.add('filter-active');

        contentIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });

      }, true);
    }

  });

  /**
   * Initiate content lightbox 
   */
  const contentLightbox = GLightbox({
    selector: '.content-lightbox'
  });

})()
		</script>

		<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		
		<!--Ajax for json-->
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>  
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
		
		<!-- chartist chart -->
		<script src="assets/js/chartist-js/dist/chartist.min.js"></script>
		<script src="assets/js/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>

			<!-- Vendor JS Files -->
	<script src="assets/js/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/vendor/glightbox/js/glightbox.min.js"></script>
		<script src="assets/js/vendor/isotope-layout/isotope.pkgd.min.js"></script>
		<script src="assets/js/vendor/swiper/swiper-bundle.min.js"></script>
		<script src="assets/js/vendor/waypoints/noframework.waypoints.js"></script>
		
	
		
		<!--c3 JavaScript -->
		<script src="assets/js/d3/d3.min.js"></script>
		<script src="assets/js/c3-master/c3.min.js"></script>

		<script>
			//Upload file name 
			$('.custom-file-input').on('change', function() { 
				let fileName = $(this).val().split('\\').pop(); 
				$(this).next('.custom-file-label').addClass("selected").html(fileName); 
			});
		</script>

	</body>
</html>
