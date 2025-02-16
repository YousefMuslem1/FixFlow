<div class="content-wrapper mt-5">
        <div class="row w-100">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <!-- <h3 class="card-title">Diplay an Active Accountent</h3> -->
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="text-right mb-3">
                            <!-- Button trigger modal -->
                            <!-- <button type="button" class="btn btn-success d-sm-block d-md-inline" data-toggle="modal" data-target="#addAccountent">Add an Accountent <i
                                    class="fa fa-plus"></i></button> -->
                        </div>
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">   
                    <table id="dataTableCompany" width="100%" class="table table-bordered table-striped dataTable display" >
                       <thead>
				        <tr >
				            <th >ID</th>
					        <th>Company Name</th>
                            <th>Manager Name</th>
					        <th data-sortable="true">Created At</th>
                            <th data-sortable="true">State</th>
					        <th data-sortable="true">Action</th>
						    </tr>
					    </thead>
                        <tbody>
                        @foreach($companies as $key=>$com)
                        
				        <tr id="tr_{{$com->id}}">
				            <td>{{$key+1}}</td>
				            <td>{{$com->comp_name}} </td>
                            <td>{{$com->comp_man_name}} </td>
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
                            <a  class="btn btn-sm btn-primary fa fa-eye " href="{{route('accountent.view-special-company-profile',Crypt::encrypt($com->id))}}" > View </a>
                             |
                             @if($com->state == 1)
                             <button id="{{$com->id}}" class="clview btn btn-sm btn-danger fa fa-times" data-viewaccountent="{{route('accountent.update-special-company-state',Crypt::encrypt($com->id))}}" > InActive </button>
                             @else
                             <button id="{{$com->id}}" class="clview btn btn-sm btn-success fa fa-check" data-viewaccountent="{{route('accountent.update-special-company-state',Crypt::encrypt($com->id))}}" > Active </button>
                             @endif
				            </td>
                        </tr>
				    @endforeach
                                        </tbody>

                                    </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                </div>
            </div>


<script>
    jQuery(document).ready(function($){

    var table = $('#dataTableCompany').DataTable(); 
    $('.clview').click( function () 
    {
        let id=$(this).attr('id');
          $.ajax({
                 url: $(this).data('viewaccountent'),
                type: "GET",
                beforeSend:function()
                {
                    return confirm("are you sure to complete?");
                },
                success: function (response) {

                    $(`#tr_${id}`).addClass('d-none');    
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Change state Special Company Has Been Successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    // location.reload();
                    console.log(response);
                },

                error: function (response) {
                   
                }

            });
        
         }); 
        


    });

</script>
