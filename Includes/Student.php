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
        $stmt = $this->connect()->query("SELECT * FROM student");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            var_dump($row);
                print "<br>" . $row['id'] . "<br>" .
                    $row['firstname'] . "<br>" .
                    $row['lastname'] . "<br>" .
                    $row['email'] . "<br>" .
                    $row['level'];

        }
    }


}
