(function ($) {
	Drupal.behaviors.ModalClickCloseReload = {
    attach: function(context, settings) {
    $('.close').bind('click', function() {
                location.reload();
            });
    }
    };
})(jQuery);