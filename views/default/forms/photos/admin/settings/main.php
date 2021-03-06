<?php
/**
 * Primary settings for Elgg
 */

$plugin = $vars['plugin'];

$checkboxes = array('view_count', 'exif', 'download_link');
foreach ($checkboxes as $checkbox) {
	echo '<div>';
	echo elgg_view('input/checkbox', array(
		'name' => "params[$checkbox]",
		'value' => true,
		'checked' => (bool)$plugin->$checkbox,
	));
	echo ' ' . elgg_echo("tidypics:settings:$checkbox");
	echo '</div>';
}

// max image size
echo '<div>';
echo elgg_echo('tidypics:settings:maxfilesize');
echo elgg_view('input/text', array(
	'name' => 'params[maxfilesize]',
	'value' => $plugin->maxfilesize,
));
echo '</div>';

// Quota Size
$quota = $plugin->quota;
if (!$quota) {
	$quota = 0;
}
echo '<div>' . elgg_echo('tidypics:settings:quota');
echo elgg_view('input/text', array(
	'name' => 'params[quota]',
	'value' => $quota,
));
echo '</div>';
