<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
} ?>
<div class="cta-block">
	<div class="top">
		<div class="fw-action-content">
		<?php if (!empty($atts['title'])): ?>
		<h4><?php echo $atts['title']; ?></h4>
		<?php endif; ?>
	</div>
	<div class="action-btn">
		<a href="<?php echo esc_attr($atts['button_link']); ?>" class="btn btn-default" target="<?php echo esc_attr($atts['button_target']); ?>">
			<span><?php echo $atts['button_label']; ?></span>
		</a>
	</div>
	<div class="msg"><?php echo $atts['message']; ?></div>
</div>