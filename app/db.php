<?php

class DB extends PDO
{
    private static DB $instance;

    public static function getInstance(): DB
    {
        if (empty(self::$instance)) {
            try {
                $dbOptions = self::getConfig();

                $port = $dbOptions['port'];
                $type = $dbOptions['type'];
                $host = $dbOptions['hostname'];
                $name = $dbOptions['name'];
                $user = $dbOptions['username'];
                $password = $dbOptions['password'];

                $dsn = "$type:host=$host;dbname=$name";

                self::$instance = new DB($dsn, $user, $password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
            } catch (PDOException $pdoe) {
                echo $pdoe->getMessage();
            }
        }
        return self::$instance;
    }


    static function getConfig()
    {
        if (getenv('DATABASE_URL') != "") {
            $herokuDb = parse_url(getenv('DATABASE_URL'));
            $dbopts = [
                'type' => 'pgsql',
                'hostname' => $herokuDb['host'],
                'username' => $herokuDb['user'],
                'password' => $herokuDb['pass'],
                'name' => ltrim($herokuDb['path'], '/')
            ];
        } else {
            $dbopts =
                [
                    'hostname' => $_ENV['PHP_DB_HOST'],
                    'type' => 'mysql',
                    'username' => $_ENV['MYSQL_USER'],
                    'password' => $_ENV['MYSQL_ROOT_PASSWORD'],
                    'name' => $_ENV['MYSQL_DATABASE']
                ];
        }
        return $dbopts;
    }
}