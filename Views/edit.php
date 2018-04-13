<?php
    include_once '../Includes/Database.php';
    include_once '../Controller/CreateStudent.php';
    include_once '../Models/SQLQueries.php';
    include_once '../Controller/EditStudent.php';

    $object = new EditStudent();
    $object->getData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Administration Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link href="../Includes/styles.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <form action="edit.php" method="post" class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input name="required[firstname]" id="first_name" type="text" value="<?php ?>" class="validate">

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
            <div>
            <label for="level">Skill level</label>
            <select id="level" name="required[level]" class="browser-default" selected="none">
                <option selected="selected" value="none">Choose your skill level</option>
                <option value="beginner">Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="advanced">Advanced</option>
            </select>
            <br>
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
            </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>

<?php


?>




