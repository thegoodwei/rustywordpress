import init, { run_Wasmrs_App } from './wasm_app.wasm';

document.addEventListener("DOMContentLoaded", function() {
    run_Wasmjs_App();
});

async function run_Wasmrs_App() {
    // Instantiate the WebAssembly module
    const wasmModule = await init();

    WebAssembly.instantiateStreaming(fetch('./wasm_module.wasm'))
    .then(({module, instance}) => {
        if (instance.exports.run_Wasmrs_App) {
            instance.exports.run_Wasmrs_App();
        } else {
            console.error("Error: run_Wasmrs_App() function not found in WebAssembly exports.");
        }
    }).catch(error => {
        console.error(error);
    });
}


//paste code from wasm-bindgen below
