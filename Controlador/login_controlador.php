<?php

session_start();

require_once "../Modelos/login_modelo.php"; //refencia del modelo



//Variables a recibir y formatear en caso de ser enviadas.
$usuario = isset($_POST["usuario"]) ? limpiarCadena1($_POST["usuario"]) : "";
$contraseña = isset($_POST["contraseña"]) ? limpiarCadena1($_POST["contraseña"]) : "";
$id_punto_control = isset($_POST["id_punto_control"]) ? limpiarCadena1($_POST["id_punto_control"]) : "";

$opcion = isset($_GET["op"]) ? limpiarCadena1($_GET["op"]) : "";


//instancia del modelo
$instancia_modelo = new login();

//swicht dependiendo de un get llamado "op"
switch ($opcion) {

    
  
    

    //Mostrar un objeto por su id
  case 'login':
    
     
    
    if ($instancia_modelo->login($usuario, $contraseña)) {

        
    
        $_SESSION['Usuario'] = $usuario;
    
    
        $datos = $instancia_modelo->traerdatos($usuario);
    
    
        while ($res = $datos->fetch_object()) {
    
          $_SESSION['Id_usuario'] = $res->id_usuario;
    
    
          $_SESSION['Nombres'] = $res->nombres;
          $_SESSION['Apellidos'] = $res->apellidos;
    
          $_SESSION['Identidad'] = $res->identidad;

    
        }
        $_SESSION["Id_punto_control"]=$id_punto_control;
        echo 1;
    
      } else {
        
        echo 0;
    
      }
    
    # code...
    
   break;

    //Listar los modulos para un elemento select html
  case 'select_puntos_control':
    if (isset($_POST['activar'])) {
      $data = array();
      $respuesta = $instancia_modelo->listar_puntos_de_control();
      echo '<option value="null" selected="" disabled="true">..SELECCIONA UN PUNTO DE CONTROL..</option>';

      while ($r = $respuesta->fetch_object()) {
        echo "<option value='" . $r->id_punto_control . "'> " . $r->punto_encuestar . " </option>";
      }
    } else {
      echo 'No hay informacion';
    }

    break;
    //Listar los modulos para la pantalla de permisos
 
    
    //Listar los objetos de un modulo
 
}//Fin del Switch////////////




?>