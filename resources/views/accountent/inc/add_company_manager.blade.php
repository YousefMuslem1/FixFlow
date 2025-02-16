<div class="content-wrapper mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header lead">
                        Select Manager Company
                    </div>
                    <div class="card-body">
                        <form action="" id="addPublicManager">
                            <div class="form-group">
                                <select name="comp_name" id="companyName" class="form-control">
                                    <option value="0"> --------------- Select Manager Company ---------------</option>
                                    @foreach( $companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->comp_name }}</option>
                                    @endforeach
                                </select>
                                <p class="text-danger" id="errorCompanyName"></p>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label for="username">Username <span class="text-danger">*</span></label>
                                            <input type="text" id="username" name="username" class="form-control" autocomplete="off">
                                            <p class="text-danger" id="errorUsername"></p>

                                        </div>
                                </div>
                                <div class="col-sm-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="password">Password <span class="text-danger">*</span></label>
                                        <input type="password" id="password" name="password" class="form-control" autocomplete="off">
                                        <p class="text-danger" id="errorPassword"></p>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" name="name" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-lg-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" name="email" class="form-control" autocomplete="off">
                                        </div>
                                </div>
                                <div class="col-sm-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="tel" id="phone" name="phone" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

{{--/ Insert New Public Manager For Current Public Company--}}
<script>
    $(function () {
        $("#addPublicManager").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route( 'accountent.store-manager' ) }}',
                data: new FormData(this),
                type: 'post',
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    $('#errorCompanyName').text('');
                    $('#companyName').removeClass('border-danger');
                    $('#errorUsername').text('');
                    $('#username').removeClass('border-danger');
                    $('#errorPassword').text('');
                    $('#password').removeClass('border-danger');
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        html: ` The New <strong>Manager</strong> <strong class="text-success"><i>${response.manager}</i></strong>
                                With <strong>Username</strong> <strong class="text-success"><i>${response.user}</i></strong>
                                For <strong>Company</strong> <strong class="text-success"><i>${response.company}</i></strong> Added`,
                        title: 'Successfully!',
                        confirmButtonText: true,
                    })
                    $('#addPublicManager')[0].reset();
                },
                error: function (response) {
                    if (response.responseJSON.errors.message) {
                        $('#errorCompanyName').text(response.responseJSON.errors.message);
                        $('#companyName').addClass('border-danger');
                    } else {
                        $('#errorCompanyName').text('');
                        $('#companyName').removeClass('border-danger');
                    }
                    if (response.responseJSON.errors.username) {
                        $('#errorUsername').text(response.responseJSON.errors.username);
                        $('#username').addClass('border-danger');
                    } else {
                        $('#errorUsername').text('');
                        $('#username').removeClass('border-danger');
                    }
                    if (response.responseJSON.errors.password) {
                        $('#errorPassword').text(response.responseJSON.errors.password);
                        $('#password').addClass('border-danger');
                    } else {
                        $('#errorPassword').text('');
                        $('#password').removeClass('border-danger');
                    }
                    Swal.fire({
                        title: 'Error!',
                        text: 'Something Was Wrong!',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })
                }
            });
        })
    });
</script>
