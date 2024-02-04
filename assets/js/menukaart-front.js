(function(window, $) {

    // USE STRICT
    "use strict";

    var mkDetailModal = document.getElementById('mk-detail-modal-id');

    if (mkDetailModal != null) {
        $(document).on('click', '.mk-popup', function(event) {
            event.preventDefault();
            $.ajax({
                url: mkAdminScriptObj.ajaxurl,
                type: "POST",
                data: {
                    action: 'menu_detail_modal',
                    postId: $(this).data('post_id'),
                },
                success: function(data) {
                    $('#mk-detail-modal-id').html(data).modal({
                        fadeDuration: 250,
                        fadeDelay: 1.5
                    });
                }
            });
            return false;
        });
    }
})(window, jQuery);