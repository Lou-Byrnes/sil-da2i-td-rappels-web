<?php
$servername = "mysql:host=mysql-loubob.alwaysdata.net;dbname=loubob_devweb";
$username = "loubob";
$password = "B9P4+zoozdip";
global $bdd;

try
{
    $bdd = new PDO($servername, $username, $password);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
