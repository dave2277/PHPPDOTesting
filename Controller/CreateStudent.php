<?php
include_once '../Models/SQLQueries.php';

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

        }
        if (strlen(trim($this->lastname)) === 0) {
            $errors['lastname'] = "Last name cannot be blank";

        }
        if (strlen(trim($this->email)) === 0) {
            $errors['email'] = "Email cannot be blank";

        }
//        if (empty($level)) {
//            $errors['level'] = "Level must be selected";
//            return false;
//        }

//        print_r($errors);

        if (empty($errors)){
            $this->createUser();
        } else {
                foreach ($errors as $error){
                    echo $error;
            }
        }

    }

    public function createUser()
    {
            $object = new SQLQueries();
            $object->insert($this->firstname, $this->lastname, $this->email);
            header("Location: index.php");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $object = new CreateStudent();
    $object->validate();
}

