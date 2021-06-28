<?php
$con=new pdo("mysql:host=cefolie51.mysql.db; dbname=cefolie51","cefolie51","JgmgJJ3JYvYv");
	if(isset($_POST["idc"],$_POST["nom"],$_POST["prenom"],$_POST["email"],$_POST["intitule"],$_POST["datep"],$_POST["prix"])){
		$id_c=$_POST['idc'] ;
        $prix_c=$_POST["prix"];
		$d=$con->prepare("update inscription set prix='".$prix_c."' where idc=".$id_c);
		$d->execute();
	}
 ?>