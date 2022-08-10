<?php

function cutom_header_selector($wp_customize){
  $header_list= array();
  $args = array('post_type'=>'header');
  $headers = get_posts($args);
  foreach ($headers as $header) {
      $header_list[$header->post_name]=$header->post_name;
  }
  //add controls
  $wp_customize->add_section('theme_header_area',array(
    'title'=>'Select Header',
    'description'=>'Find the option called header in admin dashboard'
  ));
  //header posts calling
  $wp_customize->add_setting('inuds_theme_options_header', array(
         'transport' => 'postMessage'

     ));

     $wp_customize->add_control('themename_page_test', array(
         'label'      => esc_html__('Select Header', 'indus-3'),
         'section'    => 'theme_header_area',
         'type'    => 'select',
         'choices'    => $header_list,
         'settings'   => 'inuds_theme_options_header',
     ));




}
add_action("customize_register","cutom_header_selector");

 ?>
