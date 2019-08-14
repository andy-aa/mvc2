<?php


class ErrorHandler
{
    public static function add(string $channel, array $error)
    {
        $_SESSION['errors'][$channel][] = $error;

//        $log = new Logger('MySql');
//        $log->pushHandler(new StreamHandler('logs/error.log', Logger::DEBUG));
//        $log->pushProcessor(new WebProcessor());
//        $log->error("ClassName: " . static::class, $error);

//        (new Logger('MySql'))
//            ->pushHandler(new StreamHandler('logs/error.log', Logger::DEBUG))
//            ->pushProcessor(new WebProcessor())
//            ->error("", $error);
    }

    public static function read()
    {
        if (!empty($_SESSION['errors'])) {
            $res = "<div class=\"errors\">\n";
            foreach ($_SESSION['errors'] as $channelName => $channel) {
                $res .= "\t<div>\n";
                $res .= "\t\t<div class=\"channelName\">$channelName</div>\n";
                foreach ($channel as $error) {
                    $res .= "\t\t<div class=\"error\">\n";
                    foreach ($error as $partName => $part) {
                        $res .= "\t\t\t<div>$part</div>\n";
                    }
                    $res .= "\t\t</div>\n";
                }
                $res .= "\t</div>\n";
            }
            $res .= "</div>\n";

            unset($_SESSION['errors']);

            return $res;
        }

        return '';
    }
}