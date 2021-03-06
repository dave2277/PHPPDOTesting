<?php
    ob_start();
    include_once '../Includes/Database.php';
    include_once '../Models/SQLQueries.php';
    include_once '../Controller/EditStudent.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Administration Page</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <link href="../Includes/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>List of Gansters</h1>
            <div class="section">
                <?php
                    $object = new SQLQueries();
                    $students = $object->getbyStatus(1);
                 ?>
                <table class="table-responsive">
                    <?php
                    foreach ($students as $student) {
                        print '<form action="index.php" method="post"><tr>'
                            . '<td>' . $student->firstname . '</td>'
                            . '<td>' . $student->lastname . '</td>'
                            . '<td>' . $student->email . '</td>'
                            . '<td>' . $student->level . '</td>'
                            . '<td> 
                                <button name="edit" type="submit" class="btn-flat">Edit</button>
                               </td>
                               <td>
                                <button name="delete" type="submit" class="btn-flat">Delete</button>
                               </td>
                               </tr></form>';
                    }
                ?>
                    </table><br>
                <form action="index.php" method="post">
                    <button name="add" type="submit" class="waves-effect waves-light btn">Add New Student</button></form>
            </div>
    </div>
<footer></footer>
</body>
</html>

<?php
if (isset($_POST['delete'])){
    $object = new SQLQueries();
    $object->delete($student->id);
    header("Location: index.php");
} elseif (isset($_POST['add'])){
    header("Location: addnew.php");
} elseif (isset($_POST['edit'])){
    $object = new EditStudent();
    $object->populate($student->id);
    header("Location: edit.php");
}

?>