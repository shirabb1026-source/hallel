<?php
/**
 * Fallback template (required for a valid theme).
 */
get_header();
?>
<main class="container" style="padding-block:60px;">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article <?php post_class(); ?>>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div><?php the_excerpt(); ?></div>
	</article>
<?php endwhile; else : ?>
	<p>לא נמצא תוכן.</p>
<?php endif; ?>
</main>
<?php
get_footer();
