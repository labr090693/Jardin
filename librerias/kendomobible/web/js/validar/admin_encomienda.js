/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(function() {
  $('.delete').live('click', function() {
      i = $(this).parent().parent().index();
      cod = $('tbody tr:eq('+i+') td:eq(0)').text();
      str="idencomienda="+cod;
      $.post('index.php','controller=encomienda&action=entregar&'+str,function(data){
                    if(data[0]){
                       alert(data[1]);
                    }
                        else {
                           
                            alert("Ha ocurrido un error, intentelo de nuevo"+data[1]);
                        }
                },'json')
         
  });
}
);