<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

		</div><!-- .site-content -->

		<footer id="colophon" class="site-footer" role="contentinfo">

			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-3 col-lg-3">
						<ul>
							<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>vse-pro-gbo/informatsiya">Все про ГБО</a></li>
							<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>about/company">Про нас</a></li>
							<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>tsiny-ta-poslugy/ustanovka-gbo">Ціни та послуги</a></li>
							<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>gallery">Галерея</a></li>
							<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>clients">Клієнти</a></li>
							<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>contacts">Контакти</a></li>
						</ul>
					</div>
					<div class="col-sm-12 col-md-3 col-lg-3">
						<ul>
							<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>vse-pro-gbo/informatsiya">Інформація</a></li>
							<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>vse-pro-gbo/obladnannya">Обладнання</a></li>
							<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>vse-pro-gbo/bezpeka-ta-mify-gbo">Безпека</a></li>
							<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>vse-pro-gbo/okupnist">Окупність</a></li>
							<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>vse-pro-gbo/gbo-v-kredyt-teper-tse-mozhlyvo">ГБО вкредит</a></li>
							<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>vse-pro-gbo/faq">FAQ</a></li>
						</ul>
					</div>
					<div class="col-sm-12 col-md-3 col-lg-3">
						<ul class="grey-ul">
							<li class="footer-adress">Україна, м.Львів, <br>вул. Зелена 145</li>
							<li class="footer-telef">(032) 290-15 -17 <br>(067) 671-15 -17</li>
							<li class="footer-mail">gazovik@lviv.farlep.net <br>gazovik.lviv@gmail.com</li>
						</ul>
					</div>
					<div class="col-sm-12 col-md-3 col-lg-3">
						<label>Порадьте нас друзям</label>
						<ul class="grey-ul">
							<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">в фейсбуках</a></li>
							<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">твітерах</a></li>
							<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">гуглоплюсах всяких</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="trace">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
							2017 © Компанія Газовик - установка ГБО у Львові.. Усі права захищені
							<div class="arus">Developed by <span>Arus</span></div>
						</div>
					</div>
				</div>
			</div><!-- .site-info -->
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
