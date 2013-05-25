<?php 
       require("../../../sesion.php");
       require("../../../conexion.php");
	   
	   $idmodulo=$_POST['idmodulo'];
	   $idperfil=$_POST['idperfil'];
	   $estado=$_POST['estado'];
	   
	   if($estado==1)
		     {
				$sql="Insert into perfil_modulo(idmodulo,idperfil) values('$idmodulo','$idperfil')";		 
			 }
		 else
		 	{
				$sql="Delete from perfil_modulo Where idmodulo='$idmodulo' and idperfil='$idperfil' ";		 
			}
	   
	   mysql_query($sql); 
	   
	   mysql_close();

?>