@extends('admin.layouts.master')
@section('styles')
@endsection
@section('title')
    Create Supplier
@endsection
@section('head-title')
    Create Supplier
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('suppliers.store')}}" autocomplete="off" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-heading">
                                    <h4>Supplier Details</h4>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-4">
                                <div class="form-group local-forms">
                                    <label>Name Arabic <span class="login-danger">*</span></label>
                                    <input class="form-control" required name="name_ar"  value="{{old('name_ar')}}" type="text" placeholder="">
                                </div>
                                @error('name_ar')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 col-xl-4">
                                <div class="form-group local-forms">
                                    <label>Name English <span class="login-danger">*</span></label>
                                    <input class="form-control" required name="name_en" value="{{old('name_en')}}" type="text" placeholder="">
                                </div>
                                @error('name_en')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 col-xl-4">
                                <div class="form-group local-forms">
                                    <label>Phone<span class="login-danger">*</span></label>
                                    <input class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"  required  name="phone" value="{{old('phone')}}" type="text" placeholder="">
                                </div>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 col-xl-6">
                                <div class="form-group local-forms">
                                    <label>Telephone <span class="login-danger">*</span></label>
                                    <input class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"  required value="{{old('telephone')}}" name="telephone" type="text" placeholder="">
                                </div>

                                @error('telephone')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 col-xl-6">
                                <div class="form-group local-forms">
                                    <label>Email <span class="login-danger">*</span></label>
                                    <input class="form-control" required value="{{old('email')}}" name="email"  type="email" placeholder="">
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 col-xl-6">
                                <div class="form-group local-forms">
                                    <label>Password <span class="login-danger">*</span></label>
                                    <input class="form-control"  required name="password" type="password" placeholder="">
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 col-xl-6">
                                <div class="form-group local-forms">
                                    <label>Confirm Password <span class="login-danger">*</span></label>
                                    <input class="form-control" required name="password_confirmation" type="password" placeholder="">
                                </div>
                                @error('confirm-password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>

                            <div class="col">
                                <div class="form-group select-gender">
                                    <label class="gen-label">Status <span class="login-danger">*</span></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" checked  required name="status" value="{{old('status',1)}}" class="form-check-input">Active
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio"  required name="status" value="{{old('status',0)}}" class="form-check-input">In Active
                                        </label>
                                    </div>

                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-sm-12">
                                <div class="form-group local-forms">
                                    <label>Address <span class="login-danger">*</span></label>
                                    <textarea required class="form-control" name="address" rows="3" cols="30">{{old('address')}}</textarea>
                                </div>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>
                            <div class="row">
                            <div class="col-6 col-md-6 col-xl-3">
                                <div class="form-group local-forms">
                                    <label>City <span class="login-danger">*</span></label>
                                    <select required name="city_id" class="form-control select">
                                        <option value="">-----Select City-----</option>
                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @error('city_id')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>

                            <div class="col-4">
                                <div class="form-group local-top-form">
                                    <label class="local-top">Avatar <span class="login-danger">*</span></label>
                                    <div class="settings-btn upload-files-avator">
                                        <input type="file" accept="image/*" name="logo" id="file"
                                               onchange="document.getElementById('upload').src = window.URL.createObjectURL(this.files[0])" class="hide-input">
                                        <label for="file" class="upload">Choose File</label>
                                    </div>


                                    @error('logo')
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
                            <div class="col-12">
                                <div class="Patient-submit text-end">
                                    <button type="submit" class="btn btn-primary submit-form me-2">Save
                                    </button>
                                    <a  href="{{route('suppliers.index')}}" class="btn btn-secondary cancel-form">Back</a>
                                </div>
                            </div>
                            <br>  <br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $( document ).ready(function() {
            $('input').attr('autocomplete','off');
        });
    </script>
@endsection
