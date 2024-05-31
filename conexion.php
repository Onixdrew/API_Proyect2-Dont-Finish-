<?php
$server='127.0.0.1';
$user='root';
$password='';
$db='tiendax';
$port='3306';


$conexion=new mysqli($server,$user,$password,$db,$port);

if ($conexion->connect_error) {
    die($conexion-> connect_error);
};


// guardar

function NonQuery($sqlstr, &$conexion= null) {
    // si la variable parametro (&$conexion) no se le asigna un valor
    // se usará la variable global($conexion)
    if (!$conexion)global $conexion;

    $resul=$conexion->query($sqlstr);
    return $conexion->affected_rows;
    
    
};


function obtenerRegistros($sqlstr, &$conexion= null){

    if (!$conexion)global $conexion;

    $resul=$conexion->query($sqlstr);
    $resulArray= array();
    
    // se recorren todos los registros y se agregan al $resulArray
    foreach($resul as $registros){
        $resulArray[]= $registros;
    }
    return $resulArray;
    
};


// utf8 para que tome todos los caracteres cuando se convierta a json

function convertir_A_UTF8($array){

    array_walk_recursive($array, function(&$item,$key){

        // si detecta un caracter desconocido, lo convertira a utf-8
        if (!mb_detect_encoding($item, 'utf-8', true)) {

            $item= utf8_encode($item);
            
        };
    });

    return $array;

}


?>