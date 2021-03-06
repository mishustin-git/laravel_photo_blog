(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
"use strict";

var _burgerMenu = _interopRequireDefault(require("./components/burger-menu"));

var _slider = _interopRequireDefault(require("./components/slider"));

var _tabs = _interopRequireDefault(require("./components/tabs"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

// You can write a call and import your functions in this file.
//
// This file will be compiled into app.js and will not be minified.
// Feel free with using ES6 here.
//import Accordion from './components/accordion';
(function ($) {
  // When DOM is ready
  $(function () {
    //const accordions = new Accordion();
    _tabs["default"].init();

    _burgerMenu["default"].init();

    _slider["default"].init();
  });
})(jQuery);

$(document).ready(function () {
  // for active element`s menu addClass('active')
  var pathname = window.location.pathname;
  $(".nav__list .nav__item a").each(function () {
    if ($(this).attr('href') == pathname) {
      $(this).parent('.nav__item').addClass("active");
    }
  }); //for form focus input

  $('input').on('focus', function () {
    $(this).parent('.form-group').children('label').addClass('focus');
  }); //for form focusout input

  $('input').focusout(function () {
    if ($(this).val() == "") {
      $(this).parent('.form-group').children('.validation-error').addClass("active");
      $(this).addClass("danger");
      $(this).parent('.form-group').children('label').removeClass('focus');
    } else if ($(this).parent('.form-group').children('.validation-error').hasClass("active")) {
      $(this).parent('.form-group').children('.validation-error').removeClass("active");
      $(this).removeClass("danger");
    }
  }); //for form focus textarea

  $('textarea').on('focus', function () {
    $(this).parent('.form-group').children('label').addClass('focus');
  }); //for form focusout textarea

  $('textarea').focusout(function () {
    $(this).parent('.form-group').children('label').removeClass('focus');
  });
});

},{"./components/burger-menu":2,"./components/slider":3,"./components/tabs":4}],2:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;
var BURGER = document.querySelector('.js-burger-open');
var NAV = document.querySelector('.js-burger');
var BODY = document.querySelector('body');
var CLASS_OVERFLOW = 'overflow';
var CLASS_ACTIVE = 'active';

var burgerMenu = function () {
  var burgeInit = function burgeInit() {
    if (!BURGER) return;
    BURGER.addEventListener('click', function (e) {
      if (!e.currentTarget.classList.contains('active')) {
        openBurger();
      } else {
        closeBurger();
      }
    });
  };

  var openBurger = function openBurger() {
    BURGER.classList.add(CLASS_ACTIVE);
    NAV.classList.add(CLASS_ACTIVE);
    BODY.classList.add(CLASS_OVERFLOW);
  };

  var closeBurger = function closeBurger() {
    BURGER.classList.remove(CLASS_ACTIVE);
    NAV.classList.remove(CLASS_ACTIVE);
    BODY.classList.remove(CLASS_OVERFLOW);
  };

  var init = function init() {
    burgeInit();
  };

  return {
    init: init,
    closeBurger: closeBurger
  };
}();

var _default = burgerMenu;
exports["default"] = _default;

},{}],3:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var swiperSlider = function () {
  var introSwiper = new Swiper('.js-intro-slider', {
    slidesPerView: 1,
    speed: 1000,
    centerInsufficientSlides: true,
    autoplay: true,
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });

  var init = function init() {};

  return {
    init: init
  };
}();

var _default = swiperSlider;
exports["default"] = _default;

},{}],4:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;
var CLASS_ACTIVE = 'active';
var wrapList = document.querySelectorAll('.js-tabs');

var tabs = function () {
  var tabsInit = function tabsInit() {
    if (!wrapList.length) return;
    wrapList.forEach(function (wrap) {
      return attachEvents(wrap);
    });

    function attachEvents(parent) {
      var tabList = parent.querySelectorAll('[data-tab]'),
          contentList = parent.querySelectorAll('[data-content]');
      if (!tabList.length) return;
      tabList.forEach(function (btn) {
        btn.addEventListener('click', function (e) {
          tabList.forEach(function (btn) {
            return btn.classList.remove(CLASS_ACTIVE);
          });
          e.currentTarget.classList.add(CLASS_ACTIVE);
          var idContent = e.currentTarget.dataset.tab;

          if (idContent === 'all') {
            contentList.forEach(function (content) {
              return content.classList.add(CLASS_ACTIVE);
            });
          } else {
            var currentContentList = document.querySelectorAll("[data-content=\"".concat(idContent, "\"]"));
            contentList.forEach(function (content) {
              return content.classList.remove(CLASS_ACTIVE);
            });
            currentContentList.forEach(function (content) {
              return content.classList.add(CLASS_ACTIVE);
            });
          }
        });
      });
    }
  };

  var init = function init() {
    tabsInit();
  };

  return {
    init: init
  };
}();

var _default = tabs;
exports["default"] = _default;

},{}]},{},[1]);
