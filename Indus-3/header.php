<!DOCTYPE html>
<html>
  <head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
  </head>
  <body <?php body_class();?>>

    <?php
    $header_id= get_theme_mod("inuds_theme_options_header");
    $header_id_new= "'" .  $header_id . "'";
    $args = array(
        'post_type'     => 'Header',
        'name'=> $header_id_new,
    );
    $loop = new WP_Query($args);
    // $i = 0 ;
    while ( $loop->have_posts() ) {
        $loop->the_post();
        // $i = $i+1;
        // if($i==2)
          {
        ?>
        <div class="custom-header">
            <?php the_content(); ?>

        </div>
        <?php

                }
      }

?>
