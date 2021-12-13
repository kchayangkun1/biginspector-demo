<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Big Inspector">
	<meta name="author" content="Big Inspector">

	<title>Gallery | Big Inspector</title>

	<link rel="icon" type="image/png" href="<?=base_url('assets/img/logo/logo1.png');?>" />
    <link rel="shortcut icon" type="image/ico" href="<?=base_url('assets/img/logo/logo1.png');?>">
    <link rel="apple-touch-icon-precomposed" type="image/ico" sizes="114×114" href="<?=base_url('assets/img/logo/logo1.png');?>">
    <link rel="apple-touch-icon-precomposed" type="image/ico" sizes="72×72" href="<?=base_url('assets/img/logo/logo1.png');?>">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?=base_url('./assets/admin/assets/css/bootstrap.css');?>">
    <link type="text/css" rel="stylesheet" href="<?=base_url('./assets/admin/vendor/summernote/summernote-bs4.css');?>">
	<link rel="stylesheet" href="<?=base_url('./assets/admin/assets/css/bootstrap-extend.css');?>">
	<link rel="stylesheet" href="<?=base_url('./assets/admin/assets/css/site.css');?>">

    <!-- Plugins -->
	<link rel="stylesheet" href="<?=base_url('./assets/admin/vendor/animsition/animsition.css');?>">
	<link rel="stylesheet" href="<?=base_url('./assets/admin/vendor/asscrollable/asScrollable.css');?>">
	<link rel="stylesheet" href="<?=base_url('./assets/admin/vendor/switchery/switchery.css');?>">
	<link rel="stylesheet" href="<?=base_url('./assets/admin/vendor/intro-js/introjs.css');?>">
	<link rel="stylesheet" href="<?=base_url('./assets/admin/vendor/slidepanel/slidePanel.css');?>">
	<link rel="stylesheet" href="<?=base_url('./assets/admin/vendor/flag-icon-css/flag-icon.css');?>">
	<link rel="stylesheet" href="<?=base_url('./assets/admin/assets/css/v2.css');?>">

	<!-- Upload -->
	<link href="<?=base_url('./assets/admin/vendor/upload/css/jquery.fileuploader.css');?>" media="all" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url('./assets/admin/vendor/dropify/dropify.css');?>">

	<!-- Fonts -->
	<link rel="stylesheet" href="<?=base_url('./assets/admin/assets/fonts/web-icons/web-icons.min.css');?>">
	<link rel="stylesheet" href="<?=base_url('./assets/admin/assets/fonts/font-awesome/font-awesome.min.css');?>">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

	<!-- Scripts -->
	<script src="<?=base_url('./assets/admin/vendor/breakpoints/breakpoints.js');?>"></script>
	<script>
		Breakpoints();
	</script>

