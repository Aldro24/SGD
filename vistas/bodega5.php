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
if ($_SESSION['Nivel2']==1 or $_SESSION['Nivel3']==1 )
{
?>
<!--Contenido-->
<link rel="stylesheet" type="text/css" href="../public/css/datatablescolor.css">
<style>

body:not(.modal-open){ padding-right: 0px !important; }

</style>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" >        
        <!-- Main content -->
        <section class="content" >
          <center><label style="font-size:40px" id="idtitulo"> BODEGA 5  </center></label> 
          <center><label style="font-size:40px" id="idtitulo"> DOCUMENTOS DEL SISTEMA </center></label> 
            <div class="row">
              <div class="col-md-12">
                  <div class="box" >
                    
                    <div class="box-header with-border" style="padding-left: 20px; padding-top: 20px;">
                          <button class="btn btn-primary state-loading" id="btnagregar" onclick="mostrarform(true)"> Agregar un documento &nbsp; <i class="fa fa-book"></i></button>
                          

                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros" style="padding-top: 25px;">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover" style="border-color: black ">
                          <thead style="background-color: #337ab7 !important; color: white" >
                            <th style="text-align: center;" >Opciones</th>
                            <th style="text-align: center;">Nombre de documento</th>
                            <th style="text-align: center;">Fecha de creación</th>
                            <th style="text-align: center;">Asunto del documento</th>
                            <th style="text-align: center;">Cargo del remitente del documento</th>
                            <th style="text-align: center;">Empresa del documento</th>
                            <th style="text-align: center;">Bodega de archivo del documento</th>
                            <th style="text-align: center;">Anaquel del archivo del documento</th>
                            <th style="text-align: center;">Caja del anaquel del documento</th>
                            <th style="text-align: center;">Carpeta del documento</th>
                            <th style="text-align: center;">Lugar dentro de la carpeta</th>
                            <th style="text-align: center;">Ubicación del documento</th>
                            <th style="text-align: center;">Remitente</th>
                            <th style="text-align: center;">Destinatario</th>
                            <th style="text-align: center;">Cargo del destinatario</th>
                             <th style="text-align: center;">Criterios</th>
                              <th style="text-align: center;">Creado por </th>
                            <th style="text-align: center;">Estado</th>



                          </thead>
                          <tbody style="text-align: justify;">                            
                          </tbody>
                          <tfoot style="background-color: #337ab7 !important; color: white">
                           <th style="text-align: center;" >Opciones</th>
                            <th style="text-align: center;">Nombre de documento</th>
                            <th style="text-align: center;">Fecha de creación</th>
                            <th style="text-align: center;">Asunto del documento</th>
                            <th style="text-align: center;">Cargo del remitente del documento</th>
                            <th style="text-align: center;">Empresa del documento</th>
                            <th style="text-align: center;">Bodega de archivo del documento</th>
                            <th style="text-align: center;">Anaquel del archivo del documento</th>
                            <th style="text-align: center;">Caja del anaquel del documento</th>
                            <th style="text-align: center;">Carpeta del documento</th>
                            <th style="text-align: center;">Lugar dentro de la carpeta</th>
                            <th style="text-align: center;">Ubicación del documento</th>
                            <th style="text-align: center;">Remitente</th>
                            <th style="text-align: center;">Destinatario</th>
                            <th style="text-align: center;">Cargo del destinatario</th>
                            <th style="text-align: center;">Criterios</th>
                            <th style="text-align: center;">Creado por </th>
                            <th style="text-align: center;">Estado</th>
                          </tfoot >
                        </table>
                    </div>
                    <div class="panel-body" style="" height="300px" id="formularioregistros" >
                        <form name="formulario" id="formulario" method="POST" >
                          <center><label style="font-size:30px">REGISTRA UN DOCUMENTO EN EL FORMULARIO</label></center>
                          <br>
                            <br>  
                            <br>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                            <label>Nombre de documento(*):</label>
                            <input type="hidden" name="id_documento" id="id_documento" >
                            <input type="text" class="form-control" name="numero_documento" id="numero_documento" maxlength="100" placeholder="Numero de documento" required>
                          </div>

              
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha de creacion (*):</label>
                            <input type="date" name="fecha_creacion" id="fecha_creacion" class="form-control" maxlength="20" placeholder="Fecha de creación" required readonly >
                          </div>


                  <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Asunto del documento(*):</label>
                            
                            <input type="text" class="form-control" name="asunto_documento" id="asunto_documento" placeholder="Asunto del documento">
                          </div>


                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Cargo del remitente del documento:</label>
                            <input type="text" class="form-control" name="cargo_remitente_documento" id="cargo_remitente_documento" maxlength="20" placeholder="Cargo del remitente del documento" required>
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Empresa del documento:</label>
                            <input type="text" class="form-control" name="empresa_documento" id="empresa_documento" maxlength="50" placeholder="Empresa del documento">

                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Anaquel del archivo del documento(*):</label>
                            <input type="text" class="form-control" name="anaquel_archivo_documento" id="anaquel_archivo_documento" maxlength="20" placeholder="Anaquel" required>

                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12"> 

                        <label>Carpeta del documento:</label>
                        <input type="text" class="form-control" name="carpeta_documento" id="carpeta_documento" maxlength="64" placeholder="Carpeta del documento" required> 
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Caja de anaquel del documento(*):</label>
                            <input type="text" class="form-control" name="caja_anaquel_documento" id="caja_anaquel_documento" maxlength="64" placeholder="Caja del anaquel" required>
                           </div>

                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <label>Ubicación del documento:</label>
                            <input type="file" class="form-control" name="direccion_electronica_documento" id="direccion_electronica_documento"  >
                            <input type="hidden" name="direccion_electronica_documento_actual" id="direccion_electronica_documento_actual" >
                           </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Lugar dentro de la Carpeta:</label>
                        <input type="text" class="form-control" name="lugar_dentro_de_la_carpeta" id="lugar_dentro_de_la_carpeta" maxlength="64" placeholder="Lugar dentro de la carpeta" required>
                                                  
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <label>Destinatario:</label>
                        <input type="text" class="form-control" name="destinatario" id="destinatario" maxlength="64" placeholder="Destinatario" required>
                          </div>
                           <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Remitente:</label>
                        <input type="text" class="form-control" name="remitente" id="remitente" maxlength="64" placeholder="Remitente" required>  
                           
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <label>Cargo del destinatario:</label>
                        <input type="text" class="form-control" name="cargo_destinatario" id="cargo_destinatario" maxlength="64" placeholder="Cargo del destinatario" required>

                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                            <label>Bodega del archivo del documento(*):</label>
                            <select id="fk_bodega_archivo_documento" name="fk_bodega_archivo_documento" class="form-control selectpicker" data-live-search="true"  >
                              
                            </select>
                              
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                            <label style=""></label>
                            <input type="text" class="form-control" name="usuario_que_creo_documento" id="usuario_que_creo_documento" value="<?php echo $_SESSION['nombre']?>" maxlength="50" placeholder="usuario" readonly>

                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                            <label></label>
                            <input type="date" name="fecha_modificacion" id="fecha_modificacion" class="form-control" maxlength="20" value="<?php echo date("Y-m-d"); ?>" placeholder="Fecha de modificacion" required  >
                          </div>
                          <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                             <a data-toggle="modal" href="#mymodal">
                          <button class="btn btn-primary btn-lg" id="btncriterios" style="font-size:15px" ><i class="fa fa-plus-circle" form="formulario" ></i> Agregar criterios de búsqueda</button>
                        </a>
                          </div>


                           <!--Modal-->
    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <strong style="font-size:25px">Ingrese los criterios de búsqueda del documento</strong>
            <br>
            <br>
            <p style="font-size:15px">Nota: Debe ingresar por lo menos un criterio de búsqueda</p>
            <div class="modal-body">
                <div class="form-group-row">
                    <div class="col">
                       <label>Criterio 1 (*):</label>
                            <input type="text" class="form-control" name="criterio1" id="criterio1" maxlength="64" placeholder="Criterio 1" required>
                            <br>
                            <label>Criterio 2:</label>
                            <input type="text" class="form-control" name="criterio2" id="criterio2" maxlength="64" placeholder="Criterio 2" >
                            <br>
                            <label>Criterio 3 :</label>
                           <input type="text" class="form-control" name="criterio3" id="criterio3" maxlength="64" placeholder="Criterio 3" >
                           <br>
                           <label>Criterio 4 :</label>
                           <input type="text" class="form-control" name="criterio4" id="criterio4" maxlength="64" placeholder="Criterio 4" >
                           <br>
                            <label>Criterio 5 (*):</label>
                            <input type="text" class="form-control" name="criterio5" id="criterio5" maxlength="64" placeholder="Criterio 5" >
                            <br>
                            <label>Criterio 6 (*):</label>
                            <input type="text" class="form-control" name="criterio6" id="criterio6" maxlength="64" placeholder="Criterio 6" >
                    </div>
                      
                      
                           </div>
                           
                            <div class="modal-body">
               
                            
              <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

                           <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>

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

<script type="text/javascript" src="scripts/bodega5.js"></script>

<?php
  }
  ob_end_flush();
?>