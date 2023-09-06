<?php
require_once "database.php";
//create a object to make a connection to the data base
$dbs = new Database();
//How to exicute sql command
//a. write the string version of the command
$cmd = "select * from programme_deails"; 
//b.create a prepare statement
$statement = $dbs->conn->prepare($cmd);
//c.execute the prepare statement
$statement->execute();
//d.view the result
$rv=$statement->fetchAll(PDO::FETCH_ASSOC);
//e.display the result
print_r($rv);
?>