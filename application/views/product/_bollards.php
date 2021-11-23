<!DOCTYPE html>
<html lang="en">

	

<link rel="icon" href="<?=base_url('assets/img/logo/logo.jpeg');?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" type="">

	<style>
.carousel {
	position: relative;
}
.carousel-item img {
	object-fit: cover;
}

#carousel-thumbs {
	background: #f0f0f0;
	padding: 0 50px;
}
#carousel-thumbs img:hover {
	opacity: 100%;
}

#carousel-thumbs img {
	opacity: 80%;
	border: 3px solid transparent;
	cursor: pointer;
}
#carousel-thumbs .selected img {
	opacity: 100%;
}

.carousel-control-prev,
.carousel-control-next {
	width: 50px;
}

.carousel-fullscreen-icon {
	position: absolute;
	top: 1rem;
	left: 1rem;
	width: 1.75rem;
	height: 1.75rem;
	z-index: 4;
	background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgba(255,255,255,.80)'  viewBox='0 0 16 16'%3E%3Cpath d='M1.5 1a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0v-4A1.5 1.5 0 0 1 1.5 0h4a.5.5 0 0 1 0 1h-4zM10 .5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 16 1.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5zM.5 10a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 0 14.5v-4a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v4a1.5 1.5 0 0 1-1.5 1.5h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5z' /%3E%3C/svg%3E");
}

.carousel-fullscreen-icon:hover {
	background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgb(255,255,255)' viewBox='0 0 16 16'%3E%3Cpath d='M1.5 1a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0v-4A1.5 1.5 0 0 1 1.5 0h4a.5.5 0 0 1 0 1h-4zM10 .5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 16 1.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5zM.5 10a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 0 14.5v-4a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v4a1.5 1.5 0 0 1-1.5 1.5h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5z' /%3E%3C/svg%3E");
}

.pause .carousel-pause-icon {
	position: absolute;
	top: 3.75rem;
	left: 1rem;
	width: 1.75rem;
	height: 1.75rem;
	z-index: 4;
	background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgba(255,255,255,.80)'  viewBox='0 0 16 16'%3E%3Cpath d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.25 5C5.56 5 5 5.56 5 6.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C7.5 5.56 6.94 5 6.25 5zm3.5 0c-.69 0-1.25.56-1.25 1.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C11 5.56 10.44 5 9.75 5z' /%3E%3C/svg%3E");
}
.pause .carousel-pause-icon:hover {
	background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgb(255,255,255)'  viewBox='0 0 16 16'%3E%3Cpath d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.25 5C5.56 5 5 5.56 5 6.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C7.5 5.56 6.94 5 6.25 5zm3.5 0c-.69 0-1.25.56-1.25 1.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C11 5.56 10.44 5 9.75 5z' /%3E%3C/svg%3E");
}

.play .carousel-pause-icon {
	position: absolute;
	top: 3.75rem;
	left: 1rem;
	width: 1.75rem;
	height: 1.75rem;
	z-index: 4;
	background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgba(255,255,255,.80)'  viewBox='0 0 16 16'%3E%3Cpath d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z' /%3E%3C/svg%3E");
}

.play .carousel-pause-icon:hover {
	background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgb(255,255,255)'  viewBox='0 0 16 16'%3E%3Cpath d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z' /%3E%3C/svg%3E");
}

#carousel-thumbs .carousel-control-prev-icon {
	background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='rgba(0,0,0,.60)' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E") !important;
}

#carousel-thumbs .carousel-control-next-icon {
	background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%60000' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E") !important;
}

.modal-content {
	border-radius: 0;
	background-color: transparent;
	border: none;
}
#lightbox-container-image img {
	width: auto;
	max-height: 520px;
}


	</style>
</head>

