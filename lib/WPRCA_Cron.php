<?php

/**
 * Handles setting up the cron jobs.
 * 
 * @author Martin Krcho <martin@mojandroid.sk>
 * @since 1.0.0
 */
class WPRCA_Cron {

	/**
	 * @var string Name of the WordPress hook.
	 */
	const HOOK_NAME = 'wprca_worker';

	/**
	 * @var string Interval name.
	 */
	const INTERVAL = 'hourly';

	public function __construct() {

	add_action(self::HOOK_NAME, array($this, 'sync_with_data_sources'));
	add_action('wp', array($this, 'setup_schedule'));
	}

	/**
	 * On an early action hook, check if the hook is scheduled - if not, schedule it.
	 */
	public function setup_schedule() {
	if (!wp_next_scheduled(self::HOOK_NAME)) {
		wp_schedule_event(time(), self::INTERVAL, self::HOOK_NAME);
	}
	}

	/**
	 * On activation, set a time, frequency and name of an action hook to be scheduled.
	 */
	public function activate() {
	wp_schedule_event(time(), self::INTERVAL, self::HOOK_NAME);
	}

	/**
	 * On the scheduled action hook, run the function.
	 */
	public function sync_with_data_sources() {

	    //  run the cron job task
	    $worker = new WPRCA_Revisions();
	    $worker->delete_revisions_older_than(800);
	    
	
	self::setup_schedule();
	}

	/**
	 * On deactivation, remove all functions from the scheduled action hook.
	 */
	public function deactivation() {
	wp_clear_scheduled_hook(self::HOOK_NAME);
	}

}
