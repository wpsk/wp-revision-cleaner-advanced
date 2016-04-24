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

		$posts = $this->get_posts_before_date( $date_to_delete_revisions_before );
		
		$this->delete_posts_revisions($posts);
	}

	public function get_posts_before_date( $date ) {
		// TODO: get only subset of all posts (chunks).

		$posts_params = array(
			'date_query' => array(
				array(
					'before' => array(
						'year'  => $date->format( 'Y' ),
						'month' => $date->format( 'm' ),
						'day'   => $date->format( 'd' )
					)
				)
			)
		);

		$posts_query = new WP_Query( $posts_params );

		return $posts_query->get_posts();
	}

	public function delete_posts_revisions( $posts ) {
		foreach ( $posts as $post ) {
			$post_revisions = wp_get_post_revisions( $post );

			if ( ! empty( $post_revisions ) ) {
				$this->delete_revisions( $post_revisions );
			}
		}
	}

	public function delete_revisions( $revisions ) {
		foreach ( $revisions as $revision ) {
			wp_delete_post_revision( $revision->ID );
		}
	}
}
