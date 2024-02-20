// Custom JS here.

// const jquery = require("jquery");

/**************************************************************************************************/
jQuery(document).ready(function () {
  img2svg(".replaceSvg");

  /*
   * Applying img2svg to grid builder filter events so icons won't lose
   *
   *
   * */

  // console.log(slideUpObs);

  // if(jQuery('.wpgb-inline-list').length){
  //     var wpgb = WP_Grid_Builder.instances[1].facets;
  // }
  // console.dir( wpgb ); // Holds all instances.

  // wpgb.on('change', function(args) {
  //     // img2svg('.replaceSvg');
  //     animatePropertyCards = gsap.utils.toArray('.card-property:not(.animated)');
  //     animatePostCards = gsap.utils.toArray('.card-post:not(.animated)');

  //     animatePropertyCards.forEach(card => {

  //         slideUpObs.observe(card);

  //     });

  //     animatePostCards.forEach(card => {
  //         slideUpObs.observe(card);
  //     });
  // });

  // wpgb.on('appended', function(args) {

  //     // img2svg('.replaceSvg');
  //     animatePropertyCards.forEach(card => {

  //         slideUpObs.observe(card);

  //     });

  //     animatePostCards.forEach(card => {
  //         slideUpObs.observe(card);
  //     });

  // });

  var scrollbarWidth = getScrollbarWidth();
  // console.log(scrollbarWidth);

  var $body = jQuery(window.document.body);
  var disableScroll = false;

  // function bodyFreezeScroll() {
  //     var bodyWidth = $body.innerWidth();
  //     $body.css('overflow', 'hidden');
  //     $body.css('paddingRight', )
  // }

  // function bodyUnfreezeScroll() {
  //     var bodyWidth = $body.innerWidth();
  //     $body.css('paddingRight', '-=' + (bodyWidth - $body.innerWidth()))
  //     $body.css('overflow', 'auto');
  // }

  jQuery(".navbar-toggler").click(function () {
    jQuery(".navbar").toggleClass("open");
    jQuery(this).toggleClass("open");
    jQuery("body").toggleClass("overflow-hidden");

    if (!disableScroll) {
      jQuery(".navbar").css("paddingRight", scrollbarWidth + "px");
      jQuery("body").css("paddingRight", scrollbarWidth + "px");
      disableScroll = true;
    } else {
      jQuery(".navbar").css("paddingRight", "0px");
      jQuery("body").css("paddingRight", "0px");
      disableScroll = false;
    }
    // console.log(disableScroll)
  });

  gallerySlider();

  if (jQuery(".hero-slide").length > 1) {
    var total = jQuery(".hero-slide").length;

    jQuery(".hero-slide").each(function (index) {
      jQuery(this)
        .find(".swiper-pagination-current")
        .html(index + 1 + "");
    });

    jQuery(".hero-slide").each(function (index) {
      jQuery(this)
        .find(".swiper-pagination-total")
        .html(total + "");
    });
  }

  jQuery(".basis").addClass("active");

  var swiper = new Swiper(".graph-swiper", {
    loop: false,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  var swiper2 = new Swiper(".cards-swiper", {
    effect: "cards",
    grabCursor: true,
  });

  var swiper3 = new Swiper(".features-swiper", {
    // effect: "cards",
    // grabCursor: true,
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  });

  readmoreCustom();
  readmoreCustomBig();
  navbarScroll();

  jQuery(".single-img a").simpleLightbox();
  jQuery(".two-img a").simpleLightbox();
  jQuery(".five-img a").simpleLightbox();
  // jQuery(".five-img a").simpleLightbox();
  // jQuery('.video-play').on('click', function() {
  //     // console.log('a');
  //     // console.log(this);
  //     if (jQuery(this).data('from') == 'lf') {
  //         jQuery(this).prev().find('video > source').attr('src', jQuery(this).data('src'));
  //         jQuery(this).prev().find('video')[0].load();
  //     } else {
  //         // jQuery(this).prev().find('iframe').attr('src', jQuery(this).data('src'));
  //         jQuery(this).prev().attr('src', jQuery(this).data('src'));
  //     }
  //     jQuery(this).prev().addClass('show');
  //     jQuery(this).fadeOut();
  // });

  jQuery(".video-play-card").on("click", function (e) {
    var data = jQuery(this).data();

    if (data.from == "lf") {
      var video =
        '<video class="w-100" controls autoplay><source src="' +
        data.src +
        '" type="video/mp4" /></video>';
    } else {
      var video =
        '<iframe src="' +
        data.src +
        '" frameborder="0" allow="autoplay" muted="0" allowfullscreen></iframe>';
    }
    //find modal
    var modal = jQuery(".modal").find(".modal-body");

    // jQuery(data.bsTarget).find('.modal-body').html(video);
    modal.html(video);

    jQuery(data.bsTarget).one("hide.bs.modal", function () {
      jQuery(data.bsTarget).find(".modal-body").html("");
    });
  });
});

/**************************************************************************************************/

jQuery(window).on("load", function () {});

/**************************************************************************************************/
jQuery(window).scroll(function () {
  navbarScroll();
});

/**************************************************************************************************/
var a;

jQuery(window).resize(function () {
  clearTimeout(a);
  a = setTimeout(function () {}, 250);
});

/**************************************************************************************************/
jQuery(window).scroll(function () {
  navbarScroll();
});

// jQuery(window).scroll(function() {
//   if (jQuery(this).scrollTop() > 0) {
//     jQuery('.navbar-brand').addClass('scrolled');
//   } else {
//     jQuery('.navbar-brand').removeClass('scrolled');
//   }
// });
