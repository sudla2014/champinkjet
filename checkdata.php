<?php
include("connectdb.php");
if(isset($_POST['user_name']))
{
 $name=$_POST['user_name'];

 $checkdata=" SELECT Mem_User FROM member WHERE Mem_User='$name' ";
$result=$mysqli->query($checkdata);
if($result && $result->num_rows>0)
 {
echo " <p style='color:red;'><b>\"$name\"</b>ชื่อผู้ใช้นี้ถูกใช้ไปแล้ว</p>";
 }
 else
 {
  echo "OK";
 }
 exit();
}
?>
