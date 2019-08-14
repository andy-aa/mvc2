<?php
/* @var $this View */
/** @var string $title */
?><!DOCTYPE html>
<html lang="en">
<?php
//echo __FILE__;
//print_r($_SERVER);
//echo getcwd();
//echo str_replace($_SERVER['SCRIPT_NAME'], '', getcwd());
//echo realpath($_SERVER['PHP_SELF']);
//echo basename($_SERVER['PHP_SELF']);
//echo str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
//echo preg_replace('/(index\.php$)/', '', $_SERVER['PHP_SELF']);
?>
<head>
    <!--    <base href="--><? //= CLEAN_URL_PATH ?><!--">-->
    <base href="/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<ul class="menu">
    <li>
        <a href="?a=home">Home</a>
    </li>
    <li>
        <a href="<?=URL::uriEncode('?t=tableone&a=showtable&page=1')?>">tableOne</a>
    </li>
    <li>
        <a href="<?=URL::uriEncode('?t=tabletwo&a=showtable&page=1')?>">tableTwo</a>
    </li>
    <li>
        <a href="<?=URL::uriEncode('?t=usergroup&a=showtable&page=1')?>">UserGroup</a>
    </li>
    <li>
        <a href="<?=URL::uriEncode('?t=users&a=showtable&page=1')?>">Users</a>
    </li>
    <li>
        <a href="?a=loginform">login</a>
    </li>
    <li>
        <a href="?a=logout">logout</a>
    </li>
    <li>
        <a href="?a=about">about</a>
    </li>
</ul>
<div class="status"><?= Auth::currentUserInfo() ?></div>

<?= ErrorHandler::read() ?>
<div id="maincontent">
    <?php $this->body(); ?>
</div>

</body>

</html>