<?php
namespace Model;

class UsersModel extends TableModel
{
    public function getPage(int $page = null): array
    {
        return $this->setSelect('users.id, users.login, users.pass, users.name, users.surname, user_group.description AS user_group')
            ->setFrom('users, user_group')
            ->setWhere('users.user_group_id = user_group.id')
            ->setPageLimit($page)
            ->get();
    }

    public function getUserGroupDescription(): array
    {
        return array_column(
            $this->clearQuery()->setTableName('user_group')->get(),
            'description',
            $this->getPrimaryKey()
        );
    }

}
