<?php
/** Editable content registry for the home page and global chrome. */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function hallel_content_schema() {
	return array(
		'header' => array( 'label' => 'הדר', 'fields' => array(
			'header_logo' => array( 'לוגו', 'media', 'assets/images/logo.svg' ),
			'header_cta_text' => array( 'טקסט כפתור', 'text', 'לתרומה' ),
			'header_cta_url' => array( 'קישור כפתור', 'url', '#contact' ),
			'nav_home' => array( 'עמוד הבית', 'text', 'עמוד הבית' ), 'nav_home_url' => array( 'קישור עמוד הבית', 'url', '/' ),
			'nav_about' => array( 'אודותינו', 'text', 'אודותינו' ), 'nav_about_url' => array( 'קישור אודותינו', 'url', '/about/' ),
			'nav_projects' => array( 'פרויקטים', 'text', 'פרויקטים' ), 'nav_projects_url' => array( 'קישור פרויקטים', 'url', '/#projects' ),
			'nav_partners' => array( 'שיתופי פעולה', 'text', 'שיתופי פעולה' ), 'nav_partners_url' => array( 'קישור שיתופי פעולה', 'url', '/#partners' ),
			'nav_contact' => array( 'צור קשר', 'text', 'צור קשר' ), 'nav_contact_url' => array( 'קישור צור קשר', 'url', '/#contact' ),
		) ),
		'hero' => array( 'label' => 'עמוד הבית — פתיחה', 'fields' => array(
			'hero_video' => array( 'וידאו רקע', 'media', 'assets/videos/hero-bg.mp4' ), 'hero_poster' => array( 'תמונת וידאו', 'media', 'assets/images/hero-bg.jpg' ),
			'hero_poster_mobile' => array( 'מובייל — תמונה מתחת לטקסט (1200×900, אופציונלי)', 'media', '' ), 'hero_video_mobile' => array( 'מובייל — וידאו מתחת לטקסט (1200×900, אופציונלי)', 'media', '' ),
			'hero_scene' => array( 'כיתוב סצנה', 'text', 'SCENE 01 · TAKE 02' ), 'hero_rec' => array( 'כיתוב הקלטה', 'text', 'REC' ),
			'hero_title_1' => array( 'כותרת שורה 1', 'text', 'יצירה. ציונות.' ), 'hero_title_2' => array( 'כותרת שורה 2', 'text', 'משמעות.' ),
			'hero_text' => array( 'טקסט פתיחה', 'textarea', 'קולנוע הוא הדרך שבה אנחנו מספרים מי אנחנו, מאיפה באנו ולאן אנחנו רוצים ללכת.' ),
			'hero_bold' => array( 'טקסט מודגש', 'textarea', 'קרן הלל נותנת ליוצרים את המקום, הכלים והאומץ להפוך את הסיפור שלהם לקולנוע.' ),
			'hero_tagline' => array( 'שורת סיום', 'text', 'העתיד מתחיל בסיפור שאנחנו בוחרים לספר.' ),
		) ),
		'story' => array( 'label' => 'עמוד הבית — סיפור הקרן', 'fields' => array(
			'story_title_1' => array( 'כותרת עליונה', 'text', 'קולנוע שמספר' ), 'story_title_2' => array( 'כותרת תחתונה', 'text', 'את הסיפור' ), 'story_title_accent' => array( 'מילה בצבע', 'text', 'הישראלי' ),
			'story_lead' => array( 'פסקה מודגשת', 'textarea', 'קרן הלל הוקמה מתוך מטרה אחת: לעודד ולקדם יצירה קולנועית משמעותית, ערכית ותרבותית, שמספרת את הסיפור הישראלי על כל גווניו.' ),
			'story_text_1' => array( 'פסקה שנייה', 'textarea', 'אנו מאמינים שיצירה אינה רק אמצעי לביטוי אישי, אלא כוח שמייצר שיח, מעצב תרבות ומשפיע על הזהות והעתיד שלנו. לכן אנחנו פועלים כדי לתת ליוצרים מקום, כלים ואומץ ליצור מתוך הקול האישי שלהם — יצירה חופשית, אמיצה, מגוונת ונאמנה לאמת שלהם.' ),
			'story_text_2' => array( 'פסקה שלישית', 'textarea', 'קרן הלל מבקשת להרחיב את מעגל הקולות שנשמעים בקולנוע הישראלי ולאפשר מקום גם לסיפורים, לנקודות מבט וליוצרים שלא תמיד מוצאים את מקומם בשיח המרכזי.' ),
			'story_wordmark' => array( 'לוגו רקע', 'media', 'assets/images/story-wordmark.png' ), 'story_photo_main' => array( 'תמונת כיסא', 'media', 'assets/images/story-photo-center.png' ), 'story_photo_side' => array( 'תמונה צדדית', 'media', 'assets/images/story-photo-right.png' ),
		) ),
		'initiatives' => array( 'label' => 'עמוד הבית — יוזמות', 'fields' => array(
			'initiatives_title' => array( 'כותרת', 'text', 'יוזמות ועשייה' ), 'initiatives_accent' => array( 'מילה בצבע', 'text', 'חברתית' ), 'initiatives_sub' => array( 'כותרת משנה', 'textarea', 'אנחנו פועלים כדי לתת מקום לקולות חדשים, לתמוך ביוצרים ולחבר בין קולנוע, אנשים והחברה הישראלית.' ),
			'init_1_title' => array( 'כרטיס 1 — כותרת', 'text', 'פיתוח והפקת סרטים' ), 'init_1_text' => array( 'כרטיס 1 — טקסט', 'textarea', 'יצירת חיבורים בין יוצרים, קהילות וקבוצות שונות בחברה, ועידוד שיח שמאפשר להכיר קולות וסיפורים שלא תמיד מקבלים מקום.' ), 'init_1_icon' => array( 'כרטיס 1 — אייקון', 'media', 'assets/icons/icon-init-a.svg' ),
			'init_2_title' => array( 'כרטיס 2 — כותרת', 'text', 'יוזמות ועשיה חברתיות' ), 'init_2_text' => array( 'כרטיס 2 — טקסט', 'textarea', 'ליווי מקצועי ליוצרים צעירים, מתן כלים מעשיים ותמיכה בתהליך היצירה — מהרעיון הראשון ועד לסרט המוגמר.' ), 'init_2_icon' => array( 'כרטיס 2 — אייקון', 'media', 'assets/icons/icon-community.svg' ),
			'init_3_title' => array( 'כרטיס 3 — כותרת', 'text', 'קהילה והשפעה תרבותית' ), 'init_3_text' => array( 'כרטיס 3 — טקסט', 'textarea', 'עידוד יצירה מגוונת, עצמאית ולא מתנצלת, שנותנת ליוצרים את החופש לספר את הסיפור שלהם בדרך שלהם.' ), 'init_3_icon' => array( 'כרטיס 3 — אייקון', 'media', 'assets/icons/icon-init-c.svg' ),
			'init_4_title' => array( 'כרטיס 4 — כותרת', 'text', 'טיפוח וליווי יוצרים' ), 'init_4_text' => array( 'כרטיס 4 — טקסט', 'textarea', 'תמיכה בפיתוח ובהפקה של סרטים עם תוכן משמעותי, שמביאים סיפורים ונקודות מבט שונות לקדמת הבמה.' ), 'init_4_icon' => array( 'כרטיס 4 — אייקון', 'media', 'assets/icons/icon-init-d.svg' ),
		) ),
		'projects' => array( 'label' => 'עמוד הבית — פרויקטים', 'fields' => array(
			'projects_title' => array( 'כותרת', 'text', 'הפרויקטים' ), 'projects_accent' => array( 'מילה בצבע', 'text', 'שלנו' ), 'projects_sub' => array( 'כותרת משנה', 'textarea', 'המיזמים שנועדו לתת מקום לקולות חדשים ולעזור ליוצרים להפוך את הסיפור שלהם ליצירה.' ),
			'project_1_title' => array( 'פרויקט 1 — כותרת', 'text', 'פרויקט 01 | קמים מחדש' ), 'project_1_lead' => array( 'פרויקט 1 — פתיח', 'textarea', 'כשהמצלמה הופכת לכלי של עיבוד, יצירה ושיקום.' ), 'project_1_text' => array( 'פרויקט 1 — תיאור', 'textarea', 'פרויקט המפגיש חיילים שנפצעו במלחמת ה־7 באוקטובר עם עולם הקולנוע והיצירה. באמצעות המצלמה, הכתיבה והעריכה, המשתתפים מקבלים אפשרות לעבד את חוויותיהם, לספר את הסיפור שלהם וליצור מתוך המקום שבו הם נמצאים — בדרך חזרה לחיים.' ), 'project_1_video' => array( 'פרויקט 1 — וידאו', 'media', 'assets/videos/project-1-bg.mp4' ), 'project_1_poster' => array( 'פרויקט 1 — תמונה', 'media', 'assets/images/project-1-bg.jpg' ), 'project_1_link_text' => array( 'פרויקט 1 — כפתור', 'text', 'לקריאה נוספת' ), 'project_1_link' => array( 'פרויקט 1 — קישור', 'url', '#' ),
			'project_2_title' => array( 'פרויקט 2 — כותרת', 'text', 'פרויקט 02 | ליווי פרחי יצירה' ), 'project_2_lead' => array( 'פרויקט 2 — פתיח', 'textarea', 'התכנית נועדה לאפשר ליוצרים הצעירים שנדרשים ליצור סרט גמר, ליווי מקצועי של סטודנטים לקולנוע בבתי הספר לקולנוע ברחבי הארץ.' ), 'project_2_text' => array( 'פרויקט 2 — תיאור', 'textarea', 'הפרויקט יתחיל את צעדיו הראשונים עם סטודנטים מ-3 בתי ספר: מעלה, ספיר, תורת החיים. מטרת התכנית להנגיש את הכלים המקצועיים שלומדים הסטודנטים לתלמידי התיכון. באופן הזה תלמידי המגמות יוכלו להוציא מעצמם את המיטב. כהוקרה לליווי, הסטודנטים יקבלו מלגת לימודים שתסייע להם ביצירה/מימון הלימודים.' ), 'project_2_video' => array( 'פרויקט 2 — וידאו', 'media', 'assets/videos/project-2-bg.mp4' ), 'project_2_poster' => array( 'פרויקט 2 — תמונה', 'media', 'assets/images/project-2-bg.jpg' ), 'project_2_link_text' => array( 'פרויקט 2 — כפתור', 'text', 'לקריאה נוספת' ), 'project_2_link' => array( 'פרויקט 2 — קישור', 'url', '#' ),
		) ),
		'partners' => array( 'label' => 'עמוד הבית — שיתופי פעולה', 'fields' => array(
			'partners_title' => array( 'שותפים — כותרת', 'text', 'שיתופי' ), 'partners_accent' => array( 'שותפים — מילה בצבע', 'text', 'פעולה' ), 'partners_sub' => array( 'שותפים — משנה', 'text', 'שותפים לדרך, ליצירה ולהשפעה.' ),
			'partner_1_logo' => array( 'שותף 1 — לוגו', 'media', 'assets/images/partner-1.png' ), 'partner_1_alt' => array( 'שותף 1 — שם', 'text', 'שער הנגב' ),
			'partner_2_logo' => array( 'שותף 2 — לוגו', 'media', 'assets/images/partner-2.png' ), 'partner_2_alt' => array( 'שותף 2 — שם', 'text', 'דרכא' ),
			'partner_3_logo' => array( 'שותף 3 — לוגו', 'media', 'assets/images/partner-3.png' ), 'partner_3_alt' => array( 'שותף 3 — שם', 'text', 'בית הספר לקולנוע' ),
			'partner_4_logo' => array( 'שותף 4 — לוגו', 'media', 'assets/images/partner-4.png' ), 'partner_4_alt' => array( 'שותף 4 — שם', 'text', 'מעלה' ),
			'partner_5_logo' => array( 'שותף 5 — לוגו', 'media', 'assets/images/partner-5.png' ), 'partner_5_alt' => array( 'שותף 5 — שם', 'text', 'שותף' ),
			'partner_6_logo' => array( 'שותף 6 — לוגו', 'media', 'assets/images/partner-6.png' ), 'partner_6_alt' => array( 'שותף 6 — שם', 'text', 'מכללת ספיר' ),
		) ),
		'trustees' => array( 'label' => 'עמוד הבית — חבר נאמנים', 'fields' => array(
			'trustees_title' => array( 'חבר נאמנים — כותרת', 'text', 'חבר' ), 'trustees_accent' => array( 'חבר נאמנים — מילה בצבע', 'text', 'נאמנים' ), 'trustees_sub' => array( 'חבר נאמנים — משנה', 'textarea', 'המיזמים שנועדו לתת מקום לקולות חדשים ולעזור ליוצרים להפוך את הסיפור שלהם ליצירה.' ),
			'trustee_1_name' => array( 'נאמן 1 — שם', 'text', 'לורם איפסום' ), 'trustee_1_role' => array( 'נאמן 1 — תפקיד', 'text', 'מנכ״ל עמותת' ), 'trustee_1_photo' => array( 'נאמן 1 — תמונה', 'media', 'assets/images/testimonial-1.jpg' ),
			'trustee_2_name' => array( 'נאמן 2 — שם', 'text', 'לורם איפסום' ), 'trustee_2_role' => array( 'נאמן 2 — תפקיד', 'text', 'מנכ״ל עמותת' ), 'trustee_2_photo' => array( 'נאמן 2 — תמונה', 'media', 'assets/images/testimonial-2.jpg' ),
			'trustee_3_name' => array( 'נאמן 3 — שם', 'text', 'לורם איפסום' ), 'trustee_3_role' => array( 'נאמן 3 — תפקיד', 'text', 'מנכ״ל עמותת' ), 'trustee_3_photo' => array( 'נאמן 3 — תמונה', 'media', 'assets/images/testimonial-3.jpg' ),
			'trustee_4_name' => array( 'נאמן 4 — שם', 'text', 'לורם איפסום' ), 'trustee_4_role' => array( 'נאמן 4 — תפקיד', 'text', 'מנכ״ל עמותת' ), 'trustee_4_photo' => array( 'נאמן 4 — תמונה', 'media', 'assets/images/testimonial-4.jpg' ),
			'trustee_5_name' => array( 'נאמן 5 — שם', 'text', 'לורם איפסום' ), 'trustee_5_role' => array( 'נאמן 5 — תפקיד', 'text', 'מנכ״ל עמותת' ), 'trustee_5_photo' => array( 'נאמן 5 — תמונה', 'media', 'assets/images/testimonial-5.jpg' ),
		) ),
		'ourstory' => array( 'label' => 'עמוד הבית — הסיפור שלנו', 'fields' => array(
			'ourstory_title' => array( 'הסיפור — כותרת', 'text', 'הסיפור' ), 'ourstory_title_2' => array( 'הסיפור — שורה שנייה', 'text', 'של קרן' ), 'ourstory_accent' => array( 'הסיפור — מילה בצבע', 'text', 'הלל' ), 'ourstory_text_1' => array( 'הסיפור — פסקה 1', 'textarea', 'הסיפור שלנו נולד מההבנה שפס הקול של הקולנוע הישראלי הפך עם השנים לחד-גוני מדי, והמון קולות וסיפורים נשארו בחוץ.' ), 'ourstory_text_2' => array( 'הסיפור — פסקה 2', 'textarea', 'קרן הלל כאן כדי לפתוח את הדלתות לרווחה, לתת לגיטימציה לקולות חדשים ולהביא למסך את הפסיפס האמיתי של כולנו.' ), 'ourstory_tagline' => array( 'הסיפור — שורת סיום', 'text', 'קרן הלל. קולנוע ישראלי, לא מתנצל.' ),
			'ourstory_photo_left' => array( 'הסיפור — תמונה שמאל', 'media', 'assets/images/ourstory-photo-right.png' ), 'ourstory_photo_right' => array( 'הסיפור — תמונה ימין', 'media', 'assets/images/ourstory-photo-right.png' ),
		) ),
		'closing_form' => array( 'label' => 'עמוד הבית — סיום וטופס הגשה', 'fields' => array(
			'closing_wordmark' => array( 'סיום — תמונת לוגו', 'media', 'assets/images/story-wordmark.png' ), 'form_title' => array( 'טופס — כותרת', 'text', 'הגשת' ), 'form_title_accent' => array( 'טופס — מילה בצבע', 'text', 'מועמדות' ), 'form_name' => array( 'טופס — שם', 'text', 'שם' ), 'form_phone' => array( 'טופס — טלפון', 'text', 'טלפון' ), 'form_email' => array( 'טופס — אימייל', 'text', 'אימייל' ), 'form_message' => array( 'טופס — הודעה', 'text', 'הודעה' ), 'form_submit' => array( 'טופס — כפתור', 'text', 'שלח' ), 'form_notice_success' => array( 'טופס — הודעת הצלחה', 'text', 'ההודעה נשלחה בהצלחה. נחזור אליך בהקדם.' ), 'form_notice_error' => array( 'טופס — הודעת שגיאה', 'text', 'לא הצלחנו לשלוח את ההודעה. אפשר לנסות שוב.' ),
		) ),
		'footer' => array( 'label' => 'פוטר', 'fields' => array(
			'footer_logo' => array( 'לוגו', 'media', 'assets/images/footer-logo.png' ), 'footer_reel' => array( 'תמונת סליל', 'media', 'assets/images/footer-reel.png' ),
			'footer_accessibility' => array( 'הצהרת נגישות', 'text', 'הצהרת נגישות' ), 'footer_accessibility_url' => array( 'קישור הצהרה', 'url', '#' ), 'footer_privacy' => array( 'מדיניות פרטיות', 'text', 'מדיניות פרטיות' ), 'footer_privacy_url' => array( 'קישור מדיניות', 'url', '#' ),
			'footer_facebook_icon' => array( 'אייקון Facebook', 'media', 'assets/icons/icon-social-facebook.svg' ), 'footer_facebook' => array( 'קישור Facebook', 'url', '#' ), 'footer_twitter_icon' => array( 'אייקון X', 'media', 'assets/icons/icon-social-twitter.svg' ), 'footer_twitter' => array( 'קישור X', 'url', '#' ), 'footer_youtube_icon' => array( 'אייקון YouTube', 'media', 'assets/icons/icon-social-youtube.svg' ), 'footer_youtube' => array( 'קישור YouTube', 'url', '#' ),
		) ),
	);
}

