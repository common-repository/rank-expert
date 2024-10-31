<?php
/**
 * creating database
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.0.0
 * @package RankExpert
 */
namespace Rexpinc\Base;

class RexpActivate
{
	public static function Rexp_activate() {
	// create database table
	global $wpdb;
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';

$sql1 = "	CREATE TABLE `".$wpdb->prefix."Rexp_ranklist` (
		`list_id` int(20) NOT NULL AUTO_INCREMENT,
		`uid` int(11) NOT NULL,
		`post_id` int(20) NOT NULL,
		PRIMARY KEY (`list_id`)
		) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1";

		dbDelta($sql1);

$sql2 = "	CREATE TABLE `".$wpdb->prefix."Rexp_rankitem` (
	`item_id` int(20) NOT NULL AUTO_INCREMENT,
	`list_id` int(20) NOT NULL,
	`post_id` int(20) NOT NULL,
	`vote` int(20) NOT NULL DEFAULT 0,
	`upvote` int(11) NOT NULL DEFAULT 0,
	`downvote` int(11) NOT NULL DEFAULT 0,
	PRIMARY KEY (`item_id`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1";

		dbDelta($sql2);


	 flush_rewrite_rules();

	}




}
