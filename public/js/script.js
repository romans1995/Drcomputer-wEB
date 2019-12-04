$('.add-to-cart-btn').on('click', function () {
    var pid = $(this).data('pid');

    $.ajax({
        url: BASE_URL + 'shop/add-to-cart',
        type: 'GET',
        dataType: 'html',
        data: {
            pid: $(this).data('pid')
        },
        success: function () {
            window.location.reload();
        }
    });

});

 




