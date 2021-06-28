<?php  
$con=new pdo("mysql:host=cefolie51.mysql.db; dbname=cefolie51","cefolie51","JgmgJJ3JYvYv");
	if(isset($_POST["id"],$_POST["cin"],$_POST["nom"],$_POST["prenom"],$_POST["email"],$_POST["daten"],$_POST["nationalite"])){
		$id_c=$_POST['id'] ;
	    $cin_c=$_POST["cin"];
		$nom_c=$_POST["nom"];
		$prenom_c=$_POST["prenom"];
		$email_c=$_POST["email"];
		$daten_c=$_POST["daten"];
		$nationalite_c=$_POST["nationalite"];
		$d=$con->prepare("update client set CIN='".$cin_c."' , nom='".$nom_c."', prenom='".$prenom_c."',email='".$email_c."',daten='".$daten_c."',Nationalite='".$nationalite_c."' where id=".$id_c);
		$d->execute();

	}
header('Location: Pre-inscrits.php');
 ?>