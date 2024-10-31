<?php 
/**
 *  enqueue Front page
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.0.0
 * @package RankExpert
 */
namespace Rexpinc\Base;

use Rexpinc\Base\RexpBaseController;

/**
* 
*/
class RexpEnqueue extends RexpBaseController
{
	public function Rexp_register() {
		add_action( 'wp_enqueue_scripts', array( $this, 'Rexp_enqueue' ) );
	}
	
	function Rexp_enqueue() {
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'Rexp_frontscript', $this->plugin_url . 'assets/front-script.js' );

		wp_localize_script( 'Rexp_frontscript', 'Rexp_frontajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));     
		 
	}
 


} 