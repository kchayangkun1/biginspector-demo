
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
<!-- Calculate the Distance Between two Addresses -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script  defer src="https://maps.googleapis.com/maps/api/js?libraries=places&language=th&key=AIzaSyDL1r-7xTHMPAih4PvPh2e0y7bKNB3sgP8"  type="text/javascript"></script>
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

<!-- section service -->
<section id="service" class="service-area">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="section-title text-center mt-30 pb-40">
                <h3 class="title wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.6s">คำนวนค่าบริการ</h3>
            </div>
        </div> <!-- end row Tag titel service -->
        <div class="row justify-content-center">
            <!-- test -->
            <!-- Set initialize from ถ. พหลโยธิน แขวง ถนนพญาไท เขตราชเทวี กรุงเทพมหานคร 10400 ประเทศไทย -->
<!-- <div class="col-md-6">
<form id="distance_form">
    <div class="form-group"><label>Origin: </label> <input class="form-control" id="from_places" value="ถ. พหลโยธิน แขวง ถนนพญาไท เขตราชเทวี กรุงเทพมหานคร 10400 ประเทศไทย" placeholder="Enter a location" /> <input id="origin" name="origin" value="ถ. พหลโยธิน แขวง ถนนพญาไท เขตราชเทวี กรุงเทพมหานคร 10400 ประเทศไทย" required="" type="hidden" /></div>

    <div class="form-group">
        <label>Destination: </label> 
        <input class="form-control" id="to_places" placeholder="Enter a location" />       
        <input id="destination" name="destination" required="" type="hidden" />
    </div>
        <input class="btn btn-primary" type="submit" value="Calculate" />
