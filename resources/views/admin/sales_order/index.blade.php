@extends('admin.layouts.master')
@section('styles')
@endsection
@section('title')
    Sales Order
@endsection
@section('head-title')
    Sales Order-List
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table show-entire">
                <div class="card-body">

                    <div class="page-table-header mb-2">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="doctor-table-blk">
                                    <h3>Sales Order List</h3>
                                    <div class="doctor-search-blk">
                                        <div class="top-nav-search table-search-blk">
                                            {{--                                            <form>--}}
                                            {{--                                                <input type="text" id="search" class="form-control"--}}
                                            {{--                                                       placeholder="Search here">--}}
                                            {{--                                                <a class="btn"><img src="{{asset('dashboard/assets/img/icons/search-normal.svg')}}"--}}
                                            {{--                                                                    alt=""></a>--}}
                                            {{--                                            </form>--}}
                                        </div>
                                        <div class="add-group">
                                            <a href="{{route('sales_order.create')}}"
                                               class="btn btn-primary add-pluss ms-2"><img
                                                    src="{{asset('dashboard/assets/img/icons/plus.svg')}}" alt=""></a>
                                            <a href="javascript:;"
                                               class="btn btn-primary doctor-refresh ms-2"><img
                                                    src="{{asset('dashboard/assets/img/icons/re-fresh.svg')}}" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">
                                <a href="javascript:;" class=" me-2"><img src="{{asset('dashboard/assets/img/icons/pdf-icon-01.svg')}}"
                                                                          alt=""></a>
                                <a href="javascript:;" class=" me-2"><img src="{{asset('dashboard/assets/img/icons/pdf-icon-02.svg')}}"
                                                                          alt=""></a>
                                <a href="javascript:;" class=" me-2"><img src="{{asset('dashboard/assets/img/icons/pdf-icon-03.svg')}}"
                                                                          alt=""></a>
                                <a href="javascript:;"><img src="{{asset('dashboard/assets/img/icons/pdf-icon-04.svg')}}" alt=""></a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="table1"  class="table border-0 custom-table comman-table  mb-0">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>Number</th>
                                <th>Patient</th>
                                <th>Phone</th>
                                <th>Due Date</th>
                                <th>Quantity</th>
                                <th>Total Discount</th>
                                <th>Final Total </th>
                                <th>Status</th>
                                <th>Joining Date</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $data as $info)
                            <tr>
                                <td>
                                {{$loop->iteration}}
                                </td>

                                <td>
                                    {{$info->number}}
                                </td>
                                <td class="profile-image"><a href="{{route('patients.show',$info->id)}}"><img width="28" height="28"
                                   src="{{$info->patient->logo !='' ? $info->patient->logo :asset('dashboard/assets/img/profiles/avatar-02.jpg')}}"
                                          class="rounded-circle m-r-5" alt="">    {{$info->patient_name}}</a>
                                </td>
                                <td>{{$info->patient->phone}}</td>

                                <td>{{$info->due_date}}</td>
                                <td><span class="custom-badge status-blue">{{$info->quantity}}</span></td>
                                <td><span class="custom-badge status-orange">{{ number_format($info->total_discounts,0)}}%</span></td>
                                <td><span class="custom-badge status-green">{{$info->final_total}}</span></td>


                                <td> <span class="custom-badge status-{{$info->status->color}} "> {{$info->status->name}}</span></td>
                                <td>{{$info->created_at->format('Y-m-d')}}</td>
                                <td class="text-end">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle"
                                           data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="{{route('sales_order.edit',$info->id)}}"><i
                                                    class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="{{route('sales_order.show',$info->id)}}"><i
                                                    class="fa-solid fa-eye m-r-5"></i> Details</a>
                                            <a class="dropdown-item" data-user_id ="{{$info->id}}" href="#" data-bs-toggle="modal" data-bs-target="#delete_patient" ><i
                                                    class="fa fa-trash-alt m-r-5"></i> Delete</a>
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

            <div class="modal custom-modal modal-bg fade" id="delete_patient" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Patient</h3>
                                <p>Are you sure want to delete?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6">
                                        <form action="{{route('patients.destroy','delete')}}" method="post" >
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" id="user_id" value="" name="user_id" >
                                            <a  onclick="parentNode.submit();"  class="btn btn-primary paid-continue-btn">Delete</a>

                                        </form>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary paid-cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
@section('scripts')
    <script>


        // #myInput is a <input type="text"> element
        $('#search').on( 'keyup', function () {
            $('#table1').search( this.value ).draw();

        } );
    </script>

    <script>
        // Model Delete
        $('#delete_patient').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var user_id = button.data('user_id')
            var modal = $(this)
            modal.find('.modal-body #user_id').val(user_id);
        });
    </script>
@endsection
