<?php

function mensajeJS($mensaje,$pagina="")
  {
    @mysql_close();
		
    if(trim($mensaje)=="")
      {
       die("<script> window.location='$pagina';</script>");		  
      }
		  
	if(trim($pagina)=="")
	   {
	    die("<script> alert('$mensaje'); </script>");		  
	   }

     die("<script>alert('$mensaje');
     window.location='$pagina';</script>");		  	
  }


     class formulario
	  {
		  static function combo($sql, $valor="")
		  {
			  $r=mysql_query($sql);
			  $campoid=mysql_field_name($r,0);
			  $campodescripcion=mysql_field_name($r,1);
			  
			  $c="<select name='$campoid' id='$campoid'>
			        <option value=''>Seleccione...</option>
			  "; 

			  while($f=mysql_fetch_array($r))
			    {
				  if($valor==$f[$campoid]) 
				    {
 					    $c=$c."<option value='".$f[$campoid]."' selected='selected'>".$f[$campodescripcion]."</option>";	 
					}
					else
					{
						$c=$c."<option value='".$f[$campoid]."'>".$f[$campodescripcion]."</option>";
					}
				}
			  $c=$c."</select>";
			  echo $c; 
		  }  
 

		 static function text($nombre,$valor="")
		   { echo "<input type='text' name='$nombre' id='$nombre' value='$valor'>";}
	  }

?>

<?php
 function vfecha($fecha){
    list($dia,$mes,$ano)=explode("/",$fecha);
    $fecha="$ano-$mes-$dia";
    echo $fecha;
 }
?>

<?php

 class formulario1
	  {
		  static function combo1($sql, $valor="")
		  {
			  $r=mysql_query($sql);
			  $campoid=mysql_field_name($r,0);
			  $campoid2=mysql_field_name($r,1);
			  $campodescripcion=mysql_field_name($r,2);
			  
			  $c="<select name='$campoid' class='$campoid' id='$campoid2'>
			        <option value=''>Seleccione...</option>
			  "; 

			  while($f=mysql_fetch_array($r))
			    {
				  if($valor==$f[$campoid]) 
				    {
 					    $c=$c."<option value='".$f[$campoid]."' selected='selected'>".$f[$campodescripcion]."</option>";	 
					}
					else
					{
						$c=$c."<option value='".$f[$campoid]."'>".$f[$campodescripcion]."</option>";
					}
				}
			  $c=$c."</select>";
			  echo $c; 
		  }  
 

		 static function text1($nombre,$valor="")
		   { echo "<input type='text' name='$nombre' id='$nombre' value='$valor'>";}
	  }


?>





