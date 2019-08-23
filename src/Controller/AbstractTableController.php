<?php
namespace App\Controller;

use App\Core\Database;
use App\Model\TableModel;
use App\View\Helper\HTML;

abstract class  AbstractTableController extends AbstractController
{
    public $table;
    public $tableName;
    public $viewPatternsPath = 'templates/table/';

    public function __construct()
    {
        parent::__construct();

        $this->table = new TableModel($this->tableName, Database::Link());
        $this->table->setPageSize(5);
    }

    public function actionShowTable()
    {
        $page = (int)(!empty($_GET['page']) ? $_GET['page'] : 1);

        $this->render("show", [
            'title' => "show",
            'tableHeaders' => $this->table->getColumnsComments(),
            'table' => $this->table->setOrderBy($this->table->getPrimaryKey())->getPage($page),
            'pageCount' => $this->table->pageCount(),
            'primaryKey' => $this->table->getPrimaryKey(),
            'currentPage' => $page,
            'className' => $this->shortClassName(),
        ]);
    }

    public function actionDelRow()
    {
        $this->table->del($_GET['id']);
        $this->redirect(HTML::url("{$this->shortClassName()}/ShowTable", ['page' => 1]));
    }

    public function actionEditRow()
    {
        $this->table->edit($_GET['id'], $_POST);
        $this->redirect(HTML::url("{$this->shortClassName()}/ShowTable", ['page' => 1]));
    }

    public function actionAddRow()
    {
        $this->table->add($_POST);
        $this->redirect(HTML::url("{$this->shortClassName()}/ShowTable", ['page' => $this->table->pageCount() ?: 1]));
    }

    public function actionShowAddForm()
    {
        $this->render("showAddEditForm", [
            'fields' => $this->table->getColumnsPropertiesWithoutId(),
            'targetURL' => HTML::url("{$this->shortClassName()}/AddRow")
        ]);
    }

    public function actionShowEditForm()
    {
//         $this->table->runSQL("se lkjhg jgjh");
//        print_r($this->table->getColumnsProperties());

        $this->render("showAddEditForm", [
            'data' => $this->table->getRowById($_GET['id']),
            'fields' => $this->table->getColumnsPropertiesWithoutId(),
            'targetURL' => HTML::url("{$this->shortClassName()}/EditRow", ['id' => $_GET['id']])
        ]);
    }

}
