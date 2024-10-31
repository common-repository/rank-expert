<?php

/**
 * Trigger this file on Plugin uninstall
 * 
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.0.0
 * @package RankExpert
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

// Access the database via SQL
global $wpdb;

$em_details = $wpdb->get_results(
	$wpdb->prepare("SELECT * from `".$wpdb->prefix ."Rexp_quizzes`", ""), ARRAY_A
);

foreach ($em_details as $key => $em_value) {
		$wp_post_id=$em_value['post_id'];

		$wpdb->delete($wpdb->prefix."posts",
		array('ID' => $wp_post_id));
}

$wpdb->query("DROP TABLE IF EXISTS `".$wpdb->prefix ."Rexp_ranklist`");
$wpdb->query("DROP TABLE IF EXISTS `".$wpdb->prefix ."Rexp_rankitem`");
