<?php
include("./connectdb.php");
$Fname=$_POST['Fname'];
$Lname=$_POST['Lname'];
$Address=$_POST['Address'];
$Phone=$_POST['Phone'];
$Email=$_POST['Email'];
$Line=$_POST['Line'];
$User=$_POST['User'];
$Pass1=$_POST['pass1'];
$Pass2=$_POST['pass2'];
$Status=$_POST['Cus_Status'];
$password = mysqli_real_escape_string($mysqli, $_POST["pass2"]);
           $password = base64_encode($password);
           $sqls="INSERT INTO member (Mem_Id,Mem_Fname,Mem_Lname,Mem_Address,Mem_Phone,Mem_Email,Mem_Line,Mem_User,Mem_Pass, Mem_Status) VALUES (null,'$Fname','$Lname','$Address','$Phone','$Email','$Line','$User','$password','$Status')";
            $mysqli->query($sqls);
?>
<meta http-equiv="refresh" content="0; url=./login.php">
