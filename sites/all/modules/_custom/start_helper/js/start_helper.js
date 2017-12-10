(function ($) {
	Drupal.behaviors.ModalClickCloseReload = {
    attach: function(context, settings) {
    $('.ctools-use-modal-processed .form-submit').bind('click', function() {
                location.reload();
                console.log('test');
            });
    }
    };
})(jQuery);