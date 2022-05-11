<?php
// Isto vai ter a ver só com a autenticação do utilizador
    session_start();
    if(isset($_GET["action"])){
        $islogin = false;
        $action = $_GET["action"];
        switch($action) {
            case "showlogin":
                session_unset();
                break;
            case "verifylogin":
                $user = $_POST['user'];
                $password = $_POST['pass'];
                //$password = hash("sha256", $_POST['pass']); //Forma de encriptar antes de enviar. Se não só encriptaria depois de chegar à base de dados desencriptado
                $connect = mysqli_connect('localhost', 'root', '', 'heartsim')
                or die('Error connecting to the server: ' . mysqli_error($connect));
                $sql = "SELECT * FROM `utilizador` WHERE USERNAME = '$user' && PASSWORD = '$password'";

                $result = mysqli_query($connect, $sql)
                or die('The query failed: ' . mysqli_error($connect));
                $number = mysqli_num_rows($result); //if returns 1, then is a valid user


                if($number == 1) {
                       $_SESSION['authuser'] = 1;
                       $islogin = true;
                       $_SESSION['username'] = $_POST['user'];
                       $_SESSION['utilizador'] = mysqli_fetch_assoc($result)["Tipo"];
                    }
                    else {
                        $_SESSION['authuser'] = 0;
                    }
                    break;
            case "logout":
                session_unset();
                header("Location: index.php");
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
        // Isto vai ter a ver com as actions
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
                case "paciente":
                    $links = "pacientes.php";
                    break;
                case "RegistarConsulta":
                    $links = "RegistarConsulta.php";
                    break;
                case "Perfil":
                    $links = "perfil.php";
                    break;
            }
            include ($links);
            ?>

    </div>
    <div class="footer" style="background-color:#234567;color: white">
        <h3 align="center"> © HeartSIM - 2021-2022 </h3>
    </div>

</body>
</html>