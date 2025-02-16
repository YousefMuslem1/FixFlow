// Get add public manager for current company
        $('#PublicManager').click(function (event) {
        event.preventDefault();
        $.ajax({
        url : '/accountent/add_company_manager',
        data: {
    },
        type: 'post',
        dataType: 'json',
        success: function( response )
    {
        $('.main-content').html(response.html);
        $('a').removeClass('active');
        $('#PublicManager').addClass('active').css({"color": '#FFF'});
        window.history.pushState("", "", "/");
    },
        error: function()
    {
        alert('error...');
    }
    });

    });
