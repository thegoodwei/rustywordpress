import init, { run_Wasmrs_App } from './wasm_app.wasm';

async function run_Wasmjs_App() {
    // Instantiate the WebAssembly module
    const wasmModule = await init();

    WebAssembly.instantiateStreaming(fetch('./wasm_module.wasm'))
      .then(({module, instance}) => {
         instance.exports.run_Wasmrs_App();
     });

    }

document.addEventListener("DOMContentLoaded", function() {
    run_Wasmjs_App();
});



//paste code from wasm-bindgen below
