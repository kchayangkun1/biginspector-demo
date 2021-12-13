
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
/* config W:H category bg  */
#bg_cate_img {
    display: block;
    max-width: 472px;
    max-height: 280px;
    width: auto;
    /* height: auto; */
    object-fit: cover;
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
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-5">
                <div class="justify-content-center">
                    <h3 class="" style="text-align: center;">บริการของเรา</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" data-wow-duration="1.5s" data-wow-offset="100">
            <div class="row" data-aos="fade-up"data-aos-duration="1000">
                <?php 
                    foreach($categories as $item) : 
                        echo '<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">';
                            echo '<div class="card" style="width:100%;">';
                                echo '<div class="content-overlay"></div>';
                                echo '<img id="bg_cate_img" src="'.base_url('assets/images/category/'.$item['img_cover']).'" class="card-img-top" alt="'.$item['name'].'" width="100%" height="280">';
                                echo '<div class="centered">';
                                    echo '<h4 class="text-white text-center mb-5">'.$item['name'].'</h4>';
                                    echo '<a type="button" href="'.base_url('portfolio/'.$item['id'].'/?slug='.$item['name']).'" class="btn btn-primary">คลิกดูผลงาน</a>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    endforeach;
                ?>
            </div>
        </div>
    </div>
</section>
    
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-5">
                    <div class="justify-content-center">
                        <h3 class="" style="text-align: center;">อัตราค่าบริการ</h3>
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
                        <h3 class="" style="text-align: center;">ขั้นตอนการให้บริการ</h3>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </section>