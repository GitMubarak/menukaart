(function($) {

    // USE STRICT
    "use strict";

    var menukaartColorPicker = ['#menukaart_navigation_icon_color', '#menukaart_navigation_hover_bg_color', '#menukaart_pagination_color', '#menukaart_pagination_active_color', '#menukaart_button_text_color'];

    $.each(menukaartColorPicker, function(index, value) {
        $(value).wpColorPicker();
    });

    $('.menukaart-closebtn').on('click', function() {
        this.parentElement.style.display = 'none';
    });

})(jQuery);