function hallel_home_groups() {
	$schema = hallel_content_schema();
	unset( $schema['header'], $schema['footer'] );
	return $schema;
}

function hallel_global_groups() {
	$schema = hallel_content_schema();
	return array( 'header' => $schema['header'], 'footer' => $schema['footer'] );
}

function hallel_home_page_id() {
	$id = (int) get_option( 'page_on_front' );
	if ( ! $id ) {
		foreach ( array( 'home', 'עמוד-הבית' ) as $slug ) {
			$page = get_page_by_path( $slug );
			if ( $page ) { $id = (int) $page->ID; break; }
		}
	}
	if ( $id && function_exists( 'pll_get_post' ) && function_exists( 'pll_current_language' ) ) {
		$lang = pll_current_language();
		if ( $lang ) {
			$translated = pll_get_post( $id, $lang );
			if ( $translated ) { $id = (int) $translated; }
		}
	}
	return $id;
}

function hallel_field_default( $key ) {
	foreach ( hallel_content_schema() as $group ) {
		if ( isset( $group['fields'][ $key ] ) ) { return $group['fields'][ $key ][2]; }
	}
	return '';
}

function hallel_is_home_field( $key ) {
	foreach ( hallel_home_groups() as $group ) {
		if ( isset( $group['fields'][ $key ] ) ) { return true; }
	}
	return false;
}

