<?php

spl_autoload_register(
    function ($class) {

        $sources = [
            "core/$class.php",
            "controllers/$class.php",
            "models/$class.php",
            "views/$class.php",
            'app/' . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php'
        ];

        foreach ($sources as $source) {
            // echo "$source<br>";
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
