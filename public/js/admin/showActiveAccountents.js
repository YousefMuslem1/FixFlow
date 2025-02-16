
    // Get Public Companies Activate partial view
    $('#showActiveAccountents').click(function (event) {
    event.preventDefault();
    console.log('Clicked from active accountents');
    $.ajax({
    url : "/admin/active_accountents",
    data: {
},
    type: 'post',
    dataType: 'json',
    success: function( response )
{
    $('.main-content').html(response.html);
    $('a').removeClass('active');
    $('#activecompanies').addClass('active');
    // window.history.pushState("", "", "/");
},
    error: function()
{
    alert('error...');
}
});

});


