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
    <link rel="stylesheet" href="style2.css"/>
    <title>Authentification</title>
</head>
<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.11/lottie.min.js" integrity="sha512-jbTBHn1aXqglu6As1bUWxdPYc9b1uMHtreBM30oW3HbNFDS/eO1n+f98l4qcmw2l7CAdjWSbu3wVjm9SKISOaw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="app.js"></script>
   <?php
   $error="";
    $con=mysqli_connect('cefolie51.mysql.db','cefolie51','JgmgJJ3JYvYv','cefolie51');
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    if($_POST) {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        //to prevent from mysqli injection
        $username = stripcslashes($username);
        $password = stripcslashes($password);
        $username = mysqli_real_escape_string($con, $username);
        $password = mysqli_real_escape_string($con, $password);

        $sql = "select *from admin where username = '$username' and password = '$password'";



        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            header("Location: Home.php");
        } else {

            $error="Invalid username or password";
        }
    }
   ?>

    <div class="container " >

        <div class="forms-container">
            <div class="signin-signup" id="svg">
                <form  method="POST" action="" class="sign-in-form" >
                    <h2 class="title">Authentification</h2>
                    <div class="input-field">
                        <i class='bx bxs-user'></i>
                        <input type="text" name="user" id="user" placeholder="Username" required >
                    </div>
                    <div class="input-field">
                        <i class='bx bxs-user'></i>
                        <input type=password name="pass" id="pass" placeholder="Password" required >
                    </div>
                <input type="submit" value="continue"  name="log"  class="btn solid">
                    <span class="error"><?php echo $error?></span>
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
</body>
</html>