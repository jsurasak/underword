"use strict";
$(document).ready(function() {
    // $('.theme-loader').addClass('loaded');
    $('.theme-loader').animate({
        'opacity': '0',
    }, 1200);
    setTimeout(function() {
        $('.theme-loader').remove();
    }, 2000);
    // $('.pcoded').addClass('loaded');

    $('body').mousemove(function () {
        var centerX = $('body').width() * 0.5;
        var centerY = $('body').height() * 0.5;
        var rX = (1800 - $('body').width()) * 0.5;
        var diffX = event.pageX - centerX;
        var diffY = event.pageY - centerY;


        $('.ids-background').css({
            'background-position-x': -(diffX * 0.005 - rX) + 'px',
            'background-position-y': (diffY * 0.005) + 'px'
        });

        $('.idr-background').css({
            'background-position-x': (diffX * 0.05) + 'px',
            'background-position-y': (diffY * 0.05) + 'px'
        });
    });

});
