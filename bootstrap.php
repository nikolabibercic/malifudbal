<?php
    session_start();

    require 'classes/Connection.php';
    require 'classes/QueryBuilder.php';
    require 'classes/User.php';

    $db = new Connection();
    $query = new QueryBuilder($db->connect());
    $user = new User($db->connect());
?>