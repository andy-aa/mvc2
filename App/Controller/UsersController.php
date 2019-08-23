<?php
namespace Controller;

use Model\UsersModel;
use Core\Database;
use View\Helper\HTML;

class  UsersController extends AbstractTableController
{
    public $tableName = 'users';

    public function __construct()
    {
        AbstractController::__construct();

        $this->table = new UsersModel($this->tableName, Database::Link());

        $this->table->setPageSize(3);
    }

    public function actionShowAddForm()
    {
        $this->view->setPatternsPath('templates/users/');
        $this->render("showUsersAddEditForm", [
            'fields' => $this->table->getColumnsPropertiesWithoutId(),
            'user_group' => $this->table->getUserGroupDescription(),
            'targetURL' => HTML::url("{$this->shortClassName()}/AddRow")
        ]);
    }

    public function actionShowEditForm()
    {
        $this->view->setPatternsPath('templates/users/');
        $this->render("showUsersAddEditForm", [
            'data' => $this->table->getRowById($_GET['id']),
            'fields' => $this->table->getColumnsPropertiesWithoutId(),
            'user_group' => $this->table->getUserGroupDescription(),
            'targetURL' => HTML::url("{$this->shortClassName()}/EditRow", ['id' => $_GET['id']])
        ]);
    }
}