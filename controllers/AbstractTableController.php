<?php

abstract class  AbstractTableController extends AbstractController
{
    public $table;
    public $tableName;
    public $viewPatternsPath = 'views/table/';

    public function __construct()
    {
        parent::__construct();

        $this->table = new TableModel($this->tableName, Database::Link());
        $this->table->setPageSize(5);
    }

    public function actionShowTable()
    {
        URL::uriDecode(['page']);
        $page = (int)(isset($_GET['page']) ? $_GET['page'] : 1);

        $this->render("show", [
            'title' => "show",
            'tableHeaders' => $this->table->getColumnsComments(),
            'table' => $this->table->setOrderBy($this->table->getPrimaryKey())->getPage($page),
            'pageCount' => $this->table->pageCount(),
            'primaryKey' => $this->table->getPrimaryKey(),
            'currentPage' => $page,
//            'paginationURL' => "?t={$this->shortClassName()}&a={$this->shortCurrentActionName()}&page=",
            'paginationURL' => URL::uriEncode("?t={$this->shortClassName()}&a={$this->shortCurrentActionName()}&page="),
            'showAddFormURL' => URL::uriEncode("?t={$this->shortClassName()}&a=showaddform"),
            'delRowURL' => "?t={$this->shortClassName()}&a=delrow&id=",
            'showEditFormURL' => URL::uriEncode("?t={$this->shortClassName()}&a=showeditform&id=")
        ]);
    }

    public function actionDelRow()
    {
        URL::uriDecode(['id']);
        $this->table->del($_GET['id']);
        $this->redirect(URL::uriEncode("?t={$this->shortClassName()}&a=showtable"));
    }

    public function actionAddRow()
    {
        $this->table->add($_POST);
        $this->redirect(URL::uriEncode("?t={$this->shortClassName()}&a=showtable&page={$this->table->pageCount()}"));
    }

    public function actionShowAddForm()
    {
        $this->render("showAddEditForm", [
            'fields' => $this->table->getColumnsPropertiesWithoutId(),
            'targetURL' => "?t={$this->shortClassName()}&a=addrow"
        ]);
    }

    public function actionEditRow()
    {
        $this->table->edit($_GET['id'], $_POST);
        $this->redirect(URL::uriEncode("?t={$this->shortClassName()}&a=showtable"));
    }

    public function actionShowEditForm()
    {
//         $this->table->runSQL("se lkjhg jgjh");
//        print_r($this->table->getColumnsProperties());
        URL::uriDecode(['id']);
        $this->render("showAddEditForm", [
            'data' => $this->table->getRowById($_GET['id']),
            'fields' => $this->table->getColumnsPropertiesWithoutId(),
            'targetURL' => "?t={$this->shortClassName()}&a=editrow&id={$_GET['id']}"
        ]);
    }

}
