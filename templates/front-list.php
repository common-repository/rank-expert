<?php
/**
 * 
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.0.0
 * @package RankExpert
 */
?>
<input type="hidden" id="upvote_url" value="<?php echo esc_url($this->plugin_url.'assets/u.png'); ?>">
<input type="hidden" id="downvote_url" value="<?php echo esc_url($this->plugin_url.'assets/d.png'); ?>">
<input type="hidden" id="upvote_purl" value="<?php echo esc_url($this->plugin_url.'assets/u_p.png'); ?>">
<input type="hidden" id="downvote_purl" value="<?php echo esc_url($this->plugin_url.'assets/d_p.png'); ?>">

<?php
global $wpdb;
$item_details = $wpdb->get_results(
    $wpdb->prepare("SELECT * from " .Rexpinc\Base\RexpDBTableCall::Rexp_rankitem_table(). "  WHERE list_id=$list_id ORDER by vote DESC", ""), ARRAY_A
);
$item_sl=1;

foreach ($item_details as $key => $item_value) {
        $item_id=$item_value['item_id'];
        $item_post_id=$item_value['post_id']; 
        ?>
        
        <?php
        require( "$this->plugin_path/modules/front-item.php" );

$item_sl++;
}
?>