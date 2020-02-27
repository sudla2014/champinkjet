<?php
      include("./connectdb.php");
      session_start();

      $fname = $_SESSION['user'];


$date_start1=$_GET['date_start1'];        //input วันที่เริ่ม
$CreateDateStart1 = date_create($date_start1);      // รับค่าตัวเแปรเก่า (date_start1) มาสร้างใหม่ ($CreateDateStart1)
$newDateStart1 = date_format($CreateDateStart1,"d/m/Y");    //เอาไปแปลง format ตามต้องการ ใส่ในตัวแปรใหม่ ($newDateStart1)

$date_end1=$_GET['date_end1'];            //input วันที่จบ
$CreateDateEnd1 = date_create($date_end1);
$newDateEnd1 = date_format($CreateDateEnd1,"d/m/Y");
$DMYDate2=date('Y-m-d');
$CreateDateEnd1 = date_create($DMYDate2);
$DMYDate3 = date_format($CreateDateEnd1,"d/m/Y");
$count_list_product_repair="";

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

	.st1{
		background-color: red;
	}
	.st2{
		background-color: Orange;
	}
	.st3{
		background-color: GreenYellow;
	}
	.st4{
		background-color: Green;
	}
	.st5{
		background-color: SpringGreen;
	}
  .alert-success{
    	background-color: SpringGreen;
  }

</style>

<!--หัวไฟล์-->
<table width="100%" height="1" align="center" class="table" border="0">

<caption><center><strong><font size="5"><u>ระบบบริหารจัดการรับสั่งทำป้ายไวนิล กรณีศึกษา บจก.ร้านแชมป์อิงค์เจ็ท</u></font></strong></center></caption>
<!-- <caption><center><strong><font size="6"><u> ประปาหมู่บ้านบ้านคลองบุหรี่</u></font></strong></center></caption> -->

<tr>
 <td height="27" align="center"><strong><span class="style2">1205/8 ม.10 ถ.สุวรรณศร ตำบล/อำเภอวัฒนานคร, Sa Kaeo, 27160, Thailand</span></strong></td>
</tr>
<hr >
<tr>
  <td align="center"><strong><span class="style2"></td> <!-- เว้นบรรทัด -->
</tr>
<tr>
  <td height="27" align="center"><img src="./assets/brand/cropped-Logo-Long.png" alt=""  height="30" /></td>
</tr>
<tr>
  <td height="27" align="center"><strong><span class="style2"><font size="5">สรุปรายงานยอดการสั่งงาน</font></span></strong></td>
</tr>
<tr>
  <td height="-27" align="center"><strong><span class="style2">ระหว่างวันที่ <?php echo $newDateStart1; ?> ถึง <?php echo $newDateEnd1; ?></span></strong></td>
</tr>
<tr>
  <td height="20" align="center"><strong><span class="style2"></td> <!-- เว้นบรรทัด -->
</tr>
</table>
<!--หัวไฟล์-->
<table width="100%" height="1" align="center" class="table">
  <tr>
   <td height="27" align='left'> วันที่ออกเอกสาร : <?php echo $DMYDate3; ?></td>
  </tr>
</table>
<table width="100%" height="100%"  colspan="4" border="1" align="center"  cellpadding="0" cellspacing="0" class="table table-hover">
  <thead class="style1">
    <tr>
      <th align="center" bgcolor="#EAEAEA"><strong>ลำดับ</strong></th>
      <th align="center" bgcolor="#EAEAEA"><strong>ชื่อลูกค้า</strong></th>
    <th  align="center" bgcolor="#EAEAEA"><strong>วันที่สั่งสินค้า</strong></th>
      <th  align="center" bgcolor="#EAEAEA"><strong>วันที่รับสินค้า</strong></th>
      <th  align="center" bgcolor="#EAEAEA"><strong>เวลาที่รับสินค้า</strong></th>
      <th  align="center" bgcolor="#EAEAEA"><strong>หมายเลขคิว</strong></th>
      <th  align="center" bgcolor="#EAEAEA"><strong>ราคา</strong></th>
     </tr>
  </thead>


   <?php
   $sql ="SELECT * FROM orders INNER JOIN member ON member.Mem_Id=orders.Mem_Id
     INNER JOIN type ON type.Ty_Id=orders.Ty_Id
     INNER JOIN status ON status.St_Id=orders.St_Id INNER JOIN style ON style.S_Id=orders.S_Id where orders.Or_WorkDay BETWEEN '$date_start1' AND  '$date_end1' ";
    $result = $mysqli->query($sql) or die($mysqli->error.__LINE__);
    $i=0;
    while($row = mysqli_fetch_array($result)) {
			$i++;
      $Or_Id= $row['Or_Id'];
      $Or_Cause= $row['Or_Cause'];
      $Or_Width= $row['Or_Width'];
      $Or_Long= $row['Or_Long'];
         $Or_Details= $row["Or_Details"];
         $Or_WorkDay= $row["Or_WorkDay"];
         $Or_ReceiveDay= $row["Or_ReceiveDay"];
         $Or_Time= $row["Or_Time"];
           $Or_Count= $row["Or_Count"];

         $Or_Qrcode= $row["Or_Qrcode"];
         $Or_Qid= $row['Or_Qid'];
         $Or_Qnumber = $row["Or_Qnumber"];
         $Mem_Id= $row["Mem_Id"];
     $Mem_Fname = $row["Mem_Fname"];
     $Mem_Email = $row["Mem_Email"];
     $Mem_Lname = $row["Mem_Lname"];
         $St_Id1= $row["St_Id"];
           $St_Name= $row["St_Name"];
           $Ty_Id= $row["Ty_Id"];
           $Ty_Name= $row["Ty_Name"];
           $Ty_Price= $row["Ty_Price"];

     ?>

     <div class="style1">
       <tbody >
         <tr>
           <td  align="center"  width='6'><?php echo $i;?></td>
           <td  align="center"  width='20'><?php echo $Mem_Fname." ".$Mem_Lname ;?></td>
           <td  align="center" width='8'><?php   $str =   explode("-",$Or_WorkDay);
             echo $str[2]."-".$str[1]."-".$str[0]; ?></td>
           <td  align="center" width='8'><?php   $str =   explode("-",$Or_ReceiveDay);
             echo $str[2]."-".$str[1]."-".$str[0]; ?></td>
          <?php
          if($Or_Time<='12:00:00'){
            echo "<td  align=\"center\" width='8' class=\"st2\"> $Or_Time";
          }else {
              echo "<td  align=\"center\" width='8' class=\"st4\"> $Or_Time";
          }
           ?></td>
           <td align="center" width='10'><?php echo $Or_Qnumber;?></td>
           <td  align="center" width='15'><?php
           $sumprice = $Ty_Price*$Or_Width*$Or_Long*$Or_Count;
           echo $sumprice;

           ?></td>

         </tr>
       </tbody>
     </div>
     <?php
     }
     ?>
     </table>

     <table width="100%" height="1" align="center" class="table-hover">
       <tr>
        <td height="25" align='right' colspan="2">


</td>
       </tr>
       <tr>
        <td height="45" align='right'> ผู้ออกเอกสาร : <?php echo $fname; ?></td>
       </tr>
     </table>
     <?php
       $html = ob_get_contents();        //เก็บค่า html ไว้ใน $html
       ob_end_clean();
       $mpdf->WriteHTML($html);      //แสดงค่าที่เก็บ
       $mpdf->Output();

     ?>
