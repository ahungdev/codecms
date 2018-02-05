$(document).ready(function () {
    BE.init();
});

var BE = {
    init: function () {
        $('.summernote').summernote({
            height: 300
        });

        $('.btn-picture').on('click', function (evt) {
            evt.preventDefault();
            var obj = $(this);
			$.ajax({
				url: _siteURL + '/media',
				dataType: 'html',
				success: function(data) {
					$('.modal-media').html(data);
                    $('.modal-media').modal('show');
				}
			});
			obj.popover('hide');
        });

        $('.btn-remove').on('click', function (evt) {
            evt.preventDefault();
            var img = $('[data-name="thumb"]'),
                src = img.data('thumb');
            img.attr('src', src);
        });

        $('[data-name="thumb"]').on('click', function() {
            var obj = $(this),
                thumb = obj.data('name'),
                target = obj.next().data('name');

			$.ajax({
        		url: _siteURL + '/media?target=' + target + '&thumb=' + thumb,
				dataType: 'html',
				success: function(data) {
					$('.modal-media').html(data);
					$('.modal-media').modal('show');
				}
     		});
			obj.popover('hide');
		});
    }
};