@extends('admin.layouts.master')
@section('styles')
@endsection
@section('title')
    Settings
@endsection
@section('head-title')
    Edit Settings
@endsection
@section('content')

    <div class="settings-menu-links">
        <ul class="nav nav-tabs menu-tabs">
            <li class="nav-item active">
                <a class="nav-link" href="#">General Settings</a>
            </li>

        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Website Basic Details</h5>
                </div>
                <div class="card-body pt-0">
                    <form is="myform" action="{{route('settings.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="settings-form">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Website Name Arabic <span class="star-red">*</span></label>
                                        <input type="text" required name="name_ar"
                                               value="{{old('name_ar',$data->name_ar)}}"
                                               class="form-control @error('name_ar') is-invalid @enderror"
                                               placeholder="Enter Website Name Arabic">
                                    </div>
                                    @error('name_ar')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Website Name English <span class="star-red">*</span></label>
                                        <input type="text" required name="name_en"
                                               value="{{old('name_en',$data->name_en)}}"
                                               class="form-control @error('name_en') is-invalid @enderror"
                                               placeholder="Enter Website Name English">
                                    </div>
                                    @error('name_en')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Email <span class="star-red">*</span></label>
                                        <input type="email" required name="email" value="{{old('email',$data->email)}}"
                                               class="form-control @error('email') is-invalid @enderror"
                                               placeholder="Enter Email">
                                    </div>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">

                                <div class="col">
                                    <div class="form-group">
                                        <label>Phone <span class="star-red">*</span></label>
                                        <input type="text" required name="phone" value="{{old('phone',$data->phone)}}"
                                               class="form-control @error('phone') is-invalid @enderror"
                                               placeholder="Enter Phone">
                                    </div>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label>Telephone <span class="star-red">*</span></label>
                                        <input type="text" required name="telephone"
                                               value="{{old('telephone',$data->telephone)}}"
                                               class="form-control @error('telephone') is-invalid @enderror"
                                               placeholder="Enter Telephone">
                                    </div>
                                    @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label>Tax Number <span class="star-red">*</span></label>
                                        <input type="text" required name="tax_number"
                                               value="{{old('tax_number',$data->tax_number)}}" class="form-control @error('tax_number') is-invalid @enderror"
                                               placeholder="Enter Tax Number">
                                    </div>
                                    @error('tax_number')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror

                                </div>

                            </div>
                            <div class="row">

                                <div class="col">
                                    <div class="form-group">
                                        <label>Address 1 <span class="star-red">*</span></label>
                                        <input type="text" required name="address" value="{{old('address',$data->address)}}"
                                               class="form-control @error('address') is-invalid @enderror"
                                               placeholder="Enter Address">
                                    </div>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label>Address 2 <span class="star-red">*</span></label>
                                        <input type="text" required name="address2"
                                               value="{{old('address2',$data->address2)}}"
                                               class="form-control @error('address2') is-invalid @enderror"
                                               placeholder="Enter Address">
                                    </div>
                                    @error('address2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>



                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group ">
                                        <p class="settings-label">Logo <span class="star-red">*</span></p>
                                        <div class="settings-btn">
                                            <input type="file" accept="image/*" name="logo" id="file"
                                                   onchange="document.getElementById('upload').src = window.URL.createObjectURL(this.files[0])"
                                                   class="hide-input">
                                            <label for="file" class="upload">
                                                <i class="feather-upload"></i>
                                            </label>
                                        </div>
                                        <h6 class="settings-size">Recommended image size is <span>150px x 150px</span>
                                        </h6>
                                        <div class="upload-images">
                                            <img id="upload" width="150px" height="150px"
                                                 src="{{ $data->logo !='' ?  $data->logo :asset('dashboard/assets/img/logo-dark.png')}}"
                                                 alt="Image">
                                            {{--                                    <a href="javascript:void(0);" class="btn-icon logo-hide-btn">--}}
                                            {{--                                        <i class="feather-x-circle"></i>--}}
                                            {{--                                    </a>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <div class="settings-btns">
                                    <button type="submit"
                                            class="border-0 btn btn-primary btn-gradient-primary btn-rounded">
                                        Update
                                    </button>&nbsp;&nbsp;
                                    {{--                                    <button type="reset" class="btn btn-secondary btn-rounded">Cancel</button>--}}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')

@endsection
