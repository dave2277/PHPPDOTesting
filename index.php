<?php
    include_once 'Includes/Database.php';
    include_once 'Includes/Student.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Administration Page</title>
</head>
<body>
<nav></nav>
<h1>List of Users</h1>
<section>
    <?php
    $object = new Student();
    echo $object->getAllStudents();
    ?>
</section>
<footer></footer>
</body>
</html>