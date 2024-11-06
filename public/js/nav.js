$(document).ready(function() {

    $('#icon-menu').click(function () {
        openMenu();
    });

    $(document).click(function(event) {
        if (!$(event.target).closest('nav').length && !$(event.target).closest('#icon-menu').length) {
            closeMenu();
        }
    });

    function openMenu() {
        $('.navigation-hamburger').css("filter", "blur(2px)");
        $('.item-back-button').css("filter", "blur(2px)");
        $('article').css("filter", "blur(2px)");
        $('nav').css({'display': 'flex'});
    }

    function closeMenu() {
        $('.navigation-hamburger').css("filter", "none");
        $('.item-back-button').css("filter", "none");
        $('article').css("filter", "none");
        $('nav').css({'display': 'none'});
    }

});