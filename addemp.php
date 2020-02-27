<?php
include("./connectdb.php");
$Fname=$_POST['Fname'];
$Lname=$_POST['Lname'];
$Address=$_POST['Address'];
$Phone=$_POST['Phone'];
$Email=$_POST['Email'];
$Line=$_POST['Line'];
$User=$_POST['User'];

$Status=$_POST['Mem_Status'];
$password = mysqli_real_escape_string($mysqli, $_POST["pass2"]);
           $password = base64_encode($password);
if($Status=='3'){
  $sqls="INSERT INTO member (Mem_Id,Mem_Fname,Mem_Lname,Mem_Address,Mem_Phone,Mem_Email,Mem_Line,Mem_User,Mem_Pass, Mem_Status) VALUES (null,'$Fname','$Lname','$Address','$Phone','$Email','$Line','$User','$password','$Status')";
  $mysqli->query($sqls);
  header("Refresh:0; url=ui_manageremp.php");
}else {
  $sqls="INSERT INTO member (Mem_Id,Mem_Fname,Mem_Lname,Mem_Address,Mem_Phone,Mem_Email,Mem_Line,Mem_User,Mem_Pass, Mem_Status) VALUES (null,'$Fname','$Lname','$Address','$Phone','$Email','$Line','$User','$password','$Status')";
  $mysqli->query($sqls);
  header("Refresh:0; url=ui_managerown.php");
}
?>
