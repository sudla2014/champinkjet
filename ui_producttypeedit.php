<?php ob_start();?>
<?php session_start();?>
<?php include"./head.php"?>
<?php require("connectdb.php");?>
<?php
$Ty_Id= $_GET['Ty_Id'];
$sql="select * from type where type.Ty_Id='$Ty_Id'";
$results = $mysqli->query($sql) or die($mysqli->error.__LINE__);
$row=$results->num_rows;
while($row = mysqli_fetch_array($results)) { // วนลูปแสดงรายการ
  $Ty_Id= $row["Ty_Id"];
  $Ty_Name = $row["Ty_Name"];
  $Ty_NameDetail = $row["Ty_NameDetail"];
  $Ty_Price= $row["Ty_Price"];
}
?>
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
                                <i class="fas fa-cubes"></i>  แก้ไขข้อมูลประเภทงาน
                    </div>
                <div class="card-body">

                    <form action="./edittype.php" method="post" name="frm">
                        <input type="hidden" name="method" value="add" />
                        <input type="hidden" name="Ty_Id" value="<?php echo $Ty_Id;?>" />
                        <div class="row">
                            <div class="col-md-6 ml-auto mr-auto">
                                <div class="form-group">
                                    <label for="exampleInputFirstname">ชื่อประเภทงาน</label>
                                    <input type="text" class="form-control" value="<?php echo $Ty_Name;?>" name="Ty_Name" aria-describedby="textHelp" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputLastname">รายละเอียดประเภทงาน</label>
                                    <input type="text" class="form-control" value="<?php echo $Ty_NameDetail;?>" name="Ty_NameDetail" aria-describedby="textHelp" p required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputLine">ราคาประเภทงาน</label>
                                    <input type="ืnumber" class="form-control" value="<?php echo $Ty_Price;?>" name="Ty_Price" aria-describedby="textHelp" min="100" max="400" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">บันทึก</button>
                                <a href="./ui_producttype.php" class="btn btn-warning btn-block">ยกเลิก</a>
                            </div>
                    </form>
                </div>
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
