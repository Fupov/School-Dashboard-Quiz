<?php include'search.php';?>
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
		<form class="navbar-search">
			<input type="text" name="Search" class="navbar-search-input" placeholder="Chercher un etudiant">
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
	<div class="wrapper">
		<div class="row">
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-primary">
					<p>
						<i class="fas fa-users"></i>
					</p>
					<?php
                    $con=new pdo("mysql:host=cefolie51.mysql.db; dbname=cefolie51","cefolie51","JgmgJJ3JYvYv");
					$get=$con->query("select count(*) from client ")->fetchColumn();;
					echo "<h3>$get</h3>";
					?>
					<p>Pre-inscrits</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-warning">
					<p>
						<i class="fas fa-spinner"></i>
					</p>
					<?php
                    $con=new pdo("mysql:host=cefolie51.mysql.db; dbname=cefolie51","cefolie51","JgmgJJ3JYvYv");
					$get=$con->query("select count(*) from matiere ")->fetchColumn();;
					echo "<h3>$get</h3>";
					?>
					<p>Formations</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-success">
					<p>
						<i class="fas fa-check-circle"></i>
					</p>
					<?php
                    $con=new pdo("mysql:host=cefolie51.mysql.db; dbname=cefolie51","cefolie51","JgmgJJ3JYvYv");
					$get=$con->query("select count(*) from contactdataform ")->fetchColumn();;
					echo "<h3>$get</h3>";
					?>
					<p>Propositions</p>
				</div>
			</div>
			<div class="col-3 col-m-6 col-sm-6">
				<div class="counter bg-danger">
					<p>
						<i class="fas fa-bug"></i>
					</p>
					<?php
                    $con=new pdo("mysql:host=cefolie51.mysql.db; dbname=cefolie51","cefolie51","JgmgJJ3JYvYv");
					$get=$con->query("select count(*) from client where daten <>'0000-00-00' ")->fetchColumn();;
					echo "<h3>$get</h3>";
					?>
					<p>Inscrits</p>
				</div>
			</div>
		</div>
		<div class="row"  style="align:center; margin-left:3%;width:140%;">
			<div class="col-8 col-m-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h3 style="margin-bottom:30px;">
							Nos etudiants
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
									<th>Telephone</th>
									<th>Formation</th>
									<th>Date de Debut</th>
									<th>Prix</th>
									<th>modifer</th>

								</tr>
							</thead>
							
                        <?php
                        $con=new pdo("mysql:host=cefolie51.mysql.db; dbname=cefolie51","cefolie51","JgmgJJ3JYvYv");
                         require_once'phpqrcode/qrlib.php';
                         require_once'phpqrcode/qrconfig.php';
                         $get=$con->prepare("select i.idc, c.CIN,c.nom, c.prenom,c.email,c.Tel,f.intitule,i.datep,i.prix from client c ,matiere f ,inscription i where i.idc=c.id and i.idm=f.id_m  and c.daten <> '0000-00-00 00:00:00'order by datep desc ");
                         $get->execute();
                        foreach($get as $dat){
                              $tel=$dat['Tel'];
                              $id_c=$dat[0];
                             QRcode::png($tel,'qrcode/'.$id_c,'H',3.0);
                            echo'  <tr class="data">
                             <td id="idc">'.$dat['idc'].'</td>
                             <td id="cin'.$dat[0].'">'.$dat['CIN'].'</td>
                             <td id="nom'.$dat[0].'">'.$dat['nom'].' </td>
                             <td id="prenom'.$dat[0].'">' .$dat['prenom'].'</td>
                             <td id="email'.$dat[0].'">' .$dat['email'].' </td>
                             <td><img src="qrcode/'.$id_c.'"></td>
                             <td id="intitule'.$dat[0].'">'.$dat['intitule'].'</td>
							 <td id="datep'.$dat[0].'">' .$dat['datep'].' </td>
							 <td id="prix'.$dat[0].'">' .$dat['prix'].' </td>
							 <td>
              <a  title="Edit" onclick="edit_user('.$dat[0].')" style="cursor:pointer;"><button>edit</button></a></td>
                             </tr>';
                             }
   
                        ?> 
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
	<script>
function edit_user(idc){
   var cin=$('#cin'+idc).text();
    var nom=$('#nom'+idc).text();
    var prenom=$('#prenom'+idc).text();
    var email=$('#email'+idc).text();
    var datep=$('#datep'+idc).text();
	var prix=$('#prix'+idc).text();
    var intitule=$('#intitule'+idc).text();

    $.ajax({
        url:"edit_e.php",
        method:"POST",
        data:{idc:idc,cin:cin,nom:nom,prenom:prenom,email:email,intitule:intitule,datep:datep,prix:prix },
        dataType:"text",
    });
}
var c;
var f;
var data=document.getElementsByClassName('data');
for (c=0;c<data.length;c++){
    var td=data[c].getElementsByTagName('td');
    for(f=0;f<td.length-1;f++){
        if( f==8){
			td[f].contentEditable="true";
          
        }else{
		continue;
	    }
    }
}


</script>
<?php if(isset($_POST['Search'])){
	echo search_user();
} ?>
</body>
</html>