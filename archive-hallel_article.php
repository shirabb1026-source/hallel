<?php get_header(); ?>
<main class="inner-page articles-page">
 <section class="articles-hero site-banner-diagonal">
  <div class="articles-hero__copy"><p class="inner-kicker">מאמרים · קרן הלל</p><h1>מקום למחשבה.<br><span>ולמבט נוסף.</span></h1><p>על קולנוע, יצירה והסיפורים שמחברים בינינו.</p></div>
 </section>
 <div class="site-banner-filmstrip" aria-hidden="true"></div>
 <section class="articles-list">
  <div class="articles-grid">
  <?php while(have_posts()): the_post(); ?>
   <article class="article-card"><a href="<?php the_permalink(); ?>" class="article-card__image" tabindex="-1" aria-hidden="true"><img src="<?php echo esc_url(hallel_article_image()); ?>" alt="" loading="lazy"><span class="article-corners"></span></a><div class="article-card__copy"><time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date('d.m.Y')); ?></time><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><p><?php echo esc_html(get_the_excerpt()); ?></p><a class="article-read inner-button" href="<?php the_permalink(); ?>">לקריאת המאמר <span aria-hidden="true">←</span></a></div></article>
  <?php endwhile; ?>
  </div>
  <?php the_posts_pagination(array('prev_text'=>'הקודם','next_text'=>'הבא')); ?>
 </section>
</main>
<?php get_footer(); ?>
