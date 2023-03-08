<?php

class PasswordChecker {
    public $password;

    public function __construct($password) {
        $this->password = $password;
    }

    public function checker() {

        $strength = 0;

        // check length of password
        if (strlen($this->password) >= 8) {
            $strength += 30;
        }elseif(strlen($this->password >= 6)) {
            $strength += 10;
        }

        // check for uppercase letters
        if (preg_match('/[A-Z]/', $this->password)) {
            $strength += 20;
        }

        // check for lowercase letters
        if(preg_match('/[a-z]/', $this->password)) {
            $strength += 20;
        }

        // chck for numbers
        if(preg_match('/\d/', $this->password)) {
            $strength += 20;
        }

        // check for special characters
        if (preg_match('/[^A-Za-z0-9]/', $this->password)) {
            $strength += 10;
        }

        // return result
        return 'Password Strength: '.$strength. '%';

    }
}

$passwordChecker = new PasswordChecker('Password@123');
echo $passwordChecker->checker();