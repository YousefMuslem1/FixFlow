        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $('#dataTableI').DataTable( {
        language: {
            paginate: {
                next: '<span class="fa fa-arrow-right"></span>',
                previous: '<span class="fa fa-arrow-left"></span>'
            }
        }
    } );
    $('#dataTableA').DataTable( {
    language: {
    paginate: {
    next: '<span class="fa fa-arrow-right"></span>',
    previous: '<span class="fa fa-arrow-left"></span>'
}
}
} );

// Reset inputs in modal after hiden from user
    $('.modal').on('hidden.bs.modal', function (e) {
    $(this).find("input").val('').end()
    $('#passwordError').text('');
    $('#usernameError').text('');
})

    $('#addNewAccountent').on('submit', function (event) {
    event.preventDefault();
    let us = $('#username').val();
    let pa = $('#password').val();

    $.ajax({
    url: "/admin/accountent",
    type: "POST",
    data: {
    username: us,
    password: pa,
},
    success: function (response) {
    $('.modal').modal('hide');
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'New Accountant Has Been Added Successfully!',
    showConfirmButton: false,
    timer: 2500
});
    location.reload();
    console.log(response);
},

    error: function (response) {
    if (response.responseJSON.errors.username)
    $('#usernameError').text(response.responseJSON.errors.username);
    else $('#usernameError').text('');
    if (response.responseJSON.errors.password)
    $('#passwordError').text(response.responseJSON.errors.password);
    else
    $('#passwordError').text('');

    Swal.fire({
    title: 'Error!',
    text: 'Error prevent to continue',
    icon: 'error',
    confirmButtonText: 'OK'
})
}

});


});
