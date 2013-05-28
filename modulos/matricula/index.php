<?php 
       require("../../cabecera.php");
       require("../../conexion.php");			
?>
<style>
 
    .posicion {
        padding-left: 10px;
        padding-top: 10px;
    }   

    .tabbable {
        width: 1200px;
        height: 500px;
    }
    
    .tabla2 {
        float: right;
        padding-right: 30px;
    }
</style>

<div class="posicion">
     <div class="tabbable">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">Matr&iacute;cula</a></li>
            <li><a href="#tab2" data-toggle="tab">Alumno</a></li>
            <li><a href="#tab3" data-toggle="tab">Desarrollo</a></li>
            <li><a href="#tab4" data-toggle="tab">Control Salud</a></li>
            <li><a href="#tab5" data-toggle="tab">Estado Salud</a></li>
            <li><a href="#tab6" data-toggle="tab">Domicilio</a></li>
            <li><a href="#tab7" data-toggle="tab">Datos Familiares</a></li>
            <li><a href="#tab8" data-toggle="tab">Situacion laboral</a></li>
            <li><a href="#tab9" data-toggle="tab">Escolaridad Alumno</a></li>
            <li><a href="#tab10" data-toggle="tab">Translados</a></li>
            <li><a href="#tab11" data-toggle="tab">Responsable Matricula</a></li>
            <li><a href="#tab12" data-toggle="tab">Apoderado</a></li>
            <li><a href="#tab13" data-toggle="tab">Supervivencia</a></li>
        </ul>
        <div class="tab-content">
           <div class="tab-pane active" id="tab1">
               
           </div>
            
           <div class="tab-pane" id="tab2">
               <?php require "requerimientos/alumno.php"; ?> 
           </div>
            
            
            
            
           <div class="tab-pane" id="tab3">
               <?php require "requerimientos/desarrollo.php"; ?> 
           </div>
            
            
            
            
           <div class="tab-pane" id="tab4">
              
           </div>
            
            
            
            
           <div class="tab-pane" id="tab5">
               
           </div>
           
            
            
            
           <div class="tab-pane" id="tab6">
               
           </div>
           
            
            
            
           <div class="tab-pane" id="tab7">
               <?php require "requerimientos/datos_familiares.php"; ?> 
           </div> 
            
            
            
            
           <div class="tab-pane" id="tab8">
               
           </div>
            
            
            
            
           <div class="tab-pane" id="tab9">
               
           </div>
            
            
            
            
           <div class="tab-pane" id="tab10">
               
           </div>
            
            
            
            
           <div class="tab-pane" id="tab11">
               
           </div>
            
            
            
            
           <div class="tab-pane" id="tab12">
               <?php require "requerimientos/apoderado.php"; ?> 
           </div>
            
            
            
            
           <div class="tab-pane" id="tab13">
               
           </div>
         </div>
      </div>
</div>

<?php  mysql_close(); 
  require("../../pie.php");
?>