import * as bootstrap from "bootstrap";
import axios from "axios";
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

if (document.querySelector(".magic--link")) {
    const selector = document.querySelector("[name=color_id]"); // iesko spalvos
    const magicLink = document.querySelector(".magic--link"); //iesko spalvos pagal id prie linko
    const linkText = magicLink.querySelector("span"); //pasetinam linka is <span>

    const doLink = () => {
        magicLink.setAttribute("href", showUrl + "/" + selector.value);
        linkText.innerText = selector.options[selector.selectedIndex].text; //pakeicia text pagal id
    };
    selector.addEventListener("change", () => {
        doLink();
    });

    window.addEventListener("load", () => {
        // palaiko kas pries tai buvo selected
        doLink();
    });

    console.log(showUrl);
}
