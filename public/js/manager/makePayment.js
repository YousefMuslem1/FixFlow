
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    // Reset inputs in modal after hiden from user
    $('.modal').on('hidden.bs.modal', function (e) {
        $(this).find("input").val('').end();
        $(this).find("textarea").val('').end()
    
        $('#errorPassword').text('');
        $('#errorAmount').text('');
        $('#password').removeClass('border-danger');
        $('#moneyAmount').removeClass('border-danger');
    
    });
        // Send Pay Request
        $('#makePay').on('submit', function (event) {
        event.preventDefault();
        $.ajax({
        url : '/manager/make_payment',
        type: 'post',
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function( response )
    {
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'New Payment Added Successfully!',
        showConfirmButton: 'OK',
    })
        $('.modal').modal('toggle');
        // window.history.pushState("", "", "/");
    },
        error: function(response)
    {
        if(response.responseJSON.errors.companycapital) {
        Swal.fire({
        title: 'Error!',
        text: response.responseJSON.errors.companycapital,
        icon: 'error',
        confirmButtonText: 'OK'
    })
    } else {
        if (response.responseJSON.errors.password) {
        $('#errorPassword').text(response.responseJSON.errors.password);
        $('#password').addClass('border-danger');
    } else {
        $('#errorPassword').text('');
        $('#password').removeClass('border-danger');
    }
        if (response.responseJSON.errors.amount) {
        $('#errorAmount').text(response.responseJSON.errors.amount);
        $('#moneyAmount').addClass('border-danger');
    } else {
        $('#errorAmount').text('');
        $('#moneyAmount').removeClass('border-danger');
    }
        Swal.fire({
        title: 'Error!',
        text: 'You Must Fill All Required Fields!',
        icon: 'error',
        confirmButtonText: 'OK'
    })
    }
    
    }
    });
    });
    