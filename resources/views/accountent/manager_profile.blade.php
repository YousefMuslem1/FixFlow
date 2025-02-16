<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>My Profile</h1>
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

                            <h3 class="profile-username text-center profileName"></h3>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Followers</b> <a class="float-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Following</b> <a class="float-right">543</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Friends</b> <a class="float-right">13,287</a>
                                </li>
                            </ul>

                            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills ">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a>
                                </li>
                                <li class="nav-item"><a class="nav-link " href="#companyDetails" data-toggle="tab">Company Details</a></li>
                                <li class="nav-item"><a class="nav-link " href="#managerDetails" data-toggle="tab">Manager Details</a></li>
                                <li class="nav-item"><a class="nav-link " href="#accountantDetails" data-toggle="tab">Accountant Details</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit Profile</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="activity">Empty For Now</div>
                                <!-- Bank Account -->
                                <div class="tab-pane" id="companyDetails">
                                    <h4 class="text-primary"> Company Details </h4>
                                    @if( auth()->user()->type == 1 )
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6">
                                                <label for="companyName">Company Name : </label>
                                                <p class="lead d-inline"> {{ $manager->comp_name }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6">
                                                <label for="email">Email : </label>
                                                <p class="lead d-inline"> {{ $manager->email }}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6">
                                                <label for="email">Address : </label>
                                                <p class="lead d-inline"> {{ $manager->address }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6">
                                                <label for="fax">Company Fax : </label>
                                                <p class="lead d-inline"> {{ $manager->comp_fax }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6">
                                                <label for="taxnumber">Tax number : </label>
                                                <p class="lead d-inline"> {{ $manager->tax_number }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6">
                                                <label for="exdept">Outstanding debt : </label>
                                                <p class="lead d-inline"> {{ $manager->ex_debt }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6">
                                                <label for="taxdept">Tax Department : </label>
                                                <p class="lead d-inline"> {{ $manager->tax_dept }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6">
                                                <label for="compcode">Company Code : </label>
                                                <p class="lead d-inline"> {{ $manager->comp_code }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6">
                                                <label for="elecgate">Electronic Gate : </label>
                                                <p class="lead d-inline"> {{ $manager->elect_portal }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6">
                                                <label for="elecgatepassword">Electronic Gate Password: </label>
                                                <p class="lead d-inline"> {{ $manager->elect_portal_password }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6">
                                                <label for="idnum">ID Number : </label>
                                                <p class="lead d-inline"> {{ $manager->id_num }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6">
                                                <label for="created"> Created on System: </label>
                                                <p class="lead d-inline"> {{ $manager->created_at }}</p>
                                            </div>
                                        </div>




                                    @else
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="companyName">Company Name : </label>
                                                <p class="lead d-inline"> {{ $company->comp_name }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="taxnumber">Tax number : </label>
                                                <p class="lead d-inline"> {{ $company->tax_number }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="taxdept">Tax Department : </label>
                                                <p class="lead d-inline"> {{ $company->tax_dept }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                <label for="indusnumber">Industrial Registry No : </label>
                                                <p class="lead d-inline"> {{ $company->idus_number }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="comercno">Commercial Registration No : </label>
                                                <p class="lead d-inline"> {{ $company->comer_no }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="comanycode">Company Code : </label>
                                                <p class="lead d-inline"> {{ $company->comp_code }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="marciesemail">Marcies Email : </label>
                                                <p class="lead d-inline"> {{ $company->mar_email }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="marciespassword">Marcies Password : </label>
                                                <p class="lead d-inline"> {{ $company->mar_password }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="compfax">Company Fax : </label>
                                                <p class="lead d-inline"> {{ $company->comp_fax }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="compdate">Company Create Date : </label>
                                                <p class="lead d-inline"> {{ $company->comp_created_at }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="companycapital">The company's capital : </label>
                                                <p class="lead d-inline"> {{ $company->comp_capital }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6">
                                                <label for="exdept">Outstanding debt : </label>
                                                <p class="lead d-inline"> {{ $company->ex_debt }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6">
                                                <label for="elecgate">Electronic Gate : </label>
                                                <p class="lead d-inline"> {{ $company->elect_portal }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6">
                                                <label for="elecgatepassword">Electronic Gate Password: </label>
                                                <p class="lead d-inline"> {{ $company->elect_portal_password }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6">
                                                <label for="created"> Created on System: </label>
                                                <p class="lead d-inline"> {{ $company->created_at }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <!-- /.Bank Account -->
                                <div class="tab-pane" id="managerDetails">
                                    <h4 class="text-primary"> Manager Details</h4>
                                    @if( auth()->user()->type == 1 )
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6">
                                                <label for="companyName"> Name : </label>
                                                <p class="lead d-inline"> {{ $manager->comp_man_name }}</p>
                                            </div>
                                            <div class="col-sm-12 col-lg-6">
                                                <label for="phone"> Phone Number: </label>
                                                <p class="lead d-inline"> {{ $manager->man_phone }}</p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6">
                                                <label for="name"> Manager Name : </label>
                                                <p class="lead d-inline"> {{ $manager->name }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6">
                                                <label for="email"> Email : </label>
                                                <p class="lead d-inline"> {{ $manager->email }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-lg-6">
                                                <label for="phone"> Phone Number : </label>
                                                <p class="lead d-inline"> {{ $manager->phone }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="tab-pane" id="accountantDetails">
                                    <h4 class="text-primary">Accountant Details</h4>
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-6">
                                            <label for="accountent">Accountant Name : </label>
                                            <p class="lead d-inline"> {{ $accountent->name }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-6">
                                            <label for="phone">Accountant Phone : </label>
                                            <p class="lead d-inline"> {{ $accountent->phone }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-6">
                                            <label for="address">Accountant Address : </label>
                                            <p class="lead d-inline"> {{ $accountent->address }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-6">
                                            <label for="email">Accountant Email : </label>
                                            <p class="lead d-inline"> {{ $accountent->email }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal" id="updateProfile">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" class="form-control" id="phone" name="phone"
                                                           value="{{ $manager->man_phone !=null ? $manager->man_phone : $manager->phone}}">
                                                    <p id="errorPhone" class="text-danger"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <fieldset class="border p-2 border-secondary">
                                                <legend  class="w-auto lead"> Change Password </legend>
                                                        <div class="form-group">
                                                            <label for="password">Old Password</label>
                                                            <input type="password" class="form-control" id="password" name="password">
                                                            <p id="errorPassword" class="text-danger"></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="newpassword">New Password</label>
                                                            <input type="password" class="form-control" id="newpassword" name="newpassword">
                                                            <p id="errorNewPassword" class="text-danger"></p>
                                                        </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
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
            url: "{{ route('manager.update-profile')}}",
            type: "POST",
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            beforeSend:function(){
                return confirm("Are you sure?");
            },
            success: function (response) {
                    $('#errorPhone').text('');
                    $('#phone').removeClass('border-danger');
                    $('#errorPassword').text('');
                    $('#password').removeClass('border-danger');
                    $('#errorNewPassword').text('');
                    $('#newpassword').removeClass('border-danger');
                    $('#password').val('');
                    $('#newpassword').val('');
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Your Profile Updated Successfully!',
                    showConfirmButton: 'OK',
                })
            },

            error: function (response) {

                if (response.responseJSON.errors.phone) {
                    $('#errorPhone').text(response.responseJSON.errors.phone);
                    $('#phone').addClass('border-danger');
                } else {
                    $('#errorPhone').text('');
                    $('#phone').removeClass('border-danger');
                }
                if (response.responseJSON.errors.passwordError) {
                    $('#errorPassword').text(response.responseJSON.errors.passwordError);
                    $('#password').addClass('border-danger');
                } else {
                    $('#errorPassword').text('');
                    $('#password').removeClass('border-danger');
                }
                if (response.responseJSON.errors.newpassword) {
                    $('#errorNewPassword').text(response.responseJSON.errors.newpassword);
                    $('#newpassword').addClass('border-danger');
                } else {
                    $('#errorNewPassword').text('');
                    $('#newpassword').removeClass('border-danger');
                }

                Swal.fire({
                    title: 'Error!',
                    text: 'Something Was Wrong !!',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            }

        });
    });
</script>
<!-- Get Manager Name -->
<script src="{{ asset('js/manager/getManagerName.js') }}"></script>
