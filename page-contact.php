<?php
/**
 * Template Name: צור קשר
 */
get_header();
?>
<main class="inner-page contact-page">
	<section class="contact-stage">
		<div class="contact-stage__intro">
			<p class="inner-kicker"><?php function_exists( 'pll_e' ) ? pll_e( 'צור קשר' ) : print( 'צור קשר' ); ?></p>
			<h1><?php function_exists( 'pll_e' ) ? pll_e( 'יש לכם משהו' ) : print( 'יש לכם משהו' ); ?><br><span><?php function_exists( 'pll_e' ) ? pll_e( 'שאתם רוצים לספר?' ) : print( 'שאתם רוצים לספר?' ); ?></span></h1>
			<p><?php function_exists( 'pll_e' ) ? pll_e( 'כתבו לנו. לא צריך ניסוח מושלם ולא צריך להגיע עם הכול סגור. מספיק להתחיל משיחה.' ) : print( 'כתבו לנו. לא צריך ניסוח מושלם ולא צריך להגיע עם הכול סגור. מספיק להתחיל משיחה.' ); ?></p>
			<div class="contact-stage__note"><p><?php function_exists( 'pll_e' ) ? pll_e( 'אנחנו קוראים כל פנייה וחוזרים בהקדם.' ) : print( 'אנחנו קוראים כל פנייה וחוזרים בהקדם.' ); ?></p></div>
		</div>
		<div class="contact-card">
			<?php if ( isset( $_GET['application'] ) ) :
				$hallel_is_sent = 'sent' === sanitize_key( wp_unslash( $_GET['application'] ) );
				$hallel_notice  = $hallel_is_sent ? 'ההודעה הגיעה אלינו. תודה שכתבתם.' : 'משהו לא הסתדר בשליחה. נסו שוב או כתבו לנו ישירות.';
				$hallel_notice  = function_exists( 'pll__' ) ? pll__( $hallel_notice ) : $hallel_notice;
			?>
			<p class="contact-card__notice" role="status"><?php echo esc_html( $hallel_notice ); ?></p>
			<?php endif; ?>
			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<input type="hidden" name="action" value="hallel_application">
				<input type="hidden" name="return_url" value="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
				<?php wp_nonce_field( 'hallel_application', 'hallel_application_nonce' ); ?>
				<div class="apply-form__trap" aria-hidden="true"><label for="contact-website"><?php function_exists( 'pll_e' ) ? pll_e( 'אתר' ) : print( 'אתר' ); ?></label><input type="text" id="contact-website" name="apply-website" tabindex="-1" autocomplete="off"></div>
				<label for="contact-name"><?php function_exists( 'pll_e' ) ? pll_e( 'שם' ) : print( 'שם' ); ?></label><input id="contact-name" name="apply-name" type="text" autocomplete="name" required>
				<label for="contact-phone"><?php function_exists( 'pll_e' ) ? pll_e( 'טלפון' ) : print( 'טלפון' ); ?></label><input id="contact-phone" name="apply-phone" type="tel" autocomplete="tel" required>
				<label for="contact-email"><?php function_exists( 'pll_e' ) ? pll_e( 'אימייל' ) : print( 'אימייל' ); ?></label><input id="contact-email" name="apply-email" type="email" autocomplete="email" required>
				<label for="contact-message"><?php function_exists( 'pll_e' ) ? pll_e( 'מה תרצו לספר לנו?' ) : print( 'מה תרצו לספר לנו?' ); ?></label><textarea id="contact-message" name="apply-message" rows="5" required></textarea>
				<button class="inner-button" type="submit"><?php function_exists( 'pll_e' ) ? pll_e( 'שליחה' ) : print( 'שליחה' ); ?> <span aria-hidden="true">←</span></button>
			</form>
		</div>
	</section>
</main>
<?php get_footer(); ?>
