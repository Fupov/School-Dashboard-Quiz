<?php 
$con= new pdo("mysql:host=cefolie51.mysql.db; dbname=cefolie51","cefolie51","JgmgJJ3JYvYv");
if(isset($_POST["id"],$_POST["delete"])){
    $id_c=$_POST['id'] ;
    $d=$con->prepare("delete from client where id=".$id_c);
    $d->execute();
}


?>