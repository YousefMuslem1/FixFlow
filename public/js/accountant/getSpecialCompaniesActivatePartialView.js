
    // Get Public Companies Activate partial view
    $('#activescompanies').click(function (event) {
        event.preventDefault();
        $.ajax({
        url : "/accountent/active_special_companies",
        data: {
    },
        type: 'post',
        dataType: 'json',
        success: function( response )
    {
        $('.main-content').html(response.html);
        $('a').removeClass('active');
        $('#activescompanies').addClass('active');
        // window.history.pushState("", "", "/");
    },
        error: function()
    {
        alert('error...');
    }
    });

    });

