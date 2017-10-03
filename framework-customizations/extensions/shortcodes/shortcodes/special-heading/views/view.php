<?php if (!defined('FW')) die( 'Forbidden' );
/**
 * @var $atts
 */
?>
<div class="fw-heading fw-heading-<?php echo esc_attr($atts['heading']); ?> <?php echo !empty($atts['centered']) ? 'fw-heading-center' : ''; ?>">
	<?php $heading = "<{$atts['heading']} class='title'>{$atts['title']}</{$atts['heading']}>"; ?>
	<?php echo $heading; ?>
	<?php if (!empty($atts['subtitle'])): ?>
		<div class="subtitle"><?php echo $atts['subtitle']; ?></div>
	<?php endif; ?>
</div>