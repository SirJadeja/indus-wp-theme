<?php
$footer_id= get_theme_mod("theme_footer_select_setting");
$footer_id_new= "'" .  $footer_id . "'";
$args = array(
    'post_type'     => 'footer',
    'name'=> $footer_id_new,
);
$footer_loop = new WP_Query($args);
while ( $footer_loop->have_posts() ) {
    $footer_loop->the_post();
      {
    ?>
    <div class="custom-footer">
        <?php the_content(); ?>
    </div>
    <?php
  }
  }

?>

<?php wp_footer(); ?>
</body>
</html>
