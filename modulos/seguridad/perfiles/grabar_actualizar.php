<?php 
  
   if(!isset($_POST['idperfil'])){ die("Acceso Denegado");}
 
   require("../../../conexion.php");   
           
         $idperfil=$_POST['idperfil'];
         $descripcion=$_POST['descripcion'];
   
 $sql="call PA_guardar_perfil('$idperfil','$descripcion');";
 
 mysql_query($sql) or die("Error al grabar ". mysql_error());
   
 mysql_close();

?><script> window.location='index.php';</script>