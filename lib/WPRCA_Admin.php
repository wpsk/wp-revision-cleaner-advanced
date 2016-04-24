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

}