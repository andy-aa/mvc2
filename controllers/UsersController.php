<?php

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
        $this->view->setPatternsPath('views/users/');
        $this->render("showUsersAddEditForm", [
            'fields' => $this->table->getColumnsPropertiesWithoutId(),
            'user_group' => $this->table->getUserGroupDescription(),
            'targetURL' => "?t={$this->shortClassName()}&a=addrow"
        ]);
    }

    public function actionShowEditForm()
    {
        URL::uriDecode(['id']);
        $this->view->setPatternsPath('views/users/');
        $this->render("showUsersAddEditForm", [
            'data' => $this->table->getRowById($_GET['id']),
            'fields' => $this->table->getColumnsPropertiesWithoutId(),
            'user_group' => $this->table->getUserGroupDescription(),
            'targetURL' => "?t={$this->shortClassName()}&a=editrow&id={$_GET['id']}"
        ]);
    }
}