<?php ob_start();?>
<?php session_start();?>
<?php include"./head.php"?>
<?php require("connectdb.php");?>
<?php
$sqls="select * from member where member.Mem_Id='".$_SESSION['Userid']."'";
$results = $mysqli->query($sqls) or die($mysqli->error.__LINE__);
$row=$results->num_rows;
while($row = mysqli_fetch_array($results)) {
  $Mem_Id= $row["Mem_Id"];
  $Mem_Fname= $row["Mem_Fname"];
  $Mem_Lname= $row["Mem_Lname"];
  $Mem_Email= $row["Mem_Email"];
  $Mem_Address= $row["Mem_Address"];
  $Mem_Phone= $row["Mem_Phone"];
  $Mem_Line= $row["Mem_Line"];
  $Mem_User= $row["Mem_User"];
  $Mem_Pass= $row["Mem_Pass"];
  $Mem_Status= $row["Mem_Status"];
?>

<!---------------------------------------->
<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark bg-dark navbar-without-dd-arrow navbar-shadow"
  role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content container center-layout" data-menu="menu-container">
      <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item" >
                <a class="dropdown-toggle nav-link  btn-outline-purple" href="./ui_employee.php"><i class="fas fa-home"></i>
                    <span>หน้าแรก</span>
                </a>
            </li>
            <li class=" nav-item" >
                <a class="dropdown-toggle nav-link  btn-outline-purple" href="./ui_workorderown.php" ><i class="fas fa-sticky-note"></i>
                    <span>สั่งงานหน้าร้าน</span>
                </a>
            </li>
            <li class=" nav-item" >
                <a class="dropdown-toggle nav-link  btn-outline-purple" href="./ui_artworkmanager.php" ><i class="fas fa-image"></i>
                    <span>จัดการออกแบบงาน</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="dropdown-toggle nav-link  btn-outline-purple"  href="./ui_printwork.php" ><i class="fas fa-print"></i>
                    <span>จัดการสั่งผลิตสินค้า</span>
                </a>
            </li>
 </ul>
 <ul class="nav navbar-nav justify-content-end"  id="main-menu-navigation" data-menu="menu-navigation">
              <li class="dropdown nav-item"   data-menu="dropdown">
           <a class="dropdown-toggle nav-link  btn-outline-purple"  data-toggle="dropdown">
             <i class="fas fa-address-book" aria-hidden="true"></i><span><?php echo " ".$_SESSION['user'];?></span>
           </a>
           <ul class="dropdown-menu ">
             <li data-menu=""><a class="dropdown-item" href="./ui_editemp.php" data-toggle="dropdown"><i class="fas fa-cogs" aria-hidden="true"></i>แก้ไขข้อมูลส่วนตัว</a>
             </li>
             <li data-menu=""><a class="dropdown-item" href="./logout.php" data-toggle="dropdown"><i class="fas fa-sign-out-alt"></i>ออกจากระบบ</a>
             </li>
            </ul>
                </li>
              </ul>


    </div>
</div>
<!------------>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">

            <!-- Date dropper section start -->
            <section id="date-dropper">
            <div class="card card-nav-tabs " style="margin: 20px;">
              <div class="card-header white bg-dark text-center font-medium-1">
            <i class="fas fa-cogs" aria-hidden="true"></i> แก้ไขข้อมูลส่วนตัว
              </div>

                <div class="card-body">

                    <form action="./edituser.php" method="post" name="frm">
                        <input type="hidden" name="method" value="add" />
                        <input type="hidden" name="Mem_Id" value="<?php echo $Mem_Id; ?>" />
                        <input type="hidden" name="Mem_Status" value="3" />
                        <div class="row">
                            <div class="col-md-6 ml-auto mr-auto">
                                <div class="form-group">
                                    <label for="exampleInputFirstname">First name</label> <span style="color:Red;">*</span>
                                    <input type="text" class="form-control" id="Fname" value="<?php echo $Mem_Fname;?>" name="Fname" aria-describedby="textHelp" placeholder="Enter First name" required>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputLastname">Last name</label> <span style="color:Red;">*</span>
                                    <input type="text" class="form-control" id="Lname" value="<?php echo $Mem_Lname;?>" name="Lname" aria-describedby="textHelp" placeholder="Enter Last name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Address</label>
                                    <textarea class="form-control" id="Address" name="Address" rows="3" ><?php echo $Mem_Address;?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputLine">Phone</label>
                                    <input type="text" class="form-control" id="Phone" OnKeyPress="return chkNumber(this)" value="<?php echo $Mem_Phone;?>" name="Phone" aria-describedby="textHelp" maxlength="10" placeholder="Enter Phone Number" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label> <span style="color:Red;">*</span>
                                    <input type="email" class="form-control" id="Email" name="Email" value="<?php echo $Mem_Email;?>" aria-describedby="emailHelp" placeholder="Enter email" required>
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputLine">Line ID</label>
                                    <input type="text" class="form-control" id="Line" name="Line" value="<?php echo $Mem_Line;?>" aria-describedby="textHelp" placeholder="Enter Line ID" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">User name</label> <span style="color:Red;">*</span>
                                    <input type="text" class="form-control" id="User" name="User" value="<?php echo $Mem_User;?>" aria-describedby="textHelp" placeholder="Enter Username">
                                </div>
                                <div class="form-group">
                                    <label for="pass1">Password </label>  <span style="color:Red;">*</span>
                                    <div class="input-group" id="show_hide_password">
<input class="form-control" type="password" name="pass1"  placeholder="Enter Password" value="<?php echo base64_decode($Mem_Pass);?>"  minlength="8" maxlength="12" >
<div class="input-group-addon">
  <a href=""><i class="fas fa-eye-slash" aria-hidden="true"></i></a>
</div>
</div>
                                </div>
                                <div class="form-group">
                                    <label for="pass2">Confirm Password</label> <span style="color:Red;">*</span>
                                    <div class="input-group" id="show_hide_password1">
<input class="form-control" type="password" name="pass2"  placeholder="Enter Password" value="<?php echo base64_decode($Mem_Pass);?>"  minlength="8" maxlength="12" >
<div class="input-group-addon">
  <a href=""><i class="fas fa-eye-slash" aria-hidden="true"></i></a>
</div>
</div>
                                </div>
                                <?php }

                                ?>
                                <button type="submit" class="btn btn-purple btn-block" onClick="javascript:return confirm('คุณต้องการแก้ไขข้อมูลใช่หรือไม่');">บันทึก</button>
                                <a href="./ui_employee.php" class="btn btn-outline-purple btn-block">ยกเลิก</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
      </section>
    </div>
</div>
</div>
<!-- Menu Toggle Script -->

<?php include"./footer.php"?>
