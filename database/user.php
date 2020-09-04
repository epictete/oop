<?php

class User extends DataBase
{
    public function getData()
    {
        $sql = 'SELECT * FROM users';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();

        foreach($rows as $row)
        {
            echo $row->username . '<br>';
        }
    }
}

?>