<?php
include_once 'lib/config.php';
include_once 'lib/Database.php';

$db = new Database();

$id = base64_decode($_GET['id']);
$query = "DELETE FROM `users` WHERE `id` = '$id'";
$result = $db->delete($query);
if ($result){
    header("Location: index.php");
}

