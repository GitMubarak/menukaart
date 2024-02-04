(function(window, $) {

    // USE STRICT
    "use strict";

    var mkDetailModal = document.getElementById('mk-detail-modal-id');

    if (mkDetailModal != null) {
        $(document).on('click', '.menukaart-menu-name', function(event) {
            event.preventDefault();
            $.ajax({
                url: mkAdminScriptObj.ajaxurl,
                type: "POST",
                data: {
                    action: 'menu_detail_modal',
                    postId: $(this).data('post_id'),
                },
                success: function(data) {
                        //$(newHTML).appendTo('body').modal();
                        $('#mk-detail-modal-id').html(data).modal({
                            fadeDuration: 250,
                            fadeDelay: 1.5
                        });
                    }
                    /*
                    $('#mk-detail-modal-id').modal({
                        fadeDuration: 250,
                        fadeDelay: 1.5
                    });*/
            });
            return false;
        });
    }
})(window, jQuery);