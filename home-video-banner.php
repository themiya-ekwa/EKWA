<style>
   

    .mobile-banner{
        position: relative;
        line-height: 0;
        background: var(--color_two);
    display: block;
    margin-top: 75px;
    }
    .mobile-banner .btn{
        color:#fff !important;
        border:1px solid #fff !important;
        font-weight: 700 !important;
           background:var(--color_two) !important; 
    }
    .mobile-banner .btn:hover{
         color:#fff !important;
      background:transparent !important; 
    }
    .mobile-banner::before {
    content: "";
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 2;
    background: #000000;
    opacity: 0.3;
}
 
    .caption-wrapper{
        position: absolute;
        width: 100%;
        text-align: center;
        z-index:99;
        top: 65%;
    transform: translateY(-50%);
    }
 
    .caption-wrapper p {
    line-height: 36px;
    margin-bottom: 5px;
    color:#fff;
    margin-bottom: 20px;
    text-transform:uppercase;
    }
    .caption-wrapper h2{
color: #fff !important;
    font-weight: 400 !important;
    line-height: 1.5;
    max-width: 350px;
    margin-left: auto;
    margin-right: auto;
    }
     .caption-wrapper h2 span{
      display:block;
      font-style:italic;
          font-weight: 700;
    font-size: 20px;
        text-shadow: 1px 2px #000000;
     }
    .mobile-banner img{
       width: 100%;
       height: auto;
       display:block;
    }
    .mobile-banner .banner-caption-heading{
font-size:25px !important;
    margin-top: 0;
        text-shadow: 1px 2px #000000;
   font-weight: 700 !important;
  }
  .mobile-banner .banner-caption-sub-heading{
    font-size:16px !important;
  }
</style>



<div class="mobile-banner">
    <div class="mobile-banner-wrapper">
       <div class="caption-wrapper">
       <h2 class="fadeIn banner-caption-heading"><?php echo get_field('mobile_caption_one'); ?></h2>
     
       <div class="btn-wrapper">
         <a class="btn"
      <?php if (isset($_COOKIE['adward_number']) || isset($_GET['ads'])): ?>
        href="tel:<?php echo mobile_number(get_theme_mod('adsense_number')); ?>"
      <?php else: ?>
        href="tel:<?php echo mobile_number(get_theme_mod('call_tracking_number')); ?>"
      <?php endif; ?>
    >
      Call Us Today:
      <?php if (isset($_COOKIE['adward_number']) || isset($_GET['ads'])): ?>
        <?php echo get_theme_mod('adsense_number'); ?>
      <?php else: ?>
        <?php echo get_theme_mod('call_tracking_number'); ?>
      <?php endif; ?>
    </a>
        </div>
       </div>
    </div>  
    <picture>
        <source srcset="<?php echo get_field('mobile_banner_webp_large'); ?>" type="image/webp">

        <?php
     $mobile_banner = get_field('mobile_banner_fallback');
    ?>
        <img width="<?php echo $mobile_banner['width'];?>" height="<?php echo $mobile_banner['height'];?>" 
        src="<?php echo $mobile_banner['url'];?>" alt="<?php echo $mobile_banner['alt'];?>"  fetchpriority="high">



    </picture>
</div>
