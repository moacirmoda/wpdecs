<?php 

// select all post types
$post_types = get_post_types(array('public' => true), 'objects');

foreach(array('wpdecs_default_language', 'wpdecs_post_types') as $field) {
    if(!get_option($field)) {
        add_option($field, '');
    }
}

if(isset($_POST)) {
    print 'aaaaa';
}


?>

<div class="wrap">
  <h2><?php _e('WPDeCS Options'); ?></h2>
  <form method="post" enctype="multipart/form-data" action="options.php">
        
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
                        <input type="checkbox" name="wpdecs_post_types[]" value="<?php print $key ?>" /> <?php print $post_type->labels->name ?><br>
                    <?php endforeach; ?>
                </td>
            </tr>
        </table>

        <p class="submit">  
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />  
        </p>  
        
  </form>
  
</div>