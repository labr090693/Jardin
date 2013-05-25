/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(function() {
    

    $("#add").click(function(){
        bval = true;        
        bval = bval && $( "#remitente" ).required();        
        bval = bval && $( "#encomienda" ).required();   
        bval = bval && $( "#cantidad" ).required();
        bval = bval && $( "#um" ).required();
        bval = bval && $( "#precio" ).required();
        bval = bval && $("#peso").val();
        if(bval)
            {                
                ide = $("#idencomienda").val();  
                encomienda=$("#encomienda").val();
                idDest=$("#dest").val();
                dest=$("#dest").val();
                cant=$("#cantidad").val();
                um=$("#um").val();
                precio=$("#precio").val();
                peso=parseFloat($("#peso").val());
                importe=parseFloat(cant)*parseFloat(precio);
                band = true;
                msg = "";
                total=$("#total").val();
                /*t=parseFloat($("#total").val());
                p=parseFloat($("#totalkg").val());*/
                pesokg=$("#totalkg").val();
               /* alert(total);
                alert(pesokg);*/
                if(total==null){total=0;
                    alert(total);
                }if(pesokg==null){pesokg=0;alert(pesokg);}
                t=total+importe;
                p=pesokg+peso;
          
                $("tbody tr").each(function(i,j){
                    id_e = $("tbody tr td:eq(0) :input").val();
                    
                    if(id_e==ide){band = false;msg = "Esta encomienda ya fue agregada";}
                    
                });
                if(!band){alert(msg);}
                else 
                {
                    html = '<tr>';
                    html += '<td><input type="hidden" name="idencomienda[]" value="'+ide+'" />'+encomienda+'</td>';
                    html += '<td><input type="hidden" name="idestinatario[]" value="'+idDest+'" />'+dest+'</td>';
                    html += '<td><input type="hidden" name="cantidad[]" value="'+cant+'" />'+cant+'</td>';
                    html += '<td><input type="hidden" name="peso[]" value="'+peso+'" />'+peso+'</td>';
                    html += '<td><input type="hidden" name="um[]" value="'+um+'" />'+um+'</td>';
                    html += '<td><input type="hidden" name="precio[]" value="'+precio+'" />'+precio+'</td>';
                    html += '<td><input type="hidden" name="importe[]" value="'+importe+'" />'+importe+'</td>';
                    html += '<td width="20px"><a class="delete" title="Eliminar item" href="javascript:"><img src="images/delete.png"/></a></td>';
                    html += '</tr>';  
                    $("#total").val(t);
                    $("#totalkg").val(p);
                    $("#detalle tbody").append(html);
                    $("#encomienda").val("");                    
                    $("#idencomienda").val("");
                    $("#cantidad").val("");
                    $("#um").val("");
                    $("#precio").val("");
                    $("#peso").val("");
                }
            }
    });
    
    $('.delete').live('click', function() {
        i = $(this).parent().parent().index();
        $('tbody tr:eq('+i+')').remove();
        
     });
 
    
  /*  $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#fecha" ).required();
        bval = bval && $( "#vehiculo" ).required();
        bval = bval && $( "#idcronograma" ).required();
        c = cd();        
        if(c==0 && bval){alert("Complete las asiganciones de pilotos.");bval=false;}
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    }); */ 
    $("#buscarE").click(function(){
    bval = true;        
        bval = bval && $( "#remitente").required();
        if(bval)
            {
                
            cod=$("#codrem").val();
            
    window.open('index.php?controller=encomienda&action=search&idrem='+$("#codrem").val(),"littleWindow","location=no,width="+800+",height="+600+",top=80,left=300,scrollbars=yes");
            }
});
$("#buscarR").click(function(){
    //alert('hola');
    //window.open('index.php?controller=encomienda&action=search', 100,100);
    window.open('index.php?controller=cliente&action=search',"littleWindow","location=no,width="+800+",height="+600+",top=80,left=300,scrollbars=yes");
});


});

