<?php
/*
Plugin Name: Paid Memberships Pro - Pay By Check Custom Text Strings
Plugin URI: https://github.com/ipokkel/pmpro-pbc-custom/
Description: Customization of translation strings for your Paid Memberships Pro - Pay By Check Add On
Version: .1
Author: Paid Memberships Pro
Author URI: https://www.paidmembershipspro.com
Text Domain: pmpro-pbc-custom
*/

/*
	Load plugin textdomain.
*/
function pmpropbccstm_load_textdomain() {
  load_plugin_textdomain( 'pmpro-pbc-custom', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'pmpropbccstm_load_textdomain' );

function my_pbc_text_strings( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'Check' :
			$translated_text = __( 'Cheque/Bank Transfer', 'pmpro-pbc-custom' );
			break;
		case 'Pay by Check' :
			$translated_text = __( 'Pay by Cheque or Bank Transfer', 'pmpro-pay-by-check' );
			break;
	}
	return $translated_text;
}
add_filter( 'gettext', 'my_pbc_text_strings', 20, 3 );

// Uncomment the following section to allow text overrides of the Pay By Check text strings for backend administration pages
/* 
// Start Pay By Check text strings for backend administration pages
function my_pbc_admin_text_strings( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'Pay by Check Settings' :
			$translated_text = __( 'Pay by Cheque Settings', 'pmpro-pay-by-check' );
			break;
		case 'Change this setting to allow or disallow the pay by check option for this level.' :
			$translated_text = __( 'Change this setting to allow or disallow the pay by cheque option for this level.', 'pmpro-pay-by-check' );
			break;
		case 'Allow Pay by Check:' :
			$translated_text = __( 'Allow Pay by Cheque:', 'pmpro-pay-by-check' );
			break;
		case 'Yes. Users choose between default gateway and check.' :
			$translated_text = __( 'Yes. Users choose between default gateway and cheque.', 'pmpro-pay-by-check' );
			break;
		case 'Yes. Users can only pay by check.' :
			$translated_text = __( 'Yes. Users can only pay by cheque.', 'pmpro-pay-by-check' );
			break;
	}
	return $translated_text;
}
add_filter( 'gettext', 'my_pbc_admin_text_strings', 20, 3 );
// END Pay By Check text strings for backend administration pages
*/

/* Tell PMPro to load custom confirmation template page */

function pmpro_custom_override_confirmation_page( $templates, $page_name, $type, $where, $ext ) {
	if ( ( $page_name === 'confirmation' ) ) {
		array_splice( $templates, 1, 0, dirname(__FILE__) . '/pages/confirmation.php' );
	}
	return $templates;
}
add_filter( 'pmpro_pages_custom_template_path', 'pmpro_custom_override_confirmation_page', 10, 5 );

/* Tell PMPro to load custom invoice template page */

function pmpro_custom_override_invoice_page( $templates, $page_name, $type, $where, $ext ) {
	if ( ( $page_name === 'invoice' ) ) {
		array_splice( $templates, 1, 0, dirname(__FILE__) . '/pages/invoice.php' );
	}
	return $templates;
}
add_filter( 'pmpro_pages_custom_template_path', 'pmpro_custom_override_invoice_page', 10, 5 );
