<?php
//activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';

if ($_SESSION['Nivel3']==1)
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
          <center><label style="font-size:40px" id="idtitulo"> BODEGA</center></label> 
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border"  style="padding-left: 20px; padding-top: 20px;">
                          <h1 class="box-title"><button class="btn btn-primary state-loading" id="btnagregar" onclick="mostrarform(true)" > Agregar una bodega &nbsp;<i class="fa fa-database"></i></button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros" >
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover"style="border-color: black;">
                          <thead style="background-color: #337ab7 !important; color: white">
                            <th style="text-align: center;">Opciones</th>
                            <th style="text-align: center;">Nombre de la bodega</th>
                            <th style="text-align: center;">Direccion</th>
                            <th style="text-align: center;">Ciudad</th>
                            <th style="text-align: center;">Ultimo usuario que activó</th>
                            <th style="text-align: center;">Ultima fecha de activacion</th>
                            <th style="text-align: center;">Ultimo usuario que desactivo</th>
                            <th style="text-align: center;">Ultima fecha de desactivación</th>
                            <th style="text-align: center;">Estado</th>
                          </thead>
                          <tbody style="text-align: justify;">                            
                          </tbody>
                          <tfoot style="background-color: #337ab7 !important; color: white">
                            <th style="text-align: center;">Opciones</th>
                            <th style="text-align: center;">Nombre de la bodega</th>
                            <th style="text-align: center;">Direccion</th>
                            <th style="text-align: center;">Ciudad</th>
                            <th style="text-align: center;">Ultimo usuario que activó</th>
                            <th style="text-align: center;">Ultima fecha de activacion</th>
                            <th style="text-align: center;">Ultimo usuario que desactivo</th>
                            <th style="text-align: center;">Ultima fecha de desactivación</th>
                            <th style="text-align: center;">Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style= "" height= "400px" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <center><label style="font-size:30px">REGISTRA UNA NUEVA BODEGA</label></center>
                          <br>
                          <br>
                         
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre de la bodega(*):</label>
                            <input type="hidden" name="id_bodega" id="id_bodega">
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="50" placeholder="Nombre" required>

                              <BR>
                            <label>Direccion:</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" maxlength="500" placeholder="Ciudad" required><br>

                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Ciudad:</label>
                            <input type="text" class="form-control" name="ciudad" id="ciudad" maxlength="500" placeholder="Ciudad" required><br>
                          <br>
                          <br>
                          </div>
                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                            <input type="text" class="form-control" name="usuario_que_creo_documento" id="usuario_que_creo_documento" value="<?php echo $_SESSION['nombre']?>" maxlength="50"  >
                                              
                          </div>

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" ">
                            <label></label>
                            <input type="date" name="fecha_modificacion" id="fecha_modificacion" class="form-control" maxlength="20" value="<?php echo date("Y-m-d"); ?>" placeholder="Fecha de modificacion" >
                          </div>
                            <br>

                          
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

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
<script type="text/javascript" src="scripts/bodega.js"></script>
<?php
  }
  ob_end_flush();
?>