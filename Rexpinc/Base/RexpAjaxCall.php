<?php 
/**
 * Jquery ajax data store in mysql
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.0.0
 * @package RankExpert
 */
namespace Rexpinc\Base;

//use Rexpinc\Base\DBTableCall;

/**
* 
*/
class RexpAjaxCall
{
	public function Rexp_register() {
		add_action( 'wp_ajax_Rexp_add_list', array( $this, 'Rexp_ajax_call_add_list' ) );
		add_action( 'wp_ajax_Rexp_add_item', array( $this, 'Rexp_ajax_call_add_item' ) );

		add_action( 'wp_ajax_Rexp_delete_list', array( $this, 'Rexp_ajax_call_delete_list' ) );
		add_action( 'wp_ajax_Rexp_delete_item', array( $this, 'Rexp_ajax_call_delete_item' ) );

		add_action( 'wp_ajax_Rexp_upvote', array( $this, 'Rexp_ajax_call_upvote' ) );
		add_action( 'wp_ajax_Rexp_downvote', array( $this, 'Rexp_ajax_call_downvote' ) );
		add_action( 'wp_ajax_Rexp_upvote_press', array( $this, 'Rexp_ajax_call_upvote_press' ) );
		add_action( 'wp_ajax_Rexp_downvote_press', array( $this, 'Rexp_ajax_call_downvote_press' ) );
		add_action( 'wp_ajax_nopriv_Rexp_upvote', array( $this, 'Rexp_ajax_call_upvote' ) );
		add_action( 'wp_ajax_nopriv_Rexp_downvote', array( $this, 'Rexp_ajax_call_downvote' ) );
		add_action( 'wp_ajax_nopriv_Rexp_upvote_press', array( $this, 'Rexp_ajax_call_upvote_press' ) );
		add_action( 'wp_ajax_nopriv_Rexp_downvote_press', array( $this, 'Rexp_ajax_call_downvote_press' ) );
		
	}

	function Rexp_add_list($list_title_val,$uid_val){
		global $wpdb;

		$list_post = array(
			'post_title'    => $list_title_val,
			'post_status'   => 'publish',
			"post_type" =>"post"
		);

		$list_post_id = wp_insert_post( $list_post );


		$wpdb->insert($wpdb->prefix ."Rexp_ranklist", array(
					"uid" => $uid_val,
					"post_id" => $list_post_id,
				));

		$list_id = $wpdb->insert_id;

		$wpdb->update($wpdb->prefix ."posts", array(
			'post_content'  => "[rankexpert id=$list_id]",
		),
		array('ID' => $list_post_id));

		echo esc_attr($list_id);
		exit();
		wp_die();
	}

	function Rexp_add_item($list_id_val, $item_post_id_val){
		$post_return="";
		global $wpdb;

		$post_details = $wpdb->get_results(
			$wpdb->prepare("SELECT * from " .$wpdb->prefix ."posts  WHERE  ID = %s",$item_post_id_val), ARRAY_A

		);
		if (count($post_details) > 0) {
		foreach ($post_details as $key => $post_value){	
		$post_title=$post_value['post_title'];
		$post_content=$post_value['post_content'];}

		$wpdb->insert($wpdb->prefix ."Rexp_rankitem", array(
			"list_id" => $list_id_val,
			"post_id" => $item_post_id_val,
		));

		$item_id = $wpdb->insert_id;
	
		$url = wp_get_attachment_image_url( get_post_thumbnail_id($item_post_id_val), 'thumbnail' );
		$post_return=$post_title."#@$".wp_trim_words($post_content, 60)."#@$".$url."#@$".$item_id;
		
		}


		echo esc_attr($post_return);

		exit();
		wp_die();
		}

	function Rexp_ajax_call_add_list(){
		$list_title_val=sanitize_text_field($_POST['list_title_val']);
		$uid_val=sanitize_text_field($_POST['uid_val']);

		self::Rexp_add_list($list_title_val,$uid_val);
	}

	function Rexp_ajax_call_add_item(){
		$list_id_val=sanitize_text_field($_POST['list_id_val']);
		$item_post_id_val=sanitize_text_field($_POST['item_post_id_val']);

		self::Rexp_add_item($list_id_val,$item_post_id_val);
	}

	function Rexp_ajax_call_delete_list(){
		global $wpdb;
		$list_id=sanitize_text_field($_POST['list_id_val']);
		$wp_post_id=sanitize_text_field($_POST['wp_post_id_val']);

		$wpdb->delete($wpdb->prefix ."posts",
		array('ID' => $wp_post_id));

		$wpdb->delete($wpdb->prefix ."Rexp_ranklist",
		array('list_id' => $list_id));

		$wpdb->delete($wpdb->prefix ."Rexp_rankitem",
		array('list_id' => $list_id));

		echo esc_attr("1");
		exit();
		wp_die();
	}
	function Rexp_ajax_call_delete_item(){
		global $wpdb;
		$item_id_val=sanitize_text_field($_POST['item_id_val']);

		$wpdb->delete($wpdb->prefix ."Rexp_rankitem",
		array('item_id' => $item_id_val));

		echo esc_attr("1");
		exit();
		wp_die();
	}

	function Rexp_ajax_call_upvote(){
		global $wpdb;
		$item_id_val=sanitize_text_field($_POST['item_id_val']);
		$wpdb->query($wpdb->prepare('UPDATE '.$wpdb->prefix.'Rexp_rankitem SET vote = vote + 1 WHERE item_id= %d', $item_id_val));
		$wpdb->query($wpdb->prepare('UPDATE '.$wpdb->prefix.'Rexp_rankitem SET upvote = upvote + 1 WHERE item_id= %d', $item_id_val));

		echo esc_attr("1");
		exit();
		wp_die();
	}

	function Rexp_ajax_call_downvote(){
		global $wpdb;
		$item_id_val=sanitize_text_field($_POST['item_id_val']);
		$wpdb->query($wpdb->prepare('UPDATE '.$wpdb->prefix.'Rexp_rankitem SET vote = vote + 1 WHERE item_id= %d', $item_id_val));
		$wpdb->query($wpdb->prepare('UPDATE '.$wpdb->prefix.'Rexp_rankitem SET downvote = downvote + 1 WHERE item_id= %d', $item_id_val));

		echo esc_attr("1");
		exit();
		wp_die();
	}

	function Rexp_ajax_call_upvote_press(){
		global $wpdb;
		$item_id_val=sanitize_text_field($_POST['item_id_val']);
		$wpdb->query($wpdb->prepare('UPDATE '.$wpdb->prefix.'Rexp_rankitem SET downvote = downvote - 1 WHERE item_id= %d', $item_id_val));
		$wpdb->query($wpdb->prepare('UPDATE '.$wpdb->prefix.'Rexp_rankitem SET upvote = upvote + 1 WHERE item_id= %d', $item_id_val));

		echo esc_attr("1");
		exit();
		wp_die();
	}

	function Rexp_ajax_call_downvote_press(){
		global $wpdb;
		$item_id_val=sanitize_text_field($_POST['item_id_val']);
		$wpdb->query($wpdb->prepare('UPDATE '.$wpdb->prefix.'Rexp_rankitem SET upvote = upvote - 1 WHERE item_id= %d', $item_id_val));
		$wpdb->query($wpdb->prepare('UPDATE '.$wpdb->prefix.'Rexp_rankitem SET downvote = downvote + 1 WHERE item_id= %d', $item_id_val));

		echo esc_attr("1");
		exit();
		wp_die();
	}
}