(function(window, $) {

    $( document ).ready( function ( e ) {
        $("#post-sharing").jsSocials({
            shares: ["email", "facebook", "twitter", "googleplus", "pinterest", "stumbleupon"],
            url: $("#post-sharing").data('share-url'),
            text: "Check out this post: " + $("#post-sharing").data('share-title'),
            showLabel: false,
            showCount: false,
            shareIn: "popup"
        });
    });

}(window, jQuery));