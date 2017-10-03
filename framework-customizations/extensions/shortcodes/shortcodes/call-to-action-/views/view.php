<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
} ?>
<div class="item">
		<?php if (!empty($atts['title'])): ?>
		<h4><span><?php echo $atts['title']; ?></span></h4>
		<?php endif; ?>
		<p><?php echo $atts['message']; ?></p>
</div>