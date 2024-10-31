<?php
/**
 * 
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.0.0
 * @package RankExpert
 */
?>

<?php //wp_enqueue_media()); ?>
<?php add_thickbox(); ?>
<?php
global $wpdb;

$list_id = isset($_GET['edit']) ? intval($_GET['edit']) : 0;

$list_details = $wpdb->get_results(
    $wpdb->prepare("SELECT * from " .Rexpinc\Base\RexpDBTableCall::Rexp_ranklist_table(). "  WHERE list_id=$list_id", ""), ARRAY_A
);
foreach ($list_details as $key => $list_value) {
        $wp_post_id=$list_value['post_id'];
}



$post_details = $wpdb->get_results(
    $wpdb->prepare("SELECT * from " .Rexpinc\Base\RexpDBTableCall::Rexp_posts_table(). "  WHERE ID=$wp_post_id", ""), ARRAY_A
);
foreach ($post_details as $key => $post_value) {
        $post_title=$post_value['post_title'];}
        ?>


<input type="hidden" id="new_list_id" value="<?php echo esc_attr( $list_id); ?>">

<div class="wrap">
<h1 class="wp-heading-inline"><?php echo wp_kses_post( $post_title); ?></h1>
<a href="post.php?post=<?php echo esc_attr($wp_post_id);?>&action=edit" class="page-title-action">Edit Title</a>
<hr class="wp-header-end">
<div class="landing-body">
<div style="display: inline-block; width:70%; float: left;">

<div id="allcontents">
<?php
$item_details = $wpdb->get_results(
    $wpdb->prepare("SELECT * from " .Rexpinc\Base\RexpDBTableCall::Rexp_rankitem_table(). "  WHERE list_id=$list_id", ""), ARRAY_A
);
$item_sl=1;
foreach ($item_details as $key => $item_value) {
        $item_id=$item_value['item_id'];
        $item_post_id=$item_value['post_id']; ?>

      
        <?php
        require( "$this->plugin_path/modules/admin-item-list.php" );


 $item_sl++;
}
?>
<input type="hidden" id="new_no" value="<?php echo esc_attr( $item_sl); ?>">
</div>
<br/>

<?php
require_once( "$this->plugin_path/modules/admin-add-item.php" );
?>
</div>

<div style="display: inline-block; width:27%; float: right;">
<?php require_once( "$this->plugin_path/modules/right-panel.php" ); ?>
</div></div>


<div id="delete_item_popup" style="display:none;">
<br/><br/><br/><br/><br/><br/>
<h1  style="text-align:center;">Do you permenently delete the item?</h1>
<div id="delete_item_button" style="text-align:center;"></div>
</div>