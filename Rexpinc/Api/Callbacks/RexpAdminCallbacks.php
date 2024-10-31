<?php 
/**
 * Callback pages
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.0.0
 * @package RankExpert
 */
namespace Rexpinc\Api\Callbacks;

use Rexpinc\Base\RexpBaseController;

class RexpAdminCallbacks extends RexpBaseController
{
	//All rank list in admin page
	public function adminDashboard()
	{
		return require_once( "$this->plugin_path/templates/admin.php" );
	}
	//Edit rank list Page
	public function adminEdit()
	{
		return require_once( "$this->plugin_path/templates/admin-list-edit.php" );
	}

}