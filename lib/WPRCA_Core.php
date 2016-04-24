<?php

/**
 * Core class of the plugin that bootstraps all the functionality.
 *
 * @since 1.0.0
 * @author Martin Krcho <martin@mojandroid.sk>
 */
class WPRCA_Core {

		public static function init() {
			$wprca_admin =  new WPRCA_Admin();
			$wprca_admin->init();

			//	add calls to other init functions here.
		}

}
