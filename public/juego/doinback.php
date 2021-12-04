<?php

session_start();
if(!empty($_POST['nombre'])){
    $_SESSION['jugador'] = $_POST['nombre'];
}
if(!empty($_POST['logout'])){
    session_unset();
}
header('Location:index.php');
?>