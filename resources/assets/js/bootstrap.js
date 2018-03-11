
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');
    require('popper.js');
    require('bootstrap');
    require('bootstrap-carousel-swipe');
    require('bootstrap-datepicker');
    require('datatables.net-bs4');
	require('formvalidation');
	require('select2');
	require('imagesloaded');
	require('masonry-layout');
	require('@claviska/jquery-minicolors');
	require('jarallax');
	require('smoothscroll-for-websites');
	require('social-likes-next');
	require('sweetalert');
	require('tether');
	require('jquery-touchswipe');
	require('jquery.mb.vimeo_player');
} catch (e) {}
