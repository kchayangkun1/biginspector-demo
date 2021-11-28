
<style>
    body{
        background-color:'#eee4d9';
    }
    .centered {
  position: absolute;
  position: absolute;
    top: 30%;
    left: 8%;
   
}
#article-h{
    font-family: 'SukhumvitSet-Light';
    font-weight: 800;
    color: #ffffff;
    font-family: 'Prompt', sans-serif;
    font-size: larger;
}
.centered-1{
    position: absolute;
  top: 50%;
  left: 26%;
  transform: translate(-50%, -50%);
}
#article-1{
    font-family: 'SukhumvitSet-Light';
    color: #ffffff;
    font-family: 'Prompt', sans-serif;
    font-size: larger;
}
#button-btn{
    position: absolute;
    top: 67%;
    left: 12%;
  transform: translate(-50%, -50%);
}
.card-title{
    font-family: 'Prompt', sans-serif;
    font-weight: 800;
    font-size: 18px;
}
.card-text{
    font-family: 'Prompt', sans-serif;
    font-size: 14px;
}
a{
    color: #000;
}

#img_cover {
  display: block;
  max-width:472px;
  max-height:337px;
  width: auto;
  /* height: auto; */
  object-fit: cover;
}
</style>
<section class=" pb-1" id="background-about" style="background-color: #eee4d9;">
    <div class="container">
        <div data-aos="fade-up"data-aos-duration="1000">
            <div class="row "> <!-- row1 -->
                <?php
                    foreach($articlies as $val) : 
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
            <!-- pagination -->
            <div class="row mt-4 mb-4">
                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="container">
                    <?=$pagination;?>
                </div>
                </div>
            </div>
            <!-- end -->  

                <!-- <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3">
                <div class="card" style="width: 100%;">
                    <img src="<?=base_url('assets/img/article/2.png');?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">ส่องไอเดียห้องนอนสไตล์เกาหลี อบอุ่น เรียบง่าย สบายตา</h5>
                                <p class="card-text">ห้องนอนถือเป็นอีกหนึ่ง space ที่ควรให้ความสำคัญในการตกแต่ง เพราะเราต้องใช้ห้องนอนในการพักผ่อนกันอยู่เป็นประจำทุกวัน พื้นที่ส่วนนี้จึงควรมีทั้งความสวยงาม</p>
                            <a href="#" >Read mord >></a>
                        </div>
                    </div>    
                </div> -->
                <!-- <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3">
                    <div class="card" style="width: 100%;">
                        <img src="<?=base_url('assets/img/article/3.png');?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">เอาใจสายถ่ายรูป มาเปลี่ยนมุมเล็ก ๆ ให้เป็นHome café สุดชิค</h5>
                                    <p class="card-text">เสาร์-อาทิตย์หากใครอยู่บ้านว่าง ๆ  วันนี้ 32 Interior Design ชวนทุกคนมาเปลี่ยนมุมเล็ก ๆ ในบ้านให้กลายเป็น home café ส่วนตัวไว้ถ่ายรูปเก๋ ๆ แถมยังอบอุ่นสบายตาและน่าอยู่</p>
                                <a href="#" >Read mord >></a>
                            </div>
                        </div>    
                    </div>
                </div> -->
            </div>
            <!-- <div data-aos="fade-up"data-aos-duration="1000"> -->
                <!-- <div class="row "> row 2 -->
                    <!-- <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3">
                        <div class="card" style="width: 100%;">
                            <img src="<?//=base_url('assets/img/article/1.png');?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">สไตล์การแต่งบ้านยอดนิยม อยู่อย่างไรก็ไม่เบื่อ</h5>
                                    <p class="card-text">หากคุณกำลังตัดสินใจตกแต่งหรือรีโนเวทบ้านสักหลัง แต่กลัวว่านานไปแล้วจะเบื่อ วันนี้ 32 Interior Design มีสไตล์การออกแบบที่อยู่อย่างไรก็ไม่เบื่อ นานแค่ไหนก็ดูไม่เก่ามาให้ชมกัน</p>
                                    <a href="#" >Read mord >></a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                  
                <!-- <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3">
                    <div class="card" style="width: 100%;">
                        <img src="<?//=base_url('assets/img/article/2.png');?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">ส่องไอเดียห้องนอนสไตล์เกาหลี อบอุ่น เรียบง่าย สบายตา</h5>
                                    <p class="card-text">ห้องนอนถือเป็นอีกหนึ่ง space ที่ควรให้ความสำคัญในการตกแต่ง เพราะเราต้องใช้ห้องนอนในการพักผ่อนกันอยู่เป็นประจำทุกวัน พื้นที่ส่วนนี้จึงควรมีทั้งความสวยงาม</p>
                                <a href="#" >Read mord >></a>
                            </div>
                        </div>    
                    </div> -->
                <!-- <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3">
                    <div class="card" style="width: 100%;">
                        <img src="<?//=base_url('assets/img/article/3.png');?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">เอาใจสายถ่ายรูป มาเปลี่ยนมุมเล็ก ๆ ให้เป็นHome café สุดชิค</h5>
                                    <p class="card-text">เสาร์-อาทิตย์หากใครอยู่บ้านว่าง ๆ  วันนี้ 32 Interior Design ชวนทุกคนมาเปลี่ยนมุมเล็ก ๆ ในบ้านให้กลายเป็น home café ส่วนตัวไว้ถ่ายรูปเก๋ ๆ แถมยังอบอุ่นสบายตาและน่าอยู่</p>
                                <a href="#" >Read mord >></a>
                            </div>
                        </div>    
                    </div>
                </div> -->
            <!-- </div> -->
            <!-- </div> -->
            <!-- <div data-aos="fade-up"data-aos-duration="1000"> -->
                <!-- <div class="row "> row1 -->
                    <!-- <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3">
                        <div class="card" style="width: 100%;">
                            <img src="<?=base_url('assets/img/article/1.png');?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">สไตล์การแต่งบ้านยอดนิยม อยู่อย่างไรก็ไม่เบื่อ</h5>
                                    <p class="card-text">หากคุณกำลังตัดสินใจตกแต่งหรือรีโนเวทบ้านสักหลัง แต่กลัวว่านานไปแล้วจะเบื่อ วันนี้ 32 Interior Design มีสไตล์การออกแบบที่อยู่อย่างไรก็ไม่เบื่อ นานแค่ไหนก็ดูไม่เก่ามาให้ชมกัน</p>
                                    <a href="#" >Read mord >></a>
                                </div>
                            </div>
                        </div>  
                    </div> -->
                    <!-- <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3">
                        <div class="card" style="width: 100%;">
                            <img src="<?=base_url('assets/img/article/2.png');?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">ส่องไอเดียห้องนอนสไตล์เกาหลี อบอุ่น เรียบง่าย สบายตา</h5>
                                    <p class="card-text">ห้องนอนถือเป็นอีกหนึ่ง space ที่ควรให้ความสำคัญในการตกแต่ง เพราะเราต้องใช้ห้องนอนในการพักผ่อนกันอยู่เป็นประจำทุกวัน พื้นที่ส่วนนี้จึงควรมีทั้งความสวยงาม</p>
                                    <a href="#" >Read mord >></a>
                                </div>
                            </div>    
                        </div>
                    </div> -->

                    <!-- <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 mt-3">
                        <div class="card" style="width: 100%;">
                            <img src="<?=base_url('assets/img/article/3.png');?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">เอาใจสายถ่ายรูป มาเปลี่ยนมุมเล็ก ๆ ให้เป็นHome café สุดชิค</h5>
                                    <p class="card-text">เสาร์-อาทิตย์หากใครอยู่บ้านว่าง ๆ  วันนี้ 32 Interior Design ชวนทุกคนมาเปลี่ยนมุมเล็ก ๆ ในบ้านให้กลายเป็น home café ส่วนตัวไว้ถ่ายรูปเก๋ ๆ แถมยังอบอุ่นสบายตาและน่าอยู่</p>
                                    <a href="#" >Read mord >></a>
                                </div>
                            </div>    
                        </div>
                    </div> -->
                <!-- </div> -->
            <!-- </div> -->
</section>