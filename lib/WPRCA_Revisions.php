<?php

/**
 * Main class for managing and deleting revisions.
 *
 * @since 1.0.0
 * @author Rastislav Lamoš <lamos.rasto@gmail.com>
 */
class WPRCA_Revisions {

	public function init() {
		add_action( 'init', array( $this, 'test' ) );
	}

	public function test() {
		$days = 30;

		$current_date = new DateTime();

		$date_to_delete_revisions_before = $current_date->sub( new DateInterval( 'P30D' ) ); //TODO: fill-in days

		$this->get_revisions_before_date( $date_to_delete_revisions_before );
	}

	public function get_revisions_before_date( $date ) {
		$revisions_params = array(
			'fields'      => 'ids',
			'post_type'   => 'revision',
			'post_status' => 'inherit',
			'date_query'  => array(
				array(
					'before' => array(
						'year'  => $date->format( 'Y' ),
						'month' => $date->format( 'm' ),
						'day'   => $date->format( 'd' )
					)
				)
			)
		);

		$revisions_query = new WP_Query( $revisions_params );

		$revisions = $revisions_query->get_posts();
	}
}
