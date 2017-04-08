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
		return OpeningHours::PrintOpeningHours( $text, $parser );
	}
	
	public static function ParserFunction( $parser, $text = '' ) {
		return array( OpeningHours::PrintOpeningHours( $text, $parser ), 'noparse' => true, 'isHTML' => true );
	}
	
	public static function PrintOpeningHours( $text, $parser ) {
		global $wgOut;
		wfProfileIn( __METHOD__ );
		$parser->getOutput()->addModules( 'ext.openinghours' );

		$out = '<div class="openinghourstable" data-openinghours="' . $text . '">
			</div>';
		wfProfileOut( __METHOD__ );
		return $out;
		}
}
