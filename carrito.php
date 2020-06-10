<?php

session_start();

$mensaje= "";

if(isset($_POST['btnAccion'])){
    
    switch ($_POST ['btnAccion']) {
        case 'Agregar':
            if (is_numeric(openssl_decrypt( $_POST['id'],COD,KEY))){
                $ID=openssl_decrypt( $_POST['id'],COD,KEY );
                $mensaje= "Ok ID correcto".$ID;
                }else{
                    $mensaje= "ups ID incorrecto".$ID; 
            }

                if (is_string(openssl_decrypt( $_POST['nombre'],COD,KEY))){
                    $NOMBRE=openssl_decrypt( $_POST['nombre'],COD,KEY );
                    }else{ $mensaje= "ups..Algo sucedio con el nombre".$NOMBRE;
                    break; 
                }
                
                if (is_string(openssl_decrypt( $_POST['cantidad'],COD,KEY))){
                    $CANTIDAD=openssl_decrypt( $_POST['cantidad'],COD,KEY );
                    }else{ $mensaje= "ups..Algo sucedio con la cantidad".$CANTIDAD;
                    break; 
                }
                if (is_string(openssl_decrypt( $_POST['precio'],COD,KEY))){
                    $PRECIO=openssl_decrypt( $_POST['precio'],COD,KEY );
                    }else{ $mensaje= "ups..Algo con el precio".$PRECIO;
                    break; 
                }
            if (!isset($_SESSION['CARRITO'])){
                
                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                    );
                    $_SESSION['CARRITO'][0]=$producto;

            }else{
                $NumeroProductos=count($_SESSION['CARRITO']);

                $producto=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                    );
                    $_SESSION['CARRITO'][$NumeroProductos]=$producto;
                    
            }
            
           // $mensaje= print_r($_SESSION,true);
            $mensaje= "Producto agregado al carrito...";

        break;

        case 'Eliminar':
            if (is_numeric(openssl_decrypt( $_POST['id'],COD,KEY))){
                        $ID=openssl_decrypt( $_POST['id'],COD,KEY );
                    foreach ($_SESSION['CARRITO'] as $indice=>$producto){
                        if($producto['ID']==$ID){
                            unset($_SESSION['CARRITO'][$indice]);
                            
                        }
                    }
                }else{
                    $mensaje= "ups ID incorrecto".$ID; 
                }


        break;
        
    }
}

?>