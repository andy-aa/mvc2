<?php
use Core\{Auth, ErrorHandler};use View\Helper\HTML;

/* @var $this View\View */
/** @var string $title */


?><!DOCTYPE html>
<html lang="en">
<head>
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
        <a href="<?= HTML::url("TableOne/ShowTable", ['page' => 1]) ?>">tableOne</a>
    </li>
    <li>
        <a href="<?= HTML::url("TableTwo/ShowTable", ['page' => 1]) ?>">tableTwo</a>
    </li>
    <li>
        <a href="<?= HTML::url("UserGroup/ShowTable", ['page' => 1]) ?>">UserGroup</a>
    </li>
    <li>
        <a href="<?= HTML::url("Users/ShowTable", ['page' => 1]) ?>">Users</a>
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