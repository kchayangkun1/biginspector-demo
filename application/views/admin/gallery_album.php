<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="32Decor">
	<meta name="author" content="32Decor">

	<title>Albums | 32Decor </title>

	<link rel="icon" type="image/png" href="<?=base_url('assets/img/logo/logo1.png');?>" />
    <link rel="shortcut icon" type="image/ico" href="<?=base_url('assets/img/logo/logo1.png');?>">
    <link rel="apple-touch-icon-precomposed" type="image/ico" sizes="114×114" href="<?=base_url('assets/img/logo/logo1.png');?>">
    <link rel="apple-touch-icon-precomposed" type="image/ico" sizes="72×72" href="<?=base_url('assets/img/logo/logo1.png');?>">
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
		          	<h3 class="panel-title"><?=$gallery_name[0]['name'];?></h3>
		        </div>
		        <div class="panel-body">
		          	<div class="row row-lg">
			            <div class="col-md-12">
			              	<!-- Example Toolbar -->
			              	<div class="example-wrap">			                  
			                  	<div class="bootstrap-table">
			                  		<div class="fixed-table-toolbar">
									  	<!-- <div class="bs-bars pull-left">
			                  				<div class="btn-group hidden-sm-down" id="exampleToolbar" role="group">
							                    <button type="button" class="btn btn-success btn-outline btn-sm" onclick="window.location.href = '<?//=base_url('Admin/form_service_upload/'.$product_name[0]['id'].'/?slug='.$product_name[0]['name']);?>';">
							                      	<i class="icon wb-plus" aria-hidden="true"></i> Add 
							                    </button>
			                  				</div>
			                  			</div> -->
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
			                    						<!-- <th style="" data-field="name">
			                    							<div class="th-inner ">ชื่อไฟล์</div>
			                    							<div class="fht-cell"></div>
			                    						</th> -->
														<th style="" data-field="Title">
			                    							<div class="th-inner ">ชื่อภาพ</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
														<th style="" data-field="edit" data-align="center" data-width="120px">
			                    							<div class="th-inner ">แก้ไขชื่อภาพ</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
														</th>
			                    						<th style="" data-field="Document" data-align="center">
			                    							<div class="th-inner ">ภาพ</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    						<th style="" data-field="Created">
			                    							<div class="th-inner ">อัพเดทเมื่อ</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
														<th style="" data-field="Status" data-align="center">
			                    							<div class="th-inner ">สถานะ</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
														<th style="" data-field="delete" data-align="center" data-width="120px">
			                    							<div class="th-inner "></div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    					</tr>
			                    				</thead>
			                    				<?php if(!empty($gallery_images)) : ?>
			                  					<tbody>
			                  						<?php 
													$i = 0;
													$j = 1;
													foreach($gallery_images as $val_item) : 
													?>
			                  						<tr> 
			                  							<td class=""><?=$i+1; ?></td> 
			                  							<!-- <td style=""><?//=$val_item['img_name']; ?></td> -->
														<td style="">
															<?php 
															if($val_item['title'] !='') : 
																echo $val_item['title'];
															else : 
																echo 'ภาพที่ '.$j;
															endif;
															?>
														</td>
														<td>
														  <button type="button" class="btn btn-round btn-warning btn-sm" onclick="editTitle(<?=$val_item['gimg_id'];?>)" data-toggle="tooltip" data-placement="top" title="แก้ไขชื่อภาพ"><i class="fa fa-pencil" aria-hidden="true"></i></button>
			                  							</td>
														<td style="">
															<img src="<?=base_url('assets/images/gallery/'.$val_item['gallery_id'].'/'.$val_item['img_name']);?>" class="img-fluid img-thumbnail" alt="<?=$val_item['title']; ?>" style="width: 20%;">
														</td>
			                  							<td style=""><?=date("d/m/Y", strtotime($val_item['create_date'])); ?></td>
														<td style="">
															<?php if ($val_item['is_active'] == '1') : ?>
			                  									<button class="btn btn-sm btn-success btn-icon btn-floating" type="button" onclick="gChange(<?=$val_item['gimg_id']; ?>, 0)" data-toggle="tooltip" data-placement="top" title="เปิด/ปิด"><i class="icon wb-check" aria-hidden="true"></i></button>
			                  								<?php else : ?>
			                  									<button class="btn btn-sm btn-danger btn-icon btn-floating" type="button" onclick="gChange(<?=$val_item['gimg_id']; ?>, 1)" data-toggle="tooltip" data-placement="top" title="เปิด/ปิด"><i class="icon wb-close" aria-hidden="true"></i></button>
			                  								<?php endif; ?>
			                  							</td>
														<td>
														  <button type="button" class="btn btn-round btn-danger btn-sm" onclick="delServfile(<?=$val_item['gimg_id'];?>)"  data-toggle="tooltip" data-placement="top" title="ลบไฟล์"><i class="icon wb-close" aria-hidden="true"></i></button>
														</td>
			                  						</tr>
			                  						<?php
			                  							$i++;
														$j++;
			                  						endforeach; 
			                  						?>
			                  					</tbody>
			                  					<?php endif; ?>
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
	<!-- change title -->
	<div class="modal fade bs-example-modal-sm" id="modalChangeTitle" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel2">แก้ไขชื่อภาพ</h4>
				</div>
				<div class="modal-body">
					<input type="text" name="img_title" id="img_title" class="form-control form-control-sm" placeholder="title">
				</div>
				<div class="modal-footer">
					<input type="hidden" id="g_id" name="g_id">
					<button type="button" class="btn btn-success" onclick="addTitle()"><i class="fa fa-check"></i> Confirm</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /modals -->
	<!-- delete & unlink image -->
	<div class="modal fade bs-example-modal-sm" id="modalDelete" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel2">Delete</h4>
				</div>
				<div class="modal-body">
					<h3>คุณต้องการลบไฟล์นี้ ใช่หรือไม่?</h3>
					<h6>โปรดทำการตรวจสอบความถูกต้องของข้อมูลก่อนกด 'Confirm'</h6>
				</div>
				<div class="modal-footer">
					<input type="hidden" id="image_id" name="image_id">
					<button type="button" class="btn btn-success" onclick="deleteImage()"><i class="fa fa-check"></i> Confirm</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- modal change active -->
	<div class="modal fade bs-example-modal-sm" id="modalIsActive" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel2">Change</h4>
				</div>
				<div class="modal-body">
					<h4>คุณต้องการเปลี่ยนสถานะ ใช่หรือไม่ ?</h4>
					<h6>สามารถ เปิด/ปิด การแสดงผลได้ทุกเมื่อ</h6>
				</div>
				<div class="modal-footer">
					<input type="hidden" id="img_id" name="img_id">
                    <input type="hidden" id="img_st" name="img_st">
					<button type="button" class="btn btn-success" onclick="changeIsActive()"><i class="fa fa-check"></i> Confirm</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- end -->


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
		function editTitle(id)
		{
			$('#g_id').val(id);
			$('#modalChangeTitle').modal('show');
		}

		function addTitle()
		{
			$.ajax({
				type 	: 'POST',
				url 	: '<?=base_url("Admin/addTitleGallery"); ?>',
				data 	: {id:$('#g_id').val(),title:$('#img_title').val(), action:'addTitle', '<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash(); ?>'},
				success: function(data) {
					if (data = 'true') {
						alert("Success, to OK");
						location.reload();
					} else {
						alert("Error, to OK");
						location.reload();
					}      	
				}
			});
		}

		function delServfile(id)
		{
			$('#image_id').val(id);
			$('#modalDelete').modal('show');
		}

		function deleteImage()
		{
			$.ajax({
				type 	: 'POST',
				url 	: '<?=base_url("Admin/distroyGalleryThumbnail"); ?>',
				data 	: {id:$('#image_id').val(), action:'distroy', '<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash(); ?>'},
				success: function(data) {
					if (data = 'true') {
						alert("Success, to OK");
						location.reload();
					} else {
						alert("Error, to OK");
						location.reload();
					}      	
				}
			});
		}
		// change status
		function gChange(pid, state)
		{
			console.log('id=' + pid);
			console.log('state=' + state);
			$('#img_id').val(pid);
            $('#img_st').val(state);
			$('#modalIsActive').modal('show');

		}
		function changeIsActive() {
            $.ajax({
				type 	: 'POST',
				url 	: '<?=base_url("Admin/gallery_img_isactive"); ?>',
				data 	: {id:$('#img_id').val(),st:$('#img_st').val(), action:'change', '<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash(); ?>'},
				success: function(data) {
					if (data = 'true') {
						alert("Success, to OK");
						location.reload();
					} else {
						alert("Error, to OK");
						location.reload();
					}      	
				}
			});
        }
	</script>
</body>
</html>
