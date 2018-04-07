<?php
    include_once 'Includes/Database.php';
    include_once 'Includes/Student.php';
    include_once 'Includes/SQLQueries.php';
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
    $object = new SQLQueries();
    $students = $object->getbyStatus(1);

    foreach ($students as $student) {
        print '<table><tr>'
            . '<td>' . $student->id . '</td>'
            . '<td>' . $student->firstname . '</td>'
            . '<td>' . $student->lastname . '</td>'
            . '<td>' . $student->email . '</td>'
            . '<td>' . $student->level . '</td>'
            . '</tr></table><br>';
    }
    ?>
</section>
<footer></footer>
</body>
</html>