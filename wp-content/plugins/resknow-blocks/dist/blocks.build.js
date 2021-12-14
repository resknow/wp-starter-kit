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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/*!***********************!*\
  !*** ./src/blocks.js ***!
  \***********************/
/*! no exports provided */
/*! all exports used */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("Object.defineProperty(__webpack_exports__, \"__esModule\", { value: true });\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__container_block_js__ = __webpack_require__(/*! ./container/block.js */ 1);\n/**\n * Gutenberg Blocks\n *\n * All blocks related JavaScript files should be imported here.\n * You can create a new block folder in this dir and include code\n * for that block here as well.\n *\n * All blocks should be included here since this is the file that\n * Webpack is compiling as the input file.\n */\n\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3NyYy9ibG9ja3MuanM/N2I1YiJdLCJzb3VyY2VzQ29udGVudCI6WyIvKipcbiAqIEd1dGVuYmVyZyBCbG9ja3NcbiAqXG4gKiBBbGwgYmxvY2tzIHJlbGF0ZWQgSmF2YVNjcmlwdCBmaWxlcyBzaG91bGQgYmUgaW1wb3J0ZWQgaGVyZS5cbiAqIFlvdSBjYW4gY3JlYXRlIGEgbmV3IGJsb2NrIGZvbGRlciBpbiB0aGlzIGRpciBhbmQgaW5jbHVkZSBjb2RlXG4gKiBmb3IgdGhhdCBibG9jayBoZXJlIGFzIHdlbGwuXG4gKlxuICogQWxsIGJsb2NrcyBzaG91bGQgYmUgaW5jbHVkZWQgaGVyZSBzaW5jZSB0aGlzIGlzIHRoZSBmaWxlIHRoYXRcbiAqIFdlYnBhY2sgaXMgY29tcGlsaW5nIGFzIHRoZSBpbnB1dCBmaWxlLlxuICovXG5cbmltcG9ydCBcIi4vY29udGFpbmVyL2Jsb2NrLmpzXCI7XG5cblxuLy8vLy8vLy8vLy8vLy8vLy8vXG4vLyBXRUJQQUNLIEZPT1RFUlxuLy8gLi9zcmMvYmxvY2tzLmpzXG4vLyBtb2R1bGUgaWQgPSAwXG4vLyBtb2R1bGUgY2h1bmtzID0gMCJdLCJtYXBwaW5ncyI6IkFBQUE7QUFBQTtBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Iiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///0\n");

