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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/create_article.js":
/*!****************************************!*\
  !*** ./resources/js/create_article.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

window.onload = function () {
  //アクセス時のtitleのvalueをプレビューに表示する処理
  var article_title_value = document.getElementById("article_create_title_input_form").value;

  if (article_title_value !== undefined) {
    var article_view_title_value = article_title_value.replace(/\n/g, '<br>');
    var article_view_title = document.getElementById('article_view_title');
    article_view_title.insertAdjacentHTML('afterbegin', '<h5>' + article_view_title_value + '</h5>');
  } //アクセス時のtagのvalueをプレビューに表示する処理


  var article_tag_value = document.getElementById('article_create_tag_input_form').value;

  if (article_title_value !== undefined) {
    var article_view_tag = document.getElementById('article_view_tag');
    var article_view_title_value = article_tag_value.replace(/\s|　|,|、/g, ' ');
    var article_view_title_value = article_view_title_value.replace(/([^\s]+)/g, '<span class="article_view_tag_color">' + '$1' + '</span>');
    article_view_tag.insertAdjacentHTML('afterbegin', article_view_title_value);
  } //タイトル入力フォームの自動伸縮処理(ライブラリ)


  $('textarea#article_create_title_input_form').autoExpand(); //titleのvalueを入力したときにプレビュー表示する処理

  $('#article_create_title_input_form').on('keyup keyup', function () {
    var input_value = $(this).val();
    $('#article_view_title').html('<h5>' + input_value.replace(/\n/g, '<br>') + '</h5>');
  }); //tagのvalueを入力した時にプレビュー表示する処理

  $('#article_create_tag_input_form').on('keyup', function () {
    var input_value = $('#article_create_tag_input_form').val();
    var input_value = input_value.replace(/\s|　|,|、/g, " ");
    var input_value = input_value.replace(/([^\s]+)/g, '<span class="article_view_tag_color">' + '$1' + '</span>');
    $('#article_view_tag').html(input_value);
  }); //articleの入力フォームの自動伸縮処理(ライブラリ)

  $('#article_create_article_input_form').autoExpand(); //articleのvalueを入力した時にプレビューに表示する処理

  $('#article_create_article_input_form').on('keyup', function () {
    var input_value = $(this).val(); // var input_value = input_value.replace(/\n/g, '<br>');

    var input_value = marked(input_value);
    $('#article_view_article').html(input_value);
  });
};

/***/ }),

/***/ 3:
/*!**********************************************!*\
  !*** multi ./resources/js/create_article.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/kamoitooru/Documents/my_app/laravel_app/my_blog/app/resources/js/create_article.js */"./resources/js/create_article.js");


/***/ })

/******/ });