<?php 
/**
 *  enqueue scripts for admin
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.0.0
 * @package RankExpert
 */
namespace Rexpinc\Base;

use Rexpinc\Base\RexpBaseController;

/**
* 
*/
class RexpAdminEnqueue extends RexpBaseController
{
	public function Rexp_register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'Rexp_admin_enqueue' ) );
	}
	
	function Rexp_admin_enqueue() {
		// enqueue scripts for admin
		wp_register_style('Rexp_admin_style', $this->plugin_url . 'assets/admin-style.css');
		wp_enqueue_style('Rexp_admin_style');
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'Rexp_adminscript', $this->plugin_url . 'assets/admin-script.js' );
		wp_enqueue_script( 'Rexp_tabscript', $this->plugin_url . 'assets/tabscript.js' );

		wp_localize_script( 'Rexp_adminscript', 'Rexp_adminajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));     

	}
} 