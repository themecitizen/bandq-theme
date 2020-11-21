(function ($) {
    "use strict";
    /**
     * Metabox display field when select post type
     */
    var metaboxContainer = $('#post-format-settings'),
        currentFormat = wp.data.select( 'core/editor' ).getCurrentPostType();    
        metaboxContainer.hide();

    wp.data.subscribe(() => { 
        var newFormat = wp.data.select( 'core/editor' ).getEditedPostAttribute('format');
        if(newFormat === 'standard') {
            metaboxContainer.hide();
        }
        else {
            metaboxContainer.show();
        }
        if(newFormat !== currentFormat) {
            metaboxContainer.find('.rwmb-field').hide();
            metaboxContainer.find('.' + newFormat).show();
        }
    });
})(jQuery);