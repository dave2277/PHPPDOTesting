<?php
    include_once 'Includes/Database.php';
    include_once 'Includes/SQLQueries.php';
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
                    <input name="firstname" id="first_name" type="text" class="validate">
                    <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s6">
                    <input name="lastname" id="last_name" type="text" class="validate">
                    <label for="last_name">Last Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="email" id="email" type="email" class="validate">
                    <label for="email">Email</label>
                </div>
            </div>
            <label>Browser Select</label>
            <select id="level" name="level" class="browser-default">
                <option value="" disabled selected>Choose your skill level</option>
                <option name="level" value="1">Beginner</option>
                <option name="level" value="2">Intermediate</option>
                <option name="level" value="3">Advanced</option>
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
//Add validation and error handling-- book has some examples
if (isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['level'])){

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $level = $_POST['level'];

    $object = new SQLQueries();
    $object->insert($firstname, $lastname, $email, $level);
    header("Location: index.php");
}




