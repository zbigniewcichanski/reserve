<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 18.07.2016
 * Time: 14:13
 */

namespace Core\Service\Inf\Database;

class PDODatabaseRepository implements DatabaseRepository
{
    private static $instance;

    protected $db;

    private function __construct($host, $dbname, $user, $password, $port)
    {
        try {
            $db = new \PDO('mysql:host='.$host.';port='.$port.';dbname='.$dbname.';charset=utf8mb4', $user, $password);
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            $this->db = $db;
        } catch (\Exception $e) {
            throw new \Exception("Błąd połączenia z bazą danych Team Repository.".$e->getMessage());
        }
    }

    public static function getInstance($host, $dbname, $user, $password, $port)
    {
        if(self::$instance === null){
            self::$instance = new PDODatabaseRepository($host, $dbname, $user, $password, $port);
        }
        return self::$instance;
    }


    public function db()
    {
        return $this->db;
    }
}
