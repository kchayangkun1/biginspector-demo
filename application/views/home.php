
<body>
  <section class="" id="invent-port" style="background-color: #ffffff; padding-bottom: 0px;">
    <div class="container wow fadeInUp" align="center">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" data-aos="fade-up"data-aos-duration="1000">
          <div class="branch-title text-center ">
            <h1 id="text-h"style="color: #be1e2c;">NEW PRODUCT</h1>
          </div>
        </div>
      </div>
      <div class="row w-100" align="center">
        <?php 
          foreach($new_products as $val_new) : 
            echo '<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-3" data-aos="fade-up"data-aos-duration="1000">';
              echo '<div class="hover01 column">';
                echo '<figure>';
                  echo '<a href="'.base_url('product-detail/'.$val_new['id'].'/?name='.$val_new['name']).'" data-toggle="lightbox" data-gallery="gallery" class="img-rounded" style="width: 100%;">';
                    echo '<img src="'.base_url('assets/images/product/cover/'.$val_new['id'].'/'.$val_new['img_cover']).'" class="img-rounded" style="width:100%;">';
                  echo '</a>';
                echo '</figure>';
              echo '</div>';
              echo '<div align="center">';
                echo '<h3 class="mt-2" id="text-newproduct" style=" color: #ffff;" >'.$val_new['name'].'</h3>';
              echo '</div>';
            echo '</div>';
          endforeach;
        ?>
      </div>
    </div>
    <div class="container">
      <div class="row   mt-5 mb-5">
        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-5 mb-5" data-aos="fade-up"data-aos-duration="1000">
          <div class="d-flex justify-content-center">
            <img src="<?=base_url('assets/img/about/picabout.png');?>" id="pic-about" style="width: 100%; " class="img-fluid">
          </div>
        </div>
        <div class="col-12 col-sm-12 com-md-12 col-lg-6 col-xl-6 mt-2 mb-5 " data-aos="fade-up"data-aos-duration="1000">
          <h1 class="" id="text-h" style="margin-top: 0px;color: #be1e2c;text-align: inherit;">ABOUT</h1>
          <p class="" id="text-h-newproduct-1" style="color: #e95d09;">PT lighting ผู้จำหน่ายโคมไฟ ออกแบบไลท์ติ้ง <br> โคมไฟสั่งทำ งาน Built-in (บิ้วอิน) ทุกชนิด มีสินค้าที่หลากหลาย <br> ไม่ว่าจะเป็น High bay, Flood, Street light, Loft lamp </p>
          <p class="" id="text-h-newproduct-1" style="color: #e95d09;">&emsp;&middot;&emsp;มีบริการออกแบบติดตั้งโคมไฟโดยช่างผู้เชียวชาญ</p>
          <p class="" id="text-h-newproduct-1" style="color: #e95d09;">&emsp;&middot;&emsp;โคมไฟตกแต่ง โคมไฟโซลาร์เซลล์ โคมไฟบ้าน โคมไฟอาคาร โคมไฟโรงงาน โคมไฟโรงแรม</p>
          <p class="" id="text-h-newproduct-1" style="color: #e95d09;">&emsp;&middot;&emsp;โคมไฟดาวน์ไลท์ โคมไฟใต้น้ำ โคมไฟตกแต่งสวน ไฟเส้น ฯลฯ</p>
          <p class="" id="text-h-newproduct-1" style="color: #e95d09;">&emsp;&middot;&emsp;โรงงานผลิตสินค้าเองทำตามแบบที่ลูกค้าต้องการภายใต้มาตรฐานอุสหกรรม</p>
          <p class="" id="text-h-newproduct-1" style="color: #e95d09;">&radic;&emsp;สินค้าดีมีคุณภาพ</p>
          <p class="" id="text-h-newproduct-1" style="color: #e95d09;">&radic;&emsp;ราคายุติธรรม</p>
          <p class="" id="text-h-newproduct-1" style="color: #e95d09;">&radic;&emsp;ใส่ใจบริการหลังการขาย</p>
        </div>
      </div>
    </div>
    <div class="container" >
      <div class="row" data-aos="fade-up"data-aos-duration="1000">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="branch-title text-center mb-3">
            <h1 id="text-h"style="color: #be1e2c;">SERVICE</h1>
          </div>
        </div>
      </div>
      <div class="row w-100" align="center" data-aos="fade-up"data-aos-duration="1000" style="margin-right: 0px;margin-left: 0px;">
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-3">
          <div class="hover01 column">
            <img src="<?=base_url('assets/img/sevice/icon1.png');?>" class="img-rounded" style="width:100%;">
          </div>
        <div align="center">
          <h3 class="mt-2" id="text-service" style=" color: #e95d09;" >จัดจำหน่ายโคมไฟ</h3>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-3">
        <div class="hover01 column">
          <img src="<?=base_url('assets/img/sevice/icon2.png');?>" class="img-rounded" style="width:100%;">
        </div>
        <div align="center">
          <h3 class="mt-2" id="text-service" style=" color: #e95d09;" >ออกแบบไลท์ติ้ง</h3>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-3">
        <div class="hover01 column">
          <img src="<?=base_url('assets/img/sevice/icon3.png');?>" class="img-rounded" style="width:100%;">
        </div>
        <div align="center">
          <h3 class="mt-2" id="text-service" style="color: #e95d09;">โคมไฟสั่งทำ</h3>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-3">
        <div class="hover01 column">
          <img src="<?=base_url('assets/img/sevice/icon4.png');?>" class="img-rounded" style="width:100%;">
        </div>
        <div align="center">
          <h3 class="mt-2 mb-5" id="text-service" style=" color: #e95d09;">Built-in (บิ้วอิน)</h3>
        </div>
      </div>
    </div>
  </section >
