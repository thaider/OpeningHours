<?php

if( !defined( 'MEDIAWIKI' ) ) die( "This is an extension to the MediaWiki package and cannot be run standalone." );

$wgExtensionCredits['custom XML Tag'][] = array(
    'path' => __FILE__,
    'name' => 'OpeningHours',
    'author' => 'Tobias Haider', 
    'url' => 'https://openinghours.thai-land.at', 
    'descriptionmsg' => 'openinghours-desc',
    'version'  => '0.0.1'
);

$wgAutoloadClasses['OpeningHours'] = __DIR__ . '/OpeningHours.body.php';
$wgMessagesDirs['OpeningHours'] = __DIR__ . '/i18n';

$wgExtensionMessagesFiles['ExampleExtension'] = __DIR__ . '/OpeningHours.i18n.php';

$wgHooks['ParserFirstCallInit'][] = 'efOpeningHoursInit';
 
$wgResourceModules['ext.openinghours'] = array(
	'scripts' => array( 
		'js/opening_hours.js', 
		'js/opening_hours_table.js', 
		'js/i18next.min.js', 
		'js/moment-with-locales.min.js', 
		'js/i18n-resources.js',
		'js/ext.openinghours.js'
		),
	'styles' => 'css/opening_hours.css',
	'localBasePath' => __DIR__,
	'remoteExtPath' => 'OpeningHours',
	'position' => 'top'
);


function efOpeningHoursInit( Parser $parser ) {
	$parser->setHook( 'openinghours', array( 'OpeningHours', 'ParserHook' ) );
	$parser->setFunctionHook( 'openinghours', array( 'OpeningHours', 'ParserFunction' ) );
	return true;
}
