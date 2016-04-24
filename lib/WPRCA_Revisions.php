<?php

/**
 * Main class for managing and deleting revisions.
 *
 * @since 1.0.0
 * @author Rastislav Lamoš <lamos.rasto@gmail.com>
 */
class WPRCA_Revisions {

	public function init() {
		add_action( 'init', array( $this, 'get_revisions' ) );
	}
	
	public function get_revisions() {
		
	}
}
