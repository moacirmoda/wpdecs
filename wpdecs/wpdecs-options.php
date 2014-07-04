<?php 

// select all post types
$post_types = get_post_types(array('public' => true), 'objects');
$wpdecs_post_types = get_option('wpdecs_post_types');

if(isset($_POST['act']) and $_POST['act'] == "save") {
    
    $wpdecs_post_types = $_POST['wpdecs_post_types'];
    if(!update_option('wpdecs_post_types', $wpdecs_post_types)) {
        add_option('wpdecs_post_types', $wpdecs_post_types);
    }
}

?>

<div class="wrap">
  <h2><?php _e('WPDeCS Options'); ?></h2>
  <form method="post" enctype="multipart/form-data" action="">
            
        <input type="hidden" name="act" value="save">

        <table class="form-table">
            <tr valign="top">
                <th scope="row"><?php _e('Default Language', 'wpdecs'); ?></th>
                <td>
                    <input type="text" name="wpdecs_default_language" value="<?php echo get_option('wpdecs_default_language'); ?>" />
                </td>
            </tr>

            <tr valign="top">
                <th scope="row"><?php _e('Post Types', 'wpdecs'); ?></th>
                <td>
                    <?php foreach($post_types as $key => $post_type): ?>
                        <?php if(in_array($key, $wpdecs_post_types)): ?>
                            <input type="checkbox" name="wpdecs_post_types[]" value="<?php print $key ?>" checked/> <?php print $post_type->labels->name ?><br>
                        <?php else: ?>
                            <input type="checkbox" name="wpdecs_post_types[]" value="<?php print $key ?>" /> <?php print $post_type->labels->name ?><br>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </td>
            </tr>
        </table>

        <p class="submit">  
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />  
        </p>  
        
  </form>
  
</div>