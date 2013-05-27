<?php 
      require("sesion.php"); 
      require("conexion.php"); 
      require("estilos.php");
?>

<script src="<?php echo $_SESSION['urlbase']; ?>librerias/jquery.js"></script>
<script src="<?php echo $_SESSION['urlbase']; ?>librerias/bootstrap.js"></script>
<script src="<?php echo $_SESSION['urlbase']; ?>librerias/funciones.js"></script>
<script src="<?php echo $_SESSION['urlbase']; ?>librerias/jquery_validate.js"></script>

<script src="<?php echo $_SESSION['urlbase']; ?>librerias/kendo/js/kendo.all.min.js"></script>
<script src="<?php echo $_SESSION['urlbase']; ?>librerias/kendo/js/cultures/kendo.culture.es-PE.min.js"></script>

<link href="<?php echo $_SESSION['urlbase']; ?>librerias/kendo/styles/kendo.common.min.css" rel="stylesheet" />
<link href="<?php echo $_SESSION['urlbase']; ?>librerias/kendo/styles/kendo.black.min.css" rel="stylesheet" />
<link href="<?php echo $_SESSION['urlbase']; ?>css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="<?php echo $_SESSION['urlbase']; ?>css/bootstrap.css" rel="stylesheet" media="screen">
<link href="<?php echo $_SESSION['urlbase']; ?>libreria/bootstrap.min.js" rel="stylesheet" media="screen">
<link href="<?php echo $_SESSION['urlbase']; ?>librerias/bootstrap.js" rel="stylesheet" media="screen">

<script type="text/javascript">
  
   $(document).ready(function() {
		
		          $("#menu").kendoMenu();

            });
</script>


<style type="text/css">
body {
    background-image:url(<?php echo $_SESSION['urlbase']; ?>imagenes/fondo.jpg);
    
}
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	
}
a {
	font-family: Arial, Helvetica, sans-serif;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.asas {
	color: #0F0;
        float: right;
}

.modulos {
        background: rgba(0,0,0,0.5);
        
}

li {
    color: #0F0;
    
}

.usuario {
    float: right;
    padding-right: 10px;
    padding-top: 10px;
    padding-bottom: 10px;
}


</style>
<table  class="modulos" width="1300" height="100%" border="0" align="center">
  <tr >
    <td height="40" class="usuario" >
        <span class="asas" >Usuario: <?php echo $_SESSION['usuario']; ?></span>
        <br>
        <span class="asas">Nombre: <?php echo $_SESSION['nombre'] ?></span>  
        <br>
        <span class="asas"><a href='http://localhost/Jardin/cerrar_sesion.php' class='btn btn-danger'>Salir</a></span>
        </td>
  </tr> 
  <tr>
    <td height="25" colspan="2">
    


     <?php 			    
				$DOMINIOADMIN=$_SESSION['urlbase']."modulos/";
				$urladmin=$_SESSION['urlbase']."modulos/";
			    echo "<ul id='menu'> ";
			    cargarmenu("0",$DOMINIOADMIN);// Donde 0 es el Idpadre principal
			      
			   function cargarmenu($id,$urladmin)
			   {
				   $sql="select idmodulo, descripcion,url,idpadre from modulo where idpadre='$id' order by descripcion";
					 $r=mysql_query($sql); 
			
					while($f=mysql_fetch_array($r))
					   {  $descripcion=$f['descripcion'];  $idmodulo=$f['idmodulo'];  $idpadre=$f['idpadre']; 
						  $url=$f['url'];
						    
							     	$sql2="select * from perfil_modulo where idmodulo='$idmodulo' and idperfil='".$_SESSION['idperfil']."'"; 
									$r2=mysql_query($sql2); 							
									if(mysql_num_rows($r2)>0)
									  {
								  
												$sql2="select * from modulo where idpadre='$idmodulo' ";
												$r2=mysql_query($sql2); 							
												if(mysql_num_rows($r2)>0)
												  {
													   echo "<li>$descripcion <ul>"; 
															 cargarmenu($f['idmodulo'],$urladmin);
													   echo "</ul></li>";    
												  }
												  else
												  {
													   echo "<li><a href='".$urladmin."$url'>".$f['descripcion']."</a></li>";
												  }
									  }
					  }
				 	  
			   }
			echo "</ul>"; 
			  
?>


   
    </td>
  </tr>
  <tr>
    <td colspan="2">
     
      
