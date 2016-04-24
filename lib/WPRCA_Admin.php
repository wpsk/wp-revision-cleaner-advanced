<?php

/**
 * Core class of the plugin that bootstraps all the functionality.
 * 
 * @since 1.0.0
 * @author Nitrajka 
 */
class WPRCA_Admin {

    public function init() {
		/** Step 2 (from text above). */
		add_action( 'admin_menu', array($this, 'my_plugin_menu') );
		add_action('admin_enqueue_scripts', array($this,  'my_enqueue') );

	//  add calls to other init functions here.
    }

    public function my_plugin_menu() {
    	//step1
    	add_options_page( 'My Plugin Options', 'My Plugin', 'manage_options', 'my-unique-identifier', array($this, 'my_plugin_options') );
    }

    public function my_plugin_options() {
    	//step3
    	if ( !current_user_can( 'manage_options' ) )  {
				wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
			}

			echo '<div class="wrap">';
			echo '<p>Here is where the form would go if I actually had options.</p>';
			echo '</div>';

    }

    public function my_enqueue($hook) {

    	wp_enqueue_script( 'wprca-script' , plugins_url( 'assets/ajax.js', WPRCA_PLUGIN_INDEX ), array("jquery"), '0.0.1', 'true' );

    	wp_enqueue_style( 'style', plugins_url( 'assets/style.css', WPRCA_PLUGIN_INDEX), array(""), "0.0.1", "all" );

    }

}