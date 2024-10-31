<?php
/**
 * 
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.0.0
 * @package RankExpert
 */
namespace Rexpinc;

final class RexpInit
{
	/**
	 * Store all the classes inside an array
	 * @return array Full list of classes
	 */
	public static function Rexp_get_services() 
	{
		return [
			Pages\RexpAdmin::class,
			Base\RexpShortCode::class,
			Base\RexpAdminEnqueue::class,
			Base\RexpEnqueue::class,
			Base\RexpSettingsLinks::class,
			Base\RexpAjaxCall::class
		];
	}

	/**
	 * Loop through the classes, initialize them, 
	 * and call the register() method if it exists
	 * @return
	 */
	public static function Rexp_register_services() 
	{
		foreach ( self::Rexp_get_services() as $class ) {
			$service = self::Rexp_instantiate( $class );
			if ( method_exists( $service, 'Rexp_register' ) ) {
				$service->Rexp_register();
			}
		}
	}

	/**
	 * Initialize the class
	 * @param  class $class    class from the services array
	 * @return class instance  new instance of the class
	 */
	private static function Rexp_instantiate( $class )
	{
		$service = new $class();

		return $service;
	}
}