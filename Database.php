<?php

require_once 'Parameters.php';

class Database
{
    private $servername;
    private $username;
    private $password;
    private $database;


    public function __construct()
    {
        $this->servername = SERVERNAME;
        $this->username = USERNAME;
        $this->password = PASSWORD;
        $this->database = $this->username;
    }

    public function connect()
    {
        try {
            return new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password,array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ));
        }
        catch(PDOException $e)
        {
            echo('Connection failed: ' . $e->getMessage());
            exit();
        }
    }
}

