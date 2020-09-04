<?php

class DataBase
{
    // DSN Variables
    private $host;
    private $username;
    private $password;
    private $dbname;

    public function __construct($host, $username, $password, $dbname)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function connect()
    {
        // Set DSN
        $dsn = "mysql:host=". $this->host. ";dbname=". $this->dbname;

        // Create PDO instance
        try
        {
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            echo 'Connected' . '<br>';
        }
        catch (PDOException $e)
        {
            die("Error!: " . $e->getMessage() . "<br/>");
        }    
        return $pdo;
    }
}

?>