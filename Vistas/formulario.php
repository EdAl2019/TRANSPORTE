<?php
session_start();
 if (isset($_SESSION["Id_usuario"])) {
  ?>
  <!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../src/dist/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../src/dist/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../src/dist/bootstrap/css/bootstrap.css.map">
  <link rel="stylesheet" href="../src/dist/fontawesome/font-awesome-4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="../src/css/estilos.css">
  <link rel="stylesheet" href="../src/dist/sweetalert2/dist/sweetalert2.min.css">
  



  <title>TRANSPORTE URBANO CENSO</title>
  <script src="../src/js/html5-qrcode.min.js"></script>


</head>

<body style="background-color:#57D0E1;">
  <div class="container">

  
    <div class="row">
    <?php
        require("cabecera.php");
        
        ?>
      
      <div class="col-xl-12">
      
        
        <div class="card card-primary " style="background-color:white ;">
          <div class="card-header "
            style="background-image:url('../src/img/logo.jpg') ; background-repeat: no-repeat; ">

            <div class="row">
              <div class="col-lg-12 text-center">

                <img src="../src/img/firma.jpg" width="100" height="100" class="img-fluid rounded-circle">

              </div>

            </div>
            <br>
            <br>
            <br>
            <br>
            <h2 class="card-title text-center" style="color:darkblue ;"><strong> CENSO USUARIO DE TRANSPORTE</strong>
            </h2>






          </div>
          <div class="row" style="background-color:beige; ">
            
         
          </div>
          <div class="form-group col-xl-12 text-center"  id="contenedor_comenzar">
          <br>
          <h5><i class="fa fa-users" aria-hidden="true"></i> MAYORES DE EDAD</h5>
                        <button id="comenzar" class=" btn btn-success btn-xs"><h3>COMENZAR</h3></button>
                        <br><br>
          </div>
          <br>
          <div id="formulario">
          <form id="formulario-encuesta" >

            <div class="row">

              <div class="col-xl-6 card card-secundary">


                <br>

                <h6 class="card-title text-center"><i class="fa fa-user" aria-hidden="true"></i>
                  <u>DATOS PERSONALES</u>
                </h6>
                <br>

                <div class="card-body">

                  <div class="form-group col-md-12" id="contenedor_scaner">
                    <input type="text" id="FECHAINICIO" name="FECHAINICIO" hidden>

                    <label><strong>1. ESCANER QR </strong><i class="fa fa-qrcode" aria-hidden="true"></i>
                    </label>
                    <i id="check_scan" class="fa fa-check-circle" style="color:green ;" aria-hidden="true"></i>
                    <div class="form-control" style="" id="reader"></div>


                    <input type="text" hidden id="QR" name="QR" class="form-control">
                  </div>
                  <br>
                  <div class="form-group col-xl-12">
                    <label for="IDENTIDAD"><strong> 2. INGRESE SU NÚMERO DE IDENTIDAD </strong>

                      <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    </label>
                    <input type="number" max="13" min="13" class="form-control" id="IDENTIDAD" name="IDENTIDAD" min="1" max="99999999"
                      placeholder="0000000000000">
                  </div>
                  <br>
                  <div class="form-group col-md-12">
                    <label for="TELEFONO"><strong>3. NÚMERO DE TELÉFONO </strong><i class="fa fa-mobile"
                        aria-hidden="true"></i>
                    </label>
                    <input type="number" class="form-control" id="TELEFONO" placeholder="0000-0000" name="TELEFONO" min="1" max="99999999" required>
                  </div>




                </div>
              </div>
              <div class="col-md-6 card card-secundary">
                <br>
                <h6 class="card-title text-center"><i class="fa fa-file-text" aria-hidden="true"></i>

                  <u>CENSO</u>
                </h6>
                <br>
                <div class="card-body">
                  <div class="form-group col-md-12">
                    <label for="DONDESEDIRIGE"><strong>¿A DÓNDE SE DIRIGE? </strong><i class="fa fa-location-arrow"
                        aria-hidden="true"></i>
                    </label>
                    <select name="1" id="1" class="form-control">
                      <option value="TRABAJO">TRABAJO</option>
                      <option value="SUPERMERCADO">SUPERMERCADO</option>
                      <option value="ESCUELA">ESCUELA</option>
                      <option value="ENTRENIMIENTO U OTROS">ENTRETENIMIENTO U OTROS.</option>
                    </select>
                  </div>
                  <br>
                  <div class="form-group col-md-12">
                    <label for="FRECUENCIA"><strong>¿CON QUÉ FRECUENCIA UTILIZA TRANSPORTE
                        URBANO? </strong><i class="fa fa-user-o" aria-hidden="true"></i>
                    </label>
                    <select name="2" id="2" class="form-control">
                      <option value="DIARIO">DIARIO</option>
                      <option value="SEMANAL">SEMANAL</option>

                    </select>
                  </div>
                  <br>
                  <div class="form-group col-md-12">
                    <label for="DESTINO"><strong>¿CUÁNTAS UNIDADES DE TRANSPORTE UTILIZA PARA
                        LLEGAR A SU
                        DESTINO? </strong><i class="fa fa-bus" aria-hidden="true"></i>
                    </label>
                    <div class="form-check">
                      <input class="form-check-input radio3" type="radio" value="1" name="3" id="3">
                      <label class="form-check-label" for="3">
                        1
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio3" type="radio" value="2" name="3" id="3">
                      <label class="form-check-label" for="3">
                        2
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio3" type="radio" value="3" name="3" id="3">
                      <label class="form-check-label" for="3">
                        3
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio3" value="4" type="radio" name="3" id="3">
                      <label class="form-check-label" for="3">
                        4
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input transporte-mas" type="radio" name="3" id="3">
                      <label class="form-check-label" for="3">
                        Más de 4:

                      </label> <input class="3-mas" type="number" id="3"  name="3" required>
                    </div>

                  </div>

         
                  <br>
                  <div class="form-group col-xs-12">
                    <label for="exampleInputPassword1"><strong>¿CUÁNTAS PERSONAS UTILIZAN TRANSPORTE EN SU
                        HOGAR? </strong>
                      <i class="fa fa-home" aria-hidden="true"></i>
                    </label>
                    <div class="form-check">
                      <input class="form-check-input radio4" type="radio" value="1" name="4" id="4">
                      <label class="form-check-label" for="4">
                        1
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio4" type="radio" value="2" name="4" id="4">
                      <label class="form-check-label" for="4">
                        2
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio4" type="radio" value="3" name="4" id="4">
                      <label class="form-check-label" for="4">
                        3
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio4" type="radio" value="4" name="4" id="4">
                      <label class="form-check-label" for="4">
                        4
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input transporte-hogar" type="radio" name="4" id="4">
                      <label class="form-check-label" for="hogar_transporte5">
                                    Más de 4: 
                                  </label>
                                  <input type="number" class="4-mas" name="4" id="4" required>
                    </div>

                  </div>
                  <br>
                  <div class="form-group col-md-12">
                    <label for="exampleInputPassword1"><strong>¿QUÉ OTROS SERVICIOS DE TRANSPORTE UTILIZA
                        FRECUENTEMENTE ? </strong><i class="fa fa-taxi" aria-hidden="true"></i>
                    </label>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="COLECTIVOS" name="5[]"
                        id="5">
                      <label class="form-check-label" for="flexCheckDefault">
                        COLECTIVOS
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="MOTO-TAXIS" name="5[]"
                        id="5">
                      <label class="form-check-label" for="OTROS_SERVICIOS">
                        MOTO-TAXIS
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value='MICRO-BUS "BRUJITOS"' name="5[]"
                        id="5">
                      <label class="form-check-label" for="OTROS_SERVICIOS">
                        MICRO-BUS "BRUJITOS"
                      </label>
                    </div>
                  </div>
                  <br>
                  <div class="form-group col-md-12">
                    <label for="exampleInputPassword1"><strong>¿QUÉ ASPECTOS LE GUSTARÍA QUE MEJOREN EN EL
                        SERVICIO DE TRANSPORTE?</strong></label><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                    <br>
                    <div class="form-check">
                      <input class="form-check-input"  type="checkbox" value="ATENCIÓN DEL CONDUCTOR Y/O COBRADOR." name="6[]"
                        id="6">
                      <label class="form-check-label" for="6">
                        ATENCIÓN DEL CONDUCTOR Y/O COBRADOR.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="MÚSICA CON ALTO VOLUMEN." name="6[]"
                        id="6">
                      <label class="form-check-label" for="6">
                        MÚSICA CON ALTO VOLUMEN.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="TIEMPO DE ESPERA EN ESTACIONES." name="6[]"
                        id="6">
                      <label class="form-check-label" for="6">
                        TIEMPO DE ESPERA EN ESTACIONES.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="CONDICIONES FÍSICAS Y MECÁNICAS DE LAS
                      UNIDADES." name="6[]"
                        id="6">
                      <label class="form-check-label" for="6">
                        CONDICIONES FÍSICAS Y MECÁNICAS DE LAS
                    UNIDADES.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="EXCESO DE PASAJEROS." name="6[]"
                        id="6">
                      <label class="form-check-label" for="6">
                        EXCESO DE PASAJEROS.
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="SEGURIDAD." name="6[]"
                        id="6">
                      <label class="form-check-label" for="6">
                        SEGURIDAD.
                      </label>
                    </div>
                  </div>
                    
                  </div>
                  <button type="button" id="guardar" class="btn btn-primary">GUARDAR</button>
                  <br>
                  
                </div>
               

              </div>
 </div>
              <div class="card-footer text-center"style="background-image:url('../src/img/logo.jpg') ; background-repeat: no-repeat; ">
                    <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>

            </div>
        </div>
                    </div>


          </form>
        </div>
        </div>




      </div>
      
    </div>


  </div>

  <?php
        require("pie.php");
        
        ?>

  <script src="../src/js/formulario.js"></script>

</body>

</html>
 
  
  <?php
}else {

  # code...
  echo "<script> window.location='https://".$_SERVER['SERVER_ADDR']."/TRANSPORTE/index.php'; </script>";

}

?>
  
