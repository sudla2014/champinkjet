<?php include"./head.php"?>
<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark bg-dark navbar-without-dd-arrow navbar-shadow"
  role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content container center-layout" data-menu="menu-container">
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item" >
                <a class="dropdown-toggle nav-link btn-outline-purple" href="index.php"><i class="fas fa-home"></i>
                    <span>หน้าแรก</span>
                </a>
            </li>
            <li class="nav-item" >
                <a class="dropdown-toggle nav-link btn-outline-purple" href="about.php"><i class="fas fa-address-card"></i>
                    <span>เกี่ยวกับเรา</span>
                </a>
            </li>    <li class="dropdown nav-item" data-menu="dropdown">
             <a class="dropdown-toggle nav-link btn-outline-purple" href="index.html" data-toggle="dropdown"><i class="fas fa-folder"></i>
               <span>บริการของเรา</span>
             </a>
             <ul class="dropdown-menu">
               <li data-menu=""><a class="dropdown-item" href="" data-toggle="dropdown">ป้ายไวนิล สติ๊กเกอร์</a>
               </li>
               <li data-menu=""><a class="dropdown-item" href="" data-toggle="dropdown">ป้ายหน้าร้าน/ป้ายหน้าบริษัท</a>
               </li>
               <li data-menu=""><a class="dropdown-item" href="" data-toggle="dropdown">งานอะครีลิก กล่องไฟ</a>
               </li>
               <li data-menu=""><a class="dropdown-item" href="" data-toggle="dropdown">สื่อสิ่งพิมพ์ ฉลากสินค้า</a>
               </li>
               <li data-menu=""><a class="dropdown-item" href="" data-toggle="dropdown">อีเว้นท์ นิทรรศการ</a>
               </li>
               <li data-menu=""><a class="dropdown-item" href="" data-toggle="dropdown">อุปกรณ์ออกบูธทุกประเภท</a>
               </li>
               <li data-menu=""><a class="dropdown-item" href="" data-toggle="dropdown">ป้ายงานมงคล งานเลี้ยง</a>
               </li>
               <li data-menu=""><a class="dropdown-item" href="" data-toggle="dropdown">รื้อถอน ติดตั้ง บริการอื่นๆ</a>
               </li>
             </ul>
           </li>
            <li class=" nav-item" >
                <a class="dropdown-toggle nav-link btn-outline-purple" href="" ><i class="fas fa-sign-in-alt"></i>
                    <span>เข้าสู่ระบบ</span>
                </a>
            </li>

        </ul>
        <ul class="nav navbar-nav justify-content-end"  id="main-menu-navigation" data-menu="menu-navigation">
                     <li class="nav-item" >
                       <a href="https://www.facebook.com/champinkjet" class="nav-link btn-outline-purple "><i class="fab fa-facebook-square"></i>
                           <span>facebook</span>
                       </a>
                   </li>
                   <li class="nav-item" >
                     <a href="#" class="dropdown nav-link btn-outline-purple "><i class="fab fa-line"></i>
                         <span>Line</span>
                     </a>
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
                    <div class="col-md-6 col-sm-12">
                        <div class="card">

                            <div class="card-content">
                              <div class="card-header white bg-dark text-center font-medium-3">
                      <i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ
                    </div>
                                <div class="card-body">

                                  <form action="./check.php" method="post" name="frm">
                                      <div class="form-group row">
                                          <label for="inputEmail" class="col-sm-2 col-form-label">ไอดีชื่อผู้ใช้ </label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" id="inputUser" placeholder="Enter Username" name="user">
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="inputPassword" class="col-sm-2 col-form-label">รหัสผ่าน </label>
                                          <div class="col-sm-10">
                                            <div class="input-group" id="show_hide_password">
        <input class="form-control" type="password" name="pass"  placeholder="Enter Password"  minlength="8" maxlength="12" required>
        <div style="height:auto;" class="input-group-addon">
          <a  href=""><i class="fas fa-eye-slash" aria-hidden="true"></i></a>
        </div>
      </div>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <div class="col-sm-10 offset-sm-2">
                                              <button type="submit" name="login" class="btn btn-purple btn-block"> เข้าสู่ระบบ</button>
                                              <a href="./index.php" class="btn btn-outline-warning btn-block">ยกเลิก</a>
                                          </div>
                                      </div>

                                  </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <blockquote class="blockquote pl-1 border-left-purple border-left-3">CHAMP INKJET เป็นบริษัทที่ให้บริการออกแบบ ผลิต ติดตั้ง งานป้ายทุกชนิด สื่อโฆษณา ประชาสัมพันธ์ งานอีเว้นท์ ครบวงจร ดำเนินงาน ด้วยประสบการณ์ที่ยาวนานจากรุ่นพ่อ อาจารย์ไพโรจน์ หงษ์ทอง สู่รุ่นลูก คุณนวมินทร์ หงษ์ทอง การรีแบรนด์จาก “ร้านหงษ์ทองอาร์ต แอนด์ สปอร์ต” ปี 2550 เป็น “ CHAMpurpleJET” ในปี 2559 แบรนด์ที่โดดเด่น ใส่ความคิดสร้างสรรค์ของคนรุ่นใหม่
                          <br>
                          <br>
                          บทพิสูจน์ความท้าทายในธุรกิจ การพัฒนาที่ไม่หยุดนิ่ง ด้วยเทคโนโลยีที่ทันสมัยด้วยเครื่องจักร รองรับเทคโนโลยี THAILAND 4.0 การให้บริการที่สะดวกสบาย หลากหลายในผลิตภัณฑ์บนความต้องการของลูกค้า แต่ยังคงเอกลักษณ์การผสมสานระหว่างความเป็นลูกหลานของคนสระแก้ว ได้รับโอกาสในทางธุรกิจ การยอมรับในผลงานที่ผ่านมา และความเอาใจใส่ในคุณภาพงาน เน้นการบริการที่สร้างความประทับใจ รวมเข้าไว้ด้วยกัน สิ่งเหล่านั่น คือผลสำเร็จระดับหนึ่งเป็นที่รู้จักและมีส่วนแบ่งการตลาดในจังหวัดสระแก้วเพิ่มมากขึ้น
                          <br>

                </div>
                </div>
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img src="assets/brand/Banner1-1.jpg" alt="First slide">
                            <div class="carousel-caption">
                                <h3 class="card-title white font-medium-3">บริการงานออกบูธ นิทรรศการ งานอีเว้น ออแกไนซ์ ครบวงจร</h3>
                                <p>
                                    ด้วยทีมงานที่มีประสบการณ์ และคุณภาพ เราออกแบบและเนรมิต บูธ นิทรรศการ งานอีเว้น ตรงใจคุณ.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="assets/brand/banner2-2.jpg" alt="Second slide">
                            <div class="carousel-caption">
                                <h3 class="card-title white font-medium-3">บริการงานป้ายคุณภาพ แบบครบวงจร</h3>
                                <p>
                                    รับออกแบบงานป้ายทุกชนิด ไวนิล สติ๊กเกอร์ โรลอัพ ธงญี่ปุ่น แบ็กดรอป การ์ดงานพิธีต่างๆ นามบัตร</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="assets/brand/banner4-1.jpg" alt="Third slide">
                            <div class="carousel-caption">
                                <h3 class="card-title white font-medium-3">เรามีเทคโนโลยีงานพิมพ์ที่ทันสมัย</h3>
                                <p>

                                    พร้อมผลิตและสร้างสรรค์งานพิมพ์อย่างครบวงจร</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </section>
        </div>
    </div>
</div>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();

</script>
<!-- Menu Toggle Script -->
    <?php include"./footer.php"?>
