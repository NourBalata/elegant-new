@extends('admin.layouts.master')
@section('styles')
    <link href="{{ asset('dashboard/assets/js/custom/bootstrap-fileinput/css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css" />

@endsection
@section('title')
    Show Sale Order
@endsection
@section('head-title')
    Show Sale Order
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
                <div class="card invoices-add-card" id="print">
                    <div class="card-body">
                        <div class="row justify-content-center" >
                                            <div class="col-lg-12">
                                                <div class="card invoice-info-card">
                                                    <div class="card-body pb-0">
                                                        <div class="invoice-item invoice-item-one">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="invoice-logo">
                                                                        <img src="{{$setting->logo}}" alt="logo">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="invoice-info">
                                                                        <div class="invoice-head">
                                                                            <h2 class="text-primary">Invoice</h2>
                                                                            <p>Invoice Number : {{$data->number}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="invoice-item invoice-item-bg">
                                                            <div class="invoice-circle-img">
                                                                <img src="{{asset('dashboard/assets/img/invoice-circle1.png')}}" alt="" class="invoice-circle1">
                                                                <img src="{{asset('dashboard/assets/img/invoice-circle2.png')}}" alt="" class="invoice-circle2">
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-4 col-md-12">
                                                                    <div class="invoice-info">
                                                                        <strong class="customer-text-one">Invoice From</strong>
                                                                        <h6 class="invoice-name">{{$setting->name_ar}} -{{$setting->name_en}}</h6>
                                                                        <p class="invoice-details invoice-details-two">
                                                                            Phone :  {{$setting->phone}} <br>
                                                                            Email : {{$setting->email}} <br>
                                                                            Address line :{{$setting->address}}<br>
                                                                            Address line : {{$setting->address2}}<br>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-md-12">
                                                                    <div class="invoice-info">
                                                                        <strong class="customer-text-one">Billed to</strong>
                                                                        <h6 class="invoice-name">Patient</h6>
                                                                        <p class="invoice-details invoice-details-two">
                                                                            Name: {{$data->patient_name}} <br>
                                                                            Phone: {{$data->patient->phone}} <br>
                                                                            ID:  {{$data->patient->id_number}} <br>
                                                                            Address: {{$data->patient->address}} , <br>
                                                                            City:  {{$data->patient->city->name}}
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 col-md-12">
                                                                    <div class="invoice-info invoice-info-one border-0">
                                                                        <p>Status : {{$data->status->name}}</p>
                                                                        <p>Issue Date : {{$data->date}}</p>
                                                                        <p>Due Date :  {{$data->due_date}}</p>
                                                                        <p>Quantity : {{$data->quantity}} </p>
                                                                        <p>Due Amount : {{$data->final_total}} </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="invoice-item invoice-table-wrap">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="table-responsive">
                                                                        <table class="invoice-table table table-center mb-0">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>Service</th>
                                                                                <th>Category</th>
                                                                                <th>Doctor</th>
                                                                                <th>Price</th>
                                                                                <th>Quantity</th>
                                                                                <th>Total</th>
                                                                                <th>Discount (%)</th>
                                                                                <th class="text-end">Amount</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            @foreach($data->sales_order_details as $details)
                                                                            <tr>
                                                                                <td>{{$details->service->name_en}}</td>
                                                                                <td>{{$details->category_name}}</td>
                                                                                <td>{{$details->doctor_d->name}}</td>
                                                                                <td>{{$details->price}}</td>
                                                                                <td>{{$details->quantity}}</td>
                                                                                <td>{{$details->amount}}</td>
                                                                                <td>{{number_format($details->discount,0)}}%</td>
                                                                                <td class="text-end">{{$details->price_discount}} <i class="fas fa-shekel-sign"></i></td>
                                                                            </tr>
                                                                            @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row align-items-center justify-content-center">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="invoice-terms">
                                                                    <h6>Notes:</h6>
                                                                    <p class="mb-0">
                                                                        {{$data->note}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="invoice-total-card">
                                                                    <div class="invoice-total-box">
                                                                        <div class="invoice-total-inner">
                                                                            <p>Quantity <span>{{$data->quantity}}</span></p>
                                                                            <p>Total <span>{{$data->total}} <i class="fas fa-shekel-sign"></i></span></p>
                                                                            <p>Total Discount <span>{{number_format($data->total_discounts,0)}}%</span></p>
                                                                        </div>
                                                                        <div class="invoice-total-footer">
                                                                            <h4>Total Amount <span>{{$data->final_total}} <i class="fas fa-shekel-sign"></i></span></h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="invoice-sign-box">
                                                            <div class="row">
                                                                <div class="col-lg-8 col-md-8">


                                                                </div>
                                                                <div class="col-lg-4 col-md-4">
                                                                    <div class="invoice-sign text-end">
{{--                                                                        <img class="img-fluid d-inline-block" src="{{asset('dashboard/assets/img/signature.png')}}"--}}
{{--                                                                             alt="sign">--}}
{{--                                                                        <span class="d-block">Harristemp</span>--}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            <div class="col-lg-8 col-md-8">

<button onclick="printDiv()" class="btn btn-primary"><li class="fas fa-print"></li></button>

                            </div>
                                        </div>
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
        // print report
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
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
