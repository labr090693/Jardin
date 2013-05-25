$(function() {
    $( "#idtipo_doc" ).focus();
    $( "#idtipo_documento_venta,#idtipo_doc" ).removeClass('ui-corner-all ui-widget-content');
    $("#idtipo_documento_venta,#idtipo_doc").css({'padding':'0','width':'74px','margin-left':'2px'});
//    var fecha = new Date();
//    m = fecha.getMonth();
//    $("#fecha").datepicker({'dateFormat':'dd/mm/yy',hideIfNoPrevNext: false,minDate: new Date(2011, m + 1, 1)});
    
    $("#div_info").dialog({
        draggable: true,
                    show:'fade',
                    autoOpen: false,
                    modal:true,
                    position:'center',
                    width: 360,
                    height:'auto',
                    title: 'INFORMACION DEL ASIENTO',
                    resizable: false
    });
    
    $('#dialog').dialog({
                    draggable: true,
                    show:'fade',
                    autoOpen: false,
                    modal:true,
                    position:'center',
                    width: 780,
                    height:270,
                    title: 'REGISTRO DE VENTA PASAJE',
                    resizable: true,
               //window.location = 'index.php?controller=venta&action=redir';
                    buttons: {"Registrar la venta": function() {
                                    
                                    d = $("#grab").css("display");
                                    if(d=="none")
                                    {
                                        bval =  true;
                                        
                                        bval = bval && $( "#comprobante" ).required();
                                        bval = bval && $( "#nrodocumento" ).required();   
                                       // ck = $("#venta").attr("checked");     
                                        na = $("#nroasiento").val(); 
                                         
                                        if(bval){
                                        $("button").css("display","none");
                                        $("#div_save").empty().append("GUARDANDO VENTA ...");
                                        $("#div_save").fadeIn();
                                        //metodo de enviar uno x uno wdf.
                                       xviaje=$("#idviaje").val();
                                      //  xviaje="idviaje="+xviaje;
                                       xcliente=$("#idpasajero").val();
                                      //  xcliente="&idcliente="+xcliente;
                                        xcomprob=$("#comprobante").val();
                                      //  xcomprob="&comprobante="+xcomprob;
                                        xfecha=$("#fecha").val();
                                       // xfecha="&fecha"+xfecha;
                                        xhora=$("#hora").val();
                                       // xhora="&hora="+xhora;
                                        xprecio=$("#subtotal").val();
                                       // xprecio="&precio="+xprecio;
                                        xcarga=$("#carga").val();
                                       // xcarga="&carga="+xcarga;
                                        xigv=$("#igv").val();
                                       // xigv="&igv="+xigv;
                                        xestado=$("#venta").val();
                                      //  xestado="&vendido="+estado;
                                       xvehiculo=$("#idvehiculo").val();
                                      // xvehiculo="&idvehiculo="+xvehiculo;
                                        xnorasiento=$("#nroasiento").val();
                                       // xnorasiento="&nroasiento="+xnorasiento;
                                       xmoneda=$("#moneda").val();
                                       //xmoneda="&moneda="+xmoneda;
                                        str = 'idviaje='+xviaje+'&idcliente='+xcliente+'&comprobante='+xcomprob+'&fecha='+xfecha+'&hora='+xhora+
                                           '&precio='+ xprecio+'&carga='+xcarga+'&igv='+xigv+'&vendido='+xestado+
                                           '&idvehiculo='+xvehiculo+'&nroasiento='+xnorasiento+'&moneda='+xmoneda;
                                 //str=$("#frmventa").serialize();
                                            //alert(ck);
                                         
                                                 $.post('index.php','controller=venta&action=save&'+str,function(data){  
                  
                                                  if(data[0]){
                                                      
                                   // $("#div_save").fadeOut(function(){
                                                       alert("ocupado");
                                                    $("#b"+na).removeClass('free');
                                                    //if(ck){
                                                        $("#div_save").empty().append("EL ASIENTO FUE OCUPADO");$("#b"+na).addClass('ocupado');//}
                                                        //
                                                       // else {
                                                    
                                                                $("#div_save").append("<a target='_blank' style='color:#fff' href='index.php?controller=reportes&action=print_venta&idventa="+data[1]+"'>Imprimir boleto</a>");
                                                                $("#b"+na).addClass('ocupado');
                                                                alert('venta insertada correctamente');
                                                        //}
                                                    //}
                                                    $("#b"+na).empty().append(na+'<input type="hidden" name="idventa'+na+'" value="'+data[1]+'" />');
                                                    //$("#div_save").fadeIn();
                                                //});
                                            }
                                            else {
                                                alert("Ha ocurrido un error, por favor intentelo de nuevo"+data[1]);
                                                $("#div_save").fadeOut();
                                                $("button").css("display","inline");
                                            }
                                        },'json');
                                        }                                      
                                    }
                                    else {
                                        alert("Porfavor Grabe completando al pasajero");
                                    }
                                }
                            }
		});
     $('.free').live('click', function() {
         n = $(this).attr("title");       
         bid = $(this).attr("id");
         idve = $("#idvehiculo").val();
         idvi = $("#idviaje").val();
         str = 'idvehiculo='+idve+'&idviaje='+idvi+'&n='+n;         
         $.post('index.php','controller=venta&action=verif_asiento&'+str,function(data){                      
           
           if(data.idventa!="")
               {
                   
                   if(data.estado==1)
                   {
                        $('#'+bid).removeClass('free');
                        $('#'+bid).addClass('ocupado');
                        idv = data.idventa;
                        $('#div_info').dialog({title: ' VENTA DE ASIENTO N° '+n});        
                        $("#div_info").empty().append('<img src="images/loader.gif" style="border:0; margin-right: 5px; display:inline " /> Recuperando informacion ....');                
                        $.post('index.php','controller=venta&action=get_info&idventa='+idv,function(data){  
                            html = '<table border="0" width="100%">';
                            html += '<tr><td width="100px">Pasajero </td><td>: '+data.nombres+'</td></tr>';
                            html += '<tr><td>'+data.tipo_doc+' </td><td>: '+data.nrodoc+'</td></tr>';
                            html += '<tr><td>Hora </td><td>: '+data.hora+'</td></tr>';
                            html += '<tr><td>Comprobante </td><td>: '+data.tipo_doc_v+' '+data.serie+' - '+data.numero+'</td></tr>';
                            html += '<tr><td>TOTAL </td><td>: '+data.total+'</td></tr>';
                            html += '<tr><td align="center" colspan="4"><a target="_blank" href="index.php?controller=venta&action=print_venta&idventa='+idv+'">IMPRIMIR VENTA</a></td></tr>';
                            html += '</table>';
                            $("#div_info").empty().append(html);
                            $('#div_info').dialog('open');
                        },'json');
                   }
                 
               }
            else {show_me(n);}
         },'json');         
     });
    
    $('.ocupado').live('click', function() {
        id = $(this).attr("id");        
        idv = $('#'+id+' :input').val(); 
        n = $(this).text();
        $('#div_info').dialog({title: ' VENTA DE ASIENTO N° '+n});        
        $("#div_info").empty().append('<img src="images/loader.gif" style="border:0; margin-right: 5px; display:inline " /> Recuperando informacion ....');                
        $.post('index.php','controller=venta&action=getinformacion&idventa='+idv,function(data){  
            html = '<table border="0" width="100%">';
            html += '<tr><td width="100px">Pasajero </td><td>: '+data.nombres+'</td></tr>';
            html += '<tr><td>'+data.documento+' </td><td>: '+data.nrodocumento+'</td></tr>';
            html += '<tr><td>Hora </td><td>: '+data.hora+'</td></tr>';
            html += '<tr><td>Comprobante </td><td>: '+data.comprobante+' '+data.serie+' - '+data.numero+'</td></tr>';
            html += '<tr><td>TOTAL </td><td>: '+data.total+'</td></tr>';
            html += '<tr><td align="center" colspan="4"><a target="_blank" href="index.php?controller=reportes&action=print_venta&idventa='+idv+'">IMPRIMIR VENTA</a></td></tr>';
            html += '</table>';
            $("#div_info").empty().append(html);
            $('#div_info').dialog('open');
        },'json');
    });
    

    $("#comprobante").change(function(){
        if($(this).val()!="")
        {
            $("#idtipo_doc").val("2");
            limpiar_pasajero();
            $("#nrodocumento").attr("readonly",false);
            $("#nrodocumento").focus();
            pigv = $("#pigv").val();
            $("#igv").val(pigv);
            recalcular(0);
        }
        else {
           $("#idtipo_doc").val("");
            limpiar_pasajero();
            $("#nrodocumento").attr("readonly",true);
            $("#idtipo_doc").focus(); 
            $("#igv").val(0);
            recalcular(0);
        }
    });    
    $("#carga").change(function(){
        carga=parseFloat($("#carga").val());
      recalcular(carga); 
    });
    $("#idtipo_doc").change(function(){
        if($(this).val()!="")
        {
            $("#nrodocumento").attr("readonly",false);
            $("#nrodocumento").focus();
            limpiar_pasajero();
            
        }
            else {$("#nrodocumento").attr("readonly",true);}
    });
    
    $("#nrodocumento").change(function(){
        nro = $(this).val();
        td = $("#idtipo_doc").val();
        destd = $("#idtipo_doc option:selected").html();        
        $("#text-load").empty().append("Cargando...");
        $("#loading").css("display","inline");
        if(nro!=""){
           
            str = "nrodocumento="+nro+"&idtipo_doc="+td+"&destd="+destd;
            $.post('index.php','controller=cliente&action=buscar&'+str,function(data){ 
                 
              $("#loading").css("display","none");              
              if(data.idcliente!=null){
              $("#idpasajero").val(data.idcliente);
              $("#nombres").val(data.nombres);
              $("#sexo").val(data.sexo);
              $("#grab").css("display","none");
          }
            else {
                if(confirm("Numero de "+destd+" En los registros, Desea Agregar?"))
                    {
                       $("#grab").css("display","inline");
                       $("#nombres,#sexo").val("");
                       $("#nombres,#sexo").attr("readonly",false);
                       $("#nombres").focus();
                    }
                 else {
                     $("#nrodocumento").focus();
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
        bval = bval && $( "#idtipo_doc" ).required();
        bval = bval && $( "#nrodocumento" ).required();
        bval = bval && $( "#nombres" ).required();
        //bval = bval && $( "#apellidos" ).required();
//        bval = bval && $( "#fnacimiento" ).required();
        bval = bval && $( "#sexo" ).required();
        if(bval)
            {
                $("#grab").css("display","none");
                $("#text-load").empty().append("Grabando...");
                $("#loading").css("display","inline");
                str = $("#frmventa").serialize();
                $.post('index.php','controller=cliente&action=save_extend&'+str,function(data){
                    if(data[0]){
                        $("#loading").css("display","none");
                        alert("Se ha registrado correctamente");
                        $("#idpasajero").val(data[1]);
                        
                    }
                        else {
                            $("#grab").css("display","inline");
                            $("#loading").css("display","none");
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
function show_me(n)
{    
    $('#dialog').dialog({title: 'VENTA DE PASAJE - ASIENTO N° '+n});
    $("#nroasiento").val(n);
    $('#dialog').dialog('open');
    limpiar();
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
function recalcular(carga)
{
    st = parseFloat($("#subtotal").val());
   // des = parseFloat($("#descuento").val());
   subtotal=carga+st;
    ig = parseFloat($("#igv").val())/100*subtotal;
    t =  subtotal+ ig;
    $("#total").val(t.toFixed(2));
}

function libera_asiento(idv,n)
{
    $("#libera_asiento,#pay_venta").fadeOut();
    $("#div_save_2").empty().append("Liberando asiento ...");
    $("#div_save_2").fadeIn();
    $.post('index.php','controller=venta&action=liberar_asiento&idventa='+idv,function(data){
        if(data[0])
        {
            $("#div_save_2").empty().append("<a style='color:#fff' href='javascript:'>Asiento Libre!</a>");
            $("#b"+n).removeClass('reservado');
            $("#b"+n).addClass('free');
        }   
        else {alert(data[1]);}
        
    },'json');
}
function cerrar_viaje(idv)
{
    if(confirm("Realmente desea dar por cerrada las ventas para este viaje?"))
        {
             str="idviaje="+idv;
              $.post('index.php','controller=venta&action=cerrar_viaje&'+str,function(data){
                    if(data[0]){
                       alert(data[1]);
                      // window.location("index.php?controller=venta&action=viajes_now");
                    }
                        else {
                           
                            alert(data[1]);
                        }
                },'json')
        }
}