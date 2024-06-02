<?php
  /** Theme setup */
  require_once( 'inc/theme-setup.php' );
  require_once( 'inc/custom-post-types.php' );

  function enqueue_wkode_scripts() {
    wp_enqueue_style('wkode_main_styles', get_stylesheet_uri());
    wp_enqueue_style('main-css', get_template_directory_uri() . '/dist/main.min.css');
    wp_enqueue_script('main-js', get_theme_file_uri('/dist/main.min.js'), NULL, '1.0', true);
    wp_enqueue_script('wkode-font_awesome', '//kit.fontawesome.com/fde7c29e46.js', NULL, '1.0', true);
    wp_enqueue_script('blocks', get_theme_file_uri('/build/index.js'), NULL, '1.0', true);

    wp_localize_script('main-js', 'my_ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
  }
  add_action( 'wp_enqueue_scripts', 'enqueue_wkode_scripts' );

  //queing the styles and scripts in the blocks preview
  add_action( 'enqueue_block_editor_assets', 'enqueue_wkode_scripts' );

  // Enable ACF JSON
  add_filter('acf/settings/save_json', 'my_acf_json_save_point');
  function my_acf_json_save_point( $path ) {
      // update path
      $path = get_stylesheet_directory() . '/acf-json';
      // return
      return $path;
  }

  // Load ACF JSON
  add_filter('acf/settings/load_json', 'my_acf_json_load_point');
  function my_acf_json_load_point( $paths ) {
      // remove original path (optional)
      unset($paths[0]);
      // append path
      $paths[] = get_stylesheet_directory() . '/acf-json';
      // return
      return $paths;
  }


class AreYouPayingAttention {
    function __construct() {
        add_action( 'init', array( $this, 'adminAssets' ) );
    }

    function adminAssets() {
        wp_register_script(
            'are-you-paying-attention-test',
             get_template_directory_uri() . '/build/index.js',
            array( 'wp-blocks', 'wp-element', 'wp-editor' )
        );
        register_block_type('wkode/are-you-paying-attention-test', array(
            'editor_script' => 'are-you-paying-attention-test',
            'render_callback' => array( $this, 'theHTML' )
        ));
    }

    function theHTML($attributes) {
        ob_start(); ?>
        <h3>
            today the sky is <?php echo $attributes['skyColor']; ?> and the grass color is <?php echo $attributes['grassColor']; ?>
        </h3>
        <?php
        return ob_get_clean();
    }
}

$areYouPayingAttention = new AreYouPayingAttention();

class CustomSliderBlock {
    function __construct() {
        add_action('init', array($this, 'adminAssets'));
    }

    function adminAssets() {
        wp_register_script(
            'custom-slider-block',
            get_template_directory_uri() . '/build/index.js', 
            array('wp-blocks', 'wp-element', 'wp-editor'),    
            filemtime(get_template_directory() . '/build/index.js') 
        );
        
        register_block_type('wkode/custom-slider-block', array(
            'editor_script' => 'custom-slider-block',
            'render_callback' => array($this, 'theHTML')      
        ));
    }

    function theHTML($attributes) {
        if (empty($attributes['images'])) {
            return '';
        }

        ob_start();
        echo '<div class="custom-slider">';
        foreach ($attributes['images'] as $image) {
            if (isset($image['url'])) {
                var_dump($image);
                echo '<div class="slider-image">';
                echo '<img src="' . esc_url($image['url']) . '" alt="Slider Image">';
                echo '</div>';
            }
        }
        echo '</div>';

        return ob_get_clean();
    }
}

$customSliderBlock = new CustomSliderBlock();

// Add AJAX action for logged-in and non-logged-in users
add_action('wp_ajax_filter_products', 'filter_products');
add_action('wp_ajax_nopriv_filter_products', 'filter_products');

function filter_products() {
    // Get the category slug from the AJAX request
    $category_slug = $_POST['category'];

    $args = array(
        'post_type' => 'produtos',
        'posts_per_page' => -1,
    );

    if ($category_slug) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $category_slug,
            ),
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
            <div class="wk-produtos__item">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                    <h3><?php the_title(); ?></h3>
                </a>
            </div>
        <?php endwhile;
    else :
        echo '<p>No products found</p>';
    endif;

    wp_die();
}

function search_products() {
    $query = sanitize_text_field($_POST['query']);

    $args = array(
        'post_type' => 'produtos',
        'posts_per_page' => 10,
        's' => $query,
    );

    $query = new WP_Query($args);

    $results = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $results[] = array(
                'title' => get_the_title(),
                'link' => get_permalink(),
            );
        }
    }

    wp_send_json($results);
}

add_action('wp_ajax_search_products', 'search_products');
add_action('wp_ajax_nopriv_search_products', 'search_products');

function custom_rewrite_rules() {
    add_rewrite_rule('^produtos/?$', 'index.php?post_type=produtos', 'top');
}
add_action('init', 'custom_rewrite_rules');

function add_query_vars_filter($vars) {
    $vars[] = "category";
    return $vars;
}
add_filter('query_vars', 'add_query_vars_filter');
?>