</head>
<body class="animsition dashboard">
	<?php $this->load->view('admin/menu'); ?>
    <!-- Page -->
	<div class="page">
		<div class="page-content container-fluid">
			<div class="row" data-plugin="matchHeight" data-by-row="true">
				<div class="col-xxl-12 col-lg-12">		
					<!-- Panel Static Labels -->
		          	<div class="panel">
			            <div class="panel-heading">
			              <h3 class="panel-title">แบบฟอร์อัตราค่าบริการ</h3>
			            </div>
			            <div class="panel-body container-fluid">
			              	<form action="<?=base_url('Admin/create_service');?>" id="productAdd" name="productAdd" class="form-horizontal" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" 
                                    value="<?=$this->security->get_csrf_hash();?>" >
                                <div id="housing_type" class="form-group form-material col-md-12" data-plugin="formMaterial">
                                    <label class="form-control-label" for="housing_type">ประเภทที่อยู่อาศัย</label>
                                    <select class="form-control" name="housing_type" required>
                                        <option value="">-- กรุณาเลือก --</option>
                                        <?php foreach($categories as $val_type) : ?>
                                            <option value="<?=$val_type['id']; ?>" ><?=$val_type['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
								<div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="floor">จำนวนชั้น(*ถ้าไม่มีใส่ 0 เช่น กรณี คอนโด ให้ใส่ 0)</label>
				                  	<input type="text" class="form-control" id="floor" name="floor" placeholder="ถ้าไม่มีใส่ 0 เช่น กรณี คอนโด ให้ใส่ 0" onkeypress='return event.charCode >= 48 && event.charCode <= 57' autocomplete="off" required>
				                </div>
                                <div class="row">
									<div class="form-group form-material col-md-6" data-plugin="formMaterial">
										<label class="form-control-label" for="usable_area">ขนาดพื้นที่ใช้สอย(ตรม.)</label>
										<input type="text" class="form-control" id="usable_area" name="usable_area" placeholder="ระบุตัวเลขเท่านั้น เช่น 50" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
									</div>
                                    <div class="form-group form-material col-md-6" data-plugin="formMaterial">
										<label class="form-control-label" for="usable_remark">หมายเหตุ</label>
										<input type="text" class="form-control" id="usable_remark" name="usable_remark" placeholder="เช่น ขนาด 0-50 ตารางเมตร" required>
									</div>
								</div>
                                <div id="travel_expense" class="form-group form-material col-md-12" data-plugin="formMaterial">
                                    <label class="form-control-label" for="travel_expense">ค่าเดินทางเพิ่มเติม(กม.ละ X บ.)</label>
                                    <select class="form-control" name="travel_expense" required>
                                        <option value="" disabled>-- กรุณาเลือก --</option>
                                        <option value="0">-- ไม่คิดค่าเดินทาง --</option>
                                        <?php foreach($expenses as $tr_exp) : ?>
                                            <option value="<?=$tr_exp['id']; ?>" ><?=$tr_exp['name'];?> | กม.ละ <?=$tr_exp['price'];?> บ.</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="price_rate">ค่าบริการ</label>
				                  	<input type="text" class="form-control" id="price_rate" name="price_rate" placeholder="เช่น 5000" onkeypress='return event.charCode >= 48 && event.charCode <= 57' autocomplete="off" required>
				                </div>
                                <div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="price_add">ค่าบริการเพิ่มเติม(เช่น กรณีขนาดพื้นที่ใช้สอย มากกว่า 80 ตารางเมตรขึ้นไป คำนวณ ตรม.ละ 40 บาท) **ถ้าไม่มีให้ใส่ 0</label>
				                  	<input type="text" class="form-control" id="price_add" name="price_add" placeholder="เช่น 40" onkeypress='return event.charCode >= 48 && event.charCode <= 57' autocomplete="off" required>
				                </div>
                                <div class="form-group form-material col-md-12" data-plugin="formMaterial">
                                    <label class="form-control-label" for="promo_type">ส่วนลด / โปรโมชั่น</label>
                                    <select class="form-control" name="promo_type" id="promo_type" required>
                                        <option value="0">-- ไม่มี --</option>
                                        <option value="1">บาท(THB.) </option>
                                        <option value="2">เปอร์เซนต์(%) </option>
                                    </select>
                                </div>
                                <div id="div_promo_price" class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="promo_price">ระบุส่วนลด <span id="discount_text"></span></label>
				                  	<input type="text" class="form-control" id="promo_price" name="promo_price" placeholder="เช่น 5000" onkeypress='return event.charCode >= 48 && event.charCode <= 57' autocomplete="off">
				                </div>
                                
				                <div class="text-right">
						            <button type="submit" class="btn btn-animate btn-animate-side btn-success" id="btn_submit">
						              	<span><i class="icon wb-check" aria-hidden="true"></i> Save</span>
						            </button>
						            <button type="button" class="btn btn-animate btn-animate-side btn-default btn-outline" onclick="window.location.href = '<?=base_url('Admin/gallery');?>';">
						              	<span><i class="icon wb-close" aria-hidden="true"></i> Close</span>
						            </button>
          						</div>
			              	</form>
			            </div>
		          	</div>
		          	<!-- End Panel Static Labels -->			
				</div>
			</div>
		</div>
	</div>
	<!-- End Page -->

    <!-- footer -->
	<?php $this->load->view('admin/footer'); ?>

    	<!-- Core-->
	<script src="<?=base_url('./assets/admin/vendor/babel-external-helpers/babel-external-helpers.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/jquery/jquery.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/popper-js/umd/popper.min.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/bootstrap/bootstrap.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/animsition/animsition.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/mousewheel/jquery.mousewheel.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/asscrollbar/jquery-asScrollbar.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/asscrollable/jquery-asScrollable.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/ashoverscroll/jquery-asHoverScroll.js');?>"></script>

	<!-- Plugins -->
    <script type="text/javascript" src="<?=base_url('./assets/admin/vendor/summernote/summernote-bs4.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/switchery/switchery.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/intro-js/intro.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/screenfull/screenfull.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/slidepanel/jquery-slidePanel.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/skycons/skycons.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/aspieprogress/jquery-asPieProgress.min.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/matchheight/jquery.matchHeight-min.js');?>"></script>

	<script type="text/javascript">
        var uploadUrl = '<?=base_url('File_upload/upfile/');?>';
    </script>
	
	<!-- Scripts -->
	<script src="<?=base_url('./assets/admin/assets/js/Component.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/Plugin.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/Base.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/Config.js');?>"></script>

	<script src="<?=base_url('./assets/admin/assets/js/Section/Menubar.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/Section/GridMenu.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/Section/Sidebar.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/Section/PageAside.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/Plugin/menu.js');?>"></script>

	<script src="<?=base_url('./assets/admin/assets/js/config/colors.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/config/tour.js');?>"></script>

	<!-- Page -->
	<script src="<?=base_url('./assets/admin/assets/js/Site.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/Plugin/asscrollable.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/Plugin/slidepanel.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/Plugin/switchery.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/Plugin/matchheight.js');?>"></script>
	<script src="<?=base_url('./assets/admin/assets/js/v1.js');?>"></script>

	<!-- Upload -->
	<script src="<?=base_url('./assets/admin/vendor/upload/js/jquery.fileuploader.js');?>" type="text/javascript"></script>
	<script src="<?=base_url('./assets/admin/vendor/upload/js/custom.js');?>" type="text/javascript"></script>
	<script src="<?=base_url('./assets/admin/vendor/dropify/dropify.min.js');?>"></script>

	<script type="text/javascript">
        var uploadUrl = '<?=base_url('File_upload/upfile/');?>';
    </script>

	<script type="text/javascript">
	$(document).ready(function() {
        $('#div_promo_price').hide(); 
        $('#promo_type').on('change', function() {
            var promoType = $('#promo_type').val();
            var promoTypeText = $("#promo_type option:selected").text();
            console.log('promoType=' + promoType);
            console.log('promoTypeText=' + promoTypeText);
            if(promoType == 1 || promoType == 2) {
                console.log('Y');
                $('#div_promo_price').show();
                $('#discount_text').html(promoTypeText); 
            } else {
                console.log('N');
                $('#div_promo_price').hide(); 
                $('#discount_text').remove(); 
            } 
        });
			
			
	});
		
        
        
	</script>
</body>
</html>
