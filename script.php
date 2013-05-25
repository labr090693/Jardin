<?php
    require 'estilos.php';
?>
<script type="text/javascript" src="librerias/jquery.js"></script>
<script type="text/javascript" src="librerias/bootstrap.js"></script>

<script type="text/javascript">

	$(document).ready(function(){
		$("#informate").click(function(){	
                                window.location.href='index.php';
                });
                $("#matricula").click(function(){	
				window.location.href='matricula.php';
                });
                $("#pagos").click(function(){	
				alert("ingrese su mensaje");
                });
                $("#personal").click(function(){	
				alert("ingrese su mensaje");
                });
	});
       
</script>
                
                <script > 
                    jQuery(function (){jQuery("#flotante1").hover(function(){jQuery("#flotante1").stop(true, false).animate({right:"0"},"medium")},
                    function(){jQuery("#flotante1").stop(true, false).animate({right:"-250"},"medium");},500);return false;});
                 </script>
                 
                 <script > 
                    jQuery(function (){jQuery("#flotante3").hover(function(){jQuery("#flotante3").stop(true, false).animate({right:"0"},"medium")},
                    function(){jQuery("#flotante3").stop(true, false).animate({right:"-250"},"medium");},500);return false;});
                 </script>
<head>
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
</head>