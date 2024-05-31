import "../styles/main.scss";
import "./blocks/slider";
import "./components/header";

const isThisArchive = document.querySelector(".product-archive");

if (isThisArchive) {
  let categories = document.querySelectorAll(".wk-categories__item");
  let productList = document.getElementById("product-list");

  categories.forEach((category) => {
    category.addEventListener("click", (e) => {
      e.preventDefault();
      let categorySlug = category.id;

      fetch(my_ajax_object.ajax_url, {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        body: new URLSearchParams({
          action: "filter_products",
          category: categorySlug,
        }),
      })
        .then((response) => response.text())
        .then((data) => {
          productList.innerHTML = data;
        })
        .catch((error) => console.log("Error:", error));
    });
  });
}

/* import { DisplayLabel } from "./components/counter";

let Main = {
  init: async function () {
    // initialize demo javascript component - async/await invokes some
    //  level of babel transformation
    const displayLabel = new DisplayLabel();
    await displayLabel.init();
  },
};

Main.init();

console.log(document.getElementById("main")[0]);
 */
