
    // Get Public Companies Activate partial view
    $('#notificationsuser').click(function (event) {
        event.preventDefault();
        $.ajax({
        url : "/accountent/notifications_user",
        data: {
    },
        type: 'post',
        dataType: 'json',
        success: function( response )
    {
        $('.main-content').html(response.html);
        $('a').removeClass('active');
        $('#notificationsuser').addClass('active');
        window.history.pushState("", "", "/");
    },
        error: function()
    {
        alert('error...');
    }
    });
    
    });
    
    