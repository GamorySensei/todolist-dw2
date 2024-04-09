<?php

$db = new PDO("mysql:host=localhost;dbname=todolist-dw2;charset=utf8mb4","root","", [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);