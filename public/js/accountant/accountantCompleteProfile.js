$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$('#pro-com').on('submit', function (event) {
    event.preventDefault();

    $.ajax({
        url: $('#name').data('ro'),
        type: "POST",
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Your Profile Updated Successfully! You Will Redirect To Home Page',
                showConfirmButton: false,
                timer: 1500
            })
            window.location.href = $('#name').data('home')
            console.log(response);
        },

        error: function (response) {

            if (response.responseJSON.errors.name) {
                $('#errorName').text(response.responseJSON.errors.name);
                $('#name').addClass('border-danger');
            } else {
                $('#errorName').text('');
                $('#name').removeClass('border-danger');
            }
            if (response.responseJSON.errors.email ) {
                $('#errorEmail').text(response.responseJSON.errors.email);
                $('#email').addClass('border-danger');
            } else {
                $('#errorEmail').text('');
                $('#email').removeClass('border-danger');
            }
            if (response.responseJSON.errors.phone) {
                $('#errorPhone').text(response.responseJSON.errors.phone);
                $('#phone').addClass('border-danger');
            } else {
                $('#errorPhone').text('');
                $('#phone').removeClass('border-danger');
            }
            if (response.responseJSON.errors.address ) {
                $('#errorAddress').text(response.responseJSON.errors.address);
                $('#address').addClass('border-danger');
            } else {
                $('#errorAddress').text('');
                $('#address').removeClass('border-danger');
            }
            if (response.responseJSON.errors.iban_name ) {
                $('#errorIbanName').text(response.responseJSON.errors.iban_name);
                $('#iban_name').addClass('border-danger');
            } else {
                $('#errorIbanName').text('');
                $('#iban_name').removeClass('border-danger');
            }
            if (response.responseJSON.errors.bank_name ) {
                $('#errorBankName').text(response.responseJSON.errors.bank_name);
                $('#bank_name').addClass('border-danger');
            } else {
                $('#errorBankName').text('');
                $('#bank_name').removeClass('border-danger');
            }
            if (response.responseJSON.errors.iban )  {
                $('#errorAccountNum').text(response.responseJSON.errors.iban);
                $('#iban').addClass('border-danger');
            } else {
                $('#errorAccountNum').text('');
                $('#iban').removeClass('border-danger');
            }
            if (response.responseJSON.errors.passwordError) {
                $('#errorOldPassword').text(response.responseJSON.errors.passwordError);
                $('#old-password').addClass('border-danger');
            } else {
                $('#errorOldPassword').text('');
                $('#old-password').removeClass('border-danger');
            }
            if (response.responseJSON.errors.password) {
                $('#errorNewPassword').text(response.responseJSON.errors.password);
                $('#new-password').addClass('border-danger');
            } else {
                $('#errorNewPassword').text('');
                $('#new-password').removeClass('border-danger');
            }
            Swal.fire({
                title: 'Error!',
                text: 'You Must Fill All Required Fields!',
                icon: 'error',
                confirmButtonText: 'OK'
            })
        }

    });
});
