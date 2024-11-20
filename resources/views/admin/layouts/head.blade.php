<!DOCTYPE html>


<html lang="en">

<!-- Mirrored from preclinic.dreamguystech.com/template/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Feb 2023 10:17:16 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('dashboard/assets/img/favicon.png')}}">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('dashboard/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/assets/plugins/fontawesome/css/all.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/assets/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/assets/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="{{asset('dashboard/assets/plugins/feather/feather.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/assets/css/style.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @yield('styles')
</head>
