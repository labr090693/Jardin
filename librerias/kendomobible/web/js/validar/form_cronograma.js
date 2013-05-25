$(function() {
    $( "#precio" ).focus();   
	$("#fechainicio").datepicker({'dateFormat':'dd/mm/yy','changeMonth':true,'changeYear':true});
	$("#fechatermino").datepicker({'dateFormat':'dd/mm/yy','changeMonth':true,'changeYear':true});
    $( "#save" ).click(function(){
        bval = true;        
        bval = bval && $( "#precio" ).required();
		bval = bval && $( "#conductor" ).required();
		bval = bval && $( "#vehiculo" ).required();
        bval = bval && $( "#uorigen" ).required();        
        bval = bval && $( "#udestino" ).required();        
        bval = bval && $( "#fechainicio" ).required();        
        bval = bval && $( "#fechatermino" ).required();     
		bval = bval && $( "#observaciones" ).required();
        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });   
});