(function ($) {
	Drupal.behaviors.ModalClickCloseReload = {
    attach: function(context, settings) {
    $('.ctools-modal-content').find('.form-submit').bind('click', function() {
                location.reload();
                console.log('test');
            });
    }
    };
})(jQuery);