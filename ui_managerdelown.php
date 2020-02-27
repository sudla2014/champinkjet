<?php
include("./connectdb.php");
$sqls = "DELETE FROM member WHERE member.Mem_Id= '".$_GET["Mem_Id"]."' ";

$mysqli->query($sqls);
header("Refresh:0; url=ui_managerown.php");
?>
