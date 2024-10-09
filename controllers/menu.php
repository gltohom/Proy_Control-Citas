<?php
class Menu extends Controller
{
    //constructor
    function __construct()
    {
        parent::__construct();
    }

    //funcion render para que la vista no dependa del constructor
    function render()
    {
        $this->view->render('menu/index');
    }
}
?>