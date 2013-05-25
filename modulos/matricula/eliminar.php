<?php
   
    require("../../../sesion.php");
    require("../../../conexion.php");
	
	if(!isset($_GET['id']))
	  { mensajeJS("El modulo no existe","index.php"); }
	  
	 $sql="DELETE FROM modulo where idmodulo='".$_GET['id']."' "; 
	 
	 $r=mysql_query($sql) or die("Error al eliminar");
	 
	 mensajeJS("","index.php");
?>