function hallel_content_value( $key ) {
	$options = get_option( 'hallel_content', array() );
	if ( hallel_is_home_field( $key ) ) {
		$home_id = hallel_home_page_id();
		if ( $home_id ) {
			$value = get_post_meta( $home_id, '_hallel_' . $key, true );
			if ( '' !== $value ) { return $value; }
		}
	} elseif ( function_exists( 'pll_current_language' ) ) {
		// Global header/footer fields aren't tied to a post, so translations
		// are kept as "{key}_{lang}" entries in the same option, falling
		// back to the Hebrew value (and then the hardcoded default) until
		// a translation has been entered.
		$lang = pll_current_language();
		$default_lang = function_exists( 'pll_default_language' ) ? pll_default_language() : '';
		if ( $lang && $lang !== $default_lang ) {
			$lang_key = $key . '_' . $lang;
			if ( isset( $options[ $lang_key ] ) && '' !== $options[ $lang_key ] ) { return $options[ $lang_key ]; }
		}
	}
	if ( isset( $options[ $key ] ) && '' !== $options[ $key ] ) { return $options[ $key ]; }
	return hallel_field_default( $key );
}

function hallel_content_url( $key ) {
	$value = hallel_content_value( $key );
	$value = preg_replace( '#^https?://assets/#i', 'assets/', $value );
	return 0 === strpos( $value, 'assets/' ) ? get_stylesheet_directory_uri() . '/' . $value : $value;
}

