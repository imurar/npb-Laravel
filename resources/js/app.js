import { createApp } from "vue";
import ExampleComponent from "./components/ExampleComponent.vue";

const el = document.getElementById("example");
if (el) {
    createApp(ExampleComponent).mount(el);
}
