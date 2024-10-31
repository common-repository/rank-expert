<?php
/**
 * Plugin Name: Rank Expert
 * Description: Rank Expert is a wordpress plugin. Anyone can vote your selected post. Its easy to create and manage.
 * Version: 1.0.0
 * Author: WePupil
 * Author URI: https://wepupil.com/
 * Plugin URI: https://plugins.wepupil.com/
 * License:	GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: Rank-Expert
 *
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.0.0
 * @package RankExpert
 */

// If this file is called firectly, abort!!!
defined( 'ABSPATH' ) or die( 'This is restricted.' );

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function Rexp_activate() {
	Rexpinc\Base\RexpActivate::Rexp_activate();
}
register_activation_hook( __FILE__, 'Rexp_activate' );

/**
 * The code that runs during plugin deactivation
 */
function Rexp_deactivate() {
	Rexpinc\Base\RexpDeactivate::Rexp_deactivate();
}
register_deactivation_hook( __FILE__, 'Rexp_deactivate' );

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Rexpinc\\RexpInit' ) ) {
	Rexpinc\RexpInit::Rexp_register_services();
}