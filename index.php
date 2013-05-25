<?php    
    session_start();
    $error="";
    
    
     if(isset($_POST['usuario']))
        {
           require("conexion.php");
           require("librerias/funciones.php");
           
		 
				  
           $usuario=$_POST['usuario'];
	   $clave=$_POST['clave'];	
	
            $sql="Select clave,veces,idperfil,nombre from usuario Where usuario='$usuario' and estado=1 "; 
            $r=mysql_query($sql); 
            if($f=mysql_fetch_array($r))
              {
	       if($f['veces']>=3)
		{
                 $error="Ha superado el limite de intentos";}
	       else
		{
		  if(($f['clave'])==$clave)
		    {
                      $datetime=date("Y-m-d H:i:s");
                       mysql_query("UPDATE usuario SET veces=0, ultimoacceso='$datetime' Where usuario='$usuario'  ");
                        $_SESSION['usuario']=$usuario;
			$_SESSION['idperfil']=$f['idperfil'];
			$_SESSION['nombre']=$f['nombre'];
			$_SESSION['urlbase']=$URLBASE;
										  
                    mensajeJS("","principal.php");
                    mysql_close();
                    }
                  else 
                    {
                      die("<script>alert('Acceso Denegado. Usuario y/o clave incorrecto'); window.location='index.php';</script>");
		      mysql_query("UPDATE usuario SET veces=veces+1 Where usuario='$usuario'  ");
                    }
		 }
	       }
	    else{
                die("<script>alert('Acceso Denegado. Usuario y/o clave incorrecto'); window.location='index.php';</script>");
		 mysql_close();
                }
	}
		  
?>

<?php
    require ('estilos.php');
    require ('script.php');
?>
<head>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="css/favicon.ico" />
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    
    <div class="btn-toolbar">
        
        <div class="modulo">
            <img src="imagenes/escudo.png" width="200px" height="200px" class="img-circle"><br><br>    
            <button id="informate" class="btn btn-large btn-warning" type="button" >INFORMATE</button><br><br>
            <button id="matricula" class="btn btn-large btn-warning" type="button">MATR&Iacute;CULA</button><br><br>
            <button id="pagos" class="btn btn-large btn-warning" type="button">PAGOS</button><br><br>
            <button id="personal" class="btn btn-large btn-warning" type="button">PERSONAL</button>
            
        </div>  
        
    </div>
    
    <div class="centro">
            <div class="tabbable">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab1" data-toggle="tab">INICIO</a></li>
                  <li><a href="#tab2" data-toggle="tab">MISI&Oacute;N</a></li>
                  <li><a href="#tab3" data-toggle="tab">VISI&Oacute;N</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab1">
                      <p>Bienvenidos a la I.E.I.P Mi Castillo Encantado</p>
                  </div>
                  <div class="tab-pane" id="tab2">
                    <p>Mision</p>
                  </div>
                   <div class="tab-pane" id="tab3">
                    <p>Vision</p>
                  </div>
                </div>
            </div>
    </div>
    
    <div id="sesion" clase = "menú desplegable,"  papel = "rmenú"  aria-labelledby = "DropDownMenu" >
    <form class="form-inline" method="post" action="index.php">
            <table border='0'>
                <tr class="tabla">
                    <td align="center"><h4>Usuario</h4></td>    
                    <td><h4><input type="text" id="usuario" name="usuario" class="input-medium search-query" placeholder="Usuario" size='20' maxlength="20"></h4></td>
                </tr>    
                <tr class="tabla">
                    <td><h4>Contrase&ncaron;a</h4></td> 
                    <td><input type="password" id="clave" name="clave" class="input-medium search-query" placeholder="Contrase&ncaron;a" size='20'></td>
                </tr> 
                <tr>   
                <td colspan='2' align="center"><input class="btn btn-warning" type="submit" name="button" id="button" value="Acceder"></td>
                </tr> 
                
                </table>
    </form>
    </div>
    
    <div id='flotante1'>
