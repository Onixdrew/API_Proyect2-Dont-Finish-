<?php

require_once('utilidades.php');

if (isset($_GET['url'])) {
    
    // almacena todo lo que se mande por la url el la variable $var
    $var= $_GET['url'];

    if ($_SERVER['REQUEST_METHOD']=='GET') {


        // Esto capturara los id de los productos en la url
        $numero=intval(preg_replace('/[^0-9]+/','',$var),10);

        print_r($numero);

        switch ($var) {
            case "productos";
                $res=traerTodosProductos();
                print_r(json_encode($res));
                http_response_code(200);

            break;
            case "productos/$numero";
                $res=traerProductoPorId($numero);
                print_r(json_encode($res));
                http_response_code(200);

            break;
            

            default:
            
        }


    }elseif (($_SERVER['REQUEST_METHOD']=='POST')) {

        $postBody= file_get_contents("php://input");
    
        $convertir= json_decode($postBody,true);

        if (json_last_error()==0) {
            

            switch ($var) {
                case "productos";
                    crearProducto($convertir);
                 
                    http_response_code(200);
    
                break;
             
                default:
                
            }

        }else {
            http_response_code(400);

        }


        http_response_code(200);
        
    }else{
        http_response_code(405);
    };
}





?>