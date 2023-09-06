<?php

$root=$_SERVER["DOCUMENT_ROOT"];
include_once $root."/sms/database/database.php";
include_once $root."/sms/database/ProgrammeDB.php";
include_once $root."/sms/database/DepartmentDB.php";

$action = $_POST["action1"];

if($action=="getprogrammedetails")
{
    $dbo = new Database();
    $pdo = new ProgrammeDB();
    $result = $pdo -> getAllProgrammes($dbo);
    $rv = json_encode($result);
    echo($rv);
    exit();
}
if($action=="getdepartmentdetails")
{
    $dbo=new Database();
    $ddo= new DepartmentDB();
    $result=$ddo->getAllDepartments($dbo);
    $rv = json_encode($result);
    echo($rv);
    exit();
}

if($action=="saveprogramdetails")
{
     $txtcode=$_POST['txtcode'];
     $txttitle=$_POST['txttitle'];
     $mynos=$_POST['mynos'];
     $dddepartment=$_POST['dddepartment'];
     $ddgl=$_POST['ddgl'];
     $ddtl=$_POST['ddtl'];
    // $dbo,$code,$title,$nos,$gl,$tl,$did
     $dbo = new Database();
     $pdo = new ProgrammeDB();
     $rv=$pdo->createNewProgramme($dbo,$txtcode,$txttitle,$mynos,$ddgl,$ddtl,$dddepartment);
     if($rv==1)
     {
        $rv=$pdo->getAllProgrammes($dbo);
     }

     echo json_encode($rv);
     exit();
}

if($action=="updateprogramdetails")
{
     $txtcode=$_POST['txtcode'];
     $txttitle=$_POST['txttitle'];
     $mynos=$_POST['mynos'];
     $dddepartment=$_POST['dddepartment'];
     $ddgl=$_POST['ddgl'];
     $ddtl=$_POST['ddtl'];
     $pid=$_POST['pid'];
    // $dbo,$code,$title,$nos,$gl,$tl,$did
     $dbo = new Database();
     $pdo = new ProgrammeDB();
     $rv=$pdo->updateProgrammeDetails($dbo,$pid,$txttitle,$txtcode,$mynos,$ddgl,$ddtl,$dddepartment);
     if($rv==1)
     {
        $rv=$pdo->getAllProgrammes($dbo);
     }

     echo json_encode($rv);
     exit();
}




if($action=="deleteprogramme")
{
   
     $pid=$_POST['pid'];
    // $dbo,$code,$title,$nos,$gl,$tl,$did
     $dbo = new Database();
     $pdo = new ProgrammeDB();
     $rv=$pdo->deleteProgramme($dbo,$pid);
     if($rv==1)
     {
        $rv=$pdo->getAllProgrammes($dbo);
     }

     echo json_encode($rv);
     exit();
}
?>