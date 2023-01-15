Use::wasm_bindgen;

use wasm_bindgen::prelude::*;
use yew::prelude::*;

#[wasm_bindgen]
pub fn run_Wasmrs_App(fullpage-app-div: JsValue) {
    let fullpage-app-div = fullpage-app-div.dyn_into::<web_sys::HtmlElement>().unwrap();
    // code that use the fullpage-app-div variable 
     run_app(fullpage-app-div: JsValue)
    App::<Model>::new().mount(fullpage-app-div)
}

struct Model {
    fullpage_app_div: Option<web_sys::HtmlElement>,
}

impl Model {
    fn new() -> Self {
        Self {
            fullpage_app_div: None,
        }
    }
}

struct App {
    link: ComponentLink<Self>,
    model: Model,
}

enum Msg {
    Mounted,
}

impl Component for App {
    type Message = Msg;
    type Properties = ();

    fn create(_: Self::Properties, link: ComponentLink<Self>) -> Self {
        Self {
            link,
            model: Model::new(),
        }
    }

    fn mounted(&mut self) {
        self.link.send_message(Msg::Mounted);
    }

    fn update(&mut self, msg: Self::Message) -> ShouldRender {
        match msg {
            Msg::Mounted => {
                let window = web_sys::window().unwrap();
                let document = window.document().unwrap();
                let fullpage_app_div = document.get_element_by_id("fullpage-wasm-app").unwrap();
                self.model.fullpage_app_div = Some(fullpage_app_div);
                true
            }
        }
    }

    fn view(&self) -> Html {
        let text = if let Some(fullpage_app_div) = &self.model.fullpage_app_div {
            format!("App is mounted on div: {:?}", fullpage_app_div)
        } else {
            "App is not mounted yet".to_string()
        };

        html! {
            <div>
                <p>{ text }</p>
            </div>
        }
    }
}
//probably not needed
#[wasm_bindgen]
pub fn run_App() {
    App::<Model>::new().mount_to_body();
}
