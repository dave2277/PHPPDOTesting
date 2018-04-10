<?php
    include_once 'Includes/Database.php';
    include_once 'Includes/SQLQueries.php';
    $errors = [];

    echo display_errors($errors);
    function display_errors($errors=array()) {
    $output = '';
    if(!empty($errors)) {
        $output .= "<div class=\"errors\">";
        $output .= "Please fix the following errors:";
        $output .= "<ul>";
        foreach($errors as $error) {
            $output .= "<li>" . $error . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Administration Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link href="Includes/styles.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <form action="addnew.php" method="post" class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input name="required[firstname]" id="first_name" type="text" class="validate">
                    <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s6">
                    <input name="required[lastname]" id="last_name" type="text" class="validate">
                    <label for="last_name">Last Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="required[email]" id="email" type="email" class="validate">
                    <label for="email">Email</label>
                </div>
            </div>
            <label>Browser Select</label>
            <select id="level" name="required[level]" class="browser-default">
                <option value="" disabled selected>Choose your skill level</option>
                <option value="1">Beginner</option>
                <option value="2">Intermediate</option>
                <option value="3">Advanced</option>
            </select>
            <br>
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
            </button>
        </form>
    </div>
</div>
</body>
</html>


<?php

    function validate(){
        if(empty($firstname)){
            $errors[] = "First name cannot be blank";
            return false;
        }
        if(empty($lastname)){
            $errors[] = "Last name cannot be blank";
            return false;
        }
        if(empty($email)){
            $errors[] = "Email cannot be blank";
            return false;
        }
        if(empty($level)){
            $errors[] = "Level must be selected";
            return false;
        }

        $object = new SQLQueries();
        $object->insert($firstname, $lastname, $email, $level);
        header("Location: index.php");
    }

if (isset($_POST['required'])) {
    $firstname = $_POST['required']['firstname'];
    $lastname = $_POST['required']['lastname'];
    $email = $_POST['required']['email'];
//    $level = $_POST['required']['level'];

    validate();
}


?>


