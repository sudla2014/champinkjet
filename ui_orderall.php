<?php ob_start();?>
<?php session_start();?>
<?php include"./head.php"?>
<?php require("connectdb.php");?>
<?php include"./pagination_function.php"?>

<!---------------------------------------->
<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark bg-dark navbar-without-dd-arrow navbar-shadow"
  role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content container center-layout" data-menu="menu-container">
      <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item" >
                <a class="dropdown-toggle nav-link btn-outline-purple" href="./ui_admin.php"><i class="fas fa-home"></i>
                    <span>หน้าแรก</span>
                </a>
            </li>
            <li class=" nav-item" >
                <a class="dropdown-toggle nav-link btn-outline-purple" href="./ui_orderall.php"><i class="fas fa-layer-group"></i>
                    <span>จัดการการสั่งงาน</span>
                </a>
            </li>
            <li class=" nav-item" >
                <a class="dropdown-toggle nav-link btn-outline-purple" href="./ui_qwork.php" ><i class="fas fa-filter"></i>
                    <span>จัดการคิวงาน</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="dropdown-toggle nav-link btn-outline-purple"  href="./ui_producttype.php" ><i class="fas fa-cubes"></i>
                    <span>จัดการประเภทงาน</span>
                </a>
            </li>
            <li class="dropdown nav-item" data-menu="dropdown">
         <a class="dropdown-toggle nav-link btn-outline-purple"  data-toggle="dropdown">
           <i class="fas fa-users-cog"></i>
           <span>จัดการผู้ใช้งาน</span>
         </a>
         <ul class="dropdown-menu ">
           <li data-menu=""><a class="dropdown-item" href="./ui_managercus.php" data-toggle="dropdown"><i class="fas fa-users"></i>จัดการข้อมูลลูกค้า</a>
           </li>
           <li data-menu=""><a class="dropdown-item" href="./ui_manageremp.php" data-toggle="dropdown"><i class="fas fa-user-secret"></i>จัดการข้อมูลพนักงาน</a>
           </li>
           <li data-menu=""><a class="dropdown-item" href="./ui_managerown.php" data-toggle="dropdown"><i class="fas fa-user-tie"></i>จัดการข้อมูลเจ้าของร้าน</a>
           </li>
          </ul>
              </li>
              <li class="dropdown nav-item" data-menu="dropdown">
           <a class="dropdown-toggle nav-link btn-outline-purple"  data-toggle="dropdown">
             <i class="fas fa-tachometer-alt"></i>
             <span>จัดการออกรายงาน</span>
           </a>

           <ul class="dropdown-menu ">
             <li data-menu="">       <a href="./ui_reportorder.php" class="dropdown-item" data-toggle="dropdown">รายงานยอดการสั่งงาน</a></li>
                         <li data-menu="">     <a href="./ui_reportstatus.php" class="dropdown-item" data-toggle="dropdown">รายงานสถานะการสั่งงาน</a></li>
                         <li data-menu="">     <a href="./ui_reportprice.php" class="dropdown-item" data-toggle="dropdown">รายงานรายได้ที่คาดว่าจะได้รับ</a></li>
                         <li data-menu="">     <a href="./ui_reporttype.php" class="dropdown-item" data-toggle="dropdown">รายงานประเภทงานยอดนิยม</a></li>
                         <li data-menu="">     <a href="./ui_reportcount.php" class="dropdown-item" data-toggle="dropdown">รายงานยอดสั่งงานของลูกค้า</a></li>
            </ul>
                </li>


           </ul>

         <ul class="nav navbar-nav justify-content-end"  id="main-menu-navigation" data-menu="menu-navigation">
                      <li class="dropdown nav-item"   data-menu="dropdown">
                   <a class="dropdown-toggle nav-link btn-outline-purple"  data-toggle="dropdown">
                     <i class="fas fa-address-book" aria-hidden="true"></i><span><?php echo " ".$_SESSION['user'];?></span>
                   </a>
                   <ul class="dropdown-menu ">
                     <li data-menu=""><a class="dropdown-item" href="./ui_editown.php" data-toggle="dropdown"><i class="fas fa-cogs" aria-hidden="true"></i>แก้ไขข้อมูลส่วนตัว</a>
                     </li>
                     <li data-menu=""><a class="dropdown-item" href="./logout.php" data-toggle="dropdown"><i class="fas fa-sign-out-alt"></i>ออกจากระบบ</a>
                     </li>
                    </ul>
                        </li>
                      </ul>
    </div>
