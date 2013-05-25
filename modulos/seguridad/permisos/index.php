<?php 
	  
       require("../../../cabecera.php");
       require("../../../conexion.php");
	   
	   function crearArbolModulos($tabla,$id_field,$show_data,$link_field ,$parent,$prefix,$condicional,$idmodulo,$idperfil){
                       $sql='select * from '.$tabla.' where '.$link_field.'='.$parent." $condicional";
                       $rs=mysql_query($sql);
                       if($rs){
                               while($arr=mysql_fetch_array($rs))
							     {
									   
									    $sql3="Select * from perfil_modulo where idmodulo='".$arr['idmodulo']."' and idperfil='$idperfil'";
										$r3=mysql_query($sql3);	
										if($f3=mysql_fetch_array($r3))
										  {
											  echo "<div id='capa".$arr['idmodulo']."$idperfil' class='pintacapa'><label>$prefix<input name='modulo' idmodulo='".$arr['idmodulo']."' idperfil='$idperfil' checked='checked' type='checkbox' value='1' /> ".$arr[$show_data]." </div></label>";
										  }
										  else
										  {
	echo "<div id='capa".$arr['idmodulo']."$idperfil'><label>$prefix<input name='modulo' idmodulo='".$arr['idmodulo']."' idperfil='$idperfil' type='checkbox' value='1' />  ".$arr[$show_data]."  </div></label>";
										  }
                                       crearArbolModulos($tabla,$id_field,$show_data,$link_field,$arr[$id_field],$prefix.$prefix,$condicional,$idmodulo,$idperfil);
                                 }
                        }    
                    }

	   
?>
<script>

  $(document).ready(function() {    
    	
	$("input").click(function(){
	
			idmodulo=$(this).attr("idmodulo");
			idperfil=$(this).attr("idperfil");
			
			if($(this).is(":checked"))
			  {
				 estado=1;
			  }
			  else
			  {
				 estado=0;
			  }
			  
			  cargardatos("guardar.php","mensaje","idmodulo="+idmodulo+"&idperfil="+idperfil+"&estado="+estado);
		});
	
  });

</script>
<style>

h2{ font-size:14px; margin:0px 0px 0px 0px; text-align:center}
.bloque{ display:inline-block; width:150px; background-color:#FC6; float:left; margin-right:20px; text-align:left; vertical-align:top}

</style><br><div id="mensaje"></div>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
     <?php 

	    $sql="Select * from perfil";
		$r=mysql_query($sql);
		
		while($f=mysql_fetch_array($r))
		 {
			echo "<div class='bloque'>
					<h2>".$f['descripcion']."</h2>
			 	 "; 
				 	
	   echo crearArbolModulos('modulo','idmodulo','descripcion','idpadre',0,'&nbsp;&nbsp;&nbsp;&nbsp;','',@$idmodulo,$f['idperfil']);  		
			echo "			
				  </div>
			    ";	 
		 }
	 
	 ?>
     </td>
  </tr>
</table>
<?php 
require("../../../pie.php");

mysql_close();
?>