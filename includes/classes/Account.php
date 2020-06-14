<?php

class Account {

    private $con;
    private $errorArray; //utilisé pour push des erreurs de formulaires 

    public function __construct($con) {
        $this->errorArray = [];
        $this->con = $con;
    }

    public function register($username, $firstName, $lastName, $email, $email2, $password, $password2) {
        $this->validateUsername($username);
        $this->validateFirstName($firstName);
        $this->validateLastName($lastName);
        $this->validateEmails($email, $email2);
        $this->validatePasswords($password, $password2);

        if(empty($this->errorArray)) {
            return $this->insertUserDetails($username, $firstName, $lastName, $email, $password); 
        } else {
            return false;
        }
    }

    public function getError(string $error) {
        if(!in_array($error, $this->errorArray)) {
            $error = "";
        }
        return "<span class='error-message'>$error</span>";
    }

    public function login($un, $pw) {
        $pw = md5($pw);
        $query = mysqli_query($this->con, "SELECT * FROM users WHERE username = '$un' AND password = '$pw'");
        if(mysqli_num_rows($query) == 1) {
            echo '<pre>' . print_r(mysqli_num_rows($query), 1) . '</pre>';
            return true;
        }
        else {
            echo '<pre>' . print_r(mysqli_num_rows($query), 1) . '</pre>';
            array_push($this->errorArray, Constants::$loginFailed);
            return false;
        }
    }

    private function insertUserDetails($un, $fn, $ln, $em, $pw) {
        $encryptedPw = md5($pw);
        $profilePic = "assets/images/profil-pics/head_emerald.png";
        $date = date("Y-m-d");

        $result = mysqli_query($this->con, "INSERT INTO users VALUES (NULL, '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')");

        return $result;
    }

    private function validateUsername($username) {
        if(strlen($username) > 25 || strlen($username) < 4) {
            array_push($this->errorArray, Constants::$usernameCharacters);
            return;
        }

        // check if username exists
        $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$un'");
        if(mysqli_num_rows($checkUsernameQuery) != 0) {
            array_push($this->errorArray, Constants::$usernameTaken);
            return;
        }
    }

    private function validateFirstName($firstName) {
        if(strlen($firstName) > 25 || strlen($firstName) < 4) {
            array_push($this->errorArray, Constants::$firstNameCharacters);
            return;
        }
    }

    private function validateLastName($lastName) {
        if(strlen($lastName) > 25 || strlen($lastName) < 4) {
            array_push($this->errorArray, Constants::$lastNameCharacters);
            return;
        }
    }

    private function validateEmails($em, $em2) {
        if($em != $em2) {
            array_push($this->errorArray, Constants::$emailsDoNotMatch);
            return;
        }

        if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }

        //TODO: check that email hasn't already be used
        $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$un'");
        if(mysqli_num_rows($checkEmailQuery) != 0) {
            array_push($this->errorArray, Constants::$emailTaken);
            return;
        }
    }

    private function validatePasswords($pw, $pw2) {
        if($pw != $pw2) {
            array_push($this->errorArray, Constants::$passwordDoNotMatch);
            return;
        }

        if(preg_match('/[^A-Za-z0-9]/', $pw)) {
        array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
        return;
        }
        if(strlen($pw) > 30 || strlen($pw) < 5) {
            array_push($this->errorArray, Constants::$passwordCharacters);
            return;
        }
    }
}




