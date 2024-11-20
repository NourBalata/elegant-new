@extends('admin.layouts.master')
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
@endsection
@section('title')
    Services
@endsection
@section('head-title')
    Services-List
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
                                    <h3>Services List</h3>
                                    <div class="doctor-search-blk">
                                        {{--                                        <div class="top-nav-search table-search-blk">--}}
                                        {{--                                            <form>--}}
                                        {{--                                                <input type="text" id="search" class="form-control"--}}
                                        {{--                                                       placeholder="Search here">--}}
                                        {{--                                                <a class="btn"><img src="{{asset('dashboard/assets/img/icons/search-normal.svg')}}"--}}
                                        {{--                                                                    alt=""></a>--}}
                                        {{--                                            </form>--}}
                                        {{--                                        </div>--}}
                                        <div class="add-group">
                                            <a href="#" data-bs-toggle="modal"
                                               data-bs-target="#add_service"
                                               class=" modal-effect btn btn-primary add-pluss ms-2"><img
                                                    src="{{asset('dashboard/assets/img/icons/plus.svg')}}" alt=""></a>


                                            <a href="javascript:;"
                                               class="btn btn-primary doctor-refresh ms-2"><img
                                                    src="{{asset('dashboard/assets/img/icons/re-fresh.svg')}}"
                                                    alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">
                                <a href="javascript:;" class=" me-2"><img
                                        src="{{asset('dashboard/assets/img/icons/pdf-icon-01.svg')}}"
                                        alt=""></a>
                                <a href="javascript:;" class=" me-2"><img
                                        src="{{asset('dashboard/assets/img/icons/pdf-icon-02.svg')}}"
                                        alt=""></a>
                                <a href="javascript:;" class=" me-2"><img
                                        src="{{asset('dashboard/assets/img/icons/pdf-icon-03.svg')}}"
                                        alt=""></a>
                                <a href="javascript:;"><img
                                        src="{{asset('dashboard/assets/img/icons/pdf-icon-04.svg')}}" alt=""></a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="table1" class="table border-0 custom-table comman-table  mb-0">
                            <thead>
                            <tr>

                                <th>#</th>
                                <th>Name Arabic</th>
                                <th>Name English</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Description</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $info )
                                <tr>
                                    <td>
                                        {{$loop->iteration}}
                                    </td>
                                    <td>
                                        {{$info->name_ar}}
                                    </td>
                                    <td>
                                        {{$info->name_en}}
                                    </td>
                                    <td>
                                        {{isset($info->category->name)? $info->category->name :''}}
                                    </td>
                                    <td>
                                        <span class="custom-badge status-blue "> {{$info->price}}</span>

                                    </td>
                                    <td><span
                                            class="custom-badge status-{{$info->status() =='Active'?'green':'red'}} "> {{$info->status()}}</span>
                                    </td>

                                    <td>
                                        {{isset($info->description)? $info->description :'----'}}
                                    </td>
                                    <td>{{$info->created_at->format('Y-m-d')}}</td>
                                    <td class="text-end">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle"
                                               data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                   data-bs-target="#edit_service" data-service_id="{{$info->id}}"
                                                   data-name_ar="{{$info->name_ar}}" data-name_en="{{$info->name_en}}"
                                                   data-category_id="{{$info->category_id}}"
                                                   data-description="{{$info->description}}"
                                                   data-price="{{$info->price}}"
                                                   data-status="{{$info->status}}"><i
                                                        class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>

                                                <a class="dropdown-item" data-service_id="{{$info->id}}" href="#"
                                                   data-bs-toggle="modal" data-bs-target="#delete_service"><i
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
        </div>
    </div>
    {{--    //add_service--}}
    <div class="modal custom-modal fade invoices-preview" id="add_service" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_category">New Service</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card invoice-info-card">
                                <div class="card-body pb-0">
                                    <div class="modal-body">
                                        <form action="{{route('services.store')}}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Name Arabic:<span
                                                        class="login-danger">*</span></label>
                                                <input type="text" name="name_ar" required value="{{old('name_ar')}}"
                                                       class="form-control" id="recipient-name">

                                                @error('name_ar')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                              </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Name English:<span
                                                        class="login-danger">*</span></label>
                                                <input type="text" name="name_en" required value="{{old('name_en')}}"
                                                       class="form-control" id="recipient-name">

                                                @error('name_en')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                              </span>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Category:<span
                                                        class="login-danger">*</span></label>
                                                <br>
                                                <select type="text" name="category_id" required
                                                        value="{{old('category_id')}}"
                                                        class="form-control  select2">
                                                    <option value="">------select-------</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>

                                                @error('category_id')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                              </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Price: <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" name="price" required value="{{old('price')}}"
                                                       class="form-control"
                                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                       id="recipient-name">

                                                @error('price')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                              </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="col">
                                                    <div class="form-group select-gender">
                                                        <label class="gen-label">Status <span
                                                                class="login-danger">*</span></label>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" checked required name="status"
                                                                       value="{{old('status',1)}}"
                                                                       class="form-check-input">Active
                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" required name="status"
                                                                       value="{{old('status',0)}}"
                                                                       class="form-check-input">In Active
                                                            </label>
                                                        </div>

                                                        @error('status')
                                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                              </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group local-top-form">
                                                    <label class="local-top">Description</label>
                                                    <div class="form-group ">
                                                        <textarea name="description"
                                                                  class="form-control">{{old('description')}}</textarea>

                                                    </div>


                                                    @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                 </span>

                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    //edit_service--}}
    <div class="modal custom-modal fade invoices-preview" id="edit_service" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_category">Edit Service</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card invoice-info-card">
                                <div class="card-body pb-0">
                                    <div class="modal-body">
                                        <form action="{{route('services.update','edit')}}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('put')

                                            <input type="hidden" name="service_id"
                                                   class="form-control" id="id">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Name Arabic:<span
                                                        class="login-danger">*</span></label>
                                                <input type="text" name="name_ar" required value="{{old('name_ar')}}"
                                                       class="form-control" id="name_ar">

                                                @error('name_ar')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                              </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Name English:<span
                                                        class="login-danger">*</span></label>
                                                <input type="text" name="name_en" required value="{{old('name_en')}}"
                                                       class="form-control" id="name_en">

                                                @error('name_en')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                              </span>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Category:<span
                                                        class="login-danger">*</span></label>
                                                <br>
                                                <select type="text" id="category_id" name="category_id" required
                                                        value="{{old('category_id')}}"
                                                        class="form-control  select2">
                                                    <option value="">------select-------</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>

                                                @error('category_id')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                              </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Price: <span
                                                        class="login-danger">*</span></label>
                                                <input type="text" name="price" required value="{{old('price')}}"
                                                       class="form-control"
                                                       oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                       id="price">

                                                @error('price')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                              </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="col">
                                                    <div class="form-group select-gender">
                                                        <label class="gen-label">Status <span
                                                                class="login-danger">*</span></label>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" id="status1" checked required
                                                                       name="status"
                                                                       value="{{old('status',1)}}"
                                                                       class="form-check-input">Active
                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="radio" id="status0" required name="status"
                                                                       value="{{old('status',0)}}"
                                                                       class="form-check-input">In Active
                                                            </label>
                                                        </div>

                                                        @error('status')
                                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                              </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group local-top-form">
                                                    <label class="local-top">Description</label>
                                                    <div class="form-group ">
                                                        <textarea name="description" id="description"
                                                                  class="form-control">{{old('description')}}</textarea>

                                                    </div>


                                                    @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                 </span>

                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    delete_service--}}
    <div class="modal custom-modal modal-bg fade" id="delete_service" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Service</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <form action="{{route('services.destroy','delete')}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" id="service_id" value="" name="service_id">
                                    <a onclick="parentNode.submit();"
                                       class="btn btn-primary paid-continue-btn">Delete</a>

                                </form>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-bs-dismiss="modal"
                                   class="btn btn-primary paid-cancel-btn">Cancel</a>
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
        $(document).ready(function () {
            $('#table1').DataTable();
        });


    </script>

    <script>
        // Model Delete
        $('#delete_service').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var service_id = button.data('service_id')
            var modal = $(this)
            modal.find('.modal-body #service_id').val(service_id);
        })
    </script>

    <script>
        // Model Edit
        $('#edit_service').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('service_id')
            var name_ar = button.data('name_ar')
            var name_en = button.data('name_en')
            var description = button.data('description')
            var status = button.data('status')
            var price = button.data('price')
            var category_id = button.data('category_id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name_ar').val(name_ar);
            modal.find('.modal-body #name_en').val(name_en);
            modal.find('.modal-body #price').val(price);
            modal.find('.modal-body #description').val(description);
            modal.find('.modal-body #category_id').val(category_id);


            if (status == 1) {
                $("#status1").prop("checked", true);
            } else {
                $("#status0").prop("checked", true);

            }

        })
    </script>

@endsection
