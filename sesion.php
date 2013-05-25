<?php  session_start();
       require("librerias/funciones.php");
       if(!isset($_SESSION['usuario'])){ 
	        mensajeJS("Debe iniciar sesi&oacute;n","/jardin/index.php");
	     }
?>