</div>
<!---------------------------------------->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">

            <!-- Date dropper section start -->
            <section id="date-dropper">
                <div class="row">
										<div class="col-md-12 col-sm-12 col-xd-10 ml-auto mr-auto">
                        <div class="card mx-auto">
                            <div class="card-content ">
                              <div class="card-header white bg-dark text-center font-medium-1">
                    <i class="fas fa-layer-group"></i> จัดการการสั่งงาน
                    </div>
                <div class="card-body">

                    <div class="col-sm-8 mx-auto">
                      <a class="btn btn-purple btn-block" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    เมนูการค้นหา
  </a>
  <br>
  <div class="collapse" id="collapseExample">
                      <form name="form1" method="get" action="">
                          <div class="form-row mx-auto">
                              <div class="form-group col-sm">
                                  <label for="exampleInputLine">กรอกชื่อลูกค้า </label>
                                  <input type="text" class="form-control" placeholder="กรอกชื่อลูกค้า" name="keyword" id="keyword" value="<?=(isset($_GET['keyword']))?$_GET['keyword']:""?>">
                              </div>
                              <div class="form-group col-sm">
                                  <label for="exampleInputLine">เวลาเริ่มต้น </label>
                                  <input type="time" class="form-control" name="time" id="time" value="<?=(isset($_GET['time']))?$_GET['time']:""?>">
                              </div>
                              <div class="form-group col-sm">
                                  <label for="exampleInputLine">เวลาสิ้นสุด </label>
                                  <input type="time" class="form-control" name="time1" id="time1" value="<?=(isset($_GET['time1']))?$_GET['time1']:""?>">
                              </div>
                              </div>
                              <div class="form-row mx-auto">
                              <div class="form-group col-sm">
                                <label for="exampleInputLine">หมายเลขคิว </label>
                                  <input type="text" class="form-control" name="Or_Qnumber" placeholder="หมายเลขคิว" id="Or_Qnumber" value="<?=(isset($_GET['Or_Qnumber']))?$_GET['Or_Qnumber']:""?>">
                              </div>
                              <div class="form-group col-sm">
                                  <label for="exampleInputLine">วันที่เริ่มต้น </label>
                                  <input type="date" class="form-control" name="Or_WorkDay"  id="Or_WorkDay" value="<?=(isset($_GET['Or_WorkDay']))?$_GET['Or_WorkDay']:""?>">
                              </div>
                              <div class="form-group col-sm">
                                  <label for="exampleInputLine">วันที่สิ้นสุด </label>
                                  <input type="date" class="form-control" name="Or_WorkDay1" id="Or_WorkDay1" min="<?=(isset($_GET['Or_WorkDay']))?$_GET['Or_WorkDay']:""?>" value="<?=(isset($_GET['Or_WorkDay1']))?$_GET['Or_WorkDay1']:""?>">
                              </div>
                              </div>
                              <div class="form-group">
                                  <button type="submit" class="btn btn-outline-primary btn-block" name="btn_search" id="btn_search">search</button>
                              </div>
                    </form>
          </div>
</div>

<div class="table-responsive">
<table class="table table-striped table-hover" style="width:100%">
	<thead>
    <tr>
				<th class="text-center">ลำดับที่</th>
			 <th class="text-center">ชื่อผลิตภัณฑ์</th>
			 <th class="text-center">ชื่อลูกค้า</th>
			  <th class="text-center">รายละเอียดงาน</th>
       <th class="text-center">สถานะ</th>
        <th class="text-center">โดย</th>
       <th class="text-center">หมายเลขคิว</th>
       <th class="text-center">QrCode</th>
			 <th class="text-center">จัดการ</th>
     </tr>
		</thead>
	<tbody>
                            <?php
$num = 0;
	$sql = "
  SELECT * FROM orders INNER JOIN member ON member.Mem_Id=orders.Mem_Id
    INNER JOIN type ON type.Ty_Id=orders.Ty_Id
    INNER JOIN status ON status.St_Id=orders.St_Id INNER JOIN style ON style.S_Id=orders.S_Id  where orders.St_Id <= 4
";

