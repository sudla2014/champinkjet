<?php
require("./connectdb.php");
// include composer autoload
session_start();
$Per_Id=$_SESSION['Userid'];
$Per_name=$_SESSION['user'];
$Or_Cause = $_POST['Or_Cause'];
$Or_Id = $_POST['Or_Id'];
$sql = "UPDATE orders set orders.Or_Cause= '$Or_Cause'  , orders.St_Id=1 where  orders.Or_Id = '$Or_Id'  ";
$mysqli->query($sql);
header("Refresh:0; url=ui_orderall.php");
?>
