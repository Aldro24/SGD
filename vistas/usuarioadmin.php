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
if ($_SESSION['Nivel3']==1 or $_SESSION['Nivel2']==1)
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
          <center><label style="font-size:40px" id="idtitulo"> USUARIOS DEL SISTEMA </center></label> 
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    
                    <div class="box-header with-border"  style="padding-left: 20px; padding-top: 20px;">
                          <button class="btn btn-primary state-loading" id="btnagregar" onclick="mostrarform(true)" > Agregar un usuario &nbsp; <i class="fa fa-user-plus" ></i></button>

                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros" style="padding-top: 25px;" >
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover" style="border-color: black;">
                          <thead style="background-color: #337ab7 !important; color: white">
                            <th style="text-align: center;" >Opciones</th>
                            <th style="text-align: center;">Nombre</th>
                            <th style="text-align: center;">Documento</th>
                            <th style="text-align: center;">N° de documento</th>
                            <th style="text-align: center;">Teléfono</th>
                            <th style="text-align: center;">Email</th>
                            <th style="text-align: center;">Usuario</th>
                            <th style="text-align: center;">Cargo</th>
                            <th style="text-align: center;">Foto</th>
                            <th style="text-align: center;">Bodega</th>
                            <th style="text-align: center;">Creado por </th>
                            <th style="text-align: center;">Fecha de creación</th>
                            <th style="text-align: center;">Estado</th>
                            <th style="text-align: center;">Ultimo usuario que modificó</th>
                            <th style="text-align: center;">Fecha de ultima modificación</th>
                            <th style="text-align: center;">Usuario que activó</th>
                            <th style="text-align: center;">fecha de activación</th>
                            <th style="text-align: center;">Ultimo usuario que desactivó</th>
                            <th style="text-align: center;">Fecha desactivación</th>
                            


                          </thead>
                          <tbody style="text-align: justify;">                            
                          </tbody>
                          <tfoot style="background-color: #337ab7 !important; color: white">
                            <th style="text-align: center;">Opciones</th>
                            <th style="text-align: center;">Nombre</th>
                            <th style="text-align: center;">Documento</th>
                            <th style="text-align: center;">N° de documento</th>
                            <th style="text-align: center;">Teléfono</th>
                            <th style="text-align: center;">Email</th>
                            <th style="text-align: center;">Usuario</th>
                            <th style="text-align: center;">Cargo</th>
                            <th style="text-align: center;">Foto</th>
                            <th style="text-align: center;">Bodega</th>
                            <th style="text-align: center;">Creado por </th>
                            <th style="text-align: center;">Fecha de creación</th>
                            <th style="text-align: center;">Estado</th>
                            <th style="text-align: center;">Ultimo usuario que modificó</th>
                            <th style="text-align: center;">Fecha de ultima modificación</th>
                            <th style="text-align: center;">Usuario que activó</th>
                            <th style="text-align: center;">fecha de activación</th>
                            <th style="text-align: center;">Ultimo usuario que desactivó</th>
                            <th style="text-align: center;">Fecha desactivación</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="" height="400px" id="formularioregistros" >
                        <form name="formulario" id="formulario" method="POST" >
                          <center><label style="font-size:30px">REGISTRA UN USUARIO EN EL FORMULARIO</label></center>
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12" >
                            <label>Nombres y apellidos(*):</label>
                            <input type="hidden" name="idusuario" id="idusuario" >
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>

                      
                          </div>
                          <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <label>Fecha de creacion (*):</label>
                            <input type="date" name="fecha_creacion" id="fecha_creacion" class="form-control" maxlength="20" placeholder="Fecha de creación" required readonly  >
                          </div>

                          <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <label>Tipo Documento(*):</label>
                          
                            <select class="form-control select-picker" name="tipo_documento" id="tipo_documento" required> 
                              <option value="cédula">CÉDULA</option>
                              <option value="RUC">RUC</option>
                              <option value="pasaporte">PASAPORTE</option></select>
                          </div>

              
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>N° de documento(*):</label>
                            <input type="text" name="num_documento" id="num_documento" class="form-control" maxlength="20" placeholder="Documento" required>
                      
                           
                          </div>



                  <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Dirección(*):</label>
                            
                            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección">
                          </div>


                          <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <label>Teléfono:</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" maxlength="20" placeholder="Teléfono" required>
                          </div>
                          <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <label>Cargo:</label>
                            <input type="text" class="form-control" name="cargo" id="cargo" maxlength="20" placeholder="Cargo">

                            
                          </div>

                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Email:</label>
                            <input type="email" class="form-control" name="email" id="email" maxlength="50" placeholder="Email">

                          </div>

                          
                          <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12"> 
                          <label>Bodega (*):</label>
                            <select id="fk_bodega_usuario" name="fk_bodega_usuario" class="form-control selectpicker" data-live-search="true" ></select>
                          </div>

                          <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <label>Usuario(*):</label>
                            <input type="text" class="form-control" name="login" id="login" maxlength="20" placeholder="Login" required>

                          </div>

                          <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                            <label>Clave(*):</label>
                            <input type="password" class="form-control" name="clave" id="clave" maxlength="64" placeholder="Clave" required> 

                          </div>

                          
                          <div class="form-group col-lg-1 col-md-1 col-sm-1 col-xs-12" >
                            <label style=""></label>
                            <input type="text" class="form-control" name="usuario_que_creo_documento" id="usuario_que_creo_documento" value="<?php echo $_SESSION['nombre']?>" maxlength="50" placeholder="usuario" readonly>

                          </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Imagen:</label>
                            <input type="file" class="form-control" name="imagen" id="imagen" >

                            <input type="hidden" name="imagenactual" id="imagenactual">

                            <img src="" width="150px" height="120px" id="imagenmuestra">


                          </div>

                          <div class="form-group col-lg-1 col-md-1 col-sm-1 col-xs-12" >
                            <label></label>
                            <input type="date" name="fecha_modificacion" id="fecha_modificacion" class="form-control" maxlength="20" value="<?php echo date("Y-m-d"); ?>" placeholder="Fecha de modificacion" required  >
                            <br>
                           
                          </div>
                          
                           <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>Permisos:&nbsp;&nbsp;&nbsp;&nbsp;Solo marque una casilla </label>
                        <ul id="permisos" style="list-style: none">
                          
                        </ul>
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

<script type="text/javascript" src="scripts/usuarioadmin.js"></script>
<?php
  }
  ob_end_flush();
?>