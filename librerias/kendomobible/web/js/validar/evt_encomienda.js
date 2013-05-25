/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* $("#save_e").click(function(){
      bval = true;
       alert(bval);
       bval = bval && $( "#tipo_doc_r" ).required();
      bval = bval && $( "#tipo_doc_d" ).required();
      bval = bval && $( "#tipo_encomienda" ).required();
      bval = bval && $( "#decrip_e" ).required();
      bval = bval && $( "#origen" ).required();
      bval = bval && $( "#destino" ).required();
     
      if(bval)
          {
              
          }
          else
              {
                  alert("llene los espacios en blanco")
              }
      
      
 });*/


$(function() {
    //$( "#cod" ).focus();    
    //$("#fnacimiento").datepicker({'dateFormat':'dd/mm/yy','changeMonth':true,'changeYear':true});
    $( "#save_e" ).click(function(){
        bval = true; 
      bval = bval && $( "nrodocumento_r" ).required();
      bval = bval && $( "#nrodocumento_d" ).required();
      bval = bval && $( "#id_tipo_enco" ).required();
      bval = bval && $( "#descrip_e" ).required();
      bval = bval && $( "#origen" ).required();
      bval = bval && $( "#destino" ).required();
        
        if (bval) 
        {
         $("#frm").submit();
                /*alert('..grabando encomienda');
                
                codR=$("#idremitente").val();
                codD=$("#iddestinatario").val();
                code=$("#cod").val();
                tipoe=$("#id_tipo_enco").val();
                descrip=$("#descrip_e").val();
                origen=$("#origen").val();
                destino=$("#destino").val();
              //  alert(num);
                str = "cod="+codR+"&tipo_encomienda="+tipoe+"&descrip_e="+descrip+"&origen="+origen+"&destino="+destino;
                $.post('index.php','controller=encomienda&action=save&'+str,function(data){
                    if(data[0]){
                        //$("#loading2").css("display","none");
                        alert("Se ha registrado correctamente el detinatario");
                        //$("#destinatario").val(data[1]);
                        
                    }
                        else {
                            //$("#grab2").css("display","inline");
                            //$("#loading2").css("display","none");
                            alert("Ha ocurrido un error, intentelo de nuevo");
                        }
                },'json')  */
        }
        
        return false;
    });   
});
