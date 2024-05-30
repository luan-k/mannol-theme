import $ from "jquery";

$(document).ready(function () {
  $(".wk-header__button").click(function () {
    $(this).toggleClass("active");
    $(".wk-header__nav").toggleClass("active");
  });
});
