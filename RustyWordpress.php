<?php
/*
Template Name: My Rust Theme
*/

// Use the `wp_enqueue_script()` function to enqueue your Rust code as a Wasm module
function my_rust_scripts() {
    // Enqueue your Rust code as a Wasm module
    wp_enqueue_script( 'my-rust-module', get_template_directory_uri() . '/js/my-rust-module.js', array(), '1.0.0', true );

    // Use the `wp_localize_script()` function to pass data from PHP to Rust
    // This function allows you to add data to the page as a JavaScript object that can be accessed by your Rust code
    $my_php_variable = "Hello from PHP!";
    wp_localize_script( 'my-rust-module', 'myRustVariable', $my_php_variable );
}
add_action( 'wp_enqueue_scripts', 'my_rust_scripts' );

get_header();
?>

<!-- Add your HTML and PHP code here -->
<div class="container">
    <h1>Welcome to my WordPress theme</h1>
    <p>This is my custom theme built with PHP and Rust</p>
</div>

<?php
get_footer();
?>
