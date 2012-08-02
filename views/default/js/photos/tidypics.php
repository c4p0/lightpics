<?php
/**
 *
 */

?>

elgg.provide('elgg.tidypics');

elgg.tidypics.init = function() {

	if (elgg.ui.lightbox) {
		$('.elgg-lightbox, .elgg-lightbox-photo').colorbox({
			href: function() {
				if ((new RegExp("photos/image/[0-9]+", 'i')).test($(this).attr('href'))) {
					var guid = (new RegExp("photos/image/[0-9]+", 'i')).exec($(this).attr('href')).toString().substr("photos/image/".length);
					return elgg.config.wwwroot + "photos/thumbnail/" + guid + "/large";
				} else {
					return $(this).attr('href');
				}
			},
			title: function() {
				return '<h3 style="display: inline">'+ $(this).find('img').attr('title') +'</h3> - <a href="'+ $(this).attr('href') +'">'+ elgg.echo('comments') +'</a>';
			}
		});
	}

	$("#tidypics-sort").sortable({
		opacity: 0.7,
		revert: true,
		scroll: true
	});

	$('.elgg-form-photos-album-sort').submit(function() {
		var tidypics_guids = [];
		$("#tidypics-sort li").each(function(index) {
			tidypics_guids.push($(this).attr('id'));
		});
		$('input[name="guids"]').val(tidypics_guids.toString());
	});
};

elgg.register_hook_handler('init', 'system', elgg.tidypics.init);
