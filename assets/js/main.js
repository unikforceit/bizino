(function ($) {
  ("use strict");
  /*=================================
      JS Index Here
  ==================================*/
  /*
    01. On Load Function
    02. Preloader
    03. Mobile Menu Active
    04. Sticky fix
    05. Scroll To Top
    06. Set Background Image
    07. Hero Slider Active 
    08. Global Slider
    09. Ajax Contact Form
    10. Magnific Popup
    11. Section Position
    12. Filter
    13. Custom Tab
    14. Accordion Active Toggle
  */
  /*=================================
      JS Index End
  ==================================*/
  /*

  /*---------- 01. On Load Function ----------*/
  $(window).on("load", function () {
    $(".preloader").fadeOut();
  });

  /*---------- 02. Preloader ----------*/
  if ($(".preloader").length > 0) {
    $(".preloaderCls").each(function () {
      $(this).on("click", function (e) {
        e.preventDefault();
        $(".preloader").css("display", "none");
      });
    });
  }

  /*---------- 03. Mobile Menu Active ----------*/
  $.fn.vsmobilemenu = function (options) {
    var opt = $.extend({
          menuToggleBtn: ".vs-menu-toggle",
          bodyToggleClass: "vs-body-visible",
          subMenuClass: "vs-submenu",
          subMenuParent: "vs-item-has-children",
          subMenuParentToggle: "vs-active",
          meanExpandClass: "vs-mean-expand",
          appendElement: '<span class="vs-mean-expand"></span>',
          subMenuToggleClass: "vs-open",
          toggleSpeed: 400,
        },
        options
    );

    return this.each(function () {
      var menu = $(this); // Select menu

      // Menu Show & Hide
      function menuToggle() {
        menu.toggleClass(opt.bodyToggleClass);

        // collapse submenu on menu hide or show
        var subMenu = "." + opt.subMenuClass;
        $(subMenu).each(function () {
          if ($(this).hasClass(opt.subMenuToggleClass)) {
            $(this).removeClass(opt.subMenuToggleClass);
            $(this).css("display", "none");
            $(this).parent().removeClass(opt.subMenuParentToggle);
          }
        });
      }

      // Class Set Up for every submenu
      menu.find("li").each(function () {
        var submenu = $(this).find("ul");
        submenu.addClass(opt.subMenuClass);
        submenu.css("display", "none");
        submenu.parent().addClass(opt.subMenuParent);
        submenu.prev("a").append(opt.appendElement);
        submenu.next("a").append(opt.appendElement);
      });

      // Toggle Submenu
      function toggleDropDown($element) {
        if ($($element).next("ul").length > 0) {
          $($element).parent().toggleClass(opt.subMenuParentToggle);
          $($element).next("ul").slideToggle(opt.toggleSpeed);
          $($element).next("ul").toggleClass(opt.subMenuToggleClass);
        } else if ($($element).prev("ul").length > 0) {
          $($element).parent().toggleClass(opt.subMenuParentToggle);
          $($element).prev("ul").slideToggle(opt.toggleSpeed);
          $($element).prev("ul").toggleClass(opt.subMenuToggleClass);
        }
      }

      // Submenu toggle Button
      var expandToggler = "." + opt.meanExpandClass;
      $(expandToggler).each(function () {
        $(this).on("click", function (e) {
          e.preventDefault();
          toggleDropDown($(this).parent());
        });
      });

      // Menu Show & Hide On Toggle Btn click
      $(opt.menuToggleBtn).each(function () {
        $(this).on("click", function () {
          menuToggle();
        });
      });

      // Hide Menu On out side click
      menu.on("click", function (e) {
        e.stopPropagation();
        menuToggle();
      });

      // Stop Hide full menu on menu click
      menu.find("div").on("click", function (e) {
        e.stopPropagation();
      });
    });
  };

  $(".vs-menu-wrapper").vsmobilemenu();



  /*---------- 04. Sticky fix ----------*/
  var lastScrollTop = "";
  var scrollToTopBtn = ".scrollToTop";

  function stickyMenu($targetMenu, $toggleClass, $parentClass) {
    var st = $(window).scrollTop();
    var height = $targetMenu.css("height");
    $targetMenu.parent().css("min-height", height);
    if ($(window).scrollTop() > 800) {
      $targetMenu.parent().addClass($parentClass);

      if (st > lastScrollTop) {
        $targetMenu.removeClass($toggleClass);
      } else {
        $targetMenu.addClass($toggleClass);
      }
    } else {
      $targetMenu.parent().css("min-height", "").removeClass($parentClass);
      $targetMenu.removeClass($toggleClass);
    }
    lastScrollTop = st;
  }
  $(window).on("scroll", function () {
    stickyMenu($(".sticky-active"), "active", "will-sticky");
    if ($(this).scrollTop() > 500) {
      $(scrollToTopBtn).addClass("show");
    } else {
      $(scrollToTopBtn).removeClass("show");
    }
  });

  /*---------- 05. Scroll To Top ----------*/
  $(scrollToTopBtn).each(function () {
    $(this).on("click", function (e) {
      e.preventDefault();
      $("html, body").animate({
            scrollTop: 0,
          },
          lastScrollTop / 3
      );
      return false;
    });
  });

  /*---------- 06.Set Background Image ----------*/
  if ($("[data-bg-src]").length > 0) {
    $("[data-bg-src]").each(function () {
      var src = $(this).attr("data-bg-src");
      $(this).css("background-image", "url(" + src + ")");
      $(this).removeAttr("data-bg-src").addClass("background-image");
    });
  }

  /*----------- 07. Hero Slider Active ----------*/
  $(".vs-hero-carousel").each(function () {
    var vsHslide = $(this);

    // Get Data From Dom
    function d(data) {
      return vsHslide.data(data);
    }

    vsHslide.on("sliderDidLoad", function (event, slider) {
      var customNav = ".ls-custom-dot";
      var navDom = "data-slide-go";
      var currentSlide = slider.slides.current.index; // current Slide index
      var i = 1;
      // Set Attribute
      $(customNav).each(function () {
        $(this).attr(navDom, i);
        i++;
        // On Click Thumb, Change slide
        $(this).on("click", function (e) {
          e.preventDefault();
          var target = $(this).attr(navDom);
          vsHslide.layerSlider(parseFloat(target));
        });
      });

      // custom arrow js
      setTimeout(() => {
        vsHslide.find(".ls-custom-arrow").each(function () {
          $(this).on("click", function (e) {
            e.preventDefault();
            var gotarget = $(this).attr("data-change-slide");
            vsHslide.layerSlider(gotarget);
          });
        });
      }, 1000);

      // Add class To current Thumb
      var currentNav = customNav + "[" + navDom + '="' + currentSlide + '"';
      $(currentNav).addClass("active");
    }).on("slideChangeDidComplete", function (event, slider) {
      var currentActive = slider.slides.current.index; // After change Current Index
      var currentNav = '.ls-custom-dot[data-slide-go="' + currentActive + '"';
      $(currentNav).addClass("active").siblings().removeClass("active");
    });


    vsHslide.layerSlider({
      allowFullscreen: d('allowfullscreen') ? true : false,
      allowRestartOnResize: true,
      maxRatio: d("maxratio") ? d("maxratio") : 1,
      type: d("slidertype") ? d("slidertype") : "responsive",
      pauseOnHover: d("pauseonhover") ? true : false,
      navPrevNext: d("navprevnext") ? true : false,
      hoverPrevNext: d("hoverprevnext") ? true : false,
      hoverBottomNav: d("hoverbottomnav") ? true : false,
      navStartStop: d("navstartstop") ? true : false,
      navButtons: d("navbuttons") ? true : false,
      loop: d("loop") === false ? false : true,
      autostart: d("autostart") ? true : false,
      height: d("height") ? d("height") : 1080,
      responsiveUnder: d("responsiveunder") ? d("responsiveunder") : 1220,
      layersContainer: d("container") ? d("container") : 1220,
      showCircleTimer: d("showcircletimer") ? true : false,
      skinsPath: "layerslider/skins/",
      thumbnailNavigation: d("thumbnailnavigation") === false ? false : true,
    });
  });

  /*----------- 09. Ajax Contact Form ----------*/
  var form = ".ajax-contact";
  var invalidCls = "is-invalid";
  var $email = '[name="email"]';
  var $validation =
      '[name="name"],[name="email"],[name="number"],[name="subject"],[name="message"]'; // Must be use (,) without any space
  var formMessages = $(".form-messages");

  function sendContact() {
    var formData = $(form).serialize();
    var valid;
    valid = validateContact();
    if (valid) {
      jQuery
          .ajax({
            url: $(form).attr("action"),
            data: formData,
            type: "POST",
          })
          .done(function (response) {
            // Make sure that the formMessages div has the 'success' class.
            formMessages.removeClass("error");
            formMessages.addClass("success");
            // Set the message text.
            formMessages.text(response);
            // Clear the form.
            $(form + ' input:not([type="submit"]),' + form + " textarea").val("");
          })
          .fail(function (data) {
            // Make sure that the formMessages div has the 'error' class.
            formMessages.removeClass("success");
            formMessages.addClass("error");
            // Set the message text.
            if (data.responseText !== "") {
              formMessages.html(data.responseText);
            } else {
              formMessages.html(
                  "Oops! An error occured and your message could not be sent."
              );
            }
          });
    }
  }

  function validateContact() {
    var valid = true;
    var formInput;

    function unvalid($validation) {
      $validation = $validation.split(",");
      for (var i = 0; i < $validation.length; i++) {
        formInput = form + " " + $validation[i];
        if (!$(formInput).val()) {
          $(formInput).addClass(invalidCls);
          valid = false;
        } else {
          $(formInput).removeClass(invalidCls);
          valid = true;
        }
      }
    }
    unvalid($validation);

    if (
        !$($email).val() ||
        !$($email)
            .val()
            .match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)
    ) {
      $($email).addClass(invalidCls);
      valid = false;
    } else {
      $($email).removeClass(invalidCls);
      valid = true;
    }
    return valid;
  }

  $(form).on("submit", function (element) {
    element.preventDefault();
    sendContact();
  });

  /*----------- 10. Magnific Popup ----------*/
  /* magnificPopup img view */
  $(".popup-image").magnificPopup({
    type: "image",
    gallery: {
      enabled: true,
    },
  });

  /* magnificPopup video view */
  $(".popup-video").magnificPopup({
    type: "iframe",
  });

  /*---------- 11. Section Position ----------*/
  // Interger Converter
  function convertInteger(str) {
    return parseInt(str, 10);
  }

  $.fn.sectionPosition = function (mainAttr, posAttr, getPosValue) {
    $(this).each(function () {
      var section = $(this);

      function setPosition() {
        var sectionHeight = Math.floor(section.height() / 2), // Main Height of section
            posValue = convertInteger(section.attr(getPosValue)), // positioning value
            posData = section.attr(mainAttr), // how much to position
            posFor = section.attr(posAttr), // On Which section is for positioning
            parentPT = convertInteger($(posFor).css("padding-top")), // Default Padding of  parent
            parentPB = convertInteger($(posFor).css("padding-bottom")); // Default Padding of  parent
        if (posData === "top-half") {
          $(posFor).css("padding-bottom", parentPB + sectionHeight + "px");
          section.css("margin-top", "-" + sectionHeight + "px");
        } else if (posData === "bottom-half") {
          $(posFor).css("padding-top", parentPT + sectionHeight + "px");
          section.css("margin-bottom", "-" + sectionHeight + "px");
        } else if (posData === "top") {
          $(posFor).css("padding-bottom", parentPB + posValue + "px");
          section.css("margin-top", "-" + posValue + "px");
        } else if (posData === "bottom") {
          $(posFor).css("padding-top", parentPT + posValue + "px");
          section.css("margin-bottom", "-" + posValue + "px");
        }
      }
      setPosition(); // Set Padding On Load
    });
  };

  var postionHandler = "[data-sec-pos]";
  if ($(postionHandler).length) {
    $(postionHandler).imagesLoaded(function () {
      $(postionHandler).sectionPosition(
          "data-sec-pos",
          "data-pos-for",
          "data-pos-amount"
      );
    });
  }

  /*----------- 12. Filter ----------*/
  $(".filter-active").imagesLoaded(function () {
    var $filter = ".filter-active",
        $filterItem = ".filter-item",
        $filterMenu = ".filter-menu-active";

    if ($($filter).length > 0) {
      var $grid = $($filter).isotope({
        itemSelector: $filterItem,
        filter: "*",
        masonry: {
          // use outer width of grid-sizer for columnWidth
          columnWidth: 1,
        },
      });

      // filter items on button click
      $($filterMenu).on("click", "button", function () {
        var filterValue = $(this).attr("data-filter");
        $grid.isotope({
          filter: filterValue,
        });
      });

      // Menu Active Class
      $($filterMenu).on("click", "button", function (event) {
        event.preventDefault();
        $(this).addClass("active");
        $(this).siblings(".active").removeClass("active");
      });
    }
  });

  /*----------- 13. Custom Tab  ----------*/
  $.fn.vsTab = function (options) {
    var opt = $.extend({
          sliderTab: false,
          tabButton: "button",
          indicator: false,
        },
        options
    );

    $(this).each(function () {
      var $menu = $(this);
      var $button = $menu.find(opt.tabButton);

      // On Click Button Class Remove and indecator postion set
      $button.on("click", function (e) {
        e.preventDefault();
        var cBtn = $(this);
        cBtn.addClass("active").siblings().removeClass("active");
        if (opt.sliderTab) {
          $(slider).slick("slickGoTo", cBtn.data("slide-go-to"));
        }
      });

      // Work With slider
      if (opt.sliderTab) {
        var slider = $menu.data("asnavfor"); // select slider

        // Select All button and set attribute
        var i = 0;
        $button.each(function () {
          var slideBtn = $(this);
          slideBtn.attr("data-slide-go-to", i);
          i++;

          // Active Slide On load > Actived Button
          if (slideBtn.hasClass("active")) {
            $(slider).slick("slickGoTo", slideBtn.data("slide-go-to"));
          }

          // Change Indicator On slide Change
          $(slider).on(
              "beforeChange",
              function (event, slick, currentSlide, nextSlide) {
                $menu
                    .find(opt.tabButton + '[data-slide-go-to="' + nextSlide + '"]')
                    .addClass("active")
                    .siblings()
                    .removeClass("active");
              }
          );
        });
      }
    });
  };

  // Call On Load
  if ($(".vs-slider-tab").length) {
    $(".vs-slider-tab").vsTab({
      sliderTab: true,
      tabButton: ".tab-btn",
    });
  }

  /*----------- 14. Accordion Active Toggle ----------*/
  $(".accordion-button").each(function () {
    $(this).on("click", function () {
      var accordionWrapper = $(this).closest(".accordion-item");
      accordionWrapper.toggleClass("active").siblings().removeClass("active");
    });
  });






})(jQuery);