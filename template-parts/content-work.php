<?php
/**
 * The template part for displaying content work
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<div class="anons col-xs-12 col-sm-4 col-md-3 col-lg-3">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    	<header class="entry-search-header">
    		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
    			<span class="sticky-post"><?php _e( 'Featured', 'twentysixteen' ); ?></span>
    		<?php endif; ?>
    
    		<?php the_title( sprintf( '<h2 class="entry-search-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    	</header><!-- .entry-search-header -->
    	
    	<div class="entry-post-excerpt">
            <div class="entry-post-thumbnail">
        	    <?php twentysixteen_post_thumbnail(); ?>
        	</div><!-- .entry-post-thumbnail -->
    
        	<div class="entry-search-content">
        		<?php
        			/* translators: %s: Name of current post */
        			//the_content( sprintf(
        			//	__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
        			//	get_the_title()
        			//) );
        
        			wp_link_pages( array(
        				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
        				'after'       => '</div>',
        				'link_before' => '<span>',
        				'link_after'  => '</span>',
        				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
        				'separator'   => '<span class="screen-reader-text">, </span>',
        			) );
        		?>
        	</div><!-- .entry-search-content -->
    	</div><!-- .entry-post-excerpt -->
    	
    	<?php twentysixteen_excerpt(); ?>
    
    	<footer class="entry-search-footer">
    		<?php //twentysixteen_entry_meta(); ?>
    		<?php
    			edit_post_link(
    				sprintf(
    					/* translators: %s: Name of current post */
    					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
    					get_the_title()
    				),
    				'<span class="edit-link">',
    				'</span>'
    			);
    		?>
    	</footer><!-- .entry-search-footer -->
    </article><!-- #post-## -->
</div><!-- .anons -->