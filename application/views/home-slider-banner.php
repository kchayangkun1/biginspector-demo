<!-- sliders banners -->
<div id="home" class="slider-area">
    <div class="bd-example">
        <div id="carouselOne" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php 
                    $k=0;
                    foreach($banners as $dot) : 
                        if($k==0) : 
                            $active1='active';?>
                            <li data-target="#carouselOne" data-slide-to="<?=$k;?>" class="<?=$active1;?>"></li>
                            <!-- <li data-target="#carouselOne" data-slide-to="1"></li>
                            <li data-target="#carouselOne" data-slide-to="2"></li> -->
                        <?php else : 
                            $active1='';?>
                            <li data-target="#carouselOne" data-slide-to="<?=$k;?>" class="<?=$active1;?>"></li>
                        <?php endif;
                       $k++; 
                    endforeach;
                ?>
            </ol>
            
            <div class="carousel-inner">
                <?php 
                $i=0;
                foreach($banners as $val) : 
                    if($i==0) : 
                        $active='active';?>
                        <div class="carousel-item bg_cover <?=$active;?>" style="background-image: url(assets/images/banner/<?=$val['img_cover'];?>)">
                            <div class="carousel-caption">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-6 col-lg-7 col-sm-10">
                                            <h2 class="carousel-title">Refreshing Design & Easy to Customize</h2>
                                            <ul class="carousel-btn rounded-buttons">
                                                <li><a class="main-btn rounded-three" href="#">GET STARTED</a></li>
                                                <li><a class="main-btn rounded-one" href="#">DOWNLOAD</a></li>
                                            </ul>
                                        </div>
                                    </div> <!-- row -->
                                </div> <!-- container -->
                            </div> <!-- carousel caption -->
                        </div> <!-- carousel-item -->
                    <?php else : 
                        $active='';?>
                        <div class="carousel-item bg_cover <?=$active;?>" style="background-image: url(assets/images/banner/<?=$val['img_cover'];?>)">
                            <div class="carousel-caption">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-6 col-lg-7 col-sm-10">
                                            <h2 class="carousel-title">Refreshing Design & Easy to Customize</h2>
                                            <ul class="carousel-btn rounded-buttons">
                                                <li><a class="main-btn rounded-three" href="#">GET STARTED</a></li>
                                                <li><a class="main-btn rounded-one" href="#">DOWNLOAD</a></li>
                                            </ul>
                                        </div>
                                    </div> <!-- row -->
                                </div> <!-- container -->
                            </div> <!-- carousel caption -->
                        </div> <!-- carousel-item -->
                    <?php endif; 
                $i++;
                endforeach; ?>
            </div> 
            <!-- carousel-inner -->

            <a class="carousel-control-prev" href="#carouselOne" role="button" data-slide="prev">
                <i class="lni-arrow-left-circle"></i>
            </a>
            <a class="carousel-control-next" href="#carouselOne" role="button" data-slide="next">
                <i class="lni-arrow-right-circle"></i>
            </a>
        </div> <!-- carousel -->
    </div> <!-- bd-example -->
</div>