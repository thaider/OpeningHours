<?php

class OpeningHours {

	/**
	 * Parser hook
	 *
	 * @param string $text
	 * @param array $args
	 * @param Parser $parser
	 * @return string
	 */
	public static function ParserHook( $text, $args, $parser, $frame ) {
		return OpeningHours::PrintOpeningHours( $text );
	}
	
	public static function ParserFunction( $parser, $text = '' ) {
		return array( OpeningHours::PrintOpeningHours( $text ), 'noparse' => true, 'isHTML' => true );
	}
	
	public static function PrintOpeningHours( $text ) {
		global $wgOut;
		wfProfileIn( __METHOD__ );
		$wgOut->addModules( 'ext.openinghours' );

		$out = '<div class="openinghourstable" data-openinghours="' . $text . '">
			</div>';
		wfProfileOut( __METHOD__ );
		return $out;
		}
}
