<?php  session_start();
       require("librerias/funciones.php");
       session_destroy();
	   mensajeJS("Usted acaba de cerrar sesion","/jardin/index.php");	  
?>