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
eval("Object.defineProperty(__webpack_exports__, \"__esModule\", { value: true });\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__block_block_js__ = __webpack_require__(/*! ./block/block.js */ 1);\n/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__block_block_js___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__block_block_js__);\n/**\n * Gutenberg Blocks\n *\n * All blocks related JavaScript files should be imported here.\n * You can create a new block folder in this dir and include code\n * for that block here as well.\n *\n * All blocks should be included here since this is the file that\n * Webpack is compiling as the input file.\n */\n\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3NyYy9ibG9ja3MuanM/N2I1YiJdLCJzb3VyY2VzQ29udGVudCI6WyIvKipcbiAqIEd1dGVuYmVyZyBCbG9ja3NcbiAqXG4gKiBBbGwgYmxvY2tzIHJlbGF0ZWQgSmF2YVNjcmlwdCBmaWxlcyBzaG91bGQgYmUgaW1wb3J0ZWQgaGVyZS5cbiAqIFlvdSBjYW4gY3JlYXRlIGEgbmV3IGJsb2NrIGZvbGRlciBpbiB0aGlzIGRpciBhbmQgaW5jbHVkZSBjb2RlXG4gKiBmb3IgdGhhdCBibG9jayBoZXJlIGFzIHdlbGwuXG4gKlxuICogQWxsIGJsb2NrcyBzaG91bGQgYmUgaW5jbHVkZWQgaGVyZSBzaW5jZSB0aGlzIGlzIHRoZSBmaWxlIHRoYXRcbiAqIFdlYnBhY2sgaXMgY29tcGlsaW5nIGFzIHRoZSBpbnB1dCBmaWxlLlxuICovXG5cbmltcG9ydCAnLi9ibG9jay9ibG9jay5qcyc7XG5cblxuLy8vLy8vLy8vLy8vLy8vLy8vXG4vLyBXRUJQQUNLIEZPT1RFUlxuLy8gLi9zcmMvYmxvY2tzLmpzXG4vLyBtb2R1bGUgaWQgPSAwXG4vLyBtb2R1bGUgY2h1bmtzID0gMCJdLCJtYXBwaW5ncyI6IkFBQUE7QUFBQTtBQUFBO0FBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTsiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///0\n");

/***/ }),
/* 1 */
/*!****************************!*\
  !*** ./src/block/block.js ***!
  \****************************/
