<section class="inner-page-banner">

    <div class="container inner-banner-container">
         <?php

        inner_page_heading(get_the_ID());
         ?>
        <div class="inner-page-breadcrumbs">
        <?php
           if ( function_exists('yoast_breadcrumb') ) 
           {yoast_breadcrumb('<span id="breadcrumbs">','</span>');}
        ?>
        </div>
        
    </div>
</section>

<?php
$padding = '180';
if(get_field('padding')){
    $padding = get_field('padding');
}
$opacity = '5';
if(get_field('opacity')){
    $opacity = get_field('opacity');
}
$heading_color = '#fff';
if(get_field('heading_color')){
    $heading_color = get_field('heading_color');
}
$breadcrumbs = '#fff';
if(get_field('breadcrumb_color')){
    $breadcrumbs = get_field('breadcrumb_color');
}
?>

<style>
    .inner-page-banner{
        text-align: center;
        position: relative;
        z-index: 10;
            min-height: 160px;
    display: flex;
        align-items: center;
    }
    .inner-page-banner::after{
        position: absolute;
    left: 0;
    right: 0;
    content: '';
    background: linear-gradient(90deg, #0b395d 0%, #0d5071 25%, #116c89 50%, #1388a2 75%, #16a1b6 100%);

    top: 0;
    bottom: 0;
    height: 100%;
    width: 100%; 
    opacity: 0.9;
    }
 
    .inner-page-banner.text_banner{
        padding-top: <?php echo $padding;?>px;
        padding-bottom: <?php echo $padding;?>px;
    }
    .inner-caption-heading,  .inner-banner-container h1{
        font-size: 32px;
        font-weight:400 !important;
            margin-bottom: 0;
            margin-top:0;
            
    }
    .inner-page-banner.img_banner  .inner-banner-container{
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        margin-left: auto;
        margin-right: auto; 
        left: 0;
        right: 0;
        z-index: 200;
    }
   
    .inner-banner-container{
        position: relative;
        z-index: 200;
        color: <?php echo $heading_color;?>
    }
    .inner-banner-container h1{
        color: <?php echo $heading_color;?>
    }
 #breadcrumbs, #breadcrumbs a{
    font-size: 15px;
    color:  <?php echo $breadcrumbs;?>
 }
 <?php 
    if(get_field('custom_css')):
        echo get_field('custom_css');
    endif;
    ?>
  
@media screen and (max-width: 1032px) {
    .inner-page-banner{
        margin-top:80px;
    }
    .inner-caption-heading,  .inner-banner-container h1 {
    font-size: 30px;
    max-width: 500px;
    display: block;
    margin: auto;
    padding-bottom: 10px;
}
}

@media screen and (max-width: 600px) {
   .inner-caption-heading,  .inner-banner-container h1{
        font-size: 20px !important; 
    } 
    #breadcrumbs, #breadcrumbs a{
            font-size: 14px;
    }
    .inner-page-banner{
        min-height: 100px;
    }
    .inner-caption-heading, .inner-banner-container h1{
                padding-bottom: 0px;
    }
}
</style>

<?php
    $thumb_id = get_post_thumbnail_id();
    $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'medium', true);
    $thumb_url = $thumb_url_array[0];
?>
