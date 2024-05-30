<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon"  type="image/jpg" href="../imagenes/favicon1.jpg">
  <title>Inicio de Sesión</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Librerías CSS -->
  <link rel="stylesheet" type="text/css" href="../librerias/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
  <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type='text/css' href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" >

  <!-- Librerías JS -->
  <script src="../librerias/jquery-3.3.1.min.js"></script>
  <script src="../librerias/bootstrap/js/bootstrap.js"></script>
  <script src="../librerias/alertifyjs/alertify.js"></script>


</head>

<body>
  <div id="fondo">
    <br>

    
    <div class="container-fluid">
      <img  src="../imagenes/BannerPVD_blanco.png" class="img-responsive" alt="imagen" width="1000px" style="margin: 0 auto">
    </div>


    <div class="container">
      <div><h1 class="text-center">BIENVENIDO</h1></div>
      <br/>
      <div class="col-sm-4"></div>
      <div class="col-sm-4">

        <form role="form" action="../modelo/iniciarsesion.php" method="post">
          <div class="form-group">
            <label for="usrname"><span class="glyphicon glyphicon-user"></span> ID Usuario</label>
            <input type="text" class="form-control" name="id_admin" placeholder="Digite su ID">
          </div>
          
          <div class="form-group">
            <label for="psw"><span class="glyphicon glyphicon-lock"></span> Contraseña </label>                    
            <div class="input-group">
              <input id=pass type="password" class="form-control" name="contrasena" placeholder="Digite su Contraseña">
              <span class="input-group-btn">
                <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
              </span>
            </div> 
          </div>        
          
          <button type="submit" class="btn btn-info btn-block"><span class="glyphicon glyphicon-off"></span> Iniciar Sesión </button>
        </form>

      </div>
      <div class="col-sm-4"></div>
    </div>
    <br/><br/>

    <?php
    include 'footer.php';
    ?>

    <script>
      $(document).ready(function () {
        $("#myBtn").click(function () {
          $("#myModal").modal();
        });
      });
    </script>

    

    <script type="text/javascript">
      function mostrarPassword(){
        var cambio = document.getElementById("pass");
        if(cambio.type == "password"){
          cambio.type = "text";
          $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        }else{
          cambio.type = "password";
          $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
      } 
    </script>

    <script>
      $(document).ready(function()
      {
       $("#mostrarmodal").modal("show");
     });
   </script>

 </div>
</body>
</html>