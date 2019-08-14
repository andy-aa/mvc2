<?php

class Router
{
    public $controllerName;
    public $actionName;

    public function __construct()
    {
        URL::init();

        $this->controllerName = ($_GET["t"] ?? Conf::DEFAULT_CONTROLLER) . 'Controller';
        $this->actionName = 'action' . ($_GET["a"] ?? Conf::DEFAULT_ACTION);
    }


    public function run()
    {
        if (Auth::checkControllerPermit($this->controllerName)) {
            if (class_exists($this->controllerName)) {

                $MVC = new $this->controllerName();

                if (method_exists($MVC, $this->actionName)) {
                    $MVC->{$this->actionName}();
                } else {
                    // echo "нет такого метода: $this->methodName";
                    (new ErrorController())->notFoundAction($this->actionName);
                }
            } else {
                // echo "нет такого класса: $this->controllerName";
                (new ErrorController())->notFoundController($this->controllerName);
            }
        } else {
            // echo "ошибка доступа";
            (new ErrorController())->forbiddenController();
        }
    }
}
