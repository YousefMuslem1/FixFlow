<!-- Get Statistics -->
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
    $('#statistics').click( function (event) {
    event.preventDefault();
    console.log('clicked')
    $.ajax({
    url: '/admin/statistics',
    type: "post",
    data: {},
    beforeSend:function(){
},
    success: function (response) {
    $('.main-content').html(response.html)
},

    error: function (response) {


}

});
});

