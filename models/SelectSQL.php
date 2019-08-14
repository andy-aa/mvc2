<?php


class SelectSQL
{
    protected const QUERY_DEFAULT = [
        'SELECT' => '*',
        'FROM' => '',
        'WHERE' => null,
        'GROUP BY' => null,
        'HAVING' => null,
        'ORDER BY' => null,
        'LIMIT' => null
    ];

    protected $queryCustom = [];

    public function __get($name)
    {
        if (array_key_exists($name, self::QUERY_DEFAULT)) {
            return $this->queryCustom[$name];
        }

        return '';
    }

    public function __set($name, $value)
    {
        if (array_key_exists($name, self::QUERY_DEFAULT)) {
            $this->queryCustom[$name] = $value;
        }
    }

    public function getSQL(): string
    {
        $sql = '';

        foreach (array_merge(self::QUERY_DEFAULT, $this->queryCustom) as $k => $v) {
            if (!empty($v)) {
                $sql .= "$k $v\n";
            }
        }

        return substr_replace($sql, ';', -1);
    }
}