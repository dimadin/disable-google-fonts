<?php

/**
 * The Disable Google Fonts Plugin
 *
 * Disable enqueuing of Open Sans and other fonts used by WordPress from Google.
 *
 * @package Disable_Google_Fonts
 * @subpackage Main
 */

/**
 * Plugin Name: Disable Google Fonts
 * Plugin URI:  http://blog.milandinic.com/wordpress/plugins/disable-google-fonts/
 * Description: Disable enqueuing of Open Sans and other fonts used by WordPress from Google.
 * Author:      Milan Dinić
 * Author URI:  http://blog.milandinic.com/
 * Version:     1.3
 * Text Domain: disable-google-fonts
 * Domain Path: /languages/
 * License:     GPL
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit;

class Disable_Google_Fonts {
	/**
	 * Hook actions and filters.
	 * 
	 * @since 1.0
	 * @access public
	 */
	public function __construct() {
		add_filter( 'gettext_with_context', array( $this, 'disable_open_sans'             ), 888, 4 );
		add_action( 'after_setup_theme',    array( $this, 'register_theme_fonts_disabler' ), 1      );
	}

	/**
	 * Add action links to plugins page.
	 *
	 * @since 1.2
	 * @deprecated 1.3
	 * @access public
	 *
	 * @param array  $links       Plugin's action links.
	 * @param string $plugin_file Path to the plugin file.
	 * @return array $links Plugin's action links.
	 */
	public function action_links( $links, $plugin_file ) {
		_deprecated_function( __METHOD__, '1.3' );

		return $links;
	}

	/**
	 * Force 'off' as a result of Open Sans font toggler string translation.
	 *
	 * @since 1.0
	 * @access public
	 *
	 * @param  string $translations Translated text.
	 * @param  string $text         Text to translate.
	 * @param  string $context      Context information for the translators.
	 * @param  string $domain       Text domain. Unique identifier for retrieving translated strings.
	 * @return string $translations Translated text.
	 */
	public function disable_open_sans( $translations, $text, $context, $domain ) {
		if ( 'Open Sans font: on or off' == $context && 'on' == $text ) {
			$translations = 'off';
		}

		return $translations;
	}

	/**
	 * Force 'off' as a result of Lato font toggler string translation.
	 *
	 * @since 1.0
	 * @access public
	 *
	 * @param  string $translations Translated text.
	 * @param  string $text         Text to translate.
	 * @param  string $context      Context information for the translators.
	 * @param  string $domain       Text domain. Unique identifier for retrieving translated strings.
	 * @return string $translations Translated text.
	 */
	public function disable_lato( $translations, $text, $context, $domain ) {
		if ( 'Lato font: on or off' == $context && 'on' == $text ) {
			$translations = 'off';
		}

		return $translations;
	}

	/**
	 * Force 'off' as a result of Source Sans Pro font toggler string translation.
	 *
	 * @since 1.0
	 * @access public
	 *
	 * @param  string $translations Translated text.
	 * @param  string $text         Text to translate.
	 * @param  string $context      Context information for the translators.
	 * @param  string $domain       Text domain. Unique identifier for retrieving translated strings.
	 * @return string $translations Translated text.
	 */
	public function disable_source_sans_pro( $translations, $text, $context, $domain ) {
		if ( 'Source Sans Pro font: on or off' == $context && 'on' == $text ) {
			$translations = 'off';
		}

		return $translations;
	}

	/**
	 * Force 'off' as a result of Bitter font toggler string translation.
	 *
	 * @since 1.0
	 * @access public
	 *
	 * @param  string $translations Translated text.
	 * @param  string $text         Text to translate.
	 * @param  string $context      Context information for the translators.
	 * @param  string $domain       Text domain. Unique identifier for retrieving translated strings.
	 * @return string $translations Translated text.
	 */
	public function disable_bitter( $translations, $text, $context, $domain ) {
		if ( 'Bitter font: on or off' == $context && 'on' == $text ) {
			$translations = 'off';
		}

		return $translations;
	}

	/**
	 * Force 'off' as a result of Noto Sans font toggler string translation.
	 *
	 * @since 1.1
	 * @access public
	 *
	 * @param  string $translations Translated text.
	 * @param  string $text         Text to translate.
	 * @param  string $context      Context information for the translators.
	 * @param  string $domain       Text domain. Unique identifier for retrieving translated strings.
	 * @return string $translations Translated text.
	 */
	public function disable_noto_sans( $translations, $text, $context, $domain ) {
		if ( 'Noto Sans font: on or off' == $context && 'on' == $text ) {
			$translations = 'off';
		}

		return $translations;
	}

	/**
	 * Force 'off' as a result of Noto Serif font toggler string translation.
	 *
	 * @since 1.1
	 * @access public
	 *
	 * @param  string $translations Translated text.
	 * @param  string $text         Text to translate.
	 * @param  string $context      Context information for the translators.
	 * @param  string $domain       Text domain. Unique identifier for retrieving translated strings.
	 * @return string $translations Translated text.
	 */
	public function disable_noto_serif( $translations, $text, $context, $domain ) {
		if ( 'Noto Serif font: on or off' == $context && 'on' == $text ) {
			$translations = 'off';
		}

		return $translations;
	}

	/**
	 * Force 'off' as a result of Inconsolata font toggler string translation.
	 *
	 * @since 1.1
	 * @access public
	 *
	 * @param  string $translations Translated text.
	 * @param  string $text         Text to translate.
	 * @param  string $context      Context information for the translators.
	 * @param  string $domain       Text domain. Unique identifier for retrieving translated strings.
	 * @return string $translations Translated text.
	 */
	public function disable_inconsolata( $translations, $text, $context, $domain ) {
		if ( 'Inconsolata font: on or off' == $context && 'on' == $text ) {
			$translations = 'off';
		}

		return $translations;
	}

	/**
	 * Force 'off' as a result of Merriweather font toggler string translation.
	 *
	 * @since 1.2
	 * @access public
	 *
	 * @param  string $translations Translated text.
	 * @param  string $text         Text to translate.
	 * @param  string $context      Context information for the translators.
	 * @param  string $domain       Text domain. Unique identifier for retrieving translated strings.
	 * @return string $translations Translated text.
	 */
	public function disable_merriweather( $translations, $text, $context, $domain ) {
		if ( 'Merriweather font: on or off' == $context && 'on' == $text ) {
			$translations = 'off';
		}

		return $translations;
	}

	/**
	 * Force 'off' as a result of Montserrat font toggler string translation.
	 *
	 * @since 1.2
	 * @access public
	 *
	 * @param  string $translations Translated text.
	 * @param  string $text         Text to translate.
	 * @param  string $context      Context information for the translators.
	 * @param  string $domain       Text domain. Unique identifier for retrieving translated strings.
	 * @return string $translations Translated text.
	 */
	public function disable_montserrat( $translations, $text, $context, $domain ) {
		if ( 'Montserrat font: on or off' == $context && 'on' == $text ) {
			$translations = 'off';
		}

		return $translations;
	}

	/**
	 * Force 'off' as a result of Libre Franklin font toggler string translation.
	 *
	 * @since 1.3
	 * @access public
	 *
	 * @param  string $translations Translated text.
	 * @param  string $text         Text to translate.
	 * @param  string $context      Context information for the translators.
	 * @param  string $domain       Text domain. Unique identifier for retrieving translated strings.
	 * @return string $translations Translated text.
	 */
	public function disable_libre_franklin( $translations, $text, $context, $domain ) {
		if ( 'Libre Franklin font: on or off' == $context && 'on' == $text ) {
			$translations = 'off';
		}

		return $translations;
	}

	/**
	 * Register filters that disable fonts for bundled themes.
	 *
	 * This filters can be directly hooked as Disable_Google_Fonts::disable_open_sans()
	 * but that would mean that comparison is done on each string
	 * for each font which creates performance issues.
	 *
	 * Instead we check active template's name very late and just once
	 * and hook appropriate filters.
	 *
	 * Note that Open Sans disabler is used for both WordPress core
	 * and for Twenty Twelve theme.
	 *
	 * @since 1.0
	 * @access public
	 *
	 * @uses get_template() To get name of the active parent theme.
	 * @uses add_filter()   To hook theme specific fonts disablers.
	 */
	public function register_theme_fonts_disabler() {
		$template = get_template();

		switch ( $template ) {
			case 'twentyseventeen' :
				add_filter( 'gettext_with_context', array( $this, 'disable_libre_franklin'  ), 888, 4 );
				break;
			case 'twentysixteen' :
				add_filter( 'gettext_with_context', array( $this, 'disable_merriweather'    ), 888, 4 );
				add_filter( 'gettext_with_context', array( $this, 'disable_montserrat'      ), 888, 4 );
				add_filter( 'gettext_with_context', array( $this, 'disable_inconsolata'     ), 888, 4 );
				break;
			case 'twentyfifteen' :
				add_filter( 'gettext_with_context', array( $this, 'disable_noto_sans'       ), 888, 4 );
				add_filter( 'gettext_with_context', array( $this, 'disable_noto_serif'      ), 888, 4 );
				add_filter( 'gettext_with_context', array( $this, 'disable_inconsolata'     ), 888, 4 );
				break;
			case 'twentyfourteen' :
				add_filter( 'gettext_with_context', array( $this, 'disable_lato'            ), 888, 4 );
				break;
			case 'twentythirteen' :
				add_filter( 'gettext_with_context', array( $this, 'disable_source_sans_pro' ), 888, 4 );
				add_filter( 'gettext_with_context', array( $this, 'disable_bitter'          ), 888, 4 );
				break;
		}
	}
}

/* Although it would be preferred to do this on hook,
 * load early to make sure Open Sans is removed
 */
$disable_google_fonts = new Disable_Google_Fonts;