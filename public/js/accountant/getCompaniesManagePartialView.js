    // Get Accountent Companies Manage
    $('#accountentManageAll').click(function (event) {
    event.preventDefault();
    $.ajax({
    url : '/accountent/manage_managers',
    data: {
},
    type: 'post',
    dataType: 'json',
    success: function( response )
{
    $('.main-content').html(response.html);
    $('a').removeClass('active');
    $('#accountentManageAll').addClass('active');
    window.history.pushState("", "", "/");
},
    error: function()
{
    alert('error...');
}
});

});

