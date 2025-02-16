
    // Get Public Companies Activate partial view
    $('#specialpaymentcompanies').click(function (event) {
        event.preventDefault();
        $.ajax({
        url : "/accountent/special_payment_companies",
        data: {
    },
        type: 'post',
        dataType: 'json',
        success: function( response )
    {
        $('.main-content').html(response.html);
        $('a').removeClass('active');
        $('#specialpaymentcompanies').addClass('active');
        window.history.pushState("", "", "/");
    },
        error: function()
    {
        alert('error...');
    }
    });
    
    });
    
    