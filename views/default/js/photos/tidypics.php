<?php
/**
 *
 */

?>

elgg.provide('elgg.tidypics');

elgg.tidypics.init = function() {

	if ($.colorbox) {
		$(".elgg-gallery .tidypics-lightbox").colorbox({
			onComplete: function() {
				$('#cboxLoadedContent .elgg-page-topbar, #cboxLoadedContent .elgg-page-header, ' +
					'#cboxLoadedContent .elgg-page-footer, #cboxLoadedContent .elgg-sidebar').css('display', 'none');
				$('#cboxLoadedContent .elgg-layout').css('background-image', 'none');
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
