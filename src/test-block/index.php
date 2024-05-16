<?php
/**
 * Plugin Name:       Are you Paying Attention
 * Description:       hello oworld.
 * Version:           0.1.0
 * Author:            Luan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class AreYouPayingAttention {
    function __construct() {
        add_action( 'init', array( $this, 'adminAssets' ) );
    }

    function adminAssets() {
        wp_register_script(
            'are-you-paying-attention-test',
            plugins_url( '../../build/index.js', __FILE__ ),
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