<section style="background-color: #d3d3d3;">
  <div class="container">
    <div class="row" align="center">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <h1 class="mb-3" id="text-h" style="margin-top: 0px;color: #be1e2c;">PRODUCT</h1>
      </div>
    </div>
    <div data-aos="fade-up"data-aos-duration="1000">
      <div class="row">
        <?php 
          foreach($recom_products as $val_rec) : 
            echo '<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-3">';
              echo '<div class="hover01 column">';
                echo '<figure>';
                  echo '<a href="'.base_url('product-detail/'.$val_rec['id'].'/?name='.$val_rec['name']).'" data-toggle="lightbox" data-gallery="gallery" class="img-rounded" style="width: 100%;">';
                    echo '<img src="'.base_url('assets/images/product/cover/'.$val_rec['id'].'/'.$val_rec['img_cover']).'" class="img-rounded" id="about-product-1" style="width: 100%; ">';
                  echo '</a>';
                echo '</figure>';
              echo '</div>';
              echo '<div align="center">';
                echo '<h3 class="mt-2" id="product-1" style=" color: #e95d09;">'.$val_rec['name'].'</h3>';
              echo '</div>';
            echo '</div>';
          endforeach;
        ?>
      </div>
    </div>
    
    <div class="button" id="button-product">
          <div class="row" align="center">
            <div class="col-12 mt-3 mb-3">
                <a type="button" href="<?=base_url('product');?>" id="button-produc-1" class="btn btn-outline-danger" style="border-radius: 49px;">View all</a>
            </div>
          </div>
      </div>
  </div>
</section>
  <section style="background-color: #ffffff;">
    <div class="container">
      <div data-aos="fade-up"data-aos-duration="1000">
        <div class="row" align="center">
          <div class="col-12">
          <h1 id="text-h" style="color:#be1e2c">REVIEW</h1>
          </div>
        </div>
      </div>
      <div class="row" style="padding-right: 24px;">
        </div>
          <div data-aos="fade-up"data-aos-duration="1000">
            <div class="owl-carousel owl-theme">
              <div class="item">
                <img src="<?=base_url('assets/img/review/picreview1.png');?>" class="img-rounded" id="accounting2">
              </div>
              <div class="item">
                <img src="<?=base_url('assets/img/review/picreview2.png');?>" class="img-rounded" id="accounting2">
              </div>
              <div class="item">
                <img src="<?=base_url('assets/img/review/picreview4.png');?>" class="img-rounded" id="accounting2">
              </div>
              <div class="item">
                 <img src="<?=base_url('assets/img/review/picreview5.png');?>" class="img-rounded" id="accounting2">
              </div>
              <div class="item">
                 <img src="<?=base_url('assets/img/review/picreview6.png');?>" class="img-rounded" id="accounting2">
              </div>
              <div class="item">
                <img src="<?=base_url('assets/img/review/picreview8.png');?>" class="img-rounded" id="accounting2">
              </div>
            </div>
          </div>
      </div>
  </section>
  
</body>
</html>