<?php include("./search.php");?>
<!DOCTYPE html>
<html>
<head>
    <title> Admin panel</title>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="icon" type="image/png" href="assets/logo.jpeg"/>

    <!-- Import lib -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- End import lib -->
    <link charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body class="overlay-scrollbar">
<!-- navbar -->
<div class="navbar">
    <!-- nav left -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link">
                <i class="fas fa-bars" onclick="collapseSidebar()"></i>
            </a>
        </li>
        <li class="nav-item">
        <img src="assets/white.png" alt="ATPro logo" class="logo logo-light">
				<img src="assets/dark.png" alt="ATPro logo" class="logo logo-dark">
        </li>
    </ul>
    <!-- end nav left -->
    <!-- form -->
    <form class="navbar-search" href="search.php" action="search.php" id="Search">
        <input type="text"id="Search" method="POST" class="navbar-search-input" placeholder="Chercher un etudiant">
        <i class="fas fa-search"></i>
    </form>
    <!-- end form -->
    <!-- nav right -->
    <ul class="navbar-nav nav-right">
        <li class="nav-item mode">
            <a class="nav-link" href="#" onclick="switchTheme()">
                <i class="fas fa-moon dark-icon"></i>
                <i class="fas fa-sun light-icon"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link">
                <i class="fas fa-bell dropdown-toggle" data-toggle="notification-menu"></i>
                <span class="navbar-badge">15</span>
            </a>
            <ul id="notification-menu" class="dropdown-menu notification-menu">
                <div class="dropdown-menu-header">
						<span>
							Notifications
						</span>
                </div>
            </ul>
        </li>
        <li class="nav-item avt-wrapper">
            <div class="avt dropdown">
                <img src="assets/tuat.jpg" alt="User image" class="dropdown-toggle" data-toggle="user-menu">
                <ul id="user-menu" class="dropdown-menu">
                    <li  class="dropdown-menu-item">
                        <a href="Authentification.php" class="dropdown-menu-link">
                            <div>
                                <i class="fas fa-sign-out-alt"></i>
                            </div>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    <!-- end nav right -->
</div>
<!-- end navbar -->
<!-- sidebar -->
<div class="sidebar">
    <ul class="sidebar-nav">
        <li class="sidebar-nav-item">
            <a href="Home.php" class="sidebar-nav-link">
                <div>
                    <i class="fas fa-home"></i>
                </div>
                <span>
						Acceuil
					</span>
            </a>
        </li>
        <li class="sidebar-nav-item">
            <a href="Pre-inscrits.php" class="sidebar-nav-link active">
                <div>
                    <i class="fas fa-user"></i>
                </div>
                <span>Pré-inscrits</span>
            </a>
        </li>
        <li  class="sidebar-nav-item">
            <a href="Inscrits.php" class="sidebar-nav-link">
                <div>
                    <i class="fas fa-users"></i>
                </div>
                <span>Inscrits</span>
            </a>
        </li>
        <li  class="sidebar-nav-item">
            <a href="Propositions.php" class="sidebar-nav-link">
                <div>
                    <i class="fas fa-tasks"></i>
                </div>
                <span>Propositions</span>
            </a>
        </li>
        <li  class="sidebar-nav-item">
            <a href="Formations.php" class="sidebar-nav-link">
                <div>
                    <i class="fas fa-check-circle"></i>
                </div>
                <span>Formations</span>
            </a>
        </li>
        <li  class="sidebar-nav-item">
            <a href="Messages.php" class="sidebar-nav-link">
                <div>
                    <i class="fas fa-sms"></i>
                </div>
                <span>Messages</span>
            </a>
        </li>
    </ul>
</div>
<!-- end sidebar -->
<!-- main content -->
<div class="wrapper" style="margin-top:20px;">
    <div class="row">
        <div class="col-12 col-m-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 style="margin-bottom:30px;">
                       Les inscrits
                    </h3>
                    <i class="fas fa-ellipsis-h"></i>
                </div>
                <div class="card-content">
                <table>
							<thead>
								<tr>
								    <th>id</th>
									<th>CIN</th>
									<th>Nom</th>
									<th>Prenom</th>
									<th>Email</th>
									<th>Date de Naissance</th>
									<th>Telephone</th>
									<th>Nationalite</th>
								</tr>
							</thead>
							<form action="inscrits.php" method="GET">
                        
                        <?php
                        $con=new pdo("mysql:host=cefolie51.mysql.db; dbname=cefolie51","cefolie51","JgmgJJ3JYvYv");
                         require_once'phpqrcode/qrlib.php';
                         require_once'phpqrcode/qrconfig.php';
                         $get=$con->prepare("SELECT * FROM client WHERE daten <>'0000-00-00 00:00:00'");
                       $get->execute();
                     foreach($get as $dat){
                    $tel=$dat['Tel'];
                      $id_c=$dat[0];
              QRcode::png($tel,'qrcode/'.$id_c,'H',3.0);
        echo'  <tr class="data">
               <td id="id">'.$dat['id'].'</td>
               <td id="cin'.$dat[0].'">'.$dat['CIN'].'</td>
               <td id="nom'.$dat[0].'">'.$dat['nom'].' </td>
               <td id="prenom'.$dat[0].'">' .$dat['prenom'].'</td>
               <td id="email'.$dat[0].'">' .$dat['email'].' </td>
               <td id="daten'.$dat[0].'">'.$dat['daten'].'</td>
               <td><img src="qrcode/'.$id_c.'"></td>
               <td id="nationalite'.$dat[0].'">'.$dat['Nationalite'].'</td>
             </tr>';
   }
   
                        ?> 
                        </form>
						</table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- end main content -->
<!-- import script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="index.js"></script>
<!-- end import script -->

</body>
</html>