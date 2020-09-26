<?php
    session_start();

    require 'classes/Connection.php';
    require 'classes/QueryBuilder.php';
    require 'classes/User.php';
    require 'classes/Team.php';
    require 'classes/Tournament.php';

    $db = new Connection();
    $query = new QueryBuilder($db->connect());
    $user = new User($db->connect());
    $team = new Team($db->connect());
    $tournament = new Tournament($db->connect());
?>