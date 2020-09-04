<?php

class User extends DataBase
{
    private $id;
    private $username;
    private $password;
    private $email;
    private $connected;

    public function getUsers()
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

    public function setUsers()
    {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $email = $_POST['email'];

        $username = $this->test_input($username);
        $password = $this->test_input($password);
        $email = $this->test_input($email);

        $sql = 'INSERT INTO users(username, password, email) VALUES(?, ?, ?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $password, $email]);

        echo 'User: '. $username . ' added successfully<br>';
    }

    public function logUsers()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = 'SELECT * FROM users WHERE username=?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        $row = $stmt->fetch();

        if (isset($username) && isset($password))
        {
            if ($row->username == $username && password_verify($password, $row->password ))
            {
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                // header ('location: read.php');
            }
            else
            {
                echo '<body onLoad="alert(\'Membre non reconnu...\')">';
                echo '<meta http-equiv="refresh" content="0;URL=index.php">';
            }
        }
        else
        {
            echo 'Les variables du formulaire ne sont pas déclarées.';
        }
    }

    public function updateUsername($old, $new)
    {
        $sql = 'UPDATE users SET username=? WHERE username=?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$new, $old]);
        echo 'User: '. $old . ' changed successfully to: ' . $new . '<br>';
    }

    public function updateEmail($old, $new)
    {
        $sql = 'UPDATE users SET email=? WHERE email=?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$new, $old]);
        echo 'Email: '. $old . ' changed successfully to: ' . $new . '<br>';
    }

    public function deleteUsers($username)
    {
        $sql = 'DELETE FROM users WHERE username=?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        echo 'User: '. $username . ' removed successfully<br>';
    }

    private function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

?>