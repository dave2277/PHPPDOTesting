<?php
/**
 * Created by PhpStorm.
 * User: davidgray
 * Date: 4/7/18
 * Time: 1:59 PM
 */

class SQLQueries extends Database
{

    public function statement($sql) {
        return $this->connect()->prepare($sql);
    }

    public function getbyStatus($status) {
        $sql = 'SELECT * FROM `students` WHERE `status` = :status';
        $stmt = $this->statement($sql);
        $stmt->execute(['status' => $status]);
        $students = $stmt->fetchAll();
        return $students;
    }

    public function delete($id) {
        $sql = 'DELETE from students WHERE id = :id';
        $stmt = $this->statement($sql);
        $stmt->execute(['id' => $id]);
    }

    public function update($id, $firstname, $lastname, $email, $level) {

        $sql = 'UPDATE `students` SET firstname = :firstname, 
                  lastname = :lastname,
                  email = :email,
                  level = :level,
                  status = :status WHERE id = :id';
        $stmt = $this->statement($sql);
        $stmt->execute(['firstname' => $firstname, 'lastname' => $lastname, 'id' => $id,
            'email' => $email, 'level' => $level]);
    }

    public function insert($firstname, $lastname, $email, $level) {
        $sql = 'INSERT INTO `students` (firstname, lastname, email, level)
                VALUES(:firstname, :lastname, :email, :level)';
        $stmt = $this->statement($sql);
        $stmt->execute(['firstname' => $firstname, 'lastname' => $lastname,
            'email' => $email, 'level' => $level]);
    }

}