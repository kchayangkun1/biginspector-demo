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

	<title>Article | 32Decor </title>
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
	<style>
		.not-allowed{
			cursor: not-allowed! important;	
		}
	</style>
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
		          	<h3 class="panel-title">Article</h3>
		        </div>
		        <div class="panel-body">
		          	<div class="row row-lg">
			            <div class="col-md-12">
			              	<!-- Example Toolbar -->
			              	<div class="example-wrap">			                  
			                  	<div class="bootstrap-table">
			                  		<div class="fixed-table-toolbar">
			                  			<div class="bs-bars pull-left">
			                  				<div class="btn-group hidden-sm-down" id="exampleToolbar" role="group">
							                    <button type="button" class="btn btn-success btn-outline btn-sm" onclick="window.location.href = '<?=base_url('Admin/form_article');?>';">
							                      	<i class="icon wb-plus" aria-hidden="true"></i> Add 
							                    </button>
			                  				</div>
			                  			</div>
			                  		</div>
			                  		<div class="" style="padding-bottom: 0px;">
			                  			<div class="fixed-table-body">
										  <ul>
												  	<ol>
													  	<span class="badge badge-success">
														  <i class="icon wb-check" aria-hidden="true"></i> 
														</span> เปิด
													</ol>
													<ol>
														<span class="badge badge-danger">
															<i class="icon wb-close" aria-hidden="true"></i>
														</span> ปิด
													</ol>
													<!-- <ol>
														สถานะ NEW Article ปรับได้ 4 รายการ
													</ol> -->
													<ol>
														สถานะ Recommend ปรับได้ 9 รายการ
													</ol>
											  </ul>
			                  				<table id="exampleTableToolbar" data-mobile-responsive="true" class="table table-hover" data-pagination="true" data-search="true" style="margin-top: 0px;">
			                    				<thead style="">
			                    					<tr>
			                    						<th style="" data-field="id" data-align="center">
			                    							<div class="th-inner ">#</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    						<th style="" data-field="name" data-align="center">
			                    							<div class="th-inner ">Name</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
														</th>
			                    						<!-- <th style="" data-field="Document" data-align="center">
			                    							<div class="th-inner ">Album</div>
			                    							<div class="fht-cell"></div>
			                    						</th> -->
			                    						<th style="" data-field="Created" data-align="center">
			                    							<div class="th-inner ">Created</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
														<th style="" data-field="Recommend" data-align="center">
			                    							<div class="th-inner ">Recommend</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
														<th style="" data-field="Status" data-align="center">
			                    							<div class="th-inner ">Active</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
														
			                    						<th style="" data-field="edit" data-align="center" data-width="120px">
			                    							<div class="th-inner "></div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    					</tr>
			                    				</thead>
			                    				<?php if(!empty($products)) : ?>
			                  					<tbody>
			                  						<?php 
													$i = 0;
													foreach($products as $val_item) : ?>
			                  						<tr> 
			                  							<td class=""><?=$i+1; ?></td> 
			                  							<td style=""><?=$val_item['name']; ?></td>
														<!-- <td style="">
															<a type="button" href="<?//=base_url('Admin/albums/'.$val_item['id'].'/?slug='.$val_item['name']);?>" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="top" title="File upload">
															<i class="fa fa-picture-o" aria-hidden="true"></i>
														  	</a>
														</td> -->
			                  							<td style=""><?=date("d/m/Y", strtotime($val_item['create_date'])); ?></td>
														<td style="">
															<?php if($isrecom == 9) : ?>
																<?php if ($val_item['is_recommend'] == '1') : ?>
			                  										<button class="btn btn-sm btn-success btn-icon btn-floating" type="button" onclick="sChange(<?=$val_item['id']; ?>, 0)"><i class="icon wb-check" aria-hidden="true"></i></button>
			                  									<?php else : ?>
																	<button class="btn btn-sm btn-secondary btn-icon btn-floating disabled not-allowed" type="button" diabled><i class="fa fa-ban text-danger" aria-hidden="true"></i></button>
			                  									<?php endif; ?>

															<?php else : ?>
																<?php if($val_item['is_new'] == '1') : ?>
																<button class="btn btn-sm btn-secondary btn-icon btn-floating disabled not-allowed" type="button" diabled><i class="fa fa-ban text-danger" aria-hidden="true"></i></button>
															<?php else : ?>
																<?php if ($val_item['is_recommend'] == '1') : ?>
			                  										<button class="btn btn-sm btn-success btn-icon btn-floating" type="button" onclick="sChange(<?=$val_item['id']; ?>, 0)"><i class="icon wb-check" aria-hidden="true"></i></button>
			                  									<?php else : ?>
			                  										<button class="btn btn-sm btn-danger btn-icon btn-floating" type="button" onclick="sChange(<?=$val_item['id']; ?>, 1)"><i class="icon wb-close" aria-hidden="true"></i></button>
			                  									<?php endif; ?>
															<?php endif; ?>

															<?php endif; ?>

			                  							</td>
														<td style="">
															<?php if ($val_item['is_active'] == '1') : ?>
																<span class="badge badge-success" data-toggle="tooltip" data-placement="top" title="Active"><i class="icon wb-check" aria-hidden="true"></i></span>
			                  								<?php else : ?>
																<span class="badge badge-danger" data-toggle="tooltip" data-placement="top" title="Deactive"><i class="icon wb-close" aria-hidden="true"></i></span>
			                  								<?php endif; ?>
			                  							</td>
														
			                  							<td>
			                  								<button type="button" class="btn btn-round btn-warning btn-sm" onclick="window.location.href = '<?=base_url('Admin/edit_article/'.$val_item['id']);?>';" data-toggle="tooltip" data-placement="top" title="Edit"><i class="icon wb-pencil" aria-hidden="true"></i></button>
			                  								<button type="button" class="btn btn-round btn-danger btn-sm" onclick="delServ(<?=$val_item['id'];?>, <?=$val_item['is_active'];?>)" data-toggle="tooltip" data-placement="top" title="Setting"><i class="fa fa-cog" aria-hidden="true"></i></button>
			                  							</td> 
			                  						</tr>
			                  						<?php
			                  							$i++;
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
	<div class="modal fade bs-example-modal-sm" id="modaldelete" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel2">Change</h4>
				</div>
				<div class="modal-body">
					<h4>คุณต้องการเปลี่ยนสถานะ ใช่หรือไม่? หากแน่ใจกด 'Confirm'</h4>
					<h6>รายการนี้จะไม่แสดงผลในหน้าเว็บ สามารถเปลี่ยนสถานะได้ทุกเมื่อ</h6>
				</div>
				<div class="modal-footer">
					<input type="hidden" id="serv_id" name="serv_id">
					<input type="hidden" id="serv_st" name="serv_st">
					<button type="button" class="btn btn-success" onclick="changeStatus()"><i class="fa fa-check"></i> Confirm</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /modals -->

	<!-- modal change reccommed -->
	<div class="modal fade bs-example-modal-sm" id="modalIsRecommed" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel2">Change</h4>
				</div>
				<div class="modal-body">
					<h4>คุณต้องการเปลี่ยนสถานะ ใช่หรือไม่ ?</h4>
					<h6>สามารถเปลี่ยนแปลงได้ทุกเมื่อ</h6>
				</div>
				<div class="modal-footer">
					<input type="hidden" id="p_id" name="p_id">
                    <input type="hidden" id="p_st" name="p_st">
					<button type="button" class="btn btn-success" onclick="changeIsRecommend()"><i class="fa fa-check"></i> Confirm</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<!-- modal change is new -->
	<div class="modal fade bs-example-modal-sm" id="modalIsNew" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel2">Change</h4>
				</div>
				<div class="modal-body">
					<h4>คุณต้องการเปลี่ยนสถานะ ใช่หรือไม่ ?</h4>
					<h6>สามารถเปลี่ยนแปลงได้ทุกเมื่อ</h6>
				</div>
				<div class="modal-footer">
					<input type="hidden" id="p_id" name="p_id">
                    <input type="hidden" id="p_st" name="p_st">
					<button type="button" class="btn btn-success" onclick="changeIsNewpd()"><i class="fa fa-check"></i> Confirm</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


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
		function delServ(id, status)
		{
			var st = status;
			if(st ==1){
				var state = 0;
			} else {
				var state = 1;
			}
			
			$('#serv_id').val(id);
			$('#serv_st').val(state);
			$('#modaldelete').modal('show');

		}

		function changeStatus()
		{
			$.ajax({
				type 	: 'POST',
				url 	: '<?=base_url("Admin/changeProductStatus"); ?>',
				data 	: {id:$('#serv_id').val(),st:$('#serv_st').val(), action:'changeStatus', '<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash(); ?>'},
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
		// change recommed
		function sChange(pid, state)
		{
			$('#p_id').val(pid);
            $('#p_st').val(state);
			$('#modalIsRecommed').modal('show');
		}
		function changeIsRecommend() {
            $.ajax({
				type 	: 'POST',
				url 	: '<?=base_url("Admin/change_isrecommend"); ?>',
				data 	: {id:$('#p_id').val(),st:$('#p_st').val(), action:'change', '<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash(); ?>'},
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

		function newChange(pid, state){
			$('#p_id').val(pid);
            $('#p_st').val(state);
			$('#modalIsNew').modal('show');
		}

		function changeIsNewpd(){
			$.ajax({
				type 	: 'POST',
				url 	: '<?=base_url("Admin/change_isnewpd"); ?>',
				data 	: {id:$('#p_id').val(),st:$('#p_st').val(), action:'change', '<?=$this->security->get_csrf_token_name(); ?>':'<?=$this->security->get_csrf_hash(); ?>'},
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
