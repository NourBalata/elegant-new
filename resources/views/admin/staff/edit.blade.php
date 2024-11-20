@extends('admin.layouts.master')
@section('styles')
    <link href="{{ asset('dashboard/assets/js/custom/bootstrap-fileinput/css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css" />

@endsection
@section('title')
    Edit Staff
@endsection
@section('head-title')
    Edit Staff
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('staff.update',$data->id)}}" autocomplete="off" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-heading">
                                    <h4>Staff Details</h4>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-4">
                                <div class="form-group local-forms">
                                    <label>First Name <span class="login-danger">*</span></label>
                                    <input class="form-control" required name="first_name"  value="{{old('first_name',$data->name_ar)}}" type="text" placeholder="">
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
                                    <input class="form-control" required name="last_name"  value="{{old('last_name',$data->name_en)}}" type="text" placeholder="">
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
                                    <input class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"  required  name="id_number" value="{{old('id_number',$data->id_number)}}" type="text" placeholder="">
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
                                    <input class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"  required value="{{old('phone',$data->phone)}}" name="phone" type="text" placeholder="">
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
                                    <input class="form-control" required value="{{old('email',$data->email)}}" name="email"  type="email" placeholder="">
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
                                    <input class="form-control"   name="password" type="password" placeholder="">
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
                                    <input class="form-control"  name="password_confirmation" type="password" placeholder="">
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
                                    <input class="form-control datetimepicker" required value="{{old('date_brith',$data->date_of_birth)}}" name="date_brith" type="text" placeholder="">
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
                                            <input type="radio" required name="gender" value="{{old('gender','male')}}" {{$data->gender =='MALE'? 'checked':''}} class="form-check-input">Male
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" required  name="gender" value="{{old('gender','female')}}" {{$data->gender =='FEMALE'? 'checked':''}} class="form-check-input">Female
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
                                            <input type="radio" checked  required name="status" {{$data->status ==1? 'checked':''}}   value="{{old('status',1)}}" class="form-check-input">Active
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio"  required name="status"  {{$data->status ==0? 'checked':''}}   value="{{old('status',0)}}" class="form-check-input">In Active
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

                                        <input type="file"  accept="application/pdf" name="graduation_certificate" id="graduation_certificate" class="files file-input-overview">
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
                                        <input type="file"  accept="application/pdf" name="cv" id="cv"  class="files file-input-overview"
                                        >
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
                                <div class="form-group select-gender">
                                    <label class="gen-label">Salary<span class="login-danger">*</span></label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio"  name="balance_commission"  value="balance" class="form-check-input " {{$data->balance >0 ? 'checked' :''}}>Balance
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio"   name="balance_commission" value="commission" class="form-check-input " {{$data->commission >0 ? 'checked' :''}}>Commissions
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group local-forms  {{$data->balance > 0 ? 'style="display:block;" ' :'style="display:none;"' }}" id="balance"  >
                                        <label>Balance <span class="login-danger">*</span></label>
                                        <input class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="{{old('balance',$data->balance)}}" name="balance" type="text" placeholder="">
                                    </div>
                                    @error('balance')
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror

                                    <div class="form-group local-forms  " {{$data->commission > 0 ? 'style="display:block;" ' :'style="display:none;"' }}  id="commission"  >
                                        <label>Commission % <span class="login-danger">*</span></label>
                                        <input class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  value="{{old('commission',$data->commission)}}" name="commission" type="text" placeholder="">
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
                                        <input class="form-control"  required value="{{old('address',$data->address)}}" name="address" type="text" placeholder="">
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 col-xl-3">
                                    <div class="form-group local-forms">
                                        <label>City <span class="login-danger">*</span></label>
                                        <select required name="city_id" class="form-control select">
                                            <option value="">-----Select City-----</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}" {{$city->id == $data->city_id ?'selected' :''}}>{{$city->name}}</option>
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
                                         src="{{ isset($data->logo) ? $data->logo  : asset('dashboard/assets/img/logo-dark.png')}}"
                                         alt="Image">
                                    {{--                                    <a href="javascript:void(0);" class="btn-icon logo-hide-btn">--}}
                                    {{--                                        <i class="feather-x-circle"></i>--}}
                                    {{--                                    </a>--}}
                                </div>
                            </div>

                            @php
                                $days =['Saturday','Sunday','Monday','Thursday','Wednesday','Thursday']
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

                                                @foreach ($data->work_times as $work_time)
                                                    <tr>
                                                        <td>{{$work_time->day}}
                                                            <input  type="hidden" name="day[{{$loop->iteration}}]" class="form-control  " value="{{$work_time->day}}">
                                                        </td>
                                                        <td>
                                                            <div class="time-icon col-sm-12">
                                                                <input  type="text" name="start_from[{{$loop->iteration}}]" class="form-control   datetimepicker3 " value="{{$work_time->start_from}}">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="time-icon col-sm-12">
                                                                <input   type="text" name="end_to[{{$loop->iteration}}]" class="form-control datetimepicker3" id="datetimepicker4" value="{{$work_time->end_to}}">
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
            $('#graduation_certificate').fileinput({
                theme: "fa",
                maxFileCount: 1,
                allowedFileTypes: ['pdf'],
                showCancel: true,
                showRemove: true,
                showUpload: false,
                overwriteInitial: false,
                initialPreview: [
                    @if(!empty($data->graduation_certificate))
                        "{{ asset('uploads/graduation_certificate/'. $data->graduation_certificate) }}",
                    @endif
                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'pdf',
                initialPreviewConfig: [
                        @if(isset($data->graduation_certificate))
                    {
                        caption: "{{ $data->graduation_certificate }}",
                        width: "120px",
                        url: "{{ route('doctor.remove_graduation_certificate', [$data->id, '_token' => csrf_token()]) }}",
                        key: "{{ $data->id }}"
                    },

                    @endif
                ],
            });
        });

        $(function () {
            $('#cv').fileinput({
                theme: "fa",
                maxFileCount: 1,
                allowedFileTypes: ['pdf'],
                showCancel: true,
                showRemove: true,
                showUpload: false,
                overwriteInitial: false,
                initialPreview: [
                    @if(!empty($data->cv))
                        "{{ asset('uploads/cv/'. $data->cv) }}",
                    @endif
                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'pdf',
                initialPreviewConfig: [
                        @if(isset($data->cv))
                    {
                        caption: "{{ $data->cv }}",
                        width: "120px",
                        url: "{{ route('doctor.remove_cv', [$data->id, '_token' => csrf_token()]) }}",
                        key: "{{ $data->id }}"
                    },

                    @endif
                ],
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $("input[name='balance_commission']").change(function(){
                if($(this).val()=="balance")
                {

                    $("#balance").show();
                    $("#commission").hide();
                    $("#balance").attr("required", "true");
                    $("#commission").attr("required", "false");
                }
                else
                {
                    $("#balance").hide();
                    $("#commission").show();
                    $("#balance").attr("required", "false");
                    $("#commission").attr("required", "true");
                }
            });
        });

        if($("#graduation_certificate").files.length == 0 ){
            $("#graduation_certificate").attr("required", "true");
        }else {
            $("#graduation_certificate").attr("required", "false");


        }
    </script>
@endsection
