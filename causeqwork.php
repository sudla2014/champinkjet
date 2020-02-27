<?php  require("./lib/phpmailer/PHPMailerAutoload.php");?>
<?php
require("./connectdb.php");
// include composer autoload
session_start();
$Or_Cause = $_POST['Or_Cause'];
$Or_Id = $_POST['Or_Id'];
$sql = "UPDATE orders set orders.Or_Cause= '$Or_Cause'  , orders.St_Id=2 where  orders.Or_Id = '$Or_Id'  ";
$mysqli->query($sql);
$sql = "
SELECT * FROM member INNER JOIN orders ON member.Mem_Id=orders.Mem_Id INNER JOIN status on orders.St_Id=status.St_Id WHERE orders.Or_Id='$Or_Id'
";
$result=$mysqli->query($sql);
if($result && $result->num_rows>0){// คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
  while($row = $result->fetch_assoc()){ // วนลูปแสดงรายการ
    $Or_Id= $row['Or_Id'];
    $Or_Details= $row["Or_Details"];
    $Or_Cause = $row["Or_Cause"];
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
header('Content-Type: text/html; charset=utf-8');
//START OLD CODE EMAIL
$mail = new PHPMailer;
$mail->CharSet = "utf-8";
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$gmail_username = "thechampinkjetbyit@gmail.com"; // gmail ที่ใช้ส่ง
$gmail_password = "thechampinkjet";
$Mem_name = $_SESSION['userFname'];
// ตั้งค่าอนุญาตการใช้งานได้ที่นี่ https://myaccount.google.com/lesssecureapps?pli=1
$sender = $Mem_name; // ชื่อผู้ส่ง
$email_sender = "thechampinkjetbyit@gmail.com";

    $email_receiver =  $Mem_Email;
    $subject = "แจ้งสถานะงาน"; // หัวข้อเมล์
    // code...
    // generating
    $mail->Username = $gmail_username;
    $mail->Password = $gmail_password;
    $mail->setFrom($email_sender, $sender);
    $mail->addAddress($email_receiver);

$mail->AddReplyTo("thechampinkjetbyit@gmail.com", $Mem_name);

    $mail->Subject = $subject;
    $email_content = "
    <!DOCTYPE html>
    <html>
    <head>
    <link href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\" rel=\"stylesheet\" id=\"bootstrap-css\">

    <meta charset=utf-8'/>
    <title>แจ้งเตือนงาน</title>
    </head>
    <body>
    <div class=\"card border-success mb-3\" style=\"max-width: 18rem;\">
  <div class=\"card-header\">แจ้งสถานะงาน</div>
  <div class=\"card-body text-success\">
  <p>เรียนผู้ใช้บริการ คุณ<strong> $Mem_Fname $Mem_Lname</strong>  ท่านร้านขออนุญาติ <strong> $St_Name</strong>  เนื่องจาก <strong> $Or_Cause </strong></p>
    <h1>ขอบพระคุณที่ใช้บริการ</h1>
  <h5 class=\"card-title\">รายละเอียดงาน</h5>
  <p class=\"card-text\">$Or_Details</p>
    <a href=\"http://localhost/bootstrapDefault/ui_orderall.php\"></a>
  </div>
  </div>
    <script src=\"https://code.jquery.com/jquery-3.3.1.slim.min.js\" integrity=\"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo\" crossorigin=\"anonymous\"></script>
  <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js\" integrity=\"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1\" crossorigin=\"anonymous\"></script>
  <script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js\" integrity=\"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM\" crossorigin=\"anonymous\"></script>
      </body>
    </html>
    ";
    if($email_receiver){
    $mail->msgHTML($email_content);


    if (!$mail->send()) {  // สั่งให้ส่ง email

      // กรณีส่ง email ไม่สำเร็จ
    //  echo "<h3 class='text-center'>ระบบมีปัญหา กรุณาลองใหม่อีกครั้ง</h3>";
      //echo $mail->ErrorInfo; // ข้อความ รายละเอียดการ error
    }else{
      $mailadd;
      // กรณีส่ง email สำเร็จ
      echo "ระบบได้ส่งข้อความไปเรียบร้อย";
    }
    }
  }
}
header("Refresh:0; url=ui_qwork.php");
?>
