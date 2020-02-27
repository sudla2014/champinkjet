<?php
include("./connectdb.php");
$sqls = "DELETE FROM type WHERE type.Ty_Id= '".$_GET["Ty_Id"]."' ";

$mysqli->query($sqls);
header("Refresh:0; url=ui_producttype.php");
?>
