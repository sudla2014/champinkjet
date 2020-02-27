<?php
      include("./connectdb.php");
      session_start();

      $fname = $_SESSION['user'];

$count_list = 0;
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];
$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/fonts',
    ]),
    'fontdata' => $fontData + [
        'thsarabun' => [
            'R' => 'THSarabunNew.ttf',
            //'I' => 'THSarabunNew Italic.ttf',
            //'B' => 'THSarabunNew Bold.ttf',
        ]
    ],
		'default_font_size' => 16,
    'default_font' => 'thsarabun'
]);
ob_start();     //เริ่มเก็บ่ค่า
?>
<style>
    .row {
        padding: 0px !important;
        margin: 0px !important;
    }

    .row>div {
        margin: 0px !important;
        padding: 0px !important;
    }

    .mr {
        margin-right: auto;
    }

    .ml {
        margin-left: auto;
    }

    .col-p-1 {
        width: 7.83333333% !important;
    }

    .col-p-2 {
        width: 16.16666667% !important;
    }

    .col-p-3 {
        width: 24.5% !important;
    }

    .col-p-4 {
        width: 32.83333333% !important;
    }

    .col-p-5 {
        width: 41.16666667% !important;
    }

    .col-p-6 {
        width: 49.5% !important;
    }

    .col-p-7 {
        width: 57.83333333% !important;
    }

    .col-p-8 {
        width: 66.16666667% !important;
    }

    .col-p-9 {
        width: 74.5% !important;
    }

    .col-p-10 {
        width: 82.83333333% !important;
    }


    .col-p-11 {
        width: 91, 16666666% !important;
    }

    .col-p-12 {
        width: 99.5% !important;
    }

</style>
<!--หัวไฟล์-->

<caption>
    <center><strong>
            <font size="5"><u>ใบสั่งงานหน้าร้าน</u></font>
        </strong></center>
</caption>
<!-- <caption><center><strong><font size="6"><u> ประปาหมู่บ้านบ้านคลองบุหรี่</u></font></strong></center></caption> -->
<table class="col-p-12">
    <tr>
        <?php
    $Or_Id = $_GET['Or_Id'];
    $num=0;
    $sql = "
    SELECT * FROM orders INNER JOIN member ON member.Mem_Id=orders.Mem_Id
      INNER JOIN type ON type.Ty_Id=orders.Ty_Id
      INNER JOIN status ON status.St_Id=orders.St_Id INNER JOIN style ON style.S_Id=orders.S_Id where orders.Or_Id = '$Or_Id'
  ";
  $result=$mysqli->query($sql);
  if($result && $result->num_rows>0){// คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
      while($row = $result->fetch_assoc()){ // วนลูปแสดงรายการ
          $num++;
  		 $Or_Id= $row['Or_Id'];
       $Or_Cause= $row['Or_Cause'];
       $Or_Width= $row['Or_Width'];
       $Or_Long= $row['Or_Long'];
          $Or_Details= $row["Or_Details"];
          $Or_WorkDay= $row["Or_WorkDay"];
          $Or_ReceiveDay= $row["Or_ReceiveDay"];
          $Or_Time= $row["Or_Time"];
          $Or_Qrcode= $row["Or_Qrcode"];
          $Or_Qnumber = $row["Or_Qnumber"];
          $Mem_Id= $row["Mem_Id"];
  		$Mem_Fname = $row["Mem_Fname"];
  		$Mem_Lname = $row["Mem_Lname"];
      $Mem_Phone= $row["Mem_Phone"];
          $Mem_Email = $row["Mem_Email"];
  		$Mem_Line = $row["Mem_Line"];
          $St_Id= $row["St_Id"];
            $St_Name= $row["St_Name"];
            $S_Id= $row["S_Id"];
              $S_Name= $row["S_Name"];
            $Ty_Id= $row["Ty_Id"];
            $Ty_Name= $row["Ty_Name"];
          }}
  ?>
        <td class="col col-p-4 ml">
            <img src="./assets/brand/cropped-Logo-Long.png" alt="" height="30" />
            <br>
            ร้านแชมป์อิงค์เจ็ท จำกัด
            1205/8 หมู่ 10 ถ.สุวรรณศร ต.วัฒนานคร อ.วัฒนานคร จ.สระแก้ว 27160
              <br>
            ติดต่องานป้าย : 086-8326867 และ
            086-3617988</td>
        <td class="col col-p-6" align="right"><?php
$DMYDate2=date('Y-m-d');
$CreateDateEnd1 = date_create($DMYDate2);
$DMYDate3 = date_format($CreateDateEnd1,"d/m/Y");

echo "หมายเลขคิว "."<strong>".$Or_Qnumber."</strong>";
echo "<br>";
$sqls="SELECT * FROM type where Ty_Id='$Ty_Id'" ;
$results = $mysqli->query($sqls) or die($mysqli->error.__LINE__);
$rowofmember2=$results->num_rows;
while($row = mysqli_fetch_array($results)) {
$Ty_Id = $row['Ty_Id'];
$Ty_Name = $row['Ty_Name'];
$Ty_NameDetail = $row['Ty_NameDetail'];
$Ty_Price = $row['Ty_Price'];
echo "ประเภทงาน ".$Ty_NameDetail." (".$Ty_Price.")";
}

