<?php
    session_start();

    require 'classes/Connection.php';
    require 'classes/QueryBuilder.php';
    require 'classes/User.php';
    require 'classes/Team.php';
    require 'classes/Tournament.php';
    require 'classes/Post.php';
    require 'classes/Role.php';
    require 'classes/Country.php';
    require 'classes/Payment.php';
    require 'classes/Player.php';
    require 'classes/Picture.php';

    $db = new Connection();
    $query = new QueryBuilder($db->connect());
    $user = new User($db->connect());
    $team = new Team($db->connect());
    $tournament = new Tournament($db->connect());
    $post = new Post($db->connect());
    $role = new Role($db->connect());
    $country = new Country($db->connect());
    $payment = new Payment($db->connect());
    $player = new Player($db->connect());
    $picture = new Picture($db->connect());
?>