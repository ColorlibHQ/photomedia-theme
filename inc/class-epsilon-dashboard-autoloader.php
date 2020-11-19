<?php

/**
 * Epsilon Dashboard  Autoloader
 *
 * @package Photomedia
 * @since   1.1.0
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Class Epsilon_Dashboard_Autoloader
 */
class Epsilon_Dashboard_Autoloader {
	/**
	 * Epsilon_dashboard_Autoloader constructor.
	 */
	public function __construct() {

		spl_autoload_register( array( $this, 'load' ) );
	}

	/**
	 * This function loads the necessary files
	 *
	 * @param string $class CLASS NAME.
	 */
	public function load( $class = '' ) {

		/**
		 * All classes are prefixed with Photomedia_
		 */
		$parts = explode( '_', $class );
		$bind  = implode( '-', $parts );

		/**
		 * We provide working directories
		 */
		$directories = array(
			PHOTOMEDIA_DIR_PATH_LIB ,
			PHOTOMEDIA_DIR_PATH_LIB . 'epsilon-framework/',
			PHOTOMEDIA_DIR_PATH_LIB . 'epsilon-theme-dashboard/',
			PHOTOMEDIA_DIR_PATH_LIB . 'epsilon-theme-dashboard/inc/',
			PHOTOMEDIA_DIR_PATH_LIB . 'epsilon-theme-dashboard/inc/helpers/',
			PHOTOMEDIA_DIR_PATH_LIB . 'epsilon-theme-dashboard/inc/misc/',
			PHOTOMEDIA_DIR_PATH_LIB . 'epsilon-theme-dashboard/inc/misc/demo-generators/',
			PHOTOMEDIA_DIR_PATH_LIB . 'epsilon-theme-dashboard/inc/misc/epsilon-tracking/',
			PHOTOMEDIA_DIR_PATH_LIB . 'epsilon-theme-dashboard/inc/misc/epsilon-tracking/trackers/',
		);

		/**
		 * Loop through them, if we find the class .. we load it !
		 */
		foreach ( $directories as $directory ) {
			if ( file_exists( $directory . 'class-' . strtolower( $bind ) . '.php' ) ) {
				require_once $directory . 'class-' . strtolower( $bind ) . '.php';

				return;
			}
		}


	}
}

new Epsilon_Dashboard_Autoloader();
