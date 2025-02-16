@extends('admin.layouts.app')
@section('title')
<title>Profile Accountant</title>
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
				@if($accountant->photo)
                  <img class="profile-user-img img-fluid img-circle" style="width:143px !important;" src="{{asset('images/'.$accountant->photo)}}" >
				@else
				<img class="profile-user-img img-fluid img-circle" style="width:143px !important;" src="{{asset('images/default.png')}}" >
				@endif
                </div>
                <h3 class="profile-username text-center">{{$accountant->name}}</h3>
                <p class="text-muted text-center">Accountant</p>
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
                  <li class="nav-item"><a class="nav-link"  href="#PublicManager" data-toggle="tab"> Public Manager</a></li>
                  <li class="nav-item"><a class="nav-link"  href="#SpecialManager" data-toggle="tab"> Special Manager</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane " id="Edit">
                  <form id="updateAccountent" >
      <div class="row">
	  @csrf
	  <!-- <input type="" id="id_acc" name="id_acc" value="{{$accountant->id}}"> -->

		<div class=" col-lg-6 col-sm-12  form-group">
			<label for="name" class="col-form-label">Name:</label>
			<input type="text" class="form-control allC" data-id="{{$accountant->id}}" id="name" name="name" value="{{$accountant->name}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="nameError" class="allE"></strong>
			</div>
		</div>


		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="address" class="col-form-label">Address:</label>
			<input type="text" class="form-control allC" id="address" name="address" value="{{$accountant->address}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="addressError" class="allE"></strong>
			</div>
		</div>

		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="username" class="col-form-label">User Name:</label>
			<input type="text" class="form-control allC" id="usernamec" name="username" value="{{$accountant->username}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="usernameError" class="allE"></strong>
			</div>
		</div>


		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="email" class="col-form-label">Enail:</label>
			<input type="email" class="form-control allC" id="email" name="email" value="{{$accountant->email}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="emailError" class="allE"></strong>
			</div>
		</div>

		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="phone" class="col-form-label">Phone:</label>
			<input type="number" class="form-control allC" id="phone" name="phone" value="{{$accountant->phone}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="phoneError" class="allE"></strong>
			</div>
		</div>
		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="bank_name" class="col-form-label ">Bank Name:</label>
			<input type="text" class="form-control allC" id="bank_name" name="bank_name" value="{{$accountant->bank_name}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="bank_nameError" class="allE"></strong>
			</div>
		</div>
		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="iban_name" class="col-form-label">Iban Name:</label>
			<input type="text" class="form-control allC" id="iban_name" name="iban_name" value="{{$accountant->iban_name}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="iban_nameError" class="allE"></strong>
			</div>
		</div>
		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="iban" class="col-form-label">Iban:</label>
			<input type="number" class="form-control allC" id="iban" name="iban" value="{{$accountant->iban}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="ibanError" class="allE"></strong>
			</div>
		</div>


          <button class="btn " type="reset">Reset</button>
          <button class="btn btn-primary" type="submit">Save changes</button>
	</div>
</form>
                    <!-- /.post -->
                  </div>
                  <!-- begin public Manager -->
                  <div class="tab-pane" id="PublicManager">
                  </div>
                  <!-- End Pubic Manager -->
                  <!-- begin Special Manager -->
                  <div class="tab-pane" id="SpecialManager">
                  </div>
                  <!-- End Special Manager -->
                  <!-- /.tab-pane -->
                  <div class="tab-pane active" id="detail">
      <div class="row">
      <div class=" col-md-6 form-group">
	   Phone : {{ $accountant->phone}}
		</div>
		<div class=" col-md-6 form-group">
	 Address :{{ $accountant->address}}
		</div>
		<div class=" col-md-6 form-group">
		 Email :{{ $accountant->email}}
		</div>
		<div class=" col-md-6 form-group">
		 Created_at :{{ $accountant->created_at}}
		</div>
		<div class=" col-md-6 form-group">
		 State :
		 @if($accountant->state == 1)
		 <i class="fa fa-check" style="color: rgb(0,255,0);
    font-size: 26px;padding: 0 26px;"></i>
		 @else
		 <i class="fa fa-times" style="color: rgb(255,0,0);
    font-size: 30px;padding: 0 26px;"></i>
		 @endif
		</div>
		<div class=" col-md-6 form-group">
		 Username :{{ $accountant->username}}
		</div>
		<div class=" col-md-6 form-group">
		 Bank name :{{ $accountant->bank_name}}
		</div>
		<div class=" col-md-6 form-group">
		 Iban :{{ $accountant->iban}}

		</div>
		<div class=" col-md-6 form-group">
		 Iban name :{{ $accountant->iban_name}}
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






@endsection


@section('script')
<script>

    jQuery(document).ready(function($){
        $('#updateAccountent').on('submit', function (event) {
            event.preventDefault();
            let id = $('#name').data('id');
            let name = $('#name').val();
            let phone = $('#phone').val();
            let address = $('#address').val();
            let email = $('#email').val();
            let username = $('#usernamec').val();
            let bank_name = $('#bank_name').val();
            let iban_name = $('#iban_name').val();
            let iban = $('#iban').val();

            $.ajax({
                url: "{{route('admin.update-accountant')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    name: name,
                    phone: phone,
                    address: address,
                    email: email,
                    username: username,
                    bank_name: bank_name,
                    iban_name: iban_name,
                    iban: iban,
                },
                success: function (response) {
                    $('.modal').modal('hide');
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Update Accountant Has Been Successfully!',
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
