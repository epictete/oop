<?php

class Validator
{
    public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function string($string)
    {
        $string = $this->test_input($string);
        $string = filter_var($string, FILTER_SANITIZE_STRING);
        return $string;
    }

    public function int($int)
    {
        $int = $this->test_input($int);
        $int = filter_var($int, FILTER_SANITIZE_NUMBER_INT);
        if(!filter_var($int, FILTER_VALIDATE_INT))
        {
            return $int;
        }
    }

    public function float($float)
    {
        $float = $this->test_input($float);
        $float = filter_var($float, FILTER_SANITIZE_NUMBER_FLOAT);
        if(!filter_var($float, FILTER_VALIDATE_FLOAT))
        {
            return $float;
        }
    }

    public function email($email)
    {
        $email = $this->test_input($email);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return $email;
        }
    }
}

?>