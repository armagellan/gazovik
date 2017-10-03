<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */
?>
<?php
/*
 * `.fw-iconbox` supports 3 styles:
 * `fw-iconbox-1`, `fw-iconbox-2` and `fw-iconbox-3`
 */
$icon_custom = ( isset( $atts['icon_custom'] ) && $atts['icon_custom'] ) ? ' ' . $atts['icon_custom'] . '' : '';
$link = ( isset( $atts['link'] ) && $atts['link'] ) ? ' ' . $atts['link'] . '' : '';
?>
<div class="fw-iconbox clearfix <?php echo esc_attr($atts['style']); ?>">
	<div class="fw-iconbox-image">
		<?php if ($atts['link']) { ?><a href="<?php echo esc_attr($atts['link']); ?>"><?php } ?><i class="<?php echo esc_attr($atts['icon']); echo ' '. esc_attr($atts['icon_custom']); ?>"></i><?php if ($atts['link']) { echo "</a>"; } ?>
	</div>
	<div class="fw-iconbox-aside">
			<h5><?php if ($atts['link']) { ?><a href="<?php echo esc_attr($atts['link']); ?>"><?php } ?><?php echo $atts['title']; ?><?php if ($atts['link']) { echo "</a>"; } ?></h5>
		<div class="fw-iconbox-text">
			<p><?php echo $atts['content']; ?></p>
		</div>
	</div>
</div>