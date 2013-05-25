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
    
   
  
    $("#idtipo_doc_d").change(function(){
        if($(this).val()!="")
        {
            $("#nrodocumento").attr("readonly",false);
            $("#nrodocumento").focus();
            limpiar_pasajero();
            
        }
            else {$("#nrodocumento").attr("readonly",true);}
    });
    
     $("#nrodocumento_d").change(function(){
        nro = $(this).val();
        td = $("#idtipo_doc_d").val();
        destd = $("#idtipo_doc_d option:selected").html();        
        $("#text-load2").empty().append("Cargando...");
        $("#loading2").css("display","inline");
        if(nro!=""){
           
            str = "nrodocumento="+nro+"&idtipo_doc="+td+"&destd="+destd;
            $.post('index.php','controller=cliente&action=buscar&'+str,function(data){ 
                 
              $("#loading2").css("display","none");              
              if(data.idcliente!=null){
              $("#destinatario").val(data.idcliente);
              //$("#x").val(data.idcliente);
              $("#nombres_d").val(data.nombres);
              $("#sexo_d").val(data.sexo);
              $("#grab2").css("display","none");
          }
            else {
                if(confirm("No se ha encontrado este numero de "+destd+" en la base de datos, Desea registrarlo ?"))
                    {
                       $("#grab2").css("display","inline");
                       $("#nombres_d,#sexo_r").val("");
                       $("#nombres_d,#sexo_r").attr("readonly",false);
                       $("#nombres_d").focus();
                    }
                 else {
                     $("#nrodocumento_d").focus();
                 }
            }
            },'json')
        }
        else {
            $("#loading2").css("display","none");
            limpiar_pasajero();
            $(this).focus();
        }
    });  
    
    $("#grab2").click(function(){
        bval = true;
        bval = bval && $( "#idtipo_doc_d" ).required();
        bval = bval && $( "#nrodocumento_d" ).required();
        bval = bval && $( "#nombres_d" ).required();
        //bval = bval && $( "#apellidos" ).required();
//        bval = bval && $( "#fnacimiento" ).required();
        bval = bval && $( "#sexo_d" ).required();
        if(bval)
            {
                $("#grab2").css("display","none");
                $("#text-load2").empty().append("Grabando destinatario...");
                $("#loading2").css("display","inline");
                nom=$("#nombres_d").val();
                num=$("#nrodocumento_d").val();
                sex=$("#sexo_d").val();
                doc=$("#idtipo_doc_d").val();
              //  alert(num);
                str = "idtipo_doc="+doc+"&nombres="+nom+"&nrodocumento="+num+"&sexo="+sex;
                $.post('index.php','controller=cliente&action=save_extend&'+str,function(data){
                    if(data[0]){
                        $("#loading2").css("display","none");
                        alert("Se ha registrado correctamente el detinatario");
                        $("#destinatario").val(data[1]);
                        
                    }
                        else {
                            $("#grab2").css("display","inline");
                            $("#loading2").css("display","none");
                            alert("Ha ocurrido un error, intentelo de nuevo");
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
function cd()
{
    c=0;
    $('tbody tr').each(function(i,j){
        c +=1;
    });
    return c;
}

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
