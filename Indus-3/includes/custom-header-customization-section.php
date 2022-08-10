<?php

function custom_footer_selector($wp_customize){
  $footer_list=array();
  $args= array('post_type'=>'footer');
  $footers=get_posts($args);
  foreach ($footers as $footer) {
    $footer_list[$footer->post_name]=$footer->post_name;
  }
  //adding section
  $wp_customize->add_section('theme_footer_area',array(
    'title'=>'Select Footer',
    'description'=>'Find the option called Footers in admin dashboard'
  ));
  //footer settings
  $wp_customize->add_setting('theme_footer_select_setting',array(
    'transport'=>'portMessage'
  ));
  //footer controls
  $wp_customize->add_control('theme_footer_select_control',array(
    'label'=>esc_html__('Select Footer','Indus-3'),
    'section'=>'theme_footer_area',
    'type'=>'select',
    'choices'=>$footer_list,
    'settings'=>'theme_footer_select_setting'
  ));
}

add_action("customize_register", "custom_footer_selector"); 

 ?>
