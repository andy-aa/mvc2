#Windows

##ConfigTest.php
* vendor\bin\phpunit --bootstrap vendor\autoload.php tests/ConfigTest
* vendor\bin\phpunit tests/ConfigTest
* vendor\bin\phpunit --colors tests/ConfigTest

##UrlTest.php
* vendor\bin\phpunit --colors tests/UrlTest
* vendor\bin\phpunit --filter testComplexUrl UrlTest tests/UrlTest.php

