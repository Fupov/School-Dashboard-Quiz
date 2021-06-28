<?php 
function search_user(){
    $con=new pdo("mysql:host=cefolie51.mysql.db; dbname=cefolie51","cefolie51","JgmgJJ3JYvYv");
    require_once'phpqrcode/qrlib.php';
      require_once'phpqrcode/qrconfig.php';
  if (isset($_POST['Search'])) {
        $keyword=$_POST['Search'];
        $res=$con->prepare("SELECT * FROM client WHERE nom LIKE '$keyword' OR prenom LIKE '$keyword' OR CIN LIKE '$keyword' OR email LIKE '$keyword'");
        $res->execute();
        foreach($res as $dat){
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
             <td>
      <a style="color:#f00 ; text-align: center;" href="pre-inscrits.php?del_user='.$dat['id'].'" title="Delete"><i class="fas fa-trash"></i></a>
            </td>
            <td>
            <a  title="Edit" onclick="edit_data('.$dat[0].')" style="cursor:pointer;"><button>edit</button></a></td>
           </tr>';
 }
}
}?>
