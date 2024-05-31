<?php
require_once('conexion.php');

function traerTodosProductos(){
    $query="SELECT * FROM productos";
    $response=obtenerRegistros($query);
    return convertir_A_UTF8($response);
    
}

function traerProductoPorId($id){
    $query= "SELECT * FROM productos WHERE codigo=$id";
    $response=obtenerRegistros($query);
    return convertir_A_UTF8($response);
    
}

function crearProducto($array){
    $nombre=array['nombre'];
    $precio=array['precio'];
    $categoria=array['categoria'];

    $query="INSERT INTO productos(nombre,precio,categoria) VALUES('$nombre','$precio','$categoria')";

    NonQuery($query);

    return true;

}

?>