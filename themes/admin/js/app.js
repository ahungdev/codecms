$(document).ready(function () {
    BE.init();
});

var BODY = $('body'),
    WINDOW = $(window),
    DOCUMENT = $(document),
    WIN_WIDTH = WINDOW.width(),
    WIN_HEIGHT = WINDOW.height(),
    DOC_WIDTH = DOCUMENT.width(),
    DOC_HEIGHT = DOCUMENT.height();

var CLASS = {
    _active: 'active',
    _show: 'show'
};

var BE = {
    init: function () {
        BE.message();
    },

    message: function () {
        $('[data-dismiss="message"]').on('click', function () {
            var obj = $(this);
            elMessage = obj.parent();
            elMessage.remove();
        });
    },
}