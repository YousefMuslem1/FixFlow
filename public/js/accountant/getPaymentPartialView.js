$(".dropdown-item").click(function() {
    $(".notifications-menu").dropdown('show');
});
// Send Pay Request
$('.paymentRequest').on('click', function (event) {

    event.preventDefault();
    $.ajax({
        url : '/accountent/payment_partial_view',
        type: 'post',
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function( res )
        {
            $('.main-content').html(res.html);
            window.history.pushState("", "", "/");
            // $.ajax({
            //     url: "/accountent/notification",
            //     type: 'post',
            //     dataType: 'json',
            //     data: {
            //     },
            //     success: function (response) {
            //         $('.main-notification').empty().html(response.html);
            //     }
            //
            // })

        },
        error: function(response)
        {

        }

    });
});

