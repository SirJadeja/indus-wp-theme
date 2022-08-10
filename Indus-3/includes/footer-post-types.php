<?php
function indus_footer_post_type(){
  register_post_type('Footer',array(
    'public'=> true,
    'labels'=>array(
      'name'=>'Footers',
      'add_new_item'=>'Add new footer',
      'edit_item'=>'Edit Footer',
      'all_items'=>'All Footers',
      'singular_name'=> 'Footer'
    ),
    'menu_icon'=> 'dashicons-align-left',

  ));
}

add_action('init','indus_footer_post_type');

 ?>