/** Rich-text fields are saved by the WP editor without <p> tags (like post
 *  content), so paragraphs must be restored with wpautop() when rendering. */
function hallel_richtext( $html ) {
	return wpautop( wp_kses_post( (string) $html ) );
}

function hallel_sanitize_media_value( $value ) {
	$value = trim( (string) $value );
	if ( '' === $value ) { return ''; }
	// A relative theme asset path (e.g. "assets/images/x.jpg") has no scheme and
	// doesn't start with a slash, so esc_url_raw() wrongly treats it like a bare
	// domain and prepends "http://" to it. Keep safe relative paths as-is; only
	// run real URLs (including uploaded media library URLs) through esc_url_raw().
	if ( ! preg_match( '#^[a-z0-9.+-]+://#i', $value ) && preg_match( '#^[A-Za-z0-9/_.\-]+$#', $value ) ) {
		return $value;
	}
	return esc_url_raw( $value );
}

function hallel_content_sanitize( $input ) {
	$output = array();
	$field_types = array();
	foreach ( hallel_global_groups() as $group ) foreach ( $group['fields'] as $key => $field ) { $field_types[ $key ] = $field[1]; }
	$languages = function_exists( 'pll_languages_list' ) ? pll_languages_list() : array();
	foreach ( $field_types as $key => $type ) {
		$keys = array( $key );
		foreach ( $languages as $lang_code ) { $keys[] = $key . '_' . $lang_code; }
		foreach ( array_unique( $keys ) as $k ) {
			if ( ! isset( $input[ $k ] ) ) { continue; }
			$value = wp_unslash( $input[ $k ] );
			$output[ $k ] = 'media' === $type ? hallel_sanitize_media_value( $value ) : ( 'url' === $type ? esc_url_raw( $value ) : wp_kses_post( $value ) );
		}
	}
	return $output;
}

