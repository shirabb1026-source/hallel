<?php get_header(); while(have_posts()): the_post(); ?>
<main class="inner-page article-page">
 <section class="article-hero site-banner-diagonal">
  <div class="article-hero__copy"><p class="inner-kicker">מאמרים · קרן הלל</p><h1><?php the_title(); ?></h1><time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date('d.m.Y')); ?></time></div>
 </section>
 <div class="site-banner-filmstrip" aria-hidden="true"></div>
 <article class="article-reading"><div class="article-opening"><figure><img src="<?php echo esc_url(hallel_article_image()); ?>" alt="<?php echo esc_attr(get_post_meta(get_post_thumbnail_id(),'_wp_attachment_image_alt',true)); ?>"></figure><p class="article-opening__lead"><?php echo esc_html(get_the_excerpt()); ?></p></div><div class="article-content"><?php the_content(); ?></div><a class="article-read inner-button" href="<?php echo esc_url(get_post_type_archive_link('hallel_article')); ?>">חזרה לכל המאמרים <span aria-hidden="true">←</span></a></article>
 <section class="article-related">
  <h2>מאמרים באותו נושא</h2>
  <?php
  $topics = wp_get_post_terms(get_the_ID(),'hallel_article_topic',array('fields'=>'ids'));
  $related = !is_wp_error($topics) && $topics ? new WP_Query(array('post_type'=>'hallel_article','posts_per_page'=>3,'post__not_in'=>array(get_the_ID()),'tax_query'=>array(array('taxonomy'=>'hallel_article_topic','field'=>'term_id','terms'=>$topics)))) : null;
  if($related && $related->have_posts()): ?>
  <div class="articles-grid">
  <?php while($related->have_posts()): $related->the_post(); ?>
   <article class="article-card"><a class="article-card__image" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true"><img src="<?php echo esc_url(hallel_article_image()); ?>" alt="" loading="lazy"><span class="article-corners"></span></a><div class="article-card__copy"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><p><?php echo esc_html(get_the_excerpt()); ?></p><a class="inner-button" href="<?php the_permalink(); ?>">לקריאת המאמר <span aria-hidden="true">←</span></a></div></article>
  <?php endwhile; wp_reset_postdata(); ?>
  </div>
  <?php else: ?><p>מאמרים נוספים באותו נושא יופיעו כאן בהמשך.</p><?php endif; ?>
 </section>
</main>
<?php endwhile; get_footer(); ?>
