<?php
/**
 * Created by PhpStorm.
 * User: davidgray
 * Date: 4/12/18
 * Time: 1:32 PM
 */

include_once '../Models/SQLQueries.php';

class EditStudent
{

    public $firstname;
    public $lastname;
    public $email;
    public $level;
    public $record;


    public function populate($id) {
        $object = new SQLQueries();
        $record = $object->getOne($id);
        return $record;
    }

    public function getData($record) {
        $this->firstname = $record['firstname'];
        $this->lastname = $record['lastname'];
        $this->email = $record['email'];
        $this->level = $record['level'];
    }


    public function validate()
    {
        $errors = array();

        if (isset($_POST['required'])) {
            $this->firstname = $_POST['required']['firstname'];
            $this->lastname = $_POST['required']['lastname'];
            $this->email = $_POST['required']['email'];
            $this->level = $_POST['required']['level'];
        }


        if (strlen(trim($_POST['required']['firstname'])) === 0) {
            $errors['firstname'] = "First name cannot be blank";

        }
        if (strlen(trim($_POST['required']['lastname'])) === 0) {
            $errors['lastname'] = "Last name cannot be blank";

        }
        if (strlen(trim($_POST['required']['email'])) === 0) {
            $errors['email'] = "Email cannot be blank";

        }
        if ($_POST['required']['level'] == "none") {
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
    $object = new CreateStudent();
    $object->validate();
}

