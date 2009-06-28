<?php
	/**
	 * Tidypics Album RSS View
	 */

	$album = $vars['entity'];
	
	$base_url = $vars['url'] . 'mod/tidypics/thumbnail.php?file_guid=';

	// insert cover image if it exists image
	if ($album->cover) {
		// Set title
		$vars['title'] = $album->title;
		if (empty($vars['title'])) {
			$title = $vars['config']->sitename;
		} else if (empty($vars['config']->sitename)) {
			$title = $vars['title'];
		} else {
			$title = $vars['config']->sitename . ": " . $vars['title'];
		}
		$album_cover_url = $vars['url'] . 'mod/tidypics/thumbnail.php?file_guid=' . $album->cover . '&amp;size=thumb';
?>		<image>
			<url><?php echo $album_cover_url; ?></url>
			<title><![CDATA[<?php echo $title; ?>]]></title>
			<link><?php echo $album->getURL() . '?view=rss'; ?></link>
			
		</image>
<?php
	}
	
	
	$images = get_entities("object", "image", 0, "", 10, 0, false, 0, $album->guid);
	
	
	foreach ($images as $image) {
		$caption = $image->description;
		if (!$caption)
			$caption = "No caption";
?>
	<item>
		<title><?php echo $image->title; ?></title>
		<link><?php echo $image->getURL(); ?></link>
		<description><?php echo $caption; ?></description>
		<pubDate><?php echo date("r", $image->time_created); ?></pubDate>
		<guid isPermaLink="true"><?php echo $image->getURL(); ?></guid>
		<media:content url="<?php echo $base_url . $image->guid . '&amp;size=large'; ?>" medium="image" type="<?php echo $image->getMimeType(); ?>">
			<media:title><?php echo $image->title; ?></media:title>
			<media:description><?php echo $caption; ?></media:description>
			<media:thumbnail url="<?php echo $base_url . $image->guid . '&amp;size=thumb'; ?>"></media:thumbnail>
		</media:content>
	</item>
	
<?php
	}
?>