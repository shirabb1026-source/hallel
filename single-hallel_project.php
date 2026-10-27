<?php
/**
 * Single project — content comes from the per-post "hallel_project" fields
 * (inc/project-fields.php), so every project can have the same sectioned
 * design as the original "קמים מחדש" page without a developer touching code.
 */
get_header();
the_post();
$hallel_pid = get_the_ID();
$hallel_has_photo1 = '' !== hallel_project_value( $hallel_pid, 'story1_photo' );
$hallel_has_story2 = '' !== hallel_project_value( $hallel_pid, 'story2_title_1' ) || '' !== hallel_project_value( $hallel_pid, 'story2_text' );
$hallel_has_goals  = '' !== hallel_project_value( $hallel_pid, 'goals_title_1' );
$hallel_has_process = '' !== hallel_project_value( $hallel_pid, 'process_title_1' );
?>

<main class="inner-page project-detail">
	<section class="project-detail-hero site-banner-diagonal">
		<?php if ( has_post_thumbnail() ) : ?>
		<img src="<?php echo esc_url( get_the_post_thumbnail_url( $hallel_pid, 'full' ) ); ?>" alt="">
		<?php endif; ?>
		<div class="project-detail-hero__shade" aria-hidden="true"></div>
		<div class="project-detail-hero__copy">
			<p class="inner-kicker"><?php echo esc_html( hallel_project_value( $hallel_pid, 'hero_kicker' ) ); ?></p>
			<h1><?php echo esc_html( hallel_project_value( $hallel_pid, 'hero_title_1' ) ); ?><br><span><?php echo esc_html( hallel_project_value( $hallel_pid, 'hero_title_accent' ) ); ?></span></h1>
			<?php echo wp_kses_post( hallel_project_value( $hallel_pid, 'hero_lead' ) ); ?>
		</div>
	</section>
<div class="site-banner-filmstrip" aria-hidden="true"></div>

	<section class="project-story<?php echo $hallel_has_photo1 ? ' project-story--soldier' : ''; ?>">
		<aside><span><?php echo esc_html( hallel_project_value( $hallel_pid, 'story1_label' ) ); ?></span><i></i></aside>
		<div class="project-story__title"><h2><?php echo esc_html( hallel_project_value( $hallel_pid, 'story1_title_1' ) ); ?><br><span><?php echo esc_html( hallel_project_value( $hallel_pid, 'story1_title_accent' ) ); ?></span></h2></div>
		<div class="project-story__text">
			<?php echo wp_kses_post( hallel_project_value( $hallel_pid, 'story1_text' ) ); ?>
		</div>
		<?php if ( $hallel_has_photo1 ) : ?>
		<figure class="project-story__photo"><img src="<?php echo esc_url( hallel_project_url( $hallel_pid, 'story1_photo' ) ); ?>" alt="" loading="lazy"></figure>
		<?php endif; ?>
	</section>

	<?php if ( $hallel_has_goals ) : ?>
	<section class="project-process project-goals">
		<div class="project-process__heading">
			<p class="inner-kicker"><?php echo esc_html( hallel_project_value( $hallel_pid, 'goals_kicker' ) ); ?></p>
			<h2><?php echo esc_html( hallel_project_value( $hallel_pid, 'goals_title_1' ) ); ?><br><span><?php echo esc_html( hallel_project_value( $hallel_pid, 'goals_title_accent' ) ); ?></span></h2>
		</div>
		<div class="project-process__steps">
			<?php for ( $hallel_i = 1; $hallel_i <= 3; $hallel_i++ ) :
				$hallel_title = hallel_project_value( $hallel_pid, "goal_{$hallel_i}_title" );
				if ( '' === $hallel_title ) { continue; }
				$hallel_icon = hallel_project_url( $hallel_pid, "goal_{$hallel_i}_icon" );
			?>
			<article>
				<?php if ( $hallel_icon ) : ?><div class="project-goals__icon"><img src="<?php echo esc_url( $hallel_icon ); ?>" alt="" aria-hidden="true"></div><?php endif; ?>
				<h3><?php echo esc_html( $hallel_title ); ?></h3>
				<?php echo wp_kses_post( hallel_project_value( $hallel_pid, "goal_{$hallel_i}_text" ) ); ?>
			</article>
			<?php endfor; ?>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( $hallel_has_story2 ) : ?>
	<section class="project-story">
		<aside><span><?php echo esc_html( hallel_project_value( $hallel_pid, 'story2_label' ) ); ?></span><i></i></aside>
		<div class="project-story__title"><h2><?php echo esc_html( hallel_project_value( $hallel_pid, 'story2_title_1' ) ); ?><br><span><?php echo esc_html( hallel_project_value( $hallel_pid, 'story2_title_accent' ) ); ?></span></h2></div>
		<div class="project-story__text">
			<?php echo wp_kses_post( hallel_project_value( $hallel_pid, 'story2_text' ) ); ?>
		</div>
	</section>
	<?php endif; ?>

	<?php if ( $hallel_has_process ) : ?>
	<section class="project-process">
		<div class="project-process__heading">
			<p class="inner-kicker"><?php echo esc_html( hallel_project_value( $hallel_pid, 'process_kicker' ) ); ?></p>
			<h2><?php echo esc_html( hallel_project_value( $hallel_pid, 'process_title_1' ) ); ?><br><span><?php echo esc_html( hallel_project_value( $hallel_pid, 'process_title_accent' ) ); ?></span></h2>
		</div>
		<div class="project-process__steps">
			<?php for ( $hallel_i = 1; $hallel_i <= 3; $hallel_i++ ) :
				$hallel_title = hallel_project_value( $hallel_pid, "step_{$hallel_i}_title" );
				if ( '' === $hallel_title ) { continue; }
			?>
			<article>
				<span><?php echo esc_html( hallel_project_value( $hallel_pid, "step_{$hallel_i}_number" ) ); ?></span>
				<h3><?php echo esc_html( $hallel_title ); ?></h3>
				<?php echo wp_kses_post( hallel_project_value( $hallel_pid, "step_{$hallel_i}_text" ) ); ?>
			</article>
			<?php endfor; ?>
		</div>
	</section>
	<?php endif; ?>

</main>
<?php
get_template_part( 'template-parts/site-bottom' );
get_footer();
