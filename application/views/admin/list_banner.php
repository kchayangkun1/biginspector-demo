<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="bootstrap admin template">
	<meta name="author" content="">
	<title>Slide | Lenista Clinic </title>
	<link rel="shortcut icon" href="<?=base_url('./assets/img/core-img/logo.png');?>">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?=base_url('./assets/admin/assets/css/bootstrap.css');?>">
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

	<link rel="stylesheet" href="<?=base_url('./assets/admin/vendor/bootstrap-table/bootstrap-table.css?v4.0.2');?>">

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
<body class="">
	<!-- menu -->
	<?php $this->load->view('admin/menu'); ?>
	<!-- end -->

	<!-- Page -->
	<div class="page">
		<div class="page-content container-fluid">

	      	<!-- Panel Other -->
	      	<div class="panel">
		        <div class="panel-heading">
		          	<h3 class="panel-title">แบนเนอร์</h3>
		        </div>
		        <div class="panel-body">
		          	<div class="row row-lg">
			            <div class="col-md-12">
			              	<!-- Example Toolbar -->
			              	<div class="example-wrap">			                  
			                  	<div class="bootstrap-table">
			                  		<div class="fixed-table-toolbar">
			                  			<div class="bs-bars pull-left">
			                  				
			                  			</div>
			                  		</div>
			                  		<div class="" style="padding-bottom: 0px;">
			                  			<div class="fixed-table-body">
			                  				<table id="exampleTableToolbar" data-mobile-responsive="true" class="table table-hover" data-pagination="true" data-search="true" style="margin-top: 0px;">
			                    				<thead style="">
			                    					<tr>
			                    						<th style="" data-field="id" data-align="center">
			                    							<div class="th-inner ">#</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    						<th style="" data-field="name">
			                    							<div class="th-inner ">ชื่อ</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
                                                        <th style="" data-field="image" data-align="center">
			                    							<div class="th-inner">ภาพตัวอย่าง</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    						<th style="" data-field="">
			                    							<div class="th-inner ">วันที่อัพเดท</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
                                                        <th style="" data-field="Status" data-align="center">
			                    							<div class="th-inner ">สถานะ</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    						<th style="" data-field="edit" data-align="center" data-width="120px">
			                    							<div class="th-inner "></div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    					</tr>
			                    				</thead>
			                    				<?php if(!empty($banners)) : ?>
			                  					<tbody>
			                  						<?php 
													$i = 0;
													foreach($banners as $slide_dsc) : 
													?>
			                  						<tr> 
			                  							<td class=""><?=$i+1; ?></td> 
			                  							<td style=""><?=$slide_dsc['name']; ?></td>
                                                        <td style="">
                                                            <img src="<?=base_url('assets/images/banner/'.$slide_dsc['img_cover']);?>" alt="<?=$slide_dsc['name'];?>" style="width: 10rem;">
                                                        </td>
			                  							<td style=""><?=date("d/m/Y H:i:s", strtotime($slide_dsc['update_date'])); ?></td>
			                  							<td style="">
															<?php if ($slide_dsc['is_active'] == '1') : ?>
																<span class="badge badge-success" data-toggle="tooltip" data-placement="top" title="Active"><i class="icon wb-check" aria-hidden="true"></i></span>
                                                                
			                  								<?php else : ?>
																<span class="badge badge-danger" data-toggle="tooltip" data-placement="top" title="Deactive"><i class="icon wb-close" aria-hidden="true"></i></span>
			                  								<?php endif; ?>
			                  							</td>
                                                        <td>
			                  								<button type="button" class="btn btn-round btn-warning btn-sm" onclick="window.location.href = '<?=base_url('Admin/edit_banner/'.$slide_dsc['id']);?>';" data-toggle="tooltip" data-placement="top" title="แก้ไข"><i class="icon wb-pencil" aria-hidden="true"></i></button>

			                  								<button type="button" class="btn btn-round btn-danger btn-sm" onclick="delS(<?=$slide_dsc['id']; ?>, <?=$slide_dsc['is_active']; ?>)" data-toggle="tooltip" data-placement="top" title="ตั้งค่า"><i class="fa fa-cogs" aria-hidden="true"></i></button>
			                  							</td> 
			                  						</tr>
			                  						<?php
			                  							$i++;
			                  						endforeach; 
			                  						?>
			                  					</tbody>
			                  					<?php endif; /* if(!empty($service_list)) : */ ?>
			                  				</table>
			                  			</div>
			                  			<div class="fixed-table-pagination" style="display: none;"></div>
			                  		</div>
				                  	<div class="clearfix"></div>
				                </div>
			              	</div>
			              	<!-- End Example Toolbar -->
			            </div>	         
		          	</div>
		        </div>
	      </div>
	      <!-- End Panel Other -->
    </div>
	</div>
	<!-- End Page -->
	
	<!-- footer -->
	<?php
		$this->load->view('admin/footer');
	?>

	<div class="modal fade bs-example-modal-sm" id="modalChange" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel2">Change</h4>
				</div>
				<div class="modal-body">
					<h4>คุณต้องการเปลี่ยนสถานะหรือไม่ ?</h4>
				</div>
				<div class="modal-footer">
					<input type="hidden" id="slide_id" name="slide_id">
					<input type="hidden" id="sStatus" name="sStatus">
					<button type="button" class="btn btn-success" onclick="changeSt()"><i class="fa fa-check"></i> Confirm</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade bs-example-modal-sm" id="modaldelete" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel2">ตั้งค่า</h4>
				</div>
				<div class="modal-body">
					<h4>คุณต้องการอัพเดทสถานะ ใช่หรือไม่ ?</h4>
                    <h5>สามารถตั้งค่า Active/Deactive ได้ทุกเมื่อ</h5>
				</div>
				<div class="modal-footer">
					<input type="hidden" id="s_id" name="s_id">
					<input type="hidden" id="status" name="status">
					<button type="button" class="btn btn-success" onclick="deleteSlide()"><i class="fa fa-check"></i> Confirm</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /modals -->

	<!-- script -->
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
	<script src="<?=base_url('./assets/admin/vendor/switchery/switchery.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/intro-js/intro.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/screenfull/screenfull.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/slidepanel/jquery-slidePanel.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/skycons/skycons.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/aspieprogress/jquery-asPieProgress.min.js');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/matchheight/jquery.matchHeight-min.js');?>"></script>

	<script src="<?=base_url('./assets/admin/vendor/bootstrap-table/bootstrap-table.js?v4.0.2');?>"></script>
	<script src="<?=base_url('./assets/admin/vendor/bootstrap-table/extensions/mobile/bootstrap-table-mobile.min.js?v4.0.2');?>"></script>

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
	<script src="<?=base_url('./assets/admin/assets/js/tables/bootstrap.js?v4.0.2');?>"></script>
	
	<script type="text/javascript">

	function delS(sid, status)
    {
        var state =status;
        if(state == 1){
            state =0;
        } else {
            state =1;
        }
        console.log('state=' + state);
    	$('#s_id').val(sid);
		$('#status').val(state);
    	$('#modaldelete').modal('show');
    }

     function deleteSlide()
    {
   		$.ajax({
		  	type 	: 'POST',
		  	url 	: '<?=base_url("Admin/distroy_banner"); ?>',
		  	data 	: {sid:$('#s_id').val(),sts:$('#status').val(), action:'delSlide', '<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash(); ?>'},
		  	success: function(data) {
		        if (data == 'true') {
					alert("Successfully");
    				location.reload();
		        } else {
		        	alert("Not Found");
    				location.reload();
		        }        	
		    }
		});
	}

	</script>
</body>
</html>
