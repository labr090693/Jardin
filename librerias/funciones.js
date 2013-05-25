$(document).ready(function(){
	
		  $("#nuevo").click(function(){		  
				   window.location="index.php";		 
		 });		
	});
	
	
function ver(id)
{
   window.location="?id="+id+"&solover=1";	
}

function editar(id)
{
  window.location="?id="+id;
}

function eliminar(id)
{
      if(confirm("Esta seguro que desea eliminar?"))
		{
		    window.location="eliminar.php?id="+id;	
		}	
} 


function cargardatos(pagina, capa, parametros)
{
   $.ajax({
			type :"post",
			url : pagina,
			data : parametros,
			beforeSend :function()
			  {
				  $("#"+capa).html("Cargando...");
			  },
			success:function(respuesta)
			   {
			      $("#"+capa).html(respuesta);
			   }
		 });
	
}
// crear ajax de  combo....