/***/ }),
/* 1 */
/*!********************************!*\
  !*** ./src/container/block.js ***!
  \********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__wordpress_block_editor__ = __webpack_require__(/*! @wordpress/block-editor */ 2);\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__wordpress_block_editor___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__wordpress_block_editor__);\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__wordpress_components__ = __webpack_require__(/*! @wordpress/components */ 3);\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__wordpress_components___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1__wordpress_components__);\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__wordpress_blocks__ = __webpack_require__(/*! @wordpress/blocks */ 7);\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__wordpress_blocks___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2__wordpress_blocks__);\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__editor_css__ = __webpack_require__(/*! ./editor.css */ 4);\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__editor_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_3__editor_css__);\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__style_css__ = __webpack_require__(/*! ./style.css */ 5);\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_4__style_css___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_4__style_css__);\n\n\n\n\n\n\n\nObject(__WEBPACK_IMPORTED_MODULE_2__wordpress_blocks__[\"registerBlockType\"])(\"resknow/container\", {\n\ttitle: \"Container\",\n\ticon: {\n\t\tsrc: wp.element.createElement(\n\t\t\t\"svg\",\n\t\t\t{ viewBox: \"0 0 24 24\", xmlns: \"http://www.w3.org/2000/svg\" },\n\t\t\twp.element.createElement(\"path\", { d: \"M20.49,7.52a.19.19,0,0,1,0-.08.17.17,0,0,1,0-.07l0-.09-.06-.15,0,0h0l0,0,0,0a.48.48,0,0,0-.09-.11l-.09-.08h0l-.05,0,0,0L16.26,4.45h0l-3.72-2.3A.85.85,0,0,0,12.25,2h-.08a.82.82,0,0,0-.27,0h-.1a1.13,1.13,0,0,0-.33.13L4,6.78l-.09.07-.09.08L3.72,7l-.05.06,0,0-.06.15,0,.09v.06a.69.69,0,0,0,0,.2v8.73a1,1,0,0,0,.47.85l7.5,4.64h0l0,0,.15.06.08,0a.86.86,0,0,0,.52,0l.08,0,.15-.06,0,0h0L20,17.21a1,1,0,0,0,.47-.85V7.63S20.49,7.56,20.49,7.52ZM12,4.17l1.78,1.1L8.19,8.73,6.4,7.63Zm-1,15L5.5,15.81V9.42l5.5,3.4Zm1-8.11L10.09,9.91l5.59-3.47L17.6,7.63Zm6.5,4.72L13,19.2V12.82l5.5-3.4Z\" })\n\t\t),\n\t\tforeground: \"#00c6ae\"\n\t},\n\tcategory: \"layout\",\n\tkeywords: [\"container\", \"box\"],\n\tattributes: {\n\t\talign: {\n\t\t\ttype: \"string\",\n\t\t\tdefault: \"full\"\n\t\t},\n\t\tpadding: {\n\t\t\ttype: \"number\",\n\t\t\tdefault: 0\n\t\t}\n\t},\n\tsupports: {\n\t\tanchor: true,\n\t\talign: [\"wide\", \"full\"],\n\t\tcolor: {\n\t\t\tbackground: true\n\t\t}\n\t},\n\tedit: function edit(_ref) {\n\t\tvar attributes = _ref.attributes,\n\t\t    setAttributes = _ref.setAttributes,\n\t\t    className = _ref.className;\n\n\t\treturn [wp.element.createElement(\n\t\t\t__WEBPACK_IMPORTED_MODULE_0__wordpress_block_editor__[\"InspectorControls\"],\n\t\t\tnull,\n\t\t\twp.element.createElement(\n\t\t\t\t__WEBPACK_IMPORTED_MODULE_1__wordpress_components__[\"Panel\"],\n\t\t\t\tnull,\n\t\t\t\twp.element.createElement(\n\t\t\t\t\t__WEBPACK_IMPORTED_MODULE_1__wordpress_components__[\"PanelBody\"],\n\t\t\t\t\t{ title: \"Spacing\" },\n\t\t\t\t\twp.element.createElement(__WEBPACK_IMPORTED_MODULE_1__wordpress_components__[\"SelectControl\"], {\n\t\t\t\t\t\tlabel: \"Padding\",\n\t\t\t\t\t\thelp: \"Adds space above and below the content of this container\",\n\t\t\t\t\t\tonChange: function onChange(value) {\n\t\t\t\t\t\t\tsetAttributes({ padding: value });\n\t\t\t\t\t\t},\n\t\t\t\t\t\tvalue: attributes.padding,\n\t\t\t\t\t\toptions: [{ label: \"None\", value: 0 }, { label: \"Small\", value: 4 }, { label: \"Medium\", value: 8 }, { label: \"Large\", value: 12 }, { label: \"Extra Large\", value: 16 }, { label: \"2XL\", value: 24 }]\n\t\t\t\t\t})\n\t\t\t\t)\n\t\t\t)\n\t\t), wp.element.createElement(\n\t\t\t\"div\",\n\t\t\t{ className: [className, \"py-\" + attributes.padding].join(\" \") },\n\t\t\twp.element.createElement(__WEBPACK_IMPORTED_MODULE_0__wordpress_block_editor__[\"InnerBlocks\"], null)\n\t\t)];\n\t},\n\tsave: function save(_ref2) {\n\t\tvar attributes = _ref2.attributes,\n\t\t    className = _ref2.className;\n\n\t\treturn wp.element.createElement(\n\t\t\t\"div\",\n\t\t\t{ className: className },\n\t\t\twp.element.createElement(\n\t\t\t\t\"div\",\n\t\t\t\t{ className: \"block-area\" },\n\t\t\t\twp.element.createElement(__WEBPACK_IMPORTED_MODULE_0__wordpress_block_editor__[\"InnerBlocks\"].Content, null)\n\t\t\t)\n\t\t);\n\t}\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMS5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3NyYy9jb250YWluZXIvYmxvY2suanM/YTE3ZSJdLCJzb3VyY2VzQ29udGVudCI6WyJpbXBvcnQgeyBJbm5lckJsb2NrcywgSW5zcGVjdG9yQ29udHJvbHMgfSBmcm9tIFwiQHdvcmRwcmVzcy9ibG9jay1lZGl0b3JcIjtcbmltcG9ydCB7IFBhbmVsLCBQYW5lbEJvZHksIFNlbGVjdENvbnRyb2wgfSBmcm9tIFwiQHdvcmRwcmVzcy9jb21wb25lbnRzXCI7XG5pbXBvcnQgeyByZWdpc3RlckJsb2NrVHlwZSB9IGZyb20gXCJAd29yZHByZXNzL2Jsb2Nrc1wiO1xuXG5pbXBvcnQgXCIuL2VkaXRvci5jc3NcIjtcbmltcG9ydCBcIi4vc3R5bGUuY3NzXCI7XG5cbnJlZ2lzdGVyQmxvY2tUeXBlKFwicmVza25vdy9jb250YWluZXJcIiwge1xuXHR0aXRsZTogXCJDb250YWluZXJcIixcblx0aWNvbjoge1xuXHRcdHNyYzogd3AuZWxlbWVudC5jcmVhdGVFbGVtZW50KFxuXHRcdFx0XCJzdmdcIixcblx0XHRcdHsgdmlld0JveDogXCIwIDAgMjQgMjRcIiwgeG1sbnM6IFwiaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmdcIiB9LFxuXHRcdFx0d3AuZWxlbWVudC5jcmVhdGVFbGVtZW50KFwicGF0aFwiLCB7IGQ6IFwiTTIwLjQ5LDcuNTJhLjE5LjE5LDAsMCwxLDAtLjA4LjE3LjE3LDAsMCwxLDAtLjA3bDAtLjA5LS4wNi0uMTUsMCwwaDBsMCwwLDAsMGEuNDguNDgsMCwwLDAtLjA5LS4xMWwtLjA5LS4wOGgwbC0uMDUsMCwwLDBMMTYuMjYsNC40NWgwbC0zLjcyLTIuM0EuODUuODUsMCwwLDAsMTIuMjUsMmgtLjA4YS44Mi44MiwwLDAsMC0uMjcsMGgtLjFhMS4xMywxLjEzLDAsMCwwLS4zMy4xM0w0LDYuNzhsLS4wOS4wNy0uMDkuMDhMMy43Miw3bC0uMDUuMDYsMCwwLS4wNi4xNSwwLC4wOXYuMDZhLjY5LjY5LDAsMCwwLDAsLjJ2OC43M2ExLDEsMCwwLDAsLjQ3Ljg1bDcuNSw0LjY0aDBsMCwwLC4xNS4wNi4wOCwwYS44Ni44NiwwLDAsMCwuNTIsMGwuMDgsMCwuMTUtLjA2LDAsMGgwTDIwLDE3LjIxYTEsMSwwLDAsMCwuNDctLjg1VjcuNjNTMjAuNDksNy41NiwyMC40OSw3LjUyWk0xMiw0LjE3bDEuNzgsMS4xTDguMTksOC43Myw2LjQsNy42M1ptLTEsMTVMNS41LDE1LjgxVjkuNDJsNS41LDMuNFptMS04LjExTDEwLjA5LDkuOTFsNS41OS0zLjQ3TDE3LjYsNy42M1ptNi41LDQuNzJMMTMsMTkuMlYxMi44Mmw1LjUtMy40WlwiIH0pXG5cdFx0KSxcblx0XHRmb3JlZ3JvdW5kOiBcIiMwMGM2YWVcIlxuXHR9LFxuXHRjYXRlZ29yeTogXCJsYXlvdXRcIixcblx0a2V5d29yZHM6IFtcImNvbnRhaW5lclwiLCBcImJveFwiXSxcblx0YXR0cmlidXRlczoge1xuXHRcdGFsaWduOiB7XG5cdFx0XHR0eXBlOiBcInN0cmluZ1wiLFxuXHRcdFx0ZGVmYXVsdDogXCJmdWxsXCJcblx0XHR9LFxuXHRcdHBhZGRpbmc6IHtcblx0XHRcdHR5cGU6IFwibnVtYmVyXCIsXG5cdFx0XHRkZWZhdWx0OiAwXG5cdFx0fVxuXHR9LFxuXHRzdXBwb3J0czoge1xuXHRcdGFuY2hvcjogdHJ1ZSxcblx0XHRhbGlnbjogW1wid2lkZVwiLCBcImZ1bGxcIl0sXG5cdFx0Y29sb3I6IHtcblx0XHRcdGJhY2tncm91bmQ6IHRydWVcblx0XHR9XG5cdH0sXG5cdGVkaXQ6IGZ1bmN0aW9uIGVkaXQoX3JlZikge1xuXHRcdHZhciBhdHRyaWJ1dGVzID0gX3JlZi5hdHRyaWJ1dGVzLFxuXHRcdCAgICBzZXRBdHRyaWJ1dGVzID0gX3JlZi5zZXRBdHRyaWJ1dGVzLFxuXHRcdCAgICBjbGFzc05hbWUgPSBfcmVmLmNsYXNzTmFtZTtcblxuXHRcdHJldHVybiBbd3AuZWxlbWVudC5jcmVhdGVFbGVtZW50KFxuXHRcdFx0SW5zcGVjdG9yQ29udHJvbHMsXG5cdFx0XHRudWxsLFxuXHRcdFx0d3AuZWxlbWVudC5jcmVhdGVFbGVtZW50KFxuXHRcdFx0XHRQYW5lbCxcblx0XHRcdFx0bnVsbCxcblx0XHRcdFx0d3AuZWxlbWVudC5jcmVhdGVFbGVtZW50KFxuXHRcdFx0XHRcdFBhbmVsQm9keSxcblx0XHRcdFx0XHR7IHRpdGxlOiBcIlNwYWNpbmdcIiB9LFxuXHRcdFx0XHRcdHdwLmVsZW1lbnQuY3JlYXRlRWxlbWVudChTZWxlY3RDb250cm9sLCB7XG5cdFx0XHRcdFx0XHRsYWJlbDogXCJQYWRkaW5nXCIsXG5cdFx0XHRcdFx0XHRoZWxwOiBcIkFkZHMgc3BhY2UgYWJvdmUgYW5kIGJlbG93IHRoZSBjb250ZW50IG9mIHRoaXMgY29udGFpbmVyXCIsXG5cdFx0XHRcdFx0XHRvbkNoYW5nZTogZnVuY3Rpb24gb25DaGFuZ2UodmFsdWUpIHtcblx0XHRcdFx0XHRcdFx0c2V0QXR0cmlidXRlcyh7IHBhZGRpbmc6IHZhbHVlIH0pO1xuXHRcdFx0XHRcdFx0fSxcblx0XHRcdFx0XHRcdHZhbHVlOiBhdHRyaWJ1dGVzLnBhZGRpbmcsXG5cdFx0XHRcdFx0XHRvcHRpb25zOiBbeyBsYWJlbDogXCJOb25lXCIsIHZhbHVlOiAwIH0sIHsgbGFiZWw6IFwiU21hbGxcIiwgdmFsdWU6IDQgfSwgeyBsYWJlbDogXCJNZWRpdW1cIiwgdmFsdWU6IDggfSwgeyBsYWJlbDogXCJMYXJnZVwiLCB2YWx1ZTogMTIgfSwgeyBsYWJlbDogXCJFeHRyYSBMYXJnZVwiLCB2YWx1ZTogMTYgfSwgeyBsYWJlbDogXCIyWExcIiwgdmFsdWU6IDI0IH1dXG5cdFx0XHRcdFx0fSlcblx0XHRcdFx0KVxuXHRcdFx0KVxuXHRcdCksIHdwLmVsZW1lbnQuY3JlYXRlRWxlbWVudChcblx0XHRcdFwiZGl2XCIsXG5cdFx0XHR7IGNsYXNzTmFtZTogW2NsYXNzTmFtZSwgXCJweS1cIiArIGF0dHJpYnV0ZXMucGFkZGluZ10uam9pbihcIiBcIikgfSxcblx0XHRcdHdwLmVsZW1lbnQuY3JlYXRlRWxlbWVudChJbm5lckJsb2NrcywgbnVsbClcblx0XHQpXTtcblx0fSxcblx0c2F2ZTogZnVuY3Rpb24gc2F2ZShfcmVmMikge1xuXHRcdHZhciBhdHRyaWJ1dGVzID0gX3JlZjIuYXR0cmlidXRlcyxcblx0XHQgICAgY2xhc3NOYW1lID0gX3JlZjIuY2xhc3NOYW1lO1xuXG5cdFx0cmV0dXJuIHdwLmVsZW1lbnQuY3JlYXRlRWxlbWVudChcblx0XHRcdFwiZGl2XCIsXG5cdFx0XHR7IGNsYXNzTmFtZTogY2xhc3NOYW1lIH0sXG5cdFx0XHR3cC5lbGVtZW50LmNyZWF0ZUVsZW1lbnQoXG5cdFx0XHRcdFwiZGl2XCIsXG5cdFx0XHRcdHsgY2xhc3NOYW1lOiBcImJsb2NrLWFyZWFcIiB9LFxuXHRcdFx0XHR3cC5lbGVtZW50LmNyZWF0ZUVsZW1lbnQoSW5uZXJCbG9ja3MuQ29udGVudCwgbnVsbClcblx0XHRcdClcblx0XHQpO1xuXHR9XG59KTtcblxuXG4vLy8vLy8vLy8vLy8vLy8vLy9cbi8vIFdFQlBBQ0sgRk9PVEVSXG4vLyAuL3NyYy9jb250YWluZXIvYmxvY2suanNcbi8vIG1vZHVsZSBpZCA9IDFcbi8vIG1vZHVsZSBjaHVua3MgPSAwIl0sIm1hcHBpbmdzIjoiQUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///1\n");

/***/ }),
/* 2 */
/*!*********************************!*\
  !*** external "wp.blockEditor" ***!
  \*********************************/
