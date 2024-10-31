<?php
/**
 *All link in plugins page initialize
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.0.0
 * @package RankExpert
 */
namespace Rexpinc\Base;

use Rexpinc\Base\RexpBaseController;

class RexpSettingsLinks extends RexpBaseController
{
	public function Rexp_register() 
	{
		add_filter( "plugin_action_links_$this->plugin", array( $this, 'Rexp_settings_link' ) );
	}

	public function Rexp_settings_link( $links ) 
	{
		$settings_link = '<a href="admin.php?page=rank-expert">Ranking List</a>';
		array_push( $links, $settings_link );
		return $links;
	}
}