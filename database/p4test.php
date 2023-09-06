<?php
require_once "database.php";
require_once "ProgrammeDB.php";
require_once "DepartmentDB.php";
$dbo = new Database();
//$pdo =  new ProgrammeDB();
$ddo =  new DepartmentDB();
$rv = $ddo-> getAllDepartments($dbo);
print_r($rv);
/*
$rv = $pdo-> getProgrammeDetailsById($dbo,45);
print_r($rv);

echo("<br>");
$rv = $pdo -> updateProgrammeDetails($dbo,45,"its a cat","FFF",34,"X","Y",4);
print_r($rv);
echo("<br>");
$rv = $pdo-> getProgrammeDetailsById($dbo,45);
print_r($rv);
/*$rv = $pdo -> getAllProgrammes($dbo);
print_r($rv);

echo("<br>");
$rv = $pdo -> createNewProgramme($dbo,"ECE","Btech in electronics",8,"UG","BTECH",4);
echo($rv);

echo("<br>");
$rv = $pdo -> getAllProgrammes($dbo);
print_r($rv);*/

?>