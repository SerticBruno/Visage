/**************************************************************************************************/
function equalHeight(o) {
  var offset,
    top = 0,
    height = 0,
    innerHeight,
    rowElements = [];

  jQuery(o).each(function (i, e) {
    offset = jQuery(e).offset();
    if (offset.top > top + 100) {
      top = offset.top;
      jQuery(rowElements).height(height);
      height = 0;
      rowElements = [];
    }
    innerHeight = 0;
    if (jQuery(e).children().length > 0) {
      jQuery(e)
        .children()
        .each(function (ci, ce) {
          innerHeight += jQuery(ce).outerHeight(true);
        });
    } else {
      innerHeight += jQuery(e).innerHeight();
    }
    height = Math.max(height, innerHeight);
    rowElements.push(e);
  });
  jQuery(rowElements).height(height);
}
/**************************************************************************************************/
function acf_form_style() {
  var imageUpload = jQuery(".acf-image-uploader");
  jQuery("#_acf_post_id").val(0);
}
/**************************************************************************************************/
function toggleCheckbox(c, v) {
  v = typeof v === "undefined" ? false : v;
  if (v === true) {
    jQuery(c).attr("checked", "checked");
  } else {
    jQuery(c).removeAttr("checked");
  }
}
/**************************************************************************************************/
function getMore4GlobalSearch(o) {
  var onPage = jQuery(o).data("onpage");
  var cards = jQuery(o).parent().parent().find(".d-none");
  var num = Math.min(onPage, cards.length);

  if (cards.length > 0) {
    if (onPage >= cards.length) {
      jQuery(o).parent().fadeOut();
    }

    jQuery("html,body").animate(
      {
        scrollTop: jQuery(o).offset().top - 50,
      },
      800
    );

    for (var i = 0; i < num; i++) {
      jQuery(cards).eq(i).removeClass("d-none");
    }
  }

  /*
    jQuery.ajax({
        type: 'POST',
        url: adminAjax,
        data: {
            'filter': data,
            'action': 'q_getMore4GlobalSearch'
        },
        success: function(d) {
            jQuery(o).data('results', data.results);
            if (data.results <= 0) {
                jQuery(o).parent().fadeOut();
            }
            jQuery('html,body').animate({
                scrollTop: jQuery(o).offset().top - 50
            }, 800);            
            jQuery(o).parent().prev().after(d);
        },
        error: function() {
            console.log('Load More ERROR!!!');
        }
    });
*/
}
/**************************************************************************************************/

function toggleSwitch() {
  var toggleSwitch = document.querySelector(
    '.theme-switch input[type="checkbox"]'
  );

  toggleSwitch.addEventListener(
    "change",
    function (e) {
      if (e.target.checked) {
        document.documentElement.setAttribute("data-theme", "dark");
        localStorage.setItem("theme", "dark"); //add this
      } else {
        document.documentElement.setAttribute("data-theme", "light");
        localStorage.setItem("theme", "light"); //add this
      }
      if (typeof vectorMap !== "undefined") {
        vectorMap.remove();
        initVectorMap();
      }
    },
    false
  );

  var currentTheme = localStorage.getItem("theme")
    ? localStorage.getItem("theme")
    : null;

  if (currentTheme) {
    document.documentElement.setAttribute("data-theme", currentTheme);

    if (currentTheme === "dark") {
      toggleSwitch.checked = true;
    }
  }
}

/**************************************************************************************************/

var BrowserDetect = {
  init: function () {
    this.browser = this.searchString(this.dataBrowser) || "Other";
    this.version =
      this.searchVersion(navigator.userAgent) ||
      this.searchVersion(navigator.appVersion) ||
      "Unknown";
  },
  searchString: function (data) {
    for (var i = 0; i < data.length; i++) {
      var dataString = data[i].string;
      this.versionSearchString = data[i].subString;

      if (dataString.indexOf(data[i].subString) !== -1) {
        return data[i].identity;
      }
    }
  },
  searchVersion: function (dataString) {
    var index = dataString.indexOf(this.versionSearchString);
    if (index === -1) {
      return;
    }

    var rv = dataString.indexOf("rv:");
    if (this.versionSearchString === "Trident" && rv !== -1) {
      return parseFloat(dataString.substring(rv + 3));
    } else {
      return parseFloat(
        dataString.substring(index + this.versionSearchString.length + 1)
      );
    }
  },

  dataBrowser: [
    { string: navigator.userAgent, subString: "Edge", identity: "Edge" },
    { string: navigator.userAgent, subString: "MSIE", identity: "Explorer" },
    { string: navigator.userAgent, subString: "Trident", identity: "Explorer" },
    { string: navigator.userAgent, subString: "Firefox", identity: "Firefox" },
    { string: navigator.userAgent, subString: "Opera", identity: "Opera" },
    { string: navigator.userAgent, subString: "OPR", identity: "Opera" },

    { string: navigator.userAgent, subString: "Chrome", identity: "Chrome" },
    { string: navigator.userAgent, subString: "Safari", identity: "Safari" },
  ],
};

BrowserDetect.init();

/**************************************************************************************************/

function is_touch_device() {
  var prefixes = " -webkit- -moz- -o- -ms- ".split(" ");
  var mq = function (query) {
    return window.matchMedia(query).matches;
  };

  if (
    "ontouchstart" in window ||
    (window.DocumentTouch && document instanceof DocumentTouch)
  ) {
    return true;
  }

  // include the 'heartz' as a way to have a non matching MQ to help terminate the join
  // https://git.io/vznFH
  var query = ["(", prefixes.join("touch-enabled),("), "heartz", ")"].join("");
  return mq(query);
}

/**************************************************************************************************/

function getParameterByName(name, url) {
  if (!url) url = window.location.href;
  name = name.replace(/[\[\]]/g, "\\$&");
  var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
    results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return "";
  return decodeURIComponent(results[2].replace(/\+/g, " "));
}

/**************************************************************************************************/

function img2svg(obj) {
  //  Replace all SVG images with inline SVG
  jQuery(obj).each(function () {
    var $img = jQuery(this);
    var imgID = $img.attr("id");
    var imgClass = $img.attr("class");
    var imgURL = $img.attr("src");
    jQuery.get(imgURL, function (data) {
      //          Get the SVG tag, ignore the rest
      var $svg = jQuery(data).find("svg");
      //         Add replaced image's ID to the new SVG
      if (typeof imgID !== "undefined") {
        $svg = $svg.attr("id", imgID);
      }
      //         Add replaced image\'s classes to the new SVG
      if (typeof imgClass !== "undefined") {
        $svg = $svg.attr("class", imgClass + " replaced-svg");
      }
      //         Remove any invalid XML tags as per http:validator.w3.org
      $svg = $svg.removeAttr("xmlns:a");
      //         Replace image with new SVG
      $img.replaceWith($svg);
      var $btn = $svg.parent();
      if ($btn.hasClass("btn-toShop")) {
        var iconBG = $btn.css("backgroundColor");
        $svg.find(".iconBG").attr("fill", iconBG);
      }
    });
  });
}
/********************** */
function getScrollbarWidth() {
  return window.innerWidth - document.documentElement.clientWidth;
}

/********************************** */

function gallerySlider() {
  var moreThan4 = false;
  var moreThan6 = false;

  if (jQuery(".swiper-nav .swiper-slide").length > 4) {
    moreThan4 = true;
  }
  if (jQuery(".swiper-nav .swiper-slide").length > 6) {
    moreThan6 = true;
  }

  var swiper = new Swiper(".swiper-nav", {
    loop: moreThan4,
    spaceBetween: 24,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
    // Responsive breakpoints
    breakpoints: {
      1200: {
        slidesPerView: 6,
        loop: moreThan6,
      },
    },
  });

  var swiper2 = new Swiper(".swiper-main", {
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      type: "fraction",
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });

  var swiper = new Swiper(".my-parallax-swiper", {
    speed: 600,
    parallax: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
}

var readMoreLink = "Les mer...";
var readLessLink = "Les mindre";

function readmoreCustom() {
  var $text = jQuery(".readmore-text-wrap");

  if ($text.height() > 350) {
    $text.readmore({
      speed: 250,
      // collapsedHeight: 300,
      moreLink:
        '<button type="button" class="readmoreLink" href="#">' +
        readMoreLink +
        "</button>",
      lessLink:
        '<button type="button" class="readmoreLink" href="#">' +
        readLessLink +
        "</button>",
      heightMargin: 20,
    });
  }
}

function readmoreCustomBig() {
  var $text = jQuery(".readmore-text-wrap-big");

  if ($text.height() > 1000) {
    $text.readmore({
      speed: 250,
      collapsedHeight: 650,
      moreLink:
        '<button type="button" class="readmoreLink" href="#">' +
        readMoreLink +
        "</button>",
      lessLink:
        '<button type="button" class="readmoreLink" href="#">' +
        readLessLink +
        "</button>",
      heightMargin: 80,
    });
  }
}

function navbarScroll() {
  var sticky = jQuery(".navbar"),
    scroll = jQuery(window).scrollTop();

  // var headerHeight = jQuery('header').innerHeight();

  if (scroll > 0) {
    sticky.addClass("scrolled");
  }

  if (scroll === 0) {
    sticky.removeClass("scrolled");
  }
}

function youtubeCardsLazyLoad() {
  // var elements = document.querySelectorAll('.accordion-button');
  // var cards = elements[0];
  // console.log(cards);
  // for (i = 0; i < elements.length; i++) {
  //     elements[i].addEventListener("click", function() {
  //         this.querySelectorAll('lazy-load-card');
  //     });
  // }
}

var swiper4 = new Swiper(".mySwi2per", {
  spaceBetween: 30,
  effect: "fade",
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

/******************************************** */

var heroswiper = new Swiper(".hero-slider", {
  loop: true,
  slidesPerView: 1,
  speed: 1000,
  autoplaySpeed: 2500,
  watchOverflow: true,
  pagination: {
    el: ".swiper-pagination",
    type: "fraction",
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});


img2svg(".replaceSvg");

var swiperfeatures = new Swiper(".swiper-features", {
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  loop: true,
  pagination: {
    el: ".swiper-features-pagination",
    clickable: true,
  },
  breakpoints: {
    // when window width is <= 499px
    425: {
        slidesPerView: 1,
        slidesPerGroup: 1,
        spaceBetweenSlides: 50
    },
    // when window width is <= 999px
    768: {
        slidesPerView: 2,
        slidesPerGroup: 2,
        spaceBetweenSlides: 30
    },
    // when window width is <= 999px
    1000: {
        slidesPerView: 4,
        slidesPerGroup: 4,
        spaceBetweenSlides: 50
    },
    // when window width is <= 999px
    2560: {
        slidesPerView: 5,
        slidesPerGroup: 5,
        spaceBetweenSlides: 50
    }
  }
});

/**************************************** */
