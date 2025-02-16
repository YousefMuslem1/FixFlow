
// Show Hide Edit Amount Field
jQuery(document).ready(function () {
    jQuery('#showhide').on('click', function (event) {
        jQuery('#content').toggle('show');
    });
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//Payment Process from for rejection request
$('#paymentRejectProcessForm').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "/accountent/payment_reject_process",
        type: "POST",
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            return confirm("Are you sure?");
        },
        success: function (response) {

            $.ajax({
                url: "/accountent/payment_partial_view",
                type: 'post',
                dataType: 'json',
                data: {
                    'payment': $('#notification').val()
                },
                success: function (response) {
                    $('.main-content').html(response.html);
                }

            })

            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'The Payment Request Has Been Rejected Successfully!',
                showConfirmButton: 'OK',
            })
        },

        error: function (response) {


            Swal.fire({
                title: 'Error!',
                text: 'Something Was Wrong !!',
                icon: 'error',
                confirmButtonText: 'OK'
            })
        }

    });
});
//Payment Process form for accepting request
$('#paymentProcessForm').on('submit', function (event) {
    event.preventDefault();
    $.ajax({
        url: "/accountent/payment_accept_process",
        type: "POST",
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            return confirm("Are you sure?");
        },
        success: function (response) {

            $.ajax({
                url: "/accountent/payment_partial_view",
                type: 'post',
                dataType: 'json',
                data: {
                    'payment': $('#notification').val()
                },
                success: function (response) {
                    $('.main-content').html(response.html);
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'The Payment Request Has Been Accepted Successfully',
                        showConfirmButton: 'OK',
                    })
                }

            })


        },

        error: function (response) {
            $('#errorAmount').text(response.responseJSON.errors.payment_edit)
            Swal.fire({
                title: 'Error!',
                text: 'Something Was Wrong !!',
                icon: 'error',
                confirmButtonText: 'OK'
            })
        }

    });
});