// เงื่อนไขสำหรับ input text
if(isset($_GET['keyword']) && $_GET['keyword']!=""){
    // ต่อคำสั่ง sql
    $sql.=" AND member.Mem_Fname LIKE '%".trim($_GET['keyword'])."%' AND member.Mem_Lname LIKE '%".trim($_GET['keyword'])."%' ";
}
if(isset($_GET['time']) && $_GET['time']!=""  && isset($_GET['time1']) && $_GET['time1']!=""){

   $sql.="AND  orders.Or_Time BETWEEN '".trim($_GET['time'])."' AND  '".trim($_GET['time1'])."' " ;
    //


}
// เงื่อนไขสำหรับ input text
if(isset($_GET['Or_Qnumber']) && $_GET['Or_Qnumber']!=""){
    // ต่อคำสั่ง sql
    $sql.=" AND orders.Or_Qnumber LIKE '%".trim($_GET['Or_Qnumber'])."%'";
}
if(isset($_GET['Or_WorkDay']) && $_GET['Or_WorkDay']!=""  && isset($_GET['Or_WorkDay1']) && $_GET['Or_WorkDay1']!=""){
    // ต่อคำสั่ง sql
  $sql.="AND  orders.Or_WorkDay BETWEEN '".trim($_GET['Or_WorkDay'])."' AND  '".trim($_GET['Or_WorkDay1'])."' " ;
}


	$result=$mysqli->query($sql);
$total=$result->num_rows;

$e_page=10; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า
$step_num=0;
if(!isset($_GET['page']) || (isset($_GET['page']) && $_GET['page']==1)){
    $_GET['page']=1;
    $step_num=0;
    $s_page = 0;
}else{
    $s_page = $_GET['page']-1;
    $step_num=$_GET['page']-1;
    $s_page = $s_page*$e_page;
}
$sql.="ORDER BY orders.St_Id ASC LIMIT ".$s_page.",$e_page";
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
            $Or_Memid = $row["Or_Memid"];
        $Mem_Id= $row["Mem_Id"];
		$Mem_Fname = $row["Mem_Fname"];
		$Mem_Email = $row["Mem_Email"];
		$Mem_Lname = $row["Mem_Lname"];
        $St_Id= $row["St_Id"];
          $St_Name= $row["St_Name"];
          $Ty_Id= $row["Ty_Id"];
          $Ty_Name= $row["Ty_Name"];
?>




                            <tr>
                                <td class="text-center align-middle"><?php echo $num;?></td>
                                <td class="text-center align-middle"><?php echo $Ty_Name;?></td>
                                <td class="text-center align-middle"><?php echo $Mem_Fname." ".$Mem_Lname ;?></td>
                                <td class="text-center align-middle">
                                    <a data-fancybox data-src="#<?php echo $Or_Id;?>" href="javascript:;" class="btn btn-success btn-glow">View</a>
                                    <div style="display: none;max-width:600px;" id="<?php echo $Or_Id;?>">
                                        <h2>รายละเอียดงาน!</h2>
                                        <p><?php echo $Or_Details;?></p>
                                    </div>
                                </td>

                                <?php
                              if($St_Id=='4'){
                                  echo "<td class=\"text-center align-middle\" ><font color=\"Green\">$St_Name</font></td>";
                                }elseif ($St_Id=='3') {
                                  echo "<td class=\"text-center align-middle\" ><font color=\"GreenYellow \">$St_Name</font></td>";
                                }elseif ($St_Id=='2') {
                                  echo "<td class=\"text-center align-middle\" ><font color=\"Orange\">$St_Name</font></td>";
                                }elseif ($St_Id=='1') {
                                  echo "<td class=\"text-center align-middle\" ><font color=\"Red\">$St_Name</font></td>";
                                }else {
                                  echo "<td class=\"text-center align-middle\" ><font color=\"SpringGreen \">$St_Name</font></td>";
                                }

