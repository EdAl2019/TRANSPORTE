<?php
require_once('../Config/conexion.php');
$instancia_conexion = new conexion();


class login
{ // Clase para gestionar las consultas del Login
    
   
    
    function listar_puntos_de_control()
    {
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta('select id_punto_control,punto_encuestar from TBL_PUNTOS_DE_CONTROL;');

        return $consulta;
    }
    function login($user,$contra){
        global $instancia_conexion;
       // $resultado=false;
        $sql='select * from TBL_USUARIOS where usuario="'.$user.'" and contrasena="'.$contra.'"';

        if ($instancia_conexion->validar_select($sql)) {
        
            return true;
        }
       else{
           return false;
       }
    }
    function traerdatos($user){

        global $instancia_conexion;

        $sql='select * from TBL_USUARIOS u, TBL_PERSONAS e where u.id_persona=e.id_persona and u.USUARIO="'.$user.'";';
        return $instancia_conexion->ejecutarConsulta($sql);
    }


   

    
   

    
    //Trae el maximo id del modulo
   }


?>