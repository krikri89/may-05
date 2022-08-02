import * as bootstrap from "bootstrap";
import axios from "axios";
axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

window.addEventListener("load", () => {
    axios.get(mySmallCart).then((res) => {
        document.querySelector(".small--cart").innerHTML = res.data.html;
    });
});

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
        doLink();
        // palaiko kas pries tai buvo selected
    });
}

if (document.querySelector(".add--cart")) {
    //jeigu yra toks linkas/button, process
    document
        .querySelectorAll(".add--cart") //surandam visus buttons
        .forEach((button) => {
            button.addEventListener("click", () => {
                //kai randam button, uzdedam eventa su pavadinimu click, ir kai jis pasispaudzia siunciam rqst

                const row = button.closest(".row");
                const count = row.querySelector("[name=animals_count]").value;
                const animalId = row.querySelector("[name=animal_id]").value;
                //ieskom pagal name

                // arba
                //ieskom pagal type
                // const animalId = row.querySelector('[type=hidden]').value;

                axios
                    .post(addToCartUrl, { count, animalId }) //ir siunciam
                    .then((res) => console.log(res.data));
            });
            // console.log(button.closest(".row")); //suranda artimiausia teva. To siekiam norint issiuti info irasyta tame hidden type input. Realiai ieskom kur tie imput yra padeti.
        });
}
