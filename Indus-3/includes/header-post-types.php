<?php
function indus_header_post_type(){
  register_post_type('Header',array(
    'public'=> true,
    'labels'=>array(
      'name'=>'Headers',
      'add_new_item'=>'Add new header',
      'edit_item'=>'Edit Header',
      'all_items'=>'All Headers',
      'singular_name'=> 'Header'
    ),
    'menu_icon'=> 'dashicons-align-left',

  ));
}

add_action('init','indus_header_post_type');
?>  