$sqls="SELECT * FROM style where S_Id='$S_Id'" ;
$results = $mysqli->query($sqls) or die($mysqli->error.__LINE__);
$rowofmember2=$results->num_rows;
while($row = mysqli_fetch_array($results)) {
$S_Id = $row['S_Id'];
$S_Name = $row['S_Name'];
echo "<br>";
echo "ลักษณะ ".$S_Name;
}
echo "<br>";
echo "<strong>"."แนวนอน ".$Or_Width." เมตร"." แนวตั้ง ".$Or_Long." เมตร"."</strong>";
echo "<br>";
echo "วันที่สั่งงาน ".$DMYDate3;
echo "<br>";
echo "เวลาที่รับงาน ".$Or_Time;
echo "<br>";
echo "<strong>"."ชื่อลูกค้า ".$Mem_Fname."</strong>";
echo "<br>";
echo "<strong>"."เบอร์ติดต่อ ".$Mem_Phone." Line : ".$Mem_Line."</strong>";
echo "<br>";
echo "ราคา ".$_GET['c'];
?></td>
    </tr>

</table>
<!--หัวไฟล์-->
<br>
<table width="100%" height="1" align="center">
    <tr>
        <td height="30" align='left'>รายละเอียด</td>
        <td height="0" width="40" align='right'>แนวนอน</td>
        <td height="0" width="30" align='right' style="border: 1px solid black;"></td>
        <td height="0" width="40" align='right'>แนวตั้ง</td>
        <td height="0" width="30" align='right' style="border: 1px solid black;"></td>
    </tr>
</table>
<table width="100%" height="1" align="center" style="border: 1px solid black;">
    <tr>
        <td height="350" align='center'></td>
    </tr>
</table>
<table width="100%" height="1" align="center">
    <tr>
        <td height="45" align='left'>สถานะการจ่ายเงิน
            <?php
       $money_status=$_GET['money_status'];

      if($money_status=='1'){
        echo "<font color=\"Green\">"." "."เงินสด"."</font>";
      }  elseif ($money_status=='2') {
      echo "<font color=\"Red\">"." "."มัดจำ"."</font>";
      } elseif ($money_status=='3') {
        echo "<font color=\"Green\">"." "."บัตรเครดิต"."</font>";
      } else {
        echo "<font color=\"Green\">"." "."เงินโอน"."</font>";
      } ?></td>
        <td height="45" align='right'><?php
     $num1= $_GET['money'];
     $num2=number_format($num1);
     function Convert($amount_number)
     {
         $amount_number = number_format($amount_number, 2, ".","");
         $pt = strpos($amount_number , ".");
         $number = $fraction = "";
         if ($pt === false)
             $number = $amount_number;
         else
         {
             $number = substr($amount_number, 0, $pt);
             $fraction = substr($amount_number, $pt + 1);
         }

         $ret = "";
         $baht = ReadNumber ($number);
         if ($baht != "")
             $ret .= $baht . "บาท";

         $satang = ReadNumber($fraction);
         if ($satang != "")
             $ret .=  $satang . "สตางค์";
         else
             $ret .= "ถ้วน";
         return $ret;
     }

     function ReadNumber($number)
     {
         $position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
         $number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
         $number = $number + 0;
         $ret = "";
         if ($number == 0) return $ret;
         if ($number > 1000000)
         {
             $ret .= ReadNumber(intval($number / 1000000)) . "ล้าน";
             $number = intval(fmod($number, 1000000));
         }

         $divider = 100000;
         $pos = 0;
         while($number > 0)
         {
             $d = intval($number / $divider);
             $ret .= (($divider == 10) && ($d == 2)) ? "ยี่" :
                 ((($divider == 10) && ($d == 1)) ? "" :
                 ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
             $ret .= ($d ? $position_call[$pos] : "");
             $number = $number % $divider;
             $divider = $divider / 10;
             $pos++;
         }
         return $ret;
     }
     echo  $num2  . "&nbsp;&nbsp;&nbsp;(" .Convert($num1),")<br>";


     $c=$_GET['c'];
    $num1=$_GET['money'];
    $sum = $c - $num1;
    echo "คงเหลือ ".$sum." บาท";?>
        </td>
    </tr>

</table>
<table width="100%" height="1" align="center" class="table-hover">
    <tr>
        <td height="45" align='left'><img src="./assets/brand/LineQRcode1.jpg" alt="" height="150" /></td>

        <td height="45" align='right'>
            <?php

            if($Or_Qrcode!=""){

        echo "<img src=\"./uploads/picqrcode/$Or_Qrcode\" alt=\"\"  height=\"150\" />
";}?>
        </td>
    </tr>
    <tr>
        <td height="45" align='left'></td>
        <td height="45" align='right'>ลงชื่อผู้รับงาน....................................<br>
            วันที่รับงาน ........./................/............</td>
    </tr>
</table>
<?php

       $html = ob_get_contents();        //เก็บค่า html ไว้ใน $html
       ob_end_clean();
       $mpdf->WriteHTML($html);      //แสดงค่าที่เก็บ
       $mpdf->Output();

     ?>
