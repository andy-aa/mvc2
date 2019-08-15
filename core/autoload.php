<?php

spl_autoload_register(
    function ($class) {

        $path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . '%s' . DIRECTORY_SEPARATOR . '%s.php';

        $sources = [
            sprintf($path, 'core', $class),
            sprintf($path, 'controllers', $class),
            sprintf($path, 'models', $class),
            sprintf($path, 'views', $class),
            sprintf($path, 'app', str_replace('\\', DIRECTORY_SEPARATOR, $class)),
        ];

        foreach ($sources as $source) {

            if (file_exists($source)) {
                require_once $source;
                break;
            }
        }

    }
);




// $obj = new my_space\tclass();

// use my_space as MyPerson;
// $class = new MyPerson\tclass();
