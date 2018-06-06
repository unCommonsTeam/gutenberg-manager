
/**
/* Gutenberg Manager Scripts
* @since 1.0
*/

jQuery(function($) {

    "use strict";

    // Options save warning
    var $warn = $('input[name=warn]');

    $(document).ready(function() {

        $('.gm-options-form input').change(function() {
            $warn.val('1');
        });

        $('.gm-options-form').submit(function () {
            $warn.val('0');
        });

    });

    window.onbeforeunload = function () {

        if( $warn.val() == 1 ) {
            return true;
        }

    }

});