<body data-spy="scroll" data-target=".fixed-top">
<section id="detail">
  <div class="container">
    <div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-3">

        <!-- test -->
        <div id="wrap" class="container my-5">
	<div class="row">
		<div class="col-12">
			<div id="carousel" class="carousel slide gallery" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active" data-slide-number="0" data-toggle="lightbox" data-gallery="gallery" data-remote="https://source.unsplash.com/vbNTwfO9we0/1600x900.jpg">
						<img src="<?=base_url('assets/img/bollards/pt5.1.png');?>" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item" data-slide-number="1" data-toggle="lightbox" data-gallery="gallery" data-remote="https://source.unsplash.com/DEhwkPYevhE/1600x900.jpg">
						<img src="<?=base_url('assets/img/bollards/pt6.1.png');?>" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item" data-slide-number="2" data-toggle="lightbox" data-gallery="gallery" data-remote="https://source.unsplash.com/-RV5PjUDq9U/1600x900.jpg">
						<img src="<?=base_url('assets/img/bollards/pt5.2.png');?>" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item" data-slide-number="3" data-toggle="lightbox" data-gallery="gallery" data-remote="https://source.unsplash.com/sd0rPap7Uus/1600x900.jpg">
						<img src="<?=base_url('assets/img/bollards/pt5.3.png');?>" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item" data-slide-number="4" data-toggle="lightbox" data-gallery="gallery" data-remote="https://source.unsplash.com/kmRZFcZEMY8/1600x900.jpg">
						<img src="<?=base_url('assets/img/bollards/pt5.4.png');?>" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item" data-slide-number="5" data-toggle="lightbox" data-gallery="gallery" data-remote="https://source.unsplash.com/HJDdrWtlkIY/1600x900.jpg">
						<img src="<?=base_url('assets/img/bollards/pt6.1.png');?>" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item" data-slide-number="6" data-toggle="lightbox" data-gallery="gallery" data-remote="https://source.unsplash.com/VfuJpt81JZo/1600x900.jpg">
						<img src="<?=base_url('assets/img/bollards/pt6.2.png');?>" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item" data-slide-number="7" data-toggle="lightbox" data-gallery="gallery" data-remote="https://source.unsplash.com/NLkXZQ7kHzI/1600x900.jpg">
						<img src="<?=base_url('assets/img/bollards/pt6.3.png');?>" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item" data-slide-number="8" data-toggle="lightbox" data-gallery="gallery" data-remote="https://source.unsplash.com/bl4WNYGe2KE/1600x900.jpg">
						<img src="<?=base_url('assets/img/bollards/pt6.4.png');?>" class="d-block w-100" alt="...">
					</div>
					<div class="carousel-item" data-slide-number="9" data-toggle="lightbox" data-gallery="gallery" data-remote="https://source.unsplash.com/_8zfgT9kS2g/1600x900.jpg">
						<img src="<?=base_url('assets/img/bollards/pt6.5.png');?>" class="d-block w-100" alt="...">
					</div>
				
				</div>
				<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
				<a class="carousel-fullscreen" href="#carousel" role="button">
					<span class="carousel-fullscreen-icon" aria-hidden="true"></span>
					<span class="sr-only">Fullscreen</span>
				</a>
				<a class="carousel-pause pause" href="#carousel" role="button">
					<span class="carousel-pause-icon" aria-hidden="true"></span>
					<span class="sr-only">Pause</span>
				</a>
			</div>

			<!-- Carousel Navigatiom -->
			<div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active" data-slide-number="0">
						<div class="row mx-0">
							<div id="carousel-selector-0" class="thumb col-3 px-1 py-2 selected" data-target="#carousel" data-slide-to="0">
								<img src="<?=base_url('assets/img/bollards/pt6.1.png');?>" class="img-fluid" alt="...">
							</div>
							<div id="carousel-selector-1" class="thumb col-3 px-1 py-2" data-target="#carousel" data-slide-to="1">
								<img src="<?=base_url('assets/img/bollards/pt5.2.png');?>" class="img-fluid" alt="...">
							</div>
							<div id="carousel-selector-2" class="thumb col-3 px-1 py-2" data-target="#carousel" data-slide-to="2">
								<img src="<?=base_url('assets/img/bollards/pt5.3.png');?>" class="img-fluid" alt="...">
							</div>
							<div id="carousel-selector-3" class="thumb col-3 px-1 py-2" data-target="#carousel" data-slide-to="3">
								<img src="<?=base_url('assets/img/bollards/pt5.4.png');?>" class="img-fluid" alt="...">
							</div>
						</div>
					</div>
					<div class="carousel-item " data-slide-number="1">
						<div class="row mx-0">
							<div id="carousel-selector-4" class="thumb col-3 px-1 py-2" data-target="#carousel" data-slide-to="4">
								<img src="<?=base_url('assets/img/bollards/pt6.1.png');?>" class="img-fluid" alt="...">
							</div>
							<div id="carousel-selector-5" class="thumb col-3 px-1 py-2" data-target="#carousel" data-slide-to="5">
								<img src="<?=base_url('assets/img/bollards/pt5.2.png');?>" class="img-fluid" alt="...">
							</div>
							<div id="carousel-selector-6" class="thumb col-3 px-1 py-2" data-target="#carousel" data-slide-to="6">
								<img src="<?=base_url('assets/img/bollards/pt5.3.png');?>" class="img-fluid" alt="...">
							</div>
							<div id="carousel-selector-7" class="thumb col-3 px-1 py-2" data-target="#carousel" data-slide-to="7">
								<img src="<?=base_url('assets/img/bollards/pt5.4.png');?>" class="img-fluid" alt="...">
							</div>
						</div>
					</div>
					<div class="carousel-item" data-slide-number="2">
						<div class="row mx-0">
							<div id="carousel-selector-8" class="thumb col-3 px-1 py-2" data-target="#carousel" data-slide-to="8">
								<img src="<?=base_url('assets/img/bollards/pt6.1.png');?>" class="img-fluid" alt="...">
							</div>
							<div id="carousel-selector-9" class="thumb col-3 px-1 py-2" data-target="#carousel" data-slide-to="9">
								<img src="<?=base_url('assets/img/bollards/pt5.2.png');?>" class="img-fluid" alt="...">
							</div>
							<div id="carousel-selector-10" class="thumb col-3 px-1 py-2" data-target="#carousel" data-slide-to="10">
								<img src="<?=base_url('assets/img/bollards/pt5.3.png');?>" class="img-fluid" alt="...">
							</div>
							<div id="carousel-selector-11" class="thumb col-3 px-1 py-2" data-target="#carousel" data-slide-to="11">
								<img src="<?=base_url('assets/img/bollards/pt5.4.png');?>" class="img-fluid" alt="...">
							</div>
						</div>
					</div>
				</div>
				<a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
