(window["webpackJsonp_aeonwp"] = window["webpackJsonp_aeonwp"] || []).push([["style-customizer"],{

/***/ "./src/customizer-controls/color-picker/style.scss":
/*!*********************************************************!*\
  !*** ./src/customizer-controls/color-picker/style.scss ***!
  \*********************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/customizer-controls/font-family/style.scss":
/*!********************************************************!*\
  !*** ./src/customizer-controls/font-family/style.scss ***!
  \********************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/customizer-controls/radio-image/style.scss":
/*!********************************************************!*\
  !*** ./src/customizer-controls/radio-image/style.scss ***!
  \********************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/customizer-controls/resp-slider/style.scss":
/*!********************************************************!*\
  !*** ./src/customizer-controls/resp-slider/style.scss ***!
  \********************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/customizer-controls/selector/style.scss":
/*!*****************************************************!*\
  !*** ./src/customizer-controls/selector/style.scss ***!
  \*****************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/customizer-controls/slider/style.scss":
/*!***************************************************!*\
  !*** ./src/customizer-controls/slider/style.scss ***!
  \***************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/customizer-controls/social/style.scss":
/*!***************************************************!*\
  !*** ./src/customizer-controls/social/style.scss ***!
  \***************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/customizer-controls/sortable/style.scss":
/*!*****************************************************!*\
  !*** ./src/customizer-controls/sortable/style.scss ***!
  \*****************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/customizer-controls/spacing/style.scss":
/*!****************************************************!*\
  !*** ./src/customizer-controls/spacing/style.scss ***!
  \****************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/customizer-controls/switch/style.scss":
/*!***************************************************!*\
  !*** ./src/customizer-controls/switch/style.scss ***!
  \***************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/style.scss":
/*!************************!*\
  !*** ./src/style.scss ***!
  \************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

}]);

/******/ (function(modules) { // webpackBootstrap
/******/ 	// install a JSONP callback for chunk loading
/******/ 	function webpackJsonpCallback(data) {
/******/ 		var chunkIds = data[0];
/******/ 		var moreModules = data[1];
/******/ 		var executeModules = data[2];
/******/
/******/ 		// add "moreModules" to the modules object,
/******/ 		// then flag all "chunkIds" as loaded and fire callback
/******/ 		var moduleId, chunkId, i = 0, resolves = [];
/******/ 		for(;i < chunkIds.length; i++) {
/******/ 			chunkId = chunkIds[i];
/******/ 			if(Object.prototype.hasOwnProperty.call(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 				resolves.push(installedChunks[chunkId][0]);
/******/ 			}
/******/ 			installedChunks[chunkId] = 0;
/******/ 		}
/******/ 		for(moduleId in moreModules) {
/******/ 			if(Object.prototype.hasOwnProperty.call(moreModules, moduleId)) {
/******/ 				modules[moduleId] = moreModules[moduleId];
/******/ 			}
/******/ 		}
/******/ 		if(parentJsonpFunction) parentJsonpFunction(data);
/******/
/******/ 		while(resolves.length) {
/******/ 			resolves.shift()();
/******/ 		}
/******/
/******/ 		// add entry modules from loaded chunk to deferred list
/******/ 		deferredModules.push.apply(deferredModules, executeModules || []);
/******/
/******/ 		// run deferred modules when all chunks ready
/******/ 		return checkDeferredModules();
/******/ 	};
/******/ 	function checkDeferredModules() {
/******/ 		var result;
/******/ 		for(var i = 0; i < deferredModules.length; i++) {
/******/ 			var deferredModule = deferredModules[i];
/******/ 			var fulfilled = true;
/******/ 			for(var j = 1; j < deferredModule.length; j++) {
/******/ 				var depId = deferredModule[j];
/******/ 				if(installedChunks[depId] !== 0) fulfilled = false;
/******/ 			}
/******/ 			if(fulfilled) {
/******/ 				deferredModules.splice(i--, 1);
/******/ 				result = __webpack_require__(__webpack_require__.s = deferredModule[0]);
/******/ 			}
/******/ 		}
/******/
/******/ 		return result;
/******/ 	}
/******/
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// object to store loaded and loading chunks
/******/ 	// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 	// Promise = chunk loading, 0 = chunk loaded
/******/ 	var installedChunks = {
/******/ 		"customizer": 0
/******/ 	};
/******/
/******/ 	var deferredModules = [];
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	var jsonpArray = window["webpackJsonp_aeonwp"] = window["webpackJsonp_aeonwp"] || [];
/******/ 	var oldJsonpFunction = jsonpArray.push.bind(jsonpArray);
/******/ 	jsonpArray.push = webpackJsonpCallback;
/******/ 	jsonpArray = jsonpArray.slice();
/******/ 	for(var i = 0; i < jsonpArray.length; i++) webpackJsonpCallback(jsonpArray[i]);
/******/ 	var parentJsonpFunction = oldJsonpFunction;
/******/
/******/
/******/ 	// add entry module to deferred list
/******/ 	deferredModules.push(["./src/customizer.js","style-customizer"]);
/******/ 	// run deferred modules when ready
/******/ 	return checkDeferredModules();
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/@babel/runtime/helpers/arrayLikeToArray.js":
/*!*****************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/arrayLikeToArray.js ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _arrayLikeToArray(arr, len) {
  if (len == null || len > arr.length) len = arr.length;

  for (var i = 0, arr2 = new Array(len); i < len; i++) {
    arr2[i] = arr[i];
  }

  return arr2;
}

module.exports = _arrayLikeToArray;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/arrayWithHoles.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/arrayWithHoles.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _arrayWithHoles(arr) {
  if (Array.isArray(arr)) return arr;
}

module.exports = _arrayWithHoles;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/arrayWithoutHoles.js":
/*!******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/arrayWithoutHoles.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayLikeToArray = __webpack_require__(/*! ./arrayLikeToArray.js */ "./node_modules/@babel/runtime/helpers/arrayLikeToArray.js");

function _arrayWithoutHoles(arr) {
  if (Array.isArray(arr)) return arrayLikeToArray(arr);
}

module.exports = _arrayWithoutHoles;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/assertThisInitialized.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/assertThisInitialized.js ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _assertThisInitialized(self) {
  if (self === void 0) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return self;
}

module.exports = _assertThisInitialized;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/classCallCheck.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/classCallCheck.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

module.exports = _classCallCheck;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/createClass.js":
/*!************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/createClass.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

module.exports = _createClass;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/defineProperty.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/defineProperty.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _defineProperty(obj, key, value) {
  if (key in obj) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }

  return obj;
}

module.exports = _defineProperty;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/arrayLikeToArray.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/arrayLikeToArray.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _arrayLikeToArray; });
function _arrayLikeToArray(arr, len) {
  if (len == null || len > arr.length) len = arr.length;

  for (var i = 0, arr2 = new Array(len); i < len; i++) {
    arr2[i] = arr[i];
  }

  return arr2;
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/arrayWithoutHoles.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/arrayWithoutHoles.js ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _arrayWithoutHoles; });
/* harmony import */ var _arrayLikeToArray_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./arrayLikeToArray.js */ "./node_modules/@babel/runtime/helpers/esm/arrayLikeToArray.js");

function _arrayWithoutHoles(arr) {
  if (Array.isArray(arr)) return Object(_arrayLikeToArray_js__WEBPACK_IMPORTED_MODULE_0__["default"])(arr);
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/classCallCheck.js":
/*!*******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/classCallCheck.js ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _classCallCheck; });
function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/createClass.js":
/*!****************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/createClass.js ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _createClass; });
function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js":
/*!*******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/defineProperty.js ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _defineProperty; });
function _defineProperty(obj, key, value) {
  if (key in obj) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }

  return obj;
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/extends.js":
/*!************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/extends.js ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _extends; });
function _extends() {
  _extends = Object.assign || function (target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i];

      for (var key in source) {
        if (Object.prototype.hasOwnProperty.call(source, key)) {
          target[key] = source[key];
        }
      }
    }

    return target;
  };

  return _extends.apply(this, arguments);
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/inherits.js":
/*!*************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/inherits.js ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _inherits; });
/* harmony import */ var _setPrototypeOf_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./setPrototypeOf.js */ "./node_modules/@babel/runtime/helpers/esm/setPrototypeOf.js");

function _inherits(subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function");
  }

  subClass.prototype = Object.create(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      writable: true,
      configurable: true
    }
  });
  if (superClass) Object(_setPrototypeOf_js__WEBPACK_IMPORTED_MODULE_0__["default"])(subClass, superClass);
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/iterableToArray.js":
/*!********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/iterableToArray.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _iterableToArray; });
function _iterableToArray(iter) {
  if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter);
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/nonIterableSpread.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/nonIterableSpread.js ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _nonIterableSpread; });
function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/objectWithoutProperties.js":
/*!****************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/objectWithoutProperties.js ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _objectWithoutProperties; });
/* harmony import */ var _objectWithoutPropertiesLoose_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./objectWithoutPropertiesLoose.js */ "./node_modules/@babel/runtime/helpers/esm/objectWithoutPropertiesLoose.js");

function _objectWithoutProperties(source, excluded) {
  if (source == null) return {};
  var target = Object(_objectWithoutPropertiesLoose_js__WEBPACK_IMPORTED_MODULE_0__["default"])(source, excluded);
  var key, i;

  if (Object.getOwnPropertySymbols) {
    var sourceSymbolKeys = Object.getOwnPropertySymbols(source);

    for (i = 0; i < sourceSymbolKeys.length; i++) {
      key = sourceSymbolKeys[i];
      if (excluded.indexOf(key) >= 0) continue;
      if (!Object.prototype.propertyIsEnumerable.call(source, key)) continue;
      target[key] = source[key];
    }
  }

  return target;
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/objectWithoutPropertiesLoose.js":
/*!*********************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/objectWithoutPropertiesLoose.js ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _objectWithoutPropertiesLoose; });
function _objectWithoutPropertiesLoose(source, excluded) {
  if (source == null) return {};
  var target = {};
  var sourceKeys = Object.keys(source);
  var key, i;

  for (i = 0; i < sourceKeys.length; i++) {
    key = sourceKeys[i];
    if (excluded.indexOf(key) >= 0) continue;
    target[key] = source[key];
  }

  return target;
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/setPrototypeOf.js":
/*!*******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/setPrototypeOf.js ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _setPrototypeOf; });
function _setPrototypeOf(o, p) {
  _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
    o.__proto__ = p;
    return o;
  };

  return _setPrototypeOf(o, p);
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/taggedTemplateLiteral.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/taggedTemplateLiteral.js ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _taggedTemplateLiteral; });
function _taggedTemplateLiteral(strings, raw) {
  if (!raw) {
    raw = strings.slice(0);
  }

  return Object.freeze(Object.defineProperties(strings, {
    raw: {
      value: Object.freeze(raw)
    }
  }));
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/toConsumableArray.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/toConsumableArray.js ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _toConsumableArray; });
/* harmony import */ var _arrayWithoutHoles_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./arrayWithoutHoles.js */ "./node_modules/@babel/runtime/helpers/esm/arrayWithoutHoles.js");
/* harmony import */ var _iterableToArray_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./iterableToArray.js */ "./node_modules/@babel/runtime/helpers/esm/iterableToArray.js");
/* harmony import */ var _unsupportedIterableToArray_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./unsupportedIterableToArray.js */ "./node_modules/@babel/runtime/helpers/esm/unsupportedIterableToArray.js");
/* harmony import */ var _nonIterableSpread_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./nonIterableSpread.js */ "./node_modules/@babel/runtime/helpers/esm/nonIterableSpread.js");




function _toConsumableArray(arr) {
  return Object(_arrayWithoutHoles_js__WEBPACK_IMPORTED_MODULE_0__["default"])(arr) || Object(_iterableToArray_js__WEBPACK_IMPORTED_MODULE_1__["default"])(arr) || Object(_unsupportedIterableToArray_js__WEBPACK_IMPORTED_MODULE_2__["default"])(arr) || Object(_nonIterableSpread_js__WEBPACK_IMPORTED_MODULE_3__["default"])();
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/typeof.js":
/*!***********************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/typeof.js ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _typeof; });
function _typeof(obj) {
  "@babel/helpers - typeof";

  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    _typeof = function _typeof(obj) {
      return typeof obj;
    };
  } else {
    _typeof = function _typeof(obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };
  }

  return _typeof(obj);
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/unsupportedIterableToArray.js":
/*!*******************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/unsupportedIterableToArray.js ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return _unsupportedIterableToArray; });
/* harmony import */ var _arrayLikeToArray_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./arrayLikeToArray.js */ "./node_modules/@babel/runtime/helpers/esm/arrayLikeToArray.js");

function _unsupportedIterableToArray(o, minLen) {
  if (!o) return;
  if (typeof o === "string") return Object(_arrayLikeToArray_js__WEBPACK_IMPORTED_MODULE_0__["default"])(o, minLen);
  var n = Object.prototype.toString.call(o).slice(8, -1);
  if (n === "Object" && o.constructor) n = o.constructor.name;
  if (n === "Map" || n === "Set") return Array.from(o);
  if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return Object(_arrayLikeToArray_js__WEBPACK_IMPORTED_MODULE_0__["default"])(o, minLen);
}

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/extends.js":
/*!********************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/extends.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _extends() {
  module.exports = _extends = Object.assign || function (target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i];

      for (var key in source) {
        if (Object.prototype.hasOwnProperty.call(source, key)) {
          target[key] = source[key];
        }
      }
    }

    return target;
  };

  module.exports["default"] = module.exports, module.exports.__esModule = true;
  return _extends.apply(this, arguments);
}

module.exports = _extends;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/getPrototypeOf.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/getPrototypeOf.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _getPrototypeOf(o) {
  module.exports = _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) {
    return o.__proto__ || Object.getPrototypeOf(o);
  };
  module.exports["default"] = module.exports, module.exports.__esModule = true;
  return _getPrototypeOf(o);
}

module.exports = _getPrototypeOf;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/inherits.js":
/*!*********************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/inherits.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var setPrototypeOf = __webpack_require__(/*! ./setPrototypeOf.js */ "./node_modules/@babel/runtime/helpers/setPrototypeOf.js");

function _inherits(subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function");
  }

  subClass.prototype = Object.create(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      writable: true,
      configurable: true
    }
  });
  if (superClass) setPrototypeOf(subClass, superClass);
}

module.exports = _inherits;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/iterableToArray.js":
/*!****************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/iterableToArray.js ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _iterableToArray(iter) {
  if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter);
}

module.exports = _iterableToArray;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/iterableToArrayLimit.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/iterableToArrayLimit.js ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _iterableToArrayLimit(arr, i) {
  var _i = arr == null ? null : typeof Symbol !== "undefined" && arr[Symbol.iterator] || arr["@@iterator"];

  if (_i == null) return;
  var _arr = [];
  var _n = true;
  var _d = false;

  var _s, _e;

  try {
    for (_i = _i.call(arr); !(_n = (_s = _i.next()).done); _n = true) {
      _arr.push(_s.value);

      if (i && _arr.length === i) break;
    }
  } catch (err) {
    _d = true;
    _e = err;
  } finally {
    try {
      if (!_n && _i["return"] != null) _i["return"]();
    } finally {
      if (_d) throw _e;
    }
  }

  return _arr;
}

module.exports = _iterableToArrayLimit;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/nonIterableRest.js":
/*!****************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/nonIterableRest.js ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}

module.exports = _nonIterableRest;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/nonIterableSpread.js":
/*!******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/nonIterableSpread.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}

module.exports = _nonIterableSpread;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/objectWithoutProperties.js":
/*!************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/objectWithoutProperties.js ***!
  \************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var objectWithoutPropertiesLoose = __webpack_require__(/*! ./objectWithoutPropertiesLoose.js */ "./node_modules/@babel/runtime/helpers/objectWithoutPropertiesLoose.js");

function _objectWithoutProperties(source, excluded) {
  if (source == null) return {};
  var target = objectWithoutPropertiesLoose(source, excluded);
  var key, i;

  if (Object.getOwnPropertySymbols) {
    var sourceSymbolKeys = Object.getOwnPropertySymbols(source);

    for (i = 0; i < sourceSymbolKeys.length; i++) {
      key = sourceSymbolKeys[i];
      if (excluded.indexOf(key) >= 0) continue;
      if (!Object.prototype.propertyIsEnumerable.call(source, key)) continue;
      target[key] = source[key];
    }
  }

  return target;
}

module.exports = _objectWithoutProperties;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/objectWithoutPropertiesLoose.js":
/*!*****************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/objectWithoutPropertiesLoose.js ***!
  \*****************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _objectWithoutPropertiesLoose(source, excluded) {
  if (source == null) return {};
  var target = {};
  var sourceKeys = Object.keys(source);
  var key, i;

  for (i = 0; i < sourceKeys.length; i++) {
    key = sourceKeys[i];
    if (excluded.indexOf(key) >= 0) continue;
    target[key] = source[key];
  }

  return target;
}

module.exports = _objectWithoutPropertiesLoose;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var _typeof = __webpack_require__(/*! @babel/runtime/helpers/typeof */ "./node_modules/@babel/runtime/helpers/typeof.js")["default"];

var assertThisInitialized = __webpack_require__(/*! ./assertThisInitialized.js */ "./node_modules/@babel/runtime/helpers/assertThisInitialized.js");

function _possibleConstructorReturn(self, call) {
  if (call && (_typeof(call) === "object" || typeof call === "function")) {
    return call;
  } else if (call !== void 0) {
    throw new TypeError("Derived constructors may only return object or undefined");
  }

  return assertThisInitialized(self);
}

module.exports = _possibleConstructorReturn;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/setPrototypeOf.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/setPrototypeOf.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _setPrototypeOf(o, p) {
  module.exports = _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
    o.__proto__ = p;
    return o;
  };

  module.exports["default"] = module.exports, module.exports.__esModule = true;
  return _setPrototypeOf(o, p);
}

module.exports = _setPrototypeOf;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/slicedToArray.js":
/*!**************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/slicedToArray.js ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayWithHoles = __webpack_require__(/*! ./arrayWithHoles.js */ "./node_modules/@babel/runtime/helpers/arrayWithHoles.js");

var iterableToArrayLimit = __webpack_require__(/*! ./iterableToArrayLimit.js */ "./node_modules/@babel/runtime/helpers/iterableToArrayLimit.js");

var unsupportedIterableToArray = __webpack_require__(/*! ./unsupportedIterableToArray.js */ "./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js");

var nonIterableRest = __webpack_require__(/*! ./nonIterableRest.js */ "./node_modules/@babel/runtime/helpers/nonIterableRest.js");

function _slicedToArray(arr, i) {
  return arrayWithHoles(arr) || iterableToArrayLimit(arr, i) || unsupportedIterableToArray(arr, i) || nonIterableRest();
}

module.exports = _slicedToArray;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/taggedTemplateLiteral.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/taggedTemplateLiteral.js ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _taggedTemplateLiteral(strings, raw) {
  if (!raw) {
    raw = strings.slice(0);
  }

  return Object.freeze(Object.defineProperties(strings, {
    raw: {
      value: Object.freeze(raw)
    }
  }));
}

module.exports = _taggedTemplateLiteral;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/toConsumableArray.js":
/*!******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/toConsumableArray.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayWithoutHoles = __webpack_require__(/*! ./arrayWithoutHoles.js */ "./node_modules/@babel/runtime/helpers/arrayWithoutHoles.js");

var iterableToArray = __webpack_require__(/*! ./iterableToArray.js */ "./node_modules/@babel/runtime/helpers/iterableToArray.js");

var unsupportedIterableToArray = __webpack_require__(/*! ./unsupportedIterableToArray.js */ "./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js");

var nonIterableSpread = __webpack_require__(/*! ./nonIterableSpread.js */ "./node_modules/@babel/runtime/helpers/nonIterableSpread.js");

function _toConsumableArray(arr) {
  return arrayWithoutHoles(arr) || iterableToArray(arr) || unsupportedIterableToArray(arr) || nonIterableSpread();
}

module.exports = _toConsumableArray;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/typeof.js":
/*!*******************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/typeof.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _typeof(obj) {
  "@babel/helpers - typeof";

  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    module.exports = _typeof = function _typeof(obj) {
      return typeof obj;
    };

    module.exports["default"] = module.exports, module.exports.__esModule = true;
  } else {
    module.exports = _typeof = function _typeof(obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };

    module.exports["default"] = module.exports, module.exports.__esModule = true;
  }

  return _typeof(obj);
}

module.exports = _typeof;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js":
/*!***************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayLikeToArray = __webpack_require__(/*! ./arrayLikeToArray.js */ "./node_modules/@babel/runtime/helpers/arrayLikeToArray.js");

function _unsupportedIterableToArray(o, minLen) {
  if (!o) return;
  if (typeof o === "string") return arrayLikeToArray(o, minLen);
  var n = Object.prototype.toString.call(o).slice(8, -1);
  if (n === "Object" && o.constructor) n = o.constructor.name;
  if (n === "Map" || n === "Set") return Array.from(o);
  if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return arrayLikeToArray(o, minLen);
}

module.exports = _unsupportedIterableToArray;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@emotion/hash/dist/hash.browser.esm.js":
/*!*************************************************************!*\
  !*** ./node_modules/@emotion/hash/dist/hash.browser.esm.js ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* eslint-disable */
// Inspired by https://github.com/garycourt/murmurhash-js
// Ported from https://github.com/aappleby/smhasher/blob/61a0530f28277f2e850bfc39600ce61d02b518de/src/MurmurHash2.cpp#L37-L86
function murmur2(str) {
  // 'm' and 'r' are mixing constants generated offline.
  // They're not really 'magic', they just happen to work well.
  // const m = 0x5bd1e995;
  // const r = 24;
  // Initialize the hash
  var h = 0; // Mix 4 bytes at a time into the hash

  var k,
      i = 0,
      len = str.length;

  for (; len >= 4; ++i, len -= 4) {
    k = str.charCodeAt(i) & 0xff | (str.charCodeAt(++i) & 0xff) << 8 | (str.charCodeAt(++i) & 0xff) << 16 | (str.charCodeAt(++i) & 0xff) << 24;
    k =
    /* Math.imul(k, m): */
    (k & 0xffff) * 0x5bd1e995 + ((k >>> 16) * 0xe995 << 16);
    k ^=
    /* k >>> r: */
    k >>> 24;
    h =
    /* Math.imul(k, m): */
    (k & 0xffff) * 0x5bd1e995 + ((k >>> 16) * 0xe995 << 16) ^
    /* Math.imul(h, m): */
    (h & 0xffff) * 0x5bd1e995 + ((h >>> 16) * 0xe995 << 16);
  } // Handle the last few bytes of the input array


  switch (len) {
    case 3:
      h ^= (str.charCodeAt(i + 2) & 0xff) << 16;

    case 2:
      h ^= (str.charCodeAt(i + 1) & 0xff) << 8;

    case 1:
      h ^= str.charCodeAt(i) & 0xff;
      h =
      /* Math.imul(h, m): */
      (h & 0xffff) * 0x5bd1e995 + ((h >>> 16) * 0xe995 << 16);
  } // Do a few final mixes of the hash to ensure the last few
  // bytes are well-incorporated.


  h ^= h >>> 13;
  h =
  /* Math.imul(h, m): */
  (h & 0xffff) * 0x5bd1e995 + ((h >>> 16) * 0xe995 << 16);
  return ((h ^ h >>> 15) >>> 0).toString(36);
}

/* harmony default export */ __webpack_exports__["default"] = (murmur2);


/***/ }),

/***/ "./node_modules/@emotion/memoize/dist/memoize.browser.esm.js":
/*!*******************************************************************!*\
  !*** ./node_modules/@emotion/memoize/dist/memoize.browser.esm.js ***!
  \*******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function memoize(fn) {
  var cache = {};
  return function (arg) {
    if (cache[arg] === undefined) cache[arg] = fn(arg);
    return cache[arg];
  };
}

/* harmony default export */ __webpack_exports__["default"] = (memoize);


/***/ }),

/***/ "./node_modules/@emotion/react/_isolated-hnrs/dist/emotion-react-_isolated-hnrs.browser.esm.js":
/*!*****************************************************************************************************!*\
  !*** ./node_modules/@emotion/react/_isolated-hnrs/dist/emotion-react-_isolated-hnrs.browser.esm.js ***!
  \*****************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var hoist_non_react_statics__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! hoist-non-react-statics */ "./node_modules/hoist-non-react-statics/dist/hoist-non-react-statics.cjs.js");
/* harmony import */ var hoist_non_react_statics__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(hoist_non_react_statics__WEBPACK_IMPORTED_MODULE_0__);


// this file isolates this package that is not tree-shakeable
// and if this module doesn't actually contain any logic of its own
// then Rollup just use 'hoist-non-react-statics' directly in other chunks

var hoistNonReactStatics = (function (targetComponent, sourceComponent) {
  return hoist_non_react_statics__WEBPACK_IMPORTED_MODULE_0___default()(targetComponent, sourceComponent);
});

/* harmony default export */ __webpack_exports__["default"] = (hoistNonReactStatics);


/***/ }),

/***/ "./node_modules/@emotion/react/dist/emotion-element-699e6908.browser.esm.js":
/*!**********************************************************************************!*\
  !*** ./node_modules/@emotion/react/dist/emotion-element-699e6908.browser.esm.js ***!
  \**********************************************************************************/
/*! exports provided: C, E, T, _, a, b, c, h, u, w */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "C", function() { return CacheProvider; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "E", function() { return Emotion; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "T", function() { return ThemeContext; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "_", function() { return __unsafe_useEmotionCache; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return ThemeProvider; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return withTheme; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "c", function() { return createEmotionProps; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "h", function() { return hasOwnProperty; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "u", function() { return useTheme; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "w", function() { return withEmotionCache; });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _emotion_cache__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @emotion/cache */ "./node_modules/@emotion/react/node_modules/@emotion/cache/dist/emotion-cache.browser.esm.js");
/* harmony import */ var _babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/esm/extends */ "./node_modules/@babel/runtime/helpers/esm/extends.js");
/* harmony import */ var _emotion_weak_memoize__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @emotion/weak-memoize */ "./node_modules/@emotion/weak-memoize/dist/weak-memoize.browser.esm.js");
/* harmony import */ var _isolated_hnrs_dist_emotion_react_isolated_hnrs_browser_esm_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../_isolated-hnrs/dist/emotion-react-_isolated-hnrs.browser.esm.js */ "./node_modules/@emotion/react/_isolated-hnrs/dist/emotion-react-_isolated-hnrs.browser.esm.js");
/* harmony import */ var _emotion_utils__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @emotion/utils */ "./node_modules/@emotion/react/node_modules/@emotion/utils/dist/emotion-utils.browser.esm.js");
/* harmony import */ var _emotion_serialize__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @emotion/serialize */ "./node_modules/@emotion/react/node_modules/@emotion/serialize/dist/emotion-serialize.browser.esm.js");








var hasOwnProperty = {}.hasOwnProperty;

var EmotionCacheContext = /* #__PURE__ */Object(react__WEBPACK_IMPORTED_MODULE_0__["createContext"])( // we're doing this to avoid preconstruct's dead code elimination in this one case
// because this module is primarily intended for the browser and node
// but it's also required in react native and similar environments sometimes
// and we could have a special build just for that
// but this is much easier and the native packages
// might use a different theme context in the future anyway
typeof HTMLElement !== 'undefined' ? /* #__PURE__ */Object(_emotion_cache__WEBPACK_IMPORTED_MODULE_1__["default"])({
  key: 'css'
}) : null);

if (true) {
  EmotionCacheContext.displayName = 'EmotionCacheContext';
}

var CacheProvider = EmotionCacheContext.Provider;
var __unsafe_useEmotionCache = function useEmotionCache() {
  return Object(react__WEBPACK_IMPORTED_MODULE_0__["useContext"])(EmotionCacheContext);
};

var withEmotionCache = function withEmotionCache(func) {
  // $FlowFixMe
  return /*#__PURE__*/Object(react__WEBPACK_IMPORTED_MODULE_0__["forwardRef"])(function (props, ref) {
    // the cache will never be null in the browser
    var cache = Object(react__WEBPACK_IMPORTED_MODULE_0__["useContext"])(EmotionCacheContext);
    return func(props, cache, ref);
  });
};

var ThemeContext = /* #__PURE__ */Object(react__WEBPACK_IMPORTED_MODULE_0__["createContext"])({});

if (true) {
  ThemeContext.displayName = 'EmotionThemeContext';
}

var useTheme = function useTheme() {
  return Object(react__WEBPACK_IMPORTED_MODULE_0__["useContext"])(ThemeContext);
};

var getTheme = function getTheme(outerTheme, theme) {
  if (typeof theme === 'function') {
    var mergedTheme = theme(outerTheme);

    if ( true && (mergedTheme == null || typeof mergedTheme !== 'object' || Array.isArray(mergedTheme))) {
      throw new Error('[ThemeProvider] Please return an object from your theme function, i.e. theme={() => ({})}!');
    }

    return mergedTheme;
  }

  if ( true && (theme == null || typeof theme !== 'object' || Array.isArray(theme))) {
    throw new Error('[ThemeProvider] Please make your theme prop a plain object');
  }

  return Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_2__["default"])({}, outerTheme, theme);
};

var createCacheWithTheme = /* #__PURE__ */Object(_emotion_weak_memoize__WEBPACK_IMPORTED_MODULE_3__["default"])(function (outerTheme) {
  return Object(_emotion_weak_memoize__WEBPACK_IMPORTED_MODULE_3__["default"])(function (theme) {
    return getTheme(outerTheme, theme);
  });
});
var ThemeProvider = function ThemeProvider(props) {
  var theme = Object(react__WEBPACK_IMPORTED_MODULE_0__["useContext"])(ThemeContext);

  if (props.theme !== theme) {
    theme = createCacheWithTheme(theme)(props.theme);
  }

  return /*#__PURE__*/Object(react__WEBPACK_IMPORTED_MODULE_0__["createElement"])(ThemeContext.Provider, {
    value: theme
  }, props.children);
};
function withTheme(Component) {
  var componentName = Component.displayName || Component.name || 'Component';

  var render = function render(props, ref) {
    var theme = Object(react__WEBPACK_IMPORTED_MODULE_0__["useContext"])(ThemeContext);
    return /*#__PURE__*/Object(react__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Component, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_2__["default"])({
      theme: theme,
      ref: ref
    }, props));
  }; // $FlowFixMe


  var WithTheme = /*#__PURE__*/Object(react__WEBPACK_IMPORTED_MODULE_0__["forwardRef"])(render);
  WithTheme.displayName = "WithTheme(" + componentName + ")";
  return Object(_isolated_hnrs_dist_emotion_react_isolated_hnrs_browser_esm_js__WEBPACK_IMPORTED_MODULE_4__["default"])(WithTheme, Component);
}

var getFunctionNameFromStackTraceLine = function getFunctionNameFromStackTraceLine(line) {
  // V8
  var match = /^\s+at\s+([A-Za-z0-9$.]+)\s/.exec(line);

  if (match) {
    // The match may be something like 'Object.createEmotionProps'
    var parts = match[1].split('.');
    return parts[parts.length - 1];
  } // Safari / Firefox


  match = /^([A-Za-z0-9$.]+)@/.exec(line);
  if (match) return match[1];
  return undefined;
};

var internalReactFunctionNames = /* #__PURE__ */new Set(['renderWithHooks', 'processChild', 'finishClassComponent', 'renderToString']); // These identifiers come from error stacks, so they have to be valid JS
// identifiers, thus we only need to replace what is a valid character for JS,
// but not for CSS.

var sanitizeIdentifier = function sanitizeIdentifier(identifier) {
  return identifier.replace(/\$/g, '-');
};

var getLabelFromStackTrace = function getLabelFromStackTrace(stackTrace) {
  if (!stackTrace) return undefined;
  var lines = stackTrace.split('\n');

  for (var i = 0; i < lines.length; i++) {
    var functionName = getFunctionNameFromStackTraceLine(lines[i]); // The first line of V8 stack traces is just "Error"

    if (!functionName) continue; // If we reach one of these, we have gone too far and should quit

    if (internalReactFunctionNames.has(functionName)) break; // The component name is the first function in the stack that starts with an
    // uppercase letter

    if (/^[A-Z]/.test(functionName)) return sanitizeIdentifier(functionName);
  }

  return undefined;
};

var typePropName = '__EMOTION_TYPE_PLEASE_DO_NOT_USE__';
var labelPropName = '__EMOTION_LABEL_PLEASE_DO_NOT_USE__';
var createEmotionProps = function createEmotionProps(type, props) {
  if ( true && typeof props.css === 'string' && // check if there is a css declaration
  props.css.indexOf(':') !== -1) {
    throw new Error("Strings are not allowed as css prop values, please wrap it in a css template literal from '@emotion/react' like this: css`" + props.css + "`");
  }

  var newProps = {};

  for (var key in props) {
    if (hasOwnProperty.call(props, key)) {
      newProps[key] = props[key];
    }
  }

  newProps[typePropName] = type; // For performance, only call getLabelFromStackTrace in development and when
  // the label has not already been computed

  if ( true && !!props.css && (typeof props.css !== 'object' || typeof props.css.name !== 'string' || props.css.name.indexOf('-') === -1)) {
    var label = getLabelFromStackTrace(new Error().stack);
    if (label) newProps[labelPropName] = label;
  }

  return newProps;
};

var Noop = function Noop() {
  return null;
};

var Emotion = /* #__PURE__ */withEmotionCache(function (props, cache, ref) {
  var cssProp = props.css; // so that using `css` from `emotion` and passing the result to the css prop works
  // not passing the registered cache to serializeStyles because it would
  // make certain babel optimisations not possible

  if (typeof cssProp === 'string' && cache.registered[cssProp] !== undefined) {
    cssProp = cache.registered[cssProp];
  }

  var type = props[typePropName];
  var registeredStyles = [cssProp];
  var className = '';

  if (typeof props.className === 'string') {
    className = Object(_emotion_utils__WEBPACK_IMPORTED_MODULE_5__["getRegisteredStyles"])(cache.registered, registeredStyles, props.className);
  } else if (props.className != null) {
    className = props.className + " ";
  }

  var serialized = Object(_emotion_serialize__WEBPACK_IMPORTED_MODULE_6__["serializeStyles"])(registeredStyles, undefined, Object(react__WEBPACK_IMPORTED_MODULE_0__["useContext"])(ThemeContext));

  if ( true && serialized.name.indexOf('-') === -1) {
    var labelFromStack = props[labelPropName];

    if (labelFromStack) {
      serialized = Object(_emotion_serialize__WEBPACK_IMPORTED_MODULE_6__["serializeStyles"])([serialized, 'label:' + labelFromStack + ';']);
    }
  }

  var rules = Object(_emotion_utils__WEBPACK_IMPORTED_MODULE_5__["insertStyles"])(cache, serialized, typeof type === 'string');
  className += cache.key + "-" + serialized.name;
  var newProps = {};

  for (var key in props) {
    if (hasOwnProperty.call(props, key) && key !== 'css' && key !== typePropName && ( false || key !== labelPropName)) {
      newProps[key] = props[key];
    }
  }

  newProps.ref = ref;
  newProps.className = className;
  var ele = /*#__PURE__*/Object(react__WEBPACK_IMPORTED_MODULE_0__["createElement"])(type, newProps);
  var possiblyStyleElement = /*#__PURE__*/Object(react__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Noop, null);


  return /*#__PURE__*/Object(react__WEBPACK_IMPORTED_MODULE_0__["createElement"])(react__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, possiblyStyleElement, ele);
});

if (true) {
  Emotion.displayName = 'EmotionCssPropInternal';
}




/***/ }),

/***/ "./node_modules/@emotion/react/dist/emotion-react.browser.esm.js":
/*!***********************************************************************!*\
  !*** ./node_modules/@emotion/react/dist/emotion-react.browser.esm.js ***!
  \***********************************************************************/
/*! exports provided: CacheProvider, ThemeContext, ThemeProvider, __unsafe_useEmotionCache, useTheme, withEmotionCache, withTheme, ClassNames, Global, createElement, css, jsx, keyframes */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function(global) {/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ClassNames", function() { return ClassNames; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Global", function() { return Global; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "createElement", function() { return jsx; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "css", function() { return css; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "jsx", function() { return jsx; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "keyframes", function() { return keyframes; });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _emotion_cache__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @emotion/cache */ "./node_modules/@emotion/react/node_modules/@emotion/cache/dist/emotion-cache.browser.esm.js");
/* harmony import */ var _emotion_element_699e6908_browser_esm_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./emotion-element-699e6908.browser.esm.js */ "./node_modules/@emotion/react/dist/emotion-element-699e6908.browser.esm.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "CacheProvider", function() { return _emotion_element_699e6908_browser_esm_js__WEBPACK_IMPORTED_MODULE_2__["C"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "ThemeContext", function() { return _emotion_element_699e6908_browser_esm_js__WEBPACK_IMPORTED_MODULE_2__["T"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "ThemeProvider", function() { return _emotion_element_699e6908_browser_esm_js__WEBPACK_IMPORTED_MODULE_2__["a"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "__unsafe_useEmotionCache", function() { return _emotion_element_699e6908_browser_esm_js__WEBPACK_IMPORTED_MODULE_2__["_"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "useTheme", function() { return _emotion_element_699e6908_browser_esm_js__WEBPACK_IMPORTED_MODULE_2__["u"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "withEmotionCache", function() { return _emotion_element_699e6908_browser_esm_js__WEBPACK_IMPORTED_MODULE_2__["w"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "withTheme", function() { return _emotion_element_699e6908_browser_esm_js__WEBPACK_IMPORTED_MODULE_2__["b"]; });

/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ "./node_modules/@babel/runtime/helpers/extends.js");
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _emotion_weak_memoize__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @emotion/weak-memoize */ "./node_modules/@emotion/weak-memoize/dist/weak-memoize.browser.esm.js");
/* harmony import */ var hoist_non_react_statics__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! hoist-non-react-statics */ "./node_modules/hoist-non-react-statics/dist/hoist-non-react-statics.cjs.js");
/* harmony import */ var hoist_non_react_statics__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(hoist_non_react_statics__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _isolated_hnrs_dist_emotion_react_isolated_hnrs_browser_esm_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../_isolated-hnrs/dist/emotion-react-_isolated-hnrs.browser.esm.js */ "./node_modules/@emotion/react/_isolated-hnrs/dist/emotion-react-_isolated-hnrs.browser.esm.js");
/* harmony import */ var _emotion_utils__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @emotion/utils */ "./node_modules/@emotion/react/node_modules/@emotion/utils/dist/emotion-utils.browser.esm.js");
/* harmony import */ var _emotion_serialize__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @emotion/serialize */ "./node_modules/@emotion/react/node_modules/@emotion/serialize/dist/emotion-serialize.browser.esm.js");
/* harmony import */ var _emotion_sheet__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! @emotion/sheet */ "./node_modules/@emotion/react/node_modules/@emotion/sheet/dist/emotion-sheet.browser.esm.js");












var pkg = {
	name: "@emotion/react",
	version: "11.7.1",
	main: "dist/emotion-react.cjs.js",
	module: "dist/emotion-react.esm.js",
	browser: {
		"./dist/emotion-react.cjs.js": "./dist/emotion-react.browser.cjs.js",
		"./dist/emotion-react.esm.js": "./dist/emotion-react.browser.esm.js"
	},
	types: "types/index.d.ts",
	files: [
		"src",
		"dist",
		"jsx-runtime",
		"jsx-dev-runtime",
		"_isolated-hnrs",
		"types/*.d.ts",
		"macro.js",
		"macro.d.ts",
		"macro.js.flow"
	],
	sideEffects: false,
	author: "mitchellhamilton <mitchell@mitchellhamilton.me>",
	license: "MIT",
	scripts: {
		"test:typescript": "dtslint types"
	},
	dependencies: {
		"@babel/runtime": "^7.13.10",
		"@emotion/cache": "^11.7.1",
		"@emotion/serialize": "^1.0.2",
		"@emotion/sheet": "^1.1.0",
		"@emotion/utils": "^1.0.0",
		"@emotion/weak-memoize": "^0.2.5",
		"hoist-non-react-statics": "^3.3.1"
	},
	peerDependencies: {
		"@babel/core": "^7.0.0",
		react: ">=16.8.0"
	},
	peerDependenciesMeta: {
		"@babel/core": {
			optional: true
		},
		"@types/react": {
			optional: true
		}
	},
	devDependencies: {
		"@babel/core": "^7.13.10",
		"@emotion/css": "11.7.1",
		"@emotion/css-prettifier": "1.0.1",
		"@emotion/server": "11.4.0",
		"@emotion/styled": "11.6.0",
		"@types/react": "^16.9.11",
		dtslint: "^0.3.0",
		"html-tag-names": "^1.1.2",
		react: "16.14.0",
		"svg-tag-names": "^1.1.1"
	},
	repository: "https://github.com/emotion-js/emotion/tree/main/packages/react",
	publishConfig: {
		access: "public"
	},
	"umd:main": "dist/emotion-react.umd.min.js",
	preconstruct: {
		entrypoints: [
			"./index.js",
			"./jsx-runtime.js",
			"./jsx-dev-runtime.js",
			"./_isolated-hnrs.js"
		],
		umdName: "emotionReact"
	}
};

var jsx = function jsx(type, props) {
  var args = arguments;

  if (props == null || !_emotion_element_699e6908_browser_esm_js__WEBPACK_IMPORTED_MODULE_2__["h"].call(props, 'css')) {
    // $FlowFixMe
    return react__WEBPACK_IMPORTED_MODULE_0__["createElement"].apply(undefined, args);
  }

  var argsLength = args.length;
  var createElementArgArray = new Array(argsLength);
  createElementArgArray[0] = _emotion_element_699e6908_browser_esm_js__WEBPACK_IMPORTED_MODULE_2__["E"];
  createElementArgArray[1] = Object(_emotion_element_699e6908_browser_esm_js__WEBPACK_IMPORTED_MODULE_2__["c"])(type, props);

  for (var i = 2; i < argsLength; i++) {
    createElementArgArray[i] = args[i];
  } // $FlowFixMe


  return react__WEBPACK_IMPORTED_MODULE_0__["createElement"].apply(null, createElementArgArray);
};

var warnedAboutCssPropForGlobal = false; // maintain place over rerenders.
// initial render from browser, insertBefore context.sheet.tags[0] or if a style hasn't been inserted there yet, appendChild
// initial client-side render from SSR, use place of hydrating tag

var Global = /* #__PURE__ */Object(_emotion_element_699e6908_browser_esm_js__WEBPACK_IMPORTED_MODULE_2__["w"])(function (props, cache) {
  if ( true && !warnedAboutCssPropForGlobal && ( // check for className as well since the user is
  // probably using the custom createElement which
  // means it will be turned into a className prop
  // $FlowFixMe I don't really want to add it to the type since it shouldn't be used
  props.className || props.css)) {
    console.error("It looks like you're using the css prop on Global, did you mean to use the styles prop instead?");
    warnedAboutCssPropForGlobal = true;
  }

  var styles = props.styles;
  var serialized = Object(_emotion_serialize__WEBPACK_IMPORTED_MODULE_8__["serializeStyles"])([styles], undefined, Object(react__WEBPACK_IMPORTED_MODULE_0__["useContext"])(_emotion_element_699e6908_browser_esm_js__WEBPACK_IMPORTED_MODULE_2__["T"]));
  // but it is based on a constant that will never change at runtime
  // it's effectively like having two implementations and switching them out
  // so it's not actually breaking anything


  var sheetRef = Object(react__WEBPACK_IMPORTED_MODULE_0__["useRef"])();
  Object(react__WEBPACK_IMPORTED_MODULE_0__["useLayoutEffect"])(function () {
    var key = cache.key + "-global";
    var sheet = new _emotion_sheet__WEBPACK_IMPORTED_MODULE_9__["StyleSheet"]({
      key: key,
      nonce: cache.sheet.nonce,
      container: cache.sheet.container,
      speedy: cache.sheet.isSpeedy
    });
    var rehydrating = false; // $FlowFixMe

    var node = document.querySelector("style[data-emotion=\"" + key + " " + serialized.name + "\"]");

    if (cache.sheet.tags.length) {
      sheet.before = cache.sheet.tags[0];
    }

    if (node !== null) {
      rehydrating = true; // clear the hash so this node won't be recognizable as rehydratable by other <Global/>s

      node.setAttribute('data-emotion', key);
      sheet.hydrate([node]);
    }

    sheetRef.current = [sheet, rehydrating];
    return function () {
      sheet.flush();
    };
  }, [cache]);
  Object(react__WEBPACK_IMPORTED_MODULE_0__["useLayoutEffect"])(function () {
    var sheetRefCurrent = sheetRef.current;
    var sheet = sheetRefCurrent[0],
        rehydrating = sheetRefCurrent[1];

    if (rehydrating) {
      sheetRefCurrent[1] = false;
      return;
    }

    if (serialized.next !== undefined) {
      // insert keyframes
      Object(_emotion_utils__WEBPACK_IMPORTED_MODULE_7__["insertStyles"])(cache, serialized.next, true);
    }

    if (sheet.tags.length) {
      // if this doesn't exist then it will be null so the style element will be appended
      var element = sheet.tags[sheet.tags.length - 1].nextElementSibling;
      sheet.before = element;
      sheet.flush();
    }

    cache.insert("", serialized, sheet, false);
  }, [cache, serialized.name]);
  return null;
});

if (true) {
  Global.displayName = 'EmotionGlobal';
}

function css() {
  for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
    args[_key] = arguments[_key];
  }

  return Object(_emotion_serialize__WEBPACK_IMPORTED_MODULE_8__["serializeStyles"])(args);
}

var keyframes = function keyframes() {
  var insertable = css.apply(void 0, arguments);
  var name = "animation-" + insertable.name; // $FlowFixMe

  return {
    name: name,
    styles: "@keyframes " + name + "{" + insertable.styles + "}",
    anim: 1,
    toString: function toString() {
      return "_EMO_" + this.name + "_" + this.styles + "_EMO_";
    }
  };
};

var classnames = function classnames(args) {
  var len = args.length;
  var i = 0;
  var cls = '';

  for (; i < len; i++) {
    var arg = args[i];
    if (arg == null) continue;
    var toAdd = void 0;

    switch (typeof arg) {
      case 'boolean':
        break;

      case 'object':
        {
          if (Array.isArray(arg)) {
            toAdd = classnames(arg);
          } else {
            if ( true && arg.styles !== undefined && arg.name !== undefined) {
              console.error('You have passed styles created with `css` from `@emotion/react` package to the `cx`.\n' + '`cx` is meant to compose class names (strings) so you should convert those styles to a class name by passing them to the `css` received from <ClassNames/> component.');
            }

            toAdd = '';

            for (var k in arg) {
              if (arg[k] && k) {
                toAdd && (toAdd += ' ');
                toAdd += k;
              }
            }
          }

          break;
        }

      default:
        {
          toAdd = arg;
        }
    }

    if (toAdd) {
      cls && (cls += ' ');
      cls += toAdd;
    }
  }

  return cls;
};

function merge(registered, css, className) {
  var registeredStyles = [];
  var rawClassName = Object(_emotion_utils__WEBPACK_IMPORTED_MODULE_7__["getRegisteredStyles"])(registered, registeredStyles, className);

  if (registeredStyles.length < 2) {
    return className;
  }

  return rawClassName + css(registeredStyles);
}

var Noop = function Noop() {
  return null;
};

var ClassNames = /* #__PURE__ */Object(_emotion_element_699e6908_browser_esm_js__WEBPACK_IMPORTED_MODULE_2__["w"])(function (props, cache) {
  var hasRendered = false;

  var css = function css() {
    if (hasRendered && "development" !== 'production') {
      throw new Error('css can only be used during render');
    }

    for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
      args[_key] = arguments[_key];
    }

    var serialized = Object(_emotion_serialize__WEBPACK_IMPORTED_MODULE_8__["serializeStyles"])(args, cache.registered);

    {
      Object(_emotion_utils__WEBPACK_IMPORTED_MODULE_7__["insertStyles"])(cache, serialized, false);
    }

    return cache.key + "-" + serialized.name;
  };

  var cx = function cx() {
    if (hasRendered && "development" !== 'production') {
      throw new Error('cx can only be used during render');
    }

    for (var _len2 = arguments.length, args = new Array(_len2), _key2 = 0; _key2 < _len2; _key2++) {
      args[_key2] = arguments[_key2];
    }

    return merge(cache.registered, css, classnames(args));
  };

  var content = {
    css: css,
    cx: cx,
    theme: Object(react__WEBPACK_IMPORTED_MODULE_0__["useContext"])(_emotion_element_699e6908_browser_esm_js__WEBPACK_IMPORTED_MODULE_2__["T"])
  };
  var ele = props.children(content);
  hasRendered = true;
  var possiblyStyleElement = /*#__PURE__*/Object(react__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Noop, null);


  return /*#__PURE__*/Object(react__WEBPACK_IMPORTED_MODULE_0__["createElement"])(react__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, possiblyStyleElement, ele);
});

if (true) {
  ClassNames.displayName = 'EmotionClassNames';
}

if (true) {
  var isBrowser = "object" !== 'undefined'; // #1727 for some reason Jest evaluates modules twice if some consuming module gets mocked with jest.mock

  var isJest = typeof jest !== 'undefined';

  if (isBrowser && !isJest) {
    // globalThis has wide browser support - https://caniuse.com/?search=globalThis, Node.js 12 and later
    var globalContext = // $FlowIgnore
    typeof globalThis !== 'undefined' ? globalThis // eslint-disable-line no-undef
    : isBrowser ? window : global;
    var globalKey = "__EMOTION_REACT_" + pkg.version.split('.')[0] + "__";

    if (globalContext[globalKey]) {
      console.warn('You are loading @emotion/react when it is already loaded. Running ' + 'multiple instances may cause problems. This can happen if multiple ' + 'versions are used, or if multiple builds of the same version are ' + 'used.');
    }

    globalContext[globalKey] = true;
  }
}



/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../../webpack/buildin/global.js */ "./node_modules/webpack/buildin/global.js")))

/***/ }),

/***/ "./node_modules/@emotion/react/node_modules/@emotion/cache/dist/emotion-cache.browser.esm.js":
/*!***************************************************************************************************!*\
  !*** ./node_modules/@emotion/react/node_modules/@emotion/cache/dist/emotion-cache.browser.esm.js ***!
  \***************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _emotion_sheet__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @emotion/sheet */ "./node_modules/@emotion/react/node_modules/@emotion/sheet/dist/emotion-sheet.browser.esm.js");
/* harmony import */ var stylis__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! stylis */ "./node_modules/stylis/dist/stylis.mjs");
/* harmony import */ var _emotion_weak_memoize__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @emotion/weak-memoize */ "./node_modules/@emotion/weak-memoize/dist/weak-memoize.browser.esm.js");
/* harmony import */ var _emotion_memoize__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @emotion/memoize */ "./node_modules/@emotion/memoize/dist/memoize.browser.esm.js");





var last = function last(arr) {
  return arr.length ? arr[arr.length - 1] : null;
}; // based on https://github.com/thysultan/stylis.js/blob/e6843c373ebcbbfade25ebcc23f540ed8508da0a/src/Tokenizer.js#L239-L244


var identifierWithPointTracking = function identifierWithPointTracking(begin, points, index) {
  var previous = 0;
  var character = 0;

  while (true) {
    previous = character;
    character = Object(stylis__WEBPACK_IMPORTED_MODULE_1__["peek"])(); // &\f

    if (previous === 38 && character === 12) {
      points[index] = 1;
    }

    if (Object(stylis__WEBPACK_IMPORTED_MODULE_1__["token"])(character)) {
      break;
    }

    Object(stylis__WEBPACK_IMPORTED_MODULE_1__["next"])();
  }

  return Object(stylis__WEBPACK_IMPORTED_MODULE_1__["slice"])(begin, stylis__WEBPACK_IMPORTED_MODULE_1__["position"]);
};

var toRules = function toRules(parsed, points) {
  // pretend we've started with a comma
  var index = -1;
  var character = 44;

  do {
    switch (Object(stylis__WEBPACK_IMPORTED_MODULE_1__["token"])(character)) {
      case 0:
        // &\f
        if (character === 38 && Object(stylis__WEBPACK_IMPORTED_MODULE_1__["peek"])() === 12) {
          // this is not 100% correct, we don't account for literal sequences here - like for example quoted strings
          // stylis inserts \f after & to know when & where it should replace this sequence with the context selector
          // and when it should just concatenate the outer and inner selectors
          // it's very unlikely for this sequence to actually appear in a different context, so we just leverage this fact here
          points[index] = 1;
        }

        parsed[index] += identifierWithPointTracking(stylis__WEBPACK_IMPORTED_MODULE_1__["position"] - 1, points, index);
        break;

      case 2:
        parsed[index] += Object(stylis__WEBPACK_IMPORTED_MODULE_1__["delimit"])(character);
        break;

      case 4:
        // comma
        if (character === 44) {
          // colon
          parsed[++index] = Object(stylis__WEBPACK_IMPORTED_MODULE_1__["peek"])() === 58 ? '&\f' : '';
          points[index] = parsed[index].length;
          break;
        }

      // fallthrough

      default:
        parsed[index] += Object(stylis__WEBPACK_IMPORTED_MODULE_1__["from"])(character);
    }
  } while (character = Object(stylis__WEBPACK_IMPORTED_MODULE_1__["next"])());

  return parsed;
};

var getRules = function getRules(value, points) {
  return Object(stylis__WEBPACK_IMPORTED_MODULE_1__["dealloc"])(toRules(Object(stylis__WEBPACK_IMPORTED_MODULE_1__["alloc"])(value), points));
}; // WeakSet would be more appropriate, but only WeakMap is supported in IE11


var fixedElements = /* #__PURE__ */new WeakMap();
var compat = function compat(element) {
  if (element.type !== 'rule' || !element.parent || // positive .length indicates that this rule contains pseudo
  // negative .length indicates that this rule has been already prefixed
  element.length < 1) {
    return;
  }

  var value = element.value,
      parent = element.parent;
  var isImplicitRule = element.column === parent.column && element.line === parent.line;

  while (parent.type !== 'rule') {
    parent = parent.parent;
    if (!parent) return;
  } // short-circuit for the simplest case


  if (element.props.length === 1 && value.charCodeAt(0) !== 58
  /* colon */
  && !fixedElements.get(parent)) {
    return;
  } // if this is an implicitly inserted rule (the one eagerly inserted at the each new nested level)
  // then the props has already been manipulated beforehand as they that array is shared between it and its "rule parent"


  if (isImplicitRule) {
    return;
  }

  fixedElements.set(element, true);
  var points = [];
  var rules = getRules(value, points);
  var parentRules = parent.props;

  for (var i = 0, k = 0; i < rules.length; i++) {
    for (var j = 0; j < parentRules.length; j++, k++) {
      element.props[k] = points[i] ? rules[i].replace(/&\f/g, parentRules[j]) : parentRules[j] + " " + rules[i];
    }
  }
};
var removeLabel = function removeLabel(element) {
  if (element.type === 'decl') {
    var value = element.value;

    if ( // charcode for l
    value.charCodeAt(0) === 108 && // charcode for b
    value.charCodeAt(2) === 98) {
      // this ignores label
      element["return"] = '';
      element.value = '';
    }
  }
};
var ignoreFlag = 'emotion-disable-server-rendering-unsafe-selector-warning-please-do-not-use-this-the-warning-exists-for-a-reason';

var isIgnoringComment = function isIgnoringComment(element) {
  return !!element && element.type === 'comm' && element.children.indexOf(ignoreFlag) > -1;
};

var createUnsafeSelectorsAlarm = function createUnsafeSelectorsAlarm(cache) {
  return function (element, index, children) {
    if (element.type !== 'rule') return;
    var unsafePseudoClasses = element.value.match(/(:first|:nth|:nth-last)-child/g);

    if (unsafePseudoClasses && cache.compat !== true) {
      var prevElement = index > 0 ? children[index - 1] : null;

      if (prevElement && isIgnoringComment(last(prevElement.children))) {
        return;
      }

      unsafePseudoClasses.forEach(function (unsafePseudoClass) {
        console.error("The pseudo class \"" + unsafePseudoClass + "\" is potentially unsafe when doing server-side rendering. Try changing it to \"" + unsafePseudoClass.split('-child')[0] + "-of-type\".");
      });
    }
  };
};

var isImportRule = function isImportRule(element) {
  return element.type.charCodeAt(1) === 105 && element.type.charCodeAt(0) === 64;
};

var isPrependedWithRegularRules = function isPrependedWithRegularRules(index, children) {
  for (var i = index - 1; i >= 0; i--) {
    if (!isImportRule(children[i])) {
      return true;
    }
  }

  return false;
}; // use this to remove incorrect elements from further processing
// so they don't get handed to the `sheet` (or anything else)
// as that could potentially lead to additional logs which in turn could be overhelming to the user


var nullifyElement = function nullifyElement(element) {
  element.type = '';
  element.value = '';
  element["return"] = '';
  element.children = '';
  element.props = '';
};

var incorrectImportAlarm = function incorrectImportAlarm(element, index, children) {
  if (!isImportRule(element)) {
    return;
  }

  if (element.parent) {
    console.error("`@import` rules can't be nested inside other rules. Please move it to the top level and put it before regular rules. Keep in mind that they can only be used within global styles.");
    nullifyElement(element);
  } else if (isPrependedWithRegularRules(index, children)) {
    console.error("`@import` rules can't be after other rules. Please put your `@import` rules before your other rules.");
    nullifyElement(element);
  }
};

var defaultStylisPlugins = [stylis__WEBPACK_IMPORTED_MODULE_1__["prefixer"]];

var createCache = function createCache(options) {
  var key = options.key;

  if ( true && !key) {
    throw new Error("You have to configure `key` for your cache. Please make sure it's unique (and not equal to 'css') as it's used for linking styles to your cache.\n" + "If multiple caches share the same key they might \"fight\" for each other's style elements.");
  }

  if ( key === 'css') {
    var ssrStyles = document.querySelectorAll("style[data-emotion]:not([data-s])"); // get SSRed styles out of the way of React's hydration
    // document.head is a safe place to move them to(though note document.head is not necessarily the last place they will be)
    // note this very very intentionally targets all style elements regardless of the key to ensure
    // that creating a cache works inside of render of a React component

    Array.prototype.forEach.call(ssrStyles, function (node) {
      // we want to only move elements which have a space in the data-emotion attribute value
      // because that indicates that it is an Emotion 11 server-side rendered style elements
      // while we will already ignore Emotion 11 client-side inserted styles because of the :not([data-s]) part in the selector
      // Emotion 10 client-side inserted styles did not have data-s (but importantly did not have a space in their data-emotion attributes)
      // so checking for the space ensures that loading Emotion 11 after Emotion 10 has inserted some styles
      // will not result in the Emotion 10 styles being destroyed
      var dataEmotionAttribute = node.getAttribute('data-emotion');

      if (dataEmotionAttribute.indexOf(' ') === -1) {
        return;
      }
      document.head.appendChild(node);
      node.setAttribute('data-s', '');
    });
  }

  var stylisPlugins = options.stylisPlugins || defaultStylisPlugins;

  if (true) {
    // $FlowFixMe
    if (/[^a-z-]/.test(key)) {
      throw new Error("Emotion key must only contain lower case alphabetical characters and - but \"" + key + "\" was passed");
    }
  }

  var inserted = {}; // $FlowFixMe

  var container;
  var nodesToHydrate = [];

  {
    container = options.container || document.head;
    Array.prototype.forEach.call( // this means we will ignore elements which don't have a space in them which
    // means that the style elements we're looking at are only Emotion 11 server-rendered style elements
    document.querySelectorAll("style[data-emotion^=\"" + key + " \"]"), function (node) {
      var attrib = node.getAttribute("data-emotion").split(' '); // $FlowFixMe

      for (var i = 1; i < attrib.length; i++) {
        inserted[attrib[i]] = true;
      }

      nodesToHydrate.push(node);
    });
  }

  var _insert;

  var omnipresentPlugins = [compat, removeLabel];

  if (true) {
    omnipresentPlugins.push(createUnsafeSelectorsAlarm({
      get compat() {
        return cache.compat;
      }

    }), incorrectImportAlarm);
  }

  {
    var currentSheet;
    var finalizingPlugins = [stylis__WEBPACK_IMPORTED_MODULE_1__["stringify"],  true ? function (element) {
      if (!element.root) {
        if (element["return"]) {
          currentSheet.insert(element["return"]);
        } else if (element.value && element.type !== stylis__WEBPACK_IMPORTED_MODULE_1__["COMMENT"]) {
          // insert empty rule in non-production environments
          // so @emotion/jest can grab `key` from the (JS)DOM for caches without any rules inserted yet
          currentSheet.insert(element.value + "{}");
        }
      }
    } : undefined];
    var serializer = Object(stylis__WEBPACK_IMPORTED_MODULE_1__["middleware"])(omnipresentPlugins.concat(stylisPlugins, finalizingPlugins));

    var stylis = function stylis(styles) {
      return Object(stylis__WEBPACK_IMPORTED_MODULE_1__["serialize"])(Object(stylis__WEBPACK_IMPORTED_MODULE_1__["compile"])(styles), serializer);
    };

    _insert = function insert(selector, serialized, sheet, shouldCache) {
      currentSheet = sheet;

      if ( true && serialized.map !== undefined) {
        currentSheet = {
          insert: function insert(rule) {
            sheet.insert(rule + serialized.map);
          }
        };
      }

      stylis(selector ? selector + "{" + serialized.styles + "}" : serialized.styles);

      if (shouldCache) {
        cache.inserted[serialized.name] = true;
      }
    };
  }

  var cache = {
    key: key,
    sheet: new _emotion_sheet__WEBPACK_IMPORTED_MODULE_0__["StyleSheet"]({
      key: key,
      container: container,
      nonce: options.nonce,
      speedy: options.speedy,
      prepend: options.prepend,
      insertionPoint: options.insertionPoint
    }),
    nonce: options.nonce,
    inserted: inserted,
    registered: {},
    insert: _insert
  };
  cache.sheet.hydrate(nodesToHydrate);
  return cache;
};

/* harmony default export */ __webpack_exports__["default"] = (createCache);


/***/ }),

/***/ "./node_modules/@emotion/react/node_modules/@emotion/serialize/dist/emotion-serialize.browser.esm.js":
/*!***********************************************************************************************************!*\
  !*** ./node_modules/@emotion/react/node_modules/@emotion/serialize/dist/emotion-serialize.browser.esm.js ***!
  \***********************************************************************************************************/
/*! exports provided: serializeStyles */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "serializeStyles", function() { return serializeStyles; });
/* harmony import */ var _emotion_hash__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @emotion/hash */ "./node_modules/@emotion/hash/dist/hash.browser.esm.js");
/* harmony import */ var _emotion_unitless__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @emotion/unitless */ "./node_modules/@emotion/unitless/dist/unitless.browser.esm.js");
/* harmony import */ var _emotion_memoize__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @emotion/memoize */ "./node_modules/@emotion/memoize/dist/memoize.browser.esm.js");




var ILLEGAL_ESCAPE_SEQUENCE_ERROR = "You have illegal escape sequence in your template literal, most likely inside content's property value.\nBecause you write your CSS inside a JavaScript string you actually have to do double escaping, so for example \"content: '\\00d7';\" should become \"content: '\\\\00d7';\".\nYou can read more about this here:\nhttps://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Template_literals#ES2018_revision_of_illegal_escape_sequences";
var UNDEFINED_AS_OBJECT_KEY_ERROR = "You have passed in falsy value as style object's key (can happen when in example you pass unexported component as computed key).";
var hyphenateRegex = /[A-Z]|^ms/g;
var animationRegex = /_EMO_([^_]+?)_([^]*?)_EMO_/g;

var isCustomProperty = function isCustomProperty(property) {
  return property.charCodeAt(1) === 45;
};

var isProcessableValue = function isProcessableValue(value) {
  return value != null && typeof value !== 'boolean';
};

var processStyleName = /* #__PURE__ */Object(_emotion_memoize__WEBPACK_IMPORTED_MODULE_2__["default"])(function (styleName) {
  return isCustomProperty(styleName) ? styleName : styleName.replace(hyphenateRegex, '-$&').toLowerCase();
});

var processStyleValue = function processStyleValue(key, value) {
  switch (key) {
    case 'animation':
    case 'animationName':
      {
        if (typeof value === 'string') {
          return value.replace(animationRegex, function (match, p1, p2) {
            cursor = {
              name: p1,
              styles: p2,
              next: cursor
            };
            return p1;
          });
        }
      }
  }

  if (_emotion_unitless__WEBPACK_IMPORTED_MODULE_1__["default"][key] !== 1 && !isCustomProperty(key) && typeof value === 'number' && value !== 0) {
    return value + 'px';
  }

  return value;
};

if (true) {
  var contentValuePattern = /(attr|counters?|url|(((repeating-)?(linear|radial))|conic)-gradient)\(|(no-)?(open|close)-quote/;
  var contentValues = ['normal', 'none', 'initial', 'inherit', 'unset'];
  var oldProcessStyleValue = processStyleValue;
  var msPattern = /^-ms-/;
  var hyphenPattern = /-(.)/g;
  var hyphenatedCache = {};

  processStyleValue = function processStyleValue(key, value) {
    if (key === 'content') {
      if (typeof value !== 'string' || contentValues.indexOf(value) === -1 && !contentValuePattern.test(value) && (value.charAt(0) !== value.charAt(value.length - 1) || value.charAt(0) !== '"' && value.charAt(0) !== "'")) {
        throw new Error("You seem to be using a value for 'content' without quotes, try replacing it with `content: '\"" + value + "\"'`");
      }
    }

    var processed = oldProcessStyleValue(key, value);

    if (processed !== '' && !isCustomProperty(key) && key.indexOf('-') !== -1 && hyphenatedCache[key] === undefined) {
      hyphenatedCache[key] = true;
      console.error("Using kebab-case for css properties in objects is not supported. Did you mean " + key.replace(msPattern, 'ms-').replace(hyphenPattern, function (str, _char) {
        return _char.toUpperCase();
      }) + "?");
    }

    return processed;
  };
}

function handleInterpolation(mergedProps, registered, interpolation) {
  if (interpolation == null) {
    return '';
  }

  if (interpolation.__emotion_styles !== undefined) {
    if ( true && interpolation.toString() === 'NO_COMPONENT_SELECTOR') {
      throw new Error('Component selectors can only be used in conjunction with @emotion/babel-plugin.');
    }

    return interpolation;
  }

  switch (typeof interpolation) {
    case 'boolean':
      {
        return '';
      }

    case 'object':
      {
        if (interpolation.anim === 1) {
          cursor = {
            name: interpolation.name,
            styles: interpolation.styles,
            next: cursor
          };
          return interpolation.name;
        }

        if (interpolation.styles !== undefined) {
          var next = interpolation.next;

          if (next !== undefined) {
            // not the most efficient thing ever but this is a pretty rare case
            // and there will be very few iterations of this generally
            while (next !== undefined) {
              cursor = {
                name: next.name,
                styles: next.styles,
                next: cursor
              };
              next = next.next;
            }
          }

          var styles = interpolation.styles + ";";

          if ( true && interpolation.map !== undefined) {
            styles += interpolation.map;
          }

          return styles;
        }

        return createStringFromObject(mergedProps, registered, interpolation);
      }

    case 'function':
      {
        if (mergedProps !== undefined) {
          var previousCursor = cursor;
          var result = interpolation(mergedProps);
          cursor = previousCursor;
          return handleInterpolation(mergedProps, registered, result);
        } else if (true) {
          console.error('Functions that are interpolated in css calls will be stringified.\n' + 'If you want to have a css call based on props, create a function that returns a css call like this\n' + 'let dynamicStyle = (props) => css`color: ${props.color}`\n' + 'It can be called directly with props or interpolated in a styled call like this\n' + "let SomeComponent = styled('div')`${dynamicStyle}`");
        }

        break;
      }

    case 'string':
      if (true) {
        var matched = [];
        var replaced = interpolation.replace(animationRegex, function (match, p1, p2) {
          var fakeVarName = "animation" + matched.length;
          matched.push("const " + fakeVarName + " = keyframes`" + p2.replace(/^@keyframes animation-\w+/, '') + "`");
          return "${" + fakeVarName + "}";
        });

        if (matched.length) {
          console.error('`keyframes` output got interpolated into plain string, please wrap it with `css`.\n\n' + 'Instead of doing this:\n\n' + [].concat(matched, ["`" + replaced + "`"]).join('\n') + '\n\nYou should wrap it with `css` like this:\n\n' + ("css`" + replaced + "`"));
        }
      }

      break;
  } // finalize string values (regular strings and functions interpolated into css calls)


  if (registered == null) {
    return interpolation;
  }

  var cached = registered[interpolation];
  return cached !== undefined ? cached : interpolation;
}

function createStringFromObject(mergedProps, registered, obj) {
  var string = '';

  if (Array.isArray(obj)) {
    for (var i = 0; i < obj.length; i++) {
      string += handleInterpolation(mergedProps, registered, obj[i]) + ";";
    }
  } else {
    for (var _key in obj) {
      var value = obj[_key];

      if (typeof value !== 'object') {
        if (registered != null && registered[value] !== undefined) {
          string += _key + "{" + registered[value] + "}";
        } else if (isProcessableValue(value)) {
          string += processStyleName(_key) + ":" + processStyleValue(_key, value) + ";";
        }
      } else {
        if (_key === 'NO_COMPONENT_SELECTOR' && "development" !== 'production') {
          throw new Error('Component selectors can only be used in conjunction with @emotion/babel-plugin.');
        }

        if (Array.isArray(value) && typeof value[0] === 'string' && (registered == null || registered[value[0]] === undefined)) {
          for (var _i = 0; _i < value.length; _i++) {
            if (isProcessableValue(value[_i])) {
              string += processStyleName(_key) + ":" + processStyleValue(_key, value[_i]) + ";";
            }
          }
        } else {
          var interpolated = handleInterpolation(mergedProps, registered, value);

          switch (_key) {
            case 'animation':
            case 'animationName':
              {
                string += processStyleName(_key) + ":" + interpolated + ";";
                break;
              }

            default:
              {
                if ( true && _key === 'undefined') {
                  console.error(UNDEFINED_AS_OBJECT_KEY_ERROR);
                }

                string += _key + "{" + interpolated + "}";
              }
          }
        }
      }
    }
  }

  return string;
}

var labelPattern = /label:\s*([^\s;\n{]+)\s*(;|$)/g;
var sourceMapPattern;

if (true) {
  sourceMapPattern = /\/\*#\ssourceMappingURL=data:application\/json;\S+\s+\*\//g;
} // this is the cursor for keyframes
// keyframes are stored on the SerializedStyles object as a linked list


var cursor;
var serializeStyles = function serializeStyles(args, registered, mergedProps) {
  if (args.length === 1 && typeof args[0] === 'object' && args[0] !== null && args[0].styles !== undefined) {
    return args[0];
  }

  var stringMode = true;
  var styles = '';
  cursor = undefined;
  var strings = args[0];

  if (strings == null || strings.raw === undefined) {
    stringMode = false;
    styles += handleInterpolation(mergedProps, registered, strings);
  } else {
    if ( true && strings[0] === undefined) {
      console.error(ILLEGAL_ESCAPE_SEQUENCE_ERROR);
    }

    styles += strings[0];
  } // we start at 1 since we've already handled the first arg


  for (var i = 1; i < args.length; i++) {
    styles += handleInterpolation(mergedProps, registered, args[i]);

    if (stringMode) {
      if ( true && strings[i] === undefined) {
        console.error(ILLEGAL_ESCAPE_SEQUENCE_ERROR);
      }

      styles += strings[i];
    }
  }

  var sourceMap;

  if (true) {
    styles = styles.replace(sourceMapPattern, function (match) {
      sourceMap = match;
      return '';
    });
  } // using a global regex with .exec is stateful so lastIndex has to be reset each time


  labelPattern.lastIndex = 0;
  var identifierName = '';
  var match; // https://esbench.com/bench/5b809c2cf2949800a0f61fb5

  while ((match = labelPattern.exec(styles)) !== null) {
    identifierName += '-' + // $FlowFixMe we know it's not null
    match[1];
  }

  var name = Object(_emotion_hash__WEBPACK_IMPORTED_MODULE_0__["default"])(styles) + identifierName;

  if (true) {
    // $FlowFixMe SerializedStyles type doesn't have toString property (and we don't want to add it)
    return {
      name: name,
      styles: styles,
      map: sourceMap,
      next: cursor,
      toString: function toString() {
        return "You have tried to stringify object returned from `css` function. It isn't supposed to be used directly (e.g. as value of the `className` prop), but rather handed to emotion so it can handle it (e.g. as value of `css` prop).";
      }
    };
  }

  return {
    name: name,
    styles: styles,
    next: cursor
  };
};




/***/ }),

/***/ "./node_modules/@emotion/react/node_modules/@emotion/sheet/dist/emotion-sheet.browser.esm.js":
/*!***************************************************************************************************!*\
  !*** ./node_modules/@emotion/react/node_modules/@emotion/sheet/dist/emotion-sheet.browser.esm.js ***!
  \***************************************************************************************************/
/*! exports provided: StyleSheet */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "StyleSheet", function() { return StyleSheet; });
/*

Based off glamor's StyleSheet, thanks Sunil ❤️

high performance StyleSheet for css-in-js systems

- uses multiple style tags behind the scenes for millions of rules
- uses `insertRule` for appending in production for *much* faster performance

// usage

import { StyleSheet } from '@emotion/sheet'

let styleSheet = new StyleSheet({ key: '', container: document.head })

styleSheet.insert('#box { border: 1px solid red; }')
- appends a css rule into the stylesheet

styleSheet.flush()
- empties the stylesheet of all its contents

*/
// $FlowFixMe
function sheetForTag(tag) {
  if (tag.sheet) {
    // $FlowFixMe
    return tag.sheet;
  } // this weirdness brought to you by firefox

  /* istanbul ignore next */


  for (var i = 0; i < document.styleSheets.length; i++) {
    if (document.styleSheets[i].ownerNode === tag) {
      // $FlowFixMe
      return document.styleSheets[i];
    }
  }
}

function createStyleElement(options) {
  var tag = document.createElement('style');
  tag.setAttribute('data-emotion', options.key);

  if (options.nonce !== undefined) {
    tag.setAttribute('nonce', options.nonce);
  }

  tag.appendChild(document.createTextNode(''));
  tag.setAttribute('data-s', '');
  return tag;
}

var StyleSheet = /*#__PURE__*/function () {
  function StyleSheet(options) {
    var _this = this;

    this._insertTag = function (tag) {
      var before;

      if (_this.tags.length === 0) {
        if (_this.insertionPoint) {
          before = _this.insertionPoint.nextSibling;
        } else if (_this.prepend) {
          before = _this.container.firstChild;
        } else {
          before = _this.before;
        }
      } else {
        before = _this.tags[_this.tags.length - 1].nextSibling;
      }

      _this.container.insertBefore(tag, before);

      _this.tags.push(tag);
    };

    this.isSpeedy = options.speedy === undefined ? "development" === 'production' : options.speedy;
    this.tags = [];
    this.ctr = 0;
    this.nonce = options.nonce; // key is the value of the data-emotion attribute, it's used to identify different sheets

    this.key = options.key;
    this.container = options.container;
    this.prepend = options.prepend;
    this.insertionPoint = options.insertionPoint;
    this.before = null;
  }

  var _proto = StyleSheet.prototype;

  _proto.hydrate = function hydrate(nodes) {
    nodes.forEach(this._insertTag);
  };

  _proto.insert = function insert(rule) {
    // the max length is how many rules we have per style tag, it's 65000 in speedy mode
    // it's 1 in dev because we insert source maps that map a single rule to a location
    // and you can only have one source map per style tag
    if (this.ctr % (this.isSpeedy ? 65000 : 1) === 0) {
      this._insertTag(createStyleElement(this));
    }

    var tag = this.tags[this.tags.length - 1];

    if (true) {
      var isImportRule = rule.charCodeAt(0) === 64 && rule.charCodeAt(1) === 105;

      if (isImportRule && this._alreadyInsertedOrderInsensitiveRule) {
        // this would only cause problem in speedy mode
        // but we don't want enabling speedy to affect the observable behavior
        // so we report this error at all times
        console.error("You're attempting to insert the following rule:\n" + rule + '\n\n`@import` rules must be before all other types of rules in a stylesheet but other rules have already been inserted. Please ensure that `@import` rules are before all other rules.');
      }
      this._alreadyInsertedOrderInsensitiveRule = this._alreadyInsertedOrderInsensitiveRule || !isImportRule;
    }

    if (this.isSpeedy) {
      var sheet = sheetForTag(tag);

      try {
        // this is the ultrafast version, works across browsers
        // the big drawback is that the css won't be editable in devtools
        sheet.insertRule(rule, sheet.cssRules.length);
      } catch (e) {
        if ( true && !/:(-moz-placeholder|-moz-focus-inner|-moz-focusring|-ms-input-placeholder|-moz-read-write|-moz-read-only|-ms-clear){/.test(rule)) {
          console.error("There was a problem inserting the following rule: \"" + rule + "\"", e);
        }
      }
    } else {
      tag.appendChild(document.createTextNode(rule));
    }

    this.ctr++;
  };

  _proto.flush = function flush() {
    // $FlowFixMe
    this.tags.forEach(function (tag) {
      return tag.parentNode && tag.parentNode.removeChild(tag);
    });
    this.tags = [];
    this.ctr = 0;

    if (true) {
      this._alreadyInsertedOrderInsensitiveRule = false;
    }
  };

  return StyleSheet;
}();




/***/ }),

/***/ "./node_modules/@emotion/react/node_modules/@emotion/utils/dist/emotion-utils.browser.esm.js":
/*!***************************************************************************************************!*\
  !*** ./node_modules/@emotion/react/node_modules/@emotion/utils/dist/emotion-utils.browser.esm.js ***!
  \***************************************************************************************************/
/*! exports provided: getRegisteredStyles, insertStyles */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getRegisteredStyles", function() { return getRegisteredStyles; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "insertStyles", function() { return insertStyles; });
var isBrowser = "object" !== 'undefined';
function getRegisteredStyles(registered, registeredStyles, classNames) {
  var rawClassName = '';
  classNames.split(' ').forEach(function (className) {
    if (registered[className] !== undefined) {
      registeredStyles.push(registered[className] + ";");
    } else {
      rawClassName += className + " ";
    }
  });
  return rawClassName;
}
var insertStyles = function insertStyles(cache, serialized, isStringTag) {
  var className = cache.key + "-" + serialized.name;

  if ( // we only need to add the styles to the registered cache if the
  // class name could be used further down
  // the tree but if it's a string tag, we know it won't
  // so we don't have to add it to registered cache.
  // this improves memory usage since we can avoid storing the whole style string
  (isStringTag === false || // we need to always store it if we're in compat mode and
  // in node since emotion-server relies on whether a style is in
  // the registered cache to know whether a style is global or not
  // also, note that this check will be dead code eliminated in the browser
  isBrowser === false ) && cache.registered[className] === undefined) {
    cache.registered[className] = serialized.styles;
  }

  if (cache.inserted[serialized.name] === undefined) {
    var current = serialized;

    do {
      var maybeStyles = cache.insert(serialized === current ? "." + className : '', current, cache.sheet, true);

      current = current.next;
    } while (current !== undefined);
  }
};




/***/ }),

/***/ "./node_modules/@emotion/unitless/dist/unitless.browser.esm.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@emotion/unitless/dist/unitless.browser.esm.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var unitlessKeys = {
  animationIterationCount: 1,
  borderImageOutset: 1,
  borderImageSlice: 1,
  borderImageWidth: 1,
  boxFlex: 1,
  boxFlexGroup: 1,
  boxOrdinalGroup: 1,
  columnCount: 1,
  columns: 1,
  flex: 1,
  flexGrow: 1,
  flexPositive: 1,
  flexShrink: 1,
  flexNegative: 1,
  flexOrder: 1,
  gridRow: 1,
  gridRowEnd: 1,
  gridRowSpan: 1,
  gridRowStart: 1,
  gridColumn: 1,
  gridColumnEnd: 1,
  gridColumnSpan: 1,
  gridColumnStart: 1,
  msGridRow: 1,
  msGridRowSpan: 1,
  msGridColumn: 1,
  msGridColumnSpan: 1,
  fontWeight: 1,
  lineHeight: 1,
  opacity: 1,
  order: 1,
  orphans: 1,
  tabSize: 1,
  widows: 1,
  zIndex: 1,
  zoom: 1,
  WebkitLineClamp: 1,
  // SVG-related properties
  fillOpacity: 1,
  floodOpacity: 1,
  stopOpacity: 1,
  strokeDasharray: 1,
  strokeDashoffset: 1,
  strokeMiterlimit: 1,
  strokeOpacity: 1,
  strokeWidth: 1
};

/* harmony default export */ __webpack_exports__["default"] = (unitlessKeys);


/***/ }),

/***/ "./node_modules/@emotion/weak-memoize/dist/weak-memoize.browser.esm.js":
/*!*****************************************************************************!*\
  !*** ./node_modules/@emotion/weak-memoize/dist/weak-memoize.browser.esm.js ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var weakMemoize = function weakMemoize(func) {
  // $FlowFixMe flow doesn't include all non-primitive types as allowed for weakmaps
  var cache = new WeakMap();
  return function (arg) {
    if (cache.has(arg)) {
      // $FlowFixMe
      return cache.get(arg);
    }

    var ret = func(arg);
    cache.set(arg, ret);
    return ret;
  };
};

/* harmony default export */ __webpack_exports__["default"] = (weakMemoize);


/***/ }),

/***/ "./node_modules/classnames/index.js":
/*!******************************************!*\
  !*** ./node_modules/classnames/index.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/*!
  Copyright (c) 2018 Jed Watson.
  Licensed under the MIT License (MIT), see
  http://jedwatson.github.io/classnames
*/
/* global define */

(function () {
	'use strict';

	var hasOwn = {}.hasOwnProperty;

	function classNames() {
		var classes = [];

		for (var i = 0; i < arguments.length; i++) {
			var arg = arguments[i];
			if (!arg) continue;

			var argType = typeof arg;

			if (argType === 'string' || argType === 'number') {
				classes.push(arg);
			} else if (Array.isArray(arg)) {
				if (arg.length) {
					var inner = classNames.apply(null, arg);
					if (inner) {
						classes.push(inner);
					}
				}
			} else if (argType === 'object') {
				if (arg.toString === Object.prototype.toString) {
					for (var key in arg) {
						if (hasOwn.call(arg, key) && arg[key]) {
							classes.push(key);
						}
					}
				} else {
					classes.push(arg.toString());
				}
			}
		}

		return classes.join(' ');
	}

	if ( true && module.exports) {
		classNames.default = classNames;
		module.exports = classNames;
	} else if (true) {
		// register as 'classnames', consistent with npm package name
		!(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function () {
			return classNames;
		}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
	} else {}
}());


/***/ }),

/***/ "./node_modules/hoist-non-react-statics/dist/hoist-non-react-statics.cjs.js":
/*!**********************************************************************************!*\
  !*** ./node_modules/hoist-non-react-statics/dist/hoist-non-react-statics.cjs.js ***!
  \**********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var reactIs = __webpack_require__(/*! react-is */ "./node_modules/react-is/index.js");

/**
 * Copyright 2015, Yahoo! Inc.
 * Copyrights licensed under the New BSD License. See the accompanying LICENSE file for terms.
 */
var REACT_STATICS = {
  childContextTypes: true,
  contextType: true,
  contextTypes: true,
  defaultProps: true,
  displayName: true,
  getDefaultProps: true,
  getDerivedStateFromError: true,
  getDerivedStateFromProps: true,
  mixins: true,
  propTypes: true,
  type: true
};
var KNOWN_STATICS = {
  name: true,
  length: true,
  prototype: true,
  caller: true,
  callee: true,
  arguments: true,
  arity: true
};
var FORWARD_REF_STATICS = {
  '$$typeof': true,
  render: true,
  defaultProps: true,
  displayName: true,
  propTypes: true
};
var MEMO_STATICS = {
  '$$typeof': true,
  compare: true,
  defaultProps: true,
  displayName: true,
  propTypes: true,
  type: true
};
var TYPE_STATICS = {};
TYPE_STATICS[reactIs.ForwardRef] = FORWARD_REF_STATICS;
TYPE_STATICS[reactIs.Memo] = MEMO_STATICS;

function getStatics(component) {
  // React v16.11 and below
  if (reactIs.isMemo(component)) {
    return MEMO_STATICS;
  } // React v16.12 and above


  return TYPE_STATICS[component['$$typeof']] || REACT_STATICS;
}

var defineProperty = Object.defineProperty;
var getOwnPropertyNames = Object.getOwnPropertyNames;
var getOwnPropertySymbols = Object.getOwnPropertySymbols;
var getOwnPropertyDescriptor = Object.getOwnPropertyDescriptor;
var getPrototypeOf = Object.getPrototypeOf;
var objectPrototype = Object.prototype;
function hoistNonReactStatics(targetComponent, sourceComponent, blacklist) {
  if (typeof sourceComponent !== 'string') {
    // don't hoist over string (html) components
    if (objectPrototype) {
      var inheritedComponent = getPrototypeOf(sourceComponent);

      if (inheritedComponent && inheritedComponent !== objectPrototype) {
        hoistNonReactStatics(targetComponent, inheritedComponent, blacklist);
      }
    }

    var keys = getOwnPropertyNames(sourceComponent);

    if (getOwnPropertySymbols) {
      keys = keys.concat(getOwnPropertySymbols(sourceComponent));
    }

    var targetStatics = getStatics(targetComponent);
    var sourceStatics = getStatics(sourceComponent);

    for (var i = 0; i < keys.length; ++i) {
      var key = keys[i];

      if (!KNOWN_STATICS[key] && !(blacklist && blacklist[key]) && !(sourceStatics && sourceStatics[key]) && !(targetStatics && targetStatics[key])) {
        var descriptor = getOwnPropertyDescriptor(sourceComponent, key);

        try {
          // Avoid failures from read-only properties
          defineProperty(targetComponent, key, descriptor);
        } catch (e) {}
      }
    }
  }

  return targetComponent;
}

module.exports = hoistNonReactStatics;


/***/ }),

/***/ "./node_modules/lodash/_Symbol.js":
/*!****************************************!*\
  !*** ./node_modules/lodash/_Symbol.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js");

/** Built-in value references. */
var Symbol = root.Symbol;

module.exports = Symbol;


/***/ }),

/***/ "./node_modules/lodash/_baseGetTag.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_baseGetTag.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var Symbol = __webpack_require__(/*! ./_Symbol */ "./node_modules/lodash/_Symbol.js"),
    getRawTag = __webpack_require__(/*! ./_getRawTag */ "./node_modules/lodash/_getRawTag.js"),
    objectToString = __webpack_require__(/*! ./_objectToString */ "./node_modules/lodash/_objectToString.js");

/** `Object#toString` result references. */
var nullTag = '[object Null]',
    undefinedTag = '[object Undefined]';

/** Built-in value references. */
var symToStringTag = Symbol ? Symbol.toStringTag : undefined;

/**
 * The base implementation of `getTag` without fallbacks for buggy environments.
 *
 * @private
 * @param {*} value The value to query.
 * @returns {string} Returns the `toStringTag`.
 */
function baseGetTag(value) {
  if (value == null) {
    return value === undefined ? undefinedTag : nullTag;
  }
  return (symToStringTag && symToStringTag in Object(value))
    ? getRawTag(value)
    : objectToString(value);
}

module.exports = baseGetTag;


/***/ }),

/***/ "./node_modules/lodash/_baseTrim.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_baseTrim.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var trimmedEndIndex = __webpack_require__(/*! ./_trimmedEndIndex */ "./node_modules/lodash/_trimmedEndIndex.js");

/** Used to match leading whitespace. */
var reTrimStart = /^\s+/;

/**
 * The base implementation of `_.trim`.
 *
 * @private
 * @param {string} string The string to trim.
 * @returns {string} Returns the trimmed string.
 */
function baseTrim(string) {
  return string
    ? string.slice(0, trimmedEndIndex(string) + 1).replace(reTrimStart, '')
    : string;
}

module.exports = baseTrim;


/***/ }),

/***/ "./node_modules/lodash/_freeGlobal.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_freeGlobal.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(global) {/** Detect free variable `global` from Node.js. */
var freeGlobal = typeof global == 'object' && global && global.Object === Object && global;

module.exports = freeGlobal;

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../webpack/buildin/global.js */ "./node_modules/webpack/buildin/global.js")))

/***/ }),

/***/ "./node_modules/lodash/_getRawTag.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_getRawTag.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var Symbol = __webpack_require__(/*! ./_Symbol */ "./node_modules/lodash/_Symbol.js");

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/**
 * Used to resolve the
 * [`toStringTag`](http://ecma-international.org/ecma-262/7.0/#sec-object.prototype.tostring)
 * of values.
 */
var nativeObjectToString = objectProto.toString;

/** Built-in value references. */
var symToStringTag = Symbol ? Symbol.toStringTag : undefined;

/**
 * A specialized version of `baseGetTag` which ignores `Symbol.toStringTag` values.
 *
 * @private
 * @param {*} value The value to query.
 * @returns {string} Returns the raw `toStringTag`.
 */
function getRawTag(value) {
  var isOwn = hasOwnProperty.call(value, symToStringTag),
      tag = value[symToStringTag];

  try {
    value[symToStringTag] = undefined;
    var unmasked = true;
  } catch (e) {}

  var result = nativeObjectToString.call(value);
  if (unmasked) {
    if (isOwn) {
      value[symToStringTag] = tag;
    } else {
      delete value[symToStringTag];
    }
  }
  return result;
}

module.exports = getRawTag;


/***/ }),

/***/ "./node_modules/lodash/_objectToString.js":
/*!************************************************!*\
  !*** ./node_modules/lodash/_objectToString.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/** Used for built-in method references. */
var objectProto = Object.prototype;

/**
 * Used to resolve the
 * [`toStringTag`](http://ecma-international.org/ecma-262/7.0/#sec-object.prototype.tostring)
 * of values.
 */
var nativeObjectToString = objectProto.toString;

/**
 * Converts `value` to a string using `Object.prototype.toString`.
 *
 * @private
 * @param {*} value The value to convert.
 * @returns {string} Returns the converted string.
 */
function objectToString(value) {
  return nativeObjectToString.call(value);
}

module.exports = objectToString;


/***/ }),

/***/ "./node_modules/lodash/_root.js":
/*!**************************************!*\
  !*** ./node_modules/lodash/_root.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var freeGlobal = __webpack_require__(/*! ./_freeGlobal */ "./node_modules/lodash/_freeGlobal.js");

/** Detect free variable `self`. */
var freeSelf = typeof self == 'object' && self && self.Object === Object && self;

/** Used as a reference to the global object. */
var root = freeGlobal || freeSelf || Function('return this')();

module.exports = root;


/***/ }),

/***/ "./node_modules/lodash/_trimmedEndIndex.js":
/*!*************************************************!*\
  !*** ./node_modules/lodash/_trimmedEndIndex.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/** Used to match a single whitespace character. */
var reWhitespace = /\s/;

/**
 * Used by `_.trim` and `_.trimEnd` to get the index of the last non-whitespace
 * character of `string`.
 *
 * @private
 * @param {string} string The string to inspect.
 * @returns {number} Returns the index of the last non-whitespace character.
 */
function trimmedEndIndex(string) {
  var index = string.length;

  while (index-- && reWhitespace.test(string.charAt(index))) {}
  return index;
}

module.exports = trimmedEndIndex;


/***/ }),

/***/ "./node_modules/lodash/debounce.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/debounce.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var isObject = __webpack_require__(/*! ./isObject */ "./node_modules/lodash/isObject.js"),
    now = __webpack_require__(/*! ./now */ "./node_modules/lodash/now.js"),
    toNumber = __webpack_require__(/*! ./toNumber */ "./node_modules/lodash/toNumber.js");

/** Error message constants. */
var FUNC_ERROR_TEXT = 'Expected a function';

/* Built-in method references for those with the same name as other `lodash` methods. */
var nativeMax = Math.max,
    nativeMin = Math.min;

/**
 * Creates a debounced function that delays invoking `func` until after `wait`
 * milliseconds have elapsed since the last time the debounced function was
 * invoked. The debounced function comes with a `cancel` method to cancel
 * delayed `func` invocations and a `flush` method to immediately invoke them.
 * Provide `options` to indicate whether `func` should be invoked on the
 * leading and/or trailing edge of the `wait` timeout. The `func` is invoked
 * with the last arguments provided to the debounced function. Subsequent
 * calls to the debounced function return the result of the last `func`
 * invocation.
 *
 * **Note:** If `leading` and `trailing` options are `true`, `func` is
 * invoked on the trailing edge of the timeout only if the debounced function
 * is invoked more than once during the `wait` timeout.
 *
 * If `wait` is `0` and `leading` is `false`, `func` invocation is deferred
 * until to the next tick, similar to `setTimeout` with a timeout of `0`.
 *
 * See [David Corbacho's article](https://css-tricks.com/debouncing-throttling-explained-examples/)
 * for details over the differences between `_.debounce` and `_.throttle`.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Function
 * @param {Function} func The function to debounce.
 * @param {number} [wait=0] The number of milliseconds to delay.
 * @param {Object} [options={}] The options object.
 * @param {boolean} [options.leading=false]
 *  Specify invoking on the leading edge of the timeout.
 * @param {number} [options.maxWait]
 *  The maximum time `func` is allowed to be delayed before it's invoked.
 * @param {boolean} [options.trailing=true]
 *  Specify invoking on the trailing edge of the timeout.
 * @returns {Function} Returns the new debounced function.
 * @example
 *
 * // Avoid costly calculations while the window size is in flux.
 * jQuery(window).on('resize', _.debounce(calculateLayout, 150));
 *
 * // Invoke `sendMail` when clicked, debouncing subsequent calls.
 * jQuery(element).on('click', _.debounce(sendMail, 300, {
 *   'leading': true,
 *   'trailing': false
 * }));
 *
 * // Ensure `batchLog` is invoked once after 1 second of debounced calls.
 * var debounced = _.debounce(batchLog, 250, { 'maxWait': 1000 });
 * var source = new EventSource('/stream');
 * jQuery(source).on('message', debounced);
 *
 * // Cancel the trailing debounced invocation.
 * jQuery(window).on('popstate', debounced.cancel);
 */
function debounce(func, wait, options) {
  var lastArgs,
      lastThis,
      maxWait,
      result,
      timerId,
      lastCallTime,
      lastInvokeTime = 0,
      leading = false,
      maxing = false,
      trailing = true;

  if (typeof func != 'function') {
    throw new TypeError(FUNC_ERROR_TEXT);
  }
  wait = toNumber(wait) || 0;
  if (isObject(options)) {
    leading = !!options.leading;
    maxing = 'maxWait' in options;
    maxWait = maxing ? nativeMax(toNumber(options.maxWait) || 0, wait) : maxWait;
    trailing = 'trailing' in options ? !!options.trailing : trailing;
  }

  function invokeFunc(time) {
    var args = lastArgs,
        thisArg = lastThis;

    lastArgs = lastThis = undefined;
    lastInvokeTime = time;
    result = func.apply(thisArg, args);
    return result;
  }

  function leadingEdge(time) {
    // Reset any `maxWait` timer.
    lastInvokeTime = time;
    // Start the timer for the trailing edge.
    timerId = setTimeout(timerExpired, wait);
    // Invoke the leading edge.
    return leading ? invokeFunc(time) : result;
  }

  function remainingWait(time) {
    var timeSinceLastCall = time - lastCallTime,
        timeSinceLastInvoke = time - lastInvokeTime,
        timeWaiting = wait - timeSinceLastCall;

    return maxing
      ? nativeMin(timeWaiting, maxWait - timeSinceLastInvoke)
      : timeWaiting;
  }

  function shouldInvoke(time) {
    var timeSinceLastCall = time - lastCallTime,
        timeSinceLastInvoke = time - lastInvokeTime;

    // Either this is the first call, activity has stopped and we're at the
    // trailing edge, the system time has gone backwards and we're treating
    // it as the trailing edge, or we've hit the `maxWait` limit.
    return (lastCallTime === undefined || (timeSinceLastCall >= wait) ||
      (timeSinceLastCall < 0) || (maxing && timeSinceLastInvoke >= maxWait));
  }

  function timerExpired() {
    var time = now();
    if (shouldInvoke(time)) {
      return trailingEdge(time);
    }
    // Restart the timer.
    timerId = setTimeout(timerExpired, remainingWait(time));
  }

  function trailingEdge(time) {
    timerId = undefined;

    // Only invoke if we have `lastArgs` which means `func` has been
    // debounced at least once.
    if (trailing && lastArgs) {
      return invokeFunc(time);
    }
    lastArgs = lastThis = undefined;
    return result;
  }

  function cancel() {
    if (timerId !== undefined) {
      clearTimeout(timerId);
    }
    lastInvokeTime = 0;
    lastArgs = lastCallTime = lastThis = timerId = undefined;
  }

  function flush() {
    return timerId === undefined ? result : trailingEdge(now());
  }

  function debounced() {
    var time = now(),
        isInvoking = shouldInvoke(time);

    lastArgs = arguments;
    lastThis = this;
    lastCallTime = time;

    if (isInvoking) {
      if (timerId === undefined) {
        return leadingEdge(lastCallTime);
      }
      if (maxing) {
        // Handle invocations in a tight loop.
        clearTimeout(timerId);
        timerId = setTimeout(timerExpired, wait);
        return invokeFunc(lastCallTime);
      }
    }
    if (timerId === undefined) {
      timerId = setTimeout(timerExpired, wait);
    }
    return result;
  }
  debounced.cancel = cancel;
  debounced.flush = flush;
  return debounced;
}

module.exports = debounce;


/***/ }),

/***/ "./node_modules/lodash/isObject.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/isObject.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Checks if `value` is the
 * [language type](http://www.ecma-international.org/ecma-262/7.0/#sec-ecmascript-language-types)
 * of `Object`. (e.g. arrays, functions, objects, regexes, `new Number(0)`, and `new String('')`)
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is an object, else `false`.
 * @example
 *
 * _.isObject({});
 * // => true
 *
 * _.isObject([1, 2, 3]);
 * // => true
 *
 * _.isObject(_.noop);
 * // => true
 *
 * _.isObject(null);
 * // => false
 */
function isObject(value) {
  var type = typeof value;
  return value != null && (type == 'object' || type == 'function');
}

module.exports = isObject;


/***/ }),

/***/ "./node_modules/lodash/isObjectLike.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/isObjectLike.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Checks if `value` is object-like. A value is object-like if it's not `null`
 * and has a `typeof` result of "object".
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is object-like, else `false`.
 * @example
 *
 * _.isObjectLike({});
 * // => true
 *
 * _.isObjectLike([1, 2, 3]);
 * // => true
 *
 * _.isObjectLike(_.noop);
 * // => false
 *
 * _.isObjectLike(null);
 * // => false
 */
function isObjectLike(value) {
  return value != null && typeof value == 'object';
}

module.exports = isObjectLike;


/***/ }),

/***/ "./node_modules/lodash/isSymbol.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/isSymbol.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseGetTag = __webpack_require__(/*! ./_baseGetTag */ "./node_modules/lodash/_baseGetTag.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

/** `Object#toString` result references. */
var symbolTag = '[object Symbol]';

/**
 * Checks if `value` is classified as a `Symbol` primitive or object.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a symbol, else `false`.
 * @example
 *
 * _.isSymbol(Symbol.iterator);
 * // => true
 *
 * _.isSymbol('abc');
 * // => false
 */
function isSymbol(value) {
  return typeof value == 'symbol' ||
    (isObjectLike(value) && baseGetTag(value) == symbolTag);
}

module.exports = isSymbol;


/***/ }),

/***/ "./node_modules/lodash/now.js":
/*!************************************!*\
  !*** ./node_modules/lodash/now.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js");

/**
 * Gets the timestamp of the number of milliseconds that have elapsed since
 * the Unix epoch (1 January 1970 00:00:00 UTC).
 *
 * @static
 * @memberOf _
 * @since 2.4.0
 * @category Date
 * @returns {number} Returns the timestamp.
 * @example
 *
 * _.defer(function(stamp) {
 *   console.log(_.now() - stamp);
 * }, _.now());
 * // => Logs the number of milliseconds it took for the deferred invocation.
 */
var now = function() {
  return root.Date.now();
};

module.exports = now;


/***/ }),

/***/ "./node_modules/lodash/toNumber.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/toNumber.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseTrim = __webpack_require__(/*! ./_baseTrim */ "./node_modules/lodash/_baseTrim.js"),
    isObject = __webpack_require__(/*! ./isObject */ "./node_modules/lodash/isObject.js"),
    isSymbol = __webpack_require__(/*! ./isSymbol */ "./node_modules/lodash/isSymbol.js");

/** Used as references for various `Number` constants. */
var NAN = 0 / 0;

/** Used to detect bad signed hexadecimal string values. */
var reIsBadHex = /^[-+]0x[0-9a-f]+$/i;

/** Used to detect binary string values. */
var reIsBinary = /^0b[01]+$/i;

/** Used to detect octal string values. */
var reIsOctal = /^0o[0-7]+$/i;

/** Built-in method references without a dependency on `root`. */
var freeParseInt = parseInt;

/**
 * Converts `value` to a number.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to process.
 * @returns {number} Returns the number.
 * @example
 *
 * _.toNumber(3.2);
 * // => 3.2
 *
 * _.toNumber(Number.MIN_VALUE);
 * // => 5e-324
 *
 * _.toNumber(Infinity);
 * // => Infinity
 *
 * _.toNumber('3.2');
 * // => 3.2
 */
function toNumber(value) {
  if (typeof value == 'number') {
    return value;
  }
  if (isSymbol(value)) {
    return NAN;
  }
  if (isObject(value)) {
    var other = typeof value.valueOf == 'function' ? value.valueOf() : value;
    value = isObject(other) ? (other + '') : other;
  }
  if (typeof value != 'string') {
    return value === 0 ? value : +value;
  }
  value = baseTrim(value);
  var isBinary = reIsBinary.test(value);
  return (isBinary || reIsOctal.test(value))
    ? freeParseInt(value.slice(2), isBinary ? 2 : 8)
    : (reIsBadHex.test(value) ? NAN : +value);
}

module.exports = toNumber;


/***/ }),

/***/ "./node_modules/memoize-one/dist/memoize-one.esm.js":
/*!**********************************************************!*\
  !*** ./node_modules/memoize-one/dist/memoize-one.esm.js ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var safeIsNaN = Number.isNaN ||
    function ponyfill(value) {
        return typeof value === 'number' && value !== value;
    };
function isEqual(first, second) {
    if (first === second) {
        return true;
    }
    if (safeIsNaN(first) && safeIsNaN(second)) {
        return true;
    }
    return false;
}
function areInputsEqual(newInputs, lastInputs) {
    if (newInputs.length !== lastInputs.length) {
        return false;
    }
    for (var i = 0; i < newInputs.length; i++) {
        if (!isEqual(newInputs[i], lastInputs[i])) {
            return false;
        }
    }
    return true;
}

function memoizeOne(resultFn, isEqual) {
    if (isEqual === void 0) { isEqual = areInputsEqual; }
    var lastThis;
    var lastArgs = [];
    var lastResult;
    var calledOnce = false;
    function memoized() {
        var newArgs = [];
        for (var _i = 0; _i < arguments.length; _i++) {
            newArgs[_i] = arguments[_i];
        }
        if (calledOnce && lastThis === this && isEqual(newArgs, lastArgs)) {
            return lastResult;
        }
        lastResult = resultFn.apply(this, newArgs);
        calledOnce = true;
        lastThis = this;
        lastArgs = newArgs;
        return lastResult;
    }
    return memoized;
}

/* harmony default export */ __webpack_exports__["default"] = (memoizeOne);


/***/ }),

/***/ "./node_modules/object-assign/index.js":
/*!*********************************************!*\
  !*** ./node_modules/object-assign/index.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/*
object-assign
(c) Sindre Sorhus
@license MIT
*/


/* eslint-disable no-unused-vars */
var getOwnPropertySymbols = Object.getOwnPropertySymbols;
var hasOwnProperty = Object.prototype.hasOwnProperty;
var propIsEnumerable = Object.prototype.propertyIsEnumerable;

function toObject(val) {
	if (val === null || val === undefined) {
		throw new TypeError('Object.assign cannot be called with null or undefined');
	}

	return Object(val);
}

function shouldUseNative() {
	try {
		if (!Object.assign) {
			return false;
		}

		// Detect buggy property enumeration order in older V8 versions.

		// https://bugs.chromium.org/p/v8/issues/detail?id=4118
		var test1 = new String('abc');  // eslint-disable-line no-new-wrappers
		test1[5] = 'de';
		if (Object.getOwnPropertyNames(test1)[0] === '5') {
			return false;
		}

		// https://bugs.chromium.org/p/v8/issues/detail?id=3056
		var test2 = {};
		for (var i = 0; i < 10; i++) {
			test2['_' + String.fromCharCode(i)] = i;
		}
		var order2 = Object.getOwnPropertyNames(test2).map(function (n) {
			return test2[n];
		});
		if (order2.join('') !== '0123456789') {
			return false;
		}

		// https://bugs.chromium.org/p/v8/issues/detail?id=3056
		var test3 = {};
		'abcdefghijklmnopqrst'.split('').forEach(function (letter) {
			test3[letter] = letter;
		});
		if (Object.keys(Object.assign({}, test3)).join('') !==
				'abcdefghijklmnopqrst') {
			return false;
		}

		return true;
	} catch (err) {
		// We don't expect any of the above to throw, but better to be safe.
		return false;
	}
}

module.exports = shouldUseNative() ? Object.assign : function (target, source) {
	var from;
	var to = toObject(target);
	var symbols;

	for (var s = 1; s < arguments.length; s++) {
		from = Object(arguments[s]);

		for (var key in from) {
			if (hasOwnProperty.call(from, key)) {
				to[key] = from[key];
			}
		}

		if (getOwnPropertySymbols) {
			symbols = getOwnPropertySymbols(from);
			for (var i = 0; i < symbols.length; i++) {
				if (propIsEnumerable.call(from, symbols[i])) {
					to[symbols[i]] = from[symbols[i]];
				}
			}
		}
	}

	return to;
};


/***/ }),

/***/ "./node_modules/prop-types/checkPropTypes.js":
/*!***************************************************!*\
  !*** ./node_modules/prop-types/checkPropTypes.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */



var printWarning = function() {};

if (true) {
  var ReactPropTypesSecret = __webpack_require__(/*! ./lib/ReactPropTypesSecret */ "./node_modules/prop-types/lib/ReactPropTypesSecret.js");
  var loggedTypeFailures = {};
  var has = Function.call.bind(Object.prototype.hasOwnProperty);

  printWarning = function(text) {
    var message = 'Warning: ' + text;
    if (typeof console !== 'undefined') {
      console.error(message);
    }
    try {
      // --- Welcome to debugging React ---
      // This error was thrown as a convenience so that you can use this stack
      // to find the callsite that caused this warning to fire.
      throw new Error(message);
    } catch (x) {}
  };
}

/**
 * Assert that the values match with the type specs.
 * Error messages are memorized and will only be shown once.
 *
 * @param {object} typeSpecs Map of name to a ReactPropType
 * @param {object} values Runtime values that need to be type-checked
 * @param {string} location e.g. "prop", "context", "child context"
 * @param {string} componentName Name of the component for error messages.
 * @param {?Function} getStack Returns the component stack.
 * @private
 */
function checkPropTypes(typeSpecs, values, location, componentName, getStack) {
  if (true) {
    for (var typeSpecName in typeSpecs) {
      if (has(typeSpecs, typeSpecName)) {
        var error;
        // Prop type validation may throw. In case they do, we don't want to
        // fail the render phase where it didn't fail before. So we log it.
        // After these have been cleaned up, we'll let them throw.
        try {
          // This is intentionally an invariant that gets caught. It's the same
          // behavior as without this statement except with a better message.
          if (typeof typeSpecs[typeSpecName] !== 'function') {
            var err = Error(
              (componentName || 'React class') + ': ' + location + ' type `' + typeSpecName + '` is invalid; ' +
              'it must be a function, usually from the `prop-types` package, but received `' + typeof typeSpecs[typeSpecName] + '`.'
            );
            err.name = 'Invariant Violation';
            throw err;
          }
          error = typeSpecs[typeSpecName](values, typeSpecName, componentName, location, null, ReactPropTypesSecret);
        } catch (ex) {
          error = ex;
        }
        if (error && !(error instanceof Error)) {
          printWarning(
            (componentName || 'React class') + ': type specification of ' +
            location + ' `' + typeSpecName + '` is invalid; the type checker ' +
            'function must return `null` or an `Error` but returned a ' + typeof error + '. ' +
            'You may have forgotten to pass an argument to the type checker ' +
            'creator (arrayOf, instanceOf, objectOf, oneOf, oneOfType, and ' +
            'shape all require an argument).'
          );
        }
        if (error instanceof Error && !(error.message in loggedTypeFailures)) {
          // Only monitor this failure once because there tends to be a lot of the
          // same error.
          loggedTypeFailures[error.message] = true;

          var stack = getStack ? getStack() : '';

          printWarning(
            'Failed ' + location + ' type: ' + error.message + (stack != null ? stack : '')
          );
        }
      }
    }
  }
}

/**
 * Resets warning cache when testing.
 *
 * @private
 */
checkPropTypes.resetWarningCache = function() {
  if (true) {
    loggedTypeFailures = {};
  }
}

module.exports = checkPropTypes;


/***/ }),

/***/ "./node_modules/prop-types/factoryWithTypeCheckers.js":
/*!************************************************************!*\
  !*** ./node_modules/prop-types/factoryWithTypeCheckers.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */



var ReactIs = __webpack_require__(/*! react-is */ "./node_modules/react-is/index.js");
var assign = __webpack_require__(/*! object-assign */ "./node_modules/object-assign/index.js");

var ReactPropTypesSecret = __webpack_require__(/*! ./lib/ReactPropTypesSecret */ "./node_modules/prop-types/lib/ReactPropTypesSecret.js");
var checkPropTypes = __webpack_require__(/*! ./checkPropTypes */ "./node_modules/prop-types/checkPropTypes.js");

var has = Function.call.bind(Object.prototype.hasOwnProperty);
var printWarning = function() {};

if (true) {
  printWarning = function(text) {
    var message = 'Warning: ' + text;
    if (typeof console !== 'undefined') {
      console.error(message);
    }
    try {
      // --- Welcome to debugging React ---
      // This error was thrown as a convenience so that you can use this stack
      // to find the callsite that caused this warning to fire.
      throw new Error(message);
    } catch (x) {}
  };
}

function emptyFunctionThatReturnsNull() {
  return null;
}

module.exports = function(isValidElement, throwOnDirectAccess) {
  /* global Symbol */
  var ITERATOR_SYMBOL = typeof Symbol === 'function' && Symbol.iterator;
  var FAUX_ITERATOR_SYMBOL = '@@iterator'; // Before Symbol spec.

  /**
   * Returns the iterator method function contained on the iterable object.
   *
   * Be sure to invoke the function with the iterable as context:
   *
   *     var iteratorFn = getIteratorFn(myIterable);
   *     if (iteratorFn) {
   *       var iterator = iteratorFn.call(myIterable);
   *       ...
   *     }
   *
   * @param {?object} maybeIterable
   * @return {?function}
   */
  function getIteratorFn(maybeIterable) {
    var iteratorFn = maybeIterable && (ITERATOR_SYMBOL && maybeIterable[ITERATOR_SYMBOL] || maybeIterable[FAUX_ITERATOR_SYMBOL]);
    if (typeof iteratorFn === 'function') {
      return iteratorFn;
    }
  }

  /**
   * Collection of methods that allow declaration and validation of props that are
   * supplied to React components. Example usage:
   *
   *   var Props = require('ReactPropTypes');
   *   var MyArticle = React.createClass({
   *     propTypes: {
   *       // An optional string prop named "description".
   *       description: Props.string,
   *
   *       // A required enum prop named "category".
   *       category: Props.oneOf(['News','Photos']).isRequired,
   *
   *       // A prop named "dialog" that requires an instance of Dialog.
   *       dialog: Props.instanceOf(Dialog).isRequired
   *     },
   *     render: function() { ... }
   *   });
   *
   * A more formal specification of how these methods are used:
   *
   *   type := array|bool|func|object|number|string|oneOf([...])|instanceOf(...)
   *   decl := ReactPropTypes.{type}(.isRequired)?
   *
   * Each and every declaration produces a function with the same signature. This
   * allows the creation of custom validation functions. For example:
   *
   *  var MyLink = React.createClass({
   *    propTypes: {
   *      // An optional string or URI prop named "href".
   *      href: function(props, propName, componentName) {
   *        var propValue = props[propName];
   *        if (propValue != null && typeof propValue !== 'string' &&
   *            !(propValue instanceof URI)) {
   *          return new Error(
   *            'Expected a string or an URI for ' + propName + ' in ' +
   *            componentName
   *          );
   *        }
   *      }
   *    },
   *    render: function() {...}
   *  });
   *
   * @internal
   */

  var ANONYMOUS = '<<anonymous>>';

  // Important!
  // Keep this list in sync with production version in `./factoryWithThrowingShims.js`.
  var ReactPropTypes = {
    array: createPrimitiveTypeChecker('array'),
    bool: createPrimitiveTypeChecker('boolean'),
    func: createPrimitiveTypeChecker('function'),
    number: createPrimitiveTypeChecker('number'),
    object: createPrimitiveTypeChecker('object'),
    string: createPrimitiveTypeChecker('string'),
    symbol: createPrimitiveTypeChecker('symbol'),

    any: createAnyTypeChecker(),
    arrayOf: createArrayOfTypeChecker,
    element: createElementTypeChecker(),
    elementType: createElementTypeTypeChecker(),
    instanceOf: createInstanceTypeChecker,
    node: createNodeChecker(),
    objectOf: createObjectOfTypeChecker,
    oneOf: createEnumTypeChecker,
    oneOfType: createUnionTypeChecker,
    shape: createShapeTypeChecker,
    exact: createStrictShapeTypeChecker,
  };

  /**
   * inlined Object.is polyfill to avoid requiring consumers ship their own
   * https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/is
   */
  /*eslint-disable no-self-compare*/
  function is(x, y) {
    // SameValue algorithm
    if (x === y) {
      // Steps 1-5, 7-10
      // Steps 6.b-6.e: +0 != -0
      return x !== 0 || 1 / x === 1 / y;
    } else {
      // Step 6.a: NaN == NaN
      return x !== x && y !== y;
    }
  }
  /*eslint-enable no-self-compare*/

  /**
   * We use an Error-like object for backward compatibility as people may call
   * PropTypes directly and inspect their output. However, we don't use real
   * Errors anymore. We don't inspect their stack anyway, and creating them
   * is prohibitively expensive if they are created too often, such as what
   * happens in oneOfType() for any type before the one that matched.
   */
  function PropTypeError(message) {
    this.message = message;
    this.stack = '';
  }
  // Make `instanceof Error` still work for returned errors.
  PropTypeError.prototype = Error.prototype;

  function createChainableTypeChecker(validate) {
    if (true) {
      var manualPropTypeCallCache = {};
      var manualPropTypeWarningCount = 0;
    }
    function checkType(isRequired, props, propName, componentName, location, propFullName, secret) {
      componentName = componentName || ANONYMOUS;
      propFullName = propFullName || propName;

      if (secret !== ReactPropTypesSecret) {
        if (throwOnDirectAccess) {
          // New behavior only for users of `prop-types` package
          var err = new Error(
            'Calling PropTypes validators directly is not supported by the `prop-types` package. ' +
            'Use `PropTypes.checkPropTypes()` to call them. ' +
            'Read more at http://fb.me/use-check-prop-types'
          );
          err.name = 'Invariant Violation';
          throw err;
        } else if ( true && typeof console !== 'undefined') {
          // Old behavior for people using React.PropTypes
          var cacheKey = componentName + ':' + propName;
          if (
            !manualPropTypeCallCache[cacheKey] &&
            // Avoid spamming the console because they are often not actionable except for lib authors
            manualPropTypeWarningCount < 3
          ) {
            printWarning(
              'You are manually calling a React.PropTypes validation ' +
              'function for the `' + propFullName + '` prop on `' + componentName  + '`. This is deprecated ' +
              'and will throw in the standalone `prop-types` package. ' +
              'You may be seeing this warning due to a third-party PropTypes ' +
              'library. See https://fb.me/react-warning-dont-call-proptypes ' + 'for details.'
            );
            manualPropTypeCallCache[cacheKey] = true;
            manualPropTypeWarningCount++;
          }
        }
      }
      if (props[propName] == null) {
        if (isRequired) {
          if (props[propName] === null) {
            return new PropTypeError('The ' + location + ' `' + propFullName + '` is marked as required ' + ('in `' + componentName + '`, but its value is `null`.'));
          }
          return new PropTypeError('The ' + location + ' `' + propFullName + '` is marked as required in ' + ('`' + componentName + '`, but its value is `undefined`.'));
        }
        return null;
      } else {
        return validate(props, propName, componentName, location, propFullName);
      }
    }

    var chainedCheckType = checkType.bind(null, false);
    chainedCheckType.isRequired = checkType.bind(null, true);

    return chainedCheckType;
  }

  function createPrimitiveTypeChecker(expectedType) {
    function validate(props, propName, componentName, location, propFullName, secret) {
      var propValue = props[propName];
      var propType = getPropType(propValue);
      if (propType !== expectedType) {
        // `propValue` being instance of, say, date/regexp, pass the 'object'
        // check, but we can offer a more precise error message here rather than
        // 'of type `object`'.
        var preciseType = getPreciseType(propValue);

        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + preciseType + '` supplied to `' + componentName + '`, expected ') + ('`' + expectedType + '`.'));
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createAnyTypeChecker() {
    return createChainableTypeChecker(emptyFunctionThatReturnsNull);
  }

  function createArrayOfTypeChecker(typeChecker) {
    function validate(props, propName, componentName, location, propFullName) {
      if (typeof typeChecker !== 'function') {
        return new PropTypeError('Property `' + propFullName + '` of component `' + componentName + '` has invalid PropType notation inside arrayOf.');
      }
      var propValue = props[propName];
      if (!Array.isArray(propValue)) {
        var propType = getPropType(propValue);
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + propType + '` supplied to `' + componentName + '`, expected an array.'));
      }
      for (var i = 0; i < propValue.length; i++) {
        var error = typeChecker(propValue, i, componentName, location, propFullName + '[' + i + ']', ReactPropTypesSecret);
        if (error instanceof Error) {
          return error;
        }
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createElementTypeChecker() {
    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      if (!isValidElement(propValue)) {
        var propType = getPropType(propValue);
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + propType + '` supplied to `' + componentName + '`, expected a single ReactElement.'));
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createElementTypeTypeChecker() {
    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      if (!ReactIs.isValidElementType(propValue)) {
        var propType = getPropType(propValue);
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + propType + '` supplied to `' + componentName + '`, expected a single ReactElement type.'));
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createInstanceTypeChecker(expectedClass) {
    function validate(props, propName, componentName, location, propFullName) {
      if (!(props[propName] instanceof expectedClass)) {
        var expectedClassName = expectedClass.name || ANONYMOUS;
        var actualClassName = getClassName(props[propName]);
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + actualClassName + '` supplied to `' + componentName + '`, expected ') + ('instance of `' + expectedClassName + '`.'));
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createEnumTypeChecker(expectedValues) {
    if (!Array.isArray(expectedValues)) {
      if (true) {
        if (arguments.length > 1) {
          printWarning(
            'Invalid arguments supplied to oneOf, expected an array, got ' + arguments.length + ' arguments. ' +
            'A common mistake is to write oneOf(x, y, z) instead of oneOf([x, y, z]).'
          );
        } else {
          printWarning('Invalid argument supplied to oneOf, expected an array.');
        }
      }
      return emptyFunctionThatReturnsNull;
    }

    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      for (var i = 0; i < expectedValues.length; i++) {
        if (is(propValue, expectedValues[i])) {
          return null;
        }
      }

      var valuesString = JSON.stringify(expectedValues, function replacer(key, value) {
        var type = getPreciseType(value);
        if (type === 'symbol') {
          return String(value);
        }
        return value;
      });
      return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of value `' + String(propValue) + '` ' + ('supplied to `' + componentName + '`, expected one of ' + valuesString + '.'));
    }
    return createChainableTypeChecker(validate);
  }

  function createObjectOfTypeChecker(typeChecker) {
    function validate(props, propName, componentName, location, propFullName) {
      if (typeof typeChecker !== 'function') {
        return new PropTypeError('Property `' + propFullName + '` of component `' + componentName + '` has invalid PropType notation inside objectOf.');
      }
      var propValue = props[propName];
      var propType = getPropType(propValue);
      if (propType !== 'object') {
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + propType + '` supplied to `' + componentName + '`, expected an object.'));
      }
      for (var key in propValue) {
        if (has(propValue, key)) {
          var error = typeChecker(propValue, key, componentName, location, propFullName + '.' + key, ReactPropTypesSecret);
          if (error instanceof Error) {
            return error;
          }
        }
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createUnionTypeChecker(arrayOfTypeCheckers) {
    if (!Array.isArray(arrayOfTypeCheckers)) {
       true ? printWarning('Invalid argument supplied to oneOfType, expected an instance of array.') : undefined;
      return emptyFunctionThatReturnsNull;
    }

    for (var i = 0; i < arrayOfTypeCheckers.length; i++) {
      var checker = arrayOfTypeCheckers[i];
      if (typeof checker !== 'function') {
        printWarning(
          'Invalid argument supplied to oneOfType. Expected an array of check functions, but ' +
          'received ' + getPostfixForTypeWarning(checker) + ' at index ' + i + '.'
        );
        return emptyFunctionThatReturnsNull;
      }
    }

    function validate(props, propName, componentName, location, propFullName) {
      for (var i = 0; i < arrayOfTypeCheckers.length; i++) {
        var checker = arrayOfTypeCheckers[i];
        if (checker(props, propName, componentName, location, propFullName, ReactPropTypesSecret) == null) {
          return null;
        }
      }

      return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` supplied to ' + ('`' + componentName + '`.'));
    }
    return createChainableTypeChecker(validate);
  }

  function createNodeChecker() {
    function validate(props, propName, componentName, location, propFullName) {
      if (!isNode(props[propName])) {
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` supplied to ' + ('`' + componentName + '`, expected a ReactNode.'));
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createShapeTypeChecker(shapeTypes) {
    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      var propType = getPropType(propValue);
      if (propType !== 'object') {
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type `' + propType + '` ' + ('supplied to `' + componentName + '`, expected `object`.'));
      }
      for (var key in shapeTypes) {
        var checker = shapeTypes[key];
        if (!checker) {
          continue;
        }
        var error = checker(propValue, key, componentName, location, propFullName + '.' + key, ReactPropTypesSecret);
        if (error) {
          return error;
        }
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createStrictShapeTypeChecker(shapeTypes) {
    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      var propType = getPropType(propValue);
      if (propType !== 'object') {
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type `' + propType + '` ' + ('supplied to `' + componentName + '`, expected `object`.'));
      }
      // We need to check all keys in case some are required but missing from
      // props.
      var allKeys = assign({}, props[propName], shapeTypes);
      for (var key in allKeys) {
        var checker = shapeTypes[key];
        if (!checker) {
          return new PropTypeError(
            'Invalid ' + location + ' `' + propFullName + '` key `' + key + '` supplied to `' + componentName + '`.' +
            '\nBad object: ' + JSON.stringify(props[propName], null, '  ') +
            '\nValid keys: ' +  JSON.stringify(Object.keys(shapeTypes), null, '  ')
          );
        }
        var error = checker(propValue, key, componentName, location, propFullName + '.' + key, ReactPropTypesSecret);
        if (error) {
          return error;
        }
      }
      return null;
    }

    return createChainableTypeChecker(validate);
  }

  function isNode(propValue) {
    switch (typeof propValue) {
      case 'number':
      case 'string':
      case 'undefined':
        return true;
      case 'boolean':
        return !propValue;
      case 'object':
        if (Array.isArray(propValue)) {
          return propValue.every(isNode);
        }
        if (propValue === null || isValidElement(propValue)) {
          return true;
        }

        var iteratorFn = getIteratorFn(propValue);
        if (iteratorFn) {
          var iterator = iteratorFn.call(propValue);
          var step;
          if (iteratorFn !== propValue.entries) {
            while (!(step = iterator.next()).done) {
              if (!isNode(step.value)) {
                return false;
              }
            }
          } else {
            // Iterator will provide entry [k,v] tuples rather than values.
            while (!(step = iterator.next()).done) {
              var entry = step.value;
              if (entry) {
                if (!isNode(entry[1])) {
                  return false;
                }
              }
            }
          }
        } else {
          return false;
        }

        return true;
      default:
        return false;
    }
  }

  function isSymbol(propType, propValue) {
    // Native Symbol.
    if (propType === 'symbol') {
      return true;
    }

    // falsy value can't be a Symbol
    if (!propValue) {
      return false;
    }

    // 19.4.3.5 Symbol.prototype[@@toStringTag] === 'Symbol'
    if (propValue['@@toStringTag'] === 'Symbol') {
      return true;
    }

    // Fallback for non-spec compliant Symbols which are polyfilled.
    if (typeof Symbol === 'function' && propValue instanceof Symbol) {
      return true;
    }

    return false;
  }

  // Equivalent of `typeof` but with special handling for array and regexp.
  function getPropType(propValue) {
    var propType = typeof propValue;
    if (Array.isArray(propValue)) {
      return 'array';
    }
    if (propValue instanceof RegExp) {
      // Old webkits (at least until Android 4.0) return 'function' rather than
      // 'object' for typeof a RegExp. We'll normalize this here so that /bla/
      // passes PropTypes.object.
      return 'object';
    }
    if (isSymbol(propType, propValue)) {
      return 'symbol';
    }
    return propType;
  }

  // This handles more types than `getPropType`. Only used for error messages.
  // See `createPrimitiveTypeChecker`.
  function getPreciseType(propValue) {
    if (typeof propValue === 'undefined' || propValue === null) {
      return '' + propValue;
    }
    var propType = getPropType(propValue);
    if (propType === 'object') {
      if (propValue instanceof Date) {
        return 'date';
      } else if (propValue instanceof RegExp) {
        return 'regexp';
      }
    }
    return propType;
  }

  // Returns a string that is postfixed to a warning about an invalid type.
  // For example, "undefined" or "of type array"
  function getPostfixForTypeWarning(value) {
    var type = getPreciseType(value);
    switch (type) {
      case 'array':
      case 'object':
        return 'an ' + type;
      case 'boolean':
      case 'date':
      case 'regexp':
        return 'a ' + type;
      default:
        return type;
    }
  }

  // Returns class name of the object, if any.
  function getClassName(propValue) {
    if (!propValue.constructor || !propValue.constructor.name) {
      return ANONYMOUS;
    }
    return propValue.constructor.name;
  }

  ReactPropTypes.checkPropTypes = checkPropTypes;
  ReactPropTypes.resetWarningCache = checkPropTypes.resetWarningCache;
  ReactPropTypes.PropTypes = ReactPropTypes;

  return ReactPropTypes;
};


/***/ }),

/***/ "./node_modules/prop-types/index.js":
/*!******************************************!*\
  !*** ./node_modules/prop-types/index.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */

if (true) {
  var ReactIs = __webpack_require__(/*! react-is */ "./node_modules/react-is/index.js");

  // By explicitly using `prop-types` you are opting into new development behavior.
  // http://fb.me/prop-types-in-prod
  var throwOnDirectAccess = true;
  module.exports = __webpack_require__(/*! ./factoryWithTypeCheckers */ "./node_modules/prop-types/factoryWithTypeCheckers.js")(ReactIs.isElement, throwOnDirectAccess);
} else {}


/***/ }),

/***/ "./node_modules/prop-types/lib/ReactPropTypesSecret.js":
/*!*************************************************************!*\
  !*** ./node_modules/prop-types/lib/ReactPropTypesSecret.js ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */



var ReactPropTypesSecret = 'SECRET_DO_NOT_PASS_THIS_OR_YOU_WILL_BE_FIRED';

module.exports = ReactPropTypesSecret;


/***/ }),

/***/ "./node_modules/react-input-autosize/lib/AutosizeInput.js":
/*!****************************************************************!*\
  !*** ./node_modules/react-input-autosize/lib/AutosizeInput.js ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
	value: true
});

var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _react = __webpack_require__(/*! react */ "react");

var _react2 = _interopRequireDefault(_react);

var _propTypes = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");

var _propTypes2 = _interopRequireDefault(_propTypes);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _objectWithoutProperties(obj, keys) { var target = {}; for (var i in obj) { if (keys.indexOf(i) >= 0) continue; if (!Object.prototype.hasOwnProperty.call(obj, i)) continue; target[i] = obj[i]; } return target; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var sizerStyle = {
	position: 'absolute',
	top: 0,
	left: 0,
	visibility: 'hidden',
	height: 0,
	overflow: 'scroll',
	whiteSpace: 'pre'
};

var INPUT_PROPS_BLACKLIST = ['extraWidth', 'injectStyles', 'inputClassName', 'inputRef', 'inputStyle', 'minWidth', 'onAutosize', 'placeholderIsMinWidth'];

var cleanInputProps = function cleanInputProps(inputProps) {
	INPUT_PROPS_BLACKLIST.forEach(function (field) {
		return delete inputProps[field];
	});
	return inputProps;
};

var copyStyles = function copyStyles(styles, node) {
	node.style.fontSize = styles.fontSize;
	node.style.fontFamily = styles.fontFamily;
	node.style.fontWeight = styles.fontWeight;
	node.style.fontStyle = styles.fontStyle;
	node.style.letterSpacing = styles.letterSpacing;
	node.style.textTransform = styles.textTransform;
};

var isIE = typeof window !== 'undefined' && window.navigator ? /MSIE |Trident\/|Edge\//.test(window.navigator.userAgent) : false;

var generateId = function generateId() {
	// we only need an auto-generated ID for stylesheet injection, which is only
	// used for IE. so if the browser is not IE, this should return undefined.
	return isIE ? '_' + Math.random().toString(36).substr(2, 12) : undefined;
};

var AutosizeInput = function (_Component) {
	_inherits(AutosizeInput, _Component);

	_createClass(AutosizeInput, null, [{
		key: 'getDerivedStateFromProps',
		value: function getDerivedStateFromProps(props, state) {
			var id = props.id;

			return id !== state.prevId ? { inputId: id || generateId(), prevId: id } : null;
		}
	}]);

	function AutosizeInput(props) {
		_classCallCheck(this, AutosizeInput);

		var _this = _possibleConstructorReturn(this, (AutosizeInput.__proto__ || Object.getPrototypeOf(AutosizeInput)).call(this, props));

		_this.inputRef = function (el) {
			_this.input = el;
			if (typeof _this.props.inputRef === 'function') {
				_this.props.inputRef(el);
			}
		};

		_this.placeHolderSizerRef = function (el) {
			_this.placeHolderSizer = el;
		};

		_this.sizerRef = function (el) {
			_this.sizer = el;
		};

		_this.state = {
			inputWidth: props.minWidth,
			inputId: props.id || generateId(),
			prevId: props.id
		};
		return _this;
	}

	_createClass(AutosizeInput, [{
		key: 'componentDidMount',
		value: function componentDidMount() {
			this.mounted = true;
			this.copyInputStyles();
			this.updateInputWidth();
		}
	}, {
		key: 'componentDidUpdate',
		value: function componentDidUpdate(prevProps, prevState) {
			if (prevState.inputWidth !== this.state.inputWidth) {
				if (typeof this.props.onAutosize === 'function') {
					this.props.onAutosize(this.state.inputWidth);
				}
			}
			this.updateInputWidth();
		}
	}, {
		key: 'componentWillUnmount',
		value: function componentWillUnmount() {
			this.mounted = false;
		}
	}, {
		key: 'copyInputStyles',
		value: function copyInputStyles() {
			if (!this.mounted || !window.getComputedStyle) {
				return;
			}
			var inputStyles = this.input && window.getComputedStyle(this.input);
			if (!inputStyles) {
				return;
			}
			copyStyles(inputStyles, this.sizer);
			if (this.placeHolderSizer) {
				copyStyles(inputStyles, this.placeHolderSizer);
			}
		}
	}, {
		key: 'updateInputWidth',
		value: function updateInputWidth() {
			if (!this.mounted || !this.sizer || typeof this.sizer.scrollWidth === 'undefined') {
				return;
			}
			var newInputWidth = void 0;
			if (this.props.placeholder && (!this.props.value || this.props.value && this.props.placeholderIsMinWidth)) {
				newInputWidth = Math.max(this.sizer.scrollWidth, this.placeHolderSizer.scrollWidth) + 2;
			} else {
				newInputWidth = this.sizer.scrollWidth + 2;
			}
			// add extraWidth to the detected width. for number types, this defaults to 16 to allow for the stepper UI
			var extraWidth = this.props.type === 'number' && this.props.extraWidth === undefined ? 16 : parseInt(this.props.extraWidth) || 0;
			newInputWidth += extraWidth;
			if (newInputWidth < this.props.minWidth) {
				newInputWidth = this.props.minWidth;
			}
			if (newInputWidth !== this.state.inputWidth) {
				this.setState({
					inputWidth: newInputWidth
				});
			}
		}
	}, {
		key: 'getInput',
		value: function getInput() {
			return this.input;
		}
	}, {
		key: 'focus',
		value: function focus() {
			this.input.focus();
		}
	}, {
		key: 'blur',
		value: function blur() {
			this.input.blur();
		}
	}, {
		key: 'select',
		value: function select() {
			this.input.select();
		}
	}, {
		key: 'renderStyles',
		value: function renderStyles() {
			// this method injects styles to hide IE's clear indicator, which messes
			// with input size detection. the stylesheet is only injected when the
			// browser is IE, and can also be disabled by the `injectStyles` prop.
			var injectStyles = this.props.injectStyles;

			return isIE && injectStyles ? _react2.default.createElement('style', { dangerouslySetInnerHTML: {
					__html: 'input#' + this.state.inputId + '::-ms-clear {display: none;}'
				} }) : null;
		}
	}, {
		key: 'render',
		value: function render() {
			var sizerValue = [this.props.defaultValue, this.props.value, ''].reduce(function (previousValue, currentValue) {
				if (previousValue !== null && previousValue !== undefined) {
					return previousValue;
				}
				return currentValue;
			});

			var wrapperStyle = _extends({}, this.props.style);
			if (!wrapperStyle.display) wrapperStyle.display = 'inline-block';

			var inputStyle = _extends({
				boxSizing: 'content-box',
				width: this.state.inputWidth + 'px'
			}, this.props.inputStyle);

			var inputProps = _objectWithoutProperties(this.props, []);

			cleanInputProps(inputProps);
			inputProps.className = this.props.inputClassName;
			inputProps.id = this.state.inputId;
			inputProps.style = inputStyle;

			return _react2.default.createElement(
				'div',
				{ className: this.props.className, style: wrapperStyle },
				this.renderStyles(),
				_react2.default.createElement('input', _extends({}, inputProps, { ref: this.inputRef })),
				_react2.default.createElement(
					'div',
					{ ref: this.sizerRef, style: sizerStyle },
					sizerValue
				),
				this.props.placeholder ? _react2.default.createElement(
					'div',
					{ ref: this.placeHolderSizerRef, style: sizerStyle },
					this.props.placeholder
				) : null
			);
		}
	}]);

	return AutosizeInput;
}(_react.Component);

AutosizeInput.propTypes = {
	className: _propTypes2.default.string, // className for the outer element
	defaultValue: _propTypes2.default.any, // default field value
	extraWidth: _propTypes2.default.oneOfType([// additional width for input element
	_propTypes2.default.number, _propTypes2.default.string]),
	id: _propTypes2.default.string, // id to use for the input, can be set for consistent snapshots
	injectStyles: _propTypes2.default.bool, // inject the custom stylesheet to hide clear UI, defaults to true
	inputClassName: _propTypes2.default.string, // className for the input element
	inputRef: _propTypes2.default.func, // ref callback for the input element
	inputStyle: _propTypes2.default.object, // css styles for the input element
	minWidth: _propTypes2.default.oneOfType([// minimum width for input element
	_propTypes2.default.number, _propTypes2.default.string]),
	onAutosize: _propTypes2.default.func, // onAutosize handler: function(newWidth) {}
	onChange: _propTypes2.default.func, // onChange handler: function(event) {}
	placeholder: _propTypes2.default.string, // placeholder text
	placeholderIsMinWidth: _propTypes2.default.bool, // don't collapse size to less than the placeholder
	style: _propTypes2.default.object, // css styles for the outer element
	value: _propTypes2.default.any // field value
};
AutosizeInput.defaultProps = {
	minWidth: 1,
	injectStyles: true
};

exports.default = AutosizeInput;

/***/ }),

/***/ "./node_modules/react-is/cjs/react-is.development.js":
/*!***********************************************************!*\
  !*** ./node_modules/react-is/cjs/react-is.development.js ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/** @license React v16.13.1
 * react-is.development.js
 *
 * Copyright (c) Facebook, Inc. and its affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */





if (true) {
  (function() {
'use strict';

// The Symbol used to tag the ReactElement-like types. If there is no native Symbol
// nor polyfill, then a plain number is used for performance.
var hasSymbol = typeof Symbol === 'function' && Symbol.for;
var REACT_ELEMENT_TYPE = hasSymbol ? Symbol.for('react.element') : 0xeac7;
var REACT_PORTAL_TYPE = hasSymbol ? Symbol.for('react.portal') : 0xeaca;
var REACT_FRAGMENT_TYPE = hasSymbol ? Symbol.for('react.fragment') : 0xeacb;
var REACT_STRICT_MODE_TYPE = hasSymbol ? Symbol.for('react.strict_mode') : 0xeacc;
var REACT_PROFILER_TYPE = hasSymbol ? Symbol.for('react.profiler') : 0xead2;
var REACT_PROVIDER_TYPE = hasSymbol ? Symbol.for('react.provider') : 0xeacd;
var REACT_CONTEXT_TYPE = hasSymbol ? Symbol.for('react.context') : 0xeace; // TODO: We don't use AsyncMode or ConcurrentMode anymore. They were temporary
// (unstable) APIs that have been removed. Can we remove the symbols?

var REACT_ASYNC_MODE_TYPE = hasSymbol ? Symbol.for('react.async_mode') : 0xeacf;
var REACT_CONCURRENT_MODE_TYPE = hasSymbol ? Symbol.for('react.concurrent_mode') : 0xeacf;
var REACT_FORWARD_REF_TYPE = hasSymbol ? Symbol.for('react.forward_ref') : 0xead0;
var REACT_SUSPENSE_TYPE = hasSymbol ? Symbol.for('react.suspense') : 0xead1;
var REACT_SUSPENSE_LIST_TYPE = hasSymbol ? Symbol.for('react.suspense_list') : 0xead8;
var REACT_MEMO_TYPE = hasSymbol ? Symbol.for('react.memo') : 0xead3;
var REACT_LAZY_TYPE = hasSymbol ? Symbol.for('react.lazy') : 0xead4;
var REACT_BLOCK_TYPE = hasSymbol ? Symbol.for('react.block') : 0xead9;
var REACT_FUNDAMENTAL_TYPE = hasSymbol ? Symbol.for('react.fundamental') : 0xead5;
var REACT_RESPONDER_TYPE = hasSymbol ? Symbol.for('react.responder') : 0xead6;
var REACT_SCOPE_TYPE = hasSymbol ? Symbol.for('react.scope') : 0xead7;

function isValidElementType(type) {
  return typeof type === 'string' || typeof type === 'function' || // Note: its typeof might be other than 'symbol' or 'number' if it's a polyfill.
  type === REACT_FRAGMENT_TYPE || type === REACT_CONCURRENT_MODE_TYPE || type === REACT_PROFILER_TYPE || type === REACT_STRICT_MODE_TYPE || type === REACT_SUSPENSE_TYPE || type === REACT_SUSPENSE_LIST_TYPE || typeof type === 'object' && type !== null && (type.$$typeof === REACT_LAZY_TYPE || type.$$typeof === REACT_MEMO_TYPE || type.$$typeof === REACT_PROVIDER_TYPE || type.$$typeof === REACT_CONTEXT_TYPE || type.$$typeof === REACT_FORWARD_REF_TYPE || type.$$typeof === REACT_FUNDAMENTAL_TYPE || type.$$typeof === REACT_RESPONDER_TYPE || type.$$typeof === REACT_SCOPE_TYPE || type.$$typeof === REACT_BLOCK_TYPE);
}

function typeOf(object) {
  if (typeof object === 'object' && object !== null) {
    var $$typeof = object.$$typeof;

    switch ($$typeof) {
      case REACT_ELEMENT_TYPE:
        var type = object.type;

        switch (type) {
          case REACT_ASYNC_MODE_TYPE:
          case REACT_CONCURRENT_MODE_TYPE:
          case REACT_FRAGMENT_TYPE:
          case REACT_PROFILER_TYPE:
          case REACT_STRICT_MODE_TYPE:
          case REACT_SUSPENSE_TYPE:
            return type;

          default:
            var $$typeofType = type && type.$$typeof;

            switch ($$typeofType) {
              case REACT_CONTEXT_TYPE:
              case REACT_FORWARD_REF_TYPE:
              case REACT_LAZY_TYPE:
              case REACT_MEMO_TYPE:
              case REACT_PROVIDER_TYPE:
                return $$typeofType;

              default:
                return $$typeof;
            }

        }

      case REACT_PORTAL_TYPE:
        return $$typeof;
    }
  }

  return undefined;
} // AsyncMode is deprecated along with isAsyncMode

var AsyncMode = REACT_ASYNC_MODE_TYPE;
var ConcurrentMode = REACT_CONCURRENT_MODE_TYPE;
var ContextConsumer = REACT_CONTEXT_TYPE;
var ContextProvider = REACT_PROVIDER_TYPE;
var Element = REACT_ELEMENT_TYPE;
var ForwardRef = REACT_FORWARD_REF_TYPE;
var Fragment = REACT_FRAGMENT_TYPE;
var Lazy = REACT_LAZY_TYPE;
var Memo = REACT_MEMO_TYPE;
var Portal = REACT_PORTAL_TYPE;
var Profiler = REACT_PROFILER_TYPE;
var StrictMode = REACT_STRICT_MODE_TYPE;
var Suspense = REACT_SUSPENSE_TYPE;
var hasWarnedAboutDeprecatedIsAsyncMode = false; // AsyncMode should be deprecated

function isAsyncMode(object) {
  {
    if (!hasWarnedAboutDeprecatedIsAsyncMode) {
      hasWarnedAboutDeprecatedIsAsyncMode = true; // Using console['warn'] to evade Babel and ESLint

      console['warn']('The ReactIs.isAsyncMode() alias has been deprecated, ' + 'and will be removed in React 17+. Update your code to use ' + 'ReactIs.isConcurrentMode() instead. It has the exact same API.');
    }
  }

  return isConcurrentMode(object) || typeOf(object) === REACT_ASYNC_MODE_TYPE;
}
function isConcurrentMode(object) {
  return typeOf(object) === REACT_CONCURRENT_MODE_TYPE;
}
function isContextConsumer(object) {
  return typeOf(object) === REACT_CONTEXT_TYPE;
}
function isContextProvider(object) {
  return typeOf(object) === REACT_PROVIDER_TYPE;
}
function isElement(object) {
  return typeof object === 'object' && object !== null && object.$$typeof === REACT_ELEMENT_TYPE;
}
function isForwardRef(object) {
  return typeOf(object) === REACT_FORWARD_REF_TYPE;
}
function isFragment(object) {
  return typeOf(object) === REACT_FRAGMENT_TYPE;
}
function isLazy(object) {
  return typeOf(object) === REACT_LAZY_TYPE;
}
function isMemo(object) {
  return typeOf(object) === REACT_MEMO_TYPE;
}
function isPortal(object) {
  return typeOf(object) === REACT_PORTAL_TYPE;
}
function isProfiler(object) {
  return typeOf(object) === REACT_PROFILER_TYPE;
}
function isStrictMode(object) {
  return typeOf(object) === REACT_STRICT_MODE_TYPE;
}
function isSuspense(object) {
  return typeOf(object) === REACT_SUSPENSE_TYPE;
}

exports.AsyncMode = AsyncMode;
exports.ConcurrentMode = ConcurrentMode;
exports.ContextConsumer = ContextConsumer;
exports.ContextProvider = ContextProvider;
exports.Element = Element;
exports.ForwardRef = ForwardRef;
exports.Fragment = Fragment;
exports.Lazy = Lazy;
exports.Memo = Memo;
exports.Portal = Portal;
exports.Profiler = Profiler;
exports.StrictMode = StrictMode;
exports.Suspense = Suspense;
exports.isAsyncMode = isAsyncMode;
exports.isConcurrentMode = isConcurrentMode;
exports.isContextConsumer = isContextConsumer;
exports.isContextProvider = isContextProvider;
exports.isElement = isElement;
exports.isForwardRef = isForwardRef;
exports.isFragment = isFragment;
exports.isLazy = isLazy;
exports.isMemo = isMemo;
exports.isPortal = isPortal;
exports.isProfiler = isProfiler;
exports.isStrictMode = isStrictMode;
exports.isSuspense = isSuspense;
exports.isValidElementType = isValidElementType;
exports.typeOf = typeOf;
  })();
}


/***/ }),

/***/ "./node_modules/react-is/index.js":
/*!****************************************!*\
  !*** ./node_modules/react-is/index.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


if (false) {} else {
  module.exports = __webpack_require__(/*! ./cjs/react-is.development.js */ "./node_modules/react-is/cjs/react-is.development.js");
}


/***/ }),

/***/ "./node_modules/react-select/dist/Select-dbb12e54.esm.js":
/*!***************************************************************!*\
  !*** ./node_modules/react-select/dist/Select-dbb12e54.esm.js ***!
  \***************************************************************/
/*! exports provided: S, a, b, c, d, g, m */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "S", function() { return Select; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return getOptionLabel; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return defaultProps; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "c", function() { return createFilter; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "d", function() { return defaultTheme; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "g", function() { return getOptionValue; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "m", function() { return mergeStyles; });
/* harmony import */ var _babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/extends */ "./node_modules/@babel/runtime/helpers/esm/extends.js");
/* harmony import */ var _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index-4bd03571.esm.js */ "./node_modules/react-select/dist/index-4bd03571.esm.js");
/* harmony import */ var _babel_runtime_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/esm/classCallCheck */ "./node_modules/@babel/runtime/helpers/esm/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/esm/createClass */ "./node_modules/@babel/runtime/helpers/esm/createClass.js");
/* harmony import */ var _babel_runtime_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/esm/inherits */ "./node_modules/@babel/runtime/helpers/esm/inherits.js");
/* harmony import */ var _babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @babel/runtime/helpers/esm/toConsumableArray */ "./node_modules/@babel/runtime/helpers/esm/toConsumableArray.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _emotion_react__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @emotion/react */ "./node_modules/@emotion/react/dist/emotion-react.browser.esm.js");
/* harmony import */ var memoize_one__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! memoize-one */ "./node_modules/memoize-one/dist/memoize-one.esm.js");
/* harmony import */ var _babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! @babel/runtime/helpers/esm/objectWithoutProperties */ "./node_modules/@babel/runtime/helpers/esm/objectWithoutProperties.js");











function _EMOTION_STRINGIFIED_CSS_ERROR__() { return "You have tried to stringify object returned from `css` function. It isn't supposed to be used directly (e.g. as value of the `className` prop), but rather handed to emotion so it can handle it (e.g. as value of `css` prop)."; }

var _ref =  false ? undefined : {
  name: "1f43avz-a11yText-A11yText",
  styles: "label:a11yText;z-index:9999;border:0;clip:rect(1px, 1px, 1px, 1px);height:1px;width:1px;position:absolute;overflow:hidden;padding:0;white-space:nowrap;label:A11yText;",
  map: "/*# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIkExMXlUZXh0LmpzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQVFJIiwiZmlsZSI6IkExMXlUZXh0LmpzIiwic291cmNlc0NvbnRlbnQiOlsiLy8gQGZsb3dcbi8qKiBAanN4IGpzeCAqL1xuaW1wb3J0IHsgdHlwZSBFbGVtZW50Q29uZmlnIH0gZnJvbSAncmVhY3QnO1xuaW1wb3J0IHsganN4IH0gZnJvbSAnQGVtb3Rpb24vcmVhY3QnO1xuXG4vLyBBc3Npc3RpdmUgdGV4dCB0byBkZXNjcmliZSB2aXN1YWwgZWxlbWVudHMuIEhpZGRlbiBmb3Igc2lnaHRlZCB1c2Vycy5cbmNvbnN0IEExMXlUZXh0ID0gKHByb3BzOiBFbGVtZW50Q29uZmlnPCdzcGFuJz4pID0+IChcbiAgPHNwYW5cbiAgICBjc3M9e3tcbiAgICAgIGxhYmVsOiAnYTExeVRleHQnLFxuICAgICAgekluZGV4OiA5OTk5LFxuICAgICAgYm9yZGVyOiAwLFxuICAgICAgY2xpcDogJ3JlY3QoMXB4LCAxcHgsIDFweCwgMXB4KScsXG4gICAgICBoZWlnaHQ6IDEsXG4gICAgICB3aWR0aDogMSxcbiAgICAgIHBvc2l0aW9uOiAnYWJzb2x1dGUnLFxuICAgICAgb3ZlcmZsb3c6ICdoaWRkZW4nLFxuICAgICAgcGFkZGluZzogMCxcbiAgICAgIHdoaXRlU3BhY2U6ICdub3dyYXAnLFxuICAgIH19XG4gICAgey4uLnByb3BzfVxuICAvPlxuKTtcblxuZXhwb3J0IGRlZmF1bHQgQTExeVRleHQ7XG4iXX0= */",
  toString: _EMOTION_STRINGIFIED_CSS_ERROR__
};

var A11yText = function A11yText(props) {
  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_7__["jsx"])("span", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    css: _ref
  }, props));
};

var defaultAriaLiveMessages = {
  guidance: function guidance(props) {
    var isSearchable = props.isSearchable,
        isMulti = props.isMulti,
        isDisabled = props.isDisabled,
        tabSelectsValue = props.tabSelectsValue,
        context = props.context;

    switch (context) {
      case 'menu':
        return "Use Up and Down to choose options".concat(isDisabled ? '' : ', press Enter to select the currently focused option', ", press Escape to exit the menu").concat(tabSelectsValue ? ', press Tab to select the option and exit the menu' : '', ".");

      case 'input':
        return "".concat(props['aria-label'] || 'Select', " is focused ").concat(isSearchable ? ',type to refine list' : '', ", press Down to open the menu, ").concat(isMulti ? ' press left to focus selected values' : '');

      case 'value':
        return 'Use left and right to toggle between focused values, press Backspace to remove the currently focused value';

      default:
        return '';
    }
  },
  onChange: function onChange(props) {
    var action = props.action,
        _props$label = props.label,
        label = _props$label === void 0 ? '' : _props$label,
        isDisabled = props.isDisabled;

    switch (action) {
      case 'deselect-option':
      case 'pop-value':
      case 'remove-value':
        return "option ".concat(label, ", deselected.");

      case 'select-option':
        return isDisabled ? "option ".concat(label, " is disabled. Select another option.") : "option ".concat(label, ", selected.");

      default:
        return '';
    }
  },
  onFocus: function onFocus(props) {
    var context = props.context,
        _props$focused = props.focused,
        focused = _props$focused === void 0 ? {} : _props$focused,
        options = props.options,
        _props$label2 = props.label,
        label = _props$label2 === void 0 ? '' : _props$label2,
        selectValue = props.selectValue,
        isDisabled = props.isDisabled,
        isSelected = props.isSelected;

    var getArrayIndex = function getArrayIndex(arr, item) {
      return arr && arr.length ? "".concat(arr.indexOf(item) + 1, " of ").concat(arr.length) : '';
    };

    if (context === 'value' && selectValue) {
      return "value ".concat(label, " focused, ").concat(getArrayIndex(selectValue, focused), ".");
    }

    if (context === 'menu') {
      var disabled = isDisabled ? ' disabled' : '';
      var status = "".concat(isSelected ? 'selected' : 'focused').concat(disabled);
      return "option ".concat(label, " ").concat(status, ", ").concat(getArrayIndex(options, focused), ".");
    }

    return '';
  },
  onFilter: function onFilter(props) {
    var inputValue = props.inputValue,
        resultsMessage = props.resultsMessage;
    return "".concat(resultsMessage).concat(inputValue ? ' for search term ' + inputValue : '', ".");
  }
};

var LiveRegion = function LiveRegion(props) {
  var ariaSelection = props.ariaSelection,
      focusedOption = props.focusedOption,
      focusedValue = props.focusedValue,
      focusableOptions = props.focusableOptions,
      isFocused = props.isFocused,
      selectValue = props.selectValue,
      selectProps = props.selectProps;
  var ariaLiveMessages = selectProps.ariaLiveMessages,
      getOptionLabel = selectProps.getOptionLabel,
      inputValue = selectProps.inputValue,
      isMulti = selectProps.isMulti,
      isOptionDisabled = selectProps.isOptionDisabled,
      isSearchable = selectProps.isSearchable,
      menuIsOpen = selectProps.menuIsOpen,
      options = selectProps.options,
      screenReaderStatus = selectProps.screenReaderStatus,
      tabSelectsValue = selectProps.tabSelectsValue;
  var ariaLabel = selectProps['aria-label'];
  var ariaLive = selectProps['aria-live']; // Update aria live message configuration when prop changes

  var messages = Object(react__WEBPACK_IMPORTED_MODULE_6__["useMemo"])(function () {
    return Object(_index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["a"])(Object(_index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["a"])({}, defaultAriaLiveMessages), ariaLiveMessages || {});
  }, [ariaLiveMessages]); // Update aria live selected option when prop changes

  var ariaSelected = Object(react__WEBPACK_IMPORTED_MODULE_6__["useMemo"])(function () {
    var message = '';

    if (ariaSelection && messages.onChange) {
      var option = ariaSelection.option,
          removedValue = ariaSelection.removedValue,
          value = ariaSelection.value; // select-option when !isMulti does not return option so we assume selected option is value

      var asOption = function asOption(val) {
        return !Array.isArray(val) ? val : null;
      };

      var selected = removedValue || option || asOption(value);

      var onChangeProps = Object(_index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["a"])({
        isDisabled: selected && isOptionDisabled(selected),
        label: selected ? getOptionLabel(selected) : ''
      }, ariaSelection);

      message = messages.onChange(onChangeProps);
    }

    return message;
  }, [ariaSelection, isOptionDisabled, getOptionLabel, messages]);
  var ariaFocused = Object(react__WEBPACK_IMPORTED_MODULE_6__["useMemo"])(function () {
    var focusMsg = '';
    var focused = focusedOption || focusedValue;
    var isSelected = !!(focusedOption && selectValue && selectValue.includes(focusedOption));

    if (focused && messages.onFocus) {
      var onFocusProps = {
        focused: focused,
        label: getOptionLabel(focused),
        isDisabled: isOptionDisabled(focused),
        isSelected: isSelected,
        options: options,
        context: focused === focusedOption ? 'menu' : 'value',
        selectValue: selectValue
      };
      focusMsg = messages.onFocus(onFocusProps);
    }

    return focusMsg;
  }, [focusedOption, focusedValue, getOptionLabel, isOptionDisabled, messages, options, selectValue]);
  var ariaResults = Object(react__WEBPACK_IMPORTED_MODULE_6__["useMemo"])(function () {
    var resultsMsg = '';

    if (menuIsOpen && options.length && messages.onFilter) {
      var resultsMessage = screenReaderStatus({
        count: focusableOptions.length
      });
      resultsMsg = messages.onFilter({
        inputValue: inputValue,
        resultsMessage: resultsMessage
      });
    }

    return resultsMsg;
  }, [focusableOptions, inputValue, menuIsOpen, messages, options, screenReaderStatus]);
  var ariaGuidance = Object(react__WEBPACK_IMPORTED_MODULE_6__["useMemo"])(function () {
    var guidanceMsg = '';

    if (messages.guidance) {
      var context = focusedValue ? 'value' : menuIsOpen ? 'menu' : 'input';
      guidanceMsg = messages.guidance({
        'aria-label': ariaLabel,
        context: context,
        isDisabled: focusedOption && isOptionDisabled(focusedOption),
        isMulti: isMulti,
        isSearchable: isSearchable,
        tabSelectsValue: tabSelectsValue
      });
    }

    return guidanceMsg;
  }, [ariaLabel, focusedOption, focusedValue, isMulti, isOptionDisabled, isSearchable, menuIsOpen, messages, tabSelectsValue]);
  var ariaContext = "".concat(ariaFocused, " ").concat(ariaResults, " ").concat(ariaGuidance);
  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_7__["jsx"])(A11yText, {
    "aria-live": ariaLive,
    "aria-atomic": "false",
    "aria-relevant": "additions text"
  }, isFocused && Object(_emotion_react__WEBPACK_IMPORTED_MODULE_7__["jsx"])(react__WEBPACK_IMPORTED_MODULE_6___default.a.Fragment, null, Object(_emotion_react__WEBPACK_IMPORTED_MODULE_7__["jsx"])("span", {
    id: "aria-selection"
  }, ariaSelected), Object(_emotion_react__WEBPACK_IMPORTED_MODULE_7__["jsx"])("span", {
    id: "aria-context"
  }, ariaContext)));
};

var diacritics = [{
  base: 'A',
  letters: "A\u24B6\uFF21\xC0\xC1\xC2\u1EA6\u1EA4\u1EAA\u1EA8\xC3\u0100\u0102\u1EB0\u1EAE\u1EB4\u1EB2\u0226\u01E0\xC4\u01DE\u1EA2\xC5\u01FA\u01CD\u0200\u0202\u1EA0\u1EAC\u1EB6\u1E00\u0104\u023A\u2C6F"
}, {
  base: 'AA',
  letters: "\uA732"
}, {
  base: 'AE',
  letters: "\xC6\u01FC\u01E2"
}, {
  base: 'AO',
  letters: "\uA734"
}, {
  base: 'AU',
  letters: "\uA736"
}, {
  base: 'AV',
  letters: "\uA738\uA73A"
}, {
  base: 'AY',
  letters: "\uA73C"
}, {
  base: 'B',
  letters: "B\u24B7\uFF22\u1E02\u1E04\u1E06\u0243\u0182\u0181"
}, {
  base: 'C',
  letters: "C\u24B8\uFF23\u0106\u0108\u010A\u010C\xC7\u1E08\u0187\u023B\uA73E"
}, {
  base: 'D',
  letters: "D\u24B9\uFF24\u1E0A\u010E\u1E0C\u1E10\u1E12\u1E0E\u0110\u018B\u018A\u0189\uA779"
}, {
  base: 'DZ',
  letters: "\u01F1\u01C4"
}, {
  base: 'Dz',
  letters: "\u01F2\u01C5"
}, {
  base: 'E',
  letters: "E\u24BA\uFF25\xC8\xC9\xCA\u1EC0\u1EBE\u1EC4\u1EC2\u1EBC\u0112\u1E14\u1E16\u0114\u0116\xCB\u1EBA\u011A\u0204\u0206\u1EB8\u1EC6\u0228\u1E1C\u0118\u1E18\u1E1A\u0190\u018E"
}, {
  base: 'F',
  letters: "F\u24BB\uFF26\u1E1E\u0191\uA77B"
}, {
  base: 'G',
  letters: "G\u24BC\uFF27\u01F4\u011C\u1E20\u011E\u0120\u01E6\u0122\u01E4\u0193\uA7A0\uA77D\uA77E"
}, {
  base: 'H',
  letters: "H\u24BD\uFF28\u0124\u1E22\u1E26\u021E\u1E24\u1E28\u1E2A\u0126\u2C67\u2C75\uA78D"
}, {
  base: 'I',
  letters: "I\u24BE\uFF29\xCC\xCD\xCE\u0128\u012A\u012C\u0130\xCF\u1E2E\u1EC8\u01CF\u0208\u020A\u1ECA\u012E\u1E2C\u0197"
}, {
  base: 'J',
  letters: "J\u24BF\uFF2A\u0134\u0248"
}, {
  base: 'K',
  letters: "K\u24C0\uFF2B\u1E30\u01E8\u1E32\u0136\u1E34\u0198\u2C69\uA740\uA742\uA744\uA7A2"
}, {
  base: 'L',
  letters: "L\u24C1\uFF2C\u013F\u0139\u013D\u1E36\u1E38\u013B\u1E3C\u1E3A\u0141\u023D\u2C62\u2C60\uA748\uA746\uA780"
}, {
  base: 'LJ',
  letters: "\u01C7"
}, {
  base: 'Lj',
  letters: "\u01C8"
}, {
  base: 'M',
  letters: "M\u24C2\uFF2D\u1E3E\u1E40\u1E42\u2C6E\u019C"
}, {
  base: 'N',
  letters: "N\u24C3\uFF2E\u01F8\u0143\xD1\u1E44\u0147\u1E46\u0145\u1E4A\u1E48\u0220\u019D\uA790\uA7A4"
}, {
  base: 'NJ',
  letters: "\u01CA"
}, {
  base: 'Nj',
  letters: "\u01CB"
}, {
  base: 'O',
  letters: "O\u24C4\uFF2F\xD2\xD3\xD4\u1ED2\u1ED0\u1ED6\u1ED4\xD5\u1E4C\u022C\u1E4E\u014C\u1E50\u1E52\u014E\u022E\u0230\xD6\u022A\u1ECE\u0150\u01D1\u020C\u020E\u01A0\u1EDC\u1EDA\u1EE0\u1EDE\u1EE2\u1ECC\u1ED8\u01EA\u01EC\xD8\u01FE\u0186\u019F\uA74A\uA74C"
}, {
  base: 'OI',
  letters: "\u01A2"
}, {
  base: 'OO',
  letters: "\uA74E"
}, {
  base: 'OU',
  letters: "\u0222"
}, {
  base: 'P',
  letters: "P\u24C5\uFF30\u1E54\u1E56\u01A4\u2C63\uA750\uA752\uA754"
}, {
  base: 'Q',
  letters: "Q\u24C6\uFF31\uA756\uA758\u024A"
}, {
  base: 'R',
  letters: "R\u24C7\uFF32\u0154\u1E58\u0158\u0210\u0212\u1E5A\u1E5C\u0156\u1E5E\u024C\u2C64\uA75A\uA7A6\uA782"
}, {
  base: 'S',
  letters: "S\u24C8\uFF33\u1E9E\u015A\u1E64\u015C\u1E60\u0160\u1E66\u1E62\u1E68\u0218\u015E\u2C7E\uA7A8\uA784"
}, {
  base: 'T',
  letters: "T\u24C9\uFF34\u1E6A\u0164\u1E6C\u021A\u0162\u1E70\u1E6E\u0166\u01AC\u01AE\u023E\uA786"
}, {
  base: 'TZ',
  letters: "\uA728"
}, {
  base: 'U',
  letters: "U\u24CA\uFF35\xD9\xDA\xDB\u0168\u1E78\u016A\u1E7A\u016C\xDC\u01DB\u01D7\u01D5\u01D9\u1EE6\u016E\u0170\u01D3\u0214\u0216\u01AF\u1EEA\u1EE8\u1EEE\u1EEC\u1EF0\u1EE4\u1E72\u0172\u1E76\u1E74\u0244"
}, {
  base: 'V',
  letters: "V\u24CB\uFF36\u1E7C\u1E7E\u01B2\uA75E\u0245"
}, {
  base: 'VY',
  letters: "\uA760"
}, {
  base: 'W',
  letters: "W\u24CC\uFF37\u1E80\u1E82\u0174\u1E86\u1E84\u1E88\u2C72"
}, {
  base: 'X',
  letters: "X\u24CD\uFF38\u1E8A\u1E8C"
}, {
  base: 'Y',
  letters: "Y\u24CE\uFF39\u1EF2\xDD\u0176\u1EF8\u0232\u1E8E\u0178\u1EF6\u1EF4\u01B3\u024E\u1EFE"
}, {
  base: 'Z',
  letters: "Z\u24CF\uFF3A\u0179\u1E90\u017B\u017D\u1E92\u1E94\u01B5\u0224\u2C7F\u2C6B\uA762"
}, {
  base: 'a',
  letters: "a\u24D0\uFF41\u1E9A\xE0\xE1\xE2\u1EA7\u1EA5\u1EAB\u1EA9\xE3\u0101\u0103\u1EB1\u1EAF\u1EB5\u1EB3\u0227\u01E1\xE4\u01DF\u1EA3\xE5\u01FB\u01CE\u0201\u0203\u1EA1\u1EAD\u1EB7\u1E01\u0105\u2C65\u0250"
}, {
  base: 'aa',
  letters: "\uA733"
}, {
  base: 'ae',
  letters: "\xE6\u01FD\u01E3"
}, {
  base: 'ao',
  letters: "\uA735"
}, {
  base: 'au',
  letters: "\uA737"
}, {
  base: 'av',
  letters: "\uA739\uA73B"
}, {
  base: 'ay',
  letters: "\uA73D"
}, {
  base: 'b',
  letters: "b\u24D1\uFF42\u1E03\u1E05\u1E07\u0180\u0183\u0253"
}, {
  base: 'c',
  letters: "c\u24D2\uFF43\u0107\u0109\u010B\u010D\xE7\u1E09\u0188\u023C\uA73F\u2184"
}, {
  base: 'd',
  letters: "d\u24D3\uFF44\u1E0B\u010F\u1E0D\u1E11\u1E13\u1E0F\u0111\u018C\u0256\u0257\uA77A"
}, {
  base: 'dz',
  letters: "\u01F3\u01C6"
}, {
  base: 'e',
  letters: "e\u24D4\uFF45\xE8\xE9\xEA\u1EC1\u1EBF\u1EC5\u1EC3\u1EBD\u0113\u1E15\u1E17\u0115\u0117\xEB\u1EBB\u011B\u0205\u0207\u1EB9\u1EC7\u0229\u1E1D\u0119\u1E19\u1E1B\u0247\u025B\u01DD"
}, {
  base: 'f',
  letters: "f\u24D5\uFF46\u1E1F\u0192\uA77C"
}, {
  base: 'g',
  letters: "g\u24D6\uFF47\u01F5\u011D\u1E21\u011F\u0121\u01E7\u0123\u01E5\u0260\uA7A1\u1D79\uA77F"
}, {
  base: 'h',
  letters: "h\u24D7\uFF48\u0125\u1E23\u1E27\u021F\u1E25\u1E29\u1E2B\u1E96\u0127\u2C68\u2C76\u0265"
}, {
  base: 'hv',
  letters: "\u0195"
}, {
  base: 'i',
  letters: "i\u24D8\uFF49\xEC\xED\xEE\u0129\u012B\u012D\xEF\u1E2F\u1EC9\u01D0\u0209\u020B\u1ECB\u012F\u1E2D\u0268\u0131"
}, {
  base: 'j',
  letters: "j\u24D9\uFF4A\u0135\u01F0\u0249"
}, {
  base: 'k',
  letters: "k\u24DA\uFF4B\u1E31\u01E9\u1E33\u0137\u1E35\u0199\u2C6A\uA741\uA743\uA745\uA7A3"
}, {
  base: 'l',
  letters: "l\u24DB\uFF4C\u0140\u013A\u013E\u1E37\u1E39\u013C\u1E3D\u1E3B\u017F\u0142\u019A\u026B\u2C61\uA749\uA781\uA747"
}, {
  base: 'lj',
  letters: "\u01C9"
}, {
  base: 'm',
  letters: "m\u24DC\uFF4D\u1E3F\u1E41\u1E43\u0271\u026F"
}, {
  base: 'n',
  letters: "n\u24DD\uFF4E\u01F9\u0144\xF1\u1E45\u0148\u1E47\u0146\u1E4B\u1E49\u019E\u0272\u0149\uA791\uA7A5"
}, {
  base: 'nj',
  letters: "\u01CC"
}, {
  base: 'o',
  letters: "o\u24DE\uFF4F\xF2\xF3\xF4\u1ED3\u1ED1\u1ED7\u1ED5\xF5\u1E4D\u022D\u1E4F\u014D\u1E51\u1E53\u014F\u022F\u0231\xF6\u022B\u1ECF\u0151\u01D2\u020D\u020F\u01A1\u1EDD\u1EDB\u1EE1\u1EDF\u1EE3\u1ECD\u1ED9\u01EB\u01ED\xF8\u01FF\u0254\uA74B\uA74D\u0275"
}, {
  base: 'oi',
  letters: "\u01A3"
}, {
  base: 'ou',
  letters: "\u0223"
}, {
  base: 'oo',
  letters: "\uA74F"
}, {
  base: 'p',
  letters: "p\u24DF\uFF50\u1E55\u1E57\u01A5\u1D7D\uA751\uA753\uA755"
}, {
  base: 'q',
  letters: "q\u24E0\uFF51\u024B\uA757\uA759"
}, {
  base: 'r',
  letters: "r\u24E1\uFF52\u0155\u1E59\u0159\u0211\u0213\u1E5B\u1E5D\u0157\u1E5F\u024D\u027D\uA75B\uA7A7\uA783"
}, {
  base: 's',
  letters: "s\u24E2\uFF53\xDF\u015B\u1E65\u015D\u1E61\u0161\u1E67\u1E63\u1E69\u0219\u015F\u023F\uA7A9\uA785\u1E9B"
}, {
  base: 't',
  letters: "t\u24E3\uFF54\u1E6B\u1E97\u0165\u1E6D\u021B\u0163\u1E71\u1E6F\u0167\u01AD\u0288\u2C66\uA787"
}, {
  base: 'tz',
  letters: "\uA729"
}, {
  base: 'u',
  letters: "u\u24E4\uFF55\xF9\xFA\xFB\u0169\u1E79\u016B\u1E7B\u016D\xFC\u01DC\u01D8\u01D6\u01DA\u1EE7\u016F\u0171\u01D4\u0215\u0217\u01B0\u1EEB\u1EE9\u1EEF\u1EED\u1EF1\u1EE5\u1E73\u0173\u1E77\u1E75\u0289"
}, {
  base: 'v',
  letters: "v\u24E5\uFF56\u1E7D\u1E7F\u028B\uA75F\u028C"
}, {
  base: 'vy',
  letters: "\uA761"
}, {
  base: 'w',
  letters: "w\u24E6\uFF57\u1E81\u1E83\u0175\u1E87\u1E85\u1E98\u1E89\u2C73"
}, {
  base: 'x',
  letters: "x\u24E7\uFF58\u1E8B\u1E8D"
}, {
  base: 'y',
  letters: "y\u24E8\uFF59\u1EF3\xFD\u0177\u1EF9\u0233\u1E8F\xFF\u1EF7\u1E99\u1EF5\u01B4\u024F\u1EFF"
}, {
  base: 'z',
  letters: "z\u24E9\uFF5A\u017A\u1E91\u017C\u017E\u1E93\u1E95\u01B6\u0225\u0240\u2C6C\uA763"
}];
var anyDiacritic = new RegExp('[' + diacritics.map(function (d) {
  return d.letters;
}).join('') + ']', 'g');
var diacriticToBase = {};

for (var i = 0; i < diacritics.length; i++) {
  var diacritic = diacritics[i];

  for (var j = 0; j < diacritic.letters.length; j++) {
    diacriticToBase[diacritic.letters[j]] = diacritic.base;
  }
}

var stripDiacritics = function stripDiacritics(str) {
  return str.replace(anyDiacritic, function (match) {
    return diacriticToBase[match];
  });
};

var memoizedStripDiacriticsForInput = Object(memoize_one__WEBPACK_IMPORTED_MODULE_8__["default"])(stripDiacritics);

var trimString = function trimString(str) {
  return str.replace(/^\s+|\s+$/g, '');
};

var defaultStringify = function defaultStringify(option) {
  return "".concat(option.label, " ").concat(option.value);
};

var createFilter = function createFilter(config) {
  return function (option, rawInput) {
    var _ignoreCase$ignoreAcc = Object(_index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["a"])({
      ignoreCase: true,
      ignoreAccents: true,
      stringify: defaultStringify,
      trim: true,
      matchFrom: 'any'
    }, config),
        ignoreCase = _ignoreCase$ignoreAcc.ignoreCase,
        ignoreAccents = _ignoreCase$ignoreAcc.ignoreAccents,
        stringify = _ignoreCase$ignoreAcc.stringify,
        trim = _ignoreCase$ignoreAcc.trim,
        matchFrom = _ignoreCase$ignoreAcc.matchFrom;

    var input = trim ? trimString(rawInput) : rawInput;
    var candidate = trim ? trimString(stringify(option)) : stringify(option);

    if (ignoreCase) {
      input = input.toLowerCase();
      candidate = candidate.toLowerCase();
    }

    if (ignoreAccents) {
      input = memoizedStripDiacriticsForInput(input);
      candidate = stripDiacritics(candidate);
    }

    return matchFrom === 'start' ? candidate.substr(0, input.length) === input : candidate.indexOf(input) > -1;
  };
};

function DummyInput(_ref) {
  _ref.in;
      _ref.out;
      _ref.onExited;
      _ref.appear;
      _ref.enter;
      _ref.exit;
      var innerRef = _ref.innerRef;
      _ref.emotion;
      var props = Object(_babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_9__["default"])(_ref, ["in", "out", "onExited", "appear", "enter", "exit", "innerRef", "emotion"]);

  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_7__["jsx"])("input", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    ref: innerRef
  }, props, {
    css: /*#__PURE__*/Object(_emotion_react__WEBPACK_IMPORTED_MODULE_7__["css"])({
      label: 'dummyInput',
      // get rid of any default styles
      background: 0,
      border: 0,
      fontSize: 'inherit',
      outline: 0,
      padding: 0,
      // important! without `width` browsers won't allow focus
      width: 1,
      // remove cursor on desktop
      color: 'transparent',
      // remove cursor on mobile whilst maintaining "scroll into view" behaviour
      left: -100,
      opacity: 0,
      position: 'relative',
      transform: 'scale(0)'
    },  false ? undefined : ";label:DummyInput;",  false ? undefined : "/*# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIkR1bW15SW5wdXQuanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBbUJNIiwiZmlsZSI6IkR1bW15SW5wdXQuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvLyBAZmxvd1xuLyoqIEBqc3gganN4ICovXG5pbXBvcnQgeyBqc3ggfSBmcm9tICdAZW1vdGlvbi9yZWFjdCc7XG5cbmV4cG9ydCBkZWZhdWx0IGZ1bmN0aW9uIER1bW15SW5wdXQoe1xuICBpbjogaW5Qcm9wLFxuICBvdXQsXG4gIG9uRXhpdGVkLFxuICBhcHBlYXIsXG4gIGVudGVyLFxuICBleGl0LFxuICBpbm5lclJlZixcbiAgZW1vdGlvbixcbiAgLi4ucHJvcHNcbn06IGFueSkge1xuICByZXR1cm4gKFxuICAgIDxpbnB1dFxuICAgICAgcmVmPXtpbm5lclJlZn1cbiAgICAgIHsuLi5wcm9wc31cbiAgICAgIGNzcz17e1xuICAgICAgICBsYWJlbDogJ2R1bW15SW5wdXQnLFxuICAgICAgICAvLyBnZXQgcmlkIG9mIGFueSBkZWZhdWx0IHN0eWxlc1xuICAgICAgICBiYWNrZ3JvdW5kOiAwLFxuICAgICAgICBib3JkZXI6IDAsXG4gICAgICAgIGZvbnRTaXplOiAnaW5oZXJpdCcsXG4gICAgICAgIG91dGxpbmU6IDAsXG4gICAgICAgIHBhZGRpbmc6IDAsXG4gICAgICAgIC8vIGltcG9ydGFudCEgd2l0aG91dCBgd2lkdGhgIGJyb3dzZXJzIHdvbid0IGFsbG93IGZvY3VzXG4gICAgICAgIHdpZHRoOiAxLFxuXG4gICAgICAgIC8vIHJlbW92ZSBjdXJzb3Igb24gZGVza3RvcFxuICAgICAgICBjb2xvcjogJ3RyYW5zcGFyZW50JyxcblxuICAgICAgICAvLyByZW1vdmUgY3Vyc29yIG9uIG1vYmlsZSB3aGlsc3QgbWFpbnRhaW5pbmcgXCJzY3JvbGwgaW50byB2aWV3XCIgYmVoYXZpb3VyXG4gICAgICAgIGxlZnQ6IC0xMDAsXG4gICAgICAgIG9wYWNpdHk6IDAsXG4gICAgICAgIHBvc2l0aW9uOiAncmVsYXRpdmUnLFxuICAgICAgICB0cmFuc2Zvcm06ICdzY2FsZSgwKScsXG4gICAgICB9fVxuICAgIC8+XG4gICk7XG59XG4iXX0= */")
  }));
}

var cancelScroll = function cancelScroll(event) {
  event.preventDefault();
  event.stopPropagation();
};

function useScrollCapture(_ref) {
  var isEnabled = _ref.isEnabled,
      onBottomArrive = _ref.onBottomArrive,
      onBottomLeave = _ref.onBottomLeave,
      onTopArrive = _ref.onTopArrive,
      onTopLeave = _ref.onTopLeave;
  var isBottom = Object(react__WEBPACK_IMPORTED_MODULE_6__["useRef"])(false);
  var isTop = Object(react__WEBPACK_IMPORTED_MODULE_6__["useRef"])(false);
  var touchStart = Object(react__WEBPACK_IMPORTED_MODULE_6__["useRef"])(0);
  var scrollTarget = Object(react__WEBPACK_IMPORTED_MODULE_6__["useRef"])(null);
  var handleEventDelta = Object(react__WEBPACK_IMPORTED_MODULE_6__["useCallback"])(function (event, delta) {
    // Reference should never be `null` at this point, but flow complains otherwise
    if (scrollTarget.current === null) return;
    var _scrollTarget$current = scrollTarget.current,
        scrollTop = _scrollTarget$current.scrollTop,
        scrollHeight = _scrollTarget$current.scrollHeight,
        clientHeight = _scrollTarget$current.clientHeight;
    var target = scrollTarget.current;
    var isDeltaPositive = delta > 0;
    var availableScroll = scrollHeight - clientHeight - scrollTop;
    var shouldCancelScroll = false; // reset bottom/top flags

    if (availableScroll > delta && isBottom.current) {
      if (onBottomLeave) onBottomLeave(event);
      isBottom.current = false;
    }

    if (isDeltaPositive && isTop.current) {
      if (onTopLeave) onTopLeave(event);
      isTop.current = false;
    } // bottom limit


    if (isDeltaPositive && delta > availableScroll) {
      if (onBottomArrive && !isBottom.current) {
        onBottomArrive(event);
      }

      target.scrollTop = scrollHeight;
      shouldCancelScroll = true;
      isBottom.current = true; // top limit
    } else if (!isDeltaPositive && -delta > scrollTop) {
      if (onTopArrive && !isTop.current) {
        onTopArrive(event);
      }

      target.scrollTop = 0;
      shouldCancelScroll = true;
      isTop.current = true;
    } // cancel scroll


    if (shouldCancelScroll) {
      cancelScroll(event);
    }
  }, []);
  var onWheel = Object(react__WEBPACK_IMPORTED_MODULE_6__["useCallback"])(function (event) {
    handleEventDelta(event, event.deltaY);
  }, [handleEventDelta]);
  var onTouchStart = Object(react__WEBPACK_IMPORTED_MODULE_6__["useCallback"])(function (event) {
    // set touch start so we can calculate touchmove delta
    touchStart.current = event.changedTouches[0].clientY;
  }, []);
  var onTouchMove = Object(react__WEBPACK_IMPORTED_MODULE_6__["useCallback"])(function (event) {
    var deltaY = touchStart.current - event.changedTouches[0].clientY;
    handleEventDelta(event, deltaY);
  }, [handleEventDelta]);
  var startListening = Object(react__WEBPACK_IMPORTED_MODULE_6__["useCallback"])(function (el) {
    // bail early if no element is available to attach to
    if (!el) return;
    var notPassive = _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["s"] ? {
      passive: false
    } : false; // all the if statements are to appease Flow 😢

    if (typeof el.addEventListener === 'function') {
      el.addEventListener('wheel', onWheel, notPassive);
    }

    if (typeof el.addEventListener === 'function') {
      el.addEventListener('touchstart', onTouchStart, notPassive);
    }

    if (typeof el.addEventListener === 'function') {
      el.addEventListener('touchmove', onTouchMove, notPassive);
    }
  }, [onTouchMove, onTouchStart, onWheel]);
  var stopListening = Object(react__WEBPACK_IMPORTED_MODULE_6__["useCallback"])(function (el) {
    // bail early if no element is available to detach from
    if (!el) return; // all the if statements are to appease Flow 😢

    if (typeof el.removeEventListener === 'function') {
      el.removeEventListener('wheel', onWheel, false);
    }

    if (typeof el.removeEventListener === 'function') {
      el.removeEventListener('touchstart', onTouchStart, false);
    }

    if (typeof el.removeEventListener === 'function') {
      el.removeEventListener('touchmove', onTouchMove, false);
    }
  }, [onTouchMove, onTouchStart, onWheel]);
  Object(react__WEBPACK_IMPORTED_MODULE_6__["useEffect"])(function () {
    if (!isEnabled) return;
    var element = scrollTarget.current;
    startListening(element);
    return function () {
      stopListening(element);
    };
  }, [isEnabled, startListening, stopListening]);
  return function (element) {
    scrollTarget.current = element;
  };
}

var STYLE_KEYS = ['boxSizing', 'height', 'overflow', 'paddingRight', 'position'];
var LOCK_STYLES = {
  boxSizing: 'border-box',
  // account for possible declaration `width: 100%;` on body
  overflow: 'hidden',
  position: 'relative',
  height: '100%'
};

function preventTouchMove(e) {
  e.preventDefault();
}

function allowTouchMove(e) {
  e.stopPropagation();
}

function preventInertiaScroll() {
  var top = this.scrollTop;
  var totalScroll = this.scrollHeight;
  var currentScroll = top + this.offsetHeight;

  if (top === 0) {
    this.scrollTop = 1;
  } else if (currentScroll === totalScroll) {
    this.scrollTop = top - 1;
  }
} // `ontouchstart` check works on most browsers
// `maxTouchPoints` works on IE10/11 and Surface


function isTouchDevice() {
  return 'ontouchstart' in window || navigator.maxTouchPoints;
}

var canUseDOM = !!(typeof window !== 'undefined' && window.document && window.document.createElement);
var activeScrollLocks = 0;
var listenerOptions = {
  capture: false,
  passive: false
};
function useScrollLock(_ref) {
  var isEnabled = _ref.isEnabled,
      _ref$accountForScroll = _ref.accountForScrollbars,
      accountForScrollbars = _ref$accountForScroll === void 0 ? true : _ref$accountForScroll;
  var originalStyles = Object(react__WEBPACK_IMPORTED_MODULE_6__["useRef"])({});
  var scrollTarget = Object(react__WEBPACK_IMPORTED_MODULE_6__["useRef"])(null);
  var addScrollLock = Object(react__WEBPACK_IMPORTED_MODULE_6__["useCallback"])(function (touchScrollTarget) {
    if (!canUseDOM) return;
    var target = document.body;
    var targetStyle = target && target.style;

    if (accountForScrollbars) {
      // store any styles already applied to the body
      STYLE_KEYS.forEach(function (key) {
        var val = targetStyle && targetStyle[key];
        originalStyles.current[key] = val;
      });
    } // apply the lock styles and padding if this is the first scroll lock


    if (accountForScrollbars && activeScrollLocks < 1) {
      var currentPadding = parseInt(originalStyles.current.paddingRight, 10) || 0;
      var clientWidth = document.body ? document.body.clientWidth : 0;
      var adjustedPadding = window.innerWidth - clientWidth + currentPadding || 0;
      Object.keys(LOCK_STYLES).forEach(function (key) {
        var val = LOCK_STYLES[key];

        if (targetStyle) {
          targetStyle[key] = val;
        }
      });

      if (targetStyle) {
        targetStyle.paddingRight = "".concat(adjustedPadding, "px");
      }
    } // account for touch devices


    if (target && isTouchDevice()) {
      // Mobile Safari ignores { overflow: hidden } declaration on the body.
      target.addEventListener('touchmove', preventTouchMove, listenerOptions); // Allow scroll on provided target

      if (touchScrollTarget) {
        touchScrollTarget.addEventListener('touchstart', preventInertiaScroll, listenerOptions);
        touchScrollTarget.addEventListener('touchmove', allowTouchMove, listenerOptions);
      }
    } // increment active scroll locks


    activeScrollLocks += 1;
  }, []);
  var removeScrollLock = Object(react__WEBPACK_IMPORTED_MODULE_6__["useCallback"])(function (touchScrollTarget) {
    if (!canUseDOM) return;
    var target = document.body;
    var targetStyle = target && target.style; // safely decrement active scroll locks

    activeScrollLocks = Math.max(activeScrollLocks - 1, 0); // reapply original body styles, if any

    if (accountForScrollbars && activeScrollLocks < 1) {
      STYLE_KEYS.forEach(function (key) {
        var val = originalStyles.current[key];

        if (targetStyle) {
          targetStyle[key] = val;
        }
      });
    } // remove touch listeners


    if (target && isTouchDevice()) {
      target.removeEventListener('touchmove', preventTouchMove, listenerOptions);

      if (touchScrollTarget) {
        touchScrollTarget.removeEventListener('touchstart', preventInertiaScroll, listenerOptions);
        touchScrollTarget.removeEventListener('touchmove', allowTouchMove, listenerOptions);
      }
    }
  }, []);
  Object(react__WEBPACK_IMPORTED_MODULE_6__["useEffect"])(function () {
    if (!isEnabled) return;
    var element = scrollTarget.current;
    addScrollLock(element);
    return function () {
      removeScrollLock(element);
    };
  }, [isEnabled, addScrollLock, removeScrollLock]);
  return function (element) {
    scrollTarget.current = element;
  };
}

function _EMOTION_STRINGIFIED_CSS_ERROR__$1() { return "You have tried to stringify object returned from `css` function. It isn't supposed to be used directly (e.g. as value of the `className` prop), but rather handed to emotion so it can handle it (e.g. as value of `css` prop)."; }

var blurSelectInput = function blurSelectInput() {
  return document.activeElement && document.activeElement.blur();
};

var _ref2 =  false ? undefined : {
  name: "bp8cua-ScrollManager",
  styles: "position:fixed;left:0;bottom:0;right:0;top:0;label:ScrollManager;",
  map: "/*# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIlNjcm9sbE1hbmFnZXIuanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBa0RVIiwiZmlsZSI6IlNjcm9sbE1hbmFnZXIuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvLyBAZmxvd1xuLyoqIEBqc3gganN4ICovXG5pbXBvcnQgeyBqc3ggfSBmcm9tICdAZW1vdGlvbi9yZWFjdCc7XG5pbXBvcnQgUmVhY3QsIHsgdHlwZSBFbGVtZW50IH0gZnJvbSAncmVhY3QnO1xuaW1wb3J0IHVzZVNjcm9sbENhcHR1cmUgZnJvbSAnLi91c2VTY3JvbGxDYXB0dXJlJztcbmltcG9ydCB1c2VTY3JvbGxMb2NrIGZyb20gJy4vdXNlU2Nyb2xsTG9jayc7XG5cbnR5cGUgUmVmQ2FsbGJhY2s8VD4gPSAoVCB8IG51bGwpID0+IHZvaWQ7XG5cbnR5cGUgUHJvcHMgPSB7XG4gIGNoaWxkcmVuOiAoUmVmQ2FsbGJhY2s8SFRNTEVsZW1lbnQ+KSA9PiBFbGVtZW50PCo+LFxuICBsb2NrRW5hYmxlZDogYm9vbGVhbixcbiAgY2FwdHVyZUVuYWJsZWQ6IGJvb2xlYW4sXG4gIG9uQm90dG9tQXJyaXZlPzogKGV2ZW50OiBTeW50aGV0aWNFdmVudDxIVE1MRWxlbWVudD4pID0+IHZvaWQsXG4gIG9uQm90dG9tTGVhdmU/OiAoZXZlbnQ6IFN5bnRoZXRpY0V2ZW50PEhUTUxFbGVtZW50PikgPT4gdm9pZCxcbiAgb25Ub3BBcnJpdmU/OiAoZXZlbnQ6IFN5bnRoZXRpY0V2ZW50PEhUTUxFbGVtZW50PikgPT4gdm9pZCxcbiAgb25Ub3BMZWF2ZT86IChldmVudDogU3ludGhldGljRXZlbnQ8SFRNTEVsZW1lbnQ+KSA9PiB2b2lkLFxufTtcblxuY29uc3QgYmx1clNlbGVjdElucHV0ID0gKCkgPT5cbiAgZG9jdW1lbnQuYWN0aXZlRWxlbWVudCAmJiBkb2N1bWVudC5hY3RpdmVFbGVtZW50LmJsdXIoKTtcblxuZXhwb3J0IGRlZmF1bHQgZnVuY3Rpb24gU2Nyb2xsTWFuYWdlcih7XG4gIGNoaWxkcmVuLFxuICBsb2NrRW5hYmxlZCxcbiAgY2FwdHVyZUVuYWJsZWQgPSB0cnVlLFxuICBvbkJvdHRvbUFycml2ZSxcbiAgb25Cb3R0b21MZWF2ZSxcbiAgb25Ub3BBcnJpdmUsXG4gIG9uVG9wTGVhdmUsXG59OiBQcm9wcykge1xuICBjb25zdCBzZXRTY3JvbGxDYXB0dXJlVGFyZ2V0ID0gdXNlU2Nyb2xsQ2FwdHVyZSh7XG4gICAgaXNFbmFibGVkOiBjYXB0dXJlRW5hYmxlZCxcbiAgICBvbkJvdHRvbUFycml2ZSxcbiAgICBvbkJvdHRvbUxlYXZlLFxuICAgIG9uVG9wQXJyaXZlLFxuICAgIG9uVG9wTGVhdmUsXG4gIH0pO1xuICBjb25zdCBzZXRTY3JvbGxMb2NrVGFyZ2V0ID0gdXNlU2Nyb2xsTG9jayh7IGlzRW5hYmxlZDogbG9ja0VuYWJsZWQgfSk7XG5cbiAgY29uc3QgdGFyZ2V0UmVmID0gZWxlbWVudCA9PiB7XG4gICAgc2V0U2Nyb2xsQ2FwdHVyZVRhcmdldChlbGVtZW50KTtcbiAgICBzZXRTY3JvbGxMb2NrVGFyZ2V0KGVsZW1lbnQpO1xuICB9O1xuXG4gIHJldHVybiAoXG4gICAgPFJlYWN0LkZyYWdtZW50PlxuICAgICAge2xvY2tFbmFibGVkICYmIChcbiAgICAgICAgPGRpdlxuICAgICAgICAgIG9uQ2xpY2s9e2JsdXJTZWxlY3RJbnB1dH1cbiAgICAgICAgICBjc3M9e3sgcG9zaXRpb246ICdmaXhlZCcsIGxlZnQ6IDAsIGJvdHRvbTogMCwgcmlnaHQ6IDAsIHRvcDogMCB9fVxuICAgICAgICAvPlxuICAgICAgKX1cbiAgICAgIHtjaGlsZHJlbih0YXJnZXRSZWYpfVxuICAgIDwvUmVhY3QuRnJhZ21lbnQ+XG4gICk7XG59XG4iXX0= */",
  toString: _EMOTION_STRINGIFIED_CSS_ERROR__$1
};

function ScrollManager(_ref) {
  var children = _ref.children,
      lockEnabled = _ref.lockEnabled,
      _ref$captureEnabled = _ref.captureEnabled,
      captureEnabled = _ref$captureEnabled === void 0 ? true : _ref$captureEnabled,
      onBottomArrive = _ref.onBottomArrive,
      onBottomLeave = _ref.onBottomLeave,
      onTopArrive = _ref.onTopArrive,
      onTopLeave = _ref.onTopLeave;
  var setScrollCaptureTarget = useScrollCapture({
    isEnabled: captureEnabled,
    onBottomArrive: onBottomArrive,
    onBottomLeave: onBottomLeave,
    onTopArrive: onTopArrive,
    onTopLeave: onTopLeave
  });
  var setScrollLockTarget = useScrollLock({
    isEnabled: lockEnabled
  });

  var targetRef = function targetRef(element) {
    setScrollCaptureTarget(element);
    setScrollLockTarget(element);
  };

  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_7__["jsx"])(react__WEBPACK_IMPORTED_MODULE_6___default.a.Fragment, null, lockEnabled && Object(_emotion_react__WEBPACK_IMPORTED_MODULE_7__["jsx"])("div", {
    onClick: blurSelectInput,
    css: _ref2
  }), children(targetRef));
}

var formatGroupLabel = function formatGroupLabel(group) {
  return group.label;
};
var getOptionLabel = function getOptionLabel(option) {
  return option.label;
};
var getOptionValue = function getOptionValue(option) {
  return option.value;
};
var isOptionDisabled = function isOptionDisabled(option) {
  return !!option.isDisabled;
};

var defaultStyles = {
  clearIndicator: _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["b"],
  container: _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["d"],
  control: _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["e"],
  dropdownIndicator: _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["f"],
  group: _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["g"],
  groupHeading: _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["h"],
  indicatorsContainer: _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["i"],
  indicatorSeparator: _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["j"],
  input: _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["k"],
  loadingIndicator: _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["l"],
  loadingMessage: _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["m"],
  menu: _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["n"],
  menuList: _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["o"],
  menuPortal: _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["p"],
  multiValue: _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["q"],
  multiValueLabel: _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["r"],
  multiValueRemove: _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["t"],
  noOptionsMessage: _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["u"],
  option: _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["v"],
  placeholder: _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["w"],
  singleValue: _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["x"],
  valueContainer: _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["y"]
}; // Merge Utility
// Allows consumers to extend a base Select with additional styles

function mergeStyles(source) {
  var target = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};

  // initialize with source styles
  var styles = Object(_index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["a"])({}, source); // massage in target styles


  Object.keys(target).forEach(function (key) {
    if (source[key]) {
      styles[key] = function (rsCss, props) {
        return target[key](source[key](rsCss, props), props);
      };
    } else {
      styles[key] = target[key];
    }
  });
  return styles;
}

var colors = {
  primary: '#2684FF',
  primary75: '#4C9AFF',
  primary50: '#B2D4FF',
  primary25: '#DEEBFF',
  danger: '#DE350B',
  dangerLight: '#FFBDAD',
  neutral0: 'hsl(0, 0%, 100%)',
  neutral5: 'hsl(0, 0%, 95%)',
  neutral10: 'hsl(0, 0%, 90%)',
  neutral20: 'hsl(0, 0%, 80%)',
  neutral30: 'hsl(0, 0%, 70%)',
  neutral40: 'hsl(0, 0%, 60%)',
  neutral50: 'hsl(0, 0%, 50%)',
  neutral60: 'hsl(0, 0%, 40%)',
  neutral70: 'hsl(0, 0%, 30%)',
  neutral80: 'hsl(0, 0%, 20%)',
  neutral90: 'hsl(0, 0%, 10%)'
};
var borderRadius = 4; // Used to calculate consistent margin/padding on elements

var baseUnit = 4; // The minimum height of the control

var controlHeight = 38; // The amount of space between the control and menu */

var menuGutter = baseUnit * 2;
var spacing = {
  baseUnit: baseUnit,
  controlHeight: controlHeight,
  menuGutter: menuGutter
};
var defaultTheme = {
  borderRadius: borderRadius,
  colors: colors,
  spacing: spacing
};

var defaultProps = {
  'aria-live': 'polite',
  backspaceRemovesValue: true,
  blurInputOnSelect: Object(_index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["z"])(),
  captureMenuScroll: !Object(_index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["z"])(),
  closeMenuOnSelect: true,
  closeMenuOnScroll: false,
  components: {},
  controlShouldRenderValue: true,
  escapeClearsValue: false,
  filterOption: createFilter(),
  formatGroupLabel: formatGroupLabel,
  getOptionLabel: getOptionLabel,
  getOptionValue: getOptionValue,
  isDisabled: false,
  isLoading: false,
  isMulti: false,
  isRtl: false,
  isSearchable: true,
  isOptionDisabled: isOptionDisabled,
  loadingMessage: function loadingMessage() {
    return 'Loading...';
  },
  maxMenuHeight: 300,
  minMenuHeight: 140,
  menuIsOpen: false,
  menuPlacement: 'bottom',
  menuPosition: 'absolute',
  menuShouldBlockScroll: false,
  menuShouldScrollIntoView: !Object(_index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["A"])(),
  noOptionsMessage: function noOptionsMessage() {
    return 'No options';
  },
  openMenuOnFocus: false,
  openMenuOnClick: true,
  options: [],
  pageSize: 5,
  placeholder: 'Select...',
  screenReaderStatus: function screenReaderStatus(_ref) {
    var count = _ref.count;
    return "".concat(count, " result").concat(count !== 1 ? 's' : '', " available");
  },
  styles: {},
  tabIndex: '0',
  tabSelectsValue: true
};

function toCategorizedOption(props, option, selectValue, index) {
  var isDisabled = _isOptionDisabled(props, option, selectValue);

  var isSelected = _isOptionSelected(props, option, selectValue);

  var label = getOptionLabel$1(props, option);
  var value = getOptionValue$1(props, option);
  return {
    type: 'option',
    data: option,
    isDisabled: isDisabled,
    isSelected: isSelected,
    label: label,
    value: value,
    index: index
  };
}

function buildCategorizedOptions(props, selectValue) {
  return props.options.map(function (groupOrOption, groupOrOptionIndex) {
    if (groupOrOption.options) {
      var categorizedOptions = groupOrOption.options.map(function (option, optionIndex) {
        return toCategorizedOption(props, option, selectValue, optionIndex);
      }).filter(function (categorizedOption) {
        return isFocusable(props, categorizedOption);
      });
      return categorizedOptions.length > 0 ? {
        type: 'group',
        data: groupOrOption,
        options: categorizedOptions,
        index: groupOrOptionIndex
      } : undefined;
    }

    var categorizedOption = toCategorizedOption(props, groupOrOption, selectValue, groupOrOptionIndex);
    return isFocusable(props, categorizedOption) ? categorizedOption : undefined;
  }) // Flow limitation (see https://github.com/facebook/flow/issues/1414)
  .filter(function (categorizedOption) {
    return !!categorizedOption;
  });
}

function buildFocusableOptionsFromCategorizedOptions(categorizedOptions) {
  return categorizedOptions.reduce(function (optionsAccumulator, categorizedOption) {
    if (categorizedOption.type === 'group') {
      optionsAccumulator.push.apply(optionsAccumulator, Object(_babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_5__["default"])(categorizedOption.options.map(function (option) {
        return option.data;
      })));
    } else {
      optionsAccumulator.push(categorizedOption.data);
    }

    return optionsAccumulator;
  }, []);
}

function buildFocusableOptions(props, selectValue) {
  return buildFocusableOptionsFromCategorizedOptions(buildCategorizedOptions(props, selectValue));
}

function isFocusable(props, categorizedOption) {
  var _props$inputValue = props.inputValue,
      inputValue = _props$inputValue === void 0 ? '' : _props$inputValue;
  var data = categorizedOption.data,
      isSelected = categorizedOption.isSelected,
      label = categorizedOption.label,
      value = categorizedOption.value;
  return (!shouldHideSelectedOptions(props) || !isSelected) && _filterOption(props, {
    label: label,
    value: value,
    data: data
  }, inputValue);
}

function getNextFocusedValue(state, nextSelectValue) {
  var focusedValue = state.focusedValue,
      lastSelectValue = state.selectValue;
  var lastFocusedIndex = lastSelectValue.indexOf(focusedValue);

  if (lastFocusedIndex > -1) {
    var nextFocusedIndex = nextSelectValue.indexOf(focusedValue);

    if (nextFocusedIndex > -1) {
      // the focused value is still in the selectValue, return it
      return focusedValue;
    } else if (lastFocusedIndex < nextSelectValue.length) {
      // the focusedValue is not present in the next selectValue array by
      // reference, so return the new value at the same index
      return nextSelectValue[lastFocusedIndex];
    }
  }

  return null;
}

function getNextFocusedOption(state, options) {
  var lastFocusedOption = state.focusedOption;
  return lastFocusedOption && options.indexOf(lastFocusedOption) > -1 ? lastFocusedOption : options[0];
}

var getOptionLabel$1 = function getOptionLabel(props, data) {
  return props.getOptionLabel(data);
};

var getOptionValue$1 = function getOptionValue(props, data) {
  return props.getOptionValue(data);
};

function _isOptionDisabled(props, option, selectValue) {
  return typeof props.isOptionDisabled === 'function' ? props.isOptionDisabled(option, selectValue) : false;
}

function _isOptionSelected(props, option, selectValue) {
  if (selectValue.indexOf(option) > -1) return true;

  if (typeof props.isOptionSelected === 'function') {
    return props.isOptionSelected(option, selectValue);
  }

  var candidate = getOptionValue$1(props, option);
  return selectValue.some(function (i) {
    return getOptionValue$1(props, i) === candidate;
  });
}

function _filterOption(props, option, inputValue) {
  return props.filterOption ? props.filterOption(option, inputValue) : true;
}

var shouldHideSelectedOptions = function shouldHideSelectedOptions(props) {
  var hideSelectedOptions = props.hideSelectedOptions,
      isMulti = props.isMulti;
  if (hideSelectedOptions === undefined) return isMulti;
  return hideSelectedOptions;
};

var instanceId = 1;

var Select = /*#__PURE__*/function (_Component) {
  Object(_babel_runtime_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_4__["default"])(Select, _Component);

  var _super = Object(_index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["_"])(Select);

  // Misc. Instance Properties
  // ------------------------------
  // TODO
  // Refs
  // ------------------------------
  // Lifecycle
  // ------------------------------
  function Select(_props) {
    var _this;

    Object(_babel_runtime_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_2__["default"])(this, Select);

    _this = _super.call(this, _props);
    _this.state = {
      ariaSelection: null,
      focusedOption: null,
      focusedValue: null,
      inputIsHidden: false,
      isFocused: false,
      selectValue: [],
      clearFocusValueOnUpdate: false,
      inputIsHiddenAfterUpdate: undefined,
      prevProps: undefined
    };
    _this.blockOptionHover = false;
    _this.isComposing = false;
    _this.commonProps = void 0;
    _this.initialTouchX = 0;
    _this.initialTouchY = 0;
    _this.instancePrefix = '';
    _this.openAfterFocus = false;
    _this.scrollToFocusedOptionOnUpdate = false;
    _this.userIsDragging = void 0;
    _this.controlRef = null;

    _this.getControlRef = function (ref) {
      _this.controlRef = ref;
    };

    _this.focusedOptionRef = null;

    _this.getFocusedOptionRef = function (ref) {
      _this.focusedOptionRef = ref;
    };

    _this.menuListRef = null;

    _this.getMenuListRef = function (ref) {
      _this.menuListRef = ref;
    };

    _this.inputRef = null;

    _this.getInputRef = function (ref) {
      _this.inputRef = ref;
    };

    _this.focus = _this.focusInput;
    _this.blur = _this.blurInput;

    _this.onChange = function (newValue, actionMeta) {
      var _this$props = _this.props,
          onChange = _this$props.onChange,
          name = _this$props.name;
      actionMeta.name = name;

      _this.ariaOnChange(newValue, actionMeta);

      onChange(newValue, actionMeta);
    };

    _this.setValue = function (newValue) {
      var action = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'set-value';
      var option = arguments.length > 2 ? arguments[2] : undefined;
      var _this$props2 = _this.props,
          closeMenuOnSelect = _this$props2.closeMenuOnSelect,
          isMulti = _this$props2.isMulti;

      _this.onInputChange('', {
        action: 'set-value'
      });

      if (closeMenuOnSelect) {
        _this.setState({
          inputIsHiddenAfterUpdate: !isMulti
        });

        _this.onMenuClose();
      } // when the select value should change, we should reset focusedValue


      _this.setState({
        clearFocusValueOnUpdate: true
      });

      _this.onChange(newValue, {
        action: action,
        option: option
      });
    };

    _this.selectOption = function (newValue) {
      var _this$props3 = _this.props,
          blurInputOnSelect = _this$props3.blurInputOnSelect,
          isMulti = _this$props3.isMulti,
          name = _this$props3.name;
      var selectValue = _this.state.selectValue;

      var deselected = isMulti && _this.isOptionSelected(newValue, selectValue);

      var isDisabled = _this.isOptionDisabled(newValue, selectValue);

      if (deselected) {
        var candidate = _this.getOptionValue(newValue);

        _this.setValue(selectValue.filter(function (i) {
          return _this.getOptionValue(i) !== candidate;
        }), 'deselect-option', newValue);
      } else if (!isDisabled) {
        // Select option if option is not disabled
        if (isMulti) {
          _this.setValue([].concat(Object(_babel_runtime_helpers_esm_toConsumableArray__WEBPACK_IMPORTED_MODULE_5__["default"])(selectValue), [newValue]), 'select-option', newValue);
        } else {
          _this.setValue(newValue, 'select-option');
        }
      } else {
        _this.ariaOnChange(newValue, {
          action: 'select-option',
          name: name
        });

        return;
      }

      if (blurInputOnSelect) {
        _this.blurInput();
      }
    };

    _this.removeValue = function (removedValue) {
      var isMulti = _this.props.isMulti;
      var selectValue = _this.state.selectValue;

      var candidate = _this.getOptionValue(removedValue);

      var newValueArray = selectValue.filter(function (i) {
        return _this.getOptionValue(i) !== candidate;
      });
      var newValue = isMulti ? newValueArray : newValueArray[0] || null;

      _this.onChange(newValue, {
        action: 'remove-value',
        removedValue: removedValue
      });

      _this.focusInput();
    };

    _this.clearValue = function () {
      var selectValue = _this.state.selectValue;

      _this.onChange(_this.props.isMulti ? [] : null, {
        action: 'clear',
        removedValues: selectValue
      });
    };

    _this.popValue = function () {
      var isMulti = _this.props.isMulti;
      var selectValue = _this.state.selectValue;
      var lastSelectedValue = selectValue[selectValue.length - 1];
      var newValueArray = selectValue.slice(0, selectValue.length - 1);
      var newValue = isMulti ? newValueArray : newValueArray[0] || null;

      _this.onChange(newValue, {
        action: 'pop-value',
        removedValue: lastSelectedValue
      });
    };

    _this.getValue = function () {
      return _this.state.selectValue;
    };

    _this.cx = function () {
      for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
        args[_key] = arguments[_key];
      }

      return _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["B"].apply(void 0, [_this.props.classNamePrefix].concat(args));
    };

    _this.getOptionLabel = function (data) {
      return getOptionLabel$1(_this.props, data);
    };

    _this.getOptionValue = function (data) {
      return getOptionValue$1(_this.props, data);
    };

    _this.getStyles = function (key, props) {
      var base = defaultStyles[key](props);
      base.boxSizing = 'border-box';
      var custom = _this.props.styles[key];
      return custom ? custom(base, props) : base;
    };

    _this.getElementId = function (element) {
      return "".concat(_this.instancePrefix, "-").concat(element);
    };

    _this.getComponents = function () {
      return Object(_index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["C"])(_this.props);
    };

    _this.buildCategorizedOptions = function () {
      return buildCategorizedOptions(_this.props, _this.state.selectValue);
    };

    _this.getCategorizedOptions = function () {
      return _this.props.menuIsOpen ? _this.buildCategorizedOptions() : [];
    };

    _this.buildFocusableOptions = function () {
      return buildFocusableOptionsFromCategorizedOptions(_this.buildCategorizedOptions());
    };

    _this.getFocusableOptions = function () {
      return _this.props.menuIsOpen ? _this.buildFocusableOptions() : [];
    };

    _this.ariaOnChange = function (value, actionMeta) {
      _this.setState({
        ariaSelection: Object(_index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["a"])({
          value: value
        }, actionMeta)
      });
    };

    _this.onMenuMouseDown = function (event) {
      if (event.button !== 0) {
        return;
      }

      event.stopPropagation();
      event.preventDefault();

      _this.focusInput();
    };

    _this.onMenuMouseMove = function (event) {
      _this.blockOptionHover = false;
    };

    _this.onControlMouseDown = function (event) {
      var openMenuOnClick = _this.props.openMenuOnClick;

      if (!_this.state.isFocused) {
        if (openMenuOnClick) {
          _this.openAfterFocus = true;
        }

        _this.focusInput();
      } else if (!_this.props.menuIsOpen) {
        if (openMenuOnClick) {
          _this.openMenu('first');
        }
      } else {
        if ( // $FlowFixMe
        event.target.tagName !== 'INPUT' && event.target.tagName !== 'TEXTAREA') {
          _this.onMenuClose();
        }
      }

      if ( // $FlowFixMe
      event.target.tagName !== 'INPUT' && event.target.tagName !== 'TEXTAREA') {
        event.preventDefault();
      }
    };

    _this.onDropdownIndicatorMouseDown = function (event) {
      // ignore mouse events that weren't triggered by the primary button
      if (event && event.type === 'mousedown' && event.button !== 0) {
        return;
      }

      if (_this.props.isDisabled) return;
      var _this$props4 = _this.props,
          isMulti = _this$props4.isMulti,
          menuIsOpen = _this$props4.menuIsOpen;

      _this.focusInput();

      if (menuIsOpen) {
        _this.setState({
          inputIsHiddenAfterUpdate: !isMulti
        });

        _this.onMenuClose();
      } else {
        _this.openMenu('first');
      }

      event.preventDefault();
      event.stopPropagation();
    };

    _this.onClearIndicatorMouseDown = function (event) {
      // ignore mouse events that weren't triggered by the primary button
      if (event && event.type === 'mousedown' && event.button !== 0) {
        return;
      }

      _this.clearValue();

      event.stopPropagation();
      _this.openAfterFocus = false;

      if (event.type === 'touchend') {
        _this.focusInput();
      } else {
        setTimeout(function () {
          return _this.focusInput();
        });
      }
    };

    _this.onScroll = function (event) {
      if (typeof _this.props.closeMenuOnScroll === 'boolean') {
        if (event.target instanceof HTMLElement && Object(_index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["D"])(event.target)) {
          _this.props.onMenuClose();
        }
      } else if (typeof _this.props.closeMenuOnScroll === 'function') {
        if (_this.props.closeMenuOnScroll(event)) {
          _this.props.onMenuClose();
        }
      }
    };

    _this.onCompositionStart = function () {
      _this.isComposing = true;
    };

    _this.onCompositionEnd = function () {
      _this.isComposing = false;
    };

    _this.onTouchStart = function (_ref2) {
      var touches = _ref2.touches;
      var touch = touches && touches.item(0);

      if (!touch) {
        return;
      }

      _this.initialTouchX = touch.clientX;
      _this.initialTouchY = touch.clientY;
      _this.userIsDragging = false;
    };

    _this.onTouchMove = function (_ref3) {
      var touches = _ref3.touches;
      var touch = touches && touches.item(0);

      if (!touch) {
        return;
      }

      var deltaX = Math.abs(touch.clientX - _this.initialTouchX);
      var deltaY = Math.abs(touch.clientY - _this.initialTouchY);
      var moveThreshold = 5;
      _this.userIsDragging = deltaX > moveThreshold || deltaY > moveThreshold;
    };

    _this.onTouchEnd = function (event) {
      if (_this.userIsDragging) return; // close the menu if the user taps outside
      // we're checking on event.target here instead of event.currentTarget, because we want to assert information
      // on events on child elements, not the document (which we've attached this handler to).

      if (_this.controlRef && !_this.controlRef.contains(event.target) && _this.menuListRef && !_this.menuListRef.contains(event.target)) {
        _this.blurInput();
      } // reset move vars


      _this.initialTouchX = 0;
      _this.initialTouchY = 0;
    };

    _this.onControlTouchEnd = function (event) {
      if (_this.userIsDragging) return;

      _this.onControlMouseDown(event);
    };

    _this.onClearIndicatorTouchEnd = function (event) {
      if (_this.userIsDragging) return;

      _this.onClearIndicatorMouseDown(event);
    };

    _this.onDropdownIndicatorTouchEnd = function (event) {
      if (_this.userIsDragging) return;

      _this.onDropdownIndicatorMouseDown(event);
    };

    _this.handleInputChange = function (event) {
      var inputValue = event.currentTarget.value;

      _this.setState({
        inputIsHiddenAfterUpdate: false
      });

      _this.onInputChange(inputValue, {
        action: 'input-change'
      });

      if (!_this.props.menuIsOpen) {
        _this.onMenuOpen();
      }
    };

    _this.onInputFocus = function (event) {
      if (_this.props.onFocus) {
        _this.props.onFocus(event);
      }

      _this.setState({
        inputIsHiddenAfterUpdate: false,
        isFocused: true
      });

      if (_this.openAfterFocus || _this.props.openMenuOnFocus) {
        _this.openMenu('first');
      }

      _this.openAfterFocus = false;
    };

    _this.onInputBlur = function (event) {
      if (_this.menuListRef && _this.menuListRef.contains(document.activeElement)) {
        _this.inputRef.focus();

        return;
      }

      if (_this.props.onBlur) {
        _this.props.onBlur(event);
      }

      _this.onInputChange('', {
        action: 'input-blur'
      });

      _this.onMenuClose();

      _this.setState({
        focusedValue: null,
        isFocused: false
      });
    };

    _this.onOptionHover = function (focusedOption) {
      if (_this.blockOptionHover || _this.state.focusedOption === focusedOption) {
        return;
      }

      _this.setState({
        focusedOption: focusedOption
      });
    };

    _this.shouldHideSelectedOptions = function () {
      return shouldHideSelectedOptions(_this.props);
    };

    _this.onKeyDown = function (event) {
      var _this$props5 = _this.props,
          isMulti = _this$props5.isMulti,
          backspaceRemovesValue = _this$props5.backspaceRemovesValue,
          escapeClearsValue = _this$props5.escapeClearsValue,
          inputValue = _this$props5.inputValue,
          isClearable = _this$props5.isClearable,
          isDisabled = _this$props5.isDisabled,
          menuIsOpen = _this$props5.menuIsOpen,
          onKeyDown = _this$props5.onKeyDown,
          tabSelectsValue = _this$props5.tabSelectsValue,
          openMenuOnFocus = _this$props5.openMenuOnFocus;
      var _this$state = _this.state,
          focusedOption = _this$state.focusedOption,
          focusedValue = _this$state.focusedValue,
          selectValue = _this$state.selectValue;
      if (isDisabled) return;

      if (typeof onKeyDown === 'function') {
        onKeyDown(event);

        if (event.defaultPrevented) {
          return;
        }
      } // Block option hover events when the user has just pressed a key


      _this.blockOptionHover = true;

      switch (event.key) {
        case 'ArrowLeft':
          if (!isMulti || inputValue) return;

          _this.focusValue('previous');

          break;

        case 'ArrowRight':
          if (!isMulti || inputValue) return;

          _this.focusValue('next');

          break;

        case 'Delete':
        case 'Backspace':
          if (inputValue) return;

          if (focusedValue) {
            _this.removeValue(focusedValue);
          } else {
            if (!backspaceRemovesValue) return;

            if (isMulti) {
              _this.popValue();
            } else if (isClearable) {
              _this.clearValue();
            }
          }

          break;

        case 'Tab':
          if (_this.isComposing) return;

          if (event.shiftKey || !menuIsOpen || !tabSelectsValue || !focusedOption || // don't capture the event if the menu opens on focus and the focused
          // option is already selected; it breaks the flow of navigation
          openMenuOnFocus && _this.isOptionSelected(focusedOption, selectValue)) {
            return;
          }

          _this.selectOption(focusedOption);

          break;

        case 'Enter':
          if (event.keyCode === 229) {
            // ignore the keydown event from an Input Method Editor(IME)
            // ref. https://www.w3.org/TR/uievents/#determine-keydown-keyup-keyCode
            break;
          }

          if (menuIsOpen) {
            if (!focusedOption) return;
            if (_this.isComposing) return;

            _this.selectOption(focusedOption);

            break;
          }

          return;

        case 'Escape':
          if (menuIsOpen) {
            _this.setState({
              inputIsHiddenAfterUpdate: false
            });

            _this.onInputChange('', {
              action: 'menu-close'
            });

            _this.onMenuClose();
          } else if (isClearable && escapeClearsValue) {
            _this.clearValue();
          }

          break;

        case ' ':
          // space
          if (inputValue) {
            return;
          }

          if (!menuIsOpen) {
            _this.openMenu('first');

            break;
          }

          if (!focusedOption) return;

          _this.selectOption(focusedOption);

          break;

        case 'ArrowUp':
          if (menuIsOpen) {
            _this.focusOption('up');
          } else {
            _this.openMenu('last');
          }

          break;

        case 'ArrowDown':
          if (menuIsOpen) {
            _this.focusOption('down');
          } else {
            _this.openMenu('first');
          }

          break;

        case 'PageUp':
          if (!menuIsOpen) return;

          _this.focusOption('pageup');

          break;

        case 'PageDown':
          if (!menuIsOpen) return;

          _this.focusOption('pagedown');

          break;

        case 'Home':
          if (!menuIsOpen) return;

          _this.focusOption('first');

          break;

        case 'End':
          if (!menuIsOpen) return;

          _this.focusOption('last');

          break;

        default:
          return;
      }

      event.preventDefault();
    };

    _this.instancePrefix = 'react-select-' + (_this.props.instanceId || ++instanceId);
    _this.state.selectValue = Object(_index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["E"])(_props.value);
    return _this;
  }

  Object(_babel_runtime_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_3__["default"])(Select, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      this.startListeningComposition();
      this.startListeningToTouch();

      if (this.props.closeMenuOnScroll && document && document.addEventListener) {
        // Listen to all scroll events, and filter them out inside of 'onScroll'
        document.addEventListener('scroll', this.onScroll, true);
      }

      if (this.props.autoFocus) {
        this.focusInput();
      }
    }
  }, {
    key: "componentDidUpdate",
    value: function componentDidUpdate(prevProps) {
      var _this$props6 = this.props,
          isDisabled = _this$props6.isDisabled,
          menuIsOpen = _this$props6.menuIsOpen;
      var isFocused = this.state.isFocused;

      if ( // ensure focus is restored correctly when the control becomes enabled
      isFocused && !isDisabled && prevProps.isDisabled || // ensure focus is on the Input when the menu opens
      isFocused && menuIsOpen && !prevProps.menuIsOpen) {
        this.focusInput();
      }

      if (isFocused && isDisabled && !prevProps.isDisabled) {
        // ensure select state gets blurred in case Select is programatically disabled while focused
        this.setState({
          isFocused: false
        }, this.onMenuClose);
      } // scroll the focused option into view if necessary


      if (this.menuListRef && this.focusedOptionRef && this.scrollToFocusedOptionOnUpdate) {
        Object(_index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["F"])(this.menuListRef, this.focusedOptionRef);
        this.scrollToFocusedOptionOnUpdate = false;
      }
    }
  }, {
    key: "componentWillUnmount",
    value: function componentWillUnmount() {
      this.stopListeningComposition();
      this.stopListeningToTouch();
      document.removeEventListener('scroll', this.onScroll, true);
    } // ==============================
    // Consumer Handlers
    // ==============================

  }, {
    key: "onMenuOpen",
    value: function onMenuOpen() {
      this.props.onMenuOpen();
    }
  }, {
    key: "onMenuClose",
    value: function onMenuClose() {
      this.onInputChange('', {
        action: 'menu-close'
      });
      this.props.onMenuClose();
    }
  }, {
    key: "onInputChange",
    value: function onInputChange(newValue, actionMeta) {
      this.props.onInputChange(newValue, actionMeta);
    } // ==============================
    // Methods
    // ==============================

  }, {
    key: "focusInput",
    value: function focusInput() {
      if (!this.inputRef) return;
      this.inputRef.focus();
    }
  }, {
    key: "blurInput",
    value: function blurInput() {
      if (!this.inputRef) return;
      this.inputRef.blur();
    } // aliased for consumers

  }, {
    key: "openMenu",
    value: function openMenu(focusOption) {
      var _this2 = this;

      var _this$state2 = this.state,
          selectValue = _this$state2.selectValue,
          isFocused = _this$state2.isFocused;
      var focusableOptions = this.buildFocusableOptions();
      var openAtIndex = focusOption === 'first' ? 0 : focusableOptions.length - 1;

      if (!this.props.isMulti) {
        var selectedIndex = focusableOptions.indexOf(selectValue[0]);

        if (selectedIndex > -1) {
          openAtIndex = selectedIndex;
        }
      } // only scroll if the menu isn't already open


      this.scrollToFocusedOptionOnUpdate = !(isFocused && this.menuListRef);
      this.setState({
        inputIsHiddenAfterUpdate: false,
        focusedValue: null,
        focusedOption: focusableOptions[openAtIndex]
      }, function () {
        return _this2.onMenuOpen();
      });
    }
  }, {
    key: "focusValue",
    value: function focusValue(direction) {
      var _this$state3 = this.state,
          selectValue = _this$state3.selectValue,
          focusedValue = _this$state3.focusedValue; // Only multiselects support value focusing

      if (!this.props.isMulti) return;
      this.setState({
        focusedOption: null
      });
      var focusedIndex = selectValue.indexOf(focusedValue);

      if (!focusedValue) {
        focusedIndex = -1;
      }

      var lastIndex = selectValue.length - 1;
      var nextFocus = -1;
      if (!selectValue.length) return;

      switch (direction) {
        case 'previous':
          if (focusedIndex === 0) {
            // don't cycle from the start to the end
            nextFocus = 0;
          } else if (focusedIndex === -1) {
            // if nothing is focused, focus the last value first
            nextFocus = lastIndex;
          } else {
            nextFocus = focusedIndex - 1;
          }

          break;

        case 'next':
          if (focusedIndex > -1 && focusedIndex < lastIndex) {
            nextFocus = focusedIndex + 1;
          }

          break;
      }

      this.setState({
        inputIsHidden: nextFocus !== -1,
        focusedValue: selectValue[nextFocus]
      });
    }
  }, {
    key: "focusOption",
    value: function focusOption() {
      var direction = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'first';
      var pageSize = this.props.pageSize;
      var focusedOption = this.state.focusedOption;
      var options = this.getFocusableOptions();
      if (!options.length) return;
      var nextFocus = 0; // handles 'first'

      var focusedIndex = options.indexOf(focusedOption);

      if (!focusedOption) {
        focusedIndex = -1;
      }

      if (direction === 'up') {
        nextFocus = focusedIndex > 0 ? focusedIndex - 1 : options.length - 1;
      } else if (direction === 'down') {
        nextFocus = (focusedIndex + 1) % options.length;
      } else if (direction === 'pageup') {
        nextFocus = focusedIndex - pageSize;
        if (nextFocus < 0) nextFocus = 0;
      } else if (direction === 'pagedown') {
        nextFocus = focusedIndex + pageSize;
        if (nextFocus > options.length - 1) nextFocus = options.length - 1;
      } else if (direction === 'last') {
        nextFocus = options.length - 1;
      }

      this.scrollToFocusedOptionOnUpdate = true;
      this.setState({
        focusedOption: options[nextFocus],
        focusedValue: null
      });
    }
  }, {
    key: "getTheme",
    value: // ==============================
    // Getters
    // ==============================
    function getTheme() {
      // Use the default theme if there are no customizations.
      if (!this.props.theme) {
        return defaultTheme;
      } // If the theme prop is a function, assume the function
      // knows how to merge the passed-in default theme with
      // its own modifications.


      if (typeof this.props.theme === 'function') {
        return this.props.theme(defaultTheme);
      } // Otherwise, if a plain theme object was passed in,
      // overlay it with the default theme.


      return Object(_index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["a"])(Object(_index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["a"])({}, defaultTheme), this.props.theme);
    }
  }, {
    key: "getCommonProps",
    value: function getCommonProps() {
      var clearValue = this.clearValue,
          cx = this.cx,
          getStyles = this.getStyles,
          getValue = this.getValue,
          selectOption = this.selectOption,
          setValue = this.setValue,
          props = this.props;
      var isMulti = props.isMulti,
          isRtl = props.isRtl,
          options = props.options;
      var hasValue = this.hasValue();
      return {
        clearValue: clearValue,
        cx: cx,
        getStyles: getStyles,
        getValue: getValue,
        hasValue: hasValue,
        isMulti: isMulti,
        isRtl: isRtl,
        options: options,
        selectOption: selectOption,
        selectProps: props,
        setValue: setValue,
        theme: this.getTheme()
      };
    }
  }, {
    key: "hasValue",
    value: function hasValue() {
      var selectValue = this.state.selectValue;
      return selectValue.length > 0;
    }
  }, {
    key: "hasOptions",
    value: function hasOptions() {
      return !!this.getFocusableOptions().length;
    }
  }, {
    key: "isClearable",
    value: function isClearable() {
      var _this$props7 = this.props,
          isClearable = _this$props7.isClearable,
          isMulti = _this$props7.isMulti; // single select, by default, IS NOT clearable
      // multi select, by default, IS clearable

      if (isClearable === undefined) return isMulti;
      return isClearable;
    }
  }, {
    key: "isOptionDisabled",
    value: function isOptionDisabled(option, selectValue) {
      return _isOptionDisabled(this.props, option, selectValue);
    }
  }, {
    key: "isOptionSelected",
    value: function isOptionSelected(option, selectValue) {
      return _isOptionSelected(this.props, option, selectValue);
    }
  }, {
    key: "filterOption",
    value: function filterOption(option, inputValue) {
      return _filterOption(this.props, option, inputValue);
    }
  }, {
    key: "formatOptionLabel",
    value: function formatOptionLabel(data, context) {
      if (typeof this.props.formatOptionLabel === 'function') {
        var inputValue = this.props.inputValue;
        var selectValue = this.state.selectValue;
        return this.props.formatOptionLabel(data, {
          context: context,
          inputValue: inputValue,
          selectValue: selectValue
        });
      } else {
        return this.getOptionLabel(data);
      }
    }
  }, {
    key: "formatGroupLabel",
    value: function formatGroupLabel(data) {
      return this.props.formatGroupLabel(data);
    } // ==============================
    // Mouse Handlers
    // ==============================

  }, {
    key: "startListeningComposition",
    value: // ==============================
    // Composition Handlers
    // ==============================
    function startListeningComposition() {
      if (document && document.addEventListener) {
        document.addEventListener('compositionstart', this.onCompositionStart, false);
        document.addEventListener('compositionend', this.onCompositionEnd, false);
      }
    }
  }, {
    key: "stopListeningComposition",
    value: function stopListeningComposition() {
      if (document && document.removeEventListener) {
        document.removeEventListener('compositionstart', this.onCompositionStart);
        document.removeEventListener('compositionend', this.onCompositionEnd);
      }
    }
  }, {
    key: "startListeningToTouch",
    value: // ==============================
    // Touch Handlers
    // ==============================
    function startListeningToTouch() {
      if (document && document.addEventListener) {
        document.addEventListener('touchstart', this.onTouchStart, false);
        document.addEventListener('touchmove', this.onTouchMove, false);
        document.addEventListener('touchend', this.onTouchEnd, false);
      }
    }
  }, {
    key: "stopListeningToTouch",
    value: function stopListeningToTouch() {
      if (document && document.removeEventListener) {
        document.removeEventListener('touchstart', this.onTouchStart);
        document.removeEventListener('touchmove', this.onTouchMove);
        document.removeEventListener('touchend', this.onTouchEnd);
      }
    }
  }, {
    key: "renderInput",
    value: // ==============================
    // Renderers
    // ==============================
    function renderInput() {
      var _this$props8 = this.props,
          isDisabled = _this$props8.isDisabled,
          isSearchable = _this$props8.isSearchable,
          inputId = _this$props8.inputId,
          inputValue = _this$props8.inputValue,
          tabIndex = _this$props8.tabIndex,
          form = _this$props8.form;

      var _this$getComponents = this.getComponents(),
          Input = _this$getComponents.Input;

      var inputIsHidden = this.state.inputIsHidden;
      var commonProps = this.commonProps;
      var id = inputId || this.getElementId('input'); // aria attributes makes the JSX "noisy", separated for clarity

      var ariaAttributes = {
        'aria-autocomplete': 'list',
        'aria-label': this.props['aria-label'],
        'aria-labelledby': this.props['aria-labelledby']
      };

      if (!isSearchable) {
        // use a dummy input to maintain focus/blur functionality
        return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(DummyInput, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
          id: id,
          innerRef: this.getInputRef,
          onBlur: this.onInputBlur,
          onChange: _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["G"],
          onFocus: this.onInputFocus,
          readOnly: true,
          disabled: isDisabled,
          tabIndex: tabIndex,
          form: form,
          value: ""
        }, ariaAttributes));
      }

      return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(Input, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, commonProps, {
        autoCapitalize: "none",
        autoComplete: "off",
        autoCorrect: "off",
        id: id,
        innerRef: this.getInputRef,
        isDisabled: isDisabled,
        isHidden: inputIsHidden,
        onBlur: this.onInputBlur,
        onChange: this.handleInputChange,
        onFocus: this.onInputFocus,
        spellCheck: "false",
        tabIndex: tabIndex,
        form: form,
        type: "text",
        value: inputValue
      }, ariaAttributes));
    }
  }, {
    key: "renderPlaceholderOrValue",
    value: function renderPlaceholderOrValue() {
      var _this3 = this;

      var _this$getComponents2 = this.getComponents(),
          MultiValue = _this$getComponents2.MultiValue,
          MultiValueContainer = _this$getComponents2.MultiValueContainer,
          MultiValueLabel = _this$getComponents2.MultiValueLabel,
          MultiValueRemove = _this$getComponents2.MultiValueRemove,
          SingleValue = _this$getComponents2.SingleValue,
          Placeholder = _this$getComponents2.Placeholder;

      var commonProps = this.commonProps;
      var _this$props9 = this.props,
          controlShouldRenderValue = _this$props9.controlShouldRenderValue,
          isDisabled = _this$props9.isDisabled,
          isMulti = _this$props9.isMulti,
          inputValue = _this$props9.inputValue,
          placeholder = _this$props9.placeholder;
      var _this$state4 = this.state,
          selectValue = _this$state4.selectValue,
          focusedValue = _this$state4.focusedValue,
          isFocused = _this$state4.isFocused;

      if (!this.hasValue() || !controlShouldRenderValue) {
        return inputValue ? null : /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(Placeholder, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, commonProps, {
          key: "placeholder",
          isDisabled: isDisabled,
          isFocused: isFocused
        }), placeholder);
      }

      if (isMulti) {
        var selectValues = selectValue.map(function (opt, index) {
          var isOptionFocused = opt === focusedValue;
          return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(MultiValue, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, commonProps, {
            components: {
              Container: MultiValueContainer,
              Label: MultiValueLabel,
              Remove: MultiValueRemove
            },
            isFocused: isOptionFocused,
            isDisabled: isDisabled,
            key: "".concat(_this3.getOptionValue(opt)).concat(index),
            index: index,
            removeProps: {
              onClick: function onClick() {
                return _this3.removeValue(opt);
              },
              onTouchEnd: function onTouchEnd() {
                return _this3.removeValue(opt);
              },
              onMouseDown: function onMouseDown(e) {
                e.preventDefault();
                e.stopPropagation();
              }
            },
            data: opt
          }), _this3.formatOptionLabel(opt, 'value'));
        });
        return selectValues;
      }

      if (inputValue) {
        return null;
      }

      var singleValue = selectValue[0];
      return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(SingleValue, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, commonProps, {
        data: singleValue,
        isDisabled: isDisabled
      }), this.formatOptionLabel(singleValue, 'value'));
    }
  }, {
    key: "renderClearIndicator",
    value: function renderClearIndicator() {
      var _this$getComponents3 = this.getComponents(),
          ClearIndicator = _this$getComponents3.ClearIndicator;

      var commonProps = this.commonProps;
      var _this$props10 = this.props,
          isDisabled = _this$props10.isDisabled,
          isLoading = _this$props10.isLoading;
      var isFocused = this.state.isFocused;

      if (!this.isClearable() || !ClearIndicator || isDisabled || !this.hasValue() || isLoading) {
        return null;
      }

      var innerProps = {
        onMouseDown: this.onClearIndicatorMouseDown,
        onTouchEnd: this.onClearIndicatorTouchEnd,
        'aria-hidden': 'true'
      };
      return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(ClearIndicator, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, commonProps, {
        innerProps: innerProps,
        isFocused: isFocused
      }));
    }
  }, {
    key: "renderLoadingIndicator",
    value: function renderLoadingIndicator() {
      var _this$getComponents4 = this.getComponents(),
          LoadingIndicator = _this$getComponents4.LoadingIndicator;

      var commonProps = this.commonProps;
      var _this$props11 = this.props,
          isDisabled = _this$props11.isDisabled,
          isLoading = _this$props11.isLoading;
      var isFocused = this.state.isFocused;
      if (!LoadingIndicator || !isLoading) return null;
      var innerProps = {
        'aria-hidden': 'true'
      };
      return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(LoadingIndicator, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, commonProps, {
        innerProps: innerProps,
        isDisabled: isDisabled,
        isFocused: isFocused
      }));
    }
  }, {
    key: "renderIndicatorSeparator",
    value: function renderIndicatorSeparator() {
      var _this$getComponents5 = this.getComponents(),
          DropdownIndicator = _this$getComponents5.DropdownIndicator,
          IndicatorSeparator = _this$getComponents5.IndicatorSeparator; // separator doesn't make sense without the dropdown indicator


      if (!DropdownIndicator || !IndicatorSeparator) return null;
      var commonProps = this.commonProps;
      var isDisabled = this.props.isDisabled;
      var isFocused = this.state.isFocused;
      return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(IndicatorSeparator, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, commonProps, {
        isDisabled: isDisabled,
        isFocused: isFocused
      }));
    }
  }, {
    key: "renderDropdownIndicator",
    value: function renderDropdownIndicator() {
      var _this$getComponents6 = this.getComponents(),
          DropdownIndicator = _this$getComponents6.DropdownIndicator;

      if (!DropdownIndicator) return null;
      var commonProps = this.commonProps;
      var isDisabled = this.props.isDisabled;
      var isFocused = this.state.isFocused;
      var innerProps = {
        onMouseDown: this.onDropdownIndicatorMouseDown,
        onTouchEnd: this.onDropdownIndicatorTouchEnd,
        'aria-hidden': 'true'
      };
      return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(DropdownIndicator, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, commonProps, {
        innerProps: innerProps,
        isDisabled: isDisabled,
        isFocused: isFocused
      }));
    }
  }, {
    key: "renderMenu",
    value: function renderMenu() {
      var _this4 = this;

      var _this$getComponents7 = this.getComponents(),
          Group = _this$getComponents7.Group,
          GroupHeading = _this$getComponents7.GroupHeading,
          Menu = _this$getComponents7.Menu,
          MenuList = _this$getComponents7.MenuList,
          MenuPortal = _this$getComponents7.MenuPortal,
          LoadingMessage = _this$getComponents7.LoadingMessage,
          NoOptionsMessage = _this$getComponents7.NoOptionsMessage,
          Option = _this$getComponents7.Option;

      var commonProps = this.commonProps;
      var focusedOption = this.state.focusedOption;
      var _this$props12 = this.props,
          captureMenuScroll = _this$props12.captureMenuScroll,
          inputValue = _this$props12.inputValue,
          isLoading = _this$props12.isLoading,
          loadingMessage = _this$props12.loadingMessage,
          minMenuHeight = _this$props12.minMenuHeight,
          maxMenuHeight = _this$props12.maxMenuHeight,
          menuIsOpen = _this$props12.menuIsOpen,
          menuPlacement = _this$props12.menuPlacement,
          menuPosition = _this$props12.menuPosition,
          menuPortalTarget = _this$props12.menuPortalTarget,
          menuShouldBlockScroll = _this$props12.menuShouldBlockScroll,
          menuShouldScrollIntoView = _this$props12.menuShouldScrollIntoView,
          noOptionsMessage = _this$props12.noOptionsMessage,
          onMenuScrollToTop = _this$props12.onMenuScrollToTop,
          onMenuScrollToBottom = _this$props12.onMenuScrollToBottom;
      if (!menuIsOpen) return null; // TODO: Internal Option Type here

      var render = function render(props, id) {
        var type = props.type,
            data = props.data,
            isDisabled = props.isDisabled,
            isSelected = props.isSelected,
            label = props.label,
            value = props.value;
        var isFocused = focusedOption === data;
        var onHover = isDisabled ? undefined : function () {
          return _this4.onOptionHover(data);
        };
        var onSelect = isDisabled ? undefined : function () {
          return _this4.selectOption(data);
        };
        var optionId = "".concat(_this4.getElementId('option'), "-").concat(id);
        var innerProps = {
          id: optionId,
          onClick: onSelect,
          onMouseMove: onHover,
          onMouseOver: onHover,
          tabIndex: -1
        };
        return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(Option, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, commonProps, {
          innerProps: innerProps,
          data: data,
          isDisabled: isDisabled,
          isSelected: isSelected,
          key: optionId,
          label: label,
          type: type,
          value: value,
          isFocused: isFocused,
          innerRef: isFocused ? _this4.getFocusedOptionRef : undefined
        }), _this4.formatOptionLabel(props.data, 'menu'));
      };

      var menuUI;

      if (this.hasOptions()) {
        menuUI = this.getCategorizedOptions().map(function (item) {
          if (item.type === 'group') {
            var data = item.data,
                options = item.options,
                groupIndex = item.index;
            var groupId = "".concat(_this4.getElementId('group'), "-").concat(groupIndex);
            var headingId = "".concat(groupId, "-heading");
            return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(Group, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, commonProps, {
              key: groupId,
              data: data,
              options: options,
              Heading: GroupHeading,
              headingProps: {
                id: headingId,
                data: item.data
              },
              label: _this4.formatGroupLabel(item.data)
            }), item.options.map(function (option) {
              return render(option, "".concat(groupIndex, "-").concat(option.index));
            }));
          } else if (item.type === 'option') {
            return render(item, "".concat(item.index));
          }
        });
      } else if (isLoading) {
        var message = loadingMessage({
          inputValue: inputValue
        });
        if (message === null) return null;
        menuUI = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(LoadingMessage, commonProps, message);
      } else {
        var _message = noOptionsMessage({
          inputValue: inputValue
        });

        if (_message === null) return null;
        menuUI = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(NoOptionsMessage, commonProps, _message);
      }

      var menuPlacementProps = {
        minMenuHeight: minMenuHeight,
        maxMenuHeight: maxMenuHeight,
        menuPlacement: menuPlacement,
        menuPosition: menuPosition,
        menuShouldScrollIntoView: menuShouldScrollIntoView
      };
      var menuElement = /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(_index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["M"], Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, commonProps, menuPlacementProps), function (_ref4) {
        var ref = _ref4.ref,
            _ref4$placerProps = _ref4.placerProps,
            placement = _ref4$placerProps.placement,
            maxHeight = _ref4$placerProps.maxHeight;
        return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(Menu, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, commonProps, menuPlacementProps, {
          innerRef: ref,
          innerProps: {
            onMouseDown: _this4.onMenuMouseDown,
            onMouseMove: _this4.onMenuMouseMove
          },
          isLoading: isLoading,
          placement: placement
        }), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(ScrollManager, {
          captureEnabled: captureMenuScroll,
          onTopArrive: onMenuScrollToTop,
          onBottomArrive: onMenuScrollToBottom,
          lockEnabled: menuShouldBlockScroll
        }, function (scrollTargetRef) {
          return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(MenuList, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, commonProps, {
            innerRef: function innerRef(instance) {
              _this4.getMenuListRef(instance);

              scrollTargetRef(instance);
            },
            isLoading: isLoading,
            maxHeight: maxHeight,
            focusedOption: focusedOption
          }), menuUI);
        }));
      }); // positioning behaviour is almost identical for portalled and fixed,
      // so we use the same component. the actual portalling logic is forked
      // within the component based on `menuPosition`

      return menuPortalTarget || menuPosition === 'fixed' ? /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(MenuPortal, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, commonProps, {
        appendTo: menuPortalTarget,
        controlElement: this.controlRef,
        menuPlacement: menuPlacement,
        menuPosition: menuPosition
      }), menuElement) : menuElement;
    }
  }, {
    key: "renderFormField",
    value: function renderFormField() {
      var _this5 = this;

      var _this$props13 = this.props,
          delimiter = _this$props13.delimiter,
          isDisabled = _this$props13.isDisabled,
          isMulti = _this$props13.isMulti,
          name = _this$props13.name;
      var selectValue = this.state.selectValue;
      if (!name || isDisabled) return;

      if (isMulti) {
        if (delimiter) {
          var value = selectValue.map(function (opt) {
            return _this5.getOptionValue(opt);
          }).join(delimiter);
          return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement("input", {
            name: name,
            type: "hidden",
            value: value
          });
        } else {
          var input = selectValue.length > 0 ? selectValue.map(function (opt, i) {
            return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement("input", {
              key: "i-".concat(i),
              name: name,
              type: "hidden",
              value: _this5.getOptionValue(opt)
            });
          }) : /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement("input", {
            name: name,
            type: "hidden"
          });
          return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement("div", null, input);
        }
      } else {
        var _value = selectValue[0] ? this.getOptionValue(selectValue[0]) : '';

        return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement("input", {
          name: name,
          type: "hidden",
          value: _value
        });
      }
    }
  }, {
    key: "renderLiveRegion",
    value: function renderLiveRegion() {
      var commonProps = this.commonProps;
      var _this$state5 = this.state,
          ariaSelection = _this$state5.ariaSelection,
          focusedOption = _this$state5.focusedOption,
          focusedValue = _this$state5.focusedValue,
          isFocused = _this$state5.isFocused,
          selectValue = _this$state5.selectValue;
      var focusableOptions = this.getFocusableOptions();
      return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(LiveRegion, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, commonProps, {
        ariaSelection: ariaSelection,
        focusedOption: focusedOption,
        focusedValue: focusedValue,
        isFocused: isFocused,
        selectValue: selectValue,
        focusableOptions: focusableOptions
      }));
    }
  }, {
    key: "render",
    value: function render() {
      var _this$getComponents8 = this.getComponents(),
          Control = _this$getComponents8.Control,
          IndicatorsContainer = _this$getComponents8.IndicatorsContainer,
          SelectContainer = _this$getComponents8.SelectContainer,
          ValueContainer = _this$getComponents8.ValueContainer;

      var _this$props14 = this.props,
          className = _this$props14.className,
          id = _this$props14.id,
          isDisabled = _this$props14.isDisabled,
          menuIsOpen = _this$props14.menuIsOpen;
      var isFocused = this.state.isFocused;
      var commonProps = this.commonProps = this.getCommonProps();
      return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(SelectContainer, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, commonProps, {
        className: className,
        innerProps: {
          id: id,
          onKeyDown: this.onKeyDown
        },
        isDisabled: isDisabled,
        isFocused: isFocused
      }), this.renderLiveRegion(), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(Control, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, commonProps, {
        innerRef: this.getControlRef,
        innerProps: {
          onMouseDown: this.onControlMouseDown,
          onTouchEnd: this.onControlTouchEnd
        },
        isDisabled: isDisabled,
        isFocused: isFocused,
        menuIsOpen: menuIsOpen
      }), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(ValueContainer, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, commonProps, {
        isDisabled: isDisabled
      }), this.renderPlaceholderOrValue(), this.renderInput()), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(IndicatorsContainer, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, commonProps, {
        isDisabled: isDisabled
      }), this.renderClearIndicator(), this.renderLoadingIndicator(), this.renderIndicatorSeparator(), this.renderDropdownIndicator())), this.renderMenu(), this.renderFormField());
    }
  }], [{
    key: "getDerivedStateFromProps",
    value: function getDerivedStateFromProps(props, state) {
      var prevProps = state.prevProps,
          clearFocusValueOnUpdate = state.clearFocusValueOnUpdate,
          inputIsHiddenAfterUpdate = state.inputIsHiddenAfterUpdate;
      var options = props.options,
          value = props.value,
          menuIsOpen = props.menuIsOpen,
          inputValue = props.inputValue;
      var newMenuOptionsState = {};

      if (prevProps && (value !== prevProps.value || options !== prevProps.options || menuIsOpen !== prevProps.menuIsOpen || inputValue !== prevProps.inputValue)) {
        var selectValue = Object(_index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["E"])(value);
        var focusableOptions = menuIsOpen ? buildFocusableOptions(props, selectValue) : [];
        var focusedValue = clearFocusValueOnUpdate ? getNextFocusedValue(state, selectValue) : null;
        var focusedOption = getNextFocusedOption(state, focusableOptions);
        newMenuOptionsState = {
          selectValue: selectValue,
          focusedOption: focusedOption,
          focusedValue: focusedValue,
          clearFocusValueOnUpdate: false
        };
      } // some updates should toggle the state of the input visibility


      var newInputIsHiddenState = inputIsHiddenAfterUpdate != null && props !== prevProps ? {
        inputIsHidden: inputIsHiddenAfterUpdate,
        inputIsHiddenAfterUpdate: undefined
      } : {};
      return Object(_index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["a"])(Object(_index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["a"])(Object(_index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_1__["a"])({}, newMenuOptionsState), newInputIsHiddenState), {}, {
        prevProps: props
      });
    }
  }]);

  return Select;
}(react__WEBPACK_IMPORTED_MODULE_6__["Component"]);

Select.defaultProps = defaultProps;




/***/ }),

/***/ "./node_modules/react-select/dist/index-4bd03571.esm.js":
/*!**************************************************************!*\
  !*** ./node_modules/react-select/dist/index-4bd03571.esm.js ***!
  \**************************************************************/
/*! exports provided: A, B, C, D, E, F, G, H, M, _, a, b, c, d, e, f, g, h, i, j, k, l, m, n, o, p, q, r, s, t, u, v, w, x, y, z */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "A", function() { return isMobileDevice; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "B", function() { return classNames; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "C", function() { return defaultComponents; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "D", function() { return isDocumentElement; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "E", function() { return cleanValue; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "F", function() { return scrollIntoView; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "G", function() { return noop; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "H", function() { return handleInputChange; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "M", function() { return MenuPlacer; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "_", function() { return _createSuper; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return _objectSpread2; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "b", function() { return clearIndicatorCSS; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "c", function() { return components; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "d", function() { return containerCSS; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "e", function() { return css; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "f", function() { return dropdownIndicatorCSS; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "g", function() { return groupCSS; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "h", function() { return groupHeadingCSS; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "i", function() { return indicatorsContainerCSS; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "j", function() { return indicatorSeparatorCSS; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "k", function() { return inputCSS; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "l", function() { return loadingIndicatorCSS; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "m", function() { return loadingMessageCSS; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "n", function() { return menuCSS; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "o", function() { return menuListCSS; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "p", function() { return menuPortalCSS; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "q", function() { return multiValueCSS; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "r", function() { return multiValueLabelCSS; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "s", function() { return supportsPassiveEvents; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "t", function() { return multiValueRemoveCSS; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "u", function() { return noOptionsMessageCSS; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "v", function() { return optionCSS; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "w", function() { return placeholderCSS; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "x", function() { return css$1; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "y", function() { return valueContainerCSS; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "z", function() { return isTouchCapable; });
/* harmony import */ var _babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/extends */ "./node_modules/@babel/runtime/helpers/esm/extends.js");
/* harmony import */ var _emotion_react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @emotion/react */ "./node_modules/@emotion/react/dist/emotion-react.browser.esm.js");
/* harmony import */ var _babel_runtime_helpers_esm_taggedTemplateLiteral__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/esm/taggedTemplateLiteral */ "./node_modules/@babel/runtime/helpers/esm/taggedTemplateLiteral.js");
/* harmony import */ var _babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/esm/objectWithoutProperties */ "./node_modules/@babel/runtime/helpers/esm/objectWithoutProperties.js");
/* harmony import */ var _babel_runtime_helpers_esm_typeof__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/esm/typeof */ "./node_modules/@babel/runtime/helpers/esm/typeof.js");
/* harmony import */ var react_input_autosize__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! react-input-autosize */ "./node_modules/react-input-autosize/lib/AutosizeInput.js");
/* harmony import */ var react_input_autosize__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(react_input_autosize__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _babel_runtime_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @babel/runtime/helpers/esm/classCallCheck */ "./node_modules/@babel/runtime/helpers/esm/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @babel/runtime/helpers/esm/createClass */ "./node_modules/@babel/runtime/helpers/esm/createClass.js");
/* harmony import */ var _babel_runtime_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @babel/runtime/helpers/esm/inherits */ "./node_modules/@babel/runtime/helpers/esm/inherits.js");
/* harmony import */ var _babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! @babel/runtime/helpers/esm/defineProperty */ "./node_modules/@babel/runtime/helpers/esm/defineProperty.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! react-dom */ "react-dom");
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(react_dom__WEBPACK_IMPORTED_MODULE_11__);













function _defineProperty(obj, key, value) {
  if (key in obj) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }

  return obj;
}

function ownKeys(object, enumerableOnly) {
  var keys = Object.keys(object);

  if (Object.getOwnPropertySymbols) {
    var symbols = Object.getOwnPropertySymbols(object);
    if (enumerableOnly) symbols = symbols.filter(function (sym) {
      return Object.getOwnPropertyDescriptor(object, sym).enumerable;
    });
    keys.push.apply(keys, symbols);
  }

  return keys;
}

function _objectSpread2(target) {
  for (var i = 1; i < arguments.length; i++) {
    var source = arguments[i] != null ? arguments[i] : {};

    if (i % 2) {
      ownKeys(Object(source), true).forEach(function (key) {
        _defineProperty(target, key, source[key]);
      });
    } else if (Object.getOwnPropertyDescriptors) {
      Object.defineProperties(target, Object.getOwnPropertyDescriptors(source));
    } else {
      ownKeys(Object(source)).forEach(function (key) {
        Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key));
      });
    }
  }

  return target;
}

function _getPrototypeOf(o) {
  _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) {
    return o.__proto__ || Object.getPrototypeOf(o);
  };
  return _getPrototypeOf(o);
}

function _isNativeReflectConstruct() {
  if (typeof Reflect === "undefined" || !Reflect.construct) return false;
  if (Reflect.construct.sham) return false;
  if (typeof Proxy === "function") return true;

  try {
    Date.prototype.toString.call(Reflect.construct(Date, [], function () {}));
    return true;
  } catch (e) {
    return false;
  }
}

function _assertThisInitialized(self) {
  if (self === void 0) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return self;
}

function _possibleConstructorReturn(self, call) {
  if (call && (typeof call === "object" || typeof call === "function")) {
    return call;
  }

  return _assertThisInitialized(self);
}

function _createSuper(Derived) {
  var hasNativeReflectConstruct = _isNativeReflectConstruct();
  return function _createSuperInternal() {
    var Super = _getPrototypeOf(Derived),
        result;

    if (hasNativeReflectConstruct) {
      var NewTarget = _getPrototypeOf(this).constructor;
      result = Reflect.construct(Super, arguments, NewTarget);
    } else {
      result = Super.apply(this, arguments);
    }

    return _possibleConstructorReturn(this, result);
  };
}

// ==============================
// NO OP
// ==============================
var noop = function noop() {};
// Class Name Prefixer
// ==============================

/**
 String representation of component state for styling with class names.

 Expects an array of strings OR a string/object pair:
 - className(['comp', 'comp-arg', 'comp-arg-2'])
   @returns 'react-select__comp react-select__comp-arg react-select__comp-arg-2'
 - className('comp', { some: true, state: false })
   @returns 'react-select__comp react-select__comp--some'
*/

function applyPrefixToName(prefix, name) {
  if (!name) {
    return prefix;
  } else if (name[0] === '-') {
    return prefix + name;
  } else {
    return prefix + '__' + name;
  }
}

function classNames(prefix, state, className) {
  var arr = [className];

  if (state && prefix) {
    for (var key in state) {
      if (state.hasOwnProperty(key) && state[key]) {
        arr.push("".concat(applyPrefixToName(prefix, key)));
      }
    }
  }

  return arr.filter(function (i) {
    return i;
  }).map(function (i) {
    return String(i).trim();
  }).join(' ');
} // ==============================
// Clean Value
// ==============================

var cleanValue = function cleanValue(value) {
  if (Array.isArray(value)) return value.filter(Boolean);
  if (Object(_babel_runtime_helpers_esm_typeof__WEBPACK_IMPORTED_MODULE_4__["default"])(value) === 'object' && value !== null) return [value];
  return [];
}; // ==============================
// Clean Common Props
// ==============================

var cleanCommonProps = function cleanCommonProps(props) {
  //className
  props.className;
      props.clearValue;
      props.cx;
      props.getStyles;
      props.getValue;
      props.hasValue;
      props.isMulti;
      props.isRtl;
      props.options;
      props.selectOption;
      props.selectProps;
      props.setValue;
      props.theme;
      var innerProps = Object(_babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_3__["default"])(props, ["className", "clearValue", "cx", "getStyles", "getValue", "hasValue", "isMulti", "isRtl", "options", "selectOption", "selectProps", "setValue", "theme"]);

  return _objectSpread2({}, innerProps);
}; // ==============================
// Handle Input Change
// ==============================

function handleInputChange(inputValue, actionMeta, onInputChange) {
  if (onInputChange) {
    var newValue = onInputChange(inputValue, actionMeta);
    if (typeof newValue === 'string') return newValue;
  }

  return inputValue;
} // ==============================
// Scroll Helpers
// ==============================

function isDocumentElement(el) {
  return [document.documentElement, document.body, window].indexOf(el) > -1;
} // Normalized Scroll Top
// ------------------------------

function getScrollTop(el) {
  if (isDocumentElement(el)) {
    return window.pageYOffset;
  }

  return el.scrollTop;
}
function scrollTo(el, top) {
  // with a scroll distance, we perform scroll on the element
  if (isDocumentElement(el)) {
    window.scrollTo(0, top);
    return;
  }

  el.scrollTop = top;
} // Get Scroll Parent
// ------------------------------

function getScrollParent(element) {
  var style = getComputedStyle(element);
  var excludeStaticParent = style.position === 'absolute';
  var overflowRx = /(auto|scroll)/;
  var docEl = document.documentElement; // suck it, flow...

  if (style.position === 'fixed') return docEl;

  for (var parent = element; parent = parent.parentElement;) {
    style = getComputedStyle(parent);

    if (excludeStaticParent && style.position === 'static') {
      continue;
    }

    if (overflowRx.test(style.overflow + style.overflowY + style.overflowX)) {
      return parent;
    }
  }

  return docEl;
} // Animated Scroll To
// ------------------------------

/**
  @param t: time (elapsed)
  @param b: initial value
  @param c: amount of change
  @param d: duration
*/

function easeOutCubic(t, b, c, d) {
  return c * ((t = t / d - 1) * t * t + 1) + b;
}

function animatedScrollTo(element, to) {
  var duration = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 200;
  var callback = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : noop;
  var start = getScrollTop(element);
  var change = to - start;
  var increment = 10;
  var currentTime = 0;

  function animateScroll() {
    currentTime += increment;
    var val = easeOutCubic(currentTime, start, change, duration);
    scrollTo(element, val);

    if (currentTime < duration) {
      window.requestAnimationFrame(animateScroll);
    } else {
      callback(element);
    }
  }

  animateScroll();
} // Scroll Into View
// ------------------------------

function scrollIntoView(menuEl, focusedEl) {
  var menuRect = menuEl.getBoundingClientRect();
  var focusedRect = focusedEl.getBoundingClientRect();
  var overScroll = focusedEl.offsetHeight / 3;

  if (focusedRect.bottom + overScroll > menuRect.bottom) {
    scrollTo(menuEl, Math.min(focusedEl.offsetTop + focusedEl.clientHeight - menuEl.offsetHeight + overScroll, menuEl.scrollHeight));
  } else if (focusedRect.top - overScroll < menuRect.top) {
    scrollTo(menuEl, Math.max(focusedEl.offsetTop - overScroll, 0));
  }
} // ==============================
// Get bounding client object
// ==============================
// cannot get keys using array notation with DOMRect

function getBoundingClientObj(element) {
  var rect = element.getBoundingClientRect();
  return {
    bottom: rect.bottom,
    height: rect.height,
    left: rect.left,
    right: rect.right,
    top: rect.top,
    width: rect.width
  };
}
// Touch Capability Detector
// ==============================

function isTouchCapable() {
  try {
    document.createEvent('TouchEvent');
    return true;
  } catch (e) {
    return false;
  }
} // ==============================
// Mobile Device Detector
// ==============================

function isMobileDevice() {
  try {
    return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
  } catch (e) {
    return false;
  }
} // ==============================
// Passive Event Detector
// ==============================
// https://github.com/rafgraph/detect-it/blob/main/src/index.ts#L19-L36

var passiveOptionAccessed = false;
var options = {
  get passive() {
    return passiveOptionAccessed = true;
  }

}; // check for SSR

var w = typeof window !== 'undefined' ? window : {};

if (w.addEventListener && w.removeEventListener) {
  w.addEventListener('p', noop, options);
  w.removeEventListener('p', noop, false);
}

var supportsPassiveEvents = passiveOptionAccessed;

function getMenuPlacement(_ref) {
  var maxHeight = _ref.maxHeight,
      menuEl = _ref.menuEl,
      minHeight = _ref.minHeight,
      placement = _ref.placement,
      shouldScroll = _ref.shouldScroll,
      isFixedPosition = _ref.isFixedPosition,
      theme = _ref.theme;
  var spacing = theme.spacing;
  var scrollParent = getScrollParent(menuEl);
  var defaultState = {
    placement: 'bottom',
    maxHeight: maxHeight
  }; // something went wrong, return default state

  if (!menuEl || !menuEl.offsetParent) return defaultState; // we can't trust `scrollParent.scrollHeight` --> it may increase when
  // the menu is rendered

  var _scrollParent$getBoun = scrollParent.getBoundingClientRect(),
      scrollHeight = _scrollParent$getBoun.height;

  var _menuEl$getBoundingCl = menuEl.getBoundingClientRect(),
      menuBottom = _menuEl$getBoundingCl.bottom,
      menuHeight = _menuEl$getBoundingCl.height,
      menuTop = _menuEl$getBoundingCl.top;

  var _menuEl$offsetParent$ = menuEl.offsetParent.getBoundingClientRect(),
      containerTop = _menuEl$offsetParent$.top;

  var viewHeight = window.innerHeight;
  var scrollTop = getScrollTop(scrollParent);
  var marginBottom = parseInt(getComputedStyle(menuEl).marginBottom, 10);
  var marginTop = parseInt(getComputedStyle(menuEl).marginTop, 10);
  var viewSpaceAbove = containerTop - marginTop;
  var viewSpaceBelow = viewHeight - menuTop;
  var scrollSpaceAbove = viewSpaceAbove + scrollTop;
  var scrollSpaceBelow = scrollHeight - scrollTop - menuTop;
  var scrollDown = menuBottom - viewHeight + scrollTop + marginBottom;
  var scrollUp = scrollTop + menuTop - marginTop;
  var scrollDuration = 160;

  switch (placement) {
    case 'auto':
    case 'bottom':
      // 1: the menu will fit, do nothing
      if (viewSpaceBelow >= menuHeight) {
        return {
          placement: 'bottom',
          maxHeight: maxHeight
        };
      } // 2: the menu will fit, if scrolled


      if (scrollSpaceBelow >= menuHeight && !isFixedPosition) {
        if (shouldScroll) {
          animatedScrollTo(scrollParent, scrollDown, scrollDuration);
        }

        return {
          placement: 'bottom',
          maxHeight: maxHeight
        };
      } // 3: the menu will fit, if constrained


      if (!isFixedPosition && scrollSpaceBelow >= minHeight || isFixedPosition && viewSpaceBelow >= minHeight) {
        if (shouldScroll) {
          animatedScrollTo(scrollParent, scrollDown, scrollDuration);
        } // we want to provide as much of the menu as possible to the user,
        // so give them whatever is available below rather than the minHeight.


        var constrainedHeight = isFixedPosition ? viewSpaceBelow - marginBottom : scrollSpaceBelow - marginBottom;
        return {
          placement: 'bottom',
          maxHeight: constrainedHeight
        };
      } // 4. Forked beviour when there isn't enough space below
      // AUTO: flip the menu, render above


      if (placement === 'auto' || isFixedPosition) {
        // may need to be constrained after flipping
        var _constrainedHeight = maxHeight;
        var spaceAbove = isFixedPosition ? viewSpaceAbove : scrollSpaceAbove;

        if (spaceAbove >= minHeight) {
          _constrainedHeight = Math.min(spaceAbove - marginBottom - spacing.controlHeight, maxHeight);
        }

        return {
          placement: 'top',
          maxHeight: _constrainedHeight
        };
      } // BOTTOM: allow browser to increase scrollable area and immediately set scroll


      if (placement === 'bottom') {
        if (shouldScroll) {
          scrollTo(scrollParent, scrollDown);
        }

        return {
          placement: 'bottom',
          maxHeight: maxHeight
        };
      }

      break;

    case 'top':
      // 1: the menu will fit, do nothing
      if (viewSpaceAbove >= menuHeight) {
        return {
          placement: 'top',
          maxHeight: maxHeight
        };
      } // 2: the menu will fit, if scrolled


      if (scrollSpaceAbove >= menuHeight && !isFixedPosition) {
        if (shouldScroll) {
          animatedScrollTo(scrollParent, scrollUp, scrollDuration);
        }

        return {
          placement: 'top',
          maxHeight: maxHeight
        };
      } // 3: the menu will fit, if constrained


      if (!isFixedPosition && scrollSpaceAbove >= minHeight || isFixedPosition && viewSpaceAbove >= minHeight) {
        var _constrainedHeight2 = maxHeight; // we want to provide as much of the menu as possible to the user,
        // so give them whatever is available below rather than the minHeight.

        if (!isFixedPosition && scrollSpaceAbove >= minHeight || isFixedPosition && viewSpaceAbove >= minHeight) {
          _constrainedHeight2 = isFixedPosition ? viewSpaceAbove - marginTop : scrollSpaceAbove - marginTop;
        }

        if (shouldScroll) {
          animatedScrollTo(scrollParent, scrollUp, scrollDuration);
        }

        return {
          placement: 'top',
          maxHeight: _constrainedHeight2
        };
      } // 4. not enough space, the browser WILL NOT increase scrollable area when
      // absolutely positioned element rendered above the viewport (only below).
      // Flip the menu, render below


      return {
        placement: 'bottom',
        maxHeight: maxHeight
      };

    default:
      throw new Error("Invalid placement provided \"".concat(placement, "\"."));
  } // fulfil contract with flow: implicit return value of undefined


  return defaultState;
} // Menu Component
// ------------------------------

function alignToControl(placement) {
  var placementToCSSProp = {
    bottom: 'top',
    top: 'bottom'
  };
  return placement ? placementToCSSProp[placement] : 'bottom';
}

var coercePlacement = function coercePlacement(p) {
  return p === 'auto' ? 'bottom' : p;
};

var menuCSS = function menuCSS(_ref2) {
  var _ref3;

  var placement = _ref2.placement,
      _ref2$theme = _ref2.theme,
      borderRadius = _ref2$theme.borderRadius,
      spacing = _ref2$theme.spacing,
      colors = _ref2$theme.colors;
  return _ref3 = {
    label: 'menu'
  }, Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_9__["default"])(_ref3, alignToControl(placement), '100%'), Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_9__["default"])(_ref3, "backgroundColor", colors.neutral0), Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_9__["default"])(_ref3, "borderRadius", borderRadius), Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_9__["default"])(_ref3, "boxShadow", '0 0 0 1px hsla(0, 0%, 0%, 0.1), 0 4px 11px hsla(0, 0%, 0%, 0.1)'), Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_9__["default"])(_ref3, "marginBottom", spacing.menuGutter), Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_9__["default"])(_ref3, "marginTop", spacing.menuGutter), Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_9__["default"])(_ref3, "position", 'absolute'), Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_9__["default"])(_ref3, "width", '100%'), Object(_babel_runtime_helpers_esm_defineProperty__WEBPACK_IMPORTED_MODULE_9__["default"])(_ref3, "zIndex", 1), _ref3;
};
var PortalPlacementContext = /*#__PURE__*/Object(react__WEBPACK_IMPORTED_MODULE_10__["createContext"])({
  getPortalPlacement: null
}); // NOTE: internal only

var MenuPlacer = /*#__PURE__*/function (_Component) {
  Object(_babel_runtime_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_8__["default"])(MenuPlacer, _Component);

  var _super = _createSuper(MenuPlacer);

  function MenuPlacer() {
    var _this;

    Object(_babel_runtime_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_6__["default"])(this, MenuPlacer);

    for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
      args[_key] = arguments[_key];
    }

    _this = _super.call.apply(_super, [this].concat(args));
    _this.state = {
      maxHeight: _this.props.maxMenuHeight,
      placement: null
    };

    _this.getPlacement = function (ref) {
      var _this$props = _this.props,
          minMenuHeight = _this$props.minMenuHeight,
          maxMenuHeight = _this$props.maxMenuHeight,
          menuPlacement = _this$props.menuPlacement,
          menuPosition = _this$props.menuPosition,
          menuShouldScrollIntoView = _this$props.menuShouldScrollIntoView,
          theme = _this$props.theme;
      if (!ref) return; // DO NOT scroll if position is fixed

      var isFixedPosition = menuPosition === 'fixed';
      var shouldScroll = menuShouldScrollIntoView && !isFixedPosition;
      var state = getMenuPlacement({
        maxHeight: maxMenuHeight,
        menuEl: ref,
        minHeight: minMenuHeight,
        placement: menuPlacement,
        shouldScroll: shouldScroll,
        isFixedPosition: isFixedPosition,
        theme: theme
      });
      var getPortalPlacement = _this.context.getPortalPlacement;
      if (getPortalPlacement) getPortalPlacement(state);

      _this.setState(state);
    };

    _this.getUpdatedProps = function () {
      var menuPlacement = _this.props.menuPlacement;
      var placement = _this.state.placement || coercePlacement(menuPlacement);
      return _objectSpread2(_objectSpread2({}, _this.props), {}, {
        placement: placement,
        maxHeight: _this.state.maxHeight
      });
    };

    return _this;
  }

  Object(_babel_runtime_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_7__["default"])(MenuPlacer, [{
    key: "render",
    value: function render() {
      var children = this.props.children;
      return children({
        ref: this.getPlacement,
        placerProps: this.getUpdatedProps()
      });
    }
  }]);

  return MenuPlacer;
}(react__WEBPACK_IMPORTED_MODULE_10__["Component"]);
MenuPlacer.contextType = PortalPlacementContext;

var Menu = function Menu(props) {
  var children = props.children,
      className = props.className,
      cx = props.cx,
      getStyles = props.getStyles,
      innerRef = props.innerRef,
      innerProps = props.innerProps;
  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("div", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    css: getStyles('menu', props),
    className: cx({
      menu: true
    }, className),
    ref: innerRef
  }, innerProps), children);
};
// Menu List
// ==============================

var menuListCSS = function menuListCSS(_ref4) {
  var maxHeight = _ref4.maxHeight,
      baseUnit = _ref4.theme.spacing.baseUnit;
  return {
    maxHeight: maxHeight,
    overflowY: 'auto',
    paddingBottom: baseUnit,
    paddingTop: baseUnit,
    position: 'relative',
    // required for offset[Height, Top] > keyboard scroll
    WebkitOverflowScrolling: 'touch'
  };
};
var MenuList = function MenuList(props) {
  var children = props.children,
      className = props.className,
      cx = props.cx,
      getStyles = props.getStyles,
      innerProps = props.innerProps,
      innerRef = props.innerRef,
      isMulti = props.isMulti;
  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("div", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    css: getStyles('menuList', props),
    className: cx({
      'menu-list': true,
      'menu-list--is-multi': isMulti
    }, className),
    ref: innerRef
  }, innerProps), children);
}; // ==============================
// Menu Notices
// ==============================

var noticeCSS = function noticeCSS(_ref5) {
  var _ref5$theme = _ref5.theme,
      baseUnit = _ref5$theme.spacing.baseUnit,
      colors = _ref5$theme.colors;
  return {
    color: colors.neutral40,
    padding: "".concat(baseUnit * 2, "px ").concat(baseUnit * 3, "px"),
    textAlign: 'center'
  };
};

var noOptionsMessageCSS = noticeCSS;
var loadingMessageCSS = noticeCSS;
var NoOptionsMessage = function NoOptionsMessage(props) {
  var children = props.children,
      className = props.className,
      cx = props.cx,
      getStyles = props.getStyles,
      innerProps = props.innerProps;
  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("div", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    css: getStyles('noOptionsMessage', props),
    className: cx({
      'menu-notice': true,
      'menu-notice--no-options': true
    }, className)
  }, innerProps), children);
};
NoOptionsMessage.defaultProps = {
  children: 'No options'
};
var LoadingMessage = function LoadingMessage(props) {
  var children = props.children,
      className = props.className,
      cx = props.cx,
      getStyles = props.getStyles,
      innerProps = props.innerProps;
  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("div", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    css: getStyles('loadingMessage', props),
    className: cx({
      'menu-notice': true,
      'menu-notice--loading': true
    }, className)
  }, innerProps), children);
};
LoadingMessage.defaultProps = {
  children: 'Loading...'
}; // ==============================
// Menu Portal
// ==============================

var menuPortalCSS = function menuPortalCSS(_ref6) {
  var rect = _ref6.rect,
      offset = _ref6.offset,
      position = _ref6.position;
  return {
    left: rect.left,
    position: position,
    top: offset,
    width: rect.width,
    zIndex: 1
  };
};
var MenuPortal = /*#__PURE__*/function (_Component2) {
  Object(_babel_runtime_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_8__["default"])(MenuPortal, _Component2);

  var _super2 = _createSuper(MenuPortal);

  function MenuPortal() {
    var _this2;

    Object(_babel_runtime_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_6__["default"])(this, MenuPortal);

    for (var _len2 = arguments.length, args = new Array(_len2), _key2 = 0; _key2 < _len2; _key2++) {
      args[_key2] = arguments[_key2];
    }

    _this2 = _super2.call.apply(_super2, [this].concat(args));
    _this2.state = {
      placement: null
    };

    _this2.getPortalPlacement = function (_ref7) {
      var placement = _ref7.placement;
      var initialPlacement = coercePlacement(_this2.props.menuPlacement); // avoid re-renders if the placement has not changed

      if (placement !== initialPlacement) {
        _this2.setState({
          placement: placement
        });
      }
    };

    return _this2;
  }

  Object(_babel_runtime_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_7__["default"])(MenuPortal, [{
    key: "render",
    value: function render() {
      var _this$props2 = this.props,
          appendTo = _this$props2.appendTo,
          children = _this$props2.children,
          className = _this$props2.className,
          controlElement = _this$props2.controlElement,
          cx = _this$props2.cx,
          innerProps = _this$props2.innerProps,
          menuPlacement = _this$props2.menuPlacement,
          position = _this$props2.menuPosition,
          getStyles = _this$props2.getStyles;
      var isFixed = position === 'fixed'; // bail early if required elements aren't present

      if (!appendTo && !isFixed || !controlElement) {
        return null;
      }

      var placement = this.state.placement || coercePlacement(menuPlacement);
      var rect = getBoundingClientObj(controlElement);
      var scrollDistance = isFixed ? 0 : window.pageYOffset;
      var offset = rect[placement] + scrollDistance;
      var state = {
        offset: offset,
        position: position,
        rect: rect
      }; // same wrapper element whether fixed or portalled

      var menuWrapper = Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("div", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
        css: getStyles('menuPortal', state),
        className: cx({
          'menu-portal': true
        }, className)
      }, innerProps), children);
      return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])(PortalPlacementContext.Provider, {
        value: {
          getPortalPlacement: this.getPortalPlacement
        }
      }, appendTo ? /*#__PURE__*/Object(react_dom__WEBPACK_IMPORTED_MODULE_11__["createPortal"])(menuWrapper, appendTo) : menuWrapper);
    }
  }]);

  return MenuPortal;
}(react__WEBPACK_IMPORTED_MODULE_10__["Component"]);

var containerCSS = function containerCSS(_ref) {
  var isDisabled = _ref.isDisabled,
      isRtl = _ref.isRtl;
  return {
    label: 'container',
    direction: isRtl ? 'rtl' : null,
    pointerEvents: isDisabled ? 'none' : null,
    // cancel mouse events when disabled
    position: 'relative'
  };
};
var SelectContainer = function SelectContainer(props) {
  var children = props.children,
      className = props.className,
      cx = props.cx,
      getStyles = props.getStyles,
      innerProps = props.innerProps,
      isDisabled = props.isDisabled,
      isRtl = props.isRtl;
  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("div", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    css: getStyles('container', props),
    className: cx({
      '--is-disabled': isDisabled,
      '--is-rtl': isRtl
    }, className)
  }, innerProps), children);
}; // ==============================
// Value Container
// ==============================

var valueContainerCSS = function valueContainerCSS(_ref2) {
  var spacing = _ref2.theme.spacing;
  return {
    alignItems: 'center',
    display: 'flex',
    flex: 1,
    flexWrap: 'wrap',
    padding: "".concat(spacing.baseUnit / 2, "px ").concat(spacing.baseUnit * 2, "px"),
    WebkitOverflowScrolling: 'touch',
    position: 'relative',
    overflow: 'hidden'
  };
};
var ValueContainer = function ValueContainer(props) {
  var children = props.children,
      className = props.className,
      cx = props.cx,
      innerProps = props.innerProps,
      isMulti = props.isMulti,
      getStyles = props.getStyles,
      hasValue = props.hasValue;
  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("div", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    css: getStyles('valueContainer', props),
    className: cx({
      'value-container': true,
      'value-container--is-multi': isMulti,
      'value-container--has-value': hasValue
    }, className)
  }, innerProps), children);
}; // ==============================
// Indicator Container
// ==============================

var indicatorsContainerCSS = function indicatorsContainerCSS() {
  return {
    alignItems: 'center',
    alignSelf: 'stretch',
    display: 'flex',
    flexShrink: 0
  };
};
var IndicatorsContainer = function IndicatorsContainer(props) {
  var children = props.children,
      className = props.className,
      cx = props.cx,
      innerProps = props.innerProps,
      getStyles = props.getStyles;
  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("div", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    css: getStyles('indicatorsContainer', props),
    className: cx({
      indicators: true
    }, className)
  }, innerProps), children);
};

var _templateObject;

function _EMOTION_STRINGIFIED_CSS_ERROR__() { return "You have tried to stringify object returned from `css` function. It isn't supposed to be used directly (e.g. as value of the `className` prop), but rather handed to emotion so it can handle it (e.g. as value of `css` prop)."; }

var _ref2 =  false ? undefined : {
  name: "tj5bde-Svg",
  styles: "display:inline-block;fill:currentColor;line-height:1;stroke:currentColor;stroke-width:0;label:Svg;",
  map: "/*# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImluZGljYXRvcnMuanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBa0JJIiwiZmlsZSI6ImluZGljYXRvcnMuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvLyBAZmxvd1xuLyoqIEBqc3gganN4ICovXG5pbXBvcnQgeyB0eXBlIE5vZGUgfSBmcm9tICdyZWFjdCc7XG5pbXBvcnQgeyBqc3gsIGtleWZyYW1lcyB9IGZyb20gJ0BlbW90aW9uL3JlYWN0JztcblxuaW1wb3J0IHR5cGUgeyBDb21tb25Qcm9wcywgVGhlbWUgfSBmcm9tICcuLi90eXBlcyc7XG5cbi8vID09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuLy8gRHJvcGRvd24gJiBDbGVhciBJY29uc1xuLy8gPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09XG5cbmNvbnN0IFN2ZyA9ICh7IHNpemUsIC4uLnByb3BzIH06IHsgc2l6ZTogbnVtYmVyIH0pID0+IChcbiAgPHN2Z1xuICAgIGhlaWdodD17c2l6ZX1cbiAgICB3aWR0aD17c2l6ZX1cbiAgICB2aWV3Qm94PVwiMCAwIDIwIDIwXCJcbiAgICBhcmlhLWhpZGRlbj1cInRydWVcIlxuICAgIGZvY3VzYWJsZT1cImZhbHNlXCJcbiAgICBjc3M9e3tcbiAgICAgIGRpc3BsYXk6ICdpbmxpbmUtYmxvY2snLFxuICAgICAgZmlsbDogJ2N1cnJlbnRDb2xvcicsXG4gICAgICBsaW5lSGVpZ2h0OiAxLFxuICAgICAgc3Ryb2tlOiAnY3VycmVudENvbG9yJyxcbiAgICAgIHN0cm9rZVdpZHRoOiAwLFxuICAgIH19XG4gICAgey4uLnByb3BzfVxuICAvPlxuKTtcblxuZXhwb3J0IGNvbnN0IENyb3NzSWNvbiA9IChwcm9wczogYW55KSA9PiAoXG4gIDxTdmcgc2l6ZT17MjB9IHsuLi5wcm9wc30+XG4gICAgPHBhdGggZD1cIk0xNC4zNDggMTQuODQ5Yy0wLjQ2OSAwLjQ2OS0xLjIyOSAwLjQ2OS0xLjY5NyAwbC0yLjY1MS0zLjAzMC0yLjY1MSAzLjAyOWMtMC40NjkgMC40NjktMS4yMjkgMC40NjktMS42OTcgMC0wLjQ2OS0wLjQ2OS0wLjQ2OS0xLjIyOSAwLTEuNjk3bDIuNzU4LTMuMTUtMi43NTktMy4xNTJjLTAuNDY5LTAuNDY5LTAuNDY5LTEuMjI4IDAtMS42OTdzMS4yMjgtMC40NjkgMS42OTcgMGwyLjY1MiAzLjAzMSAyLjY1MS0zLjAzMWMwLjQ2OS0wLjQ2OSAxLjIyOC0wLjQ2OSAxLjY5NyAwczAuNDY5IDEuMjI5IDAgMS42OTdsLTIuNzU4IDMuMTUyIDIuNzU4IDMuMTVjMC40NjkgMC40NjkgMC40NjkgMS4yMjkgMCAxLjY5OHpcIiAvPlxuICA8L1N2Zz5cbik7XG5leHBvcnQgY29uc3QgRG93bkNoZXZyb24gPSAocHJvcHM6IGFueSkgPT4gKFxuICA8U3ZnIHNpemU9ezIwfSB7Li4ucHJvcHN9PlxuICAgIDxwYXRoIGQ9XCJNNC41MTYgNy41NDhjMC40MzYtMC40NDYgMS4wNDMtMC40ODEgMS41NzYgMGwzLjkwOCAzLjc0NyAzLjkwOC0zLjc0N2MwLjUzMy0wLjQ4MSAxLjE0MS0wLjQ0NiAxLjU3NCAwIDAuNDM2IDAuNDQ1IDAuNDA4IDEuMTk3IDAgMS42MTUtMC40MDYgMC40MTgtNC42OTUgNC41MDItNC42OTUgNC41MDItMC4yMTcgMC4yMjMtMC41MDIgMC4zMzUtMC43ODcgMC4zMzVzLTAuNTctMC4xMTItMC43ODktMC4zMzVjMCAwLTQuMjg3LTQuMDg0LTQuNjk1LTQuNTAycy0wLjQzNi0xLjE3IDAtMS42MTV6XCIgLz5cbiAgPC9Tdmc+XG4pO1xuXG4vLyA9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT1cbi8vIERyb3Bkb3duICYgQ2xlYXIgQnV0dG9uc1xuLy8gPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09XG5cbmV4cG9ydCB0eXBlIEluZGljYXRvclByb3BzID0gQ29tbW9uUHJvcHMgJiB7XG4gIC8qKiBUaGUgY2hpbGRyZW4gdG8gYmUgcmVuZGVyZWQgaW5zaWRlIHRoZSBpbmRpY2F0b3IuICovXG4gIGNoaWxkcmVuOiBOb2RlLFxuICAvKiogUHJvcHMgdGhhdCB3aWxsIGJlIHBhc3NlZCBvbiB0byB0aGUgY2hpbGRyZW4uICovXG4gIGlubmVyUHJvcHM6IGFueSxcbiAgLyoqIFRoZSBmb2N1c2VkIHN0YXRlIG9mIHRoZSBzZWxlY3QuICovXG4gIGlzRm9jdXNlZDogYm9vbGVhbixcbiAgLyoqIFdoZXRoZXIgdGhlIHRleHQgaXMgcmlnaHQgdG8gbGVmdCAqL1xuICBpc1J0bDogYm9vbGVhbixcbn07XG5cbmNvbnN0IGJhc2VDU1MgPSAoe1xuICBpc0ZvY3VzZWQsXG4gIHRoZW1lOiB7XG4gICAgc3BhY2luZzogeyBiYXNlVW5pdCB9LFxuICAgIGNvbG9ycyxcbiAgfSxcbn06IEluZGljYXRvclByb3BzKSA9PiAoe1xuICBsYWJlbDogJ2luZGljYXRvckNvbnRhaW5lcicsXG4gIGNvbG9yOiBpc0ZvY3VzZWQgPyBjb2xvcnMubmV1dHJhbDYwIDogY29sb3JzLm5ldXRyYWwyMCxcbiAgZGlzcGxheTogJ2ZsZXgnLFxuICBwYWRkaW5nOiBiYXNlVW5pdCAqIDIsXG4gIHRyYW5zaXRpb246ICdjb2xvciAxNTBtcycsXG5cbiAgJzpob3Zlcic6IHtcbiAgICBjb2xvcjogaXNGb2N1c2VkID8gY29sb3JzLm5ldXRyYWw4MCA6IGNvbG9ycy5uZXV0cmFsNDAsXG4gIH0sXG59KTtcblxuZXhwb3J0IGNvbnN0IGRyb3Bkb3duSW5kaWNhdG9yQ1NTID0gYmFzZUNTUztcbmV4cG9ydCBjb25zdCBEcm9wZG93bkluZGljYXRvciA9IChwcm9wczogSW5kaWNhdG9yUHJvcHMpID0+IHtcbiAgY29uc3QgeyBjaGlsZHJlbiwgY2xhc3NOYW1lLCBjeCwgZ2V0U3R5bGVzLCBpbm5lclByb3BzIH0gPSBwcm9wcztcbiAgcmV0dXJuIChcbiAgICA8ZGl2XG4gICAgICBjc3M9e2dldFN0eWxlcygnZHJvcGRvd25JbmRpY2F0b3InLCBwcm9wcyl9XG4gICAgICBjbGFzc05hbWU9e2N4KFxuICAgICAgICB7XG4gICAgICAgICAgaW5kaWNhdG9yOiB0cnVlLFxuICAgICAgICAgICdkcm9wZG93bi1pbmRpY2F0b3InOiB0cnVlLFxuICAgICAgICB9LFxuICAgICAgICBjbGFzc05hbWVcbiAgICAgICl9XG4gICAgICB7Li4uaW5uZXJQcm9wc31cbiAgICA+XG4gICAgICB7Y2hpbGRyZW4gfHwgPERvd25DaGV2cm9uIC8+fVxuICAgIDwvZGl2PlxuICApO1xufTtcblxuZXhwb3J0IGNvbnN0IGNsZWFySW5kaWNhdG9yQ1NTID0gYmFzZUNTUztcbmV4cG9ydCBjb25zdCBDbGVhckluZGljYXRvciA9IChwcm9wczogSW5kaWNhdG9yUHJvcHMpID0+IHtcbiAgY29uc3QgeyBjaGlsZHJlbiwgY2xhc3NOYW1lLCBjeCwgZ2V0U3R5bGVzLCBpbm5lclByb3BzIH0gPSBwcm9wcztcbiAgcmV0dXJuIChcbiAgICA8ZGl2XG4gICAgICBjc3M9e2dldFN0eWxlcygnY2xlYXJJbmRpY2F0b3InLCBwcm9wcyl9XG4gICAgICBjbGFzc05hbWU9e2N4KFxuICAgICAgICB7XG4gICAgICAgICAgaW5kaWNhdG9yOiB0cnVlLFxuICAgICAgICAgICdjbGVhci1pbmRpY2F0b3InOiB0cnVlLFxuICAgICAgICB9LFxuICAgICAgICBjbGFzc05hbWVcbiAgICAgICl9XG4gICAgICB7Li4uaW5uZXJQcm9wc31cbiAgICA+XG4gICAgICB7Y2hpbGRyZW4gfHwgPENyb3NzSWNvbiAvPn1cbiAgICA8L2Rpdj5cbiAgKTtcbn07XG5cbi8vID09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuLy8gU2VwYXJhdG9yXG4vLyA9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT1cblxudHlwZSBTZXBhcmF0b3JTdGF0ZSA9IHsgaXNEaXNhYmxlZDogYm9vbGVhbiB9O1xuXG5leHBvcnQgY29uc3QgaW5kaWNhdG9yU2VwYXJhdG9yQ1NTID0gKHtcbiAgaXNEaXNhYmxlZCxcbiAgdGhlbWU6IHtcbiAgICBzcGFjaW5nOiB7IGJhc2VVbml0IH0sXG4gICAgY29sb3JzLFxuICB9LFxufTogQ29tbW9uUHJvcHMgJiBTZXBhcmF0b3JTdGF0ZSkgPT4gKHtcbiAgbGFiZWw6ICdpbmRpY2F0b3JTZXBhcmF0b3InLFxuICBhbGlnblNlbGY6ICdzdHJldGNoJyxcbiAgYmFja2dyb3VuZENvbG9yOiBpc0Rpc2FibGVkID8gY29sb3JzLm5ldXRyYWwxMCA6IGNvbG9ycy5uZXV0cmFsMjAsXG4gIG1hcmdpbkJvdHRvbTogYmFzZVVuaXQgKiAyLFxuICBtYXJnaW5Ub3A6IGJhc2VVbml0ICogMixcbiAgd2lkdGg6IDEsXG59KTtcblxuZXhwb3J0IGNvbnN0IEluZGljYXRvclNlcGFyYXRvciA9IChwcm9wczogSW5kaWNhdG9yUHJvcHMpID0+IHtcbiAgY29uc3QgeyBjbGFzc05hbWUsIGN4LCBnZXRTdHlsZXMsIGlubmVyUHJvcHMgfSA9IHByb3BzO1xuICByZXR1cm4gKFxuICAgIDxzcGFuXG4gICAgICB7Li4uaW5uZXJQcm9wc31cbiAgICAgIGNzcz17Z2V0U3R5bGVzKCdpbmRpY2F0b3JTZXBhcmF0b3InLCBwcm9wcyl9XG4gICAgICBjbGFzc05hbWU9e2N4KHsgJ2luZGljYXRvci1zZXBhcmF0b3InOiB0cnVlIH0sIGNsYXNzTmFtZSl9XG4gICAgLz5cbiAgKTtcbn07XG5cbi8vID09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuLy8gTG9hZGluZ1xuLy8gPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09XG5cbmNvbnN0IGxvYWRpbmdEb3RBbmltYXRpb25zID0ga2V5ZnJhbWVzYFxuICAwJSwgODAlLCAxMDAlIHsgb3BhY2l0eTogMDsgfVxuICA0MCUgeyBvcGFjaXR5OiAxOyB9XG5gO1xuXG5leHBvcnQgY29uc3QgbG9hZGluZ0luZGljYXRvckNTUyA9ICh7XG4gIGlzRm9jdXNlZCxcbiAgc2l6ZSxcbiAgdGhlbWU6IHtcbiAgICBjb2xvcnMsXG4gICAgc3BhY2luZzogeyBiYXNlVW5pdCB9LFxuICB9LFxufToge1xuICBpc0ZvY3VzZWQ6IGJvb2xlYW4sXG4gIHNpemU6IG51bWJlcixcbiAgdGhlbWU6IFRoZW1lLFxufSkgPT4gKHtcbiAgbGFiZWw6ICdsb2FkaW5nSW5kaWNhdG9yJyxcbiAgY29sb3I6IGlzRm9jdXNlZCA/IGNvbG9ycy5uZXV0cmFsNjAgOiBjb2xvcnMubmV1dHJhbDIwLFxuICBkaXNwbGF5OiAnZmxleCcsXG4gIHBhZGRpbmc6IGJhc2VVbml0ICogMixcbiAgdHJhbnNpdGlvbjogJ2NvbG9yIDE1MG1zJyxcbiAgYWxpZ25TZWxmOiAnY2VudGVyJyxcbiAgZm9udFNpemU6IHNpemUsXG4gIGxpbmVIZWlnaHQ6IDEsXG4gIG1hcmdpblJpZ2h0OiBzaXplLFxuICB0ZXh0QWxpZ246ICdjZW50ZXInLFxuICB2ZXJ0aWNhbEFsaWduOiAnbWlkZGxlJyxcbn0pO1xuXG50eXBlIERvdFByb3BzID0geyBkZWxheTogbnVtYmVyLCBvZmZzZXQ6IGJvb2xlYW4gfTtcbmNvbnN0IExvYWRpbmdEb3QgPSAoeyBkZWxheSwgb2Zmc2V0IH06IERvdFByb3BzKSA9PiAoXG4gIDxzcGFuXG4gICAgY3NzPXt7XG4gICAgICBhbmltYXRpb246IGAke2xvYWRpbmdEb3RBbmltYXRpb25zfSAxcyBlYXNlLWluLW91dCAke2RlbGF5fW1zIGluZmluaXRlO2AsXG4gICAgICBiYWNrZ3JvdW5kQ29sb3I6ICdjdXJyZW50Q29sb3InLFxuICAgICAgYm9yZGVyUmFkaXVzOiAnMWVtJyxcbiAgICAgIGRpc3BsYXk6ICdpbmxpbmUtYmxvY2snLFxuICAgICAgbWFyZ2luTGVmdDogb2Zmc2V0ID8gJzFlbScgOiBudWxsLFxuICAgICAgaGVpZ2h0OiAnMWVtJyxcbiAgICAgIHZlcnRpY2FsQWxpZ246ICd0b3AnLFxuICAgICAgd2lkdGg6ICcxZW0nLFxuICAgIH19XG4gIC8+XG4pO1xuXG5leHBvcnQgdHlwZSBMb2FkaW5nSWNvblByb3BzID0ge1xuICAvKiogUHJvcHMgdGhhdCB3aWxsIGJlIHBhc3NlZCBvbiB0byB0aGUgY2hpbGRyZW4uICovXG4gIGlubmVyUHJvcHM6IGFueSxcbiAgLyoqIFRoZSBmb2N1c2VkIHN0YXRlIG9mIHRoZSBzZWxlY3QuICovXG4gIGlzRm9jdXNlZDogYm9vbGVhbixcbiAgLyoqIFdoZXRoZXIgdGhlIHRleHQgaXMgcmlnaHQgdG8gbGVmdCAqL1xuICBpc1J0bDogYm9vbGVhbixcbn0gJiBDb21tb25Qcm9wcyAmIHtcbiAgICAvKiogU2V0IHNpemUgb2YgdGhlIGNvbnRhaW5lci4gKi9cbiAgICBzaXplOiBudW1iZXIsXG4gIH07XG5leHBvcnQgY29uc3QgTG9hZGluZ0luZGljYXRvciA9IChwcm9wczogTG9hZGluZ0ljb25Qcm9wcykgPT4ge1xuICBjb25zdCB7IGNsYXNzTmFtZSwgY3gsIGdldFN0eWxlcywgaW5uZXJQcm9wcywgaXNSdGwgfSA9IHByb3BzO1xuXG4gIHJldHVybiAoXG4gICAgPGRpdlxuICAgICAgY3NzPXtnZXRTdHlsZXMoJ2xvYWRpbmdJbmRpY2F0b3InLCBwcm9wcyl9XG4gICAgICBjbGFzc05hbWU9e2N4KFxuICAgICAgICB7XG4gICAgICAgICAgaW5kaWNhdG9yOiB0cnVlLFxuICAgICAgICAgICdsb2FkaW5nLWluZGljYXRvcic6IHRydWUsXG4gICAgICAgIH0sXG4gICAgICAgIGNsYXNzTmFtZVxuICAgICAgKX1cbiAgICAgIHsuLi5pbm5lclByb3BzfVxuICAgID5cbiAgICAgIDxMb2FkaW5nRG90IGRlbGF5PXswfSBvZmZzZXQ9e2lzUnRsfSAvPlxuICAgICAgPExvYWRpbmdEb3QgZGVsYXk9ezE2MH0gb2Zmc2V0IC8+XG4gICAgICA8TG9hZGluZ0RvdCBkZWxheT17MzIwfSBvZmZzZXQ9eyFpc1J0bH0gLz5cbiAgICA8L2Rpdj5cbiAgKTtcbn07XG5Mb2FkaW5nSW5kaWNhdG9yLmRlZmF1bHRQcm9wcyA9IHsgc2l6ZTogNCB9O1xuIl19 */",
  toString: _EMOTION_STRINGIFIED_CSS_ERROR__
};

// ==============================
// Dropdown & Clear Icons
// ==============================
var Svg = function Svg(_ref) {
  var size = _ref.size,
      props = Object(_babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_3__["default"])(_ref, ["size"]);

  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("svg", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    height: size,
    width: size,
    viewBox: "0 0 20 20",
    "aria-hidden": "true",
    focusable: "false",
    css: _ref2
  }, props));
};

var CrossIcon = function CrossIcon(props) {
  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])(Svg, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    size: 20
  }, props), Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("path", {
    d: "M14.348 14.849c-0.469 0.469-1.229 0.469-1.697 0l-2.651-3.030-2.651 3.029c-0.469 0.469-1.229 0.469-1.697 0-0.469-0.469-0.469-1.229 0-1.697l2.758-3.15-2.759-3.152c-0.469-0.469-0.469-1.228 0-1.697s1.228-0.469 1.697 0l2.652 3.031 2.651-3.031c0.469-0.469 1.228-0.469 1.697 0s0.469 1.229 0 1.697l-2.758 3.152 2.758 3.15c0.469 0.469 0.469 1.229 0 1.698z"
  }));
};
var DownChevron = function DownChevron(props) {
  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])(Svg, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    size: 20
  }, props), Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("path", {
    d: "M4.516 7.548c0.436-0.446 1.043-0.481 1.576 0l3.908 3.747 3.908-3.747c0.533-0.481 1.141-0.446 1.574 0 0.436 0.445 0.408 1.197 0 1.615-0.406 0.418-4.695 4.502-4.695 4.502-0.217 0.223-0.502 0.335-0.787 0.335s-0.57-0.112-0.789-0.335c0 0-4.287-4.084-4.695-4.502s-0.436-1.17 0-1.615z"
  }));
}; // ==============================
// Dropdown & Clear Buttons
// ==============================

var baseCSS = function baseCSS(_ref3) {
  var isFocused = _ref3.isFocused,
      _ref3$theme = _ref3.theme,
      baseUnit = _ref3$theme.spacing.baseUnit,
      colors = _ref3$theme.colors;
  return {
    label: 'indicatorContainer',
    color: isFocused ? colors.neutral60 : colors.neutral20,
    display: 'flex',
    padding: baseUnit * 2,
    transition: 'color 150ms',
    ':hover': {
      color: isFocused ? colors.neutral80 : colors.neutral40
    }
  };
};

var dropdownIndicatorCSS = baseCSS;
var DropdownIndicator = function DropdownIndicator(props) {
  var children = props.children,
      className = props.className,
      cx = props.cx,
      getStyles = props.getStyles,
      innerProps = props.innerProps;
  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("div", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    css: getStyles('dropdownIndicator', props),
    className: cx({
      indicator: true,
      'dropdown-indicator': true
    }, className)
  }, innerProps), children || Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])(DownChevron, null));
};
var clearIndicatorCSS = baseCSS;
var ClearIndicator = function ClearIndicator(props) {
  var children = props.children,
      className = props.className,
      cx = props.cx,
      getStyles = props.getStyles,
      innerProps = props.innerProps;
  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("div", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    css: getStyles('clearIndicator', props),
    className: cx({
      indicator: true,
      'clear-indicator': true
    }, className)
  }, innerProps), children || Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])(CrossIcon, null));
}; // ==============================
// Separator
// ==============================

var indicatorSeparatorCSS = function indicatorSeparatorCSS(_ref4) {
  var isDisabled = _ref4.isDisabled,
      _ref4$theme = _ref4.theme,
      baseUnit = _ref4$theme.spacing.baseUnit,
      colors = _ref4$theme.colors;
  return {
    label: 'indicatorSeparator',
    alignSelf: 'stretch',
    backgroundColor: isDisabled ? colors.neutral10 : colors.neutral20,
    marginBottom: baseUnit * 2,
    marginTop: baseUnit * 2,
    width: 1
  };
};
var IndicatorSeparator = function IndicatorSeparator(props) {
  var className = props.className,
      cx = props.cx,
      getStyles = props.getStyles,
      innerProps = props.innerProps;
  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("span", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, innerProps, {
    css: getStyles('indicatorSeparator', props),
    className: cx({
      'indicator-separator': true
    }, className)
  }));
}; // ==============================
// Loading
// ==============================

var loadingDotAnimations = Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["keyframes"])(_templateObject || (_templateObject = Object(_babel_runtime_helpers_esm_taggedTemplateLiteral__WEBPACK_IMPORTED_MODULE_2__["default"])(["\n  0%, 80%, 100% { opacity: 0; }\n  40% { opacity: 1; }\n"])));
var loadingIndicatorCSS = function loadingIndicatorCSS(_ref5) {
  var isFocused = _ref5.isFocused,
      size = _ref5.size,
      _ref5$theme = _ref5.theme,
      colors = _ref5$theme.colors,
      baseUnit = _ref5$theme.spacing.baseUnit;
  return {
    label: 'loadingIndicator',
    color: isFocused ? colors.neutral60 : colors.neutral20,
    display: 'flex',
    padding: baseUnit * 2,
    transition: 'color 150ms',
    alignSelf: 'center',
    fontSize: size,
    lineHeight: 1,
    marginRight: size,
    textAlign: 'center',
    verticalAlign: 'middle'
  };
};

var LoadingDot = function LoadingDot(_ref6) {
  var delay = _ref6.delay,
      offset = _ref6.offset;
  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("span", {
    css: /*#__PURE__*/Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["css"])({
      animation: "".concat(loadingDotAnimations, " 1s ease-in-out ").concat(delay, "ms infinite;"),
      backgroundColor: 'currentColor',
      borderRadius: '1em',
      display: 'inline-block',
      marginLeft: offset ? '1em' : null,
      height: '1em',
      verticalAlign: 'top',
      width: '1em'
    },  false ? undefined : ";label:LoadingDot;",  false ? undefined : "/*# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImluZGljYXRvcnMuanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBc0xJIiwiZmlsZSI6ImluZGljYXRvcnMuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvLyBAZmxvd1xuLyoqIEBqc3gganN4ICovXG5pbXBvcnQgeyB0eXBlIE5vZGUgfSBmcm9tICdyZWFjdCc7XG5pbXBvcnQgeyBqc3gsIGtleWZyYW1lcyB9IGZyb20gJ0BlbW90aW9uL3JlYWN0JztcblxuaW1wb3J0IHR5cGUgeyBDb21tb25Qcm9wcywgVGhlbWUgfSBmcm9tICcuLi90eXBlcyc7XG5cbi8vID09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuLy8gRHJvcGRvd24gJiBDbGVhciBJY29uc1xuLy8gPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09XG5cbmNvbnN0IFN2ZyA9ICh7IHNpemUsIC4uLnByb3BzIH06IHsgc2l6ZTogbnVtYmVyIH0pID0+IChcbiAgPHN2Z1xuICAgIGhlaWdodD17c2l6ZX1cbiAgICB3aWR0aD17c2l6ZX1cbiAgICB2aWV3Qm94PVwiMCAwIDIwIDIwXCJcbiAgICBhcmlhLWhpZGRlbj1cInRydWVcIlxuICAgIGZvY3VzYWJsZT1cImZhbHNlXCJcbiAgICBjc3M9e3tcbiAgICAgIGRpc3BsYXk6ICdpbmxpbmUtYmxvY2snLFxuICAgICAgZmlsbDogJ2N1cnJlbnRDb2xvcicsXG4gICAgICBsaW5lSGVpZ2h0OiAxLFxuICAgICAgc3Ryb2tlOiAnY3VycmVudENvbG9yJyxcbiAgICAgIHN0cm9rZVdpZHRoOiAwLFxuICAgIH19XG4gICAgey4uLnByb3BzfVxuICAvPlxuKTtcblxuZXhwb3J0IGNvbnN0IENyb3NzSWNvbiA9IChwcm9wczogYW55KSA9PiAoXG4gIDxTdmcgc2l6ZT17MjB9IHsuLi5wcm9wc30+XG4gICAgPHBhdGggZD1cIk0xNC4zNDggMTQuODQ5Yy0wLjQ2OSAwLjQ2OS0xLjIyOSAwLjQ2OS0xLjY5NyAwbC0yLjY1MS0zLjAzMC0yLjY1MSAzLjAyOWMtMC40NjkgMC40NjktMS4yMjkgMC40NjktMS42OTcgMC0wLjQ2OS0wLjQ2OS0wLjQ2OS0xLjIyOSAwLTEuNjk3bDIuNzU4LTMuMTUtMi43NTktMy4xNTJjLTAuNDY5LTAuNDY5LTAuNDY5LTEuMjI4IDAtMS42OTdzMS4yMjgtMC40NjkgMS42OTcgMGwyLjY1MiAzLjAzMSAyLjY1MS0zLjAzMWMwLjQ2OS0wLjQ2OSAxLjIyOC0wLjQ2OSAxLjY5NyAwczAuNDY5IDEuMjI5IDAgMS42OTdsLTIuNzU4IDMuMTUyIDIuNzU4IDMuMTVjMC40NjkgMC40NjkgMC40NjkgMS4yMjkgMCAxLjY5OHpcIiAvPlxuICA8L1N2Zz5cbik7XG5leHBvcnQgY29uc3QgRG93bkNoZXZyb24gPSAocHJvcHM6IGFueSkgPT4gKFxuICA8U3ZnIHNpemU9ezIwfSB7Li4ucHJvcHN9PlxuICAgIDxwYXRoIGQ9XCJNNC41MTYgNy41NDhjMC40MzYtMC40NDYgMS4wNDMtMC40ODEgMS41NzYgMGwzLjkwOCAzLjc0NyAzLjkwOC0zLjc0N2MwLjUzMy0wLjQ4MSAxLjE0MS0wLjQ0NiAxLjU3NCAwIDAuNDM2IDAuNDQ1IDAuNDA4IDEuMTk3IDAgMS42MTUtMC40MDYgMC40MTgtNC42OTUgNC41MDItNC42OTUgNC41MDItMC4yMTcgMC4yMjMtMC41MDIgMC4zMzUtMC43ODcgMC4zMzVzLTAuNTctMC4xMTItMC43ODktMC4zMzVjMCAwLTQuMjg3LTQuMDg0LTQuNjk1LTQuNTAycy0wLjQzNi0xLjE3IDAtMS42MTV6XCIgLz5cbiAgPC9Tdmc+XG4pO1xuXG4vLyA9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT1cbi8vIERyb3Bkb3duICYgQ2xlYXIgQnV0dG9uc1xuLy8gPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09XG5cbmV4cG9ydCB0eXBlIEluZGljYXRvclByb3BzID0gQ29tbW9uUHJvcHMgJiB7XG4gIC8qKiBUaGUgY2hpbGRyZW4gdG8gYmUgcmVuZGVyZWQgaW5zaWRlIHRoZSBpbmRpY2F0b3IuICovXG4gIGNoaWxkcmVuOiBOb2RlLFxuICAvKiogUHJvcHMgdGhhdCB3aWxsIGJlIHBhc3NlZCBvbiB0byB0aGUgY2hpbGRyZW4uICovXG4gIGlubmVyUHJvcHM6IGFueSxcbiAgLyoqIFRoZSBmb2N1c2VkIHN0YXRlIG9mIHRoZSBzZWxlY3QuICovXG4gIGlzRm9jdXNlZDogYm9vbGVhbixcbiAgLyoqIFdoZXRoZXIgdGhlIHRleHQgaXMgcmlnaHQgdG8gbGVmdCAqL1xuICBpc1J0bDogYm9vbGVhbixcbn07XG5cbmNvbnN0IGJhc2VDU1MgPSAoe1xuICBpc0ZvY3VzZWQsXG4gIHRoZW1lOiB7XG4gICAgc3BhY2luZzogeyBiYXNlVW5pdCB9LFxuICAgIGNvbG9ycyxcbiAgfSxcbn06IEluZGljYXRvclByb3BzKSA9PiAoe1xuICBsYWJlbDogJ2luZGljYXRvckNvbnRhaW5lcicsXG4gIGNvbG9yOiBpc0ZvY3VzZWQgPyBjb2xvcnMubmV1dHJhbDYwIDogY29sb3JzLm5ldXRyYWwyMCxcbiAgZGlzcGxheTogJ2ZsZXgnLFxuICBwYWRkaW5nOiBiYXNlVW5pdCAqIDIsXG4gIHRyYW5zaXRpb246ICdjb2xvciAxNTBtcycsXG5cbiAgJzpob3Zlcic6IHtcbiAgICBjb2xvcjogaXNGb2N1c2VkID8gY29sb3JzLm5ldXRyYWw4MCA6IGNvbG9ycy5uZXV0cmFsNDAsXG4gIH0sXG59KTtcblxuZXhwb3J0IGNvbnN0IGRyb3Bkb3duSW5kaWNhdG9yQ1NTID0gYmFzZUNTUztcbmV4cG9ydCBjb25zdCBEcm9wZG93bkluZGljYXRvciA9IChwcm9wczogSW5kaWNhdG9yUHJvcHMpID0+IHtcbiAgY29uc3QgeyBjaGlsZHJlbiwgY2xhc3NOYW1lLCBjeCwgZ2V0U3R5bGVzLCBpbm5lclByb3BzIH0gPSBwcm9wcztcbiAgcmV0dXJuIChcbiAgICA8ZGl2XG4gICAgICBjc3M9e2dldFN0eWxlcygnZHJvcGRvd25JbmRpY2F0b3InLCBwcm9wcyl9XG4gICAgICBjbGFzc05hbWU9e2N4KFxuICAgICAgICB7XG4gICAgICAgICAgaW5kaWNhdG9yOiB0cnVlLFxuICAgICAgICAgICdkcm9wZG93bi1pbmRpY2F0b3InOiB0cnVlLFxuICAgICAgICB9LFxuICAgICAgICBjbGFzc05hbWVcbiAgICAgICl9XG4gICAgICB7Li4uaW5uZXJQcm9wc31cbiAgICA+XG4gICAgICB7Y2hpbGRyZW4gfHwgPERvd25DaGV2cm9uIC8+fVxuICAgIDwvZGl2PlxuICApO1xufTtcblxuZXhwb3J0IGNvbnN0IGNsZWFySW5kaWNhdG9yQ1NTID0gYmFzZUNTUztcbmV4cG9ydCBjb25zdCBDbGVhckluZGljYXRvciA9IChwcm9wczogSW5kaWNhdG9yUHJvcHMpID0+IHtcbiAgY29uc3QgeyBjaGlsZHJlbiwgY2xhc3NOYW1lLCBjeCwgZ2V0U3R5bGVzLCBpbm5lclByb3BzIH0gPSBwcm9wcztcbiAgcmV0dXJuIChcbiAgICA8ZGl2XG4gICAgICBjc3M9e2dldFN0eWxlcygnY2xlYXJJbmRpY2F0b3InLCBwcm9wcyl9XG4gICAgICBjbGFzc05hbWU9e2N4KFxuICAgICAgICB7XG4gICAgICAgICAgaW5kaWNhdG9yOiB0cnVlLFxuICAgICAgICAgICdjbGVhci1pbmRpY2F0b3InOiB0cnVlLFxuICAgICAgICB9LFxuICAgICAgICBjbGFzc05hbWVcbiAgICAgICl9XG4gICAgICB7Li4uaW5uZXJQcm9wc31cbiAgICA+XG4gICAgICB7Y2hpbGRyZW4gfHwgPENyb3NzSWNvbiAvPn1cbiAgICA8L2Rpdj5cbiAgKTtcbn07XG5cbi8vID09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuLy8gU2VwYXJhdG9yXG4vLyA9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT1cblxudHlwZSBTZXBhcmF0b3JTdGF0ZSA9IHsgaXNEaXNhYmxlZDogYm9vbGVhbiB9O1xuXG5leHBvcnQgY29uc3QgaW5kaWNhdG9yU2VwYXJhdG9yQ1NTID0gKHtcbiAgaXNEaXNhYmxlZCxcbiAgdGhlbWU6IHtcbiAgICBzcGFjaW5nOiB7IGJhc2VVbml0IH0sXG4gICAgY29sb3JzLFxuICB9LFxufTogQ29tbW9uUHJvcHMgJiBTZXBhcmF0b3JTdGF0ZSkgPT4gKHtcbiAgbGFiZWw6ICdpbmRpY2F0b3JTZXBhcmF0b3InLFxuICBhbGlnblNlbGY6ICdzdHJldGNoJyxcbiAgYmFja2dyb3VuZENvbG9yOiBpc0Rpc2FibGVkID8gY29sb3JzLm5ldXRyYWwxMCA6IGNvbG9ycy5uZXV0cmFsMjAsXG4gIG1hcmdpbkJvdHRvbTogYmFzZVVuaXQgKiAyLFxuICBtYXJnaW5Ub3A6IGJhc2VVbml0ICogMixcbiAgd2lkdGg6IDEsXG59KTtcblxuZXhwb3J0IGNvbnN0IEluZGljYXRvclNlcGFyYXRvciA9IChwcm9wczogSW5kaWNhdG9yUHJvcHMpID0+IHtcbiAgY29uc3QgeyBjbGFzc05hbWUsIGN4LCBnZXRTdHlsZXMsIGlubmVyUHJvcHMgfSA9IHByb3BzO1xuICByZXR1cm4gKFxuICAgIDxzcGFuXG4gICAgICB7Li4uaW5uZXJQcm9wc31cbiAgICAgIGNzcz17Z2V0U3R5bGVzKCdpbmRpY2F0b3JTZXBhcmF0b3InLCBwcm9wcyl9XG4gICAgICBjbGFzc05hbWU9e2N4KHsgJ2luZGljYXRvci1zZXBhcmF0b3InOiB0cnVlIH0sIGNsYXNzTmFtZSl9XG4gICAgLz5cbiAgKTtcbn07XG5cbi8vID09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuLy8gTG9hZGluZ1xuLy8gPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09XG5cbmNvbnN0IGxvYWRpbmdEb3RBbmltYXRpb25zID0ga2V5ZnJhbWVzYFxuICAwJSwgODAlLCAxMDAlIHsgb3BhY2l0eTogMDsgfVxuICA0MCUgeyBvcGFjaXR5OiAxOyB9XG5gO1xuXG5leHBvcnQgY29uc3QgbG9hZGluZ0luZGljYXRvckNTUyA9ICh7XG4gIGlzRm9jdXNlZCxcbiAgc2l6ZSxcbiAgdGhlbWU6IHtcbiAgICBjb2xvcnMsXG4gICAgc3BhY2luZzogeyBiYXNlVW5pdCB9LFxuICB9LFxufToge1xuICBpc0ZvY3VzZWQ6IGJvb2xlYW4sXG4gIHNpemU6IG51bWJlcixcbiAgdGhlbWU6IFRoZW1lLFxufSkgPT4gKHtcbiAgbGFiZWw6ICdsb2FkaW5nSW5kaWNhdG9yJyxcbiAgY29sb3I6IGlzRm9jdXNlZCA/IGNvbG9ycy5uZXV0cmFsNjAgOiBjb2xvcnMubmV1dHJhbDIwLFxuICBkaXNwbGF5OiAnZmxleCcsXG4gIHBhZGRpbmc6IGJhc2VVbml0ICogMixcbiAgdHJhbnNpdGlvbjogJ2NvbG9yIDE1MG1zJyxcbiAgYWxpZ25TZWxmOiAnY2VudGVyJyxcbiAgZm9udFNpemU6IHNpemUsXG4gIGxpbmVIZWlnaHQ6IDEsXG4gIG1hcmdpblJpZ2h0OiBzaXplLFxuICB0ZXh0QWxpZ246ICdjZW50ZXInLFxuICB2ZXJ0aWNhbEFsaWduOiAnbWlkZGxlJyxcbn0pO1xuXG50eXBlIERvdFByb3BzID0geyBkZWxheTogbnVtYmVyLCBvZmZzZXQ6IGJvb2xlYW4gfTtcbmNvbnN0IExvYWRpbmdEb3QgPSAoeyBkZWxheSwgb2Zmc2V0IH06IERvdFByb3BzKSA9PiAoXG4gIDxzcGFuXG4gICAgY3NzPXt7XG4gICAgICBhbmltYXRpb246IGAke2xvYWRpbmdEb3RBbmltYXRpb25zfSAxcyBlYXNlLWluLW91dCAke2RlbGF5fW1zIGluZmluaXRlO2AsXG4gICAgICBiYWNrZ3JvdW5kQ29sb3I6ICdjdXJyZW50Q29sb3InLFxuICAgICAgYm9yZGVyUmFkaXVzOiAnMWVtJyxcbiAgICAgIGRpc3BsYXk6ICdpbmxpbmUtYmxvY2snLFxuICAgICAgbWFyZ2luTGVmdDogb2Zmc2V0ID8gJzFlbScgOiBudWxsLFxuICAgICAgaGVpZ2h0OiAnMWVtJyxcbiAgICAgIHZlcnRpY2FsQWxpZ246ICd0b3AnLFxuICAgICAgd2lkdGg6ICcxZW0nLFxuICAgIH19XG4gIC8+XG4pO1xuXG5leHBvcnQgdHlwZSBMb2FkaW5nSWNvblByb3BzID0ge1xuICAvKiogUHJvcHMgdGhhdCB3aWxsIGJlIHBhc3NlZCBvbiB0byB0aGUgY2hpbGRyZW4uICovXG4gIGlubmVyUHJvcHM6IGFueSxcbiAgLyoqIFRoZSBmb2N1c2VkIHN0YXRlIG9mIHRoZSBzZWxlY3QuICovXG4gIGlzRm9jdXNlZDogYm9vbGVhbixcbiAgLyoqIFdoZXRoZXIgdGhlIHRleHQgaXMgcmlnaHQgdG8gbGVmdCAqL1xuICBpc1J0bDogYm9vbGVhbixcbn0gJiBDb21tb25Qcm9wcyAmIHtcbiAgICAvKiogU2V0IHNpemUgb2YgdGhlIGNvbnRhaW5lci4gKi9cbiAgICBzaXplOiBudW1iZXIsXG4gIH07XG5leHBvcnQgY29uc3QgTG9hZGluZ0luZGljYXRvciA9IChwcm9wczogTG9hZGluZ0ljb25Qcm9wcykgPT4ge1xuICBjb25zdCB7IGNsYXNzTmFtZSwgY3gsIGdldFN0eWxlcywgaW5uZXJQcm9wcywgaXNSdGwgfSA9IHByb3BzO1xuXG4gIHJldHVybiAoXG4gICAgPGRpdlxuICAgICAgY3NzPXtnZXRTdHlsZXMoJ2xvYWRpbmdJbmRpY2F0b3InLCBwcm9wcyl9XG4gICAgICBjbGFzc05hbWU9e2N4KFxuICAgICAgICB7XG4gICAgICAgICAgaW5kaWNhdG9yOiB0cnVlLFxuICAgICAgICAgICdsb2FkaW5nLWluZGljYXRvcic6IHRydWUsXG4gICAgICAgIH0sXG4gICAgICAgIGNsYXNzTmFtZVxuICAgICAgKX1cbiAgICAgIHsuLi5pbm5lclByb3BzfVxuICAgID5cbiAgICAgIDxMb2FkaW5nRG90IGRlbGF5PXswfSBvZmZzZXQ9e2lzUnRsfSAvPlxuICAgICAgPExvYWRpbmdEb3QgZGVsYXk9ezE2MH0gb2Zmc2V0IC8+XG4gICAgICA8TG9hZGluZ0RvdCBkZWxheT17MzIwfSBvZmZzZXQ9eyFpc1J0bH0gLz5cbiAgICA8L2Rpdj5cbiAgKTtcbn07XG5Mb2FkaW5nSW5kaWNhdG9yLmRlZmF1bHRQcm9wcyA9IHsgc2l6ZTogNCB9O1xuIl19 */")
  });
};

var LoadingIndicator = function LoadingIndicator(props) {
  var className = props.className,
      cx = props.cx,
      getStyles = props.getStyles,
      innerProps = props.innerProps,
      isRtl = props.isRtl;
  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("div", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    css: getStyles('loadingIndicator', props),
    className: cx({
      indicator: true,
      'loading-indicator': true
    }, className)
  }, innerProps), Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])(LoadingDot, {
    delay: 0,
    offset: isRtl
  }), Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])(LoadingDot, {
    delay: 160,
    offset: true
  }), Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])(LoadingDot, {
    delay: 320,
    offset: !isRtl
  }));
};
LoadingIndicator.defaultProps = {
  size: 4
};

var css = function css(_ref) {
  var isDisabled = _ref.isDisabled,
      isFocused = _ref.isFocused,
      _ref$theme = _ref.theme,
      colors = _ref$theme.colors,
      borderRadius = _ref$theme.borderRadius,
      spacing = _ref$theme.spacing;
  return {
    label: 'control',
    alignItems: 'center',
    backgroundColor: isDisabled ? colors.neutral5 : colors.neutral0,
    borderColor: isDisabled ? colors.neutral10 : isFocused ? colors.primary : colors.neutral20,
    borderRadius: borderRadius,
    borderStyle: 'solid',
    borderWidth: 1,
    boxShadow: isFocused ? "0 0 0 1px ".concat(colors.primary) : null,
    cursor: 'default',
    display: 'flex',
    flexWrap: 'wrap',
    justifyContent: 'space-between',
    minHeight: spacing.controlHeight,
    outline: '0 !important',
    position: 'relative',
    transition: 'all 100ms',
    '&:hover': {
      borderColor: isFocused ? colors.primary : colors.neutral30
    }
  };
};

var Control = function Control(props) {
  var children = props.children,
      cx = props.cx,
      getStyles = props.getStyles,
      className = props.className,
      isDisabled = props.isDisabled,
      isFocused = props.isFocused,
      innerRef = props.innerRef,
      innerProps = props.innerProps,
      menuIsOpen = props.menuIsOpen;
  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("div", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    ref: innerRef,
    css: getStyles('control', props),
    className: cx({
      control: true,
      'control--is-disabled': isDisabled,
      'control--is-focused': isFocused,
      'control--menu-is-open': menuIsOpen
    }, className)
  }, innerProps), children);
};

var groupCSS = function groupCSS(_ref) {
  var spacing = _ref.theme.spacing;
  return {
    paddingBottom: spacing.baseUnit * 2,
    paddingTop: spacing.baseUnit * 2
  };
};

var Group = function Group(props) {
  var children = props.children,
      className = props.className,
      cx = props.cx,
      getStyles = props.getStyles,
      Heading = props.Heading,
      headingProps = props.headingProps,
      innerProps = props.innerProps,
      label = props.label,
      theme = props.theme,
      selectProps = props.selectProps;
  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("div", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    css: getStyles('group', props),
    className: cx({
      group: true
    }, className)
  }, innerProps), Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])(Heading, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, headingProps, {
    selectProps: selectProps,
    theme: theme,
    getStyles: getStyles,
    cx: cx
  }), label), Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("div", null, children));
};

var groupHeadingCSS = function groupHeadingCSS(_ref2) {
  var spacing = _ref2.theme.spacing;
  return {
    label: 'group',
    color: '#999',
    cursor: 'default',
    display: 'block',
    fontSize: '75%',
    fontWeight: '500',
    marginBottom: '0.25em',
    paddingLeft: spacing.baseUnit * 3,
    paddingRight: spacing.baseUnit * 3,
    textTransform: 'uppercase'
  };
};
var GroupHeading = function GroupHeading(props) {
  var getStyles = props.getStyles,
      cx = props.cx,
      className = props.className;

  var _cleanCommonProps = cleanCommonProps(props);
      _cleanCommonProps.data;
      var innerProps = Object(_babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_3__["default"])(_cleanCommonProps, ["data"]);

  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("div", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    css: getStyles('groupHeading', props),
    className: cx({
      'group-heading': true
    }, className)
  }, innerProps));
};

var inputCSS = function inputCSS(_ref) {
  var isDisabled = _ref.isDisabled,
      _ref$theme = _ref.theme,
      spacing = _ref$theme.spacing,
      colors = _ref$theme.colors;
  return {
    margin: spacing.baseUnit / 2,
    paddingBottom: spacing.baseUnit / 2,
    paddingTop: spacing.baseUnit / 2,
    visibility: isDisabled ? 'hidden' : 'visible',
    color: colors.neutral80
  };
};

var inputStyle = function inputStyle(isHidden) {
  return {
    label: 'input',
    background: 0,
    border: 0,
    fontSize: 'inherit',
    opacity: isHidden ? 0 : 1,
    outline: 0,
    padding: 0,
    color: 'inherit'
  };
};

var Input = function Input(props) {
  var className = props.className,
      cx = props.cx,
      getStyles = props.getStyles;

  var _cleanCommonProps = cleanCommonProps(props),
      innerRef = _cleanCommonProps.innerRef,
      isDisabled = _cleanCommonProps.isDisabled,
      isHidden = _cleanCommonProps.isHidden,
      innerProps = Object(_babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_3__["default"])(_cleanCommonProps, ["innerRef", "isDisabled", "isHidden"]);

  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("div", {
    css: getStyles('input', props)
  }, Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])(react_input_autosize__WEBPACK_IMPORTED_MODULE_5___default.a, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    className: cx({
      input: true
    }, className),
    inputRef: innerRef,
    inputStyle: inputStyle(isHidden),
    disabled: isDisabled
  }, innerProps)));
};

var multiValueCSS = function multiValueCSS(_ref) {
  var _ref$theme = _ref.theme,
      spacing = _ref$theme.spacing,
      borderRadius = _ref$theme.borderRadius,
      colors = _ref$theme.colors;
  return {
    label: 'multiValue',
    backgroundColor: colors.neutral10,
    borderRadius: borderRadius / 2,
    display: 'flex',
    margin: spacing.baseUnit / 2,
    minWidth: 0 // resolves flex/text-overflow bug

  };
};
var multiValueLabelCSS = function multiValueLabelCSS(_ref2) {
  var _ref2$theme = _ref2.theme,
      borderRadius = _ref2$theme.borderRadius,
      colors = _ref2$theme.colors,
      cropWithEllipsis = _ref2.cropWithEllipsis;
  return {
    borderRadius: borderRadius / 2,
    color: colors.neutral80,
    fontSize: '85%',
    overflow: 'hidden',
    padding: 3,
    paddingLeft: 6,
    textOverflow: cropWithEllipsis ? 'ellipsis' : null,
    whiteSpace: 'nowrap'
  };
};
var multiValueRemoveCSS = function multiValueRemoveCSS(_ref3) {
  var _ref3$theme = _ref3.theme,
      spacing = _ref3$theme.spacing,
      borderRadius = _ref3$theme.borderRadius,
      colors = _ref3$theme.colors,
      isFocused = _ref3.isFocused;
  return {
    alignItems: 'center',
    borderRadius: borderRadius / 2,
    backgroundColor: isFocused && colors.dangerLight,
    display: 'flex',
    paddingLeft: spacing.baseUnit,
    paddingRight: spacing.baseUnit,
    ':hover': {
      backgroundColor: colors.dangerLight,
      color: colors.danger
    }
  };
};
var MultiValueGeneric = function MultiValueGeneric(_ref4) {
  var children = _ref4.children,
      innerProps = _ref4.innerProps;
  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("div", innerProps, children);
};
var MultiValueContainer = MultiValueGeneric;
var MultiValueLabel = MultiValueGeneric;
function MultiValueRemove(_ref5) {
  var children = _ref5.children,
      innerProps = _ref5.innerProps;
  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("div", innerProps, children || Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])(CrossIcon, {
    size: 14
  }));
}

var MultiValue = function MultiValue(props) {
  var children = props.children,
      className = props.className,
      components = props.components,
      cx = props.cx,
      data = props.data,
      getStyles = props.getStyles,
      innerProps = props.innerProps,
      isDisabled = props.isDisabled,
      removeProps = props.removeProps,
      selectProps = props.selectProps;
  var Container = components.Container,
      Label = components.Label,
      Remove = components.Remove;
  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["ClassNames"], null, function (_ref6) {
    var css = _ref6.css,
        emotionCx = _ref6.cx;
    return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])(Container, {
      data: data,
      innerProps: _objectSpread2({
        className: emotionCx(css(getStyles('multiValue', props)), cx({
          'multi-value': true,
          'multi-value--is-disabled': isDisabled
        }, className))
      }, innerProps),
      selectProps: selectProps
    }, Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])(Label, {
      data: data,
      innerProps: {
        className: emotionCx(css(getStyles('multiValueLabel', props)), cx({
          'multi-value__label': true
        }, className))
      },
      selectProps: selectProps
    }, children), Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])(Remove, {
      data: data,
      innerProps: _objectSpread2({
        className: emotionCx(css(getStyles('multiValueRemove', props)), cx({
          'multi-value__remove': true
        }, className))
      }, removeProps),
      selectProps: selectProps
    }));
  });
};

MultiValue.defaultProps = {
  cropWithEllipsis: true
};

var optionCSS = function optionCSS(_ref) {
  var isDisabled = _ref.isDisabled,
      isFocused = _ref.isFocused,
      isSelected = _ref.isSelected,
      _ref$theme = _ref.theme,
      spacing = _ref$theme.spacing,
      colors = _ref$theme.colors;
  return {
    label: 'option',
    backgroundColor: isSelected ? colors.primary : isFocused ? colors.primary25 : 'transparent',
    color: isDisabled ? colors.neutral20 : isSelected ? colors.neutral0 : 'inherit',
    cursor: 'default',
    display: 'block',
    fontSize: 'inherit',
    padding: "".concat(spacing.baseUnit * 2, "px ").concat(spacing.baseUnit * 3, "px"),
    width: '100%',
    userSelect: 'none',
    WebkitTapHighlightColor: 'rgba(0, 0, 0, 0)',
    // provide some affordance on touch devices
    ':active': {
      backgroundColor: !isDisabled && (isSelected ? colors.primary : colors.primary50)
    }
  };
};

var Option = function Option(props) {
  var children = props.children,
      className = props.className,
      cx = props.cx,
      getStyles = props.getStyles,
      isDisabled = props.isDisabled,
      isFocused = props.isFocused,
      isSelected = props.isSelected,
      innerRef = props.innerRef,
      innerProps = props.innerProps;
  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("div", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    css: getStyles('option', props),
    className: cx({
      option: true,
      'option--is-disabled': isDisabled,
      'option--is-focused': isFocused,
      'option--is-selected': isSelected
    }, className),
    ref: innerRef
  }, innerProps), children);
};

var placeholderCSS = function placeholderCSS(_ref) {
  var _ref$theme = _ref.theme,
      spacing = _ref$theme.spacing,
      colors = _ref$theme.colors;
  return {
    label: 'placeholder',
    color: colors.neutral50,
    marginLeft: spacing.baseUnit / 2,
    marginRight: spacing.baseUnit / 2,
    position: 'absolute',
    top: '50%',
    transform: 'translateY(-50%)'
  };
};

var Placeholder = function Placeholder(props) {
  var children = props.children,
      className = props.className,
      cx = props.cx,
      getStyles = props.getStyles,
      innerProps = props.innerProps;
  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("div", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    css: getStyles('placeholder', props),
    className: cx({
      placeholder: true
    }, className)
  }, innerProps), children);
};

var css$1 = function css(_ref) {
  var isDisabled = _ref.isDisabled,
      _ref$theme = _ref.theme,
      spacing = _ref$theme.spacing,
      colors = _ref$theme.colors;
  return {
    label: 'singleValue',
    color: isDisabled ? colors.neutral40 : colors.neutral80,
    marginLeft: spacing.baseUnit / 2,
    marginRight: spacing.baseUnit / 2,
    maxWidth: "calc(100% - ".concat(spacing.baseUnit * 2, "px)"),
    overflow: 'hidden',
    position: 'absolute',
    textOverflow: 'ellipsis',
    whiteSpace: 'nowrap',
    top: '50%',
    transform: 'translateY(-50%)'
  };
};

var SingleValue = function SingleValue(props) {
  var children = props.children,
      className = props.className,
      cx = props.cx,
      getStyles = props.getStyles,
      isDisabled = props.isDisabled,
      innerProps = props.innerProps;
  return Object(_emotion_react__WEBPACK_IMPORTED_MODULE_1__["jsx"])("div", Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({
    css: getStyles('singleValue', props),
    className: cx({
      'single-value': true,
      'single-value--is-disabled': isDisabled
    }, className)
  }, innerProps), children);
};

var components = {
  ClearIndicator: ClearIndicator,
  Control: Control,
  DropdownIndicator: DropdownIndicator,
  DownChevron: DownChevron,
  CrossIcon: CrossIcon,
  Group: Group,
  GroupHeading: GroupHeading,
  IndicatorsContainer: IndicatorsContainer,
  IndicatorSeparator: IndicatorSeparator,
  Input: Input,
  LoadingIndicator: LoadingIndicator,
  Menu: Menu,
  MenuList: MenuList,
  MenuPortal: MenuPortal,
  LoadingMessage: LoadingMessage,
  NoOptionsMessage: NoOptionsMessage,
  MultiValue: MultiValue,
  MultiValueContainer: MultiValueContainer,
  MultiValueLabel: MultiValueLabel,
  MultiValueRemove: MultiValueRemove,
  Option: Option,
  Placeholder: Placeholder,
  SelectContainer: SelectContainer,
  SingleValue: SingleValue,
  ValueContainer: ValueContainer
};
var defaultComponents = function defaultComponents(props) {
  return _objectSpread2(_objectSpread2({}, components), props.components);
};




/***/ }),

/***/ "./node_modules/react-select/dist/react-select.esm.js":
/*!************************************************************!*\
  !*** ./node_modules/react-select/dist/react-select.esm.js ***!
  \************************************************************/
/*! exports provided: createFilter, defaultTheme, mergeStyles, components, default, NonceProvider */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "NonceProvider", function() { return NonceProvider; });
/* harmony import */ var _Select_dbb12e54_esm_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Select-dbb12e54.esm.js */ "./node_modules/react-select/dist/Select-dbb12e54.esm.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "createFilter", function() { return _Select_dbb12e54_esm_js__WEBPACK_IMPORTED_MODULE_0__["c"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "defaultTheme", function() { return _Select_dbb12e54_esm_js__WEBPACK_IMPORTED_MODULE_0__["d"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "mergeStyles", function() { return _Select_dbb12e54_esm_js__WEBPACK_IMPORTED_MODULE_0__["m"]; });

/* harmony import */ var _stateManager_845a3300_esm_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./stateManager-845a3300.esm.js */ "./node_modules/react-select/dist/stateManager-845a3300.esm.js");
/* harmony import */ var _babel_runtime_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/esm/classCallCheck */ "./node_modules/@babel/runtime/helpers/esm/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/esm/createClass */ "./node_modules/@babel/runtime/helpers/esm/createClass.js");
/* harmony import */ var _babel_runtime_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/esm/inherits */ "./node_modules/@babel/runtime/helpers/esm/inherits.js");
/* harmony import */ var _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./index-4bd03571.esm.js */ "./node_modules/react-select/dist/index-4bd03571.esm.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "components", function() { return _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_5__["c"]; });

/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _emotion_react__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @emotion/react */ "./node_modules/@emotion/react/dist/emotion-react.browser.esm.js");
/* harmony import */ var _emotion_cache__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @emotion/cache */ "./node_modules/react-select/node_modules/@emotion/cache/dist/emotion-cache.browser.esm.js");
/* harmony import */ var memoize_one__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! memoize-one */ "./node_modules/memoize-one/dist/memoize-one.esm.js");
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ "./node_modules/@babel/runtime/helpers/extends.js");
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! @babel/runtime/helpers/toConsumableArray */ "./node_modules/@babel/runtime/helpers/toConsumableArray.js");
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var _babel_runtime_helpers_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! @babel/runtime/helpers/objectWithoutProperties */ "./node_modules/@babel/runtime/helpers/objectWithoutProperties.js");
/* harmony import */ var _babel_runtime_helpers_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var _babel_runtime_helpers_taggedTemplateLiteral__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! @babel/runtime/helpers/taggedTemplateLiteral */ "./node_modules/@babel/runtime/helpers/taggedTemplateLiteral.js");
/* harmony import */ var _babel_runtime_helpers_taggedTemplateLiteral__WEBPACK_IMPORTED_MODULE_13___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_taggedTemplateLiteral__WEBPACK_IMPORTED_MODULE_13__);
/* harmony import */ var _babel_runtime_helpers_typeof__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! @babel/runtime/helpers/typeof */ "./node_modules/@babel/runtime/helpers/typeof.js");
/* harmony import */ var _babel_runtime_helpers_typeof__WEBPACK_IMPORTED_MODULE_14___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_typeof__WEBPACK_IMPORTED_MODULE_14__);
/* harmony import */ var react_input_autosize__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! react-input-autosize */ "./node_modules/react-input-autosize/lib/AutosizeInput.js");
/* harmony import */ var react_input_autosize__WEBPACK_IMPORTED_MODULE_15___default = /*#__PURE__*/__webpack_require__.n(react_input_autosize__WEBPACK_IMPORTED_MODULE_15__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_16___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_16__);
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! react-dom */ "react-dom");
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_17___default = /*#__PURE__*/__webpack_require__.n(react_dom__WEBPACK_IMPORTED_MODULE_17__);





















var NonceProvider = /*#__PURE__*/function (_Component) {
  Object(_babel_runtime_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_4__["default"])(NonceProvider, _Component);

  var _super = Object(_index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_5__["_"])(NonceProvider);

  function NonceProvider(props) {
    var _this;

    Object(_babel_runtime_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_2__["default"])(this, NonceProvider);

    _this = _super.call(this, props);

    _this.createEmotionCache = function (nonce, key) {
      return Object(_emotion_cache__WEBPACK_IMPORTED_MODULE_8__["default"])({
        nonce: nonce,
        key: key
      });
    };

    _this.createEmotionCache = Object(memoize_one__WEBPACK_IMPORTED_MODULE_9__["default"])(_this.createEmotionCache);
    return _this;
  }

  Object(_babel_runtime_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_3__["default"])(NonceProvider, [{
    key: "render",
    value: function render() {
      var emotionCache = this.createEmotionCache(this.props.nonce, this.props.cacheKey);
      return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(_emotion_react__WEBPACK_IMPORTED_MODULE_7__["CacheProvider"], {
        value: emotionCache
      }, this.props.children);
    }
  }]);

  return NonceProvider;
}(react__WEBPACK_IMPORTED_MODULE_6__["Component"]);

var index = Object(_stateManager_845a3300_esm_js__WEBPACK_IMPORTED_MODULE_1__["m"])(_Select_dbb12e54_esm_js__WEBPACK_IMPORTED_MODULE_0__["S"]);

/* harmony default export */ __webpack_exports__["default"] = (index);



/***/ }),

/***/ "./node_modules/react-select/dist/stateManager-845a3300.esm.js":
/*!*********************************************************************!*\
  !*** ./node_modules/react-select/dist/stateManager-845a3300.esm.js ***!
  \*********************************************************************/
/*! exports provided: m */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "m", function() { return manageState; });
/* harmony import */ var _babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/esm/extends */ "./node_modules/@babel/runtime/helpers/esm/extends.js");
/* harmony import */ var _babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/esm/objectWithoutProperties */ "./node_modules/@babel/runtime/helpers/esm/objectWithoutProperties.js");
/* harmony import */ var _babel_runtime_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/esm/classCallCheck */ "./node_modules/@babel/runtime/helpers/esm/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/esm/createClass */ "./node_modules/@babel/runtime/helpers/esm/createClass.js");
/* harmony import */ var _babel_runtime_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/esm/inherits */ "./node_modules/@babel/runtime/helpers/esm/inherits.js");
/* harmony import */ var _index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./index-4bd03571.esm.js */ "./node_modules/react-select/dist/index-4bd03571.esm.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_6__);








var defaultProps = {
  defaultInputValue: '',
  defaultMenuIsOpen: false,
  defaultValue: null
};

var manageState = function manageState(SelectComponent) {
  var _class, _temp;

  return _temp = _class = /*#__PURE__*/function (_Component) {
    Object(_babel_runtime_helpers_esm_inherits__WEBPACK_IMPORTED_MODULE_4__["default"])(StateManager, _Component);

    var _super = Object(_index_4bd03571_esm_js__WEBPACK_IMPORTED_MODULE_5__["_"])(StateManager);

    function StateManager() {
      var _this;

      Object(_babel_runtime_helpers_esm_classCallCheck__WEBPACK_IMPORTED_MODULE_2__["default"])(this, StateManager);

      for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
        args[_key] = arguments[_key];
      }

      _this = _super.call.apply(_super, [this].concat(args));
      _this.select = void 0;
      _this.state = {
        inputValue: _this.props.inputValue !== undefined ? _this.props.inputValue : _this.props.defaultInputValue,
        menuIsOpen: _this.props.menuIsOpen !== undefined ? _this.props.menuIsOpen : _this.props.defaultMenuIsOpen,
        value: _this.props.value !== undefined ? _this.props.value : _this.props.defaultValue
      };

      _this.onChange = function (value, actionMeta) {
        _this.callProp('onChange', value, actionMeta);

        _this.setState({
          value: value
        });
      };

      _this.onInputChange = function (value, actionMeta) {
        // TODO: for backwards compatibility, we allow the prop to return a new
        // value, but now inputValue is a controllable prop we probably shouldn't
        var newValue = _this.callProp('onInputChange', value, actionMeta);

        _this.setState({
          inputValue: newValue !== undefined ? newValue : value
        });
      };

      _this.onMenuOpen = function () {
        _this.callProp('onMenuOpen');

        _this.setState({
          menuIsOpen: true
        });
      };

      _this.onMenuClose = function () {
        _this.callProp('onMenuClose');

        _this.setState({
          menuIsOpen: false
        });
      };

      return _this;
    }

    Object(_babel_runtime_helpers_esm_createClass__WEBPACK_IMPORTED_MODULE_3__["default"])(StateManager, [{
      key: "focus",
      value: function focus() {
        this.select.focus();
      }
    }, {
      key: "blur",
      value: function blur() {
        this.select.blur();
      } // FIXME: untyped flow code, return any

    }, {
      key: "getProp",
      value: function getProp(key) {
        return this.props[key] !== undefined ? this.props[key] : this.state[key];
      } // FIXME: untyped flow code, return any

    }, {
      key: "callProp",
      value: function callProp(name) {
        if (typeof this.props[name] === 'function') {
          var _this$props;

          for (var _len2 = arguments.length, args = new Array(_len2 > 1 ? _len2 - 1 : 0), _key2 = 1; _key2 < _len2; _key2++) {
            args[_key2 - 1] = arguments[_key2];
          }

          return (_this$props = this.props)[name].apply(_this$props, args);
        }
      }
    }, {
      key: "render",
      value: function render() {
        var _this2 = this;

        var _this$props2 = this.props;
            _this$props2.defaultInputValue;
            _this$props2.defaultMenuIsOpen;
            _this$props2.defaultValue;
            var props = Object(_babel_runtime_helpers_esm_objectWithoutProperties__WEBPACK_IMPORTED_MODULE_1__["default"])(_this$props2, ["defaultInputValue", "defaultMenuIsOpen", "defaultValue"]);

        return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_6___default.a.createElement(SelectComponent, Object(_babel_runtime_helpers_esm_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, props, {
          ref: function ref(_ref) {
            _this2.select = _ref;
          },
          inputValue: this.getProp('inputValue'),
          menuIsOpen: this.getProp('menuIsOpen'),
          onChange: this.onChange,
          onInputChange: this.onInputChange,
          onMenuClose: this.onMenuClose,
          onMenuOpen: this.onMenuOpen,
          value: this.getProp('value')
        }));
      }
    }]);

    return StateManager;
  }(react__WEBPACK_IMPORTED_MODULE_6__["Component"]), _class.defaultProps = defaultProps, _temp;
};




/***/ }),

/***/ "./node_modules/react-select/node_modules/@emotion/cache/dist/emotion-cache.browser.esm.js":
/*!*************************************************************************************************!*\
  !*** ./node_modules/react-select/node_modules/@emotion/cache/dist/emotion-cache.browser.esm.js ***!
  \*************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _emotion_sheet__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @emotion/sheet */ "./node_modules/react-select/node_modules/@emotion/sheet/dist/emotion-sheet.browser.esm.js");
/* harmony import */ var stylis__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! stylis */ "./node_modules/stylis/dist/stylis.mjs");
/* harmony import */ var _emotion_weak_memoize__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @emotion/weak-memoize */ "./node_modules/@emotion/weak-memoize/dist/weak-memoize.browser.esm.js");
/* harmony import */ var _emotion_memoize__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @emotion/memoize */ "./node_modules/@emotion/memoize/dist/memoize.browser.esm.js");





var last = function last(arr) {
  return arr.length ? arr[arr.length - 1] : null;
}; // based on https://github.com/thysultan/stylis.js/blob/e6843c373ebcbbfade25ebcc23f540ed8508da0a/src/Tokenizer.js#L239-L244


var identifierWithPointTracking = function identifierWithPointTracking(begin, points, index) {
  var previous = 0;
  var character = 0;

  while (true) {
    previous = character;
    character = Object(stylis__WEBPACK_IMPORTED_MODULE_1__["peek"])(); // &\f

    if (previous === 38 && character === 12) {
      points[index] = 1;
    }

    if (Object(stylis__WEBPACK_IMPORTED_MODULE_1__["token"])(character)) {
      break;
    }

    Object(stylis__WEBPACK_IMPORTED_MODULE_1__["next"])();
  }

  return Object(stylis__WEBPACK_IMPORTED_MODULE_1__["slice"])(begin, stylis__WEBPACK_IMPORTED_MODULE_1__["position"]);
};

var toRules = function toRules(parsed, points) {
  // pretend we've started with a comma
  var index = -1;
  var character = 44;

  do {
    switch (Object(stylis__WEBPACK_IMPORTED_MODULE_1__["token"])(character)) {
      case 0:
        // &\f
        if (character === 38 && Object(stylis__WEBPACK_IMPORTED_MODULE_1__["peek"])() === 12) {
          // this is not 100% correct, we don't account for literal sequences here - like for example quoted strings
          // stylis inserts \f after & to know when & where it should replace this sequence with the context selector
          // and when it should just concatenate the outer and inner selectors
          // it's very unlikely for this sequence to actually appear in a different context, so we just leverage this fact here
          points[index] = 1;
        }

        parsed[index] += identifierWithPointTracking(stylis__WEBPACK_IMPORTED_MODULE_1__["position"] - 1, points, index);
        break;

      case 2:
        parsed[index] += Object(stylis__WEBPACK_IMPORTED_MODULE_1__["delimit"])(character);
        break;

      case 4:
        // comma
        if (character === 44) {
          // colon
          parsed[++index] = Object(stylis__WEBPACK_IMPORTED_MODULE_1__["peek"])() === 58 ? '&\f' : '';
          points[index] = parsed[index].length;
          break;
        }

      // fallthrough

      default:
        parsed[index] += Object(stylis__WEBPACK_IMPORTED_MODULE_1__["from"])(character);
    }
  } while (character = Object(stylis__WEBPACK_IMPORTED_MODULE_1__["next"])());

  return parsed;
};

var getRules = function getRules(value, points) {
  return Object(stylis__WEBPACK_IMPORTED_MODULE_1__["dealloc"])(toRules(Object(stylis__WEBPACK_IMPORTED_MODULE_1__["alloc"])(value), points));
}; // WeakSet would be more appropriate, but only WeakMap is supported in IE11


var fixedElements = /* #__PURE__ */new WeakMap();
var compat = function compat(element) {
  if (element.type !== 'rule' || !element.parent || // positive .length indicates that this rule contains pseudo
  // negative .length indicates that this rule has been already prefixed
  element.length < 1) {
    return;
  }

  var value = element.value,
      parent = element.parent;
  var isImplicitRule = element.column === parent.column && element.line === parent.line;

  while (parent.type !== 'rule') {
    parent = parent.parent;
    if (!parent) return;
  } // short-circuit for the simplest case


  if (element.props.length === 1 && value.charCodeAt(0) !== 58
  /* colon */
  && !fixedElements.get(parent)) {
    return;
  } // if this is an implicitly inserted rule (the one eagerly inserted at the each new nested level)
  // then the props has already been manipulated beforehand as they that array is shared between it and its "rule parent"


  if (isImplicitRule) {
    return;
  }

  fixedElements.set(element, true);
  var points = [];
  var rules = getRules(value, points);
  var parentRules = parent.props;

  for (var i = 0, k = 0; i < rules.length; i++) {
    for (var j = 0; j < parentRules.length; j++, k++) {
      element.props[k] = points[i] ? rules[i].replace(/&\f/g, parentRules[j]) : parentRules[j] + " " + rules[i];
    }
  }
};
var removeLabel = function removeLabel(element) {
  if (element.type === 'decl') {
    var value = element.value;

    if ( // charcode for l
    value.charCodeAt(0) === 108 && // charcode for b
    value.charCodeAt(2) === 98) {
      // this ignores label
      element["return"] = '';
      element.value = '';
    }
  }
};
var ignoreFlag = 'emotion-disable-server-rendering-unsafe-selector-warning-please-do-not-use-this-the-warning-exists-for-a-reason';

var isIgnoringComment = function isIgnoringComment(element) {
  return !!element && element.type === 'comm' && element.children.indexOf(ignoreFlag) > -1;
};

var createUnsafeSelectorsAlarm = function createUnsafeSelectorsAlarm(cache) {
  return function (element, index, children) {
    if (element.type !== 'rule') return;
    var unsafePseudoClasses = element.value.match(/(:first|:nth|:nth-last)-child/g);

    if (unsafePseudoClasses && cache.compat !== true) {
      var prevElement = index > 0 ? children[index - 1] : null;

      if (prevElement && isIgnoringComment(last(prevElement.children))) {
        return;
      }

      unsafePseudoClasses.forEach(function (unsafePseudoClass) {
        console.error("The pseudo class \"" + unsafePseudoClass + "\" is potentially unsafe when doing server-side rendering. Try changing it to \"" + unsafePseudoClass.split('-child')[0] + "-of-type\".");
      });
    }
  };
};

var isImportRule = function isImportRule(element) {
  return element.type.charCodeAt(1) === 105 && element.type.charCodeAt(0) === 64;
};

var isPrependedWithRegularRules = function isPrependedWithRegularRules(index, children) {
  for (var i = index - 1; i >= 0; i--) {
    if (!isImportRule(children[i])) {
      return true;
    }
  }

  return false;
}; // use this to remove incorrect elements from further processing
// so they don't get handed to the `sheet` (or anything else)
// as that could potentially lead to additional logs which in turn could be overhelming to the user


var nullifyElement = function nullifyElement(element) {
  element.type = '';
  element.value = '';
  element["return"] = '';
  element.children = '';
  element.props = '';
};

var incorrectImportAlarm = function incorrectImportAlarm(element, index, children) {
  if (!isImportRule(element)) {
    return;
  }

  if (element.parent) {
    console.error("`@import` rules can't be nested inside other rules. Please move it to the top level and put it before regular rules. Keep in mind that they can only be used within global styles.");
    nullifyElement(element);
  } else if (isPrependedWithRegularRules(index, children)) {
    console.error("`@import` rules can't be after other rules. Please put your `@import` rules before your other rules.");
    nullifyElement(element);
  }
};

var defaultStylisPlugins = [stylis__WEBPACK_IMPORTED_MODULE_1__["prefixer"]];

var createCache = function createCache(options) {
  var key = options.key;

  if ( true && !key) {
    throw new Error("You have to configure `key` for your cache. Please make sure it's unique (and not equal to 'css') as it's used for linking styles to your cache.\n" + "If multiple caches share the same key they might \"fight\" for each other's style elements.");
  }

  if ( key === 'css') {
    var ssrStyles = document.querySelectorAll("style[data-emotion]:not([data-s])"); // get SSRed styles out of the way of React's hydration
    // document.head is a safe place to move them to(though note document.head is not necessarily the last place they will be)
    // note this very very intentionally targets all style elements regardless of the key to ensure
    // that creating a cache works inside of render of a React component

    Array.prototype.forEach.call(ssrStyles, function (node) {
      // we want to only move elements which have a space in the data-emotion attribute value
      // because that indicates that it is an Emotion 11 server-side rendered style elements
      // while we will already ignore Emotion 11 client-side inserted styles because of the :not([data-s]) part in the selector
      // Emotion 10 client-side inserted styles did not have data-s (but importantly did not have a space in their data-emotion attributes)
      // so checking for the space ensures that loading Emotion 11 after Emotion 10 has inserted some styles
      // will not result in the Emotion 10 styles being destroyed
      var dataEmotionAttribute = node.getAttribute('data-emotion');

      if (dataEmotionAttribute.indexOf(' ') === -1) {
        return;
      }
      document.head.appendChild(node);
      node.setAttribute('data-s', '');
    });
  }

  var stylisPlugins = options.stylisPlugins || defaultStylisPlugins;

  if (true) {
    // $FlowFixMe
    if (/[^a-z-]/.test(key)) {
      throw new Error("Emotion key must only contain lower case alphabetical characters and - but \"" + key + "\" was passed");
    }
  }

  var inserted = {}; // $FlowFixMe

  var container;
  var nodesToHydrate = [];

  {
    container = options.container || document.head;
    Array.prototype.forEach.call( // this means we will ignore elements which don't have a space in them which
    // means that the style elements we're looking at are only Emotion 11 server-rendered style elements
    document.querySelectorAll("style[data-emotion^=\"" + key + " \"]"), function (node) {
      var attrib = node.getAttribute("data-emotion").split(' '); // $FlowFixMe

      for (var i = 1; i < attrib.length; i++) {
        inserted[attrib[i]] = true;
      }

      nodesToHydrate.push(node);
    });
  }

  var _insert;

  var omnipresentPlugins = [compat, removeLabel];

  if (true) {
    omnipresentPlugins.push(createUnsafeSelectorsAlarm({
      get compat() {
        return cache.compat;
      }

    }), incorrectImportAlarm);
  }

  {
    var currentSheet;
    var finalizingPlugins = [stylis__WEBPACK_IMPORTED_MODULE_1__["stringify"],  true ? function (element) {
      if (!element.root) {
        if (element["return"]) {
          currentSheet.insert(element["return"]);
        } else if (element.value && element.type !== stylis__WEBPACK_IMPORTED_MODULE_1__["COMMENT"]) {
          // insert empty rule in non-production environments
          // so @emotion/jest can grab `key` from the (JS)DOM for caches without any rules inserted yet
          currentSheet.insert(element.value + "{}");
        }
      }
    } : undefined];
    var serializer = Object(stylis__WEBPACK_IMPORTED_MODULE_1__["middleware"])(omnipresentPlugins.concat(stylisPlugins, finalizingPlugins));

    var stylis = function stylis(styles) {
      return Object(stylis__WEBPACK_IMPORTED_MODULE_1__["serialize"])(Object(stylis__WEBPACK_IMPORTED_MODULE_1__["compile"])(styles), serializer);
    };

    _insert = function insert(selector, serialized, sheet, shouldCache) {
      currentSheet = sheet;

      if ( true && serialized.map !== undefined) {
        currentSheet = {
          insert: function insert(rule) {
            sheet.insert(rule + serialized.map);
          }
        };
      }

      stylis(selector ? selector + "{" + serialized.styles + "}" : serialized.styles);

      if (shouldCache) {
        cache.inserted[serialized.name] = true;
      }
    };
  }

  var cache = {
    key: key,
    sheet: new _emotion_sheet__WEBPACK_IMPORTED_MODULE_0__["StyleSheet"]({
      key: key,
      container: container,
      nonce: options.nonce,
      speedy: options.speedy,
      prepend: options.prepend,
      insertionPoint: options.insertionPoint
    }),
    nonce: options.nonce,
    inserted: inserted,
    registered: {},
    insert: _insert
  };
  cache.sheet.hydrate(nodesToHydrate);
  return cache;
};

/* harmony default export */ __webpack_exports__["default"] = (createCache);


/***/ }),

/***/ "./node_modules/react-select/node_modules/@emotion/sheet/dist/emotion-sheet.browser.esm.js":
/*!*************************************************************************************************!*\
  !*** ./node_modules/react-select/node_modules/@emotion/sheet/dist/emotion-sheet.browser.esm.js ***!
  \*************************************************************************************************/
/*! exports provided: StyleSheet */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "StyleSheet", function() { return StyleSheet; });
/*

Based off glamor's StyleSheet, thanks Sunil ❤️

high performance StyleSheet for css-in-js systems

- uses multiple style tags behind the scenes for millions of rules
- uses `insertRule` for appending in production for *much* faster performance

// usage

import { StyleSheet } from '@emotion/sheet'

let styleSheet = new StyleSheet({ key: '', container: document.head })

styleSheet.insert('#box { border: 1px solid red; }')
- appends a css rule into the stylesheet

styleSheet.flush()
- empties the stylesheet of all its contents

*/
// $FlowFixMe
function sheetForTag(tag) {
  if (tag.sheet) {
    // $FlowFixMe
    return tag.sheet;
  } // this weirdness brought to you by firefox

  /* istanbul ignore next */


  for (var i = 0; i < document.styleSheets.length; i++) {
    if (document.styleSheets[i].ownerNode === tag) {
      // $FlowFixMe
      return document.styleSheets[i];
    }
  }
}

function createStyleElement(options) {
  var tag = document.createElement('style');
  tag.setAttribute('data-emotion', options.key);

  if (options.nonce !== undefined) {
    tag.setAttribute('nonce', options.nonce);
  }

  tag.appendChild(document.createTextNode(''));
  tag.setAttribute('data-s', '');
  return tag;
}

var StyleSheet = /*#__PURE__*/function () {
  function StyleSheet(options) {
    var _this = this;

    this._insertTag = function (tag) {
      var before;

      if (_this.tags.length === 0) {
        if (_this.insertionPoint) {
          before = _this.insertionPoint.nextSibling;
        } else if (_this.prepend) {
          before = _this.container.firstChild;
        } else {
          before = _this.before;
        }
      } else {
        before = _this.tags[_this.tags.length - 1].nextSibling;
      }

      _this.container.insertBefore(tag, before);

      _this.tags.push(tag);
    };

    this.isSpeedy = options.speedy === undefined ? "development" === 'production' : options.speedy;
    this.tags = [];
    this.ctr = 0;
    this.nonce = options.nonce; // key is the value of the data-emotion attribute, it's used to identify different sheets

    this.key = options.key;
    this.container = options.container;
    this.prepend = options.prepend;
    this.insertionPoint = options.insertionPoint;
    this.before = null;
  }

  var _proto = StyleSheet.prototype;

  _proto.hydrate = function hydrate(nodes) {
    nodes.forEach(this._insertTag);
  };

  _proto.insert = function insert(rule) {
    // the max length is how many rules we have per style tag, it's 65000 in speedy mode
    // it's 1 in dev because we insert source maps that map a single rule to a location
    // and you can only have one source map per style tag
    if (this.ctr % (this.isSpeedy ? 65000 : 1) === 0) {
      this._insertTag(createStyleElement(this));
    }

    var tag = this.tags[this.tags.length - 1];

    if (true) {
      var isImportRule = rule.charCodeAt(0) === 64 && rule.charCodeAt(1) === 105;

      if (isImportRule && this._alreadyInsertedOrderInsensitiveRule) {
        // this would only cause problem in speedy mode
        // but we don't want enabling speedy to affect the observable behavior
        // so we report this error at all times
        console.error("You're attempting to insert the following rule:\n" + rule + '\n\n`@import` rules must be before all other types of rules in a stylesheet but other rules have already been inserted. Please ensure that `@import` rules are before all other rules.');
      }
      this._alreadyInsertedOrderInsensitiveRule = this._alreadyInsertedOrderInsensitiveRule || !isImportRule;
    }

    if (this.isSpeedy) {
      var sheet = sheetForTag(tag);

      try {
        // this is the ultrafast version, works across browsers
        // the big drawback is that the css won't be editable in devtools
        sheet.insertRule(rule, sheet.cssRules.length);
      } catch (e) {
        if ( true && !/:(-moz-placeholder|-moz-focus-inner|-moz-focusring|-ms-input-placeholder|-moz-read-write|-moz-read-only|-ms-clear){/.test(rule)) {
          console.error("There was a problem inserting the following rule: \"" + rule + "\"", e);
        }
      }
    } else {
      tag.appendChild(document.createTextNode(rule));
    }

    this.ctr++;
  };

  _proto.flush = function flush() {
    // $FlowFixMe
    this.tags.forEach(function (tag) {
      return tag.parentNode && tag.parentNode.removeChild(tag);
    });
    this.tags = [];
    this.ctr = 0;

    if (true) {
      this._alreadyInsertedOrderInsensitiveRule = false;
    }
  };

  return StyleSheet;
}();




/***/ }),

/***/ "./node_modules/react-sortablejs/dist/index.js":
/*!*****************************************************!*\
  !*** ./node_modules/react-sortablejs/dist/index.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var $8zHUo$sortablejs = __webpack_require__(/*! sortablejs */ "./node_modules/sortablejs/modular/sortable.esm.js");
var $8zHUo$classnames = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
var $8zHUo$react = __webpack_require__(/*! react */ "react");
var $8zHUo$tinyinvariant = __webpack_require__(/*! tiny-invariant */ "./node_modules/tiny-invariant/dist/tiny-invariant.esm.js");

function $parcel$interopDefault(a) {
  return a && a.__esModule ? a.default : a;
}
function $parcel$export(e, n, v, s) {
  Object.defineProperty(e, n, {get: v, set: s, enumerable: true, configurable: true});
}
function $parcel$exportWildcard(dest, source) {
  Object.keys(source).forEach(function(key) {
    if (key === 'default' || key === '__esModule' || dest.hasOwnProperty(key)) {
      return;
    }

    Object.defineProperty(dest, key, {
      enumerable: true,
      get: function get() {
        return source[key];
      }
    });
  });

  return dest;
}

$parcel$export(module.exports, "Sortable", () => $882b6d93070905b3$re_export$Sortable);
$parcel$export(module.exports, "Direction", () => $882b6d93070905b3$re_export$Direction);
$parcel$export(module.exports, "DOMRect", () => $882b6d93070905b3$re_export$DOMRect);
$parcel$export(module.exports, "GroupOptions", () => $882b6d93070905b3$re_export$GroupOptions);
$parcel$export(module.exports, "MoveEvent", () => $882b6d93070905b3$re_export$MoveEvent);
$parcel$export(module.exports, "Options", () => $882b6d93070905b3$re_export$Options);
$parcel$export(module.exports, "PullResult", () => $882b6d93070905b3$re_export$PullResult);
$parcel$export(module.exports, "PutResult", () => $882b6d93070905b3$re_export$PutResult);
$parcel$export(module.exports, "SortableEvent", () => $882b6d93070905b3$re_export$SortableEvent);
$parcel$export(module.exports, "SortableOptions", () => $882b6d93070905b3$re_export$SortableOptions);
$parcel$export(module.exports, "Utils", () => $882b6d93070905b3$re_export$Utils);
$parcel$export(module.exports, "ReactSortable", () => $7fe8e3ea572bda7a$export$11bbed9ee0012c13);





function $eb03e74f8f7db1f3$export$1d0aa160432dfea5(node) {
    if (node.parentElement !== null) node.parentElement.removeChild(node);
}
function $eb03e74f8f7db1f3$export$6d240faa51aa562f(parent, newChild, index) {
    const refChild = parent.children[index] || null;
    parent.insertBefore(newChild, refChild);
}
function $eb03e74f8f7db1f3$export$d7d742816c28cf91(customs) {
    $eb03e74f8f7db1f3$export$77f49a256021c8de(customs);
    $eb03e74f8f7db1f3$export$a6177d5829f70ebc(customs);
}
function $eb03e74f8f7db1f3$export$77f49a256021c8de(customs) {
    customs.forEach((curr)=>$eb03e74f8f7db1f3$export$1d0aa160432dfea5(curr.element)
    );
}
function $eb03e74f8f7db1f3$export$a6177d5829f70ebc(customs) {
    customs.forEach((curr)=>{
        $eb03e74f8f7db1f3$export$6d240faa51aa562f(curr.parentElement, curr.element, curr.oldIndex);
    });
}
function $eb03e74f8f7db1f3$export$4655efe700f887a(evt, list) {
    const mode = $eb03e74f8f7db1f3$export$1fc0f6205829e19c(evt);
    const parentElement = {
        parentElement: evt.from
    };
    let custom = [];
    switch(mode){
        case "normal":
            /* eslint-disable */ const item = {
                element: evt.item,
                newIndex: evt.newIndex,
                oldIndex: evt.oldIndex,
                parentElement: evt.from
            };
            custom = [
                item
            ];
            break;
        case "swap":
            const drag = {
                element: evt.item,
                oldIndex: evt.oldIndex,
                newIndex: evt.newIndex,
                ...parentElement
            };
            const swap = {
                element: evt.swapItem,
                oldIndex: evt.newIndex,
                newIndex: evt.oldIndex,
                ...parentElement
            };
            custom = [
                drag,
                swap
            ];
            break;
        case "multidrag":
            custom = evt.oldIndicies.map((curr, index)=>({
                    element: curr.multiDragElement,
                    oldIndex: curr.index,
                    newIndex: evt.newIndicies[index].index,
                    ...parentElement
                })
            );
            break;
    }
    /* eslint-enable */ const customs = $eb03e74f8f7db1f3$export$bc06a3af7dc65f53(custom, list);
    return customs;
}
function $eb03e74f8f7db1f3$export$c25cf8080bd305ec(normalized, list) {
    const a = $eb03e74f8f7db1f3$export$be2da95e6167b0bd(normalized, list);
    const b = $eb03e74f8f7db1f3$export$eca851ee65ae17e4(normalized, a);
    return b;
}
function $eb03e74f8f7db1f3$export$be2da95e6167b0bd(normalized, list) {
    const newList = [
        ...list
    ];
    normalized.concat().reverse().forEach((curr)=>newList.splice(curr.oldIndex, 1)
    );
    return newList;
}
function $eb03e74f8f7db1f3$export$eca851ee65ae17e4(normalized, list, evt, clone) {
    const newList = [
        ...list
    ];
    normalized.forEach((curr)=>{
        const newItem = clone && evt && clone(curr.item, evt);
        newList.splice(curr.newIndex, 0, newItem || curr.item);
    });
    return newList;
}
function $eb03e74f8f7db1f3$export$1fc0f6205829e19c(evt) {
    if (evt.oldIndicies && evt.oldIndicies.length > 0) return "multidrag";
    if (evt.swapItem) return "swap";
    return "normal";
}
function $eb03e74f8f7db1f3$export$bc06a3af7dc65f53(inputs, list) {
    const normalized = inputs.map((curr)=>({
            ...curr,
            item: list[curr.oldIndex]
        })
    ).sort((a, b)=>a.oldIndex - b.oldIndex
    );
    return normalized;
}
function $eb03e74f8f7db1f3$export$7553c81e62e31b7e(props) {
    /* eslint-disable */ const { list: // react sortable props
    list , setList: setList , children: children , tag: tag , style: style , className: className , clone: clone , onAdd: // sortable options that have methods we want to overwrite
    onAdd , onChange: onChange , onChoose: onChoose , onClone: onClone , onEnd: onEnd , onFilter: onFilter , onRemove: onRemove , onSort: onSort , onStart: onStart , onUnchoose: onUnchoose , onUpdate: onUpdate , onMove: onMove , onSpill: onSpill , onSelect: onSelect , onDeselect: onDeselect , ...options } = props;
    /* eslint-enable */ return options;
}


/** Holds a global reference for which react element is being dragged */ // @todo - use context to manage this. How does one use 2 different providers?
const $7fe8e3ea572bda7a$var$store = {
    dragging: null
};
class $7fe8e3ea572bda7a$export$11bbed9ee0012c13 extends $8zHUo$react.Component {
    constructor(props){
        super(props);
        // @todo forward ref this component
        this.ref = /*#__PURE__*/ $8zHUo$react.createRef();
        // make all state false because we can't change sortable unless a mouse gesture is made.
        const newList = [
            ...props.list
        ].map((item)=>Object.assign(item, {
                chosen: false,
                selected: false
            })
        );
        props.setList(newList, this.sortable, $7fe8e3ea572bda7a$var$store);
        ($parcel$interopDefault($8zHUo$tinyinvariant))(//@ts-expect-error: Doesn't exist. Will deprecate soon.
        !props.plugins, `
Plugins prop is no longer supported.
Instead, mount it with "Sortable.mount(new MultiDrag())"
Please read the updated README.md at https://github.com/SortableJS/react-sortablejs.
      `);
    }
    componentDidMount() {
        if (this.ref.current === null) return;
        const newOptions = this.makeOptions();
        ($parcel$interopDefault($8zHUo$sortablejs)).create(this.ref.current, newOptions);
    }
    componentDidUpdate(prevProps) {
        if (prevProps.disabled !== this.props.disabled && this.sortable) this.sortable.option("disabled", this.props.disabled);
    }
    render() {
        const { tag: tag , style: style , className: className , id: id  } = this.props;
        const classicProps = {
            style: style,
            className: className,
            id: id
        };
        // if no tag, default to a `div` element.
        const newTag = !tag || tag === null ? "div" : tag;
        return(/*#__PURE__*/ $8zHUo$react.createElement(newTag, {
            // @todo - find a way (perhaps with the callback) to allow AntD components to work
            ref: this.ref,
            ...classicProps
        }, this.getChildren()));
    }
    getChildren() {
        const { children: children , dataIdAttr: dataIdAttr , selectedClass: selectedClass = "sortable-selected" , chosenClass: chosenClass = "sortable-chosen" , dragClass: /* eslint-disable */ dragClass = "sortable-drag" , fallbackClass: fallbackClass = "sortable-falback" , ghostClass: ghostClass = "sortable-ghost" , swapClass: swapClass = "sortable-swap-highlight" , filter: /* eslint-enable */ filter = "sortable-filter" , list: list ,  } = this.props;
        // if no children, don't do anything.
        if (!children || children == null) return null;
        const dataid = dataIdAttr || "data-id";
        /* eslint-disable-next-line */ return $8zHUo$react.Children.map(children, (child, index)=>{
            if (child === undefined) return undefined;
            const item = list[index] || {
            };
            const { className: prevClassName  } = child.props;
            // @todo - handle the function if avalable. I don't think anyone will be doing this soon.
            const filtered = typeof filter === "string" && {
                [filter.replace(".", "")]: !!item.filtered
            };
            const className = ($parcel$interopDefault($8zHUo$classnames))(prevClassName, {
                [selectedClass]: item.selected,
                [chosenClass]: item.chosen,
                ...filtered
            });
            return(/*#__PURE__*/ $8zHUo$react.cloneElement(child, {
                [dataid]: child.key,
                className: className
            }));
        });
    }
    /** Appends the `sortable` property to this component */ get sortable() {
        const el = this.ref.current;
        if (el === null) return null;
        const key = Object.keys(el).find((k)=>k.includes("Sortable")
        );
        if (!key) return null;
        //@ts-expect-error: fix me.
        return el[key];
    }
    /** Converts all the props from `ReactSortable` into the `options` object that `Sortable.create(el, [options])` can use. */ makeOptions() {
        const DOMHandlers = [
            "onAdd",
            "onChoose",
            "onDeselect",
            "onEnd",
            "onRemove",
            "onSelect",
            "onSpill",
            "onStart",
            "onUnchoose",
            "onUpdate", 
        ];
        const NonDOMHandlers = [
            "onChange",
            "onClone",
            "onFilter",
            "onSort", 
        ];
        const newOptions = $eb03e74f8f7db1f3$export$7553c81e62e31b7e(this.props);
        DOMHandlers.forEach((name)=>newOptions[name] = this.prepareOnHandlerPropAndDOM(name)
        );
        NonDOMHandlers.forEach((name)=>newOptions[name] = this.prepareOnHandlerProp(name)
        );
        /** onMove has 2 arguments and needs to be handled seperately. */ const onMove1 = (evt, originalEvt)=>{
            const { onMove: onMove  } = this.props;
            const defaultValue = evt.willInsertAfter || -1;
            if (!onMove) return defaultValue;
            const result = onMove(evt, originalEvt, this.sortable, $7fe8e3ea572bda7a$var$store);
            if (typeof result === "undefined") return false;
            return result;
        };
        return {
            ...newOptions,
            onMove: onMove1
        };
    }
    /** Prepares a method that will be used in the sortable options to call an `on[Handler]` prop & an `on[Handler]` ReactSortable method.  */ prepareOnHandlerPropAndDOM(evtName) {
        return (evt)=>{
            // call the component prop
            this.callOnHandlerProp(evt, evtName);
            // calls state change
            //@ts-expect-error: until @types multidrag item is in
            this[evtName](evt);
        };
    }
    /** Prepares a method that will be used in the sortable options to call an `on[Handler]` prop */ prepareOnHandlerProp(evtName) {
        return (evt)=>{
            // call the component prop
            this.callOnHandlerProp(evt, evtName);
        };
    }
    /** Calls the `props.on[Handler]` function */ callOnHandlerProp(evt, evtName) {
        const propEvent = this.props[evtName];
        if (propEvent) propEvent(evt, this.sortable, $7fe8e3ea572bda7a$var$store);
    }
    // SORTABLE DOM HANDLING
    onAdd(evt) {
        const { list: list , setList: setList , clone: clone  } = this.props;
        /* eslint-disable-next-line */ const otherList = [
            ...$7fe8e3ea572bda7a$var$store.dragging.props.list
        ];
        const customs = $eb03e74f8f7db1f3$export$4655efe700f887a(evt, otherList);
        $eb03e74f8f7db1f3$export$77f49a256021c8de(customs);
        const newList = $eb03e74f8f7db1f3$export$eca851ee65ae17e4(customs, list, evt, clone).map((item)=>Object.assign(item, {
                selected: false
            })
        );
        setList(newList, this.sortable, $7fe8e3ea572bda7a$var$store);
    }
    onRemove(evt) {
        const { list: list , setList: setList  } = this.props;
        const mode = $eb03e74f8f7db1f3$export$1fc0f6205829e19c(evt);
        const customs = $eb03e74f8f7db1f3$export$4655efe700f887a(evt, list);
        $eb03e74f8f7db1f3$export$a6177d5829f70ebc(customs);
        let newList = [
            ...list
        ];
        // remove state if not in clone mode. otherwise, keep.
        if (evt.pullMode !== "clone") newList = $eb03e74f8f7db1f3$export$be2da95e6167b0bd(customs, newList);
        else {
            // switch used to get the clone
            let customClones = customs;
            switch(mode){
                case "multidrag":
                    customClones = customs.map((item, index)=>({
                            ...item,
                            element: evt.clones[index]
                        })
                    );
                    break;
                case "normal":
                    customClones = customs.map((item)=>({
                            ...item,
                            element: evt.clone
                        })
                    );
                    break;
                case "swap":
                default:
                    ($parcel$interopDefault($8zHUo$tinyinvariant))(true, `mode "${mode}" cannot clone. Please remove "props.clone" from <ReactSortable/> when using the "${mode}" plugin`);
            }
            $eb03e74f8f7db1f3$export$77f49a256021c8de(customClones);
            // replace selected items with cloned items
            customs.forEach((curr)=>{
                const index = curr.oldIndex;
                /* eslint-disable-next-line */ const newItem = this.props.clone(curr.item, evt);
                newList.splice(index, 1, newItem);
            });
        }
        // remove item.selected from list
        newList = newList.map((item)=>Object.assign(item, {
                selected: false
            })
        );
        setList(newList, this.sortable, $7fe8e3ea572bda7a$var$store);
    }
    onUpdate(evt) {
        const { list: list , setList: setList  } = this.props;
        const customs = $eb03e74f8f7db1f3$export$4655efe700f887a(evt, list);
        $eb03e74f8f7db1f3$export$77f49a256021c8de(customs);
        $eb03e74f8f7db1f3$export$a6177d5829f70ebc(customs);
        const newList = $eb03e74f8f7db1f3$export$c25cf8080bd305ec(customs, list);
        return setList(newList, this.sortable, $7fe8e3ea572bda7a$var$store);
    }
    onStart() {
        $7fe8e3ea572bda7a$var$store.dragging = this;
    }
    onEnd() {
        $7fe8e3ea572bda7a$var$store.dragging = null;
    }
    onChoose(evt) {
        const { list: list , setList: setList  } = this.props;
        const newList = list.map((item, index)=>{
            let newItem = item;
            if (index === evt.oldIndex) newItem = Object.assign(item, {
                chosen: true
            });
            return newItem;
        });
        setList(newList, this.sortable, $7fe8e3ea572bda7a$var$store);
    }
    onUnchoose(evt) {
        const { list: list , setList: setList  } = this.props;
        const newList = list.map((item, index)=>{
            let newItem = item;
            if (index === evt.oldIndex) newItem = Object.assign(newItem, {
                chosen: false
            });
            return newItem;
        });
        setList(newList, this.sortable, $7fe8e3ea572bda7a$var$store);
    }
    onSpill(evt) {
        const { removeOnSpill: removeOnSpill , revertOnSpill: revertOnSpill  } = this.props;
        if (removeOnSpill && !revertOnSpill) $eb03e74f8f7db1f3$export$1d0aa160432dfea5(evt.item);
    }
    onSelect(evt) {
        const { list: list , setList: setList  } = this.props;
        const newList = list.map((item)=>Object.assign(item, {
                selected: false
            })
        );
        evt.newIndicies.forEach((curr)=>{
            const index = curr.index;
            if (index === -1) {
                console.log(`"${evt.type}" had indice of "${curr.index}", which is probably -1 and doesn't usually happen here.`);
                console.log(evt);
                return;
            }
            newList[index].selected = true;
        });
        setList(newList, this.sortable, $7fe8e3ea572bda7a$var$store);
    }
    onDeselect(evt) {
        const { list: list , setList: setList  } = this.props;
        const newList = list.map((item)=>Object.assign(item, {
                selected: false
            })
        );
        evt.newIndicies.forEach((curr)=>{
            const index = curr.index;
            if (index === -1) return;
            newList[index].selected = true;
        });
        setList(newList, this.sortable, $7fe8e3ea572bda7a$var$store);
    }
}
$7fe8e3ea572bda7a$export$11bbed9ee0012c13.defaultProps = {
    clone: (item)=>item
};


var $faefaad95e5fcca0$exports = {};


$parcel$exportWildcard(module.exports, $faefaad95e5fcca0$exports);


//# sourceMappingURL=index.js.map


/***/ }),

/***/ "./node_modules/sortablejs/modular/sortable.esm.js":
/*!*********************************************************!*\
  !*** ./node_modules/sortablejs/modular/sortable.esm.js ***!
  \*********************************************************/
/*! exports provided: default, MultiDrag, Sortable, Swap */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "MultiDrag", function() { return MultiDragPlugin; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Sortable", function() { return Sortable; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Swap", function() { return SwapPlugin; });
/**!
 * Sortable 1.14.0
 * @author	RubaXa   <trash@rubaxa.org>
 * @author	owenm    <owen23355@gmail.com>
 * @license MIT
 */
function ownKeys(object, enumerableOnly) {
  var keys = Object.keys(object);

  if (Object.getOwnPropertySymbols) {
    var symbols = Object.getOwnPropertySymbols(object);

    if (enumerableOnly) {
      symbols = symbols.filter(function (sym) {
        return Object.getOwnPropertyDescriptor(object, sym).enumerable;
      });
    }

    keys.push.apply(keys, symbols);
  }

  return keys;
}

function _objectSpread2(target) {
  for (var i = 1; i < arguments.length; i++) {
    var source = arguments[i] != null ? arguments[i] : {};

    if (i % 2) {
      ownKeys(Object(source), true).forEach(function (key) {
        _defineProperty(target, key, source[key]);
      });
    } else if (Object.getOwnPropertyDescriptors) {
      Object.defineProperties(target, Object.getOwnPropertyDescriptors(source));
    } else {
      ownKeys(Object(source)).forEach(function (key) {
        Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key));
      });
    }
  }

  return target;
}

function _typeof(obj) {
  "@babel/helpers - typeof";

  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    _typeof = function (obj) {
      return typeof obj;
    };
  } else {
    _typeof = function (obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };
  }

  return _typeof(obj);
}

function _defineProperty(obj, key, value) {
  if (key in obj) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }

  return obj;
}

function _extends() {
  _extends = Object.assign || function (target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i];

      for (var key in source) {
        if (Object.prototype.hasOwnProperty.call(source, key)) {
          target[key] = source[key];
        }
      }
    }

    return target;
  };

  return _extends.apply(this, arguments);
}

function _objectWithoutPropertiesLoose(source, excluded) {
  if (source == null) return {};
  var target = {};
  var sourceKeys = Object.keys(source);
  var key, i;

  for (i = 0; i < sourceKeys.length; i++) {
    key = sourceKeys[i];
    if (excluded.indexOf(key) >= 0) continue;
    target[key] = source[key];
  }

  return target;
}

function _objectWithoutProperties(source, excluded) {
  if (source == null) return {};

  var target = _objectWithoutPropertiesLoose(source, excluded);

  var key, i;

  if (Object.getOwnPropertySymbols) {
    var sourceSymbolKeys = Object.getOwnPropertySymbols(source);

    for (i = 0; i < sourceSymbolKeys.length; i++) {
      key = sourceSymbolKeys[i];
      if (excluded.indexOf(key) >= 0) continue;
      if (!Object.prototype.propertyIsEnumerable.call(source, key)) continue;
      target[key] = source[key];
    }
  }

  return target;
}

function _toConsumableArray(arr) {
  return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread();
}

function _arrayWithoutHoles(arr) {
  if (Array.isArray(arr)) return _arrayLikeToArray(arr);
}

function _iterableToArray(iter) {
  if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter);
}

function _unsupportedIterableToArray(o, minLen) {
  if (!o) return;
  if (typeof o === "string") return _arrayLikeToArray(o, minLen);
  var n = Object.prototype.toString.call(o).slice(8, -1);
  if (n === "Object" && o.constructor) n = o.constructor.name;
  if (n === "Map" || n === "Set") return Array.from(o);
  if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen);
}

function _arrayLikeToArray(arr, len) {
  if (len == null || len > arr.length) len = arr.length;

  for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i];

  return arr2;
}

function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}

var version = "1.14.0";

function userAgent(pattern) {
  if (typeof window !== 'undefined' && window.navigator) {
    return !! /*@__PURE__*/navigator.userAgent.match(pattern);
  }
}

var IE11OrLess = userAgent(/(?:Trident.*rv[ :]?11\.|msie|iemobile|Windows Phone)/i);
var Edge = userAgent(/Edge/i);
var FireFox = userAgent(/firefox/i);
var Safari = userAgent(/safari/i) && !userAgent(/chrome/i) && !userAgent(/android/i);
var IOS = userAgent(/iP(ad|od|hone)/i);
var ChromeForAndroid = userAgent(/chrome/i) && userAgent(/android/i);

var captureMode = {
  capture: false,
  passive: false
};

function on(el, event, fn) {
  el.addEventListener(event, fn, !IE11OrLess && captureMode);
}

function off(el, event, fn) {
  el.removeEventListener(event, fn, !IE11OrLess && captureMode);
}

function matches(
/**HTMLElement*/
el,
/**String*/
selector) {
  if (!selector) return;
  selector[0] === '>' && (selector = selector.substring(1));

  if (el) {
    try {
      if (el.matches) {
        return el.matches(selector);
      } else if (el.msMatchesSelector) {
        return el.msMatchesSelector(selector);
      } else if (el.webkitMatchesSelector) {
        return el.webkitMatchesSelector(selector);
      }
    } catch (_) {
      return false;
    }
  }

  return false;
}

function getParentOrHost(el) {
  return el.host && el !== document && el.host.nodeType ? el.host : el.parentNode;
}

function closest(
/**HTMLElement*/
el,
/**String*/
selector,
/**HTMLElement*/
ctx, includeCTX) {
  if (el) {
    ctx = ctx || document;

    do {
      if (selector != null && (selector[0] === '>' ? el.parentNode === ctx && matches(el, selector) : matches(el, selector)) || includeCTX && el === ctx) {
        return el;
      }

      if (el === ctx) break;
      /* jshint boss:true */
    } while (el = getParentOrHost(el));
  }

  return null;
}

var R_SPACE = /\s+/g;

function toggleClass(el, name, state) {
  if (el && name) {
    if (el.classList) {
      el.classList[state ? 'add' : 'remove'](name);
    } else {
      var className = (' ' + el.className + ' ').replace(R_SPACE, ' ').replace(' ' + name + ' ', ' ');
      el.className = (className + (state ? ' ' + name : '')).replace(R_SPACE, ' ');
    }
  }
}

function css(el, prop, val) {
  var style = el && el.style;

  if (style) {
    if (val === void 0) {
      if (document.defaultView && document.defaultView.getComputedStyle) {
        val = document.defaultView.getComputedStyle(el, '');
      } else if (el.currentStyle) {
        val = el.currentStyle;
      }

      return prop === void 0 ? val : val[prop];
    } else {
      if (!(prop in style) && prop.indexOf('webkit') === -1) {
        prop = '-webkit-' + prop;
      }

      style[prop] = val + (typeof val === 'string' ? '' : 'px');
    }
  }
}

function matrix(el, selfOnly) {
  var appliedTransforms = '';

  if (typeof el === 'string') {
    appliedTransforms = el;
  } else {
    do {
      var transform = css(el, 'transform');

      if (transform && transform !== 'none') {
        appliedTransforms = transform + ' ' + appliedTransforms;
      }
      /* jshint boss:true */

    } while (!selfOnly && (el = el.parentNode));
  }

  var matrixFn = window.DOMMatrix || window.WebKitCSSMatrix || window.CSSMatrix || window.MSCSSMatrix;
  /*jshint -W056 */

  return matrixFn && new matrixFn(appliedTransforms);
}

function find(ctx, tagName, iterator) {
  if (ctx) {
    var list = ctx.getElementsByTagName(tagName),
        i = 0,
        n = list.length;

    if (iterator) {
      for (; i < n; i++) {
        iterator(list[i], i);
      }
    }

    return list;
  }

  return [];
}

function getWindowScrollingElement() {
  var scrollingElement = document.scrollingElement;

  if (scrollingElement) {
    return scrollingElement;
  } else {
    return document.documentElement;
  }
}
/**
 * Returns the "bounding client rect" of given element
 * @param  {HTMLElement} el                       The element whose boundingClientRect is wanted
 * @param  {[Boolean]} relativeToContainingBlock  Whether the rect should be relative to the containing block of (including) the container
 * @param  {[Boolean]} relativeToNonStaticParent  Whether the rect should be relative to the relative parent of (including) the contaienr
 * @param  {[Boolean]} undoScale                  Whether the container's scale() should be undone
 * @param  {[HTMLElement]} container              The parent the element will be placed in
 * @return {Object}                               The boundingClientRect of el, with specified adjustments
 */


function getRect(el, relativeToContainingBlock, relativeToNonStaticParent, undoScale, container) {
  if (!el.getBoundingClientRect && el !== window) return;
  var elRect, top, left, bottom, right, height, width;

  if (el !== window && el.parentNode && el !== getWindowScrollingElement()) {
    elRect = el.getBoundingClientRect();
    top = elRect.top;
    left = elRect.left;
    bottom = elRect.bottom;
    right = elRect.right;
    height = elRect.height;
    width = elRect.width;
  } else {
    top = 0;
    left = 0;
    bottom = window.innerHeight;
    right = window.innerWidth;
    height = window.innerHeight;
    width = window.innerWidth;
  }

  if ((relativeToContainingBlock || relativeToNonStaticParent) && el !== window) {
    // Adjust for translate()
    container = container || el.parentNode; // solves #1123 (see: https://stackoverflow.com/a/37953806/6088312)
    // Not needed on <= IE11

    if (!IE11OrLess) {
      do {
        if (container && container.getBoundingClientRect && (css(container, 'transform') !== 'none' || relativeToNonStaticParent && css(container, 'position') !== 'static')) {
          var containerRect = container.getBoundingClientRect(); // Set relative to edges of padding box of container

          top -= containerRect.top + parseInt(css(container, 'border-top-width'));
          left -= containerRect.left + parseInt(css(container, 'border-left-width'));
          bottom = top + elRect.height;
          right = left + elRect.width;
          break;
        }
        /* jshint boss:true */

      } while (container = container.parentNode);
    }
  }

  if (undoScale && el !== window) {
    // Adjust for scale()
    var elMatrix = matrix(container || el),
        scaleX = elMatrix && elMatrix.a,
        scaleY = elMatrix && elMatrix.d;

    if (elMatrix) {
      top /= scaleY;
      left /= scaleX;
      width /= scaleX;
      height /= scaleY;
      bottom = top + height;
      right = left + width;
    }
  }

  return {
    top: top,
    left: left,
    bottom: bottom,
    right: right,
    width: width,
    height: height
  };
}
/**
 * Checks if a side of an element is scrolled past a side of its parents
 * @param  {HTMLElement}  el           The element who's side being scrolled out of view is in question
 * @param  {String}       elSide       Side of the element in question ('top', 'left', 'right', 'bottom')
 * @param  {String}       parentSide   Side of the parent in question ('top', 'left', 'right', 'bottom')
 * @return {HTMLElement}               The parent scroll element that the el's side is scrolled past, or null if there is no such element
 */


function isScrolledPast(el, elSide, parentSide) {
  var parent = getParentAutoScrollElement(el, true),
      elSideVal = getRect(el)[elSide];
  /* jshint boss:true */

  while (parent) {
    var parentSideVal = getRect(parent)[parentSide],
        visible = void 0;

    if (parentSide === 'top' || parentSide === 'left') {
      visible = elSideVal >= parentSideVal;
    } else {
      visible = elSideVal <= parentSideVal;
    }

    if (!visible) return parent;
    if (parent === getWindowScrollingElement()) break;
    parent = getParentAutoScrollElement(parent, false);
  }

  return false;
}
/**
 * Gets nth child of el, ignoring hidden children, sortable's elements (does not ignore clone if it's visible)
 * and non-draggable elements
 * @param  {HTMLElement} el       The parent element
 * @param  {Number} childNum      The index of the child
 * @param  {Object} options       Parent Sortable's options
 * @return {HTMLElement}          The child at index childNum, or null if not found
 */


function getChild(el, childNum, options, includeDragEl) {
  var currentChild = 0,
      i = 0,
      children = el.children;

  while (i < children.length) {
    if (children[i].style.display !== 'none' && children[i] !== Sortable.ghost && (includeDragEl || children[i] !== Sortable.dragged) && closest(children[i], options.draggable, el, false)) {
      if (currentChild === childNum) {
        return children[i];
      }

      currentChild++;
    }

    i++;
  }

  return null;
}
/**
 * Gets the last child in the el, ignoring ghostEl or invisible elements (clones)
 * @param  {HTMLElement} el       Parent element
 * @param  {selector} selector    Any other elements that should be ignored
 * @return {HTMLElement}          The last child, ignoring ghostEl
 */


function lastChild(el, selector) {
  var last = el.lastElementChild;

  while (last && (last === Sortable.ghost || css(last, 'display') === 'none' || selector && !matches(last, selector))) {
    last = last.previousElementSibling;
  }

  return last || null;
}
/**
 * Returns the index of an element within its parent for a selected set of
 * elements
 * @param  {HTMLElement} el
 * @param  {selector} selector
 * @return {number}
 */


function index(el, selector) {
  var index = 0;

  if (!el || !el.parentNode) {
    return -1;
  }
  /* jshint boss:true */


  while (el = el.previousElementSibling) {
    if (el.nodeName.toUpperCase() !== 'TEMPLATE' && el !== Sortable.clone && (!selector || matches(el, selector))) {
      index++;
    }
  }

  return index;
}
/**
 * Returns the scroll offset of the given element, added with all the scroll offsets of parent elements.
 * The value is returned in real pixels.
 * @param  {HTMLElement} el
 * @return {Array}             Offsets in the format of [left, top]
 */


function getRelativeScrollOffset(el) {
  var offsetLeft = 0,
      offsetTop = 0,
      winScroller = getWindowScrollingElement();

  if (el) {
    do {
      var elMatrix = matrix(el),
          scaleX = elMatrix.a,
          scaleY = elMatrix.d;
      offsetLeft += el.scrollLeft * scaleX;
      offsetTop += el.scrollTop * scaleY;
    } while (el !== winScroller && (el = el.parentNode));
  }

  return [offsetLeft, offsetTop];
}
/**
 * Returns the index of the object within the given array
 * @param  {Array} arr   Array that may or may not hold the object
 * @param  {Object} obj  An object that has a key-value pair unique to and identical to a key-value pair in the object you want to find
 * @return {Number}      The index of the object in the array, or -1
 */


function indexOfObject(arr, obj) {
  for (var i in arr) {
    if (!arr.hasOwnProperty(i)) continue;

    for (var key in obj) {
      if (obj.hasOwnProperty(key) && obj[key] === arr[i][key]) return Number(i);
    }
  }

  return -1;
}

function getParentAutoScrollElement(el, includeSelf) {
  // skip to window
  if (!el || !el.getBoundingClientRect) return getWindowScrollingElement();
  var elem = el;
  var gotSelf = false;

  do {
    // we don't need to get elem css if it isn't even overflowing in the first place (performance)
    if (elem.clientWidth < elem.scrollWidth || elem.clientHeight < elem.scrollHeight) {
      var elemCSS = css(elem);

      if (elem.clientWidth < elem.scrollWidth && (elemCSS.overflowX == 'auto' || elemCSS.overflowX == 'scroll') || elem.clientHeight < elem.scrollHeight && (elemCSS.overflowY == 'auto' || elemCSS.overflowY == 'scroll')) {
        if (!elem.getBoundingClientRect || elem === document.body) return getWindowScrollingElement();
        if (gotSelf || includeSelf) return elem;
        gotSelf = true;
      }
    }
    /* jshint boss:true */

  } while (elem = elem.parentNode);

  return getWindowScrollingElement();
}

function extend(dst, src) {
  if (dst && src) {
    for (var key in src) {
      if (src.hasOwnProperty(key)) {
        dst[key] = src[key];
      }
    }
  }

  return dst;
}

function isRectEqual(rect1, rect2) {
  return Math.round(rect1.top) === Math.round(rect2.top) && Math.round(rect1.left) === Math.round(rect2.left) && Math.round(rect1.height) === Math.round(rect2.height) && Math.round(rect1.width) === Math.round(rect2.width);
}

var _throttleTimeout;

function throttle(callback, ms) {
  return function () {
    if (!_throttleTimeout) {
      var args = arguments,
          _this = this;

      if (args.length === 1) {
        callback.call(_this, args[0]);
      } else {
        callback.apply(_this, args);
      }

      _throttleTimeout = setTimeout(function () {
        _throttleTimeout = void 0;
      }, ms);
    }
  };
}

function cancelThrottle() {
  clearTimeout(_throttleTimeout);
  _throttleTimeout = void 0;
}

function scrollBy(el, x, y) {
  el.scrollLeft += x;
  el.scrollTop += y;
}

function clone(el) {
  var Polymer = window.Polymer;
  var $ = window.jQuery || window.Zepto;

  if (Polymer && Polymer.dom) {
    return Polymer.dom(el).cloneNode(true);
  } else if ($) {
    return $(el).clone(true)[0];
  } else {
    return el.cloneNode(true);
  }
}

function setRect(el, rect) {
  css(el, 'position', 'absolute');
  css(el, 'top', rect.top);
  css(el, 'left', rect.left);
  css(el, 'width', rect.width);
  css(el, 'height', rect.height);
}

function unsetRect(el) {
  css(el, 'position', '');
  css(el, 'top', '');
  css(el, 'left', '');
  css(el, 'width', '');
  css(el, 'height', '');
}

var expando = 'Sortable' + new Date().getTime();

function AnimationStateManager() {
  var animationStates = [],
      animationCallbackId;
  return {
    captureAnimationState: function captureAnimationState() {
      animationStates = [];
      if (!this.options.animation) return;
      var children = [].slice.call(this.el.children);
      children.forEach(function (child) {
        if (css(child, 'display') === 'none' || child === Sortable.ghost) return;
        animationStates.push({
          target: child,
          rect: getRect(child)
        });

        var fromRect = _objectSpread2({}, animationStates[animationStates.length - 1].rect); // If animating: compensate for current animation


        if (child.thisAnimationDuration) {
          var childMatrix = matrix(child, true);

          if (childMatrix) {
            fromRect.top -= childMatrix.f;
            fromRect.left -= childMatrix.e;
          }
        }

        child.fromRect = fromRect;
      });
    },
    addAnimationState: function addAnimationState(state) {
      animationStates.push(state);
    },
    removeAnimationState: function removeAnimationState(target) {
      animationStates.splice(indexOfObject(animationStates, {
        target: target
      }), 1);
    },
    animateAll: function animateAll(callback) {
      var _this = this;

      if (!this.options.animation) {
        clearTimeout(animationCallbackId);
        if (typeof callback === 'function') callback();
        return;
      }

      var animating = false,
          animationTime = 0;
      animationStates.forEach(function (state) {
        var time = 0,
            target = state.target,
            fromRect = target.fromRect,
            toRect = getRect(target),
            prevFromRect = target.prevFromRect,
            prevToRect = target.prevToRect,
            animatingRect = state.rect,
            targetMatrix = matrix(target, true);

        if (targetMatrix) {
          // Compensate for current animation
          toRect.top -= targetMatrix.f;
          toRect.left -= targetMatrix.e;
        }

        target.toRect = toRect;

        if (target.thisAnimationDuration) {
          // Could also check if animatingRect is between fromRect and toRect
          if (isRectEqual(prevFromRect, toRect) && !isRectEqual(fromRect, toRect) && // Make sure animatingRect is on line between toRect & fromRect
          (animatingRect.top - toRect.top) / (animatingRect.left - toRect.left) === (fromRect.top - toRect.top) / (fromRect.left - toRect.left)) {
            // If returning to same place as started from animation and on same axis
            time = calculateRealTime(animatingRect, prevFromRect, prevToRect, _this.options);
          }
        } // if fromRect != toRect: animate


        if (!isRectEqual(toRect, fromRect)) {
          target.prevFromRect = fromRect;
          target.prevToRect = toRect;

          if (!time) {
            time = _this.options.animation;
          }

          _this.animate(target, animatingRect, toRect, time);
        }

        if (time) {
          animating = true;
          animationTime = Math.max(animationTime, time);
          clearTimeout(target.animationResetTimer);
          target.animationResetTimer = setTimeout(function () {
            target.animationTime = 0;
            target.prevFromRect = null;
            target.fromRect = null;
            target.prevToRect = null;
            target.thisAnimationDuration = null;
          }, time);
          target.thisAnimationDuration = time;
        }
      });
      clearTimeout(animationCallbackId);

      if (!animating) {
        if (typeof callback === 'function') callback();
      } else {
        animationCallbackId = setTimeout(function () {
          if (typeof callback === 'function') callback();
        }, animationTime);
      }

      animationStates = [];
    },
    animate: function animate(target, currentRect, toRect, duration) {
      if (duration) {
        css(target, 'transition', '');
        css(target, 'transform', '');
        var elMatrix = matrix(this.el),
            scaleX = elMatrix && elMatrix.a,
            scaleY = elMatrix && elMatrix.d,
            translateX = (currentRect.left - toRect.left) / (scaleX || 1),
            translateY = (currentRect.top - toRect.top) / (scaleY || 1);
        target.animatingX = !!translateX;
        target.animatingY = !!translateY;
        css(target, 'transform', 'translate3d(' + translateX + 'px,' + translateY + 'px,0)');
        this.forRepaintDummy = repaint(target); // repaint

        css(target, 'transition', 'transform ' + duration + 'ms' + (this.options.easing ? ' ' + this.options.easing : ''));
        css(target, 'transform', 'translate3d(0,0,0)');
        typeof target.animated === 'number' && clearTimeout(target.animated);
        target.animated = setTimeout(function () {
          css(target, 'transition', '');
          css(target, 'transform', '');
          target.animated = false;
          target.animatingX = false;
          target.animatingY = false;
        }, duration);
      }
    }
  };
}

function repaint(target) {
  return target.offsetWidth;
}

function calculateRealTime(animatingRect, fromRect, toRect, options) {
  return Math.sqrt(Math.pow(fromRect.top - animatingRect.top, 2) + Math.pow(fromRect.left - animatingRect.left, 2)) / Math.sqrt(Math.pow(fromRect.top - toRect.top, 2) + Math.pow(fromRect.left - toRect.left, 2)) * options.animation;
}

var plugins = [];
var defaults = {
  initializeByDefault: true
};
var PluginManager = {
  mount: function mount(plugin) {
    // Set default static properties
    for (var option in defaults) {
      if (defaults.hasOwnProperty(option) && !(option in plugin)) {
        plugin[option] = defaults[option];
      }
    }

    plugins.forEach(function (p) {
      if (p.pluginName === plugin.pluginName) {
        throw "Sortable: Cannot mount plugin ".concat(plugin.pluginName, " more than once");
      }
    });
    plugins.push(plugin);
  },
  pluginEvent: function pluginEvent(eventName, sortable, evt) {
    var _this = this;

    this.eventCanceled = false;

    evt.cancel = function () {
      _this.eventCanceled = true;
    };

    var eventNameGlobal = eventName + 'Global';
    plugins.forEach(function (plugin) {
      if (!sortable[plugin.pluginName]) return; // Fire global events if it exists in this sortable

      if (sortable[plugin.pluginName][eventNameGlobal]) {
        sortable[plugin.pluginName][eventNameGlobal](_objectSpread2({
          sortable: sortable
        }, evt));
      } // Only fire plugin event if plugin is enabled in this sortable,
      // and plugin has event defined


      if (sortable.options[plugin.pluginName] && sortable[plugin.pluginName][eventName]) {
        sortable[plugin.pluginName][eventName](_objectSpread2({
          sortable: sortable
        }, evt));
      }
    });
  },
  initializePlugins: function initializePlugins(sortable, el, defaults, options) {
    plugins.forEach(function (plugin) {
      var pluginName = plugin.pluginName;
      if (!sortable.options[pluginName] && !plugin.initializeByDefault) return;
      var initialized = new plugin(sortable, el, sortable.options);
      initialized.sortable = sortable;
      initialized.options = sortable.options;
      sortable[pluginName] = initialized; // Add default options from plugin

      _extends(defaults, initialized.defaults);
    });

    for (var option in sortable.options) {
      if (!sortable.options.hasOwnProperty(option)) continue;
      var modified = this.modifyOption(sortable, option, sortable.options[option]);

      if (typeof modified !== 'undefined') {
        sortable.options[option] = modified;
      }
    }
  },
  getEventProperties: function getEventProperties(name, sortable) {
    var eventProperties = {};
    plugins.forEach(function (plugin) {
      if (typeof plugin.eventProperties !== 'function') return;

      _extends(eventProperties, plugin.eventProperties.call(sortable[plugin.pluginName], name));
    });
    return eventProperties;
  },
  modifyOption: function modifyOption(sortable, name, value) {
    var modifiedValue;
    plugins.forEach(function (plugin) {
      // Plugin must exist on the Sortable
      if (!sortable[plugin.pluginName]) return; // If static option listener exists for this option, call in the context of the Sortable's instance of this plugin

      if (plugin.optionListeners && typeof plugin.optionListeners[name] === 'function') {
        modifiedValue = plugin.optionListeners[name].call(sortable[plugin.pluginName], value);
      }
    });
    return modifiedValue;
  }
};

function dispatchEvent(_ref) {
  var sortable = _ref.sortable,
      rootEl = _ref.rootEl,
      name = _ref.name,
      targetEl = _ref.targetEl,
      cloneEl = _ref.cloneEl,
      toEl = _ref.toEl,
      fromEl = _ref.fromEl,
      oldIndex = _ref.oldIndex,
      newIndex = _ref.newIndex,
      oldDraggableIndex = _ref.oldDraggableIndex,
      newDraggableIndex = _ref.newDraggableIndex,
      originalEvent = _ref.originalEvent,
      putSortable = _ref.putSortable,
      extraEventProperties = _ref.extraEventProperties;
  sortable = sortable || rootEl && rootEl[expando];
  if (!sortable) return;
  var evt,
      options = sortable.options,
      onName = 'on' + name.charAt(0).toUpperCase() + name.substr(1); // Support for new CustomEvent feature

  if (window.CustomEvent && !IE11OrLess && !Edge) {
    evt = new CustomEvent(name, {
      bubbles: true,
      cancelable: true
    });
  } else {
    evt = document.createEvent('Event');
    evt.initEvent(name, true, true);
  }

  evt.to = toEl || rootEl;
  evt.from = fromEl || rootEl;
  evt.item = targetEl || rootEl;
  evt.clone = cloneEl;
  evt.oldIndex = oldIndex;
  evt.newIndex = newIndex;
  evt.oldDraggableIndex = oldDraggableIndex;
  evt.newDraggableIndex = newDraggableIndex;
  evt.originalEvent = originalEvent;
  evt.pullMode = putSortable ? putSortable.lastPutMode : undefined;

  var allEventProperties = _objectSpread2(_objectSpread2({}, extraEventProperties), PluginManager.getEventProperties(name, sortable));

  for (var option in allEventProperties) {
    evt[option] = allEventProperties[option];
  }

  if (rootEl) {
    rootEl.dispatchEvent(evt);
  }

  if (options[onName]) {
    options[onName].call(sortable, evt);
  }
}

var _excluded = ["evt"];

var pluginEvent = function pluginEvent(eventName, sortable) {
  var _ref = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {},
      originalEvent = _ref.evt,
      data = _objectWithoutProperties(_ref, _excluded);

  PluginManager.pluginEvent.bind(Sortable)(eventName, sortable, _objectSpread2({
    dragEl: dragEl,
    parentEl: parentEl,
    ghostEl: ghostEl,
    rootEl: rootEl,
    nextEl: nextEl,
    lastDownEl: lastDownEl,
    cloneEl: cloneEl,
    cloneHidden: cloneHidden,
    dragStarted: moved,
    putSortable: putSortable,
    activeSortable: Sortable.active,
    originalEvent: originalEvent,
    oldIndex: oldIndex,
    oldDraggableIndex: oldDraggableIndex,
    newIndex: newIndex,
    newDraggableIndex: newDraggableIndex,
    hideGhostForTarget: _hideGhostForTarget,
    unhideGhostForTarget: _unhideGhostForTarget,
    cloneNowHidden: function cloneNowHidden() {
      cloneHidden = true;
    },
    cloneNowShown: function cloneNowShown() {
      cloneHidden = false;
    },
    dispatchSortableEvent: function dispatchSortableEvent(name) {
      _dispatchEvent({
        sortable: sortable,
        name: name,
        originalEvent: originalEvent
      });
    }
  }, data));
};

function _dispatchEvent(info) {
  dispatchEvent(_objectSpread2({
    putSortable: putSortable,
    cloneEl: cloneEl,
    targetEl: dragEl,
    rootEl: rootEl,
    oldIndex: oldIndex,
    oldDraggableIndex: oldDraggableIndex,
    newIndex: newIndex,
    newDraggableIndex: newDraggableIndex
  }, info));
}

var dragEl,
    parentEl,
    ghostEl,
    rootEl,
    nextEl,
    lastDownEl,
    cloneEl,
    cloneHidden,
    oldIndex,
    newIndex,
    oldDraggableIndex,
    newDraggableIndex,
    activeGroup,
    putSortable,
    awaitingDragStarted = false,
    ignoreNextClick = false,
    sortables = [],
    tapEvt,
    touchEvt,
    lastDx,
    lastDy,
    tapDistanceLeft,
    tapDistanceTop,
    moved,
    lastTarget,
    lastDirection,
    pastFirstInvertThresh = false,
    isCircumstantialInvert = false,
    targetMoveDistance,
    // For positioning ghost absolutely
ghostRelativeParent,
    ghostRelativeParentInitialScroll = [],
    // (left, top)
_silent = false,
    savedInputChecked = [];
/** @const */

var documentExists = typeof document !== 'undefined',
    PositionGhostAbsolutely = IOS,
    CSSFloatProperty = Edge || IE11OrLess ? 'cssFloat' : 'float',
    // This will not pass for IE9, because IE9 DnD only works on anchors
supportDraggable = documentExists && !ChromeForAndroid && !IOS && 'draggable' in document.createElement('div'),
    supportCssPointerEvents = function () {
  if (!documentExists) return; // false when <= IE11

  if (IE11OrLess) {
    return false;
  }

  var el = document.createElement('x');
  el.style.cssText = 'pointer-events:auto';
  return el.style.pointerEvents === 'auto';
}(),
    _detectDirection = function _detectDirection(el, options) {
  var elCSS = css(el),
      elWidth = parseInt(elCSS.width) - parseInt(elCSS.paddingLeft) - parseInt(elCSS.paddingRight) - parseInt(elCSS.borderLeftWidth) - parseInt(elCSS.borderRightWidth),
      child1 = getChild(el, 0, options),
      child2 = getChild(el, 1, options),
      firstChildCSS = child1 && css(child1),
      secondChildCSS = child2 && css(child2),
      firstChildWidth = firstChildCSS && parseInt(firstChildCSS.marginLeft) + parseInt(firstChildCSS.marginRight) + getRect(child1).width,
      secondChildWidth = secondChildCSS && parseInt(secondChildCSS.marginLeft) + parseInt(secondChildCSS.marginRight) + getRect(child2).width;

  if (elCSS.display === 'flex') {
    return elCSS.flexDirection === 'column' || elCSS.flexDirection === 'column-reverse' ? 'vertical' : 'horizontal';
  }

  if (elCSS.display === 'grid') {
    return elCSS.gridTemplateColumns.split(' ').length <= 1 ? 'vertical' : 'horizontal';
  }

  if (child1 && firstChildCSS["float"] && firstChildCSS["float"] !== 'none') {
    var touchingSideChild2 = firstChildCSS["float"] === 'left' ? 'left' : 'right';
    return child2 && (secondChildCSS.clear === 'both' || secondChildCSS.clear === touchingSideChild2) ? 'vertical' : 'horizontal';
  }

  return child1 && (firstChildCSS.display === 'block' || firstChildCSS.display === 'flex' || firstChildCSS.display === 'table' || firstChildCSS.display === 'grid' || firstChildWidth >= elWidth && elCSS[CSSFloatProperty] === 'none' || child2 && elCSS[CSSFloatProperty] === 'none' && firstChildWidth + secondChildWidth > elWidth) ? 'vertical' : 'horizontal';
},
    _dragElInRowColumn = function _dragElInRowColumn(dragRect, targetRect, vertical) {
  var dragElS1Opp = vertical ? dragRect.left : dragRect.top,
      dragElS2Opp = vertical ? dragRect.right : dragRect.bottom,
      dragElOppLength = vertical ? dragRect.width : dragRect.height,
      targetS1Opp = vertical ? targetRect.left : targetRect.top,
      targetS2Opp = vertical ? targetRect.right : targetRect.bottom,
      targetOppLength = vertical ? targetRect.width : targetRect.height;
  return dragElS1Opp === targetS1Opp || dragElS2Opp === targetS2Opp || dragElS1Opp + dragElOppLength / 2 === targetS1Opp + targetOppLength / 2;
},

/**
 * Detects first nearest empty sortable to X and Y position using emptyInsertThreshold.
 * @param  {Number} x      X position
 * @param  {Number} y      Y position
 * @return {HTMLElement}   Element of the first found nearest Sortable
 */
_detectNearestEmptySortable = function _detectNearestEmptySortable(x, y) {
  var ret;
  sortables.some(function (sortable) {
    var threshold = sortable[expando].options.emptyInsertThreshold;
    if (!threshold || lastChild(sortable)) return;
    var rect = getRect(sortable),
        insideHorizontally = x >= rect.left - threshold && x <= rect.right + threshold,
        insideVertically = y >= rect.top - threshold && y <= rect.bottom + threshold;

    if (insideHorizontally && insideVertically) {
      return ret = sortable;
    }
  });
  return ret;
},
    _prepareGroup = function _prepareGroup(options) {
  function toFn(value, pull) {
    return function (to, from, dragEl, evt) {
      var sameGroup = to.options.group.name && from.options.group.name && to.options.group.name === from.options.group.name;

      if (value == null && (pull || sameGroup)) {
        // Default pull value
        // Default pull and put value if same group
        return true;
      } else if (value == null || value === false) {
        return false;
      } else if (pull && value === 'clone') {
        return value;
      } else if (typeof value === 'function') {
        return toFn(value(to, from, dragEl, evt), pull)(to, from, dragEl, evt);
      } else {
        var otherGroup = (pull ? to : from).options.group.name;
        return value === true || typeof value === 'string' && value === otherGroup || value.join && value.indexOf(otherGroup) > -1;
      }
    };
  }

  var group = {};
  var originalGroup = options.group;

  if (!originalGroup || _typeof(originalGroup) != 'object') {
    originalGroup = {
      name: originalGroup
    };
  }

  group.name = originalGroup.name;
  group.checkPull = toFn(originalGroup.pull, true);
  group.checkPut = toFn(originalGroup.put);
  group.revertClone = originalGroup.revertClone;
  options.group = group;
},
    _hideGhostForTarget = function _hideGhostForTarget() {
  if (!supportCssPointerEvents && ghostEl) {
    css(ghostEl, 'display', 'none');
  }
},
    _unhideGhostForTarget = function _unhideGhostForTarget() {
  if (!supportCssPointerEvents && ghostEl) {
    css(ghostEl, 'display', '');
  }
}; // #1184 fix - Prevent click event on fallback if dragged but item not changed position


if (documentExists) {
  document.addEventListener('click', function (evt) {
    if (ignoreNextClick) {
      evt.preventDefault();
      evt.stopPropagation && evt.stopPropagation();
      evt.stopImmediatePropagation && evt.stopImmediatePropagation();
      ignoreNextClick = false;
      return false;
    }
  }, true);
}

var nearestEmptyInsertDetectEvent = function nearestEmptyInsertDetectEvent(evt) {
  if (dragEl) {
    evt = evt.touches ? evt.touches[0] : evt;

    var nearest = _detectNearestEmptySortable(evt.clientX, evt.clientY);

    if (nearest) {
      // Create imitation event
      var event = {};

      for (var i in evt) {
        if (evt.hasOwnProperty(i)) {
          event[i] = evt[i];
        }
      }

      event.target = event.rootEl = nearest;
      event.preventDefault = void 0;
      event.stopPropagation = void 0;

      nearest[expando]._onDragOver(event);
    }
  }
};

var _checkOutsideTargetEl = function _checkOutsideTargetEl(evt) {
  if (dragEl) {
    dragEl.parentNode[expando]._isOutsideThisEl(evt.target);
  }
};
/**
 * @class  Sortable
 * @param  {HTMLElement}  el
 * @param  {Object}       [options]
 */


function Sortable(el, options) {
  if (!(el && el.nodeType && el.nodeType === 1)) {
    throw "Sortable: `el` must be an HTMLElement, not ".concat({}.toString.call(el));
  }

  this.el = el; // root element

  this.options = options = _extends({}, options); // Export instance

  el[expando] = this;
  var defaults = {
    group: null,
    sort: true,
    disabled: false,
    store: null,
    handle: null,
    draggable: /^[uo]l$/i.test(el.nodeName) ? '>li' : '>*',
    swapThreshold: 1,
    // percentage; 0 <= x <= 1
    invertSwap: false,
    // invert always
    invertedSwapThreshold: null,
    // will be set to same as swapThreshold if default
    removeCloneOnHide: true,
    direction: function direction() {
      return _detectDirection(el, this.options);
    },
    ghostClass: 'sortable-ghost',
    chosenClass: 'sortable-chosen',
    dragClass: 'sortable-drag',
    ignore: 'a, img',
    filter: null,
    preventOnFilter: true,
    animation: 0,
    easing: null,
    setData: function setData(dataTransfer, dragEl) {
      dataTransfer.setData('Text', dragEl.textContent);
    },
    dropBubble: false,
    dragoverBubble: false,
    dataIdAttr: 'data-id',
    delay: 0,
    delayOnTouchOnly: false,
    touchStartThreshold: (Number.parseInt ? Number : window).parseInt(window.devicePixelRatio, 10) || 1,
    forceFallback: false,
    fallbackClass: 'sortable-fallback',
    fallbackOnBody: false,
    fallbackTolerance: 0,
    fallbackOffset: {
      x: 0,
      y: 0
    },
    supportPointer: Sortable.supportPointer !== false && 'PointerEvent' in window && !Safari,
    emptyInsertThreshold: 5
  };
  PluginManager.initializePlugins(this, el, defaults); // Set default options

  for (var name in defaults) {
    !(name in options) && (options[name] = defaults[name]);
  }

  _prepareGroup(options); // Bind all private methods


  for (var fn in this) {
    if (fn.charAt(0) === '_' && typeof this[fn] === 'function') {
      this[fn] = this[fn].bind(this);
    }
  } // Setup drag mode


  this.nativeDraggable = options.forceFallback ? false : supportDraggable;

  if (this.nativeDraggable) {
    // Touch start threshold cannot be greater than the native dragstart threshold
    this.options.touchStartThreshold = 1;
  } // Bind events


  if (options.supportPointer) {
    on(el, 'pointerdown', this._onTapStart);
  } else {
    on(el, 'mousedown', this._onTapStart);
    on(el, 'touchstart', this._onTapStart);
  }

  if (this.nativeDraggable) {
    on(el, 'dragover', this);
    on(el, 'dragenter', this);
  }

  sortables.push(this.el); // Restore sorting

  options.store && options.store.get && this.sort(options.store.get(this) || []); // Add animation state manager

  _extends(this, AnimationStateManager());
}

Sortable.prototype =
/** @lends Sortable.prototype */
{
  constructor: Sortable,
  _isOutsideThisEl: function _isOutsideThisEl(target) {
    if (!this.el.contains(target) && target !== this.el) {
      lastTarget = null;
    }
  },
  _getDirection: function _getDirection(evt, target) {
    return typeof this.options.direction === 'function' ? this.options.direction.call(this, evt, target, dragEl) : this.options.direction;
  },
  _onTapStart: function _onTapStart(
  /** Event|TouchEvent */
  evt) {
    if (!evt.cancelable) return;

    var _this = this,
        el = this.el,
        options = this.options,
        preventOnFilter = options.preventOnFilter,
        type = evt.type,
        touch = evt.touches && evt.touches[0] || evt.pointerType && evt.pointerType === 'touch' && evt,
        target = (touch || evt).target,
        originalTarget = evt.target.shadowRoot && (evt.path && evt.path[0] || evt.composedPath && evt.composedPath()[0]) || target,
        filter = options.filter;

    _saveInputCheckedState(el); // Don't trigger start event when an element is been dragged, otherwise the evt.oldindex always wrong when set option.group.


    if (dragEl) {
      return;
    }

    if (/mousedown|pointerdown/.test(type) && evt.button !== 0 || options.disabled) {
      return; // only left button and enabled
    } // cancel dnd if original target is content editable


    if (originalTarget.isContentEditable) {
      return;
    } // Safari ignores further event handling after mousedown


    if (!this.nativeDraggable && Safari && target && target.tagName.toUpperCase() === 'SELECT') {
      return;
    }

    target = closest(target, options.draggable, el, false);

    if (target && target.animated) {
      return;
    }

    if (lastDownEl === target) {
      // Ignoring duplicate `down`
      return;
    } // Get the index of the dragged element within its parent


    oldIndex = index(target);
    oldDraggableIndex = index(target, options.draggable); // Check filter

    if (typeof filter === 'function') {
      if (filter.call(this, evt, target, this)) {
        _dispatchEvent({
          sortable: _this,
          rootEl: originalTarget,
          name: 'filter',
          targetEl: target,
          toEl: el,
          fromEl: el
        });

        pluginEvent('filter', _this, {
          evt: evt
        });
        preventOnFilter && evt.cancelable && evt.preventDefault();
        return; // cancel dnd
      }
    } else if (filter) {
      filter = filter.split(',').some(function (criteria) {
        criteria = closest(originalTarget, criteria.trim(), el, false);

        if (criteria) {
          _dispatchEvent({
            sortable: _this,
            rootEl: criteria,
            name: 'filter',
            targetEl: target,
            fromEl: el,
            toEl: el
          });

          pluginEvent('filter', _this, {
            evt: evt
          });
          return true;
        }
      });

      if (filter) {
        preventOnFilter && evt.cancelable && evt.preventDefault();
        return; // cancel dnd
      }
    }

    if (options.handle && !closest(originalTarget, options.handle, el, false)) {
      return;
    } // Prepare `dragstart`


    this._prepareDragStart(evt, touch, target);
  },
  _prepareDragStart: function _prepareDragStart(
  /** Event */
  evt,
  /** Touch */
  touch,
  /** HTMLElement */
  target) {
    var _this = this,
        el = _this.el,
        options = _this.options,
        ownerDocument = el.ownerDocument,
        dragStartFn;

    if (target && !dragEl && target.parentNode === el) {
      var dragRect = getRect(target);
      rootEl = el;
      dragEl = target;
      parentEl = dragEl.parentNode;
      nextEl = dragEl.nextSibling;
      lastDownEl = target;
      activeGroup = options.group;
      Sortable.dragged = dragEl;
      tapEvt = {
        target: dragEl,
        clientX: (touch || evt).clientX,
        clientY: (touch || evt).clientY
      };
      tapDistanceLeft = tapEvt.clientX - dragRect.left;
      tapDistanceTop = tapEvt.clientY - dragRect.top;
      this._lastX = (touch || evt).clientX;
      this._lastY = (touch || evt).clientY;
      dragEl.style['will-change'] = 'all';

      dragStartFn = function dragStartFn() {
        pluginEvent('delayEnded', _this, {
          evt: evt
        });

        if (Sortable.eventCanceled) {
          _this._onDrop();

          return;
        } // Delayed drag has been triggered
        // we can re-enable the events: touchmove/mousemove


        _this._disableDelayedDragEvents();

        if (!FireFox && _this.nativeDraggable) {
          dragEl.draggable = true;
        } // Bind the events: dragstart/dragend


        _this._triggerDragStart(evt, touch); // Drag start event


        _dispatchEvent({
          sortable: _this,
          name: 'choose',
          originalEvent: evt
        }); // Chosen item


        toggleClass(dragEl, options.chosenClass, true);
      }; // Disable "draggable"


      options.ignore.split(',').forEach(function (criteria) {
        find(dragEl, criteria.trim(), _disableDraggable);
      });
      on(ownerDocument, 'dragover', nearestEmptyInsertDetectEvent);
      on(ownerDocument, 'mousemove', nearestEmptyInsertDetectEvent);
      on(ownerDocument, 'touchmove', nearestEmptyInsertDetectEvent);
      on(ownerDocument, 'mouseup', _this._onDrop);
      on(ownerDocument, 'touchend', _this._onDrop);
      on(ownerDocument, 'touchcancel', _this._onDrop); // Make dragEl draggable (must be before delay for FireFox)

      if (FireFox && this.nativeDraggable) {
        this.options.touchStartThreshold = 4;
        dragEl.draggable = true;
      }

      pluginEvent('delayStart', this, {
        evt: evt
      }); // Delay is impossible for native DnD in Edge or IE

      if (options.delay && (!options.delayOnTouchOnly || touch) && (!this.nativeDraggable || !(Edge || IE11OrLess))) {
        if (Sortable.eventCanceled) {
          this._onDrop();

          return;
        } // If the user moves the pointer or let go the click or touch
        // before the delay has been reached:
        // disable the delayed drag


        on(ownerDocument, 'mouseup', _this._disableDelayedDrag);
        on(ownerDocument, 'touchend', _this._disableDelayedDrag);
        on(ownerDocument, 'touchcancel', _this._disableDelayedDrag);
        on(ownerDocument, 'mousemove', _this._delayedDragTouchMoveHandler);
        on(ownerDocument, 'touchmove', _this._delayedDragTouchMoveHandler);
        options.supportPointer && on(ownerDocument, 'pointermove', _this._delayedDragTouchMoveHandler);
        _this._dragStartTimer = setTimeout(dragStartFn, options.delay);
      } else {
        dragStartFn();
      }
    }
  },
  _delayedDragTouchMoveHandler: function _delayedDragTouchMoveHandler(
  /** TouchEvent|PointerEvent **/
  e) {
    var touch = e.touches ? e.touches[0] : e;

    if (Math.max(Math.abs(touch.clientX - this._lastX), Math.abs(touch.clientY - this._lastY)) >= Math.floor(this.options.touchStartThreshold / (this.nativeDraggable && window.devicePixelRatio || 1))) {
      this._disableDelayedDrag();
    }
  },
  _disableDelayedDrag: function _disableDelayedDrag() {
    dragEl && _disableDraggable(dragEl);
    clearTimeout(this._dragStartTimer);

    this._disableDelayedDragEvents();
  },
  _disableDelayedDragEvents: function _disableDelayedDragEvents() {
    var ownerDocument = this.el.ownerDocument;
    off(ownerDocument, 'mouseup', this._disableDelayedDrag);
    off(ownerDocument, 'touchend', this._disableDelayedDrag);
    off(ownerDocument, 'touchcancel', this._disableDelayedDrag);
    off(ownerDocument, 'mousemove', this._delayedDragTouchMoveHandler);
    off(ownerDocument, 'touchmove', this._delayedDragTouchMoveHandler);
    off(ownerDocument, 'pointermove', this._delayedDragTouchMoveHandler);
  },
  _triggerDragStart: function _triggerDragStart(
  /** Event */
  evt,
  /** Touch */
  touch) {
    touch = touch || evt.pointerType == 'touch' && evt;

    if (!this.nativeDraggable || touch) {
      if (this.options.supportPointer) {
        on(document, 'pointermove', this._onTouchMove);
      } else if (touch) {
        on(document, 'touchmove', this._onTouchMove);
      } else {
        on(document, 'mousemove', this._onTouchMove);
      }
    } else {
      on(dragEl, 'dragend', this);
      on(rootEl, 'dragstart', this._onDragStart);
    }

    try {
      if (document.selection) {
        // Timeout neccessary for IE9
        _nextTick(function () {
          document.selection.empty();
        });
      } else {
        window.getSelection().removeAllRanges();
      }
    } catch (err) {}
  },
  _dragStarted: function _dragStarted(fallback, evt) {

    awaitingDragStarted = false;

    if (rootEl && dragEl) {
      pluginEvent('dragStarted', this, {
        evt: evt
      });

      if (this.nativeDraggable) {
        on(document, 'dragover', _checkOutsideTargetEl);
      }

      var options = this.options; // Apply effect

      !fallback && toggleClass(dragEl, options.dragClass, false);
      toggleClass(dragEl, options.ghostClass, true);
      Sortable.active = this;
      fallback && this._appendGhost(); // Drag start event

      _dispatchEvent({
        sortable: this,
        name: 'start',
        originalEvent: evt
      });
    } else {
      this._nulling();
    }
  },
  _emulateDragOver: function _emulateDragOver() {
    if (touchEvt) {
      this._lastX = touchEvt.clientX;
      this._lastY = touchEvt.clientY;

      _hideGhostForTarget();

      var target = document.elementFromPoint(touchEvt.clientX, touchEvt.clientY);
      var parent = target;

      while (target && target.shadowRoot) {
        target = target.shadowRoot.elementFromPoint(touchEvt.clientX, touchEvt.clientY);
        if (target === parent) break;
        parent = target;
      }

      dragEl.parentNode[expando]._isOutsideThisEl(target);

      if (parent) {
        do {
          if (parent[expando]) {
            var inserted = void 0;
            inserted = parent[expando]._onDragOver({
              clientX: touchEvt.clientX,
              clientY: touchEvt.clientY,
              target: target,
              rootEl: parent
            });

            if (inserted && !this.options.dragoverBubble) {
              break;
            }
          }

          target = parent; // store last element
        }
        /* jshint boss:true */
        while (parent = parent.parentNode);
      }

      _unhideGhostForTarget();
    }
  },
  _onTouchMove: function _onTouchMove(
  /**TouchEvent*/
  evt) {
    if (tapEvt) {
      var options = this.options,
          fallbackTolerance = options.fallbackTolerance,
          fallbackOffset = options.fallbackOffset,
          touch = evt.touches ? evt.touches[0] : evt,
          ghostMatrix = ghostEl && matrix(ghostEl, true),
          scaleX = ghostEl && ghostMatrix && ghostMatrix.a,
          scaleY = ghostEl && ghostMatrix && ghostMatrix.d,
          relativeScrollOffset = PositionGhostAbsolutely && ghostRelativeParent && getRelativeScrollOffset(ghostRelativeParent),
          dx = (touch.clientX - tapEvt.clientX + fallbackOffset.x) / (scaleX || 1) + (relativeScrollOffset ? relativeScrollOffset[0] - ghostRelativeParentInitialScroll[0] : 0) / (scaleX || 1),
          dy = (touch.clientY - tapEvt.clientY + fallbackOffset.y) / (scaleY || 1) + (relativeScrollOffset ? relativeScrollOffset[1] - ghostRelativeParentInitialScroll[1] : 0) / (scaleY || 1); // only set the status to dragging, when we are actually dragging

      if (!Sortable.active && !awaitingDragStarted) {
        if (fallbackTolerance && Math.max(Math.abs(touch.clientX - this._lastX), Math.abs(touch.clientY - this._lastY)) < fallbackTolerance) {
          return;
        }

        this._onDragStart(evt, true);
      }

      if (ghostEl) {
        if (ghostMatrix) {
          ghostMatrix.e += dx - (lastDx || 0);
          ghostMatrix.f += dy - (lastDy || 0);
        } else {
          ghostMatrix = {
            a: 1,
            b: 0,
            c: 0,
            d: 1,
            e: dx,
            f: dy
          };
        }

        var cssMatrix = "matrix(".concat(ghostMatrix.a, ",").concat(ghostMatrix.b, ",").concat(ghostMatrix.c, ",").concat(ghostMatrix.d, ",").concat(ghostMatrix.e, ",").concat(ghostMatrix.f, ")");
        css(ghostEl, 'webkitTransform', cssMatrix);
        css(ghostEl, 'mozTransform', cssMatrix);
        css(ghostEl, 'msTransform', cssMatrix);
        css(ghostEl, 'transform', cssMatrix);
        lastDx = dx;
        lastDy = dy;
        touchEvt = touch;
      }

      evt.cancelable && evt.preventDefault();
    }
  },
  _appendGhost: function _appendGhost() {
    // Bug if using scale(): https://stackoverflow.com/questions/2637058
    // Not being adjusted for
    if (!ghostEl) {
      var container = this.options.fallbackOnBody ? document.body : rootEl,
          rect = getRect(dragEl, true, PositionGhostAbsolutely, true, container),
          options = this.options; // Position absolutely

      if (PositionGhostAbsolutely) {
        // Get relatively positioned parent
        ghostRelativeParent = container;

        while (css(ghostRelativeParent, 'position') === 'static' && css(ghostRelativeParent, 'transform') === 'none' && ghostRelativeParent !== document) {
          ghostRelativeParent = ghostRelativeParent.parentNode;
        }

        if (ghostRelativeParent !== document.body && ghostRelativeParent !== document.documentElement) {
          if (ghostRelativeParent === document) ghostRelativeParent = getWindowScrollingElement();
          rect.top += ghostRelativeParent.scrollTop;
          rect.left += ghostRelativeParent.scrollLeft;
        } else {
          ghostRelativeParent = getWindowScrollingElement();
        }

        ghostRelativeParentInitialScroll = getRelativeScrollOffset(ghostRelativeParent);
      }

      ghostEl = dragEl.cloneNode(true);
      toggleClass(ghostEl, options.ghostClass, false);
      toggleClass(ghostEl, options.fallbackClass, true);
      toggleClass(ghostEl, options.dragClass, true);
      css(ghostEl, 'transition', '');
      css(ghostEl, 'transform', '');
      css(ghostEl, 'box-sizing', 'border-box');
      css(ghostEl, 'margin', 0);
      css(ghostEl, 'top', rect.top);
      css(ghostEl, 'left', rect.left);
      css(ghostEl, 'width', rect.width);
      css(ghostEl, 'height', rect.height);
      css(ghostEl, 'opacity', '0.8');
      css(ghostEl, 'position', PositionGhostAbsolutely ? 'absolute' : 'fixed');
      css(ghostEl, 'zIndex', '100000');
      css(ghostEl, 'pointerEvents', 'none');
      Sortable.ghost = ghostEl;
      container.appendChild(ghostEl); // Set transform-origin

      css(ghostEl, 'transform-origin', tapDistanceLeft / parseInt(ghostEl.style.width) * 100 + '% ' + tapDistanceTop / parseInt(ghostEl.style.height) * 100 + '%');
    }
  },
  _onDragStart: function _onDragStart(
  /**Event*/
  evt,
  /**boolean*/
  fallback) {
    var _this = this;

    var dataTransfer = evt.dataTransfer;
    var options = _this.options;
    pluginEvent('dragStart', this, {
      evt: evt
    });

    if (Sortable.eventCanceled) {
      this._onDrop();

      return;
    }

    pluginEvent('setupClone', this);

    if (!Sortable.eventCanceled) {
      cloneEl = clone(dragEl);
      cloneEl.draggable = false;
      cloneEl.style['will-change'] = '';

      this._hideClone();

      toggleClass(cloneEl, this.options.chosenClass, false);
      Sortable.clone = cloneEl;
    } // #1143: IFrame support workaround


    _this.cloneId = _nextTick(function () {
      pluginEvent('clone', _this);
      if (Sortable.eventCanceled) return;

      if (!_this.options.removeCloneOnHide) {
        rootEl.insertBefore(cloneEl, dragEl);
      }

      _this._hideClone();

      _dispatchEvent({
        sortable: _this,
        name: 'clone'
      });
    });
    !fallback && toggleClass(dragEl, options.dragClass, true); // Set proper drop events

    if (fallback) {
      ignoreNextClick = true;
      _this._loopId = setInterval(_this._emulateDragOver, 50);
    } else {
      // Undo what was set in _prepareDragStart before drag started
      off(document, 'mouseup', _this._onDrop);
      off(document, 'touchend', _this._onDrop);
      off(document, 'touchcancel', _this._onDrop);

      if (dataTransfer) {
        dataTransfer.effectAllowed = 'move';
        options.setData && options.setData.call(_this, dataTransfer, dragEl);
      }

      on(document, 'drop', _this); // #1276 fix:

      css(dragEl, 'transform', 'translateZ(0)');
    }

    awaitingDragStarted = true;
    _this._dragStartId = _nextTick(_this._dragStarted.bind(_this, fallback, evt));
    on(document, 'selectstart', _this);
    moved = true;

    if (Safari) {
      css(document.body, 'user-select', 'none');
    }
  },
  // Returns true - if no further action is needed (either inserted or another condition)
  _onDragOver: function _onDragOver(
  /**Event*/
  evt) {
    var el = this.el,
        target = evt.target,
        dragRect,
        targetRect,
        revert,
        options = this.options,
        group = options.group,
        activeSortable = Sortable.active,
        isOwner = activeGroup === group,
        canSort = options.sort,
        fromSortable = putSortable || activeSortable,
        vertical,
        _this = this,
        completedFired = false;

    if (_silent) return;

    function dragOverEvent(name, extra) {
      pluginEvent(name, _this, _objectSpread2({
        evt: evt,
        isOwner: isOwner,
        axis: vertical ? 'vertical' : 'horizontal',
        revert: revert,
        dragRect: dragRect,
        targetRect: targetRect,
        canSort: canSort,
        fromSortable: fromSortable,
        target: target,
        completed: completed,
        onMove: function onMove(target, after) {
          return _onMove(rootEl, el, dragEl, dragRect, target, getRect(target), evt, after);
        },
        changed: changed
      }, extra));
    } // Capture animation state


    function capture() {
      dragOverEvent('dragOverAnimationCapture');

      _this.captureAnimationState();

      if (_this !== fromSortable) {
        fromSortable.captureAnimationState();
      }
    } // Return invocation when dragEl is inserted (or completed)


    function completed(insertion) {
      dragOverEvent('dragOverCompleted', {
        insertion: insertion
      });

      if (insertion) {
        // Clones must be hidden before folding animation to capture dragRectAbsolute properly
        if (isOwner) {
          activeSortable._hideClone();
        } else {
          activeSortable._showClone(_this);
        }

        if (_this !== fromSortable) {
          // Set ghost class to new sortable's ghost class
          toggleClass(dragEl, putSortable ? putSortable.options.ghostClass : activeSortable.options.ghostClass, false);
          toggleClass(dragEl, options.ghostClass, true);
        }

        if (putSortable !== _this && _this !== Sortable.active) {
          putSortable = _this;
        } else if (_this === Sortable.active && putSortable) {
          putSortable = null;
        } // Animation


        if (fromSortable === _this) {
          _this._ignoreWhileAnimating = target;
        }

        _this.animateAll(function () {
          dragOverEvent('dragOverAnimationComplete');
          _this._ignoreWhileAnimating = null;
        });

        if (_this !== fromSortable) {
          fromSortable.animateAll();
          fromSortable._ignoreWhileAnimating = null;
        }
      } // Null lastTarget if it is not inside a previously swapped element


      if (target === dragEl && !dragEl.animated || target === el && !target.animated) {
        lastTarget = null;
      } // no bubbling and not fallback


      if (!options.dragoverBubble && !evt.rootEl && target !== document) {
        dragEl.parentNode[expando]._isOutsideThisEl(evt.target); // Do not detect for empty insert if already inserted


        !insertion && nearestEmptyInsertDetectEvent(evt);
      }

      !options.dragoverBubble && evt.stopPropagation && evt.stopPropagation();
      return completedFired = true;
    } // Call when dragEl has been inserted


    function changed() {
      newIndex = index(dragEl);
      newDraggableIndex = index(dragEl, options.draggable);

      _dispatchEvent({
        sortable: _this,
        name: 'change',
        toEl: el,
        newIndex: newIndex,
        newDraggableIndex: newDraggableIndex,
        originalEvent: evt
      });
    }

    if (evt.preventDefault !== void 0) {
      evt.cancelable && evt.preventDefault();
    }

    target = closest(target, options.draggable, el, true);
    dragOverEvent('dragOver');
    if (Sortable.eventCanceled) return completedFired;

    if (dragEl.contains(evt.target) || target.animated && target.animatingX && target.animatingY || _this._ignoreWhileAnimating === target) {
      return completed(false);
    }

    ignoreNextClick = false;

    if (activeSortable && !options.disabled && (isOwner ? canSort || (revert = parentEl !== rootEl) // Reverting item into the original list
    : putSortable === this || (this.lastPutMode = activeGroup.checkPull(this, activeSortable, dragEl, evt)) && group.checkPut(this, activeSortable, dragEl, evt))) {
      vertical = this._getDirection(evt, target) === 'vertical';
      dragRect = getRect(dragEl);
      dragOverEvent('dragOverValid');
      if (Sortable.eventCanceled) return completedFired;

      if (revert) {
        parentEl = rootEl; // actualization

        capture();

        this._hideClone();

        dragOverEvent('revert');

        if (!Sortable.eventCanceled) {
          if (nextEl) {
            rootEl.insertBefore(dragEl, nextEl);
          } else {
            rootEl.appendChild(dragEl);
          }
        }

        return completed(true);
      }

      var elLastChild = lastChild(el, options.draggable);

      if (!elLastChild || _ghostIsLast(evt, vertical, this) && !elLastChild.animated) {
        // Insert to end of list
        // If already at end of list: Do not insert
        if (elLastChild === dragEl) {
          return completed(false);
        } // if there is a last element, it is the target


        if (elLastChild && el === evt.target) {
          target = elLastChild;
        }

        if (target) {
          targetRect = getRect(target);
        }

        if (_onMove(rootEl, el, dragEl, dragRect, target, targetRect, evt, !!target) !== false) {
          capture();
          el.appendChild(dragEl);
          parentEl = el; // actualization

          changed();
          return completed(true);
        }
      } else if (elLastChild && _ghostIsFirst(evt, vertical, this)) {
        // Insert to start of list
        var firstChild = getChild(el, 0, options, true);

        if (firstChild === dragEl) {
          return completed(false);
        }

        target = firstChild;
        targetRect = getRect(target);

        if (_onMove(rootEl, el, dragEl, dragRect, target, targetRect, evt, false) !== false) {
          capture();
          el.insertBefore(dragEl, firstChild);
          parentEl = el; // actualization

          changed();
          return completed(true);
        }
      } else if (target.parentNode === el) {
        targetRect = getRect(target);
        var direction = 0,
            targetBeforeFirstSwap,
            differentLevel = dragEl.parentNode !== el,
            differentRowCol = !_dragElInRowColumn(dragEl.animated && dragEl.toRect || dragRect, target.animated && target.toRect || targetRect, vertical),
            side1 = vertical ? 'top' : 'left',
            scrolledPastTop = isScrolledPast(target, 'top', 'top') || isScrolledPast(dragEl, 'top', 'top'),
            scrollBefore = scrolledPastTop ? scrolledPastTop.scrollTop : void 0;

        if (lastTarget !== target) {
          targetBeforeFirstSwap = targetRect[side1];
          pastFirstInvertThresh = false;
          isCircumstantialInvert = !differentRowCol && options.invertSwap || differentLevel;
        }

        direction = _getSwapDirection(evt, target, targetRect, vertical, differentRowCol ? 1 : options.swapThreshold, options.invertedSwapThreshold == null ? options.swapThreshold : options.invertedSwapThreshold, isCircumstantialInvert, lastTarget === target);
        var sibling;

        if (direction !== 0) {
          // Check if target is beside dragEl in respective direction (ignoring hidden elements)
          var dragIndex = index(dragEl);

          do {
            dragIndex -= direction;
            sibling = parentEl.children[dragIndex];
          } while (sibling && (css(sibling, 'display') === 'none' || sibling === ghostEl));
        } // If dragEl is already beside target: Do not insert


        if (direction === 0 || sibling === target) {
          return completed(false);
        }

        lastTarget = target;
        lastDirection = direction;
        var nextSibling = target.nextElementSibling,
            after = false;
        after = direction === 1;

        var moveVector = _onMove(rootEl, el, dragEl, dragRect, target, targetRect, evt, after);

        if (moveVector !== false) {
          if (moveVector === 1 || moveVector === -1) {
            after = moveVector === 1;
          }

          _silent = true;
          setTimeout(_unsilent, 30);
          capture();

          if (after && !nextSibling) {
            el.appendChild(dragEl);
          } else {
            target.parentNode.insertBefore(dragEl, after ? nextSibling : target);
          } // Undo chrome's scroll adjustment (has no effect on other browsers)


          if (scrolledPastTop) {
            scrollBy(scrolledPastTop, 0, scrollBefore - scrolledPastTop.scrollTop);
          }

          parentEl = dragEl.parentNode; // actualization
          // must be done before animation

          if (targetBeforeFirstSwap !== undefined && !isCircumstantialInvert) {
            targetMoveDistance = Math.abs(targetBeforeFirstSwap - getRect(target)[side1]);
          }

          changed();
          return completed(true);
        }
      }

      if (el.contains(dragEl)) {
        return completed(false);
      }
    }

    return false;
  },
  _ignoreWhileAnimating: null,
  _offMoveEvents: function _offMoveEvents() {
    off(document, 'mousemove', this._onTouchMove);
    off(document, 'touchmove', this._onTouchMove);
    off(document, 'pointermove', this._onTouchMove);
    off(document, 'dragover', nearestEmptyInsertDetectEvent);
    off(document, 'mousemove', nearestEmptyInsertDetectEvent);
    off(document, 'touchmove', nearestEmptyInsertDetectEvent);
  },
  _offUpEvents: function _offUpEvents() {
    var ownerDocument = this.el.ownerDocument;
    off(ownerDocument, 'mouseup', this._onDrop);
    off(ownerDocument, 'touchend', this._onDrop);
    off(ownerDocument, 'pointerup', this._onDrop);
    off(ownerDocument, 'touchcancel', this._onDrop);
    off(document, 'selectstart', this);
  },
  _onDrop: function _onDrop(
  /**Event*/
  evt) {
    var el = this.el,
        options = this.options; // Get the index of the dragged element within its parent

    newIndex = index(dragEl);
    newDraggableIndex = index(dragEl, options.draggable);
    pluginEvent('drop', this, {
      evt: evt
    });
    parentEl = dragEl && dragEl.parentNode; // Get again after plugin event

    newIndex = index(dragEl);
    newDraggableIndex = index(dragEl, options.draggable);

    if (Sortable.eventCanceled) {
      this._nulling();

      return;
    }

    awaitingDragStarted = false;
    isCircumstantialInvert = false;
    pastFirstInvertThresh = false;
    clearInterval(this._loopId);
    clearTimeout(this._dragStartTimer);

    _cancelNextTick(this.cloneId);

    _cancelNextTick(this._dragStartId); // Unbind events


    if (this.nativeDraggable) {
      off(document, 'drop', this);
      off(el, 'dragstart', this._onDragStart);
    }

    this._offMoveEvents();

    this._offUpEvents();

    if (Safari) {
      css(document.body, 'user-select', '');
    }

    css(dragEl, 'transform', '');

    if (evt) {
      if (moved) {
        evt.cancelable && evt.preventDefault();
        !options.dropBubble && evt.stopPropagation();
      }

      ghostEl && ghostEl.parentNode && ghostEl.parentNode.removeChild(ghostEl);

      if (rootEl === parentEl || putSortable && putSortable.lastPutMode !== 'clone') {
        // Remove clone(s)
        cloneEl && cloneEl.parentNode && cloneEl.parentNode.removeChild(cloneEl);
      }

      if (dragEl) {
        if (this.nativeDraggable) {
          off(dragEl, 'dragend', this);
        }

        _disableDraggable(dragEl);

        dragEl.style['will-change'] = ''; // Remove classes
        // ghostClass is added in dragStarted

        if (moved && !awaitingDragStarted) {
          toggleClass(dragEl, putSortable ? putSortable.options.ghostClass : this.options.ghostClass, false);
        }

        toggleClass(dragEl, this.options.chosenClass, false); // Drag stop event

        _dispatchEvent({
          sortable: this,
          name: 'unchoose',
          toEl: parentEl,
          newIndex: null,
          newDraggableIndex: null,
          originalEvent: evt
        });

        if (rootEl !== parentEl) {
          if (newIndex >= 0) {
            // Add event
            _dispatchEvent({
              rootEl: parentEl,
              name: 'add',
              toEl: parentEl,
              fromEl: rootEl,
              originalEvent: evt
            }); // Remove event


            _dispatchEvent({
              sortable: this,
              name: 'remove',
              toEl: parentEl,
              originalEvent: evt
            }); // drag from one list and drop into another


            _dispatchEvent({
              rootEl: parentEl,
              name: 'sort',
              toEl: parentEl,
              fromEl: rootEl,
              originalEvent: evt
            });

            _dispatchEvent({
              sortable: this,
              name: 'sort',
              toEl: parentEl,
              originalEvent: evt
            });
          }

          putSortable && putSortable.save();
        } else {
          if (newIndex !== oldIndex) {
            if (newIndex >= 0) {
              // drag & drop within the same list
              _dispatchEvent({
                sortable: this,
                name: 'update',
                toEl: parentEl,
                originalEvent: evt
              });

              _dispatchEvent({
                sortable: this,
                name: 'sort',
                toEl: parentEl,
                originalEvent: evt
              });
            }
          }
        }

        if (Sortable.active) {
          /* jshint eqnull:true */
          if (newIndex == null || newIndex === -1) {
            newIndex = oldIndex;
            newDraggableIndex = oldDraggableIndex;
          }

          _dispatchEvent({
            sortable: this,
            name: 'end',
            toEl: parentEl,
            originalEvent: evt
          }); // Save sorting


          this.save();
        }
      }
    }

    this._nulling();
  },
  _nulling: function _nulling() {
    pluginEvent('nulling', this);
    rootEl = dragEl = parentEl = ghostEl = nextEl = cloneEl = lastDownEl = cloneHidden = tapEvt = touchEvt = moved = newIndex = newDraggableIndex = oldIndex = oldDraggableIndex = lastTarget = lastDirection = putSortable = activeGroup = Sortable.dragged = Sortable.ghost = Sortable.clone = Sortable.active = null;
    savedInputChecked.forEach(function (el) {
      el.checked = true;
    });
    savedInputChecked.length = lastDx = lastDy = 0;
  },
  handleEvent: function handleEvent(
  /**Event*/
  evt) {
    switch (evt.type) {
      case 'drop':
      case 'dragend':
        this._onDrop(evt);

        break;

      case 'dragenter':
      case 'dragover':
        if (dragEl) {
          this._onDragOver(evt);

          _globalDragOver(evt);
        }

        break;

      case 'selectstart':
        evt.preventDefault();
        break;
    }
  },

  /**
   * Serializes the item into an array of string.
   * @returns {String[]}
   */
  toArray: function toArray() {
    var order = [],
        el,
        children = this.el.children,
        i = 0,
        n = children.length,
        options = this.options;

    for (; i < n; i++) {
      el = children[i];

      if (closest(el, options.draggable, this.el, false)) {
        order.push(el.getAttribute(options.dataIdAttr) || _generateId(el));
      }
    }

    return order;
  },

  /**
   * Sorts the elements according to the array.
   * @param  {String[]}  order  order of the items
   */
  sort: function sort(order, useAnimation) {
    var items = {},
        rootEl = this.el;
    this.toArray().forEach(function (id, i) {
      var el = rootEl.children[i];

      if (closest(el, this.options.draggable, rootEl, false)) {
        items[id] = el;
      }
    }, this);
    useAnimation && this.captureAnimationState();
    order.forEach(function (id) {
      if (items[id]) {
        rootEl.removeChild(items[id]);
        rootEl.appendChild(items[id]);
      }
    });
    useAnimation && this.animateAll();
  },

  /**
   * Save the current sorting
   */
  save: function save() {
    var store = this.options.store;
    store && store.set && store.set(this);
  },

  /**
   * For each element in the set, get the first element that matches the selector by testing the element itself and traversing up through its ancestors in the DOM tree.
   * @param   {HTMLElement}  el
   * @param   {String}       [selector]  default: `options.draggable`
   * @returns {HTMLElement|null}
   */
  closest: function closest$1(el, selector) {
    return closest(el, selector || this.options.draggable, this.el, false);
  },

  /**
   * Set/get option
   * @param   {string} name
   * @param   {*}      [value]
   * @returns {*}
   */
  option: function option(name, value) {
    var options = this.options;

    if (value === void 0) {
      return options[name];
    } else {
      var modifiedValue = PluginManager.modifyOption(this, name, value);

      if (typeof modifiedValue !== 'undefined') {
        options[name] = modifiedValue;
      } else {
        options[name] = value;
      }

      if (name === 'group') {
        _prepareGroup(options);
      }
    }
  },

  /**
   * Destroy
   */
  destroy: function destroy() {
    pluginEvent('destroy', this);
    var el = this.el;
    el[expando] = null;
    off(el, 'mousedown', this._onTapStart);
    off(el, 'touchstart', this._onTapStart);
    off(el, 'pointerdown', this._onTapStart);

    if (this.nativeDraggable) {
      off(el, 'dragover', this);
      off(el, 'dragenter', this);
    } // Remove draggable attributes


    Array.prototype.forEach.call(el.querySelectorAll('[draggable]'), function (el) {
      el.removeAttribute('draggable');
    });

    this._onDrop();

    this._disableDelayedDragEvents();

    sortables.splice(sortables.indexOf(this.el), 1);
    this.el = el = null;
  },
  _hideClone: function _hideClone() {
    if (!cloneHidden) {
      pluginEvent('hideClone', this);
      if (Sortable.eventCanceled) return;
      css(cloneEl, 'display', 'none');

      if (this.options.removeCloneOnHide && cloneEl.parentNode) {
        cloneEl.parentNode.removeChild(cloneEl);
      }

      cloneHidden = true;
    }
  },
  _showClone: function _showClone(putSortable) {
    if (putSortable.lastPutMode !== 'clone') {
      this._hideClone();

      return;
    }

    if (cloneHidden) {
      pluginEvent('showClone', this);
      if (Sortable.eventCanceled) return; // show clone at dragEl or original position

      if (dragEl.parentNode == rootEl && !this.options.group.revertClone) {
        rootEl.insertBefore(cloneEl, dragEl);
      } else if (nextEl) {
        rootEl.insertBefore(cloneEl, nextEl);
      } else {
        rootEl.appendChild(cloneEl);
      }

      if (this.options.group.revertClone) {
        this.animate(dragEl, cloneEl);
      }

      css(cloneEl, 'display', '');
      cloneHidden = false;
    }
  }
};

function _globalDragOver(
/**Event*/
evt) {
  if (evt.dataTransfer) {
    evt.dataTransfer.dropEffect = 'move';
  }

  evt.cancelable && evt.preventDefault();
}

function _onMove(fromEl, toEl, dragEl, dragRect, targetEl, targetRect, originalEvent, willInsertAfter) {
  var evt,
      sortable = fromEl[expando],
      onMoveFn = sortable.options.onMove,
      retVal; // Support for new CustomEvent feature

  if (window.CustomEvent && !IE11OrLess && !Edge) {
    evt = new CustomEvent('move', {
      bubbles: true,
      cancelable: true
    });
  } else {
    evt = document.createEvent('Event');
    evt.initEvent('move', true, true);
  }

  evt.to = toEl;
  evt.from = fromEl;
  evt.dragged = dragEl;
  evt.draggedRect = dragRect;
  evt.related = targetEl || toEl;
  evt.relatedRect = targetRect || getRect(toEl);
  evt.willInsertAfter = willInsertAfter;
  evt.originalEvent = originalEvent;
  fromEl.dispatchEvent(evt);

  if (onMoveFn) {
    retVal = onMoveFn.call(sortable, evt, originalEvent);
  }

  return retVal;
}

function _disableDraggable(el) {
  el.draggable = false;
}

function _unsilent() {
  _silent = false;
}

function _ghostIsFirst(evt, vertical, sortable) {
  var rect = getRect(getChild(sortable.el, 0, sortable.options, true));
  var spacer = 10;
  return vertical ? evt.clientX < rect.left - spacer || evt.clientY < rect.top && evt.clientX < rect.right : evt.clientY < rect.top - spacer || evt.clientY < rect.bottom && evt.clientX < rect.left;
}

function _ghostIsLast(evt, vertical, sortable) {
  var rect = getRect(lastChild(sortable.el, sortable.options.draggable));
  var spacer = 10;
  return vertical ? evt.clientX > rect.right + spacer || evt.clientX <= rect.right && evt.clientY > rect.bottom && evt.clientX >= rect.left : evt.clientX > rect.right && evt.clientY > rect.top || evt.clientX <= rect.right && evt.clientY > rect.bottom + spacer;
}

function _getSwapDirection(evt, target, targetRect, vertical, swapThreshold, invertedSwapThreshold, invertSwap, isLastTarget) {
  var mouseOnAxis = vertical ? evt.clientY : evt.clientX,
      targetLength = vertical ? targetRect.height : targetRect.width,
      targetS1 = vertical ? targetRect.top : targetRect.left,
      targetS2 = vertical ? targetRect.bottom : targetRect.right,
      invert = false;

  if (!invertSwap) {
    // Never invert or create dragEl shadow when target movemenet causes mouse to move past the end of regular swapThreshold
    if (isLastTarget && targetMoveDistance < targetLength * swapThreshold) {
      // multiplied only by swapThreshold because mouse will already be inside target by (1 - threshold) * targetLength / 2
      // check if past first invert threshold on side opposite of lastDirection
      if (!pastFirstInvertThresh && (lastDirection === 1 ? mouseOnAxis > targetS1 + targetLength * invertedSwapThreshold / 2 : mouseOnAxis < targetS2 - targetLength * invertedSwapThreshold / 2)) {
        // past first invert threshold, do not restrict inverted threshold to dragEl shadow
        pastFirstInvertThresh = true;
      }

      if (!pastFirstInvertThresh) {
        // dragEl shadow (target move distance shadow)
        if (lastDirection === 1 ? mouseOnAxis < targetS1 + targetMoveDistance // over dragEl shadow
        : mouseOnAxis > targetS2 - targetMoveDistance) {
          return -lastDirection;
        }
      } else {
        invert = true;
      }
    } else {
      // Regular
      if (mouseOnAxis > targetS1 + targetLength * (1 - swapThreshold) / 2 && mouseOnAxis < targetS2 - targetLength * (1 - swapThreshold) / 2) {
        return _getInsertDirection(target);
      }
    }
  }

  invert = invert || invertSwap;

  if (invert) {
    // Invert of regular
    if (mouseOnAxis < targetS1 + targetLength * invertedSwapThreshold / 2 || mouseOnAxis > targetS2 - targetLength * invertedSwapThreshold / 2) {
      return mouseOnAxis > targetS1 + targetLength / 2 ? 1 : -1;
    }
  }

  return 0;
}
/**
 * Gets the direction dragEl must be swapped relative to target in order to make it
 * seem that dragEl has been "inserted" into that element's position
 * @param  {HTMLElement} target       The target whose position dragEl is being inserted at
 * @return {Number}                   Direction dragEl must be swapped
 */


function _getInsertDirection(target) {
  if (index(dragEl) < index(target)) {
    return 1;
  } else {
    return -1;
  }
}
/**
 * Generate id
 * @param   {HTMLElement} el
 * @returns {String}
 * @private
 */


function _generateId(el) {
  var str = el.tagName + el.className + el.src + el.href + el.textContent,
      i = str.length,
      sum = 0;

  while (i--) {
    sum += str.charCodeAt(i);
  }

  return sum.toString(36);
}

function _saveInputCheckedState(root) {
  savedInputChecked.length = 0;
  var inputs = root.getElementsByTagName('input');
  var idx = inputs.length;

  while (idx--) {
    var el = inputs[idx];
    el.checked && savedInputChecked.push(el);
  }
}

function _nextTick(fn) {
  return setTimeout(fn, 0);
}

function _cancelNextTick(id) {
  return clearTimeout(id);
} // Fixed #973:


if (documentExists) {
  on(document, 'touchmove', function (evt) {
    if ((Sortable.active || awaitingDragStarted) && evt.cancelable) {
      evt.preventDefault();
    }
  });
} // Export utils


Sortable.utils = {
  on: on,
  off: off,
  css: css,
  find: find,
  is: function is(el, selector) {
    return !!closest(el, selector, el, false);
  },
  extend: extend,
  throttle: throttle,
  closest: closest,
  toggleClass: toggleClass,
  clone: clone,
  index: index,
  nextTick: _nextTick,
  cancelNextTick: _cancelNextTick,
  detectDirection: _detectDirection,
  getChild: getChild
};
/**
 * Get the Sortable instance of an element
 * @param  {HTMLElement} element The element
 * @return {Sortable|undefined}         The instance of Sortable
 */

Sortable.get = function (element) {
  return element[expando];
};
/**
 * Mount a plugin to Sortable
 * @param  {...SortablePlugin|SortablePlugin[]} plugins       Plugins being mounted
 */


Sortable.mount = function () {
  for (var _len = arguments.length, plugins = new Array(_len), _key = 0; _key < _len; _key++) {
    plugins[_key] = arguments[_key];
  }

  if (plugins[0].constructor === Array) plugins = plugins[0];
  plugins.forEach(function (plugin) {
    if (!plugin.prototype || !plugin.prototype.constructor) {
      throw "Sortable: Mounted plugin must be a constructor function, not ".concat({}.toString.call(plugin));
    }

    if (plugin.utils) Sortable.utils = _objectSpread2(_objectSpread2({}, Sortable.utils), plugin.utils);
    PluginManager.mount(plugin);
  });
};
/**
 * Create sortable instance
 * @param {HTMLElement}  el
 * @param {Object}      [options]
 */


Sortable.create = function (el, options) {
  return new Sortable(el, options);
}; // Export


Sortable.version = version;

var autoScrolls = [],
    scrollEl,
    scrollRootEl,
    scrolling = false,
    lastAutoScrollX,
    lastAutoScrollY,
    touchEvt$1,
    pointerElemChangedInterval;

function AutoScrollPlugin() {
  function AutoScroll() {
    this.defaults = {
      scroll: true,
      forceAutoScrollFallback: false,
      scrollSensitivity: 30,
      scrollSpeed: 10,
      bubbleScroll: true
    }; // Bind all private methods

    for (var fn in this) {
      if (fn.charAt(0) === '_' && typeof this[fn] === 'function') {
        this[fn] = this[fn].bind(this);
      }
    }
  }

  AutoScroll.prototype = {
    dragStarted: function dragStarted(_ref) {
      var originalEvent = _ref.originalEvent;

      if (this.sortable.nativeDraggable) {
        on(document, 'dragover', this._handleAutoScroll);
      } else {
        if (this.options.supportPointer) {
          on(document, 'pointermove', this._handleFallbackAutoScroll);
        } else if (originalEvent.touches) {
          on(document, 'touchmove', this._handleFallbackAutoScroll);
        } else {
          on(document, 'mousemove', this._handleFallbackAutoScroll);
        }
      }
    },
    dragOverCompleted: function dragOverCompleted(_ref2) {
      var originalEvent = _ref2.originalEvent;

      // For when bubbling is canceled and using fallback (fallback 'touchmove' always reached)
      if (!this.options.dragOverBubble && !originalEvent.rootEl) {
        this._handleAutoScroll(originalEvent);
      }
    },
    drop: function drop() {
      if (this.sortable.nativeDraggable) {
        off(document, 'dragover', this._handleAutoScroll);
      } else {
        off(document, 'pointermove', this._handleFallbackAutoScroll);
        off(document, 'touchmove', this._handleFallbackAutoScroll);
        off(document, 'mousemove', this._handleFallbackAutoScroll);
      }

      clearPointerElemChangedInterval();
      clearAutoScrolls();
      cancelThrottle();
    },
    nulling: function nulling() {
      touchEvt$1 = scrollRootEl = scrollEl = scrolling = pointerElemChangedInterval = lastAutoScrollX = lastAutoScrollY = null;
      autoScrolls.length = 0;
    },
    _handleFallbackAutoScroll: function _handleFallbackAutoScroll(evt) {
      this._handleAutoScroll(evt, true);
    },
    _handleAutoScroll: function _handleAutoScroll(evt, fallback) {
      var _this = this;

      var x = (evt.touches ? evt.touches[0] : evt).clientX,
          y = (evt.touches ? evt.touches[0] : evt).clientY,
          elem = document.elementFromPoint(x, y);
      touchEvt$1 = evt; // IE does not seem to have native autoscroll,
      // Edge's autoscroll seems too conditional,
      // MACOS Safari does not have autoscroll,
      // Firefox and Chrome are good

      if (fallback || this.options.forceAutoScrollFallback || Edge || IE11OrLess || Safari) {
        autoScroll(evt, this.options, elem, fallback); // Listener for pointer element change

        var ogElemScroller = getParentAutoScrollElement(elem, true);

        if (scrolling && (!pointerElemChangedInterval || x !== lastAutoScrollX || y !== lastAutoScrollY)) {
          pointerElemChangedInterval && clearPointerElemChangedInterval(); // Detect for pointer elem change, emulating native DnD behaviour

          pointerElemChangedInterval = setInterval(function () {
            var newElem = getParentAutoScrollElement(document.elementFromPoint(x, y), true);

            if (newElem !== ogElemScroller) {
              ogElemScroller = newElem;
              clearAutoScrolls();
            }

            autoScroll(evt, _this.options, newElem, fallback);
          }, 10);
          lastAutoScrollX = x;
          lastAutoScrollY = y;
        }
      } else {
        // if DnD is enabled (and browser has good autoscrolling), first autoscroll will already scroll, so get parent autoscroll of first autoscroll
        if (!this.options.bubbleScroll || getParentAutoScrollElement(elem, true) === getWindowScrollingElement()) {
          clearAutoScrolls();
          return;
        }

        autoScroll(evt, this.options, getParentAutoScrollElement(elem, false), false);
      }
    }
  };
  return _extends(AutoScroll, {
    pluginName: 'scroll',
    initializeByDefault: true
  });
}

function clearAutoScrolls() {
  autoScrolls.forEach(function (autoScroll) {
    clearInterval(autoScroll.pid);
  });
  autoScrolls = [];
}

function clearPointerElemChangedInterval() {
  clearInterval(pointerElemChangedInterval);
}

var autoScroll = throttle(function (evt, options, rootEl, isFallback) {
  // Bug: https://bugzilla.mozilla.org/show_bug.cgi?id=505521
  if (!options.scroll) return;
  var x = (evt.touches ? evt.touches[0] : evt).clientX,
      y = (evt.touches ? evt.touches[0] : evt).clientY,
      sens = options.scrollSensitivity,
      speed = options.scrollSpeed,
      winScroller = getWindowScrollingElement();
  var scrollThisInstance = false,
      scrollCustomFn; // New scroll root, set scrollEl

  if (scrollRootEl !== rootEl) {
    scrollRootEl = rootEl;
    clearAutoScrolls();
    scrollEl = options.scroll;
    scrollCustomFn = options.scrollFn;

    if (scrollEl === true) {
      scrollEl = getParentAutoScrollElement(rootEl, true);
    }
  }

  var layersOut = 0;
  var currentParent = scrollEl;

  do {
    var el = currentParent,
        rect = getRect(el),
        top = rect.top,
        bottom = rect.bottom,
        left = rect.left,
        right = rect.right,
        width = rect.width,
        height = rect.height,
        canScrollX = void 0,
        canScrollY = void 0,
        scrollWidth = el.scrollWidth,
        scrollHeight = el.scrollHeight,
        elCSS = css(el),
        scrollPosX = el.scrollLeft,
        scrollPosY = el.scrollTop;

    if (el === winScroller) {
      canScrollX = width < scrollWidth && (elCSS.overflowX === 'auto' || elCSS.overflowX === 'scroll' || elCSS.overflowX === 'visible');
      canScrollY = height < scrollHeight && (elCSS.overflowY === 'auto' || elCSS.overflowY === 'scroll' || elCSS.overflowY === 'visible');
    } else {
      canScrollX = width < scrollWidth && (elCSS.overflowX === 'auto' || elCSS.overflowX === 'scroll');
      canScrollY = height < scrollHeight && (elCSS.overflowY === 'auto' || elCSS.overflowY === 'scroll');
    }

    var vx = canScrollX && (Math.abs(right - x) <= sens && scrollPosX + width < scrollWidth) - (Math.abs(left - x) <= sens && !!scrollPosX);
    var vy = canScrollY && (Math.abs(bottom - y) <= sens && scrollPosY + height < scrollHeight) - (Math.abs(top - y) <= sens && !!scrollPosY);

    if (!autoScrolls[layersOut]) {
      for (var i = 0; i <= layersOut; i++) {
        if (!autoScrolls[i]) {
          autoScrolls[i] = {};
        }
      }
    }

    if (autoScrolls[layersOut].vx != vx || autoScrolls[layersOut].vy != vy || autoScrolls[layersOut].el !== el) {
      autoScrolls[layersOut].el = el;
      autoScrolls[layersOut].vx = vx;
      autoScrolls[layersOut].vy = vy;
      clearInterval(autoScrolls[layersOut].pid);

      if (vx != 0 || vy != 0) {
        scrollThisInstance = true;
        /* jshint loopfunc:true */

        autoScrolls[layersOut].pid = setInterval(function () {
          // emulate drag over during autoscroll (fallback), emulating native DnD behaviour
          if (isFallback && this.layer === 0) {
            Sortable.active._onTouchMove(touchEvt$1); // To move ghost if it is positioned absolutely

          }

          var scrollOffsetY = autoScrolls[this.layer].vy ? autoScrolls[this.layer].vy * speed : 0;
          var scrollOffsetX = autoScrolls[this.layer].vx ? autoScrolls[this.layer].vx * speed : 0;

          if (typeof scrollCustomFn === 'function') {
            if (scrollCustomFn.call(Sortable.dragged.parentNode[expando], scrollOffsetX, scrollOffsetY, evt, touchEvt$1, autoScrolls[this.layer].el) !== 'continue') {
              return;
            }
          }

          scrollBy(autoScrolls[this.layer].el, scrollOffsetX, scrollOffsetY);
        }.bind({
          layer: layersOut
        }), 24);
      }
    }

    layersOut++;
  } while (options.bubbleScroll && currentParent !== winScroller && (currentParent = getParentAutoScrollElement(currentParent, false)));

  scrolling = scrollThisInstance; // in case another function catches scrolling as false in between when it is not
}, 30);

var drop = function drop(_ref) {
  var originalEvent = _ref.originalEvent,
      putSortable = _ref.putSortable,
      dragEl = _ref.dragEl,
      activeSortable = _ref.activeSortable,
      dispatchSortableEvent = _ref.dispatchSortableEvent,
      hideGhostForTarget = _ref.hideGhostForTarget,
      unhideGhostForTarget = _ref.unhideGhostForTarget;
  if (!originalEvent) return;
  var toSortable = putSortable || activeSortable;
  hideGhostForTarget();
  var touch = originalEvent.changedTouches && originalEvent.changedTouches.length ? originalEvent.changedTouches[0] : originalEvent;
  var target = document.elementFromPoint(touch.clientX, touch.clientY);
  unhideGhostForTarget();

  if (toSortable && !toSortable.el.contains(target)) {
    dispatchSortableEvent('spill');
    this.onSpill({
      dragEl: dragEl,
      putSortable: putSortable
    });
  }
};

function Revert() {}

Revert.prototype = {
  startIndex: null,
  dragStart: function dragStart(_ref2) {
    var oldDraggableIndex = _ref2.oldDraggableIndex;
    this.startIndex = oldDraggableIndex;
  },
  onSpill: function onSpill(_ref3) {
    var dragEl = _ref3.dragEl,
        putSortable = _ref3.putSortable;
    this.sortable.captureAnimationState();

    if (putSortable) {
      putSortable.captureAnimationState();
    }

    var nextSibling = getChild(this.sortable.el, this.startIndex, this.options);

    if (nextSibling) {
      this.sortable.el.insertBefore(dragEl, nextSibling);
    } else {
      this.sortable.el.appendChild(dragEl);
    }

    this.sortable.animateAll();

    if (putSortable) {
      putSortable.animateAll();
    }
  },
  drop: drop
};

_extends(Revert, {
  pluginName: 'revertOnSpill'
});

function Remove() {}

Remove.prototype = {
  onSpill: function onSpill(_ref4) {
    var dragEl = _ref4.dragEl,
        putSortable = _ref4.putSortable;
    var parentSortable = putSortable || this.sortable;
    parentSortable.captureAnimationState();
    dragEl.parentNode && dragEl.parentNode.removeChild(dragEl);
    parentSortable.animateAll();
  },
  drop: drop
};

_extends(Remove, {
  pluginName: 'removeOnSpill'
});

var lastSwapEl;

function SwapPlugin() {
  function Swap() {
    this.defaults = {
      swapClass: 'sortable-swap-highlight'
    };
  }

  Swap.prototype = {
    dragStart: function dragStart(_ref) {
      var dragEl = _ref.dragEl;
      lastSwapEl = dragEl;
    },
    dragOverValid: function dragOverValid(_ref2) {
      var completed = _ref2.completed,
          target = _ref2.target,
          onMove = _ref2.onMove,
          activeSortable = _ref2.activeSortable,
          changed = _ref2.changed,
          cancel = _ref2.cancel;
      if (!activeSortable.options.swap) return;
      var el = this.sortable.el,
          options = this.options;

      if (target && target !== el) {
        var prevSwapEl = lastSwapEl;

        if (onMove(target) !== false) {
          toggleClass(target, options.swapClass, true);
          lastSwapEl = target;
        } else {
          lastSwapEl = null;
        }

        if (prevSwapEl && prevSwapEl !== lastSwapEl) {
          toggleClass(prevSwapEl, options.swapClass, false);
        }
      }

      changed();
      completed(true);
      cancel();
    },
    drop: function drop(_ref3) {
      var activeSortable = _ref3.activeSortable,
          putSortable = _ref3.putSortable,
          dragEl = _ref3.dragEl;
      var toSortable = putSortable || this.sortable;
      var options = this.options;
      lastSwapEl && toggleClass(lastSwapEl, options.swapClass, false);

      if (lastSwapEl && (options.swap || putSortable && putSortable.options.swap)) {
        if (dragEl !== lastSwapEl) {
          toSortable.captureAnimationState();
          if (toSortable !== activeSortable) activeSortable.captureAnimationState();
          swapNodes(dragEl, lastSwapEl);
          toSortable.animateAll();
          if (toSortable !== activeSortable) activeSortable.animateAll();
        }
      }
    },
    nulling: function nulling() {
      lastSwapEl = null;
    }
  };
  return _extends(Swap, {
    pluginName: 'swap',
    eventProperties: function eventProperties() {
      return {
        swapItem: lastSwapEl
      };
    }
  });
}

function swapNodes(n1, n2) {
  var p1 = n1.parentNode,
      p2 = n2.parentNode,
      i1,
      i2;
  if (!p1 || !p2 || p1.isEqualNode(n2) || p2.isEqualNode(n1)) return;
  i1 = index(n1);
  i2 = index(n2);

  if (p1.isEqualNode(p2) && i1 < i2) {
    i2++;
  }

  p1.insertBefore(n2, p1.children[i1]);
  p2.insertBefore(n1, p2.children[i2]);
}

var multiDragElements = [],
    multiDragClones = [],
    lastMultiDragSelect,
    // for selection with modifier key down (SHIFT)
multiDragSortable,
    initialFolding = false,
    // Initial multi-drag fold when drag started
folding = false,
    // Folding any other time
dragStarted = false,
    dragEl$1,
    clonesFromRect,
    clonesHidden;

function MultiDragPlugin() {
  function MultiDrag(sortable) {
    // Bind all private methods
    for (var fn in this) {
      if (fn.charAt(0) === '_' && typeof this[fn] === 'function') {
        this[fn] = this[fn].bind(this);
      }
    }

    if (sortable.options.supportPointer) {
      on(document, 'pointerup', this._deselectMultiDrag);
    } else {
      on(document, 'mouseup', this._deselectMultiDrag);
      on(document, 'touchend', this._deselectMultiDrag);
    }

    on(document, 'keydown', this._checkKeyDown);
    on(document, 'keyup', this._checkKeyUp);
    this.defaults = {
      selectedClass: 'sortable-selected',
      multiDragKey: null,
      setData: function setData(dataTransfer, dragEl) {
        var data = '';

        if (multiDragElements.length && multiDragSortable === sortable) {
          multiDragElements.forEach(function (multiDragElement, i) {
            data += (!i ? '' : ', ') + multiDragElement.textContent;
          });
        } else {
          data = dragEl.textContent;
        }

        dataTransfer.setData('Text', data);
      }
    };
  }

  MultiDrag.prototype = {
    multiDragKeyDown: false,
    isMultiDrag: false,
    delayStartGlobal: function delayStartGlobal(_ref) {
      var dragged = _ref.dragEl;
      dragEl$1 = dragged;
    },
    delayEnded: function delayEnded() {
      this.isMultiDrag = ~multiDragElements.indexOf(dragEl$1);
    },
    setupClone: function setupClone(_ref2) {
      var sortable = _ref2.sortable,
          cancel = _ref2.cancel;
      if (!this.isMultiDrag) return;

      for (var i = 0; i < multiDragElements.length; i++) {
        multiDragClones.push(clone(multiDragElements[i]));
        multiDragClones[i].sortableIndex = multiDragElements[i].sortableIndex;
        multiDragClones[i].draggable = false;
        multiDragClones[i].style['will-change'] = '';
        toggleClass(multiDragClones[i], this.options.selectedClass, false);
        multiDragElements[i] === dragEl$1 && toggleClass(multiDragClones[i], this.options.chosenClass, false);
      }

      sortable._hideClone();

      cancel();
    },
    clone: function clone(_ref3) {
      var sortable = _ref3.sortable,
          rootEl = _ref3.rootEl,
          dispatchSortableEvent = _ref3.dispatchSortableEvent,
          cancel = _ref3.cancel;
      if (!this.isMultiDrag) return;

      if (!this.options.removeCloneOnHide) {
        if (multiDragElements.length && multiDragSortable === sortable) {
          insertMultiDragClones(true, rootEl);
          dispatchSortableEvent('clone');
          cancel();
        }
      }
    },
    showClone: function showClone(_ref4) {
      var cloneNowShown = _ref4.cloneNowShown,
          rootEl = _ref4.rootEl,
          cancel = _ref4.cancel;
      if (!this.isMultiDrag) return;
      insertMultiDragClones(false, rootEl);
      multiDragClones.forEach(function (clone) {
        css(clone, 'display', '');
      });
      cloneNowShown();
      clonesHidden = false;
      cancel();
    },
    hideClone: function hideClone(_ref5) {
      var _this = this;

      var sortable = _ref5.sortable,
          cloneNowHidden = _ref5.cloneNowHidden,
          cancel = _ref5.cancel;
      if (!this.isMultiDrag) return;
      multiDragClones.forEach(function (clone) {
        css(clone, 'display', 'none');

        if (_this.options.removeCloneOnHide && clone.parentNode) {
          clone.parentNode.removeChild(clone);
        }
      });
      cloneNowHidden();
      clonesHidden = true;
      cancel();
    },
    dragStartGlobal: function dragStartGlobal(_ref6) {
      var sortable = _ref6.sortable;

      if (!this.isMultiDrag && multiDragSortable) {
        multiDragSortable.multiDrag._deselectMultiDrag();
      }

      multiDragElements.forEach(function (multiDragElement) {
        multiDragElement.sortableIndex = index(multiDragElement);
      }); // Sort multi-drag elements

      multiDragElements = multiDragElements.sort(function (a, b) {
        return a.sortableIndex - b.sortableIndex;
      });
      dragStarted = true;
    },
    dragStarted: function dragStarted(_ref7) {
      var _this2 = this;

      var sortable = _ref7.sortable;
      if (!this.isMultiDrag) return;

      if (this.options.sort) {
        // Capture rects,
        // hide multi drag elements (by positioning them absolute),
        // set multi drag elements rects to dragRect,
        // show multi drag elements,
        // animate to rects,
        // unset rects & remove from DOM
        sortable.captureAnimationState();

        if (this.options.animation) {
          multiDragElements.forEach(function (multiDragElement) {
            if (multiDragElement === dragEl$1) return;
            css(multiDragElement, 'position', 'absolute');
          });
          var dragRect = getRect(dragEl$1, false, true, true);
          multiDragElements.forEach(function (multiDragElement) {
            if (multiDragElement === dragEl$1) return;
            setRect(multiDragElement, dragRect);
          });
          folding = true;
          initialFolding = true;
        }
      }

      sortable.animateAll(function () {
        folding = false;
        initialFolding = false;

        if (_this2.options.animation) {
          multiDragElements.forEach(function (multiDragElement) {
            unsetRect(multiDragElement);
          });
        } // Remove all auxiliary multidrag items from el, if sorting enabled


        if (_this2.options.sort) {
          removeMultiDragElements();
        }
      });
    },
    dragOver: function dragOver(_ref8) {
      var target = _ref8.target,
          completed = _ref8.completed,
          cancel = _ref8.cancel;

      if (folding && ~multiDragElements.indexOf(target)) {
        completed(false);
        cancel();
      }
    },
    revert: function revert(_ref9) {
      var fromSortable = _ref9.fromSortable,
          rootEl = _ref9.rootEl,
          sortable = _ref9.sortable,
          dragRect = _ref9.dragRect;

      if (multiDragElements.length > 1) {
        // Setup unfold animation
        multiDragElements.forEach(function (multiDragElement) {
          sortable.addAnimationState({
            target: multiDragElement,
            rect: folding ? getRect(multiDragElement) : dragRect
          });
          unsetRect(multiDragElement);
          multiDragElement.fromRect = dragRect;
          fromSortable.removeAnimationState(multiDragElement);
        });
        folding = false;
        insertMultiDragElements(!this.options.removeCloneOnHide, rootEl);
      }
    },
    dragOverCompleted: function dragOverCompleted(_ref10) {
      var sortable = _ref10.sortable,
          isOwner = _ref10.isOwner,
          insertion = _ref10.insertion,
          activeSortable = _ref10.activeSortable,
          parentEl = _ref10.parentEl,
          putSortable = _ref10.putSortable;
      var options = this.options;

      if (insertion) {
        // Clones must be hidden before folding animation to capture dragRectAbsolute properly
        if (isOwner) {
          activeSortable._hideClone();
        }

        initialFolding = false; // If leaving sort:false root, or already folding - Fold to new location

        if (options.animation && multiDragElements.length > 1 && (folding || !isOwner && !activeSortable.options.sort && !putSortable)) {
          // Fold: Set all multi drag elements's rects to dragEl's rect when multi-drag elements are invisible
          var dragRectAbsolute = getRect(dragEl$1, false, true, true);
          multiDragElements.forEach(function (multiDragElement) {
            if (multiDragElement === dragEl$1) return;
            setRect(multiDragElement, dragRectAbsolute); // Move element(s) to end of parentEl so that it does not interfere with multi-drag clones insertion if they are inserted
            // while folding, and so that we can capture them again because old sortable will no longer be fromSortable

            parentEl.appendChild(multiDragElement);
          });
          folding = true;
        } // Clones must be shown (and check to remove multi drags) after folding when interfering multiDragElements are moved out


        if (!isOwner) {
          // Only remove if not folding (folding will remove them anyways)
          if (!folding) {
            removeMultiDragElements();
          }

          if (multiDragElements.length > 1) {
            var clonesHiddenBefore = clonesHidden;

            activeSortable._showClone(sortable); // Unfold animation for clones if showing from hidden


            if (activeSortable.options.animation && !clonesHidden && clonesHiddenBefore) {
              multiDragClones.forEach(function (clone) {
                activeSortable.addAnimationState({
                  target: clone,
                  rect: clonesFromRect
                });
                clone.fromRect = clonesFromRect;
                clone.thisAnimationDuration = null;
              });
            }
          } else {
            activeSortable._showClone(sortable);
          }
        }
      }
    },
    dragOverAnimationCapture: function dragOverAnimationCapture(_ref11) {
      var dragRect = _ref11.dragRect,
          isOwner = _ref11.isOwner,
          activeSortable = _ref11.activeSortable;
      multiDragElements.forEach(function (multiDragElement) {
        multiDragElement.thisAnimationDuration = null;
      });

      if (activeSortable.options.animation && !isOwner && activeSortable.multiDrag.isMultiDrag) {
        clonesFromRect = _extends({}, dragRect);
        var dragMatrix = matrix(dragEl$1, true);
        clonesFromRect.top -= dragMatrix.f;
        clonesFromRect.left -= dragMatrix.e;
      }
    },
    dragOverAnimationComplete: function dragOverAnimationComplete() {
      if (folding) {
        folding = false;
        removeMultiDragElements();
      }
    },
    drop: function drop(_ref12) {
      var evt = _ref12.originalEvent,
          rootEl = _ref12.rootEl,
          parentEl = _ref12.parentEl,
          sortable = _ref12.sortable,
          dispatchSortableEvent = _ref12.dispatchSortableEvent,
          oldIndex = _ref12.oldIndex,
          putSortable = _ref12.putSortable;
      var toSortable = putSortable || this.sortable;
      if (!evt) return;
      var options = this.options,
          children = parentEl.children; // Multi-drag selection

      if (!dragStarted) {
        if (options.multiDragKey && !this.multiDragKeyDown) {
          this._deselectMultiDrag();
        }

        toggleClass(dragEl$1, options.selectedClass, !~multiDragElements.indexOf(dragEl$1));

        if (!~multiDragElements.indexOf(dragEl$1)) {
          multiDragElements.push(dragEl$1);
          dispatchEvent({
            sortable: sortable,
            rootEl: rootEl,
            name: 'select',
            targetEl: dragEl$1,
            originalEvt: evt
          }); // Modifier activated, select from last to dragEl

          if (evt.shiftKey && lastMultiDragSelect && sortable.el.contains(lastMultiDragSelect)) {
            var lastIndex = index(lastMultiDragSelect),
                currentIndex = index(dragEl$1);

            if (~lastIndex && ~currentIndex && lastIndex !== currentIndex) {
              // Must include lastMultiDragSelect (select it), in case modified selection from no selection
              // (but previous selection existed)
              var n, i;

              if (currentIndex > lastIndex) {
                i = lastIndex;
                n = currentIndex;
              } else {
                i = currentIndex;
                n = lastIndex + 1;
              }

              for (; i < n; i++) {
                if (~multiDragElements.indexOf(children[i])) continue;
                toggleClass(children[i], options.selectedClass, true);
                multiDragElements.push(children[i]);
                dispatchEvent({
                  sortable: sortable,
                  rootEl: rootEl,
                  name: 'select',
                  targetEl: children[i],
                  originalEvt: evt
                });
              }
            }
          } else {
            lastMultiDragSelect = dragEl$1;
          }

          multiDragSortable = toSortable;
        } else {
          multiDragElements.splice(multiDragElements.indexOf(dragEl$1), 1);
          lastMultiDragSelect = null;
          dispatchEvent({
            sortable: sortable,
            rootEl: rootEl,
            name: 'deselect',
            targetEl: dragEl$1,
            originalEvt: evt
          });
        }
      } // Multi-drag drop


      if (dragStarted && this.isMultiDrag) {
        folding = false; // Do not "unfold" after around dragEl if reverted

        if ((parentEl[expando].options.sort || parentEl !== rootEl) && multiDragElements.length > 1) {
          var dragRect = getRect(dragEl$1),
              multiDragIndex = index(dragEl$1, ':not(.' + this.options.selectedClass + ')');
          if (!initialFolding && options.animation) dragEl$1.thisAnimationDuration = null;
          toSortable.captureAnimationState();

          if (!initialFolding) {
            if (options.animation) {
              dragEl$1.fromRect = dragRect;
              multiDragElements.forEach(function (multiDragElement) {
                multiDragElement.thisAnimationDuration = null;

                if (multiDragElement !== dragEl$1) {
                  var rect = folding ? getRect(multiDragElement) : dragRect;
                  multiDragElement.fromRect = rect; // Prepare unfold animation

                  toSortable.addAnimationState({
                    target: multiDragElement,
                    rect: rect
                  });
                }
              });
            } // Multi drag elements are not necessarily removed from the DOM on drop, so to reinsert
            // properly they must all be removed


            removeMultiDragElements();
            multiDragElements.forEach(function (multiDragElement) {
              if (children[multiDragIndex]) {
                parentEl.insertBefore(multiDragElement, children[multiDragIndex]);
              } else {
                parentEl.appendChild(multiDragElement);
              }

              multiDragIndex++;
            }); // If initial folding is done, the elements may have changed position because they are now
            // unfolding around dragEl, even though dragEl may not have his index changed, so update event
            // must be fired here as Sortable will not.

            if (oldIndex === index(dragEl$1)) {
              var update = false;
              multiDragElements.forEach(function (multiDragElement) {
                if (multiDragElement.sortableIndex !== index(multiDragElement)) {
                  update = true;
                  return;
                }
              });

              if (update) {
                dispatchSortableEvent('update');
              }
            }
          } // Must be done after capturing individual rects (scroll bar)


          multiDragElements.forEach(function (multiDragElement) {
            unsetRect(multiDragElement);
          });
          toSortable.animateAll();
        }

        multiDragSortable = toSortable;
      } // Remove clones if necessary


      if (rootEl === parentEl || putSortable && putSortable.lastPutMode !== 'clone') {
        multiDragClones.forEach(function (clone) {
          clone.parentNode && clone.parentNode.removeChild(clone);
        });
      }
    },
    nullingGlobal: function nullingGlobal() {
      this.isMultiDrag = dragStarted = false;
      multiDragClones.length = 0;
    },
    destroyGlobal: function destroyGlobal() {
      this._deselectMultiDrag();

      off(document, 'pointerup', this._deselectMultiDrag);
      off(document, 'mouseup', this._deselectMultiDrag);
      off(document, 'touchend', this._deselectMultiDrag);
      off(document, 'keydown', this._checkKeyDown);
      off(document, 'keyup', this._checkKeyUp);
    },
    _deselectMultiDrag: function _deselectMultiDrag(evt) {
      if (typeof dragStarted !== "undefined" && dragStarted) return; // Only deselect if selection is in this sortable

      if (multiDragSortable !== this.sortable) return; // Only deselect if target is not item in this sortable

      if (evt && closest(evt.target, this.options.draggable, this.sortable.el, false)) return; // Only deselect if left click

      if (evt && evt.button !== 0) return;

      while (multiDragElements.length) {
        var el = multiDragElements[0];
        toggleClass(el, this.options.selectedClass, false);
        multiDragElements.shift();
        dispatchEvent({
          sortable: this.sortable,
          rootEl: this.sortable.el,
          name: 'deselect',
          targetEl: el,
          originalEvt: evt
        });
      }
    },
    _checkKeyDown: function _checkKeyDown(evt) {
      if (evt.key === this.options.multiDragKey) {
        this.multiDragKeyDown = true;
      }
    },
    _checkKeyUp: function _checkKeyUp(evt) {
      if (evt.key === this.options.multiDragKey) {
        this.multiDragKeyDown = false;
      }
    }
  };
  return _extends(MultiDrag, {
    // Static methods & properties
    pluginName: 'multiDrag',
    utils: {
      /**
       * Selects the provided multi-drag item
       * @param  {HTMLElement} el    The element to be selected
       */
      select: function select(el) {
        var sortable = el.parentNode[expando];
        if (!sortable || !sortable.options.multiDrag || ~multiDragElements.indexOf(el)) return;

        if (multiDragSortable && multiDragSortable !== sortable) {
          multiDragSortable.multiDrag._deselectMultiDrag();

          multiDragSortable = sortable;
        }

        toggleClass(el, sortable.options.selectedClass, true);
        multiDragElements.push(el);
      },

      /**
       * Deselects the provided multi-drag item
       * @param  {HTMLElement} el    The element to be deselected
       */
      deselect: function deselect(el) {
        var sortable = el.parentNode[expando],
            index = multiDragElements.indexOf(el);
        if (!sortable || !sortable.options.multiDrag || !~index) return;
        toggleClass(el, sortable.options.selectedClass, false);
        multiDragElements.splice(index, 1);
      }
    },
    eventProperties: function eventProperties() {
      var _this3 = this;

      var oldIndicies = [],
          newIndicies = [];
      multiDragElements.forEach(function (multiDragElement) {
        oldIndicies.push({
          multiDragElement: multiDragElement,
          index: multiDragElement.sortableIndex
        }); // multiDragElements will already be sorted if folding

        var newIndex;

        if (folding && multiDragElement !== dragEl$1) {
          newIndex = -1;
        } else if (folding) {
          newIndex = index(multiDragElement, ':not(.' + _this3.options.selectedClass + ')');
        } else {
          newIndex = index(multiDragElement);
        }

        newIndicies.push({
          multiDragElement: multiDragElement,
          index: newIndex
        });
      });
      return {
        items: _toConsumableArray(multiDragElements),
        clones: [].concat(multiDragClones),
        oldIndicies: oldIndicies,
        newIndicies: newIndicies
      };
    },
    optionListeners: {
      multiDragKey: function multiDragKey(key) {
        key = key.toLowerCase();

        if (key === 'ctrl') {
          key = 'Control';
        } else if (key.length > 1) {
          key = key.charAt(0).toUpperCase() + key.substr(1);
        }

        return key;
      }
    }
  });
}

function insertMultiDragElements(clonesInserted, rootEl) {
  multiDragElements.forEach(function (multiDragElement, i) {
    var target = rootEl.children[multiDragElement.sortableIndex + (clonesInserted ? Number(i) : 0)];

    if (target) {
      rootEl.insertBefore(multiDragElement, target);
    } else {
      rootEl.appendChild(multiDragElement);
    }
  });
}
/**
 * Insert multi-drag clones
 * @param  {[Boolean]} elementsInserted  Whether the multi-drag elements are inserted
 * @param  {HTMLElement} rootEl
 */


function insertMultiDragClones(elementsInserted, rootEl) {
  multiDragClones.forEach(function (clone, i) {
    var target = rootEl.children[clone.sortableIndex + (elementsInserted ? Number(i) : 0)];

    if (target) {
      rootEl.insertBefore(clone, target);
    } else {
      rootEl.appendChild(clone);
    }
  });
}

function removeMultiDragElements() {
  multiDragElements.forEach(function (multiDragElement) {
    if (multiDragElement === dragEl$1) return;
    multiDragElement.parentNode && multiDragElement.parentNode.removeChild(multiDragElement);
  });
}

Sortable.mount(new AutoScrollPlugin());
Sortable.mount(Remove, Revert);

/* harmony default export */ __webpack_exports__["default"] = (Sortable);



/***/ }),

/***/ "./node_modules/stylis/dist/stylis.mjs":
/*!*********************************************!*\
  !*** ./node_modules/stylis/dist/stylis.mjs ***!
  \*********************************************/
/*! exports provided: CHARSET, COMMENT, COUNTER_STYLE, DECLARATION, DOCUMENT, FONT_FACE, FONT_FEATURE_VALUES, IMPORT, KEYFRAMES, MEDIA, MOZ, MS, NAMESPACE, PAGE, RULESET, SUPPORTS, VIEWPORT, WEBKIT, abs, alloc, append, assign, caret, char, character, characters, charat, column, combine, comment, commenter, compile, copy, dealloc, declaration, delimit, delimiter, escaping, from, hash, identifier, indexof, length, line, match, middleware, namespace, next, node, parse, peek, position, prefix, prefixer, prev, replace, ruleset, rulesheet, serialize, sizeof, slice, stringify, strlen, substr, token, tokenize, tokenizer, trim, whitespace */
/***/ (function(__webpack_module__, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "CHARSET", function() { return f; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "COMMENT", function() { return c; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "COUNTER_STYLE", function() { return w; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "DECLARATION", function() { return t; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "DOCUMENT", function() { return v; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "FONT_FACE", function() { return b; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "FONT_FEATURE_VALUES", function() { return $; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "IMPORT", function() { return i; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "KEYFRAMES", function() { return p; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "MEDIA", function() { return u; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "MOZ", function() { return r; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "MS", function() { return e; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "NAMESPACE", function() { return h; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "PAGE", function() { return s; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "RULESET", function() { return n; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SUPPORTS", function() { return l; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "VIEWPORT", function() { return o; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "WEBKIT", function() { return a; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "abs", function() { return k; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "alloc", function() { return U; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "append", function() { return S; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "assign", function() { return g; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "caret", function() { return Q; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "char", function() { return K; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "character", function() { return G; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "characters", function() { return H; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "charat", function() { return z; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "column", function() { return D; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "combine", function() { return q; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "comment", function() { return se; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "commenter", function() { return re; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "compile", function() { return ce; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "copy", function() { return J; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "dealloc", function() { return V; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "declaration", function() { return ue; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "delimit", function() { return W; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "delimiter", function() { return ee; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "escaping", function() { return _; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "from", function() { return d; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "hash", function() { return m; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "identifier", function() { return ae; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "indexof", function() { return C; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "length", function() { return E; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "line", function() { return B; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "match", function() { return y; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "middleware", function() { return le; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "namespace", function() { return pe; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "next", function() { return N; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "node", function() { return I; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "parse", function() { return ne; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "peek", function() { return P; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "position", function() { return F; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "prefix", function() { return ie; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "prefixer", function() { return he; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "prev", function() { return L; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "replace", function() { return j; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ruleset", function() { return te; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "rulesheet", function() { return ve; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "serialize", function() { return fe; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "sizeof", function() { return M; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "slice", function() { return R; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "stringify", function() { return oe; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "strlen", function() { return O; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "substr", function() { return A; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "token", function() { return T; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "tokenize", function() { return X; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "tokenizer", function() { return Z; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "trim", function() { return x; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "whitespace", function() { return Y; });
var e="-ms-";var r="-moz-";var a="-webkit-";var c="comm";var n="rule";var t="decl";var s="@page";var u="@media";var i="@import";var f="@charset";var o="@viewport";var l="@supports";var v="@document";var h="@namespace";var p="@keyframes";var b="@font-face";var w="@counter-style";var $="@font-feature-values";var k=Math.abs;var d=String.fromCharCode;var g=Object.assign;function m(e,r){return(((r<<2^z(e,0))<<2^z(e,1))<<2^z(e,2))<<2^z(e,3)}function x(e){return e.trim()}function y(e,r){return(e=r.exec(e))?e[0]:e}function j(e,r,a){return e.replace(r,a)}function C(e,r){return e.indexOf(r)}function z(e,r){return e.charCodeAt(r)|0}function A(e,r,a){return e.slice(r,a)}function O(e){return e.length}function M(e){return e.length}function S(e,r){return r.push(e),e}function q(e,r){return e.map(r).join("")}var B=1;var D=1;var E=0;var F=0;var G=0;var H="";function I(e,r,a,c,n,t,s){return{value:e,root:r,parent:a,type:c,props:n,children:t,line:B,column:D,length:s,return:""}}function J(e,r){return g(I("",null,null,"",null,null,0),e,{length:-e.length},r)}function K(){return G}function L(){G=F>0?z(H,--F):0;if(D--,G===10)D=1,B--;return G}function N(){G=F<E?z(H,F++):0;if(D++,G===10)D=1,B++;return G}function P(){return z(H,F)}function Q(){return F}function R(e,r){return A(H,e,r)}function T(e){switch(e){case 0:case 9:case 10:case 13:case 32:return 5;case 33:case 43:case 44:case 47:case 62:case 64:case 126:case 59:case 123:case 125:return 4;case 58:return 3;case 34:case 39:case 40:case 91:return 2;case 41:case 93:return 1}return 0}function U(e){return B=D=1,E=O(H=e),F=0,[]}function V(e){return H="",e}function W(e){return x(R(F-1,ee(e===91?e+2:e===40?e+1:e)))}function X(e){return V(Z(U(e)))}function Y(e){while(G=P())if(G<33)N();else break;return T(e)>2||T(G)>3?"":" "}function Z(e){while(N())switch(T(G)){case 0:S(ae(F-1),e);break;case 2:S(W(G),e);break;default:S(d(G),e)}return e}function _(e,r){while(--r&&N())if(G<48||G>102||G>57&&G<65||G>70&&G<97)break;return R(e,Q()+(r<6&&P()==32&&N()==32))}function ee(e){while(N())switch(G){case e:return F;case 34:case 39:if(e!==34&&e!==39)ee(G);break;case 40:if(e===41)ee(e);break;case 92:N();break}return F}function re(e,r){while(N())if(e+G===47+10)break;else if(e+G===42+42&&P()===47)break;return"/*"+R(r,F-1)+"*"+d(e===47?e:N())}function ae(e){while(!T(P()))N();return R(e,F)}function ce(e){return V(ne("",null,null,null,[""],e=U(e),0,[0],e))}function ne(e,r,a,c,n,t,s,u,i){var f=0;var o=0;var l=s;var v=0;var h=0;var p=0;var b=1;var w=1;var $=1;var k=0;var g="";var m=n;var x=t;var y=c;var z=g;while(w)switch(p=k,k=N()){case 40:if(p!=108&&z.charCodeAt(l-1)==58){if(C(z+=j(W(k),"&","&\f"),"&\f")!=-1)$=-1;break}case 34:case 39:case 91:z+=W(k);break;case 9:case 10:case 13:case 32:z+=Y(p);break;case 92:z+=_(Q()-1,7);continue;case 47:switch(P()){case 42:case 47:S(se(re(N(),Q()),r,a),i);break;default:z+="/"}break;case 123*b:u[f++]=O(z)*$;case 125*b:case 59:case 0:switch(k){case 0:case 125:w=0;case 59+o:if(h>0&&O(z)-l)S(h>32?ue(z+";",c,a,l-1):ue(j(z," ","")+";",c,a,l-2),i);break;case 59:z+=";";default:S(y=te(z,r,a,f,o,n,u,g,m=[],x=[],l),t);if(k===123)if(o===0)ne(z,r,y,y,m,t,l,u,x);else switch(v){case 100:case 109:case 115:ne(e,y,y,c&&S(te(e,y,y,0,0,n,u,g,n,m=[],l),x),n,x,l,u,c?m:x);break;default:ne(z,y,y,y,[""],x,0,u,x)}}f=o=h=0,b=$=1,g=z="",l=s;break;case 58:l=1+O(z),h=p;default:if(b<1)if(k==123)--b;else if(k==125&&b++==0&&L()==125)continue;switch(z+=d(k),k*b){case 38:$=o>0?1:(z+="\f",-1);break;case 44:u[f++]=(O(z)-1)*$,$=1;break;case 64:if(P()===45)z+=W(N());v=P(),o=l=O(g=z+=ae(Q())),k++;break;case 45:if(p===45&&O(z)==2)b=0}}return t}function te(e,r,a,c,t,s,u,i,f,o,l){var v=t-1;var h=t===0?s:[""];var p=M(h);for(var b=0,w=0,$=0;b<c;++b)for(var d=0,g=A(e,v+1,v=k(w=u[b])),m=e;d<p;++d)if(m=x(w>0?h[d]+" "+g:j(g,/&\f/g,h[d])))f[$++]=m;return I(e,r,a,t===0?n:i,f,o,l)}function se(e,r,a){return I(e,r,a,c,d(K()),A(e,2,-2),0)}function ue(e,r,a,c){return I(e,r,a,t,A(e,0,c),A(e,c+1,-1),c)}function ie(c,n){switch(m(c,n)){case 5103:return a+"print-"+c+c;case 5737:case 4201:case 3177:case 3433:case 1641:case 4457:case 2921:case 5572:case 6356:case 5844:case 3191:case 6645:case 3005:case 6391:case 5879:case 5623:case 6135:case 4599:case 4855:case 4215:case 6389:case 5109:case 5365:case 5621:case 3829:return a+c+c;case 5349:case 4246:case 4810:case 6968:case 2756:return a+c+r+c+e+c+c;case 6828:case 4268:return a+c+e+c+c;case 6165:return a+c+e+"flex-"+c+c;case 5187:return a+c+j(c,/(\w+).+(:[^]+)/,a+"box-$1$2"+e+"flex-$1$2")+c;case 5443:return a+c+e+"flex-item-"+j(c,/flex-|-self/,"")+c;case 4675:return a+c+e+"flex-line-pack"+j(c,/align-content|flex-|-self/,"")+c;case 5548:return a+c+e+j(c,"shrink","negative")+c;case 5292:return a+c+e+j(c,"basis","preferred-size")+c;case 6060:return a+"box-"+j(c,"-grow","")+a+c+e+j(c,"grow","positive")+c;case 4554:return a+j(c,/([^-])(transform)/g,"$1"+a+"$2")+c;case 6187:return j(j(j(c,/(zoom-|grab)/,a+"$1"),/(image-set)/,a+"$1"),c,"")+c;case 5495:case 3959:return j(c,/(image-set\([^]*)/,a+"$1"+"$`$1");case 4968:return j(j(c,/(.+:)(flex-)?(.*)/,a+"box-pack:$3"+e+"flex-pack:$3"),/s.+-b[^;]+/,"justify")+a+c+c;case 4095:case 3583:case 4068:case 2532:return j(c,/(.+)-inline(.+)/,a+"$1$2")+c;case 8116:case 7059:case 5753:case 5535:case 5445:case 5701:case 4933:case 4677:case 5533:case 5789:case 5021:case 4765:if(O(c)-1-n>6)switch(z(c,n+1)){case 109:if(z(c,n+4)!==45)break;case 102:return j(c,/(.+:)(.+)-([^]+)/,"$1"+a+"$2-$3"+"$1"+r+(z(c,n+3)==108?"$3":"$2-$3"))+c;case 115:return~C(c,"stretch")?ie(j(c,"stretch","fill-available"),n)+c:c}break;case 4949:if(z(c,n+1)!==115)break;case 6444:switch(z(c,O(c)-3-(~C(c,"!important")&&10))){case 107:return j(c,":",":"+a)+c;case 101:return j(c,/(.+:)([^;!]+)(;|!.+)?/,"$1"+a+(z(c,14)===45?"inline-":"")+"box$3"+"$1"+a+"$2$3"+"$1"+e+"$2box$3")+c}break;case 5936:switch(z(c,n+11)){case 114:return a+c+e+j(c,/[svh]\w+-[tblr]{2}/,"tb")+c;case 108:return a+c+e+j(c,/[svh]\w+-[tblr]{2}/,"tb-rl")+c;case 45:return a+c+e+j(c,/[svh]\w+-[tblr]{2}/,"lr")+c}return a+c+e+c+c}return c}function fe(e,r){var a="";var c=M(e);for(var n=0;n<c;n++)a+=r(e[n],n,e,r)||"";return a}function oe(e,r,a,s){switch(e.type){case i:case t:return e.return=e.return||e.value;case c:return"";case p:return e.return=e.value+"{"+fe(e.children,s)+"}";case n:e.value=e.props.join(",")}return O(a=fe(e.children,s))?e.return=e.value+"{"+a+"}":""}function le(e){var r=M(e);return function(a,c,n,t){var s="";for(var u=0;u<r;u++)s+=e[u](a,c,n,t)||"";return s}}function ve(e){return function(r){if(!r.root)if(r=r.return)e(r)}}function he(c,s,u,i){if(c.length>-1)if(!c.return)switch(c.type){case t:c.return=ie(c.value,c.length);break;case p:return fe([J(c,{value:j(c.value,"@","@"+a)})],i);case n:if(c.length)return q(c.props,(function(n){switch(y(n,/(::plac\w+|:read-\w+)/)){case":read-only":case":read-write":return fe([J(c,{props:[j(n,/:(read-\w+)/,":"+r+"$1")]})],i);case"::placeholder":return fe([J(c,{props:[j(n,/:(plac\w+)/,":"+a+"input-$1")]}),J(c,{props:[j(n,/:(plac\w+)/,":"+r+"$1")]}),J(c,{props:[j(n,/:(plac\w+)/,e+"input-$1")]})],i)}return""}))}}function pe(e){switch(e.type){case n:e.props=e.props.map((function(r){return q(X(r),(function(r,a,c){switch(z(r,0)){case 12:return A(r,1,O(r));case 0:case 40:case 43:case 62:case 126:return r;case 58:if(c[++a]==="global")c[a]="",c[++a]="\f"+A(c[a],a=1,-1);case 32:return a===1?"":r;default:switch(a){case 0:e=r;return M(c)>1?"":r;case a=M(c)-1:case 2:return a===2?r+e+e:r+e;default:return r}}}))}))}}
//# sourceMappingURL=stylis.mjs.map


/***/ }),

/***/ "./node_modules/tiny-invariant/dist/tiny-invariant.esm.js":
/*!****************************************************************!*\
  !*** ./node_modules/tiny-invariant/dist/tiny-invariant.esm.js ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return invariant; });
var isProduction = "development" === 'production';
var prefix = 'Invariant failed';
function invariant(condition, message) {
    if (condition) {
        return;
    }
    if (isProduction) {
        throw new Error(prefix);
    }
    var provided = typeof message === 'function' ? message() : message;
    var value = provided ? prefix + ": " + provided : prefix;
    throw new Error(value);
}




/***/ }),

/***/ "./node_modules/webpack/buildin/global.js":
/*!***********************************!*\
  !*** (webpack)/buildin/global.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var g;

// This works in non-strict mode
g = (function() {
	return this;
})();

try {
	// This works if eval is allowed (see CSP)
	g = g || new Function("return this")();
} catch (e) {
	// This works if the window reference is available
	if (typeof window === "object") g = window;
}

// g can still be undefined, but nothing to do about it...
// We return undefined, instead of nothing here, so it's
// easier to handle this case. if(!global) { ...}

module.exports = g;


/***/ }),

/***/ "./src/customizer-controls.js":
/*!************************************!*\
  !*** ./src/customizer-controls.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($, api) {
  api.bind('ready', function () {
    /**
     * Display logo settings
     */
    api.control('aeon_settings[add_retina_logo]', function (control) {
      var toggleControl = function toggleControl(value) {
        if (true === value) {
          api.control('aeon_settings[retina_logo]').toggle(true);
        } else {
          api.control('aeon_settings[retina_logo]').toggle(false);
        }
      };

      toggleControl(control.setting.get());
      control.setting.bind(toggleControl);
    });
    /**
     * Display sticky settings
     */

    api.control('aeon_settings[add_sticky]', function (control) {
      var toggleControl = function toggleControl(value) {
        if (true === value) {
          api.control('aeon_settings[add_sticky_shadow]').toggle(true);
          api.control('aeon_settings[sticky_breakpoint]').toggle(true);
          api.control('aeon_settings[sticky_background]').toggle(true);
          api.control('aeon_sticky_links_color_wrapper').toggle(true);
          api.control('aeon_settings[sticky_style]').toggle(true);
          api.control('aeon_settings[sticky_logo]').toggle(true);
          api.control('aeon_settings[sticky_retina_logo]').toggle(true);
          api.control('aeon_settings[sticky_logo_width]').toggle(true);
        } else {
          api.control('aeon_settings[add_sticky_shadow]').toggle(false);
          api.control('aeon_settings[sticky_breakpoint]').toggle(false);
          api.control('aeon_settings[sticky_background]').toggle(false);
          api.control('aeon_sticky_links_color_wrapper').toggle(false);
          api.control('aeon_settings[sticky_style]').toggle(false);
          api.control('aeon_settings[sticky_logo]').toggle(false);
          api.control('aeon_settings[sticky_retina_logo]').toggle(false);
          api.control('aeon_settings[sticky_logo_width]').toggle(false);
        }
      };

      toggleControl(control.setting.get());
      control.setting.bind(toggleControl);
    });
    /**
     * Display breadcrumbs settings
     */

    api.control('aeon_settings[add_breadcrumbs]', function (control) {
      var toggleControl = function toggleControl(value) {
        if (true === value) {
          api.control('aeon_page_header_breadcrumbs_text_separator_color_wrapper').toggle(true);
          api.control('aeon_page_header_breadcrumbs_links_wrapper').toggle(true);
        } else {
          api.control('aeon_page_header_breadcrumbs_text_separator_color_wrapper').toggle(false);
          api.control('aeon_page_header_breadcrumbs_links_wrapper').toggle(false);
        }
      };

      toggleControl(control.setting.get());
      control.setting.bind(toggleControl);
    });
    /**
     * Display search settings
     */

    api.control('aeon_settings[search_style]', function (control) {
      var selectControl = function selectControl(value) {
        if ('none' === value) {
          api.control('aeon_settings[search_source]').toggle(false);
        } else {
          api.control('aeon_settings[search_source]').toggle(true);
        }

        if ('dropdown' === value) {
          api.control('aeon_settings[search_dropdown_heading]').toggle(true);
          api.control('aeon_settings[search_dropdown_bg]').toggle(true);
          api.control('aeon_search_dropdown_input_wrapper').toggle(true);
          api.control('aeon_search_dropdown_input_border_wrapper').toggle(true);
        } else {
          api.control('aeon_settings[search_dropdown_heading]').toggle(false);
          api.control('aeon_settings[search_dropdown_bg]').toggle(false);
          api.control('aeon_search_dropdown_input_wrapper').toggle(false);
          api.control('aeon_search_dropdown_input_border_wrapper').toggle(false);
        }

        if ('full-screen' === value) {
          api.control('aeon_settings[search_fullscreen_heading]').toggle(true);
          api.control('aeon_settings[search_fullscreen_design_heading]').toggle(true);
          api.control('aeon_settings[search_fullscreen_bg]').toggle(true);
          api.control('aeon_settings[search_fullscreen_title_color]').toggle(true);
          api.control('aeon_search_fullscreen_input_wrapper').toggle(true);
          api.control('aeon_search_fullscreen_input_border_wrapper').toggle(true);
          api.control('aeon_search_fullscreen_close_btn_wrapper').toggle(true);
        } else {
          api.control('aeon_settings[search_fullscreen_heading]').toggle(false);
          api.control('aeon_settings[search_fullscreen_design_heading]').toggle(false);
          api.control('aeon_settings[search_fullscreen_bg]').toggle(false);
          api.control('aeon_settings[search_fullscreen_title_color]').toggle(false);
          api.control('aeon_search_fullscreen_input_wrapper').toggle(false);
          api.control('aeon_search_fullscreen_input_border_wrapper').toggle(false);
          api.control('aeon_search_fullscreen_close_btn_wrapper').toggle(false);
        }

        if ('slide' === value) {
          api.control('aeon_settings[search_slide_heading]').toggle(true);
          api.control('aeon_search_slide_input_wrapper').toggle(true);
          api.control('aeon_search_slide_input_border_wrapper').toggle(true);
          api.control('aeon_search_slide_close_btn_wrapper').toggle(true);
        } else {
          api.control('aeon_settings[search_slide_heading]').toggle(false);
          api.control('aeon_search_slide_input_wrapper').toggle(false);
          api.control('aeon_search_slide_input_border_wrapper').toggle(false);
          api.control('aeon_search_slide_close_btn_wrapper').toggle(false);
        }
      };

      selectControl(control.setting.get());
      control.setting.bind(selectControl);
    });
    /**
     * Display cart settings
     */

    api.control('aeon_settings[add_cart_icon]', function (control) {
      var toggleControl = function toggleControl(value) {
        if (true === value) {
          api.control('aeon_settings[cart_count]').toggle(true);
          api.control('aeon_settings[cart_total]').toggle(true);
        } else {
          api.control('aeon_settings[cart_count]').toggle(false);
          api.control('aeon_settings[cart_total]').toggle(false);
        }
      };

      toggleControl(control.setting.get());
      control.setting.bind(toggleControl);
    });
    /**
     * Display performance css settings
     */

    api.control('aeon_settings[load_css_file]', function (control) {
      var toggleControl = function toggleControl(value) {
        if (true === value) {
          api.control('aeon_settings[regenerate_external_css]').toggle(true);
        } else {
          api.control('aeon_settings[regenerate_external_css]').toggle(false);
        }
      };

      toggleControl(control.setting.get());
      control.setting.bind(toggleControl);
    });
    /**
     * Regenerate CSS
     */

    $('button.aeon-regenerate-css').on('click', function (e) {
      e.preventDefault();

      var _this = $(this),
          data = {
        action: 'aeon_regenerate_css_file',
        nonce: aeonControls.regenerate_css
      };

      _this.attr('disabled', 'disabled');

      $.post(ajaxurl, data, function (response) {
        if (response && response.success) {
          _this.text(aeonControls.successCSS);

          setTimeout(function () {
            _this.prop('disabled', false);

            _this.text(aeonControls.initialCSS);
          }, 1000);
        } else {
          _this.text(aeonControls.failedCSS);

          setTimeout(function () {
            _this.prop('disabled', false);

            _this.text(aeonControls.initialCSS);
          }, 1000);
        }
      });
    });
    /**
     * Display performance fonts settings
     */

    api.control('aeon_settings[load_fonts_locally]', function (control) {
      var toggleControl = function toggleControl(value) {
        if (true === value) {
          api.control('aeon_settings[preload_local_fonts]').toggle(true);
          api.control('aeon_settings[flush_local_font_files]').toggle(true);
        } else {
          api.control('aeon_settings[preload_local_fonts]').toggle(false);
          api.control('aeon_settings[flush_local_font_files]').toggle(false);
        }
      };

      toggleControl(control.setting.get());
      control.setting.bind(toggleControl);
    });
    /**
     * Regenerate font
     */

    $('button.aeon-regenerate-fonts').on('click', function (e) {
      e.preventDefault();

      var _this = $(this),
          data = {
        action: 'aeon_regenerate_fonts_folder',
        nonce: aeonControls.regenerate_fonts
      };

      _this.attr('disabled', 'disabled');

      $.post(ajaxurl, data, function (response) {
        if (response && response.success) {
          _this.text(aeonControls.success);

          setTimeout(function () {
            _this.prop('disabled', false);

            _this.text(aeonControls.initial);
          }, 1000);
        } else {
          _this.text(aeonControls.failed);

          setTimeout(function () {
            _this.prop('disabled', false);

            _this.text(aeonControls.initial);
          }, 1000);
        }
      });
    });
  });
})(jQuery, wp.customize);

/***/ }),

/***/ "./src/customizer-controls/action-button/ActionButtonComponent.js":
/*!************************************************************************!*\
  !*** ./src/customizer-controls/action-button/ActionButtonComponent.js ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_1__);




var ActionButtonComponent = function ActionButtonComponent(props) {
  var htmlLabel = null;
  var htmlDescription = null;
  var htmlButton = null;

  if (props.control.params.label) {
    htmlLabel = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      className: "customize-control-title"
    }, props.control.params.label);
  }

  if (props.control.params.description) {
    htmlDescription = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      className: "description customize-control-description"
    }, props.control.params.description);
  }

  if (props.control.params.button) {
    htmlButton = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("button", {
      type: "button",
      className: "button button-secondary ".concat(props.control.params.custom_class)
    }, props.control.params.button);
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, htmlLabel, htmlDescription, htmlButton);
};

ActionButtonComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_1___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(ActionButtonComponent));

/***/ }),

/***/ "./src/customizer-controls/action-button/index.js":
/*!********************************************************!*\
  !*** ./src/customizer-controls/action-button/index.js ***!
  \********************************************************/
/*! exports provided: ActionButtonControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ActionButtonControl", function() { return ActionButtonControl; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _ActionButtonComponent__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ActionButtonComponent */ "./src/customizer-controls/action-button/ActionButtonComponent.js");


var ActionButtonControl = wp.customize.Control.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_ActionButtonComponent__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/customizer-controls/base/index.js":
/*!***********************************************!*\
  !*** ./src/customizer-controls/base/index.js ***!
  \***********************************************/
/*! exports provided: BaseControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "BaseControl", function() { return BaseControl; });
/**
 * Extending Customizer Control wp.customize.Control.
 */
var BaseControl = wp.customize.aeControl = wp.customize.Control.extend({
  /**
   * A Customizer Control.
   *
   * A control provides a UI element that allows a user to modify a Customizer Setting.
   * Overriding this method to provide lazy loading of controls by initializing all the controls.
   *
   * @see PHP class WP_Customize_Control.
   *
   * @file wp-admin/js/customize-nav-menus.js
   *
   * @constructs wp.customize.Control
   * @augments   wp.customize.Class
   *
   * @return {void}
   */
  initialize: function initialize(id, options) {
    var _args$params;

    var control = this,
        custom_class = '',
        args = options || {};
    args.params = args.params || {};

    if (!args.params.type) {
      args.params.type = 'aeon-basic';
    }

    if ((_args$params = args.params) !== null && _args$params !== void 0 && _args$params.custom_class) {
      custom_class = args.params.custom_class;
    }

    if (!args.params.content) {
      args.params.content = jQuery('<li></li>');
      args.params.content.attr('id', 'customize-control-' + id.replace(/]/g, '').replace(/\[/g, '-'));
      args.params.content.attr('class', custom_class + ' customize-control customize-control-' + args.params.type);
    }

    control.propertyElements = [];
    wp.customize.Control.prototype.initialize.call(control, id, args);
  },

  /**
   * Triggered when the control's markup has been injected into the DOM.
   * Injecting markup from component based controls.
   *
   * @returns {void}
   */
  ready: function ready() {
    var control = this;
    wp.customize.Control.prototype.ready.call(control);
    control.deferred.embedded.done();
  },

  /**
   * Override the embed() method to do nothing,
   * so that the control isn't embedded on load,
   * unless the containing section is already expanded.
   *
   * @returns {void}
   */
  embed: function embed() {
    var control = this,
        sectionId = control.section();

    if (!sectionId) {
      return;
    }

    wp.customize.section(sectionId, function (section) {
      if (section.expanded() || wp.customize.settings.autofocus.control === control.id) {
        control.actuallyEmbed();
      } else {
        section.expanded.bind(function (expanded) {
          if (expanded) {
            control.actuallyEmbed();
          }
        });
      }
    });
  },

  /**
   * This function is called in control.embed() & control.focus() so the control
   * will only get embedded when the Section is first expanded.
   *
   * @returns {void}
   */
  actuallyEmbed: function actuallyEmbed() {
    var control = this;

    if ('resolved' === control.deferred.embedded.state()) {
      return;
    }

    control.renderContent();
    control.deferred.embedded.resolve(); // This triggers control.ready().
  },

  /**
   * Expand the containing section and focus on the control.
   *
   * @param {Object}   [params] - Params object.
   * @param {Function} [params.completeCallback] - Optional callback function when focus has completed.
   */
  focus: function focus(params) {
    var control = this;
    control.actuallyEmbed();
    wp.customize.Control.prototype.focus.call(control, params);
  }
});

/***/ }),

/***/ "./src/customizer-controls/color-picker/AeonColorControl.js":
/*!*********************************************************************!*\
  !*** ./src/customizer-controls/color-picker/AeonColorControl.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ "./node_modules/@babel/runtime/helpers/extends.js");
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);




var AeonColorControl = {
  extend: function extend(FormComponent) {
    var controlExtend = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
    return wp.customize.aeControl.extend(Object.assign({}, {
      /**
       * After control has been first rendered, start re-rendering when setting changes.
       *
       * React is able to be used here instead of the wp.customize.Element abstraction.
       *
       * @return {void}
       */
      ready: function ready() {
        var control = this; // Re-render control when setting changes.

        control.setting.bind(function () {
          control.renderContent();
        });
      },

      /**
       * Render the control into the DOM.
       *
       * This is called from the Control#embed() method in the parent class.
       *
       * @return {void}
       */
      renderContent: function renderContent() {
        var control = this;
        var value = control.setting.get();
        var form = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["SlotFillProvider"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(FormComponent, _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default()({}, control.params, {
          value: value,
          setNotificationContainer: control.setNotificationContainer,
          customizerSetting: control.setting,
          control: control,
          choices: control.params.choices,
          default: control.params.defaultValue
        })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__["Popover"].Slot, null));
        var wrapper = control.getWrapper();
        Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["render"])(form, wrapper);
      }
    }, controlExtend));
  }
};
/* harmony default export */ __webpack_exports__["default"] = (AeonColorControl);

/***/ }),

/***/ "./src/customizer-controls/color-picker/AeonColorControlForm.js":
/*!*************************************************************************!*\
  !*** ./src/customizer-controls/color-picker/AeonColorControlForm.js ***!
  \*************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ "./node_modules/@babel/runtime/helpers/extends.js");
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _AeonColorPickerControl__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./AeonColorPickerControl */ "./src/customizer-controls/color-picker/AeonColorPickerControl.js");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);





var AeonColorControlForm = function AeonColorControlForm(props) {
  /**
   * Save the value when changing the colorpicker.
   *
   * @param {Object} color - The color object from react-color.
   * @return {void}
   */
  var handleChangeComplete = function handleChangeComplete(color) {
    wp.customize.control(props.customizerSetting.id).setting.set(color);
  };

  var showLabel = !props.choices.hideLabel || 'undefined' === typeof props.choices.hideLabel;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: "customize-control-notifications-container",
    ref: props.setNotificationContainer
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["BaseControl"], {
    className: "aeon-component-color-picker-wrapper",
    "data-toggleId": !!props.choices.toggleId ? props.choices.toggleId : null
  }, !!props.label && showLabel && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: "aeon-color-component-label"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
    className: "customize-control-title"
  }, props.label)), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_AeonColorPickerControl__WEBPACK_IMPORTED_MODULE_2__["default"], _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default()({}, props, {
    onChange: function onChange(value) {
      handleChangeComplete(value);
    }
  }))));
};

/* harmony default export */ __webpack_exports__["default"] = (AeonColorControlForm);

/***/ }),

/***/ "./src/customizer-controls/color-picker/AeonColorPickerControl.js":
/*!***************************************************************************!*\
  !*** ./src/customizer-controls/color-picker/AeonColorPickerControl.js ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./style.scss */ "./src/customizer-controls/color-picker/style.scss");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__);







var AeonColorPickerControl = function AeonColorPickerControl(props) {
  var _useState = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["useState"])(false),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState, 2),
      isOpen = _useState2[0],
      setOpen = _useState2[1];

  var _useState3 = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["useState"])(false),
      _useState4 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState3, 2),
      colorKey = _useState4[0],
      setColorKey = _useState4[1];

  var _useState5 = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["useState"])(true),
      _useState6 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState5, 2),
      isVarLock = _useState6[0],
      setVarLock = _useState6[1];

  var _useState7 = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["useState"])(false),
      _useState8 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState7, 2),
      isManualInput = _useState8[0],
      setManualInput = _useState8[1];

  var value = props.value,
      varNameValue = props.varNameValue,
      _onChange = props.onChange,
      onVarChange = props.onVarChange,
      choices = props.choices,
      _props$tooltipPositio = props.tooltipPosition,
      tooltipPosition = _props$tooltipPositio === void 0 ? 'top center' : _props$tooltipPositio,
      _props$tooltipText = props.tooltipText,
      tooltipText = _props$tooltipText === void 0 ? Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Choose Color', 'aeonwp') : _props$tooltipText,
      _props$hideLabel = props.hideLabel,
      hideLabel = _props$hideLabel === void 0 ? false : _props$hideLabel;
  Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["useEffect"])(function () {
    if (!value) {
      setVarLock(false);
    } else {
      setVarLock(true);
    }
  }, [value]);
  Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["useEffect"])(function () {
    if (!isManualInput) {
      return;
    }

    var timeout = setTimeout(function () {
      setColorKey(value);
      var colorInput = document.querySelector('.aeon-color-input-wrapper input');

      if (colorInput) {
        colorInput.focus();
      }
    }, 350);
    return function () {
      clearTimeout(timeout);
      setManualInput(false);
    };
  }, [value]);

  var toggleVisible = function toggleVisible() {
    setOpen(true);
  };

  var toggleClose = function toggleClose() {
    setOpen(false);
    setVarLock(true);
  };

  var isHex = function isHex(hex) {
    return /^([0-9A-F]{3}){1,2}$/i.test(hex);
  };

  var getPaletteValue = function getPaletteValue(colorValue) {
    if (String(colorValue).startsWith('var(')) {
      var variableName = colorValue.match(/\(([^)]+)\)/);

      if (variableName) {
        var variableValue = getComputedStyle(document.documentElement).getPropertyValue(variableName[1]);

        if (variableValue) {
          colorValue = variableValue;
        }
      }
    }

    return colorValue;
  };

  var tooltip = tooltipText;

  if (choices.tooltip) {
    tooltip = choices.tooltip;
  }

  var showReset = !!choices.showReset || 'undefined' === typeof choices.showReset;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: "aeon-color-picker-area"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: "components-circular-option-picker__option-wrapper"
  }, !isOpen && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Tooltip"], {
    text: tooltip,
    position: tooltipPosition
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
    "aria-expanded": isOpen,
    className: "components-color-palette__item components-circular-option-picker__option",
    onClick: toggleVisible,
    "aria-label": tooltip,
    style: {
      color: value ? value : 'transparent'
    }
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
    className: "components-color-palette__custom-color-gradient"
  }))), isOpen && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Tooltip"], {
    text: tooltip,
    position: tooltipPosition
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
    "aria-expanded": isOpen,
    className: "components-color-palette__item components-circular-option-picker__option",
    onClick: toggleClose,
    "aria-label": tooltip,
    style: {
      color: value ? value : 'transparent'
    }
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
    className: "components-color-palette__custom-color-gradient"
  })))), isOpen && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Popover"], {
    position: "bottom center",
    className: "aeon-component-color-picker",
    onClose: toggleClose,
    focusOnMount: "container"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["BaseControl"], {
    key: colorKey,
    label: !!props.label && !hideLabel ? props.label : '',
    id: "aeon-color-input-field",
    className: "aeon-color-input-main-label"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
    key: colorKey,
    color: getPaletteValue(value) || '',
    onChangeComplete: function onChangeComplete(color) {
      var colorString;

      if ('undefined' === typeof color.rgb || color.rgb.a === 1) {
        colorString = color.hex;
      } else {
        var _color$rgb = color.rgb,
            r = _color$rgb.r,
            g = _color$rgb.g,
            b = _color$rgb.b,
            a = _color$rgb.a;
        colorString = "rgba(".concat(r, ", ").concat(g, ", ").concat(b, ", ").concat(a, ")");
      }

      _onChange(colorString);
    },
    disableAlpha: !choices.alpha
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: "aeon-color-option-area"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: "aeon-color-input-wrapper"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
    id: "aeon-color-input-field",
    className: "aeon-color-input",
    type: 'text',
    value: value || '',
    onChange: function onChange(color) {
      if (!color.startsWith('#') && isHex(color)) {
        color = '#' + color;
      }

      _onChange(color);

      setManualInput(true);
    }
  }), !!showReset && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
    isSmall: true,
    isSecondary: true,
    className: "components-color-clear-color",
    onClick: function onClick() {
      var defaultValue = props.defaultValue ? props.defaultValue : '';
      wp.customize.control(props.customizerSetting.id).setting.set(defaultValue);
      setTimeout(function () {
        document.querySelector('.aeon-color-input-wrapper input').focus();
      }, 10);
    }
  }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Default', 'aeonwp')))))));
};

/* harmony default export */ __webpack_exports__["default"] = (AeonColorPickerControl);

/***/ }),

/***/ "./src/customizer-controls/color-picker/index.js":
/*!*******************************************************!*\
  !*** ./src/customizer-controls/color-picker/index.js ***!
  \*******************************************************/
/*! exports provided: ColorControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ColorControl", function() { return ColorControl; });
/* harmony import */ var _AeonColorControl__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./AeonColorControl */ "./src/customizer-controls/color-picker/AeonColorControl.js");
/* harmony import */ var _AeonColorControlForm__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./AeonColorControlForm */ "./src/customizer-controls/color-picker/AeonColorControlForm.js");


var ColorControl = _AeonColorControl__WEBPACK_IMPORTED_MODULE_0__["default"].extend(_AeonColorControlForm__WEBPACK_IMPORTED_MODULE_1__["default"], {
  getWrapper: function getWrapper() {
    var control = this;
    var wrapper = control.container[0];

    if (control.params.choices.wrapper) {
      var wrapperElement = document.getElementById(control.params.choices.wrapper + '--wrapper');

      if (wrapperElement) {
        // Move this control into the wrapper.
        wrapper = wrapperElement; // Hide the original <li> container.

        control.container[0].style.display = 'none';
      }
    }

    return wrapper;
  }
});

/***/ }),

/***/ "./src/customizer-controls/description/DescriptionComponent.js":
/*!*********************************************************************!*\
  !*** ./src/customizer-controls/description/DescriptionComponent.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_1__);




var DescriptionComponent = function DescriptionComponent(props) {
  var htmlLabel = null;
  var htmlDescription = null;

  if (props.control.params.label) {
    htmlLabel = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      className: "customize-control-title"
    }, props.control.params.label);
  }

  if (props.control.params.description) {
    htmlDescription = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      className: "description customize-control-description"
    }, props.control.params.description);
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, htmlLabel, htmlDescription);
};

DescriptionComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_1___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(DescriptionComponent));

/***/ }),

/***/ "./src/customizer-controls/description/index.js":
/*!******************************************************!*\
  !*** ./src/customizer-controls/description/index.js ***!
  \******************************************************/
/*! exports provided: DescriptionControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "DescriptionControl", function() { return DescriptionControl; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _DescriptionComponent__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./DescriptionComponent */ "./src/customizer-controls/description/DescriptionComponent.js");


var DescriptionControl = wp.customize.aeControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_DescriptionComponent__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/customizer-controls/editor/EditorComponent.js":
/*!***********************************************************!*\
  !*** ./src/customizer-controls/editor/EditorComponent.js ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var lodash_debounce__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! lodash/debounce */ "./node_modules/lodash/debounce.js");
/* harmony import */ var lodash_debounce__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(lodash_debounce__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_5__);




function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }





var EditorComponent = function EditorComponent(props) {
  var value = props.control.setting.get();

  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_5__["useState"])({
    value: value,
    editor: {},
    restoreTextMode: false
  }),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_useState, 2),
      state = _useState2[0],
      setState = _useState2[1];

  var defaultParams = {
    id: 'header_html',
    toolbar1: 'formatselect | styleselect | bold italic strikethrough | forecolor backcolor | link | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent | insert aeon_placeholders | fontsizeselect',
    toolbar2: ''
  };
  var controlParams = props.control.params.input_attrs ? _objectSpread(_objectSpread({}, defaultParams), props.control.params.input_attrs) : defaultParams;

  var updateValues = function updateValues(value) {
    setState(function (prevState) {
      return _objectSpread(_objectSpread({}, prevState), {}, {
        value: value
      });
    });
    props.control.setting.set(value);
  };

  Object(react__WEBPACK_IMPORTED_MODULE_5__["useEffect"])(function () {
    if (window.tinymce.get(controlParams.id)) {
      setState(function (prevState) {
        return _objectSpread(_objectSpread({}, prevState), {}, {
          restoreTextMode: window.tinymce.get(controlParams.id).isHidden()
        });
      });
      window.wp.oldEditor.remove(controlParams.id);
    }

    window.wp.oldEditor.initialize(controlParams.id, {
      tinymce: {
        wpautop: true,
        height: 200,
        menubar: false,
        toolbar1: controlParams.toolbar1,
        toolbar2: controlParams.toolbar2,
        fontsize_formats: "8pt 9pt 10pt 11pt 12pt 14pt 18pt 24pt 30pt 36pt 48pt 60pt 72pt 96pt"
      },
      quicktags: true,
      mediaButtons: true
    });
    var editor = window.tinymce.get(controlParams.id);

    if (editor.initialized) {
      onInit();
    } else {
      editor.on('init', onInit);
    } // Add Custom Shortcode support.


    editor.addButton('aeon_placeholders', {
      type: 'menubutton',
      text: 'Tags',
      icon: false,
      menu: [{
        text: 'Copyright',
        icon: false,
        value: '[copyright]',
        onclick: function onclick() {
          editor.insertContent(this.value());
        }
      }, {
        text: 'Current Year',
        icon: false,
        value: '[current_year]',
        onclick: function onclick() {
          editor.insertContent(this.value());
        }
      }, {
        text: 'Site Title',
        icon: false,
        value: '[site_title]',
        onclick: function onclick() {
          editor.insertContent(this.value());
        }
      }, {
        text: 'Theme',
        icon: false,
        value: '[theme]',
        onclick: function onclick() {
          editor.insertContent(this.value());
        }
      }]
    });
  }, []);

  var onInit = function onInit() {
    var editor = window.tinymce.get(controlParams.id);

    if (state.restoreTextMode) {
      window.switchEditors.go(controlParams.id, 'html');
    }

    editor.on('NodeChange', lodash_debounce__WEBPACK_IMPORTED_MODULE_4___default()(triggerChangeIfDirty, 250));
    setState(function (prevState) {
      return _objectSpread(_objectSpread({}, prevState), {}, {
        editor: editor
      });
    });
  };

  var triggerChangeIfDirty = function triggerChangeIfDirty() {
    updateValues(window.wp.oldEditor.getContent(controlParams.id));
  };

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
    className: "aeon-control-field aeon-html-editor"
  }, props.control.params.label && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
    className: "customize-control-title"
  }, props.control.params.label), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("textarea", {
    className: "aeon-control-tinymce-editor wp-editor-area",
    id: controlParams.id,
    value: state.value,
    onChange: function onChange(_ref) {
      var value = _ref.target.value;
      updateValues(value);
    }
  }), props.control.params.description && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
    className: "customize-control-description"
  }, props.control.params.description));
};

EditorComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_3___default.a.object.isRequired,
  customizer: prop_types__WEBPACK_IMPORTED_MODULE_3___default.a.func.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(EditorComponent));

/***/ }),

/***/ "./src/customizer-controls/editor/index.js":
/*!*************************************************!*\
  !*** ./src/customizer-controls/editor/index.js ***!
  \*************************************************/
/*! exports provided: EditorControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "EditorControl", function() { return EditorControl; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _EditorComponent__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./EditorComponent */ "./src/customizer-controls/editor/EditorComponent.js");


var EditorControl = wp.customize.aeControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_EditorComponent__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control,
      customizer: wp.customize
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/customizer-controls/font-family/FontFamilyComponent.js":
/*!********************************************************************!*\
  !*** ./src/customizer-controls/font-family/FontFamilyComponent.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./style.scss */ "./src/customizer-controls/font-family/style.scss");
/* harmony import */ var _google_fonts__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./google-fonts */ "./src/customizer-controls/font-family/google-fonts.js");
/* harmony import */ var react_select__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react-select */ "./node_modules/react-select/dist/react-select.esm.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_8__);










var FontFamilyComponent = function FontFamilyComponent(props) {
  var _props$control$params = props.control.params,
      label = _props$control$params.label,
      link = _props$control$params.link;
  var labelHtml = null,
      inp_array = [];

  if (label) {
    labelHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
      className: "customize-control-title"
    }, label);
  }

  if (undefined !== link) {
    var splited_values = link.split(" ");
    splited_values.map(function (item, i) {
      var item_values = item.split("=");

      if (undefined !== item_values[1]) {
        inp_array[item_values[0]] = item_values[1].replace(/"/g, "");
      }
    });
  }

  var value = props.control.settings.fontFamily.get();
  var valueWeight = props.control.settings.fontWeight ? props.control.settings.fontWeight.get() : 'normal';
  var valueTransform = props.control.settings.fontTransform ? props.control.settings.fontTransform.get() : 'none';

  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_8__["useState"])(value),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState, 2),
      state = _useState2[0],
      setState = _useState2[1];

  var _useState3 = Object(react__WEBPACK_IMPORTED_MODULE_8__["useState"])(valueWeight),
      _useState4 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState3, 2),
      stateWeight = _useState4[0],
      setStateWeight = _useState4[1];

  var _useState5 = Object(react__WEBPACK_IMPORTED_MODULE_8__["useState"])(valueTransform),
      _useState6 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState5, 2),
      stateTransform = _useState6[0],
      setStateTransform = _useState6[1];

  Object(react__WEBPACK_IMPORTED_MODULE_8__["useEffect"])(function () {
    // If settings are changed externally.
    if (state !== value) {
      setState(value);
    }

    if (stateWeight !== valueWeight) {
      setStateWeight(valueWeight);
    }

    if (stateTransform !== valueTransform) {
      setStateTransform(valueTransform);
    }
  }, [props]);
  var fonts = [{
    value: '',
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_7__["__"])('Default', 'aeonwp')
  }, {
    value: 'Arial',
    label: 'Arial'
  }, {
    value: 'Helvetica',
    label: 'Helvetica'
  }, {
    value: 'Times New Roman',
    label: 'Times New Roman'
  }, {
    value: 'Georgia',
    label: 'Georgia'
  }];
  Object.keys(_google_fonts__WEBPACK_IMPORTED_MODULE_3__["default"]).forEach(function (k) {
    fonts.push({
      value: k,
      label: k,
      weight: _google_fonts__WEBPACK_IMPORTED_MODULE_3__["default"][k].weight
    });
  });
  var weightObj = [{
    value: '',
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_7__["__"])('Default', 'aeonwp')
  }, {
    value: 'normal',
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_7__["__"])('Normal', 'aeonwp')
  }, {
    value: 'bold',
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_7__["__"])('Bold', 'aeonwp')
  }, {
    value: '100',
    label: '100'
  }, {
    value: '200',
    label: '200'
  }, {
    value: '300',
    label: '300'
  }, {
    value: '400',
    label: '400'
  }, {
    value: '500',
    label: '500'
  }, {
    value: '600',
    label: '600'
  }, {
    value: '700',
    label: '700'
  }, {
    value: '800',
    label: '800'
  }, {
    value: '900',
    label: '900'
  }];

  if ('undefined' !== typeof _google_fonts__WEBPACK_IMPORTED_MODULE_3__["default"][state] && 'undefined' !== typeof _google_fonts__WEBPACK_IMPORTED_MODULE_3__["default"][state].weight) {
    weightObj = [{
      value: '',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_7__["__"])('Default', 'aeonwp')
    }];
    _google_fonts__WEBPACK_IMPORTED_MODULE_3__["default"][state].weight.filter(function (k) {
      var hasLetters = k.match(/[a-z]/g);
      var hasNumbers = k.match(/[0-9]/g);

      if (hasLetters && hasNumbers || 'italic' === k || 'regular' === k) {
        return false;
      }

      return true;
    }).forEach(function (k) {
      weightObj.push({
        value: k,
        label: k
      });
    });
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
    className: "customize-control-title"
  }, labelHtml), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(react_select__WEBPACK_IMPORTED_MODULE_4__["default"], {
    options: fonts,
    value: {
      value: state,
      label: state
    },
    isMulti: false,
    maxMenuHeight: 300,
    onChange: function onChange(value) {
      setState(value.label);
      props.control.settings.fontFamily.set(value.label);
    },
    className: "react-select-container",
    classNamePrefix: "react-select"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: "ae-typo-weight-transform"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_6__["SelectControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_7__["__"])('Weight', 'aeonwp'),
    value: stateWeight,
    options: weightObj,
    onChange: function onChange(weight) {
      setStateWeight(weight);
      props.control.settings.fontWeight.set(weight);
    },
    className: "components-base-control"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_6__["SelectControl"], {
    label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_7__["__"])('Text Transform', 'aeonwp'),
    value: stateTransform,
    options: [{
      value: 'none',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_7__["__"])('None', 'aeonwp')
    }, {
      value: 'capitalize',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_7__["__"])('Capitalize', 'aeonwp')
    }, {
      value: 'uppercase',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_7__["__"])('Uppercase', 'aeonwp')
    }, {
      value: 'lowercase',
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_7__["__"])('Lowercase', 'aeonwp')
    }],
    onChange: function onChange(transform) {
      setStateTransform(transform);
      props.control.settings.fontTransform.set(transform);
    },
    className: "components-base-control"
  })));
};

FontFamilyComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_5___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (FontFamilyComponent);

/***/ }),

/***/ "./src/customizer-controls/font-family/google-fonts.js":
/*!*************************************************************!*\
  !*** ./src/customizer-controls/font-family/google-fonts.js ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var fonts = {};
fonts['ABeeZee'] = {
  'v': ['regular', 'italic'],
  'weight': ['400'],
  'i': ['normal', 'italic']
};
fonts['Abel'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Abhaya Libre'] = {
  'v': ['regular', '500', '600', '700', '800'],
  'weight': ['400', '500', '600', '700', '800'],
  'i': ['normal']
};
fonts['Abril Fatface'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Aclonica'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Acme'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Actor'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Adamina'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Advent Pro'] = {
  'v': ['100', '200', '300', 'regular', '500', '600', '700'],
  'weight': ['100', '200', '300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Aguafina Script'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Akronim'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Aladin'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Aldrich'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Alef'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Alegreya'] = {
  'v': ['regular', 'italic', '500', '500italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['400', '500', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Alegreya SC'] = {
  'v': ['regular', 'italic', '500', '500italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['400', '500', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Alegreya Sans'] = {
  'v': ['100', '100italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['100', '300', '400', '500', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Alegreya Sans SC'] = {
  'v': ['100', '100italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['100', '300', '400', '500', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Alex Brush'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Alfa Slab One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Alice'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Alike'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Alike Angular'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Allan'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Allerta'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Allerta Stencil'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Allura'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Almendra'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Almendra Display'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Almendra SC'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Amarante'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Amaranth'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Amatic SC'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Amethysta'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Amiko'] = {
  'v': ['regular', '600', '700'],
  'weight': ['400', '600', '700'],
  'i': ['normal']
};
fonts['Amiri'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Amita'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Anaheim'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Andada'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Andika'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Angkor'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Annie Use Your Telescope'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Anonymous Pro'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Antic'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Antic Didone'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Antic Slab'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Anton'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Arapey'] = {
  'v': ['regular', 'italic'],
  'weight': ['400'],
  'i': ['normal', 'italic']
};
fonts['Arbutus'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Arbutus Slab'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Architects Daughter'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Archivo'] = {
  'v': ['regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
  'weight': ['400', '500', '600', '700'],
  'i': ['normal', 'italic']
};
fonts['Archivo Black'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Archivo Narrow'] = {
  'v': ['regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
  'weight': ['400', '500', '600', '700'],
  'i': ['normal', 'italic']
};
fonts['Aref Ruqaa'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Arima Madurai'] = {
  'v': ['100', '200', '300', 'regular', '500', '700', '800', '900'],
  'weight': ['100', '200', '300', '400', '500', '700', '800', '900'],
  'i': ['normal']
};
fonts['Arimo'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Arizonia'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Armata'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Arsenal'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Artifika'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Arvo'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Arya'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Asap'] = {
  'v': ['regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
  'weight': ['400', '500', '600', '700'],
  'i': ['normal', 'italic']
};
fonts['Asap Condensed'] = {
  'v': ['regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
  'weight': ['400', '500', '600', '700'],
  'i': ['normal', 'italic']
};
fonts['Asar'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Asset'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Assistant'] = {
  'v': ['200', '300', 'regular', '600', '700', '800'],
  'weight': ['200', '300', '400', '600', '700', '800'],
  'i': ['normal']
};
fonts['Astloch'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Asul'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Athiti'] = {
  'v': ['200', '300', 'regular', '500', '600', '700'],
  'weight': ['200', '300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Atma'] = {
  'v': ['300', 'regular', '500', '600', '700'],
  'weight': ['300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Atomic Age'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Aubrey'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Audiowide'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Autour One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Average'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Average Sans'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Averia Gruesa Libre'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Averia Libre'] = {
  'v': ['300', '300italic', 'regular', 'italic', '700', '700italic'],
  'weight': ['300', '400', '700'],
  'i': ['normal', 'italic']
};
fonts['Averia Sans Libre'] = {
  'v': ['300', '300italic', 'regular', 'italic', '700', '700italic'],
  'weight': ['300', '400', '700'],
  'i': ['normal', 'italic']
};
fonts['Averia Serif Libre'] = {
  'v': ['300', '300italic', 'regular', 'italic', '700', '700italic'],
  'weight': ['300', '400', '700'],
  'i': ['normal', 'italic']
};
fonts['Bad Script'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Bahiana'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Baloo'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Baloo Bhai'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Baloo Bhaijaan'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Baloo Bhaina'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Baloo Chettan'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Baloo Da'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Baloo Paaji'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Baloo Tamma'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Baloo Tammudu'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Baloo Thambi'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Balthazar'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Bangers'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Barlow'] = {
  'v': ['100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Barlow Condensed'] = {
  'v': ['100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Barlow Semi Condensed'] = {
  'v': ['100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Barrio'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Basic'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Battambang'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Baumans'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Bayon'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Belgrano'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Bellefair'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Belleza'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['BenchNine'] = {
  'v': ['300', 'regular', '700'],
  'weight': ['300', '400', '700'],
  'i': ['normal']
};
fonts['Bentham'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Berkshire Swash'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Bevan'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Bigelow Rules'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Bigshot One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Bilbo'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Bilbo Swash Caps'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['BioRhyme'] = {
  'v': ['200', '300', 'regular', '700', '800'],
  'weight': ['200', '300', '400', '700', '800'],
  'i': ['normal']
};
fonts['BioRhyme Expanded'] = {
  'v': ['200', '300', 'regular', '700', '800'],
  'weight': ['200', '300', '400', '700', '800'],
  'i': ['normal']
};
fonts['Biryani'] = {
  'v': ['200', '300', 'regular', '600', '700', '800', '900'],
  'weight': ['200', '300', '400', '600', '700', '800', '900'],
  'i': ['normal']
};
fonts['Bitter'] = {
  'v': ['regular', 'italic', '700'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Black And White Picture'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Black Han Sans'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Black Ops One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Bokor'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Bonbon'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Boogaloo'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Bowlby One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Bowlby One SC'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Brawler'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Bree Serif'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Bubblegum Sans'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Bubbler One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Buda'] = {
  'v': ['300'],
  'weight': ['300'],
  'i': []
};
fonts['Buenard'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Bungee'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Bungee Hairline'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Bungee Inline'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Bungee Outline'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Bungee Shade'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Butcherman'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Butterfly Kids'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Cabin'] = {
  'v': ['regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
  'weight': ['400', '500', '600', '700'],
  'i': ['normal', 'italic']
};
fonts['Cabin Condensed'] = {
  'v': ['regular', '500', '600', '700'],
  'weight': ['400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Cabin Sketch'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Caesar Dressing'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Cagliostro'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Cairo'] = {
  'v': ['200', '300', 'regular', '600', '700', '900'],
  'weight': ['200', '300', '400', '600', '700', '900'],
  'i': ['normal']
};
fonts['Calligraffitti'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Cambay'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Cambo'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Candal'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Cantarell'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Cantata One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Cantora One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Capriola'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Cardo'] = {
  'v': ['regular', 'italic', '700'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Carme'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Carrois Gothic'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Carrois Gothic SC'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Carter One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Catamaran'] = {
  'v': ['100', '200', '300', 'regular', '500', '600', '700', '800', '900'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal']
};
fonts['Caudex'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Caveat'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Caveat Brush'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Cedarville Cursive'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Ceviche One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Changa'] = {
  'v': ['200', '300', 'regular', '500', '600', '700', '800'],
  'weight': ['200', '300', '400', '500', '600', '700', '800'],
  'i': ['normal']
};
fonts['Changa One'] = {
  'v': ['regular', 'italic'],
  'weight': ['400'],
  'i': ['normal', 'italic']
};
fonts['Chango'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Chathura'] = {
  'v': ['100', '300', 'regular', '700', '800'],
  'weight': ['100', '300', '400', '700', '800'],
  'i': ['normal']
};
fonts['Chau Philomene One'] = {
  'v': ['regular', 'italic'],
  'weight': ['400'],
  'i': ['normal', 'italic']
};
fonts['Chela One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Chelsea Market'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Chenla'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Cherry Cream Soda'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Cherry Swash'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Chewy'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Chicle'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Chivo'] = {
  'v': ['300', '300italic', 'regular', 'italic', '700', '700italic', '900', '900italic'],
  'weight': ['300', '400', '700', '900'],
  'i': ['normal', 'italic']
};
fonts['Chonburi'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Cinzel'] = {
  'v': ['regular', '700', '900'],
  'weight': ['400', '700', '900'],
  'i': ['normal']
};
fonts['Cinzel Decorative'] = {
  'v': ['regular', '700', '900'],
  'weight': ['400', '700', '900'],
  'i': ['normal']
};
fonts['Clicker Script'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Coda'] = {
  'v': ['regular', '800'],
  'weight': ['400', '800'],
  'i': ['normal']
};
fonts['Coda Caption'] = {
  'v': ['800'],
  'weight': ['800'],
  'i': []
};
fonts['Codystar'] = {
  'v': ['300', 'regular'],
  'weight': ['300', '400'],
  'i': ['normal']
};
fonts['Coiny'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Combo'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Comfortaa'] = {
  'v': ['300', 'regular', '700'],
  'weight': ['300', '400', '700'],
  'i': ['normal']
};
fonts['Coming Soon'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Concert One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Condiment'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Content'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Contrail One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Convergence'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Cookie'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Copse'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Corben'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Cormorant'] = {
  'v': ['300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
  'weight': ['300', '400', '500', '600', '700'],
  'i': ['normal', 'italic']
};
fonts['Cormorant Garamond'] = {
  'v': ['300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
  'weight': ['300', '400', '500', '600', '700'],
  'i': ['normal', 'italic']
};
fonts['Cormorant Infant'] = {
  'v': ['300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
  'weight': ['300', '400', '500', '600', '700'],
  'i': ['normal', 'italic']
};
fonts['Cormorant SC'] = {
  'v': ['300', 'regular', '500', '600', '700'],
  'weight': ['300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Cormorant Unicase'] = {
  'v': ['300', 'regular', '500', '600', '700'],
  'weight': ['300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Cormorant Upright'] = {
  'v': ['300', 'regular', '500', '600', '700'],
  'weight': ['300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Courgette'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Cousine'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Coustard'] = {
  'v': ['regular', '900'],
  'weight': ['400', '900'],
  'i': ['normal']
};
fonts['Covered By Your Grace'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Crafty Girls'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Creepster'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Crete Round'] = {
  'v': ['regular', 'italic'],
  'weight': ['400'],
  'i': ['normal', 'italic']
};
fonts['Crimson Text'] = {
  'v': ['regular', 'italic', '600', '600italic', '700', '700italic'],
  'weight': ['400', '600', '700'],
  'i': ['normal', 'italic']
};
fonts['Croissant One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Crushed'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Cuprum'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Cute Font'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Cutive'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Cutive Mono'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Damion'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Dancing Script'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Dangrek'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['David Libre'] = {
  'v': ['regular', '500', '700'],
  'weight': ['400', '500', '700'],
  'i': ['normal']
};
fonts['Dawning of a New Day'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Days One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Dekko'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Delius'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Delius Swash Caps'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Delius Unicase'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Della Respira'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Denk One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Devonshire'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Dhurjati'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Didact Gothic'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Diplomata'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Diplomata SC'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Do Hyeon'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Dokdo'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Domine'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Donegal One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Doppio One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Dorsa'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Dosis'] = {
  'v': ['200', '300', 'regular', '500', '600', '700', '800'],
  'weight': ['200', '300', '400', '500', '600', '700', '800'],
  'i': ['normal']
};
fonts['Dr Sugiyama'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Duru Sans'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Dynalight'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['EB Garamond'] = {
  'v': ['regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic'],
  'weight': ['400', '500', '600', '700', '800'],
  'i': ['normal', 'italic']
};
fonts['Eagle Lake'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['East Sea Dokdo'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Eater'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Economica'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Eczar'] = {
  'v': ['regular', '500', '600', '700', '800'],
  'weight': ['400', '500', '600', '700', '800'],
  'i': ['normal']
};
fonts['El Messiri'] = {
  'v': ['regular', '500', '600', '700'],
  'weight': ['400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Electrolize'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Elsie'] = {
  'v': ['regular', '900'],
  'weight': ['400', '900'],
  'i': ['normal']
};
fonts['Elsie Swash Caps'] = {
  'v': ['regular', '900'],
  'weight': ['400', '900'],
  'i': ['normal']
};
fonts['Emblema One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Emilys Candy'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Encode Sans'] = {
  'v': ['100', '200', '300', 'regular', '500', '600', '700', '800', '900'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal']
};
fonts['Encode Sans Condensed'] = {
  'v': ['100', '200', '300', 'regular', '500', '600', '700', '800', '900'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal']
};
fonts['Encode Sans Expanded'] = {
  'v': ['100', '200', '300', 'regular', '500', '600', '700', '800', '900'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal']
};
fonts['Encode Sans Semi Condensed'] = {
  'v': ['100', '200', '300', 'regular', '500', '600', '700', '800', '900'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal']
};
fonts['Encode Sans Semi Expanded'] = {
  'v': ['100', '200', '300', 'regular', '500', '600', '700', '800', '900'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal']
};
fonts['Engagement'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Englebert'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Enriqueta'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Erica One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Esteban'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Euphoria Script'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Ewert'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Exo'] = {
  'v': ['100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Exo 2'] = {
  'v': ['100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Expletus Sans'] = {
  'v': ['regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
  'weight': ['400', '500', '600', '700'],
  'i': ['normal', 'italic']
};
fonts['Fanwood Text'] = {
  'v': ['regular', 'italic'],
  'weight': ['400'],
  'i': ['normal', 'italic']
};
fonts['Farsan'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Fascinate'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Fascinate Inline'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Faster One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Fasthand'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Fauna One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Faustina'] = {
  'v': ['regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
  'weight': ['400', '500', '600', '700'],
  'i': ['normal', 'italic']
};
fonts['Federant'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Federo'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Felipa'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Fenix'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Finger Paint'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Fira Mono'] = {
  'v': ['regular', '500', '700'],
  'weight': ['400', '500', '700'],
  'i': ['normal']
};
fonts['Fira Sans'] = {
  'v': ['100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Fira Sans Condensed'] = {
  'v': ['100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Fira Sans Extra Condensed'] = {
  'v': ['100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Fjalla One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Fjord One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Flamenco'] = {
  'v': ['300', 'regular'],
  'weight': ['300', '400'],
  'i': ['normal']
};
fonts['Flavors'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Fondamento'] = {
  'v': ['regular', 'italic'],
  'weight': ['400'],
  'i': ['normal', 'italic']
};
fonts['Fontdiner Swanky'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Forum'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Francois One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Frank Ruhl Libre'] = {
  'v': ['300', 'regular', '500', '700', '900'],
  'weight': ['300', '400', '500', '700', '900'],
  'i': ['normal']
};
fonts['Freckle Face'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Fredericka the Great'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Fredoka One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Freehand'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Fresca'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Frijole'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Fruktur'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Fugaz One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['GFS Didot'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['GFS Neohellenic'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Gabriela'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Gaegu'] = {
  'v': ['300', 'regular', '700'],
  'weight': ['300', '400', '700'],
  'i': ['normal']
};
fonts['Gafata'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Galada'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Galdeano'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Galindo'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Gamja Flower'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Gentium Basic'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Gentium Book Basic'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Geo'] = {
  'v': ['regular', 'italic'],
  'weight': ['400'],
  'i': ['normal', 'italic']
};
fonts['Geostar'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Geostar Fill'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Germania One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Gidugu'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Gilda Display'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Give You Glory'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Glass Antiqua'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Glegoo'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Gloria Hallelujah'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Goblin One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Gochi Hand'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Gorditas'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Gothic A1'] = {
  'v': ['100', '200', '300', 'regular', '500', '600', '700', '800', '900'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal']
};
fonts['Goudy Bookletter 1911'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Graduate'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Grand Hotel'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Gravitas One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Great Vibes'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Griffy'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Gruppo'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Gudea'] = {
  'v': ['regular', 'italic', '700'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Gugi'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Gurajada'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Habibi'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Halant'] = {
  'v': ['300', 'regular', '500', '600', '700'],
  'weight': ['300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Hammersmith One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Hanalei'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Hanalei Fill'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Handlee'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Hanuman'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Happy Monkey'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Harmattan'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Headland One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Heebo'] = {
  'v': ['100', '300', 'regular', '500', '700', '800', '900'],
  'weight': ['100', '300', '400', '500', '700', '800', '900'],
  'i': ['normal']
};
fonts['Henny Penny'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Herr Von Muellerhoff'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Hi Melody'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Hind'] = {
  'v': ['300', 'regular', '500', '600', '700'],
  'weight': ['300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Hind Guntur'] = {
  'v': ['300', 'regular', '500', '600', '700'],
  'weight': ['300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Hind Madurai'] = {
  'v': ['300', 'regular', '500', '600', '700'],
  'weight': ['300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Hind Siliguri'] = {
  'v': ['300', 'regular', '500', '600', '700'],
  'weight': ['300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Hind Vadodara'] = {
  'v': ['300', 'regular', '500', '600', '700'],
  'weight': ['300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Holtwood One SC'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Homemade Apple'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Homenaje'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['IBM Plex Mono'] = {
  'v': ['100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
  'weight': ['100', '200', '300', '400', '500', '600', '700'],
  'i': ['normal', 'italic']
};
fonts['IBM Plex Sans'] = {
  'v': ['100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
  'weight': ['100', '200', '300', '400', '500', '600', '700'],
  'i': ['normal', 'italic']
};
fonts['IBM Plex Sans Condensed'] = {
  'v': ['100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
  'weight': ['100', '200', '300', '400', '500', '600', '700'],
  'i': ['normal', 'italic']
};
fonts['IBM Plex Serif'] = {
  'v': ['100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
  'weight': ['100', '200', '300', '400', '500', '600', '700'],
  'i': ['normal', 'italic']
};
fonts['IM Fell DW Pica'] = {
  'v': ['regular', 'italic'],
  'weight': ['400'],
  'i': ['normal', 'italic']
};
fonts['IM Fell DW Pica SC'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['IM Fell Double Pica'] = {
  'v': ['regular', 'italic'],
  'weight': ['400'],
  'i': ['normal', 'italic']
};
fonts['IM Fell Double Pica SC'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['IM Fell English'] = {
  'v': ['regular', 'italic'],
  'weight': ['400'],
  'i': ['normal', 'italic']
};
fonts['IM Fell English SC'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['IM Fell French Canon'] = {
  'v': ['regular', 'italic'],
  'weight': ['400'],
  'i': ['normal', 'italic']
};
fonts['IM Fell French Canon SC'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['IM Fell Great Primer'] = {
  'v': ['regular', 'italic'],
  'weight': ['400'],
  'i': ['normal', 'italic']
};
fonts['IM Fell Great Primer SC'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Iceberg'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Iceland'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Imprima'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Inconsolata'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Inder'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Indie Flower'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Inika'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Inknut Antiqua'] = {
  'v': ['300', 'regular', '500', '600', '700', '800', '900'],
  'weight': ['300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal']
};
fonts['Irish Grover'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Istok Web'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Italiana'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Italianno'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Itim'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Jacques Francois'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Jacques Francois Shadow'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Jaldi'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Jim Nightshade'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Jockey One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Jolly Lodger'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Jomhuria'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Josefin Sans'] = {
  'v': ['100', '100italic', '300', '300italic', 'regular', 'italic', '600', '600italic', '700', '700italic'],
  'weight': ['100', '300', '400', '600', '700'],
  'i': ['normal', 'italic']
};
fonts['Josefin Slab'] = {
  'v': ['100', '100italic', '300', '300italic', 'regular', 'italic', '600', '600italic', '700', '700italic'],
  'weight': ['100', '300', '400', '600', '700'],
  'i': ['normal', 'italic']
};
fonts['Joti One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Jua'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Judson'] = {
  'v': ['regular', 'italic', '700'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Julee'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Julius Sans One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Junge'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Jura'] = {
  'v': ['300', 'regular', '500', '600', '700'],
  'weight': ['300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Just Another Hand'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Just Me Again Down Here'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Kadwa'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Kalam'] = {
  'v': ['300', 'regular', '700'],
  'weight': ['300', '400', '700'],
  'i': ['normal']
};
fonts['Kameron'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Kanit'] = {
  'v': ['100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Kantumruy'] = {
  'v': ['300', 'regular', '700'],
  'weight': ['300', '400', '700'],
  'i': ['normal']
};
fonts['Karla'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Karma'] = {
  'v': ['300', 'regular', '500', '600', '700'],
  'weight': ['300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Katibeh'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Kaushan Script'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Kavivanar'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Kavoon'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Kdam Thmor'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Keania One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Kelly Slab'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Kenia'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Khand'] = {
  'v': ['300', 'regular', '500', '600', '700'],
  'weight': ['300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Khmer'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Khula'] = {
  'v': ['300', 'regular', '600', '700', '800'],
  'weight': ['300', '400', '600', '700', '800'],
  'i': ['normal']
};
fonts['Kirang Haerang'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Kite One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Knewave'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Kosugi'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Kosugi Maru'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Kotta One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Koulen'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Kranky'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Kreon'] = {
  'v': ['300', 'regular', '700'],
  'weight': ['300', '400', '700'],
  'i': ['normal']
};
fonts['Kristi'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Krona One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Kumar One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Kumar One Outline'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Kurale'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['La Belle Aurore'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Laila'] = {
  'v': ['300', 'regular', '500', '600', '700'],
  'weight': ['300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Lakki Reddy'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Lalezar'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Lancelot'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Lateef'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Lato'] = {
  'v': ['100', '100italic', '300', '300italic', 'regular', 'italic', '700', '700italic', '900', '900italic'],
  'weight': ['100', '300', '400', '700', '900'],
  'i': ['normal', 'italic']
};
fonts['League Script'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Leckerli One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Ledger'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Lekton'] = {
  'v': ['regular', 'italic', '700'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Lemon'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Lemonada'] = {
  'v': ['300', 'regular', '600', '700'],
  'weight': ['300', '400', '600', '700'],
  'i': ['normal']
};
fonts['Libre Barcode 128'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Libre Barcode 128 Text'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Libre Barcode 39'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Libre Barcode 39 Extended'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Libre Barcode 39 Extended Text'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Libre Barcode 39 Text'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Libre Baskerville'] = {
  'v': ['regular', 'italic', '700'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Libre Franklin'] = {
  'v': ['100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Life Savers'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Lilita One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Lily Script One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Limelight'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Linden Hill'] = {
  'v': ['regular', 'italic'],
  'weight': ['400'],
  'i': ['normal', 'italic']
};
fonts['Lobster'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Lobster Two'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Londrina Outline'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Londrina Shadow'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Londrina Sketch'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Londrina Solid'] = {
  'v': ['100', '300', 'regular', '900'],
  'weight': ['100', '300', '400', '900'],
  'i': ['normal']
};
fonts['Lora'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Love Ya Like A Sister'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Loved by the King'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Lovers Quarrel'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Luckiest Guy'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Lusitana'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Lustria'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['M PLUS 1p'] = {
  'v': ['100', '300', 'regular', '500', '700', '800', '900'],
  'weight': ['100', '300', '400', '500', '700', '800', '900'],
  'i': ['normal']
};
fonts['M PLUS Rounded 1c'] = {
  'v': ['100', '300', 'regular', '500', '700', '800', '900'],
  'weight': ['100', '300', '400', '500', '700', '800', '900'],
  'i': ['normal']
};
fonts['Macondo'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Macondo Swash Caps'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Mada'] = {
  'v': ['200', '300', 'regular', '500', '600', '700', '900'],
  'weight': ['200', '300', '400', '500', '600', '700', '900'],
  'i': ['normal']
};
fonts['Magra'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Maiden Orange'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Maitree'] = {
  'v': ['200', '300', 'regular', '500', '600', '700'],
  'weight': ['200', '300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Mako'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Mallanna'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Mandali'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Manuale'] = {
  'v': ['regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
  'weight': ['400', '500', '600', '700'],
  'i': ['normal', 'italic']
};
fonts['Marcellus'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Marcellus SC'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Marck Script'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Margarine'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Markazi Text'] = {
  'v': ['regular', '500', '600', '700'],
  'weight': ['400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Marko One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Marmelad'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Martel'] = {
  'v': ['200', '300', 'regular', '600', '700', '800', '900'],
  'weight': ['200', '300', '400', '600', '700', '800', '900'],
  'i': ['normal']
};
fonts['Martel Sans'] = {
  'v': ['200', '300', 'regular', '600', '700', '800', '900'],
  'weight': ['200', '300', '400', '600', '700', '800', '900'],
  'i': ['normal']
};
fonts['Marvel'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Mate'] = {
  'v': ['regular', 'italic'],
  'weight': ['400'],
  'i': ['normal', 'italic']
};
fonts['Mate SC'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Maven Pro'] = {
  'v': ['regular', '500', '700', '900'],
  'weight': ['400', '500', '700', '900'],
  'i': ['normal']
};
fonts['McLaren'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Meddon'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['MedievalSharp'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Medula One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Meera Inimai'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Megrim'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Meie Script'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Merienda'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Merienda One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Merriweather'] = {
  'v': ['300', '300italic', 'regular', 'italic', '700', '700italic', '900', '900italic'],
  'weight': ['300', '400', '700', '900'],
  'i': ['normal', 'italic']
};
fonts['Merriweather Sans'] = {
  'v': ['300', '300italic', 'regular', 'italic', '700', '700italic', '800', '800italic'],
  'weight': ['300', '400', '700', '800'],
  'i': ['normal', 'italic']
};
fonts['Metal'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Metal Mania'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Metamorphous'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Metrophobic'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Michroma'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Milonga'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Miltonian'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Miltonian Tattoo'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Mina'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Miniver'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Miriam Libre'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Mirza'] = {
  'v': ['regular', '500', '600', '700'],
  'weight': ['400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Miss Fajardose'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Mitr'] = {
  'v': ['200', '300', 'regular', '500', '600', '700'],
  'weight': ['200', '300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Modak'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Modern Antiqua'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Mogra'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Molengo'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Molle'] = {
  'v': ['italic'],
  'weight': [],
  'i': ['italic']
};
fonts['Monda'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Monofett'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Monoton'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Monsieur La Doulaise'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Montaga'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Montez'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Montserrat'] = {
  'v': ['100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Montserrat Alternates'] = {
  'v': ['100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Montserrat Subrayada'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Moul'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Moulpali'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Mountains of Christmas'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Mouse Memoirs'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Mr Bedfort'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Mr Dafoe'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Mr De Haviland'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Mrs Saint Delafield'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Mrs Sheppards'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Mukta'] = {
  'v': ['200', '300', 'regular', '500', '600', '700', '800'],
  'weight': ['200', '300', '400', '500', '600', '700', '800'],
  'i': ['normal']
};
fonts['Mukta Mahee'] = {
  'v': ['200', '300', 'regular', '500', '600', '700', '800'],
  'weight': ['200', '300', '400', '500', '600', '700', '800'],
  'i': ['normal']
};
fonts['Mukta Malar'] = {
  'v': ['200', '300', 'regular', '500', '600', '700', '800'],
  'weight': ['200', '300', '400', '500', '600', '700', '800'],
  'i': ['normal']
};
fonts['Mukta Vaani'] = {
  'v': ['200', '300', 'regular', '500', '600', '700', '800'],
  'weight': ['200', '300', '400', '500', '600', '700', '800'],
  'i': ['normal']
};
fonts['Muli'] = {
  'v': ['200', '200italic', '300', '300italic', 'regular', 'italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['200', '300', '400', '600', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Mystery Quest'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['NTR'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Nanum Brush Script'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Nanum Gothic'] = {
  'v': ['regular', '700', '800'],
  'weight': ['400', '700', '800'],
  'i': ['normal']
};
fonts['Nanum Gothic Coding'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Nanum Myeongjo'] = {
  'v': ['regular', '700', '800'],
  'weight': ['400', '700', '800'],
  'i': ['normal']
};
fonts['Nanum Pen Script'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Neucha'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Neuton'] = {
  'v': ['200', '300', 'regular', 'italic', '700', '800'],
  'weight': ['200', '300', '400', '700', '800'],
  'i': ['normal', 'italic']
};
fonts['New Rocker'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['News Cycle'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Niconne'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Nixie One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Nobile'] = {
  'v': ['regular', 'italic', '500', '500italic', '700', '700italic'],
  'weight': ['400', '500', '700'],
  'i': ['normal', 'italic']
};
fonts['Nokora'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Norican'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Nosifer'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Nothing You Could Do'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Noticia Text'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Noto Sans'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Noto Sans JP'] = {
  'v': ['100', '300', 'regular', '500', '700', '900'],
  'weight': ['100', '300', '400', '500', '700', '900'],
  'i': ['normal']
};
fonts['Noto Sans KR'] = {
  'v': ['100', '300', 'regular', '500', '700', '900'],
  'weight': ['100', '300', '400', '500', '700', '900'],
  'i': ['normal']
};
fonts['Noto Serif'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Noto Serif JP'] = {
  'v': ['200', '300', 'regular', '500', '600', '700', '900'],
  'weight': ['200', '300', '400', '500', '600', '700', '900'],
  'i': ['normal']
};
fonts['Noto Serif KR'] = {
  'v': ['200', '300', 'regular', '500', '600', '700', '900'],
  'weight': ['200', '300', '400', '500', '600', '700', '900'],
  'i': ['normal']
};
fonts['Nova Cut'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Nova Flat'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Nova Mono'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Nova Oval'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Nova Round'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Nova Script'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Nova Slim'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Nova Square'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Numans'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Nunito'] = {
  'v': ['200', '200italic', '300', '300italic', 'regular', 'italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['200', '300', '400', '600', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Nunito Sans'] = {
  'v': ['200', '200italic', '300', '300italic', 'regular', 'italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['200', '300', '400', '600', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Odor Mean Chey'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Offside'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Old Standard TT'] = {
  'v': ['regular', 'italic', '700'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Oldenburg'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Oleo Script'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Oleo Script Swash Caps'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Open Sans'] = {
  'v': ['300', '300italic', 'regular', 'italic', '600', '600italic', '700', '700italic', '800', '800italic'],
  'weight': ['300', '400', '600', '700', '800'],
  'i': ['normal', 'italic']
};
fonts['Open Sans Condensed'] = {
  'v': ['300', '300italic', '700'],
  'weight': ['300', '700'],
  'i': []
};
fonts['Oranienbaum'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Orbitron'] = {
  'v': ['regular', '500', '700', '900'],
  'weight': ['400', '500', '700', '900'],
  'i': ['normal']
};
fonts['Oregano'] = {
  'v': ['regular', 'italic'],
  'weight': ['400'],
  'i': ['normal', 'italic']
};
fonts['Orienta'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Original Surfer'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Oswald'] = {
  'v': ['200', '300', 'regular', '500', '600', '700'],
  'weight': ['200', '300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Over the Rainbow'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Overlock'] = {
  'v': ['regular', 'italic', '700', '700italic', '900', '900italic'],
  'weight': ['400', '700', '900'],
  'i': ['normal', 'italic']
};
fonts['Overlock SC'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Overpass'] = {
  'v': ['100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['100', '200', '300', '400', '600', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Overpass Mono'] = {
  'v': ['300', 'regular', '600', '700'],
  'weight': ['300', '400', '600', '700'],
  'i': ['normal']
};
fonts['Ovo'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Oxygen'] = {
  'v': ['300', 'regular', '700'],
  'weight': ['300', '400', '700'],
  'i': ['normal']
};
fonts['Oxygen Mono'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['PT Mono'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['PT Sans'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['PT Sans Caption'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['PT Sans Narrow'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['PT Serif'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['PT Serif Caption'] = {
  'v': ['regular', 'italic'],
  'weight': ['400'],
  'i': ['normal', 'italic']
};
fonts['Pacifico'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Padauk'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Palanquin'] = {
  'v': ['100', '200', '300', 'regular', '500', '600', '700'],
  'weight': ['100', '200', '300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Palanquin Dark'] = {
  'v': ['regular', '500', '600', '700'],
  'weight': ['400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Pangolin'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Paprika'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Parisienne'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Passero One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Passion One'] = {
  'v': ['regular', '700', '900'],
  'weight': ['400', '700', '900'],
  'i': ['normal']
};
fonts['Pathway Gothic One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Patrick Hand'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Patrick Hand SC'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Pattaya'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Patua One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Pavanam'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Paytone One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Peddana'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Peralta'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Permanent Marker'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Petit Formal Script'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Petrona'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Philosopher'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Piedra'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Pinyon Script'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Pirata One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Plaster'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Play'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Playball'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Playfair Display'] = {
  'v': ['regular', 'italic', '700', '700italic', '900', '900italic'],
  'weight': ['400', '700', '900'],
  'i': ['normal', 'italic']
};
fonts['Playfair Display SC'] = {
  'v': ['regular', 'italic', '700', '700italic', '900', '900italic'],
  'weight': ['400', '700', '900'],
  'i': ['normal', 'italic']
};
fonts['Podkova'] = {
  'v': ['regular', '500', '600', '700', '800'],
  'weight': ['400', '500', '600', '700', '800'],
  'i': ['normal']
};
fonts['Poiret One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Poller One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Poly'] = {
  'v': ['regular', 'italic'],
  'weight': ['400'],
  'i': ['normal', 'italic']
};
fonts['Pompiere'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Pontano Sans'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Poor Story'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Poppins'] = {
  'v': ['100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Port Lligat Sans'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Port Lligat Slab'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Pragati Narrow'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Prata'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Preahvihear'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Press Start 2P'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Pridi'] = {
  'v': ['200', '300', 'regular', '500', '600', '700'],
  'weight': ['200', '300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Princess Sofia'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Prociono'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Prompt'] = {
  'v': ['100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Prosto One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Proza Libre'] = {
  'v': ['regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic'],
  'weight': ['400', '500', '600', '700', '800'],
  'i': ['normal', 'italic']
};
fonts['Puritan'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Purple Purse'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Quando'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Quantico'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Quattrocento'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Quattrocento Sans'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Questrial'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Quicksand'] = {
  'v': ['300', 'regular', '500', '700'],
  'weight': ['300', '400', '500', '700'],
  'i': ['normal']
};
fonts['Quintessential'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Qwigley'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Racing Sans One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Radley'] = {
  'v': ['regular', 'italic'],
  'weight': ['400'],
  'i': ['normal', 'italic']
};
fonts['Rajdhani'] = {
  'v': ['300', 'regular', '500', '600', '700'],
  'weight': ['300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Rakkas'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Raleway'] = {
  'v': ['100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Raleway Dots'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Ramabhadra'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Ramaraja'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Rambla'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Rammetto One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Ranchers'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Rancho'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Ranga'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Rasa'] = {
  'v': ['300', 'regular', '500', '600', '700'],
  'weight': ['300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Rationale'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Ravi Prakash'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Redressed'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Reem Kufi'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Reenie Beanie'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Revalia'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Rhodium Libre'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Ribeye'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Ribeye Marrow'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Righteous'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Risque'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Roboto'] = {
  'v': ['100', '100italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '700', '700italic', '900', '900italic'],
  'weight': ['100', '300', '400', '500', '700', '900'],
  'i': ['normal', 'italic']
};
fonts['Roboto Condensed'] = {
  'v': ['300', '300italic', 'regular', 'italic', '700', '700italic'],
  'weight': ['300', '400', '700'],
  'i': ['normal', 'italic']
};
fonts['Roboto Mono'] = {
  'v': ['100', '100italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '700', '700italic'],
  'weight': ['100', '300', '400', '500', '700'],
  'i': ['normal', 'italic']
};
fonts['Roboto Slab'] = {
  'v': ['100', '300', 'regular', '700'],
  'weight': ['100', '300', '400', '700'],
  'i': ['normal']
};
fonts['Rochester'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Rock Salt'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Rokkitt'] = {
  'v': ['100', '200', '300', 'regular', '500', '600', '700', '800', '900'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal']
};
fonts['Romanesco'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Ropa Sans'] = {
  'v': ['regular', 'italic'],
  'weight': ['400'],
  'i': ['normal', 'italic']
};
fonts['Rosario'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Rosarivo'] = {
  'v': ['regular', 'italic'],
  'weight': ['400'],
  'i': ['normal', 'italic']
};
fonts['Rouge Script'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Rozha One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Rubik'] = {
  'v': ['300', '300italic', 'regular', 'italic', '500', '500italic', '700', '700italic', '900', '900italic'],
  'weight': ['300', '400', '500', '700', '900'],
  'i': ['normal', 'italic']
};
fonts['Rubik Mono One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Ruda'] = {
  'v': ['regular', '700', '900'],
  'weight': ['400', '700', '900'],
  'i': ['normal']
};
fonts['Rufina'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Ruge Boogie'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Ruluko'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Rum Raisin'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Ruslan Display'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Russo One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Ruthie'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Rye'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Sacramento'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Sahitya'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Sail'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Saira'] = {
  'v': ['100', '200', '300', 'regular', '500', '600', '700', '800', '900'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal']
};
fonts['Saira Condensed'] = {
  'v': ['100', '200', '300', 'regular', '500', '600', '700', '800', '900'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal']
};
fonts['Saira Extra Condensed'] = {
  'v': ['100', '200', '300', 'regular', '500', '600', '700', '800', '900'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal']
};
fonts['Saira Semi Condensed'] = {
  'v': ['100', '200', '300', 'regular', '500', '600', '700', '800', '900'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal']
};
fonts['Salsa'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Sanchez'] = {
  'v': ['regular', 'italic'],
  'weight': ['400'],
  'i': ['normal', 'italic']
};
fonts['Sancreek'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Sansita'] = {
  'v': ['regular', 'italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['400', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Sarala'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Sarina'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Sarpanch'] = {
  'v': ['regular', '500', '600', '700', '800', '900'],
  'weight': ['400', '500', '600', '700', '800', '900'],
  'i': ['normal']
};
fonts['Satisfy'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Sawarabi Gothic'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Sawarabi Mincho'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Scada'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Scheherazade'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Schoolbell'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Scope One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Seaweed Script'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Secular One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Sedgwick Ave'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Sedgwick Ave Display'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Sevillana'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Seymour One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Shadows Into Light'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Shadows Into Light Two'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Shanti'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Share'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Share Tech'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Share Tech Mono'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Shojumaru'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Short Stack'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Shrikhand'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Siemreap'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Sigmar One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Signika'] = {
  'v': ['300', 'regular', '600', '700'],
  'weight': ['300', '400', '600', '700'],
  'i': ['normal']
};
fonts['Signika Negative'] = {
  'v': ['300', 'regular', '600', '700'],
  'weight': ['300', '400', '600', '700'],
  'i': ['normal']
};
fonts['Simonetta'] = {
  'v': ['regular', 'italic', '900', '900italic'],
  'weight': ['400', '900'],
  'i': ['normal', 'italic']
};
fonts['Sintony'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Sirin Stencil'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Six Caps'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Skranji'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Slabo 13px'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Slabo 27px'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Slackey'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Smokum'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Smythe'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Sniglet'] = {
  'v': ['regular', '800'],
  'weight': ['400', '800'],
  'i': ['normal']
};
fonts['Snippet'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Snowburst One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Sofadi One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Sofia'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Song Myung'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Sonsie One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Sorts Mill Goudy'] = {
  'v': ['regular', 'italic'],
  'weight': ['400'],
  'i': ['normal', 'italic']
};
fonts['Source Code Pro'] = {
  'v': ['200', '300', 'regular', '500', '600', '700', '900'],
  'weight': ['200', '300', '400', '500', '600', '700', '900'],
  'i': ['normal']
};
fonts['Source Sans Pro'] = {
  'v': ['200', '200italic', '300', '300italic', 'regular', 'italic', '600', '600italic', '700', '700italic', '900', '900italic'],
  'weight': ['200', '300', '400', '600', '700', '900'],
  'i': ['normal', 'italic']
};
fonts['Source Serif Pro'] = {
  'v': ['regular', '600', '700'],
  'weight': ['400', '600', '700'],
  'i': ['normal']
};
fonts['Space Mono'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Special Elite'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Spectral'] = {
  'v': ['200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic'],
  'weight': ['200', '300', '400', '500', '600', '700', '800'],
  'i': ['normal', 'italic']
};
fonts['Spectral SC'] = {
  'v': ['200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic'],
  'weight': ['200', '300', '400', '500', '600', '700', '800'],
  'i': ['normal', 'italic']
};
fonts['Spicy Rice'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Spinnaker'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Spirax'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Squada One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Sree Krushnadevaraya'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Sriracha'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Stalemate'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Stalinist One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Stardos Stencil'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Stint Ultra Condensed'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Stint Ultra Expanded'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Stoke'] = {
  'v': ['300', 'regular'],
  'weight': ['300', '400'],
  'i': ['normal']
};
fonts['Strait'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Stylish'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Sue Ellen Francisco'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Suez One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Sumana'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Sunflower'] = {
  'v': ['300', '500', '700'],
  'weight': ['300', '500', '700'],
  'i': []
};
fonts['Sunshiney'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Supermercado One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Sura'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Suranna'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Suravaram'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Suwannaphum'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Swanky and Moo Moo'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Syncopate'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Tajawal'] = {
  'v': ['200', '300', 'regular', '500', '700', '800', '900'],
  'weight': ['200', '300', '400', '500', '700', '800', '900'],
  'i': ['normal']
};
fonts['Tangerine'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Taprom'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Tauri'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Taviraj'] = {
  'v': ['100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Teko'] = {
  'v': ['300', 'regular', '500', '600', '700'],
  'weight': ['300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Telex'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Tenali Ramakrishna'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Tenor Sans'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Text Me One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['The Girl Next Door'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Tienne'] = {
  'v': ['regular', '700', '900'],
  'weight': ['400', '700', '900'],
  'i': ['normal']
};
fonts['Tillana'] = {
  'v': ['regular', '500', '600', '700', '800'],
  'weight': ['400', '500', '600', '700', '800'],
  'i': ['normal']
};
fonts['Timmana'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Tinos'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Titan One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Titillium Web'] = {
  'v': ['200', '200italic', '300', '300italic', 'regular', 'italic', '600', '600italic', '700', '700italic', '900'],
  'weight': ['200', '300', '400', '600', '700', '900'],
  'i': ['normal', 'italic']
};
fonts['Trade Winds'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Trirong'] = {
  'v': ['100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal', 'italic']
};
fonts['Trocchi'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Trochut'] = {
  'v': ['regular', 'italic', '700'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Trykker'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Tulpen One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Ubuntu'] = {
  'v': ['300', '300italic', 'regular', 'italic', '500', '500italic', '700', '700italic'],
  'weight': ['300', '400', '500', '700'],
  'i': ['normal', 'italic']
};
fonts['Ubuntu Condensed'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Ubuntu Mono'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Ultra'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Uncial Antiqua'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Underdog'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Unica One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['UnifrakturCook'] = {
  'v': ['700'],
  'weight': ['700'],
  'i': []
};
fonts['UnifrakturMaguntia'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Unkempt'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
fonts['Unlock'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Unna'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['VT323'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Vampiro One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Varela'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Varela Round'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Vast Shadow'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Vesper Libre'] = {
  'v': ['regular', '500', '700', '900'],
  'weight': ['400', '500', '700', '900'],
  'i': ['normal']
};
fonts['Vibur'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Vidaloka'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Viga'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Voces'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Volkhov'] = {
  'v': ['regular', 'italic', '700', '700italic'],
  'weight': ['400', '700'],
  'i': ['normal', 'italic']
};
fonts['Vollkorn'] = {
  'v': ['regular', 'italic', '600', '600italic', '700', '700italic', '900', '900italic'],
  'weight': ['400', '600', '700', '900'],
  'i': ['normal', 'italic']
};
fonts['Vollkorn SC'] = {
  'v': ['regular', '600', '700', '900'],
  'weight': ['400', '600', '700', '900'],
  'i': ['normal']
};
fonts['Voltaire'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Waiting for the Sunrise'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Wallpoet'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Walter Turncoat'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Warnes'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Wellfleet'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Wendy One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Wire One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Work Sans'] = {
  'v': ['100', '200', '300', 'regular', '500', '600', '700', '800', '900'],
  'weight': ['100', '200', '300', '400', '500', '600', '700', '800', '900'],
  'i': ['normal']
};
fonts['Yanone Kaffeesatz'] = {
  'v': ['200', '300', 'regular', '700'],
  'weight': ['200', '300', '400', '700'],
  'i': ['normal']
};
fonts['Yantramanav'] = {
  'v': ['100', '300', 'regular', '500', '700', '900'],
  'weight': ['100', '300', '400', '500', '700', '900'],
  'i': ['normal']
};
fonts['Yatra One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Yellowtail'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Yeon Sung'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Yeseva One'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Yesteryear'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Yrsa'] = {
  'v': ['300', 'regular', '500', '600', '700'],
  'weight': ['300', '400', '500', '600', '700'],
  'i': ['normal']
};
fonts['Zeyada'] = {
  'v': ['regular'],
  'weight': ['400'],
  'i': ['normal']
};
fonts['Zilla Slab'] = {
  'v': ['300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic'],
  'weight': ['300', '400', '500', '600', '700'],
  'i': ['normal', 'italic']
};
fonts['Zilla Slab Highlight'] = {
  'v': ['regular', '700'],
  'weight': ['400', '700'],
  'i': ['normal']
};
/* harmony default export */ __webpack_exports__["default"] = (fonts);

/***/ }),

/***/ "./src/customizer-controls/font-family/index.js":
/*!******************************************************!*\
  !*** ./src/customizer-controls/font-family/index.js ***!
  \******************************************************/
/*! exports provided: FontFamilyControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "FontFamilyControl", function() { return FontFamilyControl; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _FontFamilyComponent__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./FontFamilyComponent */ "./src/customizer-controls/font-family/FontFamilyComponent.js");


var FontFamilyControl = wp.customize.aeControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_FontFamilyComponent__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/customizer-controls/heading/HeadingComponent.js":
/*!*************************************************************!*\
  !*** ./src/customizer-controls/heading/HeadingComponent.js ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_1__);




var HeadingComponent = function HeadingComponent(props) {
  var htmlLabel = null;

  if (props.control.params.label) {
    htmlLabel = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
      className: "aeon-control-title"
    }, props.control.params.label);
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "aeon-heading-wrapper"
  }, htmlLabel));
};

HeadingComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_1___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(HeadingComponent));

/***/ }),

/***/ "./src/customizer-controls/heading/index.js":
/*!**************************************************!*\
  !*** ./src/customizer-controls/heading/index.js ***!
  \**************************************************/
/*! exports provided: HeadingControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "HeadingControl", function() { return HeadingControl; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _HeadingComponent__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./HeadingComponent */ "./src/customizer-controls/heading/HeadingComponent.js");


var HeadingControl = wp.customize.aeControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_HeadingComponent__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/customizer-controls/radio-image/RadioImageComponent.js":
/*!********************************************************************!*\
  !*** ./src/customizer-controls/radio-image/RadioImageComponent.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ "./node_modules/@babel/runtime/helpers/extends.js");
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./style.scss */ "./src/customizer-controls/radio-image/style.scss");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_5__);








var RadioImageComponent = function RadioImageComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_5__["useState"])(props.control.setting.get()),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_useState, 2),
      props_value = _useState2[0],
      setPropsValue = _useState2[1];

  var onLayoutChange = function onLayoutChange(value) {
    setPropsValue(value);
    props.control.setting.set(value);
  };

  var _props$control$params = props.control.params,
      label = _props$control$params.label,
      id = _props$control$params.id,
      choices = _props$control$params.choices,
      choices_titles = _props$control$params.choices_titles;
  var htmlLabel = null,
      htmlRadio,
      inp_array = [];

  if (label) {
    htmlLabel = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
      className: "customize-control-title"
    }, label);
  }

  htmlRadio = Object.entries(choices).map(function (_ref) {
    var _ref2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_ref, 2),
        key = _ref2[0],
        value = _ref2[1];

    var checked = props_value === key ? true : false;
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["Fragment"], {
      key: key
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("input", _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default()({}, inp_array, {
      className: "image-select",
      type: "radio",
      value: key,
      id: id + key,
      checked: checked,
      onChange: function onChange() {
        return onLayoutChange(key);
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("label", {
      htmlFor: id + key,
      className: "aeon-radio-img-svg",
      title: choices_titles[key]
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
      dangerouslySetInnerHTML: {
        __html: choices[key]
      }
    }))));
  });
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("label", {
    className: "customizer-text"
  }, htmlLabel), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
    className: "aeon-radio-images"
  }, htmlRadio));
};

RadioImageComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_4___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(RadioImageComponent));

/***/ }),

/***/ "./src/customizer-controls/radio-image/index.js":
/*!******************************************************!*\
  !*** ./src/customizer-controls/radio-image/index.js ***!
  \******************************************************/
/*! exports provided: RadioImageControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "RadioImageControl", function() { return RadioImageControl; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _RadioImageComponent__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./RadioImageComponent */ "./src/customizer-controls/radio-image/RadioImageComponent.js");


var RadioImageControl = wp.customize.aeControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_RadioImageComponent__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/customizer-controls/resp-slider/RespSliderComponent.js":
/*!********************************************************************!*\
  !*** ./src/customizer-controls/resp-slider/RespSliderComponent.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_typeof__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/typeof */ "./node_modules/@babel/runtime/helpers/typeof.js");
/* harmony import */ var _babel_runtime_helpers_typeof__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_typeof__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./style.scss */ "./src/customizer-controls/resp-slider/style.scss");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_8__);





function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1___default()(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }







var RespSliderComponent = function RespSliderComponent(props) {
  var prop_value = props.control.settings.size ? props.control.settings.size.get() : '',
      suffix_value = props.control.settings.sizeUnit ? props.control.settings.sizeUnit.get() : props.control.params.defaultUnit;

  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_8__["useState"])(prop_value),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2___default()(_useState, 2),
      state = _useState2[0],
      setState = _useState2[1];

  var _useState3 = Object(react__WEBPACK_IMPORTED_MODULE_8__["useState"])(suffix_value),
      _useState4 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2___default()(_useState3, 2),
      stateSuffix = _useState4[0],
      setStateSuffix = _useState4[1];

  Object(react__WEBPACK_IMPORTED_MODULE_8__["useEffect"])(function () {
    // If settings are changed externally.
    if (state !== prop_value) {
      setState(prop_value);
    }

    if (stateSuffix !== suffix_value) {
      setStateSuffix(suffix_value);
    }
  }, [props]);

  var updateValues = function updateValues(device, newVal) {
    var updateState = _objectSpread({}, state);

    updateState[device] = newVal;
    props.control.settings.size.set(updateState);
    setState(updateState);
  };

  var _props$control$params = props.control.params,
      label = _props$control$params.label,
      suffix = _props$control$params.suffix;

  var resetButton = function resetButton(defaultVal, defaultValUnit) {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
      className: "aeon-slider-reset-wrap"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("button", {
      className: "aeon-reset",
      disabled: JSON.stringify(state) === JSON.stringify(defaultVal),
      onClick: function onClick(e) {
        e.preventDefault();
        props.control.settings.size.set(defaultVal);
        setState(defaultVal);

        if (suffix) {
          props.control.settings.sizeUnit.set(defaultValUnit);
          setStateSuffix(defaultValUnit);
        }
      }
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["Dashicon"], {
      icon: "image-rotate"
    })));
  };

  var renderInputHtml = function renderInputHtml(device) {
    var active = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
    var input_attrs = props.control.params.input_attrs;
    var defaultVal = props.control.params.default[device];
    var maxVal = 100,
        stepVal = 1;

    if (suffix) {
      if ('px' === stateSuffix) {
        maxVal = 200;
        stepVal = 1;
      } else if ('%' === stateSuffix) {
        maxVal = 100;
        stepVal = 1;
      } else if ('em' === stateSuffix || 'rem' === stateSuffix || 'vh' === stateSuffix || 'vw' === stateSuffix) {
        maxVal = 20;
        stepVal = .1;
      }
    }

    var defaults = {
      min: 0,
      max: maxVal,
      step: stepVal
    };

    var controlProps = _objectSpread(_objectSpread({}, defaults), input_attrs || {});

    var min = controlProps.min,
        max = controlProps.max,
        step = controlProps.step;
    var savedValue = state[device] || 0 === state[device] ? parseFloat(state[device]) : '';

    if (1 === step) {
      savedValue = state[device] || 0 === state[device] ? parseInt(state[device]) : '';
    }

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
      className: "input-field-wrapper ".concat(device, " ").concat(active)
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["RangeControl"], {
      resetFallbackValue: defaultVal,
      value: savedValue,
      min: min,
      max: max,
      step: step,
      onChange: function onChange(newVal) {
        updateValues(device, newVal);
      }
    }));
  };

  var labelHtml = null,
      responsiveHtml = null,
      suffixHtml = null,
      inputHtml = null,
      defaultVal = props.control.params.default,
      defaultValUnit = props.control.params.defaultUnit;

  if (label) {
    labelHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
      className: "aeon-title-info"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("span", {
      className: "customize-control-title slider-control-label"
    }, label));
    responsiveHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("ul", {
      key: 'aeon-slider-devices',
      className: "aeon-device-controls"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("li", {
      key: 'desktop',
      className: "desktop active"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("button", {
      type: "button",
      className: "preview-desktop",
      "data-device": "desktop"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("i", {
      className: "dashicons dashicons-desktop"
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("li", {
      key: 'tablet',
      className: "tablet"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("button", {
      type: "button",
      className: "preview-tablet",
      "data-device": "tablet"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("i", {
      className: "dashicons dashicons-tablet"
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("li", {
      key: 'mobile',
      className: "mobile"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("button", {
      type: "button",
      className: "preview-mobile",
      "data-device": "mobile"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("i", {
      className: "dashicons dashicons-smartphone"
    }))));
  }

  if (suffix) {
    var suffixOption = [];

    if (_babel_runtime_helpers_typeof__WEBPACK_IMPORTED_MODULE_0___default()(suffix) === 'object') {
      suffix.forEach(function (item) {
        suffixOption.push({
          value: item,
          label: item
        });
      });
    }

    suffixHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["SelectControl"], {
      key: stateSuffix,
      className: classnames__WEBPACK_IMPORTED_MODULE_6___default()('ae-unit-picker__select', state['desktop'] === 0 ? 'picker-inactive' : 'picker-active'),
      value: stateSuffix,
      onChange: function onChange(unit) {
        setStateSuffix(unit);
        props.control.settings.sizeUnit.set(unit);
      },
      options: suffixOption
    });
  }

  inputHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["Fragment"], null, renderInputHtml('desktop', 'active'), renderInputHtml('tablet'), renderInputHtml('mobile'));
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
    key: 'customizer-text',
    className: "aeon-title-area"
  }, labelHtml, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
    className: "aeon-slider-buttons"
  }, responsiveHtml, resetButton(defaultVal, defaultValUnit))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
    className: "aeon-slider-inputs-wrapper"
  }, inputHtml, suffixHtml));
};

RespSliderComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_5___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (RespSliderComponent);

/***/ }),

/***/ "./src/customizer-controls/resp-slider/index.js":
/*!******************************************************!*\
  !*** ./src/customizer-controls/resp-slider/index.js ***!
  \******************************************************/
/*! exports provided: ResponsiveSlider, RespSliderControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ResponsiveSlider", function() { return ResponsiveSlider; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "RespSliderControl", function() { return RespSliderControl; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _RespSliderComponent__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./RespSliderComponent */ "./src/customizer-controls/resp-slider/RespSliderComponent.js");


function ResponsiveSlider(control) {
  'use strict';

  var device = jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device');
  jQuery('.customize-control-aeon-resp-slider .input-field-wrapper').removeClass('active');
  jQuery('.customize-control-aeon-resp-slider .input-field-wrapper.' + device).addClass('active');
  jQuery('.customize-control-aeon-resp-slider .aeon-device-controls li').removeClass('active');
  jQuery('.customize-control-aeon-resp-slider .aeon-device-controls li.' + device).addClass('active');
  jQuery('.wp-full-overlay-footer .devices button').on('click', function () {
    var device = jQuery(this).attr('data-device');
    jQuery('.customize-control-aeon-resp-slider .input-field-wrapper, .customize-control .aeon-device-controls > li').removeClass('active');
    jQuery('.customize-control-aeon-resp-slider .input-field-wrapper.' + device + ', .customize-control .aeon-device-controls > li.' + device).addClass('active');
  });
  control.container.find('.aeon-device-controls button').on('click', function (event) {
    event.preventDefault();
    var device = jQuery(this).attr('data-device');
    jQuery('.wp-full-overlay-footer .devices button[data-device="' + device + '"]').trigger('click');
  });
}
var RespSliderControl = wp.customize.aeControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_RespSliderComponent__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control
    }), control.container[0]);
  },
  ready: function ready() {
    ResponsiveSlider(this);
  }
});

/***/ }),

/***/ "./src/customizer-controls/select/SelectComponent.js":
/*!***********************************************************!*\
  !*** ./src/customizer-controls/select/SelectComponent.js ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_3__);





var SelectComponent = function SelectComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_3__["useState"])(props.control.setting.get()),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState, 2),
      props_value = _useState2[0],
      setPropsValue = _useState2[1];

  var onSelectChange = function onSelectChange(value) {
    setPropsValue(value);
    props.control.setting.set(value);
  };

  var _props$control$params = props.control.params,
      label = _props$control$params.label,
      name = _props$control$params.name,
      choices = _props$control$params.choices;
  var htmlLabel = null;

  if (label) {
    htmlLabel = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
      className: "customize-control-title"
    }, label);
  }

  var optionsHtml = Object.entries(choices).map(function (key) {
    var html = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("option", {
      key: key[0],
      value: key[0]
    }, key[1]);
    return html;
  });
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null, htmlLabel, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: "customize-control-content"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("select", {
    className: "aeon-select-input",
    "data-name": name,
    "data-value": props_value,
    value: props_value,
    onChange: function onChange() {
      onSelectChange(event.target.value);
    }
  }, optionsHtml)));
};

SelectComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_2___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(SelectComponent));

/***/ }),

/***/ "./src/customizer-controls/select/index.js":
/*!*************************************************!*\
  !*** ./src/customizer-controls/select/index.js ***!
  \*************************************************/
/*! exports provided: SelectControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SelectControl", function() { return SelectControl; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _SelectComponent__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SelectComponent */ "./src/customizer-controls/select/SelectComponent.js");


var SelectControl = wp.customize.aeControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_SelectComponent__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/customizer-controls/selector/SelectorComponent.js":
/*!***************************************************************!*\
  !*** ./src/customizer-controls/selector/SelectorComponent.js ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./style.scss */ "./src/customizer-controls/selector/style.scss");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_6__);




function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }






var SelectorComponent = function SelectorComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_5__["useState"])(props.control.setting.get()),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_useState, 2),
      propsValue = _useState2[0],
      setPropsValue = _useState2[1];

  var onValueChange = function onValueChange(value) {
    var device = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';

    var updateState = _objectSpread({}, propsValue);

    if ('' !== device) {
      updateState[device] = value;
    } else {
      updateState = value;
    }

    props.control.setting.set(updateState);
    setPropsValue(updateState);
  };

  var renderInputHtml = function renderInputHtml(device) {
    var active = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
    var resp = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : true;
    var _props$control$params = props.control.params,
        choices = _props$control$params.choices,
        renderAs = _props$control$params.renderAs;

    if (!choices) {
      return;
    }

    if (false === resp) {
      var _optionsHtml = Object.entries(choices).map(function (_ref) {
        var _ref2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_ref, 2),
            value = _ref2[0],
            icon = _ref2[1];

        if ('text' !== renderAs) {
          var html = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
            className: "aeon-alignment-inner-wrap active",
            key: value
          }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_6__["Button"], {
            key: value,
            onClick: function onClick() {
              return onValueChange(value);
            },
            "aria-pressed": value === propsValue,
            isPrimary: value === propsValue
          }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
            className: "aeon-icon-set",
            dangerouslySetInnerHTML: {
              __html: icon
            }
          })));
        } else {
          var html = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
            className: "aeon-alignment-inner-wrap active",
            key: value
          }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_6__["Button"], {
            key: value,
            onClick: function onClick() {
              return onValueChange(value);
            },
            "aria-pressed": value === propsValue,
            isPrimary: value === propsValue,
            label: icon
          }, icon));
        }

        return html;
      });

      return _optionsHtml;
    }

    if ('text' !== renderAs) {
      var optionsHtml = Object.entries(choices).map(function (_ref3) {
        var _ref4 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_ref3, 2),
            value = _ref4[0],
            icon = _ref4[1];

        var html = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
          className: "aeon-alignment-inner-wrap aeon-alignment-responsive ".concat(device, " ").concat(active),
          key: value
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_6__["Button"], {
          key: value,
          onClick: function onClick() {
            return onValueChange(value, device);
          },
          "aria-pressed": value === propsValue[device],
          isPrimary: value === propsValue[device]
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
          className: "aeon-icon-set",
          dangerouslySetInnerHTML: {
            __html: icon
          }
        })));
        return html;
      });
    } else {
      var optionsHtml = Object.entries(choices).map(function (_ref5) {
        var _ref6 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_ref5, 2),
            value = _ref6[0],
            icon = _ref6[1];

        var html = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
          className: "aeon-alignment-inner-wrap aeon-alignment-responsive ".concat(device, " ").concat(active),
          key: value
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_6__["Button"], {
          key: value,
          onClick: function onClick() {
            return onValueChange(value, device);
          },
          "aria-pressed": value === propsValue[device],
          isPrimary: value === propsValue[device],
          label: icon
        }, icon));
        return html;
      });
    }

    return optionsHtml;
  };

  var _props$control$params2 = props.control.params,
      label = _props$control$params2.label,
      responsive = _props$control$params2.responsive;
  var labelHtml = null;
  var responsiveHtml = null;
  var inputHtml = null;
  var responsiveFlag = false === responsive ? false : true;

  if (label) {
    labelHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
      className: "aeon-title-info"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
      className: "customize-control-title"
    }, label));

    if (responsiveFlag) {
      responsiveHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("ul", {
        key: 'aeon-resp-devices',
        className: "aeon-device-controls"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("li", {
        key: 'desktop',
        className: "desktop active"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("button", {
        type: "button",
        className: "preview-desktop",
        "data-device": "desktop"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("i", {
        className: "dashicons dashicons-desktop"
      }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("li", {
        key: 'tablet',
        className: "tablet"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("button", {
        type: "button",
        className: "preview-tablet",
        "data-device": "tablet"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("i", {
        className: "dashicons dashicons-tablet"
      }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("li", {
        key: 'mobile',
        className: "mobile"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("button", {
        type: "button",
        className: "preview-mobile",
        "data-device": "mobile"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("i", {
        className: "dashicons dashicons-smartphone"
      }))));
    }
  }

  if (responsiveFlag) {
    inputHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
      className: "aeon-selector-responsive-wrap desktop"
    }, renderInputHtml('desktop', 'active')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
      className: "aeon-selector-responsive-wrap tablet"
    }, renderInputHtml('tablet')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
      className: "aeon-selector-responsive-wrap mobile"
    }, renderInputHtml('mobile')));
  } else {
    inputHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["Fragment"], null, renderInputHtml('desktop', 'active', false));
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
    key: 'customizer-text',
    className: "aeon-title-area"
  }, labelHtml, responsiveHtml), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
    className: "input-wrapper aeon-alignment-wrapper"
  }, inputHtml));
};

SelectorComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_4___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(SelectorComponent));

/***/ }),

/***/ "./src/customizer-controls/selector/index.js":
/*!***************************************************!*\
  !*** ./src/customizer-controls/selector/index.js ***!
  \***************************************************/
/*! exports provided: ResponsiveAlign, SelectorControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ResponsiveAlign", function() { return ResponsiveAlign; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SelectorControl", function() { return SelectorControl; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _SelectorComponent__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SelectorComponent */ "./src/customizer-controls/selector/SelectorComponent.js");


function ResponsiveAlign(control) {
  'use strict';

  var device = jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device');
  jQuery('.customize-control-aeon-selector .input-wrapper .aeon-alignment-responsive').removeClass('active');
  jQuery('.customize-control-aeon-selector .input-wrapper .aeon-alignment-responsive.' + device).addClass('active');
  jQuery('.customize-control-aeon-selector .input-wrapper .aeon-selector-responsive-wrap').removeClass('active');
  jQuery('.customize-control-aeon-selector .input-wrapper .aeon-selector-responsive-wrap.' + device).addClass('active');
  jQuery('.customize-control-aeon-selector .aeon-device-controls li').removeClass('active');
  jQuery('.customize-control-aeon-selector .aeon-device-controls li.' + device).addClass('active');
  jQuery('.wp-full-overlay-footer .devices button').on('click', function () {
    var device = jQuery(this).attr('data-device');
    jQuery('.customize-control-aeon-selector .input-wrapper .aeon-selector-responsive-wrap, .customize-control-aeon-selector .input-wrapper .aeon-alignment-responsive, .customize-control .aeon-device-controls > li').removeClass('active');
    jQuery('.customize-control-aeon-selector .input-wrapper .aeon-selector-responsive-wrap.' + device + ', .customize-control-aeon-selector .input-wrapper .aeon-alignment-responsive.' + device + ', .customize-control .aeon-device-controls > li.' + device).addClass('active');
  });
  control.container.find('.aeon-device-controls button').on('click', function (event) {
    event.preventDefault();
    var device = jQuery(this).attr('data-device');
    jQuery('.wp-full-overlay-footer .devices button[data-device="' + device + '"]').trigger('click');
  });
}
var SelectorControl = wp.customize.aeControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_SelectorComponent__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control
    }), control.container[0]);
  },
  ready: function ready() {
    ResponsiveAlign(this);
  }
});

/***/ }),

/***/ "./src/customizer-controls/slider/SliderComponent.js":
/*!***********************************************************!*\
  !*** ./src/customizer-controls/slider/SliderComponent.js ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_typeof__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/typeof */ "./node_modules/@babel/runtime/helpers/typeof.js");
/* harmony import */ var _babel_runtime_helpers_typeof__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_typeof__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./style.scss */ "./src/customizer-controls/slider/style.scss");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_8__);





function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1___default()(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }







var SliderComponent = function SliderComponent(props) {
  var prop_value = props.control.settings.size ? props.control.settings.size.get() : '',
      suffix_value = props.control.settings.sizeUnit ? props.control.settings.sizeUnit.get() : props.control.params.defaultUnit;

  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_8__["useState"])(prop_value),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2___default()(_useState, 2),
      state = _useState2[0],
      setState = _useState2[1];

  var _useState3 = Object(react__WEBPACK_IMPORTED_MODULE_8__["useState"])(suffix_value),
      _useState4 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2___default()(_useState3, 2),
      stateSuffix = _useState4[0],
      setStateSuffix = _useState4[1];

  Object(react__WEBPACK_IMPORTED_MODULE_8__["useEffect"])(function () {
    // If settings are changed externally.
    if (state !== prop_value) {
      setState(prop_value);
    }

    if (stateSuffix !== suffix_value) {
      setStateSuffix(suffix_value);
    }
  }, [props]);

  var resetButton = function resetButton(defaultVal, defaultValUnit) {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
      className: "aeon-slider-reset-wrap"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("button", {
      className: "aeon-reset",
      disabled: JSON.stringify(state) === JSON.stringify(defaultVal),
      onClick: function onClick(e) {
        e.preventDefault();
        props.control.settings.size.set(defaultVal);
        setState(defaultVal);

        if (suffix) {
          props.control.settings.sizeUnit.set(defaultValUnit);
          setStateSuffix(defaultValUnit);
        }
      }
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["Dashicon"], {
      icon: "image-rotate"
    })));
  };

  var renderInputHtml = function renderInputHtml() {
    var input_attrs = props.control.params.input_attrs;
    var defaultVal = props.control.params.default;
    var minVal = 0,
        maxVal = 100,
        stepVal = 1;
    var defaults = {
      min: minVal,
      max: maxVal,
      step: stepVal
    };

    var controlProps = _objectSpread(_objectSpread({}, defaults), input_attrs || {});

    var min = controlProps.min,
        max = controlProps.max,
        step = controlProps.step;

    if (suffix) {
      if ('px' === stateSuffix) {
        minVal = min || 0;
        maxVal = max || 500;
        stepVal = step || 1;
      } else if ('%' === stateSuffix) {
        minVal = 0;
        maxVal = 100;
        stepVal = 1;
      } else if ('-' === stateSuffix || 'em' === stateSuffix || 'rem' === stateSuffix || 'vh' === stateSuffix || 'vw' === stateSuffix) {
        minVal = 0;
        maxVal = 20;
        stepVal = .1;
      }
    } else {
      minVal = min || minVal;
      maxVal = max || maxVal;
      stepVal = step || stepVal;
    }

    var savedValue = state || 0 === state ? parseFloat(state) : '';

    if (1 === stepVal) {
      savedValue = state || 0 === state ? parseInt(state) : '';
    }

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["RangeControl"], {
      resetFallbackValue: defaultVal,
      value: savedValue,
      min: minVal,
      max: maxVal,
      step: stepVal,
      onChange: function onChange(value) {
        setState(value);
        props.control.settings.size.set(value);
      }
    });
  };

  var _props$control$params = props.control.params,
      label = _props$control$params.label,
      suffix = _props$control$params.suffix;
  var labelHtml = null,
      suffixHtml = null,
      defaultVal = props.control.params.default,
      defaultValUnit = props.control.params.defaultUnit;

  if (label) {
    labelHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
      className: "aeon-title-info"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("span", {
      className: "customize-control-title slider-control-label"
    }, label));
  }

  if (suffix) {
    var suffixOption = [];

    if (_babel_runtime_helpers_typeof__WEBPACK_IMPORTED_MODULE_0___default()(suffix) === 'object') {
      suffix.forEach(function (item) {
        suffixOption.push({
          value: item,
          label: item
        });
      });
    }

    suffixHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__["SelectControl"], {
      key: stateSuffix,
      className: classnames__WEBPACK_IMPORTED_MODULE_6___default()('ae-unit-picker__select', state === 0 ? 'picker-inactive' : 'picker-active'),
      value: stateSuffix,
      onChange: function onChange(unit) {
        setStateSuffix(unit);
        props.control.settings.sizeUnit.set(unit);
      },
      options: suffixOption
    });
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
    className: "aeon-slider-wrap"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
    className: "aeon-title-area"
  }, labelHtml, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
    className: "aeon-slider-buttons"
  }, resetButton(defaultVal, defaultValUnit))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
    className: "aeon-slider-input-wrapper"
  }, renderInputHtml(), suffixHtml));
};

SliderComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_5___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(SliderComponent));

/***/ }),

/***/ "./src/customizer-controls/slider/index.js":
/*!*************************************************!*\
  !*** ./src/customizer-controls/slider/index.js ***!
  \*************************************************/
/*! exports provided: SliderControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SliderControl", function() { return SliderControl; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _SliderComponent__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SliderComponent */ "./src/customizer-controls/slider/SliderComponent.js");


var SliderControl = wp.customize.aeControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_SliderComponent__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/customizer-controls/social/ItemComponent.js":
/*!*********************************************************!*\
  !*** ./src/customizer-controls/social/ItemComponent.js ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_3__);




function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }


var __ = wp.i18n.__;
var _wp$components = wp.components,
    Dashicon = _wp$components.Dashicon,
    TextControl = _wp$components.TextControl,
    Button = _wp$components.Button;

var ItemComponent = function ItemComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_3__["useState"])({
    open: false
  }),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_useState, 2),
      state = _useState2[0],
      setState = _useState2[1];

  var urlLabel = 'phone' === props.item.id ? __('Number', 'aeonwp') : __('URL', 'aeonwp');
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
    className: "aeon-sorter-item ".concat(props.item.enabled ? '' : 'is-disabled'),
    "data-id": props.item.id,
    key: props.item.id
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
    className: "aeon-sorter-item-panel-header",
    onClick: function onClick() {
      setState(function (prevState) {
        return _objectSpread(_objectSpread({}, prevState), {}, {
          open: state.open ? false : true
        });
      });
    }
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(Button, {
    className: "aeon-sorter-item-expand ".concat(props.item.enabled ? 'item-is-visible' : 'item-is-hidden'),
    onClick: function onClick(e) {
      e.stopPropagation();
      props.toggleEnabled(props.item.enabled ? false : true, props.index);
    }
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(Dashicon, {
    icon: "visibility"
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
    className: "aeon-sorter-title"
  }, undefined !== props.item.label && '' !== props.item.label ? props.item.label : __('Social Item', 'aeonwp')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(Button, {
    className: "aeon-sorter-item-remove",
    isDestructive: true,
    onClick: function onClick() {
      props.removeItem(props.index);
    }
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(Dashicon, {
    icon: "no-alt"
  }))), state.open && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
    className: "aeon-sorter-item-panel-content"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(TextControl, {
    label: "".concat(urlLabel),
    value: props.item.url ? props.item.url : '',
    onChange: function onChange(value) {
      props.onChangeURL(value, props.index);
    }
  })));
};

/* harmony default export */ __webpack_exports__["default"] = (ItemComponent);

/***/ }),

/***/ "./src/customizer-controls/social/SocialComponent.js":
/*!***********************************************************!*\
  !*** ./src/customizer-controls/social/SocialComponent.js ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./style.scss */ "./src/customizer-controls/social/style.scss");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var react_sortablejs__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! react-sortablejs */ "./node_modules/react-sortablejs/dist/index.js");
/* harmony import */ var react_sortablejs__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(react_sortablejs__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _ItemComponent__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./ItemComponent */ "./src/customizer-controls/social/ItemComponent.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_7__);




function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1___default()(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }






var __ = wp.i18n.__;
var _wp$components = wp.components,
    Button = _wp$components.Button,
    Dashicon = _wp$components.Dashicon,
    SelectControl = _wp$components.SelectControl;

var SocialComponent = function SocialComponent(props) {
  var value = props.control.setting.get();
  var baseDefault = {
    'items': [{
      'id': 'facebook',
      'enabled': true,
      'url': ''
    }, {
      'id': 'twitter',
      'enabled': true,
      'url': ''
    }]
  };
  var defaultValue = props.control.params.default ? _objectSpread(_objectSpread({}, baseDefault), props.control.params.default) : baseDefault;
  value = value ? _objectSpread(_objectSpread({}, defaultValue), value) : defaultValue;
  var defaultParams = {
    'group': 'social_item_group',
    'options': [{
      value: 'facebook',
      label: __('Facebook', 'aeonwp')
    }, {
      value: 'twitter',
      label: __('Twitter', 'aeonwp')
    }, {
      value: 'instagram',
      label: __('Instagram', 'aeonwp')
    }, {
      value: 'youtube',
      label: __('YouTube', 'aeonwp')
    }, {
      value: 'facebook_group',
      label: __('Facebook Group', 'aeonwp')
    }, {
      value: 'vimeo',
      label: __('Vimeo', 'aeonwp')
    }, {
      value: 'pinterest',
      label: __('Pinterest', 'aeonwp')
    }, {
      value: 'linkedin',
      label: __('Linkedin', 'aeonwp')
    }, {
      value: 'medium',
      label: __('Medium', 'aeonwp')
    }, {
      value: 'wordpress',
      label: __('WordPress', 'aeonwp')
    }, {
      value: 'reddit',
      label: __('Reddit', 'aeonwp')
    }, {
      value: 'patreon',
      label: __('Patreon', 'aeonwp')
    }, {
      value: 'github',
      label: __('GitHub', 'aeonwp')
    }, {
      value: 'dribbble',
      label: __('Dribbble', 'aeonwp')
    }, {
      value: 'behance',
      label: __('Behance', 'aeonwp')
    }, {
      value: 'vk',
      label: __('VK', 'aeonwp')
    }, {
      value: 'xing',
      label: __('Xing', 'aeonwp')
    }, {
      value: 'rss',
      label: __('RSS', 'aeonwp')
    }, {
      value: 'email',
      label: __('Email', 'aeonwp')
    }, {
      value: 'phone',
      label: __('Phone', 'aeonwp')
    }, {
      value: 'whatsapp',
      label: __('WhatsApp', 'aeonwp')
    }, {
      value: 'google_reviews',
      label: __('Google Reviews', 'aeonwp')
    }, {
      value: 'google_play',
      label: __('Google Play', 'aeonwp')
    }, {
      value: 'telegram',
      label: __('Telegram', 'aeonwp')
    }, {
      value: 'yelp',
      label: __('Yelp', 'aeonwp')
    }, {
      value: 'twitch',
      label: __('Twitch', 'aeonwp')
    }, {
      value: 'tiktok',
      label: __('TikTok', 'aeonwp')
    }, {
      value: 'trip_advisor',
      label: __('Tripadvisor', 'aeonwp')
    }, {
      value: 'discord',
      label: __('Discord', 'aeonwp')
    }, {
      value: 'flickr',
      label: __('Flickr', 'aeonwp')
    }, {
      value: 'slack',
      label: __('Slack', 'aeonwp')
    }, {
      value: 'weibo',
      label: __('Weibo', 'aeonwp')
    }, {
      value: 'kakaotalk',
      label: __('KakaoTalk', 'aeonwp')
    }, {
      value: 'kakaostory',
      label: __('KakaoStory', 'aeonwp')
    }].sort(function (a, b) {
      if (a.value < b.value) {
        return -1;
      }

      if (a.value > b.value) {
        return 1;
      }

      return 0;
    })
  };
  var controlParams = props.control.params.input_attrs ? _objectSpread(_objectSpread({}, defaultParams), props.control.params.input_attrs) : defaultParams;
  var availibleSocialOptions = [];
  controlParams.options.map(function (option) {
    if (!value.items.some(function (obj) {
      return obj.id === option.value;
    })) {
      availibleSocialOptions.push(option);
    }
  });

  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_7__["useState"])({
    value: value,
    isVisible: false,
    control: undefined !== availibleSocialOptions[0] && undefined !== availibleSocialOptions[0].value ? availibleSocialOptions[0].value : ''
  }),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState, 2),
      state = _useState2[0],
      setState = _useState2[1];

  Object(react__WEBPACK_IMPORTED_MODULE_7__["useEffect"])(function () {
    // If settings are changed externally.
    setState(function (prevState) {
      return _objectSpread(_objectSpread({}, prevState), {}, {
        value: props.control.setting.get()
      });
    });
  }, [props]);

  var updateValues = function updateValues(value) {
    props.control.setting.set(_objectSpread(_objectSpread(_objectSpread({}, props.control.setting.get()), value), {}, {
      flag: !props.control.setting.get().flag
    }));
  };

  var onDragStop = function onDragStop() {
    var dropzones = document.querySelectorAll('.aeon-builder-area');
    var i;

    for (i = 0; i < dropzones.length; ++i) {
      dropzones[i].classList.remove('aeon-dragging-dropzones');
    }
  };

  var saveArrayUpdate = function saveArrayUpdate(value, index) {
    var updateState = state.value;
    var items = updateState.items;
    var newItems = items.map(function (item, thisIndex) {
      if (index === thisIndex) {
        item = _objectSpread(_objectSpread({}, item), value);
      }

      return item;
    });
    updateState.items = newItems;
    setState(function (prevState) {
      return _objectSpread(_objectSpread({}, prevState), {}, {
        value: updateState
      });
    });
    updateValues(updateState);
  };

  var toggleEnableItem = function toggleEnableItem(value, itemIndex) {
    saveArrayUpdate({
      enabled: value
    }, itemIndex);
  };

  var _onChangeURL = function onChangeURL(value, itemIndex) {
    saveArrayUpdate({
      url: value
    }, itemIndex);
  };

  var _removeItem = function removeItem(itemIndex) {
    var updateState = state.value;
    var update = updateState.items;
    var updateItems = [];
    {
      update.length > 0 && update.map(function (old, index) {
        if (itemIndex !== index) {
          updateItems.push(old);
        }
      });
    }
    updateState.items = updateItems;
    setState(function (prevState) {
      return _objectSpread(_objectSpread({}, prevState), {}, {
        value: updateState
      });
    });
    updateValues(updateState);
  };

  var addItem = function addItem() {
    var itemControl = state.control;
    setState(function (prevState) {
      return _objectSpread(_objectSpread({}, prevState), {}, {
        isVisible: false
      });
    });

    if (itemControl) {
      var updateState = state.value;
      var update = updateState.items;
      var itemLabel = controlParams.options.filter(function (o) {
        return o.value === itemControl;
      });
      var newItem = {
        'id': itemControl,
        'enabled': true,
        'url': '',
        'label': itemLabel[0].label
      };
      update.push(newItem);
      updateState.items = update;
      var _availibleSocialOptions = [];
      controlParams.options.map(function (option) {
        if (!update.some(function (obj) {
          return obj.id === option.value;
        })) {
          _availibleSocialOptions.push(option);
        }
      });
      setState(function (prevState) {
        return _objectSpread(_objectSpread({}, prevState), {}, {
          control: undefined !== _availibleSocialOptions[0] && undefined !== _availibleSocialOptions[0].value ? _availibleSocialOptions[0].value : ''
        });
      });
      setState(function (prevState) {
        return _objectSpread(_objectSpread({}, prevState), {}, {
          value: updateState
        });
      });
      updateValues(updateState);
    }
  };

  var onDragEnd = function onDragEnd(items) {
    var updateState = state.value;
    var update = updateState.items;
    var updateItems = [];
    {
      items.length > 0 && items.map(function (item) {
        update.filter(function (obj) {
          if (obj.id === item.id) {
            updateItems.push(obj);
          }
        });
      });
    }
    ;

    if (!arraysEqual(update, updateItems)) {
      update.items = updateItems;
      updateState.items = updateItems;
      setState(function (prevState) {
        return _objectSpread(_objectSpread({}, prevState), {}, {
          value: updateState
        });
      });
      updateValues(updateState);
    }
  };

  var arraysEqual = function arraysEqual(a, b) {
    if (a === b) return true;
    if (a == null || b == null) return false;
    if (a.length != b.length) return false;

    for (var i = 0; i < a.length; ++i) {
      if (a[i] !== b[i]) return false;
    }

    return true;
  };

  var currentList = typeof state.value != "undefined" && state.value.items != null && state.value.items.length != null && state.value.items.length > 0 ? state.value.items : [];
  var theItems = [];
  {
    currentList.length > 0 && currentList.map(function (item) {
      theItems.push({
        id: item.id
      });
    });
  }
  ;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
    className: "aeon-control-field aeon-sorter-items"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
    className: "aeon-sorter-row"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(react_sortablejs__WEBPACK_IMPORTED_MODULE_5__["ReactSortable"], {
    animation: 100,
    onStart: function onStart() {
      return onDragStop();
    },
    onEnd: function onEnd() {
      return onDragStop();
    },
    group: controlParams.group,
    className: "aeon-sorter-drop aeon-sorter-sortable-panel aeon-sorter-drop-".concat(controlParams.group),
    handle: '.aeon-sorter-item-panel-header',
    list: theItems,
    setList: function setList(newState) {
      return onDragEnd(newState);
    }
  }, currentList.length > 0 && currentList.map(function (item, index) {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_ItemComponent__WEBPACK_IMPORTED_MODULE_6__["default"], {
      removeItem: function removeItem(remove) {
        return _removeItem(remove);
      },
      toggleEnabled: function toggleEnabled(enable, itemIndex) {
        return toggleEnableItem(enable, itemIndex);
      },
      onChangeURL: function onChangeURL(url, itemIndex) {
        return _onChangeURL(url, itemIndex);
      },
      key: item.id,
      index: index,
      item: item,
      controlParams: controlParams
    });
  }))), undefined !== availibleSocialOptions[0] && undefined !== availibleSocialOptions[0].value && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
    className: "aeon-social-add-area"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(SelectControl, {
    value: state.control,
    options: availibleSocialOptions,
    onChange: function onChange(value) {
      setState(function (prevState) {
        return _objectSpread(_objectSpread({}, prevState), {}, {
          control: value
        });
      });
    }
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(Button, {
    className: "aeon-sorter-add-item",
    isPrimary: true,
    onClick: function onClick() {
      addItem();
    }
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(Dashicon, {
    icon: "plus-alt2"
  }))));
};

SocialComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_4___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (SocialComponent);

/***/ }),

/***/ "./src/customizer-controls/social/index.js":
/*!*************************************************!*\
  !*** ./src/customizer-controls/social/index.js ***!
  \*************************************************/
/*! exports provided: SocialControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SocialControl", function() { return SocialControl; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _SocialComponent__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SocialComponent */ "./src/customizer-controls/social/SocialComponent.js");


var SocialControl = wp.customize.aeControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_SocialComponent__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/customizer-controls/sortable/SortableComponent.js":
/*!***************************************************************!*\
  !*** ./src/customizer-controls/sortable/SortableComponent.js ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ "./node_modules/@babel/runtime/helpers/extends.js");
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./style.scss */ "./src/customizer-controls/sortable/style.scss");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_3__);





var SortableComponent = function SortableComponent(props) {
  var labelHtml = null;
  var _props$control$params = props.control.params,
      label = _props$control$params.label,
      value = _props$control$params.value,
      choices = _props$control$params.choices,
      inputAttrs = _props$control$params.inputAttrs;

  if (label) {
    labelHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
      className: "customize-control-title"
    }, label);
  }

  var visibleMetaHtml = Object.values(value).map(function (choiceID) {
    var html = '';

    if (choices[choiceID]) {
      html = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default()({}, inputAttrs, {
        key: choiceID,
        className: "aeon-sortable-item",
        "data-value": choiceID
      }), choices[choiceID], Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("i", {
        className: "dashicons dashicons-visibility visibility"
      }));
    }

    return html;
  });
  var invisibleMetaHtml = Object.keys(choices).map(function (choiceID) {
    var html = '';

    if (Array.isArray(value) && -1 === value.indexOf(choiceID)) {
      html = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default()({}, inputAttrs, {
        key: choiceID,
        className: "aeon-sortable-item invisible",
        "data-value": choiceID
      }), choices[choiceID], Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("i", {
        className: "dashicons dashicons-visibility visibility"
      }));
    }

    return html;
  });
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
    className: "aeon-sortable"
  }, labelHtml, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: "sortable"
  }, visibleMetaHtml, invisibleMetaHtml));
};

SortableComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_3___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(SortableComponent));

/***/ }),

/***/ "./src/customizer-controls/sortable/index.js":
/*!***************************************************!*\
  !*** ./src/customizer-controls/sortable/index.js ***!
  \***************************************************/
/*! exports provided: SortableControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SortableControl", function() { return SortableControl; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _SortableComponent__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SortableComponent */ "./src/customizer-controls/sortable/SortableComponent.js");


var SortableControl = wp.customize.aeControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_SortableComponent__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control
    }), control.container[0]);
  },
  ready: function ready() {
    'use strict';

    var control = this; // Set the sortable container.

    control.sortableContainer = control.container.find('.sortable').first(); // Init sortable.

    control.sortableContainer.sortable({
      // Update value when we stop sorting.
      stop: function stop() {
        control.updateValue();
      }
    }).disableSelection().find('div').each(function () {
      // Enable/disable options when we click on the eye.
      jQuery(this).find('i.visibility').click(function () {
        jQuery(this).toggleClass('dashicons-visibility-faint').parents('div:eq(0)').toggleClass('invisible');
      });
    }).click(function () {
      // Update value on click.
      control.updateValue();
    });
  },

  /**
   * Updates the sorting list
   */
  updateValue: function updateValue() {
    'use strict';

    var control = this,
        newValue = [];
    this.sortableContainer.find('div').each(function () {
      if (!jQuery(this).is('.invisible')) {
        newValue.push(jQuery(this).data('value'));
      }
    });
    control.setting.set(newValue);
  }
});

/***/ }),

/***/ "./src/customizer-controls/spacing/SpacingComponent.js":
/*!*************************************************************!*\
  !*** ./src/customizer-controls/spacing/SpacingComponent.js ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ "./node_modules/@babel/runtime/helpers/extends.js");
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./style.scss */ "./src/customizer-controls/spacing/style.scss");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_7__);





function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1___default()(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }






var SpacingComponent = function SpacingComponent(props) {
  var value = props.control.setting.get();
  value = undefined === value || '' === value ? props.control.params.value : value;

  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_7__["useState"])(value),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2___default()(_useState, 2),
      state = _useState2[0],
      setState = _useState2[1];

  Object(react__WEBPACK_IMPORTED_MODULE_7__["useEffect"])(function () {
    // If settings are changed externally.
    if (state !== value) {
      setState(value);
    }
  }, [props]);

  var onConnectedClick = function onConnectedClick() {
    var parent = event.target.parentElement.parentElement;
    var inputs = parent.querySelectorAll('.aeon-spacing-input');

    for (var i = 0; i < inputs.length; i++) {
      inputs[i].classList.remove('connected');
    }

    event.target.parentElement.classList.remove('disconnected');
  };

  var onDisconnectedClick = function onDisconnectedClick() {
    var parent = event.target.parentElement.parentElement;
    var inputs = parent.querySelectorAll('.aeon-spacing-input');

    for (var i = 0; i < inputs.length; i++) {
      inputs[i].classList.add('connected');
    }

    event.target.parentElement.classList.add('disconnected');
  };

  var onSpacingChange = function onSpacingChange(device, choiceID) {
    var choices = props.control.params.choices;

    var updateState = _objectSpread({}, state);

    var deviceUpdateState = _objectSpread({}, updateState[device]);

    if (!event.target.classList.contains('connected')) {
      deviceUpdateState[choiceID] = event.target.value;
    } else {
      for (var _choiceID in choices) {
        deviceUpdateState[_choiceID] = event.target.value;
      }
    }

    updateState[device] = deviceUpdateState;
    props.control.setting.set(updateState);
    setState(updateState);
  };

  var onUnitChange = function onUnitChange(device) {
    var unitKey = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';

    var updateState = _objectSpread({}, state);

    updateState["".concat(device, "-unit")] = unitKey;
    props.control.setting.set(updateState);
    setState(updateState);
  };

  var renderResponsiveInput = function renderResponsiveInput(device) {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("input", {
      key: device,
      type: "hidden",
      onChange: function onChange() {
        return onUnitChange(device, '');
      },
      className: "aeon-spacing-unit-input aeon-spacing-".concat(device, "-unit"),
      "data-device": "".concat(device),
      value: state["".concat(device, "-unit")]
    });
  };

  var renderInputHtml = function renderInputHtml(device) {
    var active = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
    var _props$control$params = props.control.params,
        choices = _props$control$params.choices,
        inputAttrs = _props$control$params.inputAttrs,
        connected = _props$control$params.connected;
    var connectedClass = false === connected ? '' : 'connected';
    var disconnectedClass = false === connected ? '' : 'disconnected';

    var itemLinkDesc = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_6__["__"])('Link Values Together', 'aeonwp');

    var linkHtml = null;
    var htmlChoices = null;

    if (choices) {
      htmlChoices = Object.keys(choices).map(function (choiceID) {
        var html = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("li", _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default()({
          key: choiceID
        }, inputAttrs, {
          className: "aeon-spacing-input-item"
        }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("input", {
          type: "number",
          className: "aeon-spacing-input aeon-spacing-".concat(device, " ").concat(connectedClass),
          "data-id": choiceID,
          value: state[device][choiceID],
          onChange: function onChange() {
            return onSpacingChange(device, choiceID);
          }
        }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("span", {
          className: "aeon-spacing-title"
        }, choices[choiceID]));
        return html;
      });
    }

    linkHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("li", {
      key: 'connect-disconnect' + device,
      className: "aeon-spacing-input-item-link ".concat(disconnectedClass)
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("span", {
      key: 'connect' + device,
      className: "dashicons dashicons-admin-links aeon-spacing-connected wp-ui-highlight",
      onClick: function onClick() {
        onConnectedClick();
      },
      title: itemLinkDesc
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("span", {
      key: 'disconnect' + device,
      className: "dashicons dashicons-editor-unlink aeon-spacing-disconnected",
      onClick: function onClick() {
        onDisconnectedClick();
      },
      title: itemLinkDesc
    }));
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("ul", {
      key: device,
      className: "aeon-spacing-wrapper ".concat(device, " ").concat(active)
    }, htmlChoices, linkHtml);
  };

  var _props$control$params2 = props.control.params,
      label = _props$control$params2.label,
      description = _props$control$params2.description;
  var htmlLabel = null;
  var htmlDescription = null;
  var inputHtml = null;
  var responsiveHtml = null;
  responsiveHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
    className: "aeon-spacing-unit"
  }, renderResponsiveInput('desktop'), renderResponsiveInput('tablet'), renderResponsiveInput('mobile')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("ul", {
    key: 'aeon-spacing-devices',
    className: "aeon-device-controls"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("li", {
    key: 'desktop',
    className: "desktop active"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("button", {
    type: "button",
    className: "preview-desktop",
    "data-device": "desktop"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("i", {
    className: "dashicons dashicons-desktop"
  }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("li", {
    key: 'tablet',
    className: "tablet"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("button", {
    type: "button",
    className: "preview-tablet",
    "data-device": "tablet"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("i", {
    className: "dashicons dashicons-tablet"
  }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("li", {
    key: 'mobile',
    className: "mobile"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("button", {
    type: "button",
    className: "preview-mobile",
    "data-device": "mobile"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("i", {
    className: "dashicons dashicons-smartphone"
  })))));

  if (label) {
    htmlLabel = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
      className: "aeon-title-area"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
      className: "aeon-title-info"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("span", {
      className: "customize-control-title"
    }, label)), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
      className: "aeon-spacing-responsive-wrap"
    }, responsiveHtml));
  }

  if (description) {
    htmlDescription = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("span", {
      className: "description customize-control-description"
    }, description);
  }

  inputHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["Fragment"], null, renderInputHtml('desktop', 'active'), renderInputHtml('tablet'), renderInputHtml('mobile'));
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
    key: 'aeon-spacing-responsive',
    className: "aeon-spacing-responsive"
  }, htmlLabel, htmlDescription, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
    className: "aeon-spacing-inputs-wrapper"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
    className: "input-wrapper"
  }, inputHtml)));
};

SpacingComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_5___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (SpacingComponent);

/***/ }),

/***/ "./src/customizer-controls/spacing/index.js":
/*!**************************************************!*\
  !*** ./src/customizer-controls/spacing/index.js ***!
  \**************************************************/
/*! exports provided: ResponsiveSpacing, SpacingControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ResponsiveSpacing", function() { return ResponsiveSpacing; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SpacingControl", function() { return SpacingControl; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _SpacingComponent__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SpacingComponent */ "./src/customizer-controls/spacing/SpacingComponent.js");


function ResponsiveSpacing(control) {
  'use strict';

  var device = jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device');
  jQuery('.customize-control-aeon-spacing .input-wrapper .aeon-spacing-wrapper').removeClass('active');
  jQuery('.customize-control-aeon-spacing .input-wrapper .aeon-spacing-wrapper.' + device).addClass('active');
  jQuery('.customize-control-aeon-spacing .aeon-device-controls li').removeClass('active');
  jQuery('.customize-control-aeon-spacing .aeon-device-controls li.' + device).addClass('active');
  jQuery('.wp-full-overlay-footer .devices button').on('click', function () {
    var device = jQuery(this).attr('data-device');
    jQuery('.customize-control-aeon-spacing .input-wrapper .aeon-spacing-wrapper, .customize-control .aeon-device-controls > li').removeClass('active');
    jQuery('.customize-control-aeon-spacing .input-wrapper .aeon-spacing-wrapper.' + device + ', .customize-control .aeon-device-controls > li.' + device).addClass('active');
  });
  control.container.find('.aeon-device-controls button').on('click', function (event) {
    event.preventDefault();
    var device = jQuery(this).attr('data-device');
    jQuery('.wp-full-overlay-footer .devices button[data-device="' + device + '"]').trigger('click');
  });
}
var SpacingControl = wp.customize.aeControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_SpacingComponent__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control
    }), control.container[0]);
  },
  ready: function ready() {
    ResponsiveSpacing(this);
  }
});

/***/ }),

/***/ "./src/customizer-controls/switch/SwitchComponent.js":
/*!***********************************************************!*\
  !*** ./src/customizer-controls/switch/SwitchComponent.js ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/assertThisInitialized */ "./node_modules/@babel/runtime/helpers/assertThisInitialized.js");
/* harmony import */ var _babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/inherits */ "./node_modules/@babel/runtime/helpers/inherits.js");
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/possibleConstructorReturn */ "./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js");
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @babel/runtime/helpers/getPrototypeOf */ "./node_modules/@babel/runtime/helpers/getPrototypeOf.js");
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./style.scss */ "./src/customizer-controls/switch/style.scss");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_10__);








function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5___default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5___default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_4___default()(this, result); }; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }







var SwitchComponent = /*#__PURE__*/function (_Component) {
  _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_3___default()(SwitchComponent, _Component);

  var _super = _createSuper(SwitchComponent);

  function SwitchComponent(props) {
    var _this;

    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default()(this, SwitchComponent);

    _this = _super.call(this, props);
    var value = props.control.setting.get();
    _this.state = {
      value: value
    };
    _this.defaultValue = props.control.params.default || '';
    _this.updateValues = _this.updateValues.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2___default()(_this));
    return _this;
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(SwitchComponent, [{
    key: "render",
    value: function render() {
      var _this2 = this;

      //console.log( this.props.control.params );
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
        className: "aeon-control-field aeon-switch-control"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_10__["ToggleControl"], {
        label: this.props.control.params.label ? this.props.control.params.label : undefined,
        checked: this.state.value,
        help: this.props.control.params.input_attrs && this.props.control.params.input_attrs.help ? this.props.control.params.input_attrs.help : undefined,
        onChange: function onChange(value) {
          _this2.updateValues(value);
        }
      }));
    }
  }, {
    key: "updateValues",
    value: function updateValues(value) {
      this.setState({
        value: value
      });
      this.props.control.setting.set(value);
    }
  }]);

  return SwitchComponent;
}(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Component"]);

SwitchComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_8___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (SwitchComponent);

/***/ }),

/***/ "./src/customizer-controls/switch/index.js":
/*!*************************************************!*\
  !*** ./src/customizer-controls/switch/index.js ***!
  \*************************************************/
/*! exports provided: SwitchControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "SwitchControl", function() { return SwitchControl; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _SwitchComponent__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SwitchComponent */ "./src/customizer-controls/switch/SwitchComponent.js");


var SwitchControl = wp.customize.aeControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_SwitchComponent__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/customizer-controls/text/TextComponent.js":
/*!*******************************************************!*\
  !*** ./src/customizer-controls/text/TextComponent.js ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_4__);






var TextComponent = function TextComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_4__["useState"])(props.control.setting.get()),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState, 2),
      props_value = _useState2[0],
      setPropsValue = _useState2[1];

  Object(react__WEBPACK_IMPORTED_MODULE_4__["useEffect"])(function () {
    setPropsValue(props.control.setting.get());
  }, [props]);
  var label = props.control.params.label;
  var labelHtml = null;

  if (label) {
    labelHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
      className: "customize-control-title"
    }, label);
  }

  var updateValues = function updateValues(newVal) {
    setPropsValue(newVal);
    props.control.setting.set(newVal);
  };

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: "aeon-text-wrapper"
  }, labelHtml, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["TextControl"], {
    value: props_value,
    onChange: function onChange(value) {
      return updateValues(value);
    }
  }));
};

TextComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_2___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(TextComponent));

/***/ }),

/***/ "./src/customizer-controls/text/index.js":
/*!***********************************************!*\
  !*** ./src/customizer-controls/text/index.js ***!
  \***********************************************/
/*! exports provided: TextControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "TextControl", function() { return TextControl; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _TextComponent__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./TextComponent */ "./src/customizer-controls/text/TextComponent.js");


var TextControl = wp.customize.aeControl.extend({
  renderContent: function renderContent() {
    var control = this;
    ReactDOM.render(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_TextComponent__WEBPACK_IMPORTED_MODULE_1__["default"], {
      control: control
    }), control.container[0]);
  }
});

/***/ }),

/***/ "./src/customizer-controls/wrapper/index.js":
/*!**************************************************!*\
  !*** ./src/customizer-controls/wrapper/index.js ***!
  \**************************************************/
/*! exports provided: WrapperControl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "WrapperControl", function() { return WrapperControl; });
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_2__);




var WrapperControl = wp.customize.aeControl.extend({
  renderContent: function renderContent() {
    var control = this;
    var choices = control.params.choices;

    var form = function form() {
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
        className: classnames__WEBPACK_IMPORTED_MODULE_2___default()(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()({
          'aeon-customize-control-wrapper': true
        }, choices.class, !!choices.class)),
        id: choices.id,
        "data-wrapper-type": choices.type
      }, choices.items.map(function (wrapper) {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
          key: wrapper,
          id: wrapper + '--wrapper'
        });
      }));
    };

    Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["render"])(form(), control.container[0]);
  }
});

/***/ }),

/***/ "./src/customizer.js":
/*!***************************!*\
  !*** ./src/customizer.js ***!
  \***************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./style.scss */ "./src/style.scss");
/* harmony import */ var _customizer_controls__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./customizer-controls */ "./src/customizer-controls.js");
/* harmony import */ var _customizer_controls__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_customizer_controls__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _customizer_controls_base__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./customizer-controls/base */ "./src/customizer-controls/base/index.js");
/* harmony import */ var _customizer_controls_wrapper__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./customizer-controls/wrapper */ "./src/customizer-controls/wrapper/index.js");
/* harmony import */ var _customizer_controls_color_picker__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./customizer-controls/color-picker */ "./src/customizer-controls/color-picker/index.js");
/* harmony import */ var _customizer_controls_slider__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./customizer-controls/slider */ "./src/customizer-controls/slider/index.js");
/* harmony import */ var _customizer_controls_resp_slider__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./customizer-controls/resp-slider */ "./src/customizer-controls/resp-slider/index.js");
/* harmony import */ var _customizer_controls_radio_image__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./customizer-controls/radio-image */ "./src/customizer-controls/radio-image/index.js");
/* harmony import */ var _customizer_controls_select__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./customizer-controls/select */ "./src/customizer-controls/select/index.js");
/* harmony import */ var _customizer_controls_selector__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./customizer-controls/selector */ "./src/customizer-controls/selector/index.js");
/* harmony import */ var _customizer_controls_spacing__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./customizer-controls/spacing */ "./src/customizer-controls/spacing/index.js");
/* harmony import */ var _customizer_controls_social__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./customizer-controls/social */ "./src/customizer-controls/social/index.js");
/* harmony import */ var _customizer_controls_sortable__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./customizer-controls/sortable */ "./src/customizer-controls/sortable/index.js");
/* harmony import */ var _customizer_controls_switch__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ./customizer-controls/switch */ "./src/customizer-controls/switch/index.js");
/* harmony import */ var _customizer_controls_heading__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ./customizer-controls/heading */ "./src/customizer-controls/heading/index.js");
/* harmony import */ var _customizer_controls_font_family__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! ./customizer-controls/font-family */ "./src/customizer-controls/font-family/index.js");
/* harmony import */ var _customizer_controls_editor__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! ./customizer-controls/editor */ "./src/customizer-controls/editor/index.js");
/* harmony import */ var _customizer_controls_text__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! ./customizer-controls/text */ "./src/customizer-controls/text/index.js");
/* harmony import */ var _customizer_controls_action_button__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! ./customizer-controls/action-button */ "./src/customizer-controls/action-button/index.js");
/* harmony import */ var _customizer_controls_description__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! ./customizer-controls/description */ "./src/customizer-controls/description/index.js");



















 // Register control type with Customizer.

wp.customize.controlConstructor['aeon-wrapper'] = _customizer_controls_wrapper__WEBPACK_IMPORTED_MODULE_3__["WrapperControl"];
wp.customize.controlConstructor['aeon-color'] = _customizer_controls_color_picker__WEBPACK_IMPORTED_MODULE_4__["ColorControl"];
wp.customize.controlConstructor['aeon-slider'] = _customizer_controls_slider__WEBPACK_IMPORTED_MODULE_5__["SliderControl"];
wp.customize.controlConstructor['aeon-resp-slider'] = _customizer_controls_resp_slider__WEBPACK_IMPORTED_MODULE_6__["RespSliderControl"];
wp.customize.controlConstructor['aeon-radio-image'] = _customizer_controls_radio_image__WEBPACK_IMPORTED_MODULE_7__["RadioImageControl"];
wp.customize.controlConstructor['aeon-select'] = _customizer_controls_select__WEBPACK_IMPORTED_MODULE_8__["SelectControl"];
wp.customize.controlConstructor['aeon-selector'] = _customizer_controls_selector__WEBPACK_IMPORTED_MODULE_9__["SelectorControl"];
wp.customize.controlConstructor['aeon-spacing'] = _customizer_controls_spacing__WEBPACK_IMPORTED_MODULE_10__["SpacingControl"];
wp.customize.controlConstructor['aeon-social'] = _customizer_controls_social__WEBPACK_IMPORTED_MODULE_11__["SocialControl"];
wp.customize.controlConstructor['aeon-sortable'] = _customizer_controls_sortable__WEBPACK_IMPORTED_MODULE_12__["SortableControl"];
wp.customize.controlConstructor['aeon-switch'] = _customizer_controls_switch__WEBPACK_IMPORTED_MODULE_13__["SwitchControl"];
wp.customize.controlConstructor['aeon-heading'] = _customizer_controls_heading__WEBPACK_IMPORTED_MODULE_14__["HeadingControl"];
wp.customize.controlConstructor['aeon-font-family'] = _customizer_controls_font_family__WEBPACK_IMPORTED_MODULE_15__["FontFamilyControl"];
wp.customize.controlConstructor['aeon-editor'] = _customizer_controls_editor__WEBPACK_IMPORTED_MODULE_16__["EditorControl"];
wp.customize.controlConstructor['aeon-text'] = _customizer_controls_text__WEBPACK_IMPORTED_MODULE_17__["TextControl"];
wp.customize.controlConstructor['aeon-action-button'] = _customizer_controls_action_button__WEBPACK_IMPORTED_MODULE_18__["ActionButtonControl"];
wp.customize.controlConstructor['aeon-description'] = _customizer_controls_description__WEBPACK_IMPORTED_MODULE_19__["DescriptionControl"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["components"]; }());

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["element"]; }());

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["i18n"]; }());

/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["React"]; }());

/***/ }),

/***/ "react-dom":
/*!***************************!*\
  !*** external "ReactDOM" ***!
  \***************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["ReactDOM"]; }());

/***/ })

/******/ });
//# sourceMappingURL=customizer.js.map