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
 
<h3><a style="background-color:#FF6347;color: white;margin:10px;font-size: 50px;"><?php echo wp_kses_post("&nbsp;&nbsp;".$item_sl."&nbsp;&nbsp;");?></a><a href="<?php echo get_permalink($item_post_id)?>" style="color:#393939; text-decoration: none;">&nbsp;&nbsp;<?php echo wp_kses_post($item_post_title )?></a>&nbsp;&nbsp;</h3>

<div>
<div style="width:30%;padding:0 10px 0 0;float:left;">
<a href="<?php echo get_permalink($item_post_id)?>">
<?php $url = wp_get_attachment_image_url( get_post_thumbnail_id($item_post_id), 'medium' ); ?>
<img src="<?php echo esc_url($url) ?>" /></a>
</div>

<div style="width:20%;padding:0 10px 0 0;float:left;">
<div id="vote<?php echo esc_attr($item_id); ?>">
<div onclick="Rexp_upvote(<?php echo esc_attr($item_id); ?>);"><img src="<?php echo $this->plugin_url.'assets/u.png'?>" alt="" width="80"/></div>
<br/><br/>
<div onclick="Rexp_downvote(<?php echo esc_attr($item_id); ?>);"><img src="<?php echo $this->plugin_url.'assets/d.png'?>" alt="" width="80"/></div>

</div></div>

<div style="width:45%;padding:0 10px 0 0;float:left;">
<a href="<?php echo get_permalink($item_post_id)?>" class="row-title" id="" style="color:#393939; text-decoration: none"><?php $content = strip_tags($item_post_content); echo substr($content, 0, 150); ?>
</a>
</div>

<div style="clear:both;"></div>
</div>
<br/>