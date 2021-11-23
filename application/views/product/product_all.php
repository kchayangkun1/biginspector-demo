<section style="background-color: #ffffff;">
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
                </a>
            </div>
            <div align="center">
              <h3 class="mt-2" id="text-service" style=" color: #e95d09;" >ออกแบบไลท์ติ้ง</h3>
            </div>
          </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-3">
          <div class="hover01 column">
                <img src="<?=base_url('assets/img/sevice/icon3.png');?>" class="img-rounded" style="width:100%;">
              </a>
          </div>
          <div align="center">
            <h3 class="mt-2" id="text-service" style="color: #e95d09;">โคมไฟสั่งทำ</h3>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-3">
          <div class="hover01 column">
                <img src="<?=base_url('assets/img/sevice/icon4.png');?>" class="img-rounded" style="width:100%;">
              </a>
          </div>
          <div align="center">
            <h3 class="mt-2 mb-5" id="text-service" style=" color: #e95d09;">Built-in (บิ้วอิน)</h3>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
</section>
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
          foreach($products_lists as $val_item) : 
            echo '<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-3">';
              echo '<div class="hover01 column">';
                echo '<figure>';
                  echo '<a href="'.base_url('product-detail/'.$val_item['id'].'/?name='.$val_item['name']).'">';
                    echo '<img src="'.base_url('assets/images/product/cover/'.$val_item['id'].'/'.$val_item['img_cover']).'" class="img-rounded" id="about-product-1" style="width: 100%; ">';
                  echo '</a>';
                echo '</figure>';
              echo '</div>';
              echo '<div align="center">';
                echo '<h3 class="mt-3" id="product-1" style=" color: #e95d09;">'.$val_item['name'].'</h3>';
              echo '</div>';
            echo '</div>';
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
    </div>
  </div>
</section>
  

