<?php
include_once 'SQLQueries.php';

class CreateStudent
{

    public $firstname;
    public $lastname;
    public $email;
//    public $level;



    public function validate()
    {
        $errors = array();

        if (isset($_POST['required'])) {
            $this->firstname = $_POST['required']['firstname'];
            $this->lastname = $_POST['required']['lastname'];
            $this->email = $_POST['required']['email'];
//          $this->level = $_POST['required']['level'];
        }

        if (strlen(trim($this->firstname)) === 0) {
            $errors['firstname'] = "First name cannot be blank";
            return false;
        }
        if (strlen(trim($this->lastname)) === 0) {
            $errors['lastname'] = "Last name cannot be blank";
            return false;
        }
        if (strlen(trim($this->email)) === 0) {
            $errors['email'] = "Email cannot be blank";
            return false;
        }
//        if (empty($level)) {
//            $errors['level'] = "Level must be selected";
//            return false;
//        }

        $this->createUser();
    }

    public function createUser()
    {
            $object = new SQLQueries();
            $object->insert($this->firstname, $this->lastname, $this->email);
            header("Location: index.php");
    }
}


    $object = new CreateStudent();
    $object->validate();