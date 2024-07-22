<?php
//activamos el almacenamiento en el buffer
ob_start();
session_start();

if(!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';
if ($_SESSION['Nivel2']==1 or $_SESSION['Nivel3']==1)
{
?>
<!--Contenido-->
<style>

body:not(.modal-open){ padding-right: 0px !important; }

</style>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
          <center><label style="font-size:40px" id="idtitulo"> BITÁCORA DE BODEGA 3 </center></label> 
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    
                    <div class="box-header with-border"  style="padding-left: 20px; padding-top: 20px;">
                          <button class="btn btn-primary state-loading" id="btnagregar" onclick="mostrarform(true)" > Crear bitácora &nbsp;<i class="fa fa-sticky-note"></i></button>

                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover" style="border-color: black;">
                          <thead style="background-color: #337ab7 !important; color: white">
                            <th style="text-align: center;">Opciones</th>
                            <th style="text-align: center;">Nombre</th>
                            <th style="text-align: center;">Documento</th>
                            <th style="text-align: center;">Número de identificación</th>
                            <th style="text-align: center;">Teléfono</th>
                            <th style="text-align: center;">Fecha de préstamo</th>
                            <th style="text-align: center;">Fecha de entrega</th>
                            <th style="text-align: center;">Observaciones</th>
                            <th style="text-align: center;">Creado por </th>
                            <th style="text-align: center;">Ultima vez modificado por</th>
                            <th style="text-align: center;">Fecha de ultima modificación</th>
                            <th style="text-align: center;">Estado</th>


                          </thead>
                          <tbody style="text-align: justify;">                            
                          </tbody>
                          <tfoot style="background-color: #337ab7 !important; color: white">
                           <th style="text-align: center;" >Opciones</th>
                           <th style="text-align: center;">Nombre</th>
                            <th style="text-align: center;">Documento</th>
                            <th style="text-align: center;">Número de identificación</th>
                            <th style="text-align: center;">Teléfono</th>
                            <th style="text-align: center;">Fecha de préstamo</th>
                            <th style="text-align: center;">Fecha de entrega</th>
                            <th style="text-align: center;">Observaciones</th>
                            <th style="text-align: center;">Creado por </th>
                            <th style="text-align: center;">Ultima vez modificado por</th>
                            <th style="text-align: center;">Fecha de ultima modificación</th>
                            <th style="text-align: center;">Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="" height="400px" id="formularioregistros" >
                        <form name="formulario" id="formulario" method="POST" >
                          <center><label style="font-size:30px">REGISTRA UNA BITÁCORA EN EL FORMULARIO</label></center>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                            <input  type="hidden" name="id_documento" id="id_documento" >
                          </div>

                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre(*):</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" maxlength="30" placeholder="Nombre" required>
                            <br>
                            <label>Teléfono:</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" maxlength="15" placeholder="Teléfono">
                            <br>
                              <label>N° de identificacion(*):</label>
                            <input type="text" name="num_identificacion" id="num_identificacion" class="form-control" maxlength="20" placeholder="Numero de identificación" required>
                            <br>
                            <label>Fecha de entrega:</label>
                            <input type="date" class="form-control" name="fecha_entrega" id="fecha_entrega"  required >
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Tipo de Documento(*):</label>
                          
                            <select class="form-control select-picker" name="ci_ruc_pas" id="ci_ruc_pas" required> 
                              <option value="CÉDULA">CÉDULA</option>
                              <option value="RUC">RUC</option>
                              <option value="PASAPORTE">PASAPORTE</option></select>
                            <br>  
                            <br>
                              <label>Fecha de préstamo:</label>
                            <input type="date" class="form-control" name="fecha_prestamo" id="fecha_prestamo" readonly required  >
                          
                            <br>
                            <label>Observaciones:</label>
                            <input type="text" class="form-control" name="observaciones" id="observaciones" maxlength="100" placeholder="Observaciones">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                            <label style=""></label>
                            <input type="text" class="form-control" name="usuario_que_creo_documento" id="usuario_que_creo_documento" value="<?php echo $_SESSION['nombre']?>" maxlength="50" placeholder="usuario" readonly>

                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                            <label></label>
                            <input type="date" name="fecha_modificacion" id="fecha_modificacion" class="form-control" maxlength="20" value="<?php echo date("Y-m-d"); ?>" placeholder="Fecha de modificacion" required  >
                          </div>

              
                        

              
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
}

else
{
  require 'noacceso.php';
}
require 'footer.php';
?>

<script type="text/javascript" src="scripts/bitacoraadminb3.js"></script>
<?php
  }
  ob_end_flush();
?>