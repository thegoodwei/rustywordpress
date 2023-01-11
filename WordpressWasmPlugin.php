<?php
/**
 * Plugin Name: My Yew Plugin
 * Description: A plugin that displays a Yew app built with WebAssembly and Webpack.
 * Version: 1.0.0
 * Author: Jane Doe
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}

/**
 * Enqueue the 'my-yew-app.js' script in the front-end.
 *
 * The 'my-yew-app.js' script contains the compiled Yew app and the JavaScript glue code.
 * It is located in the 'dist' directory within the plugin directory.
 */
function my_plugin_scripts() {
  // Use the 'wp_enqueue_script' function to register and enqueue the script
  wp_enqueue_script(
    // Set a unique handle for the script
    'my-yew-app',
    // Set the script source to the 'my-yew-app.js' file in the 'dist' directory
    plugin_dir_url(__FILE__) . 'dist/my-yew-app.js',
    // Set the dependencies for the script (none in this case)
    [],
    // Set the version number for the script
    '1.0.0',
    // Set whether to load the script in the footer (true) or the header (false)
    true
  );
}
// Hook the 'my_plugin_scripts' function to the 'wp_enqueue_scripts' action
add_action('wp_enqueue_scripts', 'my_plugin_scripts');

/**
 * Display the Yew app in the front-end.
 *
 * This function adds a 'div' element with an 'id' of 'app' to the page, and
 * runs the 'run_app' function from the 'my-yew-app.js' script.
 * The 'run_app' function mounts the Yew app to the 'div' element.
 */
function my_plugin_display_app() {
  // Add a 'div' element with an 'id' of 'app' to the page
  echo '<div id="app"></div>';

  // Call the 'run_app' function from the 'my-yew-app.js' script
  // The 'run_app' function mounts the Yew app to the 'div' element
  echo '<script>run_app().catch(console.error);</script>';
}

/**
 * Register a shortcode to display the Yew app in the front-end.
 *
 * Use the shortcode '[my_plugin_app]' in a post or page to display the app.
 *
 * You can modify the shortcode tag and the function name to fit your needs.
 * For example, you can change the shortcode tag to '[my_awesome_app]' and the
 * function name to 'my_plugin_display_awesome_app'.
 */
function my_plugin_app_shortcode() {
	// Call the 'my_plugin_display_app' function to display the Yew app
	my_plugin_display_app();
  }
  // Use the 'add_shortcode' function to register the shortcode
  add_shortcode('my_plugin_app', 'my_plugin_app_shortcode');
  
