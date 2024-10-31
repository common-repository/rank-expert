<?php
/**
 * Deactivate 
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.0.0
 * @package RankExpert
 */
namespace Rexpinc\Base;

class RexpDeactivate
{
	public static function Rexp_deactivate() {
		flush_rewrite_rules();
		
	}
}