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
                            <a  class="btn btn-sm btn-primary fa fa-eye " href="" data-toggle="modal" data-target="#addManager_{{$com->id}}" > View Payments</a>
                            <!-- {{!!$pays=App\Payment::spePay($com->id)!!}} -->
                            <div class="modal fade" data-backdrop="static" tabindex="-1" id="addManager_{{$com->id}}">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">All Payments</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="dataTables_wrapper dt-bootstrap4"> 
            
            
                    <table id="dataTableCompany_{{$com->id}}" width="100%" class="table table-bordered table-striped dataTable display" >
                       <thead>
				        <tr >
				            <th >ID</th>
					        <th>Amount</th>
                            <th>State</th>
					        <th data-sortable="true">Created At</th>
                            <th></th>
						    </tr>
					    </thead>
                        <tbody>
                        @foreach($pays as $k=>$pay)
                        
				        <tr id="tr_{{$com->id}}">
				            <td>{{$k+1}}</td>
				            <td>{{$pay->amount}} </td>
                            <td><span class="badge-pill {{ $pay->state == 1 ? 'badge-warning' : ($pay->state == 2 ? 'badge-success' : 'badge-danger') }} text-white font-weight-bolder">{{ $pay->state == 1 ? 'Pending' : ($pay->state == 2 ? 'Accepted' : 'Rejected') }}</span> </td>
				           <td>{{$pay->created_at}}</td>

                           <td>
                           <form action="" class="paymentRequest">
                           <a  class="btn btn-sm btn-primary fa fa-eye " data-dismiss="modal" href=""  > View Details</a>
                        <input type="hidden" value="{{ $pay->notification_id }}" name="payment">
                </form>
                           </td>
                        </tr>
				    @endforeach
                                        </tbody>

                                    </table>
                            </div>
                   <!-- end -->
            </div>
        </div>
    </div>
</div>





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
@foreach($companies as $key=>$c)
$('#dataTableCompany_{{$c->id}}').DataTable(); 
@endforeach
     $('#dataTableCompany').DataTable(); 
  
$('.paymentRequest').on('click', function (event) {
event.preventDefault();
$.ajax({
    url : '/accountent/payment_partial_view',
    type: 'post',
    data: new FormData(this),
    contentType: false,
    processData: false,
    success: function( res )
    {
        $('.main-content').html(res.html);
        window.history.pushState("", "", "/");
        // $.ajax({
        //     url: "/accountent/notification",
        //     type: 'post',
        //     dataType: 'json',
        //     data: {
        //     },
        //     success: function (response) {
        //         $('.main-notification').empty().html(response.html);
        //     }
        //
        // })

    },
    error: function(response)
    {

    }

});
});

    });

</script>
<script src="{{ asset('js/accountant/getPaymentPartialView.js') }}"></script>
