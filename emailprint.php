<?php
require("./connectdb.php");
// include composer autoload
session_start();
$Per_Id=$_SESSION['Userid'];
$Per_name=$_SESSION['user'];
if(isset($_POST['Or_Id'])){
  $Or_Id =$_POST['Or_Id'];
}
if(isset($_POST['St_Id'])){
  $id =$_POST['St_Id'];
}


if(isset($_POST['Mem_Email'])){
  $EmailPer = $_POST['Mem_Email'];
}
if(isset($_POST['submit']))
{

  $sqls="UPDATE orders SET orders.St_Id='$id',orders.Or_Memid='$Per_Id' WHERE orders.Or_Id ='$Or_Id'";
  $mysqli->query($sqls);

}
header("Refresh:0; url=ui_printwork.php");
// END LOOP FOR E
?>
