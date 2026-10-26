	<?php if ( ! is_page( 'about' ) ) : ?>
	<!-- Closing scene -->
	<section class="cta">
		<div class="cta__stage">
			<?php if ( is_page( 'about' ) ) : ?><span class="ourstory__light cta__shared-light" aria-hidden="true"></span><?php endif; ?>
			<h2 class="cta__wordmark-title" aria-label="קרן הלל"><img src="<?php echo esc_url( hallel_content_url( 'closing_wordmark' ) ); ?>" alt="" aria-hidden="true"></h2>

		</div>
	</section>
	<?php endif; ?>

	<?php if ( ! is_page( 'about' ) ) : ?>
	<!-- ============================================================
	     Application / contact form ("הגשת מועמדות").
	     ============================================================ -->
	<section class="apply-form" id="contact">
		<div class="apply-form__card">

			<h2 class="apply-form__title"><?php echo esc_html( hallel_content_value( 'form_title' ) ); ?> <span><?php echo esc_html( hallel_content_value( 'form_title_accent' ) ); ?></span></h2>

			<?php if ( isset( $_GET['application'] ) ) : ?>
				<p class="apply-form__notice" role="status"><?php echo esc_html( 'sent' === sanitize_key( wp_unslash( $_GET['application'] ) ) ? hallel_content_value( 'form_notice_success' ) : hallel_content_value( 'form_notice_error' ) ); ?></p>
			<?php endif; ?>
			<form class="apply-form__fields" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<input type="hidden" name="action" value="hallel_application">
				<input type="hidden" name="return_url" value="<?php echo esc_url( get_permalink() . '#contact' ); ?>">
				<?php wp_nonce_field( 'hallel_application', 'hallel_application_nonce' ); ?>
				<div class="apply-form__trap" aria-hidden="true"><label for="apply-website">אתר</label><input type="text" id="apply-website" name="apply-website" tabindex="-1" autocomplete="off"></div>
				<div class="apply-form__field apply-form__field--name">
					<label for="apply-name"><?php echo esc_html( hallel_content_value( 'form_name' ) ); ?></label>
					<input type="text" id="apply-name" name="apply-name" autocomplete="name" required>
				</div>
				<div class="apply-form__field apply-form__field--phone">
					<label for="apply-phone"><?php echo esc_html( hallel_content_value( 'form_phone' ) ); ?></label>
					<input type="tel" id="apply-phone" name="apply-phone" autocomplete="tel" required>
				</div>
				<div class="apply-form__field apply-form__field--email">
					<label for="apply-email"><?php echo esc_html( hallel_content_value( 'form_email' ) ); ?></label>
					<input type="email" id="apply-email" name="apply-email" autocomplete="email" required>
				</div>
				<div class="apply-form__field apply-form__field--message">
					<label for="apply-message"><?php echo esc_html( hallel_content_value( 'form_message' ) ); ?></label>
					<textarea id="apply-message" name="apply-message" rows="2" required></textarea>
				</div>
				<button type="submit" class="apply-form__submit"><?php echo esc_html( hallel_content_value( 'form_submit' ) ); ?> <span aria-hidden="true">&larr;</span></button>
			</form>

		</div>
	</section>

	<?php endif; ?>
