<?php
  
   $conexion=mysql_connect("localhost","root","") or die("No se encontró conexion al servidor mysql");
   $conexionbd=mysql_select_db("bdjardin", $conexion) or die("No hay BD");
   $URLBASE="http://localhost/jardin/"; // incluir / al final

?>