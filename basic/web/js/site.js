$(document).ready(function() {

    $( function() {
        var availableTags = [
            "New Orleans",
            "Bangkok",
            "London",
            "Paris",
            "Dubai",
            "New York",
            "Singapore",
            "Kuala Lumpur",
            "Istanbul",
            "Tokyo",
            "Seoul",
            "Hong Kong",
            "Barcelona",
            "Amsterdam",
            "Milan",
            "Taipei",
            "Rome",
            "Osaka",
            "Vienna",
            "Shanghai",
            "Prague",
            "Amman",
            "Austin",
            "St. Petersburg",
            "Berlin",
            "Playa del Carmen",
            "Montreal",
            "Montego Bay"
        ];
        $( "#cities" ).autocomplete({
            source: availableTags,
        });
    } );

});



// HTML document is loaded. DOM is ready.
$(function() {

    // https://css-tricks.com/snippets/jquery/smooth-scrolling/
    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
});

// Load Flexslider when everything is loaded.
$(window).load(function() {

//	For images only
    $('.flexslider').flexslider({
        controlNav: false
    });


});