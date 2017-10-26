(function(window, $) {

    $( document ).ready( function ( e ) {
        $("#post-sharing").jsSocials({
            shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"],
            url: $("#post-sharing").data('share-url'),
            text: "Check out this post: " + $("#post-sharing").data('share-title'),
            showLabel: false,
            showCount: false,
            shareIn: "popup",
            css: "custom-class",
        });
    });

}(window, jQuery));