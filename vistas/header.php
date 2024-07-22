<?php
if(strlen(session_id())< 1)
session_start();
?>

<!DOCTYPE html>
<html>
<style>

body:not(.modal-open){ padding-right: 0px !important; }

</style>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de gestion de documentos </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../public/images/logosd1.png">
    <link rel="shortcut icon" href="../public/images/logosd1.png">

<!--DATATABLES -->
<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../public/datatables/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">
<link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet" >
<link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../public/datatables/datatables-searchpanes/css/searchPanes.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="../public/datatables/datatables-searchpanes/css/searchPanes.bootstrap4.css">
<link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="../public/datatables/datatables-select/css/select.bootstrap4.min.css">
<link src="../public/plugins/datatables-fixedheader/css/dataTables.fixedHeader.min.css"></link>
<link src="../public/plugins/datatables-fixedcolumns/css/datatables.fixedcolumns.min.css"></link>



<style>div.dt-buttons
{
padding-left: 0px;
padding-bottom: 30px;
padding-top: 30px;
width: 100%;

}
.panel-body
{
 padding-left: 10px;
    padding-right: 0px;
    background-image: radial-gradient(circle at 62.28% 119.64%, #ffe0e3 0, #ffe1de 3.85%, #ffe2da 7.69%, #ffe3d5 11.54%, #ffe4d1 15.38%, #ffe5ce 19.23%, #ffe7cc 23.08%, #ffe8ca 26.92%, #ffeac8 30.77%, #fdecc8 34.62%, #f7edc8 38.46%, #f2efc9 42.31%, #ecf1cb 46.15%, #e6f2cd 50%, #e0f3d0 53.85%, #daf5d4 57.69%, #d5f6d8 61.54%, #cff7dc 65.38%, #cbf7e1 69.23%, #c6f8e6 73.08%, #c2f8eb 76.92%, #bff8f1 80.77%, #bdf8f6 84.62%, #bcf8fb 88.46%, #bcf7ff 92.31%, #bdf7ff 96.15%, #bff6ff 100%);
    
}



</style>
<style>.btn-group>.btn:not(:first-child):not(:last-child):not(.dropdown-toggle),.btn-group>.btn:first-child:not(:last-child):not(.dropdown-toggle),.btn-group>.btn:last-child:not(:first-child)
{
margin-right: 10px;
background: grey;
    color:white;
    box-shadow:none;
    border-radius: 10px;


}</style>
<style >.dataTables_filter 
{

position: absolute;
 top:-20px;
 left:900px;
 width: 300px;



}</style>
<style >
  .botoncs {
  left: -10px;
  background-image: radial-gradient(circle at 68.08% 50%, #fdffd4 0, #edffd8 8.33%, #dcffdb 16.67%, #cbffdc 25%, #baffdc 33.33%, #abffda 41.67%, #9df2d5 50%, #92e3cf 58.33%, #89d5c9 66.67%, #83c9c4 75%, #7ec0bf 83.33%, #7cb7bb 91.67%, #7ab1b8 100%)
  width: 279px;
  font-size: 20px;
  font-weight: 500;
  padding: 0.5em 1.2em;
  position: relative;

  
  outline: 0px solid;
  outline-color: rgba(20, 138, 172, 0.4);
-webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
        line-height: 2.428571;
}

.dropdown-menu>li>a {
    background-color: darkslategrey;
      color: white;
      width: 277px;
}

.btn{
  border-radius: 9px;
}
</style>

  </head>
  <body class="hold-transition skin-black sidebar-mini ">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="Inicio.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b><img src="../public/images/logosd1.png" style="width:50px;height:50px;"></b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img src="../public/images/logosd1.png" style="width:70px;height:70px; display: inherit; position: relative; bottom: 12px;"><b style="font-family: Times New Roman; font-size: 25px; position:relative;bottom: 70px; ">SGD </label></b></span>

        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu" >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"  style="border-bottom-left-radius: 20px; border-top-left-radius: 20px;"  >
                  <img src="../files/usuarios/<?php echo $_SESSION['imagen'];?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['login']; ?> &nbsp;&nbsp;<i class="fa fa-sort-desc" ></i></span>

                </a>
                <ul class="dropdown-menu" style="background-color:darkslategray; position: absolute; right: 50px; border-radius: 10px !important;">
                  <!-- User image -->
                  <li class="user-header" style="background-color:darkslategray;  ">
                    <img src="../files/usuarios/<?php echo $_SESSION['imagen'];?>" class="img-circle" alt="User Image">
                    <p>
                      
                      <small></small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  
                  <li class="user-footer" style="background-color: darkslategray;color: white">
                   <label><p >&nbsp;&nbsp;&nbsp;</p></label> <label style="font-size:18px; text-align: left;"><?php echo  $_SESSION['nombre']; ?></label>
                   <a href="../ajax/usuario.php?op=salir" class="botoncs " style="font-size:17px"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Cerrar Sesión</a>
                    <div class="pull-right">
                      
                      
                      

                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        
        <!-- sidebar: style can be found in sidebar.less -->


<section class="sidebar">       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <strong><li class="header" style="color: white; font-size: 17px; text-align:left;"> Panel de navegación</li></strong>

            <?php
            if ($_SESSION['Nivel3']==1 && $_SESSION['login']=='admin')
            {
              echo ' <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Gestión de documentos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                <li><a href="documento_activoc.php"><i class="fa fa-circle-o"></i> Documentos Generales</a></li>
                <li><a href="bodega1.php"><i class="fa fa-circle-o"></i> Documentos Bodega 1</a></li>
                <li><a href="bodega2.php"><i class="fa fa-circle-o"></i> Documentos Bodega 2</a></li>
                <li><a href="bodega3.php"><i class="fa fa-circle-o"></i> Documentos Bodega 3</a></li>
                <li><a href="bodega4.php"><i class="fa fa-circle-o"></i> Documentos Bodega 4</a></li>
                <li><a href="bodega5.php"><i class="fa fa-circle-o"></i> Documentos Bodega 5</a></li>
                <li><a href="bodega6.php"><i class="fa fa-circle-o"></i> Documentos Bodega 6</a></li>
                <li><a href="consultafecha.php"><i class="fa fa-circle-o"></i> Consulta por fecha</a></li>
                
              </ul>


            </li>';
            
             echo '<li class="treeview">
              
                <li><a href="bodega.php"><i class="fa fa-truck"></i> Bodegas</a></li>
                
              
            </li> ';
            
            echo '<li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Bitacoras</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="bitacoraadminb1.php"><i class="fa fa-circle-o"></i> Bitacora bodega 1</a></li>
                <li><a href="bitacoraadminb2.php"><i class="fa fa-circle-o"></i> Bitacora bodega 2</a></li>
                <li><a href="bitacoraadminb3.php"><i class="fa fa-circle-o"></i> Bitacora bodega 3 </a></li>
                <li><a href="bitacoraadminb4.php"><i class="fa fa-circle-o"></i> Bitacora bodega 4 </a></li>
                <li><a href="bitacoraadminb5.php"><i class="fa fa-circle-o"></i> Bitacora bodega 5 </a></li>
                <li><a href="bitacoraadminb6.php"><i class="fa fa-circle-o"></i> Bitacora bodega 6</a></li>
                
                
              </ul>
            </li> ';
            
            echo '<li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="usuarioadmin.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                
              </ul>
            </li> ';
            echo '<li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Auditoria</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="modificacion_documento.php"><i class="fa fa-circle-o"></i> Modificacion de documentos</a></li>
                <li><a href="modificacion_usuario.php"><i class="fa fa-circle-o"></i> Modificacion de usuarios</a></li>
                 <li><a href="modificacion_bitacora.php"><i class="fa fa-circle-o"></i> Modificacion de bitacoras</a></li>
                 <li><a href="modificacion_bodegas.php"><i class="fa fa-circle-o"></i> Modificacion de bodegas</a></li>
              </ul>
            </li> ';
            
            
          }elseif ($_SESSION['Nivel3']==1 && $_SESSION['login']!=='admin') {
            echo ' <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Gestión de documentos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                <li><a href="documento_activoc.php"><i class="fa fa-circle-o"></i> Documentos Generales</a></li>
                <li><a href="bodega1.php"><i class="fa fa-circle-o"></i> Documentos Bodega 1</a></li>
                <li><a href="bodega2.php"><i class="fa fa-circle-o"></i> Documentos Bodega 2</a></li>
                <li><a href="bodega3.php"><i class="fa fa-circle-o"></i> Documentos Bodega 3</a></li>
                <li><a href="bodega4.php"><i class="fa fa-circle-o"></i> Documentos Bodega 4</a></li>
                <li><a href="bodega5.php"><i class="fa fa-circle-o"></i> Documentos Bodega 5</a></li>
                <li><a href="bodega6.php"><i class="fa fa-circle-o"></i> Documentos Bodega 6</a></li>
                <li><a href="consultafecha.php"><i class="fa fa-circle-o"></i> Consulta por fecha</a></li>
                
              </ul>


            </li>';
            
             echo '<li class="treeview">
              
                <li><a href="bodega.php"><i class="fa fa-truck"></i> Bodegas</a></li>
                
              
            </li> ';
            
            echo '<li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Bitacoras</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="bitacoraadminb1.php"><i class="fa fa-circle-o"></i> Bitacora bodega 1</a></li>
                <li><a href="bitacoraadminb2.php"><i class="fa fa-circle-o"></i> Bitacora bodega 2</a></li>
                <li><a href="bitacoraadminb3.php"><i class="fa fa-circle-o"></i> Bitacora bodega 3 </a></li>
                <li><a href="bitacoraadminb4.php"><i class="fa fa-circle-o"></i> Bitacora bodega 4 </a></li>
                <li><a href="bitacoraadminb5.php"><i class="fa fa-circle-o"></i> Bitacora bodega 5 </a></li>
                <li><a href="bitacoraadminb6.php"><i class="fa fa-circle-o"></i> Bitacora bodega 6</a></li>
                
                
              </ul>
            </li> ';
            
            echo '<li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="usuarioadmin.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                
              </ul>
            </li> ';
            echo '<li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Auditoria</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="modificacion_documento.php"><i class="fa fa-circle-o"></i> Modificacion de documentos</a></li>
                <li><a href="modificacion_usuario.php"><i class="fa fa-circle-o"></i> Modificacion de usuarios</a></li>
                 <li><a href="modificacion_bitacora.php"><i class="fa fa-circle-o"></i> Modificacion de bitacoras</a></li>
                 <li><a href="modificacion_bodegas.php"><i class="fa fa-circle-o"></i> Modificacion de bodegas</a></li>
              </ul>
            </li> ';
          };
          
        if ($_SESSION['Nivel1']==1 && $_SESSION['login']!=='admin')
            {
              echo ' <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Gestión de documentos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                <li><a href="documento_activob.php"><i class="fa fa-circle-o"></i> Documentos</a></li>
                
                <li><a href="consultafechab.php"><i class="fa fa-circle-o"></i> Consulta por fecha</a></li>
                
              </ul>

            </li>';
            } 
           else if ($_SESSION['Nivel2']==1 && $_SESSION['login']!='admin' && $_SESSION['fk_bodega_usuario']==1)
            {
              echo ' <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Gestion de documentos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                <li><a href="bodega1.php"><i class="fa fa-circle-o"></i>  Bodega 1</a></li>
                <li><a href="documento_activob.php"><i class="fa fa-circle-o"></i> Documentos</a></li>
                <li><a href="bitacorab.php"><i class="fa fa-circle-o"></i> Bitacora</a></li>
                <li><a href="consultafechab.php"><i class="fa fa-circle-o"></i> Consulta por fecha</a></li>
                
              </ul>
            </li>'
            ;
          } else if ($_SESSION['Nivel2']==1 && $_SESSION['login']!='admin' && $_SESSION['fk_bodega_usuario']==2)
            {
               echo ' <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Gestion de documentos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                <li><a href="bodega2.php"><i class="fa fa-circle-o"></i> Bodega 2</a></li>
                <li><a href="documento_activob.php"><i class="fa fa-circle-o"></i> Documentos</a></li>
                <li><a href="bitacorab2.php"><i class="fa fa-circle-o"></i> Bitacora</a></li>
                <li><a href="consultafechab.php"><i class="fa fa-circle-o"></i> Consulta por fecha</a></li>
                
              </ul>
            </li>';
          }else if ($_SESSION['Nivel2']==1 && $_SESSION['login']!='admin' && $_SESSION['fk_bodega_usuario']==3)
            {
              echo ' <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Gestion de documentos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                <li><a href="bodega3.php"><i class="fa fa-circle-o"></i> Bodega 3</a></li>
                <li><a href="documento_activob.php"><i class="fa fa-circle-o"></i> Documentos</a></li>
                <li><a href="bitacorab3.php"><i class="fa fa-circle-o"></i> Bitacora</a></li>
                <li><a href="consultafechab.php"><i class="fa fa-circle-o"></i> Consulta por fecha</a></li>
                
                
              </ul>
            </li>';
          }else if ($_SESSION['Nivel2']==1 && $_SESSION['login']!='admin' && $_SESSION['fk_bodega_usuario']==4)
            {
              echo ' <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Gestion de documentos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                <li><a href="bodega4.php"><i class="fa fa-circle-o"></i> Bodega 4</a></li>
                <li><a href="documento_activob.php"><i class="fa fa-circle-o"></i> Documentos</a></li>
                <li><a href="bitacorab4.php"><i class="fa fa-circle-o"></i> Bitacora</a></li>
                <li><a href="consultafechab.php"><i class="fa fa-circle-o"></i> Consulta por fecha</a></li>
                
              </ul>
            </li>';
          }
          else if ($_SESSION['Nivel2']==1 && $_SESSION['login']!='admin' && $_SESSION['fk_bodega_usuario']==5)
            {
              echo ' <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Gestion de documentos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                <li><a href="bodega5.php"><i class="fa fa-circle-o"></i> Bodega 5</a></li>
                <li><a href="documento_activob.php"><i class="fa fa-circle-o"></i> Documentos</a></li>
                <li><a href="bitacorab5.php"><i class="fa fa-circle-o"></i> Bitacora</a></li>
                <li><a href="consultafechab.php"><i class="fa fa-circle-o"></i> Consulta por fecha</a></li>

                
              </ul>
            </li>';
          }else if ($_SESSION['Nivel2']==1 && $_SESSION['login']!='admin' && $_SESSION['fk_bodega_usuario']==6)
            {
              echo ' <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Gestion de documentos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                <li><a href="bodega6.php"><i class="fa fa-circle-o"></i> Bodega 6</a></li>
                <li><a href="documento_activob.php"><i class="fa fa-circle-o"></i> Documentos</a></li>
                <li><a href="bitacorab6.php"><i class="fa fa-circle-o"></i> Bitacora</a></li>
                <li><a href="consultafechab.php"><i class="fa fa-circle-o"></i> Consulta por fecha</a></li>
                
                
              </ul>
            </li>';
          }
          
          ?>


         <!-- Lineas comentadas
          <?php
            if ($_SESSION['Nivel2']==1 && $_SESSION['login']=='admin')
            {
              echo ' <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Gestión de documentos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="tipo_documento.php"><i class="fa fa-circle-o"></i> Tipo de documentos</a></li>
                <li><a href="articulo.php"><i class="fa fa-circle-o"></i> Documentos</a></li>
                <li><a href="bodega.php"><i class="fa fa-circle-o"></i> Bodega</a></li>
                
              </ul>
            </li>'; 
          } else if ($_SESSION['Nivel2']==1 && $_SESSION['login']!='admin')
            {
              echo ' <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Gestion de documentos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                <li><a href="bodegab.php"><i class="fa fa-circle-o"></i> Documentos</a></li>
                
              </ul>
            </li>';
          }
        
          ?> 



          <?php
            if ($_SESSION['Nivel3']==1 or $_SESSION['Nivel2']==1 && $_SESSION['login']=='admin')
            {
              echo '<li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="usuario.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
              
                
              </ul>
            </li> '; 
          }
          
            

            
          ?>                    
        

             
          


         
            
            
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      
         
      </aside>