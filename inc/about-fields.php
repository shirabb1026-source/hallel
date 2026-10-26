<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function hallel_about_schema() { return array(
'hero' => array('label' => '1 · הבאנר הראשי', 'fields' => array(
'hero_1' => array('כותרת קטנה','text','אודותינו'),
'hero_2' => array('כותרת — שורה ראשונה','text','הסיפור שלכם'),
'hero_3' => array('כותרת — שורה בטורקיז','text','ראוי להישמע.'),
'hero_4' => array('פסקה 1','textarea','יש יוצרים שנושאים איתם סיפור אמיתי, אבל בתחילת הדרך קשה למצוא לו מקום. קרן הלל הוקמה כדי לעזור לסיפורים האלה להגיע למסך.'),
)),
'story' => array('label' => '2 · הסיפור שלנו — ירושלים', 'fields' => array(
'story_1' => array('כותרת קטנה','text','מאיפה הכול התחיל?'),
'story_2' => array('כותרת — שורה ראשונה','text','יש מקום לעוד קולות'),
'story_3' => array('כותרת — שורה בטורקיז','text','בקולנוע שלנו.'),
'story_4' => array('פסקה 1','textarea','קרן הלל קמה מתוך אהבה לקולנוע ומתוך אמונה שסרט יכול לגעת בחיים שלנו כאן — במה שחשוב לנו, במה שמאתגר אותנו ובדרך שבה אנחנו מבינים את עצמנו כחברה.'),
'story_5' => array('פסקה 2','textarea','סרט הוא קול אישי של יוצר, ובאותו זמן גם חלק מהסיפור הישראלי שכולנו חולקים. לכן חשוב לנו להיות שם דווקא בצעדים הראשונים, כשקול חדש עוד מחפש את המקום שלו.'),
'story_6' => array('פסקה 3','textarea','אנחנו רוצים שיוצרים ירגישו שיש מי שמאמין בהם גם כשהסיפור שלהם שונה ממה שכבר התרגלנו לראות. שיוכלו ליצור מתוך מה שבאמת חשוב להם, ולתת לסיפור הזה להגיע לקהל.'),
)),
'principles' => array('label' => '3 · מה חשוב לנו בדרך', 'fields' => array(
'principles_1' => array('כותרת קטנה','text','מה חשוב לנו בדרך?'),
'principles_2' => array('כותרת — שורה ראשונה','text','לתת אמון ביוצר.'),
'principles_3' => array('כותרת — שורה בטורקיז','text','ולתת לסיפור מקום.'),
'principles_4' => array('מספר שורה 01','text','01'),
'principles_5' => array('ערך 1 — כותרת','text','סיפור שיש בו משמעות'),
'principles_6' => array('פסקה 1','textarea','אנחנו מאמינים ביצירה שנוגעת בחיים כאן, מעוררת מחשבה ומשאירה משהו גם אחרי שהמסך מחשיך.'),
'principles_7' => array('מספר שורה 02','text','02'),
'principles_8' => array('ערך 2 — כותרת','text','הקול של היוצר קודם'),
'principles_9' => array('פסקה 2','textarea','לקרן אין אג׳נדה שהיא מבקשת להלביש על סרט. חשוב לנו שהיצירה תהיה נאמנה למי שיוצר אותה, גם כשהיא אינה נוחה או צפויה.'),
'principles_10' => array('מספר שורה 03','text','03'),
'principles_11' => array('ערך 3 — כותרת','text','מקום גם למי שלא נשמע'),
'principles_12' => array('פסקה 3','textarea','לאורך השנים נשמע בקולנוע רק חלק מהקולות. אנחנו רוצים להרחיב את המעגל ולתת מקום אמיתי גם למבט אחר.'),
)),
'timeline' => array('label' => '4 · אחרי 7 באוקטובר', 'fields' => array(
'timeline_1' => array('כותרת קטנה','text','אחרי 7 באוקטובר'),
'timeline_2' => array('כותרת — שורה ראשונה','text','יותר מתמיד,'),
'timeline_3' => array('כותרת — שורה בטורקיז','text','צריך להקשיב גם לקול אחר.'),
'timeline_4' => array('פסקה 1','textarea','מאז 7 באוקטובר, השאלה אילו קולות אנחנו שומעים ואילו לא נעשתה עבורנו דחופה יותר. ראינו עד כמה חשוב שיהיה מקום לשאלות, לנקודות מבט שונות ולסיפורים שלא הולכים בתלם.'),
'timeline_5' => array('פסקה 2','textarea','לא תמיד קל לשמוע קול שמערער על מה שמוכר לנו. אבל דווקא שם יכול להתחיל שיח אמיתי. אנחנו רוצים לתת ליוצרים את הביטחון להביא את הסיפור שלהם כפי שהם רואים אותו — בכנות, בלי להתנצל.'),
)),
 ); }
function hallel_about_value( $key ) {
 $values = get_post_meta( get_queried_object_id(), '_hallel_about_content', true );
 if ( is_array( $values ) && array_key_exists( $key, $values ) ) return $values[$key];
 foreach ( hallel_about_schema() as $group ) if ( isset( $group['fields'][$key] ) ) return $group['fields'][$key][2];
 return '';
}
add_action( 'add_meta_boxes_page', function( $post ) {
 $show = 'about' === $post->post_name;
 if ( ! $show && function_exists( 'pll_get_post_translations' ) ) {
  $about_page = get_page_by_path( 'about' );
  if ( $about_page ) {
   $translations = array_map( 'intval', pll_get_post_translations( $about_page->ID ) );
   $show = in_array( (int) $post->ID, $translations, true );
  }
 }
 if ( $show ) add_meta_box( 'hallel-about-content', 'תוכן עמוד אודותינו', 'hallel_about_metabox', 'page', 'normal', 'high' );
});
function hallel_about_metabox( $post ) {
 wp_nonce_field( 'hallel_save_about', 'hallel_about_nonce' );
 $values = get_post_meta( $post->ID, '_hallel_about_content', true );
 echo '<div class="hallel-home-help"><strong>עריכת אודותינו — לפי סדר העמוד</strong><br>פתחי את האזור שתרצי לערוך. הכותרת מחולקת לשורה רגילה ולשורה בטורקיז, והפסקאות נפרדות כדי לשמור על העיצוב.<br>לשמירת השינויים לחצי על <strong>עדכון</strong>. התפריט והפוטר נערכים באזור התוכן הכללי של האתר.</div>';
 hallel_render_fields( hallel_about_schema(), is_array($values) ? $values : array(), 'hallel_about' );
 hallel_fields_assets();
}
add_action( 'save_post_page', function( $post_id ) {
 if ( ! isset($_POST['hallel_about_nonce']) || ! wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['hallel_about_nonce'])), 'hallel_save_about' ) ) return;
 if ( (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || wp_is_post_revision($post_id) || ! current_user_can('edit_page',$post_id) ) return;
 if ( ! isset($_POST['hallel_about']) || ! is_array($_POST['hallel_about']) ) return;
 $input = wp_unslash($_POST['hallel_about']); $values = array();
 foreach ( hallel_about_schema() as $group ) foreach ( $group['fields'] as $key => $field ) {
  if ( isset($input[$key]) && is_scalar($input[$key]) ) $values[$key] = 'textarea' === $field[1] ? sanitize_textarea_field($input[$key]) : sanitize_text_field($input[$key]);
 }
 update_post_meta($post_id, '_hallel_about_content', $values);
});
