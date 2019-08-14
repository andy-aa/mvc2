<?php


class URL
{
    public static $parts;

    public static $cleanURL = Conf::CLEAN_URL;

    public static function init()
    {
        if (self::$cleanURL) {
            
            self::$parts = explode(
                '/',
                trim(
                    parse_url($_SERVER['REQUEST_URI'])['path'],
                    "/"
                )
            );

            if (!empty(self::$parts[0]) && !empty(self::$parts[1])) {
                $_GET["t"] = self::$parts[0];
                $_GET["a"] = self::$parts[1];
            }
        }
    }

    public static function uriEncode(string $url)
    {
        parse_str(
            parse_url($url)['query'],
            $vars
        );

        return self::$cleanURL ? implode('/', $vars) : $url;
    }

    public static function uriDecode(array $rules = [])
    {
        foreach ($rules as $key => $rule) {
            if (isset(self::$parts[$key + 2])) {
                $_GET[$rule] = self::$parts[$key + 2];
            }
        }
    }
}
