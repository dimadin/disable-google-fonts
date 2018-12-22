<?php
/**
 * Class DisableGoogleFontsTest
 *
 * @package Disable_Google_Fonts
 * @subpackage Test
 */

/**
 * Test for Disable_Google_Fonts::disable_google_fonts().
 *
 * @since 2.0
 */
class DisableGoogleFontsTest extends WP_UnitTestCase {
	/**
	 * Test if various variations of strings and contexts disable fonts.
	 *
	 * @since 2.0
	 */
	public function test_strings_that_disable_fonts() {
		$disable_google_fonts = new Disable_Google_Fonts();

		$strings = array(
			'Advent Pro font: on or off',
			'Alegreya Sans font: on or off',
			'Anton font: on or off',
			'Archivo Narrow font: on or off',
			'Arvo font: on or off',
			'Audiowide font: on or off',
			'Barlow font: on or off',
			'Berkshire Swash font: on or off',
			'Bitter font: on or off',
			'Cabin font: on or off',
			'Carrois Gothic font: on or off',
			'Crimson Text font: on or off',
			'Cooper Hewitt font: on or off',
			'Courgette font: on or off',
			'Cousine font: on or off',
			'Dancing Script font: on or off',
			'Domine font: on or off',
			'Dosis font: on or off',
			'Droid Sans font: on or off',
			'Droid Sans Mono font: on or off',
			'Droid Serif font: on or off',
			'Fanwood Text font: on or off',
			'Font: on or off',
			'Fira Sans font: on or off',
			'Google font: on or off',
			'Google Fonts: on or off',
			'Graduate font: on or off',
			'Gudea font: on or off',
			'Heebo font: on or off',
			'Hind font: on or off',
			'Hind sans-serif font: on or off',
			'Homemade font: on or off',
			'Inconsolata font: on or off',
			'Karla font: on or off',
			'Lato font: on or off',
			'Leckerli One font: on or off',
			'libre font: on or off',
			'Libre Baskerville font: on or off',
			'Libre Franklin font: on or off',
			'libre_franklin font: on or off',
			'Lora and Lato fonts: on or off',
			'Lora font: on or off',
			'Lusitana font: on or off',
			'Merriweather font: on or off',
			'Magra font: on or off',
			'Merienda font: on or off',
			'Monda font: on or off',
			'Monserrat font: on or off',
			'Montserrat font: on or off',
			'Niconne font: on or off',
			'Nunito font: on or off',
			'Noto Sans font: on or off',
			'Noto Serif font: on or off',
			'Old Standard TT font: on or off',
			'Open Sans Condensed font: on or off',
			'Open Sans, Allerta Stencil, Alegreya Sans fonts: on or off',
			'Open Sans, Lobster fonts: on or off',
			'Open Sans font: on or off',
			'Oswald font: on or off',
			'Pacifico font: on or off',
			'Playfair Display font: on or off',
			'Playfair font: on or off',
			'Pontano Sans font: on or off',
			'Primary Font: on or off',
			'PT Mono font: on or off',
			'PT Sans font: on or off',
			'PT Sans Narrow font: on or off',
			'PT Serif font: on or off',
			'Quattrocento font: on or off',
			'Quicksand font: on or off',
			'Rajdhani font: on or off',
			'Raleway font: on or off',
			'Righteous font: on or off',
			'Roboto font: on or off',
			'Roboto font:on or off',
			'Roboto Condensed font: on or off',
			'Roboto Slab font: on or off',
			'Sacramento font:on or off',
			'Secondary Font: on or off',
			'Shadows Into Light font:on or off',
			'Site Title Font: on or off',
			'Signika Negative font: on or off',
			'Source Sans Pro font: on or off',
			'Source Serif Pro font: on or off',
			'Titillium Web font: on or off',
			'Ubuntu font: on or off',
			'Varela Round font: on or off',
			'Work Sans font: on or off',
			'work_sans font: on or off',
			'Web font: on or off',
			'Your second Google font: on or off',
			'Your third Google font: on or off',
			'Yrsa font: on or off',
		);

		foreach ( $strings as $string ) {
			$this->assertEquals( $disable_google_fonts->disable_google_fonts( 'translation', 'on', $string, 'domain' ), 'off' );
		}

		$strings = $disable_google_fonts->get_font_toggler_variants();

		foreach ( $strings as $string ) {
			$this->assertEquals( $disable_google_fonts->disable_google_fonts( 'translation', 'on', $string, 'domain' ), 'off' );
		}

		// Test non-standard strings.
		$this->assertEquals( $disable_google_fonts->disable_google_fonts( 'translation', 'Noto Serif:400,400i,700,700i', 'Google Font Name and Variants', 'domain' ), 'off' );
	}

	/**
	 * Test if various variations of strings and contexts do not disable fonts.
	 *
	 * @since 2.0
	 */
	public function test_strings_that_do_not_disable_fonts() {
		$disable_google_fonts = new Disable_Google_Fonts();

		$this->assertEquals( $disable_google_fonts->disable_google_fonts( 'translation', 'off', 'not font toggler', 'domain' ), 'translation' );
		$this->assertEquals( $disable_google_fonts->disable_google_fonts( 'translation', 'something random', 'more randomness', 'domain' ), 'translation' );
		$this->assertEquals( $disable_google_fonts->disable_google_fonts( 'translation', 'Noto Serif:400,400i,700,700i', 'not toggler', 'domain' ), 'translation' );
	}
}
