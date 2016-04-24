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
			echo '<h1> Nastavenie revízii</h1>';
			echo '<p>Here is where the form would go if I actually had options.</p>';
			echo '<div class="one-half">
						<div><p>Prehľad</p></div>
						<div>
							<div class="progress">
								<p class="progress__info align_text"> Čas do ďalšieho čistenia</p>
								<p class="progress__timer align_text">00:30</p> 
								<p class="progress__info align_text">Počet čistení: 2000</p>
								<p class="progress__info align_text">Vzmazané revízie: 380000</p>
								<input class="progress__info__button" type="submit" name="delete_revisions" value="Delete revisions">
							</div>
						</div>

						
					</div>

					<div class="one-half">
						<div><p>Nastavenie</p></div>
						<form method="post">
							<div class="range_input some_padding">
								<label class="range_input__info" for="weight">Počet uchovávaných dní</label>
								<input class="range_input__info" type="range" id="weight" min="10" value="10" max="2000" step="100">
								<input class="range_input__info" type="text" name="">
							</div>
							<div class="range_input some_padding">
								<label class="range_input__info" for="weight">Počet revízii</label>
								<input class="range_input__info" type="range" id="weight" min="10" value="10" max="2000" step="100">
								<input class="range_input__info" type="text" name="">		
							</div>				
							<div>
								<input class="progress__info__button" type="submit" name="delete_revisions" value="Uložiť">
							</div>
						</form>
					</div>';
			echo '</div>';

    }

    public function my_enqueue($hook) {

    	wp_enqueue_script( 'wprca-script' , plugins_url( 'assets/ajax.js', WPRCA_PLUGIN_INDEX ), array("jquery"), '0.0.1', 'true' );

    	wp_enqueue_style( 'style', plugins_url( 'assets/style.min.css', WPRCA_PLUGIN_INDEX), array(), "0.0.1", "all" );

    }

}