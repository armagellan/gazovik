<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

?>

<div class="otzivy">
	<?php if (!empty($atts['title'])): ?>
		<h3 class="title"><?php echo $atts['title']; ?></h3>
	<?php endif; ?>

	<div id="otzivy">
		<ul class="slides">
			<?php foreach ($atts['testimonials'] as $testimonial): ?>
				<li class="item clearfix">
					<?php if (!empty($testimonial['author_avatar']['url'])) { ?>
						<div class="avatar">
							<?php
							$author_image_url = !empty($testimonial['author_avatar']['url'])
												? $testimonial['author_avatar']['url']
												: fw_get_framework_directory_uri('/static/img/no-image.png');
							?>
							<img src="<?php echo esc_attr($author_image_url); ?>" alt="<?php echo esc_attr($testimonial['author_name']); ?>"/>
						</div>
					<?php } ?>
					<div class="text">
						<p><?php echo $testimonial['content']; ?></p>
						<div class="meta">
							<div class="author">
								<span class="author-name"><?php echo $testimonial['author_name']; ?></span>
								<em><?php echo $testimonial['author_job']; ?></em>
								<span class="url">
									<noindex><a rel="nofollow" href="<?php echo esc_attr($testimonial['site_url']); ?>" target="_blank"><?php echo $testimonial['site_name']; ?></a></noindex>
								</span>
							</div>
						</div>
					</div>
					<i></i>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<div class="rew-nav"></div>
</div>