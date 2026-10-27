<?php
/**
 * Template Name: אודותינו
 * About page — editorial inner-page layout.
 */
get_header();
the_post();
?>

<main class="about-page">
	<section class="about-hero" aria-labelledby="about-page-title">
		<div class="about-hero__image" aria-hidden="true"></div>
		<div class="about-hero__grain" aria-hidden="true"></div>
		<div class="about-hero__copy">
			<p class="about-kicker"><?php echo esc_html( hallel_about_value( 'hero_1' ) ); ?></p>
			<h1 id="about-page-title"><?php echo esc_html( hallel_about_value( 'hero_2' ) ); ?><br><span><?php echo esc_html( hallel_about_value( 'hero_3' ) ); ?></span></h1>
			<div class="about-hero__lead"><?php echo hallel_richtext( hallel_about_value( 'hero_4' ) ); ?></div>
		</div>
		<div class="about-hero__filmstrip" aria-hidden="true"></div>
		<figure class="about-hero__chair" aria-hidden="true">
			<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/story-photo-center.png' ); ?>" alt="">
		</figure>
	</section>

	<section class="about-manifesto">
		<div class="about-manifesto__stage">
			<div class="about-manifesto__landscape" aria-hidden="true"></div>
			<div class="about-manifesto__aside">
				<span><?php echo esc_html( hallel_about_value( 'story_1' ) ); ?></span>
				<i aria-hidden="true"></i>
			</div>
			<div class="about-manifesto__content">
				<h2><?php echo esc_html( hallel_about_value( 'story_2' ) ); ?><br><span><?php echo esc_html( hallel_about_value( 'story_3' ) ); ?></span></h2>
				<div class="about-manifesto__text">
					<?php echo hallel_richtext( hallel_about_value( 'story_text' ) ); ?>
				</div>
			</div>
			<img class="about-manifesto__woman" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/about-woman-scene.png?v=' . filemtime( get_stylesheet_directory() . '/assets/images/about-woman-scene.png' ) ); ?>" alt="יוצרת מביטה אל ירושלים">
		</div>
	</section>

	<section class="about-principles" aria-labelledby="principles-title">
		<div class="about-principles__heading">
			<p class="about-kicker"><?php echo esc_html( hallel_about_value( 'principles_1' ) ); ?></p>
			<h2 id="principles-title"><?php echo esc_html( hallel_about_value( 'principles_2' ) ); ?><br><span><?php echo esc_html( hallel_about_value( 'principles_3' ) ); ?></span></h2>
		</div>
		<div class="about-principles__list">
			<article><span><?php echo esc_html( hallel_about_value( 'principles_4' ) ); ?></span><h3><?php echo esc_html( hallel_about_value( 'principles_5' ) ); ?></h3><div class="about-principles__text"><?php echo hallel_richtext( hallel_about_value( 'principles_6' ) ); ?></div></article>
			<article><span><?php echo esc_html( hallel_about_value( 'principles_7' ) ); ?></span><h3><?php echo esc_html( hallel_about_value( 'principles_8' ) ); ?></h3><div class="about-principles__text"><?php echo hallel_richtext( hallel_about_value( 'principles_9' ) ); ?></div></article>
			<article><span><?php echo esc_html( hallel_about_value( 'principles_10' ) ); ?></span><h3><?php echo esc_html( hallel_about_value( 'principles_11' ) ); ?></h3><div class="about-principles__text"><?php echo hallel_richtext( hallel_about_value( 'principles_12' ) ); ?></div></article>
		</div>
	</section>

	<section class="about-timeline" aria-labelledby="timeline-title">
		<div class="about-timeline__frame" aria-hidden="true"><i></i><i></i><i></i><i></i></div>
		<div class="about-timeline__light" aria-hidden="true"></div>
		<div class="about-timeline__visual about-timeline__visual--right" aria-hidden="true">
			<img src="<?php echo esc_url( hallel_content_url( 'ourstory_photo_right' ) ); ?>" alt="">
		</div>
		<div class="about-timeline__visual about-timeline__visual--left" aria-hidden="true">
			<img src="<?php echo esc_url( hallel_content_url( 'ourstory_photo_left' ) ); ?>" alt="">
		</div>
		<div class="about-timeline__content">
			<p class="about-kicker"><?php echo esc_html( hallel_about_value( 'timeline_1' ) ); ?></p>
			<h2 id="timeline-title"><?php echo esc_html( hallel_about_value( 'timeline_2' ) ); ?><br><span><?php echo esc_html( hallel_about_value( 'timeline_3' ) ); ?></span></h2>
			<div class="about-timeline__statement">
				<?php echo hallel_richtext( hallel_about_value( 'timeline_text' ) ); ?>
			</div>
		</div>
	</section>

</main>

<?php
get_template_part( 'template-parts/site-bottom' );
get_footer();
