/**
 * No-op stubs para vendors del theme no cargados en la página.
 * Evita errores en app.js (obfuscado) cuando faltan lightGallery, Tipped, etc.
 */
(function (window) {
    'use strict';

    if (typeof window.lightGallery === 'undefined') {
        window.lightGallery = function () {
            return { destroy: function () {} };
        };
    }

    if (typeof window.Tipped === 'undefined') {
        window.Tipped = {
            create: function () {},
            remove: function () {},
        };
    }

    if (typeof window.SVGInject === 'undefined') {
        window.SVGInject = function () {};
    }

    var $ = window.jQuery;
    if (!$) {
        return;
    }

    if (!$.fn.magnificPopup) {
        $.fn.magnificPopup = function () {
            return this;
        };
    }

    if (!$.fn.slider) {
        $.fn.slider = function () {
            return this;
        };
    }

    if (!$.fn.isotope) {
        $.fn.isotope = function () {
            return this;
        };
    }

    if (!$.fn.countdown) {
        $.fn.countdown = function () {
            return this;
        };
    }
})(window);
