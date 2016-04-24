jQuery(document).ready(function($) {

	var wprcaAjaxForm = $( '#wprca-ajax-form' ),
			wprcaAjaxProgressWrapper = $( '#wprca-ajax' ),
			wprcaAjaxProgressBar = wprcaAjaxProgressWrapper.find( '.wprca-ajax-progress-bar' ),
			wprcaAjaxProgressStatus = wprcaAjaxProgressWrapper.find( '.wprca-ajax-status' );

	$( wprcaAjaxForm ).submit( function(e) {
		e.preventDefault();
		var formData = $(this).serialize();

		wprcaAjaxDeleteRevisions( formData );

	});

	function wprcaAjaxDeleteRevisions( formData ) {

		$.ajax({
			url: ajaxurl,
			type: 'GET',
			dataType: 'json',
			data: {
				action: 'wprca_ajax_delete_revisions',
				form: formData,
			},
			beforeSend: function() {
				if( formData.status !== 'working' ) {
					wprcaAjaxProgress.removeClass('hidden');
				}
			},
			fail: function() {
				alert( 'sorry, revision deletion failed' );
			},
			done: function( response ) {
				if( response.status == 'working' ) {
					wprcaUpdateAjaxProgress( response.progress );
					wprcaAjaxDeleteRevisions( response );
				}
				if( response.status == 'done' ) {
					wprcaFinishAjax( response.result );
				}
			},

		});

	}

	function wprcaUpdateAjaxProgress( progress ) {
		wprcaAjaxProgress.find( '.wprca-progress-bar-progress' ).css({ 'width': progress.percentage + '%' });
		wprcaAjaxProgress.find( '.wprca-progress-bar-status' ).text( progress.done ' / ' progress.count );
	}

	function wprcaFinishAjax( result ) {
		wprcaAjaxProgress.find( '.progress-bar' ).css({ 'width': '100%' });
		wprcaAjaxProgress.find( '.progress-status' ).text( result );
	}

}