</div>  
   <!-- end -->
    </div>
    <div class="col-12 col-sm-12 com-md-12 col-lg-6 col-xl-6 mt-5 pt-5">
                <h2 style="color:#000000; ">BOLLARDS  LUMINAIRES </h2>
                <p  style="font-weight: bolder;color:#212529;">BOLLARDS  LUMINAIRES </p>
                <p style="font-weight: bolder;color:#212529;">รหัสสินค้า</p>
                <p style="font-weight: bolder;color:#212529;">Product Detail</p>
                <button type="button" class="btn btn-danger" id="button-detail">สั่งซื้อสินค้า</button>
            </div>
  </div>
</section>



<section style="background-color: #d3d3d3;padding-top: 0px;">
  <div class="container">
    <div class="row" align="center">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <h1 class="mb-3" id="text-h" style="margin-top: 0px;color: #be1e2c;">OUR PRODUCT</h1>
      </div>
    </div>
    <div data-aos="fade-up"data-aos-duration="1000">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-3">
          <div class="hover01 column">
            <figure>
            <a href="<?=base_url('product/bollards');?>">
              <img src="<?=base_url('assets/img/product/pic1.png');?>" class="img-rounded" id="about-product-1" style="width: 100%; ">
            </a>
            </figure>
          </div>
          <div align="center">
              <h3 class="mt-3" id="product-1" style=" color: #00000;">BOLLARADS <br> LUMINAIRES</h3>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-3">
          <div class ="hover01 column">
            <figure>
            <a href="<?=base_url('product/detail');?>">
              <img src="<?=base_url('assets/img/product/pic2.png');?>" class="img-rounded" id="about-product-1" style="width: 100%;">
            </a>
            </figure>
          </div>
            <div align="center">
              <h3 class="mt-3" id="product-1" style=" color: #00000;">FLOODLIGHTS<br>LUMINAIRES</h3>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-3">
          <div class ="hover01 column">
            <figure>
            <a href="<?=base_url('product/detail');?>">
              <img src="<?=base_url('assets/img/product/pic3.png');?>" class="img-rounded" id="about-product-1" style="width: 100%;">
            </a>
            </figure>
          </div>
            <div align="center">
              <h3 class="mt-3" id="product-1" style=" color: #00000;">SURFACE FACADE<br>LUMINAIRES</h3>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 mt-3">
          <div class="hover01 column">
            <figure>
            <a href="<?=base_url('product/detail');?>">
              <img src="<?=base_url('assets/img/product/pic4.png');?>" class="img-rounded" id="about-product-1" style="width: 100%;">
            </a>
            </figure>
          </div>
          <div align="center">
              <h3 class="mt-3" id="product-1" style=" color: #00000;">UNDERGROUND<br>LUMINAIRES</h3>
          </div>
        </div>
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
// https://stackoverflow.com/questions/25752187/bootstrap-carousel-with-thumbnails-multiple-carousel
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