/*! dynamic exports provided */
/***/ (function(module, __webpack_exports__) {

"use strict";
eval("var _wp$i18n = wp.i18n,\n    __ = _wp$i18n.__,\n    setLocaleData = _wp$i18n.setLocaleData;\nvar registerBlockType = wp.blocks.registerBlockType;\nvar _wp$editor = wp.editor,\n    RichText = _wp$editor.RichText,\n    MediaUpload = _wp$editor.MediaUpload;\nvar Button = wp.components.Button;\n\n\nregisterBlockType('cgb/block-my-block', {\n\t// Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.\n\ttitle: __('my-block - CGB Block'), // Block title.\n\ticon: 'shield', // Block icon from Dashicons → https://developer.wordpress.org/resource/dashicons/.\n\tcategory: 'common', // Block category — Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.\n\tkeywords: [__('my-block — CGB Block'), __('CGB Example'), __('create-guten-block')],\n\tattributes: {\n\t\ttitle: {\n\t\t\ttype: 'array',\n\t\t\tsource: 'children',\n\t\t\tselector: 'h2'\n\t\t},\n\t\tmediaID: {\n\t\t\ttype: 'number'\n\t\t},\n\t\tmediaURL: {\n\t\t\ttype: 'string',\n\t\t\tsource: 'attribute',\n\t\t\tselector: 'img',\n\t\t\tattribute: 'src'\n\t\t},\n\t\tingredients: {\n\t\t\ttype: 'array',\n\t\t\tsource: 'children',\n\t\t\tselector: '.ingredients'\n\t\t},\n\t\tinstructions: {\n\t\t\ttype: 'array',\n\t\t\tsource: 'children',\n\t\t\tselector: '.steps'\n\t\t}\n\t},\n\tedit: function edit(props) {\n\t\tvar className = props.className,\n\t\t    _props$attributes = props.attributes,\n\t\t    title = _props$attributes.title,\n\t\t    mediaID = _props$attributes.mediaID,\n\t\t    mediaURL = _props$attributes.mediaURL,\n\t\t    ingredients = _props$attributes.ingredients,\n\t\t    instructions = _props$attributes.instructions,\n\t\t    setAttributes = props.setAttributes;\n\n\t\tvar onChangeTitle = function onChangeTitle(value) {\n\t\t\tsetAttributes({ title: value });\n\t\t};\n\n\t\tvar onSelectImage = function onSelectImage(media) {\n\t\t\tsetAttributes({\n\t\t\t\tmediaURL: media.url,\n\t\t\t\tmediaID: media.id\n\t\t\t});\n\t\t};\n\t\tvar onChangeIngredients = function onChangeIngredients(value) {\n\t\t\tsetAttributes({ ingredients: value });\n\t\t};\n\n\t\tvar onChangeInstructions = function onChangeInstructions(value) {\n\t\t\tsetAttributes({ instructions: value });\n\t\t};\n\n\t\treturn wp.element.createElement(\n\t\t\t'div',\n\t\t\t{ className: className },\n\t\t\twp.element.createElement(RichText, {\n\t\t\t\ttagName: 'h2',\n\t\t\t\tplaceholder: __('Write Recipe title…', 'gutenberg-examples'),\n\t\t\t\tvalue: title,\n\t\t\t\tonChange: onChangeTitle\n\t\t\t}),\n\t\t\twp.element.createElement(\n\t\t\t\t'div',\n\t\t\t\t{ className: 'recipe-image' },\n\t\t\t\twp.element.createElement(MediaUpload, {\n\t\t\t\t\tonSelect: onSelectImage,\n\t\t\t\t\tallowedTypes: 'image',\n\t\t\t\t\tvalue: mediaID,\n\t\t\t\t\trender: function render(_ref) {\n\t\t\t\t\t\tvar open = _ref.open;\n\t\t\t\t\t\treturn wp.element.createElement(\n\t\t\t\t\t\t\tButton,\n\t\t\t\t\t\t\t{ className: mediaID ? 'image-button' : 'button button-large', onClick: open },\n\t\t\t\t\t\t\t!mediaID ? __('Upload Image', 'gutenberg-examples') : wp.element.createElement('img', { src: mediaURL, alt: __('Upload Recipe Image', 'gutenberg-examples') })\n\t\t\t\t\t\t);\n\t\t\t\t\t}\n\t\t\t\t})\n\t\t\t),\n\t\t\twp.element.createElement(\n\t\t\t\t'h3',\n\t\t\t\tnull,\n\t\t\t\t__('Ingredients', 'gutenberg-examples')\n\t\t\t),\n\t\t\twp.element.createElement(RichText, {\n\t\t\t\ttagName: 'ul',\n\t\t\t\tmultiline: 'li',\n\t\t\t\tplaceholder: __('Write a list of ingredients…', 'gutenberg-examples'),\n\t\t\t\tvalue: ingredients,\n\t\t\t\tonChange: onChangeIngredients,\n\t\t\t\tclassName: 'ingredients'\n\t\t\t}),\n\t\t\twp.element.createElement(\n\t\t\t\t'h3',\n\t\t\t\tnull,\n\t\t\t\t__('Instructions', 'gutenberg-examples')\n\t\t\t),\n\t\t\twp.element.createElement(RichText, {\n\t\t\t\ttagName: 'div',\n\t\t\t\tmultiline: 'p',\n\t\t\t\tclassName: 'steps',\n\t\t\t\tplaceholder: __('Write the instructions…', 'gutenberg-examples'),\n\t\t\t\tvalue: instructions,\n\t\t\t\tonChange: onChangeInstructions\n\t\t\t})\n\t\t);\n\t},\n\tsave: function save(props) {\n\t\tvar className = props.className,\n\t\t    _props$attributes2 = props.attributes,\n\t\t    title = _props$attributes2.title,\n\t\t    mediaURL = _props$attributes2.mediaURL,\n\t\t    ingredients = _props$attributes2.ingredients,\n\t\t    instructions = _props$attributes2.instructions;\n\n\t\treturn wp.element.createElement(\n\t\t\t'div',\n\t\t\t{ className: className },\n\t\t\twp.element.createElement(RichText.Content, { tagName: 'h2', value: title }),\n\t\t\tmediaURL && wp.element.createElement('img', { className: 'recipe-image', src: mediaURL, alt: __('Recipe Image', 'gutenberg-examples') }),\n\t\t\twp.element.createElement(RichText.Content, { tagName: 'h2', className: 'ingredients', value: ingredients }),\n\t\t\twp.element.createElement(RichText.Content, { tagName: 'div', className: 'steps', value: instructions })\n\t\t);\n\t}\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMS5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3NyYy9ibG9jay9ibG9jay5qcz85MjFkIl0sInNvdXJjZXNDb250ZW50IjpbInZhciBfd3AkaTE4biA9IHdwLmkxOG4sXG4gICAgX18gPSBfd3AkaTE4bi5fXyxcbiAgICBzZXRMb2NhbGVEYXRhID0gX3dwJGkxOG4uc2V0TG9jYWxlRGF0YTtcbnZhciByZWdpc3RlckJsb2NrVHlwZSA9IHdwLmJsb2Nrcy5yZWdpc3RlckJsb2NrVHlwZTtcbnZhciBfd3AkZWRpdG9yID0gd3AuZWRpdG9yLFxuICAgIFJpY2hUZXh0ID0gX3dwJGVkaXRvci5SaWNoVGV4dCxcbiAgICBNZWRpYVVwbG9hZCA9IF93cCRlZGl0b3IuTWVkaWFVcGxvYWQ7XG52YXIgQnV0dG9uID0gd3AuY29tcG9uZW50cy5CdXR0b247XG5cblxucmVnaXN0ZXJCbG9ja1R5cGUoJ2NnYi9ibG9jay1teS1ibG9jaycsIHtcblx0Ly8gQmxvY2sgbmFtZS4gQmxvY2sgbmFtZXMgbXVzdCBiZSBzdHJpbmcgdGhhdCBjb250YWlucyBhIG5hbWVzcGFjZSBwcmVmaXguIEV4YW1wbGU6IG15LXBsdWdpbi9teS1jdXN0b20tYmxvY2suXG5cdHRpdGxlOiBfXygnbXktYmxvY2sgLSBDR0IgQmxvY2snKSwgLy8gQmxvY2sgdGl0bGUuXG5cdGljb246ICdzaGllbGQnLCAvLyBCbG9jayBpY29uIGZyb20gRGFzaGljb25zIOKGkiBodHRwczovL2RldmVsb3Blci53b3JkcHJlc3Mub3JnL3Jlc291cmNlL2Rhc2hpY29ucy8uXG5cdGNhdGVnb3J5OiAnY29tbW9uJywgLy8gQmxvY2sgY2F0ZWdvcnkg4oCUIEdyb3VwIGJsb2NrcyB0b2dldGhlciBiYXNlZCBvbiBjb21tb24gdHJhaXRzIEUuZy4gY29tbW9uLCBmb3JtYXR0aW5nLCBsYXlvdXQgd2lkZ2V0cywgZW1iZWQuXG5cdGtleXdvcmRzOiBbX18oJ215LWJsb2NrIOKAlCBDR0IgQmxvY2snKSwgX18oJ0NHQiBFeGFtcGxlJyksIF9fKCdjcmVhdGUtZ3V0ZW4tYmxvY2snKV0sXG5cdGF0dHJpYnV0ZXM6IHtcblx0XHR0aXRsZToge1xuXHRcdFx0dHlwZTogJ2FycmF5Jyxcblx0XHRcdHNvdXJjZTogJ2NoaWxkcmVuJyxcblx0XHRcdHNlbGVjdG9yOiAnaDInXG5cdFx0fSxcblx0XHRtZWRpYUlEOiB7XG5cdFx0XHR0eXBlOiAnbnVtYmVyJ1xuXHRcdH0sXG5cdFx0bWVkaWFVUkw6IHtcblx0XHRcdHR5cGU6ICdzdHJpbmcnLFxuXHRcdFx0c291cmNlOiAnYXR0cmlidXRlJyxcblx0XHRcdHNlbGVjdG9yOiAnaW1nJyxcblx0XHRcdGF0dHJpYnV0ZTogJ3NyYydcblx0XHR9LFxuXHRcdGluZ3JlZGllbnRzOiB7XG5cdFx0XHR0eXBlOiAnYXJyYXknLFxuXHRcdFx0c291cmNlOiAnY2hpbGRyZW4nLFxuXHRcdFx0c2VsZWN0b3I6ICcuaW5ncmVkaWVudHMnXG5cdFx0fSxcblx0XHRpbnN0cnVjdGlvbnM6IHtcblx0XHRcdHR5cGU6ICdhcnJheScsXG5cdFx0XHRzb3VyY2U6ICdjaGlsZHJlbicsXG5cdFx0XHRzZWxlY3RvcjogJy5zdGVwcydcblx0XHR9XG5cdH0sXG5cdGVkaXQ6IGZ1bmN0aW9uIGVkaXQocHJvcHMpIHtcblx0XHR2YXIgY2xhc3NOYW1lID0gcHJvcHMuY2xhc3NOYW1lLFxuXHRcdCAgICBfcHJvcHMkYXR0cmlidXRlcyA9IHByb3BzLmF0dHJpYnV0ZXMsXG5cdFx0ICAgIHRpdGxlID0gX3Byb3BzJGF0dHJpYnV0ZXMudGl0bGUsXG5cdFx0ICAgIG1lZGlhSUQgPSBfcHJvcHMkYXR0cmlidXRlcy5tZWRpYUlELFxuXHRcdCAgICBtZWRpYVVSTCA9IF9wcm9wcyRhdHRyaWJ1dGVzLm1lZGlhVVJMLFxuXHRcdCAgICBpbmdyZWRpZW50cyA9IF9wcm9wcyRhdHRyaWJ1dGVzLmluZ3JlZGllbnRzLFxuXHRcdCAgICBpbnN0cnVjdGlvbnMgPSBfcHJvcHMkYXR0cmlidXRlcy5pbnN0cnVjdGlvbnMsXG5cdFx0ICAgIHNldEF0dHJpYnV0ZXMgPSBwcm9wcy5zZXRBdHRyaWJ1dGVzO1xuXG5cdFx0dmFyIG9uQ2hhbmdlVGl0bGUgPSBmdW5jdGlvbiBvbkNoYW5nZVRpdGxlKHZhbHVlKSB7XG5cdFx0XHRzZXRBdHRyaWJ1dGVzKHsgdGl0bGU6IHZhbHVlIH0pO1xuXHRcdH07XG5cblx0XHR2YXIgb25TZWxlY3RJbWFnZSA9IGZ1bmN0aW9uIG9uU2VsZWN0SW1hZ2UobWVkaWEpIHtcblx0XHRcdHNldEF0dHJpYnV0ZXMoe1xuXHRcdFx0XHRtZWRpYVVSTDogbWVkaWEudXJsLFxuXHRcdFx0XHRtZWRpYUlEOiBtZWRpYS5pZFxuXHRcdFx0fSk7XG5cdFx0fTtcblx0XHR2YXIgb25DaGFuZ2VJbmdyZWRpZW50cyA9IGZ1bmN0aW9uIG9uQ2hhbmdlSW5ncmVkaWVudHModmFsdWUpIHtcblx0XHRcdHNldEF0dHJpYnV0ZXMoeyBpbmdyZWRpZW50czogdmFsdWUgfSk7XG5cdFx0fTtcblxuXHRcdHZhciBvbkNoYW5nZUluc3RydWN0aW9ucyA9IGZ1bmN0aW9uIG9uQ2hhbmdlSW5zdHJ1Y3Rpb25zKHZhbHVlKSB7XG5cdFx0XHRzZXRBdHRyaWJ1dGVzKHsgaW5zdHJ1Y3Rpb25zOiB2YWx1ZSB9KTtcblx0XHR9O1xuXG5cdFx0cmV0dXJuIHdwLmVsZW1lbnQuY3JlYXRlRWxlbWVudChcblx0XHRcdCdkaXYnLFxuXHRcdFx0eyBjbGFzc05hbWU6IGNsYXNzTmFtZSB9LFxuXHRcdFx0d3AuZWxlbWVudC5jcmVhdGVFbGVtZW50KFJpY2hUZXh0LCB7XG5cdFx0XHRcdHRhZ05hbWU6ICdoMicsXG5cdFx0XHRcdHBsYWNlaG9sZGVyOiBfXygnV3JpdGUgUmVjaXBlIHRpdGxl4oCmJywgJ2d1dGVuYmVyZy1leGFtcGxlcycpLFxuXHRcdFx0XHR2YWx1ZTogdGl0bGUsXG5cdFx0XHRcdG9uQ2hhbmdlOiBvbkNoYW5nZVRpdGxlXG5cdFx0XHR9KSxcblx0XHRcdHdwLmVsZW1lbnQuY3JlYXRlRWxlbWVudChcblx0XHRcdFx0J2RpdicsXG5cdFx0XHRcdHsgY2xhc3NOYW1lOiAncmVjaXBlLWltYWdlJyB9LFxuXHRcdFx0XHR3cC5lbGVtZW50LmNyZWF0ZUVsZW1lbnQoTWVkaWFVcGxvYWQsIHtcblx0XHRcdFx0XHRvblNlbGVjdDogb25TZWxlY3RJbWFnZSxcblx0XHRcdFx0XHRhbGxvd2VkVHlwZXM6ICdpbWFnZScsXG5cdFx0XHRcdFx0dmFsdWU6IG1lZGlhSUQsXG5cdFx0XHRcdFx0cmVuZGVyOiBmdW5jdGlvbiByZW5kZXIoX3JlZikge1xuXHRcdFx0XHRcdFx0dmFyIG9wZW4gPSBfcmVmLm9wZW47XG5cdFx0XHRcdFx0XHRyZXR1cm4gd3AuZWxlbWVudC5jcmVhdGVFbGVtZW50KFxuXHRcdFx0XHRcdFx0XHRCdXR0b24sXG5cdFx0XHRcdFx0XHRcdHsgY2xhc3NOYW1lOiBtZWRpYUlEID8gJ2ltYWdlLWJ1dHRvbicgOiAnYnV0dG9uIGJ1dHRvbi1sYXJnZScsIG9uQ2xpY2s6IG9wZW4gfSxcblx0XHRcdFx0XHRcdFx0IW1lZGlhSUQgPyBfXygnVXBsb2FkIEltYWdlJywgJ2d1dGVuYmVyZy1leGFtcGxlcycpIDogd3AuZWxlbWVudC5jcmVhdGVFbGVtZW50KCdpbWcnLCB7IHNyYzogbWVkaWFVUkwsIGFsdDogX18oJ1VwbG9hZCBSZWNpcGUgSW1hZ2UnLCAnZ3V0ZW5iZXJnLWV4YW1wbGVzJykgfSlcblx0XHRcdFx0XHRcdCk7XG5cdFx0XHRcdFx0fVxuXHRcdFx0XHR9KVxuXHRcdFx0KSxcblx0XHRcdHdwLmVsZW1lbnQuY3JlYXRlRWxlbWVudChcblx0XHRcdFx0J2gzJyxcblx0XHRcdFx0bnVsbCxcblx0XHRcdFx0X18oJ0luZ3JlZGllbnRzJywgJ2d1dGVuYmVyZy1leGFtcGxlcycpXG5cdFx0XHQpLFxuXHRcdFx0d3AuZWxlbWVudC5jcmVhdGVFbGVtZW50KFJpY2hUZXh0LCB7XG5cdFx0XHRcdHRhZ05hbWU6ICd1bCcsXG5cdFx0XHRcdG11bHRpbGluZTogJ2xpJyxcblx0XHRcdFx0cGxhY2Vob2xkZXI6IF9fKCdXcml0ZSBhIGxpc3Qgb2YgaW5ncmVkaWVudHPigKYnLCAnZ3V0ZW5iZXJnLWV4YW1wbGVzJyksXG5cdFx0XHRcdHZhbHVlOiBpbmdyZWRpZW50cyxcblx0XHRcdFx0b25DaGFuZ2U6IG9uQ2hhbmdlSW5ncmVkaWVudHMsXG5cdFx0XHRcdGNsYXNzTmFtZTogJ2luZ3JlZGllbnRzJ1xuXHRcdFx0fSksXG5cdFx0XHR3cC5lbGVtZW50LmNyZWF0ZUVsZW1lbnQoXG5cdFx0XHRcdCdoMycsXG5cdFx0XHRcdG51bGwsXG5cdFx0XHRcdF9fKCdJbnN0cnVjdGlvbnMnLCAnZ3V0ZW5iZXJnLWV4YW1wbGVzJylcblx0XHRcdCksXG5cdFx0XHR3cC5lbGVtZW50LmNyZWF0ZUVsZW1lbnQoUmljaFRleHQsIHtcblx0XHRcdFx0dGFnTmFtZTogJ2RpdicsXG5cdFx0XHRcdG11bHRpbGluZTogJ3AnLFxuXHRcdFx0XHRjbGFzc05hbWU6ICdzdGVwcycsXG5cdFx0XHRcdHBsYWNlaG9sZGVyOiBfXygnV3JpdGUgdGhlIGluc3RydWN0aW9uc+KApicsICdndXRlbmJlcmctZXhhbXBsZXMnKSxcblx0XHRcdFx0dmFsdWU6IGluc3RydWN0aW9ucyxcblx0XHRcdFx0b25DaGFuZ2U6IG9uQ2hhbmdlSW5zdHJ1Y3Rpb25zXG5cdFx0XHR9KVxuXHRcdCk7XG5cdH0sXG5cdHNhdmU6IGZ1bmN0aW9uIHNhdmUocHJvcHMpIHtcblx0XHR2YXIgY2xhc3NOYW1lID0gcHJvcHMuY2xhc3NOYW1lLFxuXHRcdCAgICBfcHJvcHMkYXR0cmlidXRlczIgPSBwcm9wcy5hdHRyaWJ1dGVzLFxuXHRcdCAgICB0aXRsZSA9IF9wcm9wcyRhdHRyaWJ1dGVzMi50aXRsZSxcblx0XHQgICAgbWVkaWFVUkwgPSBfcHJvcHMkYXR0cmlidXRlczIubWVkaWFVUkwsXG5cdFx0ICAgIGluZ3JlZGllbnRzID0gX3Byb3BzJGF0dHJpYnV0ZXMyLmluZ3JlZGllbnRzLFxuXHRcdCAgICBpbnN0cnVjdGlvbnMgPSBfcHJvcHMkYXR0cmlidXRlczIuaW5zdHJ1Y3Rpb25zO1xuXG5cdFx0cmV0dXJuIHdwLmVsZW1lbnQuY3JlYXRlRWxlbWVudChcblx0XHRcdCdkaXYnLFxuXHRcdFx0eyBjbGFzc05hbWU6IGNsYXNzTmFtZSB9LFxuXHRcdFx0d3AuZWxlbWVudC5jcmVhdGVFbGVtZW50KFJpY2hUZXh0LkNvbnRlbnQsIHsgdGFnTmFtZTogJ2gyJywgdmFsdWU6IHRpdGxlIH0pLFxuXHRcdFx0bWVkaWFVUkwgJiYgd3AuZWxlbWVudC5jcmVhdGVFbGVtZW50KCdpbWcnLCB7IGNsYXNzTmFtZTogJ3JlY2lwZS1pbWFnZScsIHNyYzogbWVkaWFVUkwsIGFsdDogX18oJ1JlY2lwZSBJbWFnZScsICdndXRlbmJlcmctZXhhbXBsZXMnKSB9KSxcblx0XHRcdHdwLmVsZW1lbnQuY3JlYXRlRWxlbWVudChSaWNoVGV4dC5Db250ZW50LCB7IHRhZ05hbWU6ICdoMicsIGNsYXNzTmFtZTogJ2luZ3JlZGllbnRzJywgdmFsdWU6IGluZ3JlZGllbnRzIH0pLFxuXHRcdFx0d3AuZWxlbWVudC5jcmVhdGVFbGVtZW50KFJpY2hUZXh0LkNvbnRlbnQsIHsgdGFnTmFtZTogJ2RpdicsIGNsYXNzTmFtZTogJ3N0ZXBzJywgdmFsdWU6IGluc3RydWN0aW9ucyB9KVxuXHRcdCk7XG5cdH1cbn0pO1xuXG5cbi8vLy8vLy8vLy8vLy8vLy8vL1xuLy8gV0VCUEFDSyBGT09URVJcbi8vIC4vc3JjL2Jsb2NrL2Jsb2NrLmpzXG4vLyBtb2R1bGUgaWQgPSAxXG4vLyBtb2R1bGUgY2h1bmtzID0gMCJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///1\n");

/***/ })
/******/ ]);