
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{ asset('img/avatar.png') }}"
                                         alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center profileName">{{ $accountent->name }}</h3>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Special Companies </b> <a class="float-right">{{$spe_comp}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Public Companies</b> <a class="float-right">{{$pub_comp}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>All Cash Payments</b> <a class="float-right">{{$cash}}</a>
                                    </li>
                                </ul>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item active"><a class="nav-link" href="#bankAccount" data-toggle="tab">Edit
                                            Bank Account</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit
                                            Profile</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- /.tab-pane -->
                                    <!-- Bank Account -->
                                    <div class="tab-pane active" id="bankAccount">
                                        <form class="form-horizontal" id="updateBankDetails">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-12 col-md-8">
                                                    <div class="form-group">
                                                        <label for="bankName">Bank Name</label>
                                                        <input type="text" class="form-control" id="bankName" name="bank_name"
                                                               value="{{ $accountent->bank_name }}">
                                                        <p id="errorBankName" class="text-danger"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-8">
                                                    <div class="form-group">
                                                        <label for="ibanName">Account Holder's Name</label>
                                                        <input type="text" class="form-control" id="ibanName" name="iban_name"
                                                               value="{{ $accountent->iban_name }}">
                                                        <p id="errorIbanName" class="text-danger"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-8">
                                                    <div class="form-group">
                                                        <label for="iban">IBAN</label>
                                                        <input type="text" class="form-control" id="iban" name="iban"
                                                               value="{{ $accountent->iban }}">
                                                        <p id="errorAccountNum" class="text-danger"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-8">
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <p class="text-muted">To Save Changes Enter Your Password</p>
                                                        <input type="password" class="form-control" id="password" name="password">
                                                        <p id="errorPassword" class="text-danger"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                    <!-- /.Bank Account -->

                                    <div class="tab-pane" id="settings">
                                        <form class="form-horizontal" id="updateProfile">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-12 col-md-8">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control" id="name" name="name"
                                                               value="{{ $accountent->name }}" data-routeusername="{{route('accountent.name')}}" data-routeupdatebank="{{route('accountent.update-bank')}}" data-routeupdateprofile="{{route('accountent.update-profile')}}">
                                                        <p id="errorName" class="text-danger"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-8">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="text" class="form-control" id="email" name="email"
                                                               value="{{ $accountent->email }}">
                                                        <p id="errorEmail" class="text-danger"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-8">
                                                    <div class="form-group">
                                                        <label for="phone">Phone</label>
                                                        <input type="text" class="form-control" id="phone" name="phone"
                                                               value="{{ $accountent->phone }}">
                                                        <p id="errorPhone" class="text-danger"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-8">
                                                    <div class="form-group">
                                                        <label for="phone">Address</label>
                                                        <textarea class="form-control" id="address" name="address"
                                                                  cols="30"
                                                                  rows="4">{{ $accountent->address }}</textarea>
                                                        <p id="errorAddress" class="text-danger"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

{{--    /update profile request--}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#updateProfile').on('submit', function (event) {
            event.preventDefault();

            $.ajax({
                url: $('#name').data('routeupdateprofile'),
                type: "POST",
                data: new FormData(this),
                cache: false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    return confirm("Are you sure?");
                },
                success: function (response) {
                    $('#errorName').text('');
                    $('#name').removeClass('border-danger');
                    $('#errorEmail').text('');
                    $('#email').removeClass('border-danger');
                    $('#errorPhone').text('');
                    $('#phone').removeClass('border-danger');
                    $('#errorAddress').text('');
                    $('#address').removeClass('border-danger');
                    $('.profile-username, .profileName').text(response.name);
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Your Profile Updated Successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                },

                error: function (response) {

                    if (response.responseJSON.errors.name) {
                        $('#errorName').text(response.responseJSON.errors.name);
                        $('#name').addClass('border-danger');
                    } else {
                        $('#errorName').text('');
                        $('#name').removeClass('border-danger');
                    }
                    if (response.responseJSON.errors.email) {
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

                    Swal.fire({
                        title: 'Error!',
                        text: 'You Must Fill All Required Fields!',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })
                }

            });
        });

    </script>
{{--    / update bank details--}}
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#updateBankDetails').on('submit', function (event) {
            event.preventDefault();

            $.ajax({
                url: $('#name').data('routeupdatebank'),
                type: "POST",
                data: new FormData(this),
                cache: false,
                contentType: false,
                processData: false,
                beforeSend:function(){
                    return confirm("Are you sure?");
                },
                success: function (response) {
                    $('#errorPassword').text('');
                    $('#password').val('').removeClass('border-danger');
                    $('#errorAccountNum').text('');
                    $('#iban').removeClass('border-danger');
                    $('#errorIbanName').text('');
                    $('#iban_name').removeClass('border-danger');
                    $('#errorBankName').text('');
                    $('#bank_name').removeClass('border-danger');
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Your Profile Updated Successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                },

                error: function (response) {

                    if (response.responseJSON.errors.bank_name ) {
                        $('#errorBankName').text(response.responseJSON.errors.bank_name);
                        $('#bank_name').addClass('border-danger');
                    } else {
                        $('#errorBankName').text('');
                        $('#bank_name').removeClass('border-danger');
                    }

                    if (response.responseJSON.errors.iban_name ) {
                        $('#errorIbanName').text(response.responseJSON.errors.iban_name);
                        $('#iban_name').addClass('border-danger');
                    } else {
                        $('#errorIbanName').text('');
                        $('#iban_name').removeClass('border-danger');
                    }

                    if (response.responseJSON.errors.iban )  {
                        $('#errorAccountNum').text(response.responseJSON.errors.iban);
                        $('#iban').addClass('border-danger');
                    } else {
                        $('#errorAccountNum').text('');
                        $('#iban').removeClass('border-danger');
                    }
                    if (response.responseJSON.errors.passwordError) {
                        $('#errorPassword').text(response.responseJSON.errors.passwordError);
                        $('#password').addClass('border-danger');
                    } else {
                        $('#errorPassword').text('');
                        $('#password').removeClass('border-danger');
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

    </script>
