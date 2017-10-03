<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            
            <div class="container">
		        <div class="row">
		
        			<section class="error-404 not-found">
        				<header class="entry-header">
        					<h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentysixteen' ); ?></h1>
        				</header><!-- .entry-header -->
        
        				<div class="entry-content">
        					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentysixteen' ); ?></p>
        
        					<?php get_search_form(); ?>
        				</div><!-- .entry-content -->
        			</section><!-- .error-404 -->
        			
        	    </div><!-- .row -->
            </div><!-- .container -->

		</main><!-- .site-main -->

		<?php get_sidebar( 'content-bottom' ); ?>

	</div><!-- .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
