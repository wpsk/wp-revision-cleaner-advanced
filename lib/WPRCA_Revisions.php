<?php

/**
 * Main class for managing and deleting revisions.
 *
 * @since 1.0.0
 * @author Rastislav Lamoš <lamos.rasto@gmail.com>
 */
class WPRCA_Revisions {

	public function delete_revisions_older_than( $days ) {
		$current_date = new DateTime();

		$date_to_delete_revisions_before = $current_date->sub( new DateInterval( 'P' . $days . 'D' ) );

		$revisions = $this->get_revisions_ids_before_date( $date_to_delete_revisions_before );

		$this->delete_revisions( $revisions );
	}

	public function get_revisions_ids_before_date( $date ) {
		// TODO: get only subset of all posts (chunks).
		$revisions_params = array(
			'fields'         => 'id=>parent',
			'post_type'      => 'revision',
			'post_status'    => 'inherit',
			'orderby'        => 'post_date',
			'order'          => 'ASC',
			'posts_per_page' => 500, // TODO: allow for dynamic configuration
			'date_query'     => array(
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

		return $revisions_query->get_posts();
	}

	public function get_revision_count( $revisions ) {
		return count( $revisions );
	}

	public function delete_revisions( $revisions ) {
		foreach ( $revisions as $revision_id => $post_id ) {
			wp_delete_post_revision( $revision_id );
		}
	}
}
