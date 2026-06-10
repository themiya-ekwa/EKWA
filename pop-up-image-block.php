<?php 
$align = $block['align'] ?? '';
$block_id = $block['id'];

if (!empty($block['anchor'])) {
    $block_id = $block['anchor'];
}

$className = 'webp-img';

if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}

if (!empty($align)) {
    $className .= ' ' . $align;
}

$fall_back_image = get_field('fall_back_image');
$fancy_image = get_field('fancy_image');
$above_the_fold = get_field('above_the_fold');

// If no fancy image is selected, use fallback image for Fancybox
$fancybox_image = !empty($fancy_image['url']) ? $fancy_image : $fall_back_image;
?>

<?php if (!empty($fall_back_image['url'])): ?>
    <div id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($className); ?>">

        <a class="gallery-item"
           data-fancybox="gallery" 
           href="<?php echo esc_url($fancybox_image['url']); ?>">

            <img 
                width="<?php echo esc_attr($fall_back_image['width']); ?>" 
                height="<?php echo esc_attr($fall_back_image['height']); ?>" 
                src="<?php echo esc_url($fall_back_image['url']); ?>" 
                alt="<?php echo esc_attr($fall_back_image['alt'] ?? ''); ?>" 
                decoding="async"
                <?php if ($above_the_fold): ?>
                    loading="eager"
                    fetchpriority="high"
                <?php else: ?>
                    loading="lazy"
                    class="lazyload"
                <?php endif; ?>>

        </a>

    </div>
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
