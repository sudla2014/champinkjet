<?php
include("./connectdb.php");
$sqls = "DELETE FROM Member WHERE Member.Mem_Id= '".$_GET["Mem_Id"]."' ";

$mysqli->query($sqls);
header("Refresh:0; url=ui_managercus.php");
?>
