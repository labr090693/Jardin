/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
  $(function() {
    $( "#idtipo_doc" ).focus();
    $( "#idtipo_documento_venta,#idtipo_doc" ).removeClass('ui-corner-all ui-widget-content');
    $("#idtipo_documento_venta,#idtipo_doc").css({'padding':'0','width':'74px','margin-left':'2px'});
//    var fecha = new Date();
//    m = fecha.getMonth();
//    $("#fecha").datepicker({'dateFormat':'dd/mm/yy',hideIfNoPrevNext: false,minDate: new Date(2011, m + 1, 1)});
    
   
    $("#idtipo_doc_r").change(function(){
        if($(this).val()!="")
        {
            $("#nrodocumento_r").attr("readonly",false);
            $("#nrodocumento_r").focus();
            limpiar_pasajero();
            
        }
            else {$("#nrodocumento_r").attr("readonly",true);}
    });
    
    $("#nrodocumento_r").change(function(){
        nro = $(this).val();
        td = $("#idtipo_doc_r").val();
        destd = $("#idtipo_doc option:selected").html();        
        $("#text-load").empty().append("Cargando...");
        $("#loading").css("display","inline");
        if(nro!=""){
           
            str = "nrodocumento="+nro+"&idtipo_doc="+td+"&destd="+destd;
            $.post('index.php','controller=cliente&action=buscar&'+str,function(data){ 
                 
              $("#loading").css("display","none");              
              if(data.idcliente!=null){
              $("#remitente").val(data.idcliente);
              $("#nombres_r").val(data.nombres);
              $("#sexo_r").val(data.sexo);
              $("#grab").css("display","none");
          }
            else {
                if(confirm("No se ha encontrado este numero de "+destd+" en la base de datos, Desea registrarlo ?"))
                    {
                       $("#grab").css("display","inline");
                       $("#nombres_r,#sexo_r").val("");
                       $("#nombres_r,#sexo_r").attr("readonly",false);
                       $("#nombres_r").focus();
                    }
                 else {
                     $("#nrodocumento_r").focus();
                 }
            }
            },'json')
        }
        else {
            $("#loading").css("display","none");
            limpiar_pasajero();
            $(this).focus();
        }
    });  
    
    $("#grab").click(function(){
        bval = true;
        bval = bval && $( "#idtipo_doc_r" ).required();
        bval = bval && $( "#nrodocumento_r" ).required();
        bval = bval && $( "#nombres_r" ).required();
        //bval = bval && $( "#apellidos" ).required();
//        bval = bval && $( "#fnacimiento" ).required();
        bval = bval && $( "#sexo_r" ).required();
        if(bval)
            {
                $("#grab").css("display","none");
                $("#text-load").empty().append("Grabando remitente...");
                $("#loading").css("display","inline");
                nom=$("#nombres_r").val();
                num=$("#nrodocumento_r").val();
                sex=$("#sexo_r").val();
                doc=$("#idtipo_doc_r").val();
                //alert(num);
                str = "idcliente"+""+"&idtipo_doc="+doc+"&nombres="+nom+"&nrodocumento="+num+"&sexo="+sex;
                $.post('index.php','controller=cliente&action=save_extend&'+str,function(data){
                    if(data[0]){
                        $("#loading").css("display","none");
                        alert("Se ha registrado correctamente el Remitente");
                        $("#remitente").val(data[1]);
                        
                    }
                        else {
                            $("#grab").css("display","inline");
                            $("#loading").css("display","none");
                            alert("Ha ocurrido un error, intentelo de nuevo"+data[1]);
                        }
                },'json')
            }        
        });
    
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#fecha" ).required();
        bval = bval && $( "#vehiculo" ).required();
        bval = bval && $( "#idcronograma" ).required();
        c = cd();        
        if(c==0 && bval){alert("Complete datos del viaje");bval=false;}
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});

function Enter(evt)
      {
        var keyPressed = (evt.which) ? evt.which : event.keyCode
		if (keyPressed==13)
                {
                    validar();
		}
      }
function limpiar()      
{
    $("button").css("display","inline");
    $("#div_save").css("display","none");
    $("#idtipo_documento_venta,#idtipo_doc,#nrodocumento,#nombres,#apellidos,#sexo,#edad,#fnacimiento,#idpasajero").val("");
    $("#reservado").attr("checked",false);
    $("#mensajito").css("display","none");
}
function limpiar_pasajero()
{
    $("#nrodocumento,#nombres,#sexo,#idpasajero").val("");
}
