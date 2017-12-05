<?php

/**
 * Created by PhpStorm.
 * User: flbernard
 * Date: 01/12/17
 * Time: 14:11
 */
class Connexion extends PDO
{
    private $stmt;

    public function __construct($dsn, $username, $passwd)
    {
        parent::__construct($dsn, $username, $passwd);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function executeQuery(string $query, array $parameters = []) : bool
    {
        $this->stmt = parent::prepare($query);
        foreach ($parameters as $name => $value){
            $this->stmt->bindValue($name, $value[0], $value[1]);
        }
        return $this->stmt->execute();
    }

    public function getResults() : array
    {
        return $this->stmt->fetchAll();
    }
}