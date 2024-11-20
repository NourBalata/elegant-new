@extends('admin.layouts.master')
@section('styles')
    <link href="{{ asset('dashboard/assets/js/custom/bootstrap-fileinput/css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css" />

@endsection
@section('title')
    Create Doctor
@endsection
@section('head-title')
    Create Doctor
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('doctors.store')}}" autocomplete="off" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-heading">
                                    <h4>Doctor Details</h4>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-4">
                                <div class="form-group local-forms">
                                    <label>First Name <span class="login-danger">*</span></label>
                                    <input class="form-control" required name="first_name"  value="{{old('first_name')}}" type="text" placeholder="">
                                </div>
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 col-xl-4">
                                <div class="form-group local-forms">
                                    <label>Last Name <span class="login-danger">*</span></label>
                                    <input class="form-control" required name="last_name" value="{{old('last_name')}}" type="text" placeholder="">
                                </div>
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 col-xl-4">
                                <div class="form-group local-forms">
                                    <label>ID<span class="login-danger">*</span></label>
                                    <input class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"  required  name="id_number" value="{{old('id_number')}}" type="text" placeholder="">
                                </div>
                                @error('id_number')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                      </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 col-xl-6">
                                <div class="form-group local-forms">
                                    <label>Phone <span class="login-danger">*</span></label>
                                    <input class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"  required value="{{old('phone')}}" name="phone" type="text" placeholder="">
                                </div>

                                @error('phone')
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
                                <div class="form-group local-forms cal-icon">
                                    <label>Date Of Birth <span class="login-danger">*</span></label>
                                    <input class="form-control datetimepicker" required value="{{old('date_brith')}}" name="date_brith" type="text" placeholder="">
                                </div>

                                @error('date_brith')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                      </span>
                                @enderror

                            </div>
                            <div class="col">
                                <div class="form-group select-gender">
                                    <label class="gen-label">Gender<span class="login-danger">*</span></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" required name="gender" value="{{old('gender','male')}}" class="form-check-input">Male
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" required  name="gender" value="{{old('gender','female')}}" class="form-check-input">Female
                                        </label>
                                    </div>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>
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
                                <div class="form-group local-top-form">
                                    <label class="local-top">Education (Bachelor's degree) <span class="login-danger">*</span></label>
                                    <div class="settings-btn  file-loading">

                                        <input type="file" required accept="application/pdf" name="graduation_certificate" class="files file-input-overview">
                                        <label for="file" class="upload">Choose File</label>

                                    </div>

                                    @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-12 col-sm-12">
                                <div class="form-group local-top-form">
                                    <label class="local-top">Education (Cv)</label>
                                    <div class="settings-btn file-loading">
                                        <input type="file"  accept="application/pdf" name="cv"  class="files file-input-overview">
                                        <label for="file" class="upload">Choose File</label>
                                    </div>


                                    @error('cv')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">

                                    <div class="col-4">
                                    <div class="form-group local-forms" id="balance" >
                                        <label>Balance <span class="login-danger">*</span></label>
                                        <input class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="{{old('balance')}}" name="balance" type="text" placeholder="">
                                    </div>
                                        @error('balance')
                                        <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                      </span>
                                        @enderror

                                        <div class="form-group local-forms" id="commission" >
                                            <label>Commission % <span class="login-danger">*</span></label>
                                            <input class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  value="{{old('commission')}}" name="commission" type="text" placeholder="">
                                        </div>
                                    @error('commission')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="row">
                            <div class="col-6 col-sm-6">
                                <div class="form-group local-forms">
                                    <label>Address <span class="login-danger">*</span></label>
                                    <input class="form-control"  required value="{{old('address')}}" name="address" type="text" placeholder="">
                                </div>
                            </div>
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

                            @php
                            $days =['Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday']
                            @endphp
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <div class="card-block">
                                        <h4 class="text-bold card-title">Worktime</h4>
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>

                                                <tr>
                                                    <th>Day</th>
                                                    <th>From</th>
                                                    <th>To</th>
                                                </tr>

                                                </thead>
                                                <tbody>
                                                @for($i=0; $i< count($days) ; $i++)
                                                <tr>
                                                    <td>{{$days[$i]}}
                                                        <input  type="hidden" name="day[]" class="form-control  " value="{{$days[$i]}}">
                                                    </td>
                                                    <td>
                                                        <div class="time-icon col-sm-12">
                                                        <input  type="text"  name="start_from[]" class="form-control   datetimepicker3 ">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="time-icon col-sm-12">
                                                            <input   type="text"  name="end_to[]" class="form-control datetimepicker3" id="datetimepicker4">
                                                        </div>
                                                    </td>

                                                </tr>
                                                @endfor
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="Patient-submit text-end">
                                    <button type="submit" class="btn btn-primary submit-form me-2">Save
                                    </button>
                                    <a  href="{{route('patients.index')}}" class="btn btn-secondary cancel-form">Back</a>
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

    <script src="{{ asset('dashboard/assets/js/custom/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/custom/bootstrap-fileinput/themes/fa/theme.min.js') }}"></script>
    <script>
        $(function () {
            $('.files').fileinput({
                theme: "fa",
                maxFileCount: 1,
                allowedFileTypes: ['pdf'],
                showCancel: false,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                initialPreview: [

                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'pdf',
                maxFileSize: 1000,
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $("input[name='balance_commission']").change(function(){
                if($(this).val()=="balance")
                {

                    $("#balance").show();
                    $("#commission").show();
                    $("#balance").attr("required", "true");
                    $("#commission").attr("required", "true");
                }
                else
                {
                    $("#commission").show();
                    $("#balance").attr("required", "false");
                    $("#commission").attr("required", "true");
                    $("#balance").hide();
                }
            });
        });
    </script>
@endsection
