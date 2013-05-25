<?php 
  
   if(!isset($_POST['idmodulo'])){ die("Acceso Denegado");}
 
   require("../../../conexion.php");   
           
         $idmodulo=$_POST['idmodulo'];
         $descripcion=$_POST['descripcion'];
		 $idpadre=$_POST['idpadre'];
		 $url=$_POST['url'];
   
 $sql="call PA_guardar_modulo('$idmodulo','$descripcion','$idpadre','$url');";
 
 mysql_query($sql) or die("Error al grabar ". mysql_error());
   
 mysql_close();

?><script> window.location='index.php';</script>