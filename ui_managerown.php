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
                <a class="dropdown-toggle nav-link btn-outline-purple" href=""><i class="fas fa-home"></i>
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
                     <li data-menu=""><a class="dropdown-item" href="./ui_editcus.php" data-toggle="dropdown"><i class="fas fa-cogs" aria-hidden="true"></i>แก้ไขข้อมูลส่วนตัว</a>
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
                            <div class="card-content">
                              <div class="card-header white bg-dark text-center font-medium-1">
              <i class="fas fa-user-tie"></i> จัดการข้อมูลเจ้าของร้าน</a>
                    </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <form name="form1" method="get" action="">
                                <div class="form-row">
                                    <div class="form-group col-sm-4">
                                        <input type="text" class="form-control" placeholder="กรอกชื่อเจ้าของร้าน" name="keyword" id="keyword" value="<?=(isset($_GET['keyword']))?$_GET['keyword']:""?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-primary btn-glow" name="btn_search" id="btn_search">
                                            search
                                        </button>
                                    </div>
                                    <div class="form-group ml-auto">
                                        <a class="btn btn-outline-primary btn-glow" href="./registerown.php">เพิ่มข้อมูล</a>
                                    </div>
                                </div>
                            </form>
                            <?php
                  $num = 0;
                  $sql = "
                  SELECT * FROM member WHERE member.Mem_Status='1'
                  ";

                  // เงื่อนไขสำหรับ input text
                  if(isset($_GET['keyword']) && $_GET['keyword']!=""){
                    // ต่อคำสั่ง sql
                    $sql.=" AND member.Mem_Fname LIKE '%".trim($_GET['keyword'])."%' ";
                  }
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
                  ?>
                        </div>
                    </div>
                <div class="table-responsive">
                  <table class="table table-striped table-hover" style="width:100%">
                        <thead>
                            <th class="text-center">ลำดับที่</th>
                            <th class="text-center">ชื่อ</th>
                            <th class="text-center">ที่อยู่</th>
                            <th class="text-center">เบอร์โทร</th>
                            <th class="text-center">อีเมล์</th>
                            <th class="text-center">ไลน์</th>
                            <th class="text-center">ชื่อผู้ใช้</th>
                            <th class="text-center">จัดการ</th>
                        </thead>
                        <?php
                        $sql.="ORDER BY member.Mem_Id ASC LIMIT ".$s_page.",$e_page";
                        $result=$mysqli->query($sql);
                if($result && $result->num_rows>0){// คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
                  while($row = $result->fetch_assoc()){ // วนลูปแสดงรายการ
                    $num++;

                    $Mem_Id= $row["Mem_Id"];
                    $Mem_Fname = $row["Mem_Fname"];
                    $Mem_Lname = $row["Mem_Lname"];
                    $Mem_Address= $row["Mem_Address"];
                    $Mem_Email = $row["Mem_Email"];
                    $Mem_Phone = $row["Mem_Phone"];
                    $Mem_Line = $row["Mem_Line"];
                    $Mem_User = $row["Mem_User"];
                    $Mem_Pass= $row["Mem_Pass"];
                    ?>
                        <tbody>
                            <tr>
                                <td class="text-center"><?php echo $num;?></td>
                                <td class="text-center"><?php echo $Mem_Fname." ".$Mem_Lname ;?></td>
                                <td class="text-center"><?php echo $Mem_Address;?></td>
                                <td class="text-center"><?php echo $Mem_Phone;?></td>
                                <td class="text-center"><?php echo $Mem_Email;?></td>
                                <td class="text-center"><?php echo $Mem_Line;?></td>
                                <td class="text-center"><?php echo $Mem_User;?></td>
                                <td class="text-center">
                                    <a href="./ui_managereditown.php?Mem_Id=<?php echo $Mem_Id;?>" class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="./ui_managerdelown.php?Mem_Id=<?php echo $Mem_Id;?>" class="delete" onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>

                        </tbody>
                        <?php
                }}
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
