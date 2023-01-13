Use::wasm_bindgen;

#[wasm_bindgen]
pub fn run_Wasmrs_App(fullpage-app-div: JsValue) {
    let fullpage-app-div = fullpage-app-div.dyn_into::<web_sys::HtmlElement>().unwrap();
    // code that use the fullpage-app-div variable 
     run_app(fullpage-app-div: JsValue)
    App::<Model>::new().mount(fullpage-app-div)
}

struct Model {
    // any model data you want to store
}

impl Component for Model {
    type Message = ();
    type Properties = ();

    fn create(_: Self::Properties, _: ComponentLink<Self>) -> Self {
        Model {
            // initialize your model data
        }
    }

    fn update(&mut self, _: Self::Message) -> ShouldRender {
        true
    }

    fn view(&self) -> Html {
        html! {
            <div>
                <h1>{ "Hello from Rust Yew WASM!" }</h1>
            </div>
        }
    }
}
