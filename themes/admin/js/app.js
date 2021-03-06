$(document).ready(function () {
    BE.init();
});

var BE = {
    init: function () {
        $('.summernote').summernote({
            height: 350
        });

        $('select').select2({
    		width: '100%'
    	});

        $('[data-toggle="tooltip"]').tooltip();

        $('.btn-picture').on('click', function (evt) {
            evt.preventDefault();
            var obj = $(this);
            $('.loader').show();
			$.ajax({
				url: _siteURL + '/media',
				dataType: 'html',
				success: function(data) {
					$('.modal-media').html(data);
                    $('.modal-media').modal('show');
                    $('.loader').hide();
				}
			});
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

            $('.loader').show();
			$.ajax({
        		url: _siteURL + '/media?target=' + target + '&thumb=' + thumb,
				dataType: 'html',
				success: function(data) {
					$('.modal-media').html(data);
					$('.modal-media').modal('show');
                    $('.loader').hide();
				}
     		});
		});
    }
};
