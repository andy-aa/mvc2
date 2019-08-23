<?php
namespace App\Controller;

use App\Core\Conf;

class ErrorController extends AbstractController
{
    public $viewLayout = Conf::DEFAULT_PLAIN_LAYOUT;

    public function forbiddenController()
    {
        $this->accessDenied();

        $this->render("error", [
            'text' => 'Access Denied'
        ]);
    }

    public function notFoundController($controllerName)
    {
        $this->notFound();

        $this->render("error", [
            'text' => "Not Found Controller: $controllerName"
        ]);
    }

    public function notFoundAction($actionName)
    {
        $this->notFound();

        $this->render("error", [
            'text' => "Not Found Action: $actionName"
        ]);
    }
}
