<div id="footer1" class="footer" style="background-color:#ffffff;box-shadow: 0px 2px 15px rgb(0 0 0 / 10%);">
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <div class="me-auto p-2 bd-highlight">
            <img src="<?=base_url('assets/img/logo/logo1.png');?>" id="footer-lpgo" class="img-fluid "> 
            </div>
            <div class="p-2 bd-highlight">
            <div align="center">
            <h5 id="footer11" style=" color: #be1e2c;" class="mt-5 ">Follow Me</h5>
            </div>
            <ul style="padding-left: 0px;">
                <div class="d-flex justify-content-between">
                    <a href="https://www.facebook.com/ptlightingphuketthailand/" target="_blank">
                        <img class="ml-2" id="footer-contact" src="<?=base_url('assets/img/contact/iconpt-03.png');?>"  >
                    </a>
                    <a href="#" target="_blank">
                        <img  class="ml-2" id="footer-contact" src="<?=base_url('assets/img/contact/iconpt-line.png');?>" >
                    </a>
                    <a href="https://www.instagram.com/ptlighting.info/" target="_blank">    
                        <img class="ml-2" id="footer-contact" src="<?=base_url('assets/img/contact/iconpt-05.png');?>" >
                    </a>
                    <a href="#" target="_blank">
                        <img  class="ml-2" id="footer-contact" src="<?=base_url('assets/img/contact/iconpt-yputube.png');?>" >
                    </a> 
                </div>
                </ul>
           
        </div>
    </div> 
    <div class="d-flex justify-content-center">
    <div class="row" style="background-color: #ffffff;">
    <p class="copyright" id="Copyright" Style="text-align: center;  color: #be1e2c">Copyright © 2021 32 Docor All rights reserved.</p>
    </div>
</div>

    </div>

    
  <!-- Vendor JS Files -->
  <script src="<?=base_url('assets/vendor/bootstrap-4.6.0-dist/bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js.map');?>"></script>
  <script src="<?=base_url('assets/vendor/glightbox/js/glightbox.min.js');?>"></script>
  <script src="<?=base_url('assets/vendor/isotope-layout/isotope.pkgd.min.js');?>"></script>
  <script src="<?=base_url('assets/vendor/php-email-form/validate.js');?>"></script>
  <script src="<?=base_url('assets/vendor/purecounter/purecounter.js');?>"></script>
  <script src="<?=base_url('assets/vendor/swiper/swiper-bundle.min.js');?>"></script>
  <script src="<?=base_url('assets/vendor/waypoints/noframework.waypoints.js');?>"></script>

  <script src=" <?=base_url('assets/lib/aos/aos.js');?>"></script> 
  <script src=" <?=base_url('assets/lib/wow/wow.min.js');?>"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  AOS.init();
  new WOW().init();

  $('.owl-carousel').owlCarousel({
    loop:true,
    autoplay:true,
    autoplayTimeout:3000,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
/*--------------*/



</script>

</body>