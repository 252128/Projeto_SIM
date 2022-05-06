<?php
    session_start();
    if(isset($_GET["action"])){
        $action = $_GET["action"];
        switch($action){
            case "showlogin":
                session_unset();
                break;
            case "verifylogin":
                $user = $_POST['user'];
                $password = $_POST['pass'];
                // $password = hash("sha256", $_POST['pass']); //Forma de encriptar antes de enviar. Se não só encriptaria depois de chegar à base de dados desencriptado
                $connect = mysqli_connect('localhost', 'root', '','heartsim')
                or die('Error connecting to the server: ' . mysqli_error($connect));
                $sql = "SELECT * FROM `utilizador` WHERE USERNAME = '$user' && PASSWORD='$password'";

                $result = mysqli_query ($connect ,$sql)
                or die('The query failed: ' . mysqli_error($connect));
                $number = mysqli_num_rows($result); //if returns 1, then is a valid user

            if($number == 1) {
                $_SESSION['authuser'] = 1;
                $_SESSION['username'] = $_POST['user'];
                $_SESSION['utilizador'] = mysqli_fetch_array($result);
            }
            else {
                $_SESSION['authuser'] = 0;
            }
            break;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> HeartSIM </title>
</head>
<body>
    <div class="logo">
        <h1 align="left"> HeartSIM </h1>
    </div>
    <div class="navigation">
        <?php
            include("menu.php");
        ?>
    </div>
    <div class="contents">
        <?php
            if(isset($_GET["action"])){
                $action = $_GET["action"];
            }
            else {
                $action = "homepage";
            }
            $links = "";
            switch($action){
                case "homepage":
                    $links = "homepage.php";
                    break;
                case "showlogin":
                    $links = "showlogin.php";
                    break;
                case "verifylogin":
                    $links = "verifylogin.php";
                    break;
                case "logout":
                    $links = "index.php?action=homepage";
                    session_unset();
            }
            include ($links);
            ?>

    </div>
    <div class="footer" style="background-color:#234567;color: white">
        <h3 align="center"> © HeartSIM - 2021-2022 </h3>
    </div>

</body>
</html>