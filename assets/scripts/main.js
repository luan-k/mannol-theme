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

      // Remove active class from all categories
      categories.forEach((cat) => cat.classList.remove("active"));
      // Add active class to the clicked category
      category.classList.add("active");

      // If 'todas' is clicked, reset to show all products
      fetch(my_ajax_object.ajax_url, {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        body: new URLSearchParams({
          action: "filter_products",
          category: categorySlug === "todas" ? "" : categorySlug,
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

document.addEventListener("DOMContentLoaded", function () {
  const searchIcon = document.querySelector(".wk-header__search-icon");
  const searchInput = document.querySelector(".wk-header__search-input");
  const searchResults = document.querySelector(".wk-header__search-results");

  searchIcon.addEventListener("click", () => {
    if (searchInput.style.display === "none") {
      searchInput.style.display = "block";
      searchInput.focus();
    } else {
      searchInput.style.display = "none";
      searchResults.style.display = "none";
    }
  });

  searchInput.addEventListener("input", () => {
    const query = searchInput.value;

    if (query.length < 2) {
      searchResults.style.display = "none";
      return;
    }

    fetch(my_ajax_object.ajax_url, {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
      },
      body: new URLSearchParams({
        action: "search_products",
        query: query,
      }),
    })
      .then((response) => response.json())
      .then((data) => {
        searchResults.innerHTML = "";
        if (data.length > 0) {
          searchResults.style.display = "flex";
          data.forEach((item) => {
            const resultItem = document.createElement("div");
            resultItem.classList.add("search-result-item");
            resultItem.innerHTML = `<a href="${item.link}">${item.title}</a>`;
            searchResults.appendChild(resultItem);
          });
        } else {
          searchResults.style.display = "none";
        }
      })
      .catch((error) => console.log("Error:", error));
  });
});

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
