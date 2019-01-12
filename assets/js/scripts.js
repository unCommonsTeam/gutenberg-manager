
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

        // Select/Deselect all Common Blocks
        $('#select-Common').change(function() {
            if(this.checked) {
                $('.form-table.Common input[type=checkbox]').prop("checked", true);
            }else{
                $('.form-table.Common input[type=checkbox]').prop("checked", false);
            }
        });

        // Select/Deselect all Formatting Blocks
        $('#select-Formatting').change(function() {
            if(this.checked) {
                $('.form-table.Formatting input[type=checkbox]').prop("checked", true);
            }else{
                $('.form-table.Formatting input[type=checkbox]').prop("checked", false);
            }
        });

        // Select/Deselect all Layout Blocks
        $('#select-Layout').change(function() {
            if(this.checked) {
                $('.form-table.Layout input[type=checkbox]').prop("checked", true);
            }else{
                $('.form-table.Layout input[type=checkbox]').prop("checked", false);
            }
        });

        // Select/Deselect all Widgets Blocks
        $('#select-Widgets').change(function() {
            if(this.checked) {
                $('.form-table.Widgets input[type=checkbox]').prop("checked", true);
            }else{
                $('.form-table.Widgets input[type=checkbox]').prop("checked", false);
            }
        });

        // Select/Deselect all Embed Blocks
        $('#select-Embed').change(function() {
            if(this.checked) {
                $('.form-table.Embed input[type=checkbox]').prop("checked", true);
            }else{
                $('.form-table.Embed input[type=checkbox]').prop("checked", false);
            }
        });

    });

    window.onbeforeunload = function () {

        if( $warn.val() == 1 ) {
            return true;
        }

    }

});