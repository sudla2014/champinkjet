<?php
require('connectdb.php');
$position = $_POST['position'];
$i=1;
foreach($position as $k=>$v){
    $sql = "Update orders SET Or_Qid=".$i." WHERE Or_Id=".$v;
    $mysqli->query($sql);
	$i++;
}?>
