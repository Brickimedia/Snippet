<?php

$wgExtensionCredits['api'][] = array(
	'path' => __FILE__,
	'name' => 'Snippet',
	'descriptionmsg' => 'snippet-desc',
	'version' => '1.2.1',
	'author' => 'UltrasonicNXT/Adam Carter',
	'url' => 'https://github.com/Brickimedia/Snippet',
);

$wgAutoloadClasses['SnippetAPI'] = __DIR__ . '/Snippet.api.php';
$wgAutoloadClasses['Snippet'] = __DIR__ . '/Snippet.body.php';

$wgAPIModules['snippet'] = 'SnippetAPI';

$wgExtensionMessagesFiles['Snippet'] = __DIR__ . '/Snippet.i18n.php';

$wgSnippetMaxLength = 600;