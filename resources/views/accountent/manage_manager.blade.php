
    <div class="content-wrapper mt-5">
        <div class="row w-100">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manage Companies</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="text-right mb-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success d-sm-block d-md-inline" data-toggle="modal" data-target="#addManager"> Add a Company  <i
                                    class="fa fa-plus"></i></button>
                        </div>
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div>
                                <div class="col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                           role="grid"
                                           aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Rendering engine
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-label="Browser: activate to sort column ascending">Browser
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending" style="">
                                                Platform(s)
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-label="Engine version: activate to sort column ascending" style="">
                                                Engine
                                                version
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending" style="">CSS
                                                grade
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1">Gecko</td>
                                            <td>Firefox 1.0</td>
                                            <td style="">Win 98+ / OSX.2+</td>
                                            <td style="">1.7</td>
                                            <td style="">A</td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td tabindex="0" class="sorting_1">Gecko</td>
                                            <td>Firefox 1.5</td>
                                            <td style="">Win 98+ / OSX.2+</td>
                                            <td style="">1.8</td>
                                            <td style="">A</td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1">Gecko</td>
                                            <td>Firefox 2.0</td>
                                            <td style="">Win 98+ / OSX.2+</td>
                                            <td style="">1.8</td>
                                            <td style="">A</td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">Rendering engine</th>
                                            <th rowspan="1" colspan="1">Browser</th>
                                            <th rowspan="1" colspan="1" style="">Platform(s)</th>
                                            <th rowspan="1" colspan="1" style="">Engine version</th>
                                            <th rowspan="1" colspan="1" style="">CSS grade</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                        Showing 1 to 10
                                        of 57 entries
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled"
                                                id="example2_previous"><a
                                                    href="#" aria-controls="example2" data-dt-idx="0" tabindex="0"
                                                    class="page-link">Previous</a></li>
                                            <li class="paginate_button page-item active"><a href="#"
                                                                                            aria-controls="example2"
                                                                                            data-dt-idx="1" tabindex="0"
                                                                                            class="page-link">1</a></li>
                                            <li class="paginate_button page-item "><a href="#" aria-controls="example2"
                                                                                      data-dt-idx="2" tabindex="0"
                                                                                      class="page-link">2</a></li>
                                            <li class="paginate_button page-item "><a href="#" aria-controls="example2"
                                                                                      data-dt-idx="3" tabindex="0"
                                                                                      class="page-link">3</a></li>
                                            <li class="paginate_button page-item "><a href="#" aria-controls="example2"
                                                                                      data-dt-idx="4" tabindex="0"
                                                                                      class="page-link">4</a></li>
                                            <li class="paginate_button page-item "><a href="#" aria-controls="example2"
                                                                                      data-dt-idx="5" tabindex="0"
                                                                                      class="page-link">5</a></li>
                                            <li class="paginate_button page-item "><a href="#" aria-controls="example2"
                                                                                      data-dt-idx="6" tabindex="0"
                                                                                      class="page-link">6</a></li>
                                            <li class="paginate_button page-item next" id="example2_next"><a href="#"
                                                                                                             aria-controls="example2"
                                                                                                             data-dt-idx="7"
                                                                                                             tabindex="0"
                                                                                                             class="page-link">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
        </div>
    </div>

    @include('accountent.inc.add_manager_model')

{{--@section('scripts')--}}
{{--    //Get Partial Company Fields (Public, Special)--}}
    <script>
        $(function () {
            $('#managerType').change(function() {
                let id = $(this).children("option:selected").val();
                console.log(id);

                $.ajax({
                    url : '{{ route( 'accountent.add-partial-manager' ) }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function( response )
                    {
                        $('.manager-content').html(response.html);
                        window.history.pushState("", "", "/");

                    },
                    error: function()
                    {
                        alert('error...');
                    }
                });
            });

        });
    </script>
{{--    // Clear add manager model after closing--}}
    <script>
        $(document).ready(function() {
            $('.modal .close').on('click', function () {
                $('#managerType').val(0);
                $('.manager-content').empty();
            })
        });
    </script>

