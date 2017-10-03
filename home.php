<?php
/**
 * The main home template
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
	<div class="home-page-lg hidden-xs">
		<?php //echo do_shortcode('[slider slider_id="222" width="1665" height="980"][/slider]') ?>
		<?php echo do_shortcode('[rev_slider home]') ?>
	</div>
	<div class="home-page hidden-sm hidden-md hidden-lg">
		<?php //echo do_shortcode('[slider slider_id="222" height="980"][/slider]') ?>
	</div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<article id="about_us_digit" class="page type-page status-publish hentry">
				<header class="entry-header">
					<h3 class="entry-title">Чому саме ми? | Компанія в цифрах</h3>
				</header><!-- .entry-header -->
				<div class="entry-content">
					<div class="container">
						<div class="row">
							<?php $postsk = get_posts ("category=3&orderby=date&order=ASC"); ?>
							<?php if ($postsk) : ?>
								<?php foreach ($postsk as $post) : setup_postdata ($post); ?>
									<div class="col-sm-3 col-md-3 col-lg-3">
										<div class="history-<?php echo get_post_meta($post->ID, 'class', true); ?>">
											<?php the_title(); ?>
										</div><!-- .history-n -->
										<p><?php echo get_post_meta($post->ID, 'text', true); ?></p>
									</div><!-- .col-sm-3.col-md-3.col-lg-3 -->
								<?php endforeach; ?>
						    	<?php wp_reset_postdata(); ?>
							<?php endif; ?>
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- .entry-content -->
			</article><!-- #about_us_digit -->

			<article id="news-and-portfolio" class="page type-page status-publish hentry article-blue">
				<div class="entry-content">
					<div class="container">
						<div class="row">
							<div class="col-sm-4 col-md-4 col-lg-4">
								<h3>Наші новини</h3>
								<div class="entry-content">
									<?php $postsk = get_posts ("category=4&orderby=date&order=ASC&numberposts=1"); ?>
									<?php if ($postsk) : ?>
										<?php foreach ($postsk as $post) : setup_postdata ($post); ?>
											<label><?php echo get_the_date(); ?></label>
											<?php twentysixteen_post_thumbnail(); ?>
											<h4><?php the_title(); ?></h4>
											<?php the_content(); ?>
										<?php endforeach; ?>
								    	<?php wp_reset_postdata(); ?>
									<?php endif; ?>
									<a class="link-page" href="<?php echo esc_url( home_url( '/' ) ); ?>news">Переглянути всі</a>
								</div><!-- .entry-content -->
							</div><!-- .col-sm-4.col-md-4.col-lg-4 -->
							<div class="col-sm-4 col-md-4 col-lg-4">
								<h3>Остання робота</h3>
								<div class="entry-content">
									<?php $postsk = get_posts ("category=5&orderby=date&order=ASC&numberposts=1"); ?>
									<?php if ($postsk) : ?>
										<?php foreach ($postsk as $post) : setup_postdata ($post); ?>
											<label><?php echo get_the_date(); ?></label>
											<?php twentysixteen_post_thumbnail(); ?>
											<h4><?php the_title(); ?></h4>
											<?php the_content(); ?>
										<?php endforeach; ?>
								    	<?php wp_reset_postdata(); ?>
									<?php endif; ?>
									<a class="link-page" href="<?php echo esc_url( home_url( '/' ) ); ?>work">Переглянути всі</a>
								</div><!-- .entry-content -->
							</div><!-- .col-sm-4.col-md-4.col-lg-4 -->
							<div class="col-sm-4 col-md-4 col-lg-4">
								<h3>Наші клієнти</h3>
								<div class="entry-content">
									<?php $postsk = get_posts ("category=6&orderby=date&order=ASC&numberposts=1"); ?>
									<?php if ($postsk) : ?>
										<?php foreach ($postsk as $post) : setup_postdata ($post); ?>
											<label><?php echo get_the_date(); ?></label>
											<?php twentysixteen_post_thumbnail(); ?>
											<h4><?php the_title(); ?></h4>
											<?php the_content(); ?>
										<?php endforeach; ?>
								    	<?php wp_reset_postdata(); ?>
									<?php endif; ?>
									<a class="link-page" href="<?php echo esc_url( home_url( '/' ) ); ?>clients">Переглянути всі</a>
								</div><!-- .entry-content -->
							</div><!-- .col-sm-4.col-md-4.col-lg-4 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- .entry-content -->
			</article><!-- #news-and-portfolio -->

			<article id="details" class="post-87 page type-page status-publish hentry">
				<?php $details = get_post( 87, ARRAY_A ); ?>
				<header class="entry-header">
					<h3 class="entry-title"><?php echo $details['post_title']; ?></h3>
				</header><!-- .entry-header -->
				<div class="entry-content">
					<div class="container">
						<div class="row">
							<?php echo $details['post_content']; ?>
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- .entry-content -->
			</article><!-- #details -->

			<article id="price-home" class="page type-page status-publish hentry article-blue">
				<header class="entry-header">
					<h3 class="entry-title">Орієнтовні ціни</h3>
				</header><!-- .entry-header -->			
				<div class="entry-content">
					<div class="container">
						<div class="row">
							<?php $postsk = get_posts ("category=8&orderby=date&order=ASC"); ?>
							<?php if ($postsk) : ?>
								<?php foreach ($postsk as $post) : setup_postdata ($post); ?>
									<div class="col-sm-4 col-md-4 col-lg-4">
										<div class="price-blue"><?php echo get_post_meta($post->ID, 'zylindr', true); ?></div>
										<h4 class="entry-title">
											<span class="blue"><?php echo get_post_meta($post->ID, 'zylindr', true); ?></span> -циліндровий двигун від <span class="blue"><?php echo get_post_meta($post->ID, 'price', true); ?></span>
										</h4><!-- .entry-title -->
										<?php the_content(); ?>
									</div><!-- .col-sm-4.col-md-4.col-lg-4 -->
								<?php endforeach; ?>
						    	<?php wp_reset_postdata(); ?>
							<?php endif; ?>
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- .entry-content -->
			</article><!-- #price-home -->

			<article id="gallery-home" class="page type-page status-publish hentry carusel-home">
				<header class="entry-header">
					<h3 class="entry-title">Галерея робіт</h3>
				</header><!-- .entry-header -->
				<?php $gallery_text = get_post( 335, ARRAY_A ); ?>
				<div class="entry-content">
				    <div class="container">
						<div class="row" style="padding-bottom: 20px; text-align:center;">
						
							<?php echo $gallery_text['post_content']; ?>
							
						</div><!-- .row -->
					</div><!-- .container -->
					<div class="container">
						<div class="row">
						
							<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 right_or_left left">
								<a target="_self" class="link-left">
									<span></span>
								</a>
							</div>
							
							<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 all-img-home">
								<ul>
									<?php $postsk = get_posts ("category=9&orderby=date&order=ASC"); ?>
									<?php if ($postsk) : ?>
										<?php foreach ($postsk as $post) : setup_postdata ($post); ?>

											<?php $category_post = get_the_category( $post->ID, ARRAY_A ); ?>
											<?php $category_link = get_category_link( $category_post[0]->term_id ); ?>
											

											<li>
												<a href="<?php echo $category_link; ?>">
													<?php  the_post_thumbnail(array(300,212)); ?>
												</a>
												
											</li>
											
										<?php endforeach; ?>
								    	<?php wp_reset_postdata(); ?>
									<?php endif; ?>
								</ul>
							</div>

							<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 right_or_left right">
								<a target="_self" class="link-right">
									<span></span>
								</a>
							</div>

						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- .entry-content -->
			</article><!-- #gallery-home -->

		</main><!-- #main.site-main -->
	</div><!-- #primary.content-area -->
	<?php //echo photo_gallery(5); ?>
	<?php //echo photo_gallery(6); ?>
	<?php //echo photo_gallery(7); ?>
	<?php //echo photo_gallery(8); ?>

<?php get_footer(); ?>
