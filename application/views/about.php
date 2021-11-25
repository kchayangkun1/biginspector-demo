<style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>


<section style="padding-top: 0px;padding-bottom: 0px;">
    <div class="container-fluid" style="padding-left: 0px;padding-right: 0px;" >
        <div data-aos="fade-up"data-aos-duration="1000">
            <a href="#" target="_blank">
                <img src="<?=base_url('assets/img/banner/1.png');?>" class="img-rounded" id="accounting2" style="width: 100%;">
            </a>
        </div>
    </div>   
</section> 

<section>
    <div class="container" style="text-align: center;">
        <div data-aos="fade-up"data-aos-duration="1000">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-5 mb-5">
            <h1 id="product" style="margin-top: 0px;">WHY 32 INTERIOR</h1>
            </div>
        </div>
        <div data-aos="fade-up"data-aos-duration="1000">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-5 mb-5">
            <h4 style="font-weight: revert;">พวกเรา 32interior มีความเชียวชาญในงสนออกแบบตกแต่งภายในด้วยทีมงานมืออาชีพ <br> ทั้งทีมออกแบบ ทัมช่างรวมถึงผู้ควบคุมงานที่มีแระสบการณ์เป็นอย่างดี</h4>
            <h4 class="mt-3" style="font-weight: revert;">เรามีความตั้งใจออกแบบ เนรมิต บ้าน/คอนโด ของท่านให้เป็นไปในแบบที่ท่านต้องการ <br> ด้วยรูปแบบงานที่มีความน่าสนใจเหมาะสมกับงบประมาณที่วางไว้ ภายใต้ระบะเวลาที่ท่านกำหนดไว้</h4>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="slideshow-container">
            <div class="mySlides fade">
                <div class="numbertext">1 / 4</div>
                <img src="<?=base_url('assets/img/about/1.png');?>" style="width:100%">
            </div>
            <div class="mySlides fade">
                <div class="numbertext">2 / 4</div>
                <img src="<?=base_url('assets/img/about/name2.png');?>" style="width:100%">  
            </div>
            <div class="mySlides fade">
                <div class="numbertext">3 / 4</div>
                <img src="<?=base_url('assets/img/about/name3.png');?>" style="width:100%">
            </div>
            <div class="mySlides fade">
                <div class="numbertext">4 / 4</div>
                <img src="<?=base_url('assets/img/about/name4.png');?>" style="width:100%">
            </div>
        </div>
        <br>
            <div style="text-align:center">
                <span class="dot"></span> 
                <span class="dot"></span> 
                <span class="dot"></span> 
                <span class="dot"></span> 
            </div>
    </div>
</section>
<!--  -->
<!-- <section>
    <div class="container">
        <div class="row">
            <div data-aos="fade-up"data-aos-duration="1000">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                    <h1 id="product" style="margin-top: 0px;">Professional Interior Designer</h1>
                        <h4 style="font-weight: revert;">ทีมดีไซน์เนอร์ มัณฑนากรที่มีประสบการณ์การตกแต่งอันหลากหลาย พร้อมแปลงไอเดียของคุณให้เป็นจริงตามพื้นที่และงบประมาณที่คุณต้องการ</h4>
                </div> 
                
        </div>
    </div>
