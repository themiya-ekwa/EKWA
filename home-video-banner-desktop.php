<style>

    .desktop-video-slider video {
        width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;

    }
  .desktop-video-slider::before{
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(rgba(0, 0, 0, 0.8), /* top darker */ rgba(0, 0, 0, 0.1), /* middle */ rgba(0, 0, 0, 0.1) /* bottom lighter */);
    z-index: 1;
}
    .desktop-video-slider {
        position: relative; 
    }
        .desktop-video-slider::after{
            position: absolute;
            left:0;
            right: 0;
            content:'';
            background:#000;
            opacity: 0.4;
            top:0;
            bottom:0;
        }
    .slider-caption-wrapper {
position: absolute;
  left: 0;
  right: 0;
  text-align: center;
  z-index: 20;
  top: 55%;
  transform: translateY(0%);
}
.slider-caption-wrapper .btn-main{
display:flex;
justify-content: center; 
margin-top:32px;
}
.slider-caption-wrapper .btn:hover{
    background:var(--color_one) !important;
    color:#fff !important;
}
.slider-caption-wrapper .btn-wrapper{
    margin:0 10px;
}

.desktop-video-slider h2{
  color: #fff !important;
  font-family: var(--font-Tartuffo-Light);
  font-size: 70px !important;
  font-weight: 100;
}

.slider-caption-wrapper .btn{
    background:transparent !important;
    color:#fff !important;
    border:1px solid #fff !important;
}



.video-wrapper {         
  overflow: hidden;
  position: relative;
    aspect-ratio: 16 / 9; /* adjust if needed */
  background: #000;
}
  @media only screen and (max-width: 1600px) {
.slider-caption-wrapper{
        top: 55%;
}
  }
    @media only screen and (max-width: 1440px) {
.desktop-video-slider h2{
        font-size: 65px !important;
}
}

    @media only screen and (max-width: 1200px) {
.banner-caption-heading h2{
    font-size: 45px !important;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}
.banner-caption-heading {
    font-size: 46px !important;
}
    }

     @media only screen and (max-width: 1032px) {
    .desktop-video-slider {
    position: relative; 
    margin-top: 70px;
}
  .slider-caption-wrapper{
        top: 35%;
      }
        
     }

    @media only screen and (max-width: 991px) {

.banner-caption-sub-heading{
    font-size: 20px !important;
}
.slider-caption-wrapper .btn-main{
    margin-top: 50px;
}
.banner-caption-heading{
      font-size: 30px !important;
}


    }


</style> 

<div class="desktop-video-slider">

    <div class="slider-caption-wrapper">
        <div class="section-home-video-slide">
            <div class="fadeIn banner-caption-heading"><?php echo get_field('caption'); ?></div>
        </div>
      <div class="btn-main">

<div class="btn-wrapper">
 <a class="btn" <?php if( isset( $_COOKIE['adward_number'] ) || isset( $_GET['ads'] ) ):?> href="tel:<?php echo mobile_number(get_theme_mod('adsense_number'));?>" <?else:?> href="tel:<?php echo  mobile_number(get_theme_mod('call_tracking_number'));?>" <?php endif;?>>Call Us Today : <?php if( isset( $_COOKIE['adward_number'] ) || isset( $_GET['ads'] ) ):?> <?php echo get_theme_mod('adsense_number');?> <?else:?> <?php echo get_theme_mod('call_tracking_number');?> <?php endif;?></a>
  </div>
      </div>
    </div> 
<div class="video-wrapper">
<?php
$poster_webp = get_field('poster_image_webp'); // preferred
$poster_fallback = get_field('poster_image_jpg');
$poster = $poster_webp ? $poster_webp : $poster_jpg;
?>
<video
    id="heroVideo"
    name="media"
    poster="<?php echo esc_url($poster); ?>"
    muted
    autoplay
    loop
    playsinline
    preload="none"
        fetchpriority="high"
>
    <source src="<?php echo esc_url(get_field('video')); ?>" type="video/mp4">
</video>
</div>

</div>
