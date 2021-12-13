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
                    <h4 class="" style="text-align: center;">โครงการ / ผลงาน : <?=$slug;?> / <?=$port_descs[0]['name'];?></h4>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" data-wow-duration="1.5s" data-wow-offset="100">
            <div class="row" data-aos="fade-up"data-aos-duration="1000">
                <?php
                    foreach($port_thumbs as $item) : 
                        echo '<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">';
                            echo '<div class="card" style="width:100%;">';
                                echo '<img src="'.base_url('assets/images/portfolio/'.$item['portfolio_id'].'/'.$item['img_name']).'" class="card-img-top" alt="'.$item['img_name'].'">';
                            echo '</div>';
                        echo '</div>';
                    endforeach;
                ?>
            </div>
        </div>    
    </div>
</section>
