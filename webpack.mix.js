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

// mix.js('resources/assets/js/app.js', 'assets/app.js')
mix.js([
				'resources/assets/js/app.js',
				'node_modules/formvalidation/dist/js/framework/bootstrap.js',
	], 'assets/js/app.js')
	.combine([
				'assets/app.js',
				'resources/assets/js/ucwords/ucwords.js',
				// cookies-alert-plugin
				'assets/cookies-alert-plugin/cookies-alert-core.js',
				'assets/cookies-alert-plugin/cookies-alert-script.js',
				// dropdown
				'assets/dropdown/js/script.min.js',
				// formoid
				'assets/formoid/formoid.min.js',
				// gallery
				'assets/gallery/script.js',
				'assets/gallery/player.min.js',
				// slidervideo
				'assets/slidervideo/script.js',
				// theme
				'assets/theme/js/script.js',
				// viewportchecker
				'assets/viewportchecker/jquery.viewportchecker.js',
		], 'assets/js/app.js')
	
	// .js('resources/assets/js/lch.js', 'assets/ucwords.js')
	// .js('resources/assets/js/tch.js', 'assets/ucwords.js')
	// .js('resources/assets/js/uch.js', 'assets/ucwords.js')
	// .js('resources/assets/js/word.js', 'assets/ucwords.js')
	// .js('node_modules/ckeditor/adapters/jquery.js', 'assets/ckeditor.js')
	.sass('resources/assets/sass/app.scss', 'assets/css/app.css')
	.combine([
				'assets/app.css',
				'node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css',
				'node_modules/formvalidation/dist/css/formValidation.css',
				'node_modules/select2/dist/css/select2.css',
				'node_modules/select2-bootstrap4-theme/dist/select2-bootstrap4.css',
				// animate
				'assets/animatecss/animate.min.css',
				// dropdown
				'assets/dropdown/css/style.css',
				// gallery
				'assets/gallery/style.css',
				// socicon
				'assets/socicon/css/styles.css',
				// theme
				'assets/theme/css/style.css',
				// bootstrap-datepicker
				'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.css',
				// @claviska/jquery-minicolors
				'node_modules/@claviska/jquery-minicolors/jquery.jquery.minicolors.css',
				// sweetalert
				'assets/sweet-alert/css/sweetalert.css',

		], 'assets/css/app.css')
	// .styles('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css', 'assets/dataTables.css')
	// .styles('node_modules/formvalidation/dist/css/formValidation.css', 'assets/formValidation.css')
	.setPublicPath('./public')
	;