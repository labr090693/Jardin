<?php 
       require("../../cabecera.php");
       require("../../conexion.php");			
?>
<style>
 
    .posicion {
        padding-left: 50px;
        float:left;
    }    
</style>
<div class="posicion">
     <div class="tabbable">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">Matr&iacute;cula</a></li>
            <li><a href="#tab2" data-toggle="tab">Alumno</a></li>
            <li><a href="#tab3" data-toggle="tab">Familiares</a></li>
        </ul>
        <div class="tab-content">
           <div class="tab-pane active" id="tab1">
               <form>
                   <table>
                       <tr>
                           <td>Nombres</td>
                           <td><input type="text" size="20"><n>  </n><input type="button" value="Buscar"></td>
                       </tr>
                       <tr>
                           <td>Apellidos</td>
                           <td><input type="text" size="20"></td>
                       </tr>
                       <tr>
                           <td>Edad</td>
                           <td><input type="text" size="20"></td>
                       </tr>
                   </table>
               </form>
           </div>
           <div class="tab-pane" id="tab2">
                <p>Mision</p>
           </div>
           <div class="tab-pane" id="tab3">
                 <p>Vision</p>
           </div>
         </div>
      </div>
</div>

<?php  mysql_close(); 
  require("../../pie.php");
?>