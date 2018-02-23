<?php

class Autoloader
{
    # static : appeler la fonction sans instancier la classe
    # Les fonctions static ne communique qu'entre elle
    public static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));

    }

    public static function autoload($class)
    {
        /*echo "Autoload pour : ";
        print_r($class);
        echo '<br>';*/
        require PATH_ROOT . '/' . $class . '.php';
    }


}

