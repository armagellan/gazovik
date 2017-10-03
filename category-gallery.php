<?php
/**
 * The template for displaying category - gallery pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="category_gallery" class="page type-page status-publish hentry">
			
				<?php if ( have_posts() ) : ?>

					<div class="entry-content">
						<div class="container">
							<div class="row">
								<header class="entry-header">
									<?php the_archive_title( '<h1 class="entry-title">', '</h1>' ); ?>
								</header><!-- .entry-header -->
								<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>

								<?php $categories = get_categories( 'child_of=9' );
								if( $categories ){
									foreach( $categories as $cat ){ ?>

											<div class="col-sm-3 col-md-3 col-lg-3">
												<?php if( $img_category = get_field( "img_category", $cat ) ) { ?>
												<a href="<?php echo get_category_link($cat->term_id);?>" title="<?php echo $cat->name;?>">
													<img src="<?php echo $img_category['url'];?>"/>
												</a>
												<?php } ?>
											</div>
									<?php 
									}
								}
								?>

								<?php
								// Start the Loop.
								//while ( have_posts() ) : the_post();
									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									//get_template_part( 'template-parts/content', get_post_format() );

								// End the loop.
								//endwhile; ?>
							</div>
						</div>
					</div>

					

				<?php
				// If no content, include the "No posts found" template.
				else :
					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

			</article><!-- #category_gallery -->
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
