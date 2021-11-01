/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/js/main.js":
/*!***************************!*\
  !*** ./assets/js/main.js ***!
  \***************************/
/***/ (() => {

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

// JQUERY
// episode search form
(function ($) {
  $(document).on("submit", "#itoForm", function (e) {
    var _$$ajax;

    e.preventDefault();
    var data = $(this).serialize();
    $.ajax((_$$ajax = {
      url: wpAjax.ajaxUrl,
      data: {
        action: "filter"
      }
    }, _defineProperty(_$$ajax, "data", data), _defineProperty(_$$ajax, "type", "post"), _defineProperty(_$$ajax, "beforeSend", function beforeSend() {
      $("[data-js-filter=target]").html("\n            <div class=\"d-flex justify-content-center results-loading\">\n              <div class=\"spinner-border\" role=\"status\">\n                <span class=\"sr-only\">Loading...</span><br>\n              </div>\n              <p>Loading...</p>\n            </div>\n          ");
    }), _defineProperty(_$$ajax, "complete", function complete() {
      $(".results-loading").hide();
    }), _defineProperty(_$$ajax, "success", function success(result) {
      $("[data-js-filter=target]").html(result);
    }), _defineProperty(_$$ajax, "error", function error(result) {
      console.log(result);
    }), _$$ajax));
  });
  $("#itoReset").on("click", function (e) {
    e.preventDefault();
    var data = $(this).val();
    $.ajax({
      url: wpAjax.ajaxUrl,
      data: {
        action: "reset",
        data: data
      },
      type: "post",
      success: function success(result) {
        $("[data-js-filter=target]").html(result);
      },
      error: function error(result) {
        console.log("erorr occured somewhere", result);
      }
    });
    $("#itoForm")[0].reset();
  });
})(jQuery); // single topics page


(function ($) {
  $(".load-video").on("click", function (e) {
    e.stopPropagation();
    $(".episode-player").html($(this).data("video-embed"));
    $(".episode-info-title h5").html($(this).data("episode-title"));
    $(".episode-info-title h5").html($(this).data("curriculum-title"));
  });
  $("#itoForm").on("click", function () {
    $("#itoForm").submit();
  });
  $("#episode-category :selected").on("click", function () {
    $("#itoForm").submit();
  });
  $("#myTab a").on("click", function (e) {
    e.preventDefault();
    $(this).tab("show");
  });
  $(".load-details").on("click", function (e) {
    e.preventDefault();
    var video_id = $(this).attr("data-video-id");
    $.ajax({
      url: wpAjax.ajaxUrl,
      data: {
        action: "overview",
        video_id: video_id
      },
      type: "post",
      beforeSend: function beforeSend() {
        $("#home").html("\n            <div class=\"d-flex justify-content-center results-loading\">\n              <div class=\"spinner-border\" role=\"status\">\n                <span class=\"sr-only\">Loading...</span><br>\n              </div>\n              <p>Loading...</p>\n            </div>\n          ");
      },
      success: function success(result) {
        $("#home").html(result);
      },
      error: function error(result) {
        console.log(result);
      }
    });
  });
  $(".load-resources").on("click", function (e) {
    e.preventDefault();
    var video_id = $(this).attr("data-video-id");
    var topic_id = $(this).attr("data-topic-id");
    $.ajax({
      url: wpAjax.ajaxUrl,
      data: {
        action: "additional_resources",
        video_id: video_id,
        topic_id: topic_id
      },
      type: "post",
      beforeSend: function beforeSend() {
        $("#resources").html("\n            <div class=\"d-flex justify-content-center results-loading\">\n              <div class=\"spinner-border\" role=\"status\">\n                <span class=\"sr-only\">Loading...</span><br>\n              </div>\n              <p>Loading...</p>\n            </div>\n          ");
      },
      success: function success(result) {
        $("#resources").html(result);
      },
      error: function error(result) {
        console.log(result);
      }
    });
  });
})(jQuery);
/** WHERE TO WATCH */


(function ($) {
  $(document).on("submit", "#broadcastForm", function (e) {
    e.preventDefault();
    var data = $(this).serialize();
    $.ajax({
      url: wpAjax.ajaxUrl,
      data: data,
      type: "post",
      success: function success(result) {
        $(".broadcast-results").html(result);
      },
      error: function error(result) {
        console.log(result);
      }
    });
  });
  $(".form-select").on("change", function () {
    $("#broadcastForm").submit();
  });
})(jQuery); // Modal Click


(function ($) {
  $(document).ready(function () {
    $(".external-link").on("click", function (e) {
      e.preventDefault();
      $("#myModal").modal("show"); // let link = $(e.currentTarget).attr("href");
      // console.log("this is the link", link);

      document.getElementById("btnContinue").setAttribute("onClick", 'javascript:window.location.href="' + $(e.currentTarget).attr("href") + '"');
    });
  });
})(jQuery); // Singnup modal


(function ($) {
  $(document).ready(function () {
    $("#singupModal").click(function (e) {
      e.preventDefault(); // let link = $(e.currentTarget).attr('href');
      // console.log('this is the link', link);

      document.getElementById("btnContinue").setAttribute("onClick", 'javascript:window.location.href="' + $(e.currentTarget).attr("href") + '"');
      $("#singupModal").modal("show");
    });
  });
})(jQuery);

/***/ }),

/***/ "./assets/scss/main.scss":
/*!*******************************!*\
  !*** ./assets/scss/main.scss ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/main": 0,
/******/ 			"main": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkIds[i]] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkito_theme"] = self["webpackChunkito_theme"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["main"], () => (__webpack_require__("./assets/js/main.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["main"], () => (__webpack_require__("./assets/scss/main.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;