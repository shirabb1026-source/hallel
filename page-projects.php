<?php
/**
 * Template Name: עמוד פרויקטים
 */
get_header();
?>
<main class="inner-page projects-index">
	<section class="inner-hero inner-hero--projects site-banner-diagonal">
		<div class="inner-hero__media" aria-hidden="true"></div>
		<div class="camera-frame" aria-hidden="true"><i></i><i></i><i></i><i></i></div>
		<div class="inner-hero__copy">
			<p class="inner-kicker">הפרויקטים של קרן הלל</p>
			<h1>סיפורים מתחילים<br><span>בצעד אחד אמיץ.</span></h1>
			<p>אנחנו בונים מסגרות שבהן יוצרים יכולים לעצור, להקשיב למה שבוער בהם ולהתחיל ליצור.</p>
		</div>
		<span class="inner-rec" aria-hidden="true">REC <b></b></span>
	</section>
<div class="site-banner-filmstrip" aria-hidden="true"></div>

	<section class="projects-intro">
		<p class="inner-kicker">מה קורה עכשיו</p>
		<h2>היוזמות<br><span>שכבר יצאו לדרך.</span></h2>
		<p>כל פרויקט מתחיל מצורך אמיתי ופוגש קבוצה אחרת של יוצרים. הדרך משתנה, אבל המטרה נשארת: לתת לסיפור מקום להפוך ליצירה.</p>
	</section>

	<section class="projects-list" aria-label="רשימת פרויקטים">
		<?php
		$hallel_projects_q = new WP_Query( array(
			'post_type'      => 'hallel_project',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'orderby'        => array( 'menu_order' => 'ASC', 'date' => 'ASC' ),
		) );
		$hallel_project_index = 0;
		while ( $hallel_projects_q->have_posts() ) : $hallel_projects_q->the_post();
			$hallel_project_index++;
			$hallel_number = sprintf( '%02d', $hallel_project_index );
			$hallel_reverse = 0 === $hallel_project_index % 2;
			$hallel_img = hallel_project_url( get_the_ID(), 'teaser_image' );
			if ( ! $hallel_img && has_post_thumbnail() ) { $hallel_img = get_the_post_thumbnail_url( get_the_ID(), 'large' ); }
			$hallel_kicker = hallel_project_value( get_the_ID(), 'teaser_kicker' );
			$hallel_link_text = hallel_project_value( get_the_ID(), 'teaser_link_text' );
		?>
		<article class="project-teaser<?php echo $hallel_reverse ? ' project-teaser--reverse' : ''; ?>">
			<a class="project-teaser__image" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( sprintf( 'לפרויקט %s', get_the_title() ) ); ?>">
				<?php if ( $hallel_img ) : ?><img src="<?php echo esc_url( $hallel_img ); ?>" alt=""><?php endif; ?>
				<span class="project-teaser__number"><?php echo esc_html( $hallel_number ); ?></span>
<div class="project-card__frame" aria-hidden="true">
					<span class="tl-v"></span><span class="tl-h"></span>
					<span class="tr-v"></span><span class="tr-h"></span>
					<span class="bl-v"></span><span class="bl-h"></span>
					<span class="br-v"></span><span class="br-h"></span>
				</div>
				<span class="project-card__scene-label">SCENE 02 &middot; TAKE 03</span>
				<span class="project-card__rec"><span class="project-card__rec-text">REC</span><span class="project-card__rec-dot" aria-hidden="true"></span></span>

			</a>
			<div class="project-teaser__copy">
				<?php if ( $hallel_kicker ) : ?><p class="inner-kicker"><?php echo esc_html( $hallel_kicker ); ?></p><?php endif; ?>
				<h2><?php the_title(); ?></h2>
				<p><?php echo esc_html( get_the_excerpt() ); ?></p>
				<a class="inner-button" href="<?php the_permalink(); ?>"><?php echo esc_html( $hallel_link_text ? $hallel_link_text : 'לפרויקט' ); ?> <span aria-hidden="true">←</span></a>
			</div>
		</article>
		<?php endwhile; wp_reset_postdata(); ?>
	</section>

	<section class="inner-closing">
		<p>יש לכם סיפור<br><span>שרוצה לצאת לדרך?</span></p>
		<a class="inner-button inner-button--outline" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">דברו איתנו <span aria-hidden="true">←</span></a>
	</section>
</main>
<?php get_footer(); ?>
