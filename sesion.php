<?php  
       session_start();
       require("librerias/funciones.php");
       if(!isset($_SESSION['usuario'])){ 
	        mensajeJS("Debe iniciar sesion","/jardin/index.php");
	     }
?>