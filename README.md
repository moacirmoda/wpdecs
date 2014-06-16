# About
The WPDeCS consumes the DeCS service and append into posts or pages in your WP.

# How to Use
## Print all DeCS Terms

Add this block to show all DeCS terms:
```
<?php if(function_exists('the_wpdecs_terms')) the_wpdecs_terms(); ?>
```

## Get the array terms
```
<?php if(function_exists('get_the_wpdecs_terms')) $wpdecs_terms = get_the_wpdecs_terms(); ?>
```

## Get the array terms from specific post
```
<?php if(function_exists('get_the_wpdecs_terms')) $wpdecs_terms = get_the_wpdecs_terms($post_id); ?>
```


