<?php

class Student extends Database
{

    private $firstName;
    private $lastName;
    private $email;
    private $level;

    public function setFirstName($value) {
        $this->firstName = $value;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setLastName($value) {
        $this->firstName = $value;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setEmail($value) {
        $this->email = $value;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setLevel($value) {
        $this->level = $value;
    }

    public function getLevel() {
        return $this->level;
    }

    public function getAllStudents() {
    //Basic PDO Query using
        $stmt = $this->connect()->query("SELECT * FROM students");




        while ( $row = $stmt->fetch())
        {
                print '<table><tr>'
                            . '<td>' . $row['id'] .       '</td>'
                            . '<td>' . $row['firstname'] .'</td>'
                            . '<td>' . $row['lastname'] . '</td>'
                            . '<td>' . $row['email'] .    '</td>'
                            . '<td>' . $row['level'] .    '</td>'
                        . '</tr></table><br>';

        }
    }

    public function preparedGetAllStudents() {
        //Use positional parameters

        //User Input
        $userid = 2;

        $sql = 'SELECT * FROM students WHERE id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$userid]);
        $students = $stmt->fetchAll();
//        var_dump($students);
        foreach ($students as $student) {
        print '<table><tr>'
            . '<td>' . $student->id .       '</td>'
            . '<td>' . $student->firstname .'</td>'
            . '<td>' . $student->lastname . '</td>'
            . '<td>' . $student->email .    '</td>'
            . '<td>' . $student->level .    '</td>'
            . '</tr></table><br>';
        }

    }


}
