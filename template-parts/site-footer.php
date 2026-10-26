	<!-- Footer -->
	<footer class="site-footer">
		<div class="site-footer__stage">

			<p class="site-footer__legal">
				<a href="<?php echo esc_url( hallel_content_url( 'footer_accessibility_url' ) ); ?>"><?php echo esc_html( hallel_content_value( 'footer_accessibility' ) ); ?></a>
				<a href="<?php echo esc_url( hallel_content_url( 'footer_privacy_url' ) ); ?>"><?php echo esc_html( hallel_content_value( 'footer_privacy' ) ); ?></a>
			</p>

			<div class="site-footer__center">
				<nav class="site-footer__nav">
					<?php foreach ( array( 'home', 'about', 'projects' ) as $item ) : ?>
					<a <?php echo hallel_nav_is_current( hallel_content_url( 'nav_' . $item . '_url' ) ) ? 'class="is-current" aria-current="page"' : ''; ?> href="<?php echo esc_url( hallel_content_url( 'nav_' . $item . '_url' ) ); ?>"><?php echo esc_html( hallel_content_value( 'nav_' . $item ) ); ?></a>
					<?php endforeach; ?>
<a <?php echo (is_post_type_archive("hallel_article") || is_singular("hallel_article")) ? 'class="is-current" aria-current="page"' : ''; ?> href="<?php echo esc_url(home_url("/articles/")); ?>">מאמרים</a>
<a <?php echo hallel_nav_is_current(hallel_content_url("nav_contact_url")) ? 'class="is-current" aria-current="page"' : ''; ?> href="<?php echo esc_url(hallel_content_url("nav_contact_url")); ?>"><?php echo esc_html(hallel_content_value("nav_contact")); ?></a>
				</nav>
				<div class="site-footer__social">
					<a href="<?php echo esc_url( hallel_content_url( 'footer_facebook' ) ); ?>" aria-label="Facebook"><img src="<?php echo esc_url( hallel_content_url( 'footer_facebook_icon' ) ); ?>" alt=""></a>
					<a href="<?php echo esc_url( hallel_content_url( 'footer_twitter' ) ); ?>" aria-label="Twitter"><img src="<?php echo esc_url( hallel_content_url( 'footer_twitter_icon' ) ); ?>" alt=""></a>
					<a href="<?php echo esc_url( hallel_content_url( 'footer_youtube' ) ); ?>" aria-label="YouTube"><img src="<?php echo esc_url( hallel_content_url( 'footer_youtube_icon' ) ); ?>" alt=""></a>
				</div>
			</div>

			<div class="site-footer__photo" aria-hidden="true">
				<img src="<?php echo esc_url( hallel_content_url( 'footer_reel' ) ); ?>" alt="">
			</div>

			<div class="site-footer__logo">
				<img src="<?php echo esc_url( hallel_content_url( 'footer_logo' ) ); ?>" alt="קרן הלל">
			</div>

		</div>
	</footer>
