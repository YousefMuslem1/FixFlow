@extends('accountent.layouts.app')
@section('title')
<title>Profile Special Company</title>
@endsection
@section('content')
<div class="content-wrapper" style="min-height: 100%;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
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

                </div>
                <h3 class="profile-username text-center">{{$special_companies->comp_name}}</h3>
                <p class="text-muted text-center">Company</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card card-primary">
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#detail" data-toggle="tab">Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="#Edit" data-toggle="tab">Edit</a></li>
                  <li class="nav-item"><a class="nav-link"  href="#CompanyAccount" data-toggle="tab"> Company Account</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                <div class="tab-pane " id="CompanyAccount">
                <form id="update_special_companies_account" >
      <div class="row">
	  @csrf
	  <!-- <input type="" id="id_acc" name="id_acc" value="{{$special_companies->id}}"> -->

		<div class=" col-lg-12 col-sm-12  form-group">
			<label for="username" class="col-form-label">User Name:</label>
			<input type="text" class="form-control allC"  id="username" name="username" value="" autocomplete="off">
			<div class="text-danger" >
				<strong id="usernameError" class="allE"></strong>
			</div>
    </div>
    <div class=" col-lg-12 col-sm-12  form-group">
			<label for="password" class="col-form-label">Password:</label>
			<input type="password" class="form-control allC"  id="password" name="password" value="" autocomplete="off">
			<div class="text-danger" >
				<strong id="passwordError" class="allE"></strong>
			</div>
    </div>
    <button class="btn" type="reset">Reset</button>
    <button class="btn btn-primary" type="submit">Save changes</button>
</div>
</form>
                </div>
                  <div class="tab-pane " id="Edit">

                  <form id="update_special_companies" >
      <div class="row">
	  @csrf
	  <!-- <input type="" id="id_acc" name="id_acc" value="{{$special_companies->id}}"> -->

		<div class=" col-lg-6 col-sm-12  form-group">
			<label for="comp_name" class="col-form-label">Company Name:</label>
			<input type="text" class="form-control allC" data-id="{{$special_companies->id}}" id="comp_name" name="comp_name" value="{{$special_companies->comp_name}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="comp_nameError" class="allE"></strong>
			</div>
		</div>


		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="comp_man_name" class="col-form-label">Manager Name:</label>
			<input type="text" class="form-control allC" id="comp_man_name" name="comp_man_name" value="{{$special_companies->comp_man_name}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="comp_man_nameError" class="allE"></strong>
			</div>
		</div>

		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="id_num" class="col-form-label">ID Num:</label>
			<input type="number" class="form-control allC" id="id_num" name="id_num" value="{{$special_companies->id_num}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="id_numError" class="allE"></strong>
			</div>
		</div>


		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="email" class="col-form-label">Email:</label>
			<input type="email" class="form-control allC" id="email" name="email" value="{{$special_companies->email}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="emailError" class="allE"></strong>
			</div>
		</div>

		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="man_phone" class="col-form-label">Manager Phone:</label>
			<input type="number" class="form-control allC" id="man_phone" name="man_phone" value="{{$special_companies->man_phone}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="man_phoneError" class="allE"></strong>
			</div>
		</div>

		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="comp_address" class="col-form-label">Company Address:</label>
			<input type="text" class="form-control allC" id="comp_address" name="comp_address" value="{{$special_companies->comp_address}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="comp_addressError" class="allE"></strong>
			</div>
    </div>
    <div class=" col-lg-6 col-sm-12 form-group">
			<label for="tax_number" class="col-form-label">Tax Number:</label>
			<input type="number" class="form-control allC" id="tax_number" name="tax_number" value="{{$special_companies->tax_number}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="tax_numberError" class="allE"></strong>
			</div>
		</div>
		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="comp_fax" class="col-form-label">Fax:</label>
			<input type="text" class="form-control allC" id="comp_fax" name="comp_fax" value="{{$special_companies->comp_fax}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="comp_faxError" class="allE"></strong>
			</div>
		</div>


    <div class=" col-lg-6 col-sm-12 form-group">
			<label for="ex_dept" class="col-form-label">Ex Dept:</label>
			<input type="text" class="form-control allC" id="ex_dept" name="ex_dept" value="{{$special_companies->ex_dept}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="ex_deptError" class="allE"></strong>
			</div>
    </div>
    <div class=" col-lg-6 col-sm-12 form-group">
			<label for="tax_dept" class="col-form-label">Tax Dept:</label>
			<input type="text" class="form-control allC" id="tax_dept" name="tax_dept" value="{{$special_companies->tax_dept}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="tax_deptError" class="allE"></strong>
			</div>
		</div>
		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="elect_portal" class="col-form-label">Elect Portal:</label>
			<input type="text" class="form-control allC" id="elect_portal" name="elect_portal" value="{{$special_companies->elect_portal}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="elect_portalError" class="allE"></strong>
			</div>
    </div>
    <div class=" col-lg-6 col-sm-12 form-group">
			<label for="elect_portal_password" class="col-form-label">Elect Portal Password:</label>
			<input type="text" class="form-control allC" id="elect_portal_password" name="elect_portal_password" value="{{$special_companies->elect_portal_password}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="elect_portal_passwordError" class="allE"></strong>
			</div>
    </div>
    <div class=" col-lg-6 col-sm-12 form-group">
    <label for="comp_code" class="col-form-label">Company Code:</label>
			<input type="text" class="form-control allC" id="comp_code" name="comp_code" value="{{$special_companies->comp_code}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="comp_codeError" class="allE"></strong>
			</div>
    </div>
    <div class=" col-lg-6 col-sm-12 form-group">

    </div>
    <button class="btn" type="reset">Reset</button>
    <button class="btn btn-primary" type="submit">Save changes</button>

	</div>
