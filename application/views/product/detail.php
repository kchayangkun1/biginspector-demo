<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <link rel="icon" href="<?=base_url('assets/img/logo/logo.jpeg');?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" type="">

	<style>
/* thumbs */
.carousel-inner img {
    width: 100%;
    /* height: 100% */
    height: auto;
}

#custCarousel .carousel-indicators {
    position: static;
    /* margin-top: 20px */
}

#custCarousel .carousel-indicators>li {
    width: 100px
}

#custCarousel .carousel-indicators li img {
    display: block;
    opacity: 0.5
}

#custCarousel .carousel-indicators li.active img {
    opacity: 1
}

#custCarousel .carousel-indicators li:hover img {
    opacity: 0.75
}

.carousel-item img {
    width: 100%
}

#pd_img{
    transition: transform 250ms;
  }
  #pd_img:hover {
    transform: translateY(-10px);
  }
</style>
</head>
<body data-spy="scroll" data-target=".fixed-top">
	<section id="detail">
  		<div class="container">
    		<div class="row">
    			<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-3">
					<div class="d-flex justify-content-center">
            			<div class="container">
              				<div class="row">
                				<div class="col-md-12">
                  					<?php if($count_images > 0) : ?>
                    					<div id="custCarousel" class="carousel slide" data-ride="carousel" align="center">
                      						<!-- slides -->
                      						<div class="carousel-inner">
                        						<!-- albums_thumbnails -->
                        						<?php 
                         	 						$i=1;
                          							foreach($albums_thumbnails as $album) :  
                            							if($i == 1) :
                              								$active='active';
                                							echo '<div class="carousel-item '.$active.'">';
																echo '<a href="'.base_url('./assets/images/product/'.$album['product_id'].'/'.$album['img_name']).'" class="zoom">';
																	echo '<img src="'.base_url('./assets/images/product/'.$album['product_id'].'/'.$album['img_name']).'" alt="'.$album['img_name'].'">';
																echo '</a>';
															echo '</div>';
														else : 
															$active='';
															echo '<div class="carousel-item '.$active.'">';
																echo '<a href="'.base_url('./assets/images/product/'.$album['product_id'].'/'.$album['img_name']).'" class="zoom">';
																	echo '<img src="'.base_url('./assets/images/product/'.$album['product_id'].'/'.$album['img_name']).'" alt="'.$album['img_name'].'">';
																echo '</a>';
															echo '</div>';
														endif;
														$i++;
													endforeach; 
												?>
                      						</div> <!-- Left right --> 
											<a class="carousel-control-prev" href="#custCarousel" data-slide="prev">
												<span class="carousel-control-prev-icon"></span>
											</a>
											<a class="carousel-control-next" href="#custCarousel" data-slide="next">
												<span class="carousel-control-next-icon"></span>
											</a> 
                      						<!-- Thumbnails -->
                      						<ol class="carousel-indicators list-inline">
                        						<?php 
                          							$j=1;
                          							$k=0;
                          							foreach($albums_thumbnails as $thumb) :  
                            							if($j == 1) : 
                              								$active2='active';
															echo '<li class="list-inline-item '.$active2.'">';
																echo '<a id="carousel-selector-'.$k.'" class="selected" data-slide-to="'.$k.'" data-target="#custCarousel">';
																	echo '<img src="'.base_url('./assets/images/product/'.$thumb['product_id'].'/'.$thumb['img_name']).'" alt="'.$thumb['img_name'].'" class="img-fluid">';
																echo '</a>';
															echo '</li>';
														else : 
															$active2='';
															echo '<li class="list-inline-item '.$active2.'">';
																echo '<a id="carousel-selector-'.$k.'" data-slide-to="'.$k.'" data-target="#custCarousel">';
																	echo '<img src="'.base_url('./assets/images/product/'.$thumb['product_id'].'/'.$thumb['img_name']).'" alt="'.$thumb['img_name'].'" class="img-fluid">';
																echo '</a>';
															echo '</li>';
														endif;
                            							$j++;
                          								$k++;
                        							endforeach; 
												?>
                      						</ol>
                    					</div>
                  					<?php 
									  else : 
                      					if($productdescs[0]['img_cover'] !='') : 
											echo '<img src="'.base_url('./assets/images/product/cover/'.$productdescs[0]['id'].'/'.$productdescs[0]['img_cover']).'" alt="'.$productdescs[0]['name'].'" class="img-fluid">';
										else : 
											echo '<img src="'.base_url('./assets/images/product/noimage.jpg').'" alt="no img" class="img-fluid">';
										endif;
									endif; ?>
                				</div>
              				</div>
            			</div>
            			<!-- end -->
          			</div>
					<!-- end -->
    			</div>
    			<div class="col-12 col-sm-12 com-md-12 col-lg-6 col-xl-6 mt-5 pt-5 ">
                	<h2 style="color:#e95d09; "><?=$productdescs[0]['name'];?></h2>
                	<p  style="font-weight: bolder;color:#e95d09;"><?=$productdescs[0]['name'];?></p>
					<p  style="font-weight: bolder;color:#e95d09;">ราคา <?=$productdescs[0]['price'];?></p>
                	<p style="font-weight: bolder;color:#212529;">
					<?=$productdescs[0]['dsc'];?>
					</p>
					<!-- test -->
				<div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    	<div class="d-flex justify-content-start d-none d-md-block d-lg-block d-xl-block">
							<button type="button" class="btn btn-danger d-none d-xs-none d-sm-none d-md-block d-lg-block d-xl-block" id="button-detail">สั่งซื้อสินค้า</button>
                        </div>
                        	<div class="d-flex justify-content-center d-block d-md-none d-lg-none d-xl-none">
								<button type="button" class="btn btn-danger" id="button-detail">สั่งซื้อสินค้า</button>
                            </div>
                        </div>
                    </div>
					<!-- end -->				
            	</div>
  			</div>
		</div>
	</section>
	<section style="background-color: #d3d3d3;padding-top: 0px;">
  		<div class="container mt-4">
    		<div class="row" align="center">
      			<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        			<h1 class="mb-3" id="text-h" style="margin-top: 0px;color: #be1e2c;">OUR PRODUCT</h1>
      			</div>
    		</div>
    		<div data-aos="fade-up"data-aos-duration="1000">
      			<div class="row">
					<?php   
					  	foreach($our_produts as $val_our) : 
							echo '<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-3">';
								echo '<div class="hover01 column">';
									echo '<figure>';
										echo '<a href="'.base_url('product-detail/'.$val_our['id'].'/?name='.$val_our['name']).'">';
											echo '<img src="'.base_url('assets/images/product/cover/'.$val_our['id'].'/'.$val_our['img_cover']).'" class="img-rounded" id="about-product-1" style="width: 100%; ">';
										echo '</a>';
									echo '</figure>';
								echo '</div>';
								echo '<div align="center">';
									echo '<h3 class="mt-3" id="product-1" style=" color: #e95d09;">'.$val_our['name'].'</h3>';
								echo '</div>';
							echo '</div>';
						endforeach;
					?>	
        		</div>	
      		</div>
    	</div>
	</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>


    <script>
      $('#myCarousel').carousel({
  interval: false
});
$('#carousel-thumbs').carousel({
  interval: false
});

