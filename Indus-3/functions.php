<?php
// header post type
include "includes/header-post-types.php";

//footer post type
include "includes/footer-post-types.php";

//Custom header theme customise option
include "includes/custom-footer-customization-section.php";

//Custom footer theme customization option
include "includes/custom-header-customization-section.php";

function indus_files(){
  wp_enqueue_style('indus_main_styles', get_stylesheet_uri());
  wp_enqueue_style('indus_main_theme_styles', get_theme_file_uri('css/style.css'));
  wp_enqueue_style('google-fonts1','//fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
  wp_enqueue_script('indus_main_theme_js', get_theme_file_uri('js/index.js'), array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts','indus_files');
add_theme_support('post-thumbnails');
function university_features(){
  register_nav_menu('headerMenuLocation','Header Menu Location');
  add_theme_support('title-tag');
}
add_action('after_setup_theme','university_features');

function test_func() {
  wp_nav_menu( array(
    'menu'=>'My main menu',
    'container_class' => 'indus-menu-class'
  ));
}
add_shortcode( 'test-shortcode', 'test_func' );

// creating shortcode for calling post
function post_archive_test_func($attr) {
  ob_start();
  $args_2 = shortcode_atts( array(
         'posts_numbers' => '3',
         'cols'=>'3',
       ), $attr );

switch ($args_2['cols']) {
  case '1':
    $cols='1fr ';
    break;

    case '2':
      $cols='1fr 1fr';
      break;

      case '3':
        $cols='1fr 1fr 1fr';
        break;

        case '4':
          $cols='1fr 1fr 1fr 1fr';
          break;

  default:
    $cols='1fr 1fr 1fr';
    break;
}


  echo "<div class='row-indus' style='grid-template-columns: $cols;'>";
  $args = array(
         'post_type' => 'post',
         'post_status' => 'publish',
         'posts_per_page' => $args_2['posts_numbers'],
         'orderby' => 'title',
         'order' => 'ASC',
     );

     $loop = new WP_Query( $args );

     while ( $loop->have_posts() ) : $loop->the_post(); ?>

     <div class="col">
       <div class="card">
         <div class="post-archive-image">
           <?php
           $thumb_id = get_post_thumbnail_id();
           $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
           $thumb_url = $thumb_url_array[0]; ?>
           <img src="<?php echo $thumb_url; ?>" alt="">
         </div>
         <div class="post-archive-heading">
           <?php the_title(); ?>
         </div>
         <div class="button">
     <a href="<?php the_permalink() ?>" class="indus-plain-button">View Project</button></a>
         </div>
       </div>
     </div>

     <?php endwhile;

     wp_reset_postdata();
  echo "</div>";

  return ob_get_clean();
  
}
add_shortcode( 'post-archive-shortcode', 'post_archive_test_func' );

// menu shortcode
// example : [addmenu name="Primary Menu" class="your-class-name"]
function indus_menu_shortcode($attr){

    $args = shortcode_atts(array(
                'name'  => '',
                'class' => ''
                ), $attr);

    return wp_nav_menu( array(
                'menu'             => $args['name'],
                'menu_class'    => $args['class'],
                'container_class' => 'indus-menu-class'
            ));
}
add_shortcode('addmenu', 'indus_menu_shortcode');

// changing name of default post type
function change_post_menu_label() {
    global $menu, $submenu;

    $menu[5][0] = 'Projects';
    $submenu['edit.php'][5][0] = 'All Projects';
    $submenu['edit.php'][10][0] = 'Add new Project';
    $submenu['edit.php'][16][0] = 'Project Tags';
    echo '';
}
add_action( 'admin_menu', 'change_post_menu_label' );

function change_post_object_label() {
    global $wp_post_types;

    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Projects';
    $labels->singular_name = 'Project';
    $labels->add_new = 'Add new Project';
    $labels->add_new_item = 'New Project';
    $labels->edit_item = 'Edit Project';
    $labels->new_item = 'New Project';
    $labels->view_item = 'View Project';
    $labels->search_items = 'Search Project';
    $labels->not_found = 'Not found';
    $labels->not_found_in_trash = 'Not found in trash';
}
add_action( 'init', 'change_post_object_label' );
