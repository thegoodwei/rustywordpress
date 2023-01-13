<?php
/*
Plugin Name: My Wasm App
Description: A Simplified WordPress plugin to display a WebAssembly app as enqueued by .js glue file
Version: 1.0
*/

function my_wasm_enqueue_scripts() {
    wp_enqueue_script( 'wasm_app', plugins_url( 'js/wasm_app.js', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'my_wasm_enqueue_scripts' );

function my_wasm_shortcode() {
    echo '<div id="wasm-app" style="width: 100%; height: 100%;"></div>';
    echo '<script>main();</script>';
}
add_shortcode( 'wasm_display', 'my_wasm_shortcode' );
?>
