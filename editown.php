<?php
include("./connectdb.php");
  $Mem_Id= $_POST["Mem_Id"];
  $Fname=$_POST['Fname'];
  $Lname=$_POST['Lname'];
  $Address=$_POST['Address'];
  $Phone=$_POST['Phone'];
  $Email=$_POST['Email'];
  $Line=$_POST['Line'];
  $User=$_POST['User'];
  $Pass1=$_POST['pass1'];
  $Pass2=$_POST['pass2'];
  $Mem_Status= $_POST['Mem_Status'];
  $password = mysqli_real_escape_string($mysqli, $_POST["pass2"]);
             $password = base64_encode($password);
  if($Mem_Status=='1'){
    $sqls="
    UPDATE member SET member.Mem_Fname='$Fname',member.Mem_Lname='$Lname',member.Mem_Phone='$Phone',member.Mem_Email='$Email',member.Mem_Address='$Address',
    member.Mem_Line= '$Line',member.Mem_User='$User',member.Mem_Pass= '$password' WHERE member.Mem_Id = '$Mem_Id'";
    $mysqli->query($sqls);
    header("Refresh:0; url=ui_managerown.php");
  }elseif ($Mem_Status=='3') {
    // code...
    $sqls="
    UPDATE member SET member.Mem_Fname='$Fname',member.Mem_Lname='$Lname',member.Mem_Phone='$Phone',member.Mem_Email='$Email',member.Mem_Address='$Address',
    member.Mem_Line= '$Line',member.Mem_User='$User',member.Mem_Pass= '$password' WHERE member.Mem_Id = '$Mem_Id'";
    $mysqli->query($sqls);
    header("Refresh:0; url=ui_manageremp.php");
  }else {
    $sqls="
    UPDATE member SET member.Mem_Fname='$Fname',member.Mem_Lname='$Lname',member.Mem_Phone='$Phone',member.Mem_Email='$Email',member.Mem_Address='$Address',
    member.Mem_Line= '$Line',member.Mem_User='$User',member.Mem_Pass= '$password' WHERE member.Mem_Id = '$Mem_Id'";
    $mysqli->query($sqls);
    header("Refresh:0; url=ui_managercus.php");
  }

?>
