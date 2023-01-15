use yew::{html, Component, ComponentLink, Html, ShouldRender};
use yew::web_sys::HtmlElement;
use wasm_bindgen::JsValue;

#[wasm_bindgen]
pub struct App {
    link: ComponentLink<Self>,
    fullpage_app_div: Option<HtmlElement>,
}

#[wasm_bindgen]
impl App {
    pub fn new() -> App {
        App {
            link: ComponentLink::new(),
            fullpage_app_div: None,
        }
    }

    pub fn mount(&mut self, fullpage_app_div: JsValue) {
        let fullpage_app_div = fullpage_app_div.dyn_into::<HtmlElement>().unwrap();
        self.fullpage_app_div = Some(fullpage_app_div);
        self.link.send_message(());
    }
}

impl Component for App {
    type Message = ();
    type Properties = ();

    fn create(_: Self::Properties, link: ComponentLink<Self>) -> Self {
        Self {
            link,
            fullpage_app_div: None,
        }
    }

    fn update(&mut self, _msg: Self::Message) -> ShouldRender {
        if let Some(fullpage_app_div) = self.fullpage_app_div.as_ref() {
            yew::services::ConsoleService::log("Mounted");
            yew::App::<Self>::new().mount(fullpage_app_div);
        }
        false
    }

    fn view(&self) -> Html {
        html! {
            <div>
                <p>{"Hello World!"}</p>
            </div>
        }
    }
}

#[wasm_bindgen(start)]
pub fn run_Wasmrs_App(fullpage_app_div: JsValue) {
    let mut app = App::new();
    app.mount(fullpage_app_div);
}
/*
code uses the yew framework to create a struct, App, which represents the web application. The struct contains a ComponentLink for handling updates, and an Option for the fullpage_app_div HtmlElement.

The App struct also has an implementation of the wasm_bindgen macro, which allows it to be called from JavaScript. The new() function creates a new instance of the struct, and the mount() function takes a JsValue which is then converted into an HtmlElement and stored in the fullpage_app_div field.

The App struct also implements the Component trait from the yew crate. The create() function creates a new instance of the struct and the update() function is called whenever the component receives a message. In this case, the update() function checks if the fullpage_app_div field has been set

The first thing to note is that the run_Wasmrs_App function is decorated with the #[wasm_bindgen] attribute. This attribute tells the Rust compiler that this function should be exported to JavaScript, so that it can be called by JavaScript code.

The function takes in a single parameter, fullpage_app_div, which is of type JsValue. This is a special type provided by the wasm-bindgen crate that represents a JavaScript value. In this case, it represents the div element that will be passed from JavaScript.

Inside the function, we first use the dyn_into method to convert the JsValue into a web_sys::HtmlElement. This is the Rust equivalent of the HTMLElement object in JavaScript.

We then create an instance of our App struct, which is defined as:
struct App<Model: 'static> {...}
The App struct is parameterized over a Model type, which must implement the Default trait. This struct is the entry point of our yew application and holds the state of the application.

We then call the mount method on the App instance, passing in the fullpage_app_div variable as the argument. This mounts the yew application to the provided div element, making it the root element of the application.

It's important to note that the fullpage_app_div variable must be a div id in php that is passed from javascript to rust, this is possible using wasm_bindgen. The javascript code should look something like this:


  let wasm = wasm_bindgen('./pkg/wasm_app_bg.wasm');
  wasm.run_Wasmrs_App(fullpage_app_div);```

*/
