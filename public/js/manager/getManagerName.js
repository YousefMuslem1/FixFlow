
    $(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
    url: '/manager/manager',
    method:'POST',
    success : function(response){
    $('.profileName').text(response.name)
},
    error : function (response) {
}
});
});

