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
        </table>

        <p class="submit">  
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />  
        </p>  
        
  </form>
  
</div>