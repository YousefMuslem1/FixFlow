@extends('accountent.layouts.app')
@section('title')
<title>Profile Public Company</title>
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
                <h3 class="profile-username text-center">{{$public_companies->comp_name}}</h3>
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
                  <li class="nav-item"><a class="nav-link"  href="#ActiveManagerRelated" data-toggle="tab"> Active Manager</a></li>
                  <li class="nav-item"><a class="nav-link"  href="#InactiveManagerRelated" data-toggle="tab"> Inactive Manager</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane " id="Edit">
                  <form id="update_public_companies" >
      <div class="row">
	  @csrf
	  <!-- <input type="" id="id_acc" name="id_acc" value="{{$public_companies->id}}"> -->

		<div class=" col-lg-6 col-sm-12  form-group">
			<label for="comp_name" class="col-form-label">Company Name:</label>
			<input type="text" class="form-control allC" data-id="{{$public_companies->id}}" id="comp_name" name="comp_name" value="{{$public_companies->comp_name}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="comp_nameError" class="allE"></strong>
			</div>
		</div>


		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="tax_number" class="col-form-label">Tax Number:</label>
			<input type="number" class="form-control allC" id="tax_number" name="tax_number" value="{{$public_companies->tax_number}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="tax_numberError" class="allE"></strong>
			</div>
		</div>

		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="tax_dept" class="col-form-label">Tax Dept:</label>
			<input type="text" class="form-control allC" id="tax_dept" name="tax_dept" value="{{$public_companies->tax_dept}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="tax_deptError" class="allE"></strong>
			</div>
		</div>


		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="indus_num" class="col-form-label">Indus num:</label>
			<input type="text" class="form-control allC" id="indus_num" name="indus_num" value="{{$public_companies->indus_num}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="indus_numError" class="allE"></strong>
			</div>
		</div>

		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="comer_no" class="col-form-label">Comer no:</label>
			<input type="number" class="form-control allC" id="comer_no" name="comer_no" value="{{$public_companies->comer_no}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="comer_noError" class="allE"></strong>
			</div>
		</div>
		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="comp_code" class="col-form-label ">Company code:</label>
			<input type="text" class="form-control allC" id="comp_code" name="comp_code" value="{{$public_companies->comp_code}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="comp_codeError" class="allE"></strong>
			</div>
		</div>
		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="mar_email" class="col-form-label">Mar Email:</label>
			<input type="email" class="form-control allC" id="mar_email" name="mar_email" value="{{$public_companies->mar_email}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="mar_emailError" class="allE"></strong>
			</div>
    </div>
    <div class=" col-lg-6 col-sm-12 form-group">
			<label for="mar_password" class="col-form-label">Mar Password:</label>
			<input type="text" class="form-control allC" id="mar_password" name="mar_password" value="{{$public_companies->mar_password}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="mar_passwordError" class="allE"></strong>
			</div>
		</div>
		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="comp_fax" class="col-form-label">Fax:</label>
			<input type="text" class="form-control allC" id="comp_fax" name="comp_fax" value="{{$public_companies->comp_fax}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="comp_faxError" class="allE"></strong>
			</div>
		</div>

    <div class=" col-lg-6 col-sm-12 form-group">
			<label for="comp_capital" class="col-form-label">Comp Capital:</label>
			<input type="text" class="form-control allC" id="comp_capital" name="comp_capital" value="{{$public_companies->comp_capital}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="comp_capitalError" class="allE"></strong>
			</div>
    </div>
    <div class=" col-lg-6 col-sm-12 form-group">
			<label for="ex_debt" class="col-form-label">Ex Dept:</label>
			<input type="text" class="form-control allC" id="ex_debt" name="ex_debt" value="{{$public_companies->ex_dept}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="ex_debtError" class="allE"></strong>
			</div>
		</div>
		<div class=" col-lg-6 col-sm-12 form-group">
			<label for="elect_portal" class="col-form-label">Elect Portal:</label>
			<input type="text" class="form-control allC" id="elect_portal" name="elect_portal" value="{{$public_companies->elect_portal}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="elect_portalError" class="allE"></strong>
			</div>
    </div>
    <div class=" col-lg-6 col-sm-12 form-group">
			<label for="elect_portal_password" class="col-form-label">Elect Portal Password:</label>
			<input type="text" class="form-control allC" id="elect_portal_password" name="elect_portal_password" value="{{$public_companies->elect_portal_password}}" autocomplete="off">
			<div class="text-danger" >
				<strong id="elect_portal_passwordError" class="allE"></strong>
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
                  <div class="tab-pane" id="ActiveManagerRelated">
                  <div  class="dataTables_wrapper dt-bootstrap4">
                    <table id="dataTableActiveCompany" width="100%" class="table table-bordered table-striped dataTable display" >
                       <thead>
				        <tr >
				            <th >ID</th>
					        <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
					        <th data-sortable="true">Created At</th>
                  <th data-sortable="true">State</th>
                  <th data-sortable="false">Action</th>
						    </tr>
					    </thead>
                        <tbody>
                        @foreach($public_managers as $key=>$com)
                      @if($com->state == 1)
				        <tr id="tra_{{$com->id}}">
				            <td>{{$key+1}}</td>
				            <td>{{$com->name}} </td>
                    <td>{{$com->phone}} </td>
                    <td>{{$com->email}} </td>
				            <td>{{$com->created_at}}</td>
                            <td>
                            @if($com->state == 1)
                            <i id="state_{{$com->id}}" class="fa fa-check" style="color: rgb(0,255,0);
                        font-size: 26px;padding: 0 26px;"></i>
                            @else
                            <i id="state_{{$com->id}}" class="fa fa-times" style="color: rgb(255,0,0);
                        font-size: 30px;padding: 0 26px;"></i>
                            @endif
                            </td>
                            <td>
                            <button  class="viman btn btn-sm btn-primary fa fa-eye" data-viewprofile="{{route('accountent.get-show-profile',Crypt::encrypt($com->id))}}" > View </button>
                             |
                             @if($com->state == 1)
                             <button id="{{$com->id}}" class="clview btn btn-sm btn-danger fa fa-times" data-viewaccountent="{{route('accountent.update-public-company-state',Crypt::encrypt($com->id))}}" > InActive </button>
                             @else
                             <button id="{{$com->id}}" class="clview btn btn-sm btn-success fa fa-check" data-viewaccountent="{{route('accountent.update-public-company-state',Crypt::encrypt($com->id))}}" > Active </button>
                             @endif
                            <a  class="btn btn-sm btn-warning fa fa-dollar " style="margin: 7%;" href="" > View Payments</a>

				            </td>
                        </tr>
                        @endif
				    @endforeach
                                        </tbody>

                                    </table>
                            </div>

                  </div>
                  <!-- End Pubic Manager -->
                  <!-- Inactive public manager -->
                  <div class="tab-pane" id="InactiveManagerRelated">
                  <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <table id="dataTableInactiveCompany" width="100%" class="table table-bordered table-striped dataTable display" >
                       <thead>
				        <tr >
				            <th >ID</th>
					        <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
					        <th data-sortable="true">Created At</th>
                  <th data-sortable="true">State</th>
                  <th data-sortable="false">Action</th>
						    </tr>
					    </thead>
                        <tbody>
                        @foreach($public_managers as $key=>$com)
                          @if($com->state == 0)
				        <tr id="tri_{{$com->id}}">
				            <td>{{$key+1}}</td>
				            <td>{{$com->name}} </td>
                    <td>{{$com->phone}} </td>
                    <td>{{$com->email}} </td>
				            <td>{{$com->created_at}}</td>
                            <td>
                            @if($com->state == 1)
                            <i id="state_{{$com->id}}" class="fa fa-check" style="color: rgb(0,255,0);
                        font-size: 26px;padding: 0 26px;"></i>
                            @else
                            <i id="state_{{$com->id}}" class="fa fa-times" style="color: rgb(255,0,0);
                        font-size: 30px;padding: 0 26px;"></i>
                            @endif
                            </td>
                            <td>
                            <button  class="viman btn btn-sm btn-primary fa fa-eye " data-viewprofile="{{route('accountent.get-show-profile',Crypt::encrypt($com->id))}}" > View </button>
                             |
                             @if($com->state == 1)
                             <button id="{{$com->id}}" class="clview btn btn-sm btn-danger fa fa-times" data-viewaccountent="{{route('accountent.update-public-company-state',Crypt::encrypt($com->id))}}" > InActive </button>
                             @else
                             <button id="{{$com->id}}" class="clview btn btn-sm btn-success fa fa-check" data-viewaccountent="{{route('accountent.update-public-company-state',Crypt::encrypt($com->id))}}" > Active </button>
                             @endif
                            <a  class="btn btn-sm btn-warning fa fa-dollar " href="" > View Payments</a>

				            </td>
                        </tr>
                        @endif
				    @endforeach
                                        </tbody>

                                    </table>
                            </div>

                  </div>

                  <!-- end inactive public manager -->
                  <!-- /.tab-pane -->
                  <div class="tab-pane active" id="detail">
      <div class="row">
      <div class=" col-md-6 form-group">
	   Comp Name : {{ $public_companies->comp_name}}
		</div>
		<div class=" col-md-6 form-group">
	 tax number :{{ $public_companies->tax_number}}
		</div>
		<div class=" col-md-6 form-group">
		 tax_dept :{{ $public_companies->tax_dept}}
		</div>
		<div class=" col-md-6 form-group">
		 Created_at :{{ $public_companies->created_at}}
		</div>
		<div class=" col-md-6 form-group">
		 State :
		 @if($public_companies->state == 1)
		 <i class="fa fa-check" style="color: rgb(0,255,0);
    font-size: 26px;padding: 0 26px;"></i>
		 @else
		 <i class="fa fa-times" style="color: rgb(255,0,0);
    font-size: 30px;padding: 0 26px;"></i>
		 @endif
		</div>
		<div class=" col-md-6 form-group">
		 Indus Num :{{ $public_companies->indus_num}}
		</div>
		<div class=" col-md-6 form-group">
		 Comer No :{{ $public_companies->comer_no}}
		</div>
		<div class=" col-md-6 form-group">
		 Comp Code :{{ $public_companies->comp_code}}

		</div>
		<div class=" col-md-6 form-group">
		 Mar Email :{{ $public_companies->mar_email}}
    </div>
    <div class=" col-md-6 form-group">
		 Mar Password :{{ $public_companies->mar_password}}
    </div>
    <div class=" col-md-6 form-group">
		 Fax :{{ $public_companies->comp_fax}}
    </div>
    <div class=" col-md-6 form-group">
		 Comp Capital :{{ $public_companies->comp_capital}}
    </div>
    <div class=" col-md-6 form-group">
		 Ex Dept :{{ $public_companies->ex_dept}}
    </div>
    <div class=" col-md-6 form-group">
		 Elect Portal :{{ $public_companies->elect_portal}}
    </div>
    <div class=" col-md-6 form-group">
		 Elect Portal Password :{{ $public_companies->elect_portal_password}}
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
    </section>
    <!-- /.content -->
