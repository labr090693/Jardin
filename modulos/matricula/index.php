<?php 
       require("../../cabecera.php");
       require("../../conexion.php");			
?>
<style>
 
    .posicion {
        padding-left: 20px;
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
            <li><a href="#tab7" data-toggle="tab">Datos padres</a></li>
            <li><a href="#tab8" data-toggle="tab">Situac. laboral</a></li>
            <li><a href="#tab9" data-toggle="tab">Escolaridad Alum.</a></li>
            <li><a href="#tab10" data-toggle="tab">Translados</a></li>
            <li><a href="#tab11" data-toggle="tab">Respon. Matricula</a></li>
            <li><a href="#tab12" data-toggle="tab">Apoderado</a></li>
            <li><a href="#tab13" data-toggle="tab">Supervivencia</a></li>
        </ul>
        <div class="tab-content">
           <div class="tab-pane active" id="tab1">
               
           </div>
            
           <div class="tab-pane" id="tab2">
               <form class="tabla2">
                   <table>
                        <tr>
                           <td>Lengua Materna</td>
                           <td><input name="lenguamaterna" type="text" >
                        </tr>
                        <tr>
                           <td>Lengua Actual</td>
                           <td><input name="lenguaaactual" type="text" >
                        </tr>
                        <tr>
                            <td>N&uacute;mero Hermanos</td>
                            <td><input class="input-mini" name="numerohermanos" type="text" >
                        </tr>
                        <tr>
                            <td>Lugar que ocupa</td>
                            <td><input class="input-medium" name="lugarocupa" type="text" >
                        </tr>
                        <tr>
                            <td>Religi&oacute;n</td>
                            <td><input name="religion" type="text" >
                        </tr>
                        <tr>
                            <td>Necesidades especiales</td>
                            <td>
                                <label class="checkbox inline">
                                DI<input name="di" type="checkbox">
                                </label>
                                <label class="checkbox inline">
                                DA<input name="da" type="checkbox">
                                </label>
                                <label class="checkbox inline">
                                DV<input name="dv" type="checkbox">
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>N. Documento</td>
                            <td><input name="numerodocumento" type="text" >
                        </tr>
                   </table>
               </form>
               
               
               
               
               <form class="tabla2">
                    <table>
                        <tr>
                           <td>Fecha de nacimiento</td>
                           <td><input class="input-mini" name="dia" type="text" size="2" placeholder="dia">/<input class="input-mini" name="mes" type="text" size="2" placeholder="mes">/<input class="input-mini" name="anio" type="text" size="2" placeholder="anio"></td>
                        </tr>
                        <tr>
                            <td>Pa&iacute;s</td>
                            <td><select>
                                    <option value="">Seleccionar...</option>
                               </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Departamento</td>
                            <td><select>
                                    <option value="">Seleccionar...</option>
                               </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Provincia</td>
                            <td><select>
                                    <option value="">Seleccionar...</option>
                               </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Distrito</td>
                            <td><select>
                                    <option value="">Seleccionar...</option>
                               </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Documento Ident.</td>
                            <td>
                                <label class="checkbox inline">
                                DNI<input name="dni" type="checkbox">
                                </label>
                                <label class="checkbox inline">
                                LE<input name="le" type="checkbox">
                                </label>
                                <label class="checkbox inline">
                                CE<input name="ce" type="checkbox">
                                </label>
                            </td>
                        </tr>
                    </table> 
               </form>
               
               <form class="tabla1">
                   <table>
                       <tr>
                           <td>Apellido Paterno</td>
                           <td><input name="apellidop" type="text" size="30" placeholder="Escriba su apellido paterno"></td>
                       </tr>
                       <tr>
                           <td>Apellido Materno</td>
                           <td><input name="apellidom" type="text" size="30" width="10px;" placeholder="Escriba su apellido materno"></td>
                       </tr>
                       <tr>
                           <td>Nombres</td>
                           <td><input name="nombres" type="text" size="30" placeholder="Escriba sus nombres"></td>
                       </tr>
                       <tr>
                           <td>Sexo</td>
                           <td>
                               <select>
                               <option value="">Seleccionar...</option>
                               <option value="M">Masculino</option>
                               <option value="F">Femenino</option>
                               </select>
                           </td>
                       </tr>
                       <tr>
                           <td>Estado Civil</td>
                           <td>
                               <select>
                               <option value="">Seleccionar...</option>
                               <option value="1">Soltero</option>
                               <option value="2">casado</option>
                               <option value="3">Divorsiado</option>
                               </select>
                           </td>
                       </tr>
                   </table>
              </form> 
              
           </div>
            
            
            
            
           <div class="tab-pane" id="tab3">
               <form style="float: right; padding-right: 80px">
                   <table><br><br>
                       <tr>
                           <td>LENGUAJE :</td>
                       </tr>
                       <tr>
                           <td>Sus primeras palabras</td>
                           <td><input class="input-mini" name="palabras" type="text"></td>  
                       </tr>
                       <tr>
                           <td>Hablo con fluidez</td>
                           <td><input class="input-mini" name="fluidez" type="text"></td>  
                       </tr>
                   </table>
               </form>
               
               <form style="float: right; padding-right: 40px">
                   <span style="padding-left: 180px;">OBLIGATORIO PARA NIVEL INICIAL</span>
                   <br><br>
                   <table>
                       <tr>
                           <td>PSICOMOTR&Iacute;Z :</td>
                       </tr>
                       <tr>
                           <td>Levant&oacute; la cabeza</td>
                           <td><input class="input-mini" name="cabeza" type="text"></td>  
                       </tr>
                       <tr>
                           <td>Se sent&oacute;</td>
                           <td><input class="input-mini" name="sento" type="text"></td>  
                       </tr>
                       <tr>
                           <td>Se par&oacute;</td>
                           <td><input class="input-mini" name="paro" type="text"></td>  
                       </tr>
                       <tr>
                           <td>Camn&oacute;</td>
                           <td><input class="input-mini" name="camino" type="text"></td>  
                       </tr>
                       <tr>
                           <td>Control&oacute; sus esfinteres</td>
                           <td><input class="input-mini" name="esfinteres" type="text"></td>  
                       </tr>
                   </table>
               </form>
               <form style="padding-left: 40px;">
                   <table>
                       <tr>
                            <td>Nacimiento</td>
                            <td>
                                <label class="checkbox inline">
                                Normal<input name="normal" type="checkbox">
                                </label>
                                <label class="checkbox inline">
                                Con Complicaciones<input name="complicaciones" type="checkbox">
                                </label>
                            </td>
                        </tr>
                        <br>
                        <tr>
                            <td>Observaciones</td>
                            <td><textarea rows="4" name="observaciones"></textarea></td>
                        </tr>
                    </table> 
               </form>
           </div>
            
            
            
            
           <div class="tab-pane" id="tab4">
               
           </div>
            
            
            
            
           <div class="tab-pane" id="tab5">
               
           </div>
           
            
            
            
           <div class="tab-pane" id="tab6">
               
           </div>
           
            
            
            
           <div class="tab-pane" id="tab7">
               
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
               
           </div>
            
            
            
            
           <div class="tab-pane" id="tab13">
               
           </div>
         </div>
      </div>
</div>

<?php  mysql_close(); 
  require("../../pie.php");
?>