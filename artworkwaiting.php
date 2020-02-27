<?php
require("./connectdb.php");
// include composer autoload
session_start();
$Per_Id=$_SESSION['Userid'];
$Per_name=$_SESSION['user'];
$Or_Id =$_GET['Or_Id'];
  $sqls="UPDATE orders SET orders.St_Id='12',orders.Or_Memid='$Per_Id'  WHERE orders.Or_Id ='$Or_Id'";
$mysqli->query($sqls);

header("Refresh:0; url=ui_artworkmanager.php");
// END LOOP FOR E
?>
