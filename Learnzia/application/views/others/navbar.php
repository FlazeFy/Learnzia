<nav class="navbar navbar-expand-lg" style="background-color:#212121;">
    <a class="nav-link" onclick="openNav()" type="button" title="Notification"><i class="fa-regular fa-bell fa-lg"></i></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
        aria-expanded="false" aria-label="Toggle navigation" style="color:#F1C40F;">
        <a>Show</a>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item text-center active">
            <a class="nav-link" href="homeCtrl">Home</a>
        </li>
        <li class="nav-item text-center">
            <a class="nav-link" href="contactCtrl">Contact</a>
        </li>
        <li class="nav-item text-center">
            <a class="nav-link" href="globalCtrl">Global</a>
        </li>
        <li class="nav-item text-center">
            <a class="nav-link" href="profileCtrl">Profile</a>
        </li>
        <li class="nav-item text-center dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Setting
            </a>
            <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
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