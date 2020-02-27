<?php ob_start();?>
<?php session_start();?>
<?php include"./head.php"?>

<!---------------------------------------->
<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-dark bg-dark navbar-without-dd-arrow navbar-shadow"
  role="navigation" data-menu="menu-wrapper">
    <div class="navbar-container main-menu-content container center-layout" data-menu="menu-container">
      <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item" >
                <a class="dropdown-toggle nav-link  btn-outline-purple" href=""><i class="fas fa-home"></i>
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
           <a class="dropdown-toggle nav-link  btn-outline-pin"  data-toggle="dropdown">
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
<!---------------------------------------->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Date dropper section start -->
            <section id="date-dropper">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card">

                            <div class="card-content">
                                <div class="card-body">

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
                                    <br>
                                    <br>
                                    <blockquote class="blockquote pl-1 border-left-danger border-left-3">CHAMP INKJET เป็นบริษัทที่ให้บริการออกแบบ ผลิต ติดตั้ง งานป้ายทุกชนิด สื่อโฆษณา ประชาสัมพันธ์ งานอีเว้นท์ ครบวงจร ดำเนินงาน ด้วยประสบการณ์ที่ยาวนานจากรุ่นพ่อ อาจารย์ไพโรจน์ หงษ์ทอง สู่รุ่นลูก คุณนวมินทร์ หงษ์ทอง การรีแบรนด์จาก “ร้านหงษ์ทองอาร์ต แอนด์ สปอร์ต” ปี 2550 เป็น “ CHAMpurpleJET” ในปี 2559 แบรนด์ที่โดดเด่น ใส่ความคิดสร้างสรรค์ของคนรุ่นใหม่
                                        <br>
                                        <br>
                                        บทพิสูจน์ความท้าทายในธุรกิจ การพัฒนาที่ไม่หยุดนิ่ง ด้วยเทคโนโลยีที่ทันสมัยด้วยเครื่องจักร รองรับเทคโนโลยี THAILAND 4.0 การให้บริการที่สะดวกสบาย หลากหลายในผลิตภัณฑ์บนความต้องการของลูกค้า แต่ยังคงเอกลักษณ์การผสมสานระหว่างความเป็นลูกหลานของคนสระแก้ว ได้รับโอกาสในทางธุรกิจ การยอมรับในผลงานที่ผ่านมา และความเอาใจใส่ในคุณภาพงาน เน้นการบริการที่สร้างความประทับใจ รวมเข้าไว้ด้วยกัน สิ่งเหล่านั่น คือผลสำเร็จระดับหนึ่งเป็นที่รู้จักและมีส่วนแบ่งการตลาดในจังหวัดสระแก้วเพิ่มมากขึ้น
                                        <br>
                                        <br>
                                        ทุกผลงานที่ผ่านมาคือบทเรียนและประสบการณ์ที่มีค้า มากกว่าธุรกิจคือมิตรภาพ เราสัญญาจะไม่หยุดนิ่ง เพราะ โอกาสเกิดได้ทุกเวลา ..ขอบคุณลูกค้าทุกท่านที่เลือกใช้บริการกับเรา และยินดีต้อนรับลูกค้าใหม่ทุกท่าน…</blockquote>
                                    <br>
                                    <div class="row">
           <div class="col-xl-4 col-md-12">
             <div class="card bg-transparent danger">
               <div class="card-content p-2">
                 <div class="card-body">
                   <div class="text-center mb-1">
                     <i class="fas fa-hand-holding-heart font-large-3"></i>
                   </div>
                   <div class="tweet-slider carousel slide text-center" data-ride="carousel">
                     <div class="carousel-inner">
                       <div class="carousel-item active">
                           <h3 class="card-title danger font-medium-3">บริการด้วยหัวใจ</h3><p>
เราใส่ใจและให้ความสำคัญกับการบริการ ทุกขั้นตอน รายละเอียด เพื่อความพึงพอใจของคุณ</p>
                       </div>
                       <div class="carousel-item">
                           <h3 class="card-title danger font-medium-3">บริการด้วยหัวใจ</h3><p>
เราใส่ใจและให้ความสำคัญกับการบริการ ทุกขั้นตอน รายละเอียด เพื่อความพึงพอใจของคุณ</p>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <div class="col-xl-4 col-md-12">
             <div class="card bg-transparent primary">
               <div class="card-content p-2">
                 <div class="card-body">
                   <div class="text-center mb-1">
                     <i class="fas fa-thumbs-up font-large-3"></i>
                   </div>
                   <div class="fb-post-slider carousel slide text-center" data-ride="carousel">
                     <div class="carousel-inner">
                       <div class="carousel-item active">
                      <h3 class="card-title primary font-medium-3">มาตรฐานการผลิต</h3><p>
เราใส่ใจทุกขั้นตอนการผลิต รวมทั้งวัสดุอุปกรณ์ที่ใช้ เพื่อผลงานที่มีคุณภาพ</p>
                       </div>
                       <div class="carousel-item ">
                      <h3 class="card-title primary font-medium-3">มาตรฐานการผลิต</h3><p>
                    เราใส่ใจทุกขั้นตอนการผลิต รวมทั้งวัสดุอุปกรณ์ที่ใช้ เพื่อผลงานที่มีคุณภาพ</p>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <div class="col-xl-4 col-md-12">
             <div class="card bg-transparent yellow">
               <div class="card-content p-2">
                 <div class="card-body">
                   <div class="text-center mb-1">
                     <i class="fas fa-lightbulb  font-large-3"></i>
                   </div>
                   <div class="linkedin-post-slider carousel slide text-center" data-ride="carousel">
                     <div class="carousel-inner">
                       <div class="carousel-item active">
                           <h3 class="card-title yellow font-medium-3">สร้างสรรค์ไอเดีย</h3><p>
ไอเดียความคิดใหม่ ๆ เริ่มตั้งแต่การออกแบบดีไซน์ จนถึงงานผลิต เพื่อผลงานที่มีคุณภาพ สำหรับคุณ</p>
                       </div>
                       <div class="carousel-item">
                           <h3 class="card-title yellow font-medium-3">สร้างสรรค์ไอเดีย</h3><p >
                  ไอเดียความคิดใหม่ ๆ เริ่มตั้งแต่การออกแบบดีไซน์ จนถึงงานผลิต เพื่อผลงานที่มีคุณภาพ สำหรับคุณ</p>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
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


<?php include"./footer.php"?>
