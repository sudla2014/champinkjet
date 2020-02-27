<?php ob_start();?>
<?php session_start();?>
<?php include"./head.php"?>
<?php require("connectdb.php");?>
<?php require('./lib/phpqrcode/qrlib.php');?>
<!---------------------------------------->
<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark bg-dark navbar-without-dd-arrow navbar-shadow"
  role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content container center-layout" data-menu="menu-container">
      <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item" >
                <a class="dropdown-toggle nav-link btn-outline-purple" href="./ui_employee.php"><i class="fas fa-home"></i>
                    <span>หน้าแรก</span>
                </a>
            </li>
            <li class=" nav-item" >
                <a class="dropdown-toggle nav-link btn-outline-purple" href="./ui_workorderown.php" ><i class="fas fa-sticky-note"></i>
                    <span>สั่งงานหน้าร้าน</span>
                </a>
            </li>
            <li class=" nav-item" >
                <a class="dropdown-toggle nav-link btn-outline-purple" href="./ui_artworkmanager.php" ><i class="fas fa-image"></i>
                    <span>จัดการออกแบบงาน</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="dropdown-toggle nav-link btn-outline-purple"  href="./ui_printwork.php" ><i class="fas fa-print"></i>
                    <span>จัดการสั่งผลิตสินค้า</span>
                </a>
            </li>
 </ul>
 <ul class="nav navbar-nav justify-content-end"  id="main-menu-navigation" data-menu="menu-navigation">
              <li class="dropdown nav-item"   data-menu="dropdown">
           <a class="dropdown-toggle nav-link btn-outline-purple"  data-toggle="dropdown">
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


            <div class="card" style="margin: 20px;">
              <div class="card-header white bg-dark text-center font-medium-1">
            <i class="fas fa-sticky-note"></i> สั่งงานหน้าร้าน
              </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <form action="./ui_workorderown_SESS.php" method="post" name="frm" onsubmit="checkForm(event, this;">
                                <input type="hidden" name="method" value="add" />

                                <div class="row">
                                    <div class="col">
                									<label for="exampleInputFirstname">ชื่อลูกค้า </label>  <span style="color:Red;">*</span>
                									<input type="text" class="form-control" id="Fname" name="Fname"   aria-describedby="textHelp" placeholder="Enter First name" required>
                                  </div>
                								</div>

                                <div class="row">
                                    <div class="col">
                                  <label for="exampleInputFirstname">เบอร์ติดต่อ </label>  <span style="color:Red;">*</span>
                                  <input type="text" class="form-control" id="Phone" name="Phone"  aria-describedby="textHelp" placeholder="Enter Phone Number" required>
                                  </div>
                                  <div class="col">
                                  <label for="exampleInputLastname">LINE : </label>  <span style="color:Red;">*</span>
                                  <input type="text" class="form-control" id="Line" name="Line"  aria-describedby="textHelp" placeholder="Enter Line Id" required>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col">
  <label for="exampleFormControlSelect2">ประเภทงาน</label>
                                <select id="myOption" name="Ty_NameDetail"  class="form-control" onchange="setValue(this,'price1');chk()" required>
                                    <option value="">- กรุณาเลือกประเภทงาน -</option>
                                    <?php $sqls="SELECT * FROM type" ;
                    $results = $mysqli->query($sqls) or die($mysqli->error.__LINE__);
                    $rowofmember2=$results->num_rows;
                    while($row = mysqli_fetch_array($results)) {
                      $Ty_Id = $row['Ty_Id'];
                      $Ty_Name = $row['Ty_Name'];
                      $Ty_NameDetail = $row['Ty_NameDetail'];
                      $Ty_Price = $row['Ty_Price'];

                    if($Ty_Id==$_GET['Ty_Id'] && $Ty_Price==$_GET['price']){
                      echo  "<option selected value='".$Ty_Id.":".$Ty_Price."'>".$Ty_NameDetail."</option>";


                    } else {
                      echo

                      "<option value='".$Ty_Id.":".$Ty_Price."'>".$Ty_NameDetail."</option>";
                    }


                  }?>
                                </select>

                                  <input type="hidden" name="price" id="price1"  />
                                <input type="hidden" name="Ty_Id" id="Ty_Id" />
                                <script type="text/javascript">
                                    function setValue(e, target) {
                                        //var seclectedText = e.options[e.selectedIndex].text;
                                        var seclectedValue = e.value;
                                        var str1 = seclectedValue.split(":");

                                        document.getElementById(target).value = str1[1];
                                          document.frm.Ty_Id.value = str1[0];
                                    }
                                </script>
                                <script language="JavaScript">
                                    function chk() {
                                        var a1 = parseFloat(document.frm.Or_Width.value);
                                        var a2 = parseFloat(document.frm.Or_Long.value);
                                        var ac = parseInt(document.frm.specifyNumber.value);
                                        var a3 = parseInt(document.frm.price.value);
                                        document.frm.c.value = a3 * a1 * a2 * ac;
                                    }

                                </script>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlSelect2">ลักษณะ</label>
                                    <select class="form-control form-control-chosen" id="S_Id" name="S_Id" required>
                                        <option value="">- กรุณาเลือกลักษณะ -</option>
                                        <?php $sqls="SELECT * FROM style" ;
                      $results = $mysqli->query($sqls) or die($mysqli->error.__LINE__);
                      $rowofmember2=$results->num_rows;
                      while($row = mysqli_fetch_array($results)) {
                        $S_Id = $row['S_Id'];
                        $S_Name = $row['S_Name'];
                        if($S_Id==$_GET['S_Id']){
                            echo "<option selected value='".$S_Id."'>".$S_Name."</option>";

                        }else {
                          echo "<option value='".$S_Id."'>".$S_Name."</option>";
                        }
                      }
                      ?>
                                    </select>
                                    <input type="hidden" name="S_Id1" id="S_Id"  />


                                </div>
  </div>
  <div class="row">
    <div class="col">
      <label for="exampleFormControlSelect2">วันที่ต้องการรับสินค้า</label>
      <input type="date" class="form-control" name="Or_ReceiveDay">

  </div>

  <div class="col">
      <label for="exampleFormControlSelect2">เวลาที่ต้องการรับสินค้า</label>
      <input type="time" class="form-control" id="Or_Time" name="Or_Time"  min="09:00" max="18:00" required>
  </div>
  </div>
                                <!--ขนาดของไวนิล-->
                                <div class="row">
                                  <div class="col">
                                    <label for="exampleFormControlSelect2">แนวนอน (เมตร)</label>
                                    <input type="number" class="form-control" name="Or_Width"  id="currencyTextBox" min="0.1" step="0.1" aria-describedby="textHelp" onfocus="chk()" onblur="chk()" onchange="chk()" onKeyUp="chk()" required>
                                </div>
                                <div class="col">
                                    <label for="exampleFormControlSelect2">แนวตั้ง (เมตร)</label>
                                    <input type="number" class="form-control" name="Or_Long"  id="currencyTextBox"  min="0.1" step="0.1" aria-describedby="textHelp" onfocus="chk()" onblur="chk()" onchange="chk()" onKeyUp="chk()" required>
                                </div>
                                </div>
                                <script>
                                    function setInputFilter(textbox, inputFilter) {
                                        ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
                                            textbox.addEventListener(event, function() {
                                                if (inputFilter(this.value)) {
                                                    this.oldValue = this.value;
                                                    this.oldSelectionStart = this.selectionStart;
                                                    this.oldSelectionEnd = this.selectionEnd;
                                                } else if (this.hasOwnProperty("oldValue")) {
                                                    this.value = this.oldValue;
                                                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                                                }
                                            });
                                        });
                                    }
                                    setInputFilter(document.getElementById("currencyTextBox"), function(value) {
                                        return /^-?\d*[.]?\d{0,2}$/.test(value);
                                    });

                                </script>


                                <div class="row">
                                  <div class="col">
                                    <label for="exampleFormControlSelect2">จำนวนสินค้าที่ต้องการ</label>
                                    <input type="text" class="form-control" name="specifyNumber" id="specifyNumber" aria-describedby="textHelp"   onfocus="chk()" onblur="chk()" onchange="chk()" onKeyUp="chk()">
                                </div>



                                <div class="col">
                                    <label for="exampleFormControlSelect2">ราคา</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">฿</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="ราคาทั้งหมด" name="c"  readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>

                                </div>
                                <div class="row">
                                    <div class="col">
                                      <label for="exampleFormControlSelect2">สถานะการจ่ายเงิน</label>
                                      <select class="form-control" onchange="test()" id="money_status" name="money_status" required>
                                        <option value="">- กรุณาเลือกสถานะการจ่ายเงิน -</option>
                                      <option value="1">เงินสด</option>
                                      <option value="2">มัดจำ</option>
                                      <option value="3">บัตรเครดิต</option>
                                      <option value="4">เงินโอน</option>
                                  </select>
                                  <script>
                                  var e = document.getElementById("money_status");