/*! dynamic exports provided */
/*! exports used: InnerBlocks, InspectorControls */
/***/ (function(module, exports) {

module.exports = wp.blockEditor;

/***/ }),
/* 3 */
/*!********************************!*\
  !*** external "wp.components" ***!
  \********************************/
/*! dynamic exports provided */
/*! exports used: Panel, PanelBody, SelectControl */
/***/ (function(module, exports) {

module.exports = wp.components;

/***/ }),
/* 4 */
/*!**********************************!*\
  !*** ./src/container/editor.css ***!
  \**********************************/
/*! dynamic exports provided */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiNC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3NyYy9jb250YWluZXIvZWRpdG9yLmNzcz8xNDEzIl0sInNvdXJjZXNDb250ZW50IjpbIi8vIHJlbW92ZWQgYnkgZXh0cmFjdC10ZXh0LXdlYnBhY2stcGx1Z2luXG5cblxuLy8vLy8vLy8vLy8vLy8vLy8vXG4vLyBXRUJQQUNLIEZPT1RFUlxuLy8gLi9zcmMvY29udGFpbmVyL2VkaXRvci5jc3Ncbi8vIG1vZHVsZSBpZCA9IDRcbi8vIG1vZHVsZSBjaHVua3MgPSAwIl0sIm1hcHBpbmdzIjoiQUFBQSIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///4\n");

/***/ }),
/* 5 */
/*!*********************************!*\
  !*** ./src/container/style.css ***!
  \*********************************/
/*! dynamic exports provided */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiNS5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3NyYy9jb250YWluZXIvc3R5bGUuY3NzPzJlYWUiXSwic291cmNlc0NvbnRlbnQiOlsiLy8gcmVtb3ZlZCBieSBleHRyYWN0LXRleHQtd2VicGFjay1wbHVnaW5cblxuXG4vLy8vLy8vLy8vLy8vLy8vLy9cbi8vIFdFQlBBQ0sgRk9PVEVSXG4vLyAuL3NyYy9jb250YWluZXIvc3R5bGUuY3NzXG4vLyBtb2R1bGUgaWQgPSA1XG4vLyBtb2R1bGUgY2h1bmtzID0gMCJdLCJtYXBwaW5ncyI6IkFBQUEiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///5\n");

/***/ }),
/* 6 */,
/* 7 */
/*!****************************!*\
  !*** external "wp.blocks" ***!
  \****************************/
/*! dynamic exports provided */
/*! exports used: registerBlockType */
/***/ (function(module, exports) {

module.exports = wp.blocks;

/***/ })
/******/ ]);