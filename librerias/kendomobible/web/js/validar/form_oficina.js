$(function() {
    $( "#descripcion" ).focus();    
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#descripcion" ).required();
        bval = bval && $( "#direccion" ).required(); 
		bval = bval && $( "#idsucursal" ).required();
        bval = bval && $( "#telefono" ).required(); 
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});