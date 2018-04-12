<?php
include_once '../Models/SQLQueries.php';

class CreateStudent
{
    public $firstname;
    public $lastname;
    public $email;
    public $level;

    public function validate()
    {
        $errors = array();



        if (isset($_POST['required'])) {
           $_POST['required']['firstname'] = $this->firstname;
           $_POST['required']['lastname'] = $this->lastname;
           $_POST['required']['email'] = $this->email;
           $_POST['required']['level'] = $this->level;
        }


        if (strlen(trim( $_POST['required']['firstname'])) === 0) {
            $errors['firstname'] = "First name cannot be blank";

        }
        if (strlen(trim($this->lastname)) === 0) {
            $errors['lastname'] = "Last name cannot be blank";

        }
        if (strlen(trim($this->email)) === 0) {
            $errors['email'] = "Email cannot be blank";

        }
        if ($this->level == "none") {
            $errors['level'] = "Level must be selected";
        }



        if (empty($errors)){
            $this->createUser();
        } else { ?>
            <div class="container" style="color: darkred; margin-top: 20px; margin-left: 200px;" ><ul>
                <h5>Please fix the following errors: </h5>
                    <?php foreach ($errors as $error){ ?>
                <li>
                   <?php echo $error; ?>
                </li>
            <?php } ?>
            </ul></div>
        <?php }

    }

    public function createUser()
    {
            $object = new SQLQueries();
            $object->insert($this->firstname, $this->lastname, $this->email, $this->level);
            header("Location: index.php");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST['required']);
    $object = new CreateStudent();
    $object->validate();
}