function hallel_render_fields( $groups, $values, $name_prefix, $lang_suffix = '' ) {
	$section_index = 0;
	echo '<div class="hallel-fields-ui">';
	foreach ( $groups as $group_key => $group ) :
		$section_index++;
		$field_count = count( $group['fields'] ); ?>
		<details class="hallel-fields-section" <?php echo 1 === $section_index ? 'open' : ''; ?>>
			<summary><span class="hallel-section-title"><?php echo esc_html( $group['label'] ); ?></span><span class="hallel-section-count"><?php echo esc_html( $field_count ); ?> שדות</span><span class="hallel-chevron" aria-hidden="true"></span></summary>
			<div class="hallel-fields-grid">
			<?php foreach ( $group['fields'] as $key => $field ) :
				$field_key = $lang_suffix ? $key . '_' . $lang_suffix : $key;
				$value = isset( $values[$field_key] ) && '' !== $values[$field_key] ? $values[$field_key] : ( $lang_suffix ? '' : $field[2] );
				$preview = 0 === strpos( $value, 'assets/' ) ? get_stylesheet_directory_uri() . '/' . $value : $value;
				$is_video = 'media' === $field[1] && preg_match( '/\.(mp4|webm|mov)(\?.*)?$/i', $preview );
				$field_label = $field[0] . ( $lang_suffix ? ' (English)' : '' ); ?>
				<div class="hallel-field hallel-field--<?php echo esc_attr( $field[1] ); ?>">
					<label for="<?php echo esc_attr($field_key); ?>"><?php echo esc_html($field_label); ?></label>
					<?php if ( 'richtext' === $field[1] ) : ?>
						<div class="hallel-richtext-wrap"<?php echo $lang_suffix ? ' dir="ltr"' : ''; ?>>
						<?php wp_editor( $value, $field_key, array(
							'textarea_name' => $name_prefix . '[' . $field_key . ']',
							'textarea_rows' => 6,
							'media_buttons' => false,
							'teeny'         => true,
							'quicktags'     => false,
						) ); ?>
						</div>
					<?php elseif ( 'textarea' === $field[1] ) : ?>
						<textarea <?php echo $lang_suffix ? 'dir="ltr" placeholder="עדיין בעברית: ' . esc_attr( wp_strip_all_tags( $values[$key] ?? $field[2] ) ) . '"' : ''; ?> rows="4" id="<?php echo esc_attr($field_key); ?>" name="<?php echo esc_attr($name_prefix); ?>[<?php echo esc_attr($field_key); ?>]"><?php echo esc_textarea($value); ?></textarea>
					<?php else : ?>
						<div class="hallel-input-row"><input <?php echo ( $lang_suffix && 'media' !== $field[1] ) ? 'dir="ltr"' : ''; ?> class="hallel-<?php echo esc_attr($field[1]); ?>" type="text" id="<?php echo esc_attr($field_key); ?>" name="<?php echo esc_attr($name_prefix); ?>[<?php echo esc_attr($field_key); ?>]" value="<?php echo esc_attr($value); ?>">
						<?php if ( 'media' === $field[1] ) : ?><button type="button" class="button button-secondary hallel-media-button" data-target="<?php echo esc_attr($field_key); ?>">בחירת קובץ</button><?php endif; ?></div>
					<?php endif; ?>
					<?php if ( 'media' === $field[1] ) : ?><div class="hallel-media-preview" data-preview-for="<?php echo esc_attr($field_key); ?>"><?php if ( $is_video ) : ?><span class="dashicons dashicons-video-alt3"></span><span>קובץ וידאו נבחר</span><?php elseif ( $preview ) : ?><img src="<?php echo esc_url($preview); ?>" alt=""><?php endif; ?></div><?php endif; ?>
				</div>
			<?php endforeach; ?>
			</div>
		</details>
	<?php endforeach;
	echo '</div>';
}

