<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Accountant Complete Info</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<style>
    body {
        background-image: url("{{ asset('img/complete-profile-accountant.svg') }}");
        background-size: cover;
    }

    /* Hide Arrow form input type number */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        /* display: none; <- Crashes Chrome on hover */
        -webkit-appearance: none;
        margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
    }

    input[type=number] {
        -moz-appearance: textfield; /* Firefox */
    }

</style>
<body>

<div class="container">

    <div class="row justify-content-center mt-5">

        <div class="col-md-8 col-sm-12">
            @if( session()->has('errorComplete') )
                <div class="alert alert-danger">
                    {{ session()->get('errorComplete')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4 class="lead">Fill All Required Fields</h4>
                </div>
                <div class="card-body">
                    <form id="pro-com" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-md-9">
                                <div class="form-group">
                                <!-- {{route('accountent.process-acc-complete')}} -->
                                    <label for="name" class="lead">Full Name <span
                                            class="text-danger text-bold">*</span></label>
                                    <input type="text" class="form-control " name="name" id="name"
                                           autocomplete="off" autofocus data-ro="{{route('accountent.process-acc-complete')}}" data-home="{{route('accountent.home')}}"
                                    >
                                    <p id="errorName" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-9">
                                <div class="form-group">
                                    <label for="email" class="lead">Email <span
                                            class="text-danger text-bold">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email"
                                           autocomplete="off"
                                    >
                                    <p id="errorEmail" class="text-danger"></p>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-9">

                                <div class="form-group">
                                    <label for="text" class="lead">Your Current Address <span
                                            class="text-danger text-bold">*</span></label>
                                    <textarea class="form-control" name="address" id="address" cols="30"
                                              rows="5"></textarea>
                                    <p id="errorAddress" class="text-danger"></p>
                                    <i class="fa fa-vie"></i>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-9">

                                <div class="form-group">
                                    <label for="phone" class="lead">Phone <span
                                            class="text-danger text-bold">*</span></label>
                                    <input type="tel" class="form-control" name="phone" id="phone"
                                           autocomplete="off"
                                    >
                                    <p id="errorPhone" class="text-danger"></p>

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-9">
                                <fieldset class="border p-2 border-info">
                                    <legend class="w-auto"><span class="p-2 lead"> Bank Info </span><span
                                            class="text-danger text-bold">*</span></legend>
                                    <div class="form-group">
                                        <label for="bank_name" class="lead"> Bank Name </label>
                                        <input type="text" class="form-control" name="bank_name" id="bank_name"
                                               autocomplete="off">
                                        <p id="errorBankName" class="text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="iban_name" class="lead"> Account Holder's Name </label>
                                        <input type="text" class="form-control" name="iban_name" id="iban_name"
                                               autocomplete="off">
                                        <p id="errorIbanName" class="text-danger"></p>

                                    </div>
                                    <div class="form-group">
                                        <label for="iban" class="lead"> Account Number</label>
                                        <input type="text" class="form-control" name="iban" id="iban"
                                               autocomplete="off"
                                        >
                                        <p id="errorAccountNum" class="text-danger"></p>

                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-sm-12 col-md-9">
                                <fieldset class="border p-2 border-success">
                                    <legend class="w-auto"><span class="p-2 lead"> Update Password <span class="text-muted"> (Optional)</span> </span>  </legend>
                                    <div class="form-group">
                                        <label for="old-password" class="lead">Enter old password</label>
                                        <input type="password" class="form-control" id="old" name="old" autocomplete="off">
                                        <p id="errorOldPassword" class="text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="new-password" class="lead">Enter new password</label>
                                        <input type="password" class="form-control" id="new-password" name="password" autocomplete="off">
                                        <p id="errorNewPassword" class="text-danger"></p>

                                    </div>

                                </fieldset>
                            </div>

                        </div>

                        <button type="submit" id="save" class="btn btn-success w-25 mt-2">Save</button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{ asset('js/accountant/accountantCompleteProfile.js') }}"></script>
<script>
</script>
</body>
</html>
