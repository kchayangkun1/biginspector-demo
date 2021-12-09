
   <style>
       @media only screen and (max-width: 640px) and (min-width: 360px){
  
  .centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 13px;
    color: #000;
    font-weight: 700;
    border-radius: 7px;

}
}
@media only screen and (max-width: 1024px) and (min-width: 768px){
  .centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 14px;
    color: #000;
    font-weight: 700;
  }
}
@media only screen and (max-width: 1920px) and (min-width: 1080px){
  .centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 18px;
    color: #000;
    font-weight: 700;
  }
}
@media only screen and (max-width: 2360px) and (min-width: 1640px){
  .centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 18px;
  color: #000;
  font-weight: 700;
}
}
   </style> 
    <!--====== PRELOADER PART START ======-->
    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== PRELOADER PART ENDS ======-->

    <!--====== NAVBAR PART START ======-->
    <section class="header-area">
        <!-- navbar menu -->
        <?php $this->load->view('head'); // load header ?>
        <!-- end -->
        <!-- sliders banner -->
        <?php $this->load->view('home-slider-banner'); // load banners ?>
        <!-- end -->
    </section>
    <!--====== NAVBAR PART ENDS ======-->

    <!--====== SAIDEBAR PART START ======-->
    <?php $this->load->view('sidebar-menu'); // load sider menu ?>
    <!--====== SAIDEBAR PART ENDS ======-->
    
    <!--====== ABOUT PART START ======-->


    <!-- section service -->
    <section id="service" class="service-area">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="section-title text-center mt-30 pb-40">
                    <h4 class="title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.6s">คำนวนค่าบริการ</h4>
                </div>
            </div> <!-- end row Tag titel service -->
            <div class="row justify-content-center">
                        <div class="col-md-6 my-3">
                            <div class="card-outline-secondary">
                                <div class="card-body">
                                    <form class="form" role="form" autocomplete="off">
                                        <div class="form-group row mt-3">
                                            <label class="col-md-3 col-form-label form-control-label">ประเภทที่อยู่อาศัย</label>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" value="" readonly style="border-radius: 8rem;">
                                            </div>
                                        </div>
                                        <div class="form-group row mt-3">
                                            <label class="col-lg-3 col-form-label form-control-label">จำนวนชั้น</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" type="text" value="" readonly style="border-radius: 8rem;">
                                            </div>
                                        </div>
                                        <div class="form-group row mt-3">
                                            <label class="col-lg-3 col-form-label form-control-label">ขนาดพื้นที่ใช้สอย</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" type="text" value="" readonly style="border-radius: 8rem;">
                                            </div>
                                        </div>
                                        <div class="form-group row mt-3">
                                            <label class="col-lg-3 col-form-label form-control-label">ที่อยู่</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" type="text" value="" readonly style="border-radius: 8rem;">
                                            </div>
                                        </div>
                                        <div class="form-group row mt-3">
                                            <label class="col-lg-3 col-form-label form-control-label"></label>
                                            <div class="col-lg-9">
                                            
                                                <input type="button" class="btn btn-primary mt-3" value="คลิกคำนวน" style="border-radius: 9px;"> 
                                            </div>
                                        </div>
                                    </form>
                                </div><!-- card body -->
                            </div> <!-- card-outline -->
                        </div>
                    </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row" data-wow-duration="1.5s" data-wow-offset="100">
                <div class="row" data-aos="fade-up"data-aos-duration="1000">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 " style="padding-left: 0px;padding-right: 0px;">
                        <img src="<?=base_url('assets/img/about/Besttechnicial.png');?>" class="img-rounded" id="accounting2" style="width: 100%;padding: -6px;">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3 pt-3">
                        <h1>เกี่ยวกับเรา</h1>
                        <h4 >BIG Inspector บริการตรวจรับบ้านและคอนโดแบบครบวงจร ครอบคลุมทุกระบบงาน ด้วยเครื่องมือที่ทันสมัย และระบบรายงานผลการตรวจแบบออนไลน์อัตโนมัติ (Real time) เราเข้าใจและใส่ใจทุกตารางนิ้ว เพื่อให้คุณสบายใจหมดกังวนทุกครั้งที่อยู่บ้าน </h4>
                        <h4>"เพื่อช่วงเวลาที่ดีที่สุดของคุณ"</h4>
                        <h4>เพราะบ้านอยู่กับคุณไปอีกนาน</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container mt-5">
            <div class="row justify-content-center" data-wow-duration="1.5s" data-wow-offset="100">
                <div class="row" data-aos="fade-up"data-aos-duration="1000">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ">
                    <img src="<?=base_url('assets/images/bigbanner+icon/iconabout1.png');?>" class="img-responsive" style="width:100%;">
                        <p class="mt-3" style="text-align: center;">เช็คค่าบริการ </p>
                        <p style="text-align: center;">ก่อนตรวจ</p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ">
                        <img src="<?=base_url('assets/images/bigbanner+icon/iconabout2.png');?>" class="img-responsive" style="width:100%;">
                        <p class=" mt-3"style="text-align: center;">รายงานผล</p>
                        <p style="text-align: center;">ออนไลน์ทันที</p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ">
                    <img src="<?=base_url('assets/images/bigbanner+icon/iconabout3.png');?>" class="img-responsive" style="width:100%;">
                        <p class="mt-3" style="text-align: center;">จองฟรี</p>
                        <p style="text-align: center;"> ไม่มีค่ามัดจำ</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-5">
                    <div class="justify-content-center">
                        <h4 class="" style="text-align: center;">บริการของเรา</h4>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" data-wow-duration="1.5s" data-wow-offset="100">
                <div class="row" data-aos="fade-up"data-aos-duration="1000">
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="card" style="width:100%;">
                        <div class="content-overlay"></div>
                            <img src="assets/images/portfolio/bbaf472f4671eb81.jpg" class="card-img-top" alt="...">
                                <div class="centered">
                                    <h4>คอนโด</h4>
                                            <button type="button" class="btn btn-primary">คลิกดูผลงาน</button>
                                </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="card" style="width:100%;">
                        <div class="content-overlay"></div>
                            <img src="assets/images/portfolio/Townhouse-VS-Townhome.jpg" class="card-img-top" alt="...">
                                <div class="centered">
                                    <h4>ทาวน์โฮม</h4>
                                        <button type="button" class="btn btn-primary">คลิกดูผลงาน</button>
                                </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="card" style="width:100%;">
                        <div class="content-overlay"></div>
                            <img src="assets/images/portfolio/Lalin-Town-Lanceo-CRIB-ลำลูกกา-คลอง-2-แบบบ้าน-monaco.jpg" class="card-img-top" alt="...">
                                <div class="centered">
                                    <h4>บ้านเดี่ยว</h4>
                                        <button type="button" class="btn btn-primary">คลิกดูผลงาน</button>
                                </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="card" style="width:100%;">
                        <div class="content-overlay"></div>
                            <img src="assets/images/portfolio/sansiri-investor-content-อัพเดต5โครงการบ้านแฝด-anasiri-krungthep-pathumthani-01.jpg" class="card-img-top" alt="...">
                                <div class="centered">
                                    <h4>บ้านแฝด</h4>
                                        <button type="button" class="btn btn-primary">คลิกดูผลงาน</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-5">
                    <div class="justify-content-center">
                        <h4 class="" style="text-align: center;">โครงการ / ผลงาน</h4>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" data-wow-duration="1.5s" data-wow-offset="100">
                <div class="row" data-aos="fade-up"data-aos-duration="1000">
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="card" style="width:100%;">
                        <!-- <div class="content-overlay"></div> -->
                            <img src="assets/images/reviewBig/1.png" class="card-img-top" alt="...">       
                        </div>
                        <h4 class="mt-3" style="text-align: center;">NAME PRODUCT</h4>    
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="card" style="width:100%;">
                            <img src="assets/images/reviewBig/2.jpg" class="card-img-top" alt="...">
                        </div>
                        <h4 class="mt-3" style="text-align: center;">NAME PRODUCT</h4>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="card" style="width:100%;">
                            <img src="assets/images/reviewBig/3.jpg" class="card-img-top" alt="...">
                        </div>
                        <h4 class="mt-3" style="text-align: center;">NAME PRODUCT</h4>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="card" style="width:100%;">
                            <img src="assets/images/reviewBig/4.jpg" class="card-img-top" alt="...">
                        </div>
                        <h4 class="mt-3" style="text-align: center;">NAME PRODUCT</h4>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-3" data-wow-duration="1.5s" data-wow-offset="100">
                <div class="row" data-aos="fade-up"data-aos-duration="1000">
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="card" style="width:100%;">
                        <!-- <div class="content-overlay"></div> -->
                            <img src="assets/images/reviewBig/5.jpg" class="card-img-top" alt="...">       
                        </div>
                        <h4 class="mt-3" style="text-align: center;">NAME PRODUCT</h4>    
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="card" style="width:100%;">
                            <img src="assets/images/reviewBig/6.jpg" class="card-img-top" alt="...">
                        </div>
                        <h4 class="mt-3" style="text-align: center;">NAME PRODUCT</h4>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="card" style="width:100%;">
                            <img src="assets/images/reviewBig/7.jpg" class="card-img-top" alt="...">
                        </div>
                        <h4 class="mt-3" style="text-align: center;">NAME PRODUCT</h4>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="card" style="width:100%;">
                            <img src="assets/images/reviewBig/8.jpg" class="card-img-top" alt="...">
                        </div>
                        <h4 class="mt-3" style="text-align: center;">NAME PRODUCT</h4>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>



 
    
    
    <!-- footer -->
