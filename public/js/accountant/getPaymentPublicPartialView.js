
    // Get Public Companies Activate partial view
    $('#publicpaymentcompanies').click(function (event) {
        event.preventDefault();
        $.ajax({
        url : "/accountent/public_payment_companies",
        data: {
    },
        type: 'post',
        dataType: 'json',
        success: function( response )
    {
        $('.main-content').html(response.html);
        $('a').removeClass('active');
        $('#publicpaymentcompanies').addClass('active');
        window.history.pushState("", "", "/");
    },
        error: function()
    {
        alert('error...');
    }
    });
    
    });
    
    