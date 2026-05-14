<?php 
$align = $block['align'];
$block_id = $block['id'];
if( !empty($block['anchor']) ) {
   $block_id = $block['anchor'];
}
$className = 'webp-img';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Get image fields
$link = get_field('link');
$webp_image_mobile = get_field('webp_image_mobile'); // add this in ACF
$webp_image_desktop = get_field('webp_image'); // existing field
$fall_back_image = get_field('fall_back_image');
?>

<?php if($link): ?>
<a <?php if($link['target'] == '_blank'): ?> target="_blank" rel="noreferrer nofollow" <?php endif; ?> href="<?php echo esc_url($link['url']); ?>">
<?php endif; ?>

<picture id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($className); ?> <?php if($align){echo esc_attr($align);} ?>">
    
    <?php if ($webp_image_mobile): ?>
    <source 
        srcset="<?php echo esc_url($webp_image_mobile); ?> 1x, <?php echo esc_url($webp_image_mobile); ?> 2x" 
        media="(max-width: 767px)" 
        type="image/webp">
    <?php endif; ?>

    <?php if ($webp_image_desktop): ?>
    <source 
        srcset="<?php echo esc_url($webp_image_desktop); ?> 1x, <?php echo esc_url($webp_image_desktop); ?> 2x" 
        media="(min-width: 768px)" 
        type="image/webp">
    <?php endif; ?>

    <img 
        width="<?php echo esc_attr($fall_back_image['width']); ?>" 
        height="<?php echo esc_attr($fall_back_image['height']); ?>" 
        src="<?php echo esc_url($fall_back_image['url']); ?>" 
        alt="<?php echo esc_attr($fall_back_image['alt']); ?>" 
    
        decoding="async" loading="eager"   fetchpriority="high">
</picture>

<?php if($link): ?>
</a>
<?php endif; ?>

<style>
.webp-img {
    display: block;
}
.webp-img img {
    vertical-align: bottom;
    width: 100%;
    height: auto;
        display: block;
}
#<?php echo esc_attr($block_id); ?>.left {
    text-align: left;
}
#<?php echo esc_attr($block_id); ?>.right {
    text-align: right;
}
#<?php echo esc_attr($block_id); ?>.center {
    text-align: center;
}
</style>
