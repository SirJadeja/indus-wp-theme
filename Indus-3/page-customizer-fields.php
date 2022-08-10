<h2>footer array</h2>
<?php
$footer_list=array();
$args= array('post_type'=>'footer');
$footers=get_posts($args);
foreach ($footers as $footer) {
  $footer_list[$footer->post_name]=$footer->post_name;
}
print_r($footer_list);

 ?>

<h2>footer test</h2>
<?php echo get_theme_mod('theme_footer_select_setting') ?>
<h2>text</h2>
<?php
echo get_theme_mod("theme_header_setting");
 ?>
 <h2>description</h2>
 <?php echo get_theme_mod('theme_header_description_setting'); ?>
<h2>image</h2>
<img src="<?php echo get_theme_mod('theme_header_image_setting'); ?>" alt="">

<?php
$header_list= array();
$args = array('post_type'=>'header');
$headers = get_posts($args);
foreach ($headers as $header) {
    $header_list[$header->post_name]=$header->post_name;
}
print_r($header_list);

 ?>
 <h2>test loop  </h2>
 <?php echo get_theme_mod("inuds_theme_options_header");
 ?>


<h2>loop</h2>
 <?php
 $header_id= get_theme_mod("inuds_theme_options_header");
 $header_id_new= "'" .  $header_id . "'";
 $args = array(
     'post_type'     => 'Header',
     'name'=> $header_id,
 );
 $loop = new WP_Query($args);
 // $i = 0 ;
 while ( $loop->have_posts() ) {
     $loop->the_post();
     // $i = $i+1;
     // if($i==2)
       {
     ?>
     <div class="">
         <?php echo $header_id_new ?>

     </div>
     <?php

             }
   }

 ?>
