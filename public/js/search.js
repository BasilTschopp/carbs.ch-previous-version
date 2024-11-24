$(document).ready(function() {

    $('#search-food').on('input', function() {

        var searchTerm = $(this).val().toLowerCase();

        $('#item-titles-container .item-selection').each(function() {
            var itemName = $(this).find('.item-name').text().toLowerCase();
            if (itemName.includes(searchTerm)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

});
