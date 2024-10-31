<?php 
/**
 * Pages in admin
 * @author WePupil<wepupilteam@gmail.com>
 * @package RankExpert
 */
namespace Rexpinc\Pages;

use Rexpinc\Api\RexpSettingsApi;
use Rexpinc\Base\RexpBaseController;
use Rexpinc\Api\Callbacks\RexpAdminCallbacks;

/**
* 
*/
class RexpAdmin extends RexpBaseController
{
	public $settings;

	public $callbacks;

	public $pages = array();

	public $subpages = array();

	public function Rexp_register() 
	{
		$this->settings = new RexpSettingsApi();
		$this->callbacks = new RexpAdminCallbacks();

		$this->setPages();
		$this->setSubpages();



		$this->settings->addPages( $this->pages )->withSubPage( 'Rank List' )->addSubPages( $this->subpages )->Rexp_register();
	}

	public function setPages() 
	{
		$this->pages = array(
			array(
				'page_title' => 'Rank Expert', 
				'menu_title' => 'Rank Expert', 
				'capability' => 'edit_pages', 
				'menu_slug' => 'rank-expert', 
				'callback' => array( $this->callbacks, 'adminDashboard' ), 
				'icon_url' => 'dashicons-welcome-learn-more', 
				'position' => 110
			)
		);
	}

	public function setSubpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'rank-expert-add-new', 
				'page_title' => 'Edit List', 
				'menu_title' => 'Edit List', 
				'capability' => 'edit_pages', 
				'menu_slug' => 'rank-expert-edit-list', 
				'callback' => array( $this->callbacks, 'adminEdit' )
			),

		);
	}

	
}