function hallel_fields_assets() { ?>
	<style>
	.hallel-fields-ui{direction:rtl;max-width:1400px;margin:18px 0;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif}
	.hallel-fields-section{background:#fff;border:1px solid #d9e1e7;border-radius:10px;margin:0 0 14px;overflow:hidden;box-shadow:0 2px 8px rgba(2,37,61,.05)}
	.hallel-fields-section summary{display:flex;align-items:center;gap:12px;padding:18px 22px;cursor:pointer;background:#f7fafc;color:#062b49;list-style:none;user-select:none}
	.hallel-fields-section summary::-webkit-details-marker{display:none}.hallel-fields-section[open] summary{background:#062b49;color:#fff}
	.hallel-section-title{font-size:18px;font-weight:700}.hallel-section-count{font-size:12px;background:#08c7e9;color:#062b49;border-radius:20px;padding:4px 10px;font-weight:700}
	.hallel-chevron{margin-right:auto;width:9px;height:9px;border-left:2px solid currentColor;border-bottom:2px solid currentColor;transform:rotate(-45deg);transition:.2s}.hallel-fields-section[open] .hallel-chevron{transform:rotate(135deg)}
	.hallel-fields-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:18px 24px;padding:24px}
	.hallel-field{min-width:0}.hallel-field--textarea,.hallel-field--media,.hallel-field--richtext{grid-column:1/-1}.hallel-field label{display:block;font-weight:700;color:#173b56;margin:0 0 7px;font-size:14px}.hallel-richtext-wrap .wp-editor-container{border:1px solid #b8c8d3;border-radius:6px;overflow:hidden}
	.hallel-field input,.hallel-field textarea{width:100%;max-width:none;border:1px solid #b8c8d3;border-radius:6px;padding:9px 11px;box-sizing:border-box;background:#fff;transition:.15s}
	.hallel-field input:focus,.hallel-field textarea:focus{border-color:#08c7e9;box-shadow:0 0 0 2px rgba(8,199,233,.18);outline:0}.hallel-field textarea{min-height:92px;resize:vertical}
	.hallel-input-row{display:flex;gap:9px;align-items:center}.hallel-input-row .button{white-space:nowrap;height:39px;display:inline-flex;align-items:center;border-color:#08aeca;color:#075071;font-weight:600}
	.hallel-media-preview{margin-top:9px;min-height:42px;border:1px dashed #c8d4dc;border-radius:7px;background:#f8fbfc;padding:8px;display:flex;align-items:center;gap:8px;color:#476579}
	.hallel-media-preview:empty{display:none}.hallel-media-preview img{display:block;max-width:150px;max-height:85px;width:auto;height:auto;object-fit:contain;background:#fff;border-radius:4px}.hallel-media-preview .dashicons{font-size:28px;width:28px;height:28px;color:#08aeca}
	#hallel-home-content .inside{padding:0 18px 18px}#hallel-home-content>.postbox-header{background:#062b49;color:#fff}#hallel-home-content .hndle{color:#fff!important;font-size:18px!important}
	.hallel-home-help{background:#e9faff;border-right:4px solid #08c7e9;padding:12px 15px;border-radius:6px;color:#173b56;margin:16px 0}
	@media(max-width:900px){.hallel-fields-grid{grid-template-columns:1fr}.hallel-field{grid-column:1/-1}.hallel-input-row{align-items:stretch;flex-direction:column}.hallel-input-row .button{justify-content:center}}
	</style>
	<script>document.addEventListener('click',function(e){const button=e.target.closest('.hallel-media-button');if(!button)return;e.preventDefault();const input=document.getElementById(button.dataset.target),preview=document.querySelector('[data-preview-for="'+button.dataset.target+'"]'),frame=wp.media({title:'בחירת תמונה או וידאו',button:{text:'בחירת הקובץ'},multiple:false});frame.on('select',function(){const file=frame.state().get('selection').first().toJSON();input.value=file.url;if(preview){preview.innerHTML=file.type==='video'?'<span class="dashicons dashicons-video-alt3"></span><span>קובץ וידאו נבחר</span>':'<img src="'+file.url+'" alt="">';}});frame.open();});</script>
<?php }

function hallel_content_admin() {
	add_menu_page( 'הדר ופוטר', 'הדר ופוטר', 'edit_theme_options', 'hallel-content', 'hallel_content_screen', 'dashicons-edit-page', 3 );
}
add_action( 'admin_menu', 'hallel_content_admin' );
add_action( 'admin_init', function(){ register_setting( 'hallel_content_group', 'hallel_content', 'hallel_content_sanitize' ); } );
add_action( 'admin_enqueue_scripts', function( $hook ){
	if ( 'toplevel_page_hallel-content' === $hook || in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) { wp_enqueue_media(); }
} );

function hallel_content_screen() {
	if ( ! current_user_can( 'edit_theme_options' ) ) return;
	$values = get_option( 'hallel_content', array() );
	$languages = function_exists( 'pll_languages_list' ) ? array_diff( pll_languages_list(), array( function_exists( 'pll_default_language' ) ? pll_default_language() : '' ) ) : array(); ?>
	<div class="wrap" dir="rtl"><h1>הדר ופוטר</h1><p>כאן ניתן לערוך את האזורים הקבועים שמופיעים בכל האתר.</p>
	<form method="post" action="options.php"><?php settings_fields( 'hallel_content_group' );
	if ( $languages ) { ?>
		<h2 class="nav-tab-wrapper hallel-lang-tabs">
			<a href="#hallel-tab-default" class="nav-tab nav-tab-active" data-hallel-tab="default">עברית</a>
			<?php foreach ( $languages as $lang_code ) : ?>
			<a href="#hallel-tab-<?php echo esc_attr( $lang_code ); ?>" class="nav-tab" data-hallel-tab="<?php echo esc_attr( $lang_code ); ?>"><?php echo 'en' === $lang_code ? 'English' : esc_html( $lang_code ); ?></a>
			<?php endforeach; ?>
		</h2>
		<div id="hallel-tab-default" class="hallel-lang-panel">
			<?php hallel_render_fields( hallel_global_groups(), $values, 'hallel_content' ); ?>
		</div>
		<?php foreach ( $languages as $lang_code ) : ?>
		<div id="hallel-tab-<?php echo esc_attr( $lang_code ); ?>" class="hallel-lang-panel" style="display:none">
			<p class="hallel-home-help">שדה שנשאר ריק יוצג באתר בעברית, עד שתוזן לו תרגום כאן.</p>
			<?php hallel_render_fields( hallel_global_groups(), $values, 'hallel_content', $lang_code ); ?>
		</div>
		<?php endforeach; ?>
		<script>document.addEventListener('click',function(e){var t=e.target.closest('.hallel-lang-tabs .nav-tab');if(!t)return;e.preventDefault();document.querySelectorAll('.hallel-lang-tabs .nav-tab').forEach(function(x){x.classList.remove('nav-tab-active')});t.classList.add('nav-tab-active');document.querySelectorAll('.hallel-lang-panel').forEach(function(p){p.style.display='none'});var panel=document.getElementById('hallel-tab-'+t.dataset.hallelTab);if(panel)panel.style.display='';});</script>
	<?php } else {
		hallel_render_fields( hallel_global_groups(), $values, 'hallel_content' );
	}
	submit_button( 'שמירת הדר ופוטר' ); ?></form></div>
	<?php hallel_fields_assets();
}

add_action( 'add_meta_boxes_page', function( $post ) {
	$home_id = (int) get_option( 'page_on_front' );
	if ( ! $home_id ) {
		foreach ( array( 'home', 'עמוד-הבית' ) as $slug ) {
			$page = get_page_by_path( $slug );
			if ( $page ) { $home_id = (int) $page->ID; break; }
		}
	}
	$is_home = ( $home_id && (int) $post->ID === $home_id ) || in_array( $post->post_name, array( 'home', 'עמוד-הבית' ), true );
	if ( ! $is_home && $home_id && function_exists( 'pll_get_post_translations' ) ) {
		$translations = array_map( 'intval', pll_get_post_translations( $home_id ) );
		$is_home = in_array( (int) $post->ID, $translations, true );
	}
	if ( $is_home ) {
		add_meta_box( 'hallel-home-content', 'תוכן עמוד הבית', 'hallel_home_metabox', 'page', 'normal', 'high' );
	}
} );

function hallel_home_metabox( $post ) {
	wp_nonce_field( 'hallel_save_home_content', 'hallel_home_nonce' );
	$options = get_option( 'hallel_content', array() );
	$values = array();
	foreach ( hallel_home_groups() as $group ) foreach ( $group['fields'] as $key => $field ) {
		$meta = get_post_meta( $post->ID, '_hallel_' . $key, true );
		$values[$key] = '' !== $meta ? $meta : ( isset( $options[$key] ) && '' !== $options[$key] ? $options[$key] : $field[2] );
	}
	echo '<div class="hallel-home-help"><strong>עריכת עמוד הבית</strong><br>פתחי כל אזור, ערכי את השדות ולסיום לחצי על <strong>עדכון</strong> בראש העמוד.</div>';
	hallel_render_fields( hallel_home_groups(), $values, 'hallel_home' );
	hallel_fields_assets();
}

add_action( 'save_post_page', function( $post_id ) {
	if ( ! isset( $_POST['hallel_home_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['hallel_home_nonce'] ) ), 'hallel_save_home_content' ) ) { return; }
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
	if ( ! current_user_can( 'edit_page', $post_id ) || empty( $_POST['hallel_home'] ) || ! is_array( $_POST['hallel_home'] ) ) { return; }
	$input = wp_unslash( $_POST['hallel_home'] );
	foreach ( hallel_home_groups() as $group ) foreach ( $group['fields'] as $key => $field ) {
		$value = isset( $input[$key] ) ? $input[$key] : '';
		$value = 'media' === $field[1] ? hallel_sanitize_media_value( $value ) : ( 'url' === $field[1] ? esc_url_raw( $value ) : wp_kses_post( $value ) );
		update_post_meta( $post_id, '_hallel_' . $key, $value );
	}
} );
