<?php 
        require("../../../sesion.php");
	require("../../../conexion.php");
?>



<table bgcolor="#999999" width="127%" border="0" cellspacing="1" cellpadding="3">
  <tr class="titulos">
    <td width="16%" bgcolor="#003399"><strong>Descripcion</strong></td>
    <td width="14%" align="center" bgcolor="#003399"><strong>Accion</strong></td>
  </tr>
  <?php
      
	  $nropaginaciones=10;
	  $ini=0;
	  $fin=$nropaginaciones;
	  
	   $condicion="";
	  if(isset($_POST['criterio']))
	    {
		   $condicion=" WHERE  descripcion like '%".$_POST['criterio']."%'";	
		}
		
	   if(isset($_POST['ini']))
	    {
		   $ini=$_POST['ini'];
		   $fin=$_POST['fin'];
		}
		
     $sql="
	   SELECT
			*          FROM
         perfil

	  $condicion
	  LIMIT $ini, $fin 
	  ";
	  $r=mysql_query($sql);
          $nroregistros=mysql_num_rows($r);
	  $c=1;
	  while($f=mysql_fetch_array($r))
	    {
		   $idperfil=$f['idperfil'];
	       $descripcion=$f['descripcion'];
		   
		 if($c==1){ $clase="registros1"; $c=0;}
			  else { $clase="registros2"; $c=1;}
		   
?>
  <tr class="<?php echo $clase; ?>">
    <td><?php echo $descripcion; ?></td>
    <td>
  <a href="#" onClick="ver(<?php echo $idperfil; ?>);" ><img src="<?php echo $_SESSION['urlbase']; ?>imagenes/ver.gif" alt="Ver" width="15" height="12" border="0" /></a>&nbsp; 
      <a href="#" onClick="editar(<?php echo $idperfil; ?>);"> <img src="<?php echo $_SESSION['urlbase']; ?>imagenes/editar.gif" alt="Editar" width="16" height="16" border="0" /></a>&nbsp; 
    <a href="#" onClick="eliminar(<?php echo $idperfil; ?>);"> <img src="<?php echo $_SESSION['urlbase']; ?>imagenes/eliminar.gif" alt="Eliminar" width="11" height="12" border="0" /></a>&nbsp; </td>
  </tr>
  <?php }  ?>
  <tr bgcolor="#FFFFFF">
     <td>
     <?php
	
	   if(($ini-$nropaginaciones)<0)
	     {
			 
		 }
		 else
		 {
		 echo "<a href='#' onclick='anterior(".($ini-$nropaginaciones).",".($fin-$nropaginaciones).")'>Anterior</a> &nbsp;&nbsp;&nbsp; ";	 
		 }
		
		
	if($nroregistros<$nropaginaciones)		 
	  {
		  
	  }
	  else
	  {
	  
		echo "
			 
		<a href='#' onclick='siguiente(".($ini+$nropaginaciones).",".($fin+$nropaginaciones).");'>Siguiente</a>
			 
			 ";
	  }
	 ?>
     
     
    
     </td>
  </tr>
  
</table>
