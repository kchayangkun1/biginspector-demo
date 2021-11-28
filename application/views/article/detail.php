<style>
    h3 { 
        font-weight: 800;
    }
    @media only screen and (max-width: 640px) and (min-width: 360px){
    #detailarticle-heading{
        font-size: 23px;
    }
    #detailarticle-h4{
        font-size: 14px;
        text-align: initial;
    }
}
#desc_font, body {
    font-family: 'Prompt', sans-serif;
}
</style>

<section style="padding-top: 0px;padding-bottom: 0px;">
    <div class="container-fluid" style="padding-left: 0px;padding-right: 0px;" >
        <div data-aos="fade-up"data-aos-duration="1000">
            <img src="<?=base_url('assets/images/product/cover/'.$article_desc[0]['id'].'/'.$article_desc[0]['img_cover']);?>" class="img-rounded" id="accounting2" style="width: 100%;" alt="<?=$article_desc[0]['name'];?>">
        </div>
    </div>   
</section> 

<section style="background-color: #eee4d9;">
    <div class="container">
        <div class="row ml-2 mr-2" data-aos="fade-up" data-aos-duration="1000">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card" style="width: 100%;border-radius: 15px;">
                    <h3 id="detailarticle-heading" class="mt-3 ml-3 mr-3"><?=$article_desc[0]['name'];?></h3>
                    <h4 id="detailarticle-h4" class="mt-2 mb-3 ml-3 mr-3"><?=$article_desc[0]['short_dsc'];?></h4>
                </div>
                <div class="card mt-3 mb-3" style="width: 100%;">
                    <img src="<?=base_url('assets/images/product/cover/'.$article_desc[0]['id'].'/'.$article_desc[0]['img_cover']);?>" class="card-img-top" alt="<?=$article_desc[0]['name'];?>">
                </div>
            </div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div id="desc_font" style="width: 100%;display:block;"><?=$article_desc[0]['dsc'];?></div>
            </div>
            
            <!-- <div data-aos="fade-up" data-aos-duration="1000"></div> -->
        </div><!-- end row 1 -->

        <!-- <div class="row  ml-2 mr-2">
            <div data-aos="fade-up"data-aos-duration="1000">
                <div class="card" style="width: 100%;border-radius: 15px;">
                    <h3 id="detailarticle-heading" class="mt-3 ml-3 mr-3">1.Style Modern</h3>
                        <h4 id="detailarticle-h4"class="mt-2 mb-3 ml-3 mr-3">การแต่งบ้านสไตล์โมเดิร์น เป็นการแต่งบ้านที่ได้รับความนิยมเป็นอย่างมาก เพราะมีทั้งความสวย เรียบง่าย และแฝงไปด้วยความทันสมัย ตอบโจทย์ความชอบของใครหลาย ๆ คน สไตล์โมเดิร์นจึงเป็นอีกหนึ่งสไตล์ที่ทั้งอยู่สบายและอยู่อย่างไรก็ไม่เบื่อ</h4>
                </div>
                <div class="card mt-3 mb-3" style="width:100%;">
                    <img src="<?=base_url('assets/img/article/1.png');?>" class="card-img-top" alt="...">
                </div>
            </div>
        </div> -->
        <!-- end row 2 -->

        <!-- <div class="row ml-2 mr-2" >
            <div data-aos="fade-up"data-aos-duration="1000">
                <div class="card" style="width: 100%;border-radius: 15px;">
                    <h3 id="detailarticle-heading"class="mt-3 ml-3 mr-3">เน้นพื้นที่ใช้สอยให้ได้ประโยชน์สูงสุด</h3>
                        <h4 id="detailarticle-h4" class="mt-2 mb-3 ml-3 mr-3">การแต่งบ้านสไตล์โมเดิร์นจะเน้นการนำรูปทรงของเรขาคณิตมาเป็นแบบของโครงสร้าง โดยเน้นความเรียบง่าย ไม่เน้นการตกแต่งที่มากเกิดความพอดี อีกทั้งแต่ละพื้นที่ต้องใช้ประโยชน์ในการใช้สอยได้มากที่สุด</h4>
                </div>
                    <div class="row ">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="card mt-3 mb-3" style="width:100%;">
                                <img src="<?=base_url('assets/img/detailarticle/unnamed (2).jpg');?>" class="card-img-top" alt="...">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="card mt-3 mb-3" style="width:100%;">
                                <img src="<?=base_url('assets/img/detailarticle/3.jpg');?>" class="card-img-top" alt="...">
                            </div>
                        </div>
                    </div>
            </div>
        </div> -->
        <!-- <div class="row ml-2 mr-2">
            <div data-aos="fade-up"data-aos-duration="1000">
                <div class="card" style="width: 100%;border-radius: 15px;">
                    
                        <h4 id="detailarticle-h4" class="mt-2 mb-3 ml-3 mr-3">คามโดดเด่นของการตกแต่งบ้านสไตล์โมเดิร์นคือ เฟอร์นิเจอร์ที่มีดีเทลในการเก็บ ซ่อน เรียกได้ว่าการตกแต่งสไตล์นี้นอกจากทำให้ห้องสวยงามแล้ว ยังได้พื้นที่การใช้สอยเพิ่มขึ้นอีกด้วย</h4>
                </div>
                    <div class="row ml-2 mr-2">
                            <div class="card mt-3 mb-3" style="width:100%;">
                                <img src="<?=base_url('assets/img/detailarticle/4.jpg');?>" class="card-img-top" alt="...">
                            </div>
                    </div>
            </div>
        </div> -->
        <!-- end row 4 -->
        <div class="row">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="d-flex justify-content-center">
                    <h3>บทความที่เกี่ยวข้อง</h3>
                </div>
            </div>
        </div>
            <div class="row "> <!-- row1 -->
                <?php
                    foreach($related_articles as $val) : 
                        echo '<div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3">';
                            echo '<div class="card border-0" style="width: 100%;border-radius: 1rem;">';
                                echo '<img id="img_cover" src="'.base_url('assets/images/product/cover/'.$val['id'].'/'.$val['img_cover']).'" class="card-img-top" alt="'.$val['name'].'" width="472" height="337" style="
                                border-top-left-radius: 1rem;border-top-right-radius: 1rem;">';
                                echo '<div class="card-body">';
                                    echo '<h5 class="card-title">'.$val['name'].'</h5>';
                                    echo '<p class="card-text">'.$val['short_dsc'].'</p>';
                                    echo '<a href="'.base_url('article-detaill/'.$val['id'].'/?slug='.$val['name']).'" >Read mord >></a>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div> ';
                    endforeach;
                ?>
            </div>
    </div>
</section>
