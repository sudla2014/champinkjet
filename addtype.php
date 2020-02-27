<?php
include("./connectdb.php");
$Ty_Name=$_POST['Ty_Name'];
$Ty_NameDetail=$_POST['Ty_NameDetail'];
$Ty_Price=$_POST['Ty_Price'];
    $sqls="INSERT INTO type (Ty_Name,Ty_NameDetail,Ty_Price) VALUES ('$Ty_Name','$Ty_Name $Ty_NameDetail','$Ty_Price')";
    $mysqli->query($sqls);
?>
<meta http-equiv="refresh" content="0; url=./ui_producttype.php">
