
    // Get Public Companies Activate partial view
    $('#inactivescompanies').click(function (event) {
        event.preventDefault();
        $.ajax({
        url : "/accountent/inactive_special_companies",
        data: {
    },
        type: 'post',
        dataType: 'json',
        success: function( response )
    {
        $('.main-content').html(response.html);
        $('a').removeClass('active');
        $('#inactivescompanies').addClass('active');
        window.history.pushState("", "", "/");
    },
        error: function()
    {
        alert('error...');
    }
    });
    
    });
    
    