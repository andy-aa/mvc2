<?php

namespace App\Core;

trait DispatcherTrait
{
    public $dispatcher = [
        'one/page{page}.html' => 'TableOne/ShowTable',
        'one' => 'TableOne/ShowTable',
        'one/add_form.html' => 'TableOne/ShowAddForm',
        'one/add' => 'TableOne/AddRow',
        'one/edit_form{id}.html' => 'TableOne/ShowEditForm',
        'one/edit_{id}' => 'TableOne/EditRow',
        'one/del_{id}' => 'TableOne/DelRow',

        'two/page{page}.html' => 'TableTwo/ShowTable',
        'two' => 'TableTwo/ShowTable',
        'two/add_form.html' => 'TableTwo/ShowAddForm',
        'two/add' => 'TableTwo/AddRow',
        'two/edit_form{id}.html' => 'TableTwo/ShowEditForm',
        'two/edit{id}' => 'TableTwo/EditRow',
        'two/del{id}' => 'TableTwo/DelRow',

        'group/page{page}.html' => 'UserGroup/ShowTable',
        'group' => 'UserGroup/ShowTable',
        'group/add_form.html' => 'UserGroup/ShowAddForm',
        'group/add' => 'UserGroup/AddRow',
        'group/edit_form{id}.html' => 'UserGroup/ShowEditForm',
        'group/edit{id}' => 'UserGroup/EditRow',
        'group/del{id}' => 'UserGroup/DelRow',

        'user/page{page}.html' => 'Users/ShowTable',
        'user' => 'Users/ShowTable',
        'user/add_form.html' => 'Users/ShowAddForm',
        'user/add' => 'Users/AddRow',
        'user/edit_form{id}.html' => 'Users/ShowEditForm',
        'user/edit{id}' => 'Users/EditRow',
        'user/del{id}' => 'Users/DelRow',

        '' => 'Site/Home',
    ];

}