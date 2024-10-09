<?php
class Errores extends Controller
{
    function __construct()
    {
        parent::__construct();
        //llamando la vista error
        $this->view->render('errores/index');  
    }
}
?>