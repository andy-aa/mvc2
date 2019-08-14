<?php

final class HTML
{
    public static function mysqlErrors(string $css_class = 'errors'): string
    {
        $res = '';
        if (!empty($_SESSION['errors']['mysql_errors'])) {
            foreach ($_SESSION['errors']['mysql_errors'] as $e) {
                $res .= "<div class=\"$css_class\">" .
                    "<div>$e[errno]</div>" .
                    "<div>$e[error]</div>" .
                    "<div>$e[sql]</div>" .
                    "</div>";
            }
        }

        unset($_SESSION['errors']['mysql_errors']);

        return $res;
    }

    public static function pagination(
        int $PageCount,
        int $currentPage = null,
        string $currentURL = '',
        string $currentPageClass = 'currentPage',
        string $WrappingClass = 'pagination'
    ): string
    {
        $pagination = '';
        for ($i = 1; $i <= $PageCount; $i++) {
            $pagination .= "<a " . ($currentPage == $i ? "class=\"$currentPageClass\"" : '') .
                " href=\"$currentURL$i\">$i</a>";
        }
        return "<div class=\"$WrappingClass\">$pagination</div>";
    }

    public static function formField($name, $value = null, $type = null, $placeholder = null)
    {
        switch (preg_replace('/\(.*\)/', '', $type)) {
            case 'text':
                return "<textarea name=\"$name\" id=\"$name\" placeholder=\"$placeholder\">$value</textarea> ";
                break;
            case 'float':
                return "<input type=\"number\" name=\"$name\" id=\"$name\" placeholder=\"$placeholder\" value=\"$value\" step=\"any\">";
                break;
            case 'int':
                return "<input type=\"number\" name=\"$name\" id=\"$name\" placeholder=\"$placeholder\" value=\"$value\">";
                break;
            case 'varchar':
            default:
                return "<input type=\"text\" name=\"$name\" id=\"$name\" placeholder=\"$placeholder\" value=\"$value\">";
                break;
        }
    }

    public static function formSelect(array $data, string $name, ?string $selectedKey = null): string
    {
        $res = "<select name=\"$name\" id=\"$name\">";
        foreach ($data as $key => $val) {
            $res .= '<option value="' . $key . '"' . ($key == $selectedKey ? 'selected' : '') . ">$val</option>";
        }
        $res .= '</select>';

        return $res;
    }

}
