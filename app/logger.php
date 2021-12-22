<?php

class Logger
{
    public static function log($level, $class, $message)
    {
        $date = DateTime::createFromFormat('U.u', microtime(true));
        $output = sprintf("%s %s - [%s] %s%s",
            $date->format(DATETIME::ISO8601),
            $level,
            $class,
            $message,
            PHP_EOL);
        $handler = fopen('articles-application.log', 'a+');
        fwrite($handler, $output);
        fclose($handler);
    }
}

