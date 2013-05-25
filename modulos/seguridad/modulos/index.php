<?php 

       require("../../../cabecera.php");
       require("../../../conexion.php");

// codigo para bloquear po url-------------------
$idperfil=$_SESSION['idperfil'];
$idmodulo=8;
	$sql=
		"
		SELECT * from perfil_modulo where idmodulo=$idmodulo and idperfil=$idperfil
		
		"
	;
	//die($sql);
	$r=mysql_query($sql);
	/*if(!$f=mysql_fetch_array($r))
			  {
				  echo '<script>alert("Acceso restringido");
				   window.location = "/jardin/principal.php";</script>';
				  echo ("acceso restringido");
			  }
			  
*/
//--------------------------------------------------
 if(isset($_GET['id']))
	    {
		  $sql="Select * from modulo Where idmodulo='".$_GET['id']."'";
		  $r=mysql_query($sql);			
			
			if($f=mysql_fetch_array($r))
			  {
				$idmodulo=$f['idmodulo'];
                                $descripcion=$f['descripcion'];
				$idpadre=$f['idpadre'];
				$url=$f['url'];
				 
			  }
			 else{ mensajeJS("Modulo no encontrado","index.php");}			  
		}
		else
		{
				$idmodulo="";
                                $descripcion="";
				$idpadre="";
				$url="";
		}

?>

<script>

  $(document).ready(function() {
     // cargamos el grid al cargar la pagina
    
	
	 cargardatos('grid.php','grid','');
	 
	 //buscador
	 $("#buscargrid").click(function(){
		 
		     cargardatos('grid.php','grid','criterio='+escape($('#criterio').val())); 
			 
		 });
		 
		 <?php
	          if(isset($_GET['solover']))
			    {
				   echo "   $('input').attr('disabled','disabled'); 
				   			$('select').attr('disabled','disabled'); 
							$('textarea').attr('disabled','disabled'); 
							$('#enviar').css('visibility','hidden');
							$('#nuevo').removeAttr('disabled');
				    ";	
				}
	 
	 ?> 
		 

$('#formulario').validate({
		rules: {
		 'descripcion': {required:true },
		 'idpadre': {required:true },
		 'url': {required:true }
		 
		},
		
		messages: {
		 'descripcion': {required:'Escriba descripcion' },
		 'idpadre': {required:'Seleccione el modulo padre' },
		 'url': {required:'Escriba la ruta del modulo' }
		},
		
		errorPlacement: function(error, element) {               
					error.appendTo(element.parent());     
				}
	});

$("#enviar").click(function() {
		  
		  if ($("#formulario").valid()){ 

		    $('#formulario').submit(); 

		  }
		 else{ alert("Debe completar todos los criterios");}
		  
		  return false;
	});
	
	
   $("#eliminar").click(function() {
		 
		if(confirm("Esta seguro que desea eliminar?")) 
		  {
		     window.location="eliminar.php?id=<?php echo $idmodulo; ?>";
		  }
	});
   
	
});
 
   
</script>

<style type="text/css">
#formulario table tr td strong {
	color: #FFF;
}
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
}
.titulos {
	color: #FFF;
}

.registros1 td{ font-size:11px;}
.registros1{ background:#FFF;}
.registros2{ background:#FF9}

label{ display:block; color:#00F; background-color:#FF9; }

#criterio{ background-color:#FFC}

</style>
<table  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  valign="top">
    <form id="formulario" name="formulario" method="post" action="grabar_actualizar.php">
      <input name="idmodulo" id="idmodulo"  type="hidden" value="<?php echo $idmodulo;?>" />
      <table width="337" bgcolor="#f0f0f0" border="0" align="center" cellpadding="3" cellspacing="3">
        <tr>
          <td height="27" colspan="2" align="center" bgcolor="#003399"><strong>Registro de Modulos</strong></td>
        </tr>
        <tr>
            <td width="114" bgcolor="#0066CC"><strong>Descripcion</strong></td>
          <td bgcolor="#FFFFFF">
            <input name="descripcion" type="text" id="descripcion" size="30" value="<?php echo $descripcion;?>" maxlength="10" /></td>
        </tr>
        <tr>
          <td bgcolor="#0066CC"><strong>Padre</strong></td>
          <td bgcolor="#FFFFFF">
          
          
 <?php 
	echo "<select name='idpadre' id='idpadre'> ";
	echo("<option value='0'>&nbsp;&nbsp;*Principal*</option>");

	function crearArbol($tabla,$id_field,$show_data,$link_field ,$parent,$prefix,$condicional,$idmodulo){
		$sql='select * from '.$tabla.' where '.$link_field.'='.$parent." $condicional";
		$rs=mysql_query($sql);
		 if($rs)
                     {
		       while($arr=mysql_fetch_array($rs))
                            {
			      if($idmodulo==$arr[$id_field])	
				{
                                    echo("<option value='".$arr[$id_field]."' selected='selected'>".$prefix.$arr[$show_data]."  </option>");
				}
			      else
				{
				    echo("<option value='".$arr[$id_field]."'>".$prefix.$arr[$show_data]." </option> ");
				}
						  	
			      crearArbol($tabla,$id_field,$show_data,$link_field,$arr[$id_field],$prefix.$prefix,$condicional,$idmodulo);
			    }
		      }    
			}  

       echo crearArbol('modulo','idmodulo','descripcion','idpadre',0,'&nbsp;&nbsp;',' order by descripcion',$idpadre);  
       echo "</select>";
		
			
?>  




          </td>
        </tr>
        <tr>
          <td bgcolor="#0066CC"><strong>URL</strong></td>
          <td bgcolor="#FFFFFF"><input name="url" type="text" id="url" size="30" value="<?php echo $url;?>" maxlength="100" />
          
          
          
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center" bgcolor="#003399">
            
            <input type="button" name="enviar" id="enviar" value="Guardar" />&nbsp;&nbsp;&nbsp;
            <?php 
				if(isset($_GET['id']))
				  {
					  echo "<input type='button' name='nuevo' id='nuevo' value='Agregar Nuevo'>&nbsp;&nbsp;&nbsp;&nbsp;";  
					  
					  echo "<input type='button' name='eliminar' id='eliminar' value='Eliminar'>";  
					  
				  }
	        ?>
            
            </td>
        </tr>
      </table>
    </form>
    </td>
    <td width="466" valign="top">
     
     Editar:
     <div></div>
     <div id="grid">
         
     </div>
       
    </td>
  </tr>
</table>
<?php 
require("../../../pie.php");

 mysql_close(); ?>