<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';
?>
<!--Contenido-->
<head>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    
  />
  <link rel="shortcut icon" href="../public/images/logosd1.png">
</head>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content" style="background:url(../public/images/fondo5.jpg);height: 728px; border-radius:transparent;">
            <div class="animate__animated animate__fadeInDown">
            <br>
            <br>
          <center><label style="font-size:45px" id="idtitulo"> PÁGINA PRINCIPAL  </label></center>
          <center><Label style="font-size:45px" >Sistema de gestión de documentos </label></center>
            <br>
            <br>
          <center><label style="font-size:200%; padding-left: 20px" id="idtitulo" >Bienvenido(a) <?php echo $_SESSION['nombre']; ?> </label></center>

          </div>
            <div class="row">
              <div class="col-md-12">
                  <center><img src="../public/images/logosd1.png" style="width:30%;height:30%;padding-top: 30px;" class="animate__animated animate__fadeInDown"></center>


              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
}


require 'footer.php';
?>

<script src="../public/js/chart.min.js"></script>
<script src="../public/js/Chart.bundle.min.js"></script> 
<script type="text/javascript">

</script>


</script>


<?php 

ob_end_flush();
?>


