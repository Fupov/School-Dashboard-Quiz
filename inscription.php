<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
    src="https://kit.fontawesome.com/6458efce2.js"
    crossorigin="anonymous">

    </script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"/>
    <link rel="stylesheet" href="style4.css"/>
    <title>Inscription</title>
</head>
<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.11/lottie.min.js" integrity="sha512-jbTBHn1aXqglu6As1bUWxdPYc9b1uMHtreBM30oW3HbNFDS/eO1n+f98l4qcmw2l7CAdjWSbu3wVjm9SKISOaw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="app.js"></script>
   <?php
    $con=mysqli_connect('cefolie51.mysql.db','cefolie51','JgmgJJ3JYvYv','cefolie51');
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();}
        function get_code()
        {
           $c=mysqli_connect('cefolie51.mysql.db','cefolie51','JgmgJJ3JYvYv','cefolie51');
           $code="select max(id) from client";
           $id= mysqli_query($c,$code);
           $t=mysqli_fetch_row($id);
           return $t[0]+1;
        }
      if(isset($_POST["log"])){
        $recherche="select id from client where nom like '%".$_POST["nom"]."%' and prenom like '%".$_POST["prenom"]."%' ";
        $res=  mysqli_query($con,$recherche);
        $id=mysqli_fetch_row($res);
          $req2="select id_m from matiere where niveau='".$_POST["n"]."' and intitule='".$_POST["langue"]."' ";
          $f= mysqli_query($con,$req2);
           $count=mysqli_num_rows($f);
           if($count>0){
               $test=mysqli_fetch_array($f);
             $nbr=$test[0];
             if(mysqli_num_rows($res)<=0){
               $num=get_code();
               $req1="insert into client(id,nom,prenom,email,tel) values(".$num.",'".$_POST["nom"]."','".$_POST["prenom"]."','".$_POST["email"]."',".$_POST["tel"].")";
               mysqli_query($con,$req1);
             }
             else{$num=$id[0];}
             $req3= "insert into inscription(idc,idm) values(".$num.",".$nbr.")";
             mysqli_query($con,$req3);
           }

          header('Location: http://cefolim.com/');
        }

?>
   <?php
$p="select distinct intitule from matiere";
$rec=mysqli_query($con,$p);
?>
<?php
if(isset($_POST['id'])){
    $niv="select  niveau from matiere where intitule='".$_POST["id"]."'";
$res=mysqli_query($con,$niv);
  while($row = mysqli_fetch_assoc($res)){
    echo '<option value="'.$row["niveau"].'">'.$row["niveau"].'</option>';
}
}

?>
    <div class="container " >

        <div class="forms-container">
            <div class="signin-signup" id="svg">
                <form   method="POST" action="" class="sign-in-form" >
                    <h2 class="title">S'inscrire</h2>
                    <div class="input-field">
                        <i class='bx bxs-user'></i>
                        <input type="text" placeholder="Votre Nom " required name="nom">
                    </div>
                    <div class="input-field">
                        <i class='bx bxs-user'></i>
                        <input type="text" placeholder="Votre Prenom" required name="prenom">
                    </div>
                    <div class="input-field">
                        <i class='bx bx-mail-send'></i>
                        <input type="email" placeholder="Votre Email" required name="email">
                    </div>
                    <div class="input-field">
                        <i class='bx bxs-phone'></i>
                        <input type="text" placeholder="Votre Numero de telephone"  required name="tel">
                    </div>
                    <div class="input-field">

                            <div class="bg"></div>
                            <select class="color" name="langue" id="lang" onchange="chercher()">
                            <?php
                           while($row = mysqli_fetch_assoc($rec)){
                                echo '<option value="'.$row["intitule"].'">'.$row["intitule"].'</option>';
                           }
                           ?>
                            </select>


                    </div>
                    <div class="input-field">
                        <div class="bg"></div>
                        <select name="n" id="niv">
                             </select>

                </div>
                <input type="submit" value="continue"  name="log"  class="btn solid">
                </form>

            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
              <div class="content">
                <h3>Bienvenue à Cefolim</h3>
                <p>
                  Vous aurez la chance d'apprendre des nouveaux competances via nos formations et d'améliorer vos niveaux de langues , Cefolim sera toujours la pour vous aider
                </p>
              </div>
              <img src="./images/inscrp.svg" class="image" alt="" />
            </div>

        </div>
    </div>
    <script>
function chercher(){
    var valeur= $('#lang').val();
    $.ajax({
            async: false,
            url:"inscription.php",
            method:"POST",
            data:{id:valeur},
            dataType:"html",
            success:function(data){
				$('#niv').html(data);
            }
        });
}
window.onload=chercher;
</script>
</body>
</html>