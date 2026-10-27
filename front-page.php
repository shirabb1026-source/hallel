<?php
/**
 * Front page template - Hero section (step 1).
 */
get_header();
?>

<section class="hero">
	<div class="hero__stage">

		<div class="hero__shutter" aria-hidden="true"><span class="hero__iris"></span></div>

		<div class="hero__grain" aria-hidden="true"></div>

		<div class="hero__bg">
			<video
				autoplay
				muted
				loop
				playsinline
				preload="auto"
				poster="<?php echo esc_url( hallel_content_url( 'hero_poster' ) ); ?>"
				aria-hidden="true"
			>
				<source src="<?php echo esc_url( hallel_content_url( 'hero_video' ) ); ?>" type="video/mp4">
				<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/hero-bg.jpg' . '?v=' . filemtime( get_stylesheet_directory() . '/assets/images/hero-bg.jpg' ) ); ?>" alt="" role="presentation">
			</video>
		</div>

		<div class="hero__frame" aria-hidden="true">
			<span class="tl-v"></span><span class="tl-h"></span>
			<span class="tr-v"></span><span class="tr-h"></span>
			<span class="bl-v"></span><span class="bl-h"></span>
			<span class="br-v"></span><span class="br-h"></span>
		</div>

		<span class="hero__scene-label"><?php hallel_char_spans( hallel_content_value( 'hero_scene' ), 'hero__char hero__char--label' ); ?></span>

		<div class="hero__rec">
			<span class="hero__rec-text"><?php hallel_char_spans( hallel_content_value( 'hero_rec' ), 'hero__char hero__char--rec' ); ?></span>
			<span class="hero__rec-dot" aria-hidden="true"></span>
		</div>

		<div class="hero__lines" aria-hidden="true"><span></span><span></span></div>

		<div class="hero__content">
			<div class="hero__headline-group">
				<h1 class="hero__headline"><span class="hero__headline-line"><?php hallel_char_spans( hallel_content_value( 'hero_title_1' ), 'hero__char hero__char--h1' ); ?></span><span class="hero__headline-line"><?php hallel_char_spans( hallel_content_value( 'hero_title_2' ), 'hero__char hero__char--h2' ); ?></span></h1>
				<p class="hero__sub">
					<?php echo wp_kses_post( hallel_content_value( 'hero_text' ) ); ?>
					<strong><?php echo wp_kses_post( hallel_content_value( 'hero_bold' ) ); ?></strong>
				</p>
			</div>
			<p class="hero__tagline"><?php echo esc_html( hallel_content_value( 'hero_tagline' ) ); ?></p>
		</div>

	</div>
</section>

	<section class="story" id="about" aria-labelledby="story-title">
		<div class="story__stage">
			<div class="story__bg" aria-hidden="true"></div>

			<div class="story__filmstrip" aria-hidden="true"></div>

			<img class="story__wordmark" src="<?php echo esc_url( hallel_content_url( 'story_wordmark' ) ); ?>" alt="" aria-hidden="true">
			<span class="story__wordmark-fill" aria-hidden="true"></span>

			<img class="story__accent" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/story-accent.svg' . '?v=' . filemtime( get_stylesheet_directory() . '/assets/images/story-accent.svg' ) ); ?>" alt="">

			<h2 class="story__heading" id="story-title">
				<span class="story__heading-line1"><?php echo esc_html( hallel_content_value( 'story_title_1' ) ); ?></span>
				<span class="story__heading-line2"><?php echo esc_html( hallel_content_value( 'story_title_2' ) ); ?> <span class="cyan"><?php echo esc_html( hallel_content_value( 'story_title_accent' ) ); ?></span></span>
			</h2>

			<div class="story__text">
				<p class="lead"><?php echo wp_kses_post( hallel_content_value( 'story_lead' ) ); ?></p>
				<p><?php echo wp_kses_post( hallel_content_value( 'story_text_1' ) ); ?></p>
				<p><?php echo wp_kses_post( hallel_content_value( 'story_text_2' ) ); ?></p>
			</div>

			<div class="story__photos">
				<figure class="story__photo story__photo--center">
					<img src="<?php echo esc_url( hallel_content_url( 'story_photo_main' ) ); ?>" alt="">
				</figure>
				<figure class="story__photo story__photo--right">
					<img src="<?php echo esc_url( hallel_content_url( 'story_photo_side' ) ); ?>" alt="">
				</figure>
			</div>

		</div>
	</section>

	<section class="initiatives" id="initiatives">
		<div class="initiatives__stage">

			<div class="initiatives__heading">
				<h2 class="initiatives__title"><?php echo esc_html( hallel_content_value( 'initiatives_title' ) ); ?> <span class="cyan"><?php echo esc_html( hallel_content_value( 'initiatives_accent' ) ); ?></span></h2>
				<p class="initiatives__sub"><?php echo wp_kses_post( hallel_content_value( 'initiatives_sub' ) ); ?></p>
			</div>

			<div class="init-card init-card--a">
				<div class="init-card__body">
					<h3 class="init-card__title"><?php echo esc_html( hallel_content_value( 'init_1_title' ) ); ?></h3>
					<p class="init-card__text"><?php echo wp_kses_post( hallel_content_value( 'init_1_text' ) ); ?></p>
				</div>
				<img class="init-card__icon" src="<?php echo esc_url( hallel_content_url( 'init_1_icon' ) ); ?>" alt="" width="102" height="94">
			</div>

			<div class="init-card init-card--b">
				<div class="init-card__body">
					<h3 class="init-card__title"><?php echo esc_html( hallel_content_value( 'init_2_title' ) ); ?></h3>
					<p class="init-card__text"><?php echo wp_kses_post( hallel_content_value( 'init_2_text' ) ); ?></p>
				</div>
				<img class="init-card__icon" src="<?php echo esc_url( hallel_content_url( 'init_2_icon' ) ); ?>" alt="" width="92" height="75">
			</div>

			<div class="init-card init-card--c">
				<div class="init-card__body">
					<h3 class="init-card__title"><?php echo esc_html( hallel_content_value( 'init_3_title' ) ); ?></h3>
					<p class="init-card__text"><?php echo wp_kses_post( hallel_content_value( 'init_3_text' ) ); ?></p>
				</div>
				<img class="init-card__icon" src="<?php echo esc_url( hallel_content_url( 'init_3_icon' ) ); ?>" alt="" width="58" height="100">
			</div>

			<div class="init-card init-card--d">
				<div class="init-card__body">
					<h3 class="init-card__title"><?php echo esc_html( hallel_content_value( 'init_4_title' ) ); ?></h3>
					<p class="init-card__text"><?php echo wp_kses_post( hallel_content_value( 'init_4_text' ) ); ?></p>
				</div>
				<img class="init-card__icon" src="<?php echo esc_url( hallel_content_url( 'init_4_icon' ) ); ?>" alt="" width="86" height="78">
			</div>

		</div>
	</section>

	<section class="projects" id="projects" aria-label="פרויקטים">
		<div class="projects__stage">
			<div class="projects__heading">
				<h2><?php echo esc_html( hallel_content_value( 'projects_title' ) ); ?> <span><?php echo esc_html( hallel_content_value( 'projects_accent' ) ); ?></span></h2>
				<p><?php echo wp_kses_post( hallel_content_value( 'projects_sub' ) ); ?></p>
			</div>

		<?php
		$hallel_home_projects_q = new WP_Query( array(
			'post_type'      => 'hallel_project',
			'post_status'    => 'publish',
			'posts_per_page' => 2,
			'orderby'        => array( 'menu_order' => 'ASC', 'date' => 'ASC' ),
		) );
		$hallel_home_project_i = 0;
		while ( $hallel_home_projects_q->have_posts() ) : $hallel_home_projects_q->the_post();
			$hallel_home_project_i++;
			$hallel_video = hallel_project_url( get_the_ID(), 'teaser_video' );
			$hallel_poster = get_the_post_thumbnail_url( get_the_ID(), 'large' );
			$hallel_lead = hallel_project_value( get_the_ID(), 'teaser_lead' );
			$hallel_link_text = hallel_project_value( get_the_ID(), 'teaser_link_text' );
			$hallel_stamp = strtoupper( get_post_field( 'post_name' ) ) . ' &middot; ' . get_the_date( 'Y' );
		?>
				<div class="project-card project-card--<?php echo esc_attr( $hallel_home_project_i ); ?>">
				<?php if ( $hallel_video ) : ?>
				<video class="project-card__video" autoplay muted loop playsinline preload="metadata" poster="<?php echo esc_url( $hallel_poster ); ?>" aria-hidden="true">
					<source src="<?php echo esc_url( $hallel_video ); ?>" type="video/mp4">
				</video>
				<?php elseif ( $hallel_poster ) : ?>
				<img class="project-card__video" src="<?php echo esc_url( $hallel_poster ); ?>" alt="" aria-hidden="true">
				<?php endif; ?>
				<div class="project-card__focus" aria-hidden="true"><span></span><span></span><span></span><span></span><b>+</b></div>
				<div class="project-card__frame" aria-hidden="true">
					<span class="tl-v"></span><span class="tl-h"></span>
					<span class="tr-v"></span><span class="tr-h"></span>
					<span class="bl-v"></span><span class="bl-h"></span>
					<span class="br-v"></span><span class="br-h"></span>
				</div>
				<span class="project-card__scene-label">SCENE 02 &middot; TAKE 03</span>
				<span class="project-card__rec"><span class="project-card__rec-text">REC</span><span class="project-card__rec-dot" aria-hidden="true"></span></span>
				<span class="project-card__stamp"><?php echo $hallel_stamp; ?></span>
				<div class="project-card__body">
					<h3 class="project-card__title"><?php the_title(); ?></h3>
					<p class="project-card__text">
						<?php if ( $hallel_lead ) : ?><strong><?php echo esc_html( $hallel_lead ); ?></strong><?php endif; ?>
						<span class="project-card__description"><?php echo esc_html( get_the_excerpt() ); ?></span>
					</p>
					<a href="<?php the_permalink(); ?>" class="project-card__link"><?php echo esc_html( $hallel_link_text ? $hallel_link_text : 'לפרויקט' ); ?> <span aria-hidden="true">&larr;</span></a>
				</div>
			</div>

		<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</section>



	<!-- Partners / שיתופי פעולה -->
	<section class="partners" id="partners">
		<div class="partners__stage">

			<div class="partners__heading">
				<h2 class="partners__title"><?php echo esc_html( hallel_content_value( 'partners_title' ) ); ?> <span><?php echo esc_html( hallel_content_value( 'partners_accent' ) ); ?></span></h2>
				<p class="partners__sub"><?php echo esc_html( hallel_content_value( 'partners_sub' ) ); ?></p>
			</div>

			<div class="partners__logos">
				<div class="partners__logo-track">
				<?php
				$partner_logos = array();
				for ( $partner_index = 1; $partner_index <= 6; $partner_index++ ) {
					$partner_logos[] = array( 'url' => hallel_content_url( 'partner_' . $partner_index . '_logo' ), 'alt' => hallel_content_value( 'partner_' . $partner_index . '_alt' ) );
				}
				for ( $logo_group = 0; $logo_group < 2; $logo_group++ ) :
				?>
				<div class="partners__logo-group"<?php echo 1 === $logo_group ? ' aria-hidden="true"' : ''; ?>>
					<?php foreach ( $partner_logos as $logo ) : ?>
					<img class="partners__logo-img" src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo 0 === $logo_group ? esc_attr( $logo['alt'] ) : ''; ?>">
					<?php endforeach; ?>
				</div>
				<?php endfor; ?>
				</div>
			</div>

		</div>
	</section>

	<!-- ============================================================
	     Board of trustees / testimonials ("חבר נאמנים"). The Figma
	     design itself uses Lorem Ipsum placeholder names/titles and
	     stock photos for all 5 cards - this is NOT final content.
	     Kept as-is until real names, titles and photos are supplied.
	     ============================================================ -->
	<section class="testimonials" id="trustees">
		<div class="testimonials__stage">

			<div class="testimonials__heading">
				<h2 class="testimonials__title"><?php echo esc_html( hallel_content_value( 'trustees_title' ) ); ?> <span><?php echo esc_html( hallel_content_value( 'trustees_accent' ) ); ?></span></h2>
				<p class="testimonials__sub"><?php echo wp_kses_post( hallel_content_value( 'trustees_sub' ) ); ?></p>
			</div>

			<div class="testimonial-cards">
				<?php
				for ( $i = 1; $i <= 5; $i++ ) :
				?>
				<div class="testimonial-card testimonial-card--<?php echo $i; ?>">
					<img class="testimonial-card__photo" src="<?php echo esc_url( hallel_content_url( 'trustee_' . $i . '_photo' ) ); ?>" alt="">
					<div class="testimonial-card__body">
						<span class="testimonial-card__name"><?php echo esc_html( hallel_content_value( 'trustee_' . $i . '_name' ) ); ?></span>
						<span class="testimonial-card__role"><?php echo esc_html( hallel_content_value( 'trustee_' . $i . '_role' ) ); ?></span>
					</div>
				</div>
				<?php endfor; ?>
			</div>

		</div>
	</section>

	<!-- Our story -->
	<section class="ourstory" id="our-story">
		<div class="ourstory__stage">

			<img class="ourstory__photo ourstory__photo--left" src="<?php echo esc_url( hallel_content_url( 'ourstory_photo_left' ) ); ?>" alt="">
			<img class="ourstory__photo ourstory__photo--right" src="<?php echo esc_url( hallel_content_url( 'ourstory_photo_right' ) ); ?>" alt="">

			<div class="ourstory__box">
				<span class="ourstory__light" aria-hidden="true"></span>
				<div class="ourstory__frame" aria-hidden="true">
					<span class="tl-v"></span><span class="tl-h"></span>
					<span class="tr-v"></span><span class="tr-h"></span>
					<span class="bl-v"></span><span class="bl-h"></span>
					<span class="br-v"></span><span class="br-h"></span>
				</div>
				<div class="ourstory__content">
					<h2 class="ourstory__heading">
						<span class="ourstory__heading-line1"><?php echo esc_html( hallel_content_value( 'ourstory_title' ) ); ?></span>
						<span class="ourstory__heading-line2"><?php echo esc_html( hallel_content_value( 'ourstory_title_2' ) ); ?> <span class="cyan"><?php echo esc_html( hallel_content_value( 'ourstory_accent' ) ); ?></span></span>
					</h2>
					<div class="ourstory__text">
						<p><?php echo wp_kses_post( hallel_content_value( 'ourstory_text_1' ) ); ?></p>
						<p><?php echo wp_kses_post( hallel_content_value( 'ourstory_text_2' ) ); ?></p>
						<p class="ourstory__tagline"><?php echo esc_html( hallel_content_value( 'ourstory_tagline' ) ); ?></p>
					</div>
				</div>
			</div>

		</div>
	</section>

<?php get_template_part( 'template-parts/site-bottom' ); ?>

<?php
get_footer();
