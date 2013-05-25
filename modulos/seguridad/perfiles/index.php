<?php 

require("../../../cabecera.php");
require("../../../conexion.php");


 if(isset($_GET['id']))
	    {
		  $sql="Select * from perfil Where idperfil='".$_GET['id']."'";
		  $r=mysql_query($sql);			
			
			if($f=mysql_fetch_array($r))
			  {
				$idperfil=$f['idperfil'];
                $descripcion=$f['descripcion'];
				 
			  }
			 else{ mensajeJS("Perfil no encontrado","index.php");}			  
		}
		else
		{
		 $idperfil="";
                 $descripcion="";
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
		 'descripcion': {required:true }
		 
		},
		
		messages: {
		 'descripcion': {required:'escriba descripcion' }
		},
		
		errorPlacement: function(error, element) {               
					error.appendTo(element.parent());     
				}

	});
	
	
	$("#enviar").click(function() {
		  
		  if ($("#formulario").valid())
                    { 
		    $('#formulario').submit(); 
		    }
		 else{alert("Debe completar todos los criterios");}
		  
		  return false;
	});

	jQuery.validator.addMethod("sololetras", function(value, element) {
					return this.optional(element) || /^[a-z]+$/i.test(value);
					}, "Solo letras."); 
	
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

label{ display:block; color:#00F}

#criterio{ background-color:#FFC}

</style>
<table width="807" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="341" valign="top">
 
 <form id="formulario" name="formulario" method="post" action="grabar_actualizar.php">
      <input name="idperfil" id="idperfil"  type="hidden" value="<?php echo $idperfil; ?>" />
      <table width="337" bgcolor="#f0f0f0" border="0" align="center" cellpadding="3" cellspacing="3">
        <tr>
          <td height="27" colspan="2" align="center" bgcolor="#003399"><strong>Registro de Perfiles</strong></td>
        </tr>
        <tr>
          <td width="114" bgcolor="#0066CC"><strong>Descripcion</strong></td>
          <td bgcolor="#FFFFFF">
            <input name="descripcion" type="text" id="descripcion" size="30" value="<?php echo $descripcion;?>" maxlength="100" /></td>
        </tr>
        <tr>
          <td colspan="2" align="center" bgcolor="#003399">
            
            <input type="button" name="enviar" id="enviar" value="Guardar" />&nbsp;&nbsp;&nbsp;
            <?php 
		  if(isset($_GET['id']))
		    {
		      echo "<input type='button' name='nuevo' id='nuevo' value='Agregar Nuevo'>";  
		    }
	        ?>
            
            </td>
        </tr>
      </table>
    </form>
    </td>
    <td width="466" valign="top">
     
     <div> <input type="text" size="50" name="criterio" id="criterio">
           <input type="button" name="buscargrid" id="buscargrid" value="Buscar"> 
           <a href="#" onclick="cargardatos('grid.php','grid','');">[Todo]</a>
     </div>
     <div id="grid">
         
     </div>
       
    </td>
  </tr>
</table>
<?php 
require("../../../pie.php");

 mysql_close(); ?>