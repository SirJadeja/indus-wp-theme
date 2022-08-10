<?php get_header(); ?>

<?php

while (have_posts()) {
  the_post(); ?>
  <div class="post-header">
    <h1 class="post-title"><?php the_title(); ?></h1>

  </div>
  <?php
  $thumb_id = get_post_thumbnail_id();
  $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
  $thumb_url = $thumb_url_array[0]; ?>
  <?php
  if ($thumb_id) { ?>
    <div class="image-div indus-container">

      <img class="post-image" src="<?php echo $thumb_url; ?>" alt="">

  <?php // echo get_the_post_thumbnail(); ?>
    </div>
  <?php }
   ?>


  <div class="content-div indus-container">
  <p class="content"><?php the_content() ?></p>

  </div>

<?php }

 ?>


<?php get_footer(); ?>