</form>

    
</div>
</div>
</div> -->
<!-- end -->
            <div class="col-md-6 my-3">
                <div class="card-outline-secondary">
                    <div class="card-body">
                        <form id="distance_form" class="form" role="form" autocomplete="off">
                            <div class="form-group row mt-3">
                                <label class="col-md-3 col-form-label form-control-label">ประเภทที่อยู่อาศัย</label>
                                <div class="col-md-9">
                                <select class="form-control" name="housing_type" id="housing_type" required style="border-radius: 8rem;">
                                    <option>-- กรุณาเลือก --</option>
                                    <?php foreach($categories as $type_val) : ?>
                                        <option value="<?=$type_val['id'];?>"><?=$type_val['name'];?></option>
                                    <?php endforeach; ?>                                    
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group row mt-3">
                                <label class="col-lg-3 col-form-label form-control-label">จำนวนชั้น</label>
                                <div class="col-lg-9">
                                    <select class="form-control" name="floor" id="floor" required style="border-radius: 8rem;">
                                            
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label class="col-lg-3 col-form-label form-control-label">ขนาดพื้นที่ใช้สอย</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="usable_area" id="usable_area" onkeypress='return event.charCode >= 48 && event.charCode <= 57' style="border-radius: 8rem;">
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label class="col-md-3 col-form-label form-control-label">จุดเริ่มต้น</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="from_places" value="ถ. พหลโยธิน แขวง ถนนพญาไท เขตราชเทวี กรุงเทพมหานคร 10400 ประเทศไทย" placeholder="Enter a location" readonly style="border-radius: 8rem;" /> 
                                    <input id="origin" name="origin" value="ถ. พหลโยธิน แขวง ถนนพญาไท เขตราชเทวี กรุงเทพมหานคร 10400 ประเทศไทย" required="" type="hidden" />
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label class="col-md-3 col-form-label form-control-label">ปลายทาง</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="to_places" placeholder="Enter a location" style="border-radius: 8rem;" />       
                                    <input id="destination" name="destination" required="" type="hidden" />
                                </div>
                            </div>
                            
                            <div class="form-group row mt-3">
                                <label class="col-lg-3 col-form-label form-control-label"></label>
                                <div class="col-lg-9">       
                                    <!-- <input type="button" class="btn btn-primary mt-3" value="คลิกคำนวน" style="border-radius: 9px;">  -->
                                    <input type="submit" class="btn btn-primary mt-3" value="คลิกคำนวน" style="border-radius: 9px;" />
                                </div>
                            </div>
                        </form>
                    </div><!-- card body -->
                </div> <!-- card-outline -->
                <!-- results -->
                <div id="result" style="border-radius: 8rem;">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">ระยะทางเป็นไมล์ : <span id="in_mile" class="badge badge-primary badge-pill"></span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">ระยะทางเป็นกิโล: <span id="in_kilo" class="badge badge-primary badge-pill"></span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">เวลาเดินทาง:<span id="duration_text" class="badge badge-primary badge-pill"></span></li>
                        <!-- <li class="list-group-item d-flex justify-content-between align-items-center">IN MINUTES: <span id="duration_value" class="badge badge-primary badge-pill"></span></li> -->
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="padding-bottom: 30px;">จุดเริ่มต้น: <span id="from" class="badge badge-primary badge-pill"></span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center" style="padding-bottom: 30px;">ถึง: <span id="to" class="badge badge-primary badge-pill"></span></li>
                    </ul>
                </div>
                <!-- end -->
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row" data-wow-duration="1.5s" data-wow-offset="100">
            <div class="row" data-aos="fade-up"data-aos-duration="1000">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 " style="padding-left: 0px;padding-right: 0px;">
                    <img src="<?=base_url('assets/img/about/Besttechnicial.png');?>" class="img-rounded" id="accounting2" style="width: 100%;padding: -6px;">
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-3 pt-3">
                    <h1>เกี่ยวกับเรา</h1>
                    <h4 >BIG Inspector บริการตรวจรับบ้านและคอนโดแบบครบวงจร ครอบคลุมทุกระบบงาน ด้วยเครื่องมือที่ทันสมัย และระบบรายงานผลการตรวจแบบออนไลน์อัตโนมัติ (Real time) เราเข้าใจและใส่ใจทุกตารางนิ้ว เพื่อให้คุณสบายใจหมดกังวนทุกครั้งที่อยู่บ้าน </h4>
                    <h4>"เพื่อช่วงเวลาที่ดีที่สุดของคุณ"</h4>
                    <h4>เพราะบ้านอยู่กับคุณไปอีกนาน</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container mt-5">
        <div class="row justify-content-center" data-wow-duration="1.5s" data-wow-offset="100">
            <div class="row" data-aos="fade-up"data-aos-duration="1000">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ">
                    <img src="<?=base_url('assets/images/bigbanner+icon/iconabout1.png');?>" class="img-responsive" style="width:100%;">
                    <p class="mt-3" style="text-align: center;">เช็คค่าบริการ </p>
                    <p style="text-align: center;">ก่อนตรวจ</p>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ">
                    <img src="<?=base_url('assets/images/bigbanner+icon/iconabout2.png');?>" class="img-responsive" style="width:100%;">
                    <p class=" mt-3"style="text-align: center;">รายงานผล</p>
                    <p style="text-align: center;">ออนไลน์ทันที</p>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 ">
                <img src="<?=base_url('assets/images/bigbanner+icon/iconabout3.png');?>" class="img-responsive" style="width:100%;">
                    <p class="mt-3" style="text-align: center;">จองฟรี</p>
                    <p style="text-align: center;"> ไม่มีค่ามัดจำ</p>
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
                    <h3 class="" style="text-align: center;">บริการของเรา</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" data-wow-duration="1.5s" data-wow-offset="100">
            <div class="row" data-aos="fade-up"data-aos-duration="1000">
                <?php 
                    foreach($categories as $cate_val) : 
                        echo '<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">';
                            echo '<div class="card" style="width:100%;">';
                                echo '<div class="content-overlay"></div>';
                                echo '<img id="bg_cate_img" src="'.base_url('assets/images/category/'.$cate_val['img_cover']).'" class="card-img-top" alt="'.$cate_val['name'].'" width="100%" height="280">';
                                echo '<div class="centered">';
                                    echo '<h4 class="text-white text-center mb-5">'.$cate_val['name'].'</h4>';
                                    echo '<a type="button" href="'.base_url('portfolio/'.$cate_val['id'].'/?slug='.$cate_val['name']).'" class="btn btn-primary">คลิกดูผลงาน</a>';
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
                    <h3 class="" style="text-align: center;">โครงการ / ผลงาน</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" data-wow-duration="1.5s" data-wow-offset="100">
            <div class="row" data-aos="fade-up"data-aos-duration="1000">
                <?php 
                    foreach($port_recoms as $val_rc) : 
                        echo '<div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">';
                            echo '<div class="card" style="width:100%;">';
                                echo '<img id="bg_recom_img" src="'.base_url('assets/images/portfolio/cover/'.$val_rc['id'].'/'.$val_rc['img_cover']).'" class="card-img-top" alt="'.$val_rc['name'].'" width="100%" height="270">';
                            echo '</div>';
                            echo '<div class="d-flex justify-content-center"><a href="'.base_url('portfolio-detail/'.$val_rc['id'].'/?slug='.$val_rc['t_name'].'&name='.$val_rc['name']).'"><h4 class="mt-3" style="text-align: center;">'.$val_rc['name'].'</h4></a></div>';
                        echo '</div>';
                    endforeach;
                ?>   
            </div>
        </div>
    </div>