var strUser = e.options[e.selectedIndex].value;
                                  </script>
                                    </div>
                                  <div class="col">
                                  <label for="exampleInputLastname">จำนวนเงิน </label>
                                  <input type="text" class="form-control" id="money" name="money" aria-describedby="textHelp"  required>
                                </div>
                                </div>
    <br>

                                   <button type="submit" name="submit" class="btn btn-purple  btn-block">บันทึก</button>
                                   <?php
                                   if(!isset($_SESSION['Ty_Id'])){$_SESSION['Ty_Id'] = "";}
                                   if(!isset($_SESSION['S_Id'])){$_SESSION['S_Id'] = "";}
                                   if(!isset($_SESSION['Or_Width'])){$_SESSION['Or_Width'] = "";}
                                   if(!isset($_SESSION['Or_Long'])){$_SESSION['Or_Long'] = "";}
                                   if(!isset($_SESSION['Or_WorkDay'])){$_SESSION['Or_WorkDay'] = "";}
                                   if(!isset($_SESSION['Or_ReceiveDay'])){$_SESSION['Or_ReceiveDay'] = "";}
                                   if(!isset($_SESSION['Or_Time'])){$_SESSION['Or_Time'] = "";}
                                   if(!isset($_SESSION['Fname'])){$_SESSION['Fname'] = "";}
                                   if(!isset($_SESSION['Lname'])){$_SESSION['Lname'] = "";}
                                   if(!isset($_SESSION['Phone'])){$_SESSION['Phone'] = "";}
                                   if(!isset($_SESSION['Line'])){$_SESSION['Line'] = "";}
                                   if(!isset($_SESSION['specifyNumber'])){$_SESSION['specifyNumber'] = "";}
                                   if(!isset($_SESSION['c'])){$_SESSION['c'] = "";}
                                   if(!isset($_SESSION['money_status'])){$_SESSION['money_status'] = "";}
                                   if(!isset($_SESSION['money'])){$_SESSION['money'] = "";}
                                     $Ty_Id=$_SESSION['Ty_Id'];
                                     $S_Id=$_SESSION['S_Id'];
                                     $Or_Width=$_SESSION['Or_Width'];
                                     $Or_Long=$_SESSION['Or_Long'];
                                     $Or_WorkDay = date('Y-m-d');
                                     $Or_ReceiveDay=$_SESSION['Or_ReceiveDay'];
                                     $Or_Time=$_SESSION['Or_Time'];
                                     $Fname=$_SESSION['Fname'];
                                     $Lname=$_SESSION['Lname'];
                                     $Phone=$_SESSION['Phone'];
                                     $Line=$_SESSION['Line'];
                                     $specifyNumber=$_SESSION['specifyNumber'];
                                     $c=$_SESSION['c'];
                                     $money_status=$_SESSION['money_status'];
                                     $money=$_SESSION['money'];
                                        if($c== "" && $money_status == "" && $money ==""){
                                        }
                                        else {
                                     $sqls="SELECT * FROM type WHERE Ty_Id ='$Ty_Id'" ;
                                     $results = $mysqli->query($sqls) or die($mysqli->error.__LINE__);
                                     $rowofmember2=$results->num_rows;
                                     while($row = mysqli_fetch_array($results)) {
                                     $Ty_Id = $row['Ty_Id'];
                                     $Ty_Name = $row['Ty_Name'];
                                     $Ty_NameDetail = $row['Ty_NameDetail'];
                                     $Ty_Price = $row['Ty_Price'];
                                     }
                                     $sqls="SELECT * FROM style where S_Id='$S_Id'" ;
                                     $results = $mysqli->query($sqls) or die($mysqli->error.__LINE__);
                                     $rowofmember2=$results->num_rows;
                                     while($row = mysqli_fetch_array($results)) {
                                     $S_Id = $row['S_Id'];
                                     $S_Name = $row['S_Name'];
                                     }
                                     $Or_Details="  ประเภทงาน  ".$Ty_NameDetail."  ลักษณะ  ".$S_Name." ความกว้าง ".$Or_Width." ความยาว ".$Or_Long.
                                     " วันที่สั่งสินค้า ".$Or_WorkDay." วันที่ต้องการรับสินค้า ".$Or_ReceiveDay." เวลาที่ต้องการรับสินค้า ".$Or_Time.
                                     " จำนวนสินค้าที่ต้องการ ".$specifyNumber." ราคา ".number_format($c)." บาท" ;
                                     $sqls="select * from member where member.Mem_Fname='$Fname' and member.Mem_Lname='$Lname'";
                                     $results = $mysqli->query($sqls) or die($mysqli->error.__LINE__);
                                     $row=$results->num_rows;
                                     while($row = mysqli_fetch_array($results)) {
                                       $Mem_Id= $row["Mem_Id"];
                                       $Mem_Fname= $row["Mem_Fname"];
                                       $Mem_Lname= $row["Mem_Lname"];
                                     }
                                     if(mysqli_num_rows($results) != 0){
                                     }
                                       else {
                                           $sqls="INSERT INTO member (Mem_Fname,Mem_Lname,Mem_Phone,Mem_Line) VALUES ('$Fname','$Lname','$Phone','$Line')";
                                         $mysqli->query($sqls);

                                       }
                                     $sqls = "SELECT * FROM orders ORDER BY Or_Id DESC LIMIT 1";
                                     $results = $mysqli->query($sqls) or die($mysqli->error.__LINE__);
                                     $rowofmember2=$results->num_rows;
                                     while($row = mysqli_fetch_array($results)) {
                                     $Or_Id = $row['Or_Id'];
                                         }
                                     $rest = substr("$Or_Id", -4);
                                     $insert_id = "$rest" + 1;
                                     $ars = sprintf("%04d", $insert_id);
                                     $emp_id = $ars;
                                      $ref = date('d');
                                     $emp = $ref.'-'.$ars;
                                     $sqls="select * from member where member.Mem_Fname='$Fname' and member.Mem_Lname='$Lname'";
                                     $results = $mysqli->query($sqls) or die($mysqli->error.__LINE__);
                                     $row=$results->num_rows;
                                     while($row = mysqli_fetch_array($results)) {
                                       $Mem_Id= $row["Mem_Id"];
                                       $Mem_Fname= $row["Mem_Fname"];
                                       $Mem_Lname= $row["Mem_Lname"];
                                     }
                                     if(mysqli_num_rows($results) != 0){
                                     }
                                       else {
                                         $sqls="INSERT INTO member (Mem_Fname,Mem_Phone,Mem_Line) VALUES ('$Fname','$Phone','$Line')";
                                         $mysqli->query($sqls);

                                       }

                                                  $sqls="select * from member where member.Mem_Fname='$Fname' and member.Mem_Lname='$Lname'";
                                                $results = $mysqli->query($sqls) or die($mysqli->error.__LINE__);
                                                $row=$results->num_rows;
                                                while($row = mysqli_fetch_array($results)) {
                                                  $Mem_Id= $row["Mem_Id"];
                                                }
                                      $query= "INSERT INTO orders(Or_Details,Or_Width,Or_Long,Or_WorkDay, Or_ReceiveDay,Or_SendorderDay,Or_Time,Or_Count,Or_Qid,Or_Qnumber,Ty_Id,S_Id,St_Id, Mem_Id) VALUES ('$Or_Details','$Or_Width','$Or_Long','$Or_WorkDay','$Or_ReceiveDay','0000-00-00','$Or_Time','$specifyNumber','$insert_id','$emp','$Ty_Id','$S_Id','3','$Mem_Id')";
                                          $mysqli->query($query);
                                  $sqls = "SELECT * FROM orders ORDER BY Or_Id DESC LIMIT 1";
                                     $results = $mysqli->query($sqls) or die($mysqli->error.__LINE__);
                                     $rowofmember2=$results->num_rows;
                                     while($row = mysqli_fetch_array($results)) {
                                     $Or_Id = $row['Or_Id'];
                                     }
                                     $tempDir = "./uploads/picqrcode/";
                                     $codeContents = "https://thechampurplejetbyit.000webhostapp.com/vieworder.php?id=$Or_Id";
                                     $fileName = $Or_Id.$emp.".png";
                                     $name=md5($codeContents);
                                     $pngAbsoluteFilePath = $tempDir.$fileName;
                                     $urlRelativeFilePath = $tempDir.$fileName;
                                     if (!file_exists($pngAbsoluteFilePath)) {
                                     QRcode::png($codeContents, $pngAbsoluteFilePath,QR_ECLEVEL_L, 4);
                                       //echo'<hr />';
                                     } else {
                                     //  echo 'File already generated! We can use this cached file to speed up site on common codes!';
                                     }
                                     //  echo '<hr />';
                                     //    echo 'Server PNG File: '.$pngAbsoluteFilePath;
                                     //echo '<hr />';
                                     $sqls="UPDATE orders SET orders.Or_Qrcode='$fileName' WHERE orders.Or_Id='$Or_Id'";
                                     $mysqli->query($sqls);

                                        }

                                   if($c== "" && $money_status == "" && $money ==""){
                                      }else {
                                        echo "<a href=\"./ui_workorderown_pdf.php?Or_Id=$insert_id&c=$c&money_status=$money_status&money=$money\"  class=\"btn btn-outline-primary btn-block\"><i class=\"fas fa-print\" aria-hidden=\"true\"></i> พิมพ์งาน </a>";
                                   }
                                   ?>
                        </div>
                        </div>



                  </form>
            </div>
            <!-- /#page-content-wrapper -->
            <?php
         if( $_SESSION['Ty_Id']!="" &&
          $_SESSION['S_Id'] !="" &&
           $_SESSION['Or_Width'] !="" &&
           $_SESSION['Or_Long'] !="" &&
           $_SESSION['Or_WorkDay'] !="" &&
           $_SESSION['Or_ReceiveDay'] !="" &&
           $_SESSION['Or_Time'] !="" &&
           $_SESSION['Fname'] !="" &&

           $_SESSION['Phone'] !="" &&
           $_SESSION['Line'] !="" &&
           $_SESSION['specifyNumber'] !="" &&
           $_SESSION['money_status'] !="" &&
           $_SESSION['money'] !="" &&
           $_SESSION['c'] !=""){
             unset($_SESSION['Ty_Id']);
            unset($_SESSION['S_Id']);
            unset($_SESSION['Or_Width']);
           unset($_SESSION['Or_Long']);
           unset($_SESSION['Or_WorkDay']);
          unset($_SESSION['Or_ReceiveDay']);
          unset($_SESSION['Or_Time']);
         unset($_SESSION['Fname']);

        unset($_SESSION['Phone']);
        unset($_SESSION['Line']);
       unset($_SESSION['specifyNumber']);
       unset($_SESSION['money_status']);
       unset($_SESSION['money']);
       unset($_SESSION['c']);
         }
         ?>
        </div>
      </section>
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-chosen@1.4.2/bootstrap-chosen.min.css" rel="stylesheet"/>
<script>
 $("#S_Id").chosen();
 $("#myOption").chosen();

</script>
<!-- Menu Toggle Script -->
<?php include"./footer.php"?>
