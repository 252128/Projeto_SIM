<?php

if (isset($_SESSION['authuser']) && $_SESSION['authuser']==1) {
    echo "Login bem sucedido";
}
else{
    echo "Login incorreto";
    include ("showlogin.php");
}
?>