<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>

	<!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js" type="text/javascript"></script>

<div id="page" class="site">
	<div class="site-inner">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a>
		<header class="site-header-top" role="banner">
			<div class="container">
                <!--<div class="navbar">-->
                <div class="col-sm-2 col-md-2 col-lg-2">
                    <span class="adress-left">Львів, Зелена 145</span>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-2">
                    <a data-toggle="modal" data-target="#myModal">Показати на мапі</a>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <span class="tel-left">(032)290-15 -17 &nbsp;&nbsp;&nbsp; 067-671-15-17</span>
                </div>
                <div class="container-mail-right col-sm-4 col-md-4 col-lg-4">
                    <span class="mail-right">gazovik@lviv.farlep.net &nbsp;&nbsp; gazovik.lviv@gmail.com</span>
                </div>
                <!--</div>-->
            </div>
        </header>
        <div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
						    МИ НА МАПІ
							<button class="close" type="button" data-dismiss="modal" style="font-size:26px;">&times;</button>
						</div>
						<div class="modal-body">
						<iframe style="border: 0;" 
						        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1082.3823996925296!2d24.060242396101547!3d49.81701707564315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473ac2aa824dd33d%3A0x6704985e672e7ed1!2z0J_QnyDQkNCa0JLQkNCT0JDQlw!5e0!3m2!1suk!2sua!4v1504182809490" 
						        height="450" 
						        frameborder="0" 
						        allowfullscreen="allowfullscreen"></iframe>
						</div>
						
					</div>
				</div>
			</div>
		<header id="masthead" class="site-header" role="banner">
	        
			<div class="site-header-main container">
			    <!--<div class="row">-->
					<div class="site-branding col-xs-6 col-sm-3 col-md-3 col-lg-3">
						<?php twentysixteen_the_custom_logo(); ?>

						<?php if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<!--<p class="site-title"><a href="<?php //echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php //bloginfo( 'name' ); ?></a></p>-->
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php endif;

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; ?></p>
						<?php endif; ?>
					</div><!-- .site-branding -->

					<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
					<div class="col-xs-4 col-sm-8 col-md-8 col-lg-8">
						<button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'twentysixteen' ); ?></button>

						<div id="site-header-menu" class="site-header-menu">
							<?php if ( has_nav_menu( 'primary' ) ) : ?>
								<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">
									<?php
										wp_nav_menu( array(
											'theme_location' => 'primary',
											'menu_class'     => 'primary-menu',
										 ) );
									?>
								</nav><!-- .main-navigation -->
							<?php endif; ?>

							<?php if ( has_nav_menu( 'social' ) ) : ?>
								<nav id="social-navigation" class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'twentysixteen' ); ?>">
									<?php
										wp_nav_menu( array(
											'theme_location' => 'social',
											'menu_class'     => 'social-links-menu',
											'depth'          => 1,
											'link_before'    => '<span class="screen-reader-text">',
											'link_after'     => '</span>',
										) );
									?>
								</nav><!-- .social-navigation -->
							<?php endif; ?>
						</div><!-- .site-header-menu -->
					</div><!-- .col-sm-9 -->
					<div class="col-xs-2 col-sm-1 col-md-1 col-lg-1">
						<button id="search-toggle" class="search-toggle"></button>
						<div id="search-block">
						    <?php get_search_form(); ?>
						    <div class="search-close"></div>
						</div>
						<?php if ( is_home() ) : ?>
							<div id="view-summ"></div>
							<div id="calc">
								<div>
									<h3>РОЗРАХУВАТИ ОКУПНІСТЬ</h3>
									<?php $details = get_post( 124 ); ?>
									<label for="oil">Середній розхід бензину, л/100км</label>
									<div class="select">
										<!--<select id="oil">
											<?php //$average_oil = get_post_meta($details->ID, 'average_oil', true); ?>
											<?php //foreach ($average_oil as $one_oil) { ?>
												<option><?php //echo $one_oil; ?></option>
											<?php //} ?>
										</select>-->
										<input type="number" id="oil" name="oil" min="<?php echo get_post_meta($details->ID, 'average_oil_min', true); ?>" max="<?php echo get_post_meta($details->ID, 'average_oil_max', true); ?>" step="0.5" placeholder="<?php echo get_post_meta($details->ID, 'average_oil', true); ?>" value="<?php echo get_post_meta($details->ID, 'average_oil', true); ?>">
									</div>
									<label for="quiq">Серед. пробіг в день, км</label>
									<div class="select">
										<!--<select id="quiq">
											<?php //$average_mileage = get_post_meta($details->ID, 'average_mileage', true); ?>
											<?php //foreach ($average_mileage as $one_mileage) { ?>
												<option><?php //echo $one_mileage; ?></option>
											<?php //} ?>
										</select>-->
										<input type="number" id="quiq" name="quiq" min="<?php echo get_post_meta($details->ID, 'average_mileage_min', true); ?>" max="<?php echo get_post_meta($details->ID, 'average_mileage_max', true); ?>" step="1" placeholder="<?php echo get_post_meta($details->ID, 'average_mileage', true); ?>" value="<?php echo get_post_meta($details->ID, 'average_mileage', true); ?>">
									</div>
									<div id="div-price-oil">
										<label for="price-oil">Ціна  бензину</label>
										<!--<select id="price-oil">
											<?php //$price_oil = get_post_meta($details->ID, 'price_oil', true); ?>
											<?php //foreach ($price_oil as $one_price_oil) { ?>
												<option><?php //echo $one_price_oil; ?></option>
											<?php //} ?>
										</select>-->
										<input type="number" id="price-oil" name="price-oil" min="<?php echo get_post_meta($details->ID, 'price_oil_min', true); ?>" max="<?php echo get_post_meta($details->ID, 'price_oil_max', true); ?>" step="0.5" placeholder="<?php echo get_post_meta($details->ID, 'price_oil', true); ?>" value="<?php echo get_post_meta($details->ID, 'price_oil', true); ?>">
									</div>
									<div id="div-price-gaz">
										<label for="price-gaz">Ціна газу</label>
										<!--<select id="price-gaz">
											<?php //$price_gaz = get_post_meta($details->ID, 'price_gaz', true); ?>
											<?php //foreach ($price_gaz as $one_price_gaz) { ?>
												<option><?php //echo $one_price_gaz; ?></option>
											<?php //} ?>
										</select>-->
										<input type="number" id="price-gaz" name="price-gaz" min="<?php echo get_post_meta($details->ID, 'price_gaz_min', true); ?>" max="<?php echo get_post_meta($details->ID, 'price_gaz_max', true); ?>" step="0.5" placeholder="<?php echo get_post_meta($details->ID, 'price_gaz', true); ?>" value="<?php echo get_post_meta($details->ID, 'price_gaz', true); ?>">
									</div>
									<label for="price">Тип двигуна</label>
									<div class="select">
										<select id="price">
											<?php //$price_work = get_post_meta($details->ID, 'price_work', true); ?>
											<?php //foreach ($price_work as $one_price_work) { ?>
												<!--<option><?php //echo $one_price_work; ?></option>-->
											<?php //} ?>
											<option value="<?php echo get_post_meta($details->ID, 'price_work_min', true); ?>">4 -циліндровий двигун</option>
											<option value="<?php echo get_post_meta($details->ID, 'price_work', true); ?>">6 -циліндровий двигун</option>
											<option value="<?php echo get_post_meta($details->ID, 'price_work_max', true); ?>">8 -циліндровий двигун</option>
										</select>
										<!--<input type="number" id="price" name="price" min="<?php //echo get_post_meta($details->ID, 'price_work_min', true); ?>" max="<?php //echo get_post_meta($details->ID, 'price_work_max', true); ?>" step="500" placeholder="<?php //echo get_post_meta($details->ID, 'price_work', true); ?>" value="<?php //echo get_post_meta($details->ID, 'price_work', true); ?>">-->
									</div>
									<button type="button" id="summ" value="РОЗРАХУВАТИ">РОЗРАХУВАТИ</button>
								</div>
							</div><!-- .calc -->

						<?php endif; ?>
					</div><!-- .col-sm-1 -->
					<?php endif; ?>
				<!--</div><!-- .row -->

				

			</div><!-- .site-header-main -->

			<?php if ( get_header_image() ) : ?>
				<?php
					/**
					 * Filter the default twentysixteen custom header sizes attribute.
					 *
					 * @since Twenty Sixteen 1.0
					 *
					 * @param string $custom_header_sizes sizes attribute
					 * for Custom Header. Default '(max-width: 709px) 85vw,
					 * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
					 */
					$custom_header_sizes = apply_filters( 'twentysixteen_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
				?>
				<div class="header-image">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					</a>
				</div><!-- .header-image -->
			<?php endif; // End header image check. ?>



		</header><!-- .site-header -->
		
		<?php if ( is_home() ) : ?>
			<div id="text-home">
			    <?php //$postsk = get_posts ("category=18&orderby=date&order=DESC&numberposts=1"); ?>
				<?php //if ($postsk) : ?>
					<?php //foreach ($postsk as $post) : setup_postdata ($post); ?>
					    <!--<h1><?php //the_title(); ?></h1>
					    <h2><?php //the_excerpt(); ?></h2>
					    <a id="more" href="<?php //echo get_permalink(); ?>">ДЕТАЛЬНІШЕ</a>-->
					<?php //endforeach; ?>
			    	<?php //wp_reset_postdata(); ?>
				<?php //endif; ?>
				<!--<h1>Заощаджуйте без вкладень уже сьогодні</h1>-->
				<!--<h2>завдяки кредитній програмі Газовика та Приватбанку</h2>-->
				<!--<button type="button" id="more" value="ДЕТАЛЬНІШЕ">ДЕТАЛЬНІШЕ</button>-->
				<!--<a id="more" href="<?php //echo esc_url( home_url( '/' ) ); ?>">ДЕТАЛЬНІШЕ</a>-->
			</div>
			
				
			
		<?php endif; ?>

		<?php //if ( is_home() ) : ?>
			<?php //echo do_shortcode('[slider slider_id="50" width="1665" height="980"][/slider]') ?>
		<?php //endif; ?>


		

		<div id="content" class="site-content">
