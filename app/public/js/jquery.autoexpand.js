/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/jquery.autoexpand.js":
/*!*******************************************!*\
  !*** ./resources/js/jquery.autoexpand.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  'use strict';
  /**
   * Auto-expands textareas so they grow as you type.
   *
   * @author Matthias Mullie <autoexpand@mullie.eu>
   *
   * @option int animationTime Time in milliseconds to animate to new height
   * @option int windowPadding Amount of pixels to preserve between textarea & window bottom
   * @param object|string settings Custom settings for auto-expand, or string 'destroy'
   * @return object
   */

  $.fn.autoExpand = function (options) {
    /**
     * Initialise auto-expand.
     *
     * @param object element
     * @param object options
     */
    var autoExpand = function autoExpand(element, options) {
      this.$element = $(element);
      this.excludePadding = this.$element.css('box-sizing') === 'content-box';
      this.destroy();

      if (options === 'destroy') {
        return;
      }

      this.options = $.extend({
        // default options
        animationTime: 50,
        windowPadding: 20
      }, options);
      this.saveState();
      this.init();
    };
    /**
     * Initializes auto-expander. Sets some default CSS settings required for it
     * to work, then attaches the keyup event handler.
     */


    autoExpand.prototype.init = function () {
      // height works differently depending on content-box or border-box...
      var height = this.excludePadding ? this.$element.height() : this.$element.outerHeight();
      this.applyStyles({
        overflow: 'hidden',
        resize: 'none',
        // auto-expansion shouldn't shrink too much; set default height as min
        'min-height': height
      });
      this.$element.on('keyup.autoexpand', this.autoExpand.bind(this)); // initialize at height of existing content

      this.$element.trigger('keyup');
    };
    /**
     * Destroys the autoexpanding, effectively restoring the textarea like
     * before auto-expander was attached.
     */


    autoExpand.prototype.destroy = function () {
      // remove the autoexpand bind
      this.$element.off('.autoexpand'); // restore the original settings

      this.applyStyles(this.$element.data('autoexpand-original-css'));
      this.$element.removeData('autoexpand-original-css');
    };
    /**
     * Save original styles so we can restore them on destroy.
     */


    autoExpand.prototype.saveState = function () {
      // quit it we have already stored original styles (current styles may
      // not be original)
      if (this.$element.data('autoexpand-original-css')) {
        return;
      }

      var styles = {
        // data overwritten in init
        overflow: this.$element.css('overflow'),
        resize: this.$element.css('resize'),
        'min-height': this.$element.css('min-height'),
        // data overwritten in autoExpand
        height: this.$element.css('height'),
        'overflow-y': this.$element.css('overflow-y')
      };
      this.$element.data('autoexpand-original-css', styles);
    };
    /**
     * @param object styles
     */


    autoExpand.prototype.applyStyles = function (styles) {
      for (var i in styles) {
        this.$element.css(i, styles[i]);
      }
    };
    /**
     * Auto-expand/shrink as content changes.
     */


    autoExpand.prototype.autoExpand = function () {
      var scrollHeight,
          totalHeight,
          minHeight,
          maxHeight,
          windowBottom,
          height = this.$element.height(),
          padding = this.$element.outerHeight() - height;
      /*
       * Collapse to 0 height to get accurate scrollHeight for the content,
       * then restore height.
       * Without collapsing, scrollHeight would be the highest of:
       * * the content height
       * * the height the textarea already has
       * Since we're looking to also shrink the textarea when content shrinks,
       * we want to ignore that last case (hence the collapsing)
       */

      this.$element.height(0);
      scrollHeight = this.$element.get(0).scrollHeight;
      this.$element.height(height);
      totalHeight = scrollHeight;
      /*
       * Additional padding of <windowPadding> px between the textarea & the
       * bottom of the page, so we don't end up with a textarea larger than
       * the screen.
       */

      windowBottom = $(window).scrollTop() + $(window).height();
      maxHeight = windowBottom - this.options.windowPadding - this.$element.offset().top;

      if (totalHeight >= maxHeight) {
        // override new height to be near the bottom edge, not past it
        scrollHeight = maxHeight; // if we can't expand, ensure overflow-y is set to auto

        this.$element.css('overflow-y', 'auto');
      } else {
        this.$element.css('overflow-y', 'hidden');
      } // height works differently depending on content-box or border-box...


      if (this.excludePadding) {
        scrollHeight -= padding;
      }
      /*
       * Only animate height change if there actually is a change; we don't
       * want every keystroke firing a <animationTime> ms animation.
       */


      minHeight = parseInt(this.$element.css('min-height'), 10);

      if (scrollHeight !== this.$element.height() + padding && (scrollHeight > minHeight || this.$element.height() + padding > minHeight)) {
        this.$element.animate({
          height: scrollHeight
        }, this.options.animationTime);
      }
    };

    return this.each(function () {
      new autoExpand(this, options);
    });
  };
})(jQuery);

/***/ }),

/***/ 4:
/*!*************************************************!*\
  !*** multi ./resources/js/jquery.autoexpand.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/kamoitooru/Documents/my_app/laravel_app/my_blog/app/resources/js/jquery.autoexpand.js */"./resources/js/jquery.autoexpand.js");


/***/ })

/******/ });