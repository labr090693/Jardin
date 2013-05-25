$(function() {
    $( "#estado" ).focus();    
    $( "#save" ).click(function(){
        bval = true; 
        bval = bval && $("#nromatricula").required();
        bval = bval && $( "#velocidad" ).required();
        bval = bval && $( "#marca" ).required();
        bval = bval && $( "#estado" ).required();
        
        if (bval) 
        {
            $("#frm").submit();
        }
        return false;
    });   
});