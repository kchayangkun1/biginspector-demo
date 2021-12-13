<style>
/* config W:H img cover */
#bg_recom_img {
    display: block;
    max-width: 472px;
    max-height: 270px;
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
    <?php //$this->load->view('sidebar-menu'); // load sider menu ?>
    <!--====== SAIDEBAR PART ENDS ======-->
    
    <!--====== ABOUT PART START ======-->

<!--====== SAIDEBAR PART ENDS ======-->
    
<!--====== ABOUT PART START ======-->
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-5">
                <div class="justify-content-center">
                    <h4 class="" style="text-align: center;">โครงการ / ผลงาน : <?=$slug;?></h4>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" data-wow-duration="1.5s" data-wow-offset="100">
            <div class="row" data-aos="fade-up" data-aos-duration="1000">
                <?php 
                    foreach($ports as $item) : 
                        echo '<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">';
                            echo '<div class="card" style="width:100%;">';
                                echo '<img id="bg_recom_img" src="'.base_url('assets/images/portfolio/cover/'.$item['id'].'/'.$item['img_cover']).'" class="card-img-top" alt="'.$item['name'].'" width="100%" height="270">';
                            echo '</div>';
                            echo '<div class="d-flex justify-content-center">';
                                echo '<a href="'.base_url('portfolio-detail/'.$item['id'].'/?slug='.$slug.'&name='.$item['name']).'">';
                                    echo '<h4 class="mt-3" style="text-align: center;">'.$item['name'].'</h4>';
                                echo '</a>';
                            echo '</div>';
                        echo '</div>';
                    endforeach;
                ?>
            </div>
            <!-- pagination -->
            <div class="row mt-4 mb-4" data-aos="fade-up" data-aos-duration="1000">
                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="container">
                        <?=$pagination;?>
                    </div>
                </div>
            </div>
            <!-- end -->
        </div>
    </div>
    </div>
    </div>
</section>
