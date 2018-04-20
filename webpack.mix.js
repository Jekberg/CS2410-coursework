let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

/**
 * The directotry containing the js files to compile.
 */
const SOURCE_JS = "resources/assets/js/";
/**
 * The directotry containing the scss files to compile.
 */
const SOURCE_SASS = "resources/assets/sass/";
/**
 * The directory to output the compiled js files to.
 */
const TARGET_JS = "public/js";
/**
 * The directory to output the compiled css files to.
 */
const TARGET_CSS = "public/css";

mix.react(SOURCE_JS + "app.js", TARGET_JS)
	.js(SOURCE_JS + "event_form.js", TARGET_JS)
	.js(SOURCE_JS + "events.js", TARGET_JS)
	.js(SOURCE_JS + "view_main_table.js", TARGET_JS)
	.sass(SOURCE_SASS + "app.scss", TARGET_CSS)
	.sass(SOURCE_SASS + "cell.scss", TARGET_CSS);
