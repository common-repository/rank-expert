<?php
/**
 * 
 * @author WePupil<wepupilteam@gmail.com>
 * @version 1.0.0
 * @package RankExpert
 */
?>
<?php add_thickbox(); 
$list_uid = get_current_user_id();

global $wpdb;
$rank_list = $wpdb->get_results(
        $wpdb->prepare(
                "SELECT * from " .Rexpinc\Base\RexpDBTableCall::Rexp_ranklist_table(). " ORDER by list_id DESC", ""
        ), ARRAY_A
);
?>
			<div class="wrap">
            <h1 class="wp-heading-inline">Rank Expert</h1>
      
            <a href="#TB_inline?width=600&height=550&inlineId=add_list_popup" title="" class="thickbox" onclick="Rexp_delete_list_button(<?php echo esc_attr( $value['list_id']); ?>);">
            <button class="Rexp-btn Rexp-btn_primary Rexp-tooltip">
            <span class="Rexp-tooltiptext Rexp-tooltip-bottom">Add List</span><span class="dashicons dashicons-plus-alt"></span>
            <i class="Rexp-icon-edit"></i>
            </button></a>

			<hr class="wp-header-end">
            <br/><br/>
             <table class="wp-list-table widefat fixed striped table-view-list posts">
                    <thead>
                        <tr>
                            <th class="column-author">Sl No</th>
                            <th>Title</th>
							<th>Type</th>
                            <th>ShortCode</th>
                            <th></th>
 
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (count($rank_list) > 0) {
                            $i = 1;
                            foreach ($rank_list as $key => $value) {
								$wp_post_id= $value['post_id'];


								$post_details = $wpdb->get_results(
										$wpdb->prepare("SELECT * from " .Rexpinc\Base\RexpDBTableCall::Rexp_posts_table(). "  WHERE ID=$wp_post_id", ""), ARRAY_A
									);
									foreach ($post_details as $key => $post_value) {
											$post_title=$post_value['post_title'];}

                                ?>
                                <input type="hidden" id="wp_post_id<?php echo esc_attr( $value['list_id']); ?>" value="<?php echo esc_attr( $wp_post_id); ?>">
                                <tr id="list_row<?php echo esc_attr( $value['list_id']); ?>">
                                    <td class="column-author"><?php echo esc_attr( $i++); ?></td>
                                    <td><a href="<?php echo esc_url("admin.php?page=rank-expert-edit-list&edit=".$value['list_id']); ?>" class="row-title"><?php echo wp_kses_post( $post_title); ?></a></td>
                                    <td>[rankexpert id=<?php echo wp_kses_post( $value['list_id']); ?>]</td>
                                    <td>
                                    <div class="Rexp-dangerBtn">
<a href="#TB_inline?width=600&height=550&inlineId=delete_list_popup" title="" class="thickbox" onclick="Rexp_delete_list_button(<?php echo esc_attr( $value['list_id']); ?>);">
<button class="Rexp-btn Rexp-btn_danger Rexp-tooltip">
<span class="Rexp-tooltiptext Rexp-tooltip-bottom">Delete List</span><span class="dashicons dashicons-trash"></span>
<i class="Rexp-icon-trash"></i>
</button></a>
</div>
<div class="Rexp-warningBtn">
<a href="<?php echo esc_url("admin.php?page=rank-expert-edit-list&edit=".$value['list_id']); ?>" title="Edit List"> 
<button class="Rexp-btn Rexp-btn_warning Rexp-tooltip">
<span class="Rexp-tooltiptext Rexp-tooltip-bottom">Edit List</span><span class="dashicons dashicons-edit-large"></span>
<i class="Rexp-icon-edit"></i>
</button></a>
</div>

</td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
<div id="delete_list_popup" style="display:none;">
<br/><br/><br/><br/><br/><br/>
<h1  style="text-align:center;">Do you permenently delete the list?</h1>
<div id="delete_list_button" style="text-align:center;"></div>
</div>


<div id="add_list_popup" style="display:none;">
<br/>
<input type="hidden" id="list_uid" value="<?php echo esc_attr( $list_uid); ?>">
<div class="wrap">
            <h1 class="wp-heading-inline">Create New List</h1>
			<hr class="wp-header-end"><br/><br/>
<div class="embox">

	    <!-- Ranklist Title Field -->
		<div class="Rexp-row "><div class="Rexp-input_group"><div class="Rexp-input_group_prepend">
		<div class="Rexp-input_group_text">List Title</div></div>
		<input type="text" class="Rexp-input " id="new_list"></div></div>

         <div class="Rexp-row" id="list_comment"></div>

         <div class="Rexp-row" onclick="Rexp_add_list_button();">
		<button class="Rexp-btn Rexp-btn_secondary Rexp-btn_ls Rexp-add_answer">Add List</button>
        </div>
</div></div>
</div>