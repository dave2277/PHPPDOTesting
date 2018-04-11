<?php
    include_once 'Includes/Database.php';
    include_once 'Includes/CreateStudent.php';
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
                    <?php if (isset($errors['firstname']))?>
                    <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s6">
                    <input name="required[lastname]" id="last_name" type="text" class="validate">
                    <?php if (isset($errors['lastname']))?>
                    <label for="last_name">Last Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="required[email]" id="email" type="email" class="validate">
                    <?php if (isset($errors['email']))?>
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