?>  <td class="text-center align-middle"><?php
   $sql = "SELECT * FROM member WHERE member.Mem_Id='$Or_Memid' ";
   $results = $mysqli->query($sql) or die($mysqli->error.__LINE__);
   $row=$results->num_rows;
   while($row = mysqli_fetch_array($results)) {
    $Mem_Id= $row["Mem_Id"];
$Mem_Fname = $row["Mem_Fname"];
$Mem_Email = $row["Mem_Email"];
$Mem_Lname = $row["Mem_Lname"];
}if($Or_Memid==0){

}else {
echo $Mem_Fname." ".$Mem_Lname;}?></td>
                                <td class="text-center align-middle"><?php echo $Or_Qnumber;?></td>
                                <td class="text-center align-middle">

                                    <?php

    if($Or_Qrcode!=""){
    echo  "<a class=\"btn btn-outline-primary btn-glow\" data-toggle=\"modal\" data-target=\"#$Or_Qrcode\" >
     ภาพ
      </a>

      <!-- Modal -->
      <div class=\"modal fade\" id=\"$Or_Qrcode\"  tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
      <div class=\"modal-dialog\" role=\"document\">
        <div class=\"modal-content\">
          <div class=\"modal-header\">
            <h5 class=\"modal-title\" id=\"exampleModalLabel\">ภาพ</h5>
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
              <span aria-hidden=\"true\">&times;</span>
            </button>
          </div>
          <div class=\"modal-body\">
            <img src=\"./uploads/picqrcode/$Or_Qrcode\" alt=\"\" />


          </div>
        </div>
      </div>
      </div>";
}else {
  // codeecho "string";
}
  ?>
                                </td>
                                <td class="text-center align-middle">
                                  <div class="btn-group">
                                    <?php if ($St_Id<='3') {
                                      echo "<a class=\"btn btn-success btn-glow\" href=\"./email.php?Or_Id=$Or_Id\" >อนุมัติ</a>";
                                      echo "<a class=\"btn btn-danger btn-glow\" data-toggle=\"modal\" data-target=\"#$Or_Id.1\" >ไม่อนุมัติ</a>";

                                    }else {
                                      echo "<a class=\"btn btn-success btn-glow disabled\" tabindex=\"-1\" role=\"button\" aria-disabled=\"true\" href=\"./email.php?Or_Id=$Or_Id\" >อนุมัติ</a>";
                                          echo "<a class=\"btn btn-danger btn-glow disabled\" tabindex=\"-1\" role=\"button\" aria-disabled=\"true\" data-toggle=\"modal\" data-target=\"#$Or_Id.1\" >ไม่อนุมัติ</a>";
                                    }?>
                                      <?php if ($St_Id=='2') {
                                        echo "<a class=\"btn btn-warning btn-glow  disabled\" tabindex=\"-1\" role=\"button\" aria-disabled=\"true\" data-toggle=\modal\" data-target=\"#$Or_Id.2\">ยกเลิก</a>";
                                      }else {
                                        echo "<a class=\"btn btn-warning btn-glow\" data-toggle=\"modal\" data-target=\"#$Or_Id.2\" >ยกเลิก</a>";
                                      }?>




                                  <div class="modal fade" id="<?php echo $Or_Id.".1";?>"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">ไม่อนุมัติการสั่งงาน</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form action="./causeall.php" name="frm" method="post">
                                          <input type="hidden" name="Or_Id" value="<?php echo $Or_Id;?>">
                                          <div class="form-group">
                                              <label for="exampleFormControlTextarea1">สาเหตุ</label>
                                              <textarea class="form-control"   name="Or_Cause" rows="3" required ></textarea>
                                          </div>


                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                      </div>
                                      </form>
                                    </div>
                                  </div>
                                  </div>

                                  <!-- Modal -->
                                  <div class="modal fade" id="<?php echo $Or_Id.".2";?>"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">ยกเลิกการสั่งงาน</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form action="./causeown.php" name="frm" method="post">
                                          <input type="hidden" name="Or_Id" value="<?php echo $Or_Id;?>">
                                          <div class="form-group">
                                              <label for="exampleFormControlTextarea1">สาเหตุ</label>
                                              <textarea class="form-control"   name="Or_Cause" rows="3" required ></textarea>
                                          </div>


                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                      </div>
                                      </form>
                                    </div>
                                  </div>
                                  </div>
                                </div>
                                    </td>
                            </tr>

                        </tbody>
                        <?php
}
}
?>

                    </table>
                  </div>


                    <br>
                    <?php
                   page_navi($total,(isset($_GET['page']))?$_GET['page']:1,$e_page,$_GET);
                    ?>
                    </div>
                    </div>
                    </div>

                    </div>
                    </div>
                    </section>
                    </div>
                    </div>
                    </div>

                    <!-- Menu Toggle Script -->
                    <?php include"./footer.php"?>
