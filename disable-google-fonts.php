<?php

/**
 * The Disable Google Fonts Plugin
 *
 * Disable enqueuing of fonts from Google by WordPress core, default themes, Gutenberg, and many more
 *
 * @package Disable_Google_Fonts
 * @subpackage Main
 */

/**
 * Plugin Name: Disable Google Fonts
 * Plugin URI:  https://milandinic.com/wordpress/plugins/disable-google-fonts/
 * Description: Disable enqueuing of fonts from Google used by WordPress core, default themes, Gutenberg, and many more.
 * Author:      Milan Dinić
 * Author URI:  https://milandinic.com/
 * Version:     2.0
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
		add_filter( 'gettext_with_context', array( $this, 'disable_google_fonts' ), 888, 4 );
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
	 * Force 'off' as a result of font toggler string translation.
	 *
	 * @since 2.0
	 * @access public
	 *
	 * @param  string $translations Translated text.
	 * @param  string $text         Text to translate.
	 * @param  string $context      Context information for the translators.
	 * @param  string $domain       Text domain. Unique identifier for retrieving translated strings.
	 * @return string $translations Translated text.
	 */
	public function disable_google_fonts( $translations, $text, $context, $domain ) {
		switch ( $text ) {
			case 'on':
				// Pass for most cases.
				if ( $this->is_ending_with_font_toggler( $context ) || in_array( $context, $this->get_font_toggler_variants() ) ) {
					$translations = 'off';
				}
				break;
			case 'Noto Serif:400,400i,700,700i':
				if ( 'Google Font Name and Variants' === $context ) {
					$translations = 'off';
				}
				break;
		}

		return $translations;
	}

	/**
	 * Check if text is ending with variation of 'font(s):( )on or off'.
	 *
	 * For most strings that are used as font togglers, context is ending
	 * with this text. This method checks if that is the case.
	 *
	 * @since 2.0
	 * @access public
	 *
	 * @param string $text Text to check.
	 * @return bool Whether text is ending with phrase or not.
	 */
	public function is_ending_with_font_toggler( $text ) {
		if ( preg_match( '/font[s]?:\s?on or off$/i', $text ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Get context variants that cannot be detected with string font toggler checker.
	 *
	 * @since 2.0
	 *
	 * @return array
	 */
	public function get_font_toggler_variants() {
		return array(
			'arimo:on or off',
			'Assistant:on or off',
			'Atma: on or off',
			'Crimson Text: on or off',
			'Dancing Script: on or off',
			'Droid sans: on or off',
			'Google font: on',
			'Google Font for body text: on or off',
			'Google Font for heading text: on or off',
			'Google Font for menu text: on or off',
			'Google fonts: "on" or "off"',
			'Great Vibes:on or off',
			'greatvibes:on or off',
			'Hind: on or off',
			'Indie Flower: on or off',
			'Josefin Sans: on or off',
			'Lato: on or off',
			'Lato:on or off',
			'Lato : on or off',
			'Lobster:on or off',
			'Lora: on or off',
			'Merriweather: on or off',
			'Merriweather:on or off',
			'montserrat:on or off',
			'Muli: on or off',
			'Nunito Sans: on or off',
			'Open Sans',
			'Open Sans:on or off',
			'Open Sans: on or off',
			'opensans:on or off',
			'Open Sans : on or off',
			'Oswald:on or off',
			'oswald:on or off',
			'Oxygen: on or off',
			'Pacifico: on or off',
			'Pacifico:on or off',
			'pacifico:on or off',
			'Poppins: on or off',
			'playball:on or off',
			'Playfair Display: on or off',
			'Product Sans: on or off',
			'pt_sans:on or off',
			'Raleway: on or off',
			'Roboto',
			'Roboto: on or off',
			'roboto:on or off',
			'Roboto:on or off',
			'Roboto : on or off',
			'Roboto Condensed',
			'Roboto Condensed:on or off',
			'roboto_condensed:on or off',
			'robotocondensed:on or off',
			'Roboto Slab:on or off',
			'Sail:on or off',
			'Scada:on or off',
			'scada:on or off',
			'Shadows Into Light: on or off',
		);
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
