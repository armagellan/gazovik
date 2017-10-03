<?php if (!defined('FW')) die('Forbidden');

$class = fw_ext_builder_get_item_width('page-builder', $atts['width'] . '/frontend_class');
$custom_class = ( isset( $atts['custom_class'] ) && $atts['custom_class'] ) ? ' ' . $atts['custom_class'] . '' : '';
$datas = ( isset( $atts['datas'] ) && $atts['datas'] ) ? ' ' . $atts['datas'] . '' : '';
?>
<div class="<?php echo esc_attr($class); ?><?php echo $custom_class; ?>" <?php echo $datas; ?>>
	<?php echo do_shortcode($content); ?>
</div>
