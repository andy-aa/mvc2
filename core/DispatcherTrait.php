<?php


trait DispatcherTrait
{
    public $dispatcher = [
        'one/pg{page}' => 'TableOne/ShowTable',
        'one' => 'TableOne/ShowTable',
        'one/form/add' => 'TableOne/ShowAddForm',
        'one/add/row' => 'TableOne/AddRow',
        'one/form/edit{id}' => 'TableOne/ShowEditForm',
        'one/edit{id}' => 'TableOne/EditRow',
        'one/del{id}' => 'TableOne/DelRow',

        'two/pg{page}' => 'TableTwo/ShowTable',
        'two' => 'TableTwo/ShowTable',
        'two/form/add' => 'TableTwo/ShowAddForm',
        'two/add/row' => 'TableTwo/AddRow',
        'two/form/edit{id}' => 'TableTwo/ShowEditForm',
        'two/edit{id}' => 'TableTwo/EditRow',
        'two/del{id}' => 'TableTwo/DelRow',

        'group/pg{page}' => 'UserGroup/ShowTable',
        'group' => 'UserGroup/ShowTable',
        'group/form/add' => 'UserGroup/ShowAddForm',
        'group/add/row' => 'UserGroup/AddRow',
        'group/form/edit{id}' => 'UserGroup/ShowEditForm',
        'group/edit{id}' => 'UserGroup/EditRow',
        'group/del{id}' => 'UserGroup/DelRow',

        'user/pg{page}' => 'Users/ShowTable',
        'user' => 'Users/ShowTable',
        'user/form/add' => 'Users/ShowAddForm',
        'user/add/row' => 'Users/AddRow',
        'user/form/edit{id}' => 'Users/ShowEditForm',
        'user/edit{id}' => 'Users/EditRow',
        'user/del{id}' => 'Users/DelRow',

        '' => 'Site/Home',
    ];

}