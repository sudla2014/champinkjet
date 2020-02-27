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

           <ul class="dropdown-menu nav-item">
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
            รายงานรายได้ที่คาดว่าจะได้รับ
                </div>
                <div class="card-body">

                    <div class="col-sm-8 mx-auto">
                      <form name="form1" method="get" action="">
                          <div class="form-row mx-auto">
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
    <div class="text-center">
               <?php
               if(isset($_GET['Or_WorkDay']) && $_GET['Or_WorkDay']!=""  && isset($_GET['Or_WorkDay1']) && $_GET['Or_WorkDay1']!="")        //ถ้าตัวแปลไม่มีค่า ให้โชว์ข้อความ
               {

               $date_start1 = $_GET['Or_WorkDay'];
               $CreateDateStart1 = date_create($date_start1);      // รับค่าตัวเแปรเก่า (date_start1) มาสร้างใหม่ ($CreateDateStart1)
               $newDateStart1 = date_format($CreateDateStart1,"d/m/Y");    //เอาไปแปลง format ตามต้องการ ใส่ในตัวแปรใหม่ ($newDateStart1)

               $date_end1 = $_GET['Or_WorkDay1'];           //input วันที่จบ
               $CreateDateEnd1 = date_create($date_end1);
               $newDateEnd1 = date_format($CreateDateEnd1,"d/m/Y");



               $count_list_product_repair=0; //ตัวนับจำนวน list
              echo "<a href=\"./ui_reportprice_pdf.php?date_start1=$date_start1&date_end1=$date_end1\" class=\"btn btn-outline-dark\">";
               echo '<i class="fa fa-print" aria-hidden="true"></i> ออกรายงาน';
               echo "</a>";
                echo "<br>";
                echo "<br>";
                echo "<div class=\"text-right\">";
                echo "ผลการค้นหา : ".$newDateStart1." ถึง ".$newDateEnd1;
                echo "</div>";
             }

               else {
                 // code...
                   echo "<br>";
                   echo "<br>";
                   echo "เลือกวันที่ 'เริ่มต้น' และ 'สิ้นสุด' เพื่อดูรายงาน";
               }?>



    <style>

    tbody {
        display:block;
        height:300px;
        overflow:auto;
    }
    thead, tbody tr {
        display:table;
        width:100%;
        table-layout:fixed;
    }
    </style>
    <?php

    ?>

                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm">
                        <thead>
                          <tr>
                            <th class="text-center">ลำดับที่</th>
                            <th class="text-center">ชื่อลูกค้า</th>
                            <th class="text-center">วันที่สั่งสินค้า</th>
                            <th class="text-center">วันที่รับสินค้า</th>
                            <th class="text-center">เวลาที่รับสินค้า</th>
                            <th class="text-center">หมายเลขคิว</th>
                            <th class="text-center">ราคา</th>
                          </tr>
                        </thead>
                      <tbody class="row_position">
                            <?php
  $num = 0;
  if(isset($_GET['Or_WorkDay']) && $_GET['Or_WorkDay']!=""  && isset($_GET['Or_WorkDay1']) && $_GET['Or_WorkDay1']!="")        //ถ้าตัวแปลไม่มีค่า ให้โชว์ข้อความ
  {

  $date_start1 = $_GET['Or_WorkDay'];
  //เอาไปแปลง format ตามต้องการ ใส่ในตัวแปรใหม่ ($newDateStart1)
  $date_end1 = $_GET['Or_WorkDay1'];           //input วันที่จบ


  $sql = "
  SELECT * FROM orders INNER JOIN member ON member.Mem_Id=orders.Mem_Id
    INNER JOIN type ON type.Ty_Id=orders.Ty_Id
    INNER JOIN status ON status.St_Id=orders.St_Id INNER JOIN style ON style.S_Id=orders.S_Id where orders.Or_WorkDay BETWEEN '$date_start1' AND  '$date_end1' ";


    $result=$mysqli->query($sql);
    $total=$result->num_rows;

    $e_page=4; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า
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
    $sql.="ORDER BY orders.Or_Qid ASC";
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

    <style>

    </style>


                              <tr id="<?php echo $Or_Qid;?>">
                                  <td class="text-center align-middle"><?php echo $num;?></td>
                                  <td class="text-center align-middle"><?php echo $Mem_Fname." ".$Mem_Lname ;?></td>
                                  <td class="text-center align-middle"><?php   $str =   explode("-",$Or_WorkDay);
                                    echo $str[2]."-".$str[1]."-".$str[0]; ?></td>
                                  <td class="text-center align-middle"><?php   $str =   explode("-",$Or_ReceiveDay);
                                    echo $str[2]."-".$str[1]."-".$str[0]; ?></td>
                                  <td class="text-center align-middle"><?php echo $Or_Time;?></td>
                                  <td class="text-center align-middle"><?php echo $Or_Qnumber;?></td>
                                  <td class="text-center align-middle"><?php
                                  $sumprice = $Ty_Price*$Or_Width*$Or_Long*$Or_Count;
                                  echo $sumprice;

                                  ?></td>
                                </tr>
              <?php }
            }
    }?>

              </table>
              <?php
              if(isset($_GET['Or_WorkDay']) && $_GET['Or_WorkDay']!=""  && isset($_GET['Or_WorkDay1']) && $_GET['Or_WorkDay1']!="")        //ถ้าตัวแปลไม่มีค่า ให้โชว์ข้อความ
              {

              $date_start1 = $_GET['Or_WorkDay'];
              //เอาไปแปลง format ตามต้องการ ใส่ในตัวแปรใหม่ ($newDateStart1)
              $date_end1 = $_GET['Or_WorkDay1'];           //input วันที่จบ


              		  $sql = "
    SELECT *,sum(type.Ty_Price*orders.Or_Width*orders.Or_Long*orders.Or_Count) AS total FROM orders INNER JOIN member ON member.Mem_Id=orders.Mem_Id
    INNER JOIN type ON type.Ty_Id=orders.Ty_Id
    INNER JOIN status ON status.St_Id=orders.St_Id INNER JOIN style ON style.S_Id=orders.S_Id where orders.Or_WorkDay BETWEEN '$date_start1' AND  '$date_end1'
    ";
    $result=$mysqli->query($sql);
    if($result && $result->num_rows>0){// คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
      while($row = $result->fetch_assoc()){ // ว
              	?>
              	<div class="pull-right">
              		<div class="span">
              			<div class="alert alert-success"><i class="icon-credit-card icon-large"></i>&nbsp;Total:&nbsp;<?php echo number_format($row['total']); ?></div>
              		</div>
              	</div>
              <?php }}}?>
              <br>
          </div>
          <?php
    //page_navi($total,(isset($_GET['page']))?$_GET['page']:1,$e_page,$_GET);
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
