<div class="navbar-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <nav class="navbar navbar-expand-lg">
          <a class="navbar-brand" href="#">
            <img src="<?=base_url('assets/images/logo/logobig.png');?>" alt="Logo">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarEight" aria-controls="navbarEight" aria-expanded="false" aria-label="Toggle navigation">
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
            <span class="toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse sub-menu-bar" id="navbarEight">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item <?=($this->uri->segment(1)=='home') ? 'active' : ''; ?>">
                <a class="page-scroll" href="<?=base_url('home');?>" style="color: black;">หน้าแรก</a>
              </li>
              <li class="nav-item <?=($this->uri->segment(1)=='about') ? 'active' : ''; ?>">
                <a class="page-scroll" href="<?=base_url('about');?>" style="color: black;">เกี่ยวกับเรา</a>
              </li>
              <li class="nav-item <?=($this->uri->segment(1)=='service') ? 'active' : ''; ?>">
                <a class="page-scroll" href="<?=base_url('service');?>" style="color: black;">บริการของเรา</a>
              </li>
              <li class="nav-item dropdown text-dark <?=($this->uri->segment(1)=='portfolio' || $this->uri->segment(1)=='portfolio-detail') ? 'active' : ''; ?>">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">โครงการ/ผลงาน</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <?php foreach($categories as $cate_val) : ?>
                    <a class="dropdown-item page-scroll text-dark" href="<?=base_url('portfolio/'.$cate_val['id'].'/?slug='.$cate_val['name']);?>"><?=$cate_val['name'];?></a>
                  <?php endforeach; ?>
                  <div class="dropdown-divider"></div>
                </div>
              </li>
            </ul>
          </div>
          <!-- <div class="navbar-btn d-none mt-15 d-lg-inline-block">
            <a class="menu-bar" href="#side-menu-right"><i class="lni-menu"></i></a>
          </div> -->
        </nav> <!-- navbar -->
      </div>
    </div> <!-- row -->
  </div> <!-- container -->
</div> 
<!-- navbar area -->


