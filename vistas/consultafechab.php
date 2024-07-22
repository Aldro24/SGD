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

if ($_SESSION['Nivel1']==1 or $_SESSION['Nivel2']==1 or $_SESSION['Nivel3']==1)
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
          <center><label style="font-size:40px" id="idtitulo"> CONSULTA DE DOCUMENTOS POR FECHA </center></label> 
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title"></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros" >
                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label> Fecha Inicio</label>
                        <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" >
                      </div>


                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label> Fecha Fin</label>
                        <input type="date" class="form-control" name="fecha_fin" id="fecha_fin">
                      </div>


                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover"style="border-color: black;">
                          <thead style="background-color: #337ab7 !important; color: white">
                            <th style="text-align: center;">Fecha</th>
                            <th style="text-align: center;">Nombre del documento</th>
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
                            <th style="text-align: center;">Estado</th>
                          </thead>
                          <tbody style="text-align: justify;">                            
                          </tbody >
                          <tfoot style="background-color: #337ab7 !important; color: white">
                            <th style="text-align: center;">Fecha</th>
                            <th style="text-align: center;">Nombre del documento</th>
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
                            <th style="text-align: center;">Estado</th>
                          </tfoot>
                        </table>
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
<script type="text/javascript" src="scripts/consultafechab.js"></script>
<?php
  }
  ob_end_flush();
?>