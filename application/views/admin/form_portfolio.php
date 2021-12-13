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

	<title>Portfolio | Big Inspector</title>

	<link rel="apple-touch-icon" href="<?php echo base_url('./assets/img/logo2.png');?>">
	<link rel="shortcut icon" href="<?php echo base_url('./assets/img/logo2.png');?>">

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
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

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
			              <h3 class="panel-title">Add Portfolio</h3>
			            </div>
			            <div class="panel-body container-fluid">
			              	<form action="<?=base_url('Admin/create_portfolio');?>" id="productAdd" name="productAdd" class="form-horizontal" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" 
                                    value="<?=$this->security->get_csrf_hash();?>" >
                                <div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="title">ชื่อ</label>
				                  	<input type="text" class="form-control" id="name" name="name" placeholder="ชื่อ" required>
				                </div>
								<div id="category" class="form-group form-material col-md-6" data-plugin="formMaterial">
                                    <label class="form-control-label" for="category">ประเภท</label>
                                    <select class="form-control" name="category" required>
										<option value="">-- กรุณาเลือก --</option>
                                        <?php 
											foreach($categories as $cat_val) : ?>
                                                <option value="<?=$cat_val['id']; ?>"><?=$cat_val['name'];?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
								<div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="title">คำอธิบาย</label>
				                  	<input type="text" class="form-control" id="caption" name="caption" placeholder="คำอธิบาย" required>
				                </div>
                                
								
								<!-- <div class="form-group form-material" data-plugin="formMaterial">
									<label class="form-control-label" for="detail">Description</label>
									<textarea class="form-control summernote" rows="4" placeholder="Detail" id="description" name="description"></textarea>
								</div> -->

								<div class="form-group form-material form-material-file" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="image">ภาพปก</label>
									<div id="width"></div> 
			                      	<input type="file" id="covImg" name="covImg" data-plugin="dropify" data-default-file="" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" required/>
									<p class="help-block"><i>
									รองรับไฟล์ภาพ <br>
									ขนาดภาพแนะนำ 1280x1280px <br> 
									ชื่อไฟล์เป็นภาษาอังกฤษเท่านั้น <br>
									ไฟล์นามสกุล .png .jpg .jpeg</i>
									</p>
				                </div>

								<div class="form-group form-material form-material-file" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="image">อัลบั้ม</label><br>
				                  	<input type="file" id="productImg" name="productImg" accept="png jpg jpeg PNG JPG JPEG">
									<p class="help-block"><i>
									รองรับไฟล์ภาพ <br>
									ขนาดภาพแนะนำ 1280x1280px <br> 
									ชื่อไฟล์เป็นภาษาอังกฤษเท่านั้น <br>
									ไฟล์นามสกุล .png .jpg .jpeg</i>
									</p>
				                </div>
				                <div class="text-right">
						            <button type="submit" class="btn btn-animate btn-animate-side btn-success" id="btn_submit">
						              	<span><i class="icon wb-check" aria-hidden="true"></i> Save</span>
						            </button>
						            <button type="button" class="btn btn-animate btn-animate-side btn-default btn-outline" onclick="window.location.href = '<?=base_url('Admin/portfolio');?>';">
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
        // validate main image size
		$(document).ready(function(){
			// $('#btn_submit').prop('disabled', true);
			var _URL = window.URL || window.webkitURL;

			$('#covImg').change(function () {
				var file = $(this)[0].files[0];

				img = new Image();
				var imgwidth = 0;
				var imgheight = 0;
				var maxwidth = 1280;
				var maxheight = 1280;

				img.src = _URL.createObjectURL(file);
				img.onload = function() {
					imgwidth = this.width;
					imgheight = this.height;
					
					if(imgwidth == maxwidth && imgheight == maxheight){
						$("#width").html("<label class='form-control-label' for='width' stlye='color:green;'>width: "+imgwidth+"X"+imgheight+ " <i class='fa fa-check-circle' aria-hidden='true' style='color:green'></i></label>");
						// $('#btn_submit').prop('disabled', false);
					}else{
						$("#width").html("<label class='form-control-label' for='width' style='color:red'>ขนาดภาพที่แนะนำ "+maxwidth+"X"+maxheight+ " <i class='fa fa-times-circle' aria-hidden='true' style='color:red'></i></label>");
						// $('#btn_submit').prop('disabled', true);
						// $("#covImg").val(null);
						// return false;
					}
				};
				img.onerror = function() {
					$("#response").text("not a valid file: " + file.type);
				}
			});
		});
		// 
	</script>
</body>
</html>