</section> -->
<section>
    <div class="container">
        <div class="row mb-5" data-aos="fade-up"data-aos-duration="1000">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-5 pt-5">
                <h1 id="product" style="margin-top: 0px;"><b>Professional Interior Designer</b></h1>
                <h4 id="gallery-product" style="margin-top: 0px; text-align: center; color: black;">ทีมดีไซน์เนอร์ มัณฑนากรที่มีประสบการณ์การตกแต่งอันหลากหลาย พร้อมแปลงไอเดียของคุณให้เป็นจริงตามพื้นที่และงบประมาณที่คุณต้องการ</h4>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <img src="<?=base_url('assets/img/about/222.PNG');?>" class="img-rounded" id="accounting2" style="width: 100%;">
            </div>
        </div>

        <div class="row" data-aos="fade-up"data-aos-duration="1000">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                <img src="<?=base_url('assets/img/about/3.PNG');?>" class="img-rounded" id="accounting2" style="width: 100%;">
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-5 pt-5">
                <h1 id="product" style="margin-top: 0px;"><b>Premium Material</b></h1>
                <h4 id="gallery-product" style="margin-top: 0px; text-align: center; color: black;">เลือกใช้วัสดุโครงไม้จริงที่มีการเคลือบน้ำยากันปลวกปิดทับด้วยไม้อัดคุณภาพสูง เกรด AAA สำหรับงานเฟอร์นิเจอร์โดยตรงเพื่อความมั่นใจในความแข็งแรง อายุการใช้งานยาวนาน</h4>
            </div>
        </div>

        <div class="row mb-5" data-aos="fade-up"data-aos-duration="1000">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-5 pt-5">
                <h1 id="product" style="margin-top: 0px;"><b>Best Quality Equipment</b></h1>
                <h4 id="gallery-product" style="margin-top: 0px; text-align: center; color: black;">เลือกใช้ HAFELE เป็นอุปกรณ์ fittingมาตราฐานสากลจากเยอรมันบานพับและรางลิ้นชักเป็นระบบปิดแบบนุ่มนวล (Soft Close) ทุกชิ้น</h4>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <img src="<?=base_url('assets/img/about/222.PNG');?>" class="img-rounded" id="accounting2" style="width: 100%;">
            </div>
        </div>

        <div class="row" data-aos="fade-up"data-aos-duration="1000">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                <img src="<?=base_url('assets/img/about/3.PNG');?>" class="img-rounded" id="accounting2" style="width: 100%;">
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-5 pt-5">
                <h1 id="product" style="margin-top: 0px;"><b>Top Brand Laminate</b></h1>
                <h4 id="gallery-product" style="margin-top: 0px; text-align: center; color: black;">ใช้วัสดุปิดผิวลามิเนตคุณภาพสูง เกรด Hi-endระดับ Top Brand เช่น Lamitak, EDL, Wilsonart, Formica, AICA, Melatone, Virgo, Greenlam และอีกมายมาย มีคุณสมบัติป้องกันรอยขีดข่วนและมีความสวยงามคัดมาโดยตรงสำหรับงานตกแต่งภายในโดยเฉพาะ</h4>
            </div>
        </div>
    </div><!-- end container -->
</section>

<section style="padding-top: 0px;padding-bottom: 0px;">
    <div class="container mt-3 mb-3" style="background-color: #dad0c6;border-bottom-right-radius: 18rem;">
        <div class="row" data-aos="fade-up"data-aos-duration="1000">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                <img src="<?=base_url('assets/img/about/Capturex.PNG');?>" class="img-rounded" id="accounting2" style="width: 100%;">
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-5 pt-5">
                <h1 id="product" style="margin-top: 0px;"><b>Protect & Cleaning</b></h1>
                <h4 id="gallery-product" style="margin-top: 0px; text-align: center; color: black;">ปกป้องและป้องกันพื้นห้องของท่านด้วยการปูกระดาษลูกฟูกก่อนเข้าทำงานทุกครั้ง และมีการทำความสะอาดห้องให้ท่านก่อนทำการส่งมอบงานเสมอ</h4>
            </div>
        </div>
    </div>
</section>
<section style="padding-top: 0px;padding-bottom: 0px;">
    <div class="container mt-5  mb-3" style="background-color: #dad0c6;border-top-left-radius: 18rem;">
        <div class="row" data-aos="fade-up"data-aos-duration="1000">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-5 pt-5 ">
            <h1 id="product" style="margin-top: 0px;"><b>100% Work Completion</b></h1>
                <h4 id="gallery-product" style="margin-top: 0px; text-align: center; color: black;">32Interior ไม่เคยมีประวัติการทิ้งงานอัตราการส่งมอบงาน 100% ไม่มีการทิ้งงานกลางคัน เพราะเราตั้งใจอย่างสุดความสามารถเพื่อส่งมอบงานคุณภาพและสวยงามตรงใจกับลูกค้าทุกท่าน</h4>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <img src="<?=base_url('assets/img/about/Capturex.PNG');?>" class="img-rounded" id="accounting2" style="width: 100%;">
            </div>
        </div>
    </div>
</section>
<section style="padding-top: 0px;padding-bottom: 0px;">
    <div class="container mt-5 mb-3" style="background-color: #dad0c6;border-bottom-right-radius: 18rem;">
        <div class="row" data-aos="fade-up"data-aos-duration="1000">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 ">
                <img src="<?=base_url('assets/img/about/Capturex.PNG');?>" class="img-rounded" id="accounting2" style="width: 100%;">
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-5 pt-5">
                <h1 id="product" style="margin-top: 0px;"><b>Best technicial</b></h1>
                <h4 id="gallery-product" style="margin-top: 0px; text-align: center; color: black;">มีทีมช่างที่มีประสบการณ์กว่า 20 ปี และผู้ควบคุมงานให้งานเป็นไปตามแบบและสเปคที่ถูกต้อง</h4>
            </div>
        </div>
    </div>
</section>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>