#Usage guide
##Prerequisites

    A WordPress website
    A rust project that has been compiled to wasm
    wasm-bindgen CLI tool

##Rendering rust to wasm_module.wasm

    Ensure that you have rust and wasm-pack installed on your machine
    Create a new rust project or navigate to an existing one
    In the root directory of your project, run the command wasm-pack build --target web
    This will create a pkg directory in your project's root directory
    Navigate to the pkg directory and copy the wasm_module.wasm file

##Creating the wasm_glue.js file

    Ensure that you have wasm-bindgen CLI tool installed on your machine
    Navigate to the directory where your wasm_module.wasm file is located
    Run the command wasm-bindgen wasm_module.wasm --out-dir .
    This will generate a wasm_glue.js file in the current directory

##File structure in the .zip file to upload to WordPress
  ####Note: Make sure that the path of the wasm_module.wasm and wasm_glue.js files in the PHP script is correct and matches the location of the files in your WordPress website.

    Create a new folder and name it "wasm-module"
    Add the wasm_module.wasm file, wasm_glue.js file and the PHP script to the "wasm-module" folder
    Zip the "wasm-module" folder
    Go to your WordPress website and navigate to Plugins > Add New
    Click on the "Upload Plugin" button and select the .zip file
    Click on the "Install Now" button and then "Activate Plugin"

##Using the shortcode

    Create a new page or post
    In the content editor, add the shortcode [wasm_display]
    Publish or update the page or post
    The wasm_module.wasm file will be displayed on the page or post