</form>
                    <!-- /.post -->
                  </div>
                  <!-- begin public Manager -->

                  <!-- End Pubic Manager -->
                  <!-- /.tab-pane -->
                  <div class="tab-pane active" id="detail">
      <div class="row">
      <div class=" col-md-6 form-group">
	   Company Name : {{ $special_companies->comp_name}}
		</div>
		<div class=" col-md-6 form-group">
	   tax number :{{ $special_companies->tax_number}}
		</div>
		<div class=" col-md-6 form-group">
		 Tax Dept :{{ $special_companies->tax_dept}}
		</div>
		<div class=" col-md-6 form-group">
		 Created at :{{ $special_companies->created_at}}
		</div>
		<div class=" col-md-6 form-group">
		 State :
		 @if($special_companies->state == 1)
		 <i class="fa fa-check" style="color: rgb(0,255,0);
    font-size: 26px;padding: 0 26px;"></i>
		 @else
		 <i class="fa fa-times" style="color: rgb(255,0,0);
    font-size: 30px;padding: 0 26px;"></i>
		 @endif
		</div>
		<div class=" col-md-6 form-group">
		 Manager Name :{{ $special_companies->comp_man_name}}
		</div>
		<div class=" col-md-6 form-group">
		ID Num :{{ $special_companies->id_num}}
		</div>
		<div class=" col-md-6 form-group">
		 Comp Code :{{ $special_companies->comp_code}}

		</div>
		<div class=" col-md-6 form-group">
		 Email :{{ $special_companies->email}}
    </div>
    <div class=" col-md-6 form-group">
		 Manager Phone :{{ $special_companies->man_phone}}
    </div>
    <div class=" col-md-6 form-group">
		 Fax :{{ $special_companies->comp_fax}}
    </div>
    <div class=" col-md-6 form-group">
		 Company Address :{{ $special_companies->comp_address}}
    </div>
    <div class=" col-md-6 form-group">
		 Ex Dept :{{ $special_companies->ex_dept}}
    </div>
    <div class=" col-md-6 form-group">
		 Tax Dept :{{ $special_companies->tax_dept}}
    </div>
    <div class=" col-md-6 form-group">
		 Elect Portal :{{ $special_companies->elect_portal}}
    </div>
    <div class=" col-md-6 form-group">
		 Elect Portal Password :{{ $special_companies->elect_portal_password}}
		</div>
      </div>
	</div>
                  </div>
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
</div>






@endsection


@section('script')
<script>

    jQuery(document).ready(function($){
        $('#update_special_companies').on('submit', function (event) {
            event.preventDefault();
            let id = $('#comp_name').data('id');
            let comp_name = $('#comp_name').val();
            let tax_number = $('#tax_number').val();
            let tax_dept = $('#tax_dept').val();
            let id_num = $('#id_num').val();
            let comp_man_name = $('#comp_man_name').val();
            let comp_code = $('#comp_code').val();
            let comp_address = $('#comp_address').val();
            let email = $('#email').val();
            let man_phone = $('#man_phone').val();
            let comp_fax = $('#comp_fax').val();
            let ex_dept = $('#ex_dept').val();
            let elect_portal = $('#elect_portal').val();
            let elect_portal_password = $('#elect_portal_password').val();

            $.ajax({
                url: "{{route('accountent.update-special-companies')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    comp_name: comp_name,
                    tax_number: tax_number,
                    tax_dept: tax_dept,
                    id_num: id_num,
                    comp_man_name: comp_man_name,
                    comp_code: comp_code,
                    email: email,
                    comp_address:comp_address,
                    man_phone: man_phone,
                    comp_fax: comp_fax,
                    ex_dept: ex_dept,
                    elect_portal: elect_portal,
                    elect_portal_password: elect_portal_password,
                },
                success: function (response) {
                    $('.modal').modal('hide');
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Update Special company Has Been Successfully!',
                        showConfirmButton: false,
                        timer: 2500
                    });
                	  location.reload();
                    console.log(response);
                },

                error: function (response) {
                  $('.allC').removeClass('border-danger');
                  $('.allE').text('');
                  $.each( res = response.responseJSON.errors, function(i, item) {
                      // console.log(`respnse i : ${res[i]}, item : ${item} i : ${i}`);
                      $(`#${i}Error`).text(item);
                      $(`#${i}`).addClass('border-danger');
                  });


                    Swal.fire({
                        title: 'Error!',
                        text: 'error prevent to continue',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })
                }
            });
        });


    });

</script>
@endsection
