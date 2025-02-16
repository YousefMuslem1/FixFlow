<form id="addSpecialManager" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="companyName" class="text-danger">Company Name <span
                        class="text-danger">*</span></label>
                <input type="text" id="companyName" name="comp_name" class="form-control" autocomplete="off">
                <p id="errorCompName" class="text-danger"></p>
            </div>
        </div>

        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="username" class="text-danger">Username <span
                        class="text-danger">*</span></label>
                <input type="text" id="username" name="username" class="form-control" autocomplete="off">
                <p id="errorUsername" class="text-danger"></p>

            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="password" class="text-danger">Password <span
                        class="text-danger">*</span></label>
                <input type="password" id="password" name="password" class="form-control" autocomplete="off">
                <p id="errorPassword" class="text-danger"></p>

            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="companyManName">Company Manager Name</label>
                <input type="text" id="companyManName" name="comp_man_name" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="idNum">ID Number</label>
                <input type="text" id="idNum" name="id_num" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="email">Manager Email </label>
                <input type="email" id="managerEmail" name="email" class="form-control" autocomplete="off">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="managerPhone">Manager Phone</label>
                <input type="tel" id="managerPhone" name="man_phone" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="companyFax">ID Number</label>
                <input type="text" id="companyFax" name="comp_fax" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="companyAddress">Company Address</label>
                <input type="text" id="companyAddress" name="comp_address" class="form-control" autocomplete="off">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="taxNumber">Tax Number</label>
                <input type="text" id="taxNumber" name="tax_number" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="outstandingDept">Outstanding debt</label>
                <input type="number" id="outstandingDept" name="ex_dept" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="electPortal">Electrical Portal</label>
                <input type="text" id="electPortal" name="elect_portal" class="form-control" autocomplete="off">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="electPortalPassword">Electrical Portal Password</label>
                <input type="text" id="electPortalPassword" name="elect_portal_password"
                       class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="companyCode">Company Code</label>
                <input type="text" id="companyCode" name="comp_code" class="form-control" autocomplete="off">
            </div>
        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="form-group">
                <label for="companyCode">Company Files</label>
                <input multiple name="files[]" id="PortugueseFileUpload" class="form-control" type="file">
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary d-block">Save Data</button>
</form>

{{-- /show uploaded files--}}
<script>
    $(function(){
        $('#PortugueseFileUpload').MultiFile({
            accept:'*',
            max:100,
            STRING: {
                remove:'Remover',
                selected:'Selecionado: $file',
                denied:'Invalido arquivo de tipo $ext!',
                duplicate:'Arquivo ja selecionado:\n$file!'
            }
        });
    });
</script>
{{-- Submit add special manager --}}
<script>
    $(function () {
        $("#addSpecialManager").submit(function(e) {
            e.preventDefault();
            // let form_data = $(this).serialize();
            let files =$('input[type=file]')[0].files;
            console.log(files.length);
            let formdata = new FormData(this);
            for(let i=1;i<files.length;i++){
                formdata.append("files[]", files[i], files[i]['name']);

            }
                $.ajax({
                url: '{{ route( 'accountent.store-special-manager' ) }}',
                data: formdata,
                type: 'post',
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    // Reset Selection
                    $('#managerType').val(0);
                    // Remove Model Content
                    $('.manager-content').empty();
                    // Hide Model
                    $('#addManager').modal('toggle'); //or  $('#IDModal').modal('hide');
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'New Company Added Successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    })

                },
                error: function (response) {
                    if (response.responseJSON.errors.comp_name) {
                        $('#errorCompName').text(response.responseJSON.errors.comp_name);
                        $('#companyName').addClass('border-danger');
                    } else {
                        $('#errorCompName').text('');
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
                        $('#errorCompName').text('');
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
        });

    });
</script>

