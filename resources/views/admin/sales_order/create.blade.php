@extends('admin.layouts.master')
@section('styles')
    <link href="{{ asset('dashboard/assets/js/custom/bootstrap-fileinput/css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css" />

@endsection
@section('title')
    Create Sale Order
@endsection
@section('head-title')
    Create Sale Order
@endsection
@section('content')
    <div class="content container-fluid">

        <div class="page-header invoices-page-header">
            <div class="row align-items-center">
                <div class="col">
                    <ul class="breadcrumb invoices-breadcrumb">
                        <li class="breadcrumb-item invoices-breadcrumb-item">
                            <a href="{{route('sales_order.index')}}">
                                <i class="fa fa-chevron-left"></i> Back to Sales Order List
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
{{--                    <div class="invoices-create-btn">--}}
{{--                        <a class="invoices-preview-link" href="#" data-bs-toggle="modal"--}}
{{--                           data-bs-target="#invoices_preview"><i class="fa fa-eye"></i> Preview</a>--}}
{{--                        <a href="#" data-bs-toggle="modal" data-bs-target="#delete_invoices_details"--}}
{{--                           class="btn delete-invoice-btn">--}}
{{--                            Delete Invoice--}}
{{--                        </a>--}}
{{--                        <a href="#" data-bs-toggle="modal" data-bs-target="#save_invocies_details"--}}
{{--                           class="btn save-invoice-btn">--}}
{{--                            Save Draft--}}
{{--                        </a>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card invoices-add-card">
                    <div class="card-body">
                        <form action="{{route('sales_order.store')}}" id="form" class="invoices-form" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="invoices-main-form">
                                <div class="row">
                                    <h4 class="invoice-details-title">Patient details</h4>
                                    <br>
                                    <div class="col-3 ">

                                        <div class="form-group">
                                            <label>Patient Name</label>
                                            <select  required class="form-control"  name="patient_id" id="patient_id">
                                                <option value="0">---select--</option>
                                                @foreach($patients as $patient)
                                                <option value="{{$patient->id}}">{{$patient->name_ar}} {{$patient->name_en}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('patient_id')
                                        <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                      </span>
                                        @enderror
                                    </div>

                                    <div class="col-3 ">
                                        <div class="form-group">
                                            <label>ID Number</label>

                                            <input class="form-control" value="{{old('id_number')}}"  required readonly type="text" name="id_number" id="id_number" >
                                            <input class="form-control" value="{{old('patient_name')}}"  required readonly type="hidden" name="patient_name" id="patient_name" >
                                        </div>

                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input class="form-control" value="{{old('phone')}}" required readonly type="text" name="phone" id="phone" >

                                        </div>

                                    </div>
                                    <div class="col-3  ">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" value="{{old('email')}}" required readonly type="text" name="email" id="email" >

                                        </div>

                                    </div>


                                    <div class="col-3 ">
                                        <div class="form-group">
                                            <label>Gender</label>

                                            <input class="form-control" value="{{old('gender')}}" required readonly type="text" name="gender" id="gender" >
                                        </div>

                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input class="form-control" value="{{old('city')}}" required readonly type="text" name="city" id="city" >

                                        </div>

                                    </div>
                                    <div class="col-3  ">
                                        <div class="form-group">
                                            <label>Balance</label>
                                            <input class="form-control" value="{{old('balance')}}" required readonly type="text" name="balance" id="balance" >

                                        </div>

                                    </div>

                                    <div class="col-3  ">
                                        <div class="form-group">

                                            <img   src="" id="patient_image_en" alt="Snow" style="width:100px ;display: none; border: 5px solid rgba(85,85,85,0.35);">
                                            <img  src="{{asset('dashboard/assets/img/user.jpg')}}" id="patient_image_dis" alt="Snow" style="width:100px ; border: 5px solid rgba(85,85,85,0.35);">
                                        </div>

                                    </div>
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4 class="invoice-details-title">Invoice details</h4>
                                        <div class="invoice-details-box">
                                            <div class="invoice-inner-head">
                                                    <span>Invoice No. <a
                                                            href="#">Number is Automatic</a></span>
                                            </div>
                                            <div class="invoice-inner-footer">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="invoice-inner-date">
                                                        <span>
                                                        Date <input class="form-control datetimepicker" name="date" id="date" readonly value="{{old('date',date('d-m-Y'))}}" type="text" placeholder="">
                                                        </span>
                                                        </div>
                                                         </div>
                                                   <div class="col-lg-4 col-md-4">
                                                         <div class="invoice-inner-date invoice-inner-datepic">
                                                        <span>
                                                        Due Date <input  class="form-control datetimepicker" value="{{old('due_date')}}" type="text" name="due_date" id="due_date" required placeholder="Select">
                                                        </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="invoice-inner-date invoice-inner-datepic">
                                                        <span>
                                                        Status
                                                         <select required class="form-control" name="status_id" id="status_id">
                                                         <option value="">---select--</option>
                                                            <option value="1" style="color: #0a53be"> New </option>
                                                            <option value="2" style="color: #ec8b0b"> Busy </option>
                                                            <option value="3" style="color: #0df33b"> Complete </option>
                                                            <option value="4" style="color: #f60404"> Cancel </option>


                                                         </select>

                                                        </span>
                                                        </div>
                                                    </div>


                                                </div>


                                            </div>


                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="invoice-add-table">
                                <h4>Service Details</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-nowrap  mb-0 no-footer add-table-items" id="service_details">
                                        <thead>
                                        <tr>
                                            <th>Service</th>
                                            <th>Category</th>
                                            <th>Doctor</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Amount</th>
                                            <th>Discount%</th>
                                            <th>Amount Discount</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody >
                                        <tr  class="add-row" id="0">
                                            <td class="col-2" >

                                                    <select  type="text" id="service0" name="service[0]" class="service form-control">
                                                        <option value="">----select----</option>
                                                        @foreach($services as $service)
                                                        <option value="{{$service->id}}">{{$service->name_ar}}</option>
                                                        @endforeach
                                                    </select>
                                            </td>
                                            <td class="col-2" >
                                                <input type="text" readonly id="category0" name="category[0]" class="category form-control">
                                            </td>
                                            <td class="col-2" >
                                                <select id="doctor0" required name="doctor[0]" class="doctor form-control">
                                                    <option value="">----select----</option>
                                                    @foreach($doctors as $doctor)
                                                        <option value="{{$doctor->id}}">{{$doctor->name_ar}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="col-1">
                                                <input type="text" required id="quantity0" onkeypress='validate(event)' onchange="mychangeitem(this)" name="quantity[0]" value="0" class="quantity form-control">
                                            </td>
                                            <td class="col-2">
                                                <input type="text" required id="price0" onkeypress='validate(event)'   onchange="mychangeitem(this)"  name="price[0]" value="0" class="price form-control">
                                            </td>
                                            <td class="col-2">
                                                <input type="text" required  readonly id="amount0" name="amount[0]" value="0"  class="amount form-control">
                                            </td>
                                            <td class="col-1">
                                                <input type="text"   id="discount0" onkeypress='validate(event)'  onchange="mychangeitem(this)"  name="discount[0]" value="0" class="discount form-control">
                                            </td>
                                            <td class="col-2">
                                                <input type="text" required readonly id="amount_discount0" value="0" name="amount_discount[0]" class="amount_discount form-control">
                                            </td>
                                            <td class="add-remove text-end">
                                                <a href="javascript:void(0);" class="add-btns me-2"><i
                                                        class="fas fa-plus-circle"></i></a>


                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-7 col-md-6">
                                    <div class="invoice-fields">
                                        <h4 class="field-title">More Fields</h4>

                                    </div>
                                    <div class="invoice-faq">
                                        <div class="panel-group" id="accordion" role="tablist"
                                             aria-multiselectable="true">

                                            <div class="faq-tab">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingThree">
                                                        <p class="panel-title">
                                                            <a class="collapsed" data-bs-toggle="collapse"
                                                               data-bs-parent="#accordion" href="#collapseThree"
                                                               aria-expanded="false" aria-controls="collapseThree">
                                                                <i class="fas fa-plus-circle me-1"></i> Add Notes
                                                            </a>
                                                        </p>
                                                    </div>
                                                    <div id="collapseThree" class="panel-collapse collapse"
                                                         role="tabpanel" aria-labelledby="headingThree"
                                                         data-bs-parent="#accordion">
                                                        <div class="panel-body">
                                                            <textarea class="form-control" name="note" id="note">{{old('note')}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-lg-12 col-md-6">
                                        <span>Attachment</span>
                                        <div class=" file-loading col-6">
                                        <input type="file"  accept="application/pdf" name="attachment"  class="files file-input-overview">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-5 col-md-6">
                                    <div class="invoice-total-card">
                                        <h4 class="invoice-total-title">Summary</h4>
                                        <div class="invoice-total-box">
                                            <div class="invoice-total-inner">
                                                <p>Quantity <span id="quantity_all">0</span></p>
                                                <p>Total <span id="total_all">0</span></p>
                                                <input type="hidden" name="total_all" id="total_all_input">
                                                <p>Total Discount <span id="discount_all">0</span>%</p>
                                                <input type="hidden" name="discount_all" id="discount_all_input">
                                                <input type="hidden" name="quantity_all" id="quantity_all_input">


                                            </div>
                                            <div class="invoice-total-footer">
                                                <h4>Total Amount <span id="total_amount_all">0</span></h4>
                                                <input type="hidden" name="total_amount_all" id="total_amount_all_input">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="upload-sign">

                                        <div class="form-group float-end mb-0">
                                            <button class="btn btn-primary" id="submit" type="submit">Save Order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('dashboard/assets/js/custom/sales_order.js')}}"></script>
    <script>
        $( document ).ready(function() {
            $('input').attr('autocomplete','off');
        });
        // global app configuration object
        var config = {
            routes: {
                patient: "{{ URL::to('admin/patient_data') }}/",
                service: "{{ URL::to('admin/service_data') }}/",
            }
        };
    </script>


    <script >
        $(document).ready(function() {

            $(document).on("click", ".add-btns", function () {


                var trCount = $('#service_details').find('tr.add-row:last').length;
                var numberIncr = trCount > 0 ? parseInt($('#service_details').find('tr.add-row:last').attr('id')) + 1 : 0;

                var experiencecontent = '<tr class="add-row" id="' + numberIncr + '">' +
                    '<td class="col-2">' +
                    '<select  type="text" id="service'+numberIncr+'" name="service['+numberIncr+']" required class="service form-control">'+
                        '<option value="">----select----</option>'+
                        @foreach($services as $service)
                        '<option value="{{$service->id}}">{{$service->name_ar}}</option>'+
                        @endforeach
                    '</select>'+
                '</td>' +
                    '<td  class="col-2">' +
                    '<input type="text" readonly name="category['+numberIncr+']" required id="category'+numberIncr+'"  class="category form-control">' +
                    '</td>' +
                    '<td class="col-2" >' +
                    '<select  type="text" id="doctor'+numberIncr+'" name="doctor['+numberIncr+']" required class="doctor form-control">'+
                    '<option value="">----select----</option>'+
                    @foreach($doctors as $doctor)
                        '<option value="{{$doctor->id}}">{{$doctor->name_ar}}</option>'+
                    @endforeach
                        '</select>'+
                    '</td>' +
                    '<td class="col-1">' +
                    '<input type="text"  name="quantity['+numberIncr+']" required  onkeypress="validate(event)" onchange="mychangeitem(this)" id="quantity'+numberIncr+'" value="0"  class="quantity form-control">' +
                    '</td>' +
                    '<td class="col-2">' +
                    '<input type="text" name="price['+numberIncr+']" required onkeypress="validate(event)" onchange="mychangeitem(this)" id="price'+numberIncr+'" value="0"   class="price form-control">' +
                    '</td>' +
                    '<td class="col-2">' +
                    '<input type="text" readonly name="amount['+numberIncr+']" required id="amount'+numberIncr+'" value="0"   class="amount form-control">' +
                    '</td>' +
                    '<td class="col-1">' +
                    '<input type="text" name="discount['+numberIncr+']"  onkeypress="validate(event)" onchange="mychangeitem(this)" id="discount'+numberIncr+'" value="0"   class="discount form-control">' +
                    '</td>' +
                    '<td class="col-2">' +
                    '<input type="text" readonly name="amount_discount['+numberIncr+']" required id="amount_discount'+numberIncr+'"  value="0"  class="amount_discount form-control">' +
                    '</td>' +
                    '<td class="add-remove text-end">' +
                    ' <a href="javascript:void(0);" class="add-btns me-2"><i class="fas fa-plus-circle"></i></a> ' +
                    '<a href="javascript:void(0);"  id="'+numberIncr+'" style="color: red" class=" delegated-btn"><i class="fa fa-trash-alt"></i></a>' +
                    '</td>' +
                    '</tr>';

                $(".add-table-items").append(experiencecontent);
                $("#service"+numberIncr).change(function() {
                    // var service_id = $(this).val();
                    var service_id =$('#service'+numberIncr).val();
                    if (service_id !=0){
                        $.ajax({  //create an ajax request to display.php
                            type: "GET",
                            dataType: "json",
                            url:  config.routes.service + service_id,
                            success: function (data) {
                                //services details
                                $("#category"+numberIncr).val(data[1]);
                                $("#price"+numberIncr).val(data[0].price);


                                var amount = parseFloat(document.getElementById("amount" + numberIncr).value);
                                var discount = parseInt(document.getElementById('discount' + numberIncr).value);
                                var amount_discount = parseFloat(document.getElementById("amount_discount" + numberIncr).value);
                                var quantity = parseFloat(document.getElementById("quantity" + numberIncr).value);

                                // $("#quantity"+numberIncr).val(0);
                                // $("#amount"+numberIncr).val(0);
                                // $("#discount"+numberIncr).val(0);
                                // $("#amount_discount"+numberIncr).val(0);
                                // count_item = count_item - 1
                                // $('#item_count_all').text(count_item);
                                // $('#count_item_all_invoice').val(count_item);
                                var quantity_all = document.getElementById("quantity_all").textContent;
                                document.getElementById("quantity_all").textContent = parseInt(Math.abs(quantity_all - quantity));
                                document.getElementById("quantity_all_input").textContent = parseInt(Math.abs(quantity_all - quantity));


                                var total_all = document.getElementById("total_all").textContent;
                                document.getElementById("total_all").textContent = parseFloat(Math.abs(total_all - amount)).toFixed(2);
                                document.getElementById("total_all_input").textContent = parseFloat(Math.abs(total_all - amount)).toFixed(2);


                                var discount_all = document.getElementById("discount_all").textContent;
                                document.getElementById("discount_all").textContent = parseInt(Math.abs(discount_all - discount));
                                document.getElementById("discount_all_input").textContent = parseInt(Math.abs(discount_all - discount));


                                var total_amount_all = document.getElementById("total_amount_all").textContent;
                                document.getElementById("total_amount_all").textContent = parseFloat(Math.abs(total_amount_all - amount_discount)).toFixed(2);
                                document.getElementById("total_amount_all_input").textContent = parseFloat(Math.abs(total_amount_all - amount_discount)).toFixed(2);


                            }
                        });
                    }else
                    {
                        $("#category"+numberIncr).val('');
                        $("#price"+numberIncr).val(0);
                        var amount = parseFloat(document.getElementById("amount" + numberIncr).value);
                        var discount = parseInt(document.getElementById('discount' + numberIncr).value);
                        var amount_discount = parseFloat(document.getElementById("amount_discount" + numberIncr).value);
                        var quantity = parseInt(document.getElementById("quantity" + numberIncr).value);

                        $("#quantity"+numberIncr).val(0);
                        $("#amount"+numberIncr).val(0);
                        $("#discount"+numberIncr).val(0);
                        $("#amount_discount"+numberIncr).val(0);
                        // count_item = count_item - 1
                        // $('#item_count_all').text(count_item);
                        // $('#count_item_all_invoice').val(count_item);
                        var quantity_all = document.getElementById("quantity_all").textContent;
                        document.getElementById("quantity_all").textContent = parseInt(Math.abs(quantity_all - quantity)).toFixed(2);
                        document.getElementById("quantity_all_input").textContent = parseInt(Math.abs(quantity_all - quantity)).toFixed(2);


                        var total_all = document.getElementById("total_all").textContent;
                        document.getElementById("total_all").textContent = parseFloat(Math.abs(total_all - amount)).toFixed(2);
                        document.getElementById("total_all_input").textContent = parseFloat(Math.abs(total_all - amount)).toFixed(2);


                        var discount_all = document.getElementById("discount_all").textContent;
                        document.getElementById("discount_all").textContent = parseInt(Math.abs(discount_all - discount));
                        document.getElementById("discount_all_input").textContent = parseInt(Math.abs(discount_all - discount));


                        var total_amount_all = document.getElementById("total_amount_all").textContent;
                        document.getElementById("total_amount_all").textContent = parseFloat(Math.abs(total_amount_all - amount_discount)).toFixed(2);
                        document.getElementById("total_amount_all_input").textContent = parseFloat(Math.abs(total_amount_all - amount_discount)).toFixed(2);


                    }
                });
                return false;

            });

            $("#service0").change(function() {
                // var service_id = $(this).val();
                var service_id =$('#service0').val();
                if (service_id !=0){
                    $.ajax({  //create an ajax request to display.php
                        type: "GET",
                        dataType: "json",
                        url:  config.routes.service + service_id,
                        success: function (data) {
                            //services details
                            $("#category0").val(data[1]);
                            $("#price0").val(data[0].price);


                            var amount = parseFloat(document.getElementById("amount0").value);
                            var discount = parseInt(document.getElementById('discount0').value);
                            var amount_discount = parseFloat(document.getElementById("amount_discount0").value);
                            var quantity = parseInt(document.getElementById("quantity" +id_row).value);

                            $("#quantity0").val(0);
                            $("#amount0").val(0);
                            $("#discount0").val(0);
                            $("#amount_discount0").val(0);
                            // count_item = count_item - 1
                            // $('#item_count_all').text(count_item);
                            // $('#count_item_all_invoice').val(count_item);
                            var quantity_all = document.getElementById("quantity_all").textContent;
                            document.getElementById("quantity_all").textContent = parseInt(Math.abs(quantity_all - quantity));
                            document.getElementById("quantity_all_input").textContent = parseInt(Math.abs(quantity_all - quantity));



                            var total_all = document.getElementById("total_all").textContent;
                            document.getElementById("total_all").textContent = parseFloat(Math.abs(total_all - amount)).toFixed(2);
                            document.getElementById("total_all_input").textContent = parseFloat(Math.abs(total_all - amount)).toFixed(2);


                            var discount_all = document.getElementById("discount_all").textContent;
                            document.getElementById("discount_all").textContent = parseInt(Math.abs(discount_all - discount));
                            document.getElementById("discount_all_input").textContent = parseInt(Math.abs(discount_all - discount));


                            var total_amount_all = document.getElementById("total_amount_all").textContent;
                            document.getElementById("total_amount_all").textContent = parseFloat(Math.abs(total_amount_all - amount_discount)).toFixed(2);
                            document.getElementById("total_amount_all_input").textContent = parseFloat(Math.abs(total_amount_all - amount_discount)).toFixed(2);



                        }
                    });
                }else
                {
                    $("#category0").val('');
                    $("#price0").val(0);

                    var amount = parseFloat(document.getElementById("amount0").value);
                    var discount = parseInt(document.getElementById('discount0').value);
                    var amount_discount = parseFloat(document.getElementById("amount_discount0").value);
                    var quantity = parseInt(document.getElementById("quantity" + id_row).value);

                    $("#quantity0").val(0);
                    $("#amount0").val(0);
                    $("#discount0").val(0);
                    $("#amount_discount0").val(0);
                    // count_item = count_item - 1
                    // $('#item_count_all').text(count_item);
                    // $('#count_item_all_invoice').val(count_item);


                    var quantity_all = document.getElementById("quantity_all").textContent;
                    document.getElementById("quantity_all").textContent = parseInt(Math.abs(quantity_all - quantity));
                    document.getElementById("quantity_all_input").textContent = parseInt(Math.abs(quantity_all - quantity));

                    var total_all = document.getElementById("total_all").textContent;
                    document.getElementById("total_all").textContent = parseFloat(Math.abs(total_all - amount)).toFixed(2);
                    document.getElementById("total_all_input").textContent = parseFloat(Math.abs(total_all - amount)).toFixed(2);


                    var discount_all = document.getElementById("discount_all").textContent;
                    document.getElementById("discount_all").textContent = parseInt(Math.abs(discount_all - discount));
                    document.getElementById("discount_all_input").textContent = parseInt(Math.abs(discount_all - discount));


                    var total_amount_all = document.getElementById("total_amount_all").textContent;
                    document.getElementById("total_amount_all").textContent = parseFloat(Math.abs(total_amount_all - amount_discount)).toFixed(2);
                    document.getElementById("total_amount_all_input").textContent = parseFloat(Math.abs(total_amount_all - amount_discount)).toFixed(2);



                }
            });
            $(document).on('click', '.delegated-btn', function (e) {

                let confirmAction = confirm("Are you sure you want to delete?");
                if (confirmAction) {

                    e.preventDefault();
                    var id_n = $(this).attr('id');
                    console.log(id_n);
                    var replaced = id_n.replace(/\D/g, '');
                    id_row = Number(replaced);  // 1 ,2,2,3,
                    var id_class = $(this).attr('class');
                    var replaced_class = id_class.replace(/\D/g, '');
                    id_class = Number(replaced_class);

                    var quantity = parseInt(document.getElementById("quantity" + id_row).value);

                    var amount = parseFloat(document.getElementById("amount" + id_row).value);
                    var discount = parseInt(document.getElementById('discount' + id_row).value);
                    var amount_discount = parseFloat(document.getElementById("amount_discount" + id_row).value);


                    // count_item = count_item - 1
                    // $('#item_count_all').text(count_item);
                    // $('#count_item_all_invoice').val(count_item);


                    var quantity_all = document.getElementById("quantity_all").textContent;
                    document.getElementById("quantity_all").textContent = parseInt(Math.abs(quantity_all - quantity));
                    document.getElementById("quantity_all_input").textContent = parseInt(Math.abs(quantity_all - quantity));

                    var total_all = document.getElementById("total_all").textContent;
                    document.getElementById("total_all").textContent = parseFloat( Math.abs(total_all - amount)).toFixed(2);
                    document.getElementById("total_all_input").textContent = parseFloat( Math.abs(total_all - amount)).toFixed(2);


                    var discount_all = document.getElementById("discount_all").textContent;
                    document.getElementById("discount_all").textContent = parseInt( Math.abs(discount_all - discount));
                    document.getElementById("discount_all_input").textContent = parseInt( Math.abs(discount_all - discount));


                    var total_amount_all = document.getElementById("total_amount_all").textContent;
                    document.getElementById("total_amount_all").textContent =  parseFloat(Math.abs(total_amount_all - amount_discount)).toFixed(2);
                    document.getElementById("total_amount_all_input").textContent =  parseFloat(Math.abs(total_amount_all - amount_discount)).toFixed(2);


                    $(this).parent().parent().remove();

                }





            });

            $("#patient_id").change(function() {
                var patient_id = $(this).val();
                var url =$('#patient_id').val();
                if (patient_id !=0){
                    $.ajax({  //create an ajax request to display.php
                        type: "GET",
                        dataType: "json",
                        url:  config.routes.patient + patient_id,
                        success: function (data) {
                            //patient details
                            $("#id_number").val(data[0].id_number);
                            $("#email").val(data[0].email);
                            $("#patient_name").val(data[0].name_ar);
                            $("#phone").val(data[0].phone);
                            $("#gender").val(data[0].gender);
                            $("#city").val(data[1]);
                            $("#balance").val(data[0].balance);

                            $("#patient_image_dis").hide();

                            if (data[0].logo !=''){
                                $("#patient_image_en").attr("src",data[0].logo);
                                $("#patient_image_en").show();
                                $("#patient_image_dis").hide();

                            }else {
                                $("#patient_image_dis").show();
                                $("#patient_image_en").hide();
                            }


                        }
                    });
                }else
                {
                    $("#id_number").val('');
                    $("#email").val('');
                    $("#phone").val('');
                    $("#gender").val('');
                    $("#city").val('');
                    $("#balance").val('');
                    $("#patient_image_en").hide();
                    $("#patient_image_dis").show();

                }
            });


            });
        function mychangeitem(elem) {
            var id_n = $(elem).attr('id');
            var replaced = id_n.replace(/\D/g, '');
            g = Number(replaced);  // 1 ,2,2,3,

            var quantity = $("#quantity" + g).val();

            if (quantity == "" || quantity == 0) {
                alert('Please Enter Quantity ');
                $("#quantity" + g).focus();
                return false;
            }

            // validate not empty input price
            var price = $("#price" + g).val();

            if (price == "" || price == 0) {
                alert('Please Enter Price ');
                $("#price" + g).focus();
                return false;
            }

            // validate not empty input quantity


            var amount =  $("#amount" + g).val(parseFloat(quantity *price).toFixed(2));
            var discount =  parseFloat($("#discount" + g).val() / 100).toFixed(2);
            var totalValue_discount = parseFloat( quantity *price - (quantity *price * discount)).toFixed(2);
            if (totalValue_discount < 0) {
                alert('عذراً هناك خطأ ، يجب أن تكون نسبة الخصم الاول للمبيعات اقل من ذلك لأن السعر اصبح بالسالب');
                $("#amount_discount"+g).focus();
                return false;
            }else {
                $("#amount_discount"+g).val( parseFloat( totalValue_discount).toFixed(2));
                console.log(discount);
            }

        //calculate all
            var quantity = 0;
            $('.quantity').each(function () {

                if ($(this).val() != "") {
                    quantity -= parseInt($(this).val());
                }

            });

            document.getElementById("quantity_all").textContent = parseInt(Math.abs(quantity));
            document.getElementById("quantity_all_input").value = parseInt(Math.abs(quantity));

            var sum = 0;
            $('.amount').each(function () {

                if ($(this).val() != "") {
                    sum -= parseFloat($(this).val());
                }

            });

            document.getElementById("total_all").textContent =  parseFloat(Math.abs(sum)).toFixed(2);
            document.getElementById("total_all_input").value =  parseFloat(Math.abs(sum)).toFixed(2);

            var discount = 0;
            $('.discount').each(function () {

                if ($(this).val() != "") {
                    discount -= parseInt($(this).val());
                }

            });
            document.getElementById("discount_all").textContent = parseInt( Math.abs(discount)).toFixed(2);
            document.getElementById("discount_all_input").value =  parseInt(Math.abs(discount)).toFixed(2);


            var amount_discount = 0;
            $('.amount_discount').each(function () {

                if ($(this).val() != "") {
                    amount_discount -= parseFloat($(this).val());
                }

            });
            document.getElementById("total_amount_all").textContent = parseFloat( Math.abs(amount_discount)).toFixed(2);
            document.getElementById("total_amount_all_input").value =  parseFloat(Math.abs(amount_discount)).toFixed(2);




        }
        function validate(evt) {
            var theEvent = evt || window.event;

            // Handle paste
            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
                // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]|\./;
            if( !regex.test(key) ) {
                theEvent.returnValue = false;
                if(theEvent.preventDefault) theEvent.preventDefault();
            }
        }
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

@endsection
