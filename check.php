<?php
session_start();
include("connectdb.php");
$user=$_POST['user'];
$pass=$_POST['pass'];
if(isset($_POST["login"]))
 {
      if(empty($_POST["user"]) || empty($_POST["pass"]))
      {
           echo '<script>alert("กรุณากรอกชื่อผู้ใช้และรหัสผ่าน")</script>';
					 echo "<meta http-equiv=\"refresh\" content=\"0; url=./login.php?error=กรุณากรอกชื่อผู้ใช้และรหัสผ่าน\">";
      }
      else
      {
           $username = mysqli_real_escape_string($mysqli, $_POST["user"]);
           $password = mysqli_real_escape_string($mysqli, $_POST["pass"]);
           $password = base64_encode($password);
		$sqls="
		SELECT *
		FROM member
		WHERE member.Mem_User ='$username' and member.Mem_Pass='$password'" ;
			$results = $mysqli->query($sqls) or die($mysqli->error.__LINE__);
			$rowofmember2=$results->num_rows;
		 $results = mysqli_query($mysqli, $sqls);
		  while($row = mysqli_fetch_array($results)) {
				$Mem_Id= $row["Mem_Id"];
				$Mem_Fname= $row["Mem_Fname"];
				$Mem_Lname= $row["Mem_Lname"];
				$Mem_Email=$row["Mem_Email"];
				$Mem_User= $row["Mem_User"];
				$Mem_Pass= $row["Mem_Pass"];
				$Mem_Status= $row["Mem_Status"];
				}
				   if(mysqli_num_rows($results) > 0)
				   {
							$_SESSION['user']=$Mem_Fname." ".$Mem_Lname;
							$_SESSION['status']=$Mem_Status;
							$_SESSION['userFname']=$Mem_Fname;
							$_SESSION['Userid']=$Mem_Id;
							$_SESSION['email']=$Mem_Email;
							$name=$_SESSION['user'];
							if($Mem_Status=="1"){
							echo "<meta http-equiv=\"refresh\" content=\"0; url=./ui_admin.php\">";
							}else{
							echo "<meta http-equiv=\"refresh\" content=\"0; url=./ui_employee.php\">";
							}
				   }
					 else {
		      echo "<script language=\"JavaScript\" type=\"text/JavaScript\">alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง')</script>";
			echo "<meta http-equiv=\"refresh\" content=\"0; url=./login.php?error=ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง\">";
		}

		   }

	  }
?>
