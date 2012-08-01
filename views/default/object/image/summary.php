<?php
/**
 * Summary of an image for lists/galleries
 *
 * @uses $vars['entity'] TidypicsImage
 *
 * @author Cash Costello
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2
 */

$image = elgg_extract('entity', $vars);


$header = elgg_view('output/url', array(
	'text' => $image->getTitle(),
	'href' => $image->getURL(),
	'is_trusted' => true,
	'class' => 'tidypics-heading',
));

$body = elgg_view_entity_icon($image, 'small', array(
	'href' => $image->getURL(),
	'img_class' => 'tidypics-photo',
	'encode_text' => false,
	'is_trusted' => true,
	'link_class' => 'tidypics-lightbox elgg-lightbox-photo',
));

/*
$footer = elgg_view('output/url', array(
	'text' => $image->getContainerEntity()->name,
	'href' => $image->getContainerEntity()->getURL(),
	'is_trusted' => true,
));
$footer .= '<div class="elgg-subtext">' . elgg_echo('album:num', array($album->getSize())) . '</div>';
*/

$params = array(
	'footer' => $footer,
);
echo elgg_view_module('tidypics-image', $header, $body, $params);
