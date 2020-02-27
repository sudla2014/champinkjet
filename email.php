<?php
require("./connectdb.php");
// include composer autoload
include('./lib/phpqrcode/qrlib.php');
session_start();
$Mem_Id=$_SESSION['Userid'];
$Mem_name=$_SESSION['user'];
  $Or_Id =$_GET['Or_Id'];

  $sqls="UPDATE orders SET orders.St_Id=4,orders.Or_Memid='$Mem_Id' WHERE orders.Or_Id ='$Or_Id'";
  $mysqli->query($sqls);
  $sql = "
  SELECT * FROM member INNER JOIN orders ON member.Mem_Id=orders.Mem_Id INNER JOIN status on orders.St_Id=status.St_Id WHERE orders.Or_Id='$Or_Id'
  ";
  $result=$mysqli->query($sql);
  if($result && $result->num_rows>0){// คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
    while($row = $result->fetch_assoc()){ // วนลูปแสดงรายการ
      $Or_Id= $row['Or_Id'];
      $Or_Details= $row["Or_Details"];
      $Or_WorkDay= $row["Or_WorkDay"];
      $Or_ReceiveDay= $row["Or_ReceiveDay"];
      $Or_Qrcode= $row["Or_Qrcode"];
      $Or_Qnumber= $row["Or_Qnumber"];
      $Mem_Id= $row["Mem_Id"];
      $Mem_Fname = $row["Mem_Fname"];
      $Mem_Email = $row["Mem_Email"];
      $Mem_Lname = $row["Mem_Lname"];
      $St_Id= $row["St_Id"];
      $St_Name= $row["St_Name"];

          $tempDir = "./uploads/picqrcode/";
        $codeContents = "http://192.168.1.27/thechampinkjet/vieworder.php?id=$Or_Id";
          $fileName = $Or_Id.$Or_Qnumber.".png";
          $name=md5($codeContents);
          $pngAbsoluteFilePath = $tempDir.$fileName;
          $urlRelativeFilePath = $tempDir.$fileName;
         if (!file_exists($pngAbsoluteFilePath)) {
        QRcode::png($codeContents, $pngAbsoluteFilePath,QR_ECLEVEL_L, 4);
            //echo '<hr />';
        } else {
          //  echo 'File already generated! We can use this cached file to speed up site on common codes!';

        }
      //  echo '<hr />';
    //    echo 'Server PNG File: '.$pngAbsoluteFilePath;
        //echo '<hr />';
         $sqls="UPDATE orders SET orders.Or_Qrcode='$fileName' WHERE orders.Or_Id=$Or_Id";
        $mysqli->query($sqls);
      }
    }
    //    echo '<img src="'.$urlRelativeFilePath.'" />';
header("Refresh:0; url=ui_orderall.php");
// END LOOP FOR EMAIL RECIEVE
?>
