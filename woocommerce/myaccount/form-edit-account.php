<?php
/**
 * Edit account form
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.7.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_edit_account_form' ); ?>

<div class="bg-white rounded-lg shadow-md p-6 lg:p-8">
	<h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
		<i class="ri-user-settings-line text-primary"></i>
		Hesap Bilgileri
	</h2>

	<form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >

		<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

		<div class="grid md:grid-cols-2 gap-6 mb-6">
			<div class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
				<label for="account_first_name"><?php esc_html_e( 'Ad', 'woocommerce' ); ?>&nbsp;<span class="required text-red-500">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
			</div>
			<div class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
				<label for="account_last_name"><?php esc_html_e( 'Soyad', 'woocommerce' ); ?>&nbsp;<span class="required text-red-500">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
			</div>
		</div>

		<div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="account_display_name"><?php esc_html_e( 'Görünen ad', 'woocommerce' ); ?>&nbsp;<span class="required text-red-500">*</span></label>
			<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" />
			<span class="text-xs text-gray-500 mt-1 block"><em><?php esc_html_e( 'Adınız yorumlarda ve hesabınızda bu şekilde görünecektir.', 'woocommerce' ); ?></em></span>
		</div>

		<div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<label for="account_email"><?php esc_html_e( 'E-posta adresi', 'woocommerce' ); ?>&nbsp;<span class="required text-red-500">*</span></label>
			<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
		</div>

		<div class="bg-blue-50 p-6 rounded-lg my-6">
			<h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
				<i class="ri-lock-password-line text-primary"></i>
				<?php esc_html_e( 'Şifre değişikliği', 'woocommerce' ); ?>
			</h3>
			<p class="text-sm text-gray-600 mb-4"><?php esc_html_e( 'Şifrenizi değiştirmek için aşağıdaki alanları doldurun.', 'woocommerce' ); ?></p>

			<div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password_current"><?php esc_html_e( 'Mevcut şifre (değiştirmek için gerekli)', 'woocommerce' ); ?></label>
				<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" />
			</div>
			<div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password_1"><?php esc_html_e( 'Yeni şifre (değiştirmek için gerekli)', 'woocommerce' ); ?></label>
				<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" />
			</div>
			<div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password_2"><?php esc_html_e( 'Yeni şifre tekrar', 'woocommerce' ); ?></label>
				<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" />
			</div>
		</div>

		<?php do_action( 'woocommerce_edit_account_form' ); ?>

		<div class="flex items-center gap-4">
			<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
			<button type="submit" class="woocommerce-Button button" name="save_account_details" value="<?php esc_attr_e( 'Değişiklikleri kaydet', 'woocommerce' ); ?>">
				<i class="ri-save-line"></i>
				<?php esc_html_e( 'Değişiklikleri kaydet', 'woocommerce' ); ?>
			</button>
			<input type="hidden" name="action" value="save_account_details" />
		</div>

		<?php do_action( 'woocommerce_edit_account_form_end' ); ?>

	</form>
</div>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>