</section>
<!-- footer -->
<script>
    // call floor
    
		$('#floor').empty().append('<option>--กรุณาเลือกประเภท--</option>');
		$('#housing_type').on('change', function() {
			var proptypeID = $('#housing_type').val();
			console.log('proptypeID=' + proptypeID);
			$('#floor').empty().append('<option>--กรุณาเลือกประเภท--</option>');
			if ($(this).val() === '') {
				$('#housing_type').empty().append('<option>--กรุณาเลือก--</option>');
				$('#floor').empty().append('<option>--กรุณาเลือกประเภท--</option>');
				return false;
			} else {
				$('#floor').empty().append('<option>--กรุณาเลือก--</option>');
				console.log('proptypeID=' + proptypeID);
				$.ajax({
					type 	: 'POST',
					url 	: '<?=base_url("Func_calculate/filterFloor"); ?>',
					data 	: {typeid:proptypeID,action:'addNew', '<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash(); ?>'},
					success: function(data) {
						console.log(data);
						$("#floor").html(data);      	
					}
				});
			}
		});

    // end
    
    $(function() {
        // add input listeners
        google.maps.event.addDomListener(window, 'load', function () {
            var from_places = new google.maps.places.Autocomplete(document.getElementById('from_places'));
            var to_places = new google.maps.places.Autocomplete(document.getElementById('to_places'));

            google.maps.event.addListener(from_places, 'place_changed', function () {
                var from_place = from_places.getPlace();
                var from_address = from_place.formatted_address;
                $('#origin').val(from_address);
            });

            google.maps.event.addListener(to_places, 'place_changed', function () {
                var to_place = to_places.getPlace();
                var to_address = to_place.formatted_address;
                $('#destination').val(to_address);
            });

        });
        // calculate distance
        function calculateDistance() {
            var origin = $('#origin').val();
            var destination = $('#destination').val();
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix(
                {
                    origins: [origin],
                    destinations: [destination],
                    travelMode: google.maps.TravelMode.DRIVING,
                    // unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
                    unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.
                    avoidHighways: false,
                    avoidTolls: false
                }, callback);
        }
        // get distance results
        function callback(response, status) {
            if (status != google.maps.DistanceMatrixStatus.OK) {
                $('#result').html(err);
            } else {
                var origin = response.originAddresses[0];
                var destination = response.destinationAddresses[0];
                // var str = response.destinationAddresses[0]; // string
                var str = [destination];
                var stringArray = str.join(' ').split(' '); // converted strings to array
                console.log('str=' + str);
                console.log('converted=' + stringArray);

                if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
                    $('#result').html("Better get on a plane. There are no roads between "  + origin + " and " + destination);
                } else {
                    var distance = response.rows[0].elements[0].distance;
                    var duration = response.rows[0].elements[0].duration;
                    
                    var distance_in_kilo = distance.value / 1000; // the kilom
                    var distance_kilometer = distance_in_kilo.toFixed(2);
                    // var distance_in_mile = distance.value / 1609.34; // the mile
                    var duration_text = duration.text;
                    var duration_value = duration.value;

                    // render HTML
                    // $('#in_mile').text(distance_in_mile.toFixed(2));
                    $('#in_kilo').text(distance_in_kilo.toFixed(2));
                    $('#duration_text').text(duration_text);
                    // $('#duration_value').text(duration_value);
                    $('#from').text(origin);
                    $('#to').text(destination);
                    // housing_type | floor | 
                    var housingType = $('#housing_type').val();
                    var floor = $('#floor').val();
                    var usableArea = $('#usable_area').val();
                    // call search function
                    $.ajax({
                        type 	: 'POST',
                        url 	: '<?=base_url("Func_calculate/search"); ?>',
                        data 	: {
                            data:stringArray,
                            diskm:distance_kilometer,
                            housingType:housingType,
                            floor:floor,
                            usableArea:usableArea, 
                            action:'serviceCharge', '<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash(); ?>'},
                        success: function(data) {
                            // if (data = 'true') {
                            //     alert("Success, to OK");
                            //     location.reload();
                            // } else {
                            //     alert("Error, to OK");
                            //     location.reload();
                            // }      	
                        }
                    });

                    // end
                }
            }
        }
        // print results on submit the form
        $('#distance_form').submit(function(e){
            e.preventDefault();
            calculateDistance();
        });

    });

</script>
