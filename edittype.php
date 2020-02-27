<?php
include("./connectdb.php");
$Ty_Id= $_POST["Ty_Id"];
$Ty_Name=$_POST['Ty_Name'];
$Ty_NameDetail=$_POST['Ty_NameDetail'];
$Ty_Price=$_POST['Ty_Price'];
$sqls="
UPDATE type SET type.Ty_Name='$Ty_Name',type.Ty_NameDetail='$Ty_NameDetail',type.Ty_Price='$Ty_Price' WHERE type.Ty_Id = '$Ty_Id'";
$mysqli->query($sqls);
header("Refresh:0; url=ui_producttype.php");
?>
