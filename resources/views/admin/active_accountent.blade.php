    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mt-5">
        <div class="row w-100">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Diplay an Active Accountent</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="text-right mb-3">
                            <!-- Button trigger modal -->
                            <!-- <button type="button" class="btn btn-success d-sm-block d-md-inline" data-toggle="modal" data-target="#addAccountent">Add an Accountent <i
                                    class="fa fa-plus"></i></button> -->
                        </div>
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <table id="tableactive" width="100%" class="table table-bordered table-striped dataTable display" >
                       <thead>
				        <tr >
				            <th >ID</th>
					        <th>Name</th>
                            <th>User Name</th>
					        <th data-sortable="true">Email</th>
                            <th data-sortable="true">Created at</th>
                            <th data-sortable="true">State</th>
					        <th data-sortable="true">Action</th>
						    </tr>
					    </thead>
                        <tbody>
                        @foreach($accountents as $key=>$acc)
                        @if($acc->state == 1)
				        <tr id="tr_{{$acc->id}}">
				            <td>{{$key+1}}</td>
				            <td>{{$acc->name}} </td>
                            <td>{{$acc->username}} </td>
				           <td>{{$acc->email}}</td>
				    		<td>{{$acc->created_at}}</td>
                            <td>
                            @if($acc->state == 1)
                            <i id="state_{{$acc->user_id}}" class="fa fa-check" style="color: rgb(0,255,0);
                        font-size: 26px;padding: 0 26px;"></i>
                            @else
                            <i id="state_{{$acc->user_id}}" class="fa fa-times" style="color: rgb(255,0,0);
                        font-size: 30px;padding: 0 26px;"></i>
                            @endif
                            </td>
                            <td>
                            <a  class="btn btn-sm btn-primary fa fa-eye " href="{{route('admin.view-accountent-profile',Crypt::encrypt($acc->user_id))}}" > View </a>
                             |
                             @if($acc->state == 1)
                             <button id="{{$acc->user_id}}" class="clview btn btn-sm btn-danger fa fa-times" data-viewaccountent="{{route('admin.update-accountent-state',Crypt::encrypt($acc->user_id))}}" > InActive </button>
                             @else
                             <button id="{{$acc->user_id}}" class="clview btn btn-sm btn-success fa fa-check" data-viewaccountent="{{route('admin.update-accountent-state',Crypt::encrypt($acc->user_id))}}" > Active </button>
                             @endif
				            </td>
                        </tr>
                        @endif
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
