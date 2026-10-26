<?php
/** Editable articles with their own archive and reading view. */
add_action( 'init', function () {
 register_post_type( 'hallel_article', array(
  'labels' => array( 'name'=>'מאמרים', 'singular_name'=>'מאמר', 'add_new_item'=>'הוספת מאמר', 'edit_item'=>'עריכת מאמר', 'all_items'=>'כל המאמרים' ),
  'public'=>true, 'show_in_rest'=>true, 'menu_icon'=>'dashicons-media-document',
  'supports'=>array('title','editor','excerpt','thumbnail','revisions','author'),
  'has_archive'=>'articles', 'rewrite'=>array('slug'=>'articles','with_front'=>false),
 ) );
 register_taxonomy('hallel_article_topic','hallel_article',array('label'=>'נושאי מאמרים','public'=>true,'hierarchical'=>true,'show_in_rest'=>true,'rewrite'=>false));
 if ( ! get_option( 'hallel_articles_setup_v1' ) ) {
  wp_insert_post(array(
   'post_type'=>'hallel_article','post_status'=>'publish',
   'post_title'=>'לתת לקול האישי מקום','post_name'=>'a-place-for-your-voice',
   'post_excerpt'=>'מחשבות על הצעד הראשון ביצירה, על הקשבה ועל הסיפורים שמחכים להגיע למסך.',
   'post_content'=>'<p>כל סרט מתחיל באדם שמבקש לספר משהו. לפעמים זה זיכרון, לפעמים שאלה שלא מרפה, ולפעמים רגע קטן שמאיר משהו גדול בחיים שלנו כאן.</p><h2>מתחילים במה שקרוב ללב</h2><p>לא תמיד צריך לדעת מראש לאן הסיפור יוביל. אפשר להתחיל ממפגש, מדמות או ממקום שמסקרן אותנו. ההקשבה למה שעולה שם היא חלק מהיצירה עצמה.</p><blockquote><p>לסיפור יש כוח כשהוא נאמן לקול של מי שמספר אותו.</p></blockquote><h2>מקשיבים גם למבט אחר</h2><p>קולנוע מאפשר לנו לפגוש אנשים וחוויות שאינם חלק מחיי היום־יום שלנו. כשנותנים מקום לקולות שונים, נפתח מרחב לשיחה, לסקרנות ולהיכרות.</p><h2>הדרך מהרעיון אל המסך</h2><p>הצעד הראשון לא חייב להיות מושלם. כתיבה, צילום ושיחה עם אנשים נוספים יכולים לעזור לרעיון להתבהר. מתוך הניסיון והמפגש, הסיפור מתחיל למצוא את הצורה שלו.</p>',
  ));
  flush_rewrite_rules(false);
  update_option('hallel_articles_setup_v1',1);
 }
} );
function hallel_article_image() {
 return has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(),'large') : get_stylesheet_directory_uri().'/assets/images/hero-bg.jpg';
}
add_filter('wp_nav_menu_items', function($items,$args){
 if($args->theme_location !== 'primary') return $items;
 $active = is_post_type_archive('hallel_article') || is_singular('hallel_article');
 $article = '<li><a '.($active?'class="is-current" aria-current="page" ':'').'href="'.esc_url(home_url('/articles/')).'">מאמרים</a></li>';
 return $items . $article;
},10,2);
add_filter('wp_nav_menu_objects', function($items,$args){
 if($args->theme_location !== 'primary') return $items;
 // Contact is emitted after Articles, consistently with the fallback menu.
 return array_filter($items, function($item){
  return untrailingslashit(wp_parse_url($item->url,PHP_URL_PATH) ?: '') !== untrailingslashit(wp_parse_url(hallel_content_url('nav_contact_url'),PHP_URL_PATH) ?: '');
 });
},20,2);
add_filter('wp_nav_menu_items', function($items,$args){
 if($args->theme_location !== 'primary') return $items;
 $url=hallel_content_url('nav_contact_url');
 return $items.'<li><a '.(hallel_nav_is_current($url)?'class="is-current" aria-current="page" ':'').'href="'.esc_url($url).'">'.esc_html(hallel_content_value('nav_contact')).'</a></li>';
},20,2);
