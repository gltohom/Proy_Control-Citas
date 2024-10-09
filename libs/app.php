<?php

//para llamar el archivo de mostrar mensaje de error
require_once 'controllers/errores.php';
class App
{  
    
    function __construct()
    {
        
        $url = isset($_GET['url']) ? $_GET['url']: null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        
        //para ingresar sin tener definido controlador
        if(empty($url[0]))
        {
            $archivoController = 'controllers/menu.php';
            require_once $archivoController;
            $controller = new Menu();
            //llamando modelo
            $controller->loadModel('Menu');
            //llamando la funcion render
            $controller->render();
            return false;
        }

        $archivoController = 'controllers/' . $url[0] . '.php';

        //validacion de modelo
        if(file_exists($archivoController))
        {
            require_once $archivoController;

            //inicializar controlador
            $controller = new $url[0];
            //llamando modelo
            $controller->loadModel($url[0]);

            //variable para capturar parametro. Es el numero de elementos del arreglo
            $nparam = sizeof($url);

            if($nparam > 1)
            {
                if($nparam >2)
                {
                    $param = [];
                    for($i = 2; $i<$nparam; $i++)
                    {
                        array_push($param, $url[$i]);
                    }
                    $controller->{$url[1]}($param);
                }
                else
                {
                    $controller->{$url[1]}();
                }
            }
            else
            {
                $controller->render();
            }
        }
        else
        {
            $controller = new Errores();
        }
    }
    
}
?>