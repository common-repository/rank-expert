<?php 
/**
 * shortcode initialize
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.0.0
 * @package RankExpert
 */
namespace Rexpinc\Base;

use Rexpinc\Base\RexpBaseController;

/**
* 
*/
class RexpShortCode extends RexpBaseController
{
	public function Rexp_register() {
		add_shortcode( 'rankexpert', array( $this, 'Rexp_front_post_sc' ) );
	}
	
	function Rexp_front_post_sc($atts, $content = null)
	{
		$a = shortcode_atts(array(
			'id' => '',
		), $atts);
		$list_id=$a['id'];
		require_once( "$this->plugin_path/templates/front-list.php" );
		return;
	}
}

