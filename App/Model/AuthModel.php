<?php
namespace Model;


class AuthModel extends TableModel
{
    public function getUserData(string $login, string $pass): ?array
    {
        $sql = <<<SQL
SELECT users.*, user_group.cod, user_group.description
FROM user_group, users
WHERE user_group.id = users.user_group_id and  login = '$login' AND pass = '$pass'
SQL;

        return $this->runSQL($sql)[0] ?? null;
    }
}