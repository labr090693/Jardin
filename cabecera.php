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
	background-color: #0F3; background-image:url(http://localhost/jardin/imagenes/fondo.jpg);
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
}
.nombre{
    font-family: Arial, Helvetica, sans-serif;
}


.fotoperfil{ height:50px; width:50px; }

.modulos {
        background: rgba(0,0,0,0.5);
	-webkit-border-radius:20px 20px 20px 20px;
}

li {
    color: #0F0;
}

.usuario {
    float:right;
    padding-top: 10px;
}


</style>

<br>
<br>

<table  class="modulos" width="1000" height="500" border="0" align="center" cellpadding="0" cellspacing="0">

    <tr class="usuario">
        <td>
        <span class="asas">Usuario: <?php echo $_SESSION['usuario']; ?></span>
        <br>
        <span class="asas">Nombre: <?php echo $_SESSION['nombre'] ?></span>  
        <br>
        <span class="asas"><a href='".<?php $_SESSION['urlbase'] ?>."cerrar_sesion.php' class='btn btn-danger'>Salir</a></span>
        </td>
        <td>
          <img src="http://localhost/jardin/imagenes/usuarios.png" width="10" height="10" class="fotoperfil" style="padding-right: 10px"/> 
        </td>
    </tr>
    <td>
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
     
      
