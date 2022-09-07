<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "../Modelos/Encuesta_modelo.php"; //refencia del modelo
date_default_timezone_set('America/Tegucigalpa');


//Variables a recibir y formatear en caso de ser enviadas.
$identidad = isset($_POST["IDENTIDAD"]) ? limpiarCadena1($_POST["IDENTIDAD"]) : "";

$edad = isset($_POST["EDAD"]) ? limpiarCadena1($_POST["EDAD"]) : "";

$nombre = isset($_POST["NOMBRES"]) ? limpiarCadena1($_POST["NOMBRES"]) : "";
$apellido = isset($_POST["APELLIDOS"]) ? limpiarCadena1($_POST["APELLIDOS"]) : "";
$direccion = isset($_POST["DIRECCION"]) ? limpiarCadena1($_POST["DIRECCION"]) : "";
$estudia = isset($_POST["ESTUDIA"]) ? limpiarCadena1($_POST["ESTUDIA"]) : "";
$telefono = isset($_POST["TELEFONO"]) ? limpiarCadena1($_POST["TELEFONO"]) : "";
$qr = isset($_POST["QR"]) ? limpiarCadena1($_POST["QR"]) : "";
$fecha_i = isset($_POST["FECHAINICIO"]) ? limpiarCadena1($_POST["FECHAINICIO"]) : "";

$pregunta1= isset($_POST["1"]) ? limpiarCadena1($_POST["1"]) : "";
$pregunta2= isset($_POST["2"]) ? limpiarCadena1($_POST["2"]) : "";
$pregunta3= isset($_POST["3"]) ? limpiarCadena1($_POST["3"]) : "";
$pregunta4= isset($_POST["4"]) ? limpiarCadena1($_POST["4"]) : "";
$identidad=str_replace("%20","",$identidad);
$telefono=str_replace("%20","",$telefono);

$id_usuario= isset($_SESSION['Id_usuario']) ? limpiarCadena1($_SESSION['Id_usuario']) : "";

$id_punto_control= isset($_SESSION['Id_punto_control']) ? limpiarCadena1($_SESSION['Id_punto_control']) : "";
$ip= isset($_SERVER['REMOTE_ADDR']) ? limpiarCadena1($_SERVER['REMOTE_ADDR']) : "";



$op =  isset($_GET["op"]) ? limpiarCadena1($_GET["op"]) : "";




//instancia del modelo
$instancia_modelo = new encuesta();

//swicht dependiendo de un get llamado "op"
switch ($op) {

    //Listar en una tabla los objetos
  case "registrar":
    $rspta=$instancia_modelo;
    $persona=$instancia_modelo;
     $rsencuesta=$instancia_modelo;
     $encuesta=$instancia_modelo;
     $respuestas=$instancia_modelo;
      $rspta->registrar_persona($identidad,$qr,$telefono);
    $id_persona=$persona->traer_id_persona($identidad)->fetch_object();
    
    $fecha_f = date('Y-m-d h:i:s', time());  
      

   
    
    $rsencuesta->registrar_encuesta($id_persona->id_persona,$id_usuario,$id_punto_control,$fecha_i,$fecha_f,$ip);
     $id_encuesta=$encuesta->traer_id_encuesta($id_persona->id_persona)->fetch_object();
    $pregunta5="";
    foreach ($_POST['5'] as $key => $value) {
      # code...
      $pregunta5=$pregunta5.",".$value;
    }
    $pregunta6="";
    foreach ($_POST['6'] as $key => $value) {
      # code...
      $pregunta6=$pregunta6.",".$value;
    }
    //respuestas
    $respuestas->registrar_respuesta($id_encuesta->id_encuesta,$pregunta1,$pregunta2,$pregunta3,$pregunta4,$pregunta5,$pregunta6,1,2,3,4,5,6);
   
    echo 1;
    

   

    break;
    
    case 'registrar_menor':
      
       
        $rspta=$instancia_modelo;
      $persona=$instancia_modelo;
       $rsencuesta=$instancia_modelo;
       $encuesta=$instancia_modelo;
       $respuestas=$instancia_modelo;
        $rspta->registrar_persona_menor($nombre,$apellido,$telefono,$edad,$direccion);
      $id_persona=$persona->traer_id_persona_menor($nombre,$apellido,$edad,$telefono)->fetch_object();
      
      $fecha_f = date('Y-m-d h:i:s', time());  
        
  
     
      
      $rsencuesta->registrar_encuesta_menor($id_persona->id_persona,$id_usuario,$id_punto_control,$fecha_i,$fecha_f,$ip);
       $id_encuesta=$encuesta->traer_id_encuesta_menor($id_persona->id_persona)->fetch_object();
      $pregunta4="";
      foreach ($_POST['4a'] as $key => $value) {
        # code...
        $pregunta4=$pregunta4.",".$value;
      }
      $pregunta5="";
      foreach ($_POST['5'] as $key => $value) {
        # code...
        $pregunta5=$pregunta5.",".$value;
      }
      //respuestas
      $respuestas->registrar_respuesta_menores($id_encuesta->id_encuesta_menor,$pregunta1,$pregunta2,$pregunta3,$pregunta4,$pregunta5,1,2,3,4,5);
     
      echo 1;
      
  
     
    
      
      break;
  case 'inicio':
   
  $TiempoHora = date('Y-m-d h:i:s', time());  
  echo $TiempoHora;
    break;

  
    
  case 'parametros':
    # code...
    echo json_encode($_SESSION);
    break;

  case 'identidad':
     
      $valor=$instancia_modelo->verificar_identidad($identidad)->fetch_object();
      
      if ($valor->personas==0) {
        # code...
        echo 1;
      }
      elseif ($valor->personas>0) {
        # code...
        echo 0;
      }
         
    break;
  
}//Fin del Switch////////////




?>