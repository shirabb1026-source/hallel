<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

/** Projects: each project is its own post ('hallel_project'), with a flexible
 *  field schema that mirrors the sectioned design of the original
 *  "קמים מחדש" page (hero, story blocks, icon goals, numbered process steps).
 *  The projects archive page (page-projects.php) and the homepage preview
 *  (front-page.php) both pull their cards from these posts, so there is a
 *  single place to edit each project's content. */
add_action( 'init', function () {
	register_post_type( 'hallel_project', array(
		'labels' => array(
			'name' => 'פרויקטים', 'singular_name' => 'פרויקט',
			'add_new_item' => 'הוספת פרויקט', 'edit_item' => 'עריכת פרויקט', 'all_items' => 'כל הפרויקטים',
		),
		'public' => true, 'show_in_rest' => true, 'menu_icon' => 'dashicons-video-alt3',
		'supports' => array( 'title', 'thumbnail', 'excerpt', 'revisions', 'author', 'page-attributes' ),
		'has_archive' => false,
		'rewrite' => array( 'slug' => 'projects', 'with_front' => false ),
	) );
} );

function hallel_project_schema() { return array(
	'hero' => array( 'label' => '1 · הבאנר הראשי', 'fields' => array(
		'hero_kicker' => array( 'כותרת קטנה', 'text', 'פרויקט' ),
		'hero_title_1' => array( 'כותרת — שורה ראשונה', 'text', 'שם' ),
		'hero_title_accent' => array( 'כותרת — שורה בטורקיז', 'text', 'הפרויקט.' ),
		'hero_lead' => array( 'טקסט פתיחה', 'richtext', '<p>משפט פתיחה קצר על הפרויקט.</p>' ),
	) ),
	'teaser' => array( 'label' => '2 · כרטיס תצוגה (ארכיון ועמוד הבית)', 'fields' => array(
		'teaser_kicker' => array( 'כרטיס — כותרת עליונה', 'text', '' ),
		'teaser_lead' => array( 'כרטיס — משפט פתיחה (מודגש)', 'text', '' ),
		'teaser_image' => array( 'תמונה ראשית (הירו + כרטיס)', 'media', '' ),
		'teaser_video' => array( 'כרטיס — וידאו רקע (אופציונלי)', 'media', '' ),
		'teaser_link_text' => array( 'כרטיס — טקסט הכפתור', 'text', 'לפרויקט' ),
	) ),
	'story_1' => array( 'label' => '3 · הסיפור — חלק ראשון', 'fields' => array(
		'story1_label' => array( 'תווית צד', 'text', 'על המיזם' ),
		'story1_title_1' => array( 'כותרת — שורה ראשונה', 'text', '' ),
		'story1_title_accent' => array( 'כותרת — שורה בטורקיז', 'text', '' ),
		'story1_text' => array( 'טקסט', 'richtext', '' ),
		'story1_photo' => array( 'תמונה (אופציונלי)', 'media', '' ),
	) ),
	'goals' => array( 'label' => '4 · למה אנחנו עושים את זה (אופציונלי)', 'fields' => array(
		'goals_kicker' => array( 'כותרת קטנה', 'text', '' ),
		'goals_title_1' => array( 'כותרת — שורה ראשונה', 'text', '' ),
		'goals_title_accent' => array( 'כותרת — שורה בטורקיז', 'text', '' ),
		'goal_1_icon' => array( 'ערך 1 — אייקון', 'media', '' ), 'goal_1_title' => array( 'ערך 1 — כותרת', 'text', '' ), 'goal_1_text' => array( 'ערך 1 — טקסט', 'richtext', '' ),
		'goal_2_icon' => array( 'ערך 2 — אייקון', 'media', '' ), 'goal_2_title' => array( 'ערך 2 — כותרת', 'text', '' ), 'goal_2_text' => array( 'ערך 2 — טקסט', 'richtext', '' ),
		'goal_3_icon' => array( 'ערך 3 — אייקון', 'media', '' ), 'goal_3_title' => array( 'ערך 3 — כותרת', 'text', '' ), 'goal_3_text' => array( 'ערך 3 — טקסט', 'richtext', '' ),
	) ),
	'story_2' => array( 'label' => '5 · הסיפור — חלק שני (אופציונלי)', 'fields' => array(
		'story2_label' => array( 'תווית צד', 'text', '' ),
		'story2_title_1' => array( 'כותרת — שורה ראשונה', 'text', '' ),
		'story2_title_accent' => array( 'כותרת — שורה בטורקיז', 'text', '' ),
		'story2_text' => array( 'טקסט', 'richtext', '' ),
	) ),
	'process' => array( 'label' => '6 · שלבים בתהליך (אופציונלי)', 'fields' => array(
		'process_kicker' => array( 'כותרת קטנה', 'text', '' ),
		'process_title_1' => array( 'כותרת — שורה ראשונה', 'text', '' ),
		'process_title_accent' => array( 'כותרת — שורה בטורקיז', 'text', '' ),
		'step_1_number' => array( 'שלב 1 — מספר', 'text', '01' ), 'step_1_title' => array( 'שלב 1 — כותרת', 'text', '' ), 'step_1_text' => array( 'שלב 1 — טקסט', 'richtext', '' ),
		'step_2_number' => array( 'שלב 2 — מספר', 'text', '02' ), 'step_2_title' => array( 'שלב 2 — כותרת', 'text', '' ), 'step_2_text' => array( 'שלב 2 — טקסט', 'richtext', '' ),
		'step_3_number' => array( 'שלב 3 — מספר', 'text', '03' ), 'step_3_title' => array( 'שלב 3 — כותרת', 'text', '' ), 'step_3_text' => array( 'שלב 3 — טקסט', 'richtext', '' ),
	) ),
); }