// handles the carousel thumbnails
$('[id^=carousel-selector-]').click(function() {
  var id_selector = $(this).attr('id');
  var id = parseInt( id_selector.substr(id_selector.lastIndexOf('-') + 1) );
  $('#myCarousel').carousel(id);
});
// when the carousel slides, auto update
$('#myCarousel').on('slide.bs.carousel', function(e) {
  var id = parseInt( $(e.relatedTarget).attr('data-slide-number') );
  $('[id^=carousel-selector-]').removeClass('selected');
  $('[id=carousel-selector-'+id+']').addClass('selected');
});
// when user swipes, go next or previous
$('#myCarousel').swipe({
  fallbackToMouseEvents: true,
  swipeLeft: function(e) {
    $('#myCarousel').carousel('next');
  },
  swipeRight: function(e) {
    $('#myCarousel').carousel('prev');
  },
  allowPageScroll: 'vertical',
  preventDefaultEvents: false,
  threshold: 75
});
/*
$(document).on('click', '[data-toggle="lightbox"]', function(event) {
  event.preventDefault();
  $(this).ekkoLightbox();
});
*/

$('#myCarousel .carousel-item img').on('click', function(e) {
  var src = $(e.target).attr('data-remote');
  if (src) $(this).ekkoLightbox();
});

</script>
</body>
</html>