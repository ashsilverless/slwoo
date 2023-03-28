
//@prepros-prepend owl.carousel.min.js
//@prepros-prepend fslightbox.js
//@prepros-prepend scrollreveal.js

jQuery(document).ready(function ($) {
  /* ADD CLASS ON SCROLL*/

  $(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
      $("body").addClass("scrolled");
    } else {
      $("body").removeClass("scrolled");
    }
  });




  /* TABBED CONTENT */

  $(document).ready(function () {
    if ($(".tabbed-section").length) {
      $(".tabbed-section__head--tab:nth-child(1)").addClass("active");
      $(".tabbed-section__body--item:nth-child(1)").addClass("visible");
    }
  });

  $(".tabbed-section__head--tab").click(function (e) {
    var selectedTab = $(this).attr("data-tab");
    $(".tabbed-section__head--tab.active").removeClass("active");
    $(this).addClass("active");
    $(".tabbed-section__body--item.visible").removeClass("visible");
    $(".tabbed-section__body--item." + selectedTab).addClass("visible");
  });

  // ============ Carousels

  $(".testimonial-carousel").owlCarousel({
    loop: true,
    margin: 48,
    center: true,
    autoplay: true,
    autoplayTimeout: 15000,
    autoplayHoverPause: true,
    navText: [
      "<div class='nav-button owl-prev'><i class='fal fa-chevron-left fa-2x'></i></div>",
      "<div class='nav-button owl-next'><i class='fal fa-chevron-right fa-2x'></i></div>",
    ],
    responsive: {
      0: {
        items: 1,
        nav: false,
        dotsEach: 2,
      },
      600: {
        items: 1,
        nav: false,
      },
      1000: {
        items: 1,
        nav: true,
        dots: false,
      },
    },
  });

  $(".logo-carousel").owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 6000,
    autoplayHoverPause: true,
    navText: [
      "<div class='nav-button owl-prev'><i class='fal fa-chevron-left fa-2x'></i></div>",
      "<div class='nav-button owl-next'><i class='fal fa-chevron-right fa-2x'></i></div>",
    ],
    responsive: {
      0: {
        items: 1,
        nav: false,
      },
      600: {
        items: 2,
        nav: false,
      },
      1000: {
        items: 4,
        nav: true,
        dots: false,
      },
    },
  });

  $(".slick-center").owlCarousel({
    loop: true,
    center: true,
    autoplay: true,
    autoplayTimeout: 7000,
    autoplayHoverPause: true,
    items: 1,
    margin: 20,
    nav: true,
    navText: [
      "<div class='nav-button owl-prev'><i class='fal fa-chevron-left fa-2x'></i></div>",
      "<div class='nav-button owl-next'><i class='fal fa-chevron-right fa-2x'></i></div>",
    ],
    dots: false,
    responsive: {
      0: {
        items: 1,
        nav: false,
        dots: true,
        dotsEach: 4,
      },
      768: {
        items: 1,
        nav: true,
      },
      1170: {
        items: 1,
        nav: true,
      },
    },
  });

  $(".dest-slider").owlCarousel({
    loop: true,
    margin: 32,
    navText: [
      "<div class='nav-button owl-prev'><i class='fal fa-chevron-left fa-2x'></i></div>",
      "<div class='nav-button owl-next'><i class='fal fa-chevron-right fa-2x'></i></div>",
    ],
    responsive: {
      0: {
        items: 1,
        nav: false,
        dotsEach: 4,
      },
      600: {
        items: 2,
        nav: false,
      },
      1000: {
        items: 3,
        nav: true,
        dots: false,
      },
    },
  });
  $(".signature-itins").owlCarousel({
    loop: true,
    margin: 32,
    navText: [
      "<div class='nav-button owl-prev'><i class='fal fa-chevron-left fa-2x'></i></div>",
      "<div class='nav-button owl-next'><i class='fal fa-chevron-right fa-2x'></i></div>",
    ],
    responsive: {
      0: {
        items: 1,
        nav: false,
      },
      600: {
        items: 2,
        nav: false,
      },
      1000: {
        items: 3,
        nav: true,
        dots: false,
      },
    },
  });
  $(".prop-slider").owlCarousel({
    loop: true,
    margin: 48,
    center: true,
    navText: [
      "<div class='nav-button owl-prev'><i class='fal fa-chevron-left'></i></div>",
      "<div class='nav-button owl-next'><i class='fal fa-chevron-right'></i></div>",
    ],
    responsive: {
      0: {
        items: 1,
        nav: false,
        dotsEach: 4,
      },
      600: {
        items: 1,
        nav: false,
      },
      1000: {
        items: 1,
        nav: true,
        dots: false,
      },
    },
  });
  $(".itin-slider").owlCarousel({
    loop: true,
    margin: 32,
    navText: [
      "<div class='nav-button owl-prev'><i class='fal fa-chevron-left'></i></div>",
      "<div class='nav-button owl-next'><i class='fal fa-chevron-right'></i></div>",
    ],
    responsive: {
      0: {
        items: 1,
        nav: false,
        dotsEach: 4,
      },
      600: {
        items: 2,
        nav: false,
      },
      1000: {
        items: 3,
        nav: true,
        dots: false,
      },
    },
  });


  $(".slider-cta").owlCarousel({
    loop: true,
    margin: 50,
    center: true,
    stagePadding: 100,
    navText: [
      "<div class='nav-button owl-prev'><i class='fal fa-chevron-left'></i></div>",
      "<div class='nav-button owl-next'><i class='fal fa-chevron-right'></i></div>",
    ],
    responsive: {
      0: {
        items: 1,
        nav: false,
        dotsEach: 4,
      },
      600: {
        items: 1,
        nav: false,
      },
      1000: {
        items: 1,
        nav: true,
        dots: false,
      },
    },
  });

  $(".highlights").owlCarousel({
    loop: true,
    margin: 50,
    center: true,
    stagePadding: 100,
    navText: [
      "<div class='nav-button owl-prev'><i class='fal fa-chevron-left'></i></div>",
      "<div class='nav-button owl-next'><i class='fal fa-chevron-right'></i></div>",
    ],
    responsive: {
      0: {
        items: 1,
        nav: false,
        dotsEach: 4,
      },
      600: {
        items: 1,
        nav: false,
      },
      1000: {
        items: 1,
        nav: true,
        dots: false,
      },
    },
  });

  $(".who-slider").owlCarousel({
    loop: true,
    center: true,
    dots: true,
    pagination: false,
    navigation: true,
    responsive: {
      0: {
        items: 1,
        nav: false,
        dotsEach: 1,
      },
      600: {
        items: 1,
        nav: false,
      },
      1000: {
        items: 1,
        nav: true,
        dots: false,
      },
    },
  });
  // ========== Controller for lightbox elements



  $(".toggle-block label").click(function () {
    var otherLabels = $(this).parent().siblings(".item").find("label");
    otherLabels.removeClass("collapsed");
    otherLabels.next().slideUp();
    $(this).toggleClass("collapsed");
    $(this).next().slideToggle();
  });

  $(".toggle-dates label").click(function () {
    var otherLabels = $(this).parent().siblings(".item").find("label");
    otherLabels.removeClass("collapsed");
    otherLabels.next().slideUp();
    $(this).toggleClass("collapsed");
    $(this).next().slideToggle();
  });

  // SIDEBAR MOBILEMENU

  $(document).ready(function () {
    function toggleSidebar() {
      $(".navbutton").toggleClass("active");
      $("main").toggleClass("move-to-left");
      $(".sidebar-item").toggleClass("active");
    }

    $(".navbutton").on("click tap", function () {
      toggleSidebar();
    });

    // $(document).keyup(function(e) {
    //   if (e.keyCode === 27) {
    //     toggleSidebar();
    //   }
    // });
  });

  // var mixer = mixitup('.filter-grid');
  var containerEl = document.querySelector(".top-filter");
  var mixer;

  if (containerEl) {
    mixer = mixitup(containerEl, {
      multifilter: {
        enable: true,
      },
    });
  }
  // var mixer = mixitup('.filter-grid');
  var containerEl = document.querySelector(".side-filter");
  var mixer;

  if (containerEl) {
    mixer = mixitup(containerEl, {
      multifilter: {
        enable: true,
      },
      callbacks: {
        onMixStart: function (state, originalEvent) {
          $("html, body").animate(
            {
              scrollTop: $("#filterscroll").offset().top - 200,
            },
            "fast"
          );
        },
      },
    });
  }

  $("#filter-button").click(function () {
    $(".mobile-filter").toggleClass("open");

  });
  window.addEventListener('scroll', function () {
    $(".mobile-filter").removeClass("open");
  });

  var containerPG = document.querySelector(".paged-six");
  var mixer;

  if (containerPG) {
    mixer = mixitup(containerPG, {
      pagination: {
        limit: 6,
      },
    });
  }

  // ACCORDIAN SINGLE ITEM ONLY

  var accordion = $('.accordion').length;
  if (accordion) {
    $(".accordion__item-question").click(function () {
      $(this).next('.accordion__item-answer').slideToggle();
      $(this).parent('.accordion__item').toggleClass('active');
    });
  }

  var slideLeft = {
    distance: "40px",
    origin: "left",
    opacity: 0.0,
    duration: 1000,
    delay: 250,
    mobile: false,
  };
  var slideRight = {
    distance: "40px",
    origin: "right",
    opacity: 0.0,
    duration: 1000,
    mobile: false,
  };
  var slideDown = {
    distance: "40px",
    origin: "top",
    opacity: 0.0,
    duration: 1000,
    mobile: false,
  };
  var slideUp = {
    distance: "40px",
    origin: "bottom",
    opacity: 0.0,
    duration: 1000,
    mobile: false,
  };
  var tileDown = {
    distance: "40px",
    origin: "top",
    opacity: 0.0,
    duration: 1000,
    mobile: false,
    interval: 40,
  };

  ScrollReveal().reveal(".fmleft", slideLeft);
  ScrollReveal().reveal(".fmtop", slideDown);
  ScrollReveal().reveal(".fmbottom", slideUp);
  ScrollReveal().reveal(".fmright", slideRight);
  ScrollReveal().reveal(".tile", tileDown);
  ScrollReveal().reveal(".row-default", slideRight);
  ScrollReveal().reveal(".row-reverse", slideLeft);

  $(".expvideo")
    .parent()
    .click(function () {
      if ($(this).children(".expvideo").get(0).paused) {
        $(this).children(".expvideo").get(0).play();
        $(this).children(".playpause").fadeOut();
        document.querySelector(".wrapper").classList.add("expanded");
      } else {
        $(this).children(".expvideo").get(0).pause();
        $(this).children(".playpause").fadeIn();
        document.querySelector(".wrapper").classList.remove("expanded");
      }
    });

  $(document).ready(function () {
    $(".limit-four").slice(0, 4).show();
    $("#loadMore").on("click", function (e) {
      e.preventDefault();
      $(".limit-four:hidden").slice(0, 30).slideDown();
      if ($(".limit-four:hidden").length == 0) {
        $("#loadMore").text("No Content").addClass("noContent");
      }
    });
  });

  $(".limit-six").slice(0, 6).show();
  $(".limit-six:hidden").css("opacity", 0);
  $("#viewAll").on("click", function (e) {
    $(".limit-six:hidden") // Added :hidden
      .slice(0, 30)
      .slideDown("slow")
      .animate(
        {
          opacity: 1,
        },
        {
          queue: false,
          duration: "slow",
        }
      );
    // We need to check the count of just the hidden items
    if ($(".limit-six:hidden").length == 0) {
      $("#viewmorelink").fadeOut("slow");
    }
    e.preventDefault();
  });

  $("#parent .limit-three").slice(0, 3).show();
  $("#parent .limit-three:hidden").css("opacity", 0);
  $("#viewAll").on("click", function (e) {
    $("#parent .limit-three:hidden") // Added :hidden
      .slice(0, 30)
      .slideDown("slow")
      .animate(
        {
          opacity: 1,
        },
        {
          queue: false,
          duration: "slow",
        }
      );
    // We need to check the count of just the hidden items
    if ($("#parent .limit-three:hidden").length == 0) {
      $("#viewmorelink").fadeOut("slow");
    }
    e.preventDefault();
  });

  $(".limit-nine").slice(0, 6).show();
  $(".limit-nine:hidden").css("opacity", 0);
  $("#viewAll").on("click", function (e) {
    $(".limit-nine:hidden") // Added :hidden
      .slice(0, 30)
      .slideDown("slow")
      .animate(
        {
          opacity: 1,
        },
        {
          queue: false,
          duration: "slow",
        }
      );
    // We need to check the count of just the hidden items
    if ($(".limit-nine:hidden").length == 0) {
      $("#viewmorelink").fadeOut("slow");
    }
    e.preventDefault();
  });

  $(document).ready(function () {
    "use strict";

    var c,
      currentScrollTop = 0,
      navbar = $("header.global"),
      intineraryLink = $('.floating-link');

    $(window).scroll(function () {
      var a = $(window).scrollTop();
      var b = navbar.height();

      currentScrollTop = a;

      if (c < currentScrollTop && a > b + b) {
        navbar.addClass("scrollUp");
        intineraryLink.addClass('moveLeft');
      } else if (c > currentScrollTop && !(a <= b)) {
        navbar.removeClass("scrollUp");
        intineraryLink.removeClass('moveLeft');
      }
      c = currentScrollTop;
    });
  });

  $(".map-link").click(function () {
    $(".map-hero").addClass("visible");
  });
  $(".map-close").click(function () {
    $(".map-hero").removeClass("visible");
  });


  function country_map() {
    $('.image-panel').hide();
    $('.image-panel-wrapper').children().first().show();
    var initial_country = $('.image-panel-wrapper').children().first().attr('id');
    $("path#" + initial_country).addClass('active');
    $('.country-panel p.' + initial_country).addClass('active');
    $(".country-panel > p").click(function () {
      var selected_country = $(this).attr('class');
      $('.map-wrapper > svg path').removeClass('active');
      $("path#" + selected_country).addClass('active');
      $('#' + selected_country).fadeIn();
      $('.image-panel').not('#' + selected_country).fadeOut();
      $('.country-panel p').removeClass('active');
      $(this).addClass('active');
    });
  };
  country_map();

  $(document).ready(function () {
    $('.country-panel p').each(function () {
      var agent_country = $(this).attr("id");
      $("path#" + agent_country).addClass('available');
    });
  });

  function where_we_go_map() {
    $('.where-we-go #map-format').addClass('highlight');
    $(".where-we-go .country-panel p").hover(function () {
      var selected_country = $(this).attr('id');
      $('.map-wrapper > svg path').removeClass('active');
      $("path#" + selected_country).addClass('active');
      $('#' + selected_country).fadeIn();
    });
  }
  where_we_go_map();



  $(".video > svg").click(function () {
    $(".video-modal").addClass("visible");
    $('.video-modal > video').trigger('play');
  });

  $(".video-modal > .close").click(function () {
    $(".video-modal").removeClass("visible");
    $('.video-modal > video').trigger('pause');
    $('.video-modal > video').currentTime(0);
  });

  $("#grid-format").click(function () {
    $(".highlights").slideUp();
    $(".highlight-grid").slideDown();
    $(this).addClass('highlight');
    $("#wide-format").removeClass('highlight');
  });

  $("#wide-format").click(function () {
    $(".highlights").slideDown();
    $(".highlight-grid").slideUp();
    $(this).addClass('highlight');
    $("#grid-format").removeClass('highlight');
  });

  $("#map-format").click(function () {
    $(".grid-layout").slideUp();
    $(".map-layout").slideDown();
    $(this).addClass('highlight');
    $("#grid-format").removeClass('highlight');
  });

  $("#grid-format").click(function () {
    $(".grid-layout").slideDown();
    $(".map-layout").slideUp();
    $(this).addClass('highlight');
    $("#map-format").removeClass('highlight');
  });

  var containerGallery = document.querySelector(".gallery_with_text__header");

  if (containerGallery) {
    $(".gallery_with_text__header").click(function () {
      $(this).children('.copy').slideToggle();
      $(this).toggleClass('open');
    });
  }
  $(".dropdown").click(function () {
    $(this).toggleClass('active');
  });
  $('.dropdown').mouseleave(function () {
    $(this).removeClass('active');
  });

}); //Don't remove ---- end of jQuery wrapper