function hallel_project_value( $post_id, $key ) {
	$values = get_post_meta( $post_id, '_hallel_project_content', true );
	if ( is_array( $values ) && array_key_exists( $key, $values ) && '' !== $values[ $key ] ) { return $values[ $key ]; }
	foreach ( hallel_project_schema() as $group ) { if ( isset( $group['fields'][ $key ] ) ) { return $group['fields'][ $key ][2]; } }
	return '';
}
function hallel_project_url( $post_id, $key ) {
	$value = hallel_project_value( $post_id, $key );
	$value = preg_replace( '#^https?://assets/#i', 'assets/', $value );
	return 0 === strpos( $value, 'assets/' ) ? get_stylesheet_directory_uri() . '/' . $value : $value;
}

add_action( 'add_meta_boxes_hallel_project', function ( $post ) {
	add_meta_box( 'hallel-project-content', 'תוכן הפרויקט', 'hallel_project_metabox', 'hallel_project', 'normal', 'high' );
} );

function hallel_project_metabox( $post ) {
	wp_nonce_field( 'hallel_save_project', 'hallel_project_nonce' );
	$values = get_post_meta( $post->ID, '_hallel_project_content', true );
	echo '<div class="hallel-home-help"><strong>עריכת הפרויקט — לפי סדר העמוד</strong><br>פתחי את האזור שתרצי לערוך. "למה אנחנו עושים את זה", "הסיפור — חלק שני" ו"שלבים בתהליך" הם אופציונליים — אם תשאירי את הכותרת שלהם ריקה, האזור לא יוצג בעמוד.<br>תמונת הכרטיס/הבאנר הראשי נלקחת מה"תמונה ראשית" (Featured Image) בצד העמוד. לשמירה לחצי על <strong>פרסום</strong> / <strong>עדכון</strong>.</div>';
	hallel_render_fields( hallel_project_schema(), is_array( $values ) ? $values : array(), 'hallel_project' );
	hallel_fields_assets();
}

add_action( 'save_post_hallel_project', function ( $post_id ) {
	if ( ! isset( $_POST['hallel_project_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['hallel_project_nonce'] ) ), 'hallel_save_project' ) ) { return; }
	if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || wp_is_post_revision( $post_id ) || ! current_user_can( 'edit_post', $post_id ) ) { return; }
	if ( ! isset( $_POST['hallel_project'] ) || ! is_array( $_POST['hallel_project'] ) ) { return; }
	$input = wp_unslash( $_POST['hallel_project'] ); $values = array();
	foreach ( hallel_project_schema() as $group ) { foreach ( $group['fields'] as $key => $field ) {
		if ( ! isset( $input[ $key ] ) || ! is_scalar( $input[ $key ] ) ) { continue; }
		if ( 'media' === $field[1] ) { $values[ $key ] = hallel_sanitize_media_value( $input[ $key ] ); }
		elseif ( 'url' === $field[1] ) { $values[ $key ] = esc_url_raw( $input[ $key ] ); }
		elseif ( 'richtext' === $field[1] ) { $values[ $key ] = wp_kses_post( $input[ $key ] ); }
		else { $values[ $key ] = sanitize_text_field( $input[ $key ] ); }
	} }
	update_post_meta( $post_id, '_hallel_project_content', $values );
} );

add_action( 'admin_enqueue_scripts', function ( $hook ) {
	global $post_type;
	if ( in_array( $hook, array( 'post.php', 'post-new.php' ), true ) && 'hallel_project' === $post_type ) { wp_enqueue_media(); }
} );
