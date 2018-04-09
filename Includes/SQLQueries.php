<?php
/**
 * Created by PhpStorm.
 * User: davidgray
 * Date: 4/7/18
 * Time: 1:59 PM
 */

class SQLQueries extends Database
{

    private $students;

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

}