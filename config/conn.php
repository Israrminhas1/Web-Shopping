<?php

try {
    return new PDO('mysql:host=localhost;dbname=shop', 'root', '');
} catch (PDOException $exception) {
    error_log($exception->getMessage());
    die('Something went wrong. Please, try again later.'.$exception->getMessage());
}

