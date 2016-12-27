<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 19.10.2016
 * Time: 23:18
 */

namespace Core\Service\Inf\Database;

class DatabaseFactory
{
    private $host;

    private $dbname;

    private $user;

    private $password;

    private $port;

    /**
     * DatabaseFactory constructor.
     * @param $host
     * @param $dbname
     * @param $user
     * @param $password
     */
    public function __construct($host, $dbname, $user, $password, $port)
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->password = $password;
        $this->port = $port;
    }


    public function create(): DatabaseRepository
    {
        try {
            $instance = PDODatabaseRepository::getInstance($this->host, $this->dbname, $this->user, $this->password, $this->port);

            return $instance;

        } catch (\Exception $e){
            throw new \Exception("Błąd w procesie połączenia do bazy danyc - DatabaseFactory.".$e->getMessage());
        }

    }
}