<?php

/*
 * Enqueue the wasm_app.js script to be used on the front-end of the website.
 * This script is located in the 'js' folder within the plugin directory.
 */
function my_wasm_enqueue_scripts() {
    wp_enqueue_script( 'wasm_app', plugins_url( 'wasm_glue.js', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'my_wasm_enqueue_scripts' );

/*
 * This wasm file should be located in the root of the plugin directory.
 /*
         * 
         * If the file is not found or there is a problem with the fetch, 
         * display an error message in the console.
         */
/**
 * This function is used to create a full page div with the id 'fullpage-wasm-app
 * to fetch and instantiate the wasm_module.wasm file when called by the Wordpress shortcode [wasm_display]
 * If the attempt to fetch the wasm_module.wasm file fails or there is a problem with fetch, display an error in the console
 * The shortcode [wasm_display] is added to the content editor of a page or post and when the page or post is published,
 * the wasm_module.wasm file is displayed on the fullpage or post.
 */
function my_wasm_shortcode()
{
    // Creates a div with the id "fullpage-wasm-app" and sets the width and height to 100%
    echo '<div id="fullpage-wasm-app" style="width: 100%; height: 100%;"></div>';

    // JavaScript code to fetch the wasm_module.wasm file, instantiate it and call its main function
    
    // Use the fetch API to get the wasm_module.wasm file
          //.then check if the fetch request was successful
                    // if !response.ok, throw an error that the fetch request was not successful
                // Else the fetch request was successful, return the response as an array buffer
    
                // .then instantiate .then => Call the main function of the wasm module and pass in the appdiv element for the window
    echo '<script>         
        // Get the div element with the id "fullpage-wasm-app"
        const appdiv = document.getElementById("fullpage-wasm-app");
        
        fetch("./wasm_module.wasm")
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Try using Firefox!! Your browser failed to fetch wasm_module.wasm. Status: ${response.status}`);
                } else {
                return response.arrayBuffer(); }
            })
            .then(bytes => WebAssembly.instantiate(bytes))
            .then(({instance}) => {
                instance.exports.main(appdiv);
            })
            .catch(error => console.error(error));
    </script>';
}
// Add the shortcode [wasm_display] to WordPress
add_shortcode( 'wasm_display', 'my_wasm_shortcode' );

?>
