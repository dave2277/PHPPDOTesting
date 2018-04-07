<?php

return [

    'getbyStatus' => 'SELECT
    * 
    FROM 
    `students` 
    WHERE 
    `status` = :status',


    'getbyStatusAndLastName' => 'SELECT
    * 
    FROM 
    `students` 
    WHERE 
    `status` = :status && `lastname` = :lastname',

    'moreThanOneParam' => 'SELECT
    *
    FROM
    `students` 
    WHERE => 
    `id` = :id',

    'insert' => 'INSERT INTO `students` (
        `firstname`,
        `lastname`,
        `email`,
        `level`,
        `status`) VALUES (
        :firstname,
        :lastname,
        :email,
        :level,
        :status)',

    'update' => 'UPDATE `students` SET 
        `firstname` = :firstname,
        `lastname` = :lastname,
        `email` = :email,
        `level` = :level,
        `status` = :status
        WHERE id = :id',


    'delete' => 'DELETE from `students` 
        WHERE id = :id',


    'searchEmail' => 'SELECT * FROM `students`
        WHERE email like :search'
];
