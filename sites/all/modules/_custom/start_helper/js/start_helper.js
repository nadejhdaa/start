(function ($) {
	Drupal.behaviors.ModalClickCloseReload = {
    attach: function(context, settings) {
    $('.ctools-modal-content .form-submit').bind('click', function() {
                location.reload();
            });
    }
    };
})(jQuery);