
<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided" data-toggle="menubar">
			<span class="sr-only">Toggle navigation</span>
			<span class="hamburger-bar"></span>
		</button>
		<button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse" data-toggle="collapse">
			<i class="icon wb-more-horizontal" aria-hidden="true"></i>
		</button>
		<div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
			<span class="navbar-brand-text hidden-xs-down"> Big Inspector
		</div>
	</div>
	<div class="navbar-container container-fluid">
		<!-- Navbar Collapse -->
		<div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
			<!-- Navbar Toolbar -->
			<ul class="nav navbar-toolbar">
				<li class="nav-item hidden-float" id="toggleMenubar">
					<a class="nav-link" data-toggle="menubar" href="#" role="button">
						<i class="icon hamburger hamburger-arrow-left">
							<span class="sr-only">Toggle menubar</span>
							<span class="hamburger-bar"></span>
						</i>
					</a>
				</li>
				<li class="nav-item hidden-sm-down" id="toggleFullscreen">
					<a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
						<span class="sr-only">Toggle fullscreen</span>
					</a>
				</li>		
			</ul>
			<!-- End Navbar Toolbar -->

			<!-- Navbar Toolbar Right -->
			<ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
				<li class="nav-item dropdown">
					<a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
						<span class="avatar avatar-online">
						
							<img src="<?=base_url('./assets/admin/assets/images/user.jpg');?>" alt="...">
							<i></i>
						</span>
					</a>
					<div class="dropdown-menu" role="menu">
						<a class="dropdown-item" href="<?=base_url('Login/logout');?>" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
					</div>
				</li>		
			</ul>
			<!-- End Navbar Toolbar Right -->
		</div>
		<!-- End Navbar Collapse -->
	</div>
</nav>

<div class="site-menubar">
	<div class="site-menubar-body">
		<div>
			<div>
				<ul class="site-menu" data-plugin="menu">
					<li class="site-menu-item <?=($this->uri->segment(2)=='home') ? 'active' : ''; ?>">
						<a class="animsition-link" href="<?=base_url('Admin/home');?>">
							<i class="site-menu-icon icon fa fa-home" aria-hidden="true"></i>
							<span class="site-menu-title">หน้าแรก</span>
						</a>
					</li>
					
					<li class="site-menu-item <?=($this->uri->segment(2)=='banner' || $this->uri->segment(2)=='edit_banner') ? 'active' : ''; ?>">
						<a class="animsition-link" href="<?=base_url('Admin/banner');?>">
						<i class="fa fa-picture-o" aria-hidden="true"></i>
							<span class="site-menu-title">แบนเนอร์</span>
						</a>
					</li>
					<li class="site-menu-item <?=($this->uri->segment(2)=='categories' || $this->uri->segment(2)=='form_category' || $this->uri->segment(2)=='edit_category') ? 'active' : ''; ?>">
						<a class="animsition-link" href="<?=base_url('Admin/categories');?>">
						
						<i class="fa fa-list-alt" aria-hidden="true"></i>
							<span class="site-menu-title">หมวดหมู่</span>
						</a>
					</li>
					<li class="site-menu-item ">
						<a class="animsition-link" href="<?=base_url('Admin/banner');?>">
						<i class="fa fa-briefcase" aria-hidden="true"></i>
							<span class="site-menu-title">ผลงาน</span>
						</a>
					</li>
					
					<li class="site-menu-item ">
						<a class="animsition-link" href="<?=base_url('Admin/banner');?>">
						<i class="fa fa-calculator" aria-hidden="true"></i>
							<span class="site-menu-title">คำนวณพื้นที่</span>
						</a>
					</li>

					<li class="site-menu-item ">
						<a class="animsition-link" href="<?=base_url('Admin/article');?>">
						<i class="fa fa-newspaper-o" aria-hidden="true"></i>
							<span class="site-menu-title">Article</span>
						</a>
					</li>
					<li class="site-menu-item ">
						<a class="animsition-link" href="<?=base_url('Admin/gallery');?>">
						<i class="fa fa-picture-o" aria-hidden="true"></i>
							<span class="site-menu-title">Gallery</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="site-menubar-footer">
		<a href="<?=base_url('Login/logout');?>" data-placement="top" data-toggle="tooltip" data-original-title="Logout">
			<span class="icon wb-power" aria-hidden="true"></span>
		</a>
	</div>
</div>