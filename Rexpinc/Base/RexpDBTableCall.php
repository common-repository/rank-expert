<?php 
/**
 * db table function
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.0.0
 * @package RankExpert
 */
namespace Rexpinc\Base;

/**
* 
*/
class RexpDBTableCall
{

	public function Rexp_posts_table(){
		global $wpdb;
		return $wpdb->prefix ."posts";
	}

    public function Rexp_ranklist_table(){
		global $wpdb;
		return $wpdb->prefix ."Rexp_ranklist";
	}
	public function Rexp_rankitem_table(){
		global $wpdb;
		return $wpdb->prefix ."Rexp_rankitem";
	}

}