var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight) {
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}


/**
 *  Read More JS
 *  Truncates text via specfied character length with more/less actions.
 *  Maintains original format of pre truncated text.
 *  @author stephen scaff
 *  @todo   Add destroy method for ajaxed content support.
 *
 */
const ReadMore = (() => {
  let s;
  return {
    settings() {
      return {
        content: document.querySelectorAll('.js-read-more'),
        originalContentArr: [],
        truncatedContentArr: [],
        moreLink: "Read More",
        lessLink: "Read Less"
      };
    },

    init() {
      s = this.settings();
      this.bindEvents();
    },

    bindEvents() {
      ReadMore.truncateText();
    },

    /**
     * Count Words
     * Helper to handle word count.
     * @param {string} str - Target content string.
     */
    countWords(str) {
      return str.split(/\s+/).length;
    },

    /**
     * Ellpise Content
     * @param {string} str - content string.
     * @param {number} wordsNum - Number of words to show before truncation.
     */
    ellipseContent(str, wordsNum) {
      return str.split(/\s+/).slice(0, wordsNum).join(' ') + '...';
    },

    /**
     * Truncate Text
     * Truncate and ellipses contented content
     * based on specified word count.
     * Calls createLink() and handleClick() methods.
     */
    truncateText() {
      for (let i = 0; i < s.content.length; i++) {
        //console.log(s.content)
        const originalContent = s.content[i].innerHTML;
        const numberOfWords = s.content[i].dataset.rmWords;
        const truncateContent = ReadMore.ellipseContent(originalContent, numberOfWords);
        const originalContentWords = ReadMore.countWords(originalContent);
        s.originalContentArr.push(originalContent);
        s.truncatedContentArr.push(truncateContent);

        if (numberOfWords < originalContentWords) {
          s.content[i].innerHTML = s.truncatedContentArr[i];
          let self = i;
          ReadMore.createLink(self);
        }
      }

      ReadMore.handleClick(s.content);
    },

    /**
     * Create Link
     * Creates and Inserts Read More Link
     * @param {number} index - index reference of looped item
     */
    createLink(index) {
      const linkWrap = document.createElement('span');
      linkWrap.className = 'read-more';
      linkWrap.innerHTML = `<a id="read-more_${index}" class="read-more__link" style="cursor:pointer;">${s.moreLink}</a>`; // Inset created link

      s.content[index].parentNode.insertBefore(linkWrap, s.content[index].nextSibling);
    },

    /**
     * Handle Click
     * Toggle Click eve
     */
    handleClick(el) {
      const readMoreLink = document.querySelectorAll('.read-more__link');

      for (let j = 0, l = readMoreLink.length; j < l; j++) {
        readMoreLink[j].addEventListener('click', function () {
          const moreLinkID = this.getAttribute('id');
          let index = moreLinkID.split('_')[1];
          el[index].classList.toggle('is-expanded');

          if (this.dataset.clicked !== 'true') {
            el[index].innerHTML = s.originalContentArr[index];
            this.innerHTML = s.lessLink;
            this.dataset.clicked = true;
          } else {
            el[index].innerHTML = s.truncatedContentArr[index];
            this.innerHTML = s.moreLink;
            this.dataset.clicked = false;
          }
        });
      }
    },

    /**
     * Open All
     * Method to expand all instances on the page.
     */
    openAll() {
      const instances = document.querySelectorAll('.read-more__link');

      for (let i = 0; i < instances.length; i++) {
        content[i].innerHTML = s.truncatedContentArr[i];
        instances[i].innerHTML = s.moreLink;
      }
    }

  };
})();

ReadMore.init();


