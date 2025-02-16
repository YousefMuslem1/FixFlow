    // Get Accountent Profile Partial Page
    $('#accountentProfile').click(function (event) {
    event.preventDefault();
    $.ajax({
    url : '/accountent/accountent_profile',
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

