@extends('admin.layouts.master')
@section('styles')
@endsection
@section('title')
Categories
@endsection
@section('head-title')
Categories-List
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
                        <h3>Categories List</h3>
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
                                   data-bs-target="#add_category"
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
                    <th>Name</th>
                    <th>Status</th>
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
                        <td class="profile-image"><a href="#"><img width="28" height="28"
                                                                   src="{{ $info->image !='' ? $info->image :asset('dashboard/assets/img/profiles/avatar-02.jpg')}}"
                                                                   class="rounded-circle m-r-5"
                                                                   alt="">{{ $info->name}}</a>
                        </td>


                        <td><span
                                class="custom-badge status-{{$info->status() =='Active'?'green':'red'}} "> {{$info->status()}}</span>
                        </td>
                        <td>{{$info->created_at->format('Y-m-d')}}</td>
                        <td class="text-end">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle"
                                   data-bs-toggle="dropdown" aria-expanded="false"><i
                                        class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                       data-bs-target="#edit_category" data-category_id="{{$info->id}}"
                                       data-image="{{$info->image}}"
                                       data-status="{{$info->status}}" data-name="{{$info->name}}"><i
                                            class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" data-category_id="{{$info->id}}" href="#"
                                       data-bs-toggle="modal" data-bs-target="#delete_category"><i
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
{{--    //add_category--}}
<div class="modal custom-modal fade invoices-preview" id="add_category" role="dialog">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="add_category">New Category</h5>
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
                            <form action="{{route('categories.store')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Name:</label>
                                    <input type="text" name="name" required value="{{old('name')}}"
                                           class="form-control" id="recipient-name">

                                    @error('name')
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
                                <div class="col-6">
                                    <div class="form-group local-top-form">
                                        <label class="local-top">Image <span
                                                class="login-danger">*</span></label>
                                        <div class="settings-btn upload-files-avator">
                                            <input type="file" accept="image/*" name="image" id="file22"
                                                   onchange="document.getElementById('upload').src = window.URL.createObjectURL(this.files[0])"
                                                   class="hide-input">

                                        </div>


                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                          </span>

                                        @enderror
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="upload-images form-group local-top-form">
                                        <img id="upload" width="150px" height="150px"
                                             src="{{asset('dashboard/assets/img/logo-dark.png')}}"
                                             alt="Image">
                                        {{--                                    <a href="javascript:void(0);" class="btn-icon logo-hide-btn">--}}
                                        {{--                                        <i class="feather-x-circle"></i>--}}
                                        {{--                                    </a>--}}
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
{{--    //edit_category--}}
<div class="modal custom-modal fade invoices-preview" id="edit_category" role="dialog">
<div class="modal-dialog modal-dialog-centered">
ئذ<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="add_category">Edit Category</h5>
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
                            <form action="{{route('categories.update','edit')}}" method="post"
                                  enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <input type="hidden" id="id" value="" name="category_id">

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Name:</label>
                                    <input type="text" name="name" required value="{{old('name')}}"
                                           class="form-control" id="name">

                                    @error('name')
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
                                                    <input type="radio" id="status1" required
                                                           name="status" value="{{old('status',1)}}"
                                                           class="form-check-input">Active
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" required id="status0" name="status"
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
                                <div class="col-6">
                                    <div class="form-group local-top-form">
                                        <label class="local-top">Image <span
                                                class="login-danger">*</span></label>
                                        <div class="settings-btn upload-files-avator">
                                            <input type="file" accept="image/*" name="image" id="file2"  onchange="document.getElementById('pic').src = window.URL.createObjectURL(this.files[0])"

                                                   class="hide-input">

                                        </div>


                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                          </span>

                                        @enderror
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="upload-images form-group local-top-form">
                                        <img id="pic" width="150px" height="150px"
                                             src=""
                                             alt="Image">
                                        {{--                                    <a href="javascript:void(0);" class="btn-icon logo-hide-btn">--}}
                                        {{--                                        <i class="feather-x-circle"></i>--}}
                                        {{--                                    </a>--}}
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
{{--    delete_patient--}}
<div class="modal custom-modal modal-bg fade" id="delete_category" role="dialog">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
    <div class="modal-body">
        <div class="form-header">
            <h3>Delete Category</h3>
            <p>Are you sure want to delete?</p>
        </div>
        <div class="modal-btn delete-action">
            <div class="row">
                <div class="col-6">
                    <form action="{{route('categories.destroy','delete')}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" id="category_id" value="" name="category_id">
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
$('#delete_category').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget)
var category_id = button.data('category_id')
var modal = $(this)
modal.find('.modal-body #category_id').val(category_id);
})
</script>

<script>
// Model Edit
$('#edit_category').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget)
var id = button.data('category_id')
var name = button.data('name')
var status = button.data('status')
var image = button.data('image')
var modal = $(this)
modal.find('.modal-body #id').val(id);
modal.find('.modal-body #name').val(name);
modal.find('.modal-body #pic').attr("src",image);
// $('#upload2').attr('src', image);
if (status == 1) {
    $("#status1").prop("checked", true);
} else {
    $("#status0").prop("checked", true);

}

})
</script>



@endsection
