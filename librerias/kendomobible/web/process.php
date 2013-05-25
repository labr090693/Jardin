<?php
    session_start();
    require_once '../controller/empleadocontroller.php';    
    if(!isset($_POST['user'])){ empleadocontroller::login(); }
        else  header('Location: index.php');
?>