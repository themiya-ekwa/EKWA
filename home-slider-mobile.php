<?php

$slides = get_field('slides');


if (
    !is_array($slides) ||
    empty($slides) ||
    empty($slides[0]['slider_image']) ||
    !is_array($slides[0]['slider_image'])
) {
  
    $slide_image  = '';
    $image_width  = 1;
    $image_height = 1;
    $padding      = 100;


    $slide = [
        'caption_one_size' => 16,
        'align' => 'center'
    ];
} else {
 
    $slide        = $slides[0];
    $slider_image = $slide['slider_image'];

    $slide_image  = !empty($slider_image['url'])   ? $slider_image['url']   : '';
    $image_width  = !empty($slider_image['width']) ? $slider_image['width'] : 1;
    $image_height = !empty($slider_image['height'])? $slider_image['height']: 1;

    // Safe aspect ratio calculation
    $padding = ($image_height / $image_width) * 100;
    $padding = (int)$padding;
}
?>
<style>
.mobile-banner{
    position: relative;
    line-height: 0;
    background: var(--color_two);
    display: block;
    margin-top: 75px;
}
.mobile-banner .btn{
    background:transparent;
    color:#fff;
    border:2px solid #fff !important;
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
    top: 70%;
    transform: translateY(-50%);
        padding: 0 15px;
}
.caption-wrapper .sub-heading{
    margin:0;
    padding-bottom:15px;
}
.caption{
    font-size: <?php echo get_field('caption_size');?>px;
}
.caption p {
    line-height: 36px;
    margin-bottom: 20px;
    color:#fff;
    text-transform:uppercase;
        font-size: 15px;
    line-height: 1.2;
}
.caption h2{
    color: #fff;
    font-size:22px !important;
    text-transform: uppercase;
    font-weight: 700;
    line-height: 1.3;
    max-width: 300px;
    margin: auto;
    padding-bottom: 20px;
}

.mobile-banner img{
    width: 100%;
    height: auto;
    display:block;
}

@media screen and (min-width: 540px){
    .mobile-banner picture{
        display: none;
    }
    .mobile-banner{
        margin-top: 0px;
        padding-top: <?php echo $padding; ?>%;
        background: url(<?php echo $slide_image;?>) top center no-repeat;
        background-size: cover;
    }
    .caption{
        margin-bottom: 25px;
        font-size: <?php echo $slide['caption_one_size'];?>px;
    }
    .caption-wrapper{
        bottom: auto;
        padding-left: 40px;
        padding-right: 40px;
        top: 60%;
        transform: translateY(-50%);
        text-align: <?php echo $slide['align'];?>;
    }
    .caption p{
        font-size:20px;
    }
    .caption h2{
        font-size:30px;
    }
}

<?php 
if(get_field('custom_css')):
    echo get_field('custom_css');
endif;
?>
</style>

<div class="mobile-banner">
    <picture>
        <source srcset="<?php echo get_field('mobile_banner_webp');?> 1x, <?php echo get_field('mobile_banner_webp_large');?> 2x" type="image/webp">

        <?php $mobile_banner = get_field('mobile_banner_jpg'); ?>

        <img 
            width="<?php echo !empty($mobile_banner['width']) ? $mobile_banner['width'] : 500; ?>"
            height="<?php echo !empty($mobile_banner['height']) ? $mobile_banner['height'] : 300; ?>"
            src="<?php echo !empty($mobile_banner['url']) ? $mobile_banner['url'] : ''; ?>"
            alt="<?php echo !empty($mobile_banner['alt']) ? $mobile_banner['alt'] : 'Banner'; ?>"
        >
    </picture>

    <div class="caption-wrapper">
        <div class="caption"><?php echo get_field('caption_text');?></div>

        <a class="btn"
            <?php if( isset($_COOKIE['adward_number']) || isset($_GET['ads']) ): ?>
                href="tel:<?php echo mobile_number(get_theme_mod('adsense_number'));?>"
            <?php else: ?>
                href="tel:<?php echo mobile_number(get_theme_mod('call_tracking_number'));?>"
            <?php endif; ?>
        >
            Call Us Today :
            <?php if( isset($_COOKIE['adward_number']) || isset($_GET['ads']) ): ?>
                <?php echo get_theme_mod('adsense_number');?>
            <?php else: ?>
                <?php echo get_theme_mod('call_tracking_number');?>
            <?php endif;?>
        </a>
    </div>
</div>
