<?php
    include_once 'Includes/Database.php';
    include_once 'Includes/Student.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Administration Page</title>
    <link href="Includes/styles.css" rel="stylesheet">
</head>
<body>
<nav></nav>
<h1>List of Users</h1>
<section>
    <?php
    $object = new Student();
    echo $object->search();
    ?>
</section>
<footer></footer>
</body>
</html>