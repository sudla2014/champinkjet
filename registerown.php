<?php ob_start();?>
<?php session_start();?>
<?php include"./head.php"?>
<!---------------------------------------->
<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark bg-pink navbar-without-dd-arrow navbar-shadow"
  role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content container center-layout" data-menu="menu-container">
      <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item" >
                <a class="dropdown-toggle nav-link" href=""><i class="fas fa-home"></i>
                    <span>หน้าแรก</span>
                </a>
            </li>
            <li class=" nav-item" >
                <a class="dropdown-toggle nav-link" href="./ui_orderall.php"><i class="fas fa-layer-group"></i>
                    <span>จัดการการสั่งงาน</span>
                </a>
            </li>
            <li class=" nav-item" >
                <a class="dropdown-toggle nav-link" href="./ui_qwork.php" ><i class="fas fa-filter"></i>
                    <span>จัดการคิวงาน</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="dropdown-toggle nav-link"  href="./ui_producttype.php" ><i class="fas fa-cubes"></i>
                    <span>จัดการประเภทงาน</span>
                </a>
            </li>
            <li class="dropdown nav-item" data-menu="dropdown">
         <a class="dropdown-toggle nav-link"  data-toggle="dropdown">
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
           <a class="dropdown-toggle nav-link"  data-toggle="dropdown">
             <i class="fas fa-tachometer-alt"></i>
             <span>จัดการออกรายงาน</span>
           </a>

           <ul class="dropdown-menu">
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
                   <a class="dropdown-toggle nav-link"  data-toggle="dropdown">
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
                										<div class="col-md-8 col-sm-8 col-xd-8 ml-auto mr-auto">
                                        <div class="card mx-auto">
                                            <div class="card-content ">
                                              <div class="card-header white bg-pink text-center font-medium-3">
                                      <i class="fas fa-user-plus"></i> เพิ่มข้อมูลเจ้าของร้าน
                                    </div>

                                                <div class="card-body">

                																	<form action="./addemp.php" method="post" name="frm" onsubmit="return checkall();">
                																		<input type="hidden" name="method" value="add" />
                																		<input type="hidden" name="Mem_Status" value="1" />

                																				<div class="form-row mx-auto">
                								 <div class="form-group col-sm">
                																					<label for="exampleInputFirstname">ชื่อ </label>  <span style="color:Red;">*</span>
                																					<input type="text" class="form-control" id="Fname" name="Fname" aria-describedby="textHelp" placeholder="Enter First name" required>
                																				</div>
                																			<div class="form-group col-sm">
                																					<label for="exampleInputLastname">นามสกุล </label>  <span style="color:Red;">*</span>
                																					<input type="text" class="form-control" id="Lname" name="Lname" aria-describedby="textHelp" placeholder="Enter Last name" required>
                																				</div>
                																				</div>

                																				<div class="form-group">
                																					<label for="exampleFormControlTextarea1">ที่อยู่ </label>
                																					<textarea class="form-control" id="Address" name="Address" rows="3" ></textarea>
                																				</div>

                																				<div class="form-row mx-auto">
                																				<div class="form-group col-sm">
                																					<label for="exampleInputLine">โทรศัพท์ </label>
                																					<input type="text" class="form-control" id="Phone" OnKeyPress="return chkNumber(this)" name="Phone" aria-describedby="textHelp" maxlength="10" placeholder="Enter Phone Number">
                																				</div>
                																				<div class="form-group col-sm">
                																					<label for="exampleInputEmail1">อีเมล </label> <span style="color:Red;">*</span>
                																					<input type="email" class="form-control" id="UserEmail" name="Email" aria-describedby="emailHelp" placeholder="Enter email" autocomplete="off" required onkeyup="checkemail();" />
                																					<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                																					<span id="email_status"></span>
                																				</div>
                																				</div>
                																					<div class="form-row mx-auto">
                																				<div class="form-group col-sm">
                																					<label for="exampleInputLine">ไอดีไลน์ </label>
                																					<input type="text" class="form-control" id="Line" name="Line" aria-describedby="textHelp" placeholder="Enter Line ID" >
                																				</div>
                																			<div class="form-group col-sm">
                																					<label for="exampleInputEmail1">ไอดีชื่อผู้ใช้ </label>  <span style="color:Red;">*</span>
                																					<input type="text" class="form-control" id="username" name="User" aria-describedby="textHelp" placeholder="Enter Username" autocomplete="off" required onkeyup="checkname();" />
                																					<span id="name_status"></span>
                																				</div>
                																				</div>
                																					<div class="form-row mx-auto">
                																					<div class="form-group col-sm">
                																					<label for="pass1">รหัสผ่าน </label>  <span style="color:Red;">*</span>
                                                          <div class="input-group" id="show_hide_password">
                      <input class="form-control" type="password" name="pass1"  placeholder="Enter Password"  minlength="8" maxlength="12" required>
                      <div class="input-group-addon">
                        <a href=""><i class="fas fa-eye-slash" aria-hidden="true"></i></a>
                      </div>
                    </div>
                																				</div>
                																					<div class="form-group col-sm">
                																					<label for="pass2">ยืนยันรหัสผ่าน </label>  <span style="color:Red;">*</span>
                                                          <div class="input-group" id="show_hide_password1">
                      <input class="form-control" type="password" name="pass2"  placeholder="Enter Password"  minlength="8" maxlength="12" required>
                      <div class="input-group-addon">
                        <a href=""><i class="fas fa-eye-slash" aria-hidden="true"></i></a>
                      </div>
                    </div>
                																				</div>
                																			</div>
                																			</div>

                																				<button type="submit" name="submit_form" class="btn btn-pink btn-block">สมัครสมาชิก</button>
                																				<a href="./index.php" class="btn btn-outline-pink btn-block">ยกเลิก</a>
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
