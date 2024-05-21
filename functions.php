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

?>