<?php
/**
 * Template Name: צור קשר
 */
get_header();
?>
<main class="inner-page contact-page">
	<section class="contact-stage">
		<div class="contact-stage__intro">
			<p class="inner-kicker">צור קשר</p>
			<h1>יש לכם משהו<br><span>שאתם רוצים לספר?</span></h1>
			<p>כתבו לנו. לא צריך ניסוח מושלם ולא צריך להגיע עם הכול סגור. מספיק להתחיל משיחה.</p>
			<div class="contact-stage__note"><p>אנחנו קוראים כל פנייה וחוזרים בהקדם.</p></div>
		</div>
		<div class="contact-card">
			<?php if ( isset( $_GET['application'] ) ) : ?>
			<p class="contact-card__notice" role="status"><?php echo esc_html( 'sent' === sanitize_key( wp_unslash( $_GET['application'] ) ) ? 'ההודעה הגיעה אלינו. תודה שכתבתם.' : 'משהו לא הסתדר בשליחה. נסו שוב או כתבו לנו ישירות.' ); ?></p>
			<?php endif; ?>
			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<input type="hidden" name="action" value="hallel_application">
				<input type="hidden" name="return_url" value="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
				<?php wp_nonce_field( 'hallel_application', 'hallel_application_nonce' ); ?>
				<div class="apply-form__trap" aria-hidden="true"><label for="contact-website">אתר</label><input type="text" id="contact-website" name="apply-website" tabindex="-1" autocomplete="off"></div>
				<label for="contact-name">שם</label><input id="contact-name" name="apply-name" type="text" autocomplete="name" required>
				<label for="contact-phone">טלפון</label><input id="contact-phone" name="apply-phone" type="tel" autocomplete="tel" required>
				<label for="contact-email">אימייל</label><input id="contact-email" name="apply-email" type="email" autocomplete="email" required>
				<label for="contact-message">מה תרצו לספר לנו?</label><textarea id="contact-message" name="apply-message" rows="5" required></textarea>
				<button class="inner-button" type="submit">שליחה <span aria-hidden="true">←</span></button>
			</form>
		</div>
	</section>
</main>
<?php get_footer(); ?>
