<?php

$wgExtensionCredits['api'][] = array(
	'path' => __FILE__,
	'name' => 'BricksetSnippet',
	'descriptionmsg' => 'bricksetsnippet-desc',
	'version' => '1.0',
	'author' => 'UltrasonicNXT/Adam Carter',
	'url' => 'https://github.com/Brickimedia/BricksetSnippet',
);

$wgAutoloadClasses['BricksetSnippetAPI'] = __DIR__ . '/BricksetSnippet.api.php';

$wgAPIModules['bricksetsnippet'] = 'BricksetSnippetAPI';

$wgExtensionMessagesFiles['myextension'] = __DIR__ . '/BricksetSnippet.i18n.php';