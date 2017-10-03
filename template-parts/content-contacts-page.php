<?php
/**
 * The template used for displaying page contacts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="container">
	    <div class="row">

        	<header class="entry-header">
        		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        	</header><!-- .entry-header -->

        	<?php twentysixteen_post_thumbnail(); ?>

        	<div class="entry-content">
        		<?php
        		the_content();
        
        		wp_link_pages( array(
        			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
        			'after'       => '</div>',
        			'link_before' => '<span>',
        			'link_after'  => '</span>',
        			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
        			'separator'   => '<span class="screen-reader-text">, </span>',
        		) );
        		?>
        	</div><!-- .entry-content -->
        	
        </div><!-- .row -->
	</div><!-- .container -->
	
	<br><br>
	<div class="container">
	    <div class="row">
	        <h2 style="padding-left:15px;">Як до нас доїхати</h2>
	    </div><!-- .row -->
	</div><!-- .container -->
	<br>
	
	<div class="contacts-maps">
	    <iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1082.3823996925296!2d24.060242396101547!3d49.81701707564315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473ac2aa824dd33d%3A0x6704985e672e7ed1!2z0J_QnyDQkNCa0JLQkNCT0JDQlw!5e0!3m2!1suk!2sua!4v1504182809490" width="100%" height="450" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
	</div><!-- .contacts-maps -->
	
	<br>
	<div class="container">
	    <div class="row">
	        <h2 style="padding-left:15px;">Напишіть нам</h2>
	        <br>
	        <div class="contacts-form">
                <?php echo do_shortcode('[contact-form-7 id="359" title="НАПИШІТЬ НАМ"]'); ?>
	        </div><!-- .contacts-form -->
	    </div><!-- .row -->
	</div><!-- .container -->

</article><!-- #post-## -->
