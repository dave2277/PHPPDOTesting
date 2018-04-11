<?php

class CreateStudent
{

    public $firstname;
    public $lastnmae;
    public $email;
    public $level;

    public function createUser()
    {
        if (isset($_POST['required'])) {
            $this->firstname = $_POST['required']['firstname'];
            $this->lastnmae = $_POST['required']['lastname'];
            $this->email = $_POST['required']['email'];
            $this->level = $_POST['required']['level'];
            $this->validate();
        }
    }

    public function validate()
    {

        if (empty($firstname)) {
            $errors[] = "First name cannot be blank";
            return false;
        }
        if (empty($lastname)) {
            $errors[] = "Last name cannot be blank";
            return false;
        }
        if (empty($email)) {
            $errors[] = "Email cannot be blank";
            return false;
        }
        if (empty($level)) {
            $errors[] = "Level must be selected";
            return false;
        }

        $object = new SQLQueries();
        $object->insert($firstname, $lastname, $email, $level);
        header("Location: index.php");
    }
}