<?php
   
    require("../../../sesion.php");
	require("../../../conexion.php");
	
	if(!isset($_GET['id']))
	  { mensajeJS("El cliente no existe","index.php"); }
	  
	 $sql="DELETE FROM perfil where idperfil='".$_GET['id']."' "; 
	 
	 $r=mysql_query($sql) or die("Error al eliminar");
	 
	 mensajeJS("","index.php");
?>