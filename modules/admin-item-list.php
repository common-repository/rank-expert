<?php
/**
 * 
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.0.0
 * @package RankExpert
 */
$item_post_details = $wpdb->get_results(
    $wpdb->prepare("SELECT * from " .Rexpinc\Base\RexpDBTableCall::Rexp_posts_table(). "  WHERE ID=$item_post_id", ""), ARRAY_A
);
foreach ($item_post_details as $key => $item_post_value) {
        $item_post_title=$item_post_value['post_title'];
        $item_post_content=$item_post_value['post_content'];
        }

        ?>

<br/>
<div class="embox" id="item_box<?php echo esc_attr( $item_id);?>">
<div class="Rexp-q"><?php echo wp_kses_post( $item_sl.".&nbsp;&nbsp;&nbsp;");?><a id="val<?php echo esc_attr( $item_id);?>" style="color:#393939"><?php echo wp_kses_post($item_post_title )?></a>&nbsp;&nbsp;
</div>
<!--  start delete button -->
<div class="Rexp-dangerBtn">
<a href="#TB_inline?width=600&height=550&inlineId=delete_item_popup" title="Delete Item" class="thickbox" onclick="Rexp_delete_item_button(<?php echo esc_attr( $item_id); ?>);">
<button class="Rexp-btn Rexp-btn_danger Rexp-tooltip" >
<span class="Rexp-tooltiptext Rexp-tooltip-bottom">Delete Item</span><span class="dashicons dashicons-trash"></span>
<i class="Rexp-icon-trash"></i>
</button></a>
</div>

<!-- End  delete button -->
<br/><br/><br/>


<div style="width:30%;padding:0 10px 0 0;float:left;">
<?php $url = wp_get_attachment_image_url( get_post_thumbnail_id($item_post_id), 'thumbnail' ); ?>
<img src="<?php echo esc_url($url) ?>" />
</div>

<div style="width:60%;padding:0 10px 0 0;float:left;">
<a class="row-title" id="" style="color:#393939"><?php echo get_the_excerpt( $item_post_id);?></a>
</div>

<div style="clear:both;"></div>
 
</div>