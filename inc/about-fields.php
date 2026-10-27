<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
function hallel_about_schema() { return array(
'hero' => array('label' => '1 · הבאנר הראשי', 'fields' => array(
'hero_1' => array('כותרת קטנה','text','אודותינו'),
'hero_2' => array('כותרת — שורה ראשונה','text','הסיפור שלכם'),
'hero_3' => array('כותרת — שורה בטורקיז','text','ראוי להישמע.'),
'hero_4' => array('טקסט הפסקה','richtext','<p>יש יוצרים שנושאים איתם סיפור אמיתי, אבל בתחילת הדרך קשה למצוא לו מקום. קרן הלל הוקמה כדי לעזור לסיפורים האלה להגיע למסך.</p>'),
)),
'story' => array('label' => '2 · הסיפור שלנו — ירושלים', 'fields' => array(
'story_1' => array('כותרת קטנה','text','מאיפה הכול התחיל?'),
'story_2' => array('כותרת — שורה ראשונה','text','יש מקום לעוד קולות'),
'story_3' => array('כותרת — שורה בטורקיז','text','בקולנוע שלנו.'),
'story_text' => array('טקסט הסקשן', 'richtext', '<p>קרן הלל קמה מתוך אהבה לקולנוע ומתוך אמונה שסרט יכול לגעת בחיים שלנו כאן — במה שחשוב לנו, במה שמאתגר אותנו ובדרך שבה אנחנו מבינים את עצמנו כחברה.</p><p>סרט הוא קול אישי של יוצר, ובאותו זמן גם חלק מהסיפור הישראלי שכולנו חולקים. לכן חשוב לנו להיות שם דווקא בצעדים הראשונים, כשקול חדש עוד מחפש את המקום שלו.</p><p>אנחנו רוצים שיוצרים ירגישו שיש מי שמאמין בהם גם כשהסיפור שלהם שונה ממה שכבר התרגלנו לראות. שיוכלו ליצור מתוך מה שבאמת חשוב להם, ולתת לסיפור הזה להגיע לקהל.</p>'),
)),
'principles' => array('label' => '3 · מה חשוב לנו בדרך', 'fields' => array(
'principles_1' => array('כותרת קטנה','text','מה חשוב לנו בדרך?'),
'principles_2' => array('כותרת — שורה ראשונה','text','לתת אמון ביוצר.'),
'principles_3' => array('כותרת — שורה בטורקיז','text','ולתת לסיפור מקום.'),
'principles_4' => array('מספר שורה 01','text','01'),
'principles_5' => array('ערך 1 — כותרת','text','סיפור שיש בו משמעות'),
'principles_6' => array('טקסט הערך','richtext','<p>אנחנו מאמינים ביצירה שנוגעת בחיים כאן, מעוררת מחשבה ומשאירה משהו גם אחרי שהמסך מחשיך.</p>'),
'principles_7' => array('מספר שורה 02','text','02'),
'principles_8' => array('ערך 2 — כותרת','text','הקול של היוצר קודם'),
'principles_9' => array('טקסט הערך','richtext','<p>לקרן אין אג׳נדה שהיא מבקשת להלביש על סרט. חשוב לנו שהיצירה תהיה נאמנה למי שיוצר אותה, גם כשהיא אינה נוחה או צפויה.</p>'),
'principles_10' => array('מספר שורה 03','text','03'),
'principles_11' => array('ערך 3 — כותרת','text','מקום גם למי שלא נשמע'),
'principles_12' => array('טקסט הערך','richtext','<p>לאורך השנים נשמע בקולנוע רק חלק מהקולות. אנחנו רוצים להרחיב את המעגל ולתת מקום אמיתי גם למבט אחר.</p>'),
)),
'timeline' => array('label' => '4 · אחרי 7 באוקטובר', 'fields' => array(
'timeline_1' => array('כותרת קטנה','text','אחרי 7 באוקטובר'),
'timeline_2' => array('כותרת — שורה ראשונה','text','יותר מתמיד,'),
'timeline_3' => array('כותרת — שורה בטורקיז','text','צריך להקשיב גם לקול אחר.'),
'timeline_text' => array('טקסט הסקשן', 'richtext', '<p>מאז 7 באוקטובר, השאלה אילו קולות אנחנו שומעים ואילו לא נעשתה עבורנו דחופה יותר. ראינו עד כמה חשוב שיהיה מקום לשאלות, לנקודות מבט שונות ולסיפורים שלא הולכים בתלם.</p><p>לא תמיד קל לשמוע קול שמערער על מה שמוכר לנו. אבל דווקא שם יכול להתחיל שיח אמיתי. אנחנו רוצים לתת ליוצרים את הביטחון להביא את הסיפור שלהם כפי שהם רואים אותו — בכנות, בלי להתנצל.</p>'),
)),
 ); }
/** Merge legacy per-paragraph values (saved before the richtext consolidation)
 *  into the new single-field keys, so nothing already written is lost. */
function hallel_about_migrate_legacy( $values ) {
 if ( ! is_array( $values ) ) { $values = array(); }
 if ( empty( $values['story_text'] ) ) {
  $parts = array();
  foreach ( array( 'story_4', 'story_5', 'story_6' ) as $legacy_key ) {
   if ( ! empty( $values[ $legacy_key ] ) ) { $parts[] = '<p>' . esc_html( $values[ $legacy_key ] ) . '</p>'; }
  }
  if ( $parts ) { $values['story_text'] = implode( '', $parts ); }
 }
 if ( empty( $values['timeline_text'] ) ) {
  $parts = array();
  foreach ( array( 'timeline_4', 'timeline_5' ) as $legacy_key ) {
   if ( ! empty( $values[ $legacy_key ] ) ) { $parts[] = '<p>' . esc_html( $values[ $legacy_key ] ) . '</p>'; }
  }
  if ( $parts ) { $values['timeline_text'] = implode( '', $parts ); }
 }
 return $values;
}
function hallel_about_value( $key ) {
 $values = hallel_about_migrate_legacy( get_post_meta( get_queried_object_id(), '_hallel_about_content', true ) );
 if ( is_array( $values ) && array_key_exists( $key, $values ) && '' !== $values[$key] ) return $values[$key];
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
 $values = hallel_about_migrate_legacy( get_post_meta( $post->ID, '_hallel_about_content', true ) );
 echo '<div class="hallel-home-help"><strong>עריכת אודותינו — לפי סדר העמוד</strong><br>פתחי את האזור שתרצי לערוך. הכותרת מחולקת לשורה רגילה ולשורה בטורקיז, ולכל סקשן יש תיבת טקסט אחת עם אפשרות לעצב (מודגש, רשימות וכו׳).<br>לשמירת השינויים לחצי על <strong>עדכון</strong>. התפריט והפוטר נערכים באזור התוכן הכללי של האתר.</div>';
 hallel_render_fields( hallel_about_schema(), $values, 'hallel_about' );
 hallel_fields_assets();
}
add_action( 'save_post_page', function( $post_id ) {
 if ( ! isset($_POST['hallel_about_nonce']) || ! wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['hallel_about_nonce'])), 'hallel_save_about' ) ) return;
 if ( (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || wp_is_post_revision($post_id) || ! current_user_can('edit_page',$post_id) ) return;
 if ( ! isset($_POST['hallel_about']) || ! is_array($_POST['hallel_about']) ) return;
 $input = wp_unslash($_POST['hallel_about']); $values = array();
 foreach ( hallel_about_schema() as $group ) foreach ( $group['fields'] as $key => $field ) {
  if ( ! isset($input[$key]) || ! is_scalar($input[$key]) ) { continue; }
  if ( 'richtext' === $field[1] ) { $values[$key] = wp_kses_post( $input[$key] ); }
  elseif ( 'textarea' === $field[1] ) { $values[$key] = sanitize_textarea_field( $input[$key] ); }
  else { $values[$key] = sanitize_text_field( $input[$key] ); }
 }
 // Preserve legacy per-paragraph values already on the post (not in the schema any more)
 // so older saved content isn't dropped from the stored array.
 $previous = get_post_meta( $post_id, '_hallel_about_content', true );
 if ( is_array( $previous ) ) {
  foreach ( array( 'story_4', 'story_5', 'story_6', 'timeline_4', 'timeline_5' ) as $legacy_key ) {
   if ( ! isset( $values[ $legacy_key ] ) && isset( $previous[ $legacy_key ] ) ) { $values[ $legacy_key ] = $previous[ $legacy_key ]; }
  }
 }
 update_post_meta($post_id, '_hallel_about_content', $values);
});
