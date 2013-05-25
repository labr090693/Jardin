<?php 
        require("../../../sesion.php");
	require("../../../conexion.php");
?>

<?php 

       $idpadre="";
       function crearArbol($tabla,$id_field,$show_data,$link_field ,$parent,$prefix,$condicional,$idmodulo){
       $sql='select * from '.$tabla.' where '.$link_field.'='.$parent." $condicional";
       $rs=mysql_query($sql);
         if($rs)
           {
	     while($arr=mysql_fetch_array($rs))
		  {
		   echo("<a href='?id=".$arr[$id_field]."'>".$prefix.$arr[$show_data]." </a> <br>");
		   crearArbol($tabla,$id_field,$show_data,$link_field,$arr[$id_field],$prefix.$prefix,$condicional,$idmodulo);
					    
		  }
	   }    
			}  

       echo crearArbol('modulo','idmodulo','descripcion','idpadre',0,'&nbsp;&nbsp;',' order by descripcion',$idpadre);  					
?>  