<img src='http://lh3.googleusercontent.com/-vq69jjHi_aA/UKxnEYWptDI/AAAAAAAADdU/1bjiSBYnRSo/fb_tab.png' style='float:left;'/>
<div style='background: #3c5a98; height:325px; margin-left:38px;padding: 8px 5px 0pt 50px;border-radius: 0px 0px 0px 10px;'><span><div class='likeboxwrap'><iframe allowtransparency='true' frameborder='0' scrolling='no' src='http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FMiCastilloEncantado&width=240&colorscheme=light&connections=15&stream=false&header=false&height=350' style='border:none; overflow:hidden; width:240px; height:325px;'/></iframe>
</div></span></div></div>
    
     <div id='flotante3'>
<img src='http://lh3.googleusercontent.com/-RhKk8PrLf6Q/UKxmjhdUHAI/AAAAAAAADdI/wUbRpY6XfiQ/tw_tab.png' style='float:left;'/>
<div style='background: #00a0e8; height:325px; margin-left:38px;padding: 8px 5px 0pt 50px;border-radius: 0px 0px 0px 10px;'><span><div class='likeboxwrap'>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js' type='text/javascript'></script>
<style>
.follow_box_widget{overflow: hidden; padding-left: 5px; padding-right: 5px; padding-top: 5px; background-color: #fff transparent; position: relative; margin: auto;}
.follow_box{font-size: 11px; font-family: "lucida grande",tahoma,verdana,arial,sans-serif; color: #333; line-height: 1.28; text-align: left; direction: ltr;}
.follow_box .follow_top{padding: 5px 10px 0px 5px; margin-bottom: 8px; min-width: 230px; overflow: hidden;}
.follow_box .profileimage{float: left; width: 40px; height: 40px; padding: 0px; margin: 0 10px 4px 0;}
.follow_box img{border: 0;}
.follow_box a{cursor: pointer; color: #3B5998; text-decoration: none;}
.follow_box a:hover{text-decoration: underline;}
.follow_action{padding: 0 0 0 8px;}
.follow_box .follow_action .name{line-height: 15px; font-size: 14px; font-weight: bold;}
.follow_box .follow_button{margin: 5px 0 0;}
.follow_box .total{min-width: 230px; overflow: hidden; display: block;}
.follow_box .connections{padding: 5px 0 4px 0px; border-top: solid 1px #D8DFEA; border-bottom: 1px solid #CCC; min-height: 150px;}
.follow_box .connections .connections_grid{padding-top: 5px; overflow: hidden;}
.follow_box .clearfix{zoom: 1;}
.follow_box .connections .connections_grid .grid_item{float: left; margin:0px; margin-right: 5px; margin-bottom: 8px; overflow: hidden; width: 50px;}
.follow_box .connections .connections_grid .grid_item .name{font-size: 9px; color: gray; overflow: hidden; padding-top: 2px; text-align: center; white-space: nowrap;}
.follow_box .connections .connections_grid .grid_item img{width: 48px; height: 48px;}
.follow_box .follow_widget_footer{ cursor: default; width: 100%; min-width: 230px; overflow: hidden;}
.follow_box .footer_border{ margin-top: 5px;}
.follow_box .uiImageBlock{line-height: 14px;}
.follow_box .follow_widget_footer .footer_logo{float: left; margin-right: 5px;}
.follow_box .follow_widget_footer .footer_text{cursor: default; color: #808080; font-size: 9px; float: left;}
.follow_box .follow_widget_footer .footer_text a.footer_text_link{color: #808080;}
.follow_box .titlecase{text-transform:capitalize;}
</style>
<script>

(function(a){a.fn.followbox=function(b){function f(a,b){if(a>100)a=100;var c=new Array;for(var d=0;d<a;d++){c.push(b[d])}var e=c.join();return e}var c=a(this);var d="https://lh6.googleusercontent.com/-FnahS38iTbo/UK2l4ayjh8I/AAAAAAAADeg/kiJmxA2CfLc/icon_twitter.png";var e=a.extend({user:"jobysblog",width:292,height:252,theme:"light",border_color:"#AAA",bg_color:"#fff",bg_image:"",title_color:"#3B5998",total_count_color:"#333",follower_name_color:"#BBB"},b);a.ajax({url:"http://api.twitter.com/1/users/lookup.json?screen_name="+e.user+"&include_entities=true",dataType:"jsonp",success:function(b){var g=e.width-2;var h=e.height-2;var i=e.height-115;var j=parseInt(e.width/55);var k=parseInt(i/69)+1;var l=j*k;c.html('<div class="follow_box_main" style="border: 1px solid #bbb; width: '+g+"px; height: "+h+'px;"><div class="follow_box_widget"><div class="follow_box"><div><div class="follow_top clearfix"><a href="http://www.twitter.com/'+e.user+'" target="_blank"><img class="profileimage img" src="'+b[0].profile_image_url_https+'" alt="'+b[0].name+'"></a><div class="follow_action"><div class="name_block"><a href="http://www.twitter.com/'+e.user+'" target="_blank"><span class="name titlecase">'+b[0].name.toLowerCase()+"</span> @"+b[0].screen_name+'</a></div><div class="follow_button"><iframe allowtransparency="true" frameborder="0" scrolling="no" src="//platform.twitter.com/widgets/follow_button.html?screen_name='+e.user+'&show_count=false&show_screen_name=false&lang=es" style="width:100px; height:20px;"></iframe></div></div></div><div class="connections"><span class="total"><span class="follow_box_follower_count">'+b[0].followers_count+'</span> personas siguen a <b class="titlecase">'+b[0].name.toLowerCase()+'</b></span><div class="connections_grid clearfix" style="height:'+i+'px;"></div></div></div><div style="height: 23px"><div class="follow_widget_footer"><div class="footer_border"><div class="clearfix uiImageBlock"><a class="footer_logo" target="_blank" href="http://jobyj.in/twitter-follow-box-widget"><img src="'+d+'"/></a><div class="footer_text"><a class="footer_text_link" target="_blank" href="http://jobyj.in/twitter-follow-box-widget">Twitter Social Plugin</a></div></div></div></div></div></div></div></div>');if(e.theme=="dark"){c.find(".follow_box_main").addClass("dark")}c.find(".follow_box_follower_count").text(c.find(".follow_box_follower_count").text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g,"$1,"));if(a.browser.msie&&!a.support.boxModel)a(".follow_box .connections").css("padding-bottom","14px");if(e.theme=="custom"){c.find(".follow_box_main").css({"border-color":e.border_color,"background-color":e.bg_color,"background-image":'url("'+e.bg_image+'")'});c.find(".follow_box a").css({color:e.title_color});c.find(".follow_box .total").css({color:e.total_count_color})}a.ajax({url:"https://api.twitter.com/1/followers/ids.json?cursor=-1&screen_name="+e.user,dataType:"jsonp",success:function(b){var d=f(l,b.ids);a.ajax({url:"https://api.twitter.com/1/users/lookup.json?user_id="+d+"&include_entities=true",dataType:"jsonp",success:function(b){for(var d=0;d<b.length;d++){var f=a.trim(b[d].name);var g=f.split(" ");var h='<div class="grid_item"><a href="http://twitter.com/'+b[d].screen_name+'" target="_blank"><img class="img" src="'+b[d].profile_image_url+'" alt=""><div class="name titlecase">'+g[0].toLowerCase()+"</div></a></div>";c.find(".connections_grid").append(h)}if(e.theme=="custom"){c.find(".connections .connections_grid .grid_item .name").css({color:e.follower_name_color})}}})}})}})}})(jQuery)
</script>
<script>
$(document).ready(function(){
$('#twitterfollowbox').followbox({
'user':'CastilloEncant1',
'height':'300',
'width':'260',
'theme':'custom',
'border_color':'#ffffff',
'bg_color':'#ffffff',
'bg_image':'',
'title_color':'#3B5998',
'total_count_color':'#333333',
'follower_name_color':'#BDBDBB'
});
});
</script>
<div id="twitterfollowbox" class="follow-box-container"> </div>

</div></span></div></div>
    
</body>