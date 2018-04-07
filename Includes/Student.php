<?php

class Student extends Database
{

    private $firstName;
    private $lastName;
    private $email;
    private $level;

    public function setFirstName($value)
    {
        $this->firstName = $value;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setLastName($value)
    {
        $this->firstName = $value;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setEmail($value)
    {
        $this->email = $value;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setLevel($value)
    {
        $this->level = $value;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function getAllStudents()
    {
        //Basic PDO Query using 'query'
        $stmt = $this->connect()->query("SELECT * FROM students");


        while ($row = $stmt->fetch()) {
            print '<table><tr>'
                . '<td>' . $row['id'] . '</td>'
                . '<td>' . $row['firstname'] . '</td>'
                . '<td>' . $row['lastname'] . '</td>'
                . '<td>' . $row['email'] . '</td>'
                . '<td>' . $row['level'] . '</td>'
                . '</tr></table><br>';

        }
    }

    public function positionalGetAllStudents()
    {

        //PDO Query using positional parameter
        $status = 1;

        $sql = 'SELECT * FROM students WHERE status = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$status]);
        $students = $stmt->fetchAll();

        foreach ($students as $student) {
            print '<table><tr>'
                . '<td>' . $student->id . '</td>'
                . '<td>' . $student->firstname . '</td>'
                . '<td>' . $student->lastname . '</td>'
                . '<td>' . $student->email . '</td>'
                . '<td>' . $student->level . '</td>'
                . '</tr></table><br>';
        }
    }


    public function namedGetAllStudents()
    {

        //PDO Query using named parameters
        $status = 1;

        $sql = 'SELECT * FROM students WHERE status = :status';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['status' => $status]);
        $students = $stmt->fetchAll();

        foreach ($students as $student) {
            print '<table><tr>'
                . '<td>' . $student->id . '</td>'
                . '<td>' . $student->firstname . '</td>'
                . '<td>' . $student->lastname . '</td>'
                . '<td>' . $student->email . '</td>'
                . '<td>' . $student->level . '</td>'
                . '</tr></table><br>';
        }
    }

    public function moreThanOneParam()
    {
        //PDO Query selecting more than one column
        $status = 1;
        $lastname = 'Corleone';

        $sql = 'SELECT * FROM students WHERE status = :status && lastname = :lastname';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['status' => $status, 'lastname' => $lastname]);
        $students = $stmt->fetchAll();

        foreach ($students as $student) {
            print '<table><tr>'
                . '<td>' . $student->id . '</td>'
                . '<td>' . $student->firstname . '</td>'
                . '<td>' . $student->lastname . '</td>'
                . '<td>' . $student->email . '</td>'
                . '<td>' . $student->level . '</td>'
                . '</tr></table><br>';
        }
    }

    public function getOne() {

        //Just return one record

        $id = 1;

        $sql = 'SELECT * FROM students WHERE id = :id';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id' => $id]);
        $students = $stmt->fetch(); //Use fetch instead of fetchAll as it's just one record
        //Can't loop through a fetch, though.

        print $students->firstname . " " . $students->lastname;
    }

    public function getRowCount() {

        //Use the rowCount method

        $status = 1;

        $sql = 'SELECT * FROM students where status = :status';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['status' => $status]);
        $studentCount = $stmt->rowCount();

        print $studentCount;

    }

    public function insert() {
        //Pretend like these are coming from a form

        $firstname = 'John';
        $lastname = 'Gotti';
        $email = 'snitchesgetstitches@yahoo.com';
        $level = 'beginner';
        $status = 1;

        $sql = 'INSERT INTO students(firstname, lastname, email, level, status)
                VALUES(:firstname, :lastname, :email, :level, :status)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['firstname' => $firstname, 'lastname' => $lastname,
            'email' => $email, 'level' => $level, 'status' => $status]);

        echo 'Student Added';
    }


    public function update() {
        //Update record three, set John Gotti to Lucky Luciano

        $firstname = 'Lucky';
        $lastname = 'Luciano';
        $id = 3;

        $sql = 'UPDATE students SET firstname = :firstname, lastname = :lastname
        WHERE id = :id';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['firstname' => $firstname, 'lastname' => $lastname, 'id' => $id]);

        echo 'Student Updated';

    }


    public function delete() {
        //Delete Record

        $id = 3;

        $sql = 'DELETE from students WHERE id = :id';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['id' => $id]);

        echo 'Student deleted';

    }

    public function search() {
        //Search for the snitch using 'like'

        $search = "%snitch%";
        $sql = 'SELECT * FROM students WHERE email like :search';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(['search' => $search]);
        $students = $stmt->fetchAll();

        foreach ($students as $student) {
            print '<table><tr>'
                . '<td>' . $student->id . '</td>'
                . '<td>' . $student->firstname . '</td>'
                . '<td>' . $student->lastname . '</td>'
                . '<td>' . $student->email . '</td>'
                . '<td>' . $student->level . '</td>'
                . '</tr></table><br>';
        }
    }

}