</div>






@endsection


@section('scripts')


<script>

    jQuery(document).ready(function(){
      window.history.pushState("", "", "/");

      $('#dataTableInactiveCompany').DataTable();
      $('#dataTableActiveCompany').DataTable();
    // $('.clview').click( function () 
    // {
    //     let id=$(this).attr('id');
    //       $.ajax({
    //              url: $(this).data('viewaccountent'),
    //             type: "GET",
    //             beforeSend:function()
    //             {
    //                 return confirm("are you sure to complete?");
    //             },
    //             success: function (response) {

    //                 $(`#tr_${id}`).addClass('d-none');    
    //                 Swal.fire({
    //                     position: 'center',
    //                     icon: 'success',
    //                     title: 'Change state Public Company Has Been Successfully!',
    //                     showConfirmButton: false,
    //                     timer: 1500
    //                 });
    //                 // location.reload();
    //                 console.log(response);
    //             },

    //             error: function (response) {
                   
    //             }

    //         });
        
    //      }); 

// Get Accountent Profile Partial Page
$('.viman').click(function () {
    event.preventDefault();
    $.ajax({
        url : $(this).data('viewprofile'),
        data: {
        },
        type: 'POST',
        dataType: 'json',
        success: function( response )
        {
            $('.main-content').html(response.html);
            // $('a').removeClass('active');
            // $('#accountentProfile').addClass('active');
            // window.history.pushState("", "", "/");
        },
        error: function()
        {
            alert('error...');
        }
    });

});



        $('#update_public_companies').on('submit', function (event) {
            event.preventDefault();
            let id = $('#comp_name').data('id');
            let comp_name = $('#comp_name').val();
            let tax_number = $('#tax_number').val();
            let tax_dept = $('#tax_dept').val();
            let indus_num = $('#indus_num').val();
            let comer_no = $('#comer_no').val();
            let comp_code = $('#comp_code').val();
            let mar_email = $('#mar_email').val();
            let mar_password = $('#mar_password').val();
            let comp_fax = $('#comp_fax').val();
            let comp_capital = $('#comp_capital').val();
            let ex_dept = $('#ex_debt').val();
            let elect_portal = $('#elect_portal').val();
            let elect_portal_password = $('#elect_portal_password').val();

            $.ajax({
                url: "{{route('accountent.update-public-companies')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    comp_name: comp_name,
                    tax_number: tax_number,
                    tax_dept: tax_dept,
                    indus_num: indus_num,
                    comer_no: comer_no,
                    comp_code: comp_code,
                    mar_email: mar_email,
                    mar_password: mar_password,
                    comp_fax: comp_fax,
                    comp_capital: comp_capital,
                    ex_debt: ex_dept,
                    elect_portal: elect_portal,
                    elect_portal_password: elect_portal_password,
                },
                success: function (response) {
                    $('.modal').modal('hide');
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Update public company Has Been Successfully!',
                        showConfirmButton: false,
                        timer: 2500
                    });
                	  // location.reload();
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
