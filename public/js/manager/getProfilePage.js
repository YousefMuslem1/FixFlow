// Get Accountent Profile Partial Page
$('#myProfile').click(function (event) {
    event.preventDefault();
    $.ajax({
        url : '/manager/manager_profile',
        data: {
        },
        type: 'post',
        dataType: 'json',
        success: function( response )
        {
            $('.main-content').html(response.html);
            $('a').removeClass('active');
            $('#accountentProfile').addClass('active');
            window.history.pushState("", "", "/");
        },
        error: function()
        {
            alert('error...');
        }
    });

});
