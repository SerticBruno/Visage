// jQuery(document).ready(function () {
//   if (jQuery(".wpgb-inline-list").length) {
//     var wpgb = WP_Grid_Builder.instances[1].facets;

//     wpgb.on("appended", function (args) {
//       var scrollPlacement = document.querySelector(".wpgb-inline-list");
//       if (scrollPlacement) {
//         var scrollOffsetElement = document.querySelector(
//           'div[aria-pressed="true"'
//         ).parentElement;
//         var scrollOffset = scrollOffsetElement.offsetLeft;
//         scrollPlacement.scrollLeft = scrollOffset;
//       }
//     });

//     wpgb.on("loaded", function (args) {
//       if (scrollPlacement) {
//         var scrollPlacement = document.querySelector(".wpgb-inline-list");
//         var scrollOffsetElement = document.querySelector(
//           'div[aria-pressed="true"'
//         ).parentElement;
//         var scrollOffset = scrollOffsetElement.offsetLeft;
//         scrollPlacement.scrollLeft = scrollOffset;
//       }
//     });
//   }

//   if (jQuery(".wpgb-pagination").length) {
//     var wpgb = WP_Grid_Builder.instances[1].facets;
//     console.log("idemo");
//     wpgb.on("loaded", function (args) {
//       var listToAppend = jQuery(".wpgb-pagination");

//       if (listToAppend[0]) {
//         var pages = jQuery(".wpgb-page");

//         var nextBtnFound = false;
//         var prevBtnFound = false;

//         var prevBtnText = "Previous";
//         var nextBtnText = "Next";

//         pages.each(function () {
//           if (jQuery(this).text() == nextBtnText) {
//             nextBtnFound = true;
//           }

//           if (jQuery(this).text() == prevBtnText) {
//             prevBtnFound = true;
//           }
//         });

//         if (nextBtnFound) {
//           removeNextBtn();
//         } else {
//           createNextBtn();
//         }

//         if (prevBtnFound) {
//           removeFrontBtn();
//         } else {
//           createFrontBtn();
//         }

//         if (listToAppend[0]) {
//           listToAppend[0].firstChild.classList.add("dont-border");
//           listToAppend[0].firstChild.classList.add("prev");

//           listToAppend[0].lastChild.classList.add("dont-border");
//           listToAppend[0].lastChild.classList.add("next");
//         }
//       }

//       //checkButtons();
//     });
//   }

//   if (jQuery(".gdpr-link").length) {
//     jQuery(".gdpr-link").attr("href", privacyPolicyUrl);
//   }
// });

// function checkButtons() {
//   checkIfMobile();
// }

// function checkIfMobile() {
//   var mobileWidth = 425;

//   if (jQuery(window).width() <= mobileWidth) {
//     var prevBtn = jQuery(".prev")[0];
//     var nextBtn = jQuery(".next")[0];

//     prevBtn.firstChild.textContent = "";
//     nextBtn.firstChild.textContent = "";

//     prevBtn.firstChild.style.marginTop = "16px";
//     nextBtn.firstChild.style.marginTop = "16px";
//     // console.log(prevBtn.firstChild.textContent);
//   }
// }

// function createFrontBtn() {
//   var list = jQuery(".wpgb-pagination");
//   list.prepend('<li class="page-nav-button-prev"><a href="">Prije</a></li>');
// }

// function createNextBtn() {
//   var list = jQuery(".wpgb-pagination");
//   list.append('<li class="page-nav-button-next"><a href="">Poslije</a></li>');
// }

// function removeFrontBtn() {
//   var btn = jQuery(".page-nav-button-prev");
//   btn.remove();
// }

// function removeNextBtn() {
//   var btn = jQuery(".page-nav-button-next");
//   btn.remove();
// }
