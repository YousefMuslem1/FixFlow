
    // Get Public Companies Inactivate partial view
    $('#inactivecompanies').click(function (event) {
        event.preventDefault();
        $.ajax({
        url : "/accountent/inactive_companies",
        data: {
    },
        type: 'post',
        dataType: 'json',
        success: function( response )
    {
        $('.main-content').html(response.html);
        $('a').removeClass('active');
        $('#inactivecompanies').addClass('active');
        window.history.pushState("", "", "/");
    },
        error: function()
    {
        alert('error...');
    }
    });
    
    });
    
    