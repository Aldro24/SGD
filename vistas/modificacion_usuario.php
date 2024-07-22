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
if ($_SESSION['Nivel3']==1 )
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
          <center><label style="font-size:40px" id="idtitulo">SEGUIMIENTO DE MODIFICACIÓN DE USUARIOS DEL SISTEMA </center></label> 
            <div class="row">
              <div class="col-md-12">
                  <div class="box" >
                    
                    <div class="box-header with-border" style="padding-left: 20px; padding-top: 20px;">
                          
                          

                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros" style="padding-top: 25px;">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover" style="border-color: black ">
                          <thead style="background-color: #337ab7 !important; color: white;" >
                             <th style="text-align: center;"> Nombre del usuario modificado</th>
                            <th style="text-align: center;">Ultimo usuario que modificó</th>
                            <th style="text-align: center;">Fecha de modificación</th>
                          </thead >
                          <tbody style="text-align: center; font-size:15px">                            
                          </tbody>
                          <tfoot style="background-color: #337ab7 !important; color: white">
                            <th style="text-align: center;"> Nombre del usuario modificado</th>
                            <th style="text-align: center;">Ultimo usuario que modificó</th>
                            <th style="text-align: center;">Fecha de modificación</th>
                          </tfoot  >
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

<script type="text/javascript" src="scripts/modificacion_usuario.js"></script>

<?php
  }
  ob_end_flush();
?>