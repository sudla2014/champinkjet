<?php include"./head.php";
require("connectdb.php");
$id=$_GET['id'];
$sql = "
  SELECT * FROM member INNER JOIN orders ON member.Mem_Id=orders.Mem_Id
  INNER JOIN type ON type.Ty_Id=orders.Ty_Id
  INNER JOIN status ON status.St_Id=orders.St_Id INNER JOIN style ON style.S_Id=orders.S_Id
  where orders.Or_Id ='$id'
";
			$results = $mysqli->query($sql) or die($mysqli->error.__LINE__);
			$rowofmember2=$results->num_rows;
		 $results = mysqli_query($mysqli, $sql);
		  while($row = mysqli_fetch_array($results)) {
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
		$Mem_Email = $row["Mem_Email"];
		$Mem_Lname = $row["Mem_Lname"];
        $St_Id= $row["St_Id"];
          $St_Name= $row["St_Name"];
          $Ty_Id= $row["Ty_Id"];
          $Ty_Name= $row["Ty_Name"];
				}

?>
<div class="card border-primary  mx-auto" style="width: 18rem;">
    <div class="card-header text-primary text-center">
        รายละเอียดงาน
    </div>
    <img src="./uploads/picqrcode/<?php echo $Or_Qrcode?>" class="card-img-top" alt="...">
    <div class="card-body ">
        <h5 class="card-title">รายละเอียดงาน</h5>
        <p class="card-text "><?php echo $Or_Details;?></p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">ชื่อลูกค้า <?php echo $Mem_Fname." ".$Mem_Lname;?></li>
        <li class="list-group-item">หมายเลขคิว <?php echo $Or_Qnumber;?></li>
        <li class="list-group-item">สถานะงาน <?php echo $St_Name;?></li>
        <li class="list-group-item">อีเมล <?php echo $Mem_Email;?></li>
    </ul>
</div>
