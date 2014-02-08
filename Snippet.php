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
$wgAutoloadClasses['BricksetSnippet'] = __DIR__ . '/BricksetSnippet.body.php';

$wgAPIModules['bricksetsnippet'] = 'BricksetSnippetAPI';

$wgExtensionMessagesFiles['BricksetSnippet'] = __DIR__ . '/BricksetSnippet.i18n.php';