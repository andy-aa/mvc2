<?php

spl_autoload_register(
    function ($class) {

        $source = str_replace(
            "\\",
            DIRECTORY_SEPARATOR,
            "$_SERVER[DOCUMENT_ROOT]\\App\\$class.php"
        );

        if (file_exists($source)) {
            require_once $source;
        }
    }
);

//require_once "$_SERVER[DOCUMENT_ROOT]";
