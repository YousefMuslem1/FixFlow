
    // Get Public Companies Activate partial view
    $('#activecompanies').click(function (event) {
        event.preventDefault();
        $.ajax({
        url : "/accountent/active_companies",
        data: {
    },
        type: 'post',
        dataType: 'json',
        success: function( response )
    {
        $('.main-content').html(response.html);
        $('a').removeClass('active');
        $('#activecompanies').addClass('active');
        window.history.pushState("", "", "/");
    },
        error: function()
    {
        alert('error...');
    }
    });
    
    });
    
    