<?php
/**
 * The template for displaying category pages
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
				<?php 
 				    // Added sort by ASC to query -->
					global $query_string; 
 					 query_posts( $query_string . '&order=ASC' );  
 				?>
				<?php if ( have_posts() ) : ?>
					<div class="entry-content">
						<div class="container">
							<div class="row">
								<header class="entry-header">
									<h1 class="entry-title">
										<?php the_archive_title(); ?>
										<span class="category-header-span-img">
											<?php $thisCat = get_category(get_query_var('cat'),false);
                                			 $img_category = get_field( "img_category", $thisCat ); ?>
                                			 <img src="<?php echo $img_category['url'];?>"/>
										</span>
									</h1>
								</header><!-- .entry-header -->
								<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
								
								<div class="panel-group" id="accordion">
								
								<?php
								// Start the Loop.
								while ( have_posts() ) : the_post();


									//the_title( '<h1 class="entry-title">', '</h1>' );
									//twentysixteen_excerpt();
									//twentysixteen_post_thumbnail();
									//the_content();  ?>

									
									  <div class="panel panel-default">
									    <div class="panel-heading">
									      <h4 class="panel-title">
									              <a data-toggle="collapse" data-parent="#accordion" href="#post-<?php the_ID(); ?>" class="glyphicon glyphicon-chevron-down" >
									                <?php the_title( '<label>', '</label>' ); ?>
									                <span class="excerpt"><?php echo get_the_excerpt(); ?></span>
									              </a>
									            </h4>
									    </div>
									    <div id="post-<?php the_ID(); ?>" class="panel-collapse collapse">
									      <div class="panel-body">
									      	<?php the_content(); ?>
									      </div>
									    </div>
									  </div>
									
								<?php
								// End the loop.
								 endwhile; ?>

								</div>
                                <footer class="entry-footer entrs">
                                    <a class="return" href="<?php echo esc_url( home_url( '/' ) ); ?>gallery">Назад до Галереї</a>
                            	</footer><!-- .entry-footer -->
							</div><!-- .entry-content -->
						</div><!-- .container -->
					</div><!-- .row -->
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
