$(function() {
    $( "#idtipo_comprobante" ).focus();    
    $( "#save" ).click(function(){
        bval = true;        
		 bval = bval && $( "#idtipo_comprobante" ).required();
        bval = bval && $( "#descripcion